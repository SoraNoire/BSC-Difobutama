<!DOCTYPE html>
<?php
include('dbcon.php');

	$hariini	= date('y-m-d');
	$oneday		= abs(1*86400);
	$h1 		= strtotime($hariini)-$oneday;
	$h2 		= strtotime($hariini)-$oneday-$oneday;
	$h3 		= strtotime($hariini)-$oneday-$oneday-$oneday;
	$h4 		= strtotime($hariini)-$oneday-$oneday-$oneday-$oneday;
	$h5 		= strtotime($hariini)-$oneday-$oneday-$oneday-$oneday-$oneday;
	$h6 		= strtotime($hariini)-$oneday-$oneday-$oneday-$oneday-$oneday-$oneday;
	$h7 		= strtotime($hariini)-$oneday-$oneday-$oneday-$oneday-$oneday-$oneday-$oneday;
	
	$hari1 		= date('y-m-d');
	$hari2 		= date('y-m-d',$h1);
	$hari3 		= date('y-m-d',$h2);
	$hari4 		= date('y-m-d',$h3);
	$hari5 		= date('y-m-d',$h4);
	$hari6 		= date('y-m-d',$h5);
	$hari7 		= date('y-m-d',$h6);
	$tanggal1	= date('01-m-Y');
	$tanggal1beetween	= date('Y-m-01');
	$tanggalinibeetween = date('Y-m-d');
	$media 	= "Kunjungan";
	
	$bulan		= date('m');
	$tahun		= date('Y');
	$bulan_lalu = date('m',strtotime('- month', strtotime(date('m'))));
	$no   		= 1;
    $no1 		= 1;
    $nos  		= 1;
    $no1s  		= 1;
    $no2  		= 1;
    $no2b  		= 1;
    $no2s  		= 1;
    $no2ss  	= 1;
    $no2sss 	= 1;
    $no3s  		= 1;
    $no2slik  	= 1;
function rupiah($angka){
	
	$hasil_rupiah = "Rp.   " . number_format($angka,2,',','.');
	return $hasil_rupiah;
 
}
?>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">

