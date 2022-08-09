<html>
<head>
<link>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap-3.3.7.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript">
var htmlobjek;
$(document).ready(function(){
//apabila terjadi event onchange terhadap object <select id=propinsi>
$("#kantor").change(function(){
var kantor = $("#kantor").val();
$.ajax({
url: "DIREKSIarea_ambilpenempatan.php",
data: "kantor="+kantor,
cache: false,
success: function(msg){
//jika data sukses diambil dari server kita tampilkan
//di <select id=kota>
$("#penempatan").html(msg);
}
});
});
$("#penempatan").change(function(){
var penempatan = $("#penempatan").val();
$.ajax({
url: "DIREKSIarea_ambilnamaao.php",
data: "penempatan="+penempatan,
cache: false,
success: function(msg){
$("#nama_ao").html(msg);
}
});
});
});
 
</script>

	</head>
	<body>
		<div style="background: rgba(249,242,242,1.00);opacity: inherit">
        <?php include_once('DIREKSIarea_sidenav.php')?>
        <?php include_once('header.php')?>
<p align="center"><font color="orange" size="10"><b>Laporan Hasil Pencairan A.O</b></font></p><br />
	
<div>
	<P align="left"><font size="5"><b>PT. BPR Difobutama</b></font></p><br />
		<table class="table table-bordered" width="100%" style="margin-bottom: 20px;font-family: Baskerville, 'Palatino Linotype', Palatino, 'Century Schoolbook L', 'Times New Roman', 'serif';font-size: 20px;font-style: oblique;background: rgba(249,242,242,1.00)	">
  <tr>
	<th style="text-align: center" width="auto" class="animated rollIn">No.</th>
	<th style="text-align: center" width="auto" class="animated rollIn">Nama Karyawan</th>
    <th style="text-align: center" width="auto" class="animated rollIn">PENCAIRAN</th>
    <th style="text-align: center" width="auto" class="animated rollIn">TARGET/BULAN</th>
    <th style="text-align: center" width="auto" class="animated rollIn">TARGET/TAHUN</th>
    <th style="text-align: center" width="auto" class="animated rollIn">KEKURANGAN TARGET</th>
  <?php
  include_once "dbcon.php";
function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
 
}

  $bulan= date('m');
  $tahun= date('Y');
  $no=1;
  $jumlahpencairan= "SELECT *,SUM(plafond) as total FROM input_targetao T1 JOIN accountofficer_tpencairan T2 ON T1.id_ao = T2.id WHERE T1.kantor_ao='Difobutama' GROUP BY nama_ao ORDER BY total DESC";
  $sqlpencairan = mysqli_query($con, $jumlahpencairan);
  while($datapencairan = mysqli_fetch_array($sqlpencairan)){
    echo "<tr>";
	echo "<td style='text-align: center' class='animated rollIn'>".$no."."."</td>";
	echo "<td style='text-align: left' class='animated rollIn'>".$datapencairan['nama_karyawan']."</td>";
    echo "<td style='text-align: left;color: GREEN' class='animated rollIn'>".rupiah($datapencairan['total'])."</td>";
    echo "<td style='text-align: left' class='animated rollIn'>".rupiah($datapencairan['Target'])."</td>";
    echo "<td style='text-align: left' class='animated rollIn'>".rupiah($datapencairan['Target']*12)."</td>";  ?>
	<?php if($datapencairan['Target']*12<$datapencairan['total']){
    echo  "<td style='text-align: left;color: green' class='animated rollIn'>".rupiah(($datapencairan['Target']*12)-$datapencairan['total'])."</td>";
	  }else{
	echo  "<td style='text-align: left;color: red' class='animated rollIn'>".rupiah(($datapencairan['Target']*12)-$datapencairan['total'])."</td>";}?><?php
	echo "</tr>";
	$no++  ;
  }
  ?>
</table>
</div>
			
