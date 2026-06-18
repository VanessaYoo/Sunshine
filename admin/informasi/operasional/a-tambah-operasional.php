<?php
require "../../security.php";
require '../../../function.php';

if (!isset($_SESSION["login"])) {
    header("Location: ../../login.php");
    exit;
}

$errors = $_SESSION['errors'] ?? [];
unset($_SESSION['errors']);

// tambah
if (isset($_POST["tambah-operasional"])) {
    $errors = [];
    $hari = htmlspecialchars(trim($_POST["hari"]));
    $jam_buka = trim($_POST["jam_buka"]);
    $jam_tutup = trim($_POST["jam_tutup"]);
    $id_user = $_POST["id_user"];

    // cek jika belum diisi dan valid
    if ($hari == '') {
        $errors[] = "Hari wajib diisi.";
    }
    if ($jam_buka == '') {
        $errors[] = "Jam buka wajib diisi.";
    }
    if ($jam_tutup == '') {
        $errors[] = "Jam tutup wajib diisi.";
    }
    if (!empty($errors)) { // (cek dulu) -> klo error
        $_SESSION['errors'] = $errors;
        header("Location: /sunshine/admin/informasi/operasional/a-tambah-operasional.php");
        exit;
    }

    //query tambah data
    $query = "INSERT INTO operasional (hari, jam_buka, jam_tutup, id_user) VALUES
          ('$hari', '$jam_buka', '$jam_tutup', '$id_user')";

    mysqli_query($conn, $query);
    $hasil= mysqli_affected_rows($conn);
    if ($hasil > 0) {
        echo "
        <script>
      alert('Data berhasil ditambah');
      document.location.href='../admin-informasi.php';
        </script>
        ";
    } elseif ($hasil == 0) {
        echo "
        <script>
        alert('Tidak ada data yang ditambahkan');
        document.location.href='a-tambah-operasional.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Data gagal ditambah');
        document.location.href='a-tambah-operasional.php';
        </script>
        ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Operasional</title>
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

            <form action="" method="POST" class="form-card">

                <div class="back kembali mt-2">
                    <button type="button" onclick="window.location.href='../admin-informasi.php'" class="back-arrow">
                        <i class="fas fa-angle-left"></i>
                        <p class="orange bold">Kembali</p>
                    </button>
                </div>

                <div class="form-title">
                    <h1>Tambah Operasional</h1>
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

                    <div>
                        <div class="mb-3">
                            <label class="form-label">Hari <span class="required">*</span></label>
                            <input class="form-control" type="text" name="hari" required autocomplete="off" placeholder="Masukkan hari atau rentang hari">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Jam Buka <span class="required">*</span></label>
                            <input class="form-control" type="time" name="jam_buka" required autocomplete="off">
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Jam Tutup <span class="required">*</span></label>
                            <input class="form-control" type="time" name="jam_tutup" required autocomplete="off">
                        </div>
                    </div>
                    <input type="hidden" name="id_user" value="<?= $_SESSION['id_user'] ?>">

                </div>


                <button type="submit" name="tambah-operasional" class="btn-form">
                    Simpan
                </button>
            </form>

        </div>

    </div>
    <script src="../../../js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>