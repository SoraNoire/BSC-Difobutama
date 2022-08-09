<?php

include "dbcon.php";
include_once('session.php');
$kode= $_GET['no_surat'];
$data = "SELECT * FROM news WHERE no_surat='".$kode."'";
$sql = mysqli_query($con, $data);
$row =mysqli_fetch_array($sql);
$kantor = $row['kantor'];
$lampiran = $row['lampiran'];
$target = "FileNews/$kantor/$lampiran";
if(file_exists($target)){
		unlink($target);	
		$delete = "DELETE FROM news WHERE no_surat='".$kode."'";
		$sql2 = mysqli_query($con, $delete);
			if($delete){
				?>	<script language="JavaScript">
						alert('Data Berhasil Dihapus!');
						document.location='HRDarea_News.php';
					</script>
				<?php
			}else{
				?>	<script language="JavaScript">
						alert('Terjadi Kesalahan! Periksa Koneksi Internet Anda!');
						document.location='HRDarea_News.php';
					</script>
				<?php
				
			}
}else{
				?>	<script language="JavaScript">
						alert('Terjadi Kesalahan! Periksa Koneksi Internet Anda!');
						document.location='HRDarea_News.php';
					</script>
				<?php
}
?>