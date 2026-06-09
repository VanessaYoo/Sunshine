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
    <title>Prestasi</title>
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
        $page = "prestasi";
        include "../admin-sidebar.php";
        ?>

        <!-- isi-halaman -->
        <div class="content-ua admin-page">
            <div class="admin-table-card">
                <div class="admin-card-title tambah">
                    <h1>Kelola Prestasi</h1>
                    <a href="a-tambah-prestasi.php">Tambah Prestasi</a>
                </div>
                <div class="table-responsive">
                    <table class="table admin-table kelola-table align-middle">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Prestasi</th>
                                <th>Tanggal</th>
                                <th>Deskripsi</th>
                                <th>Foto</th>
                                <th>Data Diisi</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $winners = query("SELECT * FROM prestasi JOIN user ON prestasi.id_user = user.id_user");
                            if (empty($winners)) :
                            ?>
                                <tr>
                                    <td colspan="7" class="text-center">Tidak Memiliki Data</td>
                                </tr>
                                <?php else :
                                $i = 1;
                                foreach ($winners as $winner) :
                                ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td class="text-wrap"><?= $winner['prestasi']; ?></td>
                                        <td class="text-wrap"><?= date('d F Y', strtotime($winner['tanggal'])); ?></td>
                                        <td class="text-wrap">
                                            <p class="info detail">
                                                <?= $winner['deskripsi']; ?>
                                            </p>
                                        </td>
                                        <td class="text-wrap"><?= $winner['foto']; ?></td>
                                        <td class="text-wrap">
                                            <div class="pp-info">
                                                <span class="text-wrap"><?= $winner["nama"]; ?></span>
                                                <p><?= $winner['created_at']; ?></p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="aksi-btn">
                                                <a href="a-update-prestasi.php?id=<?= $winner['id_prestasi']; ?>" class="edit">
                                                    <i class="fa-solid fa-pen"></i>
                                                </a>
                                                <a href="a-delete-prestasi.php?id=<?= $winner['id_prestasi']; ?>" class="delete">
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