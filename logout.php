<?php
session_start();
if (!isset($_SESSION["login"])) { //logout hanya bisa diakses jika sudah login
  header("Location: login.php");
  exit;
}

session_start();
$_SESSION = []; //kosongkan array
session_unset(); //hapus variabel session
session_destroy(); //hapus/hancurkan session

header("Location: index.php");
exit;
