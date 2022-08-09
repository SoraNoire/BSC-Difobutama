<!doctype html>
<?php 
include('dbcon.php');
include('session.php'); 

$result=mysqli_query($con, "select * from central_data where nik='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);
$jabatankhusus=$row['jabatan_khusus'];
$level=$row['level'];
$nama_karyawan= $row['nama_karyawan'];
if($jabatankhusus=='D.C.A.R Viewer' or $level<=3 or $nama_karyawan=='Adi Priyatno')
{}
else
{;header('location:xakses.php');}


 ?>

<html>
<head>
<link>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap-3.3.7.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/jquery.min.js"></script>
</head>
<body style="padding-top: 70px">
<?php include('header.php')?>
<?php include_once('KParea_sidenav.php')?>
	
	<div class="table-responsive" style="background-color: rgba(255,251,251,1.00);font-family: Constantia, 'Lucida Bright', 'DejaVu Serif', Georgia, 'serif'">
	<?php include('KPreview.php');?>
	</div>
	
</body>
</html>