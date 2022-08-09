<?php
// Include / load file koneksi.php
include ('dbcon.php');
include_once('session.php'); 
$pdo = new PDO('mysql:host='.'localhost'.';dbname='.'dmballan_ballancescorecard','dmballan','SR@DM-bsc$123');
$result=mysqli_query($con, "select * from central_data where nik='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);

date_default_timezone_set('asia/jakarta');

$kodesp = $_POST['kodesp'];
$tanggalmulai = date($_POST['tanggalmulai']);
$tanggalselesai = date($_POST['tanggalselesai']);
$lokasi_pelaksanaan = $_POST['lokasi_pelaksanaan'];
$ao_pelaksana1 = $_POST['ao_pelaksana1'];
$ao_pelaksana2 = $_POST['ao_pelaksana2'];
$ao_pelaksana3 = $_POST['ao_pelaksana3'];
$ao_pelaksana4 = $_POST['ao_pelaksana4'];
$ao_pelaksana5 = $_POST['ao_pelaksana5'];
$metode_pemasaran = $_POST['metode_pemasaran'];
$target_pemasaran = $_POST['target_pemasaran'];
$keterangan = $_POST['keterangan'];
$tanggal = date("y-m-d");
$jam     = date("h:i:sa");
$status  = 'submit';

	$sql = $pdo->prepare("INSERT INTO sales_plan_bm VALUES(:id_bm,:nama_karyawan,:jabatan,:penempatan,:kantor,:kodesp,:jamsp,:tanggalsp,:tanggalmulai,:tanggalselesai,:lokasi_pelaksanaan,:keterangan,:statussp,:ao_pelaksana1,:ao_pelaksana2,:ao_pelaksana3,:ao_pelaksana4,:ao_pelaksana5,:metode_pemasaran,:target_pemasaran)");
	$sql->bindParam(':id_bm', $row['nik']);
	$sql->bindParam(':nama_karyawan', $row['nama_karyawan']);
	$sql->bindParam(':jabatan', $row['jabatan']);
	$sql->bindParam(':penempatan', $row['penempatan']);
	$sql->bindParam(':kantor', $row['kantor']);
	$sql->bindParam(':kodesp', $kodesp);
	$sql->bindParam(':jamsp', $jam);
	$sql->bindParam(':tanggalsp', $tanggal);
	$sql->bindParam(':tanggalmulai', $tanggalmulai);
	$sql->bindParam(':tanggalselesai', $tanggalselesai);
	$sql->bindParam(':lokasi_pelaksanaan', $lokasi_pelaksanaan);
	$sql->bindParam(':keterangan', $keterangan);
	$sql->bindParam(':statussp', $status);
	$sql->bindParam(':ao_pelaksana1', $ao_pelaksana1);
	$sql->bindParam(':ao_pelaksana2', $ao_pelaksana2);
	$sql->bindParam(':ao_pelaksana3', $ao_pelaksana3);
	$sql->bindParam(':ao_pelaksana4', $ao_pelaksana4);
	$sql->bindParam(':ao_pelaksana5', $ao_pelaksana5);
	$sql->bindParam(':metode_pemasaran', $metode_pemasaran);
	$sql->bindParam(':target_pemasaran', $target_pemasaran);
	$sql->execute(); // Eksekusi query insert
	
	// Load ulang view.php agar data yang baru bisa muncul di tabel pada view.php
ob_start();
	include "salesplanBM_view.php";
	$html = ob_get_contents();
	ob_end_clean();
	
	// Buat variabel reponse yang nantinya akan diambil pada proses ajax ketika sukses
	$response = array(
		'status'=>'sukses', // Set status
		'pesan'=>'Data berhasil disimpan', // Set pesan
		'html'=>$html // Set html
	);

echo json_encode($response);
?>