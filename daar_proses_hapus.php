<?php

include "dbcon.php";
$pdo = new PDO('mysql:host='.'localhost'.';dbname='.'dmballan_ballancescorecard','dmballan','SR@DM-bsc$123');
// Ambil data NIS
$kode_kegiatan = $_POST['kode_kegiatan'];

$sqlcek = $pdo->prepare("SELECT * FROM daar WHERE kode_kegiatan=:kode_kegiatan");
$sqlcek->bindParam(':kode_kegiatan', $kode_kegiatan);
$sqlcek->execute(); // Eksekusi / Jalankan query
$data = $sqlcek->fetch(); // Ambil data dari hasil eksekusi $sqlcek

// Cek apakah file fotonya ada di folder foto
if(is_file("imgdaar/".$data['foto'])) // Jika foto ada
	unlink("imgdaar/".$data['foto']); // Hapus file fotonya yang ada di folder foto

// Query untuk menghapus data siswa berdasarkan NIS yang dikirim
$sql = $pdo->prepare("DELETE FROM daar WHERE kodekegiatan=:kode_kegiatan");
$sql->bindParam(':kode_kegiatan', $kode_kegiatan);
$sql->execute(); // Eksekusi/Jalankan query

// Load ulang view.php agar data diubah tadi bisa terubah di tabel pada view.php
ob_start();
include "daar_view.php";
$html = ob_get_contents();
ob_end_clean();

// Buat variabel reponse yang nantinya akan diambil pada proses ajax ketika sukses
$response = array(
	'pesan'=>'Data berhasil dihapus', // Set pesan
	'html'=>$html // Set html
);
echo json_encode($response); // konversi variabel response menjadi JSON
?>
