<!doctype html>
<?php
include('dbcon.php');
include('session.php'); 

$result=mysqli_query($con, "select * from central_data where nik='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);
?>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>The Ballance Scorecard</title>
<link>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap-3.3.7.css" rel="stylesheet" type="text/css">
<link href="css/animate.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
</head>
<body>
<?php	
	//buat zona waktu dan waktu sekarang
	date_default_timezone_set('Asia/Jakarta');
	$tanggalsekarang = date("Y-m-d");
	$hariini = date('D');
	$jamini  = date('H:i');
		//konversi ke angka
		$angkahariini = strtotime($hariini);
		$angkajamini  = strtotime($jamini);
	//buat waktu notifikasi akan di kirimkan
	$harinotif = 'Fri';
	$jamnotif  = '15:00';
		//konversi ke angka
		$angkaharinotif = strtotime($harinotif);
		$angkajamnotif  = strtotime($jamnotif);
//link lokasi pengambilan laporan
$linkdifob = 'LaporanMingguanPTBPRDifobutama.dm-ballancescorecard.com';
$linkmarco = 'LaporanMingguanPTBPRMarcorindoPerdana.dm-ballancescorecard.com';
//buat email isian email
$to     			 = 'aryawandicky@gmail.com';
$to2     			 = 'soetopo.sumbodo@bprdifobutama.co.id';
$to3     			 = 'priyatno@bprmarcorindo.co.id';
$subject	 		 = 'Laporan Mingguan D.S.A.R '."$tanggalsekarang".'';
$messagedifob  		 = '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body style="font-family:Verdana, Geneva, sans-serif;font-size:12px;">
<table width="100%" cellspacing="0" cellpadding="0" align="center" style="padding:20px;border:dashed 1px #333;"><tr><td>
Sehubungan dengan pemantauan kegiatan harian A.O berikut kami kirimkan link untuk penarikan data mingguan, berikut rekaman laporan yang kami terima minggu ini :    <br><br>
		<div style="float:left; width:150px; margin-bottom:5px;">Click Link Berikut : </div>
		<div style="float:left;"><strong>'.$linkdifob.'</strong></div>
		<div style="clear:both"></div>
<td></tr></table>
</body>
</html>';
$messagemarco  	 	 = '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body style="font-family:Verdana, Geneva, sans-serif;font-size:12px;">
<table width="100%" cellspacing="0" cellpadding="0" align="center" style="padding:20px;border:dashed 1px #333;"><tr><td>
Sehubungan dengan pemantauan kegiatan harian A.O berikut kami kirimkan link untuk penarikan data mingguan, berikut rekaman laporan yang kami terima minggu ini :    <br><br>
		<div style="float:left; width:150px; margin-bottom:5px;">Click Link Berikut : </div>
		<div style="float:left;"><strong>'.$linkmarco.'</strong></div>
		<div style="clear:both"></div>
<td></tr></table>
</body>
</html>';
//buat logika untuk memanggil saat waktu notifikasi terpenuhi
if($harinotif=$hariini && $angkajamini<=$angkajamnotif)
{	
		require_once('function_mailer.php');
					smtp_mail($to, $subject, $messagedifob, '', '', 0, 0, true);
					smtp_mail($to2, $subject, $messagedifob, '', '', 0, 0, true);
					smtp_mail($to3, $subject, $messagemarco, '', '', 0, 0, true);
}
	else
{
}
	?>
</body>
</html>