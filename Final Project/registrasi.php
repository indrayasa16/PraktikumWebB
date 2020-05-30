<!DOCTYPE html>
<html>
<head>
	<title>Registrasi</title>
	<link rel="stylesheet" type="text/css" href=css/registrasi.css />
</head>
<body>
    <div class="card">
        <div class="card-content">
            <div class="card-title">
                <h3>REGISTRASI</h3>
                <div class="garis"></div>
            </div>
        </div>
        <?php
			include "koneksi.php";
			if(isset($_POST['submit'])) {
                $username = $_POST['username'];
                $nama = $_POST['nama'];
                $tglLahir = $_POST['tglLahir'];
                $jk = $_POST['jenisKelamin'];
                $no_tlp = $_POST['no_tlp'];
                $alamat = $_POST['alamat'];
                $password = $_POST['passwords'];

				$query = "INSERT INTO tb_user (username, nama, tanggal_lahir, jenis_kelamin, no_tlp, alamat, passwords, status_user) VALUES ('$username', '$nama', '$tglLahir', '$jk', '$no_tlp', '$alamat', '$password', 'User')";			
				$daftar = mysqli_query($conn, $query) or die (mysqli_error($conn));
				if($daftar) {
					echo "<script>alert('Anda Berhasil Mendaftar');
	                        document.location.href='index.php'</script>\n";
				}
				else {
					echo "<script>alert('Anda Gagal Mendaftar');
	                    document.location.href='registrasi.php'</script>\n";
				}
			}
		?>
        <form action="" method="post" class="form">
            <label for="username" style="padding-top:13px">&nbsp;Username</label>
            <input type="text" id="username" name="username" class="login-form" autocomplete="on"  required/>
            
            <div class="form-border"></div>
            <label for="nama" style="padding-top:13px">&nbsp;Nama</label>
            <input type="text" id="nama" name="nama" class="login-form" required/>
            
            <div class="form-border"></div>
            <label for="tglLahir" style="padding-top:13px">&nbsp;Tanggal Lahir</label>
            <input type="date" id="tglLahir" name="tglLahir" class="login-form" required/>
            
            <div class="form-border"></div>
            <label for="jenisKelamin" style="padding-top:13px">&nbsp;Jenis Kelamin</label>
            <input type="radio" id="jenisKelamin" name="jenisKelamin" class="login-form" value="Laki - Laki" required/>Laki - Laki<br>
            <input type="radio" id="jenisKelamin" name="jenisKelamin" class="login-form" value="Perempuan" required/>Perempuan<br>
            
            <div class="form-border"></div>
            <label for="no_tlp" style="padding-top:13px">&nbsp;No Telpon</label>
            <input type="text" id="no_tlp" name="no_tlp" class="login-form" required/>
            
            <div class="form-border"></div>
            <label for="alamat" style="padding-top:13px">&nbsp;Alamat</label>
            <textarea  id="alamat" name="alamat" class="login-form" required></textarea>
            
            <div class="form-border"></div>
            <label for="passwords" style="padding-top:13px">&nbsp;Password</label>
            <input type="password" id="passwords" name="passwords" class="login-form" required/>

            <div class="form-border"></div>
            <input type="submit" name="submit" class="btn-submit" value="Daftar">
         </form>
    </div>
</body>
</html>