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
<script src="ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
</head>
<body style="padding: 120px;background: url(img/lupa2.jpg) no-repeat;background-size:cover">
<div style="font-family: Baskerville, 'Palatino Linotype', Palatino, 'Century Schoolbook L', 'Times New Roman', 'serif'">
  <div class="col-xs-12" style="padding: 20px;">
	<form method="post" action="PEarea_activity_save_edit.php?kode=<?php echo $kode; ?>" enctype="multipart/form-data">
    <h1 align="center"><u>EDIT YOUR ACTIVITY REPORT</u></h1>
    <center><input type="text" name="kode" style="width: 200px;text-align: center" class="form-control" value="<?php echo($row['kode'])?>" readonly></input></center>
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
	 <div class="container" style="width: 90%">
		 <textarea type="text" id="editor2" type="text" name="uraian_aktivitas"><?php echo($row['uraian_aktivitas'])?></textarea>
		 <script>
                CKEDITOR.replace( 'editor2' );
            </script>
     </div>
		<input type="submit" style="position: fixed;bottom: 0;right: 70px" class="btn btn-success" value="SAVE">
	</form>
</div>
		<span onclick="javascript:history.back()" align="right" class="btn btn-info" style="position: fixed;bottom: 0;right: 0">BACK</span>
</body>
</html>