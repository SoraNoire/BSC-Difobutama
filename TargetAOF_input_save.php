<?php
include('dbcon.php');
include('session.php');
//ambil data yang dikirim penginput
$kode_penginputan	= $_POST['kode_penginputan'];
$tanggal_input		= $_POST['tanggal_input'];
$jam_input			= $_POST['jam_input'];
$nama_ao			= $_POST['nama_ao'];
$type_relasi		= $_POST['type_relasi'];
$tanggal_buka		= $_POST['tanggal_buka'];
$no_b_arb			= $_POST['no_b_arb'];
$no_rek_arb			= $_POST['no_rek_arb'];
$no_bilyet			= $_POST['no_bilyet'];
$nama_nasabah		= $_POST['nama_nasabah'];
$nominal			= $_POST['nominal'];
$suku_bunga			= $_POST['suku_bunga'];
$keterangan_tambahan= $_POST['keterangan_tambahan'];
$jangka_waktu		= $_POST['jangka_waktu'];
$keterangan			= $_POST['keterangan'];

//ambil data penginput dari central data
$result=mysqli_query($con, "select * from central_data where nik='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);
//data Pelaksana Penginput.
$id_penginput         = $row['nik'];
$nama_penginput       = $row['nama_karyawan'];
$kantor_penginput     = $row['kantor'];
$penempatan_penginput = $row['penempatan'];

//ambil data AO dari central data
$result_ao=mysqli_query($con,"SELECT * FROM central_data WHERE nama_karyawan='$nama_ao'")or die ('Error In Session');
$data_ao=mysqli_fetch_array($result_ao);
//data Inputan
$id_pemohon         = $data_ao['nik'];
$nama_pemohon		= $nama_ao;
$kantor_pemohon     = $data_ao['kantor'];
$penempatan_pemohon = $data_ao['penempatan'];
//time record & status
date_default_timezone_set('Asia/Jakarta');
$tanggal = date("y-m-d");
$jam     = date("H:i:s");
$status  = 'submit';

if($kode_penginputan && $tanggal_input && $jam_input && $nama_ao && $type_relasi && $tanggal_buka && $no_b_arb && $no_rek_arb && $no_bilyet && $nama_nasabah && $nominal && $suku_bunga && $keterangan_tambahan && $jangka_waktu && $keterangan){
	$cek = mysqli_num_rows(mysqli_query($con,"SELECT * FROM input_targetaof WHERE kode_penginputan='$kode_penginputan'"));
    if ($cek > 0){
	?>
	  <script language="JavaScript">
				alert('Data Ganda Terdeteksi, Periksa Kembali Inputan Anda!');
				document.location='TargetAOF.php';
	  </script>
	<?php
    }else{
	$insert = mysqli_query($con,"INSERT INTO input_targetaof VALUES('$kode_penginputan','$tanggal_input','$jam_input','$id_pemohon','$nama_pemohon','$kantor_pemohon','$penempatan_pemohon','$id_penginput','$nama_penginput','$kantor_penginput','$penempatan_penginput','$type_relasi','$tanggal_buka','$no_b_arb','$no_rek_arb','$no_bilyet','$nama_nasabah','$nominal','$suku_bunga','$jangka_waktu','$keterangan','$keterangan_tambahan')");
	if($insert){
	?>
	  <script language="JavaScript">
				alert('Data Berhasil Di Input!');
				document.location='TargetAOF.php';
	  </script>
	<?php
	}else{
	?>
	  <script language="JavaScript">
				alert('Terjadi Kesalahan! Periksa Sambungan Internet Anda!');
				document.location='TargetAOF.php';
	  </script>
	<?php
	     }
	}
}else{
	?>
	  <script language="JavaScript">
				alert('Terjadi Kesalahan! Periksa Sambungan Internet Anda!');
				document.location='TargetAOF.php';
	  </script>
	<?php
     }
?>