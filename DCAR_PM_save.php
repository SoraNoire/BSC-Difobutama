<?php
function rupiah($angka){
	
	$hasil_rupiah = "Rp.   " . number_format($angka,2,',','.');
	return $hasil_rupiah;
 
}
function penyebut($nilai) {
		$nilai = abs($nilai);
		$huruf = array("", "SATU", "DUA", "TIGA", "EMPAT", "LIMA", "ENAM", "TUJUH", "DELAPAN", "SEMBILAN", "SEPULUH", "SEBELAS");
		$temp = "";
		if ($nilai < 12) {
			$temp = " ". $huruf[$nilai];
		} else if ($nilai <20) {
			$temp = penyebut($nilai - 10). " BELAS";
		} else if ($nilai < 100) {
			$temp = penyebut($nilai/10)." PULUH". penyebut($nilai % 10);
		} else if ($nilai < 200) {
			$temp = " SERATUS" . penyebut($nilai - 100);
		} else if ($nilai < 1000) {
			$temp = penyebut($nilai/100) . " RATUS" . penyebut($nilai % 100);
		} else if ($nilai < 2000) {
			$temp = " SERIBU" . penyebut($nilai - 1000);
		} else if ($nilai < 1000000) {
			$temp = penyebut($nilai/1000) . " RIBU" . penyebut($nilai % 1000);
		} else if ($nilai < 1000000000) {
			$temp = penyebut($nilai/1000000) . " JUTA" . penyebut($nilai % 1000000);
		} else if ($nilai < 1000000000000) {
			$temp = penyebut($nilai/1000000000) . " MILYAR" . penyebut(fmod($nilai,1000000000));
		} else if ($nilai < 1000000000000000) {
			$temp = penyebut($nilai/1000000000000) . " TRILYUN" . penyebut(fmod($nilai,1000000000000));
		}     
		return $temp;
	}
 
	function terbilang($nilai) {
		if($nilai<0) {
			$hasil = "MINUS ". trim(penyebut($nilai));
		} else {
			$hasil = trim(penyebut($nilai));
		}     		
		return $hasil;
	}