<div>
	<P align="left"><font size="5"><b>PT. BPR Marcorindo Perdana</b></font></p><br />
		<table class="table table-bordered" width="100%" style="margin-bottom: 20px;font-family: Baskerville, 'Palatino Linotype', Palatino, 'Century Schoolbook L', 'Times New Roman', 'serif';font-size: 20px;font-style: oblique;background: rgba(249,242,242,1.00)	">
  <tr>
	<th style="text-align: center" width="auto" class="animated rollIn">No.</th>
	<th style="text-align: center" width="auto" class="animated rollIn">Nama Karyawan</th>
    <th style="text-align: center" width="auto" class="animated rollIn">PENCAIRAN</th>
    <th style="text-align: center" width="auto" class="animated rollIn">TARGET/BULAN</th>
    <th style="text-align: center" width="auto" class="animated rollIn">TARGET/TAHUN</th>
    <th style="text-align: center" width="auto" class="animated rollIn">KEKURANGAN TARGET</th>
  <?php
  include_once "dbcon.php";
  $bulan= date('m');
  $tahun= date('Y');
  $no=1;
  $jumlahpencairan= "SELECT *,SUM(plafond) as total FROM input_targetao T1 JOIN accountofficer_tpencairan T2 ON T1.id_ao = T2.id WHERE T1.kantor_ao='Marcorindo' GROUP BY nama_ao ORDER BY total DESC";
  $sqlpencairan = mysqli_query($con, $jumlahpencairan);
  while($datapencairan = mysqli_fetch_array($sqlpencairan)){
    echo "<tr>";
	echo "<td style='text-align: center' class='animated rollIn'>".$no."."."</td>";
	echo "<td style='text-align: left' class='animated rollIn'>".$datapencairan['nama_karyawan']."</td>";
    echo "<td style='text-align: left;color: GREEN' class='animated rollIn'>".rupiah($datapencairan['total'])."</td>";
    echo "<td style='text-align: left' class='animated rollIn'>".rupiah($datapencairan['Target'])."</td>";
    echo "<td style='text-align: left' class='animated rollIn'>".rupiah($datapencairan['Target']*12)."</td>";  ?>
	<?php if($datapencairan['Target']*12<$datapencairan['total']){
    echo  "<td style='text-align: left;color: green' class='animated rollIn'>".rupiah(($datapencairan['Target']*12)-$datapencairan['total'])."</td>";
	  }else{
	echo  "<td style='text-align: left;color: red' class='animated rollIn'>".rupiah(($datapencairan['Target']*12)-$datapencairan['total'])."</td>";}?><?php
	echo "</tr>";
	$no++  ;
  }
  ?>
  </table>
</div>
<div style="background: rgba(249,242,242,1.00);opacity: inherit">
        <?php include_once('DIREKSIarea_sidenav.php')?>
        <?php include_once('header.php')?>
<p align="center"><font color="orange" size="10"><b>Laporan Jumlah Chek Slik A.O</b></font></p><br />
	
