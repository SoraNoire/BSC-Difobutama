<!doctype html>
<?php 
include('dbcon.php');
include_once('session.php'); 
//ambil kode terkirim
$id_nasabah = $_GET['id_nasabah'];
//array dari kode terkirim
$result=mysqli_query($con, "select * from data_slik_ao_req where nik_ktp_nasabah='$id_nasabah'");
$row=mysqli_fetch_array($result);
//data array
$nik_ao 			= $row['nik_ao'];
$nama_ao			= $row['nama_ao'];
$penempatan			= $row['penempatan'];
$kantor				= $row['kantor'];
$nama_nasabah 		= $row['nama_nasabah'];
$nik_ktp_nasabah	= $row['nik_ktp_nasabah'];
$no_tlp_nasabah		= $row['no_tlp_nasabah'];
$tanggal_req		= $row['tanggal_req'];
$jam_req			= $row['jam_req'];
$status				= $row['status'];
$attachment			= $row['attachment'];
$sumber				= "sumber";

//DATA LAMPIRAN

$resultadm=mysqli_query($con, "select * from data_slik_adm_in where nik_ktp_nasabah='$id_nasabah'");
$rowadm=mysqli_fetch_array($resultadm);
$attachmentadm		= $rowadm['attachment'];
$tanggaladm 		= $rowadm['tanggal_up'];

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
		<h2 align="center"><b><u>Permohonan Pemeriksaan Slik</b></u></h2>
		<br></br>
		<div class="col-xs-6">
		<table border="0" width="80%" style="font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif';font-size: 20px">
			<tr>
				<td width="40%" align="Left">No ID</td>
				<td width="5%" align="center">:</td>
				<td align="Left"><?php echo("$nik_ktp_nasabah");?></td>
			</tr>
			<tr>
				<td width="40%" align="Left">Nama Cadeb</td>
				<td width="5%" align="center">:</td>
				<td align="Left"><?php echo("$nama_nasabah");?></td>
			</tr>
			<tr>
				<td width="40%" align="Left">No Tlp Cadeb</td>
				<td width="5%" align="center">:</td>
				<td align="Left"><?php echo("$no_tlp_nasabah");?></td>
			</tr>
		</table>
			<br></br>
		</div>
		<table width="100%" border="0" style="font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif';font-size: 20px">
			<tr>
				<td>
				<label><u>Attachment DARI AO:</u></label>
				</td>
			</tr>
			<tr>
				<td >
					<a href="<?php echo "files/"."$attachment";?>"><?php echo "$attachment"?></a>
					<br>
					<embed width="100%" src="<?php
					if ($attachment == "-"){
					
						echo "files/"."dva123.jpg";
					}else{
	
					echo "files/"."$attachment";
						}
					?>" type="application/pdf"></embed>
					</br>
				</td>
			</tr>
		</table>
		<table width="100%" border="0" style="font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif';font-size: 20px">
			<tr>
				<td>
				<label><u>Attachment DARI ADMIN:</u></label>
				</td>
			</tr>
			<tr>
				<td>
					<a href="<?php echo "fileslik/"."$attachmentadm";?>"><?php echo "$attachmentadm"?></a>
					<br>
				    <embed width="100%" src="<?php
					if ($attachmentadm == ""){
					
						echo "fileslik/"."dva123.jpg";
					}else{
	
					echo "fileslik/"."$attachmentadm";
						}
					?>" type="application/pdf"></embed>
				    </br>
				</td>
			</tr>
		</table>
	</div>
	<div class="col-xs-3" style="border: double">
		<table width="100%" border="0" style="font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif';font-size: 20px">
			<tr>
				<td><label><u>Pemohon</u></label></td>
			</tr>
			<tr>
				<td>Dibuat Oleh</td>
				<td>:</td>
				<td><?php echo("$nama_ao");?></td>
			</tr>
			<tr>
				<td>Kantor</td>
				<td>:</td>
				<td><?php echo("$kantor"."$penempatan");?></td>
			</tr>
		</table>
	</div>
	<div class="col-xs-3" style="border: double">
		<table width="100%" border="0" style="font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif';font-size: 20px">
			<tr>
				<td><label><u>RECORD TIME</u></label></td>
			</tr>
			<tr>
				<td>Tanggal AO Req</td>
				<td>:</td>
				<td><?php echo(date("d-M-Y",strtotime($tanggal_req)));?></td>
			</tr>
			<tr>
				<td>Tanggal Selesai Di Slik</td>
				<td>:</td>
				<td><?php echo(date("d-M-Y",strtotime($tanggaladm)));?></td>
			</tr>
		</table>
	</div>
</div>
</body>
</html>