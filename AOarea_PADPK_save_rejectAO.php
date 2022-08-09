<?php
include('dbcon.php');
include('session.php');
//Ambil Data Terkirim
$kode_pembatalan 	= $_POST['kode_pembatalan'];
$id_nasabah		  	= $_POST['id_nasabah'];
$nama_nasabah	  	= $_POST['nama_nasabah'];
$catatan_pembatalan	= $_POST['catatan_pembatalan'];
//Ambil AO
$result=mysqli_query($con, "select * from central_data where nik='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);
$id_AO           = $row['nik'];
$nama_AO         = $row['nama_karyawan'];
$jabatan_AO      = $row['jabatan'];
$email_AO        = $row['email'];
$kantor_AO       = $row['kantor'];
$penempatan_AO   = $row['penempatan'];
//Ambil Data BM
$result_BM=mysqli_query($con,"SELECT * FROM central_data WHERE kode_jabatan='888' and kantor='$kantor_AO'")or die ('Error In Session');
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
$status  = 'rejectAO';
$zero    = '';
$informasi = 'Dibuat';
if(($kode_pembatalan && $nama_nasabah && $catatan_pembatalan)){
	if ($catatan_pembatalan == ""){
		?><script language="JavaScript">
				alert('MASUKAN KETERANGAN!');
				document.location='AOarea_PADPK.php';
			</script><?php
	}
	else
	{
	$cek = mysqli_num_rows(mysqli_query($con,"SELECT * FROM data_slik_reject WHERE kode_pembatalan='$kode_pembatalan'"));
    if ($cek > 0){
	    ?><script language="JavaScript">
				alert('DATA DUPLIKASI TERDETEKSI!');
				document.location='AOarea_PADPK.php';
			</script><?php
    }else{
	$insert = mysqli_query($con,"UPDATE dataslik SET status='".$status."' WHERE id_nasabah='".$id_nasabah."'");
	
	if($insert){
	    $insert2 = mysqli_query($con,"INSERT INTO data_slik_reject VALUES('$kode_pembatalan','$id_nasabah','$nama_nasabah','$catatan_pembatalan','$nama_AO','$jabatan_AO','$kantor_AO','$penempatan_AO','$tanggal','$jam')");
		 ?><script language="JavaScript">
				alert('Data Berhasil Disimpan!');
				document.location='AOarea_PADPK.php';
		  </script><?php
	}else{	
	    ?><script language="JavaScript">
				alert('Terjadi Kesalahan Sambungan Periksa Koneksi Anda!');
				document.location='AOarea_PADPK.php';
		  </script><?php	
	     }
	   }
     }
}else{
	    ?><script language="JavaScript">
				alert('Terjadi Kesalahan Sambungan Periksa Koneksi Anda!');
				document.location='AOarea_PADPK.php';
			</script><?php	
     }
?>

