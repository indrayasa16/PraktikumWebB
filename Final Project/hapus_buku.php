<?php
include 'koneksi.php';

$id = $_GET['id'];
$sql = mysqli_query($conn, "DELETE FROM tb_buku WHERE kode_buku = '$id'") or die(mysqli_error($conn));

if($sql){
	echo "<script>alert('Data Buku Berhasil di hapus');
	document.location.href='Home-Admin.php'</script>\n";
}
else{
	echo "<script>alert('Gagal di hapus');
	document.location.href = 'Home-Admin.php'</script>\n";
}
?>