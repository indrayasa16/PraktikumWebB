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
    <link rel="stylesheet" href="css/superAdmin.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script type="text/javascript" src="js/jquery.js"></script>	
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>	
</head>
<body>
    <nav class="navigasi">
        <ul>
           <li><a href="logout.php">Logout</a></li>
            <li><a href="#" data-toggle="modal" data-target="#edit">Hi,SAdmin</a></li>
            <li><a href="#sectionBuku">Buku</a></li>
            <li><a href="#sectionData">User</a></li>
            <li><a href="#sectionPeminjam">Pinjam</a></li>
             <li><a href="#sectionHome">Home</a></li>
        </ul>
    </nav>

    <div id="sectionBuku">
        <h2>Data Buku</h2>
        <center><form action="#sectionBuku" method="GET">
            <label>Cari Buku</label><br><br>
            <input id="cari" type="text" name="cari">
            <input id="submit"type="submit" value="Cari">
        </form></center><br>
        <br><br><table class="table table-bordered table-primary">
                    <thead>
                        <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kode Buku</th>
                        <th scope="col">Rak Buku</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Judul Buku</th>
                        <th scope="col">Penulis</th>
                        <th scope="col">Tahun Terbit</th>
                        <th scope="col">Penerbit</th>
                        <th scope="col">Stok</th>
                        </tr>
                    </thead>
        <?php 
        $batas = 3;
        $page = isset($_GET['halaman'])?(int)$_GET["halaman"] : 1;
        $mulai = ($page>1) ? ($page * $batas) - $batas : 0;
        $no = $mulai+1;
        if(isset($_GET['cari'])){
            $cari = $_GET['cari'];
            $a=1;   
            $tampil = mysqli_query($conn, "SELECT * FROM tb_buku WHERE 
                                            judul_buku LIKE '%".$cari."%' OR
                                            tahun_terbit LIKE '%".$cari."%' OR
                                            penulis LIKE '%".$cari."%' OR
                                            nama_penerbit LIKE '%".$cari."%'
                                            ORDER BY judul_buku ASC") or die (mysqli_error($conn));
            while($data = mysqli_fetch_array($tampil)) { 
                                $id = $data["kode_buku"];
                                $rak = $data['rak'];
                                $gambar = $data['gambar'];
                                $nama = $data['judul_buku']; 
                                $penulis = $data['penulis'];
                                $tahun_terbit=$data['tahun_terbit'];
                                $penerbit = $data['nama_penerbit'];
                                $stok = $data['stok'];?>
            
                    <tbody>
                        <tr>
                        <th scope="row"><?php echo $a++; ?></th>
                        <td><?php echo $id; ?></td>
                        <td><?php echo $rak; ?></td>
                        <td><img src="img/<?php echo $gambar; ?>" style="width:150px; height:150px;"></td>
                        <td><?php echo $nama; ?></td>
                        <td><?php echo $penulis; ?></td>
                        <td><?php echo $tahun_terbit; ?></td>
                        <td><?php echo $penerbit; ?></td>
                        <td><?php echo $stok; ?></td>
                        </tr>
                    </tbody>
                <?php } } 
            else{
                $a=1; 
                $tampil = mysqli_query($conn, "SELECT * FROM tb_buku LIMIT $mulai, $batas") or die (mysqli_error($conn));
                            while($data = mysqli_fetch_array($tampil)) { 
                            $id = $data['kode_buku'];
                            $rak = $data['rak'];
                            $gambar = $data['gambar'];
                            $nama = $data['judul_buku']; 
                            $penulis = $data['penulis'];
                            $tahun_terbit=$data['tahun_terbit'];
                            $penerbit = $data['nama_penerbit']; 
                            $stok = $data['stok']; ?>
                    <tbody>
                        <tr>
                        <th scope="row"><?php echo $a++; ?></th>
                        <td><?php echo $id; ?></td>
                        <td><?php echo $rak; ?></td>
                        <td><img src="img/<?php echo $gambar; ?>" style="width:150px; height:150px;"></td>
                        <td><?php echo $nama; ?></td>
                        <td><?php echo $penulis; ?></td>
                        <td><?php echo $tahun_terbit; ?></td>
                        <td><?php echo $penerbit; ?></td>
                        <td><?php echo $stok; ?></td>
                        </tr>
                    </tbody>
                    <?php $no++; }; } ?></table>
                    <?php $hitung = mysqli_query($conn,"SELECT * FROM tb_buku") or die (mysqli_error($conn));
                    $jmldata = mysqli_num_rows($hitung);
                    ?>
                    <br>
                    <?php
                        $jmlhalaman = ceil($jmldata/$batas);
                        for($i=1; $i<=$jmlhalaman; $i++){
                            echo '<a class="page" href="?halaman='.$i.'">'.$i.'</a>';
                        }  ?>

           
    
    </div> <!-- tutup div section Buku -->

    <br><br><hr>

    <div id="sectionData">
    <h2>Data Anggota</h2>
        <center><form action="#sectionData" method="GET">
            <label>Cari Anggota</label><br><br>
            <input type="text" name="cari">
            <input type="submit" value="Cari">
        </form></center><br>
        <br><br><table class="table table-bordered table-primary">
                    <thead>
                        <tr>
                        <th scope="col">No</th>
                        <th scope="col">ID Anggota</th>
                        <th scope="col">Username</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Tanggal Lahir</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">No Telpon</th>
                        </tr>
                    </thead>
        <?php $batas = 3;
        $page = isset($_GET['halaman'])?(int)$_GET["halaman"] : 1;
        $mulai = ($page>1) ? ($page * $batas) - $batas : 0;
        $no = $mulai+1;
        if(isset($_GET['cari'])){
            $cari = $_GET['cari'];
            $a=1;   
            $tampil = mysqli_query($conn, "SELECT * FROM tb_user WHERE 
                                            nama LIKE '%".$cari."%' OR
                                            username LIKE '%".$cari."%' OR
                                            alamat LIKE '%".$cari."%' OR
                                            jenis_kelamin LIKE '%".$cari."%' 
                                            AND status_user IN ('User')
                                            ORDER BY nama ASC") or die (mysqli_error($conn));
            while($data = mysqli_fetch_array($tampil)) { 
                                $id = $data["id"];
                                $nama = $data['nama'];
                                $username = $data['username'];
                                $tanggal = $data['tanggal_lahir']; 
                                $alamat = $data['alamat'];
                                $jk =$data['jenis_kelamin'];
                                $no_tlp = $data['no_tlp'];?>
            
                    <tbody>
                        <tr>
                        <th scope="row"><?php echo $a++; ?></th>
                        <td><?php echo $id; ?></td>
                        <td><?php echo $username; ?></td>
                        <td><?php echo $nama; ?></td>
                        <td><?php echo $jk; ?></td>
                        <td><?php echo $tanggal; ?></td>
                        <td><?php echo $alamat; ?></td>
                        <td><?php echo $no_tlp; ?></td>
                        </tr>
                    </tbody>
                <?php } } 
                else{
                    $a=1; 
                    $user = 'User';
                    $tampil = mysqli_query($conn, "SELECT * FROM tb_user WHERE status_user = '$user' LIMIT $mulai, $batas") or die (mysqli_error($conn));
                    while($data = mysqli_fetch_array($tampil)) { 
                    $id = $data["id"];
                    $nama = $data['nama'];
                    $username = $data['username'];
                    $tanggal = $data['tanggal_lahir']; 
                    $alamat = $data['alamat'];
                    $jk =$data['jenis_kelamin'];
                    $no_tlp = $data['no_tlp'];?>

                    <tbody>
                        <tr>
                        <th scope="row"><?php echo $a++; ?></th>
                        <td><?php echo $id; ?></td>
                        <td><?php echo $username; ?></td>
                        <td><?php echo $nama; ?></td>
                        <td><?php echo $jk; ?></td>
                        <td><?php echo $tanggal; ?></td>
                        <td><?php echo $alamat; ?></td>
                        <td><?php echo $no_tlp; ?></td>
                        </tr>
                    </tbody>
                    <?php $no++; } } ?></table>
                    <?php $hitung = mysqli_query($conn,"SELECT * FROM tb_buku") or die (mysqli_error($conn));
                    $jmldata = mysqli_num_rows($hitung);
                    ?>
                    <br>
                    <?php
                        $jmlhalaman = ceil($jmldata/$batas);
                        for($i=1; $i<=$jmlhalaman; $i++){
                            echo '<a class="page" href="?halaman='.$i.'">'.$i.'</a>';
                        }  ?>

    </div>

    <div id="sectionAdmin">
    <h2>Data Admin</h2>
        <center><form action="#sectionData" method="GET">
            <label>Cari Admin</label><br><br>
            <input type="text" name="cari">
            <input type="submit" value="Cari">
        </form></center><br>
        <div class="box-tools pull-left">
            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#tambahadmin">Tambah Admin</a>
        </div>
        <br><br><table class="table table-bordered table-primary">
                    <thead>
                        <tr>
                        <th scope="col">No</th>
                        <th scope="col">ID Admin</th>
                        <th scope="col">Username</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Tanggal Lahir</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">No Telpon</th>
                        </tr>
                    </thead>
        <?php $batas = 3;
        $page = isset($_GET['halaman'])?(int)$_GET["halaman"] : 1;
        $mulai = ($page>1) ? ($page * $batas) - $batas : 0;
        $no = $mulai+1;
        if(isset($_GET['cari'])){
            $cari = $_GET['cari'];
            $a=1;   
            $admin = 'Admin';
            $tampil = mysqli_query($conn, "SELECT * FROM tb_user WHERE 
                                            nama LIKE '%".$cari."%' OR
                                            username LIKE '%".$cari."%' OR
                                            alamat LIKE '%".$cari."%' OR
                                            jenis_kelamin LIKE '%".$cari."%' 
                                            AND status_user WHERE ='$admin'
                                            ORDER BY nama ASC") or die (mysqli_error($conn));
            while($data = mysqli_fetch_array($tampil)) { 
                                $id = $data["id"];
                                $nama = $data['nama'];
                                $username = $data['username'];
                                $tanggal = $data['tanggal_lahir']; 
                                $alamat = $data['alamat'];
                                $jk =$data['jenis_kelamin'];
                                $no_tlp = $data['no_tlp'];?>
            
                    <tbody>
                        <tr>
                        <th scope="row"><?php echo $a++; ?></th>
                        <td><?php echo $id; ?></td>
                        <td><?php echo $username; ?></td>
                        <td><?php echo $nama; ?></td>
                        <td><?php echo $jk; ?></td>
                        <td><?php echo $tanggal; ?></td>
                        <td><?php echo $alamat; ?></td>
                        <td><?php echo $no_tlp; ?></td>
                        </tr>
                    </tbody>
                <?php } } 
                else{
                    $a=1; 
                    $admin = 'Admin';
                    $tampil = mysqli_query($conn, "SELECT * FROM tb_user WHERE status_user = '$admin' LIMIT $mulai, $batas") or die (mysqli_error($conn));
                    while($data = mysqli_fetch_array($tampil)) { 
                    $id = $data["id"];
                    $nama = $data['nama'];
                    $username = $data['username'];
                    $tanggal = $data['tanggal_lahir']; 
                    $alamat = $data['alamat'];
                    $jk =$data['jenis_kelamin'];
                    $no_tlp = $data['no_tlp'];?>

                    <tbody>
                        <tr>
                        <th scope="row"><?php echo $a++; ?></th>
                        <td><?php echo $id; ?></td>
                        <td><?php echo $username; ?></td>
                        <td><?php echo $nama; ?></td>
                        <td><?php echo $jk; ?></td>
                        <td><?php echo $tanggal; ?></td>
                        <td><?php echo $alamat; ?></td>
                        <td><?php echo $no_tlp; ?></td>
                        </tr>
                    </tbody>
                    <?php $no++; } } ?></table>
                    <?php $hitung = mysqli_query($conn,"SELECT * FROM tb_buku") or die (mysqli_error($conn));
                    $jmldata = mysqli_num_rows($hitung);
                    ?>
                    <br>
                    <?php
                        $jmlhalaman = ceil($jmldata/$batas);
                        for($i=1; $i<=$jmlhalaman; $i++){
                            echo '<a class="page" href="?halaman='.$i.'">'.$i.'</a>';
                        }  ?>
        <!-- Modal Popup untuk Input Admin Baru-->
        <div id="tambahadmin"class="modal fade" style="display:none;">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Tambah Admin Baru </h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form id="defaultForm" action="tambah_admin.php?act=tambahadmin" method="post" class="form-horizontal" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Nama Admin <span class="text-red">*</span></label>
                                    <div class="col-lg-5">
                                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Admin" width="100%" autocomplete="off" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Username <span class="text-red">*</span></label>
                                    <div class="col-lg-5">
                                    <input type="text" class="form-control" name="username" id="username" placeholder="Username Admin" width="100%"  autocomplete="off" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Password <span class="text-red">*</span></label>
                                    <div class="col-lg-5">
                                    <input type="password" class="form-control" name="pass" id="pass" placeholder="Password" width="100%"  autocomplete="off" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Alamat <span class="text-red">*</span></label>
                                    <div class="col-lg-5">
                                    <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" width="100%" autocomplete="off" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Tanggal Lahir <span class="text-red">*</span></label>
                                    <div class="col-lg-5">
                                    <input type="date" class="form-control" name="tgl" id="tgl" placeholder="Tanggal Lahir" width="100%"  autocomplete="off" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Jenis Kelamin <span class="text-red">*</span></label>
    
                                    <input type="radio"  name="jk" id="jk" value="Laki - Laki"/>Laki - Laki
                                    <input type="radio"  name="jk" id="jk" value="Perempuan"/>Perempuan   
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-3 control-label">No Telpon <span class="text-red">*</span></label>
                                    <div class="col-lg-5">
                                    <input type="text" class="form-control" name="tlp" id="tlp" placeholder="No Telpon" width="100%" maxlength="13" autocomplete="off" />
                                    
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label"><span class="text-red">*</span></label>
                                    <div class="col-lg-5">
                                    <input type="hidden" class="form-control" name="status" id="status" value="Admin" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-9 col-lg-offset-3">
                                        <input type="submit" name="submit" class="btn btn-primary" id="insert" value="Simpan">

                                    </div>
                                </div>
                            </form>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div><!-- tutup modal input -->

    </div>
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
