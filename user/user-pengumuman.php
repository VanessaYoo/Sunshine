<?php
session_start();
require '../function.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengumuman</title>
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
        $page = "pengumuman";
        include "user-sidebar.php";
        ?>

        <!-- isi-halaman -->
        <div class="content-ua pengumuman-page">

            <?php //if ($status == 'diterima') : ?>
                <div class="pengumuman-card t-m">
                    <div class="icon-status">
                        <i class="fa-solid fa-award"></i>
                    </div>
                    <h1>Selamat, Vanessa Diterima!</h1>
                    <p>
                        Vanessa dinyatakan diterima sebagai peserta didik baru
                        TK Sunshine tahun ajaran 2026/2027. Informasi biaya yang diperlukan dapat dilihat pada <a href="user-biaya.php" class="btn-biaya">biaya</a>.
                    </p>
                </div>

    <!-- <?php //elseif ($status == 'menunggu') : ?>
        <div class="content-ua pengumuman-page">
            <div class="pengumuman-card t-m">
                <div class="icon-status">
                    <i class="fa-solid fa-clock"></i>
                </div>
                <h1>Pendaftaran Sedang Diproses</h1>
                <p>
                    Data dan berkas sedang diverifikasi oleh pihak sekolah.
                    Silakan menunggu pengumuman selanjutnya.
                </p>
            </div>
        </div>


    <?php //elseif ($status == 'ditolak') : ?>
        <div class="content-ua pengumuman-page">
            <div class="pengumuman-card t-m">
                <div class="icon-status">
                    <i class="fa-solid fa-circle-xmark"></i>
                </div>
                <h1>Mohon Maaf, Pendaftaran Ditolak</h1>
                <p>
                    Nama belum dapat diterima pada tahun ajaran ini.
                    Tetap semangat dan terima kasih telah mendaftar di TK Sunshine.
                </p>
            </div>
        </div>

    <?php //endif; ?> -->

    </div>
    </div>
    <script src="../js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>