<link href="css/animate.css" rel="stylesheet" type="text/css">
<title>The Ballance Scorecard</title>
<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" />
<script src="https://code.jquery.com/jquery-1.12.3.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#analistabel1').DataTable();
} );
</script>
<script type="text/javascript">
$(document).ready(function() {
    $('#sliknonpadpk1').DataTable();
} );
</script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
</head>
<body>
	<div style="font-size: 12px;overflow-x:auto;" >
		<h1 align="center">LAPORAN PERFORMANCE PROSES KREDIT <?php echo(strtoupper(date('F-Y')));?></h1>
		<div>
			<LABEL>CATATAN :</LABEL><br>
			<label>1. TANGGAL DI DATA ANALIS DAN DATA ACC ADALAH TANGGAL DATA DI PROSES SETELAH PROSES SLIK</label><br>
			<label>2. TANGGAL DI PENCAIRAN ADALAH TANGGAL PENCAIRAN</label><br>
			<table class="table-responsive" style="overflow-x: auto">
				<tr>
					<td>
				<table class="table table-bordered" >
				<LABEL>POSISI DATA <?PHP echo(date('d-M-Y'))?></LABEL>
				<tr>
					<th rowspan="3" style="vertical-align: middle;text-align: center">NO.</th>
					<th rowspan="3" style="vertical-align: middle;text-align: center;word-break: keep-all" nowrap>Nama A.O</th>
					<th rowspan="2"  colspan="2" style="vertical-align: middle;text-align: center">AKTIVITAS</th>
					<th colspan="4" style="vertical-align: middle;text-align: center">SLIK BULAN <?php echo strtoupper((date('F', strtotime('-1 month', strtotime( date('F') )))))?></th>
					<th rowspan="2" colspan="2" style="vertical-align: middle;text-align: center" nowrap>SLIK CARRIED OVER <?php echo strtoupper((date('F', strtotime('-1 month', strtotime( date('F') )))))?></th></th>
					<th colspan="6" style="vertical-align: middle;text-align: center">SLIK BULAN <?php echo strtoupper(date('F'))?></th>
					<th rowspan="2" colspan="2" style="vertical-align: middle;text-align: center">DATA KE ANALIS</th>
					<th rowspan="2" colspan="2" style="vertical-align: middle;text-align: center">DATA ACC</th>
					<th rowspan="2" colspan="2" style="vertical-align: middle;text-align: center">PENCAIRAN BULAN INI</th>
				</tr>
				<tr>
					<th colspan="2" style="vertical-align: middle;text-align: center">YES</th>
					<th colspan="2" style="vertical-align: middle;text-align: center">NO</th>
					<th colspan="2" style="vertical-align: middle;text-align: center">YES</th>
					<th colspan="2" style="vertical-align: middle;text-align: center">NO</th>
					<th colspan="2" style="vertical-align: middle;text-align: center">NO DECISION</th>
				</tr>
				<tr>
					<th style="vertical-align: middle;text-align: center">CALL</th>
					<th style="vertical-align: middle;text-align: center">VISIT</th>
					<th style="vertical-align: middle;text-align: center"> Nama</th>
					<th style="vertical-align: middle;text-align: center"> Tanggal</th>
					<th style="vertical-align: middle;text-align: center"> Nama</th>
					<th style="vertical-align: middle;text-align: center"> Tanggal</th>
					<th style="vertical-align: middle;text-align: center"> Nama</th>
					<th style="vertical-align: middle;text-align: center"> Tanggal</th>
					<th style="vertical-align: middle;text-align: center"> Nama</th>
					<th style="vertical-align: middle;text-align: center"> Tanggal</th>
					<th style="vertical-align: middle;text-align: center"> Nama</th>
					<th style="vertical-align: middle;text-align: center"> Tanggal</th>
					<th style="vertical-align: middle;text-align: center"> Nama</th>
					<th style="vertical-align: middle;text-align: center"> Tanggal</th>
					<th style="vertical-align: middle;text-align: center">PLAFOND</th>
					<th style="vertical-align: middle;text-align: center">TANGGAL</th>
					<th style="vertical-align: middle;text-align: center">PLAFOND</th>
					<th style="vertical-align: middle;text-align: center">TANGGAL</th>
					<th style="vertical-align: middle;text-align: center">PLAFOND</th>
					<th style="vertical-align: middle;text-align: center">TANGGAL</th>
					
				</tr>
				<tr style="background-color: rgba(221,220,223,1.00)">
					<?php $user1	= 'Achmad Ubaidilah';?>
					<td rowspan="2">
						1.
					</td>
					<td rowspan="2" nowrap>
						Achmad Ubaidilah
					</td>
					<td rowspan="2" style="text-align: center">
						<?php 
							$sql1	=  mysqli_query($con, "SELECT COUNT(nama_user) as tcao1 FROM ao_data_call WHERE  month(tanggal)=$bulan and year(tanggal)=$tahun and nama_user='$user1'");
							$dataakt1 = mysqli_fetch_array($sql1);
						echo($dataakt1['tcao1'])
						?>
					</td>
					<td rowspan="2" style="text-align: center">
						<?php 
							$sql2	=  mysqli_query($con, "SELECT COUNT(nama_karyawan) as tvao1 FROM sales_plan WHERE  month(tanggal_sp)=$bulan and year(tanggal_sp)=$tahun and nama_karyawan='$user1'");
							$dataakt2 = mysqli_fetch_array($sql2);
						echo($dataakt2['tvao1'])
						?>
					</td>
					<td style="text-align: left;" nowrap>
					<?php
					$query7 = "SELECT * from data_slik where nama_pemohon='$user1' and month(tanggal_input)=$bulan_lalu and year(tanggal_input)=$tahun and status='Yes' order by nama_nasabah asc";
					$sql9 = mysqli_query($con, $query7);
					while($datacair = mysqli_fetch_array($sql9)){
					$cair = $datacair['nama_nasabah'];
					?>
					<?php echo  $cair?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: center" nowrap>
					<?php
					$query7 = "SELECT * from data_slik where nama_pemohon='$user1' and month(tanggal_input)=$bulan_lalu and year(tanggal_input)=$tahun and status='Yes' order by nama_nasabah asc";
					$sql9 = mysqli_query($con, $query7);
					while($datacair = mysqli_fetch_array($sql9)){
					$cair = $datacair['tanggal_input'];
					?>
					<?php echo  date('d/m/Y', strtotime($cair))?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: left" nowrap>
					<?php
					$query7 = "SELECT * from data_slik where nama_pemohon='$user1' and month(tanggal_input)=$bulan_lalu and year(tanggal_input)=$tahun and status='No' order by nama_nasabah asc";
					$sql9 = mysqli_query($con, $query7);
					while($datacair = mysqli_fetch_array($sql9)){
					$cair = $datacair['nama_nasabah'];
					?>
					<?php echo  $cair?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: center" nowrap>
					<?php
					$query7 = "SELECT * from data_slik where nama_pemohon='$user1' and month(tanggal_input)=$bulan_lalu and year(tanggal_input)=$tahun and status='No' order by nama_nasabah asc";
					$sql9 = mysqli_query($con, $query7);
					while($datacair = mysqli_fetch_array($sql9)){
					$cair = $datacair['tanggal_input'];
					?>
					<?php echo  date('d/m/Y', strtotime($cair))?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: left" nowrap>
					<?php
					$query7 = "SELECT nama_nasabah from data_slik where NOT EXISTS (select nama_nasabah from permohonan_analisa_kredit where data_slik.nama_nasabah=permohonan_analisa_kredit.nama_nasabah and data_slik.nama_pemohon=permohonan_analisa_kredit.nama_ao) and nama_pemohon='$user1' and status='Yes' and month(tanggal_input)=$bulan_lalu and year(tanggal_input)=$tahun order by nama_nasabah asc";
					$sql9 = mysqli_query($con, $query7);
					while($datacair = mysqli_fetch_array($sql9)){
					$cair = $datacair['nama_nasabah'];
					?>
					<?php echo  $cair?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: left" nowrap>
					<?php
					$query7 = "SELECT tanggal_input from data_slik where NOT EXISTS (select nama_nasabah from permohonan_analisa_kredit where data_slik.nama_nasabah=permohonan_analisa_kredit.nama_nasabah and data_slik.nama_pemohon=permohonan_analisa_kredit.nama_ao) and nama_pemohon='$user1' and status='Yes' and month(tanggal_input)=$bulan_lalu and year(tanggal_input)=$tahun order by nama_nasabah asc";
					$sql9 = mysqli_query($con, $query7);
					while($datacair = mysqli_fetch_array($sql9)){
					$cair = $datacair['tanggal_input'];
					?>
					<?php echo  date('d/m/Y', strtotime($cair))?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: left" nowrap>
					<?php
					$query7 = "SELECT * from data_slik where nama_pemohon='$user1' and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='Yes' order by nama_nasabah asc";
					$sql9 = mysqli_query($con, $query7);
					while($datacair = mysqli_fetch_array($sql9)){
					$cair = $datacair['nama_nasabah'];
					?>
					<?php echo  $cair?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: center" nowrap>
					<?php
					$query7 = "SELECT * from data_slik where nama_pemohon='$user1' and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='Yes' order by nama_nasabah asc";
					$sql9 = mysqli_query($con, $query7);
					while($datacair = mysqli_fetch_array($sql9)){
					$cair = $datacair['tanggal_input'];
					?>
					<?php echo  date('d/m/Y', strtotime($cair))?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: left" nowrap>
					<?php
					$query7 = "SELECT * from data_slik where nama_pemohon='$user1' and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='No' order by nama_nasabah asc";
					$sql9 = mysqli_query($con, $query7);
					while($datacair = mysqli_fetch_array($sql9)){
					$cair = $datacair['nama_nasabah'];
					?>
					<?php echo  $cair?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: center" nowrap>
					<?php
					$query7 = "SELECT * from data_slik where nama_pemohon='$user1' and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='No' order by nama_nasabah asc";
					$sql9 = mysqli_query($con, $query7);
					while($datacair = mysqli_fetch_array($sql9)){
					$cair = $datacair['tanggal_input'];
					?>
					<?php echo  date('d/m/Y', strtotime($cair))?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: left" nowrap>
					<?php
					$query7 = "SELECT * from data_slik where nama_pemohon='$user1' and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='-' order by nama_nasabah asc";
					$sql9 = mysqli_query($con, $query7);
					while($datacair = mysqli_fetch_array($sql9)){
					$cair = $datacair['nama_nasabah'];
					?>
					<?php echo  $cair?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: center" nowrap>
					<?php
					$query7 = "SELECT * from data_slik where nama_pemohon='$user1' and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='-' order by nama_nasabah asc";
					$sql9 = mysqli_query($con, $query7);
					while($datacair = mysqli_fetch_array($sql9)){
					$cair = $datacair['tanggal_input'];
					?>
					<?php echo  date('d/m/Y', strtotime($cair))?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: center">
					<?php
					$query3= "SELECT p1.tanggal_input, pn.plafond from data_slik p1, permohonan_analisa_kredit pn where p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc2' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='AKproses' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='AKproses2' or 
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='revised' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='KAKproses2' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='KAKproses'";
					$sql5 = mysqli_query($con, $query3);
					while($datapdka = mysqli_fetch_array($sql5)){
					$pdka = $datapdka['plafond'];
					?>
					<?php echo  number_format($pdka)?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: center">
					<?php
					$query4= "SELECT p1.tanggal_input, pn.plafond from data_slik p1, permohonan_analisa_kredit pn where p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc2' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='AKproses' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='AKproses2' or 
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='revised' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='KAKproses2' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='KAKproses'";
					$sql6 = mysqli_query($con, $query4);
					while($datatdka = mysqli_fetch_array($sql6)){
					$tdka = $datatdka['tanggal_input'];
					?>
					<?php echo  date('d/m/Y', strtotime($tdka))?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: center">
					<?php
					$query5= "SELECT p1.tanggal_input, pn.plafond from data_slik p1, permohonan_analisa_kredit pn where p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc3' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc2' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc'";
					$sql7 = mysqli_query($con, $query5);
					while($datapdkaacc = mysqli_fetch_array($sql7)){
					$pdkaacc = $datapdkaacc['plafond'];
					?>
					<?php echo  number_format($pdkaacc)?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: center">
					<?php
					$query6 = "SELECT p1.tanggal_input, pn.plafond from data_slik p1, permohonan_analisa_kredit pn where p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc3' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc2' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc'";
					$sql8 = mysqli_query($con, $query6);
					while($datatdkaacc = mysqli_fetch_array($sql8)){
					$tdkaacc = $datatdkaacc['tanggal_input'];
					?>
					<?php echo  date('d/m/Y', strtotime($tdkaacc))?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: center">
					<?php
					$query7 = "SELECT * from input_targetao where nama_ao='$user1' and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun";
					$sql9 = mysqli_query($con, $query7);
					while($datacair = mysqli_fetch_array($sql9)){
					$cair = $datacair['plafond'];
					?>
					<?php echo  number_format($cair)?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: center">
					<?php
					$query8 = "SELECT * from input_targetao where nama_ao='$user1' and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun";
					$sql10 = mysqli_query($con, $query8);
					while($datacair = mysqli_fetch_array($sql10)){
					$cairtgl = $datacair['tanggal_input'];
					?>
					<?php echo  date('d/m/Y', strtotime($cairtgl))?><br>
					<?php
					};				
					?>
					</td>
				</tr>
				<tr style="background-color: rgba(221,220,223,1.00)">
					</td>
						<?php 
						$query2= "SELECT *,
						(SELECT COUNT(*) FROM data_slik WHERE month(tanggal_input)=$bulan_lalu and year(tanggal_input)=$tahun and status='Yes' and nama_pemohon='$user1') AS Tslikyes,
						(SELECT COUNT(*) FROM data_slik WHERE month(tanggal_input)=$bulan_lalu and year(tanggal_input)=$tahun and status='No' and nama_pemohon='$user1') AS Tslikno,
						(SELECT COUNT(*) FROM data_slik WHERE month(tanggal_input)=$bulan_lalu and year(tanggal_input)=$tahun and status='-' and nama_pemohon='$user1') AS Tsliku
						FROM data_ao_landing where kode_perusahaan='111' group by nama_ao";
						$sql4 = mysqli_query($con, $query2);
						$datas1 = mysqli_fetch_array($sql4);
						?>
					<td colspan="2" style="text-align: center">
						<?php echo("Total : ".$datas1['Tslikyes'])?>
					</td>
					<td colspan="2" style="text-align: center">
						<?php echo("Total : ".$datas1['Tslikno'])?>
					</td>
					<td colspan="2" style="text-align: center">
						<?php 
							$query = "SELECT COUNT(nama_nasabah) as tsco1 FROM data_slik WHERE NOT EXISTS (select nama_nasabah from permohonan_analisa_kredit where data_slik.nama_nasabah=permohonan_analisa_kredit.nama_nasabah and data_slik.nama_pemohon=permohonan_analisa_kredit.nama_ao) and nama_pemohon='$user1' and status='Yes' and month(tanggal_input)=$bulan_lalu and year(tanggal_input)=$tahun"; 
			  				$sql3 = mysqli_query($con, $query);
			  				$datasco1 = mysqli_fetch_array($sql3);
						echo("Total : ".$datasco1['tsco1'])
						?>
					</td>
						<?php 
						$query2= "SELECT *,
						(SELECT COUNT(*) FROM data_slik WHERE month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='Yes' and nama_pemohon='$user1') AS Tslikyes,
						(SELECT COUNT(*) FROM data_slik WHERE month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='No' and nama_pemohon='$user1') AS Tslikno,
						(SELECT COUNT(*) FROM data_slik WHERE month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='-' and nama_pemohon='$user1') AS Tsliku
						FROM data_ao_landing where kode_perusahaan='111' group by nama_ao";
						$sql4 = mysqli_query($con, $query2);
						$datas1 = mysqli_fetch_array($sql4);
						?>
					<td colspan="2"  style="text-align: center">
						<?php echo("Total : ".$datas1['Tslikyes'])?>
					</td>
					<td colspan="2" style="text-align: center">
						<?php echo("Total : ".$datas1['Tslikno'])?>
					</td>
					<td colspan="2" style="text-align: center">
						<?php echo("Total : ".$datas1['Tsliku'])?>
					</td>
					<td colspan="2" style="text-align: center">
					<?php
					$query3= "SELECT sum(pn.plafond) as total from data_slik p1, permohonan_analisa_kredit pn where p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc2' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='AKproses' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='AKproses2' or 
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='revised' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='KAKproses2' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='KAKproses'";
					$sql5 = mysqli_query($con, $query3);
					while($datapdka = mysqli_fetch_array($sql5)){
					$pdka = $datapdka['total'];
					?>
					<?php echo  "Total : ". number_format($pdka)?><br>
					<?php
					};				
					?>
					</td>
					<td colspan="2" style="text-align: center">
					<?php
					$query5= "SELECT SUM(pn.plafond) as total from data_slik p1, permohonan_analisa_kredit pn where p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc3' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc2' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc'";
					$sql7 = mysqli_query($con, $query5);
					while($datapdkaacc = mysqli_fetch_array($sql7)){
					$pdkaacc = $datapdkaacc['total'];
					?>
					<?php echo  "Total : " . number_format($pdkaacc)?><br>
					<?php
					};				
					?>
					</td>
					<td colspan="2" style="text-align: center">
					<?php
					$query7 = "SELECT SUM(plafond) as total from input_targetao where nama_ao='$user1' and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun";
					$sql9 = mysqli_query($con, $query7);
					while($datacair = mysqli_fetch_array($sql9)){
					$cair = $datacair['total'];
					?>
					<?php echo "Total : ".  number_format($cair)?><br>
					<?php
					};				
					?>
				</tr>
		
				<tr>
					<?php $user1	= 'Denis Periyogi';?>
					<td rowspan="2">
						2.
					</td>
					<td rowspan="2" nowrap>
						Denis Periyogi
					</td>
					<td rowspan="2" style="text-align: center">
						<?php 
							$sql1	=  mysqli_query($con, "SELECT COUNT(nama_user) as tcao1 FROM ao_data_call WHERE  month(tanggal)=$bulan and year(tanggal)=$tahun and nama_user='$user1'");
							$dataakt1 = mysqli_fetch_array($sql1);
						echo($dataakt1['tcao1'])
						?>
					</td>
					<td rowspan="2" style="text-align: center">
						<?php 
							$sql2	=  mysqli_query($con, "SELECT COUNT(nama_karyawan) as tvao1 FROM sales_plan WHERE  month(tanggal_sp)=$bulan and year(tanggal_sp)=$tahun and nama_karyawan='$user1'");
							$dataakt2 = mysqli_fetch_array($sql2);
						echo($dataakt2['tvao1'])
						?>
					</td>
					<td style="text-align: left;" nowrap>
					<?php
					$query7 = "SELECT * from data_slik where nama_pemohon='$user1' and month(tanggal_input)=$bulan_lalu and year(tanggal_input)=$tahun and status='Yes' order by nama_nasabah asc";
					$sql9 = mysqli_query($con, $query7);
					while($datacair = mysqli_fetch_array($sql9)){
					$cair = $datacair['nama_nasabah'];
					?>
					<?php echo  $cair?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: center" nowrap>
					<?php
					$query7 = "SELECT * from data_slik where nama_pemohon='$user1' and month(tanggal_input)=$bulan_lalu and year(tanggal_input)=$tahun and status='Yes' order by nama_nasabah asc";
					$sql9 = mysqli_query($con, $query7);
					while($datacair = mysqli_fetch_array($sql9)){
					$cair = $datacair['tanggal_input'];
					?>
					<?php echo  date('d/m/Y', strtotime($cair))?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: left" nowrap>
					<?php
					$query7 = "SELECT * from data_slik where nama_pemohon='$user1' and month(tanggal_input)=$bulan_lalu and year(tanggal_input)=$tahun and status='No' order by nama_nasabah asc";
					$sql9 = mysqli_query($con, $query7);
					while($datacair = mysqli_fetch_array($sql9)){
					$cair = $datacair['nama_nasabah'];
					?>
					<?php echo  $cair?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: center" nowrap>
					<?php
					$query7 = "SELECT * from data_slik where nama_pemohon='$user1' and month(tanggal_input)=$bulan_lalu and year(tanggal_input)=$tahun and status='No' order by nama_nasabah asc";
					$sql9 = mysqli_query($con, $query7);
					while($datacair = mysqli_fetch_array($sql9)){
					$cair = $datacair['tanggal_input'];
					?>
					<?php echo  date('d/m/Y', strtotime($cair))?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: left" nowrap>
					<?php
					$query7 = "SELECT nama_nasabah from data_slik where NOT EXISTS (select nama_nasabah from permohonan_analisa_kredit where data_slik.nama_nasabah=permohonan_analisa_kredit.nama_nasabah and data_slik.nama_pemohon=permohonan_analisa_kredit.nama_ao) and nama_pemohon='$user1' and status='Yes' and month(tanggal_input)=$bulan_lalu and year(tanggal_input)=$tahun order by nama_nasabah asc";
					$sql9 = mysqli_query($con, $query7);
					while($datacair = mysqli_fetch_array($sql9)){
					$cair = $datacair['nama_nasabah'];
					?>
					<?php echo  $cair?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: left" nowrap>
					<?php
					$query7 = "SELECT tanggal_input from data_slik where NOT EXISTS (select nama_nasabah from permohonan_analisa_kredit where data_slik.nama_nasabah=permohonan_analisa_kredit.nama_nasabah and data_slik.nama_pemohon=permohonan_analisa_kredit.nama_ao) and nama_pemohon='$user1' and status='Yes' and month(tanggal_input)=$bulan_lalu and year(tanggal_input)=$tahun order by nama_nasabah asc";
					$sql9 = mysqli_query($con, $query7);
					while($datacair = mysqli_fetch_array($sql9)){
					$cair = $datacair['tanggal_input'];
					?>
					<?php echo  date('d/m/Y', strtotime($cair))?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: left" nowrap>
					<?php
					$query7 = "SELECT * from data_slik where nama_pemohon='$user1' and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='Yes' order by nama_nasabah asc";
					$sql9 = mysqli_query($con, $query7);
					while($datacair = mysqli_fetch_array($sql9)){
					$cair = $datacair['nama_nasabah'];
					?>
					<?php echo  $cair?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: center" nowrap>
					<?php
					$query7 = "SELECT * from data_slik where nama_pemohon='$user1' and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='Yes' order by nama_nasabah asc";
					$sql9 = mysqli_query($con, $query7);
					while($datacair = mysqli_fetch_array($sql9)){
					$cair = $datacair['tanggal_input'];
					?>
					<?php echo  date('d/m/Y', strtotime($cair))?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: left" nowrap>
					<?php
					$query7 = "SELECT * from data_slik where nama_pemohon='$user1' and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='No' order by nama_nasabah asc";
					$sql9 = mysqli_query($con, $query7);
					while($datacair = mysqli_fetch_array($sql9)){
					$cair = $datacair['nama_nasabah'];
					?>
					<?php echo  $cair?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: center" nowrap>
					<?php
					$query7 = "SELECT * from data_slik where nama_pemohon='$user1' and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='No' order by nama_nasabah asc";
					$sql9 = mysqli_query($con, $query7);
					while($datacair = mysqli_fetch_array($sql9)){
					$cair = $datacair['tanggal_input'];
					?>
					<?php echo  date('d/m/Y', strtotime($cair))?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: left" nowrap>
					<?php
					$query7 = "SELECT * from data_slik where nama_pemohon='$user1' and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='-' order by nama_nasabah asc";
					$sql9 = mysqli_query($con, $query7);
					while($datacair = mysqli_fetch_array($sql9)){
					$cair = $datacair['nama_nasabah'];
					?>
					<?php echo  $cair?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: center" nowrap>
					<?php
					$query7 = "SELECT * from data_slik where nama_pemohon='$user1' and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='-' order by nama_nasabah asc";
					$sql9 = mysqli_query($con, $query7);
					while($datacair = mysqli_fetch_array($sql9)){
					$cair = $datacair['tanggal_input'];
					?>
					<?php echo  date('d/m/Y', strtotime($cair))?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: center">
					<?php
					$query3= "SELECT p1.tanggal_input, pn.plafond from data_slik p1, permohonan_analisa_kredit pn where p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc2' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='AKproses' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='AKproses2' or 
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='revised' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='KAKproses2' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='KAKproses'";
					$sql5 = mysqli_query($con, $query3);
					while($datapdka = mysqli_fetch_array($sql5)){
					$pdka = $datapdka['plafond'];
					?>
					<?php echo  number_format($pdka)?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: center">
					<?php
					$query4= "SELECT p1.tanggal_input, pn.plafond from data_slik p1, permohonan_analisa_kredit pn where p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc2' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='AKproses' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='AKproses2' or 
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='revised' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='KAKproses2' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='KAKproses'";
					$sql6 = mysqli_query($con, $query4);
					while($datatdka = mysqli_fetch_array($sql6)){
					$tdka = $datatdka['tanggal_input'];
					?>
					<?php echo  date('d/m/Y', strtotime($tdka))?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: center">
					<?php
					$query5= "SELECT p1.tanggal_input, pn.plafond from data_slik p1, permohonan_analisa_kredit pn where p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc3' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc2' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc'";
					$sql7 = mysqli_query($con, $query5);
					while($datapdkaacc = mysqli_fetch_array($sql7)){
					$pdkaacc = $datapdkaacc['plafond'];
					?>
					<?php echo  number_format($pdkaacc)?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: center">
					<?php
					$query6 = "SELECT p1.tanggal_input, pn.plafond from data_slik p1, permohonan_analisa_kredit pn where p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc3' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc2' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc'";
					$sql8 = mysqli_query($con, $query6);
					while($datatdkaacc = mysqli_fetch_array($sql8)){
					$tdkaacc = $datatdkaacc['tanggal_input'];
					?>
					<?php echo  date('d/m/Y', strtotime($tdkaacc))?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: center">
					<?php
					$query7 = "SELECT * from input_targetao where nama_ao='$user1' and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun";
					$sql9 = mysqli_query($con, $query7);
					while($datacair = mysqli_fetch_array($sql9)){
					$cair = $datacair['plafond'];
					?>
					<?php echo  number_format($cair)?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: center">
					<?php
					$query8 = "SELECT * from input_targetao where nama_ao='$user1' and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun";
					$sql10 = mysqli_query($con, $query8);
					while($datacair = mysqli_fetch_array($sql10)){
					$cairtgl = $datacair['tanggal_input'];
					?>
					<?php echo  date('d/m/Y', strtotime($cairtgl))?><br>
					<?php
					};				
					?>
					</td>
				</tr>
				<tr>
					</td>
						<?php 
						$query2= "SELECT *,
						(SELECT COUNT(*) FROM data_slik WHERE month(tanggal_input)=$bulan_lalu and year(tanggal_input)=$tahun and status='Yes' and nama_pemohon='$user1') AS Tslikyes,
						(SELECT COUNT(*) FROM data_slik WHERE month(tanggal_input)=$bulan_lalu and year(tanggal_input)=$tahun and status='No' and nama_pemohon='$user1') AS Tslikno,
						(SELECT COUNT(*) FROM data_slik WHERE month(tanggal_input)=$bulan_lalu and year(tanggal_input)=$tahun and status='-' and nama_pemohon='$user1') AS Tsliku
						FROM data_ao_landing where kode_perusahaan='111' group by nama_ao";
						$sql4 = mysqli_query($con, $query2);
						$datas1 = mysqli_fetch_array($sql4);
						?>
					<td colspan="2" style="text-align: center">
						<?php echo("Total : ".$datas1['Tslikyes'])?>
					</td>
					<td colspan="2" style="text-align: center">
						<?php echo("Total : ".$datas1['Tslikno'])?>
					</td>
					<td colspan="2" style="text-align: center">
						<?php 
							$query = "SELECT COUNT(nama_nasabah) as tsco1 FROM data_slik WHERE NOT EXISTS (select nama_nasabah from permohonan_analisa_kredit where data_slik.nama_nasabah=permohonan_analisa_kredit.nama_nasabah and data_slik.nama_pemohon=permohonan_analisa_kredit.nama_ao) and nama_pemohon='$user1' and status='Yes' and month(tanggal_input)=$bulan_lalu and year(tanggal_input)=$tahun"; 
			  				$sql3 = mysqli_query($con, $query);
			  				$datasco1 = mysqli_fetch_array($sql3);
						echo("Total : ".$datasco1['tsco1'])
						?>
					</td>
						<?php 
						$query2= "SELECT *,
						(SELECT COUNT(*) FROM data_slik WHERE month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='Yes' and nama_pemohon='$user1') AS Tslikyes,
						(SELECT COUNT(*) FROM data_slik WHERE month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='No' and nama_pemohon='$user1') AS Tslikno,
						(SELECT COUNT(*) FROM data_slik WHERE month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='-' and nama_pemohon='$user1') AS Tsliku
						FROM data_ao_landing where kode_perusahaan='111' group by nama_ao";
						$sql4 = mysqli_query($con, $query2);
						$datas1 = mysqli_fetch_array($sql4);
						?>
					<td colspan="2"  style="text-align: center">
						<?php echo("Total : ".$datas1['Tslikyes'])?>
					</td>
					<td colspan="2" style="text-align: center">
						<?php echo("Total : ".$datas1['Tslikno'])?>
					</td>
					<td colspan="2" style="text-align: center">
						<?php echo("Total : ".$datas1['Tsliku'])?>
					</td>
					<td colspan="2" style="text-align: center">
					<?php
					$query3= "SELECT sum(pn.plafond) as total from data_slik p1, permohonan_analisa_kredit pn where p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc2' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='AKproses' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='AKproses2' or 
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='revised' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='KAKproses2' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='KAKproses'";
					$sql5 = mysqli_query($con, $query3);
					while($datapdka = mysqli_fetch_array($sql5)){
					$pdka = $datapdka['total'];
					?>
					<?php echo  "Total : ". number_format($pdka)?><br>
					<?php
					};				
					?>
					</td>
					<td colspan="2" style="text-align: center">
					<?php
					$query5= "SELECT SUM(pn.plafond) as total from data_slik p1, permohonan_analisa_kredit pn where p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc3' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc2' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc'";
					$sql7 = mysqli_query($con, $query5);
					while($datapdkaacc = mysqli_fetch_array($sql7)){
					$pdkaacc = $datapdkaacc['total'];
					?>
					<?php echo  "Total : " . number_format($pdkaacc)?><br>
					<?php
					};				
					?>
					</td>
					<td colspan="2" style="text-align: center">
					<?php
					$query7 = "SELECT SUM(plafond) as total from input_targetao where nama_ao='$user1' and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun";
					$sql9 = mysqli_query($con, $query7);
					while($datacair = mysqli_fetch_array($sql9)){
					$cair = $datacair['total'];
					?>
					<?php echo "Total : ".  number_format($cair)?><br>
					<?php
					};				
					?>
				</tr>
		
				<tr style="background-color: rgba(221,220,223,1.00)">
					<?php $user1	= 'M. Eko Nugroho. P';?>
					<td rowspan="2">
						3.
					</td>
					<td rowspan="2" nowrap>
						M. Eko Nugroho. P
					</td>
					<td rowspan="2" style="text-align: center">
						<?php 
							$sql1	=  mysqli_query($con, "SELECT COUNT(nama_user) as tcao1 FROM ao_data_call WHERE  month(tanggal)=$bulan and year(tanggal)=$tahun and nama_user='$user1'");
							$dataakt1 = mysqli_fetch_array($sql1);
						echo($dataakt1['tcao1'])
						?>
					</td>
					<td rowspan="2" style="text-align: center">
						<?php 
							$sql2	=  mysqli_query($con, "SELECT COUNT(nama_karyawan) as tvao1 FROM sales_plan WHERE  month(tanggal_sp)=$bulan and year(tanggal_sp)=$tahun and nama_karyawan='$user1'");
							$dataakt2 = mysqli_fetch_array($sql2);
						echo($dataakt2['tvao1'])
						?>
					</td>
					<td style="text-align: left;" nowrap>
					<?php
					$query7 = "SELECT * from data_slik where nama_pemohon='$user1' and month(tanggal_input)=$bulan_lalu and year(tanggal_input)=$tahun and status='Yes' order by nama_nasabah asc";
					$sql9 = mysqli_query($con, $query7);
					while($datacair = mysqli_fetch_array($sql9)){
					$cair = $datacair['nama_nasabah'];
					?>
					<?php echo  $cair?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: center" nowrap>
					<?php
					$query7 = "SELECT * from data_slik where nama_pemohon='$user1' and month(tanggal_input)=$bulan_lalu and year(tanggal_input)=$tahun and status='Yes' order by nama_nasabah asc";
					$sql9 = mysqli_query($con, $query7);
					while($datacair = mysqli_fetch_array($sql9)){
					$cair = $datacair['tanggal_input'];
					?>
					<?php echo  date('d/m/Y', strtotime($cair))?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: left" nowrap>
					<?php
					$query7 = "SELECT * from data_slik where nama_pemohon='$user1' and month(tanggal_input)=$bulan_lalu and year(tanggal_input)=$tahun and status='No' order by nama_nasabah asc";
					$sql9 = mysqli_query($con, $query7);
					while($datacair = mysqli_fetch_array($sql9)){
					$cair = $datacair['nama_nasabah'];
					?>
					<?php echo  $cair?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: center" nowrap>
					<?php
					$query7 = "SELECT * from data_slik where nama_pemohon='$user1' and month(tanggal_input)=$bulan_lalu and year(tanggal_input)=$tahun and status='No' order by nama_nasabah asc";
					$sql9 = mysqli_query($con, $query7);
					while($datacair = mysqli_fetch_array($sql9)){
					$cair = $datacair['tanggal_input'];
					?>
					<?php echo  date('d/m/Y', strtotime($cair))?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: left" nowrap>
					<?php
					$query7 = "SELECT nama_nasabah from data_slik where NOT EXISTS (select nama_nasabah from permohonan_analisa_kredit where data_slik.nama_nasabah=permohonan_analisa_kredit.nama_nasabah and data_slik.nama_pemohon=permohonan_analisa_kredit.nama_ao) and nama_pemohon='$user1' and status='Yes' and month(tanggal_input)=$bulan_lalu and year(tanggal_input)=$tahun order by nama_nasabah asc";
					$sql9 = mysqli_query($con, $query7);
					while($datacair = mysqli_fetch_array($sql9)){
					$cair = $datacair['nama_nasabah'];
					?>
					<?php echo  $cair?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: left" nowrap>
					<?php
					$query7 = "SELECT tanggal_input from data_slik where NOT EXISTS (select nama_nasabah from permohonan_analisa_kredit where data_slik.nama_nasabah=permohonan_analisa_kredit.nama_nasabah and data_slik.nama_pemohon=permohonan_analisa_kredit.nama_ao) and nama_pemohon='$user1' and status='Yes' and month(tanggal_input)=$bulan_lalu and year(tanggal_input)=$tahun order by nama_nasabah asc";
					$sql9 = mysqli_query($con, $query7);
					while($datacair = mysqli_fetch_array($sql9)){
					$cair = $datacair['tanggal_input'];
					?>
					<?php echo  date('d/m/Y', strtotime($cair))?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: left" nowrap>
					<?php
					$query7 = "SELECT * from data_slik where nama_pemohon='$user1' and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='Yes' order by nama_nasabah asc";
					$sql9 = mysqli_query($con, $query7);
					while($datacair = mysqli_fetch_array($sql9)){
					$cair = $datacair['nama_nasabah'];
					?>
					<?php echo  $cair?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: center" nowrap>
					<?php
					$query7 = "SELECT * from data_slik where nama_pemohon='$user1' and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='Yes' order by nama_nasabah asc";
					$sql9 = mysqli_query($con, $query7);
					while($datacair = mysqli_fetch_array($sql9)){
					$cair = $datacair['tanggal_input'];
					?>
					<?php echo  date('d/m/Y', strtotime($cair))?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: left" nowrap>
					<?php
					$query7 = "SELECT * from data_slik where nama_pemohon='$user1' and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='No' order by nama_nasabah asc";
					$sql9 = mysqli_query($con, $query7);
					while($datacair = mysqli_fetch_array($sql9)){
					$cair = $datacair['nama_nasabah'];
					?>
					<?php echo  $cair?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: center" nowrap>
					<?php
					$query7 = "SELECT * from data_slik where nama_pemohon='$user1' and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='No' order by nama_nasabah asc";
					$sql9 = mysqli_query($con, $query7);
					while($datacair = mysqli_fetch_array($sql9)){
					$cair = $datacair['tanggal_input'];
					?>
					<?php echo  date('d/m/Y', strtotime($cair))?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: left" nowrap>
					<?php
					$query7 = "SELECT * from data_slik where nama_pemohon='$user1' and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='-' order by nama_nasabah asc";
					$sql9 = mysqli_query($con, $query7);
					while($datacair = mysqli_fetch_array($sql9)){
					$cair = $datacair['nama_nasabah'];
					?>
					<?php echo  $cair?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: center" nowrap>
					<?php
					$query7 = "SELECT * from data_slik where nama_pemohon='$user1' and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='-' order by nama_nasabah asc";
					$sql9 = mysqli_query($con, $query7);
					while($datacair = mysqli_fetch_array($sql9)){
					$cair = $datacair['tanggal_input'];
					?>
					<?php echo  date('d/m/Y', strtotime($cair))?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: center">
					<?php
					$query3= "SELECT p1.tanggal_input, pn.plafond from data_slik p1, permohonan_analisa_kredit pn where p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc2' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='AKproses' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='AKproses2' or 
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='revised' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='KAKproses2' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='KAKproses'";
					$sql5 = mysqli_query($con, $query3);
					while($datapdka = mysqli_fetch_array($sql5)){
					$pdka = $datapdka['plafond'];
					?>
					<?php echo  number_format($pdka)?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: center">
					<?php
					$query4= "SELECT p1.tanggal_input, pn.plafond from data_slik p1, permohonan_analisa_kredit pn where p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc2' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='AKproses' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='AKproses2' or 
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='revised' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='KAKproses2' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='KAKproses'";
					$sql6 = mysqli_query($con, $query4);
					while($datatdka = mysqli_fetch_array($sql6)){
					$tdka = $datatdka['tanggal_input'];
					?>
					<?php echo  date('d/m/Y', strtotime($tdka))?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: center">
					<?php
					$query5= "SELECT p1.tanggal_input, pn.plafond from data_slik p1, permohonan_analisa_kredit pn where p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc3' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc2' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc'";
					$sql7 = mysqli_query($con, $query5);
					while($datapdkaacc = mysqli_fetch_array($sql7)){
					$pdkaacc = $datapdkaacc['plafond'];
					?>
					<?php echo  number_format($pdkaacc)?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: center">
					<?php
					$query6 = "SELECT p1.tanggal_input, pn.plafond from data_slik p1, permohonan_analisa_kredit pn where p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc3' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc2' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc'";
					$sql8 = mysqli_query($con, $query6);
					while($datatdkaacc = mysqli_fetch_array($sql8)){
					$tdkaacc = $datatdkaacc['tanggal_input'];
					?>
					<?php echo  date('d/m/Y', strtotime($tdkaacc))?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: center">
					<?php
					$query7 = "SELECT * from input_targetao where nama_ao='$user1' and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun";
					$sql9 = mysqli_query($con, $query7);
					while($datacair = mysqli_fetch_array($sql9)){
					$cair = $datacair['plafond'];
					?>
					<?php echo  number_format($cair)?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: center">
					<?php
					$query8 = "SELECT * from input_targetao where nama_ao='$user1' and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun";
					$sql10 = mysqli_query($con, $query8);
					while($datacair = mysqli_fetch_array($sql10)){
					$cairtgl = $datacair['tanggal_input'];
					?>
					<?php echo  date('d/m/Y', strtotime($cairtgl))?><br>
					<?php
					};				
					?>
					</td>
				</tr>
				<tr style="background-color: rgba(221,220,223,1.00)">
					</td>
						<?php 
						$query2= "SELECT *,
						(SELECT COUNT(*) FROM data_slik WHERE month(tanggal_input)=$bulan_lalu and year(tanggal_input)=$tahun and status='Yes' and nama_pemohon='$user1') AS Tslikyes,
						(SELECT COUNT(*) FROM data_slik WHERE month(tanggal_input)=$bulan_lalu and year(tanggal_input)=$tahun and status='No' and nama_pemohon='$user1') AS Tslikno,
						(SELECT COUNT(*) FROM data_slik WHERE month(tanggal_input)=$bulan_lalu and year(tanggal_input)=$tahun and status='-' and nama_pemohon='$user1') AS Tsliku
						FROM data_ao_landing where kode_perusahaan='111' group by nama_ao";
						$sql4 = mysqli_query($con, $query2);
						$datas1 = mysqli_fetch_array($sql4);
						?>
					<td colspan="2" style="text-align: center">
						<?php echo("Total : ".$datas1['Tslikyes'])?>
					</td>
					<td colspan="2" style="text-align: center">
						<?php echo("Total : ".$datas1['Tslikno'])?>
					</td>
					<td colspan="2" style="text-align: center">
						<?php 
							$query = "SELECT COUNT(nama_nasabah) as tsco1 FROM data_slik WHERE NOT EXISTS (select nama_nasabah from permohonan_analisa_kredit where data_slik.nama_nasabah=permohonan_analisa_kredit.nama_nasabah and data_slik.nama_pemohon=permohonan_analisa_kredit.nama_ao) and nama_pemohon='$user1' and status='Yes' and month(tanggal_input)=$bulan_lalu and year(tanggal_input)=$tahun"; 
			  				$sql3 = mysqli_query($con, $query);
			  				$datasco1 = mysqli_fetch_array($sql3);
						echo("Total : ".$datasco1['tsco1'])
						?>
					</td>
						<?php 
						$query2= "SELECT *,
						(SELECT COUNT(*) FROM data_slik WHERE month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='Yes' and nama_pemohon='$user1') AS Tslikyes,
						(SELECT COUNT(*) FROM data_slik WHERE month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='No' and nama_pemohon='$user1') AS Tslikno,
						(SELECT COUNT(*) FROM data_slik WHERE month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='-' and nama_pemohon='$user1') AS Tsliku
						FROM data_ao_landing where kode_perusahaan='111' group by nama_ao";
						$sql4 = mysqli_query($con, $query2);
						$datas1 = mysqli_fetch_array($sql4);
						?>
					<td colspan="2"  style="text-align: center">
						<?php echo("Total : ".$datas1['Tslikyes'])?>
					</td>
					<td colspan="2" style="text-align: center">
						<?php echo("Total : ".$datas1['Tslikno'])?>
					</td>
					<td colspan="2" style="text-align: center">
						<?php echo("Total : ".$datas1['Tsliku'])?>
					</td>
					<td colspan="2" style="text-align: center">
					<?php
					$query3= "SELECT sum(pn.plafond) as total from data_slik p1, permohonan_analisa_kredit pn where p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc2' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='AKproses' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='AKproses2' or 
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='revised' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='KAKproses2' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='KAKproses'";
					$sql5 = mysqli_query($con, $query3);
					while($datapdka = mysqli_fetch_array($sql5)){
					$pdka = $datapdka['total'];
					?>
					<?php echo  "Total : ". number_format($pdka)?><br>
					<?php
					};				
					?>
					</td>
					<td colspan="2" style="text-align: center">
					<?php
					$query5= "SELECT SUM(pn.plafond) as total from data_slik p1, permohonan_analisa_kredit pn where p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc3' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc2' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc'";
					$sql7 = mysqli_query($con, $query5);
					while($datapdkaacc = mysqli_fetch_array($sql7)){
					$pdkaacc = $datapdkaacc['total'];
					?>
					<?php echo  "Total : " . number_format($pdkaacc)?><br>
					<?php
					};				
					?>
					</td>
					<td colspan="2" style="text-align: center">
					<?php
					$query7 = "SELECT SUM(plafond) as total from input_targetao where nama_ao='$user1' and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun";
					$sql9 = mysqli_query($con, $query7);
					while($datacair = mysqli_fetch_array($sql9)){
					$cair = $datacair['total'];
					?>
					<?php echo "Total : ".  number_format($cair)?><br>
					<?php
					};				
					?>
				</tr>
		
				<tr>
					<?php $user1	= 'M.Hafiz Iqbal';?>
					<td rowspan="2">
						4.
					</td>
					<td rowspan="2" nowrap>
						M.Hafiz Iqbal
					</td>
					<td rowspan="2" style="text-align: center">
						<?php 
							$sql1	=  mysqli_query($con, "SELECT COUNT(nama_user) as tcao1 FROM ao_data_call WHERE  month(tanggal)=$bulan and year(tanggal)=$tahun and nama_user='$user1'");
							$dataakt1 = mysqli_fetch_array($sql1);
						echo($dataakt1['tcao1'])
						?>
					</td>
					<td rowspan="2" style="text-align: center">
						<?php 
							$sql2	=  mysqli_query($con, "SELECT COUNT(nama_karyawan) as tvao1 FROM sales_plan WHERE  month(tanggal_sp)=$bulan and year(tanggal_sp)=$tahun and nama_karyawan='$user1'");
							$dataakt2 = mysqli_fetch_array($sql2);
						echo($dataakt2['tvao1'])
						?>
					</td>
					<td style="text-align: left;" nowrap>
					<?php
					$query7 = "SELECT * from data_slik where nama_pemohon='$user1' and month(tanggal_input)=$bulan_lalu and year(tanggal_input)=$tahun and status='Yes' order by nama_nasabah asc";
					$sql9 = mysqli_query($con, $query7);
					while($datacair = mysqli_fetch_array($sql9)){
					$cair = $datacair['nama_nasabah'];
					?>
					<?php echo  $cair?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: center" nowrap>
					<?php
					$query7 = "SELECT * from data_slik where nama_pemohon='$user1' and month(tanggal_input)=$bulan_lalu and year(tanggal_input)=$tahun and status='Yes' order by nama_nasabah asc";
					$sql9 = mysqli_query($con, $query7);
					while($datacair = mysqli_fetch_array($sql9)){
					$cair = $datacair['tanggal_input'];
					?>
					<?php echo  date('d/m/Y', strtotime($cair))?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: left" nowrap>
					<?php
					$query7 = "SELECT * from data_slik where nama_pemohon='$user1' and month(tanggal_input)=$bulan_lalu and year(tanggal_input)=$tahun and status='No' order by nama_nasabah asc";
					$sql9 = mysqli_query($con, $query7);
					while($datacair = mysqli_fetch_array($sql9)){
					$cair = $datacair['nama_nasabah'];
					?>
					<?php echo  $cair?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: center" nowrap>
					<?php
					$query7 = "SELECT * from data_slik where nama_pemohon='$user1' and month(tanggal_input)=$bulan_lalu and year(tanggal_input)=$tahun and status='No' order by nama_nasabah asc";
					$sql9 = mysqli_query($con, $query7);
					while($datacair = mysqli_fetch_array($sql9)){
					$cair = $datacair['tanggal_input'];
					?>
					<?php echo  date('d/m/Y', strtotime($cair))?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: left" nowrap>
					<?php
					$query7 = "SELECT nama_nasabah from data_slik where NOT EXISTS (select nama_nasabah from permohonan_analisa_kredit where data_slik.nama_nasabah=permohonan_analisa_kredit.nama_nasabah and data_slik.nama_pemohon=permohonan_analisa_kredit.nama_ao) and nama_pemohon='$user1' and status='Yes' and month(tanggal_input)=$bulan_lalu and year(tanggal_input)=$tahun order by nama_nasabah asc";
					$sql9 = mysqli_query($con, $query7);
					while($datacair = mysqli_fetch_array($sql9)){
					$cair = $datacair['nama_nasabah'];
					?>
					<?php echo  $cair?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: left" nowrap>
					<?php
					$query7 = "SELECT tanggal_input from data_slik where NOT EXISTS (select nama_nasabah from permohonan_analisa_kredit where data_slik.nama_nasabah=permohonan_analisa_kredit.nama_nasabah and data_slik.nama_pemohon=permohonan_analisa_kredit.nama_ao) and nama_pemohon='$user1' and status='Yes' and month(tanggal_input)=$bulan_lalu and year(tanggal_input)=$tahun order by nama_nasabah asc";
					$sql9 = mysqli_query($con, $query7);
					while($datacair = mysqli_fetch_array($sql9)){
					$cair = $datacair['tanggal_input'];
					?>
					<?php echo  date('d/m/Y', strtotime($cair))?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: left" nowrap>
					<?php
					$query7 = "SELECT * from data_slik where nama_pemohon='$user1' and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='Yes' order by nama_nasabah asc";
					$sql9 = mysqli_query($con, $query7);
					while($datacair = mysqli_fetch_array($sql9)){
					$cair = $datacair['nama_nasabah'];
					?>
					<?php echo  $cair?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: center" nowrap>
					<?php
					$query7 = "SELECT * from data_slik where nama_pemohon='$user1' and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='Yes' order by nama_nasabah asc";
					$sql9 = mysqli_query($con, $query7);
					while($datacair = mysqli_fetch_array($sql9)){
					$cair = $datacair['tanggal_input'];
					?>
					<?php echo  date('d/m/Y', strtotime($cair))?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: left" nowrap>
					<?php
					$query7 = "SELECT * from data_slik where nama_pemohon='$user1' and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='No' order by nama_nasabah asc";
					$sql9 = mysqli_query($con, $query7);
					while($datacair = mysqli_fetch_array($sql9)){
					$cair = $datacair['nama_nasabah'];
					?>
					<?php echo  $cair?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: center" nowrap>
					<?php
					$query7 = "SELECT * from data_slik where nama_pemohon='$user1' and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='No' order by nama_nasabah asc";
					$sql9 = mysqli_query($con, $query7);
					while($datacair = mysqli_fetch_array($sql9)){
					$cair = $datacair['tanggal_input'];
					?>
					<?php echo  date('d/m/Y', strtotime($cair))?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: left" nowrap>
					<?php
					$query7 = "SELECT * from data_slik where nama_pemohon='$user1' and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='-' order by nama_nasabah asc";
					$sql9 = mysqli_query($con, $query7);
					while($datacair = mysqli_fetch_array($sql9)){
					$cair = $datacair['nama_nasabah'];
					?>
					<?php echo  $cair?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: center" nowrap>
					<?php
					$query7 = "SELECT * from data_slik where nama_pemohon='$user1' and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='-' order by nama_nasabah asc";
					$sql9 = mysqli_query($con, $query7);
					while($datacair = mysqli_fetch_array($sql9)){
					$cair = $datacair['tanggal_input'];
					?>
					<?php echo  date('d/m/Y', strtotime($cair))?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: center">
					<?php
					$query3= "SELECT p1.tanggal_input, pn.plafond from data_slik p1, permohonan_analisa_kredit pn where p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc2' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='AKproses' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='AKproses2' or 
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='revised' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='KAKproses2' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='KAKproses'";
					$sql5 = mysqli_query($con, $query3);
					while($datapdka = mysqli_fetch_array($sql5)){
					$pdka = $datapdka['plafond'];
					?>
					<?php echo  number_format($pdka)?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: center">
					<?php
					$query4= "SELECT p1.tanggal_input, pn.plafond from data_slik p1, permohonan_analisa_kredit pn where p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc2' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='AKproses' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='AKproses2' or 
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='revised' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='KAKproses2' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='KAKproses'";
					$sql6 = mysqli_query($con, $query4);
					while($datatdka = mysqli_fetch_array($sql6)){
					$tdka = $datatdka['tanggal_input'];
					?>
					<?php echo  date('d/m/Y', strtotime($tdka))?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: center">
					<?php
					$query5= "SELECT p1.tanggal_input, pn.plafond from data_slik p1, permohonan_analisa_kredit pn where p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc3' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc2' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc'";
					$sql7 = mysqli_query($con, $query5);
					while($datapdkaacc = mysqli_fetch_array($sql7)){
					$pdkaacc = $datapdkaacc['plafond'];
					?>
					<?php echo  number_format($pdkaacc)?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: center">
					<?php
					$query6 = "SELECT p1.tanggal_input, pn.plafond from data_slik p1, permohonan_analisa_kredit pn where p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc3' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc2' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc'";
					$sql8 = mysqli_query($con, $query6);
					while($datatdkaacc = mysqli_fetch_array($sql8)){
					$tdkaacc = $datatdkaacc['tanggal_input'];
					?>
					<?php echo  date('d/m/Y', strtotime($tdkaacc))?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: center">
					<?php
					$query7 = "SELECT * from input_targetao where nama_ao='$user1' and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun";
					$sql9 = mysqli_query($con, $query7);
					while($datacair = mysqli_fetch_array($sql9)){
					$cair = $datacair['plafond'];
					?>
					<?php echo  number_format($cair)?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: center">
					<?php
					$query8 = "SELECT * from input_targetao where nama_ao='$user1' and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun";
					$sql10 = mysqli_query($con, $query8);
					while($datacair = mysqli_fetch_array($sql10)){
					$cairtgl = $datacair['tanggal_input'];
					?>
					<?php echo  date('d/m/Y', strtotime($cairtgl))?><br>
					<?php
					};				
					?>
					</td>
				</tr>
				<tr>
					</td>
						<?php 
						$query2= "SELECT *,
						(SELECT COUNT(*) FROM data_slik WHERE month(tanggal_input)=$bulan_lalu and year(tanggal_input)=$tahun and status='Yes' and nama_pemohon='$user1') AS Tslikyes,
						(SELECT COUNT(*) FROM data_slik WHERE month(tanggal_input)=$bulan_lalu and year(tanggal_input)=$tahun and status='No' and nama_pemohon='$user1') AS Tslikno,
						(SELECT COUNT(*) FROM data_slik WHERE month(tanggal_input)=$bulan_lalu and year(tanggal_input)=$tahun and status='-' and nama_pemohon='$user1') AS Tsliku
						FROM data_ao_landing where kode_perusahaan='111' group by nama_ao";
						$sql4 = mysqli_query($con, $query2);
						$datas1 = mysqli_fetch_array($sql4);
						?>
					<td colspan="2" style="text-align: center">
						<?php echo("Total : ".$datas1['Tslikyes'])?>
					</td>
					<td colspan="2" style="text-align: center">
						<?php echo("Total : ".$datas1['Tslikno'])?>
					</td>
					<td colspan="2" style="text-align: center">
						<?php 
							$query = "SELECT COUNT(nama_nasabah) as tsco1 FROM data_slik WHERE NOT EXISTS (select nama_nasabah from permohonan_analisa_kredit where data_slik.nama_nasabah=permohonan_analisa_kredit.nama_nasabah and data_slik.nama_pemohon=permohonan_analisa_kredit.nama_ao) and nama_pemohon='$user1' and status='Yes' and month(tanggal_input)=$bulan_lalu and year(tanggal_input)=$tahun"; 
			  				$sql3 = mysqli_query($con, $query);
			  				$datasco1 = mysqli_fetch_array($sql3);
						echo("Total : ".$datasco1['tsco1'])
						?>
					</td>
						<?php 
						$query2= "SELECT *,
						(SELECT COUNT(*) FROM data_slik WHERE month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='Yes' and nama_pemohon='$user1') AS Tslikyes,
						(SELECT COUNT(*) FROM data_slik WHERE month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='No' and nama_pemohon='$user1') AS Tslikno,
						(SELECT COUNT(*) FROM data_slik WHERE month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='-' and nama_pemohon='$user1') AS Tsliku
						FROM data_ao_landing where kode_perusahaan='111' group by nama_ao";
						$sql4 = mysqli_query($con, $query2);
						$datas1 = mysqli_fetch_array($sql4);
						?>
					<td colspan="2"  style="text-align: center">
						<?php echo("Total : ".$datas1['Tslikyes'])?>
					</td>
					<td colspan="2" style="text-align: center">
						<?php echo("Total : ".$datas1['Tslikno'])?>
					</td>
					<td colspan="2" style="text-align: center">
						<?php echo("Total : ".$datas1['Tsliku'])?>
					</td>
					<td colspan="2" style="text-align: center">
					<?php
					$query3= "SELECT sum(pn.plafond) as total from data_slik p1, permohonan_analisa_kredit pn where p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc2' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='AKproses' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='AKproses2' or 
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='revised' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='KAKproses2' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='KAKproses'";
					$sql5 = mysqli_query($con, $query3);
					while($datapdka = mysqli_fetch_array($sql5)){
					$pdka = $datapdka['total'];
					?>
					<?php echo  "Total : ". number_format($pdka)?><br>
					<?php
					};				
					?>
					</td>
					<td colspan="2" style="text-align: center">
					<?php
					$query5= "SELECT SUM(pn.plafond) as total from data_slik p1, permohonan_analisa_kredit pn where p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc3' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc2' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc'";
					$sql7 = mysqli_query($con, $query5);
					while($datapdkaacc = mysqli_fetch_array($sql7)){
					$pdkaacc = $datapdkaacc['total'];
					?>
					<?php echo  "Total : " . number_format($pdkaacc)?><br>
					<?php
					};				
					?>
					</td>
					<td colspan="2" style="text-align: center">
					<?php
					$query7 = "SELECT SUM(plafond) as total from input_targetao where nama_ao='$user1' and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun";
					$sql9 = mysqli_query($con, $query7);
					while($datacair = mysqli_fetch_array($sql9)){
					$cair = $datacair['total'];
					?>
					<?php echo "Total : ".  number_format($cair)?><br>
					<?php
					};				
					?>
				</tr>
		
				<tr style="background-color: rgba(221,220,223,1.00)">
					<?php $user1	= 'Moh. Adi Yosep Saputra';?>
					<td rowspan="2">
						5.
					</td>
					<td rowspan="2" nowrap>
						Moh. Adi Yosep Saputra
					</td>
					<td rowspan="2" style="text-align: center">
						<?php 
							$sql1	=  mysqli_query($con, "SELECT COUNT(nama_user) as tcao1 FROM ao_data_call WHERE  month(tanggal)=$bulan and year(tanggal)=$tahun and nama_user='$user1'");
							$dataakt1 = mysqli_fetch_array($sql1);
						echo($dataakt1['tcao1'])
						?>
					</td>
					<td rowspan="2" style="text-align: center">
						<?php 
							$sql2	=  mysqli_query($con, "SELECT COUNT(nama_karyawan) as tvao1 FROM sales_plan WHERE  month(tanggal_sp)=$bulan and year(tanggal_sp)=$tahun and nama_karyawan='$user1'");
							$dataakt2 = mysqli_fetch_array($sql2);
						echo($dataakt2['tvao1'])
						?>
					</td>
					<td style="text-align: left;" nowrap>
					<?php
					$query7 = "SELECT * from data_slik where nama_pemohon='$user1' and month(tanggal_input)=$bulan_lalu and year(tanggal_input)=$tahun and status='Yes' order by nama_nasabah asc";
					$sql9 = mysqli_query($con, $query7);
					while($datacair = mysqli_fetch_array($sql9)){
					$cair = $datacair['nama_nasabah'];
					?>
					<?php echo  $cair?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: center" nowrap>
					<?php
					$query7 = "SELECT * from data_slik where nama_pemohon='$user1' and month(tanggal_input)=$bulan_lalu and year(tanggal_input)=$tahun and status='Yes' order by nama_nasabah asc";
					$sql9 = mysqli_query($con, $query7);
					while($datacair = mysqli_fetch_array($sql9)){
					$cair = $datacair['tanggal_input'];
					?>
					<?php echo  date('d/m/Y', strtotime($cair))?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: left" nowrap>
					<?php
					$query7 = "SELECT * from data_slik where nama_pemohon='$user1' and month(tanggal_input)=$bulan_lalu and year(tanggal_input)=$tahun and status='No' order by nama_nasabah asc";
					$sql9 = mysqli_query($con, $query7);
					while($datacair = mysqli_fetch_array($sql9)){
					$cair = $datacair['nama_nasabah'];
					?>
					<?php echo  $cair?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: center" nowrap>
					<?php
					$query7 = "SELECT * from data_slik where nama_pemohon='$user1' and month(tanggal_input)=$bulan_lalu and year(tanggal_input)=$tahun and status='No' order by nama_nasabah asc";
					$sql9 = mysqli_query($con, $query7);
					while($datacair = mysqli_fetch_array($sql9)){
					$cair = $datacair['tanggal_input'];
					?>
					<?php echo  date('d/m/Y', strtotime($cair))?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: left" nowrap>
					<?php
					$query7 = "SELECT nama_nasabah from data_slik where NOT EXISTS (select nama_nasabah from permohonan_analisa_kredit where data_slik.nama_nasabah=permohonan_analisa_kredit.nama_nasabah and data_slik.nama_pemohon=permohonan_analisa_kredit.nama_ao) and nama_pemohon='$user1' and status='Yes' and month(tanggal_input)=$bulan_lalu and year(tanggal_input)=$tahun order by nama_nasabah asc";
					$sql9 = mysqli_query($con, $query7);
					while($datacair = mysqli_fetch_array($sql9)){
					$cair = $datacair['nama_nasabah'];
					?>
					<?php echo  $cair?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: left" nowrap>
					<?php
					$query7 = "SELECT tanggal_input from data_slik where NOT EXISTS (select nama_nasabah from permohonan_analisa_kredit where data_slik.nama_nasabah=permohonan_analisa_kredit.nama_nasabah and data_slik.nama_pemohon=permohonan_analisa_kredit.nama_ao) and nama_pemohon='$user1' and status='Yes' and month(tanggal_input)=$bulan_lalu and year(tanggal_input)=$tahun order by nama_nasabah asc";
					$sql9 = mysqli_query($con, $query7);
					while($datacair = mysqli_fetch_array($sql9)){
					$cair = $datacair['tanggal_input'];
					?>
					<?php echo  date('d/m/Y', strtotime($cair))?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: left" nowrap>
					<?php
					$query7 = "SELECT * from data_slik where nama_pemohon='$user1' and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='Yes' order by nama_nasabah asc";
					$sql9 = mysqli_query($con, $query7);
					while($datacair = mysqli_fetch_array($sql9)){
					$cair = $datacair['nama_nasabah'];
					?>
					<?php echo  $cair?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: center" nowrap>
					<?php
					$query7 = "SELECT * from data_slik where nama_pemohon='$user1' and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='Yes' order by nama_nasabah asc";
					$sql9 = mysqli_query($con, $query7);
					while($datacair = mysqli_fetch_array($sql9)){
					$cair = $datacair['tanggal_input'];
					?>
					<?php echo  date('d/m/Y', strtotime($cair))?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: left" nowrap>
					<?php
					$query7 = "SELECT * from data_slik where nama_pemohon='$user1' and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='No' order by nama_nasabah asc";
					$sql9 = mysqli_query($con, $query7);
					while($datacair = mysqli_fetch_array($sql9)){
					$cair = $datacair['nama_nasabah'];
					?>
					<?php echo  $cair?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: center" nowrap>
					<?php
					$query7 = "SELECT * from data_slik where nama_pemohon='$user1' and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='No' order by nama_nasabah asc";
					$sql9 = mysqli_query($con, $query7);
					while($datacair = mysqli_fetch_array($sql9)){
					$cair = $datacair['tanggal_input'];
					?>
					<?php echo  date('d/m/Y', strtotime($cair))?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: left" nowrap>
					<?php
					$query7 = "SELECT * from data_slik where nama_pemohon='$user1' and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='-' order by nama_nasabah asc";
					$sql9 = mysqli_query($con, $query7);
					while($datacair = mysqli_fetch_array($sql9)){
					$cair = $datacair['nama_nasabah'];
					?>
					<?php echo  $cair?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: center" nowrap>
					<?php
					$query7 = "SELECT * from data_slik where nama_pemohon='$user1' and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='-' order by nama_nasabah asc";
					$sql9 = mysqli_query($con, $query7);
					while($datacair = mysqli_fetch_array($sql9)){
					$cair = $datacair['tanggal_input'];
					?>
					<?php echo  date('d/m/Y', strtotime($cair))?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: center">
					<?php
					$query3= "SELECT p1.tanggal_input, pn.plafond from data_slik p1, permohonan_analisa_kredit pn where p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc2' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='AKproses' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='AKproses2' or 
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='revised' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='KAKproses2' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='KAKproses'";
					$sql5 = mysqli_query($con, $query3);
					while($datapdka = mysqli_fetch_array($sql5)){
					$pdka = $datapdka['plafond'];
					?>
					<?php echo  number_format($pdka)?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: center">
					<?php
					$query4= "SELECT p1.tanggal_input, pn.plafond from data_slik p1, permohonan_analisa_kredit pn where p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc2' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='AKproses' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='AKproses2' or 
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='revised' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='KAKproses2' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='KAKproses'";
					$sql6 = mysqli_query($con, $query4);
					while($datatdka = mysqli_fetch_array($sql6)){
					$tdka = $datatdka['tanggal_input'];
					?>
					<?php echo  date('d/m/Y', strtotime($tdka))?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: center">
					<?php
					$query5= "SELECT p1.tanggal_input, pn.plafond from data_slik p1, permohonan_analisa_kredit pn where p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc3' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc2' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc'";
					$sql7 = mysqli_query($con, $query5);
					while($datapdkaacc = mysqli_fetch_array($sql7)){
					$pdkaacc = $datapdkaacc['plafond'];
					?>
					<?php echo  number_format($pdkaacc)?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: center">
					<?php
					$query6 = "SELECT p1.tanggal_input, pn.plafond from data_slik p1, permohonan_analisa_kredit pn where p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc3' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc2' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc'";
					$sql8 = mysqli_query($con, $query6);
					while($datatdkaacc = mysqli_fetch_array($sql8)){
					$tdkaacc = $datatdkaacc['tanggal_input'];
					?>
					<?php echo  date('d/m/Y', strtotime($tdkaacc))?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: center">
					<?php
					$query7 = "SELECT * from input_targetao where nama_ao='$user1' and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun";
					$sql9 = mysqli_query($con, $query7);
					while($datacair = mysqli_fetch_array($sql9)){
					$cair = $datacair['plafond'];
					?>
					<?php echo  number_format($cair)?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: center">
					<?php
					$query8 = "SELECT * from input_targetao where nama_ao='$user1' and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun";
					$sql10 = mysqli_query($con, $query8);
					while($datacair = mysqli_fetch_array($sql10)){
					$cairtgl = $datacair['tanggal_input'];
					?>
					<?php echo  date('d/m/Y', strtotime($cairtgl))?><br>
					<?php
					};				
					?>
					</td>
				</tr>
				<tr style="background-color: rgba(221,220,223,1.00)">
					</td>
						<?php 
						$query2= "SELECT *,
						(SELECT COUNT(*) FROM data_slik WHERE month(tanggal_input)=$bulan_lalu and year(tanggal_input)=$tahun and status='Yes' and nama_pemohon='$user1') AS Tslikyes,
						(SELECT COUNT(*) FROM data_slik WHERE month(tanggal_input)=$bulan_lalu and year(tanggal_input)=$tahun and status='No' and nama_pemohon='$user1') AS Tslikno,
						(SELECT COUNT(*) FROM data_slik WHERE month(tanggal_input)=$bulan_lalu and year(tanggal_input)=$tahun and status='-' and nama_pemohon='$user1') AS Tsliku
						FROM data_ao_landing where kode_perusahaan='111' group by nama_ao";
						$sql4 = mysqli_query($con, $query2);
						$datas1 = mysqli_fetch_array($sql4);
						?>
					<td colspan="2" style="text-align: center">
						<?php echo("Total : ".$datas1['Tslikyes'])?>
					</td>
					<td colspan="2" style="text-align: center">
						<?php echo("Total : ".$datas1['Tslikno'])?>
					</td>
					<td colspan="2" style="text-align: center">
						<?php 
							$query = "SELECT COUNT(nama_nasabah) as tsco1 FROM data_slik WHERE NOT EXISTS (select nama_nasabah from permohonan_analisa_kredit where data_slik.nama_nasabah=permohonan_analisa_kredit.nama_nasabah and data_slik.nama_pemohon=permohonan_analisa_kredit.nama_ao) and nama_pemohon='$user1' and status='Yes' and month(tanggal_input)=$bulan_lalu and year(tanggal_input)=$tahun"; 
			  				$sql3 = mysqli_query($con, $query);
			  				$datasco1 = mysqli_fetch_array($sql3);
						echo("Total : ".$datasco1['tsco1'])
						?>
					</td>
						<?php 
						$query2= "SELECT *,
						(SELECT COUNT(*) FROM data_slik WHERE month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='Yes' and nama_pemohon='$user1') AS Tslikyes,
						(SELECT COUNT(*) FROM data_slik WHERE month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='No' and nama_pemohon='$user1') AS Tslikno,
						(SELECT COUNT(*) FROM data_slik WHERE month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='-' and nama_pemohon='$user1') AS Tsliku
						FROM data_ao_landing where kode_perusahaan='111' group by nama_ao";
						$sql4 = mysqli_query($con, $query2);
						$datas1 = mysqli_fetch_array($sql4);
						?>
					<td colspan="2"  style="text-align: center">
						<?php echo("Total : ".$datas1['Tslikyes'])?>
					</td>
					<td colspan="2" style="text-align: center">
						<?php echo("Total : ".$datas1['Tslikno'])?>
					</td>
					<td colspan="2" style="text-align: center">
						<?php echo("Total : ".$datas1['Tsliku'])?>
					</td>
					<td colspan="2" style="text-align: center">
					<?php
					$query3= "SELECT sum(pn.plafond) as total from data_slik p1, permohonan_analisa_kredit pn where p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc2' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='AKproses' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='AKproses2' or 
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='revised' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='KAKproses2' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='KAKproses'";
					$sql5 = mysqli_query($con, $query3);
					while($datapdka = mysqli_fetch_array($sql5)){
					$pdka = $datapdka['total'];
					?>
					<?php echo  "Total : ". number_format($pdka)?><br>
					<?php
					};				
					?>
					</td>
					<td colspan="2" style="text-align: center">
					<?php
					$query5= "SELECT SUM(pn.plafond) as total from data_slik p1, permohonan_analisa_kredit pn where p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc3' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc2' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc'";
					$sql7 = mysqli_query($con, $query5);
					while($datapdkaacc = mysqli_fetch_array($sql7)){
					$pdkaacc = $datapdkaacc['total'];
					?>
					<?php echo  "Total : " . number_format($pdkaacc)?><br>
					<?php
					};				
					?>
					</td>
					<td colspan="2" style="text-align: center">
					<?php
					$query7 = "SELECT SUM(plafond) as total from input_targetao where nama_ao='$user1' and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun";
					$sql9 = mysqli_query($con, $query7);
					while($datacair = mysqli_fetch_array($sql9)){
					$cair = $datacair['total'];
					?>
					<?php echo "Total : ".  number_format($cair)?><br>
					<?php
					};				
					?>
				</tr>
		
				<tr>
					<?php $user1	= 'Tezar Agung Arjuda Kusuma';?>
					<td rowspan="2">
						6.
					</td>
					<td rowspan="2" nowrap>
						Tezar Agung Arjuda Kusuma
					</td>
					<td rowspan="2" style="text-align: center">
						<?php 
							$sql1	=  mysqli_query($con, "SELECT COUNT(nama_user) as tcao1 FROM ao_data_call WHERE  month(tanggal)=$bulan and year(tanggal)=$tahun and nama_user='$user1'");
							$dataakt1 = mysqli_fetch_array($sql1);
						echo($dataakt1['tcao1'])
						?>
					</td>
					<td rowspan="2" style="text-align: center">
						<?php 
							$sql2	=  mysqli_query($con, "SELECT COUNT(nama_karyawan) as tvao1 FROM sales_plan WHERE  month(tanggal_sp)=$bulan and year(tanggal_sp)=$tahun and nama_karyawan='$user1'");
							$dataakt2 = mysqli_fetch_array($sql2);
						echo($dataakt2['tvao1'])
						?>
					</td>
					<td style="text-align: left;" nowrap>
					<?php
					$query7 = "SELECT * from data_slik where nama_pemohon='$user1' and month(tanggal_input)=$bulan_lalu and year(tanggal_input)=$tahun and status='Yes' order by nama_nasabah asc";
					$sql9 = mysqli_query($con, $query7);
					while($datacair = mysqli_fetch_array($sql9)){
					$cair = $datacair['nama_nasabah'];
					?>
					<?php echo  $cair?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: center" nowrap>
					<?php
					$query7 = "SELECT * from data_slik where nama_pemohon='$user1' and month(tanggal_input)=$bulan_lalu and year(tanggal_input)=$tahun and status='Yes' order by nama_nasabah asc";
					$sql9 = mysqli_query($con, $query7);
					while($datacair = mysqli_fetch_array($sql9)){
					$cair = $datacair['tanggal_input'];
					?>
					<?php echo  date('d/m/Y', strtotime($cair))?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: left" nowrap>
					<?php
					$query7 = "SELECT * from data_slik where nama_pemohon='$user1' and month(tanggal_input)=$bulan_lalu and year(tanggal_input)=$tahun and status='No' order by nama_nasabah asc";
					$sql9 = mysqli_query($con, $query7);
					while($datacair = mysqli_fetch_array($sql9)){
					$cair = $datacair['nama_nasabah'];
					?>
					<?php echo  $cair?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: center" nowrap>
					<?php
					$query7 = "SELECT * from data_slik where nama_pemohon='$user1' and month(tanggal_input)=$bulan_lalu and year(tanggal_input)=$tahun and status='No' order by nama_nasabah asc";
					$sql9 = mysqli_query($con, $query7);
					while($datacair = mysqli_fetch_array($sql9)){
					$cair = $datacair['tanggal_input'];
					?>
					<?php echo  date('d/m/Y', strtotime($cair))?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: left" nowrap>
					<?php
					$query7 = "SELECT nama_nasabah from data_slik where NOT EXISTS (select nama_nasabah from permohonan_analisa_kredit where data_slik.nama_nasabah=permohonan_analisa_kredit.nama_nasabah and data_slik.nama_pemohon=permohonan_analisa_kredit.nama_ao) and nama_pemohon='$user1' and status='Yes' and month(tanggal_input)=$bulan_lalu and year(tanggal_input)=$tahun order by nama_nasabah asc";
					$sql9 = mysqli_query($con, $query7);
					while($datacair = mysqli_fetch_array($sql9)){
					$cair = $datacair['nama_nasabah'];
					?>
					<?php echo  $cair?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: left" nowrap>
					<?php
					$query7 = "SELECT tanggal_input from data_slik where NOT EXISTS (select nama_nasabah from permohonan_analisa_kredit where data_slik.nama_nasabah=permohonan_analisa_kredit.nama_nasabah and data_slik.nama_pemohon=permohonan_analisa_kredit.nama_ao) and nama_pemohon='$user1' and status='Yes' and month(tanggal_input)=$bulan_lalu and year(tanggal_input)=$tahun order by nama_nasabah asc";
					$sql9 = mysqli_query($con, $query7);
					while($datacair = mysqli_fetch_array($sql9)){
					$cair = $datacair['tanggal_input'];
					?>
					<?php echo  date('d/m/Y', strtotime($cair))?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: left" nowrap>
					<?php
					$query7 = "SELECT * from data_slik where nama_pemohon='$user1' and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='Yes' order by nama_nasabah asc";
					$sql9 = mysqli_query($con, $query7);
					while($datacair = mysqli_fetch_array($sql9)){
					$cair = $datacair['nama_nasabah'];
					?>
					<?php echo  $cair?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: center" nowrap>
					<?php
					$query7 = "SELECT * from data_slik where nama_pemohon='$user1' and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='Yes' order by nama_nasabah asc";
					$sql9 = mysqli_query($con, $query7);
					while($datacair = mysqli_fetch_array($sql9)){
					$cair = $datacair['tanggal_input'];
					?>
					<?php echo  date('d/m/Y', strtotime($cair))?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: left" nowrap>
					<?php
					$query7 = "SELECT * from data_slik where nama_pemohon='$user1' and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='No' order by nama_nasabah asc";
					$sql9 = mysqli_query($con, $query7);
					while($datacair = mysqli_fetch_array($sql9)){
					$cair = $datacair['nama_nasabah'];
					?>
					<?php echo  $cair?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: center" nowrap>
					<?php
					$query7 = "SELECT * from data_slik where nama_pemohon='$user1' and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='No' order by nama_nasabah asc";
					$sql9 = mysqli_query($con, $query7);
					while($datacair = mysqli_fetch_array($sql9)){
					$cair = $datacair['tanggal_input'];
					?>
					<?php echo  date('d/m/Y', strtotime($cair))?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: left" nowrap>
					<?php
					$query7 = "SELECT * from data_slik where nama_pemohon='$user1' and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='-' order by nama_nasabah asc";
					$sql9 = mysqli_query($con, $query7);
					while($datacair = mysqli_fetch_array($sql9)){
					$cair = $datacair['nama_nasabah'];
					?>
					<?php echo  $cair?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: center" nowrap>
					<?php
					$query7 = "SELECT * from data_slik where nama_pemohon='$user1' and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='-' order by nama_nasabah asc";
					$sql9 = mysqli_query($con, $query7);
					while($datacair = mysqli_fetch_array($sql9)){
					$cair = $datacair['tanggal_input'];
					?>
					<?php echo  date('d/m/Y', strtotime($cair))?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: center">
					<?php
					$query3= "SELECT p1.tanggal_input, pn.plafond from data_slik p1, permohonan_analisa_kredit pn where p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc2' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='AKproses' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='AKproses2' or 
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='revised' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='KAKproses2' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='KAKproses'";
					$sql5 = mysqli_query($con, $query3);
					while($datapdka = mysqli_fetch_array($sql5)){
					$pdka = $datapdka['plafond'];
					?>
					<?php echo  number_format($pdka)?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: center">
					<?php
					$query4= "SELECT p1.tanggal_input, pn.plafond from data_slik p1, permohonan_analisa_kredit pn where p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc2' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='AKproses' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='AKproses2' or 
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='revised' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='KAKproses2' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='KAKproses'";
					$sql6 = mysqli_query($con, $query4);
					while($datatdka = mysqli_fetch_array($sql6)){
					$tdka = $datatdka['tanggal_input'];
					?>
					<?php echo  date('d/m/Y', strtotime($tdka))?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: center">
					<?php
					$query5= "SELECT p1.tanggal_input, pn.plafond from data_slik p1, permohonan_analisa_kredit pn where p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc3' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc2' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc'";
					$sql7 = mysqli_query($con, $query5);
					while($datapdkaacc = mysqli_fetch_array($sql7)){
					$pdkaacc = $datapdkaacc['plafond'];
					?>
					<?php echo  number_format($pdkaacc)?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: center">
					<?php
					$query6 = "SELECT p1.tanggal_input, pn.plafond from data_slik p1, permohonan_analisa_kredit pn where p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc3' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc2' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc'";
					$sql8 = mysqli_query($con, $query6);
					while($datatdkaacc = mysqli_fetch_array($sql8)){
					$tdkaacc = $datatdkaacc['tanggal_input'];
					?>
					<?php echo  date('d/m/Y', strtotime($tdkaacc))?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: center">
					<?php
					$query7 = "SELECT * from input_targetao where nama_ao='$user1' and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun";
					$sql9 = mysqli_query($con, $query7);
					while($datacair = mysqli_fetch_array($sql9)){
					$cair = $datacair['plafond'];
					?>
					<?php echo  number_format($cair)?><br>
					<?php
					};				
					?>
					</td>
					<td style="text-align: center">
					<?php
					$query8 = "SELECT * from input_targetao where nama_ao='$user1' and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun";
					$sql10 = mysqli_query($con, $query8);
					while($datacair = mysqli_fetch_array($sql10)){
					$cairtgl = $datacair['tanggal_input'];
					?>
					<?php echo  date('d/m/Y', strtotime($cairtgl))?><br>
					<?php
					};				
					?>
					</td>
				</tr>
				<tr>
					</td>
						<?php 
						$query2= "SELECT *,
						(SELECT COUNT(*) FROM data_slik WHERE month(tanggal_input)=$bulan_lalu and year(tanggal_input)=$tahun and status='Yes' and nama_pemohon='$user1') AS Tslikyes,
						(SELECT COUNT(*) FROM data_slik WHERE month(tanggal_input)=$bulan_lalu and year(tanggal_input)=$tahun and status='No' and nama_pemohon='$user1') AS Tslikno,
						(SELECT COUNT(*) FROM data_slik WHERE month(tanggal_input)=$bulan_lalu and year(tanggal_input)=$tahun and status='-' and nama_pemohon='$user1') AS Tsliku
						FROM data_ao_landing where kode_perusahaan='111' group by nama_ao";
						$sql4 = mysqli_query($con, $query2);
						$datas1 = mysqli_fetch_array($sql4);
						?>
					<td colspan="2" style="text-align: center">
						<?php echo("Total : ".$datas1['Tslikyes'])?>
					</td>
					<td colspan="2" style="text-align: center">
						<?php echo("Total : ".$datas1['Tslikno'])?>
					</td>
					<td colspan="2" style="text-align: center">
						<?php 
							$query = "SELECT COUNT(nama_nasabah) as tsco1 FROM data_slik WHERE NOT EXISTS (select nama_nasabah from permohonan_analisa_kredit where data_slik.nama_nasabah=permohonan_analisa_kredit.nama_nasabah and data_slik.nama_pemohon=permohonan_analisa_kredit.nama_ao) and nama_pemohon='$user1' and status='Yes' and month(tanggal_input)=$bulan_lalu and year(tanggal_input)=$tahun"; 
			  				$sql3 = mysqli_query($con, $query);
			  				$datasco1 = mysqli_fetch_array($sql3);
						echo("Total : ".$datasco1['tsco1'])
						?>
					</td>
						<?php 
						$query2= "SELECT *,
						(SELECT COUNT(*) FROM data_slik WHERE month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='Yes' and nama_pemohon='$user1') AS Tslikyes,
						(SELECT COUNT(*) FROM data_slik WHERE month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='No' and nama_pemohon='$user1') AS Tslikno,
						(SELECT COUNT(*) FROM data_slik WHERE month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='-' and nama_pemohon='$user1') AS Tsliku
						FROM data_ao_landing where kode_perusahaan='111' group by nama_ao";
						$sql4 = mysqli_query($con, $query2);
						$datas1 = mysqli_fetch_array($sql4);
						?>
					<td colspan="2"  style="text-align: center">
						<?php echo("Total : ".$datas1['Tslikyes'])?>
					</td>
					<td colspan="2" style="text-align: center">
						<?php echo("Total : ".$datas1['Tslikno'])?>
					</td>
					<td colspan="2" style="text-align: center">
						<?php echo("Total : ".$datas1['Tsliku'])?>
					</td>
					<td colspan="2" style="text-align: center">
					<?php
					$query3= "SELECT sum(pn.plafond) as total from data_slik p1, permohonan_analisa_kredit pn where p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc2' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='AKproses' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='AKproses2' or 
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='revised' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='KAKproses2' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='KAKproses'";
					$sql5 = mysqli_query($con, $query3);
					while($datapdka = mysqli_fetch_array($sql5)){
					$pdka = $datapdka['total'];
					?>
					<?php echo  "Total : ". number_format($pdka)?><br>
					<?php
					};				
					?>
					</td>
					<td colspan="2" style="text-align: center">
					<?php
					$query5= "SELECT SUM(pn.plafond) as total from data_slik p1, permohonan_analisa_kredit pn where p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc3' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc2' or
					p1.nama_nasabah = pn.nama_nasabah and p1.nama_pemohon = pn.nama_ao  and pn.nama_ao='$user1' and month(pn.tanggal_input)=$bulan and year(pn.tanggal_input)=$tahun and pn.status='acc'";
					$sql7 = mysqli_query($con, $query5);
					while($datapdkaacc = mysqli_fetch_array($sql7)){
					$pdkaacc = $datapdkaacc['total'];
					?>
					<?php echo  "Total : " . number_format($pdkaacc)?><br>
					<?php
					};				
					?>
					</td>
					<td colspan="2" style="text-align: center">
					<?php
					$query7 = "SELECT SUM(plafond) as total from input_targetao where nama_ao='$user1' and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun";
					$sql9 = mysqli_query($con, $query7);
					while($datacair = mysqli_fetch_array($sql9)){
					$cair = $datacair['total'];
					?>
					<?php echo "Total : ".  number_format($cair)?><br>
					<?php
					};				
					?>
				</tr>
		
		
		
		
				</table>
					</td>
				</tr>
			</table>
		</div>
		
	</div>
</body>
</html>