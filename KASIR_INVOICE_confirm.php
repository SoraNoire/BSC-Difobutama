<?php

include "dbcon.php";
include_once('session.php'); 

$result=mysqli_query($con, "select * from central_data where nik='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);
$user = $row['nama_karyawan'];

$kode_bayar= $_GET['kode_bayar'];
$query = "SELECT * FROM penagihan_mobile WHERE kode_bayar='".$kode_bayar."'";
$sql = mysqli_query($con, $query);
//default data
date_default_timezone_set('asia/jakarta');
$tanggal = date("y-m-d");
$jam     = date("H:i:s");
$status  = 'BMproses2';
$zero    = '';
$informasi = 'Pembayaran Telah Diverifikasi';

if($query){
		$konfirm = "UPDATE penagihan_mobile SET nama_teller='".$user."', tanggal_konfirm='".$tanggal."', jam_konfirm='".$jam."', status_bayar='".$informasi."' WHERE kode_bayar='".$kode_bayar."'";
		$sql2 = mysqli_query($con, $konfirm);
			if($konfirm){
				?>	<script language="JavaScript">
						alert('Pembayaran Telah Dikonfirmasi !!');
						document.location='KASIR_Home.php';
					</script>
				<?php
			}else{
				?>	<script language="JavaScript">
						alert('Terjadi Kesalahan! Periksa Koneksi Internet Anda!');
						document.location='KASIR_Home.php';
					</script>
				<?php
				
			}
}else{
				?>	<script language="JavaScript">
						alert('Terjadi Kesalahan! Periksa Koneksi Internet Anda!');
						document.location='KASIR_Home.php';
					</script>
				<?php
}
?>