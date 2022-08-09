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
				<?php include "DCAR_side_nav.php"?>
				<?php include "DCAR_PM_input.php"?>
			</div>
	
<div class="container">
<h1 align="center" style="color:red" class="animated slideInLeft">PENAGIHAN MOBILE</h1>
  <ul class="nav nav-tabs">  <br>
  <li class="active"><a href="#diterima" data-toggle="tab">Diterima Divisi Penagihan</a></li>
  <li><a href="#dikonfirmasi" data-toggle="tab">Diterima Teller</a></li>
  </ul>
<div class="tab-content" style="padding-top: 5px">
  <div class="tab-pane active" id="diterima"> <?php include ('DCAR_PM_view_diterima.php')?> </div>
  <div class="tab-pane" id="dikonfirmasi"><?php include ('DCAR_PM_view_dikonfirmasi.php')?></div>
</div>
</div>
	


</body>
</html>