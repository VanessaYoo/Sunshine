<?php
require "../../security.php";
require '../../../koneksi.php';
require '../../../data_query.php';

if (!isset($_SESSION["login"])) {
    header("Location: ../../login.php");
    exit;
}

$id = $_GET['id'] ?? '';

if ($id == '') {
    header("Location: ../admin-informasi.php");
    exit;
}
$jumlah = query("SELECT * FROM kontak WHERE id_kontak='$id'");

if (empty($jumlah)) {
    header("Location: ../admin-informasi.php");
    exit;
}
$kontak = $jumlah[0];

$errors = $_SESSION['errors'] ?? [];
unset($_SESSION['errors']);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Kontak</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../css/style.css" type="text/css" />
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&family=Playpen+Sans:wght@100..800&display=swap" rel="stylesheet" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="container-ua">

        <?php
        $page = "informasi";
        include "../../admin-sidebar.php";
        ?>

        <div class="content-ua admin-page">

            <form action="a-ubah-kontak.php" method="POST" class="form-card">

                <div class="back kembali mt-2">
                    <button onclick="window.location.href='../admin-informasi.php'" type="button" class="back-arrow">
                        <i class="fas fa-angle-left"></i>
                        <p class="orange bold">Kembali</p>
                    </button>
                </div>

                <div class="form-title">
                    <h1>Update Kontak</h1>
                </div>


                <div class="row g-4">


                    <?php if (!empty($errors)): //(cek dulu) namun hasilnya [] karna gada eror 
                    ?>
                        <div class="errors">
                            <?php foreach ($errors as $error): ?>
                                <div class="col-md-5">
                                    <div class="error"><?= htmlspecialchars($error) ?></div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>


                    <input type="hidden" name="id_kontak" value="<?= $kontak["id_kontak"] ?>">
                    <div class="col-md-5">
                        <div class="mb-3">
                            <label class="form-label">Kontak <span class="required">*</span></label>
                            <input class="form-control" type="text" name="kontak" required autocomplete="off" value="<?= $kontak['kontak'] ?? ''; ?>" placeholder="Masukkan kontak WhatsApp">
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="mb-3">
                            <label class="form-label">Link WhatsApp <span class="required">*</span></label>
                            <input class="form-control" type="text" name="link" required autocomplete="off" value="<?= $kontak['link'] ?? ''; ?>" placeholder="Masukkan link WhatsApp">
                        </div>
                    </div>

                </div>


                <button type="submit" name="update-kontak" class="btn-form">
                    Simpan Perubahan
                </button>
            </form>

        </div>

    </div>
    <script src="../../../js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>