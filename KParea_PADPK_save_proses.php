<?php
include('dbcon.php');
include('session.php');
function rupiah($angka){
	
	$hasil_rupiah = "Rp.   " . number_format($angka,2,',','.');
	return $hasil_rupiah;
 
}
//Ambil Data Terkirim
$kode_permintaan 		= $_GET['kode_permintaan'];
$nama_ao		  		= $_POST['nama_ao'];
$nama_nasabah	  		= $_POST['nama_nasabah'];
$alamat_nasabah	  		= $_POST['alamat_nasabah'];
$no_tlp_nasabah	  		= $_POST['no_tlp_nasabah'];
$plafond	    		= $_POST['plafond'];
$nama_analis_dikirim	= $_POST['nama_analis'];
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
//ambil data analis dari central data berdasarkan data terkirim
$query_analis=mysqli_query($con,"SELECT * FROM central_data WHERE nama_karyawan='$nama_analis_dikirim'") or die ('Error In Session');
$data_analis=mysqli_fetch_array($query_analis);
$id_analis 			= $data_analis['nik'];
$nama_analis		= $data_analis['nama_karyawan'];
$email_analis		= $data_analis['email'];
$kantor_analis		= $data_analis['kantor'];
$penempatan_analis	= $data_analis['penempatan'];

//time record & status
date_default_timezone_set('asia/jakarta');
$tanggal	 = date("y-m-d");
$jam    	 = date("H:i:s");
$status 	 = 'AKproses';
$zero    	 = '';
$informasi	 = 'Data Disetujui dan Dikirim Ke Analis Kredit';
$email_it = 'aryawandicky@gmail.com';

//notif email ke analis
$to_it			 = $email_it;
$to    			 = $email_analis;
$subject	 	 = $kode_permintaan;
$message  		 = '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body style="font-family:Verdana, Geneva, sans-serif;font-size:12px;">
<table width="100%" cellspacing="0" cellpadding="0" align="center" style="padding:20px;border:dashed 1px #333;"><tr><td>
Hai, Kami Informasikan Ada Data Baru Yang Dikirim Kepala Analis Untuk Kamu Survey. Berikut Informasinya :    <br><br>
		<div style="float:left; width:150px; margin-bottom:5px;">Kode Permintaan</div>
		<div style="float:left;"><strong>'.$kode_permintaan.'</strong></div>
		<div style="clear:both"></div>
		<div style="float:left; width:150px; margin-bottom:5px;">Nama A.O</div>
		<div style="float:left;"><strong>'.$nama_ao.'</strong></div>
		<div style="clear:both"></div>
		<div style="float:left; width:150px; margin-bottom:5px;">Nama Nasabah</div>
		<div style="float:left;"><strong>'.$nama_nasabah.'</strong></div>
		<div style="clear:both"></div>
		<div style="float:left; width:150px; margin-bottom:5px;">Alamat Nasabah</div>
		<div style="float:left;"><strong>'.$alamat_nasabah.'</strong></div>
		<div style="clear:both"></div>
		<div style="float:left; width:150px; margin-bottom:5px;">No Tlp</div>
		<div style="float:left;"><strong>'.$no_tlp_nasabah.'</strong></div>
		<div style="clear:both"></div>
		<div style="float:left; width:150px; margin-bottom:5px;">Plafond</div>
		<div style="float:left;"><strong>'.rupiah($plafond).'</strong></div>
		<div style="clear:both"></div>
<td><tr></table>
</body>
</html>';
if(($kode_permintaan && $nama_ao && $nama_nasabah && $alamat_nasabah && $no_tlp_nasabah && $plafond)){
	$query = "UPDATE permohonan_analisa_kredit SET id_analis='".$id_analis."', nama_analis='".$nama_analis."', email_analis='".$email_analis."', kantor_analis='".$kantor_analis."' , penempatan_analis='".$penempatan_analis."', status='".$status."' WHERE kode_permintaan='".$kode_permintaan."'";
	$sql = mysqli_query($con, $query);
	
	if($query){	
		$insert = mysqli_query($con,"INSERT INTO padpk_history_data VALUES('$kode_permintaan','$tanggal','$jam','$informasi','$nama_pemohon','-')");
		 ?>
			 <script language="JavaScript">
					alert('Data Berhasil Disimpan!');
					document.location='KParea_PADPK.php';
			 </script>
		<?php
		require_once('function_mailer.php');
			smtp_mail($to, $subject, $message, '', '', 0, 0, true);
			smtp_mail($to_it, $subject, $message, '', '', 0, 0, true);
    }else{
		?>
			<script language="JavaScript">
					alert('Terjadi Kesalahan Sambungan Periksa Koneksi Anda!');
					document.location='KParea_PADPK.php';
			</script>
		<?php
		 }
}else{ 
		?>
			<script language="JavaScript">
					alert('Terjadi Kesalahan Sambungan Periksa Koneksi Anda!');
					document.location='KParea_PADPK.php';
			</script>
		<?php
	 }
?>