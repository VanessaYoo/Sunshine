<?php
include "../security.php";
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
              <form action="" method="POST" class="form-card">
                <div class="form-title">
                    <h1>Prestasi Sunshine</h1>
                </div>

                <div class="row g-4">

                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label">Deskripsi <span class="required">*</span></label>
                            <textarea class="form-control" name="penjelasan" required autocomplete="off" placeholder="Masukkan deskripsi prestasi"></textarea>
                        </div>
                    </div>
                </div>
                    <button type="submit" name="penjelasan-prestasi" class="btn-form">
                        Simpan Perubahan
                    </button>
            </form>

            <div class="admin-table-card mt-4">
                <div class="admin-card-title tambah">
                    <h1>Kelola Prestasi</h1>
                    <a href="a-tambah-prestasi.php">Tambah Prestasi</a>
                </div>
                <div class="table-responsive">
                    <table class="table admin-table kelola-table align-middle">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Prestasi</th>
                                <th>Tanggal</th>
                                <th>Deskripsi</th>
                                <th>Foto</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>

                                 <tr>
                                <td>1</td>
                                <td class="text-wrap">Johan MISISIIS mIS</td>
                                <td class="text-wrap">25 Juli 2026</td>
                                <td class="text-wrap">jo_ren1 1@gma il.com an MISISIIS mIS an MISISIIS mISan MISISIIS mIS an MISISIIS mISan MISISIIS mISan MISISIIS mISan MISISIIS mIS</td>
                                <td class="text-wrap">2sd.png</td>
                                <td>
                                    <div class="aksi-btn">
                                        <a href="a-update-prestasi.php" class="edit">
                                            <i class="fa-solid fa-pen"></i>
                                        </a>
                                        <a href="a-delete-prestasi.php" class="delete">
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
    <script src="../../js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>