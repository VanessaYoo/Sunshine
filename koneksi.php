<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "sunshine";
$conn = mysqli_connect($host, $user, $pass, $db); //buat koneksi
if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
