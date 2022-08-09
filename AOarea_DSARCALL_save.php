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
$kode_dsacr 		= $_POST['kode_dsacr'];
$nama_nasabah 		= $_POST['nama_nasabah'];
$no_tlp_nasabah 	= $_POST['no_tlp_nasabah'];
$hasil_komunikasi 	= $_POST['hasil_komunikasi'];
 
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
if($kode_dsacr && $nama_nasabah && $no_tlp_nasabah && $hasil_komunikasi){ 
  $query = "INSERT INTO ao_datacall VALUES('".$kode_dsacr."', '".$nama_nasabah."', '".$no_tlp_nasabah."', '".$hasil_komunikasi."', '".$id_user."', '".$nama_user."', '".$jabatan_user."', '".$kantor_user."', '".$penempatan_user."', '".$jam."', '".$tanggal."')";
  $sql = mysqli_query($con, $query); // Eksekusi/ Jalankan query dari variabel $query
  if($sql){ 
		?><script language="JavaScript">
				alert('Data Berhasil Disimpan');
				document.location='AOarea.php';
		  </script><?php 
  }else{
		?><script language="JavaScript">
				alert('Koneksi Anda Buruk, Perkecil Ukuran Gambar Anda');
				document.location='AOarea.php';
		  </script><?php
  }
}else{
		?><script language="JavaScript">
				alert('Terjadi Kesalahan Sambungan Periksa Koneksi Anda!');
				document.location='AOarea.php';
		  </script><?php
}
?>





