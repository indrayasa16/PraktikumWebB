<?php 
	session_start();
	if(isset($_POST['kirim'])){

		include ('konek.php');

		$nim=$_POST['nim'];
		$nama=$_POST['nama'];
		$alamat=$_POST['alamat'];
		$telp=$_POST['telp'];	

		$koneksi->query("INSERT INTO tb_biodata VALUES('".$nim."','".$nama."','".$alamat."','".$telp."')");
	}
	header("location:index.php");
	exit();
 ?>