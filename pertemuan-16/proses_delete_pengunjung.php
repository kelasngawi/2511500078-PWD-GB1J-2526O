<?php
session_start();
require __DIR__ . '/koneksi.php';
require_once __DIR__ . '/fungsi.php';

/* ===============================
   VALIDASI CID
================================ */
$cid = filter_input(INPUT_GET, 'cid', FILTER_VALIDATE_INT, [
  'options' => ['min_range' => 1]
]);

if (!$cid) {
  $_SESSION['flash_error'] = 'CID pengunjung tidak valid.';
  redirect_ke('tbl.php');
  exit;
}

/* ===============================
   DELETE DATA PENGUNJUNG
================================ */
$stmt = mysqli_prepare(
  $conn,
  "DELETE FROM tbl_pengunjung WHERE cid = ?"
);

if (!$stmt) {
  $_SESSION['flash_error'] = 'Terjadi kesalahan sistem (prepare gagal).';
  redirect_ke('tbl.php');
  exit;
}

mysqli_stmt_bind_param($stmt, "i", $cid);

/* ===============================
   EKSEKUSI QUERY
================================ */
if (mysqli_stmt_execute($stmt)) {
  $_SESSION['flash_sukses'] = 'Data pengunjung berhasil dihapus.';
} else {
  $_SESSION['flash_error'] = 'Data pengunjung gagal dihapus.';
}

mysqli_stmt_close($stmt);

/* ===============================
   REDIRECT
================================ */
redirect_ke('tbl.php');
