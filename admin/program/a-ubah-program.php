
<?php
require "../security.php";
require '../../function.php';

// update
if (isset($_POST["update-program"])) {
    $errors = [];
    $id = $_POST["id_program"];
    $program = htmlspecialchars(trim($_POST["program"]));
    $deskripsi = htmlspecialchars(trim($_POST["deskripsi"]));
    $foto_lama = $_POST["foto_lama"];

    $foto_baru = img('foto', 'program');

    if ($foto_baru) {
        $foto = $foto_baru;
         if (!empty($foto_lama)) {
                hapus_img($foto_lama, 'program');
            }
    } else {
        $foto = $foto_lama;
    }

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
        header("Location: /sunshine/admin/program/a-update-program.php?id=" . $id);
        exit;
    }

    //query update data
    $query = "UPDATE program SET
          program='$program',
          deskripsi='$deskripsi',
          foto='$foto'

          WHERE id_program=$id;
      
    ";
    mysqli_query($conn, $query);
    $hasil = mysqli_affected_rows($conn);

    if ($hasil > 0) {
        echo "
        <script>
      alert('Data berhasil diubah');
      document.location.href='admin-program.php';
        </script>
        ";
    } elseif ($hasil == 0) {
        echo "
        <script>
        alert('Tidak ada perubahan data');
        document.location.href='a-update-program.php?id=$id';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Data gagal diubah');
        document.location.href='a-update-program.php?id=$id';
        </script>
        ";
    }
}
