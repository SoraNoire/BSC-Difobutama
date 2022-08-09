<!doctype html>
<?php
  // Load file koneksi.php
  include "dbcon.php";
  include "session.php";
	  
  // Ambil data NIS yang dikirim oleh index.php melalui URL
  $kode_penginputan = $_GET['kode_penginputan'];
  
  // Query untuk menampilkan data siswa berdasarkan NIS yang dikirim
  $query = "SELECT * FROM input_targetcollection WHERE kode_penginputan='".$kode_penginputan."'";
  $sql = mysqli_query($con, $query);  // Eksekusi/Jalankan query dari variabel $query
  $data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql
  ?>
<html>
<head>
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/animate.css" rel="stylesheet" type="text/css">
	<meta name="viewport" content="width=device-width; height=device-height; initial-scale=0.1; maximum-scale=1.0;">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>The Balance Score Card</title>
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet">
	<link href="css/star-rating.min.css" media="all" rel="stylesheet" type="text/css" />
	<link href="css/w3.css.css" media="all" rel="stylesheet" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
</head>
<body>
  <h1><center>Form Ubah Data</center></h1>
<div class="container">
  <form method="post" id="form-user" action="TargetCollection_Update_save.php" style="width: auto">
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
					<input type="text" class="form-control" id="kode_penginputan" name="kode_penginputan" value="<?php echo ($kode_penginputan)?>" readonly></input>
				</center>
				</td>
				<td style="width: 33.33%">
                <center>
					<label>Tanggal Input</label>
					<input type="text" class="form-control" id="tanggal_penginputan" name="tanggal_penginputan" style="width: auto" value="<?php echo date("d-M-Y",strtotime($data['tanggal_penginputan']));?>"readonly>
				</center>
				</td>
				<td style="width: 33.33%">
                <center>
					<label>Jam Input</label>
					<input type="text" class="form-control" id="jam_penginputan" name="jam_penginputan" style="width: auto" value="<?php echo date("H:s:i",strtotime($data['jam_penginputan']));?>"readonly>
					</td>
				<center>
			</tr>
			<tr>
				<td style="width: 33.33%">
				<label>
					<b>Pilih Nama Collector :</b>
				</label>
				<select id="nama_collector" name="nama_collector" class="form-control">
				<option value="<?php echo($data['nama_collector'])?>"><?php echo($data['nama_collector'])?></option>
				<?PHP $querydropdown = mysqli_query($con,"SELECT * FROM data_k_penagihan WHERE kode_perusahaan='$kodekantor' order by nama_collector") or die (mysqli_error());
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
					  <option value="<?php echo($data['kolektibilitas'])?>"><?php echo($data['kolektibilitas'])?></option>
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
					<input type="text" class="form-control" name="tanggal_bayar" value="<?php echo($data['tanggal_bayar'])?>"></input>
					<label style="color: red">Format Tanggal Harus YYYY-MM-DD!!!</label>
				</td>
			</tr>
			<tr>
				<td colspan="3" align="center" style="font-size: 20px">
				<b><u>Data Informasi Nasabah</u></b>
				</td>
			</tr>
			<tr>
				<td style="width: 33.33%">
					<label>No. Bukti Kwitansi</label>
					<input type="text" class="form-control" name="no_kwitansi_pembayaran" value="<?php echo($data['no_kwitansi_pembayaran'])?>">
				</td>
				<td style="width: 33.33%">
					<label>Nama Nasabah</label>
					<input type="text" class="form-control" name="nama_nasabah" value="<?php echo($data['nama_nasabah'])?>" >
				</td>
				<td style="width: 33.33%">
					<label>Angsuran Ke -</label>
					<input type="text" class="form-control" name="angsuran_ke" value="<?php echo($data['angsuran_ke'])?>">
				</td>
				</tr>
			<tr>
				<td>
				<label>Pokok Angsuran</label>
				<input type="text" class="form-control" name="pokok" value="<?php echo($data['pokok'])?>">
				</td>
				<td>
				<label>Bunga Angsuran</label>
				<input type="text" class="form-control" name="bunga" value="<?php echo($data['bunga'])?>">
				</td>
				<td>
				<label>Denda Angsuran</label>
				<input type="text" class="form-control" name="denda" value="<?php echo($data['denda'])?>">
				</td>
			</tr>
			<tr>
			<td style="padding-top: 50px" align="center" colspan="3"><button class="btn btn-success" id="sub">SIMPAN</button></td>
			</tr>
		</table>
	</form>
</div>
</body>
</html>