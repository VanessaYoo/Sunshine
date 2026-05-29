  <div class="sidebar user" id="toggle-sidebar">
      <div class="container-menu user">
          <div class="logo-bar">
              <img src="../img/aset/logo.png" alt="">
              <h1>Sunshine</h1>
          </div>

          <ul class="menu user">
              <li class="<?= ($page == 'beranda') ? 'active' : ''; ?>">
                  <a href="user-beranda.php">
                      <i class="fa-solid fa-home"></i>
                      <span>Beranda</span>
                  </a>
              </li>
              <li class="<?= ($page == 'pendaftaran') ? 'active' : ''; ?>">
                  <a href="user-pendaftaran.php">
                      <i class="fa-solid fa-file-lines"></i>
                      <span>Pendaftaran</span>
                  </a>
              </li>
              <li class="<?= ($page == 'pengumuman') ? 'active' : ''; ?>">
                  <a href="user-pengumuman.php">
                      <i class="fa-solid fa-bullhorn"></i>
                      <span>Pengumuman</span>
                  </a>
              </li>
              <li class="<?= ($page == 'biaya') ? 'active' : ''; ?>">
                  <a href="user-biaya.php">
                      <i class="fa-solid fa-wallet"></i>
                      <span>Biaya</span>
                  </a>
              </li>
          </ul>

          <ul class="menu user">
              <div class="group-menu">
                  <li class="logout-bar">
                      <a href="../logout.php" onclick="return confirm('Apakah Anda yakin untuk logout dari Sunshine?');">
                          <i class="fa-solid fa-right-from-bracket"></i>
                          <span>Logout</span>
                      </a>
                  </li>
              </div>
          </ul>
      </div>
  </div>

  <div class="halaman">
      <!-- judul dan nama -->
      <div class="user-title">
          <div class="icon-nav user">
              <i
                  onclick="toggleSidebar()"
                  class="fa-solid fa-bars"
                  style="color: black"></i>
          </div>
          
          <h3><?= ucfirst($page); ?></h3>
          <div class="user-name">
              <h3>Vanessa Fransiska</h3>
              <p class="user">Siswa</p>
          </div>
      </div>