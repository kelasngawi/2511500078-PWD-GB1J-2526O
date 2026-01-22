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

/* =========================
   AMBIL & BERSIHKAN DATA FORM
========================= */
$kode   = bersihkan($_POST["txtKodePen"] ?? "");
$nama   = bersihkan($_POST["txtNmPengunjung"] ?? "");
$alamat = bersihkan($_POST["txtAlRmh"] ?? "");
$tgl    = bersihkan($_POST["txtTglKunjungan"] ?? "");
$hobi   = bersihkan($_POST["txtHobi"] ?? "");
$slta   = bersihkan($_POST["txtAsalSMA"] ?? "");
$kerja  = bersihkan($_POST["txtKerja"] ?? "");
$ortu   = bersihkan($_POST["txtNmOrtu"] ?? "");
$pacar  = bersihkan($_POST["txtNmPacar"] ?? "");
$mantan = bersihkan($_POST["txtNmMantan"] ?? "");

/* =========================
   VALIDASI WAJIB
========================= */
$errors = [];

if ($kode === '')   $errors[] = 'Kode Pengunjung wajib diisi.';
if ($nama === '')   $errors[] = 'Nama Pengunjung wajib diisi.';
if ($alamat === '') $errors[] = 'Alamat Rumah wajib diisi.';
if ($tgl === '')    $errors[] = 'Tanggal Kunjungan wajib diisi.';

if (!empty($errors)) {
  $_SESSION['flash_error'] = implode('<br>', $errors);
  redirect_ke('index.php#biodata');
  exit;
}

/* =========================
   SIMPAN KE SESSION (ABOUT)
========================= */
$_SESSION['biodata'] = [
  "kodepen"   => $kode,
  "nama"      => $nama,
  "alamat"    => $alamat,
  "tanggal"   => $tgl,
  "hobi"      => $hobi,
  "slta"      => $slta,
  "pekerjaan" => $kerja,
  "ortu"      => $ortu,
  "pacar"     => $pacar,
  "mantan"    => $mantan
];

/* =========================
   INSERT KE DATABASE
========================= */
$sql = "INSERT INTO tbl_pengunjung
(Kode_Pengunjung, Nama_Pengunjung, Alamat_Rumah, Tanggal_Kunjungan,
 Hobi, Asal_SLTA, Pekerjaan, Nama_Orang_Tua, Nama_Pacar, Nama_Mantan)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
  $_SESSION['flash_error'] = 'Query gagal disiapkan.';
  redirect_ke('index.php#biodata');
  exit;
}

mysqli_stmt_bind_param(
  $stmt,
  "ssssssssss",
  $kode,
  $nama,
  $alamat,
  $tgl,
  $hobi,
  $slta,
  $kerja,
  $ortu,
  $pacar,
  $mantan
);

if (mysqli_stmt_execute($stmt)) {
  $_SESSION['flash_sukses'] = 'Data pengunjung berhasil disimpan.';
  redirect_ke('index.php#about');
} else {
  $_SESSION['flash_error'] = 'Data gagal disimpan.';
  redirect_ke('index.php#biodata');
}

mysqli_stmt_close($stmt);


/* =================================================
   PROSES FORM KONTAK
================================================= */
if (isset($_POST['txtNama'])) {

  $nama    = bersihkan($_POST['txtNama']);
  $email   = bersihkan($_POST['txtEmail']);
  $pesan   = bersihkan($_POST['txtPesan']);
  $captcha = bersihkan($_POST['txtCaptcha']);

  $errors = [];

  if ($nama === '' || mb_strlen($nama) < 3) $errors[] = 'Nama minimal 3 karakter.';
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'Email tidak valid.';
  if ($pesan === '' || mb_strlen($pesan) < 10) $errors[] = 'Pesan minimal 10 karakter.';
  if ($captcha !== "5") $errors[] = 'Jawaban captcha salah.';

  if ($errors) {
    $_SESSION['old'] = compact('nama','email','pesan','captcha');
    $_SESSION['flash_error'] = implode('<br>', $errors);
    redirect_ke('index.php#contact');
    exit;
  }

  $sql = "INSERT INTO tbl_tamu (cnama, cemail, cpesan) VALUES (?, ?, ?)";
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param($stmt, "sss", $nama, $email, $pesan);

  if (mysqli_stmt_execute($stmt)) {
    $_SESSION['flash_sukses'] = 'Pesan berhasil dikirim.';
    redirect_ke('index.php#contact');
  } else {
    $_SESSION['flash_error'] = 'Pesan gagal dikirim.';
    redirect_ke('index.php#contact');
  }
  exit;
}
