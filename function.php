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
    $email = htmlspecialchars(trim(strtolower($data["email"])) ?? '');
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
    $nama = htmlspecialchars(trim($data["nama"] ?? ''));
    $email = htmlspecialchars(trim(strtolower($data["email"])) ?? '');
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

//format img
function img($name, $folder)
{
    $namaFile = $_FILES[$name]['name'];
    $error = $_FILES[$name]['error'];
    $tmpName = $_FILES[$name]['tmp_name'];

    //cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
        $errors[] = "Tidak ada file yang diunggah.";
        return false;
    }

    //cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png', 'webp'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        $errors[] = "File yang diunggah tidak valid..";
        return false;
    }
    $namaFileBaru = uniqid() . '.' . $ekstensiGambar;
    $folderTujuan = __DIR__ . '/img/' . $folder . '/' . $namaFileBaru;
    if (move_uploaded_file($tmpName, $folderTujuan)) {
        return $namaFileBaru;
    }
    return $namaFileBaru;
}
function hapus_img($nama_file, $folder)
{
    $path = __DIR__ . '/img/' . $folder . '/' . $nama_file;
    if (file_exists($path)) {
        unlink($path);
    }
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
    $query_foto = "SELECT foto FROM program WHERE id_program=$id";
    $result = mysqli_query($conn, $query_foto);
    $data = mysqli_fetch_assoc($result);

    hapus_img($data['foto'], 'program');
    mysqli_query($conn, "DELETE FROM program WHERE id_program=$id");
    return mysqli_affected_rows($conn);
}
function hapus_ekskul($id)
{
    global $conn;
    $query_foto = "SELECT foto FROM ekskul WHERE id_ekskul=$id";
    $result = mysqli_query($conn, $query_foto);
    $data = mysqli_fetch_assoc($result);

    hapus_img($data['foto'], 'ekskul');
    mysqli_query($conn, "DELETE FROM ekskul WHERE id_ekskul=$id");
    return mysqli_affected_rows($conn);
}
function hapus_prestasi($id)
{
    global $conn;
    $query_foto = "SELECT foto FROM prestasi WHERE id_prestasi=$id";
    $result = mysqli_query($conn, $query_foto);
    $data = mysqli_fetch_assoc($result);

    hapus_img($data['foto'], 'prestasi');
    mysqli_query($conn, "DELETE FROM prestasi WHERE id_prestasi=$id");
    return mysqli_affected_rows($conn);
}

