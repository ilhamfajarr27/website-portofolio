
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Website Ilham</title>
  <link rel="stylesheet" href="index.css">
</head>
<body>
    <header>
        <nav>
          <ul>
            <li><a href="#beranda">Beranda</a></li>
            <li><a href="#tentang-saya">Tentang Saya</a></li>
            <li><a href="#Portofolio">Portofolio</a></li>
            <li class="dropdown">
              <a href="#">Lainnya</a>
              <div class="dropdown-content">
                <a href="https://www.instagram.com/ilham.fajarrr" target="_blank">Instagram</a>
               <a href="https://www.facebook.com/Ilham Fajar">Facebook</a>
                <a href="https://www.tiktok.com/@ilham.fajarr" target="_blank">Tiktok</a>
              </div> 
            </li>
          </ul>
        </nav>
      </header>
  <main>
    <section id="beranda" class="beranda">
        <div class="fotoku">
              <img src="0606bfd1-4999-4387-aaf6-0b42a91b139b.jpg" alt="ilham">
        </div>
        <div class="deskripsi">
          <h1>Halo, Saya Ilham Fajar Akbar</h1>
          <p>Saya merupakan mahasiswa aktif semester 2 Program Studi Teknik Informatika, di Universitas Nahdlatul Ulama Sunan Giri dan Saya bercita cita sebagai Seorang Web Developer.</p>
        </div>
    </section>
    
<hr>

    <section id="tentang-saya" class="tentang-saya">
      <div class="perkenalan">
        <h2>Tentang Saya, </h2>
        <p>Halo! Nama saya Ilham Fajar Akbar, seorang yang memiliki ketertarikan besar di bidang desain grafis dan pengembangan web. Saya adalah pribadi yang kreatif, suka belajar hal-hal baru, dan senang berkolaborasi dalam tim

          Sekarang saya sedang melanjutkan studi di Universitas Nahdlatul Ulama Sunan Giri Bojonegoro, dan sedang belajar membuat website data diri.
          
          Tujuan saya adalah menjadi seorang Web Developer Profesional yang mampu menciptakan solusi digital yang bermanfaat bagi banyak orang.
          </p>
      </div>
      <div class="fotoku2">
        <img src="WhatsApp Image 2025-04-21 at 14.56.33_c03e45ed.jpg" alt="foto" class="foto-item" style="width: 300px;">
      </div>
    </section>

  <hr>
<section id="Portofolio" class="portofolio">
  <h2>Portofolio</h2>
  <br>

  <!-- Toggle Button ke halaman tambah -->
  <div style="margin-bottom: 20px;">
    <a href="tambah.php">
      <button type="button">➕ Tambah Portofolio</button>
    </a>
  </div>

  <table>
    <thead>
      <tr>
        <th class="nomor">No</th>
        <th class="nomor">Nama Kegiatan</th>
        <th class="nomor">Waktu Kegiatan</th>
        <th class="nomor">Aksi</th> <!-- Kolom baru untuk aksi -->
      </tr>
    </thead>
    <tbody>
      <?php
      $koneksi = new mysqli("localhost", "root", "", "db_ti2b");
      if ($koneksi->connect_error) {
        die("Koneksi gagal: " . $koneksi->connect_error);
      }

      $sql = "SELECT * FROM db_ilham";
      $result = $koneksi->query($sql);
      $no = 1;

      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td class='nomor'>" . $no++ . "</td>";
          echo "<td>" . htmlspecialchars($row['nama_kegiatan']) . "</td>";
          echo "<td>" . htmlspecialchars($row['waktu_kegiatan']) . "</td>";
          // Tambahan tombol aksi edit dan hapus
          echo "<td class='aksi'>";
          echo "<a href='edit.php?id=" . $row['id_portofolio'] . "' class='edit-btn'>✏️ Edit</a> | ";
          echo "<a href='hapus.php?id=" . $row['id_portofolio'] . "' onclick=\"return confirm('Yakin ingin menghapus data ini?')\" class='hapus-btn'>🗑️ Hapus</a>";
          echo "</td>";
          echo "</tr>";
        }
      } else {
        echo "<tr><td colspan='4'>Tidak ada data</td></tr>";
      }

      $koneksi->close();
      ?>
    </tbody>
  </table>
</section>


  <hr>

  <section class="opini">
    <h2>Opini : </h2>
    <div class="grid-opini">
      <div class="item-opini">
        <a href="https://www.detik.com/edu/detikpedia/d-7657071/manfaat-belajar-coding-dan-prospek-kerjanya" target="_blank"><img src="2f0df79a-1b82-471e-ab53-f102f962512a.jpeg" alt="Opini 1"><p>"Manfaat Belajar Coding dan Prospek Kerjanya"</p></a>
      </div>
      <div class="item-opini">
        <a href="https://unugiri.ac.id/" target="_blank"><img src="maxresdefault.jpg" alt="Opini 2"><p>Segera!!! Daftar di UNUGIRI</p></a>
      </div>
      <div class="item-opini">
        <a href="https://rencanamu.id/cari-jurusan/komputer-teknologi/teknik-informatika" target="_blank"><img src="jurusan-teknik-infomatika-min.jpg" alt="opini 3"><p>Apa itu Teknik Informatika?</p></a>
      </div>
      <div class="item-opini">
        <a href="https://akupintar.id/info-pintar/-/blogs/daftar-kampus-di-bojonegoro-paling-favorit" target="_blank"><img src="bojonegoro.jpg" alt="Opini 4"><p>Universitas Nahdlatul Ulama Sunan Giri Menjadi tempat kuliah terbaik dan favorit di Bojonegoro</p></a>
      </div>
      <div class="item-opini">
        <a href="https://www.w3schools.com/" target="_blank"><img src="Screenshot 2025-04-24 115131.png" alt="opini 5"><p>Website untuk belajar bahasa pemrograman</p></a>
      </div>
      <div class="item-opini">
        <a href="https://codingbee.id/bahasa-pemrograman-populer/" target="_blank"><img src="bahasa-pemrograman-2.jpg" alt="hhh"><p>15 Bahasa Pemrograman Terpopuler: Pilihan Utama Para Programmer</p></a>
      </div>
    </div>
  </section>
      
  <hr>

  <section class="kontak">
    <h2>Hubungi Saya :</h2>
    <div class="kontak-container">
      <form action="#" method="post" class="form-kontak">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" required>

        <label for="subjek">Subjek:</label>
        <input type="text" id="subjek" name="subjek" required>

        <label for="pesan">Pesan:</label>
        <textarea id="pesan" name="pesan" rows="4" required></textarea>

        <button type="submit">Kirim</button>
      </form>

      <div class="map-kontak">
        <p class="map">Maps :</p>
        <iframe 
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3958.1422162185254!2d111.94167017357056!3d-7.22461487094075!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e778100798d0d8b%3A0xd8e786248d5330b!2sSIDOBANDUNG%20BUMI%20TRISULA!5e0!3m2!1sen!2sid!4v1745471708168!5m2!1sen!2sid" 
          frameborder="0" allowfullscreen></iframe>
      </div>
    </div>
  </section>

   <hr> 

  </main>

  <footer>
    <p>&copy;  Ilham Fajar 2025</p>
  </footer>

</body>
</html>