<?php
include('dbcon.php');
$penempatan = $_GET['penempatan'];
$nama_ao  = mysqli_query($con,"SELECT kode_analis,nama_analis FROM combobox_analis WHERE kode_kcp='$penempatan' ORDER BY nama_analis"); 
echo "<option></option>";
while($k = mysqli_fetch_array($nama_ao)){
echo "<option value=\"".$k['kode_analis']."\">".$k['nama_analis']."</option>\n";
}
?>