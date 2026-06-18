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
    return false;
}
function hapus_img($nama_file, $folder)
{
    $path = __DIR__ . '/img/' . $folder . '/' . $nama_file;
    if (file_exists($path)) {
        unlink($path);
    }
}

