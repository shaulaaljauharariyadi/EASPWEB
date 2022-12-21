<?php
// Load file koneksi.php
include "koneksi.php";

// Ambil Data yang Dikirim dari Form
$username = $_POST['username'];
$email = $_POST['email'];
$pasword = $_POST['pasword'];
$nik = $_POST['nik'];
$namaLengkap = $_POST['namaLengkap'];
$tempatLahir = $_POST['tempatLahir'];
$tanggalLahir = $_POST['tanggalLahir'];
$jenisKelamin = $_POST['jenisKelamin'];
$alamat = $_POST['alamat'];
$pendidikanTerakhir = $_POST['pendidikanTerakhir'];

//simpan gambar
$foto = $_FILES['foto']['name'];
$KTP = $_FILES['KTP']['name'];
$CV = $_FILES['CV']['name'];
$KK = $_FILES['KK']['name'];

//bikin temp
$tmpfoto = $_FILES['foto']['tmp_name'];
$tmpKTP = $_FILES['KTP']['tmp_name'];
$tmpCV = $_FILES['CV']['tmp_name'];
$tmpKK = $_FILES['KK']['tmp_name'];

// Rename nama fotonya dengan menambahkan tanggal dan jam upload
$fotobaru = date('dmYHis').$foto;
$KTPbaru = date('dmYHis').$KTP;
$CVbaru = date('dmYHis').$CV;
$KKbaru = date('dmYHis').$KK;

// Set path folder tempat menyimpan fotonya
$pathfoto = "images/foto/".$fotobaru;
$pathKTP = "images/KTP/".$KTPbaru;
$pathCV = "images/CV/".$CVbaru;
$pathKK = "images/KK/".$KKbaru;


// Proses upload
if(move_uploaded_file($tmpfoto, $pathfoto) && move_uploaded_file($tmpKTP, $pathKTP) && move_uploaded_file($tmpCV, $pathCV) && move_uploaded_file($tmpKK, $pathKK)){ // Cek apakah gambar berhasil diupload atau tidak

  // Proses simpan ke Database
  $sql = $pdo->prepare("INSERT INTO calon(username, email, pasword, nik, namaLengkap, tempatLahir, tanggalLahir, jenisKelamin, alamat, pendidikanTerakhir, foto, KTP, CV, KK) 
  VALUES(:username,:email,:pasword,:nik,:namaLengkap,:tempatLahir,:tanggalLahir,:jenisKelamin,:alamat,:pendidikanTerakhir,:foto,:KTP,:CV,:KK)");
  $sql->bindParam(':username', $username);
  $sql->bindParam(':email', $email);
  $sql->bindParam(':pasword', $pasword);
  $sql->bindParam(':nik', $nik);
  $sql->bindParam(':namaLengkap', $namaLengkap);
  $sql->bindParam(':tempatLahir', $tempatLahir);
  $sql->bindParam(':tanggalLahir', $tanggalLahir);
  $sql->bindParam(':jenisKelamin', $jenisKelamin);
  $sql->bindParam(':alamat', $alamat);
  $sql->bindParam(':pendidikanTerakhir', $pendidikanTerakhir);
  $sql->bindParam(':foto', $fotobaru);
  $sql->bindParam(':KTP', $KTPbaru);
  $sql->bindParam(':CV', $CVbaru);
  $sql->bindParam(':KK', $KKbaru);
  $sql->execute(); // Eksekusi query insert

  if($sql){ // Cek jika proses simpan ke database sukses atau tidak
    // Jika Sukses, Lakukan :
    header("location: index.php"); // Redirect ke halaman index.php
  }else{
    // Jika Gagal, Lakukan :
    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
    echo "<br><a href='form_simpan.php'>Kembali Ke Form</a>";
  }
}else{
  // Jika gambar gagal diupload, Lakukan :
  echo "Maaf, Gambar gagal untuk diupload.";
  echo "<br><a href='form_simpan.php'>Kembali Ke Form</a>";
}
?>