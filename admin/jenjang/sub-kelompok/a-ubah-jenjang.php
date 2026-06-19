<?php
require "../../security.php";
require '../../../koneksi.php';


// update
if (isset($_POST["update-sub-kelompok"])) {
    $errors = [];
    $id = $_POST["id_sub_kelompok"];
    $sub_kelompok = htmlspecialchars(trim($_POST["sub_kelompok"]));
    $tahun = htmlspecialchars(trim($_POST["tahun"]));
    $id_kelompok = $_POST["id_kelompok"];
    $ikon = htmlspecialchars(trim($_POST["ikon"]));

    // cek jika belum diisi dan valid
    if ($ikon == '') {
        $errors[] = "Ikon wajib diisi.";
    }
    if ($sub_kelompok == '') {
        $errors[] = "Nama sub kelompok wajib diisi.";
    }
    if ($tahun == '') {
        $errors[] = "Usia tahun wajib diisi.";
    }
    if (!empty($errors)) { // (cek dulu) -> klo error
        $_SESSION['errors'] = $errors;
        header("Location: /sunshine/admin/jenjang/sub-kelompok/a-update-jenjang.php?id=" . $id);
        exit;
    }

    //query update data
    $query = "UPDATE sub_kelompok SET
          sub_kelompok='$sub_kelompok',
          tahun='$tahun',
          ikon='$ikon',
          id_kelompok='$id_kelompok'

          WHERE id_sub_kelompok=$id;
      
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
       document.location.href='a-update-jenjang.php?id=$id';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Data gagal diubah');
       document.location.href='a-update-jenjang.php?id=$id';
        </script>
        ";
    }
}