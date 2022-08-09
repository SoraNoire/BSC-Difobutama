<div class="table-responsive" border="1" width="100%" style="margin-bottom: 20px">
 <table class="table table-bordered" style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif'" width="100%">
  <tr>
	<th style="text-align: center">Kode Permintaan</th>
    <th style="text-align: center">Tanggal</th>
    <th style="text-align: center">Jam</th>
    <th style="text-align: center">Info Update</th>
	<th style="text-align: center">Dilakukan Oleh</th>
	<th style="text-align: center">Keterangan</th>
  </tr>
  <?php
  include "dbcon.php";
  $query = "SELECT * FROM padpk_history_data WHERE kode_padpk='$kode_permintaan' order by tanggal DESC, jam DESC"; 
  $sql = mysqli_query($con, $query);
  while($data = mysqli_fetch_array($sql)){
    echo "<tr>";
	echo "<td style='text-align: justify'>".$data['kode_padpk']."</td>";
    echo "<td style='text-align: center'>".date("d/M/Y",strtotime($data['tanggal']))."</td>";
    echo "<td style='text-align: center'>".date("H:i:s",strtotime($data['jam']))."</td>";
	echo "<td style='text-align: justify'>".$data['info_update']."</td>";
    echo "<td style='text-align: left'>".$data['info_user']."</td>";
	echo "<td style='text-align: justify'>".$data['keterangan']."</td>";
  }
  ?>
	</table>
  </div>