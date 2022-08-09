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
<td><?php echo ("No. KTP")?></td>
<th><?php echo (" : ")?></th>
<td><?php echo ($row['no_ktp'])?></td>
</tr>
<tr>
<td><?php echo ("No. NPWP")?></td>
<th><?php echo (" : ")?></th>
<td><?php echo ($row['no_npwp'])?></td>
</tr>
<tr>
<td><?php echo ("No. Rekening Aktif")?></td>
<th><?php echo (" : ")?></th>
<td><?php echo ($row['no_rek']." || ".$row['bank'])?></td>
</tr>
</table>	
</body>
</html>