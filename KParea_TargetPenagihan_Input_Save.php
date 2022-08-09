<?php
include('dbcon.php');
include('session.php');
//Ambil Data Terkirim
$pelaksana 		= $_POST['nama'];
$periode	  	= $_POST['periode'];
$nama_nasabah	= $_POST['nama_nasabah'];
$kolektibilitas	= $_POST['kolektibilitas'];
$pokok			= $_POST['pokok'];
$bunga			= $_POST['bunga'];
//Ambil Data Pelaksana dari central data
$result=mysqli_query($con, "select * from central_data where nama_karyawan='$pelaksana'");
$row=mysqli_fetch_array($result);
$jabatan_pelaksana    	= $row['jabatan'];
$nama_pelaksana  		= $pelaksana;
$kantor_pelaksana  		= $row['kantor'];
$penempatan_pelaksana	= $row['nama_karyawan'];

//informasi waktu penginputan
date_default_timezone_set('asia/jakarta');
$tanggal = date("y-m-d");
$jam     = date("H:i:s");
$a1    	 = date("y");
$a2    	 = date("m");
$a3   	 = date("d");
$a4   	 = date("H");
$a5    	 = date("i");
$a6   	 = date("s");
$kode_unik = $a3.$a4.$a5.$a6."-".$kantor_pelaksana;

if(($pelaksana && $periode && $nama_nasabah && $kolektibilitas && $pokok && $bunga)){
	$insert = mysqli_query($con,"INSERT INTO target_penagihan VALUES('$kode_unik','$nama_pelaksana','$jabatan_pelaksana','$kantor_pelaksana','$penempatan_pelaksana','$periode','$nama_nasabah','$kolektibilitas','$pokok','$bunga')");
	if($insert){
		 ?><script language="JavaScript">
				alert('Data Berhasil Disimpan!');
				document.location='KParea_TargetPenagihan.php';
		  </script><?php
	}else{	
	    ?><script language="JavaScript">
				alert('Terjadi Kesalahan Sambungan Periksa Koneksi Anda!');
				document.location='KParea_TargetPenagihan.php';
		  </script><?php	
	     }
	   }
     
?>

