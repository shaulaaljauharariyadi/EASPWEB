<?php
// Load file koneksi.php
include "koneksi.php";

// Ambil data NIS yang dikirim oleh index.php melalui URL
$nik = $_GET['nik'];

// Query untuk menampilkan data calon berdasarkan ID yang dikirim
$sql = $pdo->prepare("SELECT foto FROM calon WHERE nik=:nik");
$sql->bindParam(':nik', $nik);
$sql->execute(); // Eksekusi query insert
$data = $sql->fetch(); // Ambil semua data dari hasil eksekusi $sql

// Cek apakah file fotonya ada di folder images
if(is_file("images/foto/".$data['foto'])) // Jika foto ada
  unlink("images/foto/".$data['foto']); // Hapus foto yang telah diupload dari folder images
// Query untuk menghapus data calon berdasarkan ID yang dikirim
$sql = $pdo->prepare("DELETE FROM calon WHERE nik=:nik");
$sql->bindParam(':nik', $nik);
$execute = $sql->execute(); // Eksekusi / Jalankan query
if($execute){ // Cek jika proses simpan ke database sukses atau tidak
  // Jika Sukses, Lakukan :
  header("location: index.php"); // Redirect ke halaman index.php
}else{
  // Jika Gagal, Lakukan :
  echo "Data gagal dihapus. <a href='index.php'>Kembali</a>";
}
?>

DELETE FROM `calon` WHERE `calon`.`username` = 'lagites222'