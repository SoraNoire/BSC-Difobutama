<div class="table-responsive" border="1" width="100%" style="margin-bottom: 20px">
 <table class="table table-bordered" style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif'" width="100%">
  <tr>
    <th style="text-align: center">Nomor Surat</th>
	<th style="text-align: center">Jenis</th>
	<th style="text-align: center">Uraian</th>
    <th style="text-align: center">Lampiran</th>
    <th style="text-align: center"><span class="glyphicon glyphicon-cog"></span></th>
  </tr>
  <?php
	include('dbcon.php');
	include_once('session.php'); 

	$result=mysqli_query($con, "select * from central_data where nik='$session_id'")or die('Error In Session');
	$row=mysqli_fetch_array($result);
    $kantor= $row['kantor'];
	 
  $query = "SELECT * FROM news WHERE kantor='$kantor' and jenis='Surat Edaran' ORDER BY tanggal_berlaku DESC LIMIT 10"; 
  $sql = mysqli_query($con, $query);
  while($data = mysqli_fetch_array($sql)){
    echo "<tr>";
    echo "<td style='text-align: justify'>".$data['no_surat']."</td>";
	echo "<td style='text-align: justify'>".$data['jenis']."</td>";
	echo "<td style='text-align: justify'>".$data['uraian']."</td>";
	echo "<td style='text-align: justify'>"."<a href='FileNews/".$kantor."/".$data['lampiran']."';>".$data['no_surat']."||UniCode=".$data['lampiran']."</td>";
    echo "<td align='center'><a href='HRDarea_News_viewer.php?no_surat=".$data['no_surat']."' class='btn btn-info'><span class='glyphicon glyphicon-eye-open'></span></a></td>";
    echo "</tr>";
  }
  ?>
	</table>
  </div>