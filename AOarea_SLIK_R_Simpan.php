<?php
include('dbcon.php');
include('session.php');
//data slik berdasarkan Penginputan.
$nama_nasabah 		= $_POST['nama_nasabah'];
$nik_ktp_nasabah	= $_POST['nik_ktp_nasabah'];
$no_tlp_nasabah	  	= $_POST['no_tlp_nasabah'];
$sumber			  	= $_POST['sumber'];
//query dan array untuk data AO
$result=mysqli_query($con, "select * from central_data where nik='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);

$id_ao		        = $row['nik'];
$nama_ao			= $row['nama_karyawan'];
$penempatan_ao		= $row['penempatan'];
$kantor_ao			= $row['kantor'];
//kosongkan lampiran
$attachment			="-";
//time record & status
date_default_timezone_set('asia/jakarta');
$tanggal = date("y-m-d");
$jam     = date("h:i:sa");
$status  = "request";

if(($nama_nasabah && $nik_ktp_nasabah && $no_tlp_nasabah && $sumber)){
	$cek = mysqli_num_rows(mysqli_query($con,"SELECT * FROM data_slik_ao_req WHERE nik_ktp_nasabah='$nik_ktp_nasabah'"));
    if ($cek > 0){
	   ?>
		<script language="JavaScript">
						alert('Data Duplikasi Terdeteksi! Hubungi Bagian IT Untuk Informasi Kelayakan Penginputan!!!');
						document.location='AOarea_SLIK_R.php';
		</script>
		<?php
    }else{
	$insert = mysqli_query($con,"INSERT INTO dataslik_ao_req VALUES('$id_ao','$nama_ao','$penempatan_ao','$kantor_ao','$nama_nasabah','$nik_ktp_nasabah','$no_tlp_nasabah','$tanggal','$jam','$status','$attachment','$sumber')");
	if($insert){
	   ?>
		<script language="JavaScript">
						alert('Permintaan Slik Berhasil Dibuat!');
						document.location='AOarea_SLIK_R.php';
		</script>
		<?php
	}else{
	   ?>
		<script language="JavaScript">
						alert('EROR! Chek Koneksi Internet ANDA!!!');
						document.location='AOarea_SLIK_R.php';
		</script>
		<?php
	     }
	}
}else{
		header("location:rating360pesanfailed.php");
     }
?>

