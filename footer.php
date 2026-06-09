<footer id="footer">
  <div class="isi-footer">
    <div class="left-footer" data-aos="fade-up" data-aos-duration="1000">
      <a href="index.php">
        <h2>Sunshine</h2>
      </a>
      <div class="text-footer">
        <?php
        $lokasi_tertulis = query("SELECT * FROM informasi WHERE id=3")[0];
        ?>
        <p>
          <?= $lokasi_tertulis['isi_field']; ?>
        </p>
        <?php
        $lokasi_map = query("SELECT * FROM informasi WHERE id=4")[0];
        ?>
        <iframe
          src="<?= $lokasi_map['isi_field']; ?>"
          width="400"
          height="200"
          style="border: 0"
          allowfullscreen=""
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"
          target="_blank"></iframe>
      </div>
    </div>

    <div class="right-footer" data-aos="fade-up" data-aos-duration="800">
      <div class="format-footer">
        <h2>Informasi</h2>
        <div class="line"></div>

        <div class="text-footer">
          <a href="#tentang">Tentang</a>
          <a href="#visi-misi">Visi & Misi</a>
          <a href="#program">Program</a>
          <a href="#ekskul">Ekstrakurikuler</a>
          <a href="#prestasi">Prestasi</a>
        </div>
      </div>

      <div class="format-footer">
        <h2>Kontak Kami</h2>
        <div class="line"></div>
        <div class="text-footer">
          <?php
          $kontak = query("SELECT * FROM kontak");
          $i = 1;
          foreach ($kontak as $nomor) :
          ?>
            <a href="<?= $nomor['link']; ?>" target="_blank">
              <div class="list-kontak">
                <p><?= $nomor['kontak']; ?></p>
              </div>
            </a>
          <?php $i++;
          endforeach;
          ?>
        </div>
      </div>
      <div class="format-footer">
        <h2>Ikuti Kami</h2>
        <div class="line"></div>

        <div class="icon-medsos">
          <?php
          $media_sosial = query("SELECT * FROM medsos");
          $i = 1;
          foreach ($media_sosial as $medsos) :
          ?>
            <a
              href="<?= $medsos['link']; ?>"
              target="_blank"><i class="<?= $medsos['ikon']; ?>" style="color: white"></i></a>
          <?php $i++;
          endforeach;
          ?>
        </div>
      </div>
    </div>
  </div>

  <div class="bottom-footer">
    <p>&copy 2025 Sunshine. All Rights Reserved.</p>
  </div>
</footer>