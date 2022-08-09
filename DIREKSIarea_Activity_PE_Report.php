<!doctype html>
<?php 
include('dbcon.php');
include('session.php'); 

$result=mysqli_query($con, "select * from central_data where nik='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);
$level=$row['level']; if($level<='2')
{}
else
{;header('location:xakses.php');}
?>
<html>
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="css/animate.css" rel="stylesheet" type="text/css">
<head>
</head>
	<body style="padding-top: 60px; background: url(img/books_ap.jpeg);background-size: cover">
	
	<?php
		include("header.php");
		include("DIREKSIarea_sidenav.php");
	?>
<div class="container" style="background:rgba(255,255,255,0.75)">
		<H1 align="center" style="font-family: 'aguafina-script';color: gold" class="animated jackInTheBox">LAPORAN AKTIVITAS PEJABAT EXECUTIVE</H1>
<table class="table table-responsive table-bordered" width="100%">
  <tr>
	<th style="text-align: center" class="animated rollIn">No.</th>
	<th style="text-align: center" class="animated rollIn">Nik</th>
	<th style="text-align: center" class="animated rollIn">Nama Karyawan</th>
	<th style="text-align: center" class="animated rollIn">Jabatan</th>
	<th style="text-align: center" class="animated rollIn">Perusahaan</th>
    <th style="text-align: center" class="animated rollIn">Total Laporan</th>
    <th style="text-align: center" class="animated rollIn">Detail</th>
	  </tr>
 <?php
  include "dbcon.php";
  $bulan= date('m');
  $tahun= date('Y');
  $no=1;
  $jumlahSP= "SELECT *, COUNT( * ) AS total FROM activity_pe where month(tanggal)=".$bulan." and year(tanggal)=".$tahun." GROUP BY nama_karyawan ORDER BY total DESC"; 
  $sql = mysqli_query($con, $jumlahSP);
  while($data = mysqli_fetch_array($sql)){
    echo "<tr>";
	echo "<td style='text-align: center' class='animated rollIn'>".$no."</td>";
	echo "<td style='text-align: center' class='animated rollIn'>".$data['nik']."</td>";
	echo "<td style='text-align: center' class='animated rollIn'>".$data['nama_karyawan']."</td>";
	echo "<td style='text-align: center' class='animated rollIn'>".$data['jabatan']."</td>";
	echo "<td style='text-align: center' class='animated rollIn'>".$data['kantor']." ".$data['penempatan']."</td>";
    echo "<td style='text-align: center' class='animated rollIn'>".$data['total']."</td>";echo "<td align='center'><a href='DIREKSIarea_Activity_PE_Report_Detail.php?id=".$data['nik']."' class='btn btn-default animated rollIn'><span>SEE DETAIL</span></a></td>";
	echo "</tr>";
	$no++;  
    }
  ?>
  </table>
</div>
</body>
</html>