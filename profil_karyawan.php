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
<body style="padding-top: 50px;">
<?php include('header.php')?>
<?php include('profil_karyawan_sidenav.php')?>
<div class="container" style="background:rgba(244,230,231,1.00);font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif';width: 100%">
  <div class="container" style="width: 100%;border: 10px double black">
    <hr>
    <div class="container" style="width: 100%;border: 10px double black">
        <h1><?php echo($row['nama_karyawan'])?></h1>
    <hr>
      <div class="col-xs-6">
        <div class="media">
          <div class="media-left"> <a href="#"> <img class="media-object img-rounded" height="50%" src="imgsys/PPD.png" alt="..."> </a> </div>
          <div class="media-body"  style="text-align: center;">
            <h2 class="media-heading">
			<?php echo($row['jabatan'])?></h2></div>
        </div>
      </div>
      <div class="col-xs-6 well" style="padding-right: 20px;padding-top: 0">
        <div class="row">
          <div class="col-lg-6">
            <h4><span class="glyphicon glyphicon-phone" aria-hidden="true"></span><?php echo(" :"."+62".$row['nohp'])?></h4>
          </div>
          <div class="col-lg-6">
            <h4><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span><?php echo(" : ".$row['email'])?></h4>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <h4><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span><?php echo(" : ".$row['kantor']." ".$row['penempatan'])?></h4>
          </div>
          <div class="col-lg-6">
            <h4><span class="glyphicon glyphicon-phone" aria-hidden="true"></span><?php echo(" : "."+62".$row['nohp2'])?></h4>
          </div>
        </div>
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-sm-8 col-lg-7">
        <h2>Job Desk</h2>
        <h4><span class="label label-default">Primary</span></h4>
        <p style="text-align: justify;"><?PHP echo($row['JobDesk'])?></p>
        <h2>Data Kepegawaian</h2>
        <h4><span class="label label-default">Primary</span></h4>
        <p style="text-align: justify"><?PHP include('HRDarea_karyawan_viewer_TabGrid.php')?></p>
	</div>
      <div class="col-sm-4 col-lg-5">
        <h2>My Point</h2>
		<h6>(Perhitungan Poin Saat Ini Belum Aktif)</h6>
        <hr>
        <!-- Green Progress Bar -->
        <div class="progress">
          <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%">Leadership</div>
        </div>
        <!-- Blue Progress Bar -->
        <div class="progress">
          <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">Aktivitas Harian</div>
        </div>
        <!-- Yellow Progress Bar -->
        <div class="progress">
          <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%">Sales Plan</div>
        </div>
        <!-- Red Progress Bar -->
        <div class="progress">
          <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">Penilaian Internal</div>
        </div>
        <div class="progress">
          <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100" style="width: 55%">Penilaian Direksi</div>
        </div>
        <div class="progress">
          <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%">Penilaian Nasabah</div>
        </div>
        <div class="progress">
          <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%">Lainnya</div>
        </div>
	</div>
    </div>
<hr>
<hr>
<hr>
<hr>
<hr>
<hr>
	  <div class="container" align="center">
	  </div>
  </div>
<hr>
<footer class="text-center" style="position: fixed;width: 100%; bottom: 0;left: 0;right: 0;background: rgba(191,215,229,1.00)">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <p>Copyright © Silent Ripper</p>
      </div>
    </div>
  </div>
</footer>
<script src="file:///C|/Users/Tech Server/AppData/Roaming/Adobe/Dreamweaver CC 2018/en_US/Configuration/Temp/Assets/eam7A1A.tmp/js/jquery-1.11.3.min.js"></script>  
<script src="file:///C|/Users/Tech Server/AppData/Roaming/Adobe/Dreamweaver CC 2018/en_US/Configuration/Temp/Assets/eam7A1A.tmp/js/bootstrap.js"></script>
</div>
</body>
</html>