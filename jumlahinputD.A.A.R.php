<!doctype html>
<html>
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="css/animate.css" rel="stylesheet" type="text/css">
<head>
	<body>
		<H1 align="center" style="font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif';color: rgba(16,35,247,1.00)" class="animated jackInTheBox">D.A.A.R RANKING</H1>
<H4 align="center">Total Kegiatan Analis Perbulan</H4>	
	<div class="container" style="font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif';background: rgba(255,252,252,1.00);position: relative;width: 100%">
<table class="table-responsive" width="100%" style="margin-bottom: 20px;font-family: Baskerville, 'Palatino Linotype', Palatino, 'Century Schoolbook L', 'Times New Roman', 'serif';font-size: 20px;font-style: oblique">
  <tr>
	<th style="text-align: center" width="auto" class="animated rollIn">No</th>
	<th style="text-align: center" width="auto" class="animated rollIn">Nama Karyawan</th>
    <th style="text-align: center" width="auto" class="animated rollIn">Jumlah Inputan</th>
  <?php
  include "dbcon.php";
  $bulan= date('m');
  $tahun= date('Y');
  $no=1;
  $jumlahSP= "SELECT nama, COUNT( * ) AS total FROM daar WHERE month(tanggal)=$bulan and year(tanggal)=$tahun GROUP BY nama ORDER BY total DESC  LIMIT 10"; 
  $sql = mysqli_query($con, $jumlahSP);
  while($data = mysqli_fetch_array($sql)){
    echo "<tr>";
	echo "<td style='text-align: center' class='animated rollIn'>".$no."</td>";
	echo "<td style='text-align: center' class='animated rollIn'>".$data['nama']."</td>";
    echo "<td style='text-align: center' class='animated rollIn'>".$data['total']."</td>";
	echo "</tr>";
	$no++;
	  }
  ?>
  </table>
</div></body>
</html>