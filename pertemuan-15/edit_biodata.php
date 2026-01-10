<?php
session_start();
require 'koneksi.php';
require 'fungsi.php';

/*
  Ambil cid dari URL dan validasi
*/
$cid = filter_input(INPUT_GET, 'cid', FILTER_VALIDATE_INT, [
  'options' => ['min_range' => 1]
]);

if (!$cid) {
  $_SESSION['flash_error'] = 'Akses tidak valid.';
  redirect_ke('tabel_anime.php');
}

/*
  Ambil data biodata berdasarkan cid
*/
$stmt = mysqli_prepare($conn, "
  SELECT 
    cid, NIM, nama_lengkap, tempat_lahir, tanggal_lahir,
    Hobi, Pasangan, Pekerjaan,
    nama_orangtua, nama_kakak, nama_adek
  FROM tabel_anime
  WHERE cid = ? LIMIT 1
");

if (!$stmt) {
  $_SESSION['flash_error'] = 'Query tidak benar.';
  redirect_ke('tabel_anime.php');
}

mysqli_stmt_bind_param($stmt, "i", $cid);
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($res);
mysqli_stmt_close($stmt);

if (!$row) {
  $_SESSION['flash_error'] = 'Data tidak ditemukan.';
  redirect_ke('tabel_anime.php');
}

/* ===== PREFILL FORM ===== */
$nim        = $row['NIM'] ?? '';
$nama       = $row['nama_lengkap'] ?? '';
$tempat     = $row['tempat_lahir'] ?? '';
$tanggal    = $row['tanggal_lahir'] ?? '';
$hobi       = $row['Hobi'] ?? '';
$pasangan   = $row['Pasangan'] ?? '';
$pekerjaan  = $row['Pekerjaan'] ?? '';
$ortu       = $row['nama_orangtua'] ?? '';
$kakak      = $row['nama_kakak'] ?? '';
$adik       = $row['nama_adek'] ?? '';

/* ===== FLASH ERROR ===== */
$flash_error = $_SESSION['flash_error'] ?? '';
unset($_SESSION['flash_error']);
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Biodata</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>

<header>
  <h1>Ini Header</h1>
</header>

<main>

<section id="biodata">
  <h2>Edit Biodata</h2>

  <?php if (!empty($flash_error)): ?>
    <div style="padding:10px;margin-bottom:10px;
      background:#f8d7da;color:#721c24;border-radius:6px;">
      <?= $flash_error ?>
    </div>
  <?php endif; ?>

  <form action="proses_update_biodata.php" method="POST">

    <input type="hidden" name="cid" value="<?= (int)$cid ?>">

    <label>
      <span>NIM</span>
      <input type="text" name="NIM" value="<?= htmlspecialchars($nim) ?>" required>
    </label>

    <label>
      <span>Nama Lengkap</span>
      <input type="text" name="nama_lengkap" value="<?= htmlspecialchars($nama) ?>" required>
    </label>

    <label>
      <span>Tempat Lahir</span>
      <input type="text" name="tempat_lahir" value="<?= htmlspecialchars($tempat) ?>">
    </label>

    <label>
      <span>Tanggal Lahir</span>
      <input type="date" name="tanggal_lahir" value="<?= $tanggal ?>">
    </label>

    <label>
      <span>Hobi</span>
      <input type="text" name="Hobi" value="<?= htmlspecialchars($hobi) ?>">
    </label>

    <label>
      <span>Pasangan</span>
      <input type="text" name="Pasangan" value="<?= htmlspecialchars($pasangan) ?>">
    </label>

    <label>
      <span>Pekerjaan</span>
      <input type="text" name="Pekerjaan" value="<?= htmlspecialchars($pekerjaan) ?>">
    </label>

    <label>
      <span>Nama Orang Tua</span>
      <input type="text" name="nama_orangtua" value="<?= htmlspecialchars($ortu) ?>">
    </label>

    <label>
      <span>Nama Kakak</span>
      <input type="text" name="nama_kakak" value="<?= htmlspecialchars($kakak) ?>">
    </label>

    <label>
      <span>Nama Adik</span>
      <input type="text" name="nama_adek" value="<?= htmlspecialchars($adik) ?>">
    </label>

    <button type="submit">Update</button>
    <button type="reset">Reset</button>
    <a href="tabel_anime.php" class="reset">Kembali</a>

  </form>
</body>
</html>
