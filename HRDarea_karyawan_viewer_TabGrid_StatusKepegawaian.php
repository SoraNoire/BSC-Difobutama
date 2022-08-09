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
<td><?php echo ("Status Kepegawaian Saat Ini")?></td>
<th><?php echo (" : ")?></th>
<td><?php echo ($row['status_karyawan'])?></td>
</tr>
<tr>
<td><?php echo ("Tahun Bergabung")?></td>
<td><?php echo (" : ")?></td>
<td><?php if (empty($tanggal_bergabung)){echo("-");}else{echo (date('d-M-Y',strtotime($row['tahun_masuk'])));}?></td>
</tr>
<tr>
<td><?php echo ("Masa Probration")?></td>
<td><?php echo (" : ")?></td>
<td><?php if (empty($tanggal_probration)){echo("-");}else{echo (date('d-M-Y',strtotime($row['tgl_prob']))." s/d ".date('d-M-Y',strtotime($row['tgl_prob_end'])));}?></td>
</tr>
<tr>
<td><?php echo ("Masa Perjanjian Kerja Waktu Tertentu")?></td>
<td><?php echo (" : ")?></td>
<td><?php if (empty($tanggal_PKWT)){echo("-");}else{echo (date('d-M-Y',strtotime($row['tgl_pkwt']))." s/d ".date('d-M-Y',strtotime($row['tgl_pkwt_end'])));}?></td>
</tr>
<tr>
<td><?php echo ("Masa Perjanjian Kerja Waktu Tertentu Lanjutan")?></td>
<td><?php echo (" : ")?></td>
<td><?php if (empty($tanggal_PKWT2)){echo("-");}else{echo (date('d-M-Y',strtotime($row['tgl_pkwt2']))." s/d ".date('d-M-Y',strtotime($row['tgl_pkwt2_end'])));}?></td>
</tr>
<tr>
<td><?php echo("Tanggal Pengangkatan Karyawan Tetap")?></td>
<td><?php echo (" : ")?></td>
<td><?php if (empty($tanggal_karyawan_tetap)){echo("-");}else{echo (date('d-M-Y',strtotime($row['tgl_karyawan_tetap'])));}?></td>
</tr>	
</table>	
</body>
</html>