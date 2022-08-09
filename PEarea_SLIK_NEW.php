<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" />
<script src="https://code.jquery.com/jquery-1.12.3.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#sliknew').DataTable();
} );
</script>
<?php
include('dbcon.php');
include_once('session.php');
$result=mysqli_query($con, "select * from central_data where nik='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);
$id_penagih     	= $row['nik'];
$kantor				= $row['kantor'];

$no   = 1;

$tanggal = date("y-m-d");
$bulan   = date("m");
$tahun   = date("Y");
$jam     = date("H:i:s");

$status="-";
?>
<div class="table-responsive">
	<table class="table" id="sliknew">
	<thead>
	<tr style="border: 2px solid black; text-align: center" align="center">
		<th style="border: 2px solid black;vertical-align: middle; text-align: center"><b>No.</b></th>
		<th style="border: 2px solid black;vertical-align: middle; text-align: center"><b>TANGGAL</b></th>
		<th style="border: 2px solid black;vertical-align: middle; text-align: center"><b>PEMOHON</b></th>
		<th style="border: 2px solid black;vertical-align: middle; text-align: center"><b>KODE SLIK</b></th>
		<th style="border: 2px solid black;vertical-align: middle; text-align: center"><b>KTP NASABAH</b></th>
		<th style="border: 2px solid black;vertical-align: middle; text-align: center"><b>NAMA NASABAH</b></th>
		<th style="border: 2px solid black;vertical-align: middle; text-align: center;"><b>LIHAT</b></th>
		<th style="border: 2px solid black;vertical-align: middle; text-align: center;"><b>LANJUT</b></th>
		<th style="border: 2px solid black;vertical-align: middle; text-align: center;"><b>TOLAK</b></th>
	</tr>
	</thead>
	<?php
	$slik_new= "SELECT * FROM data_slik WHERE kantor_pemohon='$kantor' and status='$status' and month(tanggal_input)='$bulan' and year(tanggal_input)='$tahun'";	
	$sql_slik_new = mysqli_query($con, $slik_new);
	while($data_slik_new = mysqli_fetch_array($sql_slik_new)){
	$slik_new_tanggal				=  date("d-m-Y",strtotime($data_slik_new['tanggal_input']));
	$slik_new_pemohon				= $data_slik_new['nama_pemohon'];
	$slik_new_kodeslik				= $data_slik_new['kode_slik'];
	$slik_new_id_nasabah			= $data_slik_new['id_nasabah'];
	$slik_new_nama_nasabah			= $data_slik_new['nama_nasabah'];
	?>
	<tr>
	<td style="text-align: center;;border: 2px solid black"><?php echo $no ?></td>
	<td style="border: 2px solid black"><?php echo $slik_new_tanggal ?></td>
	<td style="border: 2px solid black"><?php echo $slik_new_pemohon ?></td>
	<td style="border: 2px solid black"><?php echo $slik_new_kodeslik ?></td>
	<td style="border: 2px solid black"><?php echo $slik_new_id_nasabah ?></td>
	<td style="border: 2px solid black"><?php echo $slik_new_nama_nasabah ?></td>
	<td style="border: 2px solid black;text-align: center"><a class="btn btn-info" href="AOarea_SLIK_R_Viewer.php?id_nasabah=<?php echo $data_slik_new['id_nasabah']?>">LIHAT</a></td>
	<td style="border: 2px solid black;text-align: center"><a class="btn btn-success" href="PEarea_SLIK_NEWproses_YES.php?id_nasabah=<?php echo $data_slik_new['id_nasabah']?>">YES</a></td>
	<td style="border: 2px solid black;text-align: center"><a class="btn btn-danger" href="PEarea_SLIK_NEWproses_NO.php?id_nasabah=<?php echo $data_slik_new['id_nasabah']?>">NO</a></td>
	</tr>
	<?php
	$no++;
	}
	?>
	</table>
	</div>