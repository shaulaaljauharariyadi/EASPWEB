<html>
<head>
  <title>Aplikasi CRUD dengan PHP</title>
</head>
<body>
  <h1>Ubah Data Siswa</h1>

  <?php
  // Load file koneksi.php
  include "koneksi.php";

  // Ambil data NIS yang dikirim oleh index.php melalui URL
  $id = $_GET['username'];

  // Query untuk menampilkan data siswa berdasarkan ID yang dikirim
  $sql = $pdo->prepare("SELECT * FROM siswa WHERE username=:username");
  $sql->bindParam(':username', $username);
  $sql->execute(); // Eksekusi query insert
  $data = $sql->fetch(); // Ambil semua data dari hasil eksekusi $sql
  ?>

  <form method="post" action="proses_ubah.php?id=<?php echo $username; ?>" enctype="multipart/form-data">            
            <!-- username //-->
            <div class="main-user-info">
                <div class="user-input-box">
                    <label for="username">Username</label>
                    <input type="text"
                            id="username"
                            name="username"
                            placeholder="Username"/>
                </div>

                <!-- email //-->
                <div class="user-input-box">
                    <label for="email">Email</label>
                    <input type="email"
                            id="email"
                            name="email"
                            placeholder="Email"/>
                </div>

                <!-- password //-->
                <div class="user-input-box">
                    <label for="pasword">Password</label>
                    <input type="password"
                            id="pasword"
                            name="pasword"
                            placeholder="Pasword"/>
                </div>        

                <!-- NIK //-->
                <div class="user-input-box">
                    <label for="nik">NIK</label>
                    <input type="text"
                            id="nik"
                            name="nik"
                            placeholder="NIK"/>
                </div>
                
                <!-- nama lengkap //-->
                <div class="user-input-box">
                    <label for="namaLengkap">Nama Lengkap</label>
                    <input type="text"
                            id="namaLengkap"
                            name="namaLengkap"
                            placeholder="Nama Lengkap"/>
                </div>
                
                <!-- tempat lahir //-->
                <div class="user-input-box">
                    <label for="tempatLahir">Tempat Lahir</label>
                    <input type="text"
                            id="tempatLahir"
                            name="tempatLahir"
                            placeholder="Tempat Lahir"/>
                </div>     

                <!-- tanggal lahir //-->
                <div class="user-input-box">
                    <label for="tanggalLahir">Tanggal Lahir</label>
                    <input type="date"
                            id="tanggalLahir"
                            name="tanggalLahir"
                            placeholder="Password"/>
                </div>     

                <!-- jenis kelamin //-->
                <div class="gender-details-box">
                    <span class="gender-tittle">Jenis Kelamin</span>
                    <div class="gender-category">
                        <input type="radio" name="jenisKelamin"  value="Laki-laki">
                        <label for="LK">Laki-laki</label>
                        <input type="radio" name="jenisKelamin"  value="Perempuan">
                        <label for="PR">Perempuan</label>
                    </div>
                
                </div>     

                <!-- alamat //-->
                <div class="user-input-box">
                    <label for="alamat">Alamat</label>
                    <input type="text"
                            id="alamat"
                            name="alamat"
                            placeholder="Alamat"/>
                </div>     

                <!-- pendidikan terakhir //-->
                <div class="user-input-box">
                    <label for="pendidikanTerakhir">Pendidikan Terakhir</label>
                    <input type="text"
                            id="pendidikanTerakhir"
                            name="pendidikanTerakhir"
                            placeholder="Pendidikan Terakhir"/>
                </div>  

                <!-- file//-->

                <!-- pas foto//-->

                <div class="file-input">

                    <div class="mb-3">
                        <label for="foto" class="form-label">Pas Foto</label>
                        <input class="form-control" type="file" name="foto">
                    </div>

                    <div class="mb-3">
                        <label for="KTP" class="form-label">KTP</label>
                        <input class="form-control" type="file" name="KTP" >
                    </div>

                    <div class="mb-3">
                        <label for="CV" class="form-label">CV</label>
                        <input class="form-control" type="file" name="CV" >
                    </div>

                    <div class="mb-3">
                        <label for="KK" class="form-label">CV</label>
                        <input class="form-control" type="file" name="KK" >
                    </div>
            </div>

            <hr>
            <hr>


            <div class="form-submit-btn">
                <!-- <input type="submit" value="Submit"> -->
                <button type="submit" value="Simpan" class="btn btn-primary">SUBMIT</button>

                <a href="index.php"><input type="button" value="Batal" class="btn btn-primary" ></a>

            </div>
            
        </form>
</body>
</html>