<?php
include('dbcon.php');
include('session.php');
//data slik berdasarkan Penginputan.
$nama_ao 			= $_POST['nama'];
$kode_slik		  	= $_POST['kode_slik'];
$id_nasabah	  		= $_POST['id_nasabah'];
$nama_nasabah	  	= $_POST['nama_nasabah'];
$status	  	        = "-";
//query dan array untuk Penginput.
$result=mysqli_query($con, "select * from central_data where nik='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);
//data Pelaksana Penginput.
$id_penginput         = $row['nik'];
$nama_penginput       = $row['nama_karyawan'];
$jabatan_penginput    = $row['jabatan'];
$kantor_penginput     = $row['kantor'];
$penempatan_penginput = $row['penempatan'];

//query dan array untuk Inputan Slik
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

if(($nama_ao && $kode_slik && $id_nasabah && $nama_nasabah)){
	$cek = mysqli_num_rows(mysqli_query($con,"SELECT * FROM data_slik WHERE id_nasabah='$id_nasabah'"));
    if ($cek > 0){
	include("slik_pesandouble.php");
    }else{
	$insert = mysqli_query($con,"INSERT INTO datalik VALUES('$id_pemohon','$nama_pemohon','$jabatan_pemohon','$kantor_pemohon','$penempatan_pemohon','$kode_slik','$id_nasabah','$nama_nasabah','$id_penginput','$nama_penginput','$jabatan_penginput','$kantor_penginput','$penempatan_penginput','$tanggal','$jam','$status')");
	if($insert){
	    include("slik_pesansukses.php");
	}else{
		header("slik_pesanfailed.php");	
	     }
	}
}else{
		header("location:rating360pesanfailed.php");
     }
?>

