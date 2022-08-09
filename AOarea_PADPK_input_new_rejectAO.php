<!DOCTYPE html>
<?php 
include('dbcon.php');
include_once('session.php');
$id_nasabah = $_GET['id_nasabah'];
$result=mysqli_query($con, "select * from central_data where nik='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);
$jabatan=$row['jabatan']; if($jabatan=='Account Officer')
{}
else
{}
date_default_timezone_set('asia/jakarta');
$tanggal = date("d");
$bulan = date("m");
$tahun = date("Y");
$jam   = date("Hsi");

$resultslik=mysqli_query($con, "select * from data_slik where id_nasabah='$id_nasabah'");
$rowslik=mysqli_fetch_array($resultslik);
$nama_nasabah = $rowslik['nama_nasabah'];

$kode_sp =mysqli_query($con, "select max(left(kode_sp,2)) from sales_plan");
$kodesekarang = mysqli_fetch_row($kode_sp);
$ambilkode = $kodesekarang[0];
$samplenik = mysqli_query($con, "select substring(nik,-3) from central_data where nik='$session_id'");
$samplenik2 = mysqli_fetch_row($samplenik);
$mysamplenik = $samplenik2[0];
$samplekantor = mysqli_query($con, "select substring(kantor,1,1) from central_data where nik='$session_id'");
$samplekantor2 = mysqli_fetch_row($samplekantor);
$mysamplekantor = $samplekantor2[0];
$samplepenempatan = mysqli_query($con, "select substring(penempatan,1,1) from central_data where nik='$session_id'");
$samplepenempatan2 = mysqli_fetch_row($samplepenempatan);
$mysamplepenempatan = $samplepenempatan2[0];

?>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">	
</head>
<body>
	<form class="form-control" method="post" id="form-user" action="AOarea_PADPK_save_rejectAO.php">
		<table  style="margin-left: 20px;width: auto">
		    <tr>
				<td style="padding-top: 20px">
                <label>Kode Pembatalan</label>
                <input type="text" class="form-control" id="kode_pembatalan" name="kode_pembatalan" style="width: 250px" value="<?php echo sprintf($tanggal.$bulan.$jam."-".$mysamplekantor.$mysamplepenempatan ."/".$mysamplenik."/".$bulan."/".$tahun);?>"readonly>
				</td>
			</tr>
		</table>
		<table style="margin-left: 20px;width:100%">
			<tr>
			<td style="font-size: 18px"><b>ID Nasabah</b></td>
			</tr>
			<tr>
			<td><input type="text" class="form-control-static" name="id_nasabah" style="width: 200px;height: 30px" value="<?php echo $id_nasabah?>" readonly></td>
			</tr>
			<tr>
			<td style="font-size: 18px"><b>Nama Nasabah</b></td>
			</tr>
			<tr>
			<td><input type="text" class="form-control-static" name="nama_nasabah" style="width: 200px;height: 30px" value="<?php echo $nama_nasabah?>" readonly></td>
			</tr>
			<tr>
			<td style="font-size: 18px"><b>Catatan Pembatalan</b></td>
			</tr>
			<tr>
			<td><textarea type="text" class="form-control-static" name="catatan_pembatalan" style="width: 400px;height: 100px" placeholder="Mengapa Anda Membatalkan Calon Nasabah Ini?" required></textarea></td>
			</tr>
			<tr>
			<td style="padding-top: 50px" align="center"><button class="btn btn-success" id="sub">SIMPAN</button></td>
			</tr>
		</table>
	</form>
</body>
</html>