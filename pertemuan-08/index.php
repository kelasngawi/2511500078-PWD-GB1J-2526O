<?php
session_start();
  $sesname = $_SESSION["sesname"] ; 
  $sesemail = $_SESSION["sesemail"];
  $sespesan = $_SESSION["sespesan"];
 echo $sesname . $sesemail . $sespesan;  
    ?>
  <?php
  $sesnim = $_SESSION["sesNIM"];
  $sesnama = $_SESSION["sesNama"];
  $sestempat_lahir = $_SESSION["sesTempat_lahir"];
  $sestanggal_lahir = $_SESSION["sesTanggal_lahir"];
  $seshobi = $_SESSION["sesHobi"];
  $sespasangan = $_SESSION["sesPasangan"];
  $sespekerjaan = $_SESSION["sesPekerjaan"];
  $sesnama_ortu = $_SESSION["sesNama_Ortu"];
  $sesnama_kakak = $_SESSION["sesNama_Kakak"];
  $sesnama_adik = $_SESSION["sesNama_Adik"];
  echo $sesnim . $sesnama . $sestempat_lahir . $sestanggal_lahir . $seshobi . $sespasangan . $sespekerjaan . $sesnama_ortu . $sesnama_kakak . $sesnama_adik;
?>
  
  
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
    <h1>Ini Header</h1>
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
      <h2>Selamat Datang</h2>
      <?php
      echo "halo dunia!<br>";
      echo "nama saya hadi";
      ?>
      <p>Ini contoh paragraf HTML.</p>
    </section>

    <section id="Entry Data Mahasiswa"> 
      <h2>Entry Data Mahasiswa</h2>
      <form action="proses.php" method="POST">

        <label for="txtNIM"><span>NIM:</span>
          <input type="text" id="txtNIM" name="txtNIM" placeholder="Masukkan NIM" required autocomplete="nim">
        </label>

        <label for="txtNama"><span>Nama Lengkap:</span>
          <input type="text" id="txtNama" name="txtNama" placeholder="Masukkan Nama Lengkap" required autocomplete="nama">
        </label>

        <label for="txtTempat_lahir"><span>Tempat Lahir:</span>
          <input type="text" id="txtTempat_lahir" name="txtTempat_lahir" placeholder="Masukkan Tempat Lahir" required autocomplete="tempat lahir">
        </label>

        <label for="txtTanggal_lahir"><span>Tanggal Lahir:</span>
          <input type="date" id="txtTanggal_lahir" name="txtTanggal_lahir" placeholder="Masukkan Tanggal Lahir" required autocomplete="tanggal lahir">
        </label>

        <label for="txtHobi"><span>Hobi:</span>
          <input type="text" id="txtHobi" name="txtHobi" placeholder="Masukkan Hobi" required autocomplete="hobi">
        </label>

        <label for="txtPasangan"><span>Pasangan:</span>
          <input type="text" id="txtPasangan" name="txtPasangan" placeholder="Masukkan Pasangan" required autocomplete="pasangan">
        </label>

        <label for="txtPekerjaan"><span>Pekerjaan:</span>
          <input type="text" id="txtPekerjaan" name="txtPekerjaan" placeholder="Masukkan Pekerjaan" required autocomplete="pekerjaan">
        </label>

        <label for="txtNama_Ortu"><span>Nama Orang Tua:</span>
          <input type="text" id="txtNama_Ortu" name="txtNama_Ortu" placeholder="Masukkan Nama Orang Tua" required autocomplete="nama_ortu">
        </label>

        <label for="txtNama_Kakak"><span>Nama Kakak:</span>
          <input type="text" id="txtNama_Kakak" name="txtNama_Kakak" placeholder="Masukkan Nama Kakak" required autocomplete="nama_kakak">
        </label>
        <label for="txtNama_Adik"><span>Nama Adik:</span>
          <input type="text" id="txtNama_Adik" name="txtNama_Adik" placeholder="Masukkan Nama Adik" required autocomplete="nama_adik">
        </label>
        <button type="submit">Kirim</button>
        <button type="reset">Batal</button>
      </form>
      <h2>Data yang diinputkan</h2>
      <p>
        NIM : <strong><?php echo $sesnim ?></strong>
      </p>
      <p>
        Nama : <strong><?php echo $sesnama ?></strong>
      </p>
      <p>
        Tempat lahir : <strong><?php echo $sestempat_lahir ?></strong>
      </p>
      <p>
        Tanggal lahir : <strong><?php echo $sestanggal_lahir ?></strong>
      </p>
      <p>
        Hobi : <strong><?php echo $seshobi ?></strong>
      </p>
      <p>
        Pasangan : <strong><?php echo $sespasangan ?></strong>
      </p>
      <p>
        Pekerjaan : <strong><?php echo $sespekerjaan ?></strong>
      </p>
      <p>
        Nama Orang Tua : <strong><?php echo $sesnama_ortu ?></strong>
      </p>
      <p>
        Nama Kakak : <strong><?php echo $sesnama_kakak ?></strong>
      </p>
      <p>
        Nama Adik : <strong><?php echo $sesnama_adik ?></strong>
      </p>

    </section>

    <section id="about">
      <?php
      $nim = 2511500010;
      $NIM = '0344300002';
      $nama = "Say'yid Abdullah";
      $Nama = 'Al\'kautar Benyamin';
      ?>
      <h2>Tentang Saya</h2>
      <p><strong>NIM:</strong>
        <?php
        echo $NIM;
        ?>
      </p>
      <p><strong>Nama Lengkap:</strong>
        <?php
        echo $Nama;
        ?> &#128526;
      </p>
      <p><strong>Tempat Lahir:</strong> Pangkalpinang</p>
      <p><strong>Tanggal Lahir:</strong> 1 Januari 2000</p>
      <p><strong>Hobi:</strong> Memasak, coding, dan bermain musik &#127926;</p>
      <p><strong>Pasangan:</strong> Belum ada &hearts;</p>
      <p><strong>Pekerjaan:</strong> Dosen di ISB Atma Luhur &copy; 2025</p>
      <p><strong>Nama Orang Tua:</strong> Bapak Setiawan dan Ibu Maria</p>
      <p><strong>Nama Kakak:</strong> Antonius Setiawan</p>
      <p><strong>Nama Adik:</strong> Christina Setiawan</p>
    </section>

    <section id="contact">
      <h2>Kontak Kami</h2>
      <form action="proses.php" method="POST">

        <label for="txtName"><span>Name:</span>
          <input type="text" id="txtName" name="txtName" placeholder="Masukkan name" required autocomplete="name">
        </label>

        <label for="txtEmail"><span>Email:</span>
          <input type="email" id="txtEmail" name="txtEmail" placeholder="Masukkan email" required autocomplete="email">
        </label>

        <label for="txtPesan"><span>Pesan Anda:</span>
          <textarea id="txtPesan" name="txtPesan" rows="4" placeholder="Tulis pesan anda..." required></textarea>
          <small id="charCount">0/200 karakter</small>
        </label>


        <button type="submit">Kirim</button>
        <button type="reset">Batal</button>
      </form>
      <h2>yang menghubungi kami</h2>
      <p>
        Nama : <strong><?php echo $sesname ?></strong> 
      </p>
      <p>
        Email : <strong><?php echo $sesemail ?></strong>
      </p>
      <p>
        Pesan : <strong><?php echo $sespesan ?></strong>
      </p>

    </section>
  </main>

  <footer>
    <p>&copy; 2025 Yohanes Setiawan Japriadi [0344300002]</p>
  </footer>

  <script src="script.js"></script>
</body>

</html>