<?php
require "../security.php";
require '../../function.php';

if (!isset($_SESSION["login"])) {
    header("Location: ../login.php");
    exit;
}

$id = $_GET['id'] ?? '';

if ($id == '') {
    header("Location: admin-program.php");
    exit;
}
$jumlah = query("SELECT * FROM program WHERE id_program='$id'");

if (empty($jumlah)) {
    header("Location: admin-program.php");
    exit;
}
$program = $jumlah[0];

$errors = $_SESSION['errors'] ?? [];
unset($_SESSION['errors']);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Program</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/style.css" type="text/css" />
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&family=Playpen+Sans:wght@100..800&display=swap" rel="stylesheet" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="container-ua">

        <?php
        $page = "program";
        include "../admin-sidebar.php";
        ?>

        <div class="content-ua admin-page">

            <form action="a-ubah-program.php" method="POST" class="form-card" enctype="multipart/form-data">

                <div class="back kembali mt-2">
                    <button onclick="window.location.href='admin-program.php'" class="back-arrow" type="button">
                        <i class="fas fa-angle-left"></i>
                        <p class="orange bold">Kembali</p>
                    </button>
                </div>

                <div class="form-title">
                    <h1>Update Program</h1>
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

                    <input type="hidden" name="id_program" value="<?= $program["id_program"] ?>">
                    <div>
                        <div class="mb-3">
                            <label class="form-label">Program <span class="required">*</span></label>
                            <input class="form-control" type="text" name="program" required autocomplete="off" placeholder="Masukkan program" value="<?= $program['program'] ?? ''; ?>">
                        </div>
                    </div>


                    <div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label">Deskripsi <span class="required">*</span></label>
                                <textarea class="form-control" name="deskripsi" required autocomplete="off" placeholder="Masukkan deskripsi program"><?= $program['deskripsi'] ?? ''; ?></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Foto <span class="required">*</span></label>
                            <div class="mb-2">
                                <img src="../../img/program/<?= $program['foto'] ?? ''; ?>" class="img-thumbnail">
                                <p class="mt-2" style="font-size: 1rem;">File : <?= $program['foto'] ?? ''; ?></p>
                            </div>
                            <input type="hidden" name="foto_lama" value="<?= $program['foto'] ?? ''; ?>">
                            <input class="form-control"
                                type="file"
                                name="foto">
                                <p style="font-size:0.9rem;" class="mt-2">Format: .png, .jpg, .jpeg, .webp</p>
                        </div>
                    </div>

                </div>


                <button type="submit" name="update-program" class="btn-form">
                    Simpan Perubahan
                </button>
            </form>

        </div>

    </div>
    <script src="../../js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>