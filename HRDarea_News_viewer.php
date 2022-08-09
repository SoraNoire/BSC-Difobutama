<!doctype html>
<?php 
include('dbcon.php');
include_once('session.php'); 
//ambil kode terkirim
$no_surat = $_GET['no_surat'];
//array dari kode terkirim
$result=mysqli_query($con, "select * from news where no_surat='$no_surat'");
$row=mysqli_fetch_array($result);
//data array
$jenis_surat 	= $row['jenis'];
$uraian			= $row['uraian'];
$lampiran		= $row['lampiran'];
$kantor			= $row['kantor'];
$tanggal_upload = $row['tanggal_upload'];
$user			= $row['user'];
$jabatan		= $row['jabatan'];
$tanggal_berlaku= $row['tanggal_berlaku'];


?>

<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=0.1">
<title>The Ballance Scorecard</title>
<link>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap-3.3.7.css" rel="stylesheet" type="text/css">
<link href="css/animate.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
</head>
<body style="padding-top: 55px;background-color: aliceblue">
	<div>
		<?php include "header.php"?>
	</div>
<div class="container col-xs-12">
	<div class="col-xs-9" style="border: double">
		<h2 align="center"><b><u><?php echo("$jenis_surat");?></b></u></h2>
		<br></br>
		<div class="col-xs-6">
		<table border="0" width="80%" style="font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif';font-size: 20px">
			<tr>
				<td width="40%" align="Left">No .</td>
				<td width="5%" align="center">:</td>
				<td align="Left"><?php echo("$no_surat");?></td>
			</tr>
			<tr>
				<td width="40%" align="Left">Tanggal Berlaku</td>
				<td width="5%" align="center">:</td>
				<td align="Left"><?php echo(date("d-M-Y",strtotime($tanggal_berlaku)));?></td>
			</tr>
			<tr>
				<td width="40%" align="Left">Group</td>
				<td width="5%" align="center">:</td>
				<td align="Left"><?php echo("$kantor");?></td>
			</tr>
		</table>
			<br></br>
		</div>	
		<table width="100%" border="0" style="font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif';font-size: 20px">
			<tr>
				<td>
				<label><u>Uraian :</u></label>
				</td>
			</tr><tr>
				<td>
				<?php echo($uraian)?>
				</td>
			</tr>
		</table>
		<table width="100%" border="0" style="font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif';font-size: 20px">
			<tr>
				<td>
				<label><u>Attachment :</u></label>
				</td>
			</tr>
			<tr>
				<?php 
				echo "<td style='text-align: justify'>"."<a href='FileNews/".$kantor."/".$lampiran."';>".$no_surat."||UniCode=".$lampiran."</td>";
				?>
			</tr>
		</table>
	</div>
	<div class="col-xs-3" style="border: double">
		<table width="100%" border="0" style="font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif';font-size: 20px">
			<tr>
				<td><label><u>Creator</u></label></td>
			</tr>
			<tr>
				<td>Dibuat Oleh</td>
				<td>:</td>
				<td><?php echo("$user");?></td>
			</tr>
			<tr>
				<td>Jabatan</td>
				<td>:</td>
				<td><?php echo("$jabatan");?></td>
			</tr>
			<tr>
				<td>Tanggal Publikasi</td>
				<td>:</td>
				<td><?php echo(date("d-M-Y",strtotime($tanggal_upload)));?></td>
			</tr>
		</table>
	</div>
</div>
</body>
</html>