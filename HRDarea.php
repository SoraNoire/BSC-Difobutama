<!doctype html>
<?php 
include('dbcon.php');
include('session.php'); 

$result=mysqli_query($con, "select * from central_data where nik='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);
$akses=$row['jabatan']; if($akses=='HRD')
{}
else
{header('location:xakses.php');}
?>

<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>The Ballance Scorecard</title>
<link>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
</head>
<body style="padding-top: 70px;background: rgba(255,255,255,1.00)">
<?php 
	include('header.php');
	include('HRDarea_sidenav.php');
	include('HRDarea_tabgrid.php');
?>	
</body>
</html>