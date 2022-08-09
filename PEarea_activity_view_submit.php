<div class="table-responsive" border="1" width="100%" style="margin-bottom: 20px">
 <table class="table table-bordered" style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif'" width="100%">
  <tr>
    <th style="text-align: center">Tanggal</th>
	<th style="text-align: center">Activity Code</th>
	<th style="text-align: center">Detail</th>
    <th colspan="3" style="text-align: center"><span class="glyphicon glyphicon-cog"></span></th>
  </tr>
  <?php
	include('dbcon.php');
	include_once('session.php'); 

	$result=mysqli_query($con, "select * from central_data where nik='$session_id'")or die('Error In Session');
	$row=mysqli_fetch_array($result);
    $kantor= $row['kantor'];
	$owner = $row['nik'];
		
  $query = "SELECT * FROM activity_pe WHERE status='submit' and nik='$owner' ORDER BY tanggal DESC"; 
  $sql = mysqli_query($con, $query);
  while($data = mysqli_fetch_array($sql)){
    echo "<tr>";
    echo "<td style='text-align: justify'>".date("d/M/Y",strtotime($data['tanggal']))."</td>";
	echo "<td style='text-align: justify'>".$data['kode']."</td>";
	echo "<td>".substr($data['uraian_aktivitas'],0,10)."..."."<a href='PEarea_activity_viewer.php?kode=".$data['kode']."'>Read More</a></td>";
    echo "<td align='center'><a href='PEarea_activity_viewer.php?kode=".$data['kode']."' class='btn btn-default'><span class='glyphicon glyphicon-eye-open'></span></a></td>";
    echo "<td align='center'><a href='PEarea_activity_edit.php?kode=".$data['kode']."' class='btn btn-warning'><span class='glyphicon glyphicon-edit'></span></a></td>";
    echo "<td align='center'><a href='PEarea_activity_delete.php?kode=".$data['kode']."' class='btn btn-danger'><span class='glyphicon glyphicon-erase'></span></a></td>";
    echo "</tr>";
  }
  ?>
	</table>
  </div>