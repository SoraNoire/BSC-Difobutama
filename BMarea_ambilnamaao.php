<?php
include('dbcon.php');
$penempatan = $_GET['penempatan'];
$nama_ao  = mysqli_query($con,"SELECT kode_ao,nama_ao FROM combobox_ao WHERE kode_kcp='$penempatan' ORDER BY nama_ao"); 
echo "<option></option>";
while($k = mysqli_fetch_array($nama_ao)){
echo "<option value=\"".$k['kode_ao']."\">".$k['nama_ao']."</option>\n";
}
?>