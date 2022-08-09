<?php
include('dbcon.php');
include('session.php');
//Ambil Data Terkirim
$kode 		  = $_POST['kode'];
$activity	  = $_POST['activity'];
//Ambil Data PE dari central data
$result=mysqli_query($con, "select * from central_data where nik='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);
$id_PE           = $row['nik'];
$nama_PE         = $row['nama_karyawan'];
$email_PE        = $row['email'];
$kantor_PE       = $row['kantor'];
$penempatan_PE   = $row['penempatan'];
$jabatan_PE   	 = $row['jabatan'];
//informasi waktu penginputan
date_default_timezone_set('asia/jakarta');
$tanggal = date("y-m-d");
$jam     = date("H:i:s");
$status  = 'submit';
if(($kode && $activity)){
	$cek = mysqli_num_rows(mysqli_query($con,"SELECT * FROM activity_pe WHERE kode='$kode'"));
    if ($cek > 0){
	    ?><script language="JavaScript">
				alert('DATA DUPLIKASI TERDETEKSI!');
				document.location='PEarea_Activity.php';
			</script><?php
    }else{
	$insert = mysqli_query($con,"INSERT INTO activity_pe VALUES('$kode','$id_PE','	$nama_PE','$jabatan_PE','$kantor_PE','$penempatan_PE','$activity','$status','$tanggal','$jam')");
	if($insert){
		 ?><script language="JavaScript">
				alert('Data Berhasil Disimpan!');
				document.location='PEarea_Activity.php';
		  </script><?php
	}else{	
	    ?><script language="JavaScript">
				alert('Terjadi Kesalahan Sambungan Periksa Koneksi Anda!');
				document.location='PEarea_Activity.php';
		  </script><?php	
	     }
	   }
     }else{
	    ?><script language="JavaScript">
				alert('Terjadi Kesalahan Sambungan Periksa Koneksi Anda!');
				document.location='PEarea_Activity.php';
			</script><?php	
     }
?>

