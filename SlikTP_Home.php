<!DOCTYPE html>
<?php
include "dbcon.php";
include "session.php";

$result=mysqli_query($con, "select * from central_data where nik='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);
$jabatan=$row['jabatan_khusus']; if($jabatan=='SlikTP' || $Jabatan=='XMAN')
{}
else
{header('location:xakses.php');}
?>
<html>
<head>
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/animate.css" rel="stylesheet" type="text/css">
	<meta name="viewport" content="width=device-width; height=device-height; initial-scale=0.1; maximum-scale=1.0;">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Inputan S.L.I.K</title>
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet">
	<link href="css/star-rating.min.css" media="all" rel="stylesheet" type="text/css" />
	<link href="css/w3.css.css" media="all" rel="stylesheet" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    
    <script src="js/star-rating.min.js" type="text/javascript"></script>

   <style>
#wrapper {
     width: auto;
     margin: auto;
}
</style>
</head>
<body style="background:url(css/img/SlikTP_BG.gif)no-repeat;background-size: cover;padding-top: 50px">
<div>
<?php
include_once "header.php";
include "SlikTP_sidenav.php";
?>	
</div>
<div align="center" class="container" style="background:rgba(1,212,247,0.36);width: 100%;height: 550px;padding-top:60px" >

<div class="animated fadeInLeft" style="font-size: 100px; color: red">Halo Selamat Datang</div>
<div class="animated fadeInLeft" style="font-size: 100px; color: red"><?php echo($row['nama_karyawan'])?></div>
<div class="animated fadeInLeft" style="font-size: 100px; color: red">Have A Nice Day Today</div>
</div>
	
</body>
</html>
