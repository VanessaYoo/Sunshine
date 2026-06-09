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
    <title>Update Biaya</title>
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

            <form action="" method="POST" class="form-card">

                <div class="back kembali mt-2">
                    <button onclick="history.back()" class="back-arrow">
                        <i class="fas fa-angle-left"></i>
                        <p class="orange bold">Kembali</p>
                    </button>
                </div>

                <div class="form-title">
                    <h1>Update Biaya</h1>
                </div>

                <div class="row g-4">

                    <div class="col-md-6">
                        <div class="form-input">
                            <label class="form-label">Nama <span class="required">*</span></label>
                            <input class="form-control" type="text" name="nama" required autocomplete="off" placeholder="Masukkan nama lengkap">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Metode Pembayaran <span class="required">*</span></label>
                            <select name="metode" class="form-select" aria-label="Default select example" required>
                                <option selected>Pilih Metode Pembayaran</option>
                                <option value="tunai">Tunai</option>
                                <option value="transfer">Transfer</option>
                            </select>
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Uang Pangkal<span class="required">*</span></label>
                            <input class="form-control" type="text" name="pangkal" required autocomplete="off" placeholder="Masukkan nominal uang pangkal">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Uang Pendaftaran <span class="required">*</span></label>
                            <input class="form-control" type="text" name="pendaftaran" required autocomplete="off" placeholder="Masukkan nominal uang pendaftaran">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Total Biaya <span class="required">*</span></label>
                            <input class="form-control" type="text" name="ibu" required autocomplete="off" placeholder="Masukkan nominal total biaya">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Status <span class="required">*</span></label>
                            <select name="metode" class="form-select" aria-label="Default select example" required>
                                <option selected>Pilih Status</option>
                                <option value="tunai">Lunas</option>
                                <option value="transfer">Belum Lunas</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Bukti Pembayaran <span class="required">*</span></label>
                            <input class="form-control"
                                type="file"
                                name="bukti" required>
                        </div>
                    </div>

                </div>

                <button type="submit" name="update-biaya" class="btn-form">
                    Simpan Perubahan
                </button>
            </form>

        </div>

    </div>
    <script src="../../js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>