<?php
require "../../security.php";
require '../../../function.php';

if (!isset($_SESSION["login"])) {
    header("Location: ../../login.php");
    exit;
}

$errors = $_SESSION['errors'] ?? [];
unset($_SESSION['errors']);

//hapus
$id = $_GET["id"];

mysqli_query($conn, "DELETE FROM operasional WHERE id_operasional=$id");
$hasil = mysqli_affected_rows($conn);

if ($hasil > 0) {
    echo "<script>alert('Data berhasil dihapus'); 
        document.location.href='../admin-informasi.php';</script>";
} else {
    echo "<script>alert('Data gagal dihapus');
        document.location.href='../admin-informasi.php'</script>";
}
