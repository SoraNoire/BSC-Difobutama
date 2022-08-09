<!doctype html>
<?php 
include('dbcon.php');
include_once('session.php'); 

$result=mysqli_query($con, "select * from central_data where nik='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);
$user=$row['nama_karyawan'];
$no = 1;

 ?>
<?php
function rupiah($angka){
	
	$hasil_rupiah = "Rp.	" . number_format($angka,2,',','.');
	return $hasil_rupiah;
 
}
?>

<html>
<head>
</head>
<body>
<div class="table table-responsive">
<table class="table table-bordered" style="font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif';">
  <tr>
    <th rowspan="2" style="text-align: center;vertical-align: middle" nowrap>No.</th>
    <th rowspan="2" style="text-align: center;vertical-align: middle" nowrap>Tanggal Input</th>
    <th rowspan="2" style="text-align: center;vertical-align: middle" nowrap>Penginput</th>
    <th rowspan="2" style="text-align: center;vertical-align: middle" nowrap>Nama Kolektor</th>
    <th colspan="8" style="text-align: center;vertical-align: middle" nowrap>Informasi Angsuran Diterima</th>
    <th colspan="2" rowspan="2" style="text-align: center;vertical-align: middle" width="10%"><span class="glyphicon glyphicon-cog"></span></th>
  </tr>
  <tr>
    <th style="text-align: center;vertical-align: middle" nowrap>Ke-</th>
    <th style="text-align: center;vertical-align: middle" nowrap>Tanggal Bayar</th>
    <th style="text-align: center;vertical-align: middle" nowrap>Kolektiblitas</th>
    <th style="text-align: center;vertical-align: middle" nowrap>Nama Nasabah</th>
    <th style="text-align: center;vertical-align: middle" nowrap>Pokok</th>
    <th style="text-align: center;vertical-align: middle" nowrap>Bunga</th>
    <th style="text-align: center;vertical-align: middle" nowrap>Denda</th>
    <th style="text-align: center;vertical-align: middle" nowrap>Total</th>
  </tr>
	 <?php
  include "dbcon.php";
  $query = "SELECT * FROM input_targetcollection WHERE nama_penginput='$user' ORDER BY tanggal_bayar DESC"; 
  $sql = mysqli_query($con, $query);
  while($data = mysqli_fetch_array($sql)){
    echo "<tr>";
    echo "<td style='text-align: center' nowrap>".$no."</td>";
    echo "<td style='text-align: center' nowrap>".date("d-M-Y",strtotime($data['tanggal_penginputan']))."</td>";
	echo "<td style='text-align: left' nowrap>".$data['nama_penginput']."</td>";
    echo "<td style='text-align: left' nowrap>".$data['nama_collector']."</td>";
    echo "<td style='text-align: center' nowrap>".$data['angsuran_ke']."</td>";
    echo "<td style='text-align: center' nowrap>".date("d-M-Y",strtotime($data['tanggal_bayar']))."</td>";
    echo "<td style='text-align: left' nowrap>".$data['kolektibilitas']."</td>";
    echo "<td style='text-align: left' nowrap>".$data['nama_nasabah']."</td>";
    echo "<td style='text-align: left'  nowrap>".rupiah($data['pokok'])."</td>";
    echo "<td style='text-align: left'  nowrap>".rupiah($data['bunga'])."</td>";
    echo "<td style='text-align: left'  nowrap>".rupiah($data['denda'])."</td>";
    echo "<td style='text-align: left'  nowrap>".rupiah($data['pokok']+$data['bunga']+$data['denda'])."</td>";
	echo "<td align='center'><a href='TargetCollection_update.php?kode_penginputan=".$data['kode_penginputan']."'><span class='glyphicon glyphicon-pencil'></span></a></td>";
    echo "<td align='center'><a href='TargetCollection_delete.php?kode_penginputan=".$data['kode_penginputan']."'><span class='glyphicon glyphicon-erase'></span></a></td>";
    echo "</tr>";
	  
	  $no++;
  }
  ?>
 
  </table>
</div>
</body>
</html>