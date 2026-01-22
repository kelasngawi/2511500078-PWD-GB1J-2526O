<?php
session_start();
require 'koneksi.php';
require 'fungsi.php';

/* ===============================
   VALIDASI METHOD
================================ */
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  $_SESSION['flash_error'] = 'Akses tidak valid.';
  redirect_ke('tbl.php');
  exit;
}

/* ===============================
   VALIDASI CID
================================ */
$cid = filter_input(INPUT_POST, 'cid', FILTER_VALIDATE_INT, [
  'options' => ['min_range' => 1]
]);

if (!$cid) {
  $_SESSION['flash_error'] = 'ID tidak valid.';
  redirect_ke('tbl.php');
  exit;
}

/* ===============================
   AMBIL & BERSIHKAN INPUT
================================ */
$kode   = bersihkan($_POST['txtKodePen'] ?? '');
$nama   = bersihkan($_POST['txtNmPengunjung'] ?? '');
$alamat = bersihkan($_POST['txtAlRmh'] ?? '');
$tgl    = $_POST['txtTglKunjungan'] ?? '';
$hobi   = bersihkan($_POST['txtHobi'] ?? '');
$slta   = bersihkan($_POST['txtAsalSMA'] ?? '');
$kerja  = bersihkan($_POST['txtKerja'] ?? '');
$ortu   = bersihkan($_POST['txtNmOrtu'] ?? '');
$pacar  = bersihkan($_POST['txtNmPacar'] ?? '');
$mantan = bersihkan($_POST['txtNmMantan'] ?? '');

/* ===============================
   VALIDASI WAJIB
================================ */
$errors = [];

if ($kode === '')  $errors[] = 'Kode Pengunjung wajib diisi.';
if ($nama === '')  $errors[] = 'Nama Pengunjung wajib diisi.';
if ($alamat === '') $errors[] = 'Alamat wajib diisi.';
if ($tgl === '')   $errors[] = 'Tanggal kunjungan wajib diisi.';

if (!empty($errors)) {
  $_SESSION['flash_error'] = implode('<br>', $errors);
  redirect_ke("edit_pengunjung.php?cid=$cid");
  exit;
}

/* ===============================
   QUERY UPDATE
================================ */
$stmt = mysqli_prepare($conn, "
  UPDATE tbl_pengunjung SET
    Kode_Pengunjung   = ?,
    Nama_Pengunjung   = ?,
    Alamat_Rumah      = ?,
    Tanggal_Kunjungan = ?,
    Hobi              = ?,
    Asal_SLTA         = ?,
    Pekerjaan         = ?,
    Nama_Orang_Tua    = ?,
    Nama_Pacar        = ?,
    Nama_Mantan       = ?
  WHERE cid = ?
");

if (!$stmt) {
  $_SESSION['flash_error'] = 'Query gagal disiapkan.';
  redirect_ke('tbl.php');
  exit;
}

/* ===============================
   BIND & EKSEKUSI
================================ */
mysqli_stmt_bind_param(
  $stmt,
  "ssssssssssi",
  $kode,
  $nama,
  $alamat,
  $tgl,
  $hobi,
  $slta,
  $kerja,
  $ortu,
  $pacar,
  $mantan,
  $cid
);

if (mysqli_stmt_execute($stmt)) {
  $_SESSION['flash_sukses'] = 'Data pengunjung berhasil diperbarui.';
} else {
  $_SESSION['flash_error'] = 'Gagal memperbarui data.';
}

mysqli_stmt_close($stmt);

redirect_ke('tbl.php');
