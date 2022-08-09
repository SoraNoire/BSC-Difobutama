<!doctype html>
<?php
  // Load file koneksi.php
  include "dbcon.php";
  include "session.php";
	  
  // Ambil data NIS yang dikirim oleh index.php melalui URL
  $kode_penginputan = $_GET['kode_penginputan'];
  
  // Query untuk menampilkan data siswa berdasarkan NIS yang dikirim
  $query = "SELECT * FROM input_targetaof WHERE kode_penginputan='".$kode_penginputan."'";
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
  <form method="post" id="form-user" action="TargetAOF_update_save.php" style="width: auto">
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
					<input type="text" class="form-control" id="tanggal_input" name="tanggal_input" style="width: auto" value="<?php echo date("d-M-Y",strtotime($data['tanggal_input']));?>"readonly>
				</center>
				</td>
				<td style="width: 33.33%">
                <center>
					<label>Jam Input</label>
					<input type="text" class="form-control" id="jam_input" name="jam_input" style="width: auto" value="<?php echo date("H:s:i",strtotime($data['jam_input']));?>"readonly>
					</td>
				<center>
			</tr>
			<tr>
				<td style="width: 33.33%">
				<label
					<b>Pilih Nama Account Officer :</b>
				</label>
				<select id="nama_ao" name="nama_ao" class="form-control">
				<option value="<?php echo($data['nama_ao'])?>"><?php echo($data['nama_ao'])?></option>
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
					<option value="<?php echo($data['type_relasi'])?>"><?php echo($data['type_relasi'])?></option>
					<option value="Tabungan">Tabungan</option>
					<option value="Tabungan Berhadiah">Tabungan Berhadiah</option>
					<option value="Deposito">Deposito</option>
					</select>
				</td>
				<td style="width: 33.33%">
					<label>Tanggal Buka :</label>
					<input type="text" class="form-control" name="tanggal_buka" value="<?php echo($data['tgl_buka'])?>"></input>
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
					<label>NB. ARB</label>
					<input type="text" class="form-control" name="no_b_arb" value="<?php echo($data['no_b_arb'])?>">
				</td>
				<td style="width: 33.33%">
					<label>No. Rek ARB</label>
					<input type="text" class="form-control" name="no_rek_arb" value="<?php echo($data['no_rek_arb'])?>" >
				</td>
				<td style="width: 33.33%">
					<label>No. Bilyet</label>
					<input type="text" class="form-control" name="no_bilyet" value="<?php echo($data['no_bilyet'])?>">
				</td>
				</tr>
			<tr>
				<td>
				<label>Nama Nasabah</label>
				<input type="text" class="form-control" name="nama_nasabah" value="<?php echo($data['nama_nasabah'])?>">
				</td>
				<td>
				<label>Nominal</label>
				<input type="text" class="form-control" name="nominal" value="<?php echo($data['nominal'])?>">
				</td>
				<td>
				<label>Suku Bunga</label>
				<input type="text" class="form-control" name="suku_bunga" value="<?php echo($data['suku_bunga'])?>">
				</td>
				</tr>
			<tr>
				<td colspan="2" rowspan="2">
				<label>Keterangan Tambahan</label>
				<textarea type="text" class="form-control" name="keterangan_tambahan" style="height:120px"> <?php echo($data['keterangan_tambahan'])?></textarea>
				</td>
				<td>
				<label>Jangka Waktu</label>
				<input type="text" class="form-control" name="jangka_waktu" value="<?php echo($data['jangka_waktu'])?>">
				</td>
			</tr>
			<tr>
				<td>
				<label>Keterangan</label>
				<input type="text" class="form-control" name="keterangan" value="<?php echo($data['keterangan'])?>">
				</td>
            </tr>
			
			<td style="padding-top: 50px" align="center" colspan="3"><button class="btn btn-success" id="sub">SIMPAN</button></td>
			</tr>
		</table>
	</form>
</div>
</body>
</html>