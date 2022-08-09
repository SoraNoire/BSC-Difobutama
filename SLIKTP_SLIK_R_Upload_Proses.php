<?php

//memasukkan file config.php
include("config.php");
include("session.php");

$nik_ktp_nasabah 	= $_POST['nik_ktp_nasabah'];

$nik_adms = $_SESSION['nik'];

$resultadms=mysqli_query($conn, "select * from central_data where nik='$nik_adms'")or die('Error In Session');
$rowadms=mysqli_fetch_array($resultadms);
$nama_adms		= $rowadms['nama_karyawan'];
$kantor_adms		= $rowadms['kantor'];
$penempatan_adms	= $rowadms['penempatan'];
$jabatan_adms		= $rowadms['jabatan'];
	
//lain lain	
date_default_timezone_set('asia/jakarta');
$tanggal = date("y-m-d");
$jam     = date("h:i:sa");
$status="Clear";
$jb ="Account Officer";
$passit	="-";

$result=mysqli_query($conn, "select * from data_slik_ao_req where nik_ktp_nasabah='$nik_ktp_nasabah'");
$row=mysqli_fetch_array($result);
$nik_ao		 	= $row['nik_ao'];
$nama_ao	 	= $row['nama_ao'];
$penempatan 	= $row['penempatan'];
$kantor 		= $row['kantor'];
$nama_nasabah 	= $row['nama_nasabah'];
$no_tlp_nasabah = $row['no_tlp_nasabah'];

if ($kantor = "Difobutama" || $penempatan = "Pusat" ){
	$emailkantor = 'zulfikri@bprdifobutama.co.id';
	}
		elseif ($kantor = "Difobutama" || $penempatan = "Cabang" ) {
			$emailkantor = 'bambang.jabbar@bprdifobutama.co.id';
		}
		elseif ($kantor = "Marcorindo" || $penempatan = "Pusat" ){
			$emailkantor = 'syamsurizal@bprmarcorindo.co.id';
		}
else {
	$emailkantor = 'damunbudianto84@gmail.com';
}
//notif email ke Admin
$to2	  = $emailkantor;
$subject  = 'Permintaan Keputusan Slik';
$message  = '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body style="font-family:Verdana, Geneva, sans-serif;font-size:12px;">
<table width="100%" cellspacing="0" cellpadding="0" align="center" style="padding:20px;border:dashed 1px #333;"><tr><td>
Hai, Ada Data Baru Untuk Permintaan Keputusan SLIK. Berikut Informasinya :    <br><br>
		<div style="float:left; width:150px; margin-bottom:5px;">ID</div>
		<div style="float:left;"><strong>'.$nik_ktp_nasabah.'</strong></div>
		<div style="clear:both"></div>
<td><tr></table>
</body>
</html>';
//mendefinisikan folder upload
define("UPLOAD_DIR", "fileslik/");

if (!empty($_FILES["media"])) {
	$media	= $_FILES["media"];
	$ext	= pathinfo($_FILES["media"]["name"], PATHINFO_EXTENSION);
	$size	= $_FILES["media"]["size"];
	$tgl	= date("Y-m-d");

	if ($media["error"] !== UPLOAD_ERR_OK) {
		echo '<div class="alert alert-warning">Gagal upload file.</div>';
		exit;
	}

	// filename yang aman
	$name = preg_replace("/[^A-Z0-9._-]/i", "_", $media["name"]);

	// mencegah overwrite filename
	$i = 0;
	$parts = pathinfo($name);
	while (file_exists(UPLOAD_DIR . $name)) {
		$i++;
		$name = $parts["filename"] . "-" . $i . "." . $parts["extension"];
	}

	$success = move_uploaded_file($media["tmp_name"], UPLOAD_DIR . $name);
	if ($success) { 
		$up = $conn->query("INSERT INTO data_slik_adm_in VALUES('$nik_adms','$nama_adms','$penempatan_adms','$kantor_adms','$nama_nasabah','$nik_ktp_nasabah','$no_tlp_nasabah','$tanggal','$jam','$name')"); 
		$un = $conn->query("INSERT INTO data_slik VALUES('$nik_ao','$nama_ao','$jb','$kantor_adms','$penempatan_adms','$passit','$nik_ktp_nasabah','$nama_nasabah','$nik_adms','$nama_adms','$jabatan_adms','$kantor_adms','$penempatan_adms','$tanggal','$jam','$passit')");
		$in = $conn->query( "UPDATE data_slik_ao_req SET status='".$status."' WHERE nik_ktp_nasabah='".$nik_ktp_nasabah."'");
		$q = $conn->query("SELECT attachment FROM data_slik_adm_in ORDER BY tanggal_up, jam_up ASC limit 1");
		$rq = $q->fetch_assoc();
		require_once('function_mailer.php');
					smtp_mail($to2, $subject, $message, '', '', 0, 0, true);
		echo $rq['attachment'];
		?>
		<script language="JavaScript">
						alert('Permintaan Slik Berhasil Dikirim!');
						document.location='SLIKTP_SLIK_R.php';
		</script>
		<?php
		exit;
		
	}
	chmod(UPLOAD_DIR . $name, 0644);
}
?>