<?php
require "../security.php";
require '../../format_img.php';
require '../../koneksi.php';

if (!isset($_SESSION["login"])) {
    header("Location: ../../login.php");
    exit;
}

$errors = $_SESSION['errors'] ?? [];
unset($_SESSION['errors']);

//update
if (isset($_POST["update-informasi"])) {
        $profil = htmlspecialchars(trim($_POST["profil"]));
    $lokasi_tertulis = htmlspecialchars(trim($_POST["lokasi_tertulis"]));
    $lokasi_map = htmlspecialchars(trim($_POST["lokasi_map"]));
    $keunggulan = htmlspecialchars(trim($_POST["keunggulan"]));
    $judul_hero = htmlspecialchars(trim($_POST["judul_hero"]));
    $subjudul_hero = htmlspecialchars(trim($_POST["subjudul_hero"]));
    $deskripsi_hero = htmlspecialchars(trim($_POST["deskripsi_hero"]));

    $foto_gedung_lama = $_POST["foto_gedung_lama"];
    $foto_gedung_baru = img('foto_gedung', 'aset');
    if ($foto_gedung_baru) {
        $foto_gedung = $foto_gedung_baru;
    } else {
        $foto_gedung = $foto_gedung_lama;
    }

    $foto_keunggulan_lama = $_POST["foto_keunggulan_lama"];
    $foto_keunggulan_baru = img('foto_keunggulan', 'aset');
    if ($foto_keunggulan_baru) {
        $foto_keunggulan = $foto_keunggulan_baru;
    } else {
        $foto_keunggulan = $foto_keunggulan_lama;
    }

    $foto_hero_lama = $_POST["foto_hero_lama"];
    $foto_hero_baru = img('foto_hero', 'aset');
    if ($foto_hero_baru) {
        $foto_hero = $foto_hero_baru;
    } else {
        $foto_hero = $foto_hero_lama;
    }

    // cek jika belum diisi dan valid
    if (empty($foto_gedung)) {
        $errors[] = "Foto gedung wajib diisi.";
    }
    if (empty($foto_keunggulan)) {
        $errors[] = "Foto keunggulan wajib diisi.";
    }
    if (empty($foto_hero)) {
        $errors[] = "Foto hero wajib diisi.";
    }
    if ($profil == '') {
        $errors[] = "Tentang Sunshine wajib diisi.";
    }
    if ($lokasi_tertulis == '') {
        $errors[] = "Lokasi tertulis wajib diisi.";
    }
    if ($lokasi_map == '') {
        $errors[] = "Lokasi Maps wajib diisi.";
    }
    if ($keunggulan == '') {
        $errors[] = "Keunggulan Sunshine wajib diisi.";
    }
    if ($judul_hero == '') {
        $errors[] = "Judul hero wajib diisi.";
    }
    if ($subjudul_hero == '') {
        $errors[] = "Sub judul hero wajib diisi.";
    }
    if ($deskripsi_hero == '') {
        $errors[] = "Deskripsi hero wajib diisi.";
    }
    if (!filter_var($lokasi_map, FILTER_VALIDATE_URL)) {
        $errors[] = "Format link tidak valid.";
    }

    if (!empty($errors)) { // (cek dulu) -> klo error
        $_SESSION['errors'] = $errors;
        header("Location: /sunshine/admin/informasi/admin-informasi.php");
        exit;
    }

    //query update data

    $affected_rows = 0;
    $query_profil = "UPDATE informasi SET isi_field='$profil' WHERE id=1";
    mysqli_query($conn, $query_profil);
    $affected_rows += mysqli_affected_rows($conn);

    $query_foto_gedung = "UPDATE informasi SET isi_field='$foto_gedung' WHERE id=2";
    mysqli_query($conn, $query_foto_gedung);
    $affected_rows += mysqli_affected_rows($conn);

    $query_lokasi_tertulis = "UPDATE informasi SET isi_field='$lokasi_tertulis' WHERE id=3";
    mysqli_query($conn, $query_lokasi_tertulis);
    $affected_rows += mysqli_affected_rows($conn);

    $query_lokasi_map = "UPDATE informasi SET isi_field='$lokasi_map' WHERE id=4";
    mysqli_query($conn, $query_lokasi_map);
    $affected_rows += mysqli_affected_rows($conn);

    $query_keunggulan = "UPDATE informasi SET isi_field='$keunggulan' WHERE id=5";
    mysqli_query($conn, $query_keunggulan);
    $affected_rows += mysqli_affected_rows($conn);

    $query_foto_keunggulan = "UPDATE informasi SET isi_field='$foto_keunggulan' WHERE id=6";
    mysqli_query($conn, $query_foto_keunggulan);
    $affected_rows += mysqli_affected_rows($conn);

    $query_judul_hero = "UPDATE informasi SET isi_field='$judul_hero' WHERE id=7";
    mysqli_query($conn, $query_judul_hero);
    $affected_rows += mysqli_affected_rows($conn);

    $query_subjudul_hero = "UPDATE informasi SET isi_field='$subjudul_hero' WHERE id=8";
    mysqli_query($conn, $query_subjudul_hero);
    $affected_rows += mysqli_affected_rows($conn);

    $query_deskripsi_hero = "UPDATE informasi SET isi_field='$deskripsi_hero' WHERE id=9";
    mysqli_query($conn, $query_deskripsi_hero);
    $affected_rows += mysqli_affected_rows($conn);

    $query_foto_hero = "UPDATE informasi SET isi_field='$foto_hero' WHERE id=10";
    mysqli_query($conn, $query_foto_hero);
    $affected_rows += mysqli_affected_rows($conn);

    $hasil= $affected_rows;

    if ($hasil > 0) {
        echo "
        <script>
      alert('Data berhasil diubah');
      document.location.href='admin-informasi.php';
        </script>
        ";
    } elseif ($hasil == 0) {
        echo "
        <script>
        alert('Tidak ada perubahan data');
        document.location.href='admin-informasi.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Data gagal diubah');
        document.location.href='admin-informasi.php';
        </script>
        ";
    }
}
