<?php
session_start();
   $sesname = $_POST["txtName"];
   $sesemail = $_POST["txtEmail"];
   $sespesan = $_POST["txtPesan"];
   $_SESSION["sesname"] = $sesname; 
   $_SESSION["sesemail"] = $sesemail;
   $_SESSION["sespesan"] = $sespesan;
   header("Location: index.php");
?>

<?php
session_start();
$sesnim = $_POST["txtNIM"];
   $sesnama = $_POST["txtNama"];
   $sestempat_lahir = $_POST["txtTempat_lahir"];
   $sestanggal_lahir = $_POST["txtTanggal_lahir"];
   $seshobi = $_POST["txtHobi"];
   $sespasangan = $_POST["txtPasangan"];
   $sespekerjaan = $_POST["txtPekerjaan"];
   $sesnama_ortu = $_POST["txtNama_Ortu"];
   $sesnama_kakak = $_POST["txtNama_Kakak"];
   $sesnama_adik = $_POST["txtNama_Adik"];
   $_SESSION["sesNIM"] = $sesnim;
   $_SESSION["sesNama"] = $sesnama;
   $_SESSION["Tempat_lahir"] = $sestempat_lahir;
   $_SESSION["Tanggal_lahir"] = $sestanggal_lahir;
   $_SESSION["sesHobi"] = $seshobi;
   $_SESSION["sesPasangan"] = $sespasangan;
   $_SESSION["sesPekerjaan"] = $sespekerjaan;
   $_SESSION["sesNama_Ortu"] = $sesnama_ortu;
   $_SESSION["sesNama_Kakak"] = $sesnama_kakak;
   $_SESSION["sesNama_Adik"] = $sesnama_adik;
   header("Location: index.php");
?>