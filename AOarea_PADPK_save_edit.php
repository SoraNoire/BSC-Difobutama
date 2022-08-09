<?php
include('dbcon.php');
include('session.php');
//Ambil Data Terkirim
$kode_permintaan 	= $_GET['kode_permintaan'];
$nama_ao		  	= $_POST['nama_ao'];
$nama_nasabah	  	= $_POST['nama_nasabah'];
$alamat_nasabah	  	= $_POST['alamat_nasabah'];
$no_tlp_nasabah	  	= $_POST['no_tlp_nasabah'];
$plafond	    	= $_POST['plafond'];
//Ambil Data BM dari Central data
$result=mysqli_query($con, "select * from central_data where nik='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);
$id_pemohon           = $row['nik'];
$nama_pemohon         = $row['nama_karyawan'];
$email_pemohon        = $row['email'];
$kantor_pemohon       = $row['kantor'];
$penempatan_pemohon   = $row['penempatan'];
//Ambil Data Kepala Analis
$result_kep_analis=mysqli_query($con,"SELECT * FROM central_data WHERE kode_jabatan='999' and kantor='$kantor_pemohon'")or die ('Error In Session');
$data_kep_analis=mysqli_fetch_array($result_kep_analis);
$id_kep_analis      	= $data_kep_analis['nik'];
$nama_kep_analis		= $data_kep_analis['nama_karyawan'];
$email_kep_analis		= $data_kep_analis['email'];
$kantor_kep_analis	    = $data_kep_analis['kantor'];
$penempatan_kep_analis	= $data_kep_analis['penempatan'];
//time record & status
date_default_timezone_set('asia/jakarta');
$tanggal = date("y-m-d");
$jam     = date("H:i:s");
$status  = "DRAFT";
$zero    = '';
$informasi = 'Dilakukan Perubahan Data';
if(($kode_permintaan && $nama_ao && $nama_nasabah && $alamat_nasabah && $no_tlp_nasabah && $plafond)){
	$query = "UPDATE permohonan_analisa_kredit SET nama_ao='".$nama_ao."', nama_nasabah='".$nama_nasabah."', alamat_nasabah='".$alamat_nasabah."', no_tlp_nasabah='".$no_tlp_nasabah."' , plafond='".$plafond."', status='".$status."' WHERE kode_permintaan='".$kode_permintaan."'";
	$sql = mysqli_query($con, $query);
	
	if($query){	
		$insert = mysqli_query($con,"INSERT INTO padpk_historydata VALUES('$kode_permintaan','$tanggal','$jam','$informasi','$nama_pemohon','-')");
		 ?>
			 <script language="JavaScript">
					alert('Data Berhasil Disimpan!');
					document.location='AOarea_PADPK.php';
			 </script>
		<?php
    }else{
		?>
			<script language="JavaScript">
					alert('Terjadi Kesalahan Sambungan Periksa Koneksi Anda!');
					document.location='AOarea_PADPK.php';
			</script>
		<?php
		 }
}else{ 
		?>
			<script language="JavaScript">
					alert('Terjadi Kesalahan Sambungan Periksa Koneksi Anda!');
					document.location='AOarea_PADPK.php';
			</script>
		<?php
	 }
?>