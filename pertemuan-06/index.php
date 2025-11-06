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
       $pekerjaan = "Pelajar/Mahasiswa";
       $nama_ortu = "Bapak Sumarna dan Ibu Djuliani";
       $nama_kakak = "Juanda";
       $nama_adik = "-";
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
<section id ="ipk">
    <h2>nilai saya</h2>
     <?php
     $matakuliah1 = "Pemrograman Web Dinamis";
        $sksmatakuliah1 = 3;
        $nilaimatakuliah1 = 85;
        $nilaiHadir1 = 90;
        $nilaiTugas1 = 80;
        $nilaiUTS1 = 75;
        $nilaiUAS1 = 88;
     $matakuliah2 = "Basis Data";
        $sksmatakuliah2 = 2;
        $nilaimatakuliah2 = 90;
        $nilaiHadir2 = 85;
        $nilaiTugas2 = 80;
        $nilaiUTS2 = 78;
        $nilaiUAS2 = 92;
     $matakuliah3 = "Algoritma dan Pemrograman";
        $sksmatakuliah3 = 3;
        $nilaimatakuliah3 = 80;
        $nilaiHadir3 = 88;
        $nilaiTugas3 = 82;
        $nilaiUTS3 = 70;
        $nilaiUAS3 = 85;
     $matakuliah4 = "Jaringan Komputer";
        $sksmatakuliah4 = 3;
        $nilaimatakuliah4 = 87;
        $nilaiHadir4 = 92;
        $nilaiTugas4 = 84;
        $nilaiUTS4 = 76;
        $nilaiUAS4 = 89;
    $matakuliah5 = "Sistem Operasi";
        $sksmatakuliah5 = 2;
        $nilaimatakuliah5 = 88;
        $nilaiHadir5 = 95;
        $nilaiTugas5 = 86;
        $nilaiUTS5 = 80;
        $nilaiUAS5 = 90;

   function hitungNilaiAkhir($nilaiHadir, $nilaiTugas, $nilaiUTS, $nilaiUAS) {
        return (0.1 * $nilaiHadir) + (0.2 * $nilaiTugas) + (0.3 * $nilaiUTS) + (0.4 * $nilaiUAS);
    }

    function tentukanGrade($hadir, $nilaiAkhir) {

        if ($hadir < 70) {
            return 'E';
        } elseif ($nilaiAkhir >= 85) {
            return 'A';
        } elseif ($nilaiAkhir >= 80) {
            return 'A-';
        } elseif ($nilaiAkhir >= 75) {
            return 'B+';
        } elseif ($nilaiAkhir >= 70) {
            return 'B';
        } elseif ($nilaiAkhir >= 65) {
            return 'B-';
        } elseif ($nilaiAkhir >= 60) {
            return 'C+';
        } elseif ($nilaiAkhir >= 55) {
            return 'C';
        } elseif ($nilaiAkhir >= 50) {
            return 'C-';
        } elseif ($nilaiAkhir >= 45) {
            return 'D';
        } else {
            return 'E';
        }
    }

    function tentukanMutu($grade) {
        switch ($grade) {
            case 'A':return 4.0;
            case 'A-':return 3.7;
            case 'B+':return 3.3;
            case 'B':return 3.0;
            case 'B-':return 2.7;
            case 'C+':return 2.3;
            case 'C':return 2.0;
            case 'C-':return 1.7;
            case 'D':return 1.0;
            case 'E':return 0.0;
            default:return 0.0;
        }
    }

    function tentukanstatus($grade): string {
        if (in_array(needle: $grade, haystack: ['A', 'A-', 'B+', 'B', 'B-', 'C+', 'C', 'C-'])) {
            return "Lulus";
        } else {
            return "Tidak Lulus";
        }
    }

    for ($i = 1; $i <= 5; $i++) {
        $hadir = ${"nilaiHadir$i"};
        $tugas = ${"nilaiTugas$i"};
        $uts = ${"nilaiUTS$i"};
        $uas = ${"nilaiUAS$i"};
        $sks = ${"sksmatakuliah$i"};

        ${"nilaiAkhir$i"} = hitungNilaiAkhir($hadir, $tugas, $uts, $uas);
        ${"grade$i"} = tentukanGrade($hadir, ${"nilaiAkhir$i"});
        ${"mutu$i"} = tentukanMutu(${"grade$i"});
        ${"bobot$i"} = ${"mutu$i"} * $sks;
        ${"status$i"} = tentukanstatus(${"grade$i"});
    }

        $totalBobot = $bobot1 + $bobot2 + $bobot3 + $bobot4 + $bobot5;
        $totalSks = $sksmatakuliah1 + $sksmatakuliah2 + $sksmatakuliah3 + $sksmatakuliah4; + $sksmatakuliah5;
        $IPK = $totalSks > 0 ? $totalBobot / $totalSks : 0;
    
    ?>

    <div class="section" id="ipk">
        <div class="matkul">
            <div><span class="label">matakuliah1 :</span> <span class="value"><?php echo $matakuliah1; ?></span></div>
            <div><span class="label">SKS :</span> <span class="value"><?php echo $sksmatakuliah1; ?></span></div>
            <div><span class="label">Kehadiran :</span> <span class="value"><?php echo $nilaiHadir1; ?></span></div>
            <div><span class="label">Tugas :</span> <span class="value"><?php echo $nilaiTugas1; ?></span></div>
            <div><span class="label">UTS :</span> <span class="value"><?php echo $nilaiUTS1; ?></span></div>
            <div><span class="label">UAS :</span> <span class="value"><?php echo $nilaiUAS1; ?></span></div>
            <div><span class="label">Nilai Akhir :</span> <span class="value"><?php echo number_format($nilaiAkhir1, 2); ?></span></div>
            <div><span class="label">Grade :</span> <span class="value"><?php echo $grade1; ?></span></div>
            <div><span class="label">Angka Mutu :</span> <span class="value"><?php echo number_format($mutu1, 2); ?></span></div>
            <div><span class="label">Bobot :</span> <span class="value"><?php echo number_format($bobot1, 2); ?></span></div>
            <div><span class="label">Status :</span> <span class="value"><?php echo $status1; ?></span></div>
        </div>

        <div class="matkul">
            <div><span class="label">matakuliah2 :</span> <span class="value"><?php echo $matakuliah2; ?></span></div>
            <div><span class="label">SKS :</span> <span class="value"><?php echo $sksmatakuliah2; ?></span></div>
            <div><span class="label">Kehadiran :</span> <span class="value"><?php echo $nilaiHadir2; ?></span></div>
            <div><span class="label">Tugas :</span> <span class="value"><?php echo $nilaiTugas2; ?></span></div>
            <div><span class="label">UTS :</span> <span class="value"><?php echo $nilaiUTS2; ?></span></div>
            <div><span class="label">UAS :</span> <span class="value"><?php echo $nilaiUAS2; ?></span></div>
            <div><span class="label">Nilai Akhir :</span> <span class="value"><?php echo number_format($nilaiAkhir2, 2); ?></span></div>
            <div><span class="label">Grade :</span> <span class="value"><?php echo $grade2; ?></span></div>
            <div><span class="label">Angka Mutu :</span> <span class="value"><?php echo number_format($mutu2, 2); ?></span></div>
            <div><span class="label">Bobot :</span> <span class="value"><?php echo number_format($bobot2, 2); ?></span></div>
            <div><span class="label">Status :</span> <span class="value"><?php echo $status2; ?></span></div>
        </div>

        <div class="matkul">
            <div><span class="label">matakuliah3 :</span> <span class="value"><?php echo $matakuliah3; ?></span></div>
            <div><span class="label">SKS :</span> <span class="value"><?php echo $sksmatakuliah3; ?></span></div>
            <div><span class="label">Kehadiran :</span> <span class="value"><?php echo $nilaiHadir3; ?></span></div>
            <div><span class="label">Tugas :</span> <span class="value"><?php echo $nilaiTugas3; ?></span></div>
            <div><span class="label">UTS :</span> <span class="value"><?php echo $nilaiUTS3; ?></span></div>
            <div><span class="label">UAS :</span> <span class="value"><?php echo $nilaiUAS3; ?></span></div>
            <div><span class="label">Nilai Akhir :</span> <span class="value"><?php echo number_format($nilaiAkhir3, 2); ?></span></div>
            <div><span class="label">Grade :</span> <span class="value"><?php echo $grade3; ?></span></div>
            <div><span class="label">Angka Mutu :</span> <span class="value"><?php echo number_format($mutu3, 2); ?></span></div>
            <div><span class="label">Bobot :</span> <span class="value"><?php echo number_format($bobot3, 2); ?></span></div>
            <div><span class="label">Status :</span> <span class="value"><?php echo $status3; ?></span></div>
        </div>

        <div class="matkul">
            <div><span class="label">matakuliah4 :</span> <span class="value"><?php echo $matakuliah4; ?></span></div>
            <div><span class="label">SKS :</span> <span class="value"><?php echo $sksmatakuliah4; ?></span></div>
            <div><span class="label">Kehadiran :</span> <span class="value"><?php echo $nilaiHadir4; ?></span></div>
            <div><span class="label">Tugas :</span> <span class="value"><?php echo $nilaiTugas4; ?></span></div>
            <div><span class="label">UTS :</span> <span class="value"><?php echo $nilaiUTS4; ?></span></div>
            <div><span class="label">UAS :</span> <span class="value"><?php echo $nilaiUAS4; ?></span></div>
            <div><span class="label">Nilai Akhir :</span> <span class="value"><?php echo number_format($nilaiAkhir4, 2); ?></span></div>
            <div><span class="label">Grade :</span> <span class="value"><?php echo $grade4; ?></span></div>
            <div><span class="label">Angka Mutu :</span> <span class="value"><?php echo number_format($mutu4, 2); ?></span></div>
            <div><span class="label">Bobot :</span> <span class="value"><?php echo number_format($bobot4, 2); ?></span></div>
            <div><span class="label">Status :</span> <span class="value"><?php echo $status4; ?></span></div>
        </div>

        <div class="matkul">
            <div><span class="label">matakuliah5 :</span> <span class="value"><?php echo $matakuliah5; ?></span></div>
            <div><span class="label">SKS :</span> <span class="value"><?php echo $sksmatakuliah5; ?></span></div>
            <div><span class="label">Kehadiran :</span> <span class="value"><?php echo $nilaiHadir5; ?></span></div>
            <div><span class="label">Tugas :</span> <span class="value"><?php echo $nilaiTugas5; ?></span></div>
            <div><span class="label">UTS :</span> <span class="value"><?php echo $nilaiUTS5; ?></span></div>
            <div><span class="label">UAS :</span> <span class="value"><?php echo $nilaiUAS5; ?></span></div>
            <div><span class="label">Nilai Akhir :</span> <span class="value"><?php echo number_format($nilaiAkhir5, 2); ?></span></div>
            <div><span class="label">Grade :</span> <span class="value"><?php echo $grade5; ?></span></div>
            <div><span class="label">Angka Mutu :</span> <span class="value"><?php echo number_format($mutu5, 2); ?></span></div>
            <div><span class="label">Bobot :</span> <span class="value"><?php echo number_format($bobot5, 2); ?></span></div>
            <div><span class="label">Status :</span> <span class="value"><?php echo $status5; ?></span></div>
        </div>
    </div>

    <div class="total">
        <div><span class="label">Total Bobot :</span> <span class="value"><?php echo number_format($totalBobot, 2); ?></span></div>
        <div><span class="label">Total SKS :</span> <span class="value"><?php echo $totalSks; ?></span></div>
        <div><span class="label">IPK :</span> <span class="value"><?php echo number_format($IPK, 2); ?></span></div>
    </div>

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