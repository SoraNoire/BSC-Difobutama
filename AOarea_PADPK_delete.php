<?php

include "dbcon.php";
$kode_permintaan= $_GET['kode_permintaan'];
$query = "SELECT * FROM permohonan_analisa_kredit WHERE kode_permintaan='".$kode_permintaan."'";
$sql = mysqli_query($con, $query);
if($query){
		$delete = "DELETE FROM permohonan_analisakredit WHERE kodepermintaan='".$kode_permintaan."'";
		$sql2 = mysqli_query($con, $delete);
			if($delete){
				?>	<script language="JavaScript">
						alert('Data Berhasil Dihapus!');
						document.location='AOarea_PADPK.php';
					</script>
				<?php
			}else{
				?>	<script language="JavaScript">
						alert('Terjadi Kesalahan! Periksa Koneksi Internet Anda!');
						document.location='AOarea_PADPK.php';
					</script>
				<?php
				
			}
}else{
				?>	<script language="JavaScript">
						alert('Terjadi Kesalahan! Periksa Koneksi Internet Anda!');
						document.location='AOarea_PADPK.php';
					</script>
				<?php
}
?>