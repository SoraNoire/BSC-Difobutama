<?php
include('dbcon.php');
include('session.php');
//ambil data yang dikirim penginput
$kode_penginputan		= $_POST['kode_penginputan'];
$tanggal_input			= $_POST['tanggal_input'];
$jam_input				= $_POST['jam_input'];
$nama_collector			= $_POST['nama_collector'];
$kolektibilitas			= $_POST['kolektibilitas'];
$tanggal_bayar			= $_POST['tanggal_bayar'];
$no_kwitansi_pembayaran	= $_POST['no_kwitansi_pembayaran'];
$nama_nasabah			= $_POST['nama_nasabah'];
$angsuran_ke			= $_POST['angsuran_ke'];
$pokok					= $_POST['pokok'];
$bunga					= $_POST['bunga'];
$denda					= $_POST['denda'];

//ambil data penginput dari central data
$result=mysqli_query($con, "select * from central_data where nik='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);
//data Pelaksana Penginput.
$nama_penginput       = $row['nama_karyawan'];
$jabatan_penginput    = $row['jabatan'];
$kantor_penginput     = $row['kantor'];
$penempatan_penginput = $row['penempatan'];

//ambil data Collector dari central data
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

if($kode_penginputan && $tanggal_input && $jam_input && $nama_collector && $kolektibilitas && $tanggal_bayar && $no_kwitansi_pembayaran && $nama_nasabah && $angsuran_ke && $pokok && $bunga && $denda){
	$cek = mysqli_num_rows(mysqli_query($con,"SELECT * FROM input_targetcollection WHERE kode_penginputan='$kode_penginputan'"));
    if ($cek > 0){
	?>
	  <script language="JavaScript">
				alert('Data Ganda Terdeteksi, Periksa Kembali Inputan Anda!');
				document.location='TargetCollection.php';
	  </script>
	<?php
    }else{
	$insert = mysqli_query($con,"INSERT INTO input_targetcollection VALUES('$no_kwitansi_pembayaran','$nama_collector','$kantor_collector','$penempatan_collector','$tanggal_bayar','$kolektibilitas','$nama_nasabah','$pokok','$bunga','$denda','$angsuran_ke','$kode_penginputan','$tanggal_input','$jam_input','$nama_penginput','$jabatan_penginput','$kantor_penginput','$penempatan_penginput')");
	if($insert){
	?>
	  <script language="JavaScript">
				alert('Data Berhasil Di Input!');
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