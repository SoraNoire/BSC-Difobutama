<!doctype html>
<?php 
include('dbcon.php');
include_once('session.php'); 

$result=mysqli_query($con, "select * from central_data where nik='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);

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
    <th rowspan="2" style="text-align: center;vertical-align: middle" nowrap>A.O.F</th>
    <th rowspan="2" style="text-align: center;vertical-align: middle" nowrap>Nama Nasabah</th>
    <th rowspan="2" style="text-align: center;vertical-align: middle" nowrap>Nominal</th>
    <th colspan="8" style="text-align: center;vertical-align: middle" nowrap>Informasi Produk</th>
    <th rowspan="2" style="text-align: center;vertical-align: middle" nowrap>Keterangan Tambahan</th>
    <th colspan="2" rowspan="2" style="text-align: center;vertical-align: middle" width="10%"><span class="glyphicon glyphicon-cog"></span></th>
  </tr>
  <tr>
	<th style="text-align: center" nowrap>Jenis Produk</th>
    <th style="text-align: center" nowrap>Tgl Buka</th>
    <th style="text-align: center" nowrap>N B A</th>
    <th style="text-align: center" nowrap>N R A</th>
    <th style="text-align: center" nowrap>N B</th>
    <th style="text-align: center" nowrap>S B</th>
    <th style="text-align: center" nowrap>J W</th>
    <th style="text-align: center" nowrap>Ket.</th>
  </tr>
  <?php
  include "dbcon.php";
  $query = "SELECT * FROM input_targetaof WHERE id_penginput='$session_id' ORDER BY tanggal_input DESC"; 
  $sql = mysqli_query($con, $query);
  while($data = mysqli_fetch_array($sql)){
    echo "<tr>";
    echo "<td style='text-align: center' nowrap>".$no."</td>";
    echo "<td style='text-align: center' nowrap>".date("d-M-Y",strtotime($data['tanggal_input']))."</td>";
	echo "<td style='text-align: left' nowrap>".$data['nama_penginput']."</td>";
    echo "<td style='text-align: left' nowrap>".$data['nama_ao']."</td>";
    echo "<td style='text-align: left' nowrap>".$data['nama_nasabah']."</td>";
    echo "<td style='text-align: left'  nowrap>".rupiah($data['nominal'])."</td>";
    echo "<td style='text-align: center' nowrap>".$data['type_relasi']."</td>";
    echo "<td style='text-align: center' nowrap>".date("d-M-Y",strtotime($data['tgl_buka']))."</td>";
    echo "<td style='text-align: center' nowrap>".$data['no_b_arb']."</td>";
    echo "<td style='text-align: center' nowrap>".$data['no_rek_arb']."</td>";
    echo "<td style='text-align: center' nowrap>".$data['no_bilyet']."</td>";
    echo "<td style='text-align: center' nowrap>".$data['suku_bunga']."</td>";
    echo "<td style='text-align: center' nowrap>".$data['jangka_waktu']."</td>";
    echo "<td style='text-align: center' nowrap>".$data['keterangan']."</td>";
    echo "<td style='text-align: center'>".$data['keterangan_tambahan']."</td>";
	echo "<td align='center'><a href='TargetAOF_update.php?kode_penginputan=".$data['kode_penginputan']."'><span class='glyphicon glyphicon-pencil'></span></a></td>";
    echo "<td align='center'><a href='TargetAOF_delete.php?kode_penginputan=".$data['kode_penginputan']."'><span class='glyphicon glyphicon-erase'></span></a></td>";
    echo "</tr>";
	  
	  $no++;
  }
  ?>
  </table>
</div>
</body>
</html>