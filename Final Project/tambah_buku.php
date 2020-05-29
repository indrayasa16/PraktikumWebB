<?php
include 'koneksi.php';
if($_GET['act']== 'tambahbuku'){
    $kode = $_POST['kode'];
    $judul = $_POST['judul'];
    $rak = $_POST['rak'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahun = $_POST['tahun'];
    $stok = $_POST['stok'];

    $foto = $_FILES["foto"]["name"];
  $size = $_FILES["foto"]["size"];
  $ext = strtolower(end(explode(".", $foto)));
  $allowed_ext = array("png", "jpg", "jpeg");
  if(in_array($ext, $allowed_ext))
  {
    if($size < (2*1024*1024))
    {
      $new_image = '';
      $new_name = md5(rand()) . '.' . $ext;
      $path = 'img/' . $new_name;
      list($width, $height) = getimagesize($_FILES["foto"]["tmp_name"]);
      if($width > "1000" || $height > "650") {
        if($ext == 'png')
        {
            $new_image = imagecreatefrompng($_FILES["foto"]["tmp_name"]);
        }
        if($ext == 'jpg' || $ext == 'jpeg')
        {
            $new_image = imagecreatefromjpeg($_FILES["foto"]["tmp_name"]);
        }
        $new_width=200;
        $new_height =($height/$width)*200;
        $tmp_image = imagecreatetruecolor($new_width, $new_height);
        imagealphablending($tmp_image, false);
        imagesavealpha($tmp_image,true);
        $transparent = imagecolorallocatealpha($tmp_image, 255, 255, 255, 127);
        imagefilledrectangle($tmp_image, 0, 0, $new_width, $new_height, $transparent);
        imagecopyresampled($tmp_image, $new_image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
        imagejpeg($tmp_image, $path, 100);
        imagepng($tmp_image, $path);
        imagedestroy($new_image);
        imagedestroy($tmp_image);
    }else{
     move_uploaded_file($_FILES["foto"]["tmp_name"],"img/$new_name");
    }
        //query
        $querytambah =  mysqli_query($conn, "INSERT INTO tb_buku 
        VALUES('$kode' , '$judul' , '$penulis' , '$tahun' ,'$penerbit' ,'$new_name' , '$rak' , '$stok')") or die (mysqli_error($conn));

        if ($querytambah) {
            # code redicet setelah insert ke index
            echo "<script>alert('$judul_buku Berhasil Ditambahkan');
	          document.location.href='Home-Admin.php'</script>\n";
        }
        else{
            echo "ERROR, tidak berhasil". mysqli_error($conn);
        }
    }
    else{
        echo 'Gambar Maksimal berukuran 2MB';
    }
  }
  else{
    echo 'Invalid Image File';
  }
}
else if ($_GET['act'] == 'deletebuku'){
    $kode = $_GET['id'];

    //query hapus
    $querydelete = mysqli_query($conn, "DELETE FROM tb_buku WHERE kode_buku = '$kode'")or die (mysqli_error($conn));

    if ($querydelete) {
        # redirect ke index.php
        echo "<script>alert('Data Buku $judul_buku Berhasil Dihapus');
	          document.location.href='Home-Admin.php'</script>\n";
    }
    else{
        echo "ERROR, data gagal dihapus". mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>