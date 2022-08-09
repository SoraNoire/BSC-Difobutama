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
  $no_ppuda = $_GET['no_ppuda'];
  
  // Query untuk menampilkan data siswa berdasarkan NIS yang dikirim
  $query = "SELECT * FROM input_targetao WHERE no_ppuda='".$no_ppuda."'";
  $sql = mysqli_query($con, $query);  // Eksekusi/Jalankan query dari variabel $query
  $data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql
  ?>
  
  <form method="post" action="TargetAO_saveupdate.php?no_ppuda=<?php echo $no_ppuda; ?>" enctype="multipart/form-data">
  <table cellpadding="8">
  <tr>
    <td>Nama AO</td>
    <td><textarea type="text" name="nama_ao" readonly><?php echo $data['nama_ao']; ?></textarea></td>
  </tr>
  <tr>
    <td>No PPUDA</td>
    <td><textarea name="no_ppuda"><?php echo $data['no_ppuda']; ?></textarea></td>
  </tr>
 <tr>
    <td>Nama Nasabah</td>
    <td><textarea name="nama_nasabah"><?php echo $data['nama_nasabah']; ?></textarea></td>
  </tr>
  <tr>
    <td>Plafond</td>
    <td><textarea name="plafond"><?php echo $data['plafond']; ?></textarea></td>
  </tr>
  </table>
  <hr>
  <input type="submit" value="Ubah">
  <a href="TargetAO_ved.php"><input type="button" value="Batal"></a>
  </form>
</body>
</html>