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
$status  = 'submit';
// Cek apakah user ingin mengubah fotonya atau tidak
if(isset($_POST['ubah_foto'])){ // Jika user menceklis checkbox yang ada di form ubah, lakukan :
	// Ambil data foto yang dipilih dari form
	$foto = $_FILES['foto']['name'];
	$tmp = $_FILES['foto']['tmp_name'];
	
	// Rename nama fotonya dengan menambahkan tanggal dan jam upload
	$fotobaru = date('dmYHis').$foto;
	
	// Set path folder tempat menyimpan fotonya
	$path = "imglappenagihan/".$fotobaru;

	// Proses upload
	// Cek apakah gambar berhasil diupload atau tidak
	if(move_uploaded_file($tmp, $path)){ // Jika proses upload sukses
		// Query untuk menampilkan data siswa berdasarkan NIS yang dikirim
		$sqlcek = $pdo->prepare("SELECT * FROM laporan_penagihan WHERE kode_lappenagihan=:kode_lappenagihan");
		$sqlcek->bindParam(':kode_lappenagihan', $kode_lappenagihan);
		$sqlcek->execute(); // Eksekusi / Jalankan query
		$data = $sqlcek->fetch(); // Ambil data dari hasil eksekusi $sqlcek
		
		// Cek apakah file foto sebelumnya ada di folder foto
		if(is_file("imglappenagihan/".$data['foto_lappenagihan'])) // Jika foto ada
			unlink("imglappenagihan/".$data['foto']); // Hapus file foto sebelumnya yang ada di folder foto
		
		// Proses ubah ke Database
		$sql = $pdo->prepare("UPDATE laporan_penagihan SET klasifikasi_nasabah=:klasifikasi_nasabah,media_penagihan=:media_penagihan,nama_nasabah=:nama_nasabah,no_tlp_n=:no_tlp_n,alamat_nasabah=:alamat_nasabah,lokasi_lappenagihan=:lokasi_lappenagihan,foto_lappenagihan=:foto_lappenagihan,keterangan=:keterangan,status_lappenagihan=:status_lappenagihan WHERE kode_lappenagihan=:kode_lappenagihan");
		$sql->bindParam(':kode_lappenagihan', $kode_lappenagihan);
		$sql->bindParam(':klasifikasi_nasabah', $klasifikasi_nasabah);
		$sql->bindParam(':media_penagihan', $media_penagihan);
		$sql->bindParam(':nama_nasabah', $nama_nasabah);
		$sql->bindParam(':no_tlp_n', $no_tlp_n);
		$sql->bindParam(':alamat_nasabah', $alamat_nasabah);
		$sql->bindParam(':lokasi_lappenagihan', $lokasi_lappenagihan);
		$sql->bindParam(':foto_lappenagihan', $fotobaru);
		$sql->bindParam(':keterangan', $keterangan);
		$sql->bindParam(':status_lappenagihan', $status);
		$sql->execute(); // Eksekusi query insert
		
		// Load ulang view.php agar data diubah tadi bisa terubah di tabel pada view.php
		ob_start();
		include "viewlappenagihan.php";
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
	$sql = $pdo->prepare("UPDATE laporan_penagihan SET klasifikasi_nasabah=:klasifikasi_nasabah,media_penagihan=:media_penagihan,nama_nasabah=:nama_nasabah,no_tlp_n=:no_tlp_n,alamat_nasabah=:alamat_nasabah,lokasi_lappenagihan=:lokasi_lappenagihan,keterangan=:keterangan,status_lappenagihan=:status_lappenagihan WHERE kode_lappenagihan=:kode_lappenagihan");
		$sql->bindParam(':kode_lappenagihan', $kode_lappenagihan);
		$sql->bindParam(':klasifikasi_nasabah', $klasifikasi_nasabah);
		$sql->bindParam(':media_penagihan', $media_penagihan);
		$sql->bindParam(':nama_nasabah', $nama_nasabah);
		$sql->bindParam(':no_tlp_n', $no_tlp_n);
		$sql->bindParam(':alamat_nasabah', $alamat_nasabah);
		$sql->bindParam(':lokasi_lappenagihan', $lokasi_lappenagihan);
		$sql->bindParam(':keterangan', $keterangan);
		$sql->bindParam(':status_lappenagihan', $status);
		$sql->execute();
	// Load ulang view.php agar data diubah tadi bisa terubah di tabel pada view.php
	ob_start();
	include "viewlappenagihan.php";
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
