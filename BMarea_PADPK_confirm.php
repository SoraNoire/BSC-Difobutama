<?php

include "dbcon.php";
include_once('session.php'); 

$result=mysqli_query($con, "select * from central_data where nik='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);

$kode_permintaan= $_GET['kode_permintaan'];
$query = "SELECT * FROM permohonan_analisa_kredit WHERE kode_permintaan='".$kode_permintaan."'";
$sql = mysqli_query($con, $query);
$user = $row['nama_karyawan'];
//default data
date_default_timezone_set('asia/jakarta');
$tanggal = date("y-m-d");
$jam     = date("H:i:s");
$status  = 'BMproses2';
$zero    = '';
$informasi = 'Data Telah Diterima Business Manager';

if($query){
		$send = "UPDATE permohonan_analisa_kredit SET status='".$status."' WHERE kode_permintaan='".$kode_permintaan."'";
		$sql2 = mysqli_query($con, $send);
			if($send){
				$insert = mysqli_query($con,"INSERT INTO padpk_history_data VALUES('$kode_permintaan','$tanggal','$jam','$informasi','$user','-')");
				?>	<script language="JavaScript">
						alert('Penerimaan Berkas Telah Dikonfirmasi!');
						document.location='BMarea_PADPK.php';
					</script>
				<?php
			}else{
				?>	<script language="JavaScript">
						alert('Terjadi Kesalahan! Periksa Koneksi Internet Anda!');
						document.location='BMarea_PADPK.php';
					</script>
				<?php
				
			}
}else{
				?>	<script language="JavaScript">
						alert('Terjadi Kesalahan! Periksa Koneksi Internet Anda!');
						document.location='BMarea_PADPK.php';
					</script>
				<?php
}
?>