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
if (isset($_POST["tambah-kontak"])) {

    $errors = [];
    $kontak = htmlspecialchars(trim($_POST["kontak"]));
    $link =  htmlspecialchars(trim($_POST["link"]));
    $id_user = $_POST["id_user"];

    // cek jika belum diisi dan valid
    if ($kontak == '') {
        $errors[] = "Nomor kontak  wajib diisi.";
    }
    if ($link == '') {
        $errors[] = "Link WhatsApp wajib diisi.";
    }
    if (!filter_var($link, FILTER_VALIDATE_URL)) {
        $errors[] = "Format link tidak valid.";
    }
    if (!empty($errors)) { // (cek dulu) -> klo error
        $_SESSION['errors'] = $errors;
        header("Location: /sunshine/admin/informasi/kontak/a-tambah-kontak.php");
        exit;
    }

    //query tambah data
    $query = "INSERT INTO kontak (kontak, link, id_user)  VALUES
          ('$kontak', '$link', '$id_user')";

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
        document.location.href='a-tambah-kontak.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Data gagal ditambah');
        document.location.href='a-tambah-kontak.php';
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
    <title>Tambah Kontak</title>
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
                    <h1>Tambah Kontak</h1>
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

                    <div class="col-md-5">
                        <div class="mb-3">
                            <label class="form-label">Kontak <span class="required">*</span></label>
                            <input class="form-control" type="text" name="kontak" required autocomplete="off" placeholder="Masukkan kontak WhatsApp">
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="mb-3">
                            <label class="form-label">Link WhatsApp <span class="required">*</span></label>
                            <input class="form-control" type="text" name="link" required autocomplete="off" placeholder="Masukkan link WhatsApp">
                            <input type="hidden" name="id_user" value="<?= $_SESSION['id_user'] ?>">
                        </div>
                    </div>


                </div>


                <button type="submit" name="tambah-kontak" class="btn-form">
                    Simpan
                </button>
            </form>

        </div>

    </div>
    <script src="../../../js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>