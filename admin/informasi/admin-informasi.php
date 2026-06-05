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
    <title>Profil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/style.css" type="text/css" />
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
    <div class="container-ua">

        <?php
        $page = "informasi";
        include "../admin-sidebar.php";
        ?>

        <!-- isi-halaman -->
        <div class="content-ua admin-page">
            <form action="" method="POST" class="form-card">
                <div class="form-title">
                    <h1>Profil Sunshine</h1>
                </div>

                <div class="row g-4">

                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label">Tentang Sunshine <span class="required">*</span></label>
                            <textarea class="form-control" name="profil" required autocomplete="off" placeholder="Masukkan deskripsi profil"></textarea>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Lokasi Sunshine Tertulis <span class="required">*</span></label>
                            <input class="form-control" type="text" name="lokasi_tertulis" required autocomplete="off" placeholder="Masukkan lokasi spesifik">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Link Maps Lokasi Sunshine <span class="required">*</span></label>
                            <input class="form-control" type="text" name="lokasi_map" required autocomplete="off" placeholder="Masukkan link maps lokasi Sunshine">
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label">Keunggulan Sunshine <span class="required">*</span></label>
                            <textarea class="form-control" name="keunggulan" required autocomplete="off" placeholder="Masukkan deskripsi keunggulan"></textarea>
                        </div>
                    </div>

                </div>

                <div class="row g-4">
                    <div class="form-title extra">
                        <h1>Hero Sunshine</h1>
                    </div>


                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Judul Hero <span class="required">*</span></label>
                            <input class="form-control" type="text" name="judul_hero" required autocomplete="off" placeholder="Masukkan judul pada hero">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Sub Judul Hero <span class="required">*</span></label>
                            <input class="form-control" type="text" name="subjudul_hero" required autocomplete="off" placeholder="Masukkan sub judul pada hero">
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label">Deskripsi Hero <span class="required">*</span></label>
                            <textarea class="form-control" name="deskripsi_hero" required autocomplete="off" placeholder="Masukkan deskripsi pada hero"></textarea>
                        </div>
                    </div>

                </div>

                     <div class="row g-4">
                    <div class="form-title extra">
                        <h1>Foto Sunshine</h1>
                    </div>

                      <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Gedung Sunshine <span class="required">*</span></label>
                            <input class="form-control"
                                type="file"
                                name="foto_gedung" required>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Foto Siswa Sunshine <span class="required">*</span></label>
                            <input class="form-control"
                                type="file"
                                name="foto_keunggulan" required>
                        </div>
                    </div>

                      <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Foto Hero <span class="required">*</span></label>
                            <input class="form-control"
                                type="file"
                                name="foto_hero" required>
                        </div>
                    </div>
                     </div>


                    <button type="submit" name="profil" class="btn-form">
                        Simpan Perubahan
                    </button>
            </form>

              <div class="admin-table-card mt-4">
                <div class="admin-card-title tambah">
                    <h1>Kelola Operasional</h1>
                    <a href="operasional/a-tambah-operasional.php">Tambah Waktu</a>
                </div>
                <div class="table-responsive">
                    <table class="table admin-table kelola-table align-middle">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Hari</th>
                                <th>Jam Buka</th>
                                <th>Jam Tutup</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>

                            <tr>
                                <td>1</td>
                                <td class="text-wrap">Johan MISISIIS mIS</td>
                                <td class="text-wrap">7</td>
                                <td class="text-wrap">10</td>
                                <td>
                                    <div class="aksi-btn">
                                        <a href="operasional/a-update-operasional.php" class="edit">
                                            <i class="fa-solid fa-pen"></i>
                                        </a>
                                        <a href="operasional/a-delete-operasional.php" class="delete">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>

             <div class="admin-table-card mt-4">
                <div class="admin-card-title tambah">
                    <h1>Kelola Kontak</h1>
                    <a href="kontak/a-tambah-kontak.php">Tambah Kontak</a>
                </div>
                <div class="table-responsive">
                    <table class="table admin-table kelola-table align-middle">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kontak</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>

                            <tr>
                                <td>1</td>
                                <td class="text-wrap">Johan MISISIIS mIS</td>
                                <td>
                                    <div class="aksi-btn">
                                        <a href="kontak/a-update-kontak.php" class="edit">
                                            <i class="fa-solid fa-pen"></i>
                                        </a>
                                        <a href="kontak/a-delete-kontak.php" class="delete">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>

                  <div class="admin-table-card mt-4">
                <div class="admin-card-title tambah">
                    <h1>Kelola Media Sosial</h1>
                    <a href="medsos/a-tambah-medsos.php">Tambah Media Sosial</a>
                </div>
                <div class="table-responsive">
                    <table class="table admin-table kelola-table align-middle">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Link Media Sosial</th>
                                <th>Icon</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>

                            <tr>
                                <td>1</td>
                                <td class="text-wrap">Johan MISISIIS mIS</td>
                                 <td class="text-wrap">Johan MISISIIS mIS</td>
                                <td>
                                    <div class="aksi-btn">
                                        <a href="medsos/a-update-medsos.php" class="edit">
                                            <i class="fa-solid fa-pen"></i>
                                        </a>
                                        <a href="medsos/a-delete-medsos.php" class="delete">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>

        </div>

             
    </div>

    </div>
    <script src="../../js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>