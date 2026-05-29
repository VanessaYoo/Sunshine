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
    <title>Biaya</title>
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

            </div>

            <div class="biaya-card">
                <div class="form-title">
                    <h1>Konfirmasi Metode Pembayaran</h1>
                    <p>Berikut beberapa metode yang dapat dipilih untuk memproses pembayaran</p>
                </div>

                <div class="metode-pembayaran-wrapper">
                    <div class="metode-pembayaran">
                        <button type="button" class="btn tunai" onclick="pilihMetode('tunai')">Tunai</button>
                        <button type="button" class="btn transfer" onclick="pilihMetode('transfer')">Transfer</button>
                    </div>
                </div>

                <div id="isi-tunai" class="pembayaran-tunai" style="display: none;">
                    <h3>Pembayaran Tunai</h3>
                    <p>Bagi yang ingin melakukan pembayaran secara tunai, silakan datang langsung ke bagian administrasi Sunshine.</p>
                </div>

                <form action="update_pembayaran.php" method="POST" enctype="multipart/form-data">

                    <input type="hidden" name="metode_pembayaran" value="transfer">

                    <div id="isi-transfer" class="pembayaran-wrapper" style="display: none;">
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
                                <span>Setelah melakukan pembayaran, silakan upload bukti transfer.</span>
                            </div>
                        </div>

                        <div class="konfirmasi-card">
                            <h2>Konfirmasi Pembayaran</h2>
                            <p>Upload bukti transfer Anda di sini.</p>
                            <input type="file" name="bukti" id="input-bukti" class="form-control">

                            <button type="submit" class="btn-konfirmasi" style="margin-top: 20px;">
                                Upload Bukti & Konfirmasi
                            </button>
                        </div>
                    </div>

                </form>
            </div>

        </div>



    </div>
    <script src="../js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>