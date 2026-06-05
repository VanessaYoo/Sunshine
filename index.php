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
      <div class="right-nav">
        <a
          href="login.php"
          class="btn-login right-nav">
          <div class="text-login">Login Akun</div>
          <div class="icon-login">
            <img src="img/icon/contact.png" alt="" />
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
  <section id="top">
    <div class="text-top">
      <div
        class="text-line-top"
        data-aos="fade-right"
        data-aos-duration="1000">
        <div class="line"></div>
        <p class="p-top head white">Awal Kecil untuk Mimpi yang Besar</p>
      </div>
      <h1 class="h1-top" data-aos="fade-right" data-aos-duration="1000">
        Tumbuh Ceria, Berkembang Hebat
      </h1>
      <p class="p-top white" data-aos="fade-right" data-aos-duration="1000">
        Tempat belajar yang mendukung tumbuh kembang anak dalam suasana yang
        menyenangkan
      </p>
      <div data-aos="fade-up" data-aos-duration="1000"><a href="login.php" class="daftar">
          <p>Daftar Sekarang</p>
        </a></div>
    </div>
  </section>

  <!-- tentang -->
  <section id="tentang" data-group="tentang">
    <div class="left-tentang" data-aos="fade-right" data-aos-duration="1000">
      <img src="img/aset/sekolah.jpeg" alt="" />
    </div>
    <div class="right-tentang">
      <div class="text-tentang">
        <div class="head-tentang">
          <h1>Selamat Datang di <span>Sunshine</span></h1>
          <p class="justify">
            KB-TK Cahaya Mentari atau biasa dikenal dengan sebutan Sunshine
            didirikan sejak tahun 2006. Sunshine menciptakan pengalaman belajar yang menyenangkan
            melalui metode interaktif dengan suasana belajar yang mendukung,
            dan menyenangkan, sehingga memberikan perasaan positif dalam
            proses belajar. Sunshine mendukung perkembangan anak dari akademik, kesehatan,
            karakter, hingga keterampilan sosial supaya potensi, minat, dan
            bakat dapat tumbuh secara optimal dan percaya diri
          </p>
        </div>
        <div class="isi-tentang">
          <div class="first-text-tentang">
            <p class="bold">Lokasi Sunshine</p>
            <p class="justify">
              Jalan Merdeka No.
              603-601, Mariana, Kecamatan Pontianak Kota, Kota Pontianak,
              Kalimantan Barat 78244.
            </p>
          </div>
          <div class="first-text-tentang">
            <p class="bold">Jam Operasional</p>
            <p class="justify">
              Senin - Jumat: 7.00 AM - 4.50 PM

            </p>
            <p class="justify">
              Sabtu: 8.00 AM - 1.00 PM
            </p>
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
        <div
          class="isi-jenjang-tahun"
          data-aos="fade-right"
          data-aos-duration="1000">
          <div class="icon">
            <i class="fa-solid fa-car-side" style="color: #ff6a00"></i>
          </div>
          <div class="info-pg-kg">
            <p class="bold box">2 Tahun</p>
            <p class="detail">Nursery 1</p>
          </div>
        </div>

        <div
          class="isi-jenjang-tahun"
          data-aos="fade-right"
          data-aos-duration="1000">
          <div class="icon">
            <i class="fa-solid fa-cake-candles" style="color: #ff6a00"></i>
          </div>
          <div class="info-pg-kg">
            <p class="bold box">3 Tahun</p>
            <p class="detail">Nursery 2</p>
          </div>
        </div>

        <div class="line-pg-kg"></div>

        <div
          class="isi-jenjang-tahun"
          data-aos="fade-left"
          data-aos-duration="1000">
          <div class="icon">
            <i class="fa-solid fa-book" style="color: #ff6a00"></i>
          </div>
          <div class="info-pg-kg">
            <p class="bold box">4 Tahun</p>
            <p class="detail">Kindergarten 1</p>
          </div>
        </div>

        <div
          class="isi-jenjang-tahun"
          data-aos="fade-left"
          data-aos-duration="1000">
          <div class="icon">
            <i class="fa-solid fa-graduation-cap" style="color: #ff6a00"></i>
          </div>
          <div class="info-pg-kg">
            <p class="bold box">5 Tahun</p>
            <p class="detail">Kindergarten 2</p>
          </div>
        </div>
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
          <div class="program swiper-slide">
            <div class="img-program">
              <img src="img/program/sensory-play.jpeg" alt="" />
            </div>
            <div class="name-program">
              <p class="box bold">Sensory play</p>
              <p>Kegiatan yang merangsang seluruh indera tubuh anak</p>
            </div>
          </div>

          <div class="program swiper-slide">
            <div class="img-program">
              <img src="img/program/hanyu.jpeg" alt="" />
            </div>
            <div class="name-program">
              <p class="box bold">Han Yu Le Yuan</p>
              <p>
                Pembelajaran Bahasa Mandarin yang disusun untuk anak usia dini
              </p>
            </div>
          </div>

          <div class="program swiper-slide">
            <div class="img-program">
              <img src="img/program/outdoor-activity.jpeg" alt="" />
            </div>
            <div class="name-program">
              <p class="box bold">Outdoor Activity</p>
              <p>Aktivitas menguatkan otot melalui kegiatan fisik</p>
            </div>
          </div>

          <div class="program swiper-slide">
            <div class="img-program">
              <img src="img/program/life-skill.jpeg" alt="" />
            </div>
            <div class="name-program">
              <p class="box bold">Life Skill</p>
              <p>Pengembangan keterampilan motorik halus dan kasar</p>
            </div>
          </div>

          <div class="program swiper-slide">
            <div class="img-program">
              <img src="img/program/fun-math.jpeg" alt="" />
            </div>
            <div class="name-program">
              <p class="box bold">Fun Math</p>
              <p>
                Bermain sambil belajar matematika dengan cara yang
                menyenangkan
              </p>
            </div>
          </div>

          <div class="program swiper-slide">
            <div class="img-program">
              <img src="img/program/letterland.png" alt="" />
            </div>
            <div class="name-program">
              <p class="box bold">Letterland</p>
              <p>
                Program berbasis fonik atau phonics yang menggunakan karakter
                unik
              </p>
            </div>
          </div>

          <div class="program swiper-slide">
            <div class="img-program">
              <img src="img/program/bahasa-indonesia.jpeg" alt="" />
            </div>
            <div class="name-program">
              <p class="box bold">Bahasa Indonesia</p>
              <p>Meningkatkan kemampuan bahasa Indonesia dengan baik</p>
            </div>
          </div>

          <div class="program swiper-slide">
            <div class="img-program">
              <img src="img/program/story-telling.jpeg" alt="" />
            </div>
            <div class="name-program">
              <p class="box bold">Story Telling</p>
              <p>Kegiatan sosial dan budaya dalam berbagi cerita</p>
            </div>
          </div>

          <div class="program swiper-slide">
            <div class="img-program">
              <img src="img/program/english.jpeg" alt="" />
            </div>
            <div class="name-program">
              <p class="box bold">I Love English</p>
              <p>Membantu anak mengenali kosakata dengan mudah</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Ekstrakurikuler -->
  <section id="ekskul" data-group="ekskul">
    <div class="left-ekskul">
      <div class="ekskul" data-aos="fade-right" data-aos-duration="1000">
        <div class="img-ekskul">
          <img src="img/ekskul/dance.png" alt="" />
        </div>
        <h3>Dance</h3>
      </div>
      <div class="ekskul" data-aos="fade-right" data-aos-duration="1000">
        <div class="img-ekskul">
          <img src="img/ekskul/wushu.png" alt="" />
        </div>
        <h3>Wushu</h3>
      </div>
      <div class="ekskul" data-aos="fade-right" data-aos-duration="1000">
        <div class="img-ekskul">
          <img src="img/ekskul/literasi.png" alt="" />
        </div>
        <h3>Literasi</h3>
      </div>
      <div class="ekskul" data-aos="fade-left" data-aos-duration="1000">
        <div class="img-ekskul">
          <img src="img/ekskul/band.png" alt="" />
        </div>
        <h3>Marching Band</h3>
      </div>
      <div class="ekskul" data-aos="fade-left" data-aos-duration="1000">
        <div class="img-ekskul">
          <img src="img/ekskul/paint.png" alt="" />
        </div>
        <h3>Menggambar & Mewarnai</h3>
      </div>
      <div class="ekskul" data-aos="fade-left" data-aos-duration="1000">
        <div class="img-ekskul">
          <img src="img/ekskul/mic.png" alt="" />
        </div>
        <h3>Public Speaking</h3>
      </div>
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
      <a href="deskripsiPrestasi.php">
        <div class="content-prestasi">
          <img src="img/prestasi/1.webp" alt="" />
          <div class="text-timpa">
            <h2 data-aos="fade-up" data-aos-duration="1000">
              Consolation Prize Lomba Mewarnai, Menggunting, dan Menempel
            </h2>
            <h4 class="tahun" data-aos="fade-up" data-aos-duration="1000">
              28 Januari 2026
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
        <a href="deskripsiPrestasi.php" class="prestasi">
          <div class="img-prestasi">
            <img src="img/prestasi/2.webp" alt="" />
          </div>
          <div class="text-right-prestasi">
            <div class="other-prestasi">
              <h3 class="info">
                Juara 5 Lomba Mewarnai, Menggunting, dan Menempel
              </h3>
              <p class="info">28 Januari 2026</p>
            </div>
            <p class="info detail">
              Selamat kepada Crystabelle Queency Suninto atas pencapaian
              prestasi pada lomba mewarnai, menggunting, dan menempel dalam
              rangka IGTKI tingkat Kecamatan Pontianak Kota
            </p>
          </div>
        </a>
        <a href="deskripsiPrestasi.php" class="prestasi">
          <div class="img-prestasi">
            <img src="img/prestasi/3.webp" alt="" />
          </div>
          <div class="text-right-prestasi">
            <div class="other-prestasi">
              <h3 class="info">Juara 6 Jurus Dasar TK Putri (Group C)</h3>
              <p class="info">15 November 2025</p>
            </div>
            <p class="info detail">
              Selamat kepada Aurora Brielle Indra atas pencapaian prestasi
              pada lomba jurus dasar TK Putri (Grup C) dalam rangka Wushu Kubu
              Raya Championship 2025 yang diselenggarakan di Gaia Mall
            </p>
          </div>
        </a>
        <a href="deskripsiPrestasi.php" class="prestasi">
          <div class="img-prestasi">
            <img src="img/prestasi/4.webp" alt="" />
          </div>
          <div class="text-right-prestasi">
            <div class="other-prestasi">
              <h3 class="info">Juara 3 Jurus Dasar TK Putri (Group B)</h3>
              <p class="info">15 November 2025</p>
            </div>
            <p class="info detail">
              Selamat kepada Jilian Alimwijaya atas pencapaian prestasi dalam
              meraih Juara 3 pada lomba jurus dasar TK Putri (Grup B) dalam
              rangka Wushu Kubu Raya Championship 2025 yang diselenggarakan di
              Gaia Mall
            </p>
          </div>
        </a>
      </div>
    </div>
  </section>

  <!-- why sunshine -->
  <section id="why" data-group="why">
    <div class="card" data-aos="zoom-in" data-aos-duration="1000">
      <div class="left-card">
        <img src="img/aset/foto-bersama-2.png" alt="" />
      </div>
      <div class="right-card">
        <h1 data-aos="fade-right" data-aos-duration="1000">Why Sunshine ?</h1>
        <p class="justify">
          Sunshine mencetak generasi unggul yang sehat, cerdas, kreatif, dan
          beraklakul karimah dengan upaya menjadi tempat terbaik bagi
          anak-anak untuk tumbuh dan berkembang dalam suasana yang penuh kasih
          sayang dan pendidikan berkualitas.
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