<!DOCTYPE html>
<?php 
include('dbcon.php');
include_once('session.php');

$result=mysqli_query($con, "select * from central_data where nik='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);
$jabatan=$row['jabatan']; 
$kantor=$row['kantor']; 
$kodekantor=$row['kode_kantor'];
$penempatan=$row['penempatan'];

if($jabatan=='')
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
<style>
.button {
  display: inline-block;
  padding: 15px 25px;
  font-size: 24px;
  cursor: pointer;
  text-align: center;
  text-decoration: none;
  outline: none;
  color: #fff;
  background-color: #06FCF0;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px #999;
}

.button:hover {background-color: #01F843}

.button:active {
  background-color: #1989FF;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
</style>
</head>
<body style="padding-top: 50px">
   <div class="container">		
	<br/>
	<button type="button" style="position: relative;top: 1;right: 0" class="btn button" data-toggle="modal" data-target="#myModal">ADD +</button>
 
	<!-- Modal -->
	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog"  style="width: auto">
			<!-- konten modal-->
			<div class="modal-content">
				<!-- heading modal -->
<div class="modal-header" style="background-color:lightgreen">
	<button type="button" class="close" data-dismiss="modal">&times;</button>
	<h4 class="modal-title"><center><h4 style="color: white"><b>Input Data</b></h4></center></h4>
</div>
				<!-- body modal -->
<div class="modal-body">
	<form method="post" id="form-user" action="TargetCollection_Input_Save.php" style="width: auto">
		<table class="table table-responsive" style="margin-left: 10px;width: 98%">
		    <tr>
				<td colspan="3" align="center" style="font-size: 20px">
				<b><u>Data Default</u></b>
				</td>
			</tr>
			<tr>
				<td style="width: 33.33%">
                <center>
					<label>Kode Input</label>
					<input type="text" class="form-control" id="kode_penginputan" name="kode_penginputan" value="<?php echo sprintf($tanggal.$bulan.$jam."-".$mysamplekantor.$mysamplepenempatan ."/".$mysamplenik."/".$bulan."/".$tahun);?>"readonly>
				</center>
				</td>
				<td style="width: 33.33%">
                <center>
					<label>Tanggal Input</label>
					<input type="text" class="form-control" id="tanggal_input" name="tanggal_input" style="width: auto" value="<?php echo date('Y-m-d');?>"readonly>
				</center>
				</td>
				<td style="width: 33.33%">
                <center>
					<label>Jam Input</label>
					<input type="text" class="form-control" id="jam_input" name="jam_input" style="width: auto" value="<?php echo date('H:i:s');?>"readonly>
					</td>
				<center>
			</tr>
			<tr>
				<td style="width: 33.33%">
				<label>
					<b>Pilih Nama Collector :</b>
				</label>
				<select id="nama_collecetor" name="nama_collector" class="form-control">
				<option value="-">--- Pilih ---</option>
				<?PHP $querydropdown = mysqli_query($con,"SELECT * FROM data_k_penagihan WHERE kode_perusahaan='$kodekantor' order by nama_collector ASC") or die (mysqli_error());
				while ($rowdropdown = mysqli_fetch_array($querydropdown)) {
				$namatargetsurvey = strip_tags($rowdropdown['nama_collector']);
				?>
				<option><?PHP echo $namatargetsurvey;?></option>
				<?PHP }?>
				</select>
				</td>
				<td style="width: 33.33%">
					<label>Kolektibilitas Nasabah :</label>
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
				<td style="width: 33.33%">
					<label>Tanggal Bayar :</label>
					<input type="date" class="form-control" name="tanggal_bayar">
				</td>
			</tr>
			<tr>
				<td colspan="3" align="center" style="font-size: 20px">
				<b><u>Data Informasi Nasabah</u></b>
				</td>
			</tr>
			<tr>
				<td style="width: 33.33%">
					<label>No Bukti Kwitansi</label>
					<input type="text" class="form-control" name="no_kwitansi_pembayaran" placeholder="input no kwitansi">
				</td>
				<td style="width: 33.33%">
					<label>Nama Nasabah</label>
					<input type="text" class="form-control" name="nama_nasabah" placeholder="Input Nama Nasabah">
				</td>
				<td style="width: 33.33%">
					<label>Angsuran Ke - </label>
					<input type="text" class="form-control" name="angsuran_ke" placeholder="Hanya Angka">
				</td>
			</tr>
			<tr>
				<td style="width: 33.33%">
					<label>Pokok Angsuran</label>
					<input type="text" class="form-control" name="pokok" placeholder="Hanya Angka">
				</td>
				<td style="width: 33.33%">
					<label>Bunga Angsuran</label>
					<input type="text" class="form-control" name="bunga" placeholder="Hanya Angka">
				</td>
				<td style="width: 33.33%">
					<label>Denda Angsuran</label>
					<input type="text" class="form-control" name="denda" placeholder="Hanya Angka">
				</td>
			</tr>
			<tr>
			<td style="padding-top: 50px" align="center" colspan="3"><button class="btn btn-success" id="sub">SIMPAN</button></td>
			</tr>
		</table>
	</form>
</div>
<!-- footer modal -->
<div class="modal-footer" style="background-color:lightgreen;height: 50px" >
	<center><label style="color: red">*Mohon Perhatikan Inputan Anda Sebelum menyimpan!! Isi kolom kosong dengan "-"</label></center>
</div>
			</div>
		</div>
	</div>
   </div>
</body>
</html>