<?php
include('dbcon.php');
$kantor = $_GET['kantor'];
$penempatan = mysqli_query($con,"SELECT kode_kcp,area_kcp FROM combobox_kcp WHERE kode_perusahaan='$kantor'");
echo "<option></option>";
while($k = mysqli_fetch_array($penempatan)){
echo "<option value=\"".$k['kode_kcp']."\">".$k['area_kcp']."</option>\n";
}
?>