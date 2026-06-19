<?php
require "../security.php";
require '../../koneksi.php';
require '../../data_query.php';

if (!isset($_SESSION["login"])) {
    header("Location: ../login.php");
    exit;
}

$sortir = $_GET['sortir'] ?? 'tanggal_terbaru';

if ($sortir == 'tanggal_terbaru') {
    $order = "ORDER BY tanggal DESC";
} elseif ($sortir == 'tanggal_terlama') {
    $order = "ORDER BY tanggal ASC";
} elseif ($sortir == 'data_terbaru') {
    $order = "ORDER BY created_at DESC";
} else {
    $order = "ORDER BY created_at ASC";
}

$winners = query("SELECT * FROM prestasi JOIN user ON prestasi.id_user = user.id_user $order");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prestasi</title>
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
        $page = "prestasi";
        include "../admin-sidebar.php";
        ?>

        <!-- isi-halaman -->
        <div class="content-ua admin-page">
            <div class="admin-table-card">
                <div class="admin-card-title tambah">
                    <h1>Kelola Prestasi</h1>
                    <div class="d-flex gap-3 align-items-center">
                        <form method="GET">
                            <select name="sortir" class="form-select sortir" onchange="this.form.submit()">
                                <option value="tanggal_terbaru" <?= ($_GET['sortir'] ?? 'tanggal_terbaru') == 'tanggal_terbaru' ? 'selected' : '' ?>>Prestasi Terbaru</option>
                                <option value="tanggal_terlama" <?= ($_GET['sortir'] ?? '') == 'tanggal_terlama' ? 'selected' : '' ?>>Prestasi Terlama</option>
                                <option value="data_terbaru" <?= ($_GET['sortir'] ?? '') == 'data_terbaru' ? 'selected' : '' ?>>Input Terbaru</option>
                                <option value="data_terlama" <?= ($_GET['sortir'] ?? '') == 'data_terlama' ? 'selected' : '' ?>>Input Terlama</option>
                            </select>
                        </form>
                        <a href="a-tambah-prestasi.php">Tambah Prestasi</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table admin-table kelola-table align-middle">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Foto</th>
                                <th>Prestasi</th>
                                <th>Tanggal</th>
                                <th>Deskripsi</th>
                                <th>Data Input</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            if (empty($winners)) :
                            ?>
                                <tr>
                                    <td colspan="7" class="text-center">Tidak Memiliki Data</td>
                                </tr>
                                <?php else :
                                $i = 1;
                                foreach ($winners as $winner) :
                                ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td class="text-wrap"><img src="../../img/prestasi/<?= $winner['foto']; ?>" width="90px" alt=""></td>
                                        <td class="text-wrap"><?= $winner['prestasi']; ?></td>
                                        <td class="text-wrap"><?= date('d F Y', strtotime($winner['tanggal'])); ?></td>
                                        <td class="text-wrap">
                                            <p class="info detail">
                                                <?= $winner['deskripsi']; ?>
                                            </p>
                                        </td>
                                        
                                        <td class="text-wrap">
                                            <div class="pp-info">
                                                <span class="text-wrap"><?= $winner["nama"]; ?></span>
                                                <p><?= $winner['created_at']; ?></p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="aksi-btn">
                                                <a href="a-update-prestasi.php?id=<?= $winner['id_prestasi']; ?>" class="edit">
                                                    <i class="fa-solid fa-pen"></i>
                                                </a>
                                                <a onclick="return confirm('Anda yakin ingin menghapus data?')" href="a-hapus-prestasi.php?id=<?= $winner['id_prestasi']; ?>" class="delete">
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
    <script src="../../js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>