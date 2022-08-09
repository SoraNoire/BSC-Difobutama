<!doctype html>
<?php 
$nik = $_GET['nik'];
include('dbcon.php');
include('session.php'); 
include('header.php');

$result=mysqli_query($con, "select * from central_data where nik='$nik'")or die('Error In Session');
$row=mysqli_fetch_array($result);

 ?>

<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<script src="ckeditor/ckeditor.js"></script><meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap-3.3.7.css" rel="stylesheet" type="text/css">
<link href="css/animate.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
</head>
<body style="padding-top: 70px;background-image:url(css/img/bg.jpg)">

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
	<form method="post" action="HRDarea_karyawan_viewer_edit_jaminanperusahaan_save.php?nik=<?php echo $nik; ?>" enctype="multipart/form-data">
	<table style="font-size: 18px">
		<tr>
		    <td style="padding-right: 30px">BPJS Ketenagakerjaan</td>
			<td>:</td>
		    <td style="padding-left: 10px">
			  <select id="fas_bpjs_ket" name="fas_bpjs_ket" class="form-control">
					<option value="-">---Pilih---</option>
					<option value="Ya">Ya</option>
					<option value="Tidak">Tidak</option>
					</select>
		    </td>
		</tr>
		<tr>
		    <td style="padding-right: 30px">BPJS Kesehatan</td>
			<td>:</td>
		    <td style="padding-left: 10px">
			  <select id="fas_bpjs_kes" name="fas_bpjs_kes" class="form-control">
					<option value="-">---Pilih---</option>
					<option value="Ya">Ya</option>
					<option value="Tidak">Tidak</option>
					</select>
		    </td>
		</tr>
		<tr>
		    <td style="padding-right: 30px">BPJS Pensiun</td>
			<td>:</td>
		    <td style="padding-left: 10px">
			  <select id="fas_bpjs_pen" name="fas_bpjs_pen" class="form-control">
					<option value="-">---Pilih---</option>
					<option value="Ya">Ya</option>
					<option value="Tidak">Tidak</option>
					</select>
		    </td>
		</tr>
		<tr>
		    <td style="padding-right: 30px">D.P.L.K</td>
			<td>:</td>
		    <td style="padding-left: 10px">
			  <select id="fas_dplk" name="fas_dplk" class="form-control">
					<option value="-">---Pilih---</option>
					<option value="Ya">Ya</option>
					<option value="Tidak">Tidak</option>
					</select>
		    </td>
		</tr>
		 
      </table>
	  <br></br>
      <input type="submit" class="btn btn-success" value="Simpan Perubahan">
      <a class="btn btn-warning" onclick="javascript:history.back()"><span class="glyphicon glyphicon-remove-sign"> Cancel</span></a>
</form>
  </div>
	</div>
      
    </div>
<hr>
<hr>
<hr>
<hr>
<hr>
<hr>  
<hr>
<footer class="text-center">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <p>Copyright © Silent Ripper</p>
      </div>
    </div>
  </div>
</div>
</footer>
</div>
</body>
</html>