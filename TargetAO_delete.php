<?php

include "dbcon.php";
$no_ppuda= $_GET['no_ppuda'];
$query = "SELECT * FROM input_targetao WHERE no_ppuda='".$no_ppuda."'";
$sql = mysqli_query($con, $query);
$data = mysqli_fetch_array($sql);
$query2 = "DELETE FROM input_targetao WHERE no_ppuda='".$no_ppuda."'";
$sql2 = mysqli_query($con, $query2);
if($sql2){
  header("location: TargetAO_ved.php");
}else{
  echo "Data gagal dihapus. <a href='TargetAO_ved.php'>Kembali</a>";
}
?>