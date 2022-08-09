<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>BSC||Collection Plan</title>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap-3.3.7.css" rel="stylesheet" type="text/css">
<link href="css/animate.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
</head>
<body style="padding-top: 70px;background-color: aliceblue">
	<?php 
	if(isset($_GET['berhasil'])){
		echo "<p>".$_GET['berhasil']." Data berhasil di import.</p>";
	}
	?>
	<div>
				<?php include "header.php"?>
				<?php include "KParea_sidenav.php"?>
				<?php include "KParea_TargetPenagihan_Input.php"?>
				<?php include "KParea_TargetPenagihan_Input_Batch.php"?>
	</div>
	<div class="container">
		<h1 align="center" style="color:orange" class="animated slideInLeft"><b>Planing Penagihan dan Realisasi Penagihan Bulanan</b></h1>
		<h5 align="center" style="color:red" class="animated slideInLeft"><b>*Data Ini Adalah Inti (DATABASE) Yang Digunakan Untuk Penilaian Performa Divisi Penagihan. Data Yang  Di Input Tidak Dapat Di Ubah/Dihapus!,Data Yang Ditampilkan Adalah Data Bulan Ini. Input Data Dengan Teliti Sesuai Dengan Ketentuan Umum Yang Berlaku.</b></h5>
  		<ul class="nav nav-tabs">
		<br>
  		<li class="active"><a href="#Target" data-toggle="tab">Target</a></li>
  		<li><a href="#Pencapaian" data-toggle="tab">Pencapaian</a></li>
  		</ul>
	<div class="tab-content" style="padding-top: 5px">
  		<div class="tab-pane active" id="Target"><?php include('KParea_TargetPenagihan_View.php')?></div>
  		<div class="tab-pane" id="Pencapaian"><?php include ('KParea_TargetPenagihan_View_Realisasi.php')?></div>
	</div>
	</div>
</body>
</html>