<?php
include('dbcon.php');
include('session.php');
//Data Diterima Dari Halaman Sebelumnya
$nik		= $_GET['nik'];
$no_ktp		= $_POST['no_ktp'];
$no_npwp	= $_POST['no_npwp'];
$no_rek		= $_POST['no_rek'];
$bank		= $_POST['bank'];

if($nik && $no_ktp && $no_npwp && $no_rek && $bank)
{
	$query = "UPDATE central_data SET 
	no_ktp='".$no_ktp."', 
	no_npwp='".$no_npwp."',
	no_rek='".$no_rek."',
	bank='".$bank."' WHERE nik='".$nik."'";
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
