<?php
// Include / load file koneksi.php
include ('dbcon.php');
include('session.php'); 
$pdo = new PDO('mysql:host='.'localhost'.';dbname='.'dmballan_ballancescorecard','dmballan','SR@DM-bsc$123');
$result=mysqli_query($con, "select * from central_data where nik='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);
// Ambil data yang dikirim dari form
$kode_kegiatan = $_POST['kode_kegiatan'];
$uraian_kegiatan = $_POST['uraian_kegiatan'];
$jenis_kegiatan = $_POST['jenis_kegiatan'];
$nama_ao = $_POST['nama_ao'];
$nama_nasabah = $_POST['nama_nasabah'];
$alamat_nasabah = $_POST['alamat_nasabah'];
$no_tlp_nasabah = $_POST['no_tlp_nasabah'];
$lokasi = $_POST['lokasi'];
$keterangan = $_POST['keterangan'];
$foto = $_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name'];

$fotobaru = date('dmYHis').$foto;

$path = "imgdaar/".$fotobaru;

date_default_timezone_set('asia/jakarta');
$tanggal = date("y-m-d");
$jam     = date("h:i:sa");
$status  = 'submit';
if(move_uploaded_file($tmp, $path)){ 
	$sql = $pdo->prepare("INSERT INTO dar VALUES(:id,:nama,:jabatan,:penempatan,:kantor,:kode_kegiatan,:uraian_kegiatan,:jenis_kegiatan,:nama_ao,:nama_nasabah,:alamat_nasabah,:no_tlp_nasabah,:tanggal,:jam,:lokasi,:foto,:keterangan,:status)");
	$sql->bindParam(':id', $row['nik']);
	$sql->bindParam(':nama', $row['nama_karyawan']);
	$sql->bindParam(':jabatan', $row['jabatan']);
	$sql->bindParam(':penempatan', $row['penempatan']);
	$sql->bindParam(':kantor', $row['kantor']);
	$sql->bindParam(':kode_kegiatan', $kode_kegiatan);
	$sql->bindParam(':uraian_kegiatan', $uraian_kegiatan);
	$sql->bindParam(':jenis_kegiatan', $jenis_kegiatan);
	$sql->bindParam(':nama_ao', $nama_ao);
	$sql->bindParam(':nama_nasabah', $nama_nasabah);
	$sql->bindParam(':alamat_nasabah', $alamat_nasabah);
	$sql->bindParam(':no_tlp_nasabah', $no_tlp_nasabah);
	$sql->bindParam(':tanggal', $tanggal);
	$sql->bindParam(':jam', $jam);
	$sql->bindParam(':lokasi', $lokasi);
	$sql->bindParam(':foto', $fotobaru);
	$sql->bindParam(':keterangan', $keterangan);
	$sql->bindParam(':status', $status);
	$sql->execute(); // Eksekusi query insert
	
	// Load ulang view.php agar data yang baru bisa muncul di tabel pada view.php
	ob_start();
	include "daar_view.php";
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