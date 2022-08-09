<!doctype html>
<?php 
include('dbcon.php');
include('session.php'); 

$result=mysqli_query($con, "select * from central_data where nik='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);
$level=$row['level'];
$jabatan=$row['jabatan'];
if($level <='2' or $jabatan == 'HRD')
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
<body style="padding-top: 70px">

<div>
<?php include "header.php"?>
<?php include "DIREKSIarea_sidenav.php"?>
</div>
<div>
<div>
	<?php include "DIREKSIarea_diagramPieDSAR.php"?>
</div>
<div>
	<?php include "DIREKSIarea_diagramPieDCAR.php"?>
</div>
<div>
	<?php include "DIREKSIarea_diagramPieAH.php"?>
</div>
	</div>
</body>
</html>