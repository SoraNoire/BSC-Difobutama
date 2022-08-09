<!doctype html>
<html>
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="css/animate.css" rel="stylesheet" type="text/css">
<head>
	<body>
	<div>
<table class="table-responsive table-bordered" width="100%" style="margin-bottom: 20px;font-family: Baskerville, 'Palatino Linotype', Palatino, 'Century Schoolbook L', 'Times New Roman', 'serif';font-size: 20px;font-style: oblique">
  <tr>
	<th style="text-align: center" width="auto" class="animated rollIn">No</th>
	<th style="text-align: center" width="auto" class="animated rollIn">NIK</th>
	<th style="text-align: center" width="auto" class="animated rollIn">Nama Karyawan</th>
    <th style="text-align: center" width="auto" class="animated rollIn">Jabatan</th>
	<th style="text-align: center"><span class="glyphicon glyphicon-cog"></span></th>
  <?php
  include "dbcon.php";
  include_once('session.php');
  $result=mysqli_query($con, "select * from central_data where nik='$session_id'")or die('Error In Session');
  $row=mysqli_fetch_array($result);
  $kantor = $row['kantor'];
  $no=1;
  $query= "SELECT * FROM central_data WHERE kantor='$kantor' and jabatan='RESIGN' ORDER BY nama_karyawan ASC"; 
  $sql = mysqli_query($con, $query);
  while($data = mysqli_fetch_array($sql)){
    echo "<tr>";
	echo "<td style='text-align: center' class='animated rollIn'>".$no."</td>";
	echo "<td  class='animated rollIn'>".$data['nik']."</td>";
	echo "<td  class='animated rollIn'>".$data['nama_karyawan']."</td>";
    echo "<td  class='animated rollIn'>".$data['jabatan']."</td>";  
	echo "<td align='center'><a href='HRDarea_karyawan_viewer.php?nik=".$data['nik']."' class='btn btn-default'><span class='glyphicon glyphicon-eye-open'></span></a></td>";
	echo "</tr>";
	$no++;  
    }
  ?>
  </table>
</div>
</body>
</html>