<?php
// file koneksi
include "dbcon.php";
//file session
include('session.php');
//ambil data user penginput dari session
$result=mysqli_query($con, "select * from central_data where nik='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);
$id_user 			= $row['nik'];
$nama_user 			= $row['nama_karyawan'];
$jabatan_user		= $row['jabatan'];
$penempatan_user	= $row['penempatan'];
$kantor_user		= $row['kantor'];

// Data Dari Form Input
$kode_dsar 		= $_POST['kode_dsar'];
$uraian_dsar 	= $_POST['uraian_dsar'];
$nama_nasabah 	= $_POST['nama_nasabah'];
$no_tlp_nasabah = $_POST['no_tlp_nasabah'];
$alamat_nasabah = $_POST['alamat_nasabah'];
$lokasi_dsar 	= $_POST['lokasi_dsar'];
$foto 			= $_FILES['foto_dsar']['name'];
$tmp 			= $_FILES['foto_dsar']['tmp_name'];
 
//data default 
date_default_timezone_set('asia/jakarta');
$tanggal = date("y-m-d");
$jam     = date("h:i:sa");
$status  = 'submit';
// Rename nfoto
$fotobaru = date('dmYHis').$foto;
// Set path folder tempat menyimpan fotonya
$path = "imgsalesplan/".$fotobaru;
// Proses upload
if(move_uploaded_file($tmp, $path)){ 
  $query = "INSERT INTO salesplan VALUES('".$id_user."', '".$nama_user."', '".$jabatan_user."', '".$penempatan_user."', '".$kantor_user."', '".$kode_dsar."', '".$jam."', '".$tanggal."', '".$lokasi_dsar."', '".$fotobaru."', '".$status."', '".$status."', '".$uraian_dsar."', '".$nama_nasabah."', '".$no_tlp_nasabah."', '".$alamat_nasabah."')";
  $sql = mysqli_query($con, $query); // Eksekusi/ Jalankan query dari variabel $query
  if($sql){ 
		?><script language="JavaScript">
				alert('Data Berhasil Disimpan');
				document.location='AOarea_DSAR.php';
		  </script><?php 
  }else{
		?><script language="JavaScript">
				alert('Koneksi Anda Buruk, Perkecil Ukuran Gambar Anda');
				document.location='AOarea_DSAR.php';
		  </script><?php
  }
}else{
		?><script language="JavaScript">
				alert('Terjadi Kesalahan Sambungan Periksa Koneksi Anda!');
				document.location='AOarea_DSAR.php';
		  </script><?php
}
?>





