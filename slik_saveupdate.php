<?php
include "dbcon.php";

$id_nasabah = $_GET['id_nasabah'];
$nama_pemohon = $_POST['nama_pemohon'];
$kode_slik = $_POST['kode_slik'];
$id_nasabahnew= $_POST['id_nasabah'];
$nama_nasabah = $_POST['nama_nasabah'];

if($id_nasabah && $nama_nasabah && $kode_slik && $nama_nasabah){ 
    $query = "UPDATE data_slik SET nampemohon='".$nama_pemohon."', kode_slik='".$kode_slik."', id_nasabah='".$id_nasabahnew."', nama_nasabah='".$nama_nasabah."' WHERE id_nasabah='".$id_nasabah."'";
    $sql = mysqli_query($con, $query);
    if($sql){
      header("location: slik_ved.php");
    }else{
      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
      echo "<br><a href='slik_update.php'>Kembali Ke Form</a>";
    }
}
?>