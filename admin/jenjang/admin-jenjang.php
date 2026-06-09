<?php
require "../security.php";
require '../../function.php';

if (!isset($_SESSION["login"])) {
    header("Location: ../login.php");
    exit;
}

if (isset($_GET["id"])  && isset($_GET["type"])) {

    $id = $_GET["id"];
    $type = $_GET["type"];

    $hasil='';
    
    if ($type == 'kelompok') {
        $hasil = hapus_kelompok($id);
    } elseif ($type == 'sub_kelompok') {
        $hasil = hapus_sub_kelompok($id);

    if ($hasil > 0) {
        echo "<script>alert('Data berhasil dihapus'); 
        document.location.href='admin-jenjang.php';</script>";
    } else {
        echo "<script>alert('Data gagal dihapus');
        document.location.href='admin-jenjang.php'</script>";
    }
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jenjang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/style.css" type="text/css" />
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&family=Playpen+Sans:wght@100..800&display=swap" rel="stylesheet" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="container-ua">

        <?php
        $page = "jenjang";
        include "../admin-sidebar.php";
        ?>

        <div class="content-ua admin-page">


            <div class="admin-table-card">
                <div class="admin-card-title tambah">
                    <h1>Kelola Kelompok</h1>
                    <a href="kelompok/a-tambah-kelompok.php">Tambah Kelompok</a>
                </div>
                <div class="table-responsive">
                    <table class="table admin-table kelola-table align-middle">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kelompok</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $kelompok = query("SELECT * FROM kelompok");
                            if (empty($kelompok)) :
                            ?>
                                <tr>
                                    <td colspan="3" class="text-center">Tidak Memiliki Data</td>
                                </tr>
                                <?php else :
                                $i = 1;
                                foreach ($kelompok as $kel) :
                                ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td class="text-wrap"><?= $kel["kelompok"]; ?></td>
                                        <td>
                                            <div class="aksi-btn">
                                                <a href="kelompok/a-update-kelompok.php?id=<?= $kel['id_kelompok']; ?>" class="edit">
                                                    <i class="fa-solid fa-pen"></i>
                                                </a>
                                                <a onclick="return confirm('Anda yakin ingin menghapus data?')" href="?id=<?= $kel['id_kelompok']; ?>&type=kelompok" class="delete">
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


            <?php
            $bagi_kelompok = query("SELECT * FROM kelompok");
            $i = 1;
            foreach ($bagi_kelompok as $bagi_kel) :
                $id_kelompok = $bagi_kel["id_kelompok"];
            ?>
                <div class="admin-table-card mt-4">
                    <div class="admin-card-title tambah">
                        <h1>Kelola <?= $bagi_kel["kelompok"] ?></h1>
                        <a href="sub-kelompok/a-tambah-jenjang.php?id=<?= $bagi_kel['id_kelompok']; ?>">Tambah Jenjang</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table admin-table kelola-table align-middle">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Sub Kelompok</th>
                                    <th>Jenjang</th>
                                    <th>Ikon</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sub_kelompok = query("SELECT * FROM sub_kelompok WHERE id_kelompok=$id_kelompok");
                                if (empty($sub_kelompok)) :
                                ?>
                                    <tr>
                                        <td colspan="5" class="text-center">Tidak Memiliki Data</td>
                                    </tr>
                                    <?php else :
                                    $i = 1;
                                    foreach ($sub_kelompok as $subkel) :
                                    ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $subkel["sub_kelompok"]; ?></td>
                                            <td><?= $subkel["tahun"]; ?> Tahun</td>
                                            <td><?= $subkel["ikon"]; ?></td>
                                            <td>
                                                <div class="aksi-btn">
                                                    <a href="sub-kelompok/a-update-jenjang.php?id=<?= $subkel['id_sub_kelompok']; ?>" class="edit">
                                                        <i class="fa-solid fa-pen"></i>
                                                    </a>
                                                    <a onclick="return confirm('Anda yakin ingin menghapus data?')" href="?id=<?= $subkel['id_sub_kelompok']; ?>&type=sub_kelompok" class="delete">
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
            <?php $i++;
            endforeach;
            ?>


        </div>

    </div>
    <script src="../../js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>