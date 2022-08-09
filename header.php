<!DOCTYPE html>
<?php 
include('dbcon.php');
include_once('session.php');

$result=mysqli_query($con, "select * from central_data where nik='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);

?>
<html lang="en">
<head>
  <title>THE BALANCE SCORE CARD</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>
<body style="padding-top: 50px">

<nav class="navbar navbar-inverse navbar-fixed-top" style="font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif'">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#topFixedNavbar1" aria-expanded="false"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
      <a class="navbar-brand" style="font-size: 15pt;text-decoration-color: rgba(2,30,247,1.00)" href="#"><b>The Balance Score Card</b></a></div>
	  <div class="collapse navbar-collapse" style="font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif'" id="topFixedNavbar1">
    <ul class="nav navbar-nav">
      <li><a href="home.php"><b>HOME</b></a></li>
      <li><a href="all_about_us.php"><b>All About Us</b></a></li>
	  <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><b>KEGIATAN</b><span class="caret"></span></a>
        <ul class="dropdown-menu" style="background: rgba(0,0,0,1.00)">
          <li><a href="AOarea.php"><span style="color:aliceblue">AO AREA</span></a></li>
          <li><a href="laporan_penagihan.php"><span style="color:aliceblue">D.C.A.R</span></a></li>
          <li><a href="daar.php"><span style="color:aliceblue">D.A.A.R</span></a></li>
          <li><a href="https://101.50.1.211/"><span style="color:aliceblue">App Analis Kredit</span></a></li>
          <li><a href="SlikTP_Home.php"><span style="color:aliceblue">SLIK & Target Pencairan AO</span></a></li>
          <li><a href="KASIR_Home.php"><span style="color:aliceblue">TELLER/KASIR</span></a></li>
          <li><a href="#"><span style="color:aliceblue">F.A.Q</span></a></li>
        </ul>
      </li>
	  <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><b>EXECUTIVE</b><span class="caret"></span></a>
        <ul class="dropdown-menu" style="background: rgba(0,0,0,1.00)">
          <li><a href="DIREKSIarea.php"><span style="color:aliceblue">DIREKSI</span></a></li>
          <li><a href="AIarea.php"><span style="color:aliceblue">AUDIT INTERNAL</span></a></li>
          <li><a href="BMarea.php"><span style="color:aliceblue">BUSINESS MANAGER</span></a></li>
          <li><a href="KParea.php"><span style="color:aliceblue">HEAD A.N.C</span></a></li>
          <li><a href="HRDarea.php"><span style="color:aliceblue">H.R.D</span></a></li>
          <li><a href="OMarea.php"><span style="color:aliceblue">OPERATIONAL MANAGER</span></a></li>
        </ul>
      </li>
    </ul>
	<ul class="nav navbar-nav navbar-right">
      <li><a href="profil_karyawan.php"><span class="glyphicon glyphicon-user"></span> <?php echo $row['nama_karyawan'];?></a></li>
	  <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-cog"></span><span class="caret"></span>
        <ul class="dropdown-menu" style="background: rgba(0,0,0,1.00)">
          <li><a href="profil_karyawan.php"><span style="color:aliceblue">PROFIL</span></a></li>
          <li><a href="setting.php"><span style="color:aliceblue">SETTING</span></a></li>
          <li><a href="AktivitasHarian.php"><span style="color:aliceblue">AKTIVITAS HARIAN</span></a></li>
          <li><a href="logout.php"><span style="color:aliceblue"><span class="glyphicon glyphicon-log-out"> LogOut</span></span></a></li>
        </ul>
      </li>
    </ul>
   </div>
  </div>
</nav>
	
</body>
</html>
