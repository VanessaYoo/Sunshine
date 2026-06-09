<?php
session_start();
$email = $_SESSION['email'];

if ($email == "") {
    header("Location: /Sunshine/login.php");
    exit;
}
