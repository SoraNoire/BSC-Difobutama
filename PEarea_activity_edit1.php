<!doctype html>
<?php
//ambil kode di kirim dari draft
$kode = $_GET['kode'];
include_once('dbcon.php');
include_once('session.php');
//buat query untuk informasi aktivitas
$result=mysqli_query($con, "select * from activity_pe where kode='$kode'")or die('Error In Session');
$row=mysqli_fetch_array($result);

//data ditampilkan
$kode = $row['kode'];
	
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
<body style="padding: 20px">
<div style="font-family: Baskerville, 'Palatino Linotype', Palatino, 'Century Schoolbook L', 'Times New Roman', 'serif'">
  <div class="col-xs-9" style="background-color:mistyrose">
    <h1 align="center"><u>EDIT YOUR ACTIVITY REPORT</u></h1>
    <h4 align="center"><u><b>Nomor : <?php echo($row['kode'])?></b></u></h4>
<form method="post" action="PEarea_activity_save_edit.php?kode=<?php echo $kode; ?>" enctype="multipart/form-data">
	  <table style="font-size: 18px">
		  <tr>
			  <td style="padding-top: 30px"><u><b>Informasi Pelaksana</b></u></td>
		  </tr>
		  <tr>
			  <td style="padding-right: 30px">Nomor Permintaan</td>
			  <td>:</td>
			  <td style="padding-left: 10px"><input type="text" style="width: 200px"class="form-control" type="text" name="kode_permintaan" value="<?php echo($row['kode_permintaan'])?>" readonly></input></td>
		  </tr>
		  <tr>
			  <td style="padding-right: 30px">Nama A.O</td>
			  <td>:</td>
			  <td style="padding-left: 10px"><input type="text" style="width: 200px"class="form-control" type="text" name="nama_ao" value="<?php echo($row['nama_ao'])?>" readonly></input></td>
		  </tr>
		  <tr><tr>
			  <td style="padding-top: 30px"><u><b>Informasi Nasabah</b></u></td>
		  </tr>
		  <tr>
			  <td style="padding-right: 30px">Nama Nasabah</td>
			  <td>:</td>
			  <td style="padding-left: 10px"><input type="text" style="width: 200px"class="form-control" type="text" name="nama_nasabah" value="<?php echo($row['nama_nasabah'])?>"></input></td>
		  </tr>
		  <tr>
			  <td style="padding-right: 30px">No. Telpon Nasabah</td>
			  <td>:</td>
			  <td style="padding-left: 10px"><input type="text" style="width: 200px"class="form-control" type="text" name="no_tlp_nasabah" value="<?php echo($row['no_tlp_nasabah'])?>"></input></td>
		  </tr>
		  <tr>
			  <td style="padding-right: 30px">Alamat Nasabah</td>
			  <td>:</td>
			  <td style="padding-left: 10px"><textarea type="text" style="width: 300px"class="form-control" type="text" name="alamat_nasabah"><?php echo($row['alamat_nasabah'])?></textarea></td>
		  </tr>
		  <tr>
			  <td style="padding-right: 30px">Plafond Pengajuan</td>
			  <td>:</td>
			  <td style="padding-left: 10px"><input type="text" style="width: 200px"class="form-control" type="text" name="plafond" value="<?php echo($row['plafond'])?>"></input></td>
		  </tr>
      </table>
	  <br></br>
      <input type="submit" class="btn btn-success" value="Simpan Perubahan">
      <a href="PEarea_activity.php" class="btn btn-warning" onclick="javascript:history.back()"><span class="glyphicon glyphicon-remove-sign"> Cancel</span></a>
</form>
  </div>
  <div class="col-xs-3" style="border: solid;font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif';padding:inherit;background: rgba(136,219,223,0.81)">
	<h4><u>Informasi Pemohon :</u></h4>
	<table>
	<tr>
	<td>Nama</td>
	<td> : </td>
	<td><?php echo("$nama_pemohon")?></td>
    </tr>
	<tr>
	<td>NIK</td>
	<td> : </td>
	<td><?php echo("$id_pemohon")?></td>
    </tr>
	<tr>
	<td>Jabatan</td>
	<td> : </td>
	<td><?php echo("$jabatan_pemohon")?></td>
    </tr>
	<td></td>
	<td></td>
	<td><?php echo("$kantor_pemohon")?> <?php echo("$penempatan_pemohon")?></td>
    </tr>
	</table>
  </div>
  <div class="col-xs-3" style="border: solid;font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif';padding:inherit;background: rgba(113,236,234,0.74)">
	<h4><u>Informasi Kepala Analis :</u></h4>
	<table>
	<tr>
	<td>Nama</td>
	<td> : </td>
	<td><?php echo("$nama_kep_analis")?></td>
    </tr>
	<tr>
	<td>NIK</td>
	<td> : </td>
	<td><?php echo("$id_kep_analis")?></td>
    </tr>
	<td></td>
	<td></td>
	<td><?php echo("$kantor_kep_analis")?> <?php echo("$penempatan_kep_analis")?></td>
    </tr>
	</table>
  </div>
  <div class="col-xs-3" style="border: solid;font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif';padding:inherit;background: rgba(113,236,234,0.74)">
	<h4><u>Informasi Analis Pelaksana:</u></h4>
	<table>
	<tr>
	<td>Nama</td>
	<td> : </td>
	<td><?php echo("$nama_analis")?></td>
    </tr>
	<tr>
	<td>NIK</td>
	<td> : </td>
	<td><?php echo("$id_analis")?></td>
    </tr>
	<td></td>
	<td></td>
	<td><?php echo("$kantor_analis")?> <?php echo("$penempatan_analis")?></td>
    </tr>
	</table>
  </div>
</div>
</body>
</html>