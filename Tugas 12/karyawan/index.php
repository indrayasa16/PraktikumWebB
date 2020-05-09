<?php
    session_start();
    if(isset($_SESSION['level'])){
      if($_SESSION['level'] != 'karyawan'){
        header('Location: ../admin/index.php');
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
    <title>E-Perpustakaan</title>
    <link rel="stylesheet" href="../css/index.css">
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
                <h3>Buku terbaru</h3>
 
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
                <h3>Einstein, Kehidupan dan Pengaruhnya Bagi Dunia</h3>
                <span class="tanggal-posting">
                    Diposting pada 21.00 WITA, 1 April 2020
                </span>
 
                <img src="../img/buku1.jpg">
 
                <p>Soe Hok Gie adalah salah seorang aktivis Indonesia keturunan tionghoa yang turut andil dalam penurunan kekuasaan Orde Lama. Lahir di Jakarta, 17 Desember 1942, Gie merupakan anak ke empat dari lima bersaudara keluarga Soe Lie Piet. Ayah Gie, Soe Lie Pit adalah seorang novelis. Gie kecil sering mengunjungi perpustakaan umum dan taman bacaan di pinggir-pinggir jalan di Jakarta bersama kakaknya, Soe Hok Djin. Lahir dari keluarga penulis membuat Gie begitu dekat dengan sastra. Seorang peneliti menyebutkan bahwa sejak masih sekolah dasar (SD), Gie bahkan sudah membaca karya-karya sastra yang serius, seperti karya Pramoedya Ananta Toer.
                </p>
                <a class="tombol tombol-lengkap" href="#">Selengkapnya</a>
            </div>
             <div class="kotak">
                <h3>Einstein, Kehidupan dan Pengaruhnya Bagi Dunia</h3>
                <span class="tanggal-posting">
                    Diposting pada 21.00 WITA, 1 April 2020
                </span>
 
                <img src="../img/buku2.jpg">
 
                <p>Dr. Ir. H. Soekarno adalah Presiden pertama Republik Indonesia yang menjabat pada periode 1945–1967. Ia memainkan peranan penting dalam memerdekakan bangsa Indonesia dari penjajahan Belanda. Ia adalah Proklamator Kemerdekaan Indonesia yang terjadi pada tanggal 17 Agustus 1945
                </p>
                <a class="tombol tombol-lengkap" href="#">Selengkapnya</a>
            </div>
        </div>
 
        <div class="menu-kanan">
            <div class="kotak">
                <h3>Jadwal Buka</h3>
                <img src="../img/buku3.png" style="height: 200px;">
 
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