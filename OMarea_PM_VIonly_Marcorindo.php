<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>The Ballance Scorecard</title>
<link>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap-3.3.7.css" rel="stylesheet" type="text/css">
<?php
function rupiah($angka){
	
	$hasil_rupiah = "Rp.   " . number_format($angka,2,',','.');
	return $hasil_rupiah;
 
}
function penyebut($nilai) {
		$nilai = abs($nilai);
		$huruf = array("", "SATU", "DUA", "TIGA", "EMPAT", "LIMA", "ENAM", "TUJUH", "DELAPAN", "SEMBILAN", "SEPULUH", "SEBELAS");
		$temp = "";
		if ($nilai < 12) {
			$temp = " ". $huruf[$nilai];
		} else if ($nilai <20) {
			$temp = penyebut($nilai - 10). " BELAS";
		} else if ($nilai < 100) {
			$temp = penyebut($nilai/10)." PULUH". penyebut($nilai % 10);
		} else if ($nilai < 200) {
			$temp = " SERATUS" . penyebut($nilai - 100);
		} else if ($nilai < 1000) {
			$temp = penyebut($nilai/100) . " RATUS" . penyebut($nilai % 100);
		} else if ($nilai < 2000) {
			$temp = " SERIBU" . penyebut($nilai - 1000);
		} else if ($nilai < 1000000) {
			$temp = penyebut($nilai/1000) . " RIBU" . penyebut($nilai % 1000);
		} else if ($nilai < 1000000000) {
			$temp = penyebut($nilai/1000000) . " JUTA" . penyebut($nilai % 1000000);
		} else if ($nilai < 1000000000000) {
			$temp = penyebut($nilai/1000000000) . " MILYAR" . penyebut(fmod($nilai,1000000000));
		} else if ($nilai < 1000000000000000) {
			$temp = penyebut($nilai/1000000000000) . " TRILYUN" . penyebut(fmod($nilai,1000000000000));
		}     
		return $temp;
	}
 
	function terbilang($nilai) {
		if($nilai<0) {
			$hasil = "MINUS ". trim(penyebut($nilai));
		} else {
			$hasil = trim(penyebut($nilai));
		}     		
		return $hasil;
	}
	
date_default_timezone_set('asia/jakarta');
$tanggal = date("d-m-Y");
$jam     = date("H:i:s");
$status  = 'Diterima Divisi Penagihan';
$zero    = '';	
?>	
	<?php 
	include 'dbcon.php';
	$kode_bayar = $_GET['kode_bayar'];
	$sql = mysqli_query($con,"select * from penagihan_mobile where kode_bayar='$kode_bayar'");
    $data = mysqli_fetch_array($sql);
	?>
</head>
<body>
 
	<center>
	<table border="0" class="table table-responsive" style="border-bottom: double">	
	<tr>
		<td rowspan="2">
			<img src="img/marco.png"></img>
	    </td>
		<td rowspan="2" align="center">
			<H1>BUKTI<b> ANGSURAN KREDIT </b></H1>
	    </td>
		<td>
			No. : <B><?php echo($kode_bayar)?>
	    </td>
	</tr>
	<tr>
		<td>
			Tanggal : <b><?php echo($tanggal)?></b>
		</td>
	</tr>
	</table>
	
 
	<h4>TELAH DITERIMA DARI BPK/IBU <u><b><?php echo $data['nama_nasabah']; ?></b></u> UANG PEMBAYARAN ANGSURAN DENGAN RINCIAN SEBAGAI BERIKUT :</h4>
	<table class="table table-responsive" style="border-bottom: double">
		<tr>
			<td>NO BUKTI PEMBAYARAN</td>
			<td>:</td>
			<td><?php echo "#".$data['kode_bayar']; ?></td>
		</tr>
		<tr>
			<td>PETUGAS</td>
			<td>:</td>
			<td><?php echo $data['nama_penagih']; ?></td>
		</tr>
		<tr>
			<td>TANGGAL TRANSAKSI</td>
			<td>:</td>
			<td><?php echo $data['tanggal_bayar']." || ".$data['jam_bayar']; ?></td>
		</tr>
		<tr>
			<td>NOMINAL TRANSAKSI</td>
			<td>:</td>
			<td><?php echo rupiah($data['jumlah_bayar']); ?></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td>TERBILANG : <?php echo terbilang($data['jumlah_bayar']); ?> RUPIAH</td>
		</tr>
		<tr>
			<td>METODE PEMBAYARAN</td>
			<td>:</td>
			<td><?php echo $data['metode_bayar']; ?></td>
		</tr>
		<tr>
			<td>KETERANGAN PEMBAYARAN</td>
			<td>:</td>
			<td><?php echo $data['keterangan']; ?></td>
		</tr>
	</table>
	</center>
</body>
</html>