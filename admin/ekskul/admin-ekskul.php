<?php
require "../security.php";
require '../../function.php';

if (!isset($_SESSION["login"])) {
    header("Location: ../login.php");
    exit;
}


$sortir = $_GET['sortir'] ?? 'terbaru'; //default terbaru
$order  = ($sortir == 'terlama') ? 'ASC' : 'DESC';
$ekskuls = query("SELECT * FROM ekskul JOIN user ON ekskul.id_user = user.id_user ORDER BY created_at $order");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ekstrakurikuler</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/style.css" type="text/css" />
    <link
        href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&family=Playpen+Sans:wght@100..800&display=swap"
        rel="stylesheet" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer" />
</head>

<body>
    <div class="container-ua">

        <?php
        $page = "ekskul";
        include "../admin-sidebar.php";
        ?>

        <!-- isi-halaman -->
        <div class="content-ua admin-page">

            <div class="admin-table-card">
                <div class="admin-card-title tambah">
                    <h1>Kelola Ekstrakurikuler</h1>
                    <div class="d-flex gap-3 align-items-center">
                        <form method="GET">
                            <select name="sortir" class="form-select sortir" onchange="this.form.submit()">
                                <option value="terbaru" <?= ($_GET['sortir'] ?? 'terbaru') == 'terbaru' ? 'selected' : '' ?>>Input Terbaru</option>
                                <option value="terlama" <?= ($_GET['sortir'] ?? '') == 'terlama' ? 'selected' : '' ?>>Input Terlama</option>
                            </select>
                        </form>
                        <a href="a-tambah-ekskul.php">Tambah Ekstrakurikuler</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table admin-table kelola-table align-middle">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Foto</th>
                                <th>Ekstrakurikuler</th>
                                <th>Data Input</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            if (empty($ekskuls)) :
                            ?>
                                <tr>
                                    <td colspan="5" class="text-center">Tidak Memiliki Data</td>
                                </tr>
                                <?php else :
                                $i = 1;
                                foreach ($ekskuls as $ekskul) :
                                ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                         <td class="text-wrap"><img src="../../img/ekskul/<?= $ekskul['foto']; ?>" width="90px" alt=""></td>
                                        <td class="text-wrap"><?= $ekskul["ekskul"]; ?></td>
                                         <td class="text-wrap">
                                            <div class="pp-info">
                                                <span class="text-wrap"><?= $ekskul["nama"]; ?></span>
                                                <p><?= $ekskul['created_at']; ?></p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="aksi-btn">
                                                <a href="a-update-ekskul.php?id=<?= $ekskul['id_ekskul']; ?>" class="edit">
                                                    <i class="fa-solid fa-pen"></i>
                                                </a>
                                                <a onclick="return confirm('Anda yakin ingin menghapus data?')" href="a-hapus-ekskul.php?id=<?= $ekskul['id_ekskul']; ?>" class="delete">
                                                    <i class="fa-solid fa-trash"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                            <?php $i++;
                                endforeach;
                            endif;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>


        </div>


    </div>
    <script src="../../js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>