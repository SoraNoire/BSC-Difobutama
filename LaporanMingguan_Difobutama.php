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
	$tanggal1beetween = date('Y-m-01');
	$tanggalinibeetween = date('Y-m-d');
	$media = "Kunjungan";
	
	$bulan= date('m');
	$tahun= date('Y');
	$no   = 1;
    $no1  = 1;
    $nos  = 1;
    $no1s  = 1;
    $no2  = 1;
    $no2b  = 1;
    $no2s  = 1;
    $no2ss  = 1;
    $no2sss  = 1;
    $no3s  = 1;
    $no2slik  = 1;
function rupiah($angka){
	
	$hasil_rupiah = "Rp.   " . number_format($angka,2,',','.');
	return $hasil_rupiah;
 
}
?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

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
</script><script type="text/javascript">
$(document).ready(function() {
    $('#sliknonpadpk1').DataTable();
} );
</script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
</head>
<body>
    <div>
        <a type="button" class="btn btn-info btn-lg" href="PADPK_Alur_Data_dir_difo.php">Monitoring Pengajuan Kredit Berjalan</a>
    </div>
	<div>
		<h1><center>Rangkuman Produktivitas A.O Landing</center></h1>
		<h5><center>Data Dalam Ribuan</center></h5>
	<div class="table-responsive">
	<table class="table">
	<tr style="border: 2px solid black" align="center">
		<td  rowspan="3" style="border: 2px solid black;vertical-align: middle"><b>No.</b></td>
		<td rowspan="3" style="border: 2px solid black;vertical-align: middle"><b>Nama A.O</b></td>
		<td rowspan="2" colspan="2" style="border: 2px solid black;vertical-align: middle"><b>D.S.A.R</b></td>
		<td colspan="3" rowspan="2" style="border: 2px solid black;vertical-align: middle"><b>S.L.I.K</b></td>
		<td colspan="2" style="border: 2px solid black;vertical-align: middle"><b>Data Ke Analis</b></td>
		<td colspan="2" style="border: 2px solid black;vertical-align: middle"><b>Data ACC</b></td>
		<td colspan="4" style="border: 2px solid black;vertical-align: middle"><b>Pencairan</b></td>
	</tr>
	<tr style="border: 2px solid black" align="center">
		<td rowspan="2" style="border: 2px solid black;text-align: center;vertical-align: middle"><b>Plafond</b></td>
		<td rowspan="2" style="border: 2px solid black;text-align: center;vertical-align: middle"><b>Data di Analis</b></td>
		<td rowspan="2" style="border: 2px solid black;text-align: center;vertical-align: middle"><b>Plafond</b></td>
		<td rowspan="2" style="border: 2px solid black;text-align: center;vertical-align: middle"><b>Data di ACC</b></td>
		<td colspan="2" style="border: 2px solid black;vertical-align: middle"><b>Bulan Ini</b></td>
		<td colspan="2" style="border: 2px solid black;vertical-align: middle"><b>Tahun Ini</b></td>
	</tr>
		<tr style="border: 2px solid black" align="center" valign="middle">
	    	<td style="border: 2px solid black;text-align: center;vertical-align: middle"><b>C</b></td>
		    <td style="border: 2px solid black;text-align: center;vertical-align: middle"><b>V</b></td>
	    	<td style="border: 2px solid black;text-align: center;vertical-align: middle"><b>YES</b></td>
		    <td style="border: 2px solid black;text-align: center;vertical-align: middle"><b>NO</b></td>
		    <td style="border: 2px solid black;text-align: center;vertical-align: middle"><b>U</b></td>
			<td style="border: 2px solid black;vertical-align: middle"><b>Jumlah</b></td>
			<td style="border: 2px solid black;vertical-align: middle"><b>Account</b></td>
			<td style="border: 2px solid black;vertical-align: middle"><b>Jumlah</b></td>
			<td style="border: 2px solid black;vertical-align: middle"><b>Account</b></td>
		</tr>
	<?php 
	$neworder= "SELECT *,
	(SELECT id_ao FROM sales_plan WHERE id_ao=data_ao_landing.kode_ao group by data_ao_landing.nama_ao) AS Tdsar,
	(SELECT COUNT(*) FROM ao_data_call WHERE month(tanggal)=$bulan and year(tanggal)=$tahun and nama_user=data_ao_landing.nama_ao  group by data_ao_landing.nama_ao ) AS TTdsacr,
	(SELECT COUNT(*) FROM sales_plan WHERE month(tanggal_sp)=$bulan and year(tanggal_sp)=$tahun and nama_karyawan=data_ao_landing.nama_ao  group by data_ao_landing.nama_ao ) AS TTdsar,
	(SELECT COUNT(*) FROM data_slik WHERE month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='Yes' and nama_pemohon=data_ao_landing.nama_ao group by data_ao_landing.nama_ao) AS Tslikyes,
	(SELECT COUNT(*) FROM data_slik WHERE month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='No' and nama_pemohon=data_ao_landing.nama_ao group by data_ao_landing.nama_ao) AS Tslikno,
	(SELECT COUNT(*) FROM data_slik WHERE month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='-' and nama_pemohon=data_ao_landing.nama_ao group by data_ao_landing.nama_ao) AS Tsliku,
	(SELECT SUM(plafond) FROM permohonan_analisa_kredit WHERE
	nama_ao=data_ao_landing.nama_ao and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='acc2' or
	nama_ao=data_ao_landing.nama_ao and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='acc' or
	nama_ao=data_ao_landing.nama_ao and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='AKproses' or
	nama_ao=data_ao_landing.nama_ao and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='AKproses2' or
	nama_ao=data_ao_landing.nama_ao and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='acc3' or
	nama_ao=data_ao_landing.nama_ao and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='revised' or
	nama_ao=data_ao_landing.nama_ao and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='rejected' or
	nama_ao=data_ao_landing.nama_ao and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='KAKproses2' or
	nama_ao=data_ao_landing.nama_ao and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='KAKproses' 
	group by data_ao_landing.nama_ao) AS Tjpan,
	(SELECT COUNT(*) FROM permohonan_analisa_kredit WHERE
	nama_ao=data_ao_landing.nama_ao and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='acc2' or
	nama_ao=data_ao_landing.nama_ao and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='acc3' or
	nama_ao=data_ao_landing.nama_ao and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='acc' or
	nama_ao=data_ao_landing.nama_ao and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='revised' or
	nama_ao=data_ao_landing.nama_ao and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='AKproses' or
	nama_ao=data_ao_landing.nama_ao and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='AKproses2' or
	nama_ao=data_ao_landing.nama_ao and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='KAKproses2' or
	nama_ao=data_ao_landing.nama_ao and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='rejected' or
	nama_ao=data_ao_landing.nama_ao and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='KAKproses' 
	group by data_ao_landing.nama_ao) AS Tdpan,
	(SELECT SUM(plafond) FROM permohonan_analisa_kredit WHERE
	nama_ao=data_ao_landing.nama_ao and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='acc2' or
	nama_ao=data_ao_landing.nama_ao and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='acc' or
	nama_ao=data_ao_landing.nama_ao and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='acc3' 
	group by data_ao_landing.nama_ao) AS Tjpanacc,
	(SELECT COUNT(*) FROM permohonan_analisa_kredit WHERE
	nama_ao=data_ao_landing.nama_ao and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='acc2' or
	nama_ao=data_ao_landing.nama_ao and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='acc3' or
	nama_ao=data_ao_landing.nama_ao and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='acc' 
	group by data_ao_landing.nama_ao) AS Tdpanacc,
	(SELECT SUM(plafond) FROM input_targetao where month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and nama_ao=data_ao_landing.nama_ao) AS Tjpasb,
	(SELECT COUNT(*) FROM input_targetao where month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and nama_ao=data_ao_landing.nama_ao) AS TjpasbA,
	(SELECT SUM(plafond) FROM input_targetao where Year(tanggal_input)=$tahun and nama_ao=data_ao_landing.nama_ao) AS TjpasT,
	(SELECT COUNT(*) FROM input_targetao where Year(tanggal_input)=$tahun and nama_ao=data_ao_landing.nama_ao) AS TjpasTA
	FROM data_ao_landing where kode_perusahaan='111' group by nama_ao";
	$sqlneworder = mysqli_query($con, $neworder);
	while($dataneworder = mysqli_fetch_array($sqlneworder)){
	$namaaoneworder  			= $dataneworder['nama_ao'];
	$jumlahdsacraoneworder  		= $dataneworder['TTdsacr'];
	$jumlahdsaraoneworder  		= $dataneworder['TTdsar'];
	$jumlahslikaoneworderyes  		= $dataneworder['Tslikyes'];
	$jumlahslikaoneworderno  		= $dataneworder['Tslikno'];
	$jumlahslikaoneworderu  		= $dataneworder['Tsliku'];
	$jumlahpsurvaoneworder 		= $dataneworder['Tjpan'];
	$jumlahsurvaoneworder  		= $dataneworder['Tdpan'];
	$jumlahpsurvaoneworderacc 		= $dataneworder['Tjpanacc'];
	$jumlahsurvaoneworderacc  		= $dataneworder['Tdpanacc'];
	$jumlahpcairbaoneworder  	= $dataneworder['Tjpasb'];
	$jumlahpcairbaoneworderA  	= $dataneworder['TjpasbA'];
	$jumlahpcairtaoneworder  	= $dataneworder['TjpasT'];
	$jumlahpcairtaoneworderA 	= $dataneworder['TjpasTA'];
	?>
		
	<tr>
	<td style="text-align: center;;border: 2px solid black"><?php echo $no2 ?></td>
	<td style="border: 2px solid black"><?php echo $namaaoneworder ?></td>
	<td style="border: 2px solid black"><?php echo $jumlahdsacraoneworder ?></td>
	<td style="border: 2px solid black"><?php echo $jumlahdsaraoneworder ?></td>
	<td style="border: 2px solid black"><?php echo $jumlahslikaoneworderyes?></td>
	<td style="border: 2px solid black"><?php echo $jumlahslikaoneworderno?></td>
	<td style="border: 2px solid black"><?php echo $jumlahslikaoneworderu?></td>
	<td style="border: 2px solid black">
	<?php if($jumlahpsurvaoneworder > 0){
	    echo number_format(substr($jumlahpsurvaoneworder,0,-3));
	}else{
	    echo "Nihil";
	    
	}
	?>
	</td>
	<td style="border: 2px solid black"><?php echo $jumlahsurvaoneworder ?></td>
	<td style="border: 2px solid black">
	<?php if($jumlahpsurvaoneworderacc > 0){
	    echo number_format(substr($jumlahpsurvaoneworderacc,0,-3));
	}else{
	    echo "Nihil";
	    
	}
	?>
	</td>
	<td style="border: 2px solid black"><?php echo $jumlahsurvaoneworderacc ?></td>
	<td style="border: 2px solid black">
	<?php if($jumlahpcairbaoneworder > 0){
	    echo number_format(substr($jumlahpcairbaoneworder,0,-3));
	}else{
	    echo "Nihil";
	    
	}
	?>
	</td>
	<td style="border: 2px solid black"><?php echo $jumlahpcairbaoneworderA ?></td>
	<td style="border: 2px solid black">
	 <?php if($jumlahpcairtaoneworder > 0){
	    echo number_format(substr($jumlahpcairtaoneworder,0,-3));
	}else{
	    echo "Nihil";
	    
	}
	?>
	</td>
	<td style="border: 2px solid black"><?php echo $jumlahpcairtaoneworderA ?></td>
	</tr>
	<?php
	$no2++;
	}
	?>
	<tr>
		<td colspan="2" style="border: 2px solid black;vertical-align: middle; text-align:center"><b>JUMLAH</b></td>
		<?php 
		$neworderjumlah = "SELECT *, 
		(SELECT COUNT(*) FROM ao_data_call WHERE month(tanggal)=$bulan and year(tanggal)=$tahun and kantor_user='Difobutama') AS NJdsacr,
		(SELECT COUNT(*) FROM sales_plan WHERE month(tanggal_sp)=$bulan and year(tanggal_sp)=$tahun and kantor='Difobutama') AS NJdsar,
		(SELECT COUNT(*) FROM data_slik WHERE month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='Yes' and kantor_pemohon='Difobutama') AS NJSlikyes,
		(SELECT COUNT(*) FROM data_slik WHERE month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='No' and kantor_pemohon='Difobutama') AS NJSlikno,
		(SELECT COUNT(*) FROM data_slik WHERE month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='-' and kantor_pemohon='Difobutama') AS NJSliku,
		(SELECT SUM(plafond) FROM permohonan_analisa_kredit WHERE
    	month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and kantor_pemohon='Difobutama' and status='acc2' or
    	month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and kantor_pemohon='Difobutama' and status='acc' or
        month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and kantor_pemohon='Difobutama' and status='AKproses' or
        month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and kantor_pemohon='Difobutama' and status='AKproses2' or
    	month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and kantor_pemohon='Difobutama' and status='acc3' or
    	month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and kantor_pemohon='Difobutama' and status='revised' or
    	month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and kantor_pemohon='Difobutama' and status='rejected' or
    	month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and kantor_pemohon='Difobutama' and status='KAKproses2' or
    	month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and kantor_pemohon='Difobutama' and status='KAKproses' ) AS NJPDA,
    	(SELECT COUNT(*) FROM permohonan_analisa_kredit WHERE
    	month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and kantor_pemohon='Difobutama' and status='acc2' or
    	month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and kantor_pemohon='Difobutama' and status='acc3' or
    	month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and kantor_pemohon='Difobutama' and status='acc' or
    	month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and kantor_pemohon='Difobutama' and status='revised' or
    	month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and kantor_pemohon='Difobutama' and status='AKproses' or
    	month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and kantor_pemohon='Difobutama' and status='AKproses2' or
    	month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and kantor_pemohon='Difobutama' and status='KAKproses2' or
    	month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and kantor_pemohon='Difobutama' and status='rejected' or
    	month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and kantor_pemohon='Difobutama' and status='KAKproses' ) AS NJTDA,
		(SELECT SUM(plafond) FROM permohonan_analisa_kredit WHERE
    	month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and kantor_pemohon='Difobutama' and status='acc2' or
    	month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and kantor_pemohon='Difobutama' and status='acc' or
    	month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and kantor_pemohon='Difobutama' and status='acc3' ) AS NJPDAacc,
    	(SELECT COUNT(*) FROM permohonan_analisa_kredit WHERE
    	month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and kantor_pemohon='Difobutama' and status='acc2' or
    	month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and kantor_pemohon='Difobutama' and status='acc3' or
    	month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and kantor_pemohon='Difobutama' and status='acc' ) AS NJTDAacc,
	    (SELECT SUM(plafond) FROM input_targetao where month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and kantor_ao='Difobutama') AS NJPPC,
    	(SELECT COUNT(*) FROM input_targetao where month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and kantor_ao='Difobutama') AS NJTPC,
	    (SELECT SUM(plafond) FROM input_targetao where Year(tanggal_input)=$tahun and kantor_ao='Difobutama' ) AS NJPTPC,
    	(SELECT COUNT(*) FROM input_targetao where Year(tanggal_input)=$tahun and kantor_ao='Difobutama' ) AS NJTTPC
		FROM data_ao_landing ";
		$sqlneworderjumlah = mysqli_query($con, $neworderjumlah);
		$dataneworderjumlah = mysqli_fetch_array($sqlneworderjumlah);
	    $JumDSACR  	= $dataneworderjumlah['NJdsacr'];
	    $JumDSAR  	= $dataneworderjumlah['NJdsar'];
	    $JumSLIKyes 	= $dataneworderjumlah['NJSlikyes'];
	    $JumSLIKno 	    = $dataneworderjumlah['NJSlikno'];
	    $JumSLIKu 	    = $dataneworderjumlah['NJSliku'];
	    $JumPDA 	= $dataneworderjumlah['NJPDA'];
	    $JumTDA 	= $dataneworderjumlah['NJTDA'];
	    $JumPDAacc 	= $dataneworderjumlah['NJPDAacc'];
	    $JumTDAacc 	= $dataneworderjumlah['NJTDAacc'];
	    $JumPPC 	= $dataneworderjumlah['NJPPC'];
	    $JumTPC 	= $dataneworderjumlah['NJTPC'];
	    $JumPTPC 	= $dataneworderjumlah['NJPTPC'];
	    $JumTTPC 	= $dataneworderjumlah['NJTTPC'];
		?>
	    <td style="border: 2px solid black"><?php echo $JumDSACR ?></td>
	    <td style="border: 2px solid black"><?php echo $JumDSAR ?></td>
	    <td style="border: 2px solid black"><?php echo $JumSLIKyes ?></td>
	    <td style="border: 2px solid black"><?php echo $JumSLIKno ?></td>
	    <td style="border: 2px solid black"><?php echo $JumSLIKu ?></td>
	    <td style="border: 2px solid black"><?php echo number_format(substr($JumPDA,0,-3)) ?></td>
	    <td style="border: 2px solid black"><?php echo $JumTDA ?></td>
	    <td style="border: 2px solid black"><?php echo number_format(substr($JumPDAacc,0,-3)) ?></td>
	    <td style="border: 2px solid black"><?php echo $JumTDAacc ?></td>
	    <td style="border: 2px solid black"><?php echo number_format(substr($JumPPC,0,-3)) ?></td>
	    <td style="border: 2px solid black"><?php echo $JumTPC ?></td>
	    <td style="border: 2px solid black"><?php echo number_format(substr($JumPTPC,0,-3))?></td>
	    <td style="border: 2px solid black"><?php echo $JumTTPC ?></td>
		
	<tr>
	</table>
	</div>
	
		<h1><center>History Pengajuan Kredit</center></h1>
	<div class="table-responsive">
	<table id="analistabel1" class="table table-responsive" style="font-size:10px">
	<thead>
	<tr style="border: 2px solid black;text-align: center" align="center">
		<th style="border: 2px solid black;vertical-align: middle; text-align: center"><b>No.</b></th>
		<th style="border: 2px solid black;vertical-align: middle; text-align: center"><b>Nama Nasabah</b></th>
		<th style="border: 2px solid black;vertical-align: middle; text-align: center"><b>Plafond Awal</b></th>
		<th style="border: 2px solid black;vertical-align: middle; text-align: center"><b>A.O</b></th>
		<th style="border: 2px solid black;vertical-align: middle; text-align: center"><b>Tgl SLIK</b></th>
		<th style="border: 2px solid black;vertical-align: middle; text-align: center"><b>Keputusan SLIK</b></th>
		<th style="border: 2px solid black;vertical-align: middle; text-align: center"><b>Time Record A.O</b></th>
		<th style="border: 2px solid black;vertical-align: middle; text-align: center"><b>Tgl Masuk Analis</b></th>
		<th style="border: 2px solid black;vertical-align: middle; text-align: center"><b>Tgl Keputusan Analis</b></th>
		<th style="border: 2px solid black;vertical-align: middle; text-align: center"><b>Plafond Disetujui</b></th>
		<th style="border: 2px solid black;vertical-align: middle; text-align: center"><b>Time Record Analis</b></th>
		<th style="border: 2px solid black;vertical-align: middle; text-align: center"><b>View Detail</b></th>
		
	</tr>
	</thead>
	<?php
	$yes='Yes';
	$info1='Data Telah Diterima Analis';
	$info2='Data Telah Disetujui Analis';
	$info3='Data Ditolak karna alasan tertentu';
	$infobuat='Dibuat';
	$analis= "SELECT *,
	(SELECT nama_nasabah FROM data_slik WHERE nama_nasabah=permohonan_analisa_kredit.nama_nasabah and nama_pemohon=permohonan_analisa_kredit.nama_ao group by nama_nasabah) as nasabah,
	(SELECT plafond_awal FROM padpk_plafond_awal WHERE kode_padpk=permohonan_analisa_kredit.kode_permintaan) as plafondawal,
	(SELECT tanggal_input FROM data_slik WHERE nama_nasabah=permohonan_analisa_kredit.nama_nasabah and nama_pemohon=permohonan_analisa_kredit.nama_ao group by nama_nasabah) as tglslik,
	(SELECT status FROM data_slik WHERE nama_nasabah=permohonan_analisa_kredit.nama_nasabah and nama_pemohon=permohonan_analisa_kredit.nama_ao group by nama_nasabah) as sslik,
	(SELECT tanggal FROM padpk_history_data WHERE info_update='".$infobuat."' and kode_padpk=permohonan_analisa_kredit.kode_permintaan order by tanggal DESC limit 1) as padpkTcreate,
	(SELECT tanggal FROM padpk_history_data WHERE info_update='".$info1."' and kode_padpk=permohonan_analisa_kredit.kode_permintaan ORDER BY tanggal ASC Limit 1) as padpkTawal,
	(SELECT tanggal FROM padpk_history_data WHERE info_update='".$info2."' and kode_padpk=permohonan_analisa_kredit.kode_permintaan ORDER BY tanggal DESC Limit 1) as padpkTakhir,
	(SELECT tanggal FROM padpk_history_data WHERE info_update='".$info3."' and kode_padpk=permohonan_analisa_kredit.kode_permintaan ORDER BY tanggal DESC Limit 1) as padpkTreject
	FROM permohonan_analisa_kredit where kantor_pemohon='Difobutama' order by tanggal_input DESC";	
	$sqlanalis = mysqli_query($con, $analis);
	while($dataanalis = mysqli_fetch_array($sqlanalis)){
	$nasabah_padpk		 		= $dataanalis['nasabah'];
	$plafondawal_padpk		 	= $dataanalis['plafondawal'];
	$ao_padpk				 	= $dataanalis['nama_ao'];
	$tglslik_padpk				= date("d-m-Y",strtotime($dataanalis['tglslik']));
	$tglslik_padpk_format		= new DateTime($tglslik_padpk);
	$sslik_padpk				= $dataanalis['sslik'];
	$tgl_masuk_padpk		 	= date("d-m-Y",strtotime($dataanalis['padpkTcreate']));
	$tgl_masuk_padpk_format		= new DateTime($tgl_masuk_padpk);
	$time_record_slik			= $tglslik_padpk_format->diff($tgl_masuk_padpk_format);
	
	$tgl_masuka_padpk		 	= date("d-m-Y",strtotime($dataanalis['padpkTawal']));
	$tgl_masuka_padpk_format	= new DateTime($tgl_masuka_padpk);
	$tgl_acc_padpk		 		= date("d-m-Y",strtotime($dataanalis['padpkTakhir']));
	$tgl_acc_padpk_format		= new DateTime($tgl_acc_padpk);
	$tgl_reject_padpk		 	= date("d-m-Y",strtotime($dataanalis['padpkTreject']));
	$tgl_reject_padpk_format	= new DateTime($tgl_reject_padpk);
	$time_record				= $tgl_masuka_padpk_format->diff($tgl_acc_padpk_format);
	$time_record_reject			= $tgl_masuka_padpk_format->diff($tgl_reject_padpk_format);
	$status_padpk				= $dataanalis['status'];
	$plafond_disetujui_padpk	= $dataanalis['plafond'];
	?>
	<tr>
	<td style="text-align: center;;border: 2px solid black"><?php echo $no2ss ?></td>
	<td style="border: 2px solid black"><?php echo $nasabah_padpk ?></td>
	<td style="border: 2px solid black"><?php echo rupiah($plafondawal_padpk) ?></td>
	<td style="border: 2px solid black"><?php echo $ao_padpk ?></td>
	<td style="border: 2px solid black"><?php 
		if($tglslik_padpk==date("01-01-1970")){
		   echo ("-");
		}else
		{
			echo "$tglslik_padpk";
		}
		?></td>
	<td style="border: 2px solid black"><?php echo $sslik_padpk ?></td>
	<td style="border: 2px solid black"><?php 
		if($tglslik_padpk==date("01-01-1970")){
		   echo ("-");
		}else
		{
			echo "$time_record_slik->days hari";
		}
		?></td>
	<td style="border: 2px solid black"><?php 
		if($tgl_masuka_padpk==date("01-01-1970")){
		   echo ("-");
		}else
		{
			echo $tgl_masuka_padpk;
		}
		?></td>
	<td style="border: 2px solid black">
		<?php if($status_padpk=="rejected")
		{
		echo $tgl_reject_padpk;
		}elseif($tgl_acc_padpk==date("01-01-1970"))
		{
		echo("-");
		}else{
		echo $tgl_acc_padpk ;
		}
		?>
	</td>
	<td style="border: 2px solid black">
		<?php if($status_padpk=="rejected" or $status_padpk=="revised"){
		echo($status_padpk);
	    }elseif($tgl_acc_padpk==date("01-01-1970")){
		echo rupiah(0);
	    }else{
		echo rupiah($plafond_disetujui_padpk);
		}
		?>
	</td>
	<td style="border: 2px solid black"><?php
		if($tgl_masuka_padpk==date("01-01-1970")){
		echo ("Keputusan B.M");	
		}elseif($status_padpk=="acc2" or $status_padpk=="acc3"){
		echo "$time_record->days hari";	
		}elseif($status_padpk=="rejected"){
		echo "$time_record_reject->days hari";	
		}
		elseif($status_padpk=="revised"){
		echo "Berkas Dikembalikan";	
		}
		else{ 
		echo("Blm Ada Keputusan");
		}
		?>
	</td>
	<td style="text-align: center;;border: 2px solid black"><a href="PADPK_viewer_only.php?kode_permintaan=<?php echo $dataanalis['kode_permintaan']?>" class="btn btn-default"><span class="glyphicon glyphicon-eye-open" style="height: 10px;width: 10px"></span></a></td>
	</tr>
	<?php
	$no2ss++;
	}
	?>
		
	</table>
	</div>
	
		<h1><center>SLIK YANG BELUM MASUK PADPK</center></h1>
	<div class="table-responsive">
	<table class="table" id="sliknonpadpk1">
	<thead>
	<tr style="border: 2px solid black; text-align: center" align="center">
		<th style="border: 2px solid black;vertical-align: middle; text-align: center"><b>No.</b></th>
		<th style="border: 2px solid black;vertical-align: middle; text-align: center"><b>Nama A.O</b></th>
		<th style="border: 2px solid black;vertical-align: middle; text-align: center"><b>Nama Nasabah</b></th>
		<th style="border: 2px solid black;vertical-align: middle; text-align: center"><b>Keterangan</b></th>
		<th style="border: 2px solid black;vertical-align: middle; text-align: center"><b>Tanggal Input Slik</b></th>
	</tr>
	</thead>
	<?php
	$sliknonpadpk= "SELECT * FROM data_slik WHERE NOT EXISTS (select nama_nasabah from permohonan_analisa_kredit where data_slik.nama_nasabah=permohonan_analisa_kredit.nama_nasabah) and status='Yes' and kantor_pemohon='Difobutama' or  NOT EXISTS (select nama_nasabah from permohonan_analisa_kredit where data_slik.nama_nasabah=permohonan_analisa_kredit.nama_nasabah) and status='No' and kantor_pemohon='Difobutama' ORDER BY tanggal_input DESC";	
	$sqlsliknonpadpk = mysqli_query($con, $sliknonpadpk);
	while($datasliknonpadpk = mysqli_fetch_array($sqlsliknonpadpk)){
	$sliknonpadpk_namaao		= $datasliknonpadpk['nama_pemohon'];
	$sliknonpadpk_namanasabah	= $datasliknonpadpk['nama_nasabah'];
	$sliknonpadpk_status		= $datasliknonpadpk['status'];
	$sliknonpadpk_tanggal_input	= date("d-m-Y",strtotime($datasliknonpadpk['tanggal_input']));
	?>
	<tr>
	<td style="text-align: center;;border: 2px solid black"><?php echo $no2slik ?></td>
	<td style="border: 2px solid black"><?php echo $sliknonpadpk_namaao ?></td>
	<td style="border: 2px solid black"><?php echo $sliknonpadpk_namanasabah ?></td>
	<td style="border: 2px solid black"><?php echo $sliknonpadpk_status ?></td>
	<td style="border: 2px solid black"><?php echo $sliknonpadpk_tanggal_input ?></td>
	</tr>
	<?php
	$no2slik++;
	}
	?>
	</table>
	</div>
		<h1><center>Rangkuman Produktivitas A.O Funding</center></h1>
	<div class="table-responsive">
	<table class="table">
	<tr style="border: 2px solid black" align="center">
		<td rowspan="3" style="border: 2px solid black;vertical-align: middle"><b>No.</b></td>
		<td rowspan="3" style="border: 2px solid black;vertical-align: middle"><b>Nama A.O.F</b></td>
		<td rowspan="3" style="border: 2px solid black;vertical-align: middle"><b>D.S.A.R</b></td>
		<td colspan="4" style="border: 2px solid black;vertical-align: middle"><b>Data Produktivitas Funding</b></td>
	</tr>
	<tr style="border: 2px solid black" align="center">
		<td colspan="2" style="border: 2px solid black;vertical-align: middle"><b>Bulan Ini</b></td>
		<td colspan="2" style="border: 2px solid black;vertical-align: middle"><b>Tahun Ini</b></td>
	</tr>
		<tr style="border: 2px solid black" align="center" valign="middle">
			<td style="border: 2px solid black;vertical-align: middle"><b>Jumlah</b></td>
			<td style="border: 2px solid black;vertical-align: middle"><b>Account</b></td>
			<td style="border: 2px solid black;vertical-align: middle"><b>Jumlah</b></td>
			<td style="border: 2px solid black;vertical-align: middle"><b>Account</b></td>
		</tr>
	<?php
	$funding= "SELECT *,
	(SELECT id_ao FROM sales_plan WHERE id_ao=data_ao_funding.kode_ao group by data_ao_funding.nama_ao) AS Tdsarf,
	(SELECT COUNT(*) FROM sales_plan WHERE month(tanggal_sp)=$bulan and nama_karyawan=data_ao_funding.nama_ao  group by data_ao_funding.nama_ao ) AS TTdsarf,
	(SELECT SUM(nominal) FROM input_targetaof WHERE month(tgl_buka)=$bulan and nama_ao=data_ao_funding.nama_ao) AS Tjpasbf,
	(SELECT COUNT(*) FROM input_targetaof WHERE month(tgl_buka)=$bulan and nama_ao=data_ao_funding.nama_ao) AS TjpasbAf,
	(SELECT SUM(nominal) FROM input_targetaof WHERE Year(tgl_buka)=$tahun and nama_ao=data_ao_funding.nama_ao) AS TjpasTf,
	(SELECT COUNT(*) FROM input_targetaof WHERE Year(tgl_buka)=$tahun and nama_ao=data_ao_funding.nama_ao) AS TjpasTAf
	FROM data_ao_funding WHERE kode_perusahaan='111' group by nama_ao";	
	$sqlfunding = mysqli_query($con, $funding);
	while($datafunding = mysqli_fetch_array($sqlfunding)){
	$namaaof		 			= $datafunding['nama_ao'];
	$jumlahdsaraof		  		= $datafunding['TTdsarf'];
	$jumlahpcairbaof 		 	= $datafunding['Tjpasbf'];
	$jumlahpcairbaofa  			= $datafunding['TjpasbAf'];
	$jumlahpcairtaof  			= $datafunding['TjpasTf'];
	$jumlahpcairtaofa 			= $datafunding['TjpasTAf'];
	?>
	<tr>
	<td style="text-align: center;;border: 2px solid black"><?php echo $no2s ?></td>
	<td style="border: 2px solid black"><?php echo $namaaof ?></td>
	<td style="border: 2px solid black"><?php echo $jumlahdsaraof ?></td>
	<td style="border: 2px solid black"><?php echo rupiah($jumlahpcairbaof) ?></td>
	<td style="border: 2px solid black"><?php echo $jumlahpcairbaofa ?></td>
	<td style="border: 2px solid black"><?php echo rupiah($jumlahpcairtaof) ?></td>
	<td style="border: 2px solid black"><?php echo $jumlahpcairtaofa ?></td>
	</tr>
	<?php
	$no2s++;
	}
	?>
		
	</table>
	</div>
		
	<h1><center>Rangkuman Produktivitas Divisi Collection</center></h1>
	<div class="table-responsive">
	<table class="table" style="font-size : 10px">
	<tr style="border: 2px solid black" align="center">
		<td rowspan="3" style="border: 2px solid black;vertical-align: middle"><b>No.</b></td>
		<td rowspan="3" style="border: 2px solid black;vertical-align: middle"><b>Nama Collector</b></td>
		<td rowspan="3" style="border: 2px solid black;vertical-align: middle"><b>D.C.A.R</b></td>
		<td colspan="9" style="border: 2px solid black;vertical-align: middle"><b>Performance Penagihan</b></td>
	</tr>
	<tr style="border: 2px solid black" align="center">
		<td colspan="4" style="border: 2px solid black;vertical-align: middle"><b>Target Plan</b></td>
		<td colspan="5" style="border: 2px solid black;vertical-align: middle"><b>Pencapaian</b></td>
	</tr>
		<tr style="border: 2px solid black" align="center" valign="middle">
			<td style="border: 2px solid black;vertical-align: middle"><b>Account</b></td>
			<td style="border: 2px solid black;vertical-align: middle"><b>Pokok</b></td>
			<td style="border: 2px solid black;vertical-align: middle"><b>Bunga</b></td>
			<td style="border: 2px solid black;vertical-align: middle"><b>Total</b></td>
			<td style="border: 2px solid black;vertical-align: middle"><b>Account</b></td>
			<td style="border: 2px solid black;vertical-align: middle"><b>Pokok</b></td>
			<td style="border: 2px solid black;vertical-align: middle"><b>Bunga</b></td>
			<td style="border: 2px solid black;vertical-align: middle"><b>Denda</b></td>
			<td style="border: 2px solid black;vertical-align: middle"><b>Total</b></td>
		</tr>
	<?php
	$collection= "SELECT *,
	(SELECT COUNT(*) FROM laporan_penagihan WHERE month(tanggal_penagihan)=$bulan and year(tanggal_penagihan)=$tahun and media_penagihan='Kunjungan' and nama_kolektor=data_k_penagihan.nama_collector) AS Tdcar,
	(SELECT COUNT(*) FROM target_penagihan WHERE month(periode)=$bulan and year(periode)=$tahun and nama=data_k_penagihan.nama_collector group by data_k_penagihan.nama_collector) AS TAccTP,
	(SELECT SUM(pokok) FROM target_penagihan WHERE month(periode)=$bulan and year(periode)=$tahun and nama=data_k_penagihan.nama_collector group by data_k_penagihan.nama_collector) AS TpokokTP,
	(SELECT SUM(bunga) FROM target_penagihan WHERE month(periode)=$bulan and year(periode)=$tahun and nama=data_k_penagihan.nama_collector group by data_k_penagihan.nama_collector) AS TbungaTP,
	(SELECT COUNT(*) FROM input_targetcollection WHERE month(tanggal_bayar)=$bulan and year(tanggal_bayar)=$tahun and nama_collector=data_k_penagihan.nama_collector group by data_k_penagihan.nama_collector) AS TAccIT,
	(SELECT SUM(pokok) FROM input_targetcollection WHERE month(tanggal_bayar)=$bulan and year(tanggal_bayar)=$tahun and nama_collector=data_k_penagihan.nama_collector group by data_k_penagihan.nama_collector) AS TpokokIT,
	(SELECT SUM(bunga) FROM input_targetcollection WHERE month(tanggal_bayar)=$bulan and year(tanggal_bayar)=$tahun and nama_collector=data_k_penagihan.nama_collector group by data_k_penagihan.nama_collector) AS TbungaIT,
	(SELECT SUM(denda) FROM input_targetcollection WHERE month(tanggal_bayar)=$bulan and year(tanggal_bayar)=$tahun and nama_collector=data_k_penagihan.nama_collector group by data_k_penagihan.nama_collector) AS TdendaIT
	FROM data_k_penagihan WHERE kode_perusahaan='111' group by nama_collector";	
	$sqlcollection = mysqli_query($con, $collection);
	while($datacollection = mysqli_fetch_array($sqlcollection)){
	$nama_collector	= $datacollection['nama_collector'];
	$totaldcar		= $datacollection['Tdcar'];
	$totalaccountTP	= $datacollection['TAccTP'];
	$totalpokokTP	= $datacollection['TpokokTP'];
	$totalbungaTP	= $datacollection['TbungaTP'];
	$totalaccountIT	= $datacollection['TAccIT'];
	$totalpokokIT	= $datacollection['TpokokIT'];
	$totalbungaIT	= $datacollection['TbungaIT'];
	$totaldendaIT	= $datacollection['TdendaIT'];
	?>
	<tr>
	<td style="text-align: center;;border: 2px solid black"><?php echo $no3s ?></td>
	<td style="border: 2px solid black"><?php echo $nama_collector ?></td>
	<td style="border: 2px solid black"><?php echo $totaldcar ?></td>
	<td style="border: 2px solid black"><?php echo $totalaccountTP ?></td>
	<td style="border: 2px solid black"><?php echo rupiah($totalpokokTP) ?></td>
	<td style="border: 2px solid black"><?php echo rupiah($totalbungaTP) ?></td>
	<td style="border: 2px solid black"><?php echo rupiah($totalpokokTP+$totalbungaTP) ?></td>
	<td style="border: 2px solid black"><?php echo $totalaccountIT ?></td>
	<td style="border: 2px solid black"><?php echo rupiah($totalpokokIT) ?></td>
	<td style="border: 2px solid black"><?php echo rupiah($totalbungaIT) ?></td>
	<td style="border: 2px solid black"><?php echo rupiah($totaldendaIT) ?></td>
	<td style="border: 2px solid black"><?php echo rupiah($totalpokokIT+$totalbungaIT+$totaldendaIT) ?></td>
	</tr>
	<?php
	$no3s++;
	}
	?>
	</table>
	</div>
		<h2><center><b>Laporan Mingguan Dayly Activity Record</b></center></h2>
	<div class="table-responsive">
	<table class="table table-responsive">
	<tr style="text-align: center; border: 2px solid black">
		<td style="border: 2px solid black;"><b>No.</b></td>
		<td style="border: 2px solid black"><b>Nama Karyawan</b></td>
		<td style="border: 2px solid black"><b><?php echo (date('D, d-m-Y', $h6))?></b></td>
		<td style="border: 2px solid black"><b><?php echo (date('D, d-m-Y', $h5))?></b></td>
		<td style="border: 2px solid black"><b><?php echo (date('D, d-m-Y', $h4))?></b></td>
		<td style="border: 2px solid black"><b><?php echo (date('D, d-m-Y', $h3))?></b></td>
		<td style="border: 2px solid black"><b><?php echo (date('D, d-m-Y', $h2))?></b></td>
		<td style="border: 2px solid black"><b><?php echo (date('D, d-m-Y', $h1))?></b></td>
		<td style="border: 2px solid black"><b><?php echo (date('D, d-m-Y'))?></b></td>
		<td style="border: 2px solid black"><b>Total/Minggu</b></td>
	</tr>
	<?php
	$data_diambil= 
	"SELECT nama_karyawan, 
	count(IF((tanggal_sp)='$hari7',nama_karyawan,null)) as TH7, count(IF((tanggal_sp)='$hari6',nama_karyawan,null)) as TH6, count(IF((tanggal_sp)='$hari5',nama_karyawan,null)) as TH5, count(IF((tanggal_sp)='$hari4',nama_karyawan,null)) as TH4, count(IF((tanggal_sp)='$hari3',nama_karyawan,null)) as TH3, count(IF((tanggal_sp)='$hari2',nama_karyawan,null)) as TH2, count(IF((tanggal_sp)='$hari1',nama_karyawan,null)) as TH1
	from sales_plan t1 join data_ao_landing t2 on t2.nama_ao = t1.nama_karyawan 
	where t1.kantor='Difobutama'
	group by t2.nama_ao" ;
	$sql = mysqli_query($con, $data_diambil);
	
	while($data = mysqli_fetch_array($sql)){
	$nama_ao  = $data['nama_karyawan'];
	$jumlahTH7  = $data['TH7'];
	$jumlahTH6  = $data['TH6'];
	$jumlahTH5  = $data['TH5'];
	$jumlahTH4  = $data['TH4'];
	$jumlahTH3  = $data['TH3'];
	$jumlahTH2  = $data['TH2'];
	$jumlahTH1  = $data['TH1'];
	$jumlahTHweek  = 0;
	
	$jumlahTHweek += $jumlahTH7 + $jumlahTH6 + $jumlahTH5 + $jumlahTH4 + $jumlahTH3 + $jumlahTH2
	+ $jumlahTH1;
	?>
	<tr>
	<td style="text-align: center;;border: 2px solid black"><?php echo $no ?></td>
	<td style="border: 2px solid black"><?php echo $nama_ao ?></td>
	<td style="text-align: center;color: <?php if($jumlahTH7 < 3){ echo ('white');}else{echo('white');} ?>;border: 2px solid black"><?php echo $jumlahTH7 ?></td>
	<td style="text-align: center;color: <?php if($jumlahTH6 < 3){ echo ('white');}else{echo('white');} ?>;border: 2px solid black"><?php echo $jumlahTH6 ?></td>
	<td style="text-align: center;color: <?php if($jumlahTH5 < 3){ echo ('white');}else{echo('white');} ?>;border: 2px solid black"><?php echo $jumlahTH5 ?></td>
	<td style="text-align: center;color: <?php if($jumlahTH4 < 3){ echo ('white');}else{echo('white');} ?>;border: 2px solid black"><?php echo $jumlahTH4 ?></td>
	<td style="text-align: center;color: <?php if($jumlahTH3 < 3){ echo ('white');}else{echo('white');} ?>;border: 2px solid black"><?php echo $jumlahTH3 ?></td>
	<td style="text-align: center;color: <?php if($jumlahTH2 < 3){ echo ('white');}else{echo('white');} ?>;border: 2px solid black"><?php echo $jumlahTH2 ?></td>
	<td style="text-align: center;color: <?php if($jumlahTH1 < 3){ echo ('white');}else{echo('white');} ?>;border: 2px solid black"><?php echo $jumlahTH1 ?></td>
	<td style="text-align: center;color: <?php if($jumlahTHweek < 15){ echo ('white');}else{echo('white');} ?>;border: 2px solid black"><?php echo $jumlahTHweek ?></td>
	</tr>
	<?php
	$no++;
	}
	?>
	<tr><td colspan="10" style="text-align: center;">AO LANDING Call<td></tr>
	
	<?php
	$data_diambilcall= 
	"SELECT nama_user, 
	count(IF((tanggal)='$hari7',nama_user,null)) as TH7call, count(IF((tanggal)='$hari6',nama_user,null)) as TH6call, count(IF((tanggal)='$hari5',nama_user,null)) as TH5call, count(IF((tanggal)='$hari4',nama_user,null)) as TH4call, count(IF((tanggal)='$hari3',nama_user,null)) as TH3call, count(IF((tanggal)='$hari2',nama_user,null)) as TH2call, count(IF((tanggal)='$hari1',nama_user,null)) as TH1call
	from ao_data_call t1 join data_ao_landing t2 on t2.nama_ao = t1.nama_user 
	where t1.kantor_user='Difobutama'
	group by t2.nama_ao" ;
	$sqlcall = mysqli_query($con, $data_diambilcall);
	while($datacall = mysqli_fetch_array($sqlcall)){
	
	$nama_aocall    = $datacall['nama_user'];
	$jumlahTH7call  = $datacall['TH7call'];
	$jumlahTH6call  = $datacall['TH6call'];
	$jumlahTH5call  = $datacall['TH5call'];
	$jumlahTH4call  = $datacall['TH4call'];
	$jumlahTH3call  = $datacall['TH3call'];
	$jumlahTH2call  = $datacall['TH2call'];
	$jumlahTH1call  = $datacall['TH1call'];
	$jumlahTHweekcall  = 0;
	
	$jumlahTHweekcall += $jumlahTH7call + $jumlahTH6call + $jumlahTH5call + $jumlahTH4call + $jumlahTH3call + $jumlahTH2call
	+ $jumlahTH1call; 
	
	?>
	<tr>
	<td style="text-align: center;;border: 2px solid black"><?php echo $no ?></td>
	<td style="border: 2px solid black"><?php echo $nama_aocall ?></td>
	<td style="text-align: center;color: <?php if($jumlahTH7call < 3){ echo ('white');}else{echo('white');} ?>;border: 2px solid black"><?php echo $jumlahTH7call ?></td>
	<td style="text-align: center;color: <?php if($jumlahTH6call < 3){ echo ('white');}else{echo('white');} ?>;border: 2px solid black"><?php echo $jumlahTH6call ?></td>
	<td style="text-align: center;color: <?php if($jumlahTH5call < 3){ echo ('white');}else{echo('white');} ?>;border: 2px solid black"><?php echo $jumlahTH5call ?></td>
	<td style="text-align: center;color: <?php if($jumlahTH4call < 3){ echo ('white');}else{echo('white');} ?>;border: 2px solid black"><?php echo $jumlahTH4call ?></td>
	<td style="text-align: center;color: <?php if($jumlahTH3call < 3){ echo ('white');}else{echo('white');} ?>;border: 2px solid black"><?php echo $jumlahTH3call ?></td>
	<td style="text-align: center;color: <?php if($jumlahTH2call < 3){ echo ('white');}else{echo('white');} ?>;border: 2px solid black"><?php echo $jumlahTH2call ?></td>
	<td style="text-align: center;color: <?php if($jumlahTH1call < 3){ echo ('white');}else{echo('white');} ?>;border: 2px solid black"><?php echo $jumlahTH1call ?></td>
	<td style="text-align: center;color: <?php if($jumlahTHweekcall < 15){ echo ('white');}else{echo('white');} ?>;border: 2px solid black"><?php echo $jumlahTHweekcall ?></td>
	</tr>
	<?php
	$no++;
	}
	?>
	<tr><td>FUNDING<td></tr>
	<?php
	$datafunding_diambil= 
	"SELECT nama_karyawan, 
	count(IF((tanggal_sp)='$hari7',nama_karyawan,null)) as TH7funding, count(IF((tanggal_sp)='$hari6',nama_karyawan,null)) as TH6funding, count(IF((tanggal_sp)='$hari5',nama_karyawan,null)) as TH5funding, count(IF((tanggal_sp)='$hari4',nama_karyawan,null)) as TH4funding, count(IF((tanggal_sp)='$hari3',nama_karyawan,null)) as TH3funding, count(IF((tanggal_sp)='$hari2',nama_karyawan,null)) as TH2funding, count(IF((tanggal_sp)='$hari1',nama_karyawan,null)) as TH1funding
	from sales_plan t1 join data_ao_funding t2 on t2.nama_ao = t1.nama_karyawan 
	where t1.kantor='Difobutama'
	group by t2.nama_ao" ;
	$sqlfunding = mysqli_query($con, $datafunding_diambil);
	while($datafunding = mysqli_fetch_array($sqlfunding)){
	$nama_aofunding  = $datafunding['nama_karyawan'];
	$jumlahTH7funding  = $datafunding['TH7funding'];
	$jumlahTH6funding  = $datafunding['TH6funding'];
	$jumlahTH5funding  = $datafunding['TH5funding'];
	$jumlahTH4funding  = $datafunding['TH4funding'];
	$jumlahTH3funding  = $datafunding['TH3funding'];
	$jumlahTH2funding  = $datafunding['TH2funding'];
	$jumlahTH1funding  = $datafunding['TH1funding'];
	$jumlahTHweekfunding  = 0;
	
	$jumlahTHweekfunding += $jumlahTH7funding + $jumlahTH6funding + $jumlahTH5funding + $jumlahTH4funding + $jumlahTH3funding + $jumlahTH2funding
	+ $jumlahTH1funding; 
	
	?>
	<tr>
	<td style="text-align: center;;border: 2px solid black"><?php echo $no ?></td>
	<td style="border: 2px solid black"><?php echo $nama_aofunding ?></td>
	<td style="text-align: center;color: <?php if($jumlahTH7funding < 3){ echo ('white');}else{echo('white');} ?>;border: 2px solid black"><?php echo $jumlahTH7funding ?></td>
	<td style="text-align: center;color: <?php if($jumlahTH6funding < 3){ echo ('white');}else{echo('white');} ?>;border: 2px solid black"><?php echo $jumlahTH6funding ?></td>
	<td style="text-align: center;color: <?php if($jumlahTH5funding < 3){ echo ('white');}else{echo('white');} ?>;border: 2px solid black"><?php echo $jumlahTH5funding ?></td>
	<td style="text-align: center;color: <?php if($jumlahTH4funding < 3){ echo ('white');}else{echo('white');} ?>;border: 2px solid black"><?php echo $jumlahTH4funding ?></td>
	<td style="text-align: center;color: <?php if($jumlahTH3funding < 3){ echo ('white');}else{echo('white');} ?>;border: 2px solid black"><?php echo $jumlahTH3funding ?></td>
	<td style="text-align: center;color: <?php if($jumlahTH2funding < 3){ echo ('white');}else{echo('white');} ?>;border: 2px solid black"><?php echo $jumlahTH2funding ?></td>
	<td style="text-align: center;color: <?php if($jumlahTH1funding < 3){ echo ('white');}else{echo('white');} ?>;border: 2px solid black"><?php echo $jumlahTH1funding ?></td>
	<td style="text-align: center;color: <?php if($jumlahTHweekfunding < 15){ echo ('white');}else{echo('white');} ?>;border: 2px solid black"><?php echo $jumlahTHweekfunding ?></td>
	</tr>
	<?php
	$no++;
	}
	?>
	<tr><td>Collection<td></tr>
	<?php
	$datacollectionxx_diambil= 
	"SELECT nama_kolektor, 
	count(IF((tanggal_penagihan)='$hari7',nama_kolektor,null)) as TH7collection, count(IF((tanggal_penagihan)='$hari6',nama_kolektor,null)) as TH6collection, count(IF((tanggal_penagihan)='$hari5',nama_kolektor,null)) as TH5collection, count(IF((tanggal_penagihan)='$hari4',nama_kolektor,null)) as TH4collection, count(IF((tanggal_penagihan)='$hari3',nama_kolektor,null)) as TH3collection, count(IF((tanggal_penagihan)='$hari2',nama_kolektor,null)) as TH2collection, count(IF((tanggal_penagihan)='$hari1',nama_kolektor,null)) as TH1collection
	from laporan_penagihan t1 join data_k_penagihan t2 on t2.nama_collector = t1.nama_kolektor 
	where t1.kantor='Difobutama' and t1.media_penagihan='Kunjungan'
	group by t2.nama_collector" ;
	$sqlcollectionxx = mysqli_query($con, $datacollectionxx_diambil);
	while($datacollectionxx = mysqli_fetch_array($sqlcollectionxx)){
	$nama_kolektorxx		 = $datacollectionxx['nama_kolektor'];
	$jumlahTH7collection  	 = $datacollectionxx['TH7collection'];
	$jumlahTH6collection  	 = $datacollectionxx['TH6collection'];
	$jumlahTH5collection  	 = $datacollectionxx['TH5collection'];
	$jumlahTH4collection  	 = $datacollectionxx['TH4collection'];
	$jumlahTH3collection  	 = $datacollectionxx['TH3collection'];
	$jumlahTH2collection  	 = $datacollectionxx['TH2collection'];
	$jumlahTH1collection  	 = $datacollectionxx['TH1collection'];
	$jumlahTHweekcollection  = 0;
	
	$jumlahTHweekcollection += $jumlahTH7collection + $jumlahTH6collection + $jumlahTH5collection + $jumlahTH4collection + $jumlahTH3collection + $jumlahTH2collection
	+ $jumlahTH1collection; 
	
	?>
	<tr>
	<td style="text-align: center;;border: 2px solid black"><?php echo $no ?></td>
	<td style="border: 2px solid black"><?php echo $nama_kolektorxx ?></td>
	<td style="text-align: center;color: <?php if($jumlahTH7collection < 3){ echo ('white');}else{echo('white');} ?>;border: 2px solid black"><?php echo $jumlahTH7collection ?></td>
	<td style="text-align: center;color: <?php if($jumlahTH6collection < 3){ echo ('white');}else{echo('white');} ?>;border: 2px solid black"><?php echo $jumlahTH6collection ?></td>
	<td style="text-align: center;color: <?php if($jumlahTH5collection < 3){ echo ('white');}else{echo('white');} ?>;border: 2px solid black"><?php echo $jumlahTH5collection ?></td>
	<td style="text-align: center;color: <?php if($jumlahTH4collection < 3){ echo ('white');}else{echo('white');} ?>;border: 2px solid black"><?php echo $jumlahTH4collection ?></td>
	<td style="text-align: center;color: <?php if($jumlahTH3collection < 3){ echo ('white');}else{echo('white');} ?>;border: 2px solid black"><?php echo $jumlahTH3collection ?></td>
	<td style="text-align: center;color: <?php if($jumlahTH2collection < 3){ echo ('white');}else{echo('white');} ?>;border: 2px solid black"><?php echo $jumlahTH2collection ?></td>
	<td style="text-align: center;color: <?php if($jumlahTH1collection < 3){ echo ('white');}else{echo('white');} ?>;border: 2px solid black"><?php echo $jumlahTH1collection ?></td>
	<td style="text-align: center;color: <?php if($jumlahTHweekcollection < 15){ echo ('white');}else{echo('white');} ?>;border: 2px solid black"><?php echo $jumlahTHweekcollection ?></td>
	</tr>
	<?php
	$no++;
	}
	?>
	</table>
	</div>
	
		<h2><center><b>Laporan Mingguan SLIK</b></center></h2>
	<div class="table-responsive">
	<table class="table table-responsive">
	<tr style="text-align: center; border: 2px solid black">
		<td style="border: 2px solid black;"><b>No.</b></td>
		<td style="border: 2px solid black"><b>Nama A.O</b></td>
		<td style="border: 2px solid black"><b><?php echo (date('D, d-m-Y', $h6))?></b></td>
		<td style="border: 2px solid black"><b><?php echo (date('D, d-m-Y', $h5))?></b></td>
		<td style="border: 2px solid black"><b><?php echo (date('D, d-m-Y', $h4))?></b></td>
		<td style="border: 2px solid black"><b><?php echo (date('D, d-m-Y', $h3))?></b></td>
		<td style="border: 2px solid black"><b><?php echo (date('D, d-m-Y', $h2))?></b></td>
		<td style="border: 2px solid black"><b><?php echo (date('D, d-m-Y', $h1))?></b></td>
		<td style="border: 2px solid black"><b><?php echo (date('D, d-m-Y'))?></b></td>
		<td style="border: 2px solid black"><b>Total/Minggu</b></td>
	</tr>
	<?php
	$data_diambils= 
	"SELECT nama_pemohon, 
	count(IF((tanggal_input)='$hari7',nama_pemohon,null)) as THs7, count(IF((tanggal_input)='$hari6',nama_pemohon,null)) as THs6, count(IF((tanggal_input)='$hari5',nama_pemohon,null)) as THs5, count(IF((tanggal_input)='$hari4',nama_pemohon,null)) as THs4, count(IF((tanggal_input)='$hari3',nama_pemohon,null)) as THs3, count(IF((tanggal_input)='$hari2',nama_pemohon,null)) as THs2, count(IF((tanggal_input)='$hari1',nama_pemohon,null)) as THs1
	from data_slik t1 join data_ao_landing t2 on t2.nama_ao = t1.nama_pemohon 
	where t1.kantor_pemohon='Difobutama'
	group by t2.nama_ao" ;
	$sqls = mysqli_query($con, $data_diambils);
	while($datas = mysqli_fetch_array($sqls)){
	$nama_pemohon  	= $datas['nama_pemohon'];
	$jumlahTHs7 	= $datas['THs7'];
	$jumlahTHs6  	= $datas['THs6'];
	$jumlahTHs5  	= $datas['THs5'];
	$jumlahTHs4  	= $datas['THs4'];
	$jumlahTHs3  	= $datas['THs3'];
	$jumlahTHs2  	= $datas['THs2'];
	$jumlahTHs1  	= $datas['THs1'];
	$jumlahTHsweek  = 0;
	
	$jumlahTHsweek += $jumlahTHs7 + $jumlahTHs6 + $jumlahTHs5 + $jumlahTHs4 + $jumlahTHs3 + $jumlahTHs2 + $jumlahTHs1; 
	
	?>
	<tr>
	<td style="text-align: center;;border: 2px solid black"><?php echo $nos ?></td>
	<td style="border: 2px solid black"><?php echo $nama_pemohon ?></td>
	<td style="text-align: center;color: <?php if($jumlahTHs7 < 1){ echo ('white');}else{echo('white');} ?>;border: 2px solid black"><?php echo $jumlahTHs7 ?></td>
	<td style="text-align: center;color: <?php if($jumlahTHs6 < 1){ echo ('white');}else{echo('white');} ?>;border: 2px solid black"><?php echo $jumlahTHs6 ?></td>
	<td style="text-align: center;color: <?php if($jumlahTHs5 < 1){ echo ('white');}else{echo('white');} ?>;border: 2px solid black"><?php echo $jumlahTHs5 ?></td>
	<td style="text-align: center;color: <?php if($jumlahTHs4 < 1){ echo ('white');}else{echo('white');} ?>;border: 2px solid black"><?php echo $jumlahTHs4 ?></td>
	<td style="text-align: center;color: <?php if($jumlahTHs3 < 1){ echo ('white');}else{echo('white');} ?>;border: 2px solid black"><?php echo $jumlahTHs3 ?></td>
	<td style="text-align: center;color: <?php if($jumlahTHs2 < 1){ echo ('white');}else{echo('white');} ?>;border: 2px solid black"><?php echo $jumlahTHs2 ?></td>
	<td style="text-align: center;color: <?php if($jumlahTHs1 < 1){ echo ('white');}else{echo('white');} ?>;border: 2px solid black"><?php echo $jumlahTHs1 ?></td>
	<td style="text-align: center;color: <?php if($jumlahTHsweek < 5){ echo ('white');}else{echo('white');} ?>;border: 2px solid black"><?php echo $jumlahTHsweek ?></td>
	</tr>
	<?php
	$nos++;
	}
	?>
	
	</table>
	</div>
	
		<h2><center><b>Laporan Berjalan</b></center></h2>
		<h3><center><b>[ D.S.A.R ][ S.L.I.K ][ Data di Analis ]</b></center></h2>
	<div class="table-responsive">
	<table class="table table-responsive">
	<th rowspan="2" style="border: 2px solid black;vertical-align: middle;text-align: center">No.</th>
	<th rowspan="2" style="border: 2px solid black;vertical-align: middle;text-align: center">Nama A.O</th>
	<th colspan="3" style="border: 2px solid black;vertical-align: middle;text-align: center">TimeStamp : <?php echo (($tanggal1." s/d ".date('d-m-Y')))?></th>
	<tr>
	<th style="border: 2px solid black;vertical-align: middle;text-align: center">D.S.A.R</th>
	<th style="border: 2px solid black;vertical-align: middle;text-align: center">S.L.I.K</th>
	<th style="border: 2px solid black;vertical-align: middle;text-align: center">Data di Analis</th>
	</tr>
	<?php 
	$neworder00= "SELECT *,
	(SELECT id_ao FROM sales_plan WHERE id_ao=data_ao_landing.kode_ao group by data_ao_landing.nama_ao) AS Tdsarzz,
	(SELECT COUNT(*) FROM sales_plan WHERE month(tanggal_sp)=$bulan and year(tanggal_sp)=$tahun and nama_karyawan=data_ao_landing.nama_ao  group by data_ao_landing.nama_ao ) AS TTdsarzz,
	(SELECT COUNT(*) FROM data_slik WHERE month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and nama_pemohon=data_ao_landing.nama_ao group by data_ao_landing.nama_ao) AS Tslikzz,
	(SELECT SUM(plafond) FROM permohonan_analisa_kredit WHERE
	nama_ao=data_ao_landing.nama_ao and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='acc2' or
	nama_ao=data_ao_landing.nama_ao and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='acc' or
	nama_ao=data_ao_landing.nama_ao and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='AKproses' or
	nama_ao=data_ao_landing.nama_ao and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='AKproses2' or
	nama_ao=data_ao_landing.nama_ao and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='acc3' or
	nama_ao=data_ao_landing.nama_ao and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='revised' or
	nama_ao=data_ao_landing.nama_ao and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='rejected' or
	nama_ao=data_ao_landing.nama_ao and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='KAKproses2' or
	nama_ao=data_ao_landing.nama_ao and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='KAKproses' 
	group by data_ao_landing.nama_ao) AS Tjpanzz,
	(SELECT COUNT(*) FROM permohonan_analisa_kredit WHERE
	nama_ao=data_ao_landing.nama_ao and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='acc2' or
	nama_ao=data_ao_landing.nama_ao and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='acc3' or
	nama_ao=data_ao_landing.nama_ao and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='acc' or
	nama_ao=data_ao_landing.nama_ao and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='revised' or
	nama_ao=data_ao_landing.nama_ao and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='AKproses' or
	nama_ao=data_ao_landing.nama_ao and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='AKproses2' or
	nama_ao=data_ao_landing.nama_ao and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='KAKproses2' or
	nama_ao=data_ao_landing.nama_ao and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='rejected' or
	nama_ao=data_ao_landing.nama_ao and month(tanggal_input)=$bulan and year(tanggal_input)=$tahun and status='KAKproses' 
	group by data_ao_landing.nama_ao) AS Tdpanzz
	FROM data_ao_landing where kode_perusahaan='111' group by nama_ao";
	$sqlneworder00 = mysqli_query($con, $neworder00);
	while($dataneworder00 = mysqli_fetch_array($sqlneworder00)){
	$namaaoneworder00  			= $dataneworder00['nama_ao'];
	$jumlahdsaraoneworder00  	= $dataneworder00['TTdsarzz'];
	$jumlahslikaoneworder00 	= $dataneworder00['Tslikzz'];
	$jumlahpsurvaoneworder00 	= $dataneworder00['Tjpanzz'];
	$jumlahsurvaoneworder00  	= $dataneworder00['Tdpanzz'];
	?>
<tr>
	<td style="text-align: center;;border: 2px solid black"><?php echo $no2b ?></td>
	<td style="border: 2px solid black"><?php echo $namaaoneworder00 ?></td>
	<td style="border: 2px solid black" align="center"><?php echo $jumlahdsaraoneworder00 ?></td>
	<td style="border: 2px solid black" align="center"><?php echo $jumlahslikaoneworder00?></td>
	<td style="border: 2px solid black" align="center"><?php echo $jumlahsurvaoneworder00 ?></td>
	</tr>
	<?php
	$no2b++;
	}
	?>
	</table>
	</div>
<div class="table-responsive">
<?php include('DIREKSIarea_RollBackLaporandifo.php')?>
</div>
<div class="table-responsive">
<?php include('DIREKSIarea_PerformaAOdifo.php')?>
</div>
</body>
</html>