<?php
require "../../security.php";
require '../../../koneksi.php';


// update
if (isset($_POST["update-kelompok"])) {
    $errors = [];
    $id = $_POST["id_kelompok"];
    $kelompok = htmlspecialchars(trim($_POST["kelompok"]));


    // cek jika belum diisi dan valid
    if ($kelompok == '') {
        $errors[] = "Nama kelompok wajib diisi.";
    }
    if (!empty($errors)) { // (cek dulu) -> klo error
        $_SESSION['errors'] = $errors;
        header("Location: /sunshine/admin/jenjang/kelompok/a-update-kelompok.php?id=" . $id);
        exit;
    }

    //query update data
    $query = "UPDATE kelompok SET
          kelompok='$kelompok'

          WHERE id_kelompok=$id;
      
    ";
    mysqli_query($conn, $query);
    $hasil= mysqli_affected_rows($conn);

    if ($hasil > 0) {
        echo "
        <script>
      alert('Data berhasil diubah');
      document.location.href='../admin-jenjang.php';
        </script>
        ";
    } elseif ($hasil == 0) {
        echo "
        <script>
        alert('Tidak ada perubahan data');
        document.location.href='a-update-kelompok.php?id=$id';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Data gagal diubah');
        document.location.href='a-update-kelompok.php?id=$id';
        </script>
        ";
    }
}