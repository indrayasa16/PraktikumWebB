<!DOCTYPE html>
<html>
<head>
	<title>View</title>
</head>
<link rel="stylesheet" type="text/css" href="custom.css">
<body>
	<center>
	<h1>Data Mahasiswa</h1>
	<table border="1" class="lihat-tabel">
		<tr>
			<th>NIM</th>
			<th>Nama</th>
			<th>Alamat</th>
			<th>No. Telp.</th>
			<th class="ket">Keterangan</th>
		</tr>
	<?php
		include 'konek.php';
		$getData = $koneksi->query("SELECT * FROM tb_biodata");
		while($fetchData = $getData->fetch_assoc()){
	?>
		<tr class="jarak">
			<td><?=$fetchData["NIM"]?></td>
			<td><?=$fetchData["Nama"]?></td>
			<td><?=$fetchData["Alamat"]?></td>
			<td><?=$fetchData["No_telepon"]?></td>
			<td>
				<a href="edit-data.php?id=<?=$fetchData["NIM"]?>">Edit</a>
				<a href="">/</a>
				<a href="delete-data.php?id=<?=$fetchData["NIM"]?>">Hapus</a>
			</td>
		</tr>
	<?php
		}
	?>
	</table>
	<a href="index.php"><button type="button" class="button">Insert Data</button></a>
	</center>
</body>
</html>