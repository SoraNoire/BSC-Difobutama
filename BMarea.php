<!doctype html>
<?php 
include('dbcon.php');
include('session.php'); 

$result=mysqli_query($con, "select * from central_data where nik='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);
$jabatankhusus=$row['jabatan_khusus']; 
$kode_jabatan=$row['kode_jabatan'];

if($jabatankhusus=='D.S.A.R Viewer' || $kode_jabatan=='XMAN')
{}
else
{;header('location:xakses.php');}
?>

<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>The Ballance Scorecard</title>
<link>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/animate.css" rel="stylesheet" type="text/css">
</head>
<body style="padding-top: 70px;">

<div>
<?php include "header.php"?>
<?php include "BMarea_sidenav.php"?>
</div>
	
</body>
</html>