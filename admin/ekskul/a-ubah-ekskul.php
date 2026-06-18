
<?php
require "../security.php";
require '../../function.php';

// update
if (isset($_POST["update-ekskul"])) {
     $errors = [];
    $id = $_POST["id_ekskul"];
    $ekskul = htmlspecialchars(trim($_POST["ekskul"]));
    $foto_lama = $_POST["foto_lama"];
    $foto_baru = img('foto', 'ekskul');

    if ($foto_baru) {
        $foto = $foto_baru;
         if (!empty($foto_lama)) {
                hapus_img($foto_lama, 'ekskul');
            }
    } else {
        $foto = $foto_lama;
    }

    // cek jika belum diisi dan valid
    if (empty($foto)) {
        $errors[] = "Foto wajib diisi.";
    }
    if ($ekskul == '') {
        $errors[] = "Nama ekstrakurikuler wajib diisi.";
    }
    if (!empty($errors)) { // (cek dulu) -> klo error
        $_SESSION['errors'] = $errors;
        header("Location: /sunshine/admin/ekskul/a-update-ekskul.php?id=" . $id);
        exit;
    }

    //query update data
    $query = "UPDATE ekskul SET
          ekskul='$ekskul',
          foto='$foto'

          WHERE id_ekskul=$id;
      
    ";
    mysqli_query($conn, $query);
    $hasil= mysqli_affected_rows($conn);

    if ($hasil > 0) {
        echo "
        <script>
      alert('Data berhasil diubah');
      document.location.href='admin-ekskul.php';
        </script>
        ";
    } elseif ($hasil == 0) {
        echo "
        <script>
        alert('Tidak ada perubahan data');
        document.location.href='a-update-ekskul.php?id=$id';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Data gagal diubah');
        document.location.href='a-update-ekskul.php?id=$id';
        </script>
        ";
    }
}