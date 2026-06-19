<?php
require "../../security.php";
require '../../../koneksi.php';

if (!isset($_SESSION["login"])) {
    header("Location: ../../login.php");
    exit;
}

$errors = $_SESSION['errors'] ?? [];
unset($_SESSION['errors']);

// tambah
if (isset($_POST["tambah-medsos"])) {
     $errors = [];
    $link = htmlspecialchars(trim($_POST["link"]));
    $ikon = htmlspecialchars(trim($_POST["ikon"]));
    $id_user = $_POST["id_user"];

    // cek jika belum diisi dan valid
    if ($ikon == '') {
        $errors[] = "Ikon wajib diisi.";
    }
    if ($link == '') {
        $errors[] = "Link media sosial wajib diisi.";
    }
    if (!filter_var($link, FILTER_VALIDATE_URL)) {
        $errors[] = "Format link tidak valid.";
    }
    if (!empty($errors)) { // (cek dulu) -> klo error
        $_SESSION['errors'] = $errors;
        header("Location: /sunshine/admin/informasi/medsos/a-tambah-medsos.php");
        exit;
    }

    //query tambah data
    $query = "INSERT INTO medsos (ikon, link, id_user) VALUES
          ('$ikon', '$link','$id_user')";

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
        document.location.href='a-tambah-medsos.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Data gagal ditambah');
        document.location.href='a-tambah-medsos.php';
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
    <title>Tambah Media Sosial</title>
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
                    <h1>Tambah Media Sosial</h1>
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

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Link Media Sosial <span class="required">*</span></label>
                            <input class="form-control" type="text" name="link" required autocomplete="off" placeholder="Masukkan link media sosial">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Ikon <span class="required">*</span></label>
                            <input class="form-control" type="text" name="ikon" required autocomplete="off" placeholder="Masukkan ikon Font Awesome">
                            <input type="hidden" name="id_user" value="<?= $_SESSION['id_user'] ?>">
                        </div>
                    </div>

                </div>


                <button type="submit" name="tambah-medsos" class="btn-form">
                    Simpan
                </button>
            </form>

        </div>

    </div>
    <script src="../../../js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>