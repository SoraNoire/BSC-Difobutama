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
<meta name="viewport" content="width=device-width, initial-scale=1">	
</head>
<body>
 	
  <div class="table table-responsive">		
	<br/>
	<button type="button" style="position: absolute" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalPM">Create</button>
 
	<!-- Modal nasabah-->
	<div id="myModalPM" class="modal fade" role="dialog" style="background: rgba(0,0,0,0.86);">
		<div class="modal-dialog"  style="width: auto;">
			<!-- konten modal-->
			<div class="modal-content">
				<!-- heading modal -->
<div class="modal-header" style="background: rgba(4,238,249,0.32)">
	<button type="button" class="close" data-dismiss="modal">&times;</button>
	<h4 class="modal-title"><center><h4 style="color: red"><b>INPUT TRANSAKSI</b></h4></center></h4>
</div>
				<!-- body modal -->
<div class="modal-body">
	<form method="post" id="form-user" action="DCAR_PM_save.php">
		<table align="center">
		    <tr>
				<td style="padding-top: 20px; text-align: center">
                <label>KODE Pembayaran</label>
                <input type="text" class="form-control" id="kode_bayar" name="kode_bayar" style="width: 250px" value="<?php echo sprintf($tanggal.$bulan.$jam."-".$mysamplekantor.$mysamplepenempatan ."/".$mysamplenik."/".$bulan."/".$tahun);?>"readonly>
				</td>
			</tr>
		</table>
		<table align="center">
			<tr>
			<td style="font-size: 18px; padding-top: 50px"><b>Nama Nasabah</b></td>
			</tr>
			<tr>
			<td><input type="text" class="form-control-static" name="nama_nasabah" style="width: 300px;height: 30px" placeholder="Input nama Nasabah"></input></td>
			</tr>
			<tr>
			<td style="font-size: 18px;"><b>Email Nasabah</b></td>
			</tr>
			<tr>
			<td><input type="text" class="form-control-static" name="email_nasabah" style="width: 300px;height: 30px" placeholder="Input email Nasabah"></input></td>
			</tr>
			<tr>
			<td style="font-size: 18px"><b>Jumlah Pembayaran</b></td>
			</tr>
			<tr>
			<td><input type="text" class="form-control-static" name="jumlah_bayar" style="width: 300px;height: 30px" placeholder="Hanya angka"></textarea></td>
			</tr>
			<tr>
			<td style="font-size: 18px"><b>Metode Pembayaran</b></td>
			</tr>
			<tr>
			<td><select id="klasifikasi_nasabah" name="metode_bayar" class="form-control">
                  <option value="">Pilih</option>
                  <option value="Tunai">Tunai</option>
                  <option value="Transfer">Transfer</option>
                </select></td>
			</tr>
			<tr>
			<tr>
			<td style="font-size: 18px"><b>Keterangan Pembayaran</b></td>
			</tr>
			<tr>
			<td><textarea type="text" class="form-control-static" name="keterangan" style="width: 300px;height: 100px" placeholder="Contoh : Angsuran Bulan Januari 2019"></textarea></td>
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