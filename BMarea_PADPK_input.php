<!DOCTYPE html>
<?php 
include('dbcon.php');
include_once('session.php');

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
</head>
<body>
   <div class="container">		
	<br/>
	<button type="button" style="position: absolute" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Create</button>
 
	<!-- Modal -->
	<div id="myModal" class="modal fade" role="dialog" style="background: rgba(0,0,0,0.86)">
		<div class="modal-dialog"  style="width: 50%;">
			<!-- konten modal-->
			<div class="modal-content">
				<!-- heading modal -->
<div class="modal-header" style="background: rgba(4,238,249,0.32)">
	<button type="button" class="close" data-dismiss="modal">&times;</button>
	<h4 class="modal-title"><center><h4 style="color: red"><b>FORM PERMOHONAN ANALISA DATA PENGAJUAN KREDIT</b></h4></center></h4>
</div>
				<!-- body modal -->
<div class="modal-body">
	<form method="post" id="form-user" action="BMarea_PADPK_save.php" style="width: auto">
		<table style="margin-left: 20px;width: auto">
		    <tr>
				<td style="padding-top: 20px">
                <label>Kode Permintaan</label>
                <input type="text" class="form-control" id="kode_permintaan" name="kode_permintaan" style="width: 250px" value="<?php echo sprintf($tanggal.$bulan.$jam."-".$mysamplekantor.$mysamplepenempatan ."/".$mysamplenik."/".$bulan."/".$tahun);?>"readonly>
				</td>
			</tr>
			<tr>
			<td><label>Pilih Nama Account Officer :</label></td>
			</tr>
			<tr>
			<td>
				<select id="nama_ao" name="nama_ao" class="form-control" style="width: 200px">
				<option value="-">--- Pilih ---</option>
				<?php
					include('dbcon.php');
					include('session.php');
					$result=mysqli_query($con, "select * from central_data where nik='$session_id'")or die('Error In Session');
					$row=mysqli_fetch_array($result);
					$kantor=$row['kantor'];
					$penempatan=$row['penempatan'];
				?>
				<?php 
					$querydropdown = mysqli_query($con,"SELECT * FROM central_data WHERE kantor='$kantor' and penempatan='$penempatan' and jabatan='Account Officer' order by nama_karyawan") or die (mysqli_error());
					while ($rowdropdown = mysqli_fetch_array($querydropdown)) {
					$namatargetsurvey = strip_tags($rowdropdown['nama_karyawan']);
				?>
				<option><?PHP echo $namatargetsurvey;?></option>
						<?PHP }?>
				</select>
			</td>
			</tr>
		</table>
		<table style="margin-left: 20px;width:100%">
			<tr>
			<td style="font-size: 18px"><b>Nama Nasabah</b></td>
			</tr>
			<tr>
			<td><input type="text" class="form-control-static" name="nama_nasabah" style="width: 200px;height: 30px" placeholder="input nama nasabah"></textarea></td>
			</tr>
			<tr>
			<td style="font-size: 18px"><b>Alamat Nasabah</b></td>
			</tr>
			<tr>
			<td><textarea type="text" class="form-control-static" name="alamat_nasabah" style="width: 400px;height: 100px" placeholder="Input alamat Nasabah"></textarea></td>
			</tr>
			<tr>
			<td style="font-size: 18px"><b>No. Tlp Nasabah</b></td>
			</tr>
			<tr>
			<td><input type="text" class="form-control-static" name="no_tlp_nasabah" style="width: 300px;height: 30px" placeholder="Hanya angka"></textarea></td>
			</tr>
			<tr>
			<tr>
			<td style="font-size: 18px"><b>Plafond Pengajuan</b></td>
			</tr>
			<tr>
			<td><input type="text" class="form-control-static" name="plafond" style="width: 300px;height: 30px" placeholder="Hanya angka"></textarea></td>
			</tr>
			<tr>
			<td style="padding-top: 50px" align="center"><button class="btn btn-success" id="sub">SIMPAN</button></td>
			</tr>
		</table>
	</form>
</div>
<!-- footer modal -->
<div class="modal-footer" style="background: rgba(4,238,249,0.32);height: 50px" >
	
</div>
			</div>
		</div>
	</div>
   </div>
</body>
</html>