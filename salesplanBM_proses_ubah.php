<?php

include ('dbcon.php');
include_once('session.php'); $pdo = new PDO('mysql:host='.'localhost'.';dbname='.'dmballan_ballancescorecard','dmballan','SR@DM-bsc$123');
$result=mysqli_query($con, "select * from central_data where nik='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);

$kodesp = $_POST['kodesp'];
$tanggalmulai = $_POST['tanggalmulai'];
$tanggalselesai = $_POST['tanggalselesai'];
$lokasi_pelaksanaan = $_POST['lokasi_pelaksanaan'];
$ao_pelaksana1 = $_POST['ao_pelaksana1'];
$ao_pelaksana2 = $_POST['ao_pelaksana2'];
$ao_pelaksana3 = $_POST['ao_pelaksana3'];
$ao_pelaksana4 = $_POST['ao_pelaksana4'];
$ao_pelaksana5 = $_POST['ao_pelaksana5'];
$metode_pemasaran = $_POST['metode_pemasaran'];
$target_pemasaran = $_POST['target_pemasaran'];
$keterangan = $_POST['keterangan'];
$status  = 'submit';

$sqlcek = $pdo->prepare("SELECT * FROM sales_plan_bm WHERE kodesp=:kodesp");
$sqlcek->bindParam(':kodesp', $kodesp);
$sqlcek->execute(); 
$data = $sqlcek->fetch();
	
$sql = $pdo->prepare("UPDATE sales_plan_bm SET tanggalmulai=:tanggalmulai,tanggalselesai=:tanggalselesai,lokasi_pelaksanaan=:lokasi_pelaksanaan,ao_pelaksana1=:ao_pelaksana1,ao_pelaksana2=:ao_pelaksana2,ao_pelaksana3=:ao_pelaksana3,ao_pelaksana4=:ao_pelaksana4,ao_pelaksana5=:ao_pelaksana5,metode_pemasaran=:metode_pemasaran,target_pemasaran=:target_pemasaran,keterangan=:keterangan WHERE kodesp=:kodesp");
		$sql->bindParam(':kodesp', $kodesp);
		$sql->bindParam(':tanggalmulai', $tanggalmulai);
		$sql->bindParam(':tanggalselesai', $tanggalselesai);
		$sql->bindParam(':lokasi_pelaksanaan', $kode_sp);
		$sql->bindParam(':ao_pelaksana1', $ao_pelaksana1);
		$sql->bindParam(':ao_pelaksana2', $ao_pelaksana2);
		$sql->bindParam(':ao_pelaksana3', $ao_pelaksana3);
		$sql->bindParam(':ao_pelaksana4', $ao_pelaksana4);
		$sql->bindParam(':ao_pelaksana5', $ao_pelaksana5);
		$sql->bindParam(':metode_pemasaran', $metode_pemasaran);
		$sql->bindParam(':target_pemasaran', $target_pemasaran);
		$sql->bindParam(':keterangan', $keterangan);
		$sql->execute(); 
		
		ob_start();
		include "salesplanBM_view.php";
		$html = ob_get_contents();
		ob_end_clean();
		
		// Buat variabel reponse yang nantinya akan diambil pada proses ajax ketika sukses
		$response = array(
			'status'=>'sukses', // Set status
			'pesan'=>'Data berhasil diubah', // Set pesan
			'html'=>$html // Set html
		);

		echo json_encode($response); // konversi variabel response menjadi JSON
?>
