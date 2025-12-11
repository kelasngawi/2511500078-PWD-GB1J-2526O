<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
 $_SESSION['flash_error'] = "Akses tidak valid.";
 redirect_ke('index.php#contact');
}
$arrContact = [
  "nama" => $_POST["txtNama"] ?? "",
  "email" => $_POST["txtEmail"] ?? "",
  "pesan" => $_POST["txtPesan"] ?? ""
];
$nama = bersihkan($_POST["txtNama"] ?? "");
$email = bersihkan($_POST["txtEmail"] ?? "");
$pesan = bersihkan($_POST["txtPesan"] ?? "");
$_SESSION["contact"] = $arrContact;

$errors = [];

if ($nama === '') {
  $errors[] = 'Nama wajib di isi.';
}

if ($email === '') {
  $errors[] = 'Email wajib di isi.';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $errors[] = 'Format e-mail tidak valid.';
}

if ($pesan === '') {
  $errors[] = 'Pesan wajib di isi.';
}






if (!empty($errors)) {
  $_SESSION['old'] = [
    'nama' => $nama,
    'email' => $email,
    'pesan' => $pesan,
  ];

  $_SESSION['flash_error'] = implode('<br>', $errors);
  redirect_ke('index.php#contact');
}



$arrBiodata = [
  "nim" => $_POST["txtNim"] ?? "",
  "nama" => $_POST["txtNmLengkap"] ?? "",
  "tempat" => $_POST["txtT4Lhr"] ?? "",
  "tanggal" => $_POST["txtTglLhr"] ?? "",
  "hobi" => $_POST["txtHobi"] ?? "",
  "pasangan" => $_POST["txtPasangan"] ?? "",
  "pekerjaan" => $_POST["txtKerja"] ?? "",
  "ortu" => $_POST["txtNmOrtu"] ?? "",
  "kakak" => $_POST["txtNmKakak"] ?? "",
  "adik" => $_POST["txtNmAdik"] ?? ""
];
$_SESSION["biodata"] = $arrBiodata;

header("location: index.php#about");
