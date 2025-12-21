<?php
session_start();

require 'koneksi.php';
require 'fungsi.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $_SESSION['flash_error'] = 'Akses tidak valid.';
    redirect_ke('read.php');
    exit;
}

$cid = filter_input(INPUT_POST, 'cid', FILTER_VALIDATE_INT, [
    'options' => ['min_range' => 1]
]);

if (!$cid) {
    $_SESSION['flash_error'] = 'CID tidak valid.';
    redirect_ke('read.php');
    exit;
}
$nama    = bersihkan($_POST['txtNamaEd'] ?? '');
$email   = bersihkan($_POST['txtEmailEd'] ?? '');
$pesan   = bersihkan($_POST['txtPesanEd'] ?? '');
$captcha = bersihkan($_POST['txtCaptcha'] ?? '');

$errors = [];

if ($nama === '') {
    $errors[] = 'Nama wajib diisi.';
} elseif (mb_strlen($nama) < 3) {
    $errors[] = 'Nama minimal 3 karakter.';
}

if ($email === '') {
    $errors[] = 'Email wajib diisi.';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Format email tidak valid.';
}

if ($pesan === '') {
    $errors[] = 'Pesan wajib diisi.';
} elseif (mb_strlen($pesan) < 10) {
    $errors[] = 'Pesan minimal 10 karakter.';
}

if ($captcha !== '6') {
    $errors[] = 'Jawaban captcha salah.';
}

if (!empty($errors)) {
    $_SESSION['flash_error'] = implode('<br>', $errors);
    $_SESSION['old'] = [
        'nama'  => $nama,
        'email' => $email,
        'pesan' => $pesan
    ];
    redirect_ke('edit.php?cid=' . $cid);
    exit;
}
$stmt = mysqli_prepare(
    $conn,
    "UPDATE tbl_tamu 
     SET cnama = ?, cemail = ?, cpesan = ?
     WHERE cid = ?"
);

if (!$stmt) {
    $_SESSION['flash_error'] = 'Prepare gagal.';
    redirect_ke('edit.php?cid=' . $cid);
    exit;
}
mysqli_stmt_bind_param($stmt, 'sssi', $nama, $email, $pesan, $cid);

if (mysqli_stmt_execute($stmt)) {
    unset($_SESSION['old']);
    $_SESSION['flash_success'] = 'Data berhasil diperbarui.';
    redirect_ke('read.php');
    exit;
}

$_SESSION['flash_error'] = 'Gagal memperbarui data.';
redirect_ke('edit.php?cid=' . $cid);
exit;