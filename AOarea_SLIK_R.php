<!doctype html>
<?php 
include('dbcon.php');
include_once('session.php'); 

$result=mysqli_query($con, "select * from central_data where nik='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);
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
				<?php include "AOarea_SLIK_R_Input.php"?>
			</div>
	<br><br><br>
<div class="container">
<h1 align="center" style="color:blueviolet" class="animated slideInLeft">Permintaan SLIK</h1>
  <ul class="nav nav-tabs">  <br>
  <li class="active"><a href="#req" data-toggle="tab">MY REQUEST</a></li>
  <li><a href="#proses" data-toggle="tab">MASUK ANTRIAN PROSES SLIK</a></li>
  <li><a href="#clear" data-toggle="tab">SUDAH DI PROSES SLIK</a></li>
  </ul>
<div class="tab-content" style="padding-top: 1%">
  <div class="tab-pane active" id="req"><?php include('AOarea_SLIK_R_VReq.php')?></div>
  <div class="tab-pane" id="proses"><?php include ('AOarea_SLIK_R_VPros.php')?></div>
  <div class="tab-pane" id="clear"><?php include ('AOarea_SLIK_R_VClear.php')?></div>
</div>
</div>


</body>
</html>