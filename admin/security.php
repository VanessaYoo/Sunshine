<?php
session_start();
$nama = $_SESSION['nama'];

if ($nama == "") {
    header("Location: /Sunshine/login.php");
    exit;
}
