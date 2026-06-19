<?php
require "../security.php";
require '../../koneksi.php';
require '../../format_img.php';

// update
if (isset($_POST["update-prestasi"])) {
       $errors = [];
    $id = $_POST["id_prestasi"];
    $prestasi = htmlspecialchars(trim($_POST["prestasi"]));
    $tanggal = trim($_POST["tanggal"]);
    $deskripsi = htmlspecialchars(trim($_POST["deskripsi"]));
    $foto_lama = $_POST["foto_lama"];
    $foto_baru = img('foto', 'prestasi');

    if ($foto_baru) {
        $foto = $foto_baru;
         if (!empty($foto_lama)) {
                hapus_img($foto_lama, 'prestasi');
            }
    } else {
        $foto = $foto_lama;
    }

    // cek jika belum diisi dan valid
    if (empty($foto)) {
        $errors[] = "Foto wajib diisi.";
    }
    if ($prestasi == '') {
        $errors[] = "Judul prestasi wajib diisi.";
    }
    if ($tanggal == '') {
        $errors[] = "Tanggal prestasi wajib diisi.";
    }
    if ($deskripsi == '') {
        $errors[] = "Deskripsi wajib diisi.";
    }
    if (!empty($errors)) { // (cek dulu) -> klo error
        $_SESSION['errors'] = $errors;
        header("Location: /sunshine/admin/prestasi/a-update-prestasi.php?id=" . $id);
        exit;
    }

    //query update data
    $query = "UPDATE prestasi SET
          prestasi='$prestasi',
          tanggal='$tanggal',
          deskripsi='$deskripsi',
          foto='$foto'

          WHERE id_prestasi=$id;
      
    ";
    mysqli_query($conn, $query);
    $hasil= mysqli_affected_rows($conn);

    if ($hasil > 0) {
        echo "
        <script>
      alert('Data berhasil diubah');
      document.location.href='admin-prestasi.php';
        </script>
        ";
    } elseif ($hasil == 0) {
        echo "
        <script>
        alert('Tidak ada perubahan data');
        document.location.href='a-update-prestasi.php?id=$id';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Data gagal diubah');
        document.location.href='a-update-prestasi.php?id=$id';
        </script>
        ";
    }
}