<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Seleksi Kementrian</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h3><img src="images/kkp logo.png" alt="logo"></h3> 
        <h1 class="form-title">Seleksi Pegawai Baru Kementrian Kelautan dan Perikanan</h1>
        <form action="#">

            <div class="user-login">
                <!-- username //-->
                <div class="user-input-box">
                    <label>Username</label>
                    <input type="text" required
                            id="username"
                            name="username"
                            placeholder="Username"/>
                    
                </div>

                <!-- password //-->
                <div class="user-input-box">
                    <label>Password</label>
                    <input type="password" required
                            id="password"
                            name="password"
                            placeholder="Password"/>
                    
                </div>

                <!-- login //-->
                <br><div class="pass">Forgot Password?</div>
                <input type="submit" value="Login">

                <!-- sign up //-->
                <div class="signup_link">
                    Don't have an account?<a href="form_simpan.php">Sign Up</a>
                </div>

                <!-- Lihat Data -->
                <div class="signup_link">
                    See Data?<a href="list_calon.php">Data</a>
                </div>
            </div>
            
        </form>
    </div>

    <?php if(isset($_GET['status'])): ?>
    <p>
        <?php
            if($_GET['status'] == 'sukses'){
                echo "Pendaftaran anda berhasil silahkan ditunggu info selanjutnya";
            } else {
                echo "Pendaftaran gagal!";
            }
        ?>
    </p>
    <?php endif; ?>

</body>
</html>