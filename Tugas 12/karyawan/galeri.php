<?php
    session_start();
    if(isset($_SESSION['level'])){
      if($_SESSION['level'] != 'karyawan'){
        header('Location: ../admin/galeri.php');
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
    <title>Galeri Buku</title>
    <link rel="stylesheet" href="../css/galeri.css">
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

        <div class="menu-tengah">
            <div class="kotak-tengah">
                <div class="content">
                    <h1>Koleksi Buku Politik</h1>
                    <table class="galeri" width="100px" height="250px">
                        <tr>
                            <td><img src="../img/buku1.jpg" height="10px" width="8px"></td>
                            <td><img src="../img/buku2.jpg" height="10px" width="8px"></td>
                        </tr>
                        <tr>
                            <td>Berisi materi mengenai Soe Hoek Gie.</td>
                            <td>Berisi materi mengenai Soekarno.</td>
                        </tr>
                        <tr>
                            <td>Diterbitkan Oleh Erlangga (2010)</td>
                            <td>Diterbitkan Oleh Erlangga (2010)</td>
                        </tr>
                    </table>
                </div>
                    <div class="content">
                    <h1>Koleksi Buku Komputer</h1>
                    <table class="galeri" width="100px" height="250px">
                        <tr>
                            <td><img src="../img/buku4.jpg" height="10px" width="8px"></td>
                            <td><img src="../img/buku5.jpg" height="10px" width="8px"></td>
                        </tr>
                        <tr>
                            <td>Berisi materi mengenai html.</td>
                            <td>Berisi materi mengenai css.</td>
                        </tr>
                        <tr>
                            <td>Diterbitkan Oleh Erlangga (2019)</td>
                            <td>Diterbitkan Oleh Erlangga (2016)</td>
                        </tr>
                    </table>
                </div>
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
 
    </div>
 
</body>
</html>