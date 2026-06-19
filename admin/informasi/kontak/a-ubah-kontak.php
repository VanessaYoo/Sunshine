<?php
require "../../security.php";
require '../../../koneksi.php';


// update
if (isset($_POST["update-kontak"])) {
    $errors = [];
    $id = $_POST['id_kontak'];
    $id_kontak = $_POST["id_kontak"];
    $kontak = htmlspecialchars(trim($_POST["kontak"]));
    $link =  htmlspecialchars(trim($_POST["link"]));

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
        header("Location: /sunshine/admin/informasi/kontak/a-update-kontak.php?id=" . $id_kontak);
        exit;
    }

    //query update data
    $query = "UPDATE kontak SET
          kontak='$kontak',
          link='$link'

          WHERE id_kontak=$id_kontak;
      
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
        document.location.href='a-update-kontak.php?id=$id';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Data gagal diubah');
        document.location.href='a-update-kontak.php?id=$id';
        </script>
        ";
    }
}