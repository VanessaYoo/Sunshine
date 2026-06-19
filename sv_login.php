<?php
session_start();
require 'koneksi.php';

$errors = [];
$email = htmlspecialchars(trim(strtolower($_POST["email"])) ?? '');
$pass = md5(trim($_POST["pass"] ?? ''));


// cek jika belum diisi dan valid
if ($email == '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) { //harus menggunakan formal nama + @gmail.com
    $errors[] = "Email tidak valid.";
}

if ($pass == '') {
    $errors[] = "Password wajib diisi.";
}

$result = mysqli_query($conn, "SELECT * FROM user WHERE email='$email'"); //password tidak perlu karena diacak

//cek username
if (mysqli_num_rows($result) === 1) { //ketemu 1

    $row = mysqli_fetch_assoc($result);

    //cek password
    if ($pass === $row['pass']) {
        $_SESSION['id_user'] = $row["id_user"];
        $_SESSION['nama'] = $row["nama"];
        $_SESSION['email'] = $row["email"];
        $_SESSION["login"] = true;

        echo "<script>alert('Berhasil login sebagai Admin Sunshine!'); document.location.href = 'admin/admin-beranda.php';</script>";
        exit;
    } else {
        $errors[] = "Email atau passwordmu salah. ";
    }
} else {
    $errors[] = "Email atau passwordmu salah. ";
}
if (!empty($errors)) { // (cek dulu) -> klo error di frm pendaftaran
    $_SESSION['errors'] = $errors;
    header("Location: login.php");
    exit;
}
