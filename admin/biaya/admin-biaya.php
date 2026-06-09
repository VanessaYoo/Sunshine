<?php
include "../../security.php";
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
    <title>Biaya</title>
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
        $page = "biaya";
        include "../admin-sidebar.php";
        ?>

        <!-- isi-halaman -->
        <div class="content-ua admin-page">
            <div class="admin-table-card">
                <div class="admin-card-title">
                    <h1>Kelola Biaya</h1>
                </div>
                <div class="table-responsive">
                    <table class="table admin-table kelola-table align-middle">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Lengkap</th>
                                <th>Metode Pembayaran</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Johan Suratin</td>
                                <td>Pembayaran Transfer</td>
                                <td>Rp 100.000</td>
                                <td>
                                    <span class="status belum-lunas">
                                        Belum Lunas
                                    </span>
                                </td>

                                <td>
                                    <div class="aksi-btn">
                                        <a href="a-view-biaya.php" class="view">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                        <a href="a-update-biaya.php" class="edit">
                                            <i class="fa-solid fa-pen"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>

                                 <tr>
                                <td>1</td>
                                <td>Johan Suratin</td>
                                <td>Pembayaran Tunai</td>
                                <td>Rp 100.000</td>
                                <td>
                                    <span class="status lunas">
                                        Lunas
                                    </span>
                                </td>

                                <td>
                                    <div class="aksi-btn">
                                        <a href="a-view-biaya.php" class="view">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                        <a href="a-update-biaya.php" class="edit">
                                            <i class="fa-solid fa-pen"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>

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