//update
function update_informasi($data)
{
    global $conn;
    $profil = htmlspecialchars(trim($data["profil"]));
    $lokasi_tertulis = htmlspecialchars(trim($data["lokasi_tertulis"]));
    $lokasi_map = htmlspecialchars(trim($data["lokasi_map"]));
    $keunggulan = htmlspecialchars(trim($data["keunggulan"]));
    $judul_hero = htmlspecialchars(trim($data["judul_hero"]));
    $subjudul_hero = htmlspecialchars(trim($data["subjudul_hero"]));
    $deskripsi_hero = htmlspecialchars(trim($data["deskripsi_hero"]));

    $foto_gedung_lama = $data["foto_gedung_lama"];
    $foto_gedung_baru = img('foto_gedung', 'aset');
    if ($foto_gedung_baru) {
        $foto_gedung = $foto_gedung_baru;
    } else {
        $foto_gedung = $foto_gedung_lama;
    }

    $foto_keunggulan_lama = $data["foto_keunggulan_lama"];
    $foto_keunggulan_baru = img('foto_keunggulan', 'aset');
    if ($foto_keunggulan_baru) {
        $foto_keunggulan = $foto_keunggulan_baru;
    } else {
        $foto_keunggulan = $foto_keunggulan_lama;
    }

    $foto_hero_lama = $data["foto_hero_lama"];
    $foto_hero_baru = img('foto_hero', 'aset');
    if ($foto_hero_baru) {
        $foto_hero = $foto_hero_baru;
    } else {
        $foto_hero = $foto_hero_lama;
    }

    // cek jika belum diisi dan valid
    if (empty($foto_gedung)) {
        $errors[] = "Foto gedung wajib diisi.";
    }
    if (empty($foto_keunggulan)) {
        $errors[] = "Foto keunggulan wajib diisi.";
    }
    if (empty($foto_hero)) {
        $errors[] = "Foto hero wajib diisi.";
    }
    if ($profil == '') {
        $errors[] = "Tentang Sunshine wajib diisi.";
    }
    if ($lokasi_tertulis == '') {
        $errors[] = "Lokasi tertulis wajib diisi.";
    }
    if ($lokasi_map == '') {
        $errors[] = "Lokasi Maps wajib diisi.";
    }
    if ($keunggulan == '') {
        $errors[] = "Keunggulan Sunshine wajib diisi.";
    }
    if ($judul_hero == '') {
        $errors[] = "Judul hero wajib diisi.";
    }
    if ($subjudul_hero == '') {
        $errors[] = "Sub judul hero wajib diisi.";
    }
    if ($deskripsi_hero == '') {
        $errors[] = "Deskripsi hero wajib diisi.";
    }
    if (!filter_var($lokasi_map, FILTER_VALIDATE_URL)) {
        $errors[] = "Format link tidak valid.";
    }

    if (!empty($errors)) { // (cek dulu) -> klo error
        $_SESSION['errors'] = $errors;
        header("Location: /sunshine/admin/informasi/admin-informasi.php");
        exit;
    }

    //query update data

    $affected_rows = 0;
    $query_profil = "UPDATE informasi SET isi_field='$profil' WHERE id=1";
    mysqli_query($conn, $query_profil);
    $affected_rows += mysqli_affected_rows($conn);

    $query_foto_gedung = "UPDATE informasi SET isi_field='$foto_gedung' WHERE id=2";
    mysqli_query($conn, $query_foto_gedung);
    $affected_rows += mysqli_affected_rows($conn);

    $query_lokasi_tertulis = "UPDATE informasi SET isi_field='$lokasi_tertulis' WHERE id=3";
    mysqli_query($conn, $query_lokasi_tertulis);
    $affected_rows += mysqli_affected_rows($conn);

    $query_lokasi_map = "UPDATE informasi SET isi_field='$lokasi_map' WHERE id=4";
    mysqli_query($conn, $query_lokasi_map);
    $affected_rows += mysqli_affected_rows($conn);

    $query_keunggulan = "UPDATE informasi SET isi_field='$keunggulan' WHERE id=5";
    mysqli_query($conn, $query_keunggulan);
    $affected_rows += mysqli_affected_rows($conn);

    $query_foto_keunggulan = "UPDATE informasi SET isi_field='$foto_keunggulan' WHERE id=6";
    mysqli_query($conn, $query_foto_keunggulan);
    $affected_rows += mysqli_affected_rows($conn);

    $query_judul_hero = "UPDATE informasi SET isi_field='$judul_hero' WHERE id=7";
    mysqli_query($conn, $query_judul_hero);
    $affected_rows += mysqli_affected_rows($conn);

    $query_subjudul_hero = "UPDATE informasi SET isi_field='$subjudul_hero' WHERE id=8";
    mysqli_query($conn, $query_subjudul_hero);
    $affected_rows += mysqli_affected_rows($conn);

    $query_deskripsi_hero = "UPDATE informasi SET isi_field='$deskripsi_hero' WHERE id=9";
    mysqli_query($conn, $query_deskripsi_hero);
    $affected_rows += mysqli_affected_rows($conn);

    $query_foto_hero = "UPDATE informasi SET isi_field='$foto_hero' WHERE id=10";
    mysqli_query($conn, $query_foto_hero);
    $affected_rows += mysqli_affected_rows($conn);

    return $affected_rows;
}
function update_operasional($data)
{
    global $conn;
    $errors = [];
    $id_operasional = $data["id_operasional"];
    $hari = htmlspecialchars(trim($data["hari"]));
    $jam_buka = trim($data["jam_buka"]);
    $jam_tutup = trim($data["jam_tutup"]);

    // cek jika belum diisi dan valid
    if ($hari == '') {
        $errors[] = "Hari wajib diisi.";
    }
    if ($jam_buka == '') {
        $errors[] = "Jam buka wajib diisi.";
    }
    if ($jam_tutup == '') {
        $errors[] = "Jam tutup wajib diisi.";
    }
    if (!empty($errors)) { // (cek dulu) -> klo error
        $_SESSION['errors'] = $errors;
        header("Location: /sunshine/admin/informasi/operasional/a-update-operasional.php?id=" . $id_operasional);
        exit;
    }

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
    $errors = [];
    $id_kontak = $data["id_kontak"];
    $kontak = htmlspecialchars(trim($data["kontak"]));
    $link =  htmlspecialchars(trim($data["link"]));

    // cek jika belum diisi dan valid
    if ($kontak == '') {
        $errors[] = "Nomor kontak  wajib diisi.";
    }
    if ($link == '') {
        $errors[] = "Link WhatsApp wajib diisi.";
    }
    if (!filter_var($link, FILTER_VALIDATE_URL)) {
        $errors[] = "Format link tidak valid.";
    }
    if (!empty($errors)) { // (cek dulu) -> klo error
        $_SESSION['errors'] = $errors;
        header("Location: /sunshine/admin/informasi/kontak/a-update-kontak.php?id=" . $id_kontak);
        exit;
    }

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
    $errors = [];
    $id_medsos = $data["id_medsos"];
    $link = htmlspecialchars(trim($data["link"]));
    $ikon = htmlspecialchars(trim($data["ikon"]));

    // cek jika belum diisi dan valid
    if ($ikon == '') {
        $errors[] = "Ikon wajib diisi.";
    }
    if ($link == '') {
        $errors[] = "Link media sosial wajib diisi.";
    }
    if (!filter_var($link, FILTER_VALIDATE_URL)) {
        $errors[] = "Format link tidak valid.";
    }
    if (!empty($errors)) { // (cek dulu) -> klo error
        $_SESSION['errors'] = $errors;
        header("Location: /sunshine/admin/informasi/medsos/a-update-medsos.php?id=" . $id_medsos);
        exit;
    }

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
    $errors = [];
    $id_kelompok = $data["id_kelompok"];
    $kelompok = htmlspecialchars(trim($data["kelompok"]));


    // cek jika belum diisi dan valid
    if ($kelompok == '') {
        $errors[] = "Nama kelompok wajib diisi.";
    }
    if (!empty($errors)) { // (cek dulu) -> klo error
        $_SESSION['errors'] = $errors;
        header("Location: /sunshine/admin/jenjang/kelompok/a-update-kelompok.php?id=" . $id_kelompok);
        exit;
    }

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
    $errors = [];
    $id_sub_kelompok = $data["id_sub_kelompok"];
    $sub_kelompok = htmlspecialchars(trim($data["sub_kelompok"]));
    $tahun = htmlspecialchars(trim($data["tahun"]));
    $id_kelompok = $data["id_kelompok"];
    $ikon = htmlspecialchars(trim($data["ikon"]));

    // cek jika belum diisi dan valid
    if ($ikon == '') {
        $errors[] = "Ikon wajib diisi.";
    }
    if ($sub_kelompok == '') {
        $errors[] = "Nama sub kelompok wajib diisi.";
    }
    if ($tahun == '') {
        $errors[] = "Usia tahun wajib diisi.";
    }
    if (!empty($errors)) { // (cek dulu) -> klo error
        $_SESSION['errors'] = $errors;
        header("Location: /sunshine/admin/jenjang/sub-kelompok/a-update-jenjang.php?id=" . $id_sub_kelompok);
        exit;
    }

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
    $errors = [];
    $id_program = $data["id_program"];
    $program = htmlspecialchars(trim($data["program"]));
    $deskripsi = htmlspecialchars(trim($data["deskripsi"]));
    $foto_lama = $data["foto_lama"];
    $foto_baru = img('foto', 'program');

    if ($foto_baru) {
        $foto = $foto_baru;
    } else {
        $foto = $foto_lama;
    }

    // cek jika belum diisi dan valid
    if (empty($foto)) {
        $errors[] = "Foto wajib diisi.";
    }
    if ($program == '') {
        $errors[] = "Nama program wajib diisi.";
    }
    if ($deskripsi == '') {
        $errors[] = "Deskripsi wajib diisi.";
    }
    if (!empty($errors)) { // (cek dulu) -> klo error
        $_SESSION['errors'] = $errors;
        header("Location: /sunshine/admin/program/a-update-program.php?id=" . $id_program);
        exit;
    }

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
    $errors = [];
    $id_ekskul = $data["id_ekskul"];
    $ekskul = htmlspecialchars(trim($data["ekskul"]));
    $foto_lama = $data["foto_lama"];
    $foto_baru = img('foto', 'ekskul');

    if ($foto_baru) {
        $foto = $foto_baru;
    } else {
        $foto = $foto_lama;
    }

    // cek jika belum diisi dan valid
    if (empty($foto)) {
        $errors[] = "Foto wajib diisi.";
    }
    if ($ekskul == '') {
        $errors[] = "Nama ekstrakurikuler wajib diisi.";
    }
    if (!empty($errors)) { // (cek dulu) -> klo error
        $_SESSION['errors'] = $errors;
        header("Location: /sunshine/admin/ekskul/a-update-ekskul.php?id=" . $id_ekskul);
        exit;
    }

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
    $errors = [];
    $id_prestasi = $data["id_prestasi"];
    $prestasi = htmlspecialchars(trim($data["prestasi"]));
    $tanggal = trim($data["tanggal"]);
    $deskripsi = htmlspecialchars(trim($data["deskripsi"]));
    $foto_lama = $data["foto_lama"];
    $foto_baru = img('foto', 'prestasi');

    if ($foto_baru) {
        $foto = $foto_baru;
    } else {
        $foto = $foto_lama;
    }

    // cek jika belum diisi dan valid
    if (empty($foto)) {
        $errors[] = "Foto wajib diisi.";
    }
    if ($prestasi == '') {
        $errors[] = "Judul prestasi wajib diisi.";
    }
    if ($tanggal == '') {
        $errors[] = "Tanggal prestasi wajib diisi.";
    }
    if ($deskripsi == '') {
        $errors[] = "Deskripsi wajib diisi.";
    }
    if (!empty($errors)) { // (cek dulu) -> klo error
        $_SESSION['errors'] = $errors;
        header("Location: /sunshine/admin/prestasi/a-update-prestasi.php?id=" . $id_prestasi);
        exit;
    }

    //query update data
    $query = "UPDATE prestasi SET
          prestasi='$prestasi',
          tanggal='$tanggal',
          deskripsi='$deskripsi',
          foto='$foto'

          WHERE id_prestasi=$id_prestasi;
      
    ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

//tambah 
function tambah_operasional($data)
{
    global $conn;
    $errors = [];
    $hari = htmlspecialchars(trim($data["hari"]));
    $jam_buka = trim($data["jam_buka"]);
    $jam_tutup = trim($data["jam_tutup"]);

    // cek jika belum diisi dan valid
    if ($hari == '') {
        $errors[] = "Hari wajib diisi.";
    }
    if ($jam_buka == '') {
        $errors[] = "Jam buka wajib diisi.";
    }
    if ($jam_tutup == '') {
        $errors[] = "Jam tutup wajib diisi.";
    }
    if (!empty($errors)) { // (cek dulu) -> klo error
        $_SESSION['errors'] = $errors;
        header("Location: /sunshine/admin/informasi/operasional/a-tambah-operasional.php");
        exit;
    }

    //query tambah data
    $query = "INSERT INTO operasional VALUES
          ('','$hari', '$jam_buka', '$jam_tutup')";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
function tambah_kontak($data)
{
    global $conn;
    $errors = [];
    $kontak = htmlspecialchars(trim($data["kontak"]));
    $link =  htmlspecialchars(trim($data["link"]));

    // cek jika belum diisi dan valid
    if ($kontak == '') {
        $errors[] = "Nomor kontak  wajib diisi.";
    }
    if ($link == '') {
        $errors[] = "Link WhatsApp wajib diisi.";
    }
    if (!filter_var($link, FILTER_VALIDATE_URL)) {
        $errors[] = "Format link tidak valid.";
    }
    if (!empty($errors)) { // (cek dulu) -> klo error
        $_SESSION['errors'] = $errors;
        header("Location: /sunshine/admin/informasi/kontak/a-tambah-kontak.php");
        exit;
    }

    //query tambah data
    $query = "INSERT INTO kontak VALUES
          ('','$kontak', '$link')";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
function tambah_medsos($data)
{
    global $conn;
    $errors = [];
    $id_medsos = $data["id_medsos"];
    $link = htmlspecialchars(trim($data["link"]));
    $ikon = htmlspecialchars(trim($data["ikon"]));

    // cek jika belum diisi dan valid
    if ($ikon == '') {
        $errors[] = "Ikon wajib diisi.";
    }
    if ($link == '') {
        $errors[] = "Link media sosial wajib diisi.";
    }
    if (!filter_var($link, FILTER_VALIDATE_URL)) {
        $errors[] = "Format link tidak valid.";
    }
    if (!empty($errors)) { // (cek dulu) -> klo error
        $_SESSION['errors'] = $errors;
        header("Location: /sunshine/admin/informasi/medsos/a-tambah-medsos.php");
        exit;
    }

    //query tambah data
    $query = "INSERT INTO medsos VALUES
          ('','$ikon', '$link')";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
function tambah_kelompok($data)
{
    global $conn;
    $errors = [];
    $kelompok = htmlspecialchars(trim($data["kelompok"]));


    // cek jika belum diisi dan valid
    if ($kelompok == '') {
        $errors[] = "Nama kelompok wajib diisi.";
    }
    if (!empty($errors)) { // (cek dulu) -> klo error
        $_SESSION['errors'] = $errors;
        header("Location: /sunshine/admin/jenjang/kelompok/a-tambah-kelompok.php");
        exit;
    }

    //query tambah data
    $query = "INSERT INTO kelompok VALUES
          ('','$kelompok')";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
function tambah_sub_kelompok($data)
{
    global $conn;
    $errors = [];
    $sub_kelompok = htmlspecialchars(trim($data["sub_kelompok"]));
    $tahun = htmlspecialchars(trim($data["tahun"]));
    $id_kelompok = $data["id_kelompok"];
    $ikon = htmlspecialchars(trim($data["ikon"]));

    // cek jika belum diisi dan valid
    if ($ikon == '') {
        $errors[] = "Ikon wajib diisi.";
    }
    if ($sub_kelompok == '') {
        $errors[] = "Nama sub kelompok wajib diisi.";
    }
    if ($tahun == '') {
        $errors[] = "Usia tahun wajib diisi.";
    }
    if (!empty($errors)) { // (cek dulu) -> klo error
        $_SESSION['errors'] = $errors;
        header("Location: /sunshine/admin/jenjang/sub-kelompok/a-tambah-jenjang.php");
        exit;
    }

    //query tambah data
    $query = "INSERT INTO sub_kelompok VALUES
          ('','$sub_kelompok', '$tahun', '$ikon', '$id_kelompok')";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
function tambah_program($data)
{
    global $conn;
    $errors = [];
    $program = htmlspecialchars(trim($data["program"]));
    $deskripsi = htmlspecialchars(trim($data["deskripsi"]));
    $foto = img('foto', 'program');
    $id_user = $data["id_user"];

    // cek jika belum diisi dan valid
    if (empty($foto)) {
        $errors[] = "Foto wajib diisi.";
    }
    if ($program == '') {
        $errors[] = "Nama program wajib diisi.";
    }
    if ($deskripsi == '') {
        $errors[] = "Deskripsi wajib diisi.";
    }
    if (!empty($errors)) { // (cek dulu) -> klo error
        $_SESSION['errors'] = $errors;
        header("Location: /sunshine/admin/program/a-tambah-program.php");
        exit;
    }

    //query tambah data
    $query = "INSERT INTO program (program, deskripsi, foto, id_user) VALUES
          ('$program', '$deskripsi', '$foto', '$id_user')";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
function tambah_ekskul($data)
{
    global $conn;
    $errors = [];
    $ekskul = htmlspecialchars(trim($data["ekskul"]));
    $foto = img('foto', 'ekskul');
    $id_user = $data["id_user"];


    // cek jika belum diisi dan valid
    if (empty($foto)) {
        $errors[] = "Foto wajib diisi.";
    }
    if ($ekskul == '') {
        $errors[] = "Nama ekstrakurikuler wajib diisi.";
    }
    if (!empty($errors)) { // (cek dulu) -> klo error
        $_SESSION['errors'] = $errors;
        header("Location: /sunshine/admin/ekskul/a-tambah-ekskul.php");
        exit;
    }

    //query tambah data
    $query = "INSERT INTO ekskul (ekskul, foto, id_user) VALUES
          ('$ekskul', '$foto', '$id_user')";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
function tambah_prestasi($data)
{
    global $conn;
    $errors = [];
    $prestasi = htmlspecialchars(trim($data["prestasi"]));
    $tanggal = trim($data["tanggal"]);
    $deskripsi = htmlspecialchars(trim($data["deskripsi"]));
    $foto = img('foto', 'prestasi');
    $id_user = $data["id_user"];

    // cek jika belum diisi dan valid
    if (empty($foto)) {
        $errors[] = "Foto wajib diisi.";
    }
    if ($prestasi == '') {
        $errors[] = "Judul prestasi wajib diisi.";
    }
    if ($tanggal == '') {
        $errors[] = "Tanggal prestasi wajib diisi.";
    }
    if ($deskripsi == '') {
        $errors[] = "Deskripsi wajib diisi.";
    }
    if (!empty($errors)) { // (cek dulu) -> klo error
        $_SESSION['errors'] = $errors;
        header("Location: /sunshine/admin/prestasi/a-tambah-prestasi.php");
        exit;
    }

    //query tambah data
    $query = "INSERT INTO prestasi (prestasi, tanggal, deskripsi, foto, id_user) VALUES
          ('$prestasi', '$tanggal','$deskripsi', '$foto', '$id_user')";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
