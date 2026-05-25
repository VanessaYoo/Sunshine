<?php
session_start();
require 'function.php';

if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <link
        href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&family=Playpen+Sans:wght@100..800&display=swap"
        rel="stylesheet" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer" />
</head>

<body>
    <div class="sidebar">
        <div class="logo-bar">
            <img src="img/aset/logo.png" alt="">
            <h1>Sunshine</h1>
        </div>
        <ul class="menu">
            <li class="active">
                <a href="user-home.php" class="active">
                    <i class="fa-solid fa-cake-candles"></i>
                    <span>Home</span>
                </a>
            </li>
            <li>
                <a href="user-pendaftaran.php">
                    <i class="fa-solid fa-file-lines"></i>
                    <span>Pendaftaran</span>
                </a>
            </li>
            <li>
                <a href="user-biaya.php">
                    <i class="fa-solid fa-money-bill-wave"></i>
                    <span>Biaya</span>
                </a>
            </li>
            <li>
                <a href="status.php">
                    <i class="fa-solid fa-hourglass-half"></i>
                    <span>Status</span>
                </a>
            </li>
            <li class="logout-bar">
                <a href="logout.php" onclick="return confirm('Apakah Anda yakin untuk logout dari Sunshine?');">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </div>


</body>

</html>