<?php
// Include / load file koneksi.php
include ('dbcon.php');
include('session.php'); 
$pdo = new PDO('mysql:host='.'localhost'.';dbname='.'dmballan_ballancescorecard','dmballan','SR@DM-bsc$123');
$result=mysqli_query($con, "select * from central_data where nik='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);
// Ambil data yang dikirim dari form
$kode_lappenagihan = $_POST['kode_lappenagihan'];
$klasifikasi_nasabah = $_POST['klasifikasi_nasabah'];
$media_penagihan = $_POST['media_penagihan'];
$nama_nasabah = $_POST['nama_nasabah'];
$no_tlp_n = $_POST['no_tlp_n'];
$alamat_nasabah = $_POST['alamat_nasabah'];
$lokasi_lappenagihan = $_POST['lokasi_lappenagihan'];
$keterangan = $_POST['keterangan'];
$foto = $_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name'];

$fotobaru = date('dmYHis').$foto;

$path = "imglappenagihan/".$fotobaru;

date_default_timezone_set('asia/jakarta');
$tanggal = date("y-m-d");
$jam     = date("H:i:s");
$status  = 'submit';
if(move_uploaded_file($tmp, $path)){ 
	$sql = $pdo->prepare("INSERT INTO laporan_penagihan VALUES(:id_kolektor,:nama_kolektor,:jabatan,:penempatan,:kantor,:kode_lappenagihan,:klasifikasi_nasabah,:tanggal_penagihan,:jam_penagihan,:media_penagihan,:nama_nasabah,:no_tlp_n,:alamat_nasabah,:lokasi_lappenagihan,:foto_lappenagihan,:keterangan,:status_lappenagihan)");
	$sql->bindParam(':id_kolektor', $row['nik']);
	$sql->bindParam(':nama_kolektor', $row['nama_karyawan']);
	$sql->bindParam(':jabatan', $row['jabatan']);
	$sql->bindParam(':penempatan', $row['penempatan']);
	$sql->bindParam(':kantor', $row['kantor']);
	$sql->bindParam(':kode_lappenagihan', $kode_lappenagihan);
	$sql->bindParam(':klasifikasi_nasabah', $klasifikasi_nasabah);
	$sql->bindParam(':tanggal_penagihan', $tanggal);
	$sql->bindParam(':jam_penagihan', $jam);
	$sql->bindParam(':media_penagihan', $media_penagihan);
	$sql->bindParam(':nama_nasabah', $nama_nasabah);
	$sql->bindParam(':no_tlp_n', $no_tlp_n);
	$sql->bindParam(':alamat_nasabah', $alamat_nasabah);
	$sql->bindParam(':lokasi_lappenagihan', $lokasi_lappenagihan);
	$sql->bindParam(':foto_lappenagihan', $fotobaru);
	$sql->bindParam(':keterangan', $keterangan);
	$sql->bindParam(':status_lappenagihan', $status);
	$sql->execute(); // Eksekusi query insert
	
	// Load ulang view.php agar data yang baru bisa muncul di tabel pada view.php
	ob_start();
	include "viewlappenagihan.php";
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
