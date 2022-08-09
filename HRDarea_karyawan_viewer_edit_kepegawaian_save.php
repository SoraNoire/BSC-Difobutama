<?php
include('dbcon.php');
include('session.php');
//Data Diterima Dari Halaman Sebelumnya
$nik				= $_GET['nik'];
$JobDesk			= $_POST['JobDesk'];
$status_karyawan	= $_POST['status_karyawan'];
$tahun_masuk		= $_POST['tahun_masuk'];
$tgl_prob			= $_POST['tgl_prob'];
$tgl_prob_end		= $_POST['tgl_prob_end'];
$tgl_pkwt			= $_POST['tgl_pkwt'];
$tgl_pkwt_end		= $_POST['tgl_pkwt_end'];
$tgl_pkwt2			= $_POST['tgl_pkwt2'];
$tgl_pkwt2_end		= $_POST['tgl_pkwt_end'];
$tgl_karyawan_tetap	= $_POST['tgl_karyawan_tetap'];

if($nik && $JobDesk && $status_karyawan && $tahun_masuk && $tgl_prob && $tgl_prob_end)
{
	$query = "UPDATE central_data SET 
	JobDesk='".$JobDesk."', 
	status_karyawan='".$status_karyawan."',
	tahun_masuk='".$tahun_masuk."',
	tgl_prob='".$tgl_prob."' ,
	tgl_prob_end='".$tgl_prob_end."',
	tgl_pkwt='".$tgl_pkwt."',
	tgl_pkwt_end='".$tgl_pkwt_end."',
	tgl_pkwt2='".$tgl_pkwt2."',
	tgl_pkwt2_end='".$tgl_pkwt2_end."',
	tgl_karyawan_tetap='".$tgl_karyawan_tetap."' WHERE nik='".$nik."'";
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
