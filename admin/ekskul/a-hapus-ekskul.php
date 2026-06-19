<?php
require "../security.php";
require '../../koneksi.php';
require '../../format_img.php';

if (!isset($_SESSION["login"])) {
    header("Location: ../../login.php");
    exit;
}

$errors = $_SESSION['errors'] ?? [];
unset($_SESSION['errors']);

//hapus
$id = $_GET["id"];
$query_foto = "SELECT foto FROM ekskul WHERE id_ekskul=$id";
$result = mysqli_query($conn, $query_foto);
$data = mysqli_fetch_assoc($result);

hapus_img($data['foto'], 'ekskul');
mysqli_query($conn, "DELETE FROM ekskul WHERE id_ekskul=$id");
$hasil = mysqli_affected_rows($conn);

if ($hasil > 0) {
    echo "<script>alert('Data berhasil dihapus'); 
    document.location.href='admin-ekskul.php';</script>";
} else {
    echo "<script>alert('Data gagal dihapus');
    document.location.href='admin-ekskul.php';</script>";
}
