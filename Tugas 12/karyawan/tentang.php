<?php
    session_start();
    if(isset($_SESSION['level'])){
      if($_SESSION['level'] != 'karyawan'){
        header('Location: ../admin/tentang.php');
      }
    }
    else{
      header('Location: ../index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>About</title>
    <link rel="stylesheet" href="../css/tentang.css">
</head>
<body>
     
    <div class="utama">
        <nav class="navigasi">
            <ul>
                <li><a href="logout.php">Logout</a></li>
                <li><a href="kontak.php">Kontak</a></li>
                <li><a href="galeri.php">Koleksi Buku</a></li>
                <li><a href="tentang.php">Tentang Kami</a></li>
                <li><a href="index.php">Beranda</a></li>
                <li><a href="#">Helo Karyawan :)</a></li>
            </ul>
        </nav>
 
        <div class="banner" style="background-image: url(../img/banner.jpg);background-size: 1050px 300px;">
           <h1>Selamat Datang di E-Perpustakaan</h1>
        </div>
 
        <div class="menu-kiri">
            <div class="kotak">
                <nav class="menu-populer">
                    <ul>
                        <li><a href="kontak.php">Kontak</a></li>
                        <li><a href="galeri.php">Koleksi Buku</a></li>
                        <li><a href="tentang.php">Tentang Kami</a></li>
                        <li><a href="index.php">Beranda</a></li>
                    </ul>
                </nav>
                <h3>Buku Terbaru</h3>
 
                <nav class="menu-populer">
                   <ul>
                        <li><a href="#">Buku SD</a></li>
                        <li><a href="#">Buku SMP</a></li>
                        <li><a href="#">Buku SMA</a></li>
                        <li><a href="#">Buku SMK</a></li>
                        <li><a href="#">Buku TK</a></li>
                    </ul>
                </nav>
            </div>
        </div>      

        <div class="menu-tengah">
            <div class="kotak">
                    <h1>Tentang Kami</h1>
                    <h3>Sejarah</h3>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                    <h3>Visi & Misi</h3>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                </div>
        </div>
 
        <div class="menu-kanan">
            <div class="kotak">
                <h3>Jadwal Buka</h3>
                <img src="../img/buku3.png">
 
                <h4 align="center">Jadwal Buka</h4>
                <center>
                    <p>Senin-Jumat</p>
                    <p>08.00 WITA - 16.00 WITA</p>
                </center>
            </div>
 
 
            <div class="kotak">
                <h3>Buku Terpopuler</h3>
 
                <nav class="menu-populer">
                    <ul>
                        <li><a href="#">Buku Komputer</a></li>
                        <li><a href="#">Buku Kesehatan</a></li>
                        <li><a href="#">Buku Novel</a></li>
                        <li><a href="#">Buku Politik</a></li>
                        <li><a href="#">Buku Makanan</a></li>
                    </ul>
                </nav>
            </div>
        </div>
 
        <footer>
            @copyright 2020 - Indrayasa
        </footer>
 
    </div>
 
</body>
</html>