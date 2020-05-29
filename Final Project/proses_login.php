<?php
include 'koneksi.php';
session_start(); //mengaktifkan session

$username = $_POST['username'];
$password = $_POST['passwords'];

$query = mysqli_query($conn, "SELECT * FROM tb_user WHERE
                               username = '$username' AND 
                               passwords = '$password'")or die (mysqli_error($conn));
$hitung = mysqli_num_rows($query);

if($hitung > 0){
    $data = mysqli_fetch_assoc($query);
    if($data['status_user'] == "Admin"){
        $nama = $data['nama'];
        $id = $data['id'];
        $_SESSION['id'] = $id;
        $_SESSION['nama'] = $nama;
        $_SESSION['username'] = $username;
        $_SESSION['status_user'] = "Admin";
        echo "<script>alert('$nama Login Sebagai Admin');
	          document.location.href='Home-Admin.php'</script>\n";
    }
    else if($data['status_user'] == "User"){
        $nama = $data['nama'];
        $id = $data['id'];
        $_SESSION['id'] = $id;
        $_SESSION['nama'] = $nama;
        $_SESSION['username'] = $username;
        $_SESSION['status_user'] = "User";
        echo "<script>document.location.href='index.php'</script>\n";
    }
    else if($data['status_user'] == "Super Admin"){
        $nama = $data['nama'];
        $id = $data['id'];
        $_SESSION['id'] = $id;
        $_SESSION['nama'] = $nama;
        $_SESSION['username'] = $username;
        $_SESSION['status_user'] = "SuperAdmin";
        echo "<script>alert('$nama Login Sebagai Super Admin');
	          document.location.href='SuperAdmin.php'</script>\n";
    }
    else{
        echo "<script>alert('Anda Gagal Melakukan Login, Ulangi Kembali');
	          document.location.href='index.php'</script>\n";
    }
}
else{
    echo "<script>alert('Anda Gagal Melakukan Login, Ulangi Kembali');
	          document.location.href='index.php'</script>\n";; 
}
?>