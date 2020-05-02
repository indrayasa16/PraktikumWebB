<?php 
	$koneksi=mysqli_connect("localhost","root","","tugascrud");

	if(!$koneksi){
		echo "Gagal Koneksi";
		exit();
	}

 ?>