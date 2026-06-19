  <?php
  require 'koneksi.php';
  require 'data_query.php';
  
  $id = $_GET['id'] ?? '';

  if ($id == '') {
    header("Location: index.php");
    exit;
  }
  $deskripsi_prestasi = query("SELECT * FROM prestasi WHERE id_prestasi='$id'")[0];
  ?>
  <!doctype html>
  <html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Prestasi Sunshine</title>
    <link rel="stylesheet" href="css/style.css" type="text/css" />
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
    <section id="header">
      <div class="back">
        <button onclick="history.back()" class="back-arrow" type="button">
          <i class="fas fa-angle-left"></i>
          <p class="orange bold">Deskripsi Prestasi</p>
        </button>
      </div>
    </section>

    <section id="deskripsi-prestasi">
      <div
        class="left-deskripsi-prestasi"
        data-aos="fade-right"
        data-aos-duration="1000">
        <img src="img/prestasi/<?= $deskripsi_prestasi['foto']; ?>" alt="" />
      </div>
      <div class="right-deskripsi-prestasi">
        <div class="title-prestasi">
          <h1><?= $deskripsi_prestasi['prestasi']; ?></h1>
          <p class="label"><?= date('d F Y', strtotime($deskripsi_prestasi['tanggal'])) ?></p>
        </div>
        <p>
          <?= $deskripsi_prestasi['deskripsi']; ?>
        </p>
      </div>
    </section>

    <?php include "footer.php"; ?>
    <script src="js/script.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
  </body>

  </html>