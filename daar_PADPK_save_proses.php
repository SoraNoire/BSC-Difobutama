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
$keterangan				= $_POST['keterangan'];
$newplafond				= $_POST['newplafond'];
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
$tanggal	 = date("y-m-d");
$jam    	 = date("H:i:s");
$status 	 = 'acc';
$zero    	 = '';
$informasi	 = 'Data Telah Disetujui Analis';

//ambil email ao dari Central Data
$result_ao=mysqli_query($con,"SELECT * FROM central_data WHERE nama_karyawan='$nama_ao'");
$row_ao=mysqli_fetch_array($result_ao);
$email_ao = $row_ao['email'];
//ambil email dirut dari Central Data
$result_dir1=mysqli_query($con,"SELECT * FROM central_data WHERE kantor='$kantor_pemohon' AND jabatan='Direktur Utama'");
$row_dir1=mysqli_fetch_array($result_dir1);
$email_dir1 = $row_dir1['email'];
//ambil email dir dari Central Data
$result_dir2=mysqli_query($con,"SELECT * FROM central_data WHERE kantor='$kantor_pemohon' AND jabatan='Direktur'");
$row_dir2=mysqli_fetch_array($result_dir2);
$email_dir2 = $row_dir2['email'];
$result_dir22=mysqli_query($con,"SELECT * FROM central_data WHERE kantor='$kantor_pemohon' AND jabatan='Direktur2'");
$row_dir22=mysqli_fetch_array($result_dir22);
$email_dir22 = $row_dir22['email'];

$email_it = 'aryawandicky@gmail.com';
//notif email ke Dirut & Dir
$to_dir1     		 = $email_dir1;
$to_dir2			 = $email_dir2;
$to_dir22			 = $email_dir22;
$to_it				 = $email_it;
$to_kepanalis		 = $email_kep_analis;
$subject_dir	 	 = $kode_permintaan;
$message_dir  		 = '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body style="font-family:Verdana, Geneva, sans-serif;font-size:12px;">
<table width="100%" cellspacing="0" cellpadding="0" align="center" style="padding:20px;border:dashed 1px #333;"><tr><td>
Hai, Kami Informasikan Ada Data Baru Yang Telah Disetujui Analis. Berikut Informasinya :    <br><br>
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
		<div style="float:left; width:150px; margin-bottom:5px;">Plafond Di ACC</div>
		<div style="float:left;"><strong>'.rupiah($newplafond).'</strong></div>
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
Hai, Data Anda Sudah di Proses Bagian Analis. Berikut Informasinya :    <br><br>
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
		<div style="float:left; width:150px; margin-bottom:5px;">Keterangan</div>
		<div style="float:left;"><strong>'.$keterangan.'</strong></div>
		<div style="clear:both"></div>
<td><tr></table>
</body>
</html>';

if(($newplafond<1000000)){?>
			<script language="JavaScript">
					alert('Nilai ACC Minimal Rp. 1.000.000,-');
					document.location='daar_PADPK.php';
			</script>
		<?php }else{
	$query = "UPDATE permohonan_analisakredit SET status='".$status."', plafond='".$newplafond."' WHERE kode_permintaan='".$kode_permintaan."'";
	$sql = mysqli_query($con, $query);
	if($query){	
		$insert = mysqli_query($con,"INSERT INTO padpk_history_data VALUES('$kode_permintaan','$tanggal','$jam','$informasi','$nama_pemohon','$keterangan')");
		 ?>
			 <script language="JavaScript">
					alert('Data Berhasil Disetujui!');
					document.location='daar_PADPK.php';
			 </script>
		<?php
		require_once('function_mailer.php');
					smtp_mail($to_dir1, $subject_dir, $message_dir, '', '', 0, 0, true);
					smtp_mail($to_dir2, $subject_dir, $message_dir, '', '', 0, 0, true);
					smtp_mail($to_dir22, $subject_dir, $message_dir, '', '', 0, 0, true);
					smtp_mail($to_kepanalis, $subject_dir, $message_dir, '', '', 0, 0, true);
					smtp_mail($to_it, $subject_dir, $message_dir, '', '', 0, 0, true);
					smtp_mail($to_ao, $subject_ao, $message_ao, '', '', 0, 0, true);
    }else{
		?>
			<script language="JavaScript">
					alert('Terjadi Kesalahan Sambungan Periksa Koneksi Anda!');
					document.location='daar_PADPK.php';
			</script>
		<?php
		 }
}
?>
