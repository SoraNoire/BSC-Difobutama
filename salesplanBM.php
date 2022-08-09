<!doctype html>
<?php 
include('dbcon.php');
include_once('session.php'); 
include "BMarea_sidenav.php";
include "header.php";
$result=mysqli_query($con, "select * from central_data where nik='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);
$kode_sp =mysqli_query($con, "select max(kodesp) from sales_plan_bm");
$kodesekarang = mysqli_fetch_row($kode_sp);
$ambilkode = $kodesekarang[0];
?>

<html>
	
<script>

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
        alert ("Geolocation is not supported by this browser.");
    }
}

function showPosition(position) {
    url="https://www.google.com/maps/?q="+ position.coords.latitude +","+ position.coords.longitude +"&zoom=20&basemap=terrain";
	$('#lokasi_pelaksanaan').val(url);
	
}
</script>

<head>	
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>The Ballance Scorecard</title>
<link>
<link rel="stylesheet" type="text/css" href="css/animate.css"> 
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
</head>
<body style="padding-top: 70px;background-image:url(css/img/bg.jpg)">
<div class="col-sm-12" style="background: rgba(253,249,249,1.00)">
    <style>
    .align-middle{
      vertical-align: middle !important;
    }
    </style>
	
	<div style="padding: 0 15px;">
      <button type="button" id="btn-tambah" data-toggle="modal" data-target="#form-modal" class="btn btn-success pull-right">
        <span class="glyphicon glyphicon-plus"></span>  Tambah Data
      </button>
      <h1>Sales Plan (BM)</h1>
	  <h2 class="animated hinge" style="animation-duration: 5s"><?php echo($row['nama_karyawan'])?></h2>
      
      <div id="pesan-sukses" class="alert alert-success"></div>
      <div id="view"><?php include "salesplanBM_view.php"; ?></div>
</div>
    <div id="form-modal" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">
              <!-- Beri id "modal-title" untuk tag span pada judul modal -->
              <span id="modal-title"></span>
            </h4>
          </div>
          <div class="modal-body">
            <!-- Beri id "pesan-error" untuk menampung pesan error -->
            <div id="pesan-error" class="alert alert-danger"></div>
            
            <!-- Beri id "form" untuk tag form -->
            <form id="form">
              <div class="form-group">
                <label>Kode Sales Plan</label>
                <input type="text" class="form-control" id="kodesp" name="kodesp" value="<?php echo sprintf($ambilkode + 1);?>"readonly>
              </div>
              <div class="form-group">
                <label>Tanggal Mulai</label>
                <input type="date" id="tanggalmulai" name="tanggalmulai">
				<label>Tanggal Selesai</label>
                <input type="date" id="tanggalselesai" name="tanggalselesai">
              </div>
				<div class="form-group">
                <label>Lokasi Pelaksanaan</label>
                <input name="lokasi_pelaksanaan" type="text" style="margin-top: 2px" class="form-control" placeholder="Link Lokasi" id="lokasi_pelaksanaan"><span></span></td><td><button type="button" class="btn-group-justified" onclick="getLocation()">Generate Location</button></td>
              </div>
<div class="form-group">
<label>AO Pelaksana 1</label>
<select id="ao_pelaksana1" name="ao_pelaksana1" class="form-control">
<option value="-">--- Pilih Pelaksana ---</option>
<?php
$jabatan="Account Officer";
$kantor=$row['kantor'];
$penempatan=$row['penempatan'];
?>
<?PHP $querydropdown = mysqli_query($con,"SELECT * FROM central_data WHERE jabatan='$jabatan' AND kantor='$kantor' order by nama_karyawan") or die (mysqli_error());
while ($rowdropdown = mysqli_fetch_array($querydropdown)) {
$namapelaksana = strip_tags($rowdropdown['nama_karyawan']);
?>
<option><?PHP echo $namapelaksana;?></option>
<?PHP }?>
</select>
</div>
			  
<div class="form-group">
<label>AO Pelaksana 2</label>
<select id="ao_pelaksana2" name="ao_pelaksana2" class="form-control">
	<option value="-">--- Pilih Pelaksana ---</option>
	<?php
	$jabatan="Account Officer";
	$kantor=$row['kantor'];
	$penempatan=$row['penempatan'];
	?>
	<?PHP $querydropdown = mysqli_query($con,"SELECT * FROM central_data WHERE jabatan='$jabatan' AND kantor='$kantor' order by nama_karyawan") or die (mysqli_error());
	while ($rowdropdown = mysqli_fetch_array($querydropdown)) {
	$namapelaksana = strip_tags($rowdropdown['nama_karyawan']);
	?>
	<option><?PHP echo $namapelaksana;?></option>
	<?PHP }?>
