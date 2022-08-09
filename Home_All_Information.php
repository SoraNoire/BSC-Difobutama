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
<div class="container">
<h1 align="center" style="color:blueviolet" class="animated slideInLeft">News & Information</h1>
  <ul class="nav nav-tabs">  <br>
  <li class="active"><a href="#draft" data-toggle="tab">Pengumuman</a></li>
  <li><a href="#proses1" data-toggle="tab">Surat Edaran</a></li>
  <li><a href="#proses2" data-toggle="tab">Surat Keputusan</a></li>
  </ul>
<div class="tab-content" style="padding-top: 5px">
  <div class="tab-pane active" id="draft"><?php include('Home_News_View_P-all.php')?></div>
  <div class="tab-pane" id="proses1"><?php include ('Home_News_View_SE-all.php')?></div>
  <div class="tab-pane" id="proses2"><?php include ('Home_News_View_SK-all.php')?></div>
</div>
</div>
</body>
</html>