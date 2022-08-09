<?php

include "dbcon.php";
include_once('session.php');
$kode = $_GET['id_nasabah'];
$data = "SELECT * FROM data_slik_ao_req WHERE nik_ktp_nasabah='".$kode."'";
$sql = mysqli_query($con, $data);
$row =mysqli_fetch_array($sql);
$lampiran = $row['attachment'];
$target = "files/$lampiran";
if(file_exists($target)){
		unlink($target);	
		$delete = "DELETE FROM data_slik_ao_req WHERE nik_ktp_nasabah='".$kode."'";
		$sql2 = mysqli_query($con, $delete);
			if($delete){
				?>	<script language="JavaScript">
						alert('Data Berhasil Dihapus!');
						document.location='AOarea_SLIK_R.php';
					</script>
				<?php
			}else{
				?>	<script language="JavaScript">
						alert('Terjadi Kesalahan! Periksa Koneksi Internet Anda!');
						document.location='AOarea_SLIK_R.php';
					</script>
				<?php
				
			}
}else{
		$delete = "DELETE FROM data_slik_ao_req WHERE nik_ktp_nasabah='".$kode."'";
		$sql2 = mysqli_query($con, $delete);
			if($delete){
				?>	<script language="JavaScript">
						alert('Data Berhasil Dihapus!');
						document.location='AOarea_SLIK_R.php';
					</script>
				<?php
			}else{
				?>	<script language="JavaScript">
						alert('Terjadi Kesalahan! Periksa Koneksi Internet Anda!');
						document.location='AOarea_SLIK_R.php';
					</script>
				<?php
				
			}
}
?>