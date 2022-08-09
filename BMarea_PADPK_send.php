<?php

include "dbcon.php";
include_once('session.php'); 

$result=mysqli_query($con, "select * from central_data where nik='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);

$kode_permintaan= $_GET['kode_permintaan'];
$query = "SELECT * FROM permohonan_analisa_kredit WHERE kode_permintaan='".$kode_permintaan."'";
$sql = mysqli_query($con, $query);
$user = $row['nama_karyawan'];
//default data
date_default_timezone_set('asia/jakarta');
$tanggal = date("y-m-d");
$jam     = date("H:i:s");
$status  = 'KAKproses';
$zero    = '';
$informasi = 'Data Dikirim Ke Kepala Analis';
//ambil data & penerima untuk email notifikasi
$result_dp=mysqli_query($con,"SELECT * FROM permohonan_analisa_kredit WHERE kode_permintaan='$kode_permintaan'");
$row_dp=mysqli_fetch_array($result_dp);
$email_Kep_Analis 	= $row_dp['email_kep_analis'];
$nama_ao 			= $row_dp['nama_ao'];
$nama_nasabah 		= $row_dp['nama_nasabah'];
$alamat_nasabah		= $row_dp['alamat_nasabah'];
$no_tlp_nasabah 	= $row_dp['no_tlp_nasabah'];
$plafond		 	= $row_dp['plafond'];
//ambil data dari Central Data
$result_ao=mysqli_query($con,"SELECT * FROM central_data WHERE nama_karyawan='$nama_ao'");
$row_ao=mysqli_fetch_array($result_ao);
$email_ao = $row_ao['email'];

$email_it = 'aryawandicky@gmail.com';
//notif email ke kepala analis
$to       = $email_Kep_Analis;
$to_it	  = $email_it;
$subject  = $kode_permintaan;
$message  = '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body style="font-family:Verdana, Geneva, sans-serif;font-size:12px;">
<table width="100%" cellspacing="0" cellpadding="0" align="center" style="padding:20px;border:dashed 1px #333;"><tr><td>
Hai, Ada Data Baru Yang Kami Terima. Berikut Informasinya :    <br><br>
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
		<div style="float:left;"><strong>'.$plafond.'</strong></div>
		<div style="clear:both"></div>
<td><tr></table>
</body>
</html>';
//notif email ke AO
$to_ao     		 = $email_ao;
$subject_ao 	 = $kode_permintaan;
$message_ao  	 = '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body style="font-family:Verdana, Geneva, sans-serif;font-size:12px;">
<table width="100%" cellspacing="0" cellpadding="0" align="center" style="padding:20px;border:dashed 1px #333;"><tr><td>
Hai, Data Anda Sudah di teruskan Ke Kepala Analis. Berikut Informasinya :    <br><br>
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
		<div style="float:left;"><strong>'.$plafond.'</strong></div>
		<div style="clear:both"></div>
<td><tr></table>
</body>
</html>';

if($query){
		$send = "UPDATE permohonan_analisa_kredit SET status='".$status."' WHERE kode_permintaan='".$kode_permintaan."'";
		$sql2 = mysqli_query($con, $send);
			if($send){
				$insert = mysqli_query($con,"INSERT INTO padpk_history_data VALUES('$kode_permintaan','$tanggal','$jam','$informasi','$user','-')");
				?>	<script language="JavaScript">
						alert('Data Berhasil Dikirim Ke Kepala Analis!');
						document.location='BMarea_PADPK.php';
					</script>
				<?php
				require_once('function_mailer.php');
					smtp_mail($to, $subject, $message, '', '', 0, 0, true);
					smtp_mail($to_it, $subject, $message, '', '', 0, 0, true);
					smtp_mail($to_ao, $subject_ao, $message_ao, '', '', 0, 0, true);
			}else{
				?>	<script language="JavaScript">
						alert('Terjadi Kesalahan! Periksa Koneksi Internet Anda!');
						document.location='BMarea_PADPK.php';
					</script>
				<?php
				
			}
}else{
				?>	<script language="JavaScript">
						alert('Terjadi Kesalahan! Periksa Koneksi Internet Anda!');
						document.location='BMarea_PADPK.php';
					</script>
				<?php
}
?>