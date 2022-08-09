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
<script>

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
        alert ("Geolocation is not supported by this browser.");
    }
}

function showPosition(position) {
    url="https://www.google.com/maps/?q="+ position.coords.latitude +","+ position.coords.longitude +"&zoom=20&basemap=terrain";
	$('#lokasi_dsar').val(url);
	
}
</script>
<head>	
</head>
<body>	
	<br/>
	<a data-toggle="modal" data-target="#myModal" style="color: white">VISIT</a>
	<!-- Modal -->
	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog"  style="width: auto">
			<!-- konten modal-->
			<div class="modal-content">
				<!-- heading modal -->
<div class="modal-header" style="background-color:lightgreen">
	<button type="button" class="close" data-dismiss="modal">&times;</button>
	<h4 class="modal-title"><center><h4 style="color: white"><b>LAPORKAN KUNJUNGAN ANDA</b></h4></center></h4>
</div>
				<!-- body modal -->
<div class="modal-body">
	<form method="post" id="form-user" action="AOarea_DSAR_save.php" enctype="multipart/form-data" style="width: auto">
		<table class="table table-responsive" style="margin-left: 10px;width: 98%">
		    <tr>
				<td>
                <label style="color: black"><b>Kode D.S.A.R</b></label>
                <input type="text" class="form-control" id="kode_dsar" name="kode_dsar" style="width: auto" value="<?php echo sprintf($tanggal.$bulan.$jam."-".$mysamplekantor.$mysamplepenempatan ."/".$mysamplenik."/".$bulan."/".$tahun);?>"readonly>
				</td>
			</tr>
			<tr>
			<td><b style="color: black">URAIAN D.S.A.R</b></td>
			</tr>
			<tr>
			<td><textarea type="text" class="form-control" name="uraian_dsar" style="width: 100%;height: 100px" placeholder="uraian aktivitas"></textarea></td>
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
			<td><b style="color: black">Alamat Nasabah</b></td>
			</tr>
			<tr>
			<td><textarea type="text" class="form-control" name="alamat_nasabah" style="width: 100%;height: 100px;color: black" placeholder="Alamat Nasabah"></textarea></td>
			</tr>
			<tr>
                <td>
				<label style="color: black">Lokasi</label>
                <input name="lokasi_dsar" type="text" class="form-control" placeholder="Link Lokasi" id="lokasi_dsar">
				</td>
            </tr>
			<tr><td>
				<button type="button" class="btn-group-justified" onclick="getLocation()" style="color: black">Generate Location</button>
			</td></tr>
			<tr>
			<td	><b style="color: black">Foto</b></td>
			</tr>
			<tr>
			<td>
				<input type="file" name="foto_dsar" style="color: black"></input>
			</td>
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