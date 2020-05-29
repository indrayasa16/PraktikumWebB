<?php
include "koneksi.php";
echo $_POST['id'];
if(isset($_POST['getDetail'])) {
    $id = $_POST['getDetail'];
    $sql = mysqli_query($conn, "SELECT * from tb_buku where kode_buku='$id'") or die (mysqli_error($conn));
    echo json_encode($sql);
    while ($row = mysqli_fetch_array($sql)){       
?>

            <!-- Modal -->
              <form method="post" action="">
                  <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Judul Buku</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" value="<?php echo $row['judul_buku'];?>" name="judul_buku">
                            </div>
                            </div>
                  <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Kode Buku</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" value="<?php echo $row['kode_buku'];?>" name="kode_buku">
                            </div>
                            </div>
                  <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Penulis</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" value="<?php echo $row['penulis'];?>" name="penulis">
                            </div>
                            </div>
                  <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Tahun Terbit</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" value="<?php echo $row['tahun_terbit'];?>" name="tahun_terbit">
                            </div>
                            </div>
                  <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Penerbit</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" value="<?php echo $row['penerbit'];?>" name="penerbit">
                            </div>
                            </div>
                  <div class="modal-footer">
                  <button class="btn btn-danger pull-left" data-dismiss="modal">Cancel</a></button>
                  <button type="submit" class="btn btn-primary pull-right">Pinjam</a></button>
                  </div>            
            </form>
        <?php } }?>

