<?php
//memasukkan file config.php
include("config.php");
$nik_ktp_nasabah 	= $_POST['nik_ktp_nasabah'];
$status="requested";

$result=mysqli_query($con, "select * from data_slik_ao_req where nik_ktp_nasabah='$nik_ktp_nasabah'");
$row=mysqli_fetch_array($result);
$kantor = $row['kantor'];
$penempatan = $row['penempatan'];

if ($kantor == "Difobutama" && $penempatan == "Pusat" ){
	$emailkantor = 'depok@bprdifobutama.co.id';
	}
		elseif ($kantor == "Difobutama" && $penempatan == "Cabang" ) {
			$emailkantor = 'tajur@bprdifobutama.co.id';
		}
		elseif ($kantor == "Marcorindo" && $penempatan == "Pusat" ){
			$emailkantor = 'ciputat@bprmarcorindo.co.id';
		}
        else {
	    $emailkantor = 'ciledug@bprmarcorindo.co.id';
}
//notif email ke Admin
$to2	  = $emailkantor;
$subject  = 'Permintaan Slik';
$message  = '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body style="font-family:Verdana, Geneva, sans-serif;font-size:12px;">
<table width="100%" cellspacing="0" cellpadding="0" align="center" style="padding:20px;border:dashed 1px #333;"><tr><td>
Hai, Ada Data Baru Untuk Pengecekan SLIK. Berikut Informasinya :    <br><br>
		<div style="float:left; width:150px; margin-bottom:5px;">ID</div>
		<div style="float:left;"><strong>'.$nik_ktp_nasabah.'</strong></div>
		<div style="clear:both"></div>
<td><tr></table>
</body>
</html>';
//mendefinisikan folder upload
define("UPLOAD_DIR", "files/");

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
		$in = $conn->query( "UPDATE data_slik_aoreq SET attachment='".$name."',status='".$status."' WHERE nik_ktp_nasabah='".$nik_ktp_nasabah."'");
		$q = $conn->query("SELECT attachment FROM data_slik_ao_req ORDER BY tanggal_req, jam_req ASC limit 1");
		$rq = $q->fetch_assoc();
		require_once('function_mailer.php');
					smtp_mail($to2, $subject, $message, '', '', 0, 0, true);
		echo $rq['attachment'];
		?>
		<script language="JavaScript">
						alert('Permintaan Slik Berhasil Dikirim!');
						document.location='AOarea_SLIK_R.php';
		</script>
		<?php
		exit;
		
	}
	chmod(UPLOAD_DIR . $name, 0644);
}
?>