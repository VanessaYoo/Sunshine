<?php
$conn = mysqli_connect("localhost", "root", "", "sunshine");
if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

//ambil data
function query($query)
{
    global $conn; //ambil variabel diluar function
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


//login
function login($data)
{
    global $conn;
    $errors = [];
    $email = trim($data["email"] ?? '');
    $pass = trim($data["pass"] ?? '');

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
        //cek password yang acak
        if (password_verify($pass, $row["pass"])) {
            $_SESSION['id_user'] = $row["id_user"];
            $_SESSION["login"] = true;

            //cek admin
            if ($row["email"] === "admin@gmail.com" && $pass === "admin") {
                $_SESSION["admin"] = true;
                echo "<script>alert('Berhasil login sebagai Admin Sunshine!'); document.location.href = 'admin-home.php';</script>";
            } else {
                // Jika bukan admin
                echo "<script>alert('Berhasil login ke Sunshine!');document.location.href = 'user-home.php';</script>";
            }
        } else {
            $errors[] = "Email atau passwordmu salah. ";
        }
    }
    if (!empty($errors)) { // (cek dulu) -> klo error di frm pendaftaran
        $_SESSION['errors'] = $errors;
        header("Location: login.php");
        exit;
    }
}

//register
function register($data)
{
    global $conn;
    $errors = [];
    $email = trim(strtolower(stripslashes($data["email"])) ?? ''); //tidak ada kapital dan '\'
    $pass = trim(mysqli_real_escape_string($conn, $data["pass"]) ?? ''); //cegah hack dan tambah '\' di karakter yang mungkin bahaya
    $pass2 = trim(mysqli_real_escape_string($conn, $data["pass2"]) ?? '');

    // cek jika belum diisi dan valid
    if ($email == '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) { //harus menggunakan formal nama + @gmail.com
        $errors[] = "Email tidak valid.";
    }
    if ($pass == '') {
        $errors[] = "Password wajib diisi.";
    }
    if ($pass2 == '') {
        $errors[] = "Konfirmasi password wajib diisi.";
    }

    //cek user ada atau tidak
    $result = mysqli_query($conn, "SELECT email FROM user WHERE email='$email'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>alert('Akun ini sudah pernah dibuat.');</script>";
        return false;
    }
    //cek kesesuaian pass
    if ($pass != $pass2) {
        $errors[] = "Password tidak sama.";
    }

    if (!empty($errors)) { // (cek dulu) -> klo error di frm pendaftaran
        $_SESSION['errors'] = $errors;
        header("Location: register.php");
        exit;
    }
    //hash atau enkripsi pass
    $pass = password_hash($pass, PASSWORD_DEFAULT);

    //tambahkan ke databes
    mysqli_query($conn, "INSERT INTO user VALUES ('', '$email','$pass')");
    return mysqli_affected_rows($conn);
}
