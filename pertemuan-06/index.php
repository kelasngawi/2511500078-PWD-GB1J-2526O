<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Judul Halaman</title>
<link rel="stylesheet" href="style.css">
</head>

<body>
  <header>
    <h1>ini header</h1>
    <button class="menu-toggle" id="menuToggle" aria-label="Toggle Navigation">
        &#9776;
    </button>
    <nav>
        <ul>
            <li><a href="#home">Beranda</a></li>
            <li><a href="#about">Tentang</a></li>
            <li><a href="#contact">Kontak</a></li>
        </ul>
    </nav>
  </header>

  <main>
    <section id="home">
        <h2>selamat datang</h2>
        <p>ini contoh paragraf html</p>
        <?php
        echo "Halo, Dunia!<br>";
        echo "nama saya ade putra";
        ?>
    </section>

    <section id="about">
      <?php
       $nim = 2511500078;
       $nama = "Ade Putra";
       $tempat_lahir = "Pangkalpinang";
       $tanggal_lahir = "31 Mei 2005";
       $hobi = "Membaca Buku";
       $pasangan = "furina de fontaine";
       $pekerjaan = "Tidak ada";
       $nama_ortu = "Bapak Sumarna dan Ibu Djuliani";
       $nama_kakak = "Juanda";
       $nama_adik = "Tidak ada";
      ?>
        <h2>Tentang Saya &#128100;</h2>
        <p>
          <strong>NIM:</strong>
          <?php echo $nim; 
          ?>
        </p>
        <p><strong>NAMA:</strong><?php echo $nama; ?> &#128526;</p>
        <p><strong>TEMPAT LAHIR:</strong><?php echo $tempat_lahir; ?></p>
        <p><strong>TANGGAL LAHIR:</strong><?php echo $tanggal_lahir; ?></p>
        <p><strong>HOBI:</strong><?php echo $hobi; ?> &#x1F4DA;</p>
        <p><strong>PASANGAN:</strong><?php echo $pasangan; ?> &#128149;</p>
        <p><strong>PEKERJAAN:</strong><?php echo $pekerjaan; ?></p>
        <p><strong>NAMA ORANG TUA:</strong><?php echo $nama_ortu; ?> &#x1F469;&#x2764;&#x1F468;</p>
        <p><strong>NAMA KAKAK:</strong><?php echo $nama_kakak; ?></p>
        <p><strong>NAMA ADIK:</strong><?php echo $nama_adik; ?></p>
        
    </section>
    <section id="contact">
        <h2>kontak saya &#x1F4E7;</h2>
        <form action="" method="Get">
            <label for="txtname">Nama:</label>
            <input type="text" id="txtname" name="txtname" placeholder="masukkan nama" required autocomplete="name">

            <label for="email">Email:</label>
            <input type="text" id="txtemail" name="email" placeholder="masukkan email" required autocomplete="email">

            <label for="txtmessage">Pesan:</label>
            <textarea name="message" id="txtmessage" placeholder="Tulis pesan Anda di sini..." required></textarea>

            <button type="submit">Kirim</button>
            <button type="reset">Batal</button>
        </form>
    </section>
  </main>
  <footer>
    <p>&copy; &#9786; 2025 Ade Putra 2511500078</p>
  </footer>

  <script src="script.js"></script>
</body>
</html>