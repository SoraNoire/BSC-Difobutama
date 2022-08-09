<?php

include "dbcon.php";
$kode= $_GET['kode'];
$query = "SELECT * FROM activity_pe WHERE kode='".$kode."'";
$status = 'delete';
$sql = mysqli_query($con, $query);
if($query){
		$delete = "DELETE FROM activity_pe WHERE kode='".$kode."'";
		$sql2 = mysqli_query($con, $delete);
			if($delete){
				?>	<script language="JavaScript">
						alert('Data Berhasil Dihapus!');
						document.location='PEarea_Activity.php';
					</script>
				<?php
			}else{
				?>	<script language="JavaScript">
						alert('Terjadi Kesalahan! Periksa Koneksi Internet Anda!');
						document.location='PEarea_Activity.php';
					</script>
				<?php
				
			}
}else{
				?>	<script language="JavaScript">
						alert('Terjadi Kesalahan! Periksa Koneksi Internet Anda!');
						document.location='PEarea_Activity.php';
					</script>
				<?php
}
?>