<!doctype html>
<html>
<head>
</head>
<body>
  <h1>Ubah Data Kegiatan</h1>
  
  <?php
  // Load file koneksi.php
  include "dbcon.php";
  include "session.php";
	  
  // Ambil data NIS yang dikirim oleh index.php melalui URL
  $id_nasabah = $_GET['id_nasabah'];
  
  // Query untuk menampilkan data siswa berdasarkan NIS yang dikirim
  $query = "SELECT * FROM data_slik WHERE id_nasabah='".$id_nasabah."'";
  $sql = mysqli_query($con, $query);  // Eksekusi/Jalankan query dari variabel $query
  $data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql
  ?>
  
  <form method="post" action="slik_saveupdate.php?id_nasabah=<?php echo $id_nasabah; ?>" enctype="multipart/form-data">
  <table cellpadding="8">
  <tr>
    <td>Nama AO</td>
    <td><textarea type="text" name="nama_pemohon"><?php echo $data['nama_pemohon']; ?></textarea></td>
  </tr>
  <tr>
    <td>Kode Slik</td>
    <td><textarea name="kode_slik"><?php echo $data['kode_slik']; ?></textarea></td>
  </tr>
 <tr>
    <td>ID NASABAH</td>
    <td><textarea name="id_nasabah"><?php echo $data['id_nasabah']; ?></textarea></td>
  </tr>
  <tr>
    <td>Nama Nasabah</td>
    <td><textarea name="nama_nasabah"><?php echo $data['nama_nasabah']; ?></textarea></td>
  </tr>
  </table>
  <hr>
  <input type="submit" value="Ubah">
  <a href="slik_ved.php"><input type="button" value="Batal"></a>
  </form>
</body>
</html>