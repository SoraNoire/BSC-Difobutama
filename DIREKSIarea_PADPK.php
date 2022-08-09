<!doctype html>
<?php 
include('dbcon.php');
include_once('session.php'); 
$result=mysqli_query($con, "select * from central_data where nik='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);
$identitas=$row['nama_karyawan'];
$kantor=$row['kantor'];
$jabatankhusus=$row['jabatan_khusus']; if($jabatankhusus=='D.S.A.R Viewer')
{}
else
{}
?>

<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>The Ballance Scorecard</title>
<link>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap-3.3.7.css" rel="stylesheet" type="text/css">
<link href="css/animate.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
</head>
<body style="padding-top: 70px;background-color: aliceblue">
	
			<div>
				<?php include "header.php"?>
				<?php include "DIREKSIarea_sidenav.php"?>
			</div>
<div>
	<a align="right" class="btn btn-info" style="position: fixed;bottom: 0;right: 0" href="DIREKSIarea_PADPK_jumlahPencairan.php" >Total Pencairan Tanggal Tertentu</a>
</div>
	
<div class="container">
<h1 align="center" style="color:red" class="animated slideInLeft">Permohonan Analisa Data Pinjaman Kredit</h1>
  <ul class="nav nav-tabs">  <br>
  <li class="active"><a href="#draft" data-toggle="tab">Proses Kepala Analis</a></li>
  <li><a href="#proses0" data-toggle="tab">Proses Analis</a></li>
  <li><a href="#proses1" data-toggle="tab">Keputusan Analis</a></li>
  <li><a href="#acc" data-toggle="tab">Keputusan K.Analis</a></li>
  <li><a href="#acc2" data-toggle="tab">ACC</a></li>
  <li><a href="#revised" data-toggle="tab">REVISED</a></li>
  <li><a href="#reject" data-toggle="tab">REJECT</a></li>
  </ul>
<div class="tab-content" style="padding-top: 5px">
  <div class="tab-pane active" id="draft"><?php include('DIREKSIarea_PADPK_view_KAKproses.php')?></div>
  <div class="tab-pane" id="proses0"><?php include ('DIREKSIarea_PADPK_view_AKproses.php')?></div>
  <div class="tab-pane" id="proses1"><?php include ('DIREKSIarea_PADPK_view_ACC.php')?></div>
  <div class="tab-pane" id="acc"><?php include ('DIREKSIarea_PADPK_view_ACC2.php')?></div>
  <div class="tab-pane" id="acc2"><?php include ('DIREKSIarea_PADPK_view_ACC3.php')?></div>
  <div class="tab-pane" id="revised"><?php include ('DIREKSIarea_PADPK_view_Revised.php')?></div>
  <div class="tab-pane" id="reject"><?php include ('DIREKSIarea_PADPK_view_Rejected.php')?></div>
</div>
</div>
	


</body>
</html>