<?php
include('dbcon.php');
include('session.php');
//ambil data yang dikirim penginput
$kode_penginputan		= $_POST['kode_penginputan'];
$tanggal_penginputan	= $_POST['tanggal_penginputan'];
$jam_penginputan		= $_POST['jam_penginputan'];
$nama_collector			= $_POST['nama_collector'];
$kolektibilitas			= $_POST['kolektibilitas'];
$tanggal_bayar			= $_POST['tanggal_bayar'];
$no_kwitansi_pembayaran	= $_POST['no_kwitansi_pembayaran'];
$nama_nasabah			= $_POST['nama_nasabah'];
$angsuran_ke			= $_POST['angsuran_ke'];
$pokok					= $_POST['pokok'];
$bunga					= $_POST['bunga'];
$denda					= $_POST['denda'];

//ambil data Colector dari central data
$result_collector=mysqli_query($con,"SELECT * FROM central_data WHERE nama_karyawan='$nama_collector'")or die ('Error In Session');
$data_collector=mysqli_fetch_array($result_collector);
//data Inputan
$kantor_collector     = $data_collector['kantor'];
$penempatan_collector = $data_collector['penempatan'];
//time record & status
date_default_timezone_set('Asia/Jakarta');
$tanggal = date("y-m-d");
$jam     = date("H:i:s");
$status  = 'submit';

if($kode_penginputan && $tanggal_penginputan && $jam_penginputan && $nama_collector && $kolektibilitas && $tanggal_bayar && $no_kwitansi_pembayaran && $nama_nasabah && $angsuran_ke && $pokok && $bunga && $denda){
	$update = mysqli_query($con,"UPDATE input_targetcollection SET no_kwitansi_pembayaran='".$no_kwitansi_pembayaran."',nama_collector='".$nama_collector."',kantor_collector='".$kantor_collector."',penempatan_collector='".$penempatan_collector."',tanggal_bayar='".$tanggal_bayar."',kolektibilitas='".$kolektibilitas."',nama_nasabah='".$nama_nasabah."',pokok='".$pokok."',bunga='".$bunga."',denda='".$denda."',angsuran_ke='".$angsuran_ke."' where kode_penginputan='".$kode_penginputan."'");
	if($update){
	?>
	  <script language="JavaScript">
				alert('Perubahan Data Berhasil Disimpan');
				document.location='TargetCollection.php';
	  </script>
	<?php
	}else{
	?>
	  <script language="JavaScript">
				alert('Terjadi Kesalahan! Periksa Sambungan Internet Anda!');
				document.location='TargetCollection.php';
	  </script>
	<?php
	     }
}else{
	?>
	  <script language="JavaScript">
				alert('Terjadi Kesalahan! Periksa Sambungan Internet Anda!');
				document.location='TargetCollection.php';
	  </script>
	<?php
     }
?>