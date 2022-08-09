<!doctype html>
<?php
//ambil kode di kirim dari draft
$kode_permintaan = $_GET['kode_permintaan'];
include_once('dbcon.php');
include_once('session.php');
//buat query untuk informasi pengajuan
$result=mysqli_query($con, "select * from permohonan_analisa_kredit where kode_permintaan='$kode_permintaan'")or die('Error In Session');
$row=mysqli_fetch_array($result);
//format rupiah
function rupiah($angka){
	
	$hasil_rupiah = "Rp.   " . number_format($angka,2,',','.');
	return $hasil_rupiah;
 
}

//data ditampilkan
$nama_nasabah = $row['nama_nasabah'];
$no_tlp_nasabah = $row['no_tlp_nasabah'];
$alamat_nasabah = $row['alamat_nasabah'];
$plafond = $row['plafond'];
$nama_ao = $row['nama_ao'];
$nama_pemohon = $row['nama_pemohon'];
$id_pemohon = $row['id_pemohon'];
$kantor_pemohon = $row['kantor_pemohon'];
$penempatan_pemohon = $row['penempatan_pemohon'];
$jabatan_pemohon = "Business Manager";
$id_kep_analis = $row['id_kep_analis'];
$nama_kep_analis = $row['nama_kep_analis'];
$kantor_kep_analis = $row['kantor_kep_analis'];	
$penempatan_kep_analis = $row['penempatan_kep_analis'];	
$id_analis = $row['id_analis'];		
$nama_analis = $row['nama_analis'];	
$kantor_analis = $row['kantor_analis'];	
$penempatan_analis = $row['penempatan_analis'];	
	
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
  <div class="col-lg-9" style="background-color:mistyrose">
    <h1 align="center"><u>PROSES PENGAJUAN SURVEY</u></h1>
    <h4 align="center"><u><b>Nomor : <?php echo($row['kode_permintaan'])?></b></u></h4>
<form method="post" action="BMarea_PADPKsave_proses.php?kode_permintaan=<?php echo $kode_permintaan; ?>" enctype="multipart/form-data">
	  <table style="font-size: 18px">
		  <tr>
			  <td style="padding-top: 30px"><u><b>Informasi Persetujuan Dokumen</b></u></td>
		  </tr>
		  <tr>
		  <td style="padding-right: 30px">Tambahkan Keterangan</td>
			  <td>:</td>
			<td style="padding-left: 10px"><textarea type="text" style="width: 400px;height: 100px"class="form-control" type="text" name="keterangan"></textarea></td>
		  </tr>  
		  <tr>
			  <td style="padding-top: 30px"><u><b>Informasi Account Officer</b></u></td>
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
		  <tr>
			  <td style="padding-top: 30px"><u><b>Informasi Nasabah</b></u></td>
		  </tr>
		  <tr>
			  <td style="padding-right: 30px">Nama Nasabah</td>
			  <td>:</td>
			  <td style="padding-left: 10px"><input type="text" style="width: 200px"class="form-control" type="text" name="nama_nasabah" value="<?php echo($row['nama_nasabah'])?>" readonly></input></td>
		  </tr>
		  <tr>
			  <td style="padding-right: 30px">No. Telpon Nasabah</td>
			  <td>:</td>
			  <td style="padding-left: 10px"><input type="text" style="width: 200px"class="form-control" type="text" name="no_tlp_nasabah" value="<?php echo($row['no_tlp_nasabah'])?>" readonly></input></td>
		  </tr>
		  <tr>
			  <td style="padding-right: 30px">Alamat Nasabah</td>
			  <td>:</td>
			  <td style="padding-left: 10px"><textarea type="text" style="width: 300px"class="form-control" type="text" name="alamat_nasabah" readonly><?php echo($row['alamat_nasabah'])?></textarea></td>
		  </tr>
		  <tr>
			  <td style="padding-right: 30px">Plafond Pengajuan</td>
			  <td>:</td>
			  <td style="padding-left: 10px"><input type="text" style="width: 200px"class="form-control" type="text" name="plafond" value="<?php echo($row['plafond'])?>" readonly></input></td>
		  </tr>
      </table>
	  <br></br>
      <input type="submit" class="btn btn-success" value="ACC BM">
      <a href="BMarea_PADPK.php" class="btn btn-warning" onclick="javascript:history.back()"><span class="glyphicon glyphicon-remove-sign"> Cancel</span></a>
</form>
  </div>
  <div class="col-lg-3" style="border: solid;font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif';padding:inherit;background: rgba(136,219,223,0.81)">
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
  <div class="col-lg-3" style="border: solid;font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif';padding:inherit;background: rgba(113,236,234,0.74)">
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
  <div class="col-lg-3" style="border: solid;font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif';padding:inherit;background: rgba(113,236,234,0.74)">
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