<?php
include('dbcon.php');
include('session.php');
//Ambil Data Terkirim
$kode_permintaan 	= $_POST['kode_permintaan'];
$nama_nasabah	  	= $_POST['nama_nasabah'];
$alamat_nasabah	  	= $_POST['alamat_nasabah'];
$no_tlp_nasabah	  	= $_POST['no_tlp_nasabah'];
$plafond	    	= $_POST['plafond'];
$bm_proses	    	= $_POST['bm_proses'];
//Ambil AO
$result=mysqli_query($con, "select * from central_data where nik='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);
$id_AO           = $row['nik'];
$nama_AO         = $row['nama_karyawan'];
$email_AO        = $row['email'];
$kantor_AO       = $row['kantor'];
$penempatan_AO   = $row['penempatan'];
//Ambil Data BM
$result_BM=mysqli_query($con,"SELECT * FROM central_data WHERE nama_karyawan='$bm_proses'")or die ('Error In Session');
$data_BM=mysqli_fetch_array($result_BM);
$id_BM      	= $data_BM['nik'];
$nama_BM		= $data_BM['nama_karyawan'];
$email_BM		= $data_BM['email'];
$kantor_BM	    = $data_BM['kantor'];
$penempatan_BM	= $data_BM['penempatan'];
//Ambil Data Kepala Analis
$result_kep_analis=mysqli_query($con,"SELECT * FROM central_data WHERE kode_jabatan='999' and kantor='$kantor_BM'")or die ('Error In Session');
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
if(($kode_permintaan && $nama_nasabah && $alamat_nasabah && $no_tlp_nasabah && $plafond && $bm_proses)){
	if ($plafond < 1000000){
		?><script language="JavaScript">
				alert('PENGAJUAN TERLALU KECIL!');
				document.location='AOarea_PADPK.php';
			</script><?php
	}
	else
	{
	$cek = mysqli_num_rows(mysqli_query($con,"SELECT * FROM permohonan_analisa_kredit WHERE kode_permintaan='$kode_permintaan'"));
    if ($cek > 0){
	    ?><script language="JavaScript">
				alert('DATA DUPLIKASI TERDETEKSI!');
				document.location='AOarea_PADPK.php';
			</script><?php
    }else{
	$insert = mysqli_query($con,"INSERT INTO permohonananalisa_kredit VALUES('$kode_permintaan','$id_BM','	$nama_BM','$email_BM','$kantor_BM','$penempatan_BM','$id_kep_analis','$nama_kep_analis','$email_kep_analis','$kantor_kep_analis','$penempatan_kep_analis','$zero','$zero','$zero','$zero','$zero','$nama_AO','$nama_nasabah','$alamat_nasabah','$no_tlp_nasabah','$plafond','$tanggal','$jam','$status')");
	
	if($insert){
	    $insert2 = mysqli_query($con,"INSERT INTO padpk_history_data VALUES('$kode_permintaan','$tanggal','$jam','$informasi','$nama_AO','-')");
	    $insertplafondawal = mysqli_query($con,"INSERT INTO padpk_plafond_awal VALUES('$kode_permintaan','$plafond')");
		 ?><script language="JavaScript">
				alert('Data Berhasil Disimpan!');
				document.location='AOarea_PADPK.php';
		  </script><?php
	}else{	
	    ?><script language="JavaScript">
				alert('Terjadi Kesalahan Koneksi / Data Inputan Kurang !');
				document.location='AOarea_PADPK.php';
		  </script><?php	
	     }
	   }
     }
}else{
	    ?><script language="JavaScript">
				alert('Terjadi Kesalahan Koneksi / Data Inputan Kurang !');
				document.location='AOarea_PADPK.php';
			</script><?php	
     }
?>

