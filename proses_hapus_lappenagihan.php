<?php

include "dbcon.php";
$pdo = new PDO('mysql:host='.'localhost'.';dbname='.'dmballan_ballancescorecard','dmballan','SR@DM-bsc$123');
// Ambil data NIS
$kode_lappenagihan = $_POST['kode_lappenagihan'];

$sqlcek = $pdo->prepare("SELECT * FROM laporan_penagihan WHERE kode_lappenagihan=:kode_lappenagihan");
$sqlcek->bindParam(':kode_lappenagihan', $kode_lappenagihan);
$sqlcek->execute(); // Eksekusi / Jalankan query
$data = $sqlcek->fetch(); // Ambil data dari hasil eksekusi $sqlcek

// Cek apakah file fotonya ada di folder foto
if(is_file("imglappenagihan/".$data['foto_lappenagihan'])) // Jika foto ada
	unlink("imglappenagihan/".$data['foto_lappenagihan']); // Hapus file fotonya yang ada di folder foto

// Query untuk menghapus data siswa berdasarkan NIS yang dikirim
$sql = $pdo->prepare("DELETE FROM laporan_penagihan WHERE kode_lappenagihan=:kode_lappenagihan");
$sql->bindParam(':kode_lappenagihan', $kode_lappenagihan);
$sql->execute(); // Eksekusi/Jalankan query

// Load ulang view.php agar data diubah tadi bisa terubah di tabel pada view.php
ob_start();
include "viewlappenagihan.php";
$html = ob_get_contents();
ob_end_clean();

// Buat variabel reponse yang nantinya akan diambil pada proses ajax ketika sukses
$response = array(
	'pesan'=>'Data berhasil dihapus', // Set pesan
	'html'=>$html // Set html
);
echo json_encode($response); // konversi variabel response menjadi JSON
?>