<div>
	<P align="left"><font size="5"><b>PT. BPR Difobutama</b></font></p><br />
		<table class="table table-bordered" width="100%" style="margin-bottom: 20px;font-family: Baskerville, 'Palatino Linotype', Palatino, 'Century Schoolbook L', 'Times New Roman', 'serif';font-size: 20px;font-style: oblique;background: rgba(249,242,242,1.00)	">
  <tr>
	<th style="text-align: center" width="auto" class="animated rollIn">No.</th>
	<th style="text-align: center" width="auto" class="animated rollIn">Nama Karyawan</th>
    <th style="text-align: center" width="auto" class="animated rollIn">Jumlah Chek Slik</th>
    <th style="text-align: center" width="auto" class="animated rollIn">TARGET/BULAN</th>
    <th style="text-align: center" width="auto" class="animated rollIn">KEKURANGAN TARGET</th>
  <?php
  include_once "dbcon.php";

  $bulan= date('M');
  $tahun= date('Y');
  $no=1;
  $targetslik=40;
  $jumlahslik= "SELECT *, count( * ) as total FROM data_slik WHERE kantor_pemohon='Difobutama' and month(tanggal_input)='".date('m')."' GROUP BY nama_pemohon ORDER BY total DESC";
  $sqlslik = mysqli_query($con, $jumlahslik);
  while($dataslik = mysqli_fetch_array($sqlslik)){
    echo "<tr>";
	echo "<td style='text-align: center' class='animated rollIn'>".$no."."."</td>";
	echo "<td style='text-align: left' class='animated rollIn'>".$dataslik['nama_pemohon']."</td>";
    echo "<td style='text-align: left;color: GREEN' class='animated rollIn'>".$dataslik['total']."</td>";
    echo "<td style='text-align: left' class='animated rollIn'>".$targetslik."</td>";
    echo "<td style='text-align: left;color: red' class='animated rollIn'>".($dataslik['total']-$targetslik)."</td>";
	echo "</tr>";
	$no++  ;
  }
  ?>
  </table>
</div>
<div style="background: rgba(249,242,242,1.00);opacity: inherit">
        <?php include_once('DIREKSIarea_sidenav.php')?>
        <?php include_once('header.php')?>
<div>
	<P align="left"><font size="5"><b>PT. BPR Marcorindo Perdana</b></font></p><br />
		<table class="table table-bordered" width="100%" style="margin-bottom: 20px;font-family: Baskerville, 'Palatino Linotype', Palatino, 'Century Schoolbook L', 'Times New Roman', 'serif';font-size: 20px;font-style: oblique;background: rgba(249,242,242,1.00)	">
  <tr>
	<th style="text-align: center" width="auto" class="animated rollIn">No.</th>
	<th style="text-align: center" width="auto" class="animated rollIn">Nama Karyawan</th>
    <th style="text-align: center" width="auto" class="animated rollIn">Jumlah Chek Slik</th>
    <th style="text-align: center" width="auto" class="animated rollIn">TARGET/BULAN</th>
    <th style="text-align: center" width="auto" class="animated rollIn">KEKURANGAN TARGET</th>
  <?php
  include_once "dbcon.php";

  $bulan= date('M');
  $tahun= date('Y');
  $no=1;
  $targetslik=40;
  $jumlahslik= "SELECT *, count( * ) as total FROM data_slik WHERE kantor_pemohon='Marcorindo' and month(tanggal_input)='".date('m')."' GROUP BY nama_pemohon ORDER BY total DESC";
  $sqlslik = mysqli_query($con, $jumlahslik);
  while($dataslik = mysqli_fetch_array($sqlslik)){
    echo "<tr>";
	echo "<td style='text-align: center' class='animated rollIn'>".$no."."."</td>";
	echo "<td style='text-align: left' class='animated rollIn'>".$dataslik['nama_pemohon']."</td>";
    echo "<td style='text-align: left;color: GREEN' class='animated rollIn'>".$dataslik['total']."</td>";
    echo "<td style='text-align: left' class='animated rollIn'>".$targetslik."</td>";
    echo "<td style='text-align: left;color: red' class='animated rollIn'>".($dataslik['total']-$targetslik)."</td>";
	echo "</tr>";
	$no++  ;
  }
  ?>
  </table>
</div>
	
<div style="background: rgba(249,242,242,1.00);opacity: inherit">
        <?php include_once('DIREKSIarea_sidenav.php')?>
        <?php include_once('header.php')?>
<p align="center"><font color="orange" size="10"><b>Laporan Jumlah D.S.A.R</b></font></p><br />
	
