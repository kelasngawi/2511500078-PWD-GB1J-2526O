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
      ?>
        <h2>Tentang Saya &#128100;</h2>
        <p>
          <strong>NIM:</strong>
          <?php echo $nim; 
          ?>
        </p>
        <p><strong>NAMA:</strong><?php echo $nama; ?> &#128526;</p>
        <p><strong>TEMPAT LAHIR:</strong>Pangkalpinang</p>
        <p><strong>TANGGAL LAHIR:</strong>31 Mei 2005</p>
        <p><strong>HOBI:</strong>Membaca Buku &#x1F4DA;</p>
        <p><strong>PASANGAN:</strong>furina de fontaine &#128149;</p>
        <p><strong>PEKERJAAN:</strong>Tidak ada</p>
        <p><strong>NAMA ORANG TUA:</strong>Bapak Sumarna dan Ibu Djuliani&#x1F469;&#x2764;&#x1F468;</p>
        <p><strong>NAMA KAKAK:</strong>Juanda</p>
        <p><strong>NAMA ADIK:</strong>Tidak ada</p>
        
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