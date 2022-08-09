<!DOCTYPE html>
<html>
<head>
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/animate.css" rel="stylesheet" type="text/css">
	<meta name="viewport" content="width=device-width; height=device-height; initial-scale=0.1; maximum-scale=1.0;">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Survey 360</title>
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
<body style="background: url(img/pict1.jpg) no-repeat;background-size: cover">
	<div>
	<?php include('all_about_us_sidenav.php')?>
	</div>
	
	<div align="center" >
	<audio src="sound/music1.mp3" controls autoplay hidden loop></audio>
	<span style="font-size: 50px;font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif';color: darkblue" class="w3-animate-fading infinite">SURVEY 360</span>
	</div>
	
<div class="col-md-2">

</div>
	
	<div align="left" class="col-md-8" style="margin-bottom:auto; background-color:rgba(0,253,249,0.55);">
		<form method="post" id="form-user" action="rating360insert.php">
		<table style="margin-left: 20px">
			<tr>
				<td style="padding-top: 20px"><h4><b><i>Pilih Target Penilaian :</i></b></h4></td>
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
<?PHP $querydropdown = mysqli_query($con,"SELECT * FROM central_data WHERE kantor='$kantor' and penempatan='$penempatan' and nik!='$session_id' order by nama_karyawan") or die (mysqli_error());
while ($rowdropdown = mysqli_fetch_array($querydropdown)) {
$namatargetsurvey = strip_tags($rowdropdown['nama_karyawan']);
?>
<option><?PHP echo $namatargetsurvey;?></option>
<?PHP }?>
</select>
			</td>
			</tr>
		</table>
			<br></br>
			<br></br>
		<table style="margin-left: 20px">
			<tr>
				<td style="font-size: 30px;font-family: Constantia, 'Lucida Bright', 'DejaVu Serif', Georgia, 'serif'"><b>Berapa Rating Yang Ingin Anda Berikan ?</b></td>
			</tr>
		    <tr>
				<td><input class="rating" min=0 max=5 step=1 data-size="md" data-stars="5" name="rating"></td>
		    </tr>
		    <tr>
				<td style="font-size: 18px"><b>Kritik dan Saran (Identitas Dirahasiakan): </b></td>
		    </tr>
		    <tr>
				<td><textarea class="form-control-static" name="komentar" style="width: 400px;height: 100px"></textarea></td>
		    </tr>
		<tr><td style="padding-bottom: 30px"><button class="btn btn-success" id="sub">Submit</button></td>
		</tr>
		</table>
		</form>
	</div>
<div align="center" class="col-md-2" style="height: 200px">

	</div>
	
	</body>
</html>
