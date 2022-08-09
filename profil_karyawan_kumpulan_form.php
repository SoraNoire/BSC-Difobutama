<!doctype html>
<html>
<head>
<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" />
<script src="https://code.jquery.com/jquery-1.12.3.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap-3.3.7.css" rel="stylesheet" type="text/css">
<link href="css/animate.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
$(document).ready(function() {
    $('#kumpulanform').DataTable();
} );
</script>
<?php
include('dbcon.php');
include_once('session.php');
include_once('header.php');
include_once('profil_karyawan_sidenav.php');
$result=mysqli_query($con, "select * from central_data where nik='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);
$id_penagih     	= $row['nik'];
$kantor				= $row['kantor'];

$no   = 1;

?>
</head>
<body>
<center><h2>KUMPULAN FORM</h2><center>
	<table class="table table-responsive" id="kumpulanform">
	<thead>
	<tr style="border: 2px solid black; text-align: center" align="center">
		<th style="border: 2px solid black;vertical-align: middle; text-align: center"><b>No.</b></th>
		<th style="border: 2px solid black;vertical-align: middle; text-align: center"><b>Nama Form</b></th>
		<th style="border: 2px solid black;vertical-align: middle; text-align: center"><b>Download</b></th>
	</tr>
	</thead>
	<?php
	$kumpulan_form= "SELECT * FROM kumpulan_form WHERE perusahaan='$kantor'";	
	$sqlkumpulan_form = mysqli_query($con, $kumpulan_form);
	while($datakumpulanform = mysqli_fetch_array($sqlkumpulan_form)){
	$nama_file			= $datakumpulanform['nama'];
	$form_file			= $datakumpulanform['file'];
	?>
	<tr>
	<td style="text-align: center;;border: 2px solid black"><?php echo $no ?></td>
	<td style="border: 2px solid black"><?php echo $nama_file ?></td>
	<td style="border: 2px solid black;text-align: center"><a class="btn btn-success" href="kumpulan_form/<?php echo $kantor?>/<?php echo $datakumpulanform['file']; ?>">DOWNLOAD</a></td>
	</tr>
	<?php
	$no++;
	}
	?>
	</table>
</div>
</body>
</html>