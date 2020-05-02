<?php
	session_start();

	if(!isset($_GET["id"])){
		header("location:view.php");
		exit();
	}

	include 'konek.php';

	$key = $_GET["id"];

	$getDataa = $koneksi->query("SELECT * FROM tb_biodata WHERE NIM = ".$key); 

	if($getDataa->num_rows==0){
		header("location:view.php");
		exit();
	}

	$getDataa = $getDataa->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
	<link rel="stylesheet" type="text/css" href="custom.css">
</head>
<body>
	<center>
	<h1>Form Edit Data</h1>
	<form action="eedit.php" method="POST">
		<input type="hidden" name="id" value="<?=$_GET["id"]?>">
		<table>
			<tr>
				<td>NIM</td>
				<td>:</td>
				<td><input type="text" name="nim" value="<?=$getDataa["NIM"]?>"></input></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td>:</td>
				<td><input type="text" name="nama" value="<?=$getDataa["Nama"]?>"></input></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td>:</td>
				<td><textarea name="alamat"><?=$getDataa["Alamat"]?></textarea></td>
			</tr>
			<tr>
				<td>Telepon</td>
				<td>:</td>
				<td><input type="text" name="telp" value="<?=$getDataa["No_telepon"]?>"></input></td>
			</tr>
		</table>
		<button name="ubah">Edit</button></td>

	</form>
	</center>
</body>
</html>