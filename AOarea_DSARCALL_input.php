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
	<br/>
	<a data-toggle="modal" data-target="#myModalCall" style="color: white">CALL</a>
	<!-- Modal -->
	<div id="myModalCall" class="modal fade" role="dialog">
		<div class="modal-dialog"  style="width: auto">
			<!-- konten modal-->
			<div class="modal-content">
				<!-- heading modal -->
<div class="modal-header" style="background-color:lightgreen">
	<button type="button" class="close" data-dismiss="modal">&times;</button>
	<h4 class="modal-title"><center><h4 style="color: white"><b>LAPORKAN PANGGILAN ANDA</b></h4></center></h4>
</div>
				<!-- body modal -->
<div class="modal-body">
	<form method="post" id="form-user" action="AOarea_DSARCALL_save.php" enctype="multipart/form-data" style="width: auto">
		<table class="table table-responsive" style="margin-left: 10px;width: 98%">
		    <tr>
				<td>
                <label style="color: black"><b>Kode D.S.A.C.R</b></label>
                <input type="text" class="form-control" id="kode_dsacr" name="kode_dsacr" style="width: auto" value="<?php echo sprintf($tanggal.$bulan.$jam."-".$mysamplekantor.$mysamplepenempatan ."/".$mysamplenik."/".$bulan."/".$tahun);?>"readonly>
				</td>
			</tr>
			<tr>
			<td><b style="color: black">Nama Nasabah</b></td>
			</tr>
			<tr>
			<td><input type="text" class="form-control-static" name="nama_nasabah" style="width: 100%;height: 30px;color: black" placeholder="Nama Nasabah"></textarea></td>
			</tr>
			<tr>
			<td><b style="color: black">No Tlp Nasabah</b></td>
			</tr>
			<tr>
			<td><input type="text" class="form-control-static" name="no_tlp_nasabah" style="width: 100%;height: 30px;color: black" placeholder="Hanya Angka"></textarea></td>
			</tr>
			<tr>
			<td><b  style="color: black">Hasil Komunikasi</b></td>
			</tr>
			<tr>
			<td><textarea type="text" class="form-control" name="hasil_komunikasi" style="width: 100%;height: 100px" placeholder="Hasil Pembicaraan Dengan Nasabah/Calon Nasabah"></textarea></td>
			</tr>
			<tr>
			<td style="padding-top: 50px" align="center"><button class="btn btn-success" id="sub">SIMPAN</button></td>
			</tr>
		</table>
	</form>
</div>
<!-- footer modal -->
<div class="modal-footer" style="background-color:lightgreen;height: 50px" >
	
</div>
			</div>
		</div>
	</div>
</body>
</html>