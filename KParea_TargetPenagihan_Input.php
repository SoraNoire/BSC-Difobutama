<!DOCTYPE html>
<?php 
include('dbcon.php');
include_once('session.php');

$result=mysqli_query($con, "select * from central_data where nik='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);

date_default_timezone_set('asia/jakarta');
$tanggal = date("d");
$bulan = date("m");
$tahun = date("Y");
$jam   = date("Hsi");

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
	<script src="ckeditor/ckeditor.js"></script>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta charset="utf-8">
	</script>
</head>
<body>
   <div class="container">		
	<br/>
	<button type="button" style="position:sticky" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Tambah 1+</button>
 
	<!-- Modal -->
	<div id="myModal" class="modal fade" role="dialog" style="background: rgba(0,0,0,0.86)">
		<div class="modal-dialog"  style="width: 50%">
			<!-- konten modal-->
			<div class="modal-content">
				<!-- heading modal -->
<div class="modal-header" style="background:rgba(83,82,82,1.00)">
	<button type="button" class="close" data-dismiss="modal">&times;</button>
	<h2 class="modal-title" style="text-align: center;color: white"><b>Input Planing Penagihan</b></h2>
</div>
				<!-- body modal -->
<div class="modal-body" align="center">
	<form method="post" id="form-user" action="KParea_TargetPenagihan_Input_Save.php" style="width: 99%">
		<table style="margin-left: 20px;width:100%">
			<tr>
				<label><u>Informasi Pelaksana</u></label>
			<td>
			<label>Nama Pelaksana</label>
			<select id="nama" name="nama" class="form-control" style="width: 300px">
				<option value="-">--- Pilih Pelaksana ---</option>
				<?php
				$jabatan="Penagihan";
				$kantor=$row['kantor'];
				$penempatan=$row['penempatan'];
				?>
				<?PHP $querydropdown = mysqli_query($con,"SELECT * FROM central_data WHERE jabatan='$jabatan' AND penempatan='$penempatan' AND kantor='$kantor' order by nama_karyawan") or die (mysqli_error());
				while ($rowdropdown = mysqli_fetch_array($querydropdown)) {
				$namapelaksana = strip_tags($rowdropdown['nama_karyawan']);
				?>
				<option><?PHP echo $namapelaksana;?>
				</option>
				<?PHP }?>
			</select>
			</td>
			</tr>
			</table>
			<table style="margin-left: 20px;width:100%">
			<tr>
				<br></br>
				<label><u>Informasi Nasabah</u></label>
				<td>
				<label>Periode Penagihan</label>
				<input type="date" class="form-control" name="periode" style="width: 300px;height: 30px"></input>
				</td>
			</tr>
			<tr>
				<td>
				<label>Nama Nasabah</label>
				<input type="text" class="form-control" name="nama_nasabah" style="width: 300px;height: 30px" placeholder="Input Nama Nasabah"></input>
				</td>
			</tr>
			<tr>
				<td>
				<label>Kolektibilitas</label>
                <select id="kolektibilitas" name="kolektibilitas" class="form-control" style="width: 300px">
                  <option value="">Pilih</option>
                  <option value="Lancar 0">Lancar 0</option>
                  <option value="Lancar 1">Lancar 1</option>
				  <option value="Lancar 2">Lancar 2</option>
				  <option value="Lancar 3">Lancar 3</option>
				  <option value="Kurang Lancar">Kurang Lancar</option>
				  <option value="Diragukan">Diragukan</option>
				  <option value="Macet">Macet</option>
                </select>
				</td>
			</tr>
			<tr>
				<td>
				<label>Jumlah Angsuran Pokok Yang Harus Dibayar</label>
				<input type="text" class="form-control" name="pokok" style="width: 300px;height: 30px" placeholder="Hanya Angka"></input>
				</td>
			</tr>
			<tr>
				<td>
				<label>Jumlah Angsuran Bunga Yang Harus Dibayar</label>
				<input type="text" class="form-control" name="bunga" style="width: 300px;height: 30px" placeholder="Hanya Angka"></input>
				</td>
			</tr>
		</table>
	<br></br>
	<center><button class="btn btn-success" id="submit">SIMPAN</button></center>
	</form>
</div>
<!-- footer modal -->
<div class="modal-footer" style="background:rgba(83,82,82,1.00);height: 50px" >
</div>
			</div>
		</div>
	</div>
   </div>
</body>
</html>