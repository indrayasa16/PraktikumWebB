<?php 
	session_start();

	if(isset($_GET["id"])){
		include 'konek.php';	
		$koneksi->query("DELETE FROM tb_biodata WHERE NIM =".$_GET["id"]);
	}
	header("location:view.php");
	exit();
?>