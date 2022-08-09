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
$status  = 'submit';
// Cek apakah user ingin mengubah fotonya atau tidak
if(isset($_POST['ubah_foto'])){ // Jika user menceklis checkbox yang ada di form ubah, lakukan :
	// Ambil data foto yang dipilih dari form
	$foto = $_FILES['foto']['name'];
	$tmp = $_FILES['foto']['tmp_name'];
	
	// Rename nama fotonya dengan menambahkan tanggal dan jam upload
	$fotobaru = date('dmYHis').$foto;
	
	// Set path folder tempat menyimpan fotonya
	$path = "imgaktivitasharian/".$fotobaru;

	// Proses upload
	// Cek apakah gambar berhasil diupload atau tidak
	if(move_uploaded_file($tmp, $path)){ // Jika proses upload sukses
		// Query untuk menampilkan data siswa berdasarkan NIS yang dikirim
		$sqlcek = $pdo->prepare("SELECT * FROM aktivitasharian WHERE kode_kegiatan=:kode_kegiatan");
		$sqlcek->bindParam(':kode_kegiatan', $kode_kegiatan);
		$sqlcek->execute(); // Eksekusi / Jalankan query
		$data = $sqlcek->fetch(); // Ambil data dari hasil eksekusi $sqlcek
		
		// Cek apakah file foto sebelumnya ada di folder foto
		if(is_file("imgaktivitasharian/".$data['foto_kegiatan'])) // Jika foto ada
			unlink("imgaktivitasharian/".$data['foto_kegiatan']); // Hapus file foto sebelumnya yang ada di folder foto
		
		// Proses ubah ke Database
		$sql = $pdo->prepare("UPDATE aktivitas_harian SET kegiatan=:kegiatan,lokasi_kegiatan=:lokasi_kegiatan,foto_kegiatan=:foto_kegiatan,keterangan_kegiatan=:keterangan_kegiatan,status_kegiatan=:status_kegiatan WHERE kode_kegiatan=:kode_kegiatan");
		$sql->bindParam(':kode_kegiatan', $kode_kegiatan);
		$sql->bindParam(':kegiatan', $kegiatan);
		$sql->bindParam(':lokasi_kegiatan', $lokasi_kegiatan);
		$sql->bindParam(':foto_kegiatan', $fotobaru);
		$sql->bindParam(':keterangan_kegiatan', $keterangan_kegiatan);
		$sql->bindParam(':status_kegiatan', $status);
		$sql->execute(); // Eksekusi query insert
		
		// Load ulang view.php agar data diubah tadi bisa terubah di tabel pada view.php
		ob_start();
		include "AktivitasHarian_view.php";
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
	$sql = $pdo->prepare("UPDATE aktivitas_harian SET kegiatan=:kegiatan,lokasi_kegiatan=:lokasi_kegiatan,keterangan_kegiatan=:keterangan_kegiatan,status_kegiatan=:status_kegiatan WHERE kode_kegiatan=:kode_kegiatan");
		$sql->bindParam(':kode_kegiatan', $kode_kegiatan);
		$sql->bindParam(':kegiatan', $kegiatan);
		$sql->bindParam(':lokasi_kegiatan', $lokasi_kegiatan);
		$sql->bindParam(':keterangan_kegiatan', $keterangan_kegiatan);
		$sql->bindParam(':status_kegiatan', $status);
		$sql->execute();
	// Load ulang view.php agar data diubah tadi bisa terubah di tabel pada view.php
	ob_start();
	include "AktivitasHarian_view.php";
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
