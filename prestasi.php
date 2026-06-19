  <?php
  require 'koneksi.php';
  require 'data_query.php';
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
          <p class="orange bold">Prestasi</p>
        </button>
      </div>
      <div class="title">
        <h1>Prestasi Sunshine</h1>
        <p>
          Kumpulan prestasi Sunshine yang tumbuh dari proses belajar yang
          menyenangkan dan penuh makna
        </p>
      </div>
    </section>

    <!-- Seluruh Prestasi -->
    <section id="seluruh-prestasi">
      <div class="grid-prestasi">
        <?php
        $winners = query("SELECT * FROM prestasi ORDER BY tanggal DESC");
        $i = 1;
        foreach ($winners as $winner) :
        ?>
          <a href="deskripsiPrestasi.php?id=<?= $winner['id_prestasi']; ?>" data-aos="zoom-in" data-aos-duration="1000">
            <div class="content-prestasi">
              <img src="img/prestasi/<?= $winner['foto']; ?>" alt="" />
              <div class="text-timpa">
                <h2 data-aos="fade-up" data-aos-duration="1000">
                  <?= $winner['prestasi']; ?>
                </h2>
                <h4 class="tahun" data-aos="fade-up" data-aos-duration="1000">
                  <?= date('d F Y', strtotime($winner['tanggal'])); ?>
                </h4>
              </div>
            </div>
          </a>
        <?php $i++;
        endforeach;
        ?>

      </div>
    </section>

    <?php include "footer.php"; ?>">

    <script src="js/script.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
  </body>

  </html>