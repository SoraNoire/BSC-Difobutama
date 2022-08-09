<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" />
<script src="https://code.jquery.com/jquery-1.12.3.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#t_kbtunai').DataTable();
} );
</script>
<?php
include('dbcon.php');
include_once('session.php');
$result=mysqli_query($con, "select * from central_data where nik='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);
$id_penagih     	= $row['nik'];
$kantor				= $row['kantor'];

function rupiah($angka){
	
	$hasil_rupiah = "Rp.   " . number_format($angka,2,',','.');
	return $hasil_rupiah;
 
}

$no   = 1;
$metode_bayar="Tunai";

$status="Diterima Divisi Penagihan";
?>
<div class="table-responsive">
	<table class="table" id="t_kbtunai">
	<thead>
	<tr style="border: 2px solid black; text-align: center" align="center">
		<th style="border: 2px solid black;vertical-align: middle; text-align: center"><b>No.</b></th>
		<th style="border: 2px solid black;vertical-align: middle; text-align: center"><b>Tanggal</b></th>
		<th style="border: 2px solid black;vertical-align: middle; text-align: center"><b>Nama Nasabah</b></th>
		<th style="border: 2px solid black;vertical-align: middle; text-align: center"><b>Jumlah Pembayaran</b></th>
		<th style="border: 2px solid black;vertical-align: middle; text-align: center"><b>Metode Pembayaran</b></th>
		<th style="border: 2px solid black;vertical-align: middle; text-align: center"><b>Keterangan</b></th>
		<th style="border: 2px solid black;vertical-align: middle; text-align: center"><b>Status</b></th>
		<th style="border: 2px solid black;vertical-align: middle; text-align: center"><b>Bukti Bayar</b></th>
	</tr>
	</thead>
	<?php
	$penagihan_mobile= "SELECT * FROM penagihan_mobile WHERE kantor='$kantor' and metode_bayar='$metode_bayar' and status_bayar='$status'";	
	$sqlpenagihanmobile = mysqli_query($con, $penagihan_mobile);
	while($datapenagihanmobile = mysqli_fetch_array($sqlpenagihanmobile)){
	$penagihanmobile_tanggal		=  date("d-m-Y",strtotime($datapenagihanmobile['tanggal_bayar']));
	$penagihanmobile_nama_nasabah	= $datapenagihanmobile['nama_nasabah'];
	$penagihanmobile_jumlah_bayar	= $datapenagihanmobile['jumlah_bayar'];
	$penagihanmobile_metode_bayar	= $datapenagihanmobile['metode_bayar'];
	$penagihanmobile_keterangan		= $datapenagihanmobile['keterangan'];
	$penagihanmobile_status			= $datapenagihanmobile['status_bayar'];
	?>
	<tr>
	<td style="text-align: center;;border: 2px solid black"><?php echo $no ?></td>
	<td style="border: 2px solid black"><?php echo $penagihanmobile_tanggal ?></td>
	<td style="border: 2px solid black"><?php echo $penagihanmobile_nama_nasabah ?></td>
	<td style="border: 2px solid black"><?php echo rupiah($penagihanmobile_jumlah_bayar) ?></td>
	<td style="border: 2px solid black"><?php echo $penagihanmobile_metode_bayar ?></td>
	<td style="border: 2px solid black"><?php echo $penagihanmobile_keterangan ?></td>
	<td style="border: 2px solid black"><?php echo $penagihanmobile_status ?></td>
	<td style="border: 2px solid black;text-align: center"><a class="btn btn-success" href="KASIR_INVOICE_view_<?php echo($kantor)?>.php?kode_bayar=<?php echo $datapenagihanmobile['kode_bayar']?>" target="_BLANK">KONFIRMASI</a></td>
	</tr>
	<?php
	$no++;
	}
	?>
	</table>
	</div>