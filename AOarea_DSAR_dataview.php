<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" />
<script src="https://code.jquery.com/jquery-1.12.3.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#aodsar').DataTable();
} );
</script>
<?php
include('dbcon.php');
include_once('session.php');
$result=mysqli_query($con, "select * from central_data where nik='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);
$id_user	     	= $row['nik'];
$kantor				= $row['kantor'];

$no   = 1;

$tanggal = date("y-m-d");
$bulan   = date("m");
$jam     = date("H:i:s");

?>
<div class="table-responsive">
	<table class="table" id="aodsar">
	<thead>
	<tr style="border: 2px solid black; text-align: center" align="center">
		<th style="border: 2px solid black;vertical-align: middle; text-align: center"><b>No.</b></th>
		<th style="border: 2px solid black;vertical-align: middle; text-align: center"><b>Tanggal</b></th>
		<th style="border: 2px solid black;vertical-align: middle; text-align: center"><b>Nama Nasabah</b></th>
		<th style="border: 2px solid black;vertical-align: middle; text-align: center"><b>No Kontak</b></th>
		<th style="border: 2px solid black;vertical-align: middle; text-align: center"><b>Alamat_Nasabah</b></th>
		<th style="border: 2px solid black;vertical-align: middle; text-align: center"><b>lokasi</b></th>
		<th style="border: 2px solid black;vertical-align: middle; text-align: center"><b>Uraian</b></th>
		<th style="border: 2px solid black;vertical-align: middle; text-align: center"><b>Foto</b></th>
	</tr>
	</thead>
	<?php
	$dsar= "SELECT * FROM sales_plan WHERE id_ao='$id_user'";	
	$sql_dsar = mysqli_query($con, $dsar);
	while($data_dsar = mysqli_fetch_array($sql_dsar)){
	$tanggal		= date("d-m-Y",strtotime($data_dsar['tanggal_sp']));
	$nama_nasabah	= $data_dsar['nama_nasabah'];
	$no_tlp			= $data_dsar['no_tlp_nasabah'];
	$alamat			= $data_dsar['alamat_nasabah'];
	$lokasi			= $data_dsar['lokasi_sp'];
	$uraian			= $data_dsar['uraian_aktivitas'];
	$foto			= $data_dsar['foto_sp'];
	?>
	<tr>
	<td style="text-align: center;;border: 2px solid black"><?php echo $no ?></td>
	<td style="border: 2px solid black"><?php echo $tanggal ?></td>
	<td style="border: 2px solid black"><?php echo $nama_nasabah ?></td>
	<td style="border: 2px solid black"><?php echo $no_tlp ?></td>
	<td style="border: 2px solid black"><?php echo $alamat ?></td>
	<td style="border: 2px solid black"><?php echo $lokasi ?></td>
	<td style="border: 2px solid black"><?php echo $uraian ?></td>
	<td style="border: 2px solid black">
	<img src="imgsalesplan/<?php echo $data_dsar['foto_sp']; ?>" width="80" height="80">
	</td>
	</tr>
	<?php
	$no++;
	}
	?>
	</table>
	</div>