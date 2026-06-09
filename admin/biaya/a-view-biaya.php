<?php
include "../security.php";
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
    <title>Lihat Biaya</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/style.css" type="text/css" />
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&family=Playpen+Sans:wght@100..800&display=swap" rel="stylesheet" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="container-ua">

        <?php
        $page = "biaya";
        include "../admin-sidebar.php";
        ?>

        <div class="content-ua admin-page">

            <div class="form-card">

                <div class="back kembali mt-2">
                    <button onclick="history.back()" class="back-arrow">
                        <i class="fas fa-angle-left"></i>
                        <p class="orange bold">Kembali</p>
                    </button>
                </div>

                <div class="form-title">
                    <h1>Biaya</h1>
                </div>

                <div class="row g-4">

                    <div class="col-md-6">
                        <div class="view-data">
                            <p>Nama Lengkap</p>
                            <p class="black">Miau Miau</p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="view-data">
                            <p>Metode Pembayaran</p>
                            <p class="black">Transfer</p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="view-data">
                            <p>Uang Pangkal</p>
                            <p class="black">Perempuan</p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="view-data">
                            <p>Uang Pendaftaran</p>
                            <p class="black">Pontianak</p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="view-data">
                            <p>Total Biaya</p>
                            <p class="black">27 Sep 2007</p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="view-data">
                            <p>Status Pembayaran</p>
                            <span class="status belum-lunas">
                                Belum Lunas
                            </span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="view-data">
                            <p>Bukti Pembayaran</p>
                            <img src="/Sunshine/img/aset/foto-bersama-2.png" alt="">
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    <script src="../../js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>