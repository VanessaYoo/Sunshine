<?php
session_start();
require '../../function.php';

if (!isset($_SESSION["login"])) {
    header("Location: ../login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Pendaftaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/style.css" type="text/css" />
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&family=Playpen+Sans:wght@100..800&display=swap" rel="stylesheet" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="container-ua">

        <?php
        $page = "pendaftaran";
        include "../admin-sidebar.php";
        ?>

        <div class="content-ua admin-page">

            <form action="" method="POST" class="form-card">

                <div class="back kembali mt-2">
                    <button onclick="history.back()" class="back-arrow">
                        <i class="fas fa-angle-left"></i>
                        <p class="orange bold">Kembali</p>
                    </button>
                </div>

                <div class="form-title">
                    <h1>Update Formulir Pendaftaran Siswa Baru</h1>
                </div>

                <div class="row g-4">

                    <div class="col-md-6">
                        <div class="form-input">
                            <label class="form-label">Nama Lengkap <span class="required">*</span></label>
                            <input class="form-control" type="text" name="nama" required autocomplete="off" placeholder="Masukkan nama lengkap">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="input-group-custom">
                            <label class="mb-2">Jenis Kelamin <span class="required">*</span></label>

                            <div class="d-flex gap-4 radio">
                                <div class="form-check">
                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        name="jenis_kelamin"
                                        id="perempuan"
                                        value="perempuan">
                                    <label class="form-check-label" for="perempuan">
                                        Perempuan
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        name="jenis_kelamin"
                                        id="laki"
                                        value="laki-laki">
                                    <label class="form-check-label" for="laki-laki">
                                        Laki-Laki
                                    </label>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-input">
                            <label class="form-label">Tempat Lahir <span class="required">*</span></label>
                            <input class="form-control" type="text" name="tempat_lahir" required autocomplete="off" placeholder="Masukkan tempat lahir">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-input">
                            <label class="form-label">Tanggal Lahir <span class="required">*</span></label>
                            <input type="date" class="form-control" name="tanggal_lahir" required autocomplete="off" placeholder="Masukkan tanggal lahir">
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label">Alamat <span class="required">*</span></label>
                            <textarea class="form-control" name="alamat" required autocomplete="off" placeholder="Masukkan alamat"></textarea>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Kelas <span class="required">*</span></label>
                            <select name="kelas" class="form-select" aria-label="Default select example" required>
                                <option selected>Pilih Kelas</option>
                                <option value="playgroup">Playgroup</option>
                                <option value="kindergarten">Kindergarten</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Nomor Telepon Orang Tua <span class="required">*</span></label>
                            <input class="form-control" type="text" name="wa" required autocomplete="off" placeholder="Masukkan nomor telepon orang tua">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Nama Ayah <span class="required">*</span></label>
                            <input class="form-control" type="text" name="ayah" required autocomplete="off" placeholder="Masukkan nama Ayah">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Nama Ibu <span class="required">*</span></label>
                            <input class="form-control" type="text" name="ibu" required autocomplete="off" placeholder="Masukkan nama Ibu">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Nama Wali Siswa <span class="required">*</span></label>
                            <input class="form-control" type="text" name="ibu" required autocomplete="off" placeholder="Masukkan nama wali siswa">
                        </div>
                    </div>

                </div>

                <div class="upload-section">
                    <div class="form-title">
                        <h1>Upload Berkas</h1>
                        <p>
                            Lengkapi berkas calon siswa di bawah ini
                        </p>
                    </div>

                    <div class="row g-4">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Akta Lahir <span class="required">*</span></label>
                                <input class="form-control"
                                    type="file"
                                    name="akta" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Kartu Keluarga <span class="required">*</span></label>
                                <input class="form-control"
                                    type="file"
                                    name="kk" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Foto Siswa <span class="required">*</span></label>
                                <input class="form-control"
                                    type="file"
                                    name="pas_foto" required>
                            </div>
                        </div>

                    </div>

                </div>

                <button type="submit" name="update-daftar" class="btn-form">
                    Simpan Perubahan
                </button>
            </form>

        </div>

    </div>
    <script src="../../js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>