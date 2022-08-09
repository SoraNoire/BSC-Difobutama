<?php

include "dbcon.php";
include_once('session.php'); 

$result=mysqli_query($con, "select * from central_data where nik='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);
$user = $row['nama_karyawan'];
$penempatan = $row['penempatan'];
$kantor = $row['kantor'];
$jabatan = $row['jabatan'];

$id_nasabah= $_GET['id_nasabah'];
$result_nasabah=mysqli_query($con, "select * from data_slik where id_nasabah='$id_nasabah'");
$row_nasabah=mysqli_fetch_array($result_nasabah);
$nama_nasabah = $row_nasabah['nama_nasabah'];

$query = "SELECT * FROM data_slik WHERE id_nasabah='".$id_nasabah."'";
$sql = mysqli_query($con, $query);
//default data
date_default_timezone_set('asia/jakarta');
$tanggal = date("y-m-d");
$jam     = date("H:i:s");
$zero    = '';
$informasi = 'No';

if($query){
		$konfirm = "UPDATE data_slik SET status='".$informasi."' WHERE id_nasabah='".$id_nasabah."'";
		$sql2 = mysqli_query($con, $konfirm);
			if($konfirm){
		        $insert = mysqli_query($con,"INSERT INTO data_slik_history_proses VALUES('$id_nasabah','$nama_nasabah','$user','$penempatan','$kantor','$jabatan','$tanggal','$jam','$informasi')");
				?>	<script language="JavaScript">
						alert('BERKAS BERHASIL DITOLAK');
						document.location='PEarea_SLIK_NEWsys.php';
					</script>
				<?php
			}else{
				?>	<script language="JavaScript">
						alert('Terjadi Kesalahan! Periksa Koneksi Internet Anda!');
						document.location='PEarea_SLIK_NEWsys.php';
					</script>
				<?php
				
			}
}else{
				?>	<script language="JavaScript">
						alert('Terjadi Kesalahan! Periksa Koneksi Internet Anda!');
						document.location='PEarea_SLIK_NEWsys.php';
					</script>
				<?php
}
?>