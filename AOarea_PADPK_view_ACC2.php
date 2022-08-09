<div class="table-responsive" border="1" width="100%" style="margin-bottom: 20px">
 <table class="table table-bordered" style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif'" width="100%">
  <tr>
    <th style="text-align: center">Tanggal</th>
	<th style="text-align: center">Kode Permintaan</th>
    <th style="text-align: center">Nama AO</th>
    <th style="text-align: center">Nama Nasabah</th>
	<th style="text-align: center">Plafond</th>
	<th style="text-align: center"><span class="glyphicon glyphicon-cog"></span></th>
  </tr>
  <?php
	include('dbcon.php');
	include_once('session.php'); 

	$result=mysqli_query($con, "select * from central_data where nik='$session_id'")or die('Error In Session');
	$row=mysqli_fetch_array($result);
    $kantor= $row['kantor'];
	 $nama_ao=$row['nama_karyawan'];
	 
  $query = "SELECT * FROM permohonan_analisa_kredit WHERE status='acc2' and nama_ao='$nama_ao'"; 
  $sql = mysqli_query($con, $query);
  while($data = mysqli_fetch_array($sql)){
    echo "<tr>";
    echo "<td style='text-align: justify'>".date("d/M/Y",strtotime($data['tanggal_input']))."</td>";
	echo "<td style='text-align: justify'>".$data['kode_permintaan']."</td>";
    echo "<td style='text-align: justify'>".$data['nama_ao']."</td>";
	echo "<td style='text-align: justify'>".$data['nama_nasabah']."</td>";
	echo "<td style='text-align: justify'>".rupiah($data['plafond'])."</td>";
	echo "<td align='center'><a href='AOarea_PADPK_viewer_only.php?kode_permintaan=".$data['kode_permintaan']."' class='btn btn-default'><span class='glyphicon glyphicon-eye-open'></span></a></td>";
    echo "</tr>";
  }
  ?>
	</table>
  </div>