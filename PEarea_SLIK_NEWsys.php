<!doctype html>
<?php 
include('dbcon.php');
include_once('session.php'); 

$result=mysqli_query($con, "select * from central_data where nik='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);

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
			</div>
	
<div class="container">
<h1 align="center" style="color:blue" class="animated slideInLeft">SLIK NEW SYS</h1>
  <ul class="nav nav-tabs">  <br>
  <li class="active"><a href="#satu" data-toggle="tab">SLIK NEW</a></li>
  <li><a href="#dua" data-toggle="tab">SLIK YES</a></li>
  <li><a href="#tiga" data-toggle="tab">SLIK NO</a></li>
  <li><a href="#empat" data-toggle="tab">SLIK Lampau</a></li>
  </ul>
<div class="tab-content" style="padding-top: 5px">
  <div class="tab-pane active" id="satu"> <?php include ('PEarea_SLIK_NEW.php')?> </div>
  <div class="tab-pane" id="dua"><?php include ('PEarea_SLIK_YES.php')?></div>
  <div class="tab-pane" id="tiga"><?php include ('PEarea_SLIK_NO.php')?></div>
  <div class="tab-pane" id="empat"><?php include ('PEarea_SLIK_OLD.php')?></div>
</div>
</div>
	


</body>
</html>