?>
<?php
include('dbcon.php');
include('session.php');
//Ambil Data Terkirim
$kode_bayar		 	= $_POST['kode_bayar'];
$nama_nasabah	  	= $_POST['nama_nasabah'];
$email_nasabah	  	= $_POST['email_nasabah'];
$jumlah_bayar	  	= $_POST['jumlah_bayar'];
$metode_bayar	  	= $_POST['metode_bayar'];
$keterangan	    	= $_POST['keterangan'];
//Ambil data penagih
$result=mysqli_query($con, "select * from central_data where nik='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);
$id_penagih     	= $row['nik'];
$nama_penagih   	= $row['nama_karyawan'];
$penempatan_penagih	= $row['penempatan'];
$kantor_penagih  	= $row['kantor'];
$email_penagih  	= $row['email'];
//Ambil Email Kasir
$querykasir=mysqli_query($con,"select email from central_data where jabatan='Teller' and penempatan='$penempatan_penagih' and kantor='$kantor_penagih'");
$rowkasir=mysqli_fetch_array($querykasir);
$email_kasir	= $rowkasir['email'];
//ambil Email Manager Operasional
$querymanop=mysqli_query($con,"select email from central_data where kantor='$kantor_penagih' and kode_jabatan='OM'");
$rowmanop=mysqli_fetch_array($querymanop);
$email_manager_operasional = $rowmanop['email'];
//ambil email kepala penagihan
$queryhc=mysqli_query($con,"select email from central_data where kantor='$kantor_penagih' and kode_jabatan='HC'");
$rowhc=mysqli_fetch_array($queryhc);
$email_head_collector	= $rowhc['email'];
//time record & status
date_default_timezone_set('asia/jakarta');
$tanggal = date("y-m-d");
$tanggal_invoice = date("d-m-Y");
$jam     = date("H:i:s");
$status  = 'Diterima Divisi Penagihan';
$zero    = '';
//siapkan lampiran email
$nominal_bayar = rupiah($jumlah_bayar);
$terbilang_bayar = terbilang($jumlah_bayar);
//siapkan email ke nasabah
$to_t		= $email_kasir;
$to_it		= 'aryawandicky@gmail.com';
$to_om		= $email_manager_operasional;
$to_c		= $email_penagih;
$to_hc		= $email_head_collector;
$to_n		= $email_nasabah;
$subject_n 	= $kode_bayar;
$message_n	= '
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>The Ballance Scorecard</title>
<link>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap-3.3.7.css" rel="stylesheet" type="text/css">

</head>
<body>
 
	<center>
	<table border="0" class="table table-responsive" style="border-bottom: double">	
	<tr>
		<td rowspan="2">
			
	    </td>
		<td rowspan="2" align="center">
			<H1>BUKTI<b> ANGSURAN KREDIT </b></H1>
	    </td>
		<td>
			No. : <b>'.$kode_bayar.'</b>
	    </td>
	</tr>
	<tr>
		<td>
			Tanggal : <b>'.$tanggal_invoice.'</b>
		</td>
	</tr>
	</table>
	
	<h4>TELAH DITERIMA DARI BPK/IBU <u><b>'.$nama_nasabah.'</b></u> UANG PEMBAYARAN ANGSURAN DENGAN RINCIAN SEBAGAI BERIKUT :</h4>
	<table class="table table-responsive" style="border-bottom: double">
		<tr>
			<td>NO BUKTI PEMBAYARAN</td>
			<td>:</td>
			<td>'.$kode_bayar.'</td>
		</tr>
		<tr>
			<td>PETUGAS</td>
			<td>:</td>
			<td>'.$nama_penagih.'</td>
		</tr>
		<tr>
			<td>TANGGAL TRANSAKSI</td>
			<td>:</td>
			<td>'.$tanggal_invoice.'||'.$jam.'</td>
		</tr>
		<tr>
			<td>NOMINAL TRANSAKSI</td>
			<td>:</td>
			<td>'.$nominal_bayar.'</td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td>TERBILANG : '.$terbilang_bayar.' RUPIAH</td>
		</tr>
		<tr>
			<td>METODE PEMBAYARAN</td>
			<td>:</td>
			<td>'.$metode_bayar.'</td>
		</tr>
		<tr>
			<td>KETERANGAN PEMBAYARAN</td>
			<td>:</td>
			<td>'.$keterangan.'</td>
		</tr>
	</table>
	</center>
	<CENTER>
	<h4>PT. BPR '.$kantor_penagih.'</h4> 
	<h4>MENYATAKAN RESI INI SEBAGAI BUKTI PEMBAYARAN YANG SAH. </h4>
	<h4>MOHON DISIMPAN</h4>
	<h3>TERIMAKASIH</h3>
 	</CENTER>
 
</body>
</html>
';
//eksekusi semua proses
if(($kode_bayar && $nama_nasabah && $email_nasabah && $jumlah_bayar && $metode_bayar && $keterangan)){
	$insert = mysqli_query($con,"INSERT INTO penagihanmobile VALUES('$kode_bayar','$id_penagih','	$nama_penagih','$penempatan_penagih','$kantor_penagih','$nama_nasabah','$email_nasabah','$jumlah_bayar','$metode_bayar','$keterangan','$tanggal','$jam','$zero','$zero','$zero','$status')");
	
	 if($insert){
	     ?>
		  <script language="JavaScript">
				alert('Data Berhasil Disimpan!');
				document.location='DCAR_PM.php';
		  </script><?php
		 require_once('function_mailer.php');
					smtp_mail($to_n, $subject_n, $message_n, '', '', 0, 0, true);
					smtp_mail($to_it, $subject_n, $message_n, '', '', 0, 0, true);
					smtp_mail($to_t, $subject_n, $message_n, '', '', 0, 0, true);
					smtp_mail($to_c, $subject_n, $message_n, '', '', 0, 0, true);
					smtp_mail($to_hc, $subject_n, $message_n, '', '', 0, 0, true);
					smtp_mail($to_om, $subject_n, $message_n, '', '', 0, 0, true);
		 
	}else{	
	    ?><script language="JavaScript">
				alert('Terjadi Kesalahan Sambungan Periksa Koneksi Anda!');
				document.location='DCAR_PM.php';
		  </script><?php	
	     }
}else{
	    ?><script language="JavaScript">
				alert('Terjadi Kesalahan Sambungan Periksa Koneksi Anda!');
				document.location='DCAR_PM.php';
			</script><?php	
     }
?>

