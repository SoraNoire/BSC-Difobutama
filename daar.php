<!doctype html>
<?php 
include('dbcon.php');
include('session.php'); 

$result=mysqli_query($con, "select * from central_data where nik='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);
$jabatan=$row['jabatan']; if($jabatan=='Analis Kredit')
{}
else
{;header('location:xakses.php');}
date_default_timezone_set('asia/jakarta');
$bulan = date("m");
$tahun = date("y");
$tanggal = date("d");
$jam = date("H");
$menit=date("i");
$detik=date("s");

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
	$('#lokasi').val(url);
	
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
<body style="padding-top: 20px;background-image:url(css/img/bg.jpg)">
	<?php include('header.php')?>
	<?php include('daar_sidenav.php')?>
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
      <h1>Dayly Analyst Activity Record</h1>
      <h4 class="animated fadeInLeftBig" style="animation-duration: 5s">Laporan Kegiatan Harian Analis</h4> 
      <h3 class="animated hinge" style="animation-duration: 5s"><?php echo $row['nama_karyawan'];?></h3>
      <div id="pesan-sukses" class="alert alert-success"></div>
      
      <!--
      -- Buat sebuah div dengan id="view" yang digunakan untuk menampung data 
      -- yang ada pada tabel siswa di database
      -->
      <div id="view"><?php include "daar_view.php"; ?></div>
</div>
    
    <!-- 
    -- Membuat sebuah tag div untuk Modal Dialog untuk Form Tambah dan Ubah
    -- Beri id "form-modal" untuk tag div tersebut
    -->
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
                <label>Kode D.A.A.R</label>
                <input type="text" class="form-control" id="kode_kegiatan" name="kode_kegiatan" value="<?php echo sprintf($tanggal.$bulan.$tahun.$jam.$menit.$detik ."-".$mysamplekantor.$mysamplepenempatan ."/".$mysamplenik."/".$bulan."/".$tahun);?>"readonly>
              </div>
			  <div class="form-group">
                <label>Uraian Aktivitas</label>
                <textarea class="form-control" id="uraian_kegiatan" name="uraian_kegiatan" placeholder="Deskripsikan Aktivitas Anda"></textarea>
              </div>
              <div class="form-group">
                <label>Kategori Aktivitas</label>
                <select id="jenis_kegiatan" name="jenis_kegiatan" class="form-control">
                  <option value="Lainnya">Pilih</option>
                  <option value="Survey">Survey</option>
                  <option value="Ambil Data">Ambil Data</option>
				  <option value="Lainnya">Lainnya</option>
                </select>
              </div>
<div class="form-group">
<label>Pemohon Survey</label>
<select id="nama_ao" name="nama_ao" class="form-control">
<option value="-">--- Pilih Nama AO ---</option>
<?php
$jabatan="Account Officer";
$kantor=$row['kantor'];
$penempatan=$row['penempatan'];
?>
<?PHP $querydropdown = mysqli_query($con,"SELECT * FROM central_data WHERE jabatan='$jabatan' AND kantor='$kantor' order by nama_karyawan") or die (mysqli_error());
while ($rowdropdown = mysqli_fetch_array($querydropdown)) {
$namapemohon = strip_tags($rowdropdown['nama_karyawan']);
?>
<option><?PHP echo $namapemohon;?></option>
<?PHP }?>
</select>
</div>
<div class="form-group">
<label>Nama Nasabah</label>
<input class="form-control" id="nama_nasabah" name="nama_nasabah" placeholder="Input Nama Nasabah">
</div>
<div class="form-group">
<label>Alamat Nasabah</label>
<textarea class="form-control" id="alamat_nasabah" name="alamat_nasabah" placeholder="Input Alamat Nasabah"></textarea>
</div>
<div class="form-group">
<label>No. Telepon Nasabah</label>
<input class="form-control" id="no_tlp_nasabah" name="no_tlp_nasabah" placeholder="Input No. Telpon Nasabah">
</div>
				
				<div class="form-group">
                <label>Location</label>
                <input name="lokasi" type="text" style="margin-top: 2px" class="form-control" placeholder="Link Lokasi" id="lokasi"><span></span></td><td><button type="button" class="btn-group-justified" onclick="getLocation()">Generate Location</button></td>
              </div>
              <div class="form-group">
                <label>Foto</label>
                <div id="checkbox_foto">
                  <input type="checkbox" id="ubah_foto" name="ubah_foto" value="true"> Ceklis jika ingin mengubah foto
                </div>
                <input type="file" class="form-control" id="foto">
              </div>
			<div class="form-group">
                <label>Keterangan</label>
                <textarea class="form-control" id="keterangan" name="keterangan" placeholder="Tambah Keterangan"></textarea>
              </div>
              <button type="reset" id="btn-reset"></button>
            </form>
          </div>
          <div class="modal-footer">
            <!-- Beri id "loading-simpan" untuk loading ketika klik tombol simpan -->
            <div id="loading-simpan" class="pull-left">
              <b>Sedang menyimpan...</b>
            </div>
            
            <!-- Beri id "loading-ubah" untuk loading ketika klik tombol ubah -->
            <div id="loading-ubah" class="pull-left">
              <b>Sedang mengubah...</b>
            </div>
            
            <!-- Beri id "btn-simpan" untuk tombol simpan nya -->
            <button type="button" class="btn btn-primary" id="btn-simpan">Simpan</button>
            
            <!-- Beri id "btn-ubah" untuk tombol simpan nya -->
            <button type="button" class="btn btn-primary" id="btn-ubah">Ubah</button>
            
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
          </div>
        </div>
      </div>
    </div>
    
    <!-- 
    -- Membuat sebuah tag div untuk Modal Dialog untuk Form Tambah dan Ubah
    -- Beri id "form-modal" untuk tag div tersebut
    -->
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

            <input type="hidden" id="data-kode_kegiatan">
            
            Apakah anda yakin ingin menghapus data ini?
          </div>
          <div class="modal-footer">
            <!-- Beri id "loading-hapus" untuk loading ketika klik tombol hapus -->
            <div id="loading-hapus" class="pull-left">
              <b>Sedang meghapus...</b>
            </div>
            
            <!-- Beri id "btn-hapus" untuk tombol hapus nya -->
            <button type="button" class="btn btn-primary" id="btn-hapus">Ya</button>
            
            <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Load File jquery.min.js yang ada difolder js -->
    <script src="js/jquery.min.js"></script>
    
    <!-- Load File bootstrap.min.js yang ada difolder js -->
    <script src="js/bootstrap.min.js"></script>
    
    <!-- Load file ajax.js yang ada di folder js -->
    <script src="js/ajaxDAAR.js"></script>
</body>
</html>
	
	</div>

	</body>
</html>