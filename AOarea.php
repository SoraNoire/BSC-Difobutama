<!doctype html>
<?php 
include('dbcon.php');
include_once('session.php'); 

$result=mysqli_query($con, "select * from central_data where nik='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);
$jabatan=$row['jabatan']; if($jabatan=='Account Officer')
{}
else
{;header('location:xakses.php');}
//;header('location:xakses.php');
?>

<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>The Ballance Scorecard</title>	
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap-3.3.7.css" rel="stylesheet" type="text/css">
<link href="css/animate.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
</head>
<body style="padding-top: 15%;background-color: aliceblue">

<div>
				<?php include "header.php"?>
				<?php include "D.S.A.R_sidenav.php"?>
</div>	
<div class="text-center"><h4> WHAT YOU WANT TO DO NOW? <h4></div>
<div class="wrapper" style="width: 80%;height: 80%;margin: auto;padding:inherit;vertical-align: middle" align="center">
	<br><b>REPORT</b></br>
	<span class="btn btn-info" style="width: 40%;vertical-align: middle;padding:4%;padding-top: 0;margin: auto"><?php include "AOarea_DSARCALL_input.php" ?></span>
	<span class="btn btn-info" style="width: 40%;vertical-align: middle;padding:4%;padding-top: 0;margin: auto"><?php include "AOarea_DSAR_input.php" ?></span>
	<br><b>INPUT</b></br>
	<span class="btn btn-info" style="width: 40%;vertical-align: middle;padding:5%;padding-top: 5%"> <a href="AOarea_PADPK.php" style="color: white">P.A.D.P.K </a> </span>
	<span class="btn btn-info" style="width: 40%;vertical-align: middle;padding:5%;padding-top: 5%"> <a href="AOarea_SLIK_R.php" style="color: white">S.L.I.K </a> </span>
	<br><b>TASK</b></br>
	<span class="btn btn-warning" style="width: 81%;vertical-align: middle;padding:5%;padding-top: 5%"> <a href="mysalesplan.php" style="color: white">BM REQUEST ACTIVITY </a> </span>
</div>
<br></br>
<br></br>
<br></br>
<div class="footer" style="background-color:rgba(77,78,82,0.44)">
<div class="text-center" style="font-family: Consolas, 'Andale Mono', 'Lucida Console', 'Lucida Sans Typewriter', Monaco, 'Courier New', 'monospace';color: white;padding: 1%"><h4> do what you love, love what you do.<h4></div>
<div class="text-center" style="font-display: block;color: white;;padding: 0"><h4>-Silent Ripper-<h4></div>
</div>
</body>
</html>