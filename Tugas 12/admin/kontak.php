<?php
    session_start();
    if(isset($_SESSION['level'])){
      if($_SESSION['level'] != 'admin'){
        header('Location: ../petugas/kontak.php');
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
    <title>Kontak</title>
    <link rel="stylesheet" href="../css/kontak.css">
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
                <li><a href="#">Helo Admin :)</a></li>
            </ul>
        </nav>
 
        <div class="banner" style="background-image: url(../img/banner.jpg);background-size: 1050px 300px;">
           <h1>Selamat Datang di E-Perpustakaan</h1>
        </div>
 
        <div class="menu-kiri">
            <div class="kotak">
                <nav class="menu-populer">
                    <ul>
                        <li><a href="kontak.html">Kontak</a></li>
                        <li><a href="galeri.html">Koleksi Buku</a></li>
                        <li><a href="tentang.html">Tentang Kami</a></li>
                        <li><a href="index.html">Beranda</a></li>
                    </ul>
                </nav>
                <h3>Menu</h3>
                <nav class="menu-populer">
                    <ul>
                        <li><a href="#">Login</a></li>
                        <li><a href="#">Daftar</a></li>
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
                <h1 style="text-align: center;">Author Web</h1>
                <img src="../img/fotoku.jpg" alt="" style="height: 150px; width: 150px; display: block; margin: auto;">
                <br><h3>Nama     : I Wayan Gede Indrayasa</h3>
                    <h3>Email    : indrayasa038@gmail.com@gmail.com</h3>
                    <h3>Whatsapp : 082146504756</h3>
                    <h3>Line     : indrayasa16</h3>
            </div>
        </div>
 
        <div class="menu-kanan">
            <div class="kotak">
                <h3>Jadwal Buka</h3>
                <img src="../img/buku3.png">
 
                <h4 align="center">Jadwal Buka</h4>
                <center>
                    <p>Senin-Jumat</p>
                    <p>08.00 WITA - 20.00 WITA</p>
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