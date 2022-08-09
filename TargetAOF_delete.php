<?php

include "dbcon.php";
$kode_penginputan= $_GET['kode_penginputan'];
$query = "SELECT * FROM input_targetaof WHERE kode_penginputan='".$kode_penginputan."'";
$sql = mysqli_query($con, $query);
$data = mysqli_fetch_array($sql);
$query2 = "DELETE FROM input_targetaof WHERE kode_penginputan='".$kode_penginputan."'";
$sql2 = mysqli_query($con, $query2);
if($sql2){
	?>
	  <script language="JavaScript">
				alert('Data Berhasil Di Hapus');
				document.location='TargetAOF.php';
	  </script>
	<?php
}else{
	?>
	  <script language="JavaScript">
				alert('Terjadi Kesalahan! Periksa Sambungan Internet Anda!');
				document.location='TargetAOF.php';
	  </script>
	<?php
}
?>