<?php
include('dbcon.php');
include('session.php');
//Ambil Data Terkirim
$kode_permintaan 	= $_POST['kode_permintaan'];
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
$status  = 'DRAFT';
$zero    = '';
$informasi = 'Dibuat';
if(($kode_permintaan && $nama_ao && $nama_nasabah && $alamat_nasabah && $no_tlp_nasabah && $plafond)){
	$cek = mysqli_num_rows(mysqli_query($con,"SELECT * FROM permohonan_analisa_kredit WHERE kode_permintaan='$kode_permintaan'"));
    if ($cek > 0){
	    ?><script language="JavaScript">
				alert('DATA DUPLIKASI TERDETEKSI!');
				document.location='BMarea_PADPK.php';
			</script><?php
    }else{
	$insert = mysqli_query($con,"INSERT INTO permohonananalisa_kredit VALUES('$kode_permintaan','$id_pemohon','	$nama_pemohon','$email_pemohon','$kantor_pemohon','$penempatan_pemohon','$id_kep_analis','$nama_kep_analis','$email_kep_analis','$kantor_kep_analis','$penempatan_kep_analis','$zero','$zero','$zero','$zero','$zero','$nama_ao','$nama_nasabah','$alamat_nasabah','$no_tlp_nasabah','$plafond','$tanggal','$jam','$status')");
	
	if($insert){
	    $insert2 = mysqli_query($con,"INSERT INTO padpk_history_data VALUES('$kode_permintaan','$tanggal','$jam','$informasi','$nama_pemohon','-')");
		 ?><script language="JavaScript">
				alert('Data Berhasil Disimpan!');
				document.location='BMarea_PADPK.php';
		  </script><?php
	}else{	
	    ?><script language="JavaScript">
				alert('Terjadi Kesalahan Sambungan Periksa Koneksi Anda!');
				document.location='BMarea_PADPK.php';
		  </script><?php	
	     }
	}
}else{
	    ?><script language="JavaScript">
				alert('Terjadi Kesalahan Sambungan Periksa Koneksi Anda!');
				document.location='BMarea_PADPK.php';
			</script><?php	
     }
?>

