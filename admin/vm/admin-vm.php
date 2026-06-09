<?php
include "../../security.php";
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
    <title>Visi dan Misi</title>
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
        $page = "visi-misi";
        include "../admin-sidebar.php";
        ?>

        <!-- isi-halaman -->
        <div class="content-ua admin-page">
            <form action="" method="POST" class="form-card">
                <div class="form-title">
                    <h1>Visi dan Misi Sunshine</h1>
                </div>

                <div class="row g-4">

                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label">Deskripsi <span class="required">*</span></label>
                            <textarea class="form-control" name="penjelasan" required autocomplete="off" placeholder="Masukkan deskripsi visi dan misi"></textarea>
                        </div>
                    </div>
                </div>

                <div class="row g-4">

                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label">Visi <span class="required">*</span></label>
                            <textarea class="form-control" name="visi" required autocomplete="off" placeholder="Masukkan visi"></textarea>
                        </div>
                    </div>
                </div>
                <button type="submit" name="penjelasan-vm" class="btn-form">
                    Simpan Perubahan
                </button>
            </form>

            <div class="admin-table-card mt-4">
                <div class="admin-card-title tambah">
                    <h1>Kelola Misi</h1>
                    <a href="misi/a-tambah-misi.php">Tambah Misi</a>
                </div>
                <div class="table-responsive">
                    <table class="table admin-table kelola-table align-middle">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Misi</th>
                                <th>Deskripsi</th>
                                <th>Icon</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>

                            <tr>
                                <td>1</td>
                                <td class="text-wrap">Johan MISISIIS mIS mIS msi ism</td>
                                <td class="text-wrap">lalalalall lalala la alal al ala la la la la a la la al alal ala al al ala al ala a ala a lala</td>
                                <td class="text-wrap">jo_ren11@gmail.com</td>
                                <td>
                                    <div class="aksi-btn">
                                        <a href="misi/a-update-misi.php" class="edit">
                                            <i class="fa-solid fa-pen"></i>
                                        </a>
                                        <a href="misi/a-delete-misi.php" class="delete">
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
                    <h1>Kelola Janji</h1>
                    <a href="janji/a-tambah-janji.php">Tambah Janji</a>
                </div>
                <div class="table-responsive">
                    <table class="table admin-table kelola-table align-middle">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Janji</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>

                            <tr>
                                <td>1</td>
                                <td class="text-wrap">Johan MISISIIS mIS mIS msi is mIS msi is mIS msi is mIS msi is mIS msi is mIS msi is mIS msi is mIS msi is mIS msi is mIS msi is mIS msi is mIS msi is mIS msi is mIS msi ism</td>
                                <td>
                                    <div class="aksi-btn">
                                        <a href="janji/a-update-janji.php" class="edit">
                                            <i class="fa-solid fa-pen"></i>
                                        </a>
                                        <a href="janji/a-delete-janji.php" class="delete">
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
                    <h1>Kelola Pilar Janji</h1>
                </div>
                <div class="table-responsive">
                    <table class="table admin-table kelola-table align-middle">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Pilar</th>
                                <th>Icon</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>

                            <tr>
                                <td>1</td>
                                <td class="text-wrap">Johan MISISIIS mIS mIS msi ism</td>
                                <td class="text-wrap">jo_ren11@gmail.com</td>
                                <td>
                                    <div class="aksi-btn">
                                        <a href="pilar/a-update-pilar.php" class="edit">
                                            <i class="fa-solid fa-pen"></i>
                                        </a>
                                        <a href="pilar/a-delete-pilar.php" class="delete">
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