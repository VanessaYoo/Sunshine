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
    $nama = htmlspecialchars(trim(stripslashes($data["nama"] ?? ''))); 
    $email = trim(strtolower(stripslashes($data["email"])) ?? '');
    $pass = md5(trim($data["pass"] ?? ''));
    

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
    $nama = htmlspecialchars(trim(stripslashes($data["nama"] ?? ''))); 
    $email = trim(strtolower(stripslashes($data["email"])) ?? ''); //tidak ada kapital dan '\'
    $pass = trim($data["pass"] ?? '');
    $pass2 = trim($data["pass2"] ?? '');

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

    //enkripsi md5
    $pass_final = md5($pass);

    //tambahkan ke databes
    mysqli_query($conn, "INSERT INTO user VALUES ('', '$email','$pass_final', '$nama')");
    return mysqli_affected_rows($conn);
}

//ubah password admin
function ubahPass($data)
{
    global $conn;
    $errors = [];
    $email = $_SESSION['email'];
    $pass = trim($data["pass"] ?? '');
    $pass2 = trim($data["pass2"] ?? '');

    // cek jika belum diisi dan valid
    if ($pass == '') {
        $errors[] = "Password wajib diisi.";
    }
    if ($pass2 == '') {
        $errors[] = "Konfirmasi password wajib diisi.";
    }

    //cek kesesuaian pass
    if ($pass != $pass2) {
        $errors[] = "Password tidak sama.";
    }

    if (!empty($errors)) { // (cek dulu) -> klo error
        $_SESSION['errors'] = $errors;
        header("Location: ubah-pass.php");
        exit;
    }

    //enkripsi md5
    $pass_final = md5($pass);

    //tambahkan ke databes
  mysqli_query($conn, "UPDATE user SET pass = '$pass_final' WHERE email = '$email'");
    return mysqli_affected_rows($conn);
}

//hapus
function hapus_operasional($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM operasional WHERE id_operasional=$id");
    return mysqli_affected_rows($conn);
}
function hapus_kontak($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM kontak WHERE id_kontak=$id");
    return mysqli_affected_rows($conn);
}
function hapus_medsos($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM medsos WHERE id_medsos=$id");
    return mysqli_affected_rows($conn);
}
function hapus_kelompok($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM kelompok WHERE id_kelompok=$id");
    return mysqli_affected_rows($conn);
}
function hapus_sub_kelompok($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM sub_kelompok WHERE id_sub_kelompok=$id");
    return mysqli_affected_rows($conn);
}
function hapus_program($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM program WHERE id_program=$id");
    return mysqli_affected_rows($conn);
}
function hapus_ekskul($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM ekskul WHERE id_ekskul=$id");
    return mysqli_affected_rows($conn);
}
function hapus_prestasi($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM prestasi WHERE id_prestasi=$id");
    return mysqli_affected_rows($conn);
}

function update_operasional($data)
{
    global $conn;
    $id_operasional = $data["id_operasional"];
    $hari = htmlspecialchars($data["hari"]);
    $jam_buka = htmlspecialchars($data["jam_buka"]);
    $jam_tutup = htmlspecialchars($data["jam_tutup"]);


    //query update data
    $query = "UPDATE operasional SET
          hari='$hari',
          jam_buka='$jam_buka',
          jam_tutup='$jam_tutup'

          WHERE id_operasional=$id_operasional;
      
    ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
function update_kontak($data)
{
    global $conn;
    $id_kontak = $data["id_kontak"];
    $kontak = htmlspecialchars($data["kontak"]);
    $link = htmlspecialchars($data["link"]);


    //query update data
    $query = "UPDATE kontak SET
          kontak='$kontak',
          link='$link'

          WHERE id_kontak=$id_kontak;
      
    ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
function update_medsos($data)
{
    global $conn;
    $id_medsos = $data["id_medsos"];
    $ikon = htmlspecialchars($data["ikon"]);
    $link = htmlspecialchars($data["link"]);


    //query update data
    $query = "UPDATE medsos SET
          ikon='$ikon',
          link='$link'

          WHERE id_medsos=$id_medsos;
      
    ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
function update_kelompok($data)
{
    global $conn;
    $id_kelompok = $data["id_kelompok"];
    $kelompok = htmlspecialchars($data["kelompok"]);


    //query update data
    $query = "UPDATE kelompok SET
          kelompok='$kelompok'

          WHERE id_kelompok=$id_kelompok;
      
    ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
function update_sub_kelompok($data)
{
    global $conn;
    $id_sub_kelompok = $data["id_sub_kelompok"];
    $sub_kelompok = htmlspecialchars($data["sub_kelompok"]);
    $tahun = htmlspecialchars($data["tahun"]);
    $ikon = htmlspecialchars($data["ikon"]);
    $id_kelompok = htmlspecialchars($data["id_kelompok"]);


    //query update data
    $query = "UPDATE sub_kelompok SET
          sub_kelompok='$sub_kelompok',
          tahun='$tahun',
          ikon='$ikon',
          id_kelompok='$id_kelompok'

          WHERE id_sub_kelompok=$id_sub_kelompok;
      
    ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
function update_program($data)
{
    global $conn;
    $id_program = $data["id_program"];
    $program = htmlspecialchars($data["program"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);
    $foto = htmlspecialchars($data["foto"]);


    //query update data
    $query = "UPDATE program SET
          program='$program',
          deskripsi='$deskripsi',
          foto='$foto'

          WHERE id_program=$id_program;
      
    ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
function update_ekskul($data)
{
    global $conn;
    $id_ekskul = $data["id_ekskul"];
    $ekskul = htmlspecialchars($data["ekskul"]);
    $foto = htmlspecialchars($data["foto"]);


    //query update data
    $query = "UPDATE ekskul SET
          ekskul='$ekskul',
          foto='$foto'

          WHERE id_ekskul=$id_ekskul;
      
    ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
function update_prestasi($data)
{
    global $conn;
    $id_prestasi = $data["id_prestasi"];
    $prestasi = htmlspecialchars($data["prestasi"]);
    $tanggal = trim($data["tanggal"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);
    $foto = htmlspecialchars($data["foto"]);

    //query update data
    $query = "UPDATE prestasi SET
          prestasi='$prestasi',
          tanggal='$tanggal'
          deskripsi='$deskripsi',
          foto='$foto'

          WHERE id_prestasi=$id_prestasi;
      
    ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
