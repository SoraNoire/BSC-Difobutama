<div class="table-responsive" border="1" width="100%" style="margin-bottom: 2%">
 <table class="table table-bordered" style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif'" width="100%">
  <tr>
    <th style="text-align: center">No.</th>
    <th style="text-align: center">ID Nasabah</th>
	<th style="text-align: center">Nama Nasabah</th>
    <th style="text-align: center">Lampiran</th>
    <th style="text-align: center"><span class="glyphicon glyphicon-cog"></span></th>
  </tr>
  <?php
	include('dbcon.php');
	include_once('session.php'); 

	$result=mysqli_query($con, "select * from central_data where nik='$session_id'")or die('Error In Session');
	$row=mysqli_fetch_array($result);
    $kantor= $row['kantor'];
    $nama_karyawan= $row['nama_karyawan'];
  $no=1;
  $query = "SELECT * FROM data_slik_ao_req WHERE nama_ao='$nama_karyawan' and status='requested' order by tanggal_req,jam_req ASC"; 
  $sql = mysqli_query($con, $query);
  while($data = mysqli_fetch_array($sql)){
    echo "<tr>";
    echo "<td style='text-align: center'>".$no."</td>";
	echo "<td style='text-align: justify'>".$data['nik_ktp_nasabah']."</td>";
    echo "<td style='text-align: justify'>".$data['nama_nasabah']."</td>";
	echo "<td style='text-align: justify'>"."<a href='files/".$data['attachment']."';>".$data['attachment']."</td>";
    echo "<td align='center'><a href='AOarea_SLIK_R_Viewer.php?id_nasabah=".$data['nik_ktp_nasabah']."' class='btn btn-warning'><span class='glyphicon glyphicon-eye-open'></span></a></td>";
    echo "</tr>";
 
	$no++;
	}
	?>
	</table>
  </div>