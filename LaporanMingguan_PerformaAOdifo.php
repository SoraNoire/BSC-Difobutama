<!doctype html>
<?php
include('dbcon.php');	
//data diterima
	$tahun	= $_POST['tahun'];
//no urut
	$noDSAR		=1;
	$noSLIK		=1;
	$noPADPK	=1;
	$noPENCAIRAN=1;
//bulan
$jan	= "01";
$feb	= "02";
$mar	= "03";
$apr	= "04";
$may	= "05";
$jun	= "06";
$jul	= "07";
$ags	= "08";
$sep	= "09";
$okt	= "10";
$nov	= "11";
$des	= "12";
//rupiah
function rupiah($angka){
	$hasil_rupiah = "Rp." . number_format($angka,2,',','.');
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
<link>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
</head>
<body>
	<div class="table-responsive">
		<h1><center>Rekap Tahunan D.S.A.R</center></h1>
	<table class="table">
	<tr style="border: 2px solid black" align="center">
		<th rowspan="2" style="text-align: center;border: 2px solid black;vertical-align: middle"><b>No.</b></th>
		<th rowspan="2" style="text-align: center;border: 2px solid black;vertical-align: middle"><b>Nama A.O</b></th>
		<th colspan="12" style="text-align: center;border: 2px solid black;vertical-align: middle"><b>D.S.A.R</b></th>
		<th rowspan="2" style="text-align: center;border: 2px solid black;vertical-align: middle"><b>Total</b></th>
	</tr>
		<tr align="center">
		<th style="text-align: center;border: 2px solid black;vertical-align: middle"><b>Jan</b></th>
		<th style="text-align: center;border: 2px solid black;vertical-align: middle"><b>Feb</b></th>
		<th style="text-align: center;border: 2px solid black;vertical-align: middle"><b>Mar</b></th>
		<th style="text-align: center;border: 2px solid black;vertical-align: middle"><b>Apr</b></th>
		<th style="text-align: center;border: 2px solid black;vertical-align: middle"><b>Mei</b></th>
		<th style="text-align: center;border: 2px solid black;vertical-align: middle"><b>Jun</b></th>
		<th style="text-align: center;border: 2px solid black;vertical-align: middle"><b>Jul</b></th>
		<th style="text-align: center;border: 2px solid black;vertical-align: middle"><b>Ags</b></th>
		<th style="text-align: center;border: 2px solid black;vertical-align: middle"><b>Sep</b></th>
		<th style="text-align: center;border: 2px solid black;vertical-align: middle"><b>Okt</b></th>
		<th style="text-align: center;border: 2px solid black;vertical-align: middle"><b>Nov</b></th>
		<th style="text-align: center;border: 2px solid black;vertical-align: middle"><b>Des</b></th>
		</tr>
	<?php
	$dsar= "SELECT *,
	(SELECT COUNT(*) FROM sales_plan WHERE month(tanggal_sp)=$jan and year(tanggal_sp)=$tahun and nama_karyawan=data_ao_landing.nama_ao group by data_ao_landing.nama_ao ) totalDSARjan,
	(SELECT COUNT(*) FROM sales_plan WHERE month(tanggal_sp)=$feb and year(tanggal_sp)=$tahun and nama_karyawan=data_ao_landing.nama_ao group by data_ao_landing.nama_ao ) totalDSARfeb,
	(SELECT COUNT(*) FROM sales_plan WHERE month(tanggal_sp)=$mar and year(tanggal_sp)=$tahun and nama_karyawan=data_ao_landing.nama_ao group by data_ao_landing.nama_ao ) totalDSARmar,
	(SELECT COUNT(*) FROM sales_plan WHERE month(tanggal_sp)=$apr and year(tanggal_sp)=$tahun and nama_karyawan=data_ao_landing.nama_ao group by data_ao_landing.nama_ao ) totalDSARapr,
	(SELECT COUNT(*) FROM sales_plan WHERE month(tanggal_sp)=$may and year(tanggal_sp)=$tahun and nama_karyawan=data_ao_landing.nama_ao group by data_ao_landing.nama_ao ) totalDSARmay,
	(SELECT COUNT(*) FROM sales_plan WHERE month(tanggal_sp)=$jun and year(tanggal_sp)=$tahun and nama_karyawan=data_ao_landing.nama_ao group by data_ao_landing.nama_ao ) totalDSARjun,
	(SELECT COUNT(*) FROM sales_plan WHERE month(tanggal_sp)=$jul and year(tanggal_sp)=$tahun and nama_karyawan=data_ao_landing.nama_ao group by data_ao_landing.nama_ao ) totalDSARjul,
	(SELECT COUNT(*) FROM sales_plan WHERE month(tanggal_sp)=$ags and year(tanggal_sp)=$tahun and nama_karyawan=data_ao_landing.nama_ao group by data_ao_landing.nama_ao ) totalDSARags,
	(SELECT COUNT(*) FROM sales_plan WHERE month(tanggal_sp)=$sep and year(tanggal_sp)=$tahun and nama_karyawan=data_ao_landing.nama_ao group by data_ao_landing.nama_ao ) totalDSARsep,
	(SELECT COUNT(*) FROM sales_plan WHERE month(tanggal_sp)=$okt and year(tanggal_sp)=$tahun and nama_karyawan=data_ao_landing.nama_ao group by data_ao_landing.nama_ao ) totalDSARokt,
	(SELECT COUNT(*) FROM sales_plan WHERE month(tanggal_sp)=$nov and year(tanggal_sp)=$tahun and nama_karyawan=data_ao_landing.nama_ao group by data_ao_landing.nama_ao ) totalDSARnov,
	(SELECT COUNT(*) FROM sales_plan WHERE month(tanggal_sp)=$des and year(tanggal_sp)=$tahun and nama_karyawan=data_ao_landing.nama_ao group by data_ao_landing.nama_ao ) totalDSARdes
	FROM data_ao_landing WHERE kode_perusahaan='111' group by nama_ao";	
	$sqldsar = mysqli_query($con, $dsar);
	while($datadsar = mysqli_fetch_array($sqldsar)){
	$namaAOlandingDSAR	 		= $datadsar['nama_ao'];
	$totalDSARjan		  		= $datadsar['totalDSARjan'];
	$totalDSARfeb		  		= $datadsar['totalDSARfeb'];
	$totalDSARmar		  		= $datadsar['totalDSARmar'];
	$totalDSARapr		  		= $datadsar['totalDSARapr'];
	$totalDSARmay		  		= $datadsar['totalDSARmay'];
	$totalDSARjun		  		= $datadsar['totalDSARjun'];
	$totalDSARjul		  		= $datadsar['totalDSARjul'];
	$totalDSARags		  		= $datadsar['totalDSARags'];
	$totalDSARsep		  		= $datadsar['totalDSARsep'];
	$totalDSARokt		  		= $datadsar['totalDSARokt'];
	$totalDSARnov		  		= $datadsar['totalDSARnov'];
	$totalDSARdes		  		= $datadsar['totalDSARdes'];
	//total 1 tahun
	$jumlahDSARaol		  		= $totalDSARjan + $totalDSARfeb + $totalDSARmar + $totalDSARapr + $totalDSARmay + $totalDSARjun + $totalDSARjul + $totalDSARags + $totalDSARsep + $totalDSARokt + $totalDSARnov + $totalDSARdes;
	?>
	<tr>
	<td style="text-align: center;border: 2px solid black"><?php echo $noDSAR ?></td>
	<td style="border: 2px solid black"><?php echo $namaAOlandingDSAR ?></td>
	<td style="text-align: center;border: 2px solid black"><?php echo $totalDSARjan ?></td>
	<td style="text-align: center;border: 2px solid black"><?php echo $totalDSARfeb ?></td>
	<td style="text-align: center;border: 2px solid black"><?php echo $totalDSARmar ?></td>
	<td style="text-align: center;border: 2px solid black"><?php echo $totalDSARapr ?></td>
	<td style="text-align: center;border: 2px solid black"><?php echo $totalDSARmay ?></td>
	<td style="text-align: center;border: 2px solid black"><?php echo $totalDSARjun ?></td>
	<td style="text-align: center;border: 2px solid black"><?php echo $totalDSARjul ?></td>
	<td style="text-align: center;border: 2px solid black"><?php echo $totalDSARags ?></td>
	<td style="text-align: center;border: 2px solid black"><?php echo $totalDSARsep ?></td>
	<td style="text-align: center;border: 2px solid black"><?php echo $totalDSARokt ?></td>
	<td style="text-align: center;border: 2px solid black"><?php echo $totalDSARnov ?></td>
	<td style="text-align: center;border: 2px solid black"><?php echo $totalDSARdes ?></td>
	<td style="text-align: center;border: 2px solid black"><?php echo $jumlahDSARaol ?></td>
	</tr>
	<?php
	$noDSAR++;
	}
	?>
	</table>
	</div>
	<div class="table-responsive">
		<h1><center>Rekap Tahunan S.L.I.K</center></h1>
	<table class="table">
	<tr style="border: 2px solid black" align="center">
		<th rowspan="2" style="text-align: center;border: 2px solid black;vertical-align: middle"><b>No.</b></th>
		<th rowspan="2" style="text-align: center;border: 2px solid black;vertical-align: middle"><b>Nama A.O</b></th>
		<th colspan="12" style="text-align: center;border: 2px solid black;vertical-align: middle"><b>S.L.I.K</b></th>
		<th rowspan="2" style="text-align: center;border: 2px solid black;vertical-align: middle"><b>Total</b></th>
	</tr>
		<tr align="center">
		<th style="text-align: center;border: 2px solid black;vertical-align: middle"><b>Jan</b></th>
		<th style="text-align: center;border: 2px solid black;vertical-align: middle"><b>Feb</b></th>
		<th style="text-align: center;border: 2px solid black;vertical-align: middle"><b>Mar</b></th>
		<th style="text-align: center;border: 2px solid black;vertical-align: middle"><b>Apr</b></th>
		<th style="text-align: center;border: 2px solid black;vertical-align: middle"><b>Mei</b></th>
		<th style="text-align: center;border: 2px solid black;vertical-align: middle"><b>Jun</b></th>
		<th style="text-align: center;border: 2px solid black;vertical-align: middle"><b>Jul</b></th>
		<th style="text-align: center;border: 2px solid black;vertical-align: middle"><b>Ags</b></th>
		<th style="text-align: center;border: 2px solid black;vertical-align: middle"><b>Sep</b></th>
		<th style="text-align: center;border: 2px solid black;vertical-align: middle"><b>Okt</b></th>
		<th style="text-align: center;border: 2px solid black;vertical-align: middle"><b>Nov</b></th>
		<th style="text-align: center;border: 2px solid black;vertical-align: middle"><b>Des</b></th>
		</tr>
	<?php
	$slik= "SELECT *,
	(SELECT COUNT(*) FROM data_slik WHERE month(tanggal_input)=$jan and year(tanggal_input)=$tahun and nama_pemohon=data_ao_landing.nama_ao group by data_ao_landing.nama_ao ) totalSLIKjan,
	(SELECT COUNT(*) FROM data_slik WHERE month(tanggal_input)=$feb and year(tanggal_input)=$tahun and nama_pemohon=data_ao_landing.nama_ao group by data_ao_landing.nama_ao ) totalSLIKfeb,
	(SELECT COUNT(*) FROM data_slik WHERE month(tanggal_input)=$mar and year(tanggal_input)=$tahun and nama_pemohon=data_ao_landing.nama_ao group by data_ao_landing.nama_ao ) totalSLIKmar,
	(SELECT COUNT(*) FROM data_slik WHERE month(tanggal_input)=$apr and year(tanggal_input)=$tahun and nama_pemohon=data_ao_landing.nama_ao group by data_ao_landing.nama_ao ) totalSLIKapr,
	(SELECT COUNT(*) FROM data_slik WHERE month(tanggal_input)=$may and year(tanggal_input)=$tahun and nama_pemohon=data_ao_landing.nama_ao group by data_ao_landing.nama_ao ) totalSLIKmay,
	(SELECT COUNT(*) FROM data_slik WHERE month(tanggal_input)=$jun and year(tanggal_input)=$tahun and nama_pemohon=data_ao_landing.nama_ao group by data_ao_landing.nama_ao ) totalSLIKjun,
	(SELECT COUNT(*) FROM data_slik WHERE month(tanggal_input)=$jul and year(tanggal_input)=$tahun and nama_pemohon=data_ao_landing.nama_ao group by data_ao_landing.nama_ao ) totalSLIKjul,
	(SELECT COUNT(*) FROM data_slik WHERE month(tanggal_input)=$ags and year(tanggal_input)=$tahun and nama_pemohon=data_ao_landing.nama_ao group by data_ao_landing.nama_ao ) totalSLIKags,
	(SELECT COUNT(*) FROM data_slik WHERE month(tanggal_input)=$sep and year(tanggal_input)=$tahun and nama_pemohon=data_ao_landing.nama_ao group by data_ao_landing.nama_ao ) totalSLIKsep,
	(SELECT COUNT(*) FROM data_slik WHERE month(tanggal_input)=$okt and year(tanggal_input)=$tahun and nama_pemohon=data_ao_landing.nama_ao group by data_ao_landing.nama_ao ) totalSLIKokt,
	(SELECT COUNT(*) FROM data_slik WHERE month(tanggal_input)=$nov and year(tanggal_input)=$tahun and nama_pemohon=data_ao_landing.nama_ao group by data_ao_landing.nama_ao ) totalSLIKnov,
	(SELECT COUNT(*) FROM data_slik WHERE month(tanggal_input)=$des and year(tanggal_input)=$tahun and nama_pemohon=data_ao_landing.nama_ao group by data_ao_landing.nama_ao ) totalSLIKdes
	FROM data_ao_landing WHERE kode_perusahaan='111' group by nama_ao";	
	$sqlslik = mysqli_query($con, $slik);
	while($dataslik = mysqli_fetch_array($sqlslik)){
	$namaAOlandingSLIK	 		= $dataslik['nama_ao'];
	$totalSLIKjan		  		= $dataslik['totalSLIKjan'];
	$totalSLIKfeb		  		= $dataslik['totalSLIKfeb'];
	$totalSLIKmar		  		= $dataslik['totalSLIKmar'];
	$totalSLIKapr		  		= $dataslik['totalSLIKapr'];
	$totalSLIKmay		  		= $dataslik['totalSLIKmay'];
	$totalSLIKjun		  		= $dataslik['totalSLIKjun'];
	$totalSLIKjul		  		= $dataslik['totalSLIKjul'];
	$totalSLIKags		  		= $dataslik['totalSLIKags'];
	$totalSLIKsep		  		= $dataslik['totalSLIKsep'];
	$totalSLIKokt		  		= $dataslik['totalSLIKokt'];
	$totalSLIKnov		  		= $dataslik['totalSLIKnov'];
	$totalSLIKdes		  		= $dataslik['totalSLIKdes'];
	//total 1 tahun
	$jumlahSLIKaol		  		= $totalSLIKjan + $totalSLIKfeb + $totalSLIKmar + $totalSLIKapr + $totalSLIKmay + $totalSLIKjun + $totalSLIKjul + $totalSLIKags + $totalSLIKsep + $totalSLIKokt + $totalSLIKnov + $totalSLIKdes;
	?>
	<tr>
	<td style="text-align: center;border: 2px solid black"><?php echo $noSLIK ?></td>
	<td style="border: 2px solid black"><?php echo $namaAOlandingSLIK ?></td>
	<td style="text-align: center;border: 2px solid black"><?php echo $totalSLIKjan ?></td>
	<td style="text-align: center;border: 2px solid black"><?php echo $totalSLIKfeb ?></td>
	<td style="text-align: center;border: 2px solid black"><?php echo $totalSLIKmar ?></td>
	<td style="text-align: center;border: 2px solid black"><?php echo $totalSLIKapr ?></td>
	<td style="text-align: center;border: 2px solid black"><?php echo $totalSLIKmay ?></td>
	<td style="text-align: center;border: 2px solid black"><?php echo $totalSLIKjun ?></td>
	<td style="text-align: center;border: 2px solid black"><?php echo $totalSLIKjul ?></td>
	<td style="text-align: center;border: 2px solid black"><?php echo $totalSLIKags ?></td>
	<td style="text-align: center;border: 2px solid black"><?php echo $totalSLIKsep ?></td>
	<td style="text-align: center;border: 2px solid black"><?php echo $totalSLIKokt ?></td>
	<td style="text-align: center;border: 2px solid black"><?php echo $totalSLIKnov ?></td>
	<td style="text-align: center;border: 2px solid black"><?php echo $totalSLIKdes ?></td>
	<td style="text-align: center;border: 2px solid black"><?php echo $jumlahSLIKaol ?></td>
	</tr>
	<?php
	$noSLIK++;
	}
	?>
	</table>
	</div>
	<div class="table-responsive">
		<h1><center>Rekap Tahunan P.A.D.P.K</center></h1>
	<table class="table" style="font-size: 10px">
	<tr style="border: 2px solid black" align="center">
		<th rowspan="3" style="text-align: center;border: 2px solid black;vertical-align: middle"><b>No.</b></th>
		<th rowspan="3" style="text-align: center;border: 2px solid black;vertical-align: middle"><b>Nama A.O</b></th>
		<th colspan="24" style="text-align: center;border: 2px solid black;vertical-align: middle"><b>P.A.D.P.K</b></th>
		<th colspan="2" rowspan="2" style="text-align: center;border: 2px solid black;vertical-align: middle"><b>Total</b></th>
	</tr>
		<tr align="center">
		<th colspan="2" style="text-align: center;border: 2px solid black;vertical-align: middle"><b>Jan</b></th>
		<th colspan="2" style="text-align: center;border: 2px solid black;vertical-align: middle"><b>Feb</b></th>
		<th colspan="2" style="text-align: center;border: 2px solid black;vertical-align: middle"><b>Mar</b></th>
		<th colspan="2" style="text-align: center;border: 2px solid black;vertical-align: middle"><b>Apr</b></th>
		<th colspan="2" style="text-align: center;border: 2px solid black;vertical-align: middle"><b>Mei</b></th>
		<th colspan="2" style="text-align: center;border: 2px solid black;vertical-align: middle"><b>Jun</b></th>
		<th colspan="2" style="text-align: center;border: 2px solid black;vertical-align: middle"><b>Jul</b></th>
		<th colspan="2" style="text-align: center;border: 2px solid black;vertical-align: middle"><b>Ags</b></th>
		<th colspan="2" style="text-align: center;border: 2px solid black;vertical-align: middle"><b>Sep</b></th>
		<th colspan="2" style="text-align: center;border: 2px solid black;vertical-align: middle"><b>Okt</b></th>
		<th colspan="2" style="text-align: center;border: 2px solid black;vertical-align: middle"><b>Nov</b></th>
		<th colspan="2" style="text-align: center;border: 2px solid black;vertical-align: middle"><b>Des</b></th>
		</tr>
		<tr align="center">
		<th style="text-align: center;border: 2px solid black;vertical-align: middle"><b>plafond</b></th>
		<th style="text-align: center;border: 2px solid black;vertical-align: middle"><b>account</b></th>
		<th style="text-align: center;border: 2px solid black;vertical-align: middle"><b>plafond</b></th>
		<th style="text-align: center;border: 2px solid black;vertical-align: middle"><b>account</b></th>
		<th style="text-align: center;border: 2px solid black;vertical-align: middle"><b>plafond</b></th>
		<th style="text-align: center;border: 2px solid black;vertical-align: middle"><b>account</b></th>
		<th style="text-align: center;border: 2px solid black;vertical-align: middle"><b>plafond</b></th>
		<th style="text-align: center;border: 2px solid black;vertical-align: middle"><b>account</b></th>
		<th style="text-align: center;border: 2px solid black;vertical-align: middle"><b>plafond</b></th>
		<th style="text-align: center;border: 2px solid black;vertical-align: middle"><b>account</b></th>
		<th style="text-align: center;border: 2px solid black;vertical-align: middle"><b>plafond</b></th>
		<th style="text-align: center;border: 2px solid black;vertical-align: middle"><b>account</b></th>
		<th style="text-align: center;border: 2px solid black;vertical-align: middle"><b>plafond</b></th>
		<th style="text-align: center;border: 2px solid black;vertical-align: middle"><b>account</b></th>
		<th style="text-align: center;border: 2px solid black;vertical-align: middle"><b>plafond</b></th>
		<th style="text-align: center;border: 2px solid black;vertical-align: middle"><b>account</b></th>
		<th style="text-align: center;border: 2px solid black;vertical-align: middle"><b>plafond</b></th>
		<th style="text-align: center;border: 2px solid black;vertical-align: middle"><b>account</b></th>
		<th style="text-align: center;border: 2px solid black;vertical-align: middle"><b>plafond</b></th>
		<th style="text-align: center;border: 2px solid black;vertical-align: middle"><b>account</b></th>
		<th style="text-align: center;border: 2px solid black;vertical-align: middle"><b>plafond</b></th>
		<th style="text-align: center;border: 2px solid black;vertical-align: middle"><b>account</b></th>
		<th style="text-align: center;border: 2px solid black;vertical-align: middle"><b>plafond</b></th>
		<th style="text-align: center;border: 2px solid black;vertical-align: middle"><b>account</b></th>
		<th style="text-align: center;border: 2px solid black;vertical-align: middle"><b>plafond</b></th>
		<th style="text-align: center;border: 2px solid black;vertical-align: middle"><b>account</b></th>
		</tr>
	<?php
	$padpk = "SELECT *,
	(SELECT SUM(plafond) FROM permohonan_analisa_kredit where month(tanggal_input)=$jan and year(tanggal_input)=$tahun and nama_ao=data_ao_landing.nama_ao group by data_ao_landing.nama_ao ) AS totalplafondPADPKjan,
	(SELECT COUNT(*) FROM permohonan_analisa_kredit where month(tanggal_input)=$jan and year(tanggal_input)=$tahun and nama_ao=data_ao_landing.nama_ao group by data_ao_landing.nama_ao) AS totalPADPKjan,
	(SELECT SUM(plafond) FROM permohonan_analisa_kredit where month(tanggal_input)=$feb and year(tanggal_input)=$tahun and nama_ao=data_ao_landing.nama_ao group by data_ao_landing.nama_ao) AS totalplafondPADPKfeb,
	(SELECT COUNT(*) FROM permohonan_analisa_kredit where month(tanggal_input)=$feb and year(tanggal_input)=$tahun and nama_ao=data_ao_landing.nama_ao group by data_ao_landing.nama_ao) AS totalPADPKfeb,
	(SELECT SUM(plafond) FROM permohonan_analisa_kredit where month(tanggal_input)=$mar and year(tanggal_input)=$tahun and nama_ao=data_ao_landing.nama_ao group by data_ao_landing.nama_ao) AS totalplafondPADPKmar,
	(SELECT COUNT(*) FROM permohonan_analisa_kredit where month(tanggal_input)=$mar and year(tanggal_input)=$tahun and nama_ao=data_ao_landing.nama_ao group by data_ao_landing.nama_ao) AS totalPADPKmar,
	(SELECT SUM(plafond) FROM permohonan_analisa_kredit where month(tanggal_input)=$apr and year(tanggal_input)=$tahun and nama_ao=data_ao_landing.nama_ao group by data_ao_landing.nama_ao) AS totalplafondPADPKapr,
	(SELECT COUNT(*) FROM permohonan_analisa_kredit where month(tanggal_input)=$apr and year(tanggal_input)=$tahun and nama_ao=data_ao_landing.nama_ao group by data_ao_landing.nama_ao) AS totalPADPKapr,
	(SELECT SUM(plafond) FROM permohonan_analisa_kredit where month(tanggal_input)=$may and year(tanggal_input)=$tahun and nama_ao=data_ao_landing.nama_ao group by data_ao_landing.nama_ao) AS totalplafondPADPKmay,
	(SELECT COUNT(*) FROM permohonan_analisa_kredit where month(tanggal_input)=$may and year(tanggal_input)=$tahun and nama_ao=data_ao_landing.nama_ao group by data_ao_landing.nama_ao) AS totalPADPKmay,
	(SELECT SUM(plafond) FROM permohonan_analisa_kredit where month(tanggal_input)=$jun and year(tanggal_input)=$tahun and nama_ao=data_ao_landing.nama_ao group by data_ao_landing.nama_ao) AS totalplafondPADPKjun,
	(SELECT COUNT(*) FROM permohonan_analisa_kredit where month(tanggal_input)=$jun and year(tanggal_input)=$tahun and nama_ao=data_ao_landing.nama_ao group by data_ao_landing.nama_ao) AS totalPADPKjun,
	(SELECT SUM(plafond) FROM permohonan_analisa_kredit where month(tanggal_input)=$jul and year(tanggal_input)=$tahun and nama_ao=data_ao_landing.nama_ao group by data_ao_landing.nama_ao) AS totalplafondPADPKjul,
	(SELECT COUNT(*) FROM permohonan_analisa_kredit where month(tanggal_input)=$jul and year(tanggal_input)=$tahun and nama_ao=data_ao_landing.nama_ao group by data_ao_landing.nama_ao) AS totalPADPKjul,
	(SELECT SUM(plafond) FROM permohonan_analisa_kredit where month(tanggal_input)=$ags and year(tanggal_input)=$tahun and nama_ao=data_ao_landing.nama_ao group by data_ao_landing.nama_ao) AS totalplafondPADPKags,
	(SELECT COUNT(*) FROM permohonan_analisa_kredit where month(tanggal_input)=$ags and year(tanggal_input)=$tahun and nama_ao=data_ao_landing.nama_ao group by data_ao_landing.nama_ao) AS totalPADPKags,
	(SELECT SUM(plafond) FROM permohonan_analisa_kredit where month(tanggal_input)=$sep and year(tanggal_input)=$tahun and nama_ao=data_ao_landing.nama_ao group by data_ao_landing.nama_ao) AS totalplafondPADPKsep,
	(SELECT COUNT(*) FROM permohonan_analisa_kredit where month(tanggal_input)=$sep and year(tanggal_input)=$tahun and nama_ao=data_ao_landing.nama_ao group by data_ao_landing.nama_ao) AS totalPADPKsep,
	(SELECT SUM(plafond) FROM permohonan_analisa_kredit where month(tanggal_input)=$okt and year(tanggal_input)=$tahun and nama_ao=data_ao_landing.nama_ao group by data_ao_landing.nama_ao) AS totalplafondPADPKokt,
	(SELECT COUNT(*) FROM permohonan_analisa_kredit where month(tanggal_input)=$okt and year(tanggal_input)=$tahun and nama_ao=data_ao_landing.nama_ao group by data_ao_landing.nama_ao) AS totalPADPKokt,
	(SELECT SUM(plafond) FROM permohonan_analisa_kredit where month(tanggal_input)=$nov and year(tanggal_input)=$tahun and nama_ao=data_ao_landing.nama_ao group by data_ao_landing.nama_ao) AS totalplafondPADPKnov,
	(SELECT COUNT(*) FROM permohonan_analisa_kredit where month(tanggal_input)=$nov and year(tanggal_input)=$tahun and nama_ao=data_ao_landing.nama_ao group by data_ao_landing.nama_ao) AS totalPADPKnov,
	(SELECT SUM(plafond) FROM permohonan_analisa_kredit where month(tanggal_input)=$des and year(tanggal_input)=$tahun and nama_ao=data_ao_landing.nama_ao group by data_ao_landing.nama_ao) AS totalplafondPADPKdes,
	(SELECT COUNT(*) FROM permohonan_analisa_kredit where month(tanggal_input)=$des and year(tanggal_input)=$tahun and nama_ao=data_ao_landing.nama_ao group by data_ao_landing.nama_ao) AS totalPADPKdes
	FROM data_ao_landing WHERE kode_perusahaan='111' group by nama_ao";	
	$sqlpadpk = mysqli_query($con, $padpk);
	while($datapadpk = mysqli_fetch_array($sqlpadpk)){
	$namaAOlandingPADPK	 		= $datapadpk['nama_ao'];
	$totalplafondPADPKjan		= $datapadpk['totalplafondPADPKjan'];
	$totalPADPKjan		  		= $datapadpk['totalPADPKjan'];
	$totalplafondPADPKfeb		= $datapadpk['totalplafondPADPKfeb'];
	$totalPADPKfeb		  		= $datapadpk['totalPADPKfeb'];
	$totalplafondPADPKmar		= $datapadpk['totalplafondPADPKmar'];
	$totalPADPKmar		  		= $datapadpk['totalPADPKmar'];
	$totalplafondPADPKapr		= $datapadpk['totalplafondPADPKapr'];
	$totalPADPKapr		  		= $datapadpk['totalPADPKapr'];
	$totalplafondPADPKmay		= $datapadpk['totalplafondPADPKmay'];
	$totalPADPKmay		  		= $datapadpk['totalPADPKmay'];
	$totalplafondPADPKjun		= $datapadpk['totalplafondPADPKjun'];
	$totalPADPKjun		  		= $datapadpk['totalPADPKjun'];
	$totalplafondPADPKjul		= $datapadpk['totalplafondPADPKjul'];
	$totalPADPKjul		  		= $datapadpk['totalPADPKjul'];
	$totalplafondPADPKags		= $datapadpk['totalplafondPADPKags'];
	$totalPADPKags		  		= $datapadpk['totalPADPKags'];
	$totalplafondPADPKsep		= $datapadpk['totalplafondPADPKsep'];
	$totalPADPKsep		  		= $datapadpk['totalPADPKsep'];
	$totalplafondPADPKokt		= $datapadpk['totalplafondPADPKokt'];
	$totalPADPKokt		  		= $datapadpk['totalPADPKokt'];
	$totalplafondPADPKnov		= $datapadpk['totalplafondPADPKnov'];
	$totalPADPKnov		  		= $datapadpk['totalPADPKnov'];
	$totalplafondPADPKdes		= $datapadpk['totalplafondPADPKdes'];
	$totalPADPKdes		  		= $datapadpk['totalPADPKdes'];
	//total 1 tahun
	$jumlahplafondPADPKaol		= $totalplafondPADPKjan + $totalplafondPADPKfeb + $totalplafondPADPKmar + $totalplafondPADPKapr + $totalplafondPADPKmay + $totalplafondPADPKjun + $totalplafondPADPKjul + $totalplafondPADPKags + $totalplafondPADPKsep + $totalplafondPADPKokt + $totalplafondPADPKnov + $totalplafondPADPKdes;
	$jumlahPADPKaol		  		= $totalPADPKjan + $totalPADPKfeb + $totalPADPKmar + $totalPADPKapr + $totalPADPKmay + $totalPADPKjun + $totalPADPKjul + $totalPADPKags + $totalPADPKsep + $totalPADPKokt + $totalPADPKnov + $totalPADPKdes;
	?>
	<tr>
	<td style="text-align: center;border: 2px solid black"><?php echo $noPADPK ?></td>
	<td style="border: 2px solid black"><?php echo $namaAOlandingPADPK ?></td>
	<td style="border: 2px solid black"><?php echo rupiah($totalplafondPADPKjan) ?></td>
	<td style="text-align: center;border: 2px solid black"><?php echo $totalPADPKjan ?></td>
	<td style="border: 2px solid black"><?php echo rupiah($totalplafondPADPKfeb) ?></td>
	<td style="text-align: center;border: 2px solid black"><?php echo $totalPADPKfeb ?></td>
	<td style="border: 2px solid black"><?php echo rupiah($totalplafondPADPKmar) ?></td>
	<td style="text-align: center;border: 2px solid black"><?php echo $totalPADPKmar ?></td>
	<td style="border: 2px solid black"><?php echo rupiah($totalplafondPADPKapr) ?></td>
	<td style="text-align: center;border: 2px solid black"><?php echo $totalPADPKapr ?></td>
	<td style="border: 2px solid black"><?php echo rupiah($totalplafondPADPKmay) ?></td>
	<td style="text-align: center;border: 2px solid black"><?php echo $totalPADPKmay ?></td>
	<td style="border: 2px solid black"><?php echo rupiah($totalplafondPADPKjun) ?></td>
	<td style="text-align: center;border: 2px solid black"><?php echo $totalPADPKjun ?></td>
	<td style="border: 2px solid black"><?php echo rupiah($totalplafondPADPKjul) ?></td>
	<td style="text-align: center;border: 2px solid black"><?php echo $totalPADPKjul ?></td>
	<td style="border: 2px solid black"><?php echo rupiah($totalplafondPADPKags) ?></td>
	<td style="text-align: center;border: 2px solid black"><?php echo $totalPADPKags ?></td>
	<td style="border: 2px solid black"><?php echo rupiah($totalplafondPADPKsep) ?></td>
	<td style="text-align: center;border: 2px solid black"><?php echo $totalPADPKsep ?></td>
	<td style="border: 2px solid black"><?php echo rupiah($totalplafondPADPKokt) ?></td>
	<td style="text-align: center;border: 2px solid black"><?php echo $totalPADPKokt ?></td>
	<td style="border: 2px solid black"><?php echo rupiah($totalplafondPADPKnov) ?></td>
	<td style="text-align: center;border: 2px solid black"><?php echo $totalPADPKnov ?></td>
	<td style="border: 2px solid black"><?php echo rupiah($totalplafondPADPKdes) ?></td>
	<td style="text-align: center;border: 2px solid black"><?php echo $totalPADPKdes ?></td>
	<td style="border: 2px solid black"><?php echo rupiah($jumlahplafondPADPKaol) ?></td>
	<td style="text-align: center;border: 2px solid black"><?php echo $jumlahPADPKaol ?></td>
	</tr>
	<?php
	$noPADPK++;
	}
	?>
	</table>
	</div>
</body>
	<div class="table-responsive">
		<h1><center>Rekap Tahunan Pencairan</center></h1>
	<table class="table" style="font-size: 10px">
	<tr style="border: 2px solid black" align="center">
		<th rowspan="3" style="text-align: center; border: 2px solid black;vertical-align: middle"><b>No.</b></th>
		<th rowspan="3" style="text-align: center;border: 2px solid black;vertical-align: middle"><b>Nama A.O</b></th>
		<th colspan="24" style="text-align: center;border: 2px solid black;vertical-align: middle"><b>Pencairan</b></th>
		<th colspan="2" rowspan="2" style="text-align: center;border: 2px solid black;vertical-align: middle"><b>Total</b></th>
	</tr>
		<tr align="center">
		<th colspan="2" style="text-align: center;border: 2px solid black;vertical-align: middle"><b>Jan</b></th>
		<th colspan="2" style="text-align: center;border: 2px solid black;vertical-align: middle"><b>Feb</b></th>
		<th colspan="2" style="text-align: center;border: 2px solid black;vertical-align: middle"><b>Mar</b></th>
		<th colspan="2" style="text-align: center;border: 2px solid black;vertical-align: middle"><b>Apr</b></th>
		<th colspan="2" style="text-align: center;border: 2px solid black;vertical-align: middle"><b>Mei</b></th>
		<th colspan="2" style="text-align: center;border: 2px solid black;vertical-align: middle"><b>Jun</b></th>
		<th colspan="2" style="text-align: center;border: 2px solid black;vertical-align: middle"><b>Jul</b></th>
		<th colspan="2" style="text-align: center;border: 2px solid black;vertical-align: middle"><b>Ags</b></th>
		<th colspan="2" style="text-align: center;border: 2px solid black;vertical-align: middle"><b>Sep</b></th>
		<th colspan="2" style="text-align: center;border: 2px solid black;vertical-align: middle"><b>Okt</b></th>
		<th colspan="2" style="text-align: center;border: 2px solid black;vertical-align: middle"><b>Nov</b></th>
		<th colspan="2" style="text-align: center;border: 2px solid black;vertical-align: middle"><b>Des</b></th>
		</tr>
		<tr align="center">
		<th style="text-align: center;border: 2px solid black;vertical-align: middle"><b>plafond</b></th>
		<th style="text-align: center;border: 2px solid black;vertical-align: middle"><b>account</b></th>
		<th style="text-align: center;border: 2px solid black;vertical-align: middle"><b>plafond</b></th>
		<th style="text-align: center;border: 2px solid black;vertical-align: middle"><b>account</b></th>
		<th style="text-align: center;border: 2px solid black;vertical-align: middle"><b>plafond</b></th>
		<th style="text-align: center;border: 2px solid black;vertical-align: middle"><b>account</b></th>
		<th style="text-align: center;border: 2px solid black;vertical-align: middle"><b>plafond</b></th>
		<th style="text-align: center;border: 2px solid black;vertical-align: middle"><b>account</b></th>
		<th style="text-align: center;border: 2px solid black;vertical-align: middle"><b>plafond</b></th>
		<th style="text-align: center;border: 2px solid black;vertical-align: middle"><b>account</b></th>
		<th style="text-align: center;border: 2px solid black;vertical-align: middle"><b>plafond</b></th>
		<th style="text-align: center;border: 2px solid black;vertical-align: middle"><b>account</b></th>
		<th style="text-align: center;border: 2px solid black;vertical-align: middle"><b>plafond</b></th>
		<th style="text-align: center;border: 2px solid black;vertical-align: middle"><b>account</b></th>
		<th style="text-align: center;border: 2px solid black;vertical-align: middle"><b>plafond</b></th>
		<th style="text-align: center;border: 2px solid black;vertical-align: middle"><b>account</b></th>
		<th style="text-align: center;border: 2px solid black;vertical-align: middle"><b>plafond</b></th>
		<th style="text-align: center;border: 2px solid black;vertical-align: middle"><b>account</b></th>
		<th style="text-align: center;border: 2px solid black;vertical-align: middle"><b>plafond</b></th>
		<th style="text-align: center;border: 2px solid black;vertical-align: middle"><b>account</b></th>
		<th style="text-align: center;border: 2px solid black;vertical-align: middle"><b>plafond</b></th>
		<th style="text-align: center;border: 2px solid black;vertical-align: middle"><b>account</b></th>
		<th style="text-align: center;border: 2px solid black;vertical-align: middle"><b>plafond</b></th>
		<th style="text-align: center;border: 2px solid black;vertical-align: middle"><b>account</b></th>
		<th style="text-align: center;border: 2px solid black;vertical-align: middle"><b>plafond</b></th>
		<th style="text-align: center;border: 2px solid black;vertical-align: middle"><b>account</b></th>
		</tr>
	<?php
	$pencairan = "SELECT *,
	(SELECT SUM(plafond) FROM input_targetao where month(tanggal_input)=$jan and year(tanggal_input)=$tahun and nama_ao=data_ao_landing.nama_ao group by data_ao_landing.nama_ao ) AS totalplafondPENCAIRANjan,
	(SELECT COUNT(*) FROM input_targetao where month(tanggal_input)=$jan and year(tanggal_input)=$tahun and nama_ao=data_ao_landing.nama_ao group by data_ao_landing.nama_ao) AS totalPENCAIRANjan,
	(SELECT SUM(plafond) FROM input_targetao where month(tanggal_input)=$feb and year(tanggal_input)=$tahun and nama_ao=data_ao_landing.nama_ao group by data_ao_landing.nama_ao) AS totalplafondPENCAIRANfeb,
	(SELECT COUNT(*) FROM input_targetao where month(tanggal_input)=$feb and year(tanggal_input)=$tahun and nama_ao=data_ao_landing.nama_ao group by data_ao_landing.nama_ao) AS totalPENCAIRANfeb,
	(SELECT SUM(plafond) FROM input_targetao where month(tanggal_input)=$mar and year(tanggal_input)=$tahun and nama_ao=data_ao_landing.nama_ao group by data_ao_landing.nama_ao) AS totalplafondPENCAIRANmar,
	(SELECT COUNT(*) FROM input_targetao where month(tanggal_input)=$mar and year(tanggal_input)=$tahun and nama_ao=data_ao_landing.nama_ao group by data_ao_landing.nama_ao) AS totalPENCAIRANmar,
	(SELECT SUM(plafond) FROM input_targetao where month(tanggal_input)=$apr and year(tanggal_input)=$tahun and nama_ao=data_ao_landing.nama_ao group by data_ao_landing.nama_ao) AS totalplafondPENCAIRANapr,
	(SELECT COUNT(*) FROM input_targetao where month(tanggal_input)=$apr and year(tanggal_input)=$tahun and nama_ao=data_ao_landing.nama_ao group by data_ao_landing.nama_ao) AS totalPENCAIRANapr,
	(SELECT SUM(plafond) FROM input_targetao where month(tanggal_input)=$may and year(tanggal_input)=$tahun and nama_ao=data_ao_landing.nama_ao group by data_ao_landing.nama_ao) AS totalplafondPENCAIRANmay,
	(SELECT COUNT(*) FROM input_targetao where month(tanggal_input)=$may and year(tanggal_input)=$tahun and nama_ao=data_ao_landing.nama_ao group by data_ao_landing.nama_ao) AS totalPENCAIRANmay,
	(SELECT SUM(plafond) FROM input_targetao where month(tanggal_input)=$jun and year(tanggal_input)=$tahun and nama_ao=data_ao_landing.nama_ao group by data_ao_landing.nama_ao) AS totalplafondPENCAIRANjun,
	(SELECT COUNT(*) FROM input_targetao where month(tanggal_input)=$jun and year(tanggal_input)=$tahun and nama_ao=data_ao_landing.nama_ao group by data_ao_landing.nama_ao) AS totalPENCAIRANjun,
	(SELECT SUM(plafond) FROM input_targetao where month(tanggal_input)=$jul and year(tanggal_input)=$tahun and nama_ao=data_ao_landing.nama_ao group by data_ao_landing.nama_ao) AS totalplafondPENCAIRANjul,
	(SELECT COUNT(*) FROM input_targetao where month(tanggal_input)=$jul and year(tanggal_input)=$tahun and nama_ao=data_ao_landing.nama_ao group by data_ao_landing.nama_ao) AS totalPENCAIRANjul,
	(SELECT SUM(plafond) FROM input_targetao where month(tanggal_input)=$ags and year(tanggal_input)=$tahun and nama_ao=data_ao_landing.nama_ao group by data_ao_landing.nama_ao) AS totalplafondPENCAIRANags,
	(SELECT COUNT(*) FROM input_targetao where month(tanggal_input)=$ags and year(tanggal_input)=$tahun and nama_ao=data_ao_landing.nama_ao group by data_ao_landing.nama_ao) AS totalPENCAIRANags,
	(SELECT SUM(plafond) FROM input_targetao where month(tanggal_input)=$sep and year(tanggal_input)=$tahun and nama_ao=data_ao_landing.nama_ao group by data_ao_landing.nama_ao) AS totalplafondPENCAIRANsep,
	(SELECT COUNT(*) FROM input_targetao where month(tanggal_input)=$sep and year(tanggal_input)=$tahun and nama_ao=data_ao_landing.nama_ao group by data_ao_landing.nama_ao) AS totalPENCAIRANsep,
	(SELECT SUM(plafond) FROM input_targetao where month(tanggal_input)=$okt and year(tanggal_input)=$tahun and nama_ao=data_ao_landing.nama_ao group by data_ao_landing.nama_ao) AS totalplafondPENCAIRANokt,
	(SELECT COUNT(*) FROM input_targetao where month(tanggal_input)=$okt and year(tanggal_input)=$tahun and nama_ao=data_ao_landing.nama_ao group by data_ao_landing.nama_ao) AS totalPENCAIRANokt,
	(SELECT SUM(plafond) FROM input_targetao where month(tanggal_input)=$nov and year(tanggal_input)=$tahun and nama_ao=data_ao_landing.nama_ao group by data_ao_landing.nama_ao) AS totalplafondPENCAIRANnov,
	(SELECT COUNT(*) FROM input_targetao where month(tanggal_input)=$nov and year(tanggal_input)=$tahun and nama_ao=data_ao_landing.nama_ao group by data_ao_landing.nama_ao) AS totalPENCAIRANnov,
	(SELECT SUM(plafond) FROM input_targetao where month(tanggal_input)=$des and year(tanggal_input)=$tahun and nama_ao=data_ao_landing.nama_ao group by data_ao_landing.nama_ao) AS totalplafondPENCAIRANdes,
	(SELECT COUNT(*) FROM input_targetao where month(tanggal_input)=$des and year(tanggal_input)=$tahun and nama_ao=data_ao_landing.nama_ao group by data_ao_landing.nama_ao) AS totalPENCAIRANdes
	FROM data_ao_landing WHERE kode_perusahaan='111' group by nama_ao";	
	$sqlpencairan = mysqli_query($con, $pencairan);
	while($datapencairan = mysqli_fetch_array($sqlpencairan)){
	$namaAOlandingPENCAIRAN	 	= $datapencairan['nama_ao'];
	$totalplafondPENCAIRANjan		= $datapencairan['totalplafondPENCAIRANjan'];
	$totalPENCAIRANjan		  		= $datapencairan['totalPENCAIRANjan'];
	$totalplafondPENCAIRANfeb		= $datapencairan['totalplafondPENCAIRANfeb'];
	$totalPENCAIRANfeb		  		= $datapencairan['totalPENCAIRANfeb'];
	$totalplafondPENCAIRANmar		= $datapencairan['totalplafondPENCAIRANmar'];
	$totalPENCAIRANmar		  		= $datapencairan['totalPENCAIRANmar'];
	$totalplafondPENCAIRANapr		= $datapencairan['totalplafondPENCAIRANapr'];
	$totalPENCAIRANapr		  		= $datapencairan['totalPENCAIRANapr'];
	$totalplafondPENCAIRANmay		= $datapencairan['totalplafondPENCAIRANmay'];
	$totalPENCAIRANmay		  		= $datapencairan['totalPENCAIRANmay'];
	$totalplafondPENCAIRANjun		= $datapencairan['totalplafondPENCAIRANjun'];
	$totalPENCAIRANjun		  		= $datapencairan['totalPENCAIRANjun'];
	$totalplafondPENCAIRANjul		= $datapencairan['totalplafondPENCAIRANjul'];
	$totalPENCAIRANjul		  		= $datapencairan['totalPENCAIRANjul'];
	$totalplafondPENCAIRANags		= $datapencairan['totalplafondPENCAIRANags'];
	$totalPENCAIRANags		  		= $datapencairan['totalPENCAIRANags'];
	$totalplafondPENCAIRANsep		= $datapencairan['totalplafondPENCAIRANsep'];
	$totalPENCAIRANsep		  		= $datapencairan['totalPENCAIRANsep'];
	$totalplafondPENCAIRANokt		= $datapencairan['totalplafondPENCAIRANokt'];
	$totalPENCAIRANokt		  		= $datapencairan['totalPENCAIRANokt'];
	$totalplafondPENCAIRANnov		= $datapencairan['totalplafondPENCAIRANnov'];
	$totalPENCAIRANnov		  		= $datapencairan['totalPENCAIRANnov'];
	$totalplafondPENCAIRANdes		= $datapencairan['totalplafondPENCAIRANdes'];
	$totalPENCAIRANdes		  		= $datapencairan['totalPENCAIRANdes'];
	//total 1 tahun
	$jumlahplafondPENCAIRANaol		= $totalplafondPENCAIRANjan + $totalplafondPENCAIRANfeb + $totalplafondPENCAIRANmar + $totalplafondPENCAIRANapr + $totalplafondPENCAIRANmay + $totalplafondPENCAIRANjun + $totalplafondPENCAIRANjul + $totalplafondPENCAIRANags + $totalplafondPENCAIRANsep + $totalplafondPENCAIRANokt + $totalplafondPENCAIRANnov + $totalplafondPENCAIRANdes;
	$jumlahPENCAIRANaol		  		= $totalPENCAIRANjan + $totalPENCAIRANfeb + $totalPENCAIRANmar + $totalPENCAIRANapr + $totalPENCAIRANmay + $totalPENCAIRANjun + $totalPENCAIRANjul + $totalPENCAIRANags + $totalPENCAIRANsep + $totalPENCAIRANokt + $totalPENCAIRANnov + $totalPENCAIRANdes;
	?>
	<tr>
	<td style="text-align: center;border: 2px solid black"><?php echo $noPENCAIRAN ?></td>
	<td style="border: 2px solid black"><?php echo $namaAOlandingPENCAIRAN ?></td>
	<td style="border: 2px solid black"><?php echo rupiah($totalplafondPENCAIRANjan) ?></td>
	<td style="text-align: center;border: 2px solid black"><?php echo $totalPENCAIRANjan ?></td>
	<td style="border: 2px solid black"><?php echo rupiah($totalplafondPENCAIRANfeb) ?></td>
	<td style="text-align: center;border: 2px solid black"><?php echo $totalPENCAIRANfeb ?></td>
	<td style="border: 2px solid black"><?php echo rupiah($totalplafondPENCAIRANmar) ?></td>
	<td style="text-align: center;border: 2px solid black"><?php echo $totalPENCAIRANmar ?></td>
	<td style="border: 2px solid black"><?php echo rupiah($totalplafondPENCAIRANapr) ?></td>
	<td style="text-align: center;border: 2px solid black"><?php echo $totalPENCAIRANapr ?></td>
	<td style="border: 2px solid black"><?php echo rupiah($totalplafondPENCAIRANmay) ?></td>
	<td style="text-align: center;border: 2px solid black"><?php echo $totalPENCAIRANmay ?></td>
	<td style="border: 2px solid black"><?php echo rupiah($totalplafondPENCAIRANjun) ?></td>
	<td style="text-align: center;border: 2px solid black"><?php echo $totalPENCAIRANjun ?></td>
	<td style="border: 2px solid black"><?php echo rupiah($totalplafondPENCAIRANjul) ?></td>
	<td style="text-align: center;border: 2px solid black"><?php echo $totalPENCAIRANjul ?></td>
	<td style="border: 2px solid black"><?php echo rupiah($totalplafondPENCAIRANags) ?></td>
	<td style="text-align: center;border: 2px solid black"><?php echo $totalPENCAIRANags ?></td>
	<td style="border: 2px solid black"><?php echo rupiah($totalplafondPENCAIRANsep) ?></td>
	<td style="text-align: center;border: 2px solid black"><?php echo $totalPENCAIRANsep ?></td>
	<td style="border: 2px solid black"><?php echo rupiah($totalplafondPENCAIRANokt) ?></td>
	<td style="text-align: center;border: 2px solid black"><?php echo $totalPENCAIRANokt ?></td>
	<td style="border: 2px solid black"><?php echo rupiah($totalplafondPENCAIRANnov) ?></td>
	<td style="text-align: center;border: 2px solid black"><?php echo $totalPENCAIRANnov ?></td>
	<td style="border: 2px solid black"><?php echo rupiah($totalplafondPENCAIRANdes) ?></td>
	<td style="text-align: center;border: 2px solid black"><?php echo $totalPENCAIRANdes ?></td>
	<td style="border: 2px solid black"><?php echo rupiah($jumlahplafondPENCAIRANaol) ?></td>
	<td style="text-align: center;border: 2px solid black"><?php echo $jumlahPENCAIRANaol ?></td>
	</tr>
	<?php
	$noPENCAIRAN++;
	}
	?>
	</table>
	</div>
</body>
</html>