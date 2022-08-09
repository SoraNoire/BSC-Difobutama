<!DOCTYPE html>
<html>
<head>
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/animate.css" rel="stylesheet" type="text/css">
	<meta name="viewport" content="width=device-width; height=device-height; initial-scale=0.1; maximum-scale=1.0;">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>INPUTAN SLIK</title>
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
	<script type="text/javascript">
    function eraseText() {
     document.getElementById("nama").value = "";
     document.getElementById("kode_slik").value = "";
     document.getElementById("id_nasabah").value = "";
     document.getElementById("nama_nasabah").value = "";
	}
</script>
</head>
<body style="background:url(css/img/SlikTP_BG.gif)no-repeat;background-size: cover; padding-top: 50px">
	<div>	
	<?php include('SlikTP_sidenav.php')?>
	<?php include('header.php')?>
	</div>
	
	<div align="center" >
	<audio src="sound/music1.mp3" controls autoplay hidden loop></audio>
	<span style="font-size: 50px;font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif';color: darkblue" class="w3-animate-fading infinite">INPUT SLIK</span>
	</div>
	
<div class="col-md-2">

</div>
	
	<div align="left" class="col-md-8" style="margin-bottom:auto; background-color:rgba(0,253,249,0.55);">
		<form method="post" id="form-user" action="Slik_Insert.php">
		<table style="margin-left: 20px">
			<tr>
				<td style="padding-top: 20px"><h4><b><i>Pilih Nama Account Officer :</i></b></h4></td>
			</tr>
			<tr>
				<td>
<select id="nama" name="nama" class="form-control">
<option value="-">--- Pilih ---</option>
<?php
include('dbcon.php');
include('session.php');

$result=mysqli_query($con, "select * from central_data where nik='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);
	
$kantor=$row['kantor'];
$penempatan=$row['penempatan'];
?>
<?PHP $querydropdown = mysqli_query($con,"SELECT * FROM central_data WHERE kantor='$kantor' and jabatan='Account Officer' or kantor='$kantor' and nama_karyawan='Zainal Arifin' order by nama_karyawan") or die (mysqli_error());
while ($rowdropdown = mysqli_fetch_array($querydropdown)) {
$namatargetsurvey = strip_tags($rowdropdown['nama_karyawan']);
?>
<option><?PHP echo $namatargetsurvey;?></option>
<?PHP }?>
</select>
			</td>
			</tr>
		</table>
			
		<table style="margin-left: 20px">
		    <tr>
				<td style="font-size: 18px"><b>Kode Pengechekan Slik</b></td>
		    </tr>
		    <tr>
				<td><input type="text" class="form-control-static" id="kode_slik" name="kode_slik" style="width: 200px;height: 30px" placeholder="Nomor WEB SLIK OJK"></textarea></td>
		    </tr>
			<tr>
				<td style="font-size: 18px"><b>No. ID Calon Nasabah</b></td>
		    </tr>
		    <tr>
				<td><input type="text" class="form-control-static" id="id_nasabah" name="id_nasabah" style="width: 400px;height: 30px" placeholder="Nomor Identitas (KTP)"></textarea></td>
		    </tr>
	        <tr>
				<td style="font-size: 18px"><b>Nama Calon Nasabah</b></td>
		    </tr>
		    <tr>
				<td><input type="text" class="form-control-static" id="nama_nasabah" name="nama_nasabah" style="width: 300px;height: 30px" placeholder="Sesuai KTP"></textarea></td>
		    </tr>

		<tr>
			<td style="padding-bottom: 30px;padding-top: 50px"><button class="btn btn-success" id="sub" >Submit</button>
			<input type="button" class="btn btn-warning" value="Clear" onclick="javascript:eraseText();"></td>
		</tr>
		</table>
		</form>
	</div>
<div align="center" class="col-md-2" style="height: 200px">

	</div>
	
	</body>
</html>
