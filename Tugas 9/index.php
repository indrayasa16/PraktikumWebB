<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>CRUD Page</title>
</head>
<link rel="stylesheet" type="text/css" href="custom.css">
<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
<body>
	<center>
	<h1>Form Mahasiswa</h1>
	<form action="insert.php" method="POST">
	<div class="tabel">
		<table>
			<tr>
				<td>NIM</td>
				<td>:</td>
				<td><input class="input" type="text" name="nim" placeholder="NIM"></input></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td>:</td>
				<td><input class="input" type="text" name="nama" placeholder="Nama Lengkap"></input></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td>:</td>
				<td><textarea class="input" name="alamat" placeholder="Alamat Lengkap"></textarea></td>
			</tr>
			<tr>
				<td>Telepon</td>
				<td>:</td>
				<td><input class="input" type="text" name="telp" placeholder="No. Telp Aktif"></input></td>
			</tr>
		
		
		</table>
		
			<button class="buttons" name="kirim">Input</button>
		
			<a href="view.php"><button type="button" class="button">Lihat Data</button></a>
	</div>
	</form>
	</center>
</body>
</html>
