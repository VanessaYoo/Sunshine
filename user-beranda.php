<?php
session_start();
require 'function.php';

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
    <title>Beranda</title>
    <link rel="stylesheet" href="css/style.css" type="text/css" />
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
        <div class="sidebar">
            <div class="logo-bar">
                <img src="img/aset/logo.png" alt="">
                <h1>Sunshine</h1>
            </div>
            <ul class="menu">
                <li class="active">
                    <a href="user-beranda.php" class="active">
                        <i class="fa-solid fa-home"></i>
                        <span>Beranda</span>
                    </a>
                </li>
                <li>
                    <a href="user-pendaftaran.php">
                        <i class="fa-solid fa-file-lines"></i>
                        <span>Pendaftaran</span>
                    </a>
                </li>
                <li>
                    <a href="status.php">
                        <i class="fa-solid fa-bullhorn"></i>
                        <span>Pengumuman</span>
                    </a>
                </li>
                <li>
                    <a href="user-biaya.php">
                        <i class="fa-solid fa-money-bill-wave"></i>
                        <span>Biaya</span>
                    </a>
                </li>
                <li class="logout-bar">
                    <a href="logout.php" onclick="return confirm('Apakah Anda yakin untuk logout dari Sunshine?');">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="halaman">
            <!-- judul dan nama -->
            <div class="user-title">
                <h3>Beranda</h3>
                <div class="user-name">
                    <h3>Vanessa Fransiska</h3>
                    <p class="user">Siswa</p>
                </div>
            </div>

            <!-- isi-halaman -->
            <div class="content-ua">

                <!-- alur -->
                <div class="alur-card">
                    <h1>Selamat Datang di Portal PPDB</h1>
                    <p>
                        Silakan ikuti alur pendaftaran di bawah ini untuk menjadi
                        calon peserta didik baru tahun ajaran 2026/2027.
                    </p>

                    <div class="step">
                        <div class="dot active-dot"></div>
                        <div>
                            <h3 class="active-step">Tahap 1: Pengisian Form</h3>
                            <p>Anda belum mengisi formulir pendaftaran</p>
                        </div>
                    </div>

                    <div class="step">
                        <div class="dot"></div>
                        <div>
                            <h3>Tahap 2: Verifikasi Berkas</h3>
                            <p>Menunggu Verifikasi</p>
                        </div>
                    </div>

                    <div class="step">
                        <div class="dot"></div>
                        <div>
                            <h3>Tahap 3: Pengumuman</h3>
                            <p>Menunggu Pengumuman</p>
                        </div>
                    </div>

                </div>

                <!-- bantuan -->
                <div class="bantuan-card">
                    <i class="fa-solid fa-headset"></i>
                    <h2>Butuh Bantuan?</h2>
                    <p>
                        Hubungi panitia PPDB jika mengalami kendala teknis.
                    </p>
                    <a href="https://wa.me/6282119228799">
                        Hubungi via WA
                    </a>
                </div>
            </div>

        </div>
    </div>
</body>

</html>