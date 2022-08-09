<?php
include('dbcon.php');
include('session.php');
//Data Diterima Dari Halaman Sebelumnya
$nik		= $_GET['nik'];
$resign		= "RESIGN";
if($nik)
{
	$query = "UPDATE central_data SET 
	jabatan='".$resign."' WHERE nik='".$nik."'";
	$sql = mysqli_query($con, $query);
	?>
	<script language="JavaScript">
					alert('Data Berhasil Disimpan!');
					document.location='HRDarea_karyawan_viewer.php?nik=<?php echo $nik; ?>';
	</script>
<?php
}
	else

{	
		?>
			 <script language="JavaScript">
					alert('Kolom Kosong Terdeteksi! Pastikan Semua Kolom Telah Di Isi Sebelum Menyimpan Data!');
					document.location='HRDarea_karyawan_viewer_edit_kepegawaian.php?nik=<?php echo $nik; ?>';
			 </script>
		<?php
}
	 
	 
?>
