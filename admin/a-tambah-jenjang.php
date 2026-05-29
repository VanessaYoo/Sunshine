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
    <title>Tambah Jenjang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css" type="text/css" />
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&family=Playpen+Sans:wght@100..800&display=swap" rel="stylesheet" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="container-ua">

        <?php
        $page = "jenjang";
        include "admin-sidebar.php";
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
                    <h1>Tambah Jenjang Playground</h1>
                </div>

                <div class="row g-4">

                    <div class="col-md-6">
                        <div class="form-input">
                            <label class="form-label">Jenjang Tahun <span class="required">*</span></label>
                            <input class="form-control" type="text" name="tahun" required autocomplete="off" placeholder="Masukkan rentang tahun">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-input">
                            <label class="form-label">Kelompok <span class="required">*</span></label>
                            <input class="form-control" type="text" name="kelompok" required autocomplete="off" placeholder="Masukkan nama kelompok">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Icon <span class="required">*</span></label>
                            <input class="form-control"
                                type="file"
                                name="icon" required>
                        </div>
                    </div>

                </div>


                <button type="submit" name="tambah-jenjang" class="btn-form">
                    Simpan
                </button>
            </form>

        </div>

    </div>
    <script src="../js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>