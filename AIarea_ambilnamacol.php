<?php
include('dbcon.php');
$penempatan = $_GET['penempatan'];
$nama_col = mysqli_query($con,"SELECT kode_karyawan,nama_collector FROM data_k_penagihan WHERE kode_kcp='$penempatan' ORDER BY nama_collector"); 
echo "<option></option>";
while($k = mysqli_fetch_array($nama_col)){
echo "<option value=\"".$k['kode_karyawan']."\">".$k['nama_collector']."</option>\n";
}
?>