<?php

include "dbcon.php";
$pdo = new PDO('mysql:host='.'localhost'.';dbname='.'dmballan_ballancescorecard','dmballan','SR@DM-bsc$123');
// Ambil data NIS
$kode_sp = $_POST['kode_sp'];

$sqlcek = $pdo->prepare("SELECT * FROM sales_plan WHERE kode_sp=:kode_sp");
$sqlcek->bindParam(':kode_sp', $kode_sp);
$sqlcek->execute(); // Eksekusi / Jalankan query
$data = $sqlcek->fetch(); // Ambil data dari hasil eksekusi $sqlcek

// Cek apakah file fotonya ada di folder foto
if(is_file("imgsalesplan/".$data['foto_sp'])) // Jika foto ada
	unlink("imgsalesplan/".$data['foto_sp']); // Hapus file fotonya yang ada di folder foto

// Query untuk menghapus data siswa berdasarkan NIS yang dikirim
$sql = $pdo->prepare("DELETE FROM sales_plan WHERE kode_sp=:kode_sp");
$sql->bindParam(':kode_sp', $kode_sp);
$sql->execute(); // Eksekusi/Jalankan query

// Load ulang view.php agar data diubah tadi bisa terubah di tabel pada view.php
ob_start();
include "viewsp.php";
$html = ob_get_contents();
ob_end_clean();

// Buat variabel reponse yang nantinya akan diambil pada proses ajax ketika sukses
$response = array(
	'pesan'=>'Data berhasil dihapus', // Set pesan
	'html'=>$html // Set html
);
echo json_encode($response); // konversi variabel response menjadi JSON
?>
