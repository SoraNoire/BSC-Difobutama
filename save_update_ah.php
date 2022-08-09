<?php
include "dbcon.php";

$kode_kegiatan = $_GET['kode_kegiatan'];
$kegiatan = $_POST['kegiatan'];
$keterangan_kegiatan = $_POST['keterangan_kegiatan'];
if(isset($_POST['ubah_foto'])){ 
  $foto_kegiatan = $_FILES['foto_kegiatan']['name'];
  $tmp = $_FILES['foto_kegiatan']['tmp_name'];
  $fotobaru = date('dmYHis').$foto_kegiatan;
  $path = "imgaktivitasharian/".$fotobaru;
  if(move_uploaded_file($tmp, $path)){
    $query = "SELECT * FROM aktivitas_harian WHERE kode_kegiatan='".$kode_kegiatan."'";
    $sql = mysqli_query($con, $query);
    $data = mysqli_fetch_array($sql);
    if(is_file("imgaktivitasharian/".$data['foto_kegiatan']))
      unlink("imgaktivitasharian/".$data['foto_kegiatan']);
    $query = "UPDATE aktivitas_harian SET kegiatan='".$kegiatan."', foto_kegiatan='".$fotobaru."', keterangan_kegiatan='".$keterangan_kegiatan."' WHERE kode_kegiatan='".$kode_kegiatan."'";
    $sql = mysqli_query($con, $query);
    if($sql){
      header("location: aktivitas_harian.php");
    }else{
      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
      echo "<br><a href='update_ah.php'>Kembali Ke Form</a>";
    }
  }else{
    echo "Maaf, Gambar gagal untuk diupload.";
    echo "<br><a href='update_ah.php'>Kembali Ke Form</a>";
  }
}else{ 
  $query = "UPDATE aktivitas_harian SET kegiatan='".$kegiatan."',keterangan_kegiatan='".$keterangan_kegiatan."' WHERE kode_kegiatan='".$kode_kegiatan."'";
  $sql = mysqli_query($con, $query);
  if($sql){ 
    header("location: aktivitas_harian.php");
  }else{
    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
    echo "<br><a href='update_ah.php'>Kembali Ke Form</a>";
  }
}
?>