<div>
	<P align="left"><font size="5"><b>PT. BPR Difobutama</b></font></p><br />
		<table class="table table-bordered" width="100%" style="margin-bottom: 20px;font-family: Baskerville, 'Palatino Linotype', Palatino, 'Century Schoolbook L', 'Times New Roman', 'serif';font-size: 20px;font-style: oblique;background: rgba(249,242,242,1.00)	">
  <tr>
	<th style="text-align: center" width="auto" class="animated rollIn">No.</th>
	<th style="text-align: center" width="auto" class="animated rollIn">Nama Karyawan</th>
    <th style="text-align: center" width="auto" class="animated rollIn">Jumlah D.S.A.R</th>
    <th style="text-align: center" width="auto" class="animated rollIn">TARGET/BULAN</th>
    <th style="text-align: center" width="auto" class="animated rollIn">KEKURANGAN TARGET</th>
  <?php
  include_once "dbcon.php";

  $bulan= date('M');
  $tahun= date('Y');
  $no=1;
  $targetdsar=3*20;
  $jumlahdsar= "SELECT *, count( * ) as total FROM sales_plan WHERE kantor='Difobutama' and month(tanggal_sp)='".date('m')."' GROUP BY nama_karyawan ORDER BY total DESC";
  $sqldsar = mysqli_query($con, $jumlahdsar);
  while($datadsar = mysqli_fetch_array($sqldsar)){
    echo "<tr>";
	echo "<td style='text-align: center' class='animated rollIn'>".$no."."."</td>";
	echo "<td style='text-align: left' class='animated rollIn'>".$datadsar['nama_karyawan']."</td>";
    echo "<td style='text-align: left;color: GREEN' class='animated rollIn'>".$datadsar['total']."</td>";
    echo "<td style='text-align: left' class='animated rollIn'>".$targetdsar."</td>";
    echo "<td style='text-align: left;color: red' class='animated rollIn'>".($datadsar['total']-$targetdsar)."</td>";
	echo "</tr>";
	$no++  ;
  }
  ?>
  </table>
</div>
	 <?php include_once('DIREKSIarea_sidenav.php')?>
        <?php include_once('header.php')?>
<div>
	<P align="left"><font size="5"><b>PT. BPR Marcorindo Perdana</b></font></p><br />
		<table class="table table-bordered" width="100%" style="margin-bottom: 20px;font-family: Baskerville, 'Palatino Linotype', Palatino, 'Century Schoolbook L', 'Times New Roman', 'serif';font-size: 20px;font-style: oblique;background: rgba(249,242,242,1.00)	">
  <tr>
	<th style="text-align: center" width="auto" class="animated rollIn">No.</th>
	<th style="text-align: center" width="auto" class="animated rollIn">Nama Karyawan</th>
    <th style="text-align: center" width="auto" class="animated rollIn">Jumlah D.S.A.R</th>
    <th style="text-align: center" width="auto" class="animated rollIn">TARGET/BULAN</th>
    <th style="text-align: center" width="auto" class="animated rollIn">KEKURANGAN TARGET</th>
  <?php
  include_once "dbcon.php";

  $bulan= date('M');
  $tahun= date('Y');
  $no=1;
  $targetdsar=3*20;
  $jumlahdsar= "SELECT *, count( * ) as total FROM sales_plan WHERE kantor='Marcorindo' and month(tanggal_sp)='".date('m')."' GROUP BY nama_karyawan ORDER BY total DESC";
  $sqldsar = mysqli_query($con, $jumlahdsar);
  while($datadsar = mysqli_fetch_array($sqldsar)){
    echo "<tr>";
	echo "<td style='text-align: center' class='animated rollIn'>".$no."."."</td>";
	echo "<td style='text-align: left' class='animated rollIn'>".$datadsar['nama_karyawan']."</td>";
    echo "<td style='text-align: left;color: GREEN' class='animated rollIn'>".$datadsar['total']."</td>";
    echo "<td style='text-align: left' class='animated rollIn'>".$targetdsar."</td>";
    echo "<td style='text-align: left;color: red' class='animated rollIn'>".($datadsar['total']-$targetdsar)."</td>";
	echo "</tr>";
	$no++  ;
  }
  ?>
  </table>
</div>

</body>
</html>