<?php
session_start();
require 'koneksi.php';
require 'fungsi.php';

/* ===============================
   VALIDASI CID
================================ */
$cid = filter_input(INPUT_GET, 'cid', FILTER_VALIDATE_INT, [
  'options' => ['min_range' => 1]
]);

if (!$cid) {
  $_SESSION['flash_error'] = 'Akses tidak valid.';
  redirect_ke('tbl.php');
  exit;
}

/* ===============================
   AMBIL DATA PENGUNJUNG
================================ */
$stmt = mysqli_prepare($conn, "
  SELECT
    cid,
    Kode_Pengunjung,
    Nama_Pengunjung,
    Alamat_Rumah,
    Tanggal_Kunjungan,
    Hobi,
    Asal_SLTA,
    Pekerjaan,
    Nama_Orang_Tua,
    Nama_Pacar,
    Nama_Mantan
  FROM tbl_pengunjung
  WHERE cid = ?
  LIMIT 1
");

if (!$stmt) {
  $_SESSION['flash_error'] = 'Query gagal.';
  redirect_ke('tbl.php');
  exit;
}

mysqli_stmt_bind_param($stmt, "i", $cid);
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($res);
mysqli_stmt_close($stmt);

if (!$row) {
  $_SESSION['flash_error'] = 'Data tidak ditemukan.';
  redirect_ke('tbl.php');
  exit;
}

/* ===============================
   PREFILL DATA
================================ */
$kode   = $row['Kode_Pengunjung'] ?? '';
$nama   = $row['Nama_Pengunjung'] ?? '';
$alamat = $row['Alamat_Rumah'] ?? '';
$tgl    = $row['Tanggal_Kunjungan'] ?? '';
$hobi   = $row['Hobi'] ?? '';
$slta   = $row['Asal_SLTA'] ?? '';
$kerja  = $row['Pekerjaan'] ?? '';
$ortu   = $row['Nama_Orang_Tua'] ?? '';
$pacar  = $row['Nama_Pacar'] ?? '';
$mantan = $row['Nama_Mantan'] ?? '';

$flash_error = $_SESSION['flash_error'] ?? '';
unset($_SESSION['flash_error']);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Pengunjung</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>

<header>
  <h1>Edit Data Pengunjung</h1>
</header>

<main>
<section id="biodata">

  <?php if (!empty($flash_error)): ?>
    <div style="padding:10px;margin-bottom:10px;
      background:#f8d7da;color:#721c24;border-radius:6px;">
      <?= $flash_error ?>
    </div>
  <?php endif; ?>

  <form action="proses_update_pengunjung.php" method="POST">

    <input type="hidden" name="cid" value="<?= (int)$cid ?>">

    <label>
      <span>Kode Pengunjung</span>
      <input type="text" name="txtKodePen" value="<?= htmlspecialchars($kode) ?>" required>
    </label>

    <label>
      <span>Nama Pengunjung</span>
      <input type="text" name="txtNmPengunjung" value="<?= htmlspecialchars($nama) ?>" required>
    </label>

    <label>
      <span>Alamat Rumah</span>
      <input type="text" name="txtAlRmh" value="<?= htmlspecialchars($alamat) ?>" required>
    </label>

    <label>
      <span>Tanggal Kunjungan</span>
      <input type="date" name="txtTglKunjungan" value="<?= $tgl ?>" required>
    </label>

    <label>
      <span>Hobi</span>
      <input type="text" name="txtHobi" value="<?= htmlspecialchars($hobi) ?>">
    </label>

    <label>
      <span>Asal SLTA</span>
      <input type="text" name="txtAsalSMA" value="<?= htmlspecialchars($slta) ?>">
    </label>

    <label>
      <span>Pekerjaan</span>
      <input type="text" name="txtKerja" value="<?= htmlspecialchars($kerja) ?>">
    </label>

    <label>
      <span>Nama Orang Tua</span>
      <input type="text" name="txtNmOrtu" value="<?= htmlspecialchars($ortu) ?>">
    </label>

    <label>
      <span>Nama Pacar</span>
      <input type="text" name="txtNmPacar" value="<?= htmlspecialchars($pacar) ?>">
    </label>

    <label>
      <span>Nama Mantan</span>
      <input type="text" name="txtNmMantan" value="<?= htmlspecialchars($mantan) ?>">
    </label>

    <button type="submit">Update</button>
    <button type="reset">Reset</button>
    <a href="tbl.php">Kembali</a>

  </form>

</section>
</main>

</body>
</html>
