<!doctype html>
<?php
//ambil kode di kirim dari draft
$kode = $_GET['kode'];
include_once('dbcon.php');
include_once('session.php');
//buat query untuk informasi pengajuan
$result=mysqli_query($con, "select * from activity_pe where kode='$kode'")or die('Error In Session');
$row=mysqli_fetch_array($result);
//data ditampilkan
$kode = $row['kode'];
$nik = $row['nik'];
$nama_karyawan = $row['nama_karyawan'];
$jabatan = $row['jabatan'];
$kantor = $row['kantor'];
$penempatan = $row['penempatan'];
$uraian_aktivitas = $row['uraian_aktivitas'];
$status = $row['status'];
$tanggal = $row['tanggal'];
$jam = $row['jam'];
?>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap-3.3.7.css" rel="stylesheet" type="text/css">
<link href="css/animate.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
</head>
<body style="padding: 120px;background: url(img/lupa2.jpg) no-repeat;background-size:cover">
<div style="font-family: Baskerville, 'Palatino Linotype', Palatino, 'Century Schoolbook L', 'Times New Roman', 'serif'">
  <div class="col-lg-12" style="padding: 20px;">
    <h1 align="center"><u>DETAIL ACTIVITY</u></h1>
    <h4 align="center"><u><b>Nomor : <?php echo($kode)?>||<?php echo($nama_karyawan)?></b></u></h4>
	  <table style="font-size: 18px">
		  <tr>
			  <td style="padding-top: 30px"><u><b>Informasi Pembuat</b></u></td>
		  </tr>
		  <tr>
			  <td style="padding-right: 30px">Nama Karyawan</td>
			  <td>:</td>
			  <td style="padding-left: 10px"><?php echo($nama_karyawan)?></td>
		  </tr>
		  <tr>
			  <td style="padding-right: 30px">Jabatan</td>
			  <td>:</td>
			  <td style="padding-left: 10px"><?php echo($jabatan)?></td>
		  </tr>
		  <tr>
			  <td style="padding-right: 30px">Penempatan</td>
			  <td>:</td>
			  <td style="padding-left: 10px"><?php echo($kantor." ".$penempatan)?></td>
		  </tr>
		  

      </table>
	  <br></br>
	<H4><u>Uraian Aktivitas</u><H4>
	 <div class="container">
		 <?php echo($uraian_aktivitas)?>
     </div>
</div>
		<span onclick="javascript:history.back()" align="right" class="btn btn-success" style="position: fixed;bottom: 0;right: 0">BACK</span>
</body>
</html>