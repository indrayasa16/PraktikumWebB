<?php 
    include 'koneksi.php';
    session_start();

    //cek sudah login atau belum
    if($_SESSION['status_user']==""){
		header("location:login.php?pesan=gagal");
	}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Perpustakaan</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script type="text/javascript" src="js/jquery.js"></script>	
    <script type="text/javascript" src="js/bootstrap.js"></script>
</head>
<body>
    <nav class="navigasi">
        <ul>
            <li><a href="logout.php">Logout</a></li>
            <li><a href="#" data-toggle="modal" data-target="#edit">Profil</a></li>
            <li><a href="#sectionKontak">Kontak</a></li>
            <li><a href="#sectionTentang">Tentang</a></li>
            <li><a href="#sectionGaleri">Galeri</a></li>
            <li><a href="#sectionHome">Home</a></li>
        </ul>
    </nav>

    <div id="sectionHome">
        <h1>Selamat Datang di E-Perpustakaan, <?php echo $_SESSION['nama']; ?></h1>
        <h3>Perpustakaan Terlengkap Se-Indonesia</h3>
    </div>
     <div id="about" style="margin-top: 30px;">
        <div class="container">
            <div class="row">
                <div class="col-md-5 offset-md-1">
                    <div class="halign-center">
                        <h2 class="text-right font-weight-bold">Apa itu E-Perpustakaan ?</h2>
                        <div style="position: relative">
                            <p class="text-right">
                                E-Perpustakaan merupakan portal digital perpustakaan yang di digitalisasi untuk mempermudah pencarian buku secara online.Terdapat lebih dari 1 juta resource berupa buku, artikel dan masih banyak lagi yang dapet diakses dengan mudah kapan pun dan dimana pun. Visi misi E- Perpustakaan adalah menjadikan masyarakat membaca buku dengan akses yang mudah serta menyediakan resource buku untuk masyarakat. Pada E-Perpustakaan ini sudah didukung oleh banyak kalangan baik pemerintah maupun masyarakat.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <img src="img/tentangkami.jpg" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
    <hr>

    <div id="sectionGaleri">
        <h2>Galeri Buku</h2>
        <center><form action="#sectionGaleri" method="GET">
            <label>Cari Buku</label><br><br>
            <input type="text" name="cari">
            <input type="submit" value="Cari">
        </form></center>
        <?php 
        $batas = 2;
        $page = isset($_GET['halaman'])?(int)$_GET["halaman"] : 1;
        $mulai = ($page>1) ? ($page * $batas) - $batas : 0;
        $no = $mulai+1;
        if(isset($_GET['cari'])){
            $cari = $_GET['cari'];   
            $tampil = mysqli_query($conn, "SELECT * FROM tb_buku WHERE 
                                            judul_buku LIKE '%".$cari."%' OR
                                            tahun_terbit LIKE '%".$cari."%' OR
                                            penulis LIKE '%".$cari."%' OR
                                            nama_penerbit LIKE '%".$cari."%'
                                            ORDER BY judul_buku ASC") or die (mysqli_error($conn));
            while($data = mysqli_fetch_array($tampil)) { 
                                $id = $data["kode_buku"];
                                $gambar = $data['gambar'];
                                $nama = $data['judul_buku']; 
                                $penulis = $data['penulis'];
                                $tahun_terbit=$data['tahun_terbit'];
                                $penerbit = $data['nama_penerbit'];
                                $rak = $data['rak'];
                                $stok = $data['stok']; ?>
            <br>
            <div class="card" style="width: 18rem;">
                <img src="img/<?php echo $gambar; ?>" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $nama; ?></h5>
                    <p class="card-text"><?php echo $id; ?></p>
                    <p class="card-text"><?php echo $penulis; ?></p>
                    <p class="card-text"><?php echo $tahun_terbit; ?></p>
                    <p class="card-text"><?php echo $penerbit; ?></p>
                    <p class="card-text"><?php echo $rak; ?></p>
                </div>
                <div class="card-body">
                    <button class="btn btn-primary"><a href="#form-peminjaman">Pinjam</a></button>
                </div>
            </div>
        <?php $no++; }; 
        $hitung = mysqli_query($conn,"SELECT * FROM tb_buku") or die (mysqli_error($conn));
        $jmldata    = mysqli_num_rows($hitung);
        ?>
        <br>
        <center><?php
            $jmlhalaman = ceil($jmldata/$batas);
            for($i=1; $i<=$jmlhalaman; $i++){
                //echo '<a class="page" href="?halaman='.$i.'">'.$i.'</a>';
            } } 
        else{ 
            $tampil = mysqli_query($conn, "SELECT * FROM tb_buku LIMIT $mulai, $batas") or die (mysqli_error($conn));
                        while($data = mysqli_fetch_array($tampil)) { 
                        $id = $data['kode_buku'];
                        $gambar = $data['gambar'];
                        $nama = $data['judul_buku']; 
                        $penulis = $data['penulis'];
                        $tahun_terbit=$data['tahun_terbit'];
                        $penerbit = $data['nama_penerbit']; 
                        $rak = $data['rak'];
                        $stok = $data['stok']; ?>
             <br>
             <div class="card" style="width: 18rem;">
                <img src="img/<?php echo $gambar; ?>" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $nama; ?></h5>
                    <p class="card-text"><?php echo $id; ?></p>
                    <p class="card-text"><?php echo $penulis; ?></p>
                    <p class="card-text"><?php echo $tahun_terbit; ?></p>
                    <p class="card-text"><?php echo $penerbit; ?></p>
                    <p class="card-text"><?php echo $rak; ?></p>
                </div>
                <div class="card-body">
                    <button class="btn btn-primary"><a href="#form-peminjaman">Pinjam</a></button>
                </div>
            </div>
        <?php $no++; }; 
        $hitung = mysqli_query($conn,"SELECT * FROM tb_buku") or die (mysqli_error($conn));
        $jmldata = mysqli_num_rows($hitung);
        ?>
        <br>
        <center><?php
            $jmlhalaman = ceil($jmldata/$batas);
            for($i=1; $i<=$jmlhalaman; $i++){
                echo '<a class="page" href="?halaman='.$i.'">'.$i.'</a>';
            } } ?></center>
    </div>
    <br><br><hr>

    <div id="form-peminjaman">
        <center><h1>Pinjam Buku Sekarang !</h1><br>
        <form  action="proses_pinjam.php" method="post">
        <table>
            <tr>
            <td></td>
            <td><input type="hidden" id="id_pengguna" name="id_pengguna" value="<?php echo $_SESSION['id'];?>"></td>
            </tr>
            <tr>
            <td>Nama Peminjam</td>
            <td><input type="text" id="nama" name="nama" value="<?php echo $_SESSION['nama'];?>"></td>
            </tr>
            <tr>
            <td>Judul Buku</td>
            <td><input type="text" id="judul" name="judul" placeholder="Masukan Judul Buku"></td>
            </tr>
            <tr>
            <td>Kode Buku</td>
            <td><input type="text" id="kode" name="kode" placeholder="Masukan Kode Buku"></td>
            </tr>
            <tr>
            <td>Tanggal Pinjam</td>
            <td><input type="date" id="tanggal" name="tanggal"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="submit" value="Pinjam"></td>
            </tr>
        </table>
    </form></center>
    </div>

    <br><br><br><br><br>

    <?php 
            $id = $_SESSION['id'];
            $sql = mysqli_query($conn, "SELECT * FROM tb_user WHERE id='$id'")or die (mysqli_error($conn));
            $data = mysqli_fetch_assoc($sql);?>
    <div id="edit"class="modal fade" style="display:none;">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Profile </h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="form-peminjaman">
                            <form id="defaultForm" action="edit_profile.php?act=edit" method="post" class="form-horizontal" enctype="multipart/form-data">
                            <table>
                                <td></td>
                                <td><input type="hidden" id="id" name="id" width="100%" value="<?php echo $data['id'];?>"></td>
                                </tr>
                                <td>Nama</td>
                                <td><input type="text" id="nama" name="nama" width="100%" value="<?php echo $data['nama'];?>"></td>
                                </tr>
                                <td>Username</td>
                                <td><input type="text" id="username" name="username" width="100%" value="<?php echo $data['username'];?>"></td>
                                </tr>
                                <td>Password</td>
                                <td><input type="text" id="password" name="password" width="100%" value="<?php echo $data['passwords'];?>"></td>
                                </tr>
                                <tr>
                                <td>Tanggal Lahir</td>
                                <td><input type="date" id="tgl" name="tgl" width="100%" value="<?php echo $data['tanggal_lahir']; ?>"></td>
                                </tr>
                                <td>Jenis Kelamin</td>
                                <td><input type="text" id="jk" name="jk" width="100%" readonly value="<?php echo $data['jenis_kelamin'];?>"></td>
                                </tr>
                                <td>Alamat</td>
                                <td><input type="text" id="alamat" name="alamat" width="100%" value="<?php echo $data['alamat'];?>"></td>
                                </tr>
                                <tr>
                                <td>No Telpon</td>
                                <td><input type="text" id="tlp" name="tlp" width="100%" value="<?php echo $data['no_tlp'];?>"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="submit" name="submit" value="Simpan"></td>
                                </tr>
                            </table>
                            </form>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div><!-- tutup modal input -->

    
    <br>
    <br>

<!-- Footer -->
<footer class="page-footer font-small blue pt-4">

  <!-- Footer Links -->
  <div class="container-fluid text-center text-md-left">

    <!-- Grid row -->
    <div class="row">

      <!-- Grid column -->
      <div class="col-md-6 mt-md-0 mt-3">

        <!-- Content -->
        <h5 class="text-uppercase">E-Perpustakaan </h5>
        <p>Perpustakaan Dengan Koleksi Buku Terlengkap</p>

      </div>
      <!-- Grid column -->



      <!-- Grid column -->
      <div class="col-md-3 mb-md-0 mb-3">

        <!-- Links -->
        <h5 class="text-uppercase">Tentang Kami</h5>

        <ul class="list-unstyled">
          <li>
           Facebook
          </li>
          <li>
            Instagrams
          </li>
          <li>
           Twitter
          </li>
          <li>
            Whatsapp
          </li>
        </ul>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-3 mb-md-0 mb-3">

        <!-- Links -->
        <h5 class="text-uppercase" >Layanan</h5>

        <ul class="list-unstyled">
          <li>
            <a  href="?page=buku" style="color: black;"> Koleksi Buku</a>
          </li>
          <li>
           <li><a href="?page=transaksi" style="color: black;"> Transaksi</a></li>
          </li>
          <li>
             <a href="?page=laporan"style="color: black;" > Laporan</a>
          </li>
          <li>
           FAQ
          </li>
        </ul>

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Links -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2020 Copyright:
    <a href="https://mdbootstrap.com/" style="color: black;"> E-Perpustakaan.com</a>
  </div>
  <!-- Copyright -->

</footer>

  

</body>
</html>