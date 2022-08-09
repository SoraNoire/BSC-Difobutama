<?php
include('dbcon.php');
include('session.php');
//Ambil Data Terkirim
$kode		  	  = $_GET['kode'];
$uraian_aktivitas = $_POST['uraian_aktivitas'];
//Ambil Data BM dari Central data
date_default_timezone_set('asia/jakarta');
$tanggal = date("y-m-d");
$jam     = date("H:i:s");
if(($kode && $uraian_aktivitas)){
	$query = "UPDATE activity_pe SET uraian_aktivitas='".$uraian_aktivitas."' WHERE kode='".$kode."'";
	$sql = mysqli_query($con, $query);

	if($query){	
		 ?>
			 <script language="JavaScript">
					alert('Data Berhasil Disimpan!');
					document.location='PEarea_Activity.php';
			 </script>
		<?php
    }else{
		?>
			<script language="JavaScript">
					alert('Terjadi Kesalahan Sambungan Periksa Koneksi Anda!');
					document.location='PEarea_Activity.php';
			</script>
		<?php
		 }
}else{ 
		?>
			<script language="JavaScript">
					alert('Terjadi Kesalahan Sambungan Periksa Koneksi Anda!');
					document.location='PEarea_Activity.php';
			</script>
		<?php
	 }
?>