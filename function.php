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
    $email = $data["email"];
    $pass = $data["pass"];
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
        }
    } else {
        echo "<script>alert('Email atau passwordmu salah. Silahkan coba lagi.'); document.location.href = 'login.php';</script>
    ";
    }
}

//register
function register($data)
{
    global $conn;
    $email = strtolower(stripslashes($data["email"])); //tidak ada kapital dan '\'
    $pass = mysqli_real_escape_string($conn, $data["pass"]); //cegah hack dan tambah '\' di karakter yang mungkin bahaya
    $pass2 = mysqli_real_escape_string($conn, $data["pass2"]);

    //cek user ada atau tidak
    $result = mysqli_query($conn, "SELECT email FROM user WHERE email='$email'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>alert('Akun ini sudah pernah dibuat.');</script>";
        return false;
    }
    //cek kesesuaian pass
    if ($pass != $pass2) {
        echo "<script>alert('Password yang dimasukkan tidak sama!');</script>";
        return false;
    }

    //hash atau enkripsi pass
    $pass = password_hash($pass, PASSWORD_DEFAULT);

    //tambahkan ke databes
    mysqli_query($conn, "INSERT INTO user VALUES ('', '$email','$pass')");
    return mysqli_affected_rows($conn);
}
