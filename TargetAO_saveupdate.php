<?php
include "dbcon.php";

$no_ppuda = $_GET['no_ppuda'];
$nama_ao = $_POST['nama_ao'];
$no_ppudanew = $_POST['no_ppuda'];
$nama_nasabah = $_POST['nama_nasabah'];
$plafond = $_POST['plafond'];

if($no_ppuda && $nama_ao && $no_ppuda && $nama_nasabah){ 
    $query = "UPDATE input_targetao SET nama_ao='".$nama_ao."', no_ppuda='".$no_ppudanew."', nama_nasabah='".$nama_nasabah."', plafond='".$plafond."' WHERE no_ppuda='".$no_ppuda."'";
    $sql = mysqli_query($con, $query);
    if($sql){
      header("location: TargetAO_ved.php");
    }else{
      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
      echo "<br><a href='TargetAO_update.php'>Kembali Ke Form</a>";
    }
}
?>