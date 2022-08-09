<table class="table table-responsive" style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif';font-size: 12px" width="100%">
  <tr>
    <th style="text-align: center">Kode</th>
	<th style="text-align: center">Tanggal</th>
    <th style="text-align: center">Jam</th>
    <th style="text-align: center">Informasi</th>
	<th style="text-align: center">User</th>
	<th style="text-align: center">Keterangan</th>
  </tr>
<?PHP
include("dbcon.php");
$kode = $_POST['id'];
 $query = "SELECT * FROM padpk_history_data WHERE kode_padpk='$kode' ORDER BY tanggal DESC, jam DESC"; 
  $sql = mysqli_query($con, $query);
  while($data = mysqli_fetch_array($sql)){
    echo "<tr>";
	echo "<td style='text-align: justify'>".$data['kode_padpk']."</td>";
    echo "<td style='text-align: justify'>".date("d/M/Y",strtotime($data['tanggal']))."</td>";
    echo "<td style='text-align: justify'>".$data['jam']."</td>";
	echo "<td style='text-align: justify'>".$data['info_update']."</td>";
	echo "<td style='text-align: justify'>".$data['info_user']."</td>";
	echo "<td style='text-align: justify'>".$data['keterangan']."</td>";
    echo "</tr>";
  }
?>
	</table>