<?php
require "../security.php";
require '../../koneksi.php';
require '../../data_query.php';

if (!isset($_SESSION["login"])) {
    header("Location: ../login.php");
    exit;
}

$errors = $_SESSION['errors'] ?? [];
unset($_SESSION['errors']);

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
            <form action="admin-ubah-informasi.php" method="POST" class="form-card" enctype="multipart/form-data">
                <div class="form-title">
                    <h1>Profil Sunshine</h1>
                </div>

                <div class="row g-4">

                    <?php if (!empty($errors)): //(cek dulu) namun hasilnya [] karna gada eror 
                    ?>
                        <div class="errors">
                            <?php foreach ($errors as $error): ?>
                                <div class="col-md-5">
                                    <div class="error"><?= htmlspecialchars($error) ?></div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <?php
                    $deskripsi_profil = query("SELECT * FROM informasi WHERE id=1")[0] ?? [];
                    ?>
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label">Tentang Sunshine <span class="required">*</span></label>
                            <textarea class="form-control" name="profil" required autocomplete="off" placeholder="Masukkan deskripsi profil"><?= $deskripsi_profil['isi_field'] ?? ''; ?></textarea>
                        </div>
                    </div>

                    <?php
                    $lokasi_tertulis = query("SELECT * FROM informasi WHERE id=3")[0] ?? [];
                    ?>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Lokasi Sunshine Tertulis <span class="required">*</span></label>
                            <input class="form-control" type="text" name="lokasi_tertulis" required autocomplete="off" value="<?= $lokasi_tertulis['isi_field'] ?? ''; ?>" placeholder="Masukkan lokasi spesifik">
                        </div>
                    </div>

                    <?php
                    $lokasi_map = query("SELECT * FROM informasi WHERE id=4")[0] ?? [];
                    ?>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Link Maps Lokasi Sunshine <span class="required">*</span></label>
                            <input class="form-control" type="text" name="lokasi_map" required autocomplete="off" value="<?= $lokasi_map['isi_field'] ?? ''; ?>" placeholder="Masukkan link maps lokasi Sunshine">
                        </div>
                    </div>

                    <?php
                    $keunggulan = query("SELECT * FROM informasi WHERE id=5")[0] ?? [];
                    ?>
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label">Keunggulan Sunshine <span class="required">*</span></label>
                            <textarea class="form-control" name="keunggulan" required autocomplete="off" placeholder="Masukkan deskripsi keunggulan"><?= $keunggulan['isi_field'] ?? ''; ?></textarea>
                        </div>
                    </div>

                </div>

                <div class="row g-4">
                    <div class="form-title extra">
                        <h1>Hero Sunshine</h1>
                    </div>

                    <?php
                    $judul_hero = query("SELECT * FROM informasi WHERE id=7")[0] ?? [];
                    ?>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Judul Hero <span class="required">*</span></label>
                            <input class="form-control" type="text" name="judul_hero" required autocomplete="off" value="<?= $judul_hero['isi_field'] ?? ''; ?>" placeholder="Masukkan judul pada hero">
                        </div>
                    </div>

                    <?php
                    $subjudul_hero = query("SELECT * FROM informasi WHERE id=8")[0] ?? [];
                    ?>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Sub Judul Hero <span class="required">*</span></label>
                            <input class="form-control" type="text" name="subjudul_hero" required autocomplete="off" value="<?= $subjudul_hero['isi_field'] ?? ''; ?>" placeholder="Masukkan sub judul pada hero">
                        </div>
                    </div>

                    <?php
                    $deskripsi_hero = query("SELECT * FROM informasi WHERE id=9")[0] ?? [];
                    ?>
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label">Deskripsi Hero <span class="required">*</span></label>
                            <textarea class="form-control" name="deskripsi_hero" required autocomplete="off" placeholder="Masukkan deskripsi pada hero"><?= $deskripsi_hero['isi_field'] ?? ''; ?></textarea>
                        </div>
                    </div>

                </div>

                <div class="row g-4">
                    <div class="form-title extra">
                        <h1>Foto Sunshine</h1>
                    </div>

                    <?php
                    $foto_gedung = query("SELECT * FROM informasi WHERE id=2")[0] ?? [];
                    ?>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Gedung Sunshine <span class="required">*</span></label>

                            <div class="mb-2">
                                <img src="../../img/aset/<?= $foto_gedung['isi_field'] ?? ''; ?>" class="img-thumbnail">
                                <p class="mt-2" style="font-size: 1rem;">File : <?= $foto_gedung['isi_field'] ?? ''; ?></p>
                            </div>

                            <input type="hidden" name="foto_gedung_lama" value="<?= $foto_gedung['isi_field'] ?? ''; ?>">

                            <input class="form-control"
                                type="file"
                                name="foto_gedung">
                            <p style="font-size:0.9rem;" class="mt-2">Format: .png, .jpg, .jpeg, .webp</p>
                        </div>
                    </div>

                    <?php
                    $foto_keunggulan = query("SELECT * FROM informasi WHERE id=6")[0] ?? [];
                    ?>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Foto Siswa Sunshine <span class="required">*</span></label>

                            <div class="mb-2">
                                <img src="../../img/aset/<?= $foto_keunggulan['isi_field'] ?? ''; ?>" class="img-thumbnail">
                                <p class="mt-2" style="font-size: 1rem;">File : <?= $foto_keunggulan['isi_field'] ?? ''; ?></p>
                            </div>

                            <input type="hidden" name="foto_keunggulan_lama" value="<?= $foto_keunggulan['isi_field'] ?? ''; ?>">

                            <input class="form-control"
                                type="file"
                                name="foto_keunggulan">
                            <p style="font-size:0.9rem;" class="mt-2">Format: .png, .jpg, .jpeg, .webp</p>
                        </div>
                    </div>

                    <?php
                    $foto_hero = query("SELECT * FROM informasi WHERE id=10")[0] ?? [];
                    ?>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Foto Hero <span class="required">*</span></label>

                            <div class="mb-2">
                                <img src="../../img/aset/<?= $foto_hero['isi_field'] ?? ''; ?>" class="img-thumbnail">
                                <p class="mt-2" style="font-size: 1rem;">File : <?= $foto_hero['isi_field'] ?? ''; ?></p>
                            </div>

                            <input type="hidden" name="foto_hero_lama" value="<?= $foto_hero['isi_field'] ?? ''; ?>">

                            <input class="form-control"
                                type="file"
                                name="foto_hero">
                            <p style="font-size:0.9rem;" class="mt-2">Format: .png, .jpg, .jpeg, .webp</p>
                        </div>
                    </div>
                </div>

                <button type="submit" name="update-informasi" class="btn-form">
                    Simpan Perubahan
                </button>
            </form>

            <div class="admin-table-card mt-4">
                <div class="admin-card-title tambah">
                    <h1>Kelola Operasional</h1>

                    <div class="d-flex gap-3 align-items-center">
                        <form method="GET">
                            <select name="sortir-operasional" class="form-select sortir" onchange="this.form.submit()">
                                <option value="terbaru" <?= ($_GET['sortir-operasional'] ?? 'terbaru') == 'terbaru' ? 'selected' : '' ?>>Input Terbaru</option>
                                <option value="terlama" <?= ($_GET['sortir-operasional'] ?? '') == 'terlama' ? 'selected' : '' ?>>Input Terlama</option>
                            </select>
                        </form>
                    <a href="operasional/a-tambah-operasional.php">Tambah Waktu</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table admin-table kelola-table align-middle">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Hari</th>
                                <th>Jam Buka</th>
                                <th>Jam Tutup</th>
                                <th>Data Input</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $sortir_operasional = $_GET['sortir-operasional'] ?? 'terbaru'; //default terbaru
                            $order  = ($sortir_operasional == 'terlama') ? 'ASC' : 'DESC';
                            $operasional = query("SELECT * FROM operasional JOIN user ON operasional.id_user = user.id_user ORDER BY created_at $order");
                            if (empty($operasional)) :
                            ?>
                                <tr>
                                    <td colspan="5" class="text-center">Tidak Memiliki Data</td>
                                </tr>
                                <?php else :
                                $i = 1;
                                foreach ($operasional as $waktu) :
                                ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td class="text-wrap"><?= $waktu['hari']; ?></td>
                                        <td class="text-wrap"><?= date('G:i A', strtotime($waktu["jam_buka"])); ?></td>
                                        <td class="text-wrap"><?= date('G:i A', strtotime($waktu["jam_tutup"])); ?></td>
                                        <td>
                                             <div class="pp-info">
                                                <span class="text-wrap"><?= $waktu["nama"]; ?></span>
                                                <p><?= $waktu['created_at']; ?></p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="aksi-btn">
                                                <a href="operasional/a-update-operasional.php?id=<?= $waktu['id_operasional']; ?>" class="edit">
                                                    <i class="fa-solid fa-pen"></i>
                                                </a>
                                                <a onclick="return confirm('Anda yakin ingin menghapus data?')" href="operasional/a-hapus-operasional.php?id=<?= $waktu['id_operasional']; ?>&type=operasional" class="delete">
                                                    <i class="fa-solid fa-trash"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                            <?php $i++;
                                endforeach;
                            endif;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="admin-table-card mt-4">
                <div class="admin-card-title tambah">
                    <h1>Kelola Kontak</h1>

                    <div class="d-flex gap-3 align-items-center">
                        <form method="GET">
                            <select name="sortir-kontak" class="form-select sortir" onchange="this.form.submit()">
                                <option value="terbaru" <?= ($_GET['sortir-kontak'] ?? 'terbaru') == 'terbaru' ? 'selected' : '' ?>>Input Terbaru</option>
                                <option value="terlama" <?= ($_GET['sortir-kontak'] ?? '') == 'terlama' ? 'selected' : '' ?>>Input Terlama</option>
                            </select>
                        </form>
                    <a href="kontak/a-tambah-kontak.php">Tambah Kontak</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table admin-table kelola-table align-middle">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kontak</th>
                                <th>Link WhatsApp</th>
                                <th>Data Input</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $sortir_kontak = $_GET['sortir-kontak'] ?? 'terbaru'; //default terbaru
                            $order  = ($sortir_kontak == 'terlama') ? 'ASC' : 'DESC';
                            $kontak = query("SELECT * FROM kontak JOIN user ON kontak.id_user = user.id_user ORDER BY created_at $order");
                            if (empty($kontak)) :
                            ?>
                                <tr>
                                    <td colspan="4" class="text-center">Tidak Memiliki Data</td>
                                </tr>
                                <?php else :
                                $i = 1;
                                foreach ($kontak as $nomor) :
                                ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td class="text-wrap"><?= $nomor['kontak']; ?></td>
                                        <td class="text-wrap"><a href="<?= $nomor['link']; ?>" class="btn-l-register black" target="_blank"><?= $nomor['link']; ?></a></td>
                                        <td>
                                             <div class="pp-info">
                                                <span class="text-wrap"><?= $nomor["nama"]; ?></span>
                                                <p><?= $nomor['created_at']; ?></p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="aksi-btn">
                                                <a href="kontak/a-update-kontak.php?id=<?= $nomor['id_kontak']; ?>" class="edit">
                                                    <i class="fa-solid fa-pen"></i>
                                                </a>
                                                <a onclick="return confirm('Anda yakin ingin menghapus data?')" href="kontak/a-hapus-kontak.php?id=<?= $nomor['id_kontak']; ?>" class="delete">
                                                    <i class="fa-solid fa-trash"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                            <?php $i++;
                                endforeach;
                            endif;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="admin-table-card mt-4">
                <div class="admin-card-title tambah">
                    <h1>Kelola Media Sosial</h1>
                    
                    <div class="d-flex gap-3 align-items-center">
                        <form method="GET">
                            <select name="sortir-medsos" class="form-select sortir" onchange="this.form.submit()">
                                <option value="terbaru" <?= ($_GET['sortir-medsos'] ?? 'terbaru') == 'terbaru' ? 'selected' : '' ?>>Input Terbaru</option>
                                <option value="terlama" <?= ($_GET['sortir-medsos'] ?? '') == 'terlama' ? 'selected' : '' ?>>Input Terlama</option>
                            </select>
                        </form>
                       <a href="medsos/a-tambah-medsos.php">Tambah Media Sosial</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table admin-table kelola-table align-middle">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Ikon</th>
                                <th>Link Media Sosial</th>
                                <th>Data Input</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $sortir_medsos = $_GET['sortir-medsos'] ?? 'terbaru'; //default terbaru
                            $order  = ($sortir_medsos == 'terlama') ? 'ASC' : 'DESC';
                            $media_sosial = query("SELECT * FROM medsos JOIN user ON medsos.id_user = user.id_user ORDER BY created_at $order");
                            if (empty($media_sosial)) :
                            ?>
                                <tr>
                                    <td colspan="4" class="text-center">Tidak Memiliki Data</td>
                                </tr>
                                <?php else :
                                $i = 1;
                                foreach ($media_sosial as $medsos) :
                                ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td class="text-wrap"><i class="<?= $medsos['ikon']; ?> output"></i></td>
                                        <td class="text-wrap"><a href="<?= $medsos['link']; ?>" class="btn-l-register black" target="_blank"><?= $medsos['link']; ?></a></td>
                                        <td>
                                             <div class="pp-info">
                                                <span class="text-wrap"><?= $medsos["nama"]; ?></span>
                                                <p><?= $medsos['created_at']; ?></p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="aksi-btn">
                                                <a href="medsos/a-update-medsos.php?id=<?= $medsos['id_medsos']; ?>" class="edit">
                                                    <i class="fa-solid fa-pen"></i>
                                                </a>
                                                <a onclick="return confirm('Anda yakin ingin menghapus data?')" href="medsos/a-hapus-medsos.php?id=<?= $medsos['id_medsos']; ?>&type=medsos" class="delete">
                                                    <i class="fa-solid fa-trash"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                            <?php $i++;
                                endforeach;
                            endif;
                            ?>
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