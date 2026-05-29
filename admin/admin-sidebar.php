  <div class="icon-nav admin" onclick="toggleSidebarAdmin()">
      <i class="fa-solid fa-bars"></i>
  </div>
  
  <div class="sidebar admin">
      <div class="container-menu admin">
          <div class="logo-bar">
              <img src="../img/aset/logo.png" alt="">
              <h1>Sunshine</h1>
          </div>

          <ul class="menu admin">
              <li class="<?= ($page == 'dashboard') ? 'active' : ''; ?>">
                  <a href="admin-beranda.php">
                      <i class="fa-solid fa-home"></i>
                      <span>Dashboard</span>
                  </a>
              </li>
          </ul>

          <ul class="menu admin">
              <div class="group-menu-kelola">
                  <p>Kelola Pendaftaran</p>
                  <li class="<?= ($page == 'pendaftaran') ? 'active' : ''; ?>">
                      <a href="admin-pendaftaran.php">
                          <i class="fa-solid fa-users"></i>
                          <span>Pendaftaran</span>
                      </a>
                  </li>
                  <li class="<?= ($page == 'biaya') ? 'active' : ''; ?>">
                      <a href="admin-biaya.php">
                          <i class="fa-solid  fa-wallet"></i>
                          <span>Biaya</span>
                      </a>
                  </li>
              </div>

              <div class="group-menu-kelola">
                  <p>Kelola Informasi</p>
                  <li class="<?= ($page == 'profil') ? 'active' : ''; ?>">
                      <a href="admin-profil.php">
                          <i class="fa-solid fa-circle-info"></i>
                          <span>Profil</span>
                      </a>
                  </li>
                  <li class="<?= ($page == 'jenjang') ? 'active' : ''; ?>">
                      <a href="admin-jenjang.php">
                          <i class="fa-solid fa-school"></i>
                          <span>Jenjang</span>
                      </a>
                  </li>
                  <li class="<?= ($page == 'visi-misi') ? 'active' : ''; ?>">
                      <a href="admin-vm.php">
                          <i class="fa-solid fa-bullseye"></i>
                          <span>Visi dan Misi</span>
                      </a>
                  </li>
                  <li class="<?= ($page == 'program') ? 'active' : ''; ?>">
                      <a href="admin-program.php">
                          <i class="fa-solid fa-book-open"></i>
                          <span>Program</span>
                      </a>
                  </li>
                  <li class="<?= ($page == 'ekskul') ? 'active' : ''; ?>">
                      <a href="admin-ekskul.php">
                          <i class="fa-solid fa-futbol"></i>
                          <span>Ekstrakurikuler</span>
                      </a>
                  </li>
                  <li class="<?= ($page == 'prestasi') ? 'active' : ''; ?>">
                      <a href="admin-prestasi.php">
                          <i class="fa-solid fa-trophy"></i>
                          <span>Prestasi</span>
                      </a>
                  </li>
                  <li class="<?= ($page == 'keunggulan') ? 'active' : ''; ?>">
                      <a href="admin-keunggulan.php">
                          <i class="fa-solid fa-star"></i>
                          <span>Keunggulan</span>
                      </a>
                  </li>
                  <li class="<?= ($page == 'kontak') ? 'active' : ''; ?>">
                      <a href="admin-kontak.php">
                          <i class="fa-solid fa-location-dot"></i>
                          <span>Lokasi dan Kontak</span>
                      </a>
                  </li>
              </div>

          </ul>

          <ul class="menu admin">
              <div class="group-menu">
                  <li class="logout-bar admin">
                      <a href="../logout.php" onclick="return confirm('Apakah Anda yakin untuk logout dari Sunshine?');">
                          <i class="fa-solid fa-right-from-bracket"></i>
                          <span>Logout</span>
                      </a>
                  </li>
              </div>
          </ul>
      </div>
  </div>