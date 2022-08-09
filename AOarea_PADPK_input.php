<!DOCTYPE html>
<?php 
include('dbcon.php');
include_once('session.php');

$result=mysqli_query($con, "select * from central_data where nik='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);
$jabatan=$row['jabatan']; if($jabatan=='Account Officer')
{}
else
{}
date_default_timezone_set('asia/jakarta');
$tanggal = date("d");
$bulan = date("m");
$tahun = date("Y");
$jam   = date("Hsi");

$kode_sp =mysqli_query($con, "select max(left(kode_sp,2)) from sales_plan");
$kodesekarang = mysqli_fetch_row($kode_sp);
$ambilkode = $kodesekarang[0];
$samplenik = mysqli_query($con, "select substring(nik,-3) from central_data where nik='$session_id'");
$samplenik2 = mysqli_fetch_row($samplenik);
$mysamplenik = $samplenik2[0];
$samplekantor = mysqli_query($con, "select substring(kantor,1,1) from central_data where nik='$session_id'");
$samplekantor2 = mysqli_fetch_row($samplekantor);
$mysamplekantor = $samplekantor2[0];
$samplepenempatan = mysqli_query($con, "select substring(penempatan,1,1) from central_data where nik='$session_id'");
$samplepenempatan2 = mysqli_fetch_row($samplepenempatan);
$mysamplepenempatan = $samplepenempatan2[0];

?>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">	
</head>
<body>
 	
  <div class="table table-responsive">		
	<br/>
	<button type="button" style="position: absolute" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalnasabah">Create</button>
 
	<!-- Modal nasabah-->
	<div id="myModalnasabah" class="modal fade" role="dialog" style="background: rgba(0,0,0,0.86);">
		<div class="modal-dialog"  style="width: 100%;">
			<!-- konten modal-->
			<div class="modal-content">
				<!-- heading modal -->
<div class="modal-header" style="background: rgba(4,238,249,0.32)">
	<button type="button" class="close" data-dismiss="modal">&times;</button>
	<h4 class="modal-title"><center><h4 style="color: red"><b>Pilih Data Nasabah Tersedia</b></h4></center></h4>
</div>
				<!-- body modal -->
<div class="modal-body">
		<table class="table table-responsive">
		<tr>
			<th style="text-align: center">No.</th>
			<th style="text-align: center">Tanggal Chek Slik</th>
			<th style="text-align: center">Nama Nasabah</th>
			<th style="text-align: center"><span class="glyphicon glyphicon-cog"></span>	
		</tr>
		<?php
			
			$no= 1;
			$result=mysqli_query($con, "select * from central_data where nik='$session_id'")or die('Error In Session');
			$row=mysqli_fetch_array($result);
			$kantor= $row['kantor'];
			$nama_ao=$row['nama_karyawan'];

			  $query = "SELECT * FROM data_slik WHERE NOT EXISTS (select nama_nasabah from permohonan_analisa_kredit where data_slik.nama_nasabah=permohonan_analisa_kredit.nama_nasabah and data_slik.nama_pemohon=permohonan_analisa_kredit.nama_ao) and nama_pemohon='$nama_ao' and status='Yes' ORDER BY tanggal_input DESC"; 
			  $sql = mysqli_query($con, $query);
			  while($dataN = mysqli_fetch_array($sql)){
			  $tanggal 			= $dataN['tanggal_input'];
			  $nama_nasabah 	= $dataN['nama_nasabah'];
	?>
	<tr>
	<td style="text-align: center;;border: 2px solid black"><?php echo $no ?></td>
	<td style="text-align: center;;border: 2px solid black"><?php echo $tanggal ?></td>
	<td style="text-align: center;;border: 2px solid black"><?php echo $nama_nasabah ?></td>
	<td align="center"><a href="AOarea_PADPK_input_new.php?nama_nasabah=<?php echo $dataN['nama_nasabah']?>"><span class="btn btn-info">GUNAKAN</span></a></td>
	</tr>
	<?php
	$no++;
	}
	?>
		</table>
</div>
<!-- footer modal -->
<div class="modal-footer" style="background: rgba(4,238,249,0.32);height: 50px" >
	
</div>
			</div>
		</div>
	</div>
  </div>	
</body>
</html>