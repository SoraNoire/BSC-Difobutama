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

if($jabatan=='Account Officer')
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
	<button type="button" style="position: relative;top: 1;right: 0" class="btn button" data-toggle="modal" data-target="#myModal">Create</button>
 
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
	<form method="post" id="form-user" action="TargetAOF_input_save.php" style="width: auto">
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
				<label
					<b>Pilih Nama Account Officer :</b>
				</label>
				<select id="nama_ao" name="nama_ao" class="form-control">
				<option value="-">--- Pilih ---</option>
				<?PHP $querydropdown = mysqli_query($con,"SELECT * FROM data_ao_funding WHERE kode_perusahaan='$kodekantor' order by nama_ao") or die (mysqli_error());
				while ($rowdropdown = mysqli_fetch_array($querydropdown)) {
				$namatargetsurvey = strip_tags($rowdropdown['nama_ao']);
				?>
				<option><?PHP echo $namatargetsurvey;?></option>
				<?PHP }?>
				</select>
				</td>
				<td style="width: 33.33%">
					<label>Pilih Jenis Produk :</label>
					<select id="type_relasi" name="type_relasi" class="form-control">
					<option value="-">---Pilih---</option>
					<option value="Tabungan">Tabungan</option>
					<option value="Tabungan Berhadiah">Tabungan Berhadiah</option>
					<option value="Deposito">Deposito</option>
					</select>
				</td>
				<td style="width: 33.33%">
					<label>Tanggal Buka :</label>
					<input type="date" class="form-control" name="tanggal_buka">
				</td>
			</tr>
			<tr>
				<td colspan="3" align="center" style="font-size: 20px">
				<b><u>Data Informasi Nasabah</u></b>
				</td>
			</tr>
			<tr>
				<td style="width: 33.33%">
					<label>NB. ARB</label>
					<input type="text" class="form-control" name="no_b_arb" placeholder="contoh : 0000xx">
				</td>
				<td style="width: 33.33%">
					<label>No. Rek ARB</label>
					<input type="text" class="form-control" name="no_rek_arb" placeholder="contoh : x-xxxxx-x">
				</td>
				<td style="width: 33.33%">
					<label>No. Bilyet</label>
					<input type="text" class="form-control" name="no_bilyet" placeholder="contoh : AB 00xxx">
				</td>
				</tr>
			<tr>
				<td>
				<label>Nama Nasabah</label>
				<input type="text" class="form-control" name="nama_nasabah" placeholder="contoh : Silent Ripper">
				</td>
				<td>
				<label>Nominal</label>
				<input type="text" class="form-control" name="nominal" placeholder="Hanya Angka!! Contoh : 100000000">
				</td>
				<td>
				<label>Suku Bunga</label>
				<input type="text" class="form-control" name="suku_bunga" placeholder="contoh : 5%">
				</td>
				</tr>
			<tr>
				<td colspan="2" rowspan="2">
				<label>Keterangan Tambahan</label>
				<textarea type="text" class="form-control" name="keterangan_tambahan" style="height:120px" placeholder="contoh : Bunga Masuk Pokok / Tabungan / Transfer / dll"></textarea>
				</td>
				<td>
				<label>Jangka Waktu</label>
				<input type="text" class="form-control" name="jangka_waktu" placeholder="contoh : 1 Bulan">
				</td>
			</tr>
			<tr>
				<td>
				<label>Keterangan</label>
				<input type="text" class="form-control" name="keterangan" placeholder="contoh : ARO">
				</td>
            </tr>
			
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