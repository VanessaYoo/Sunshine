<?php
require "security.php";
require '../function.php';
$nama = $nama ?? '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css" type="text/css" />
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
        $page = "dashboard";
        include "admin-sidebar.php";
        ?>

        <!-- isi-halaman -->
        <div class="content-ua admin-page">

            <div class="admin-welcome">

                <h1>Selamat Datang, <?php echo $nama; ?>!</h1>
                <p>
                    Aktivitas pengelolaan data dan informasi Sunshine
                </p>

                <div class="admin-grid">
                    <!-- <div class="admin-total-card">
                        <div>
                            <p>Pendaftar</p>
                            <h2>128</h2>
                        </div>
                        <div class="admin-icon green">
                            <i class="fa-solid fa-users"></i>
                        </div>
                    </div>

                    <div class="admin-total-card">
                        <div>
                            <p>Disetujui</p>
                            <h2>90</h2>
                        </div>
                        <div class="admin-icon blue">
                            <i class="fa-solid fa-circle-check"></i>
                        </div>
                    </div>

                    <div class="admin-total-card">
                        <div>
                            <p>Ditolak</p>
                            <h2>38</h2>
                        </div>
                        <div class="admin-icon red">
                            <i class="fa-solid fa-circle-xmark"></i>
                        </div>
                    </div> -->

                    <a href="jenjang/admin-jenjang.php" class="admin-total-card">
                        <?php
                        $total_kelompok = query("SELECT COUNT(*) as total FROM kelompok")[0];
                        ?>
                        <div>
                            <p>Total Kelompok</p>
                            <h2><?= $total_kelompok["total"] ?></h2>
                        </div>
                        <div class="admin-icon orange">
                            <i class="fa-solid fa-school"></i>
                        </div>
                    </a>

                    <a href="jenjang/admin-jenjang.php" class="admin-total-card">
                        <?php
                        $total_subkelompok = query("SELECT COUNT(*) as total FROM sub_kelompok")[0];
                        ?>
                        <div>
                            <p>Total Sub Kelompok</p>
                            <h2><?= $total_subkelompok["total"] ?></h2>
                        </div>
                        <div class="admin-icon red">
                            <i class="fa-solid fa-user-friends"></i>
                        </div>
                    </a>

                    <a href="informasi/admin-informasi.php" class="admin-total-card">
                        <?php
                        $total_kontak = query("SELECT COUNT(*) as total FROM kontak")[0];
                        ?>
                        <div>
                            <p>Total Kontak</p>
                            <h2><?= $total_kontak["total"] ?></h2>
                        </div>
                        <div class="admin-icon green">
                            <i class="fa-solid fa-phone"></i>
                        </div>
                    </a>

                    <a href="program/admin-program.php" class="admin-total-card">
                        <?php
                        $total_program = query("SELECT COUNT(*) as total FROM program")[0];
                        ?>
                        <div>
                            <p>Total Program</p>
                            <h2><?= $total_program["total"] ?></h2>
                        </div>
                        <div class="admin-icon yellow">
                            <i class="fa-solid fa-book-open"></i>
                        </div>
                    </a>

                    <a href="ekskul/admin-ekskul.php" class="admin-total-card">
                        <?php
                        $total_ekskul = query("SELECT COUNT(*) as total FROM ekskul")[0];
                        ?>
                        <div>
                            <p>Total Ekstrakurikuler</p>
                            <h2><?= $total_ekskul["total"] ?></h2>
                        </div>
                        <div class="admin-icon purple">
                            <i class="fa-solid fa-futbol"></i>
                        </div>
                    </a>

                    <a href="prestasi/admin-prestasi.php" class="admin-total-card">
                        <?php
                        $total_prestasi = query("SELECT COUNT(*) as total FROM prestasi")[0];
                        ?>
                        <div>
                            <p>Total Prestasi</p>
                            <h2><?= $total_prestasi["total"] ?></h2>
                        </div>
                        <div class="admin-icon blue">
                            <i class="fas fa-trophy"></i>
                        </div>
                    </a>

                </div>
            </div>

            <div class="admin-table-grid mt-4">

                <div class="admin-table-card">
                    <div class="admin-card-title">
                        <h3>Prestasi Terbaru</h3>
                        <a href="prestasi/admin-prestasi.php" class="btn-l-register black">Lihat Semua</a>
                    </div>

                    <div class="table-responsive">
                        <table class="table admin-table align-middle">

                            <tbody>
                                <?php
                                $winners = query("SELECT * FROM prestasi ORDER BY tanggal DESC LIMIT 3");
                                $i = 1;
                                foreach ($winners as $winner) :
                                ?>
                                    <tr>
                                        <td>
                                            <div class="pp-info">
                                                <span class="text-wrap"><?= $winner['prestasi']; ?></span>
                                                <p><?= date('d F Y', strtotime($winner['tanggal'])); ?></p>
                                            </div>
                                        </td>

                                        <td>
                                            <a href="prestasi/a-update-prestasi.php?id=<?= $winner['id_prestasi']; ?>">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                        </td>
                                    </tr>

                                <?php $i++;
                                endforeach;
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="admin-table-card">
                    <div class="admin-card-title">
                        <h3>Program Terbaru</h3>
                        <a href="program/admin-program.php" class="btn-l-register black">Lihat Semua</a>
                    </div>

                    <div class="table-responsive">
                        <table class="table admin-table align-middle program">

                            <tbody>

                                <?php
                                $programs = query("SELECT * FROM program ORDER BY created_at DESC LIMIT 4");
                                $i = 1;
                                foreach ($programs as $program) :
                                ?>

                                    <tr>
                                        <td>
                                            <div class="pp-info">
                                                <span><?= $program['program']; ?></span>
                                                <p><?= date('d F Y', strtotime($program['created_at'])); ?></p>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="program/a-update-program.php?id=<?= $program['id_program']; ?>">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                        </td>
                                    </tr>

                                <?php $i++;
                                endforeach;
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
    <script src="../js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>