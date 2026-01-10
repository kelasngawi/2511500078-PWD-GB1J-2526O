<?php
session_start();
require __DIR__ . '/koneksi.php';
require_once __DIR__ . '/fungsi.php';

if (isset($_POST['txtNim'])) {

  $nim       = bersihkan($_POST['txtNim'] ?? '');
  $nama      = bersihkan($_POST['txtNmLengkap'] ?? '');
  $tempat    = bersihkan($_POST['txtT4Lhr'] ?? '');
  $tanggal   = formatTanggal($_POST['txtTglLhr'] ?? '');
  $hobi      = bersihkan($_POST['txtHobi'] ?? '');
  $pasangan  = bersihkan($_POST['txtPasangan'] ?? '');
  $pekerjaan = bersihkan($_POST['txtKerja'] ?? '');
  $ortu      = bersihkan($_POST['txtNmOrtu'] ?? '');
  $kakak     = bersihkan($_POST['txtNmKakak'] ?? '');
  $adik      = bersihkan($_POST['txtNmAdik'] ?? '');

  if ($nim === '' || $nama === '') {
    $_SESSION['flash_biodata_error'] = "NIM dan Nama Lengkap wajib diisi!";
    header("Location: index.php#biodata");
    exit;
  }

  $sql = "INSERT INTO tabel_anime 
    (NIM, nama_lengkap, tempat_lahir, tanggal_lahir, Hobi, Pasangan, Pekerjaan, nama_orangtua, nama_kakak, nama_adek)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
    ON DUPLICATE KEY UPDATE
      nama_lengkap = VALUES(nama_lengkap),
      tempat_lahir = VALUES(tempat_lahir),
      tanggal_lahir = VALUES(tanggal_lahir),
      Hobi = VALUES(Hobi),
      Pasangan = VALUES(Pasangan),
      Pekerjaan = VALUES(Pekerjaan),
      nama_orangtua = VALUES(nama_orangtua),
      nama_kakak = VALUES(nama_kakak),
      nama_adek = VALUES(nama_adek)";

  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param($stmt, "ssssssssss",
    $nim, $nama, $tempat, $tanggal, $hobi,
    $pasangan, $pekerjaan, $ortu, $kakak, $adek
  );

  if (mysqli_stmt_execute($stmt)) {
    $_SESSION['flash_biodata'] = "Biodata berhasil disimpan / diperbarui.";
  } else {
    $_SESSION['flash_biodata_error'] = "Gagal menyimpan biodata.";
  }

  mysqli_stmt_close($stmt);
  header("Location: index.php#biodata");
  exit;
}

if (isset($_POST['txtNama'])) {

  $nama    = bersihkan($_POST['txtNama'] ?? '');
  $email   = bersihkan($_POST['txtEmail'] ?? '');
  $pesan   = bersihkan($_POST['txtPesan'] ?? '');
  $captcha = bersihkan($_POST['txtCaptcha'] ?? '');

  $errors = [];
  if ($nama === '')  $errors[] = "Nama wajib diisi.";
  if ($email === '') $errors[] = "Email wajib diisi.";
  if ($pesan === '') $errors[] = "Pesan wajib diisi.";
  if ($captcha !== "5") $errors[] = "Captcha salah.";

  if ($errors) {
    $_SESSION['flash_contact_error'] = implode('<br>', $errors);
    header("Location: index.php#contact");
    exit;
  }

  $stmt = mysqli_prepare($conn,
    "INSERT INTO tbl_tamu (cnama, cemail, cpesan) VALUES (?, ?, ?)"
  );
  mysqli_stmt_bind_param($stmt, "sss", $nama, $email, $pesan);

  if (mysqli_stmt_execute($stmt)) {
    $_SESSION['flash_contact'] = "Pesan berhasil dikirim.";
  } else {
    $_SESSION['flash_contact_error'] = "Gagal mengirim pesan.";
  }

  mysqli_stmt_close($stmt);
  header("Location: index.php#contact");
  exit;
}
