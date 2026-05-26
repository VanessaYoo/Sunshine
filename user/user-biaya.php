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
    <title>Pendaftaran</title>
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
        $page = "biaya";
        include "user-sidebar.php";
        ?>

        <!-- isi-halaman -->
        <div class="content-ua biaya-page">
            <div class="biaya-card">
                <div class="form-title">
                    <h1>Informasi Biaya Pendaftaran</h1>
                    <p>
                        Berikut rincian biaya pendidikan siswa baru TK Sunshine
                    </p>
                </div>

                <div class="table-responsive">
                    <table class="table biaya-table align-middle">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Jenis Pembayaran</th>
                                <th scope="col">Nominal</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td scope="row">1</td>
                                <td>Biaya Pendaftaran</td>
                                <td>Rp250.000</td>
                            </tr>

                            <tr>
                                <td scope="row">2</td>
                                <td>Uang Pangkal</td>
                                <td>Rp3.500.000</td>
                            </tr>

                            <tr>
                                <td scope="row">3</td>
                                <td>Seragam Sekolah</td>
                                <td>Rp750.000</td>
                            </tr>

                            <tr>
                                <td scope="row">4</td>
                                <td>Perlengkapan Belajar</td>
                                <td>Rp500.000</td>
                            </tr>

                            <tr>
                                <td scope="row">5</td>
                                <td>SPP Bulan Pertama</td>
                                <td>Rp450.000</td>
                            </tr>
                        </tbody>

                        <tfoot>
                            <tr>
                                <th colspan="2">Total Pembayaran</th>
                                <th>Rp5.450.000</th>
                                <!-- <th colspan="3">Seluruh biaya administrasi dan pendidikan telah dilunasi</th> -->
                            </tr>
                        </tfoot>
                    </table>
                </div>

               <div class="pembayaran-wrapper">
                 <div class="rekening-box">
                    <h3>Pembayaran Transfer</h3>

                    <div class="rekening-item">
                        <p>Bank</p>
                        <p class="bold">BCA</p>
                    </div>

                    <div class="rekening-item">
                        <p>Nomor Rekening</p>
                        <p class="bold">1234567890</p>
                    </div>

                    <div class="rekening-item">
                        <p>Atas Nama</p>
                        <p class="bold">TK Sunshine Pontianak</p>
                    </div>

                    <div class="rekening-note">
                        <i class="fa-solid fa-circle-info"></i>
                        <span>
                            Setelah melakukan pembayaran, silakan upload bukti transfer
                            pada konfirmasi pembayaran.
                        </span>
                    </div>
                </div>

                <div class="konfirmasi-card">
                    <h2>Konfirmasi Pembayaran</h2>
                    <p>Upload bukti transfer Anda di sini.</p>

                    <form action="" method="POST">
                        <input type="file" name="bukti" class="form-control" required>
                        <button type="submit" class="btn-konfirmasi">
                            Upload Bukti
                        </button>
                    </form>
                </div>
               </div>

            </div>

        </div>



    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>