<?php
include 'koneksi.php';
if($_GET['act']== 'tambahadmin'){
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $pass = $_POST['pass'];
    $tgl = $_POST['tgl'];
    $jk = $_POST['jk'];
    $alamat = $_POST['alamat'];
    $tlp = $_POST['tlp'];
    $status = $_POST['status'];

    $tambah =  mysqli_query($conn, "INSERT INTO tb_user 
        VALUES('','$nama' , '$username' , '$pass' , '$alamat' ,'$tgl' ,'$jk' , '$tlp' , '$status')") or die (mysqli_error($conn));

    if($tambah){
        echo "<script>alert('Berhasil di Tambahkan');
        document.location.href = 'SuperAdmin.php'</script>\n";
    }
    else{
        echo "<script>alert('Gagal di Tambahkan');
        document.location.href = 'SuperAdmin.php'</script>\n";
    } 
}
