<?php
// Include / load file koneksi.php
include ('dbcon.php');
include('session.php'); 
$pdo = new PDO('mysql:host='.'localhost'.';dbname='.'dmballan_ballancescorecard','dmballan','SR@DM-bsc$123');
$result=mysqli_query($con, "select * from central_data where nik='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);
// Ambil data yang dikirim dari form
$kode_sp = $_POST['kode_sp'];
$uraian_aktivitas = $_POST['uraian_aktivitas'];
$nama_nasabah = $_POST['nama_nasabah'];
$no_tlp_nasabah = $_POST['no_tlp_nasabah'];
$alamat_nasabah = $_POST['alamat_nasabah'];
$lokasi_sp = $_POST['lokasi_sp'];
$keterangan = $_POST['keterangan'];
$status  = 'submit';
// Cek apakah user ingin mengubah fotonya atau tidak
if(isset($_POST['ubah_foto'])){ // Jika user menceklis checkbox yang ada di form ubah, lakukan :
	// Ambil data foto yang dipilih dari form
	$foto = $_FILES['foto']['name'];
	$tmp = $_FILES['foto']['tmp_name'];
	
	// Rename nama fotonya dengan menambahkan tanggal dan jam upload
	$fotobaru = date('dmYHis').$foto;
	
	// Set path folder tempat menyimpan fotonya
	$path = "imgsalesplan/".$fotobaru;

	// Proses upload
	// Cek apakah gambar berhasil diupload atau tidak
	if(move_uploaded_file($tmp, $path)){ // Jika proses upload sukses
		// Query untuk menampilkan data siswa berdasarkan NIS yang dikirim
		$sqlcek = $pdo->prepare("SELECT * FROM sales_plan WHERE kode_sp=:kode_sp");
		$sqlcek->bindParam(':kode_sp', $kode_sp);
		$sqlcek->execute(); // Eksekusi / Jalankan query
		$data = $sqlcek->fetch(); // Ambil data dari hasil eksekusi $sqlcek
		
		// Cek apakah file foto sebelumnya ada di folder foto
		if(is_file("imgsalesplan/".$data['foto_sp'])) // Jika foto ada
			unlink("imgsalesplan/".$data['foto']); // Hapus file foto sebelumnya yang ada di folder foto
		
		// Proses ubah ke Database
		$sql = $pdo->prepare("UPDATE sales_plan SET uraian_aktivitas=:uraian_aktivitas,nama_nasabah=:nama_nasabah,no_tlp_nasabah=:no_tlp_nasabah,alamat_nasabah=:alamat_nasabah,lokasi_sp=:lokasi_sp,foto_sp=:foto_sp,keterangan=:keterangan,status_sp=:status_sp WHERE kode_sp=:kode_sp");
		$sql->bindParam(':kode_sp', $kode_sp);
		$sql->bindParam(':uraian_aktivitas', $uraian_aktivitas);
		$sql->bindParam(':nama_nasabah', $nama_nasabah);
		$sql->bindParam(':no_tlp_nasabah', $no_tlp_nasabah);
		$sql->bindParam(':alamat_nasabah', $alamat_nasabah);
		$sql->bindParam(':lokasi_sp', $lokasi_sp);
		$sql->bindParam(':foto_sp', $fotobaru);
		$sql->bindParam(':keterangan', $keterangan);
		$sql->bindParam(':status_sp', $status);
		$sql->execute(); // Eksekusi query insert
		
		// Load ulang view.php agar data diubah tadi bisa terubah di tabel pada view.php
		ob_start();
		include "viewsp.php";
		$html = ob_get_contents();
		ob_end_clean();
		
		// Buat variabel reponse yang nantinya akan diambil pada proses ajax ketika sukses
		$response = array(
			'status'=>'sukses', // Set status
			'pesan'=>'Data berhasil diubah', // Set pesan
			'html'=>$html // Set html
		);
	}else{ // Jika proses upload gagal
		$response = array(
			'status'=>'gagal', // Set status
			'pesan'=>'Gambar gagal untuk diupload', // Set pesan
		);
	}
}else{ // Jika user tidak menceklis checkbox yang ada di form, lakukan :
	// Proses ubah ke Database
	$sql = $pdo->prepare("UPDATE sales_plan SET uraian_aktivitas=:uraian_aktivitas,nama_nasabah=:nama_nasabah,no_tlp_nasabah=:no_tlp_nasabah,alamat_nasabah=:alamat_nasabah,lokasi_sp=:lokasi_sp,keterangan=:keterangan,status_sp=:status_sp WHERE kode_sp=:kode_sp");
		$sql->bindParam(':kode_sp', $kode_sp);
		$sql->bindParam(':uraian_aktivitas', $uraian_aktivitas);
		$sql->bindParam(':nama_nasabah', $nama_nasabah);
		$sql->bindParam(':no_tlp_nasabah', $no_tlp_nasabah);
		$sql->bindParam(':alamat_nasabah', $alamat_nasabah);
		$sql->bindParam(':lokasi_sp', $lokasi_sp);
		$sql->bindParam(':keterangan', $keterangan);
		$sql->bindParam(':status_sp', $status);
		$sql->execute();
	// Load ulang view.php agar data diubah tadi bisa terubah di tabel pada view.php
	ob_start();
	include "viewsp.php";
	$html = ob_get_contents();
	ob_end_clean();
	
	// Buat variabel reponse yang nantinya akan diambil pada proses ajax ketika sukses
	$response = array(
		'status'=>'sukses', // Set status
		'pesan'=>'Data berhasil diubah', // Set pesan
		'html'=>$html // Set html
	);
}

echo json_encode($response); // konversi variabel response menjadi JSON
?>
