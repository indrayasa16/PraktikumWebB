<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="card">
        <div class="card-content">
            <div class="card-title">
                <h3>LOGIN</h3>
                <div class="garis"></div>
            </div>
        </div>
        <form action="proses_login.php" method="post" class="form">
            <label for="username" style="padding-top:13px">&nbsp;Username</label>
            <input type="text" id="username" name="username" class="login-form" autocomplete="on"  required/>
            <div class="form-border"></div>
            <label for="passwords" style="padding-top:13px">&nbsp;Password</label>
            <input type="password" id="passwords" name="passwords" class="login-form" required/>
            <div class="form-border"></div>
            <input type="submit" name="submit" class="btn-submit" value="Login">
        </form>
        <center><p>Belum memiliki Akun?</p><a href="registrasi.php" style="text-decoration:none;">Daftar</a></center>
    </div>
</body>
</html>