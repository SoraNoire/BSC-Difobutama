<?php

include "dbcon.php";
$id_nasabah= $_GET['id_nasabah'];
$query = "SELECT * FROM data_slik WHERE id_nasabah='".$id_nasabah."'";
$sql = mysqli_query($con, $query);
$data = mysqli_fetch_array($sql);
$query2 = "DELETE FROM data_slik WHERE id_nasabah='".$id_nasabah."'";
$sql2 = mysqli_query($con, $query2);
if($sql2){
  header("location: slik_ved.php");
}else{
  echo "Data gagal dihapus. <a href='slik_ved.php'>Kembali</a>";
}
?>