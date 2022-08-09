<!doctype html>
	<?php
	$tanggal_bergabung = strtotime($row['tahun_masuk']);
	$tanggal_probration = strtotime($row['tgl_prob']);
	$tanggal_PKWT = strtotime($row['tgl_pkwt']);
	$tanggal_PKWT2 = strtotime($row['tgl_pkwt2']);
	$tanggal_karyawan_tetap = strtotime($row['tgl_karyawan_tetap']);
	?>
<html>
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="css/animate.css" rel="stylesheet" type="text/css">
<head>
<body>
<table class="table table-responsive">
<tr>
<td><?php echo ("BPJS Ketenagakerjaan")?></td>
<th><?php echo (" : ")?></th>
<td><?php echo ($row['fas_bpjs_ket'])?></td>
</tr>
<tr>
<td><?php echo ("BPJS Kesehatan")?></td>
<th><?php echo (" : ")?></th>
<td><?php echo ($row['fas_bpjs_kes'])?></td>
</tr>
<tr>
<td><?php echo ("BPJS Pensiun")?></td>
<th><?php echo (" : ")?></th>
<td><?php echo ($row['fas_bpjs_pen'])?></td>
</tr>
<tr>
<td><?php echo ("DPLK")?></td>
<th><?php echo (" : ")?></th>
<td><?php echo ($row['fas_dplk'])?></td>
</tr>
</table>	
</body>
</html>