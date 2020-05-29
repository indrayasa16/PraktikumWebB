<?php
include 'koneksi.php';
if($_GET['act']== 'edit'){
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $pass = $_POST['password'];
    $tgl = $_POST['tgl'];
    $jk = $_POST['jk'];
    $alamat = $_POST['alamat'];
    $tlp = $_POST['tlp'];
    $id = $_POST['id'];
    
    $edit = mysqli_query($conn, "UPDATE tb_user SET
                                 nama = '$nama',
                                 username = '$username',
                                 passwords = '$pass',
                                 alamat = '$alamat',
                                 tanggal_lahir = '$tgl',
                                 jenis_kelamin = '$jk',
                                 no_tlp = '$tlp' WHERE id = '$id'")or die (mysqli_error($conn)); 

    if($edit){
        echo "<script>alert('Berhasil di edit');
        document.location.href = 'index.php'</script>\n";
    }
    else{
        echo "<script>alert('Gagal di edit');
        document.location.href = 'index.php'</script>\n";
    } 
}
?>
