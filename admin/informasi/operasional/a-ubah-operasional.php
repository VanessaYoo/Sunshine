<?php
require "../../security.php";
require '../../../function.php';


// update
if (isset($_POST["update-operasional"])) {
    $errors = [];
    
    $id = $_POST['id_operasional'];
    $id_operasional = $_POST["id_operasional"];
    $hari = htmlspecialchars(trim($_POST["hari"]));
    $jam_buka = trim($_POST["jam_buka"]);
    $jam_tutup = trim($_POST["jam_tutup"]);

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
        header("Location: /sunshine/admin/informasi/operasional/a-update-operasional.php?id=" . $id_operasional);
        exit;
    }

    //query update data
    $query = "UPDATE operasional SET
          hari='$hari',
          jam_buka='$jam_buka',
          jam_tutup='$jam_tutup'

          WHERE id_operasional=$id_operasional;
      
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
        document.location.href='a-update-operasional.php?id=$id';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Data gagal diubah');
        document.location.href='../admin-operasional.php';
        </script>
        ";
    }
}