<?php
require "../security.php";
require '../../function.php';

if (!isset($_SESSION["login"])) {
    header("Location: ../login.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jenjang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/style.css" type="text/css" />
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&family=Playpen+Sans:wght@100..800&display=swap" rel="stylesheet" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="container-ua">

        <?php
        $page = "jenjang";
        include "../admin-sidebar.php";
        ?>

        <div class="content-ua admin-page">


            <div class="admin-table-card">
                <div class="admin-card-title tambah">
                    <h1>Kelola Kelompok</h1>
                    <div class="d-flex gap-3 align-items-center">
                        <form method="GET">
                            <select name="sortir-kelompok" class="form-select sortir" onchange="this.form.submit()">
                                <option value="terbaru" <?= ($_GET['sortir-kelompok'] ?? 'terbaru') == 'terbaru' ? 'selected' : '' ?>>Input Terbaru</option>
                                <option value="terlama" <?= ($_GET['sortir-kelompok'] ?? '') == 'terlama' ? 'selected' : '' ?>>Input Terlama</option>
                            </select>
                        </form>
                        <a href="kelompok/a-tambah-kelompok.php">Tambah Kelompok</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table admin-table kelola-table align-middle">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kelompok</th>
                                <th>Data Input</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sortir_kelompok = $_GET['sortir-kelompok'] ?? 'terbaru'; //default terbaru
                            $order  = ($sortir_kelompok == 'terlama') ? 'ASC' : 'DESC';
                            $kelompok = query("SELECT * FROM kelompok JOIN user ON kelompok.id_user = user.id_user ORDER BY created_at $order");
                            if (empty($kelompok)) :
                            ?>
                                <tr>
                                    <td colspan="3" class="text-center">Tidak Memiliki Data</td>
                                </tr>
                                <?php else :
                                $i = 1;
                                foreach ($kelompok as $kel) :
                                ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td class="text-wrap"><?= $kel["kelompok"]; ?></td>
                                         <td>
                                                <div class="pp-info">
                                                    <span class="text-wrap"><?= $kel["nama"]; ?></span>
                                                    <p><?= $kel['created_at']; ?></p>
                                                </div>
                                            </td>
                                        <td>
                                            <div class="aksi-btn">
                                                <a href="kelompok/a-update-kelompok.php?id=<?= $kel['id_kelompok']; ?>" class="edit">
                                                    <i class="fa-solid fa-pen"></i>
                                                </a>
                                                <a onclick="return confirm('Anda yakin ingin menghapus data?')" href="kelompok/a-hapus-kelompok.php?id=<?= $kel['id_kelompok']; ?>&type=kelompok" class="delete">
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


            <?php
            $bagi_kelompok = query("SELECT * FROM kelompok");
            $i = 1;
            foreach ($bagi_kelompok as $bagi_kel) :
                $id_kelompok = $bagi_kel["id_kelompok"];
            ?>
                <div class="admin-table-card mt-4">
                    <div class="admin-card-title tambah">
                        <h1>Kelola <?= $bagi_kel["kelompok"] ?></h1>
                        <div class="d-flex gap-3 align-items-center">
                            <form method="GET">
                                <select name="sortir-sub-kelompok" class="form-select sortir" onchange="this.form.submit()">
                                    <option value="terbaru" <?= ($_GET['sortir-sub-kelompok'] ?? 'terbaru') == 'terbaru' ? 'selected' : '' ?>>Input Terbaru</option>
                                    <option value="terlama" <?= ($_GET['sortir-sub-kelompok'] ?? '') == 'terlama' ? 'selected' : '' ?>>Input Terlama</option>
                                </select>
                            </form>
                            <a href="sub-kelompok/a-tambah-jenjang.php?id=<?= $bagi_kel['id_kelompok']; ?>">Tambah Jenjang</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table admin-table kelola-table align-middle">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Sub Kelompok</th>
                                    <th>Jenjang</th>
                                    <th>Ikon</th>
                                    <th>Data Input</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sortir_sub_kelompok = $_GET['sortir-sub-kelompok'] ?? 'terbaru'; //default terbaru
                                $order  = ($sortir_sub_kelompok == 'terlama') ? 'ASC' : 'DESC';
                                $sub_kelompok = query("SELECT * FROM sub_kelompok JOIN user ON sub_kelompok.id_user = user.id_user WHERE id_kelompok=$id_kelompok ORDER BY created_at $order");
                                if (empty($sub_kelompok)) :
                                ?>
                                    <tr>
                                        <td colspan="5" class="text-center">Tidak Memiliki Data</td>
                                    </tr>
                                    <?php else :
                                    $i = 1;
                                    foreach ($sub_kelompok as $subkel) :
                                    ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $subkel["sub_kelompok"]; ?></td>
                                            <td><?= $subkel["tahun"]; ?> Tahun</td>
                                            <td><?= $subkel["ikon"]; ?></td>
                                            <td>
                                                <div class="pp-info">
                                                    <span class="text-wrap"><?= $subkel["nama"]; ?></span>
                                                    <p><?= $subkel['created_at']; ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="aksi-btn">
                                                    <a href="sub-kelompok/a-update-jenjang.php?id=<?= $subkel['id_sub_kelompok']; ?>" class="edit">
                                                        <i class="fa-solid fa-pen"></i>
                                                    </a>
                                                    <a onclick="return confirm('Anda yakin ingin menghapus data?')" href="sub-kelompok/a-hapus-jenjang.php?id=<?= $subkel['id_sub_kelompok']; ?>&type=sub_kelompok" class="delete">
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
            <?php $i++;
            endforeach;
            ?>


        </div>

    </div>
    <script src="../../js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>