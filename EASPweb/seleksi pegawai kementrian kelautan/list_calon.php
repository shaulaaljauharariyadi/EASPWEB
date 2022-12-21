<html>
<head>
  <title>Aplikasi CRUD Plus Upload Gambar dengan PHP</title>
</head>
<body>
  <h1>Data Calon PNS</h1>
  <a href="form_simpan.php">Tambah Data</a><br><br>
  <table border="1" width="100%">
  <tr>
    <th>username</th>
    <th>email</th>
    <th>password</th>
    <th>NIK</th>
    <th>namaLengkap</th>
    <th>tempatLahir</th>
    <th>tanggalLahir</th>
    <th>jenisKelamin</th>
    <th>alamat</th>
    <th>pendidikanTerakhir</th>
    <th>foto</th>
    <th>KTP</th>
    <th>CV</th>
    <th>KK</th>

    <th colspan="2">Aksi</th>
  </tr>
  <?php
  // Load file koneksi.php
  include "koneksi.php";
  // Buat query untuk menampilkan semua data siswa
  $sql = $pdo->prepare("SELECT * FROM calon");
  $sql->execute(); // Eksekusi querynya
  while($data = $sql->fetch()){ // Ambil semua data dari hasil eksekusi $sql
    echo "<tr>";
    echo "<td>".$data['username']."</td>";
    echo "<td>".$data['email']."</td>";
    echo "<td>".$data['pasword']."</td>";
    echo "<td>".$data['nik']."</td>";
    echo "<td>".$data['namaLengkap']."</td>";
    echo "<td>".$data['tempatLahir']."</td>";
    echo "<td>".$data['tanggalLahir']."</td>";
    echo "<td>".$data['jenisKelamin']."</td>";
    echo "<td>".$data['alamat']."</td>";
    echo "<td>".$data['pendidikanTerakhir']."</td>";
    echo "<td><img src='images/foto/".$data['foto']."' width='100' height='100'></td>";
    echo "<td><img src='images/KTP/".$data['KTP']."' width='100' height='100'></td>";
    echo "<td><img src='images/CV/".$data['CV']."' width='100' height='100'></td>";
    echo "<td><img src='images/KK/".$data['KK']."' width='100' height='100'></td>";

    echo "<td><a href='proses_hapus.php?id=".$data['nik']."'>Hapus</a></td>";
    echo "</tr>";
  }
  ?>
  </table>
</body>
</html>