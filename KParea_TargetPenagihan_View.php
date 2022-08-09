<?php
function rupiah($angka){
	
	$hasil_rupiah = "Rp.   " . number_format($angka,2,',','.');
	return $hasil_rupiah;
 
}
?>
<div class="table-responsive" border="1" width="100%" style="margin-bottom: 20px">
 <table class="table table-bordered" style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif'" width="100%">
  <tr>
    <th style="text-align: center">Periode</th>
	<th style="text-align: center">Nama Pelaksana</th>
    <th style="text-align: center">Jabatan</th>
    <th style="text-align: center">Kantor</th>
	<th style="text-align: center">Penempatan</th>
	<th style="text-align: center">Nama Nasabah</th>
	<th style="text-align: center">Kolektibilitas</th>
	<th style="text-align: center">Pokok</th>
	<th style="text-align: center">Bunga</th>
  </tr>
  <?php
	include('dbcon.php');
	include_once('session.php'); 

	$result=mysqli_query($con, "select * from central_data where nik='$session_id'")or die('Error In Session');
	$row=mysqli_fetch_array($result);
    $kantor= $row['kantor']; 
	$bulan= date('m');
  $query = "SELECT * FROM target_penagihan WHERE kantor='$kantor' AND MONTH(periode)='$bulan'"; 
  $sql = mysqli_query($con, $query);
  while($data = mysqli_fetch_array($sql)){
    echo "<tr>";
    echo "<td style='text-align: justify'>".date("d/M/Y",strtotime($data['periode']))."</td>";
	echo "<td style='text-align: justify'>".$data['nama']."</td>";
    echo "<td style='text-align: justify'>".$data['jabatan']."</td>";
	echo "<td style='text-align: justify'>".$data['kantor']."</td>";
	echo "<td style='text-align: justify'>".$data['penempatan']."</td>";
	echo "<td style='text-align: justify'>".$data['nama_nasabah']."</td>";
	echo "<td style='text-align: justify'>".$data['kolektibilitas']."</td>";
	echo "<td style='text-align: justify'>".rupiah($data['pokok'])."</td>";
	echo "<td style='text-align: justify'>".rupiah($data['bunga'])."</td>";
    
    echo "</tr>";
      
  }
  ?>
	</table>
  </div>