</select>
</div>
			 
<div class="form-group">
<label>AO Pelaksana 3</label>
<select id="ao_pelaksana3" name="ao_pelaksana3" class="form-control">
	<option value="-">--- Pilih Pelaksana ---</option>
	<?php
	$jabatan="Account Officer";
	$kantor=$row['kantor'];
	$penempatan=$row['penempatan'];
	?>
	<?PHP $querydropdown = mysqli_query($con,"SELECT * FROM central_data WHERE jabatan='$jabatan' AND kantor='$kantor' order by nama_karyawan") or die (mysqli_error());
	while ($rowdropdown = mysqli_fetch_array($querydropdown)) {
	$namapelaksana = strip_tags($rowdropdown['nama_karyawan']);
	?>
	<option><?PHP echo $namapelaksana;?></option>
	<?PHP }?>
</select>
</div>
			  
<div class="form-group">
<label>AO Pelaksana 4</label>
<select id="ao_pelaksana4" name="ao_pelaksana4" class="form-control">
	<option value="-">--- Pilih Pelaksana ---</option>
	<?php
	$jabatan="Account Officer";
	$kantor=$row['kantor'];
	$penempatan=$row['penempatan'];
	?>
	<?PHP $querydropdown = mysqli_query($con,"SELECT * FROM central_data WHERE jabatan='$jabatan' AND kantor='$kantor' order by nama_karyawan") or die (mysqli_error());
	while ($rowdropdown = mysqli_fetch_array($querydropdown)) {
	$namapelaksana = strip_tags($rowdropdown['nama_karyawan']);
	?>
	<option><?PHP echo $namapelaksana;?></option>
	<?PHP }?>
</select>
</div>
			  
<div class="form-group">
<label>AO Pelaksana 5</label>
<select id="ao_pelaksana5" name="ao_pelaksana5" class="form-control">
	<option value="-">--- Pilih Pelaksana ---</option>
	<?php
	$jabatan="Account Officer";
	$kantor=$row['kantor'];
	$penempatan=$row['penempatan'];
	?>
	<?PHP $querydropdown = mysqli_query($con,"SELECT * FROM central_data WHERE jabatan='$jabatan' AND kantor='$kantor' order by nama_karyawan") or die (mysqli_error());
	while ($rowdropdown = mysqli_fetch_array($querydropdown)) {
	$namapelaksana = strip_tags($rowdropdown['nama_karyawan']);
	?>
	<option><?PHP echo $namapelaksana;?></option>
	<?PHP }?>
</select>
</div>

			  
<div class="form-group">
<label>Metode Pemasaran</label>
<textarea class="form-control" id="metode_pemasaran" name="metode_pemasaran" placeholder="Metode Pemasaran Yang Anda Gunakan?"></textarea>
</div>
<div class="form-group">
<label>Target Pemasaran</label>
<textarea class="form-control" id="target_pemasaran" name="target_pemasaran" placeholder="Kelompok Manakah Yang Menjadi Target Pemasaran Anda?"></textarea>
</div>
<div class="form-group">
<label>Keterangan</label>
<textarea class="form-control" id="keterangan" name="keterangan" placeholder="Tambah Keterangan"></textarea>
</div>
<button type="reset" id="btn-reset"></button>
</form>
</div>
<div class="modal-footer">
<div id="loading-simpan" class="pull-left">
	<b>Sedang menyimpan...</b>
</div>
<div id="loading-ubah" class="pull-left">
	<b>Sedang mengubah...</b>
</div>
<button type="button" class="btn btn-primary" id="btn-simpan">Simpan</button>
<button type="button" class="btn btn-primary" id="btn-ubah">Ubah</button>
<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
</div>
</div>
</div>
</div>
    <div id="delete-modal" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">
              Konfirmasi
            </h4>
          </div>
          <div class="modal-body">
            <input type="hidden" id="data-kodesp">
            Apakah anda yakin ingin menghapus data ini?
          </div>
          <div class="modal-footer">
            <div id="loading-hapus" class="pull-left">
              <b>Sedang meghapus...</b>
            </div>
            <button type="button" class="btn btn-primary" id="btn-hapus">Ya</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
          </div>
        </div>
      </div>
    </div>
    <script src="js/salesplanBM_ajax.js"></script>
</body>
</html>