<?php
include('dbcon.php');
include('session.php');
//Data Diterima Dari Halaman Sebelumnya
$nik				= $_GET['nik'];
$fas_bpjs_ket		= $_POST['fas_bpjs_ket'];
$fas_bpjs_kes		= $_POST['fas_bpjs_kes'];
$fas_bpjs_pen		= $_POST['fas_bpjs_pen'];
$fas_dplk			= $_POST['fas_dplk'];

if($nik && $fas_bpjs_ket && $fas_bpjs_kes && $fas_bpjs_pen && $fas_dplk)
{
	$query = "UPDATE central_data SET 
	fas_bpjs_ket='".$fas_bpjs_ket."', 
	fas_bpjs_kes='".$fas_bpjs_kes."',
	fas_bpjs_pen='".$fas_bpjs_pen."',
	fas_dplk='".$fas_dplk."' WHERE nik='".$nik."'";
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
