<!doctype html>
<?php 
include('dbcon.php');
include('session.php');

$result=mysqli_query($con, "select * from central_data where nik='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);

?>

<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>The Ballance Scorecard</title>
<link>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/animate.css" rel="stylesheet" type="text/css">
</head>
<body style="padding-top: 70px;">
<?php include('header.php')?>
<div class="col-sm-12">
	<div class="col-sm-12" style="height: auto;background: rgba(249,240,241,1.00);border:;border: 10px solid black">
	<?php include('Home_News.php')?>
	<a class="btn btn-info" href='Home_News_All.php'>View More</a>
	</div>
</div>
<div class="container col-sm-12">
	<div class="col-sm-6" style="height: 450px;background: rgba(249,240,241,1.00);border: 10px double black">
	<?php include('jumlahinputD.S.A.R.php')?>
	</div>
	<div class="col-sm-6" style="height: 450px;background: rgba(249,240,241,1.00);border: 10px double black">
	<?php include('jumlahinputD.C.A.R.php')?>
	</div>
	<div class="col-sm-6" style="height: 450px;background: rgba(249,240,241,1.00);border: 10px double black">
	<?php include('jumlahinputD.A.A.R.php')?>
	</div>
	<div class="col-sm-6" style="height: 450px;background: rgba(249,240,241,1.00);border: 10px double black">
	<?php include('jumlahinputA.H.php')?>
	</div>
</div>
	<div class="col-sm-12" style="height:auto;background: rgba(249,240,241,1.00);border: 10px double black">
	<?php include('PADPK_Alur_Data.php')?>
	</div>
	<?php include('footer.php')?>
</body>
</html>