<?php
session_start();
require __DIR__ . '/koneksi.php';
require_once __DIR__ . '/fungsi.php';

/* =========================
   CEK METHOD
========================= */
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  $_SESSION['flash_error'] = 'Akses tidak valid.';
  redirect_ke('index.php');
  exit;
}

/* =================================================
   PROSES BIODATA PENGUNJUNG
   (SIMPAN KE SESSION + tbl_pengunjung)
================================================= */
if (isset($_POST['txtKodePen'])) {

  $kode_pengunjung   = bersihkan($_POST["txtKodePen"] ?? "");
  $nama_pengunjung   = bersihkan($_POST["txtNmPengunjung"] ?? "");
  $alamat            = bersihkan($_POST["txtAlRmh"] ?? "");
  $tanggal_kunjungan = bersihkan($_POST["txtTglKunjungan"] ?? "");
  $hobi              = bersihkan($_POST["txtHobi"] ?? "");
  $asal_slta         = bersihkan($_POST["txtAsalSMA"] ?? "");
  $pekerjaan         = bersihkan($_POST["txtKerja"] ?? "");
  $nama_ortu         = bersihkan($_POST["txtNmOrtu"] ?? "");
  $nama_pacar        = bersihkan($_POST["txtNmPacar"] ?? "");
  $nama_mantan       = bersihkan($_POST["txtNmMantan"] ?? "");

  /* validasi wajib */
  if ($kode_pengunjung === '' || $nama_pengunjung === '' || $alamat === '') {
    $_SESSION['flash_error'] = 'Data biodata wajib diisi.';
    redirect_ke('index.php#biodata');
    exit;
  }

  /* simpan ke SESSION (untuk tampil di #about) */
  $_SESSION["biodata"] = [
    "kodepen"   => $kode_pengunjung,
    "nama"      => $nama_pengunjung,
    "alamat"    => $alamat,
    "tanggal"   => $tanggal_kunjungan,
    "hobi"      => $hobi,
    "slta"      => $asal_slta,
    "pekerjaan" => $pekerjaan,
    "ortu"      => $nama_ortu,
    "pacar"     => $nama_pacar,
    "mantan"    => $nama_mantan
  ];

  /* simpan ke DATABASE tbl_pengunjung */
  $sql = "INSERT INTO tbl_pengunjung
  (kode_pengunjung, nama_pengunjung, alamat, tanggal_kunjungan, hobi,
   asal_slta, pekerjaan, nama_ortu, nama_pacar, nama_mantan)
  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param(
    $stmt,
    "ssssssssss",
    $kode_pengunjung,
    $nama_pengunjung,
    $alamat,
    $tanggal_kunjungan,
    $hobi,
    $asal_slta,
    $pekerjaan,
    $nama_ortu,
    $nama_pacar,
    $nama_mantan
  );

  if (mysqli_stmt_execute($stmt)) {
    $_SESSION['flash_sukses'] = 'Biodata pengunjung berhasil disimpan.';
  } else {
    $_SESSION['flash_error'] = 'Gagal menyimpan biodata.';
  }

  redirect_ke('index.php#about');
  exit;
}

/* =================================================
   PROSES FORM KONTAK
   (SIMPAN KE tbl_tamu)
================================================= */
if (isset($_POST['txtNama'])) {

  $nama    = bersihkan($_POST['txtNama'] ?? '');
  $email   = bersihkan($_POST['txtEmail'] ?? '');
  $pesan   = bersihkan($_POST['txtPesan'] ?? '');
  $captcha = bersihkan($_POST['txtCaptcha'] ?? '');

  $errors = [];

  if ($nama === '' || mb_strlen($nama) < 3) {
    $errors[] = 'Nama minimal 3 karakter.';
  }

  if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Email tidak valid.';
  }

  if ($pesan === '' || mb_strlen($pesan) < 10) {
    $errors[] = 'Pesan minimal 10 karakter.';
  }

  if ($captcha !== "5") {
    $errors[] = 'Jawaban captcha salah.';
  }

  if (!empty($errors)) {
    $_SESSION['old'] = compact('nama','email','pesan','captcha');
    $_SESSION['flash_error'] = implode('<br>', $errors);
    redirect_ke('index.php#contact');
    exit;
  }

  $sql = "INSERT INTO tbl_tamu (cnama, cemail, cpesan) VALUES (?, ?, ?)";
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param($stmt, "sss", $nama, $email, $pesan);
  mysqli_stmt_execute($stmt);

  unset($_SESSION['old']);
  $_SESSION['flash_sukses'] = 'Pesan berhasil dikirim.';
  redirect_ke('index.php#contact');
  exit;
}

/* =========================
   FORM TIDAK DIKENALI
========================= */
$_SESSION['flash_error'] = 'Form tidak dikenali.';
redirect_ke('index.php');
exit;
