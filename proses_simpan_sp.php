<?php
// Include / load file koneksi.php
include ('dbcon.php');
include('session.php'); 
$pdo = new PDO('mysql:host='.'localhost'.';dbname='.'dmballan_ballancescorecard','dmballan','SR@DM-bsc$123');
$result=mysqli_query($con, "select * from central_data where nik='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);

$nihil   = 'kosong';
// Ambil data yang dikirim dari form
$kode_sp = $_POST['kode_sp'];
$uraian_aktivitas = $_POST['uraian_aktivitas'];
$nama_nasabah = $_POST['nama_nasabah'];
$no_tlp_nasabah = $_POST['no_tlp_nasabah'];
$alamat_nasabah = $_POST['alamat_nasabah'];
$lokasi_sp = $_POST['lokasi_sp'];
$keterangan = $_POST['keterangan'];
$foto = $_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name'];
$fotobaru = date('dmYHis').$foto;

$path = "imgsalesplan/".$fotobaru;

date_default_timezone_set('Asia/Jakarta');
$tanggal = date("y-m-d");
$jam     = date("H:i:s");
$status  = 'submit';
if(empty($uraian_aktivitas)||empty($nama_nasabah)||empty($no_tlp_nasabah)||empty($alamat_nasabah)||empty($lokasi_sp)||empty($keterangan)){
	$response = array(
		'status'=>'gagal', // Set status
		'pesan'=>'Kolom Kosong Terdeteksi,Chek Kembali Inputan Anda !!', // Set pesan
	);
}
elseif(strlen($no_tlp_nasabah) <= 8){
$response = array(
		'status'=>'gagal', // Set status
		'pesan'=>'Nomor telepon tidak terdaftar. Nomor Telepon Harus Disi Dengan Benar!!', // Set pesan
	);
}
elseif(move_uploaded_file($tmp, $path)){ 
	$sql = $pdo->prepare("INSERT INTO sales_plan VALUES(:id_ao,:nama_karyawan,:jabatan,:penempatan,:kantor,:kode_sp,:jam_sp,:tanggal_sp,:lokasi_sp,:foto_sp,:keterangan,:status_sp,:uraian_aktivitas,:nama_nasabah,:no_tlp_nasabah,:alamat_nasabah)");
	$sql->bindParam(':id_ao', $row['nik']);
	$sql->bindParam(':nama_karyawan', $row['nama_karyawan']);
	$sql->bindParam(':jabatan', $row['jabatan']);
	$sql->bindParam(':penempatan', $row['penempatan']);
	$sql->bindParam(':kantor', $row['kantor']);
	$sql->bindParam(':kode_sp', $kode_sp);
	$sql->bindParam(':jam_sp', $jam);
	$sql->bindParam(':tanggal_sp', $tanggal);
	$sql->bindParam(':lokasi_sp', $lokasi_sp);
	$sql->bindParam(':foto_sp', $fotobaru);
	$sql->bindParam(':keterangan', $keterangan);
	$sql->bindParam(':status_sp', $status);
	$sql->bindParam(':uraian_aktivitas', $uraian_aktivitas);
	$sql->bindParam(':nama_nasabah', $nama_nasabah);
	$sql->bindParam(':no_tlp_nasabah', $no_tlp_nasabah);
	$sql->bindParam(':alamat_nasabah', $alamat_nasabah);
	$sql->execute(); // Eksekusi query insert
	
	// Load ulang view.php agar data yang baru bisa muncul di tabel pada view.php
	ob_start();
	include "viewsp.php";
	$html = ob_get_contents();
	ob_end_clean();
	
	// Buat variabel reponse yang nantinya akan diambil pada proses ajax ketika sukses
	$response = array(
		'status'=>'sukses', // Set status
		'pesan'=>'Data berhasil disimpan', // Set pesan
		'html'=>$html // Set html
	);
}else{
	$sql = $pdo->prepare("INSERT INTO sales_plan VALUES(:id_ao,:nama_karyawan,:jabatan,:penempatan,:kantor,:kode_sp,:jam_sp,:tanggal_sp,:lokasi_sp,:foto_sp,:keterangan,:status_sp,:uraian_aktivitas,:nama_nasabah,:no_tlp_nasabah,:alamat_nasabah)");
	$sql->bindParam(':id_ao', $row['nik']);
	$sql->bindParam(':nama_karyawan', $row['nama_karyawan']);
	$sql->bindParam(':jabatan', $row['jabatan']);
	$sql->bindParam(':penempatan', $row['penempatan']);
	$sql->bindParam(':kantor', $row['kantor']);
	$sql->bindParam(':kode_sp', $kode_sp);
	$sql->bindParam(':jam_sp', $jam);
	$sql->bindParam(':tanggal_sp', $tanggal);
	$sql->bindParam(':lokasi_sp', $lokasi_sp);
	$sql->bindParam(':foto_sp', $nihil);
	$sql->bindParam(':keterangan', $keterangan);
	$sql->bindParam(':status_sp', $status);
	$sql->bindParam(':uraian_aktivitas', $uraian_aktivitas);
	$sql->bindParam(':nama_nasabah', $nama_nasabah);
	$sql->bindParam(':no_tlp_nasabah', $no_tlp_nasabah);
	$sql->bindParam(':alamat_nasabah', $alamat_nasabah);
	$sql->execute(); // Eksekusi query insert
	
	// Load ulang view.php agar data yang baru bisa muncul di tabel pada view.php
	ob_start();
	include "viewsp.php";
	$html = ob_get_contents();
	ob_end_clean();
	
	// Buat variabel reponse yang nantinya akan diambil pada proses ajax ketika sukses
	$response = array(
		'status'=>'sukses', // Set status
		'pesan'=>'Data berhasil disimpan', // Set pesan
		'html'=>$html // Set html
	);
}

echo json_encode($response); // konversi variabel response menjadi JSON
?>
