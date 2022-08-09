<!doctype html>
<?php 
include('dbcon.php');
include_once('session.php'); 

$result=mysqli_query($con, "select * from central_data where nik='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);

 ?>
<?php
function rupiah($angka){
	
	$hasil_rupiah = "Rp.   " . number_format($angka,2,',','.');
	return $hasil_rupiah;
 
}
?>

<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>The Ballance Scorecard</title>
<link>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
</head>
<body style="padding-top: 70px;background-image:url(css/img/bg.jpg)">
<?php include_once('header.php')?>
<?php include_once('SlikTP_sidenav.php')?>
<div class="container" style="font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif';background: rgba(255,252,252,1.00);position: relative;width: 100%">
<h1 align="center">VIEW EDIT DELETE DATA SLIK</h1>
<table border="1" width="100%" style="margin-bottom: 20px">
  <tr>
    <th style="text-align: center" width="5%">Tanggal Input</th>
    <th style="text-align: center" width="9%">Penginput</th>
    <th style="text-align: center" width="9%">AO</th>
	<th style="text-align: center" width="10%">Nomor PPUDA</th>
    <th style="text-align: center" width="10%">Nama Nasabah</th>
    <th style="text-align: center" width="10%">Plafond</th>
    <th colspan="2" style="text-align: center" width="10%">Aksi</th>
  </tr>
  <?php
  include "dbcon.php";
  $query = "SELECT * FROM input_targetao WHERE id_penginput=$session_id ORDER BY tanggal_input DESC"; 
  $sql = mysqli_query($con, $query);
  while($data = mysqli_fetch_array($sql)){
    echo "<tr>";
    echo "<td style='text-align: center'>".date("d/M/Y",strtotime($data['tanggal_input']))."</td>";
	echo "<td style='text-align: center'>".$data['nama_penginput']."</td>";
    echo "<td style='text-align: center'>".$data['nama_ao']."</td>";
    echo "<td style='text-align: center'>".$data['no_ppuda']."</td>";
    echo "<td style='text-align: center'>".$data['nama_nasabah']."</td>";
    echo "<td style='text-align: left'>".rupiah($data['plafond'])."</td>";
	echo "<td align='center'><a href='TargetAO_update.php?no_ppuda=".$data['no_ppuda']."'>Ubah</a></td>";
    echo "<td align='center'><a href='TargetAO_delete.php?no_ppuda=".$data['no_ppuda']."'>Hapus</a></td>";
    echo "</tr>";
  }
  ?>
  </table>
</div>
	
</body>
</html>