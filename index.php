<?php
require 'koneksi.php';
require 'data_query.php';
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sunshine</title>
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
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css" />
</head>

<body>
  <header>
    <nav data-aos="fade-down" data-aos-duration="800">
      <div class="left-nav">
        <a href="index.php">
          <div class="logo">
            <img src="img/aset/logo.png" alt="" />Sunshine
          </div>
        </a>
      </div>
      <div class="middle-nav" id="toggle">
        <a href="#tentang" class="link">Tentang</a>
        <a href="#visi-misi" class="link">Visi & Misi</a>
        <a href="#program" class="link">Program</a>
        <a href="#ekskul" class="link">Ekstrakurikuler</a>
        <a href="#prestasi" class="link">Prestasi</a>
      </div>

      <?php
      $kontak = query("SELECT * FROM kontak WHERE id_kontak=1")[0];
      ?>
      <div class="right-nav">
        <a href="<?= $kontak['link']; ?>" class="btn-hubungi right-nav" target="_blank">
          <div class="text-hubungi">Hubungi Kami</div>
          <div class="icon-hubungi">
            <img src="img/icon/contact.png" alt="">
          </div>
        </a>
      </div>
      <div class="icon-nav">
        <i
          onclick="toggleNav()"
          class="fa-solid fa-bars"
          style="color: black"></i>
      </div>
    </nav>
  </header>


  <!-- top -->
  <?php
  $foto_hero = query("SELECT * FROM informasi WHERE id=10")[0] ?? [];
  ?>
  <section id="top" style="background-image: url('img/aset/<?= $foto_hero['isi_field']; ?>');">
    <div class="text-top">

      <div
        class="text-line-top"
        data-aos="fade-right"
        data-aos-duration="1000">
        <div class="line"></div>
        <?php
        $subjudul = query("SELECT * FROM informasi WHERE id=8")[0];
        ?>
        <p class="p-top head white"><?= $subjudul['isi_field']; ?></p>
      </div>
      <?php
      $judul = query("SELECT * FROM informasi WHERE id=7")[0];
      ?>
      <h1 class="h1-top" data-aos="fade-right" data-aos-duration="1000">
        <?= $judul['isi_field']; ?>
      </h1>
      <?php
      $deskripsi_judul = query("SELECT * FROM informasi WHERE id=9")[0];
      ?>
      <p class="p-top white" data-aos="fade-right" data-aos-duration="1000">
        <?= $deskripsi_judul['isi_field']; ?>
      </p>

    </div>
  </section>

  <!-- tentang -->
  <section id="tentang" data-group="tentang">
    <div class="left-tentang" data-aos="fade-right" data-aos-duration="1000">
      <?php
      $gedung = query("SELECT * FROM informasi WHERE id=2")[0];
      ?>
      <img src="img/aset/<?= $gedung['isi_field']; ?>" alt="" />
    </div>
    <div class="right-tentang">
      <div class="text-tentang">
        <div class="head-tentang">
          <h1>Selamat Datang di <span>Sunshine</span></h1>
          <?php
          $deskripsi_profil = query("SELECT * FROM informasi WHERE id=1")[0];
          ?>
          <p class="justify">
            <?= $deskripsi_profil['isi_field']; ?>
          </p>
        </div>
        <div class="isi-tentang">
          <div class="first-text-tentang">
            <p class="bold">Lokasi Sunshine</p>
            <?php
            $lokasi_tertulis = query("SELECT * FROM informasi WHERE id=3")[0];
            ?>
            <p class="justify">
              <?= $lokasi_tertulis['isi_field']; ?>
            </p>
          </div>
          <div class="first-text-tentang">
            <p class="bold">Jam Operasional</p>
            <?php
            $operasional = query("SELECT * FROM operasional");
            ?>
            <?php $i = 1;
            foreach ($operasional as $waktu) :
            ?>
              <p class="justify">
                <?= $waktu["hari"]; ?> : <?= date('G:i A', strtotime($waktu["jam_buka"])); ?> - <?= date('G:i A', strtotime($waktu["jam_tutup"])) ?>
              </p>
            <?php $i++;
            endforeach;
            ?>

          </div>

        </div>
      </div>
    </div>
  </section>

  <!-- playground & kindergarten -->
  <section id="pg-kg" data-group="tentang">
    <div class="text-jenjang">
      <div class="title-jenjang">
        <h1>Jenjang Tahun Pembelajaran</h1>
      </div>
      <div class="p-jenjang">
        <p>Playground atau kelompok bermain dalam Nursery</p>
        <p>Kindergarten atau TK dalam Kindergarten</p>
      </div>
    </div>
    <div class="container-jenjang">
      <div class="jenjang-tahun">

        <?php
        $jenjang = query("SELECT * FROM sub_kelompok ORDER BY id_kelompok");
        $i = 1;
        foreach ($jenjang as $sub_kelompok) :
        ?>
          <div
            class="isi-jenjang-tahun"
            data-aos="fade-right"
            data-aos-duration="1000">
            <div class="icon">
              <i class="<?= $sub_kelompok['ikon']; ?>" style="color: #ff6a00"></i>
            </div>
            <div class="info-pg-kg">
              <p class="bold box"><?= $sub_kelompok["tahun"]; ?> Tahun</p>
              <p class="detail"><?= $sub_kelompok["sub_kelompok"]; ?></p>
            </div>
          </div>
        <?php $i++;
        endforeach;
        ?>

      </div>
    </div>
  </section>

  <!-- visi-misi -->
  <section id="visi-misi" data-group="visi-misi">
    <div class="text-visi">
      <div class="icon-petik" data-aos="zoom-in" data-aos-duration="1000">
        <i class="fa-solid fa-quote-left" style="color: #ff6a00"></i>
      </div>
      <h1>
        Mewujudkan generasi
        <span>cerdas, jujur, beretika, berjiwa pemimpin, </span> memiliki
        <span>daya cipta</span> dan <span>inovasi</span>
      </h1>
    </div>
    <div class="container-misi">
      <div class="misi-box">
        <div data-aos="fade-left" data-aos-duration="1000" class="misi">
          <div class="icon">
            <i class="fa-solid fa-person" style="color: rgb(255, 106, 0)"></i>
          </div>
          <div class="text-misi">
            <p class="bold box">Etika dan Kemanusiaan</p>
            <p class="detail">
              Menanamkan pondasi yang kuat dalam beretika dan beragama serta
              menjunjung tinggi nilai kemanusiaan
            </p>
          </div>
        </div>

        <div data-aos="fade-left" data-aos-duration="1000" class="misi">
          <div class="icon">
            <i
              class="fa-solid fa-language"
              style="color: rgb(255, 106, 0)"></i>
          </div>
          <div class="text-misi">
            <p class="bold box">Kecerdasan Bahasa</p>
            <p class="detail">
              Mengembangkan kecerdasan bahasa dengan memberikan lingkungan
              belajar bilingual dalam bahasa Inggris dan Mandarin
            </p>
          </div>
        </div>

        <div data-aos="fade-left" data-aos-duration="1000" class="misi">
          <div class="icon">
            <i class="fa-solid fa-cubes-stacked" style="color: #ff6a00"></i>
          </div>
          <div class="text-misi">
            <p class="bold box">Kritis terhadap Masalah</p>
            <p class="detail">
              Menumbuhkan cara berpikir kritis dan menyelesaikan masalah
              secara cerdas dan kreatif
            </p>
          </div>
        </div>

        <div data-aos="fade-left" data-aos-duration="1000" class="misi">
          <div class="icon">
            <i class="fa-solid fa-book" style="color: rgb(255, 106, 0)"></i>
          </div>
          <div class="text-misi">
            <p class="bold box">Intelektual dan Karakter</p>
            <p class="detail">
              Mengoptimalkan kecerdasan intelektual dan pembentukan karakter
              melalui berbagai program dan kegiatan sekolah
            </p>
          </div>
        </div>

        <div data-aos="fade-left" data-aos-duration="1000" class="misi">
          <div class="icon">
            <i class="fa-solid fa-drum" style="color: rgb(255, 106, 0)"></i>
          </div>
          <div class="text-misi">
            <p class="bold box">Potensi dan Bakat</p>
            <p class="detail">
              Mengoptimalkan potensi dan bakat setiap anak diasah, dilatih,
              dan dikembangkan terus-menerus
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- janji -->
  <section id="janji" data-group="visi-misi">
    <div class="card-janji">
      <div class="left-janji">
        <h1>Janji Sunshine</h1>
        <div class="list-janji">
          <div class="icon-list" data-aos="zoom-in" data-aos-duration="1000">
            <i
              class="fa-solid fa-check"
              style="color: rgb(255, 255, 255)"></i>
          </div>
          <p class="justify">
            Memberikan lingkungan belajar yang nyaman dan cara belajar yang
            menyenangkan
          </p>
        </div>

        <div class="list-janji">
          <div class="icon-list" data-aos="zoom-in" data-aos-duration="1000">
            <i
              class="fa-solid fa-check"
              style="color: rgb(255, 255, 255)"></i>
          </div>
          <p class="justify">
            Memberikan layanan pendidikan holistik dalam kesehatan, pendidikan
            dan pengasuhan, serta perlindungan anak
          </p>
        </div>

        <div class="list-janji">
          <div class="icon-list" data-aos="zoom-in" data-aos-duration="1000">
            <i
              class="fa-solid fa-check"
              style="color: rgb(255, 255, 255)"></i>
          </div>
          <p class="justify">
            Mengoptimalkan perkembangan dengan menyediakan fasilitas sesuai
            dengan minat, bakat, dan ketertarikan
          </p>
        </div>
      </div>
      <div class="right-janji">
        <div class="box-tujuan">
          <div class="star" data-aos="flip-left" data-aos-duration="1000">
            <img src="img/icon/star.png" alt="" />
          </div>
          <div class="list-tujuan">
            <div class="tujuan" data-aos="zoom-in" data-aos-duration="1000">
              <div
                class="icon-tujuan"
                data-aos="zoom-in"
                data-aos-duration="1000">
                <i class="fa-solid fa-dice" style="color: #ff6a00"></i>
              </div>
              <div class="text-tujuan">
                <h3>Potensi & Bakat</h3>
              </div>
            </div>
            <div class="tujuan" data-aos="zoom-in" data-aos-duration="1000">
              <div
                class="icon-tujuan"
                data-aos="zoom-in"
                data-aos-duration="1000">
                <i class="fa-solid fa-brain" style="color: #ff6a00"></i>
              </div>
              <div class="text-tujuan">
                <h3>Kecerdasan Intelektual</h3>
              </div>
            </div>
            <div class="tujuan" data-aos="zoom-in" data-aos-duration="1000">
              <div
                class="icon-tujuan"
                data-aos="zoom-in"
                data-aos-duration="1000">
                <i
                  class="fa-solid fa-ranking-star"
                  style="color: #ff6a00"></i>
              </div>
              <div class="text-tujuan">
                <h3>Karakter Berintegritas Tinggi</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- program -->
  <section id="program" data-group="program">
    <div class="container-program">
      <div class="top-program">
        <div class="title-program">
          <h1>Program Pembelajaran</h1>
          <p>
            Mendukung proses pembelajaran dan perkembangan peserta didik
            secara optimal melalui berbagai kegiatan yang terarah
          </p>
        </div>
        <div class="btn-program">
          <div class="left-arrow">
            <i class="fas fa-angle-left"></i>
          </div>
          <div class="right-arrow">
            <i class="fas fa-angle-right"></i>
          </div>
        </div>
      </div>

      <div class="wrap-program swiper">
        <div class="program-box swiper-wrapper">

          <?php
          $programs = query("SELECT * FROM program");
          $i = 1;
          foreach ($programs as $program) :
          ?>

            <div class="program swiper-slide">
              <div class="img-program">
                <img src="img/program/<?= $program["foto"]; ?>" alt="" />
              </div>
              <div class="name-program">
                <p class="box bold"><?= $program["program"]; ?></p>
                <p><?= $program["deskripsi"]; ?></p>
              </div>
            </div>

          <?php $i++;
          endforeach;
          ?>

        </div>
      </div>
    </div>
  </section>

  <!-- Ekstrakurikuler -->
  <section id="ekskul" data-group="ekskul">
    <div class="left-ekskul">

      <?php
      $ekskuls = query("SELECT * FROM ekskul");
      $i = 1;
      foreach ($ekskuls as $ekskul) :
      ?>

        <div class="ekskul" data-aos="fade-right" data-aos-duration="1000">
          <div class="img-ekskul">
            <img src="img/ekskul/<?= $ekskul["foto"]; ?>" alt="" />
          </div>
          <h3><?= $ekskul["ekskul"]; ?></h3>
        </div>

      <?php $i++;
      endforeach;
      ?>

    </div>
    <div class="right-ekskul box-ekskul">
      <div class="text-ekskul">
        <h1>Ekstrakurikuler</h1>
        <p class="justify">
          Memberikan wadah atau kesempatan peserta didik untuk mengembangkan
          dan mengekspresikan diri sesuai dengan kebutuhan, bakat, dan minat
        </p>
      </div>
    </div>
  </section>

  <!-- prestasi -->
  <section id="prestasi" data-group="prestasi">
    <div class="left-prestasi" data-aos="zoom-in" data-aos-duration="1000">

      <?php
      $prestasi_terbaru = query("SELECT * FROM prestasi ORDER BY tanggal DESC LIMIT 1")[0];
      ?>
      <a href="deskripsiPrestasi.php?id=<?= $prestasi_terbaru['id_prestasi']; ?>">
        <div class="content-prestasi">
          <img src="img/prestasi/<?= $prestasi_terbaru['foto']; ?>" alt="" />
          <div class="text-timpa">
            <h2 data-aos="fade-up" data-aos-duration="1000">
              <?= $prestasi_terbaru['prestasi']; ?>
            </h2>
            <h4 class="tahun" data-aos="fade-up" data-aos-duration="1000">
              <?= date('d F Y', strtotime($prestasi_terbaru['tanggal'])) ?>
            </h4>
          </div>
        </div>
      </a>
    </div>

    <div class="right-prestasi">
      <div class="text-prestasi">
        <h1>Prestasi Sunshine</h1>
        <div class="line-prestasi"></div>
        <a href="prestasi.php" class="btn-prestasi">Lainnya</a>
      </div>

      <div class="box-prestasi" data-aos="fade-up" data-aos-duration="1000">

        <?php
        $winners = query("SELECT * FROM prestasi ORDER BY tanggal DESC LIMIT 3 OFFSET 1");
        $i = 1;
        foreach ($winners as $winner) :
        ?>

          <a href="deskripsiPrestasi.php?id=<?= $winner['id_prestasi']; ?>" class="prestasi">
            <div class="img-prestasi">
              <img src="img/prestasi/<?= $winner['foto']; ?>" alt="" />
            </div>
            <div class="text-right-prestasi">
              <div class="other-prestasi">
                <h3 class="info">
                  <?= $winner['prestasi']; ?>
                </h3>
                <p class="info"><?= date('d F Y', strtotime($winner['tanggal'])); ?></p>
              </div>
              <p class="info detail">
                <?= $winner['deskripsi']; ?>
              </p>
            </div>
          </a>

        <?php $i++;
        endforeach;
        ?>

      </div>
    </div>
  </section>

  <!-- why sunshine -->
  <section id="why" data-group="why">
    <div class="card" data-aos="zoom-in" data-aos-duration="1000">
      <?php
      $foto_keunggulan = query("SELECT * FROM informasi WHERE id=6")[0];
      ?>
      <div class="left-card">
        <img src="img/aset/<?= $foto_keunggulan['isi_field']; ?>" alt="" />
      </div>
      <div class="right-card">
        <h1 data-aos="fade-right" data-aos-duration="1000">Why Sunshine ?</h1>
        <?php
        $keunggulan = query("SELECT * FROM informasi WHERE id=5")[0];
        ?>
        <p class="justify">
          <?= $keunggulan['isi_field']; ?>
        </p>
      </div>
    </div>
  </section>

  <?php include "footer.php"; ?>

  <script src="js/script.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js"></script>
  <script>
    AOS.init();
  </script>
</body>

</html>