<!doctype html>
<?php
$nik = $_GET['id'];
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
<div class="container" style="background:rgba(255,255,255,0.80)">
		<H1 align="center" style="font-family: 'aguafina-script';color: gold" class="animated jackInTheBox">LAPORAN AKTIVITAS PEJABAT EXECUTIVE</H1>
<table class="table table-responsive table-bordered" width="100%">
  <tr>
	<th style="text-align: center" class="animated rollIn">No.</th>
	<th style="text-align: center" class="animated rollIn">Tanggal</th>
	<th style="text-align: center" class="animated rollIn">Code</th>
	<th style="text-align: center" class="animated rollIn">Uraian</th>
    <th style="text-align: center" class="animated rollIn">Detail</th>
  </tr>
 <?php
  include "dbcon.php";
  $bulan= date('m');
  $tahun= date('Y');
  $no=1;
  $jumlahSP= "SELECT * FROM activity_pe WHERE nik='$nik' and month(tanggal)=".$bulan." and year(tanggal)=".$tahun." ORDER BY tanggal DESC"; 
  $sql = mysqli_query($con, $jumlahSP);
  while($data = mysqli_fetch_array($sql)){
    echo "<tr>";
	echo "<td style='text-align: center' class='animated rollIn'>".$no."</td>";
	echo "<td style='text-align: center' class='animated rollIn'>".$data['tanggal']."</td>";
	echo "<td style='text-align: center' class='animated rollIn'>".$data['kode']."</td>";
	echo "<td>".substr($data['uraian_aktivitas'],0,10)."..."."<a href='PEarea_activity_viewer.php?kode=".$data['kode']."'>Read More</a></td>";
	echo "<td align='center'><a href='DIREKSIarea_Activity_PE_Report_Viewer.php?id=".$data['kode']."' class='btn btn-default animated rollIn'><span>READ</span></a></td>";
	echo "</tr>";
	$no++;  
    }
  ?>
  </table>
</div>
		<span onclick="javascript:history.back()" align="right" class="btn btn-success" style="position: fixed;bottom: 0;right: 0">BACK</span>
</body>
</html>