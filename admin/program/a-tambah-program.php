<?php
require "../security.php";
require '../../koneksi.php';
require '../../format_img.php';

if (!isset($_SESSION["login"])) {
    header("Location: ../login.php");
    exit;
}

$errors = $_SESSION['errors'] ?? [];
unset($_SESSION['errors']);

// tambah
if (isset($_POST["tambah-program"])) {
    $errors = [];
    $program = htmlspecialchars(trim($_POST["program"]));
    $deskripsi = htmlspecialchars(trim($_POST["deskripsi"]));
    $foto = img('foto', 'program');
    $id_user = $_POST["id_user"];

    // cek jika belum diisi dan valid
    if (empty($foto)) {
        $errors[] = "Foto wajib diisi.";
    }
    if ($program == '') {
        $errors[] = "Nama program wajib diisi.";
    }
    if ($deskripsi == '') {
        $errors[] = "Deskripsi wajib diisi.";
    }
    if (!empty($errors)) { // (cek dulu) -> klo error
        $_SESSION['errors'] = $errors;
        header("Location: /sunshine/admin/program/a-tambah-program.php");
        exit;
    }

    //query tambah data
    $query = "INSERT INTO program (program, deskripsi, foto, id_user) VALUES
          ('$program', '$deskripsi', '$foto', '$id_user')";

    mysqli_query($conn, $query);
    $hasil= mysqli_affected_rows($conn);

   if ($hasil > 0) {
        echo "
        <script>
      alert('Data berhasil ditambah');
      document.location.href='admin-program.php';
        </script>
        ";
    } elseif ($hasil == 0) {
        echo "
        <script>
        alert('Tidak ada data yang ditambahkan');
        document.location.href='a-tambah-program.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Data gagal ditambah');
        document.location.href='a-tambah-program.php';
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
    <title>Tambah Program</title>
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

            <form action="" method="POST" class="form-card" enctype="multipart/form-data">

                <div class="back kembali mt-2">
                    <button onclick="window.location.href='admin-program.php'" class="back-arrow" type="button">
                        <i class="fas fa-angle-left"></i>
                        <p class="orange bold">Kembali</p>
                    </button>
                </div>

                <div class="form-title">
                    <h1>Tambah Program</h1>
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
                            <label class="form-label">Program <span class="required">*</span></label>
                            <input class="form-control" type="text" name="program" required autocomplete="off" placeholder="Masukkan program">
                        </div>
                    </div>
   

                    <div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label">Deskripsi <span class="required">*</span></label>
                                <textarea class="form-control" name="deskripsi" required autocomplete="off" placeholder="Masukkan deskripsi program"></textarea>
                            </div>
                        </div>
                    </div>

                     <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Foto <span class="required">*</span></label>
                            <input class="form-control"
                                type="file"
                                name="foto" required>
                                <p style="font-size:0.9rem;" class="mt-2">Format: .png, .jpg, .jpeg, .webp</p>
                        </div>
                    </div>

                    <input type="hidden" name="id_user" value="<?= $_SESSION['id_user'] ?>">

                </div>

                <button type="submit" name="tambah-program" class="btn-form">
                    Simpan
                </button>
            </form>

        </div>

    </div>
    <script src="../../js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>