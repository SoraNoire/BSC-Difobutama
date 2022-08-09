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
</head>
<body style="padding-top: 70px;background-image:url(css/img/bg.jpg)">
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#topFixedNavbar1" aria-expanded="false"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
      <a class="navbar-brand" style="font-size: 15pt;text-decoration-color: rgba(2,30,247,1.00)" href="#"><b>The Ballance Scorecard</b></a></div>
    <div class="collapse navbar-collapse" style="font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif'" id="topFixedNavbar1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="home.php">Home<span class="sr-only">(current)</span></a></li>
        <li><a href="#">All About Us</a></li>
        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Kegiatan<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="salesplan.php">D.S.A.R</a></li>
			<li><a href="laporan_penagihan.php">Laporan Penagihan</a></li>
			<li><a href="#">Artikel</a></li>
            <li><a href="#">Peraturan Terbaru</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Forum Diskusi</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">FAQ</a></li>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Mau Cari Sesuatu?">
        </div>
        <button type="submit" class="btn btn-default">Cari</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><?php echo $row['nama_karyawan']; ?></a></li>
        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="profil_karyawan.php">Profile</a></li>
            <li><a href="#">Setting</a></li>
            <li><a href="aktivitas_harian.php">Aktivitas Harian</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="logout.php">Log Out</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/bootstrap.js"></script>

<div class="col-sm-2" style="height: 400px;background: rgba(0,0,0,1.00)"></div>
<div class="col-sm-8" style="height: 400px;background: rgba(249,240,241,1.00)">
	<?php include('ganti-password.php')?>
	</div>
<div class="col-sm-2" style="height: 400px;background: rgba(0,0,0,1.00)"></div>
</body>
</html>