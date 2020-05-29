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
    <link rel="stylesheet" href="css/home-admin.css">
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
            <li><a href="#" data-toggle="modal" data-target="#edit">Hi,Admin</a></li>
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
        <div class="box-tools pull-left">
            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#tambahbuku">Tambah Buku</a>
        </div>
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
                        <th scope="col">Aksi</th>
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
                        <td>
                        <a href="#" class="btn btn-primary btn-flat btn-xs" data-toggle="modal" data-target="#updatebuku<?php echo $a; ?>"> Edit</a>
                        <a href="hapus_buku.php?id=<?php echo $id; ?>" class="btn btn-danger btn-flat btn-xs" 
                        onClick = "return confirm('Apakah Anda ingin menghapus <?php echo $data['judul_buku']; ?>')"> Delete</a>
						</td>
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
                        <td>
                        <a href="#" class="btn btn-primary btn-flat btn-xs" data-toggle="modal" data-target="#editbuku"> Edit</a>
                        <a href="hapus_buku.php?id=<?php echo $id; ?>" class="btn btn-danger btn-flat btn-xs" 
                        onClick = "return confirm('Apakah Anda ingin menghapus <?php echo $data['judul_buku']; ?>')"> Delete</a>
						</td>
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

           <!-- Modal Popup untuk Input-->
            <div id="tambahbuku"class="modal fade" style="display:none;">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Input Data Buku </h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form id="defaultForm" action="tambah_buku.php?act=tambahbuku" method="post" class="form-horizontal" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Gambar Buku <span class="text-red">*</span></label>
                                    <div class="col-lg-5">
                                        <input type="file" class="form-control" name="foto" id="foto" accept=".jpg, .png" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Judul Buku <span class="text-red">*</span></label>
                                    <div class="col-lg-5">
                                    <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul Buku" width="100%" autocomplete="off" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Kode Buku <span class="text-red">*</span></label>
                                    <div class="col-lg-5">
                                    <input type="text" class="form-control" name="kode" id="kode" placeholder="Kode Buku" width="100%" maxlength="8" autocomplete="off" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Rak Buku <span class="text-red">*</span></label>
                                    <div class="col-lg-5">
                                    <input type="text" class="form-control" name="rak" id="rak" placeholder="No Rak Buku" width="100%" maxlength="8" autocomplete="off" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Penulis <span class="text-red">*</span></label>
                                    <div class="col-lg-5">
                                    <input type="text" class="form-control" name="penulis" id="penulis" placeholder="Penulis Buku" width="100%" autocomplete="off" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Penerbit <span class="text-red">*</span></label>
                                    <div class="col-lg-5">
                                    <input type="text" class="form-control" name="penerbit" id="penerbit" placeholder="Penerbit Buku" width="100%"  autocomplete="off" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Tahun Terbit <span class="text-red">*</span></label>
                                    <div class="col-lg-5">
                                    <input type="text" class="form-control" name="tahun" id="tahun" placeholder="Tahun Terbit" width="100%" maxlength="10" autocomplete="off" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Stok Buku <span class="text-red">*</span></label>
                                    <div class="col-lg-5">
                                    <input type="text" class="form-control" name="stok" id="stok" placeholder="Stok Buku" width="100%" maxlength="10" autocomplete="off" />
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


            <!-- Modal Popup untuk Edit Buku-->
            <div id="editbuku"class="modal fade" style="display:none;">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Input Data Buku </h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form id="defaultForm" action="tambah_buku.php?act=tambahbuku" method="post" class="form-horizontal" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Gambar Buku <span class="text-red">*</span></label>
                                    <div class="col-lg-5">
                                        <input type="file" class="form-control" name="foto" id="foto" accept=".jpg, .png" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Judul Buku <span class="text-red">*</span></label>
                                    <div class="col-lg-5">
                                    <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul Buku" width="100%" autocomplete="off" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Kode Buku <span class="text-red">*</span></label>
                                    <div class="col-lg-5">
                                    <input type="text" class="form-control" name="kode" id="kode" placeholder="Kode Buku" width="100%" maxlength="8" autocomplete="off" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Rak Buku <span class="text-red">*</span></label>
                                    <div class="col-lg-5">
                                    <input type="text" class="form-control" name="rak" id="rak" placeholder="No Rak Buku" width="100%" maxlength="8" autocomplete="off" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Penulis <span class="text-red">*</span></label>
                                    <div class="col-lg-5">
                                    <input type="text" class="form-control" name="penulis" id="penulis" placeholder="Penulis Buku" width="100%" autocomplete="off" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Penerbit <span class="text-red">*</span></label>
                                    <div class="col-lg-5">
                                    <input type="text" class="form-control" name="penerbit" id="penerbit" placeholder="Penerbit Buku" width="100%"  autocomplete="off" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Tahun Terbit <span class="text-red">*</span></label>
                                    <div class="col-lg-5">
                                    <input type="text" class="form-control" name="tahun" id="tahun" placeholder="Tahun Terbit" width="100%" maxlength="10" autocomplete="off" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Stok Buku <span class="text-red">*</span></label>
                                    <div class="col-lg-5">
                                    <input type="text" class="form-control" name="stok" id="stok" placeholder="Stok Buku" width="100%" maxlength="10" autocomplete="off" />
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

            <!-- Modal Popup untuk Edit User Profile-->
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
                            <form id="defaultForm" action="edit_profile_admin.php?act=edit" method="post" class="form-horizontal" enctype="multipart/form-data">
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

    <div id="sectionPeminjam">
    <h2>Data Peminjam</h2>
        <center><form action="#sectionPeminjam" method="GET">
            <label>Cari Data Peminjam</label><br><br>
            <input type="text" name="cari">
            <input type="submit" value="Cari">
        </form></center><br>
        <br><br><table class="table table-bordered table-primary">
                    <thead>
                        <tr>
                        <th scope="col">No</th>
                        <th scope="col">ID Pinjam</th>
                        <th scope="col">Username</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Judul Buku</th>
                        <th scope="col">Kode Buku</th>
                        <th scope="col">Tanggal Pinjam</th>
                        </tr>
                    </thead>
                    <?php 
                    $a=1; 
                    $sql = "SELECT * 
                            FROM tb_user JOIN meminjam 
                            ON meminjam.id_anggota = tb_user.id
                            JOIN tb_buku
                            ON tb_buku.kode_buku = meminjam.kd_buku";
                    $tampil = mysqli_query($conn, $sql) or die (mysqli_error($conn));
                    while($data = mysqli_fetch_array($tampil)) { 
                    $id = $data["id_pinjam"];
                    $nama = $data['nama'];
                    $username = $data['username'];
                    $tanggal = $data['tgl_pinjam']; 
                    $kode = $data['kode_buku'];
                    $judul =$data['judul_buku'];{?>
                    <tbody>
                        <tr>
                        <th scope="row"><?php echo $a++; ?></th>
                        <td><?php echo $id; ?></td>
                        <td><?php echo $username; ?></td>
                        <td><?php echo $nama; ?></td>
                        <td><?php echo $judul; ?></td>
                        <td><?php echo $kode; ?></td>
                        <td><?php echo $tanggal; ?></td>
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


</body>
</html>