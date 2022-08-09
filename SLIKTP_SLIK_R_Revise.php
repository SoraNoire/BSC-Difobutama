<?php

include "dbcon.php";
include_once('session.php');
$kode = $_GET['id_nasabah'];
$status = "request";
$data = "SELECT * FROM data_slik_ao_req WHERE nik_ktp_nasabah='".$kode."'";
$sql = mysqli_query($con, $data);
$row =mysqli_fetch_array($sql);
$lampiran = $row['attachment'];
$target = "files/$lampiran";
if(file_exists($target)){
		unlink($target);	
		$revise = "UPDATE data_slik_ao_req SET status='".$status."' WHERE nik_ktp_nasabah='".$kode."'";
		$sql2 = mysqli_query($con, $revise);
			if($revise){
				?>	<script language="JavaScript">
						alert('Data Berhasil Dikembalikan!');
						document.location='SLIKTP_SLIK_R.php';
					</script>
				<?php
			}else{
				?>	<script language="JavaScript">
						alert('Terjadi Kesalahan! Periksa Koneksi Internet Anda!');
						document.location='SLIKTP_SLIK_R.php';
					</script>
				<?php
				
			}
}else{  
        $revise = "UPDATE data_slik_ao_req SET status='".$status."' WHERE nik_ktp_nasabah='".$kode."'";
		$sql2 = mysqli_query($con, $revise);
			if($revise){
				?>	<script language="JavaScript">
						alert('Data Berhasil Dikembalikan!');
						document.location='SLIKTP_SLIK_R.php';
					</script>
				<?php
			}else{
				?>	<script language="JavaScript">
						alert('Terjadi Kesalahan! Periksa Koneksi Internet Anda!');
						document.location='SLIKTP_SLIK_R.php';
					</script>
				<?php
				
			}
		}
		?>