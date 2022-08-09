<?php
// Include / load file koneksi.php
include ('dbcon.php');
include('session.php'); 
$pdo = new PDO('mysql:host='.'localhost'.';dbname='.'dmballan_ballancescorecard','dmballan','SR@DM-bsc$123');
$result=mysqli_query($con, "select * from central_data where nik='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);
// Ambil data yang dikirim dari form
$kode_kegiatan = $_POST['kode_kegiatan'];
$kegiatan = $_POST['kegiatan'];
$lokasi_kegiatan = $_POST['lokasi_kegiatan'];
$keterangan_kegiatan = $_POST['keterangan_kegiatan'];
$foto = $_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name'];

$fotobaru = date('dmYHis').$foto;

$path = "imgaktivitasharian/".$fotobaru;

date_default_timezone_set('asia/jakarta');
$tanggal = date("y-m-d");
$jam     = date("H:i:s");
$status  = 'submit';
if(move_uploaded_file($tmp, $path)){ 
	$sql = $pdo->prepare("INSERT INTO aktivitasharian VALUES(:id_karyawan,:nama_karyawan,:jabatan,:penempatan,:kantor,:tanggal_kegiatan,:jam_kegiatan,:kode_kegiatan,:kegiatan,:lokasi_kegiatan,:foto_kegiatan,:keterangan_kegiatan,:status_kegiatan)");
	$sql->bindParam(':id_karyawan', $row['nik']);
	$sql->bindParam(':nama_karyawan', $row['nama_karyawan']);
	$sql->bindParam(':jabatan', $row['jabatan']);
	$sql->bindParam(':penempatan', $row['penempatan']);
	$sql->bindParam(':kantor', $row['kantor']);
	$sql->bindParam(':tanggal_kegiatan', $tanggal);
	$sql->bindParam(':jam_kegiatan', $jam);
	$sql->bindParam(':kode_kegiatan', $kode_kegiatan);
	$sql->bindParam(':kegiatan', $kegiatan);
	$sql->bindParam(':lokasi_kegiatan', $lokasi_kegiatan);
	$sql->bindParam(':foto_kegiatan', $fotobaru);
	$sql->bindParam(':keterangan_kegiatan', $keterangan_kegiatan);
	$sql->bindParam(':status_kegiatan', $status);
	$sql->execute(); // Eksekusi query insert
	
	// Load ulang view.php agar data yang baru bisa muncul di tabel pada view.php
	ob_start();
	include "AktivitasHarian_view.php";
	$html = ob_get_contents();
	ob_end_clean();
	
	// Buat variabel reponse yang nantinya akan diambil pada proses ajax ketika sukses
	$response = array(
		'status'=>'sukses', // Set status
		'pesan'=>'Data berhasil disimpan', // Set pesan
		'html'=>$html // Set html
	);
}else{ // Jika proses upload gagal
	$response = array(
		'status'=>'gagal', // Set status
		'pesan'=>'Gambar gagal untuk diupload', // Set pesan
	);
}

echo json_encode($response); // konversi variabel response menjadi JSON
?>