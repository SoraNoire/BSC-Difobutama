<?php

include "dbcon.php";
$kode= $_GET['kode'];
$query = "SELECT * FROM activity_pe WHERE kode='".$kode."'";
$status = 'submit';
$sql = mysqli_query($con, $query);
if($query){
		$recover = "UPDATE activity_pe SET status='".$status."' WHERE kode='".$kode."'";
		$sql2 = mysqli_query($con, $recover);
			if($recover){
				?>	<script language="JavaScript">
						alert('Data Berhasil Direcover!');
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