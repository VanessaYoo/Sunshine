<?php
session_start();
require '../function.php';

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}


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
                <h1>Selamat Datang, Admin.</h1>
                <p>
                    Kelola seluruh data PPDB Sunshine dengan mudah
                    melalui dashboard admin.
                </p>

                <div class="admin-grid">
                    <div class="admin-total-card">
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
                    </div>

                    <div class="admin-total-card">
                        <div>
                            <p>Jenjang</p>
                            <h2>2</h2>
                        </div>
                        <div class="admin-icon orange">
                            <i class="fa-solid fa-school"></i>
                        </div>
                    </div>

                    <div class="admin-total-card">
                        <div>
                            <p>Ekstrakurikuler</p>
                            <h2>12</h2>
                        </div>
                        <div class="admin-icon purple">
                            <i class="fa-solid fa-futbol"></i>
                        </div>
                    </div>

                    <div class="admin-total-card">
                        <div>
                            <p>Program</p>
                            <h2>5</h2>
                        </div>
                        <div class="admin-icon yellow">
                            <i class="fa-solid fa-book-open"></i>
                        </div>
                </div>

            </div>
        </div>

        <div class="admin-table-grid">

            <div class="admin-table-card">
                <div class="admin-card-title">
                    <h3>Prestasi Terbaru</h3>
                    <a href="admin-prestasi.php">Lihat Semua</a>
                </div>

                <div class="table-responsive">
                    <table class="table admin-table align-middle">

                        <tbody>
                            <tr>
                                <td>
                                    <div class="pp-info">
                                        <span class="text-wrap">Juara 1 Olimpiade Matematika</span>
                                        <p>27 Mei 2026</p>
                                    </div>
                                </td>

                                <td>
                                    <a href="a-update-prestasi.php">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="pp-info">
                                        <span class="text-wrap">Juara 1 Olimpiade Matematika e af w fs f sf cder fed rrfvg dfv e gv df gvd f gd rg df  wfcsd edsf</span>
                                        <p>27 Mei 2026</p>
                                    </div>
                                </td>
                                <td>
                                    <a href="a-update-prestasi.php">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="pp-info">
                                        <span class="text-wrap">Juara 1 Olimpiade Matematika</span>
                                        <p>27 Mei 2026</p>
                                    </div>
                                </td>
                                <td>
                                    <a href="a-update-prestasi.php">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="admin-table-card">
                <div class="admin-card-title">
                    <h3>Pendaftar Terbaru</h3>
                    <a href="admin-pendaftaran.php">Lihat Semua</a>
                </div>

                <div class="table-responsive">
                    <table class="table admin-table align-middle">

                        <tbody>
                            <tr>
                                <td>
                                    <div class="pp-info">
                                        <span>Juara 1 Olimpiade Matematika</span>
                                        <p>27 Mei 2026</p>
                                    </div>
                                </td>
                                <td>
                                    <a href="a-view-pendaftaran.php">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="pp-info">
                                        <span>Juara 1 Olimpiade Matematika</span>
                                        <p>27 Mei 2026</p>
                                    </div>
                                </td>
                                <td>
                                    <a href="a-view-pendaftaran.php">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="pp-info">
                                        <span>Juara 1 Olimpiade Matematika</span>
                                        <p>27 Mei 2026</p>
                                    </div>
                                </td>
                                <td>
                                    <a href="a-view-pendaftaran.php">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                </td>
                            </tr>

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