<?php
	include "koneksi.php";

	$id = $_POST['id_pengguna'];
	$kd_buku = $_POST['kode'];
	$tanggal = $_POST['tanggal'];

	$query = mysqli_query($conn, "INSERT INTO meminjam(tgl_pinjam, id_anggota, kd_buku, kembali) 
    VALUES('".$tanggal. "','".$id."', '".$kd_buku."', 0)") or die(mysqli_error($conn));

	if($query){
		echo "<script>alert('Buku berhasil dipinjam');
		document.location.href='index.php'</script>\n";
	}  
	else{
		echo "<script>alert('Gagal');
		document.location.href='index.php'</script>\n";
	}
?>