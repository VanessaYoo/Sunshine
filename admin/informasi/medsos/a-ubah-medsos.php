<?php
require "../../security.php";
require '../../../koneksi.php';


// update
if (isset($_POST["update-medsos"])) {
    $errors = [];
    $id = $_POST['id_medsos'];
    $id_medsos = $_POST["id_medsos"];
    $link = htmlspecialchars(trim($_POST["link"]));
    $ikon = htmlspecialchars(trim($_POST["ikon"]));

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
        header("Location: /sunshine/admin/informasi/medsos/a-update-medsos.php?id=" . $id_medsos);
        exit;
    }

    //query update data
    $query = "UPDATE medsos SET
          ikon='$ikon',
          link='$link'

          WHERE id_medsos=$id_medsos;
    ";
    mysqli_query($conn, $query);
    $hasil= mysqli_affected_rows($conn);
    if ($hasil > 0) {
        echo "
        <script>
      alert('Data berhasil diubah');
      document.location.href='../admin-informasi.php';
        </script>
        ";
    } elseif ($hasil == 0) {
        echo "
        <script>
        alert('Tidak ada perubahan data');
        document.location.href='a-update-medsos.php?id=$id';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Data gagal diubah');
       document.location.href='a-update-medsos.php?id=$id';
        </script>
        ";
    }
}