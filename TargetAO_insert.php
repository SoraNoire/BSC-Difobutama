<?php
include('dbcon.php');
include('session.php');
//data target berdasarkan Penginputan.
$nama_ao 			= $_POST['nama'];
$no_ppuda		  	= $_POST['no_ppuda'];
$nama_nasabah	  	= $_POST['nama_nasabah'];
$plafond		  	= $_POST['plafond'];
$alamat_nasabah		= $_POST['alamat_nasabah'];
$no_tlp_nasabah	  	= $_POST['no_tlp_nasabah'];
//query dan array untuk Penginput.
$result=mysqli_query($con, "select * from central_data where nik='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);
//data Pelaksana Penginput.
$id_penginput         = $row['nik'];
$nama_penginput       = $row['nama_karyawan'];
$jabatan_penginput    = $row['jabatan'];
$kantor_penginput     = $row['kantor'];
$penempatan_penginput = $row['penempatan'];

//query dan array untuk Inputan target
$result_ao=mysqli_query($con,"SELECT * FROM central_data WHERE nama_karyawan='$nama_ao'")or die ('Error In Session');
$data_ao=mysqli_fetch_array($result_ao);
//data Inputan
$id_pemohon         = $data_ao['nik'];
$nama_pemohon		= $nama_ao;
$jabatan_pemohon    = $data_ao['jabatan'];
$kantor_pemohon     = $data_ao['kantor'];
$penempatan_pemohon = $data_ao['penempatan'];
//time record & status
date_default_timezone_set('Asia/Jakarta');
$tanggal = date("y-m-d");
$jam     = date("H:i:s");
$status  = 'submit';

if(($nama_ao && $no_ppuda && $nama_nasabah && $plafond && $alamat_nasabah && $no_tlp_nasabah)){
	$cek = mysqli_num_rows(mysqli_query($con,"SELECT * FROM input_targetao WHERE no_ppuda='$no_ppuda'"));
    if ($cek > 0){
	include("TargetAO_pesandouble.php");
    }else{
	$insert = mysqli_query($con,"INSERT INTO input_targetao VALUES('$id_pemohon','$nama_pemohon','$jabatan_pemohon','$kantor_pemohon','$penempatan_pemohon','$no_ppuda','$nama_nasabah','$plafond','$alamat_nasabah','$no_tlp_nasabah','$id_penginput','$nama_penginput','$jabatan_penginput','$kantor_penginput','$penempatan_penginput','$tanggal','$jam','$status')");
	if($insert){
	    include("TargetAO_pesansukses.php");
	}else{
		include("TargetAO_pesanfailed.php");	
	     }
	}
}else{
		include("TargetAO_pesanfailed.php");
     }
?>

