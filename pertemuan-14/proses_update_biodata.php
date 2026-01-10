<?php
session_start();
require 'koneksi.php';
require 'fungsi.php';

/* ===============================
   VALIDASI CID
================================ */
$cid = filter_input(INPUT_POST, 'cid', FILTER_VALIDATE_INT, [
  'options' => ['min_range' => 1]
]);

if (!$cid) {
  $_SESSION['flash_error'] = 'Akses tidak valid.';
  redirect_ke('tabel_anime.php');
}

/* ===============================
   AMBIL & BERSIHKAN INPUT
================================ */
$nim        = trim($_POST['NIM'] ?? '');
$nama       = trim($_POST['nama_lengkap'] ?? '');
$tempat     = trim($_POST['tempat_lahir'] ?? '');
$tanggal    = $_POST['tanggal_lahir'] ?? '';
$hobi       = trim($_POST['Hobi'] ?? '');
$pasangan   = trim($_POST['Pasangan'] ?? '');
$pekerjaan  = trim($_POST['Pekerjaan'] ?? '');
$ortu       = trim($_POST['nama_orangtua'] ?? '');
$kakak      = trim($_POST['nama_kakak'] ?? '');
$adik       = trim($_POST['nama_adek'] ?? '');

/* ===============================
   QUERY UPDATE
================================ */
$stmt = mysqli_prepare($conn, "
  UPDATE tabel_anime SET
    NIM = ?,
    nama_lengkap = ?,
    tempat_lahir = ?,
    tanggal_lahir = ?,
    Hobi = ?,
    Pasangan = ?,
    Pekerjaan = ?,
    nama_orangtua = ?,
    nama_kakak = ?,
    nama_adek = ?
  WHERE cid = ?
");

if (!$stmt) {
  $_SESSION['flash_error'] = 'Query gagal disiapkan.';
  redirect_ke('tabel_anime.php');
}

mysqli_stmt_bind_param(
  $stmt,
  "ssssssssssi",
  $nim,
  $nama,
  $tempat,
  $tanggal,
  $hobi,
  $pasangan,
  $pekerjaan,
  $ortu,
  $kakak,
  $adik,
  $cid
);

/* ===============================
   EKSEKUSI
================================ */
if (mysqli_stmt_execute($stmt)) {
  $_SESSION['flash_sukses'] = 'Biodata berhasil diperbarui.';
} else {
  $_SESSION['flash_error'] = 'Gagal memperbarui biodata.';
}

mysqli_stmt_close($stmt);

redirect_ke('tabel_anime.php');
