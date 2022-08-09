<!doctype html>
<?php 
include('dbcon.php');
include_once('session.php');
include('header.php');
include('D.S.A.R_sidenav.php'); 

$result=mysqli_query($con, "select * from central_data where nik='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);
$jabatan=$row['jabatan']; if($jabatan=='Account Officer')
{}
else
{;header('location:xakses.php');}

?>

<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>The Ballance Scorecard</title>
<link>
<link rel="stylesheet" type="text/css" href="css/animate.css"> 
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
</head>
<body style="padding-top: 70px;background:rgba(91,255,125,1.00)">	
<div style="padding: 0 15px;background: rgba(248,240,241,1.00)">
      <div class="table-responsive">
<h1 align="center">Sales Plan From B.M</h1>
        <table class="table table-bordered">
          <tr>
            <th class="text-center" style="text-align: center">NO</th>
            <th class="text-nowrap" style="text-align: center;word-break: keep-all">Tanggal Pembuatan</th>
            <th class="text-nowrap" style="text-align: center">Kode Sales Plan</th>
            <th class="text-nowrap" style="text-align: center">Tanggal Mulai</th>
            <th class="text-nowrap" style="text-align: center">Tanggal Selesai</th>
            <th class="text-nowrap" style="text-align: center">Lokasi Pelaksanaan</th>
            <th class="text-nowrap" style="text-align: center;word-break: keep-all">AO Pelaksana</th>
            <th class="text-nowrap" style="text-align: center">Metode Pemasaran</th>
            <th class="text-nowrap" style="text-align: center">Target Pemasaran</th>
            <th class="text-nowrap" style="text-align: center">Keterangan</th>
          <?php
			include ('dbcon.php');include_once ('session.php');
          // Cek apakah terdapat data page pada URL
          $page = (isset($_GET['page']))? $_GET['page'] : 1;
          
          $limit = 5; // Jumlah data per halamannya
          $nama=$row['nama_karyawan'];
          // Untuk menentukan dari data ke berapa yang akan ditampilkan pada tabel yang ada di database
          $limit_start = ($page - 1) * $limit;
          $pdo = new PDO('mysql:host='.'localhost'.';dbname='.'dmballan_ballancescorecard','dmballan','SR@DM-bsc$123');
          // Buat query untuk menampilkan data siswa sesuai limit yang ditentukan
          $sql = $pdo->prepare("SELECT * FROM sales_plan_bm WHERE ao_pelaksana1='$nama' OR ao_pelaksana2='$nama' OR ao_pelaksana3='$nama' OR ao_pelaksana4='$nama' OR ao_pelaksana5='$nama' ORDER BY kodesp DESC LIMIT ".$limit_start.",".$limit);
          $sql->execute(); // Eksekusi querynya
          
          $no = $limit_start + 1; // Untuk penomoran tabel
          while($data = $sql->fetch()){ // Ambil semua data dari hasil eksekusi $sql
          ?>
            <tr>
              <td class="align-middle text-center"><?php echo $no; ?></td>
              <td class="align-middle"><?php echo $data['tanggalsp']; ?></td>
              <td class="align-middle"><?php echo $data['kodesp']; ?></td>
              <td class="align-middle"><?php echo $data['tanggalmulai']; ?></td>
              <td class="align-middle"><?php echo $data['tanggalselesai']; ?></td>
              <td class="align-middle"><?php echo $data['lokasi_pelaksanaan']; ?></td>
              <td class="text-nowrap" style="text-align:justify;word-break: keep-all" >
				  <?php echo "<br>"."1. ".$data['ao_pelaksana1']."</br>";
			  			echo "<br>"."2. ".$data['ao_pelaksana2']."</br>";
				   		echo "<br>"."3. ".$data['ao_pelaksana3']."</br>";
				   		echo "<br>"."4. ".$data['ao_pelaksana4']."</br>";
				   		echo "<br>"."5. ".$data['ao_pelaksana5']."</br>";?>
			  </td>
              <td class="align-middle"><?php echo $data['metode_pemasaran']; ?></td>
              <td class="align-middle"><?php echo $data['target_pemasaran']; ?></td>
              <td class="align-middle"><?php echo $data['keterangan']; ?></td>
              </tr>	
			
<input type="hidden" id="tanggalsp-value-<?php echo $no; ?>" value="<?php echo $data['tanggalsp']; ?>">
<input type="hidden" id="kodesp-value-<?php echo $no; ?>" value="<?php echo $data['kodesp']; ?>">
<input type="hidden" id="tanggalmulai-value-<?php echo $no; ?>" value="<?php echo $data['tanggalmulai']; ?>">
<input type="hidden" id="tanggalselesai-value-<?php echo $no; ?>" value="<?php echo $data['tanggalselesai']; ?>">
<input type="hidden" id="lokasi_pelaksanaan-value-<?php echo $no; ?>" value="<?php echo $data['lokasi_pelaksanaan']; ?>">
<input type="hidden" id="ao_pelaksana1-value-<?php echo $no; ?>" value="<?php echo $data['ao_pelaksana1']; ?>">
<input type="hidden" id="ao_pelaksana2-value-<?php echo $no; ?>" value="<?php echo $data['ao_pelaksana2']; ?>">
<input type="hidden" id="ao_pelaksana3-value-<?php echo $no; ?>" value="<?php echo $data['ao_pelaksana3']; ?>">
<input type="hidden" id="ao_pelaksana4-value-<?php echo $no; ?>" value="<?php echo $data['ao_pelaksana4']; ?>">
<input type="hidden" id="ao_pelaksana5-value-<?php echo $no; ?>" value="<?php echo $data['ao_pelaksana5']; ?>">
<input type="hidden" id="metode_pemasaran-value-<?php echo $no; ?>" value="<?php echo $data['metode_pemasaran']; ?>">
<input type="hidden" id="target_pemasaran-value-<?php echo $no; ?>" value="<?php echo $data['target_pemasaran']; ?>">
<input type="hidden" id="keterangan-value-<?php echo $no; ?>" value="<?php echo $data['keterangan']; ?>">
          <?php
            $no++;
          }
          ?>
			
<script>
function edit(no){
	$("#btn-simpan").hide();
	$("#btn-ubah").show();
	
	$("#modal-title").html("Form Ubah data");
	
	var tanggalsp = $("#tanggalsp-value-" + no).val();
	var kodesp = $("#kodesp-value-" + no).val();
	var tanggalmulai = $("#tanggalmulai-value-" + no).val();
	var tanggalselesai = $("#tanggalselesai-value-" + no).val();
	var lokasi_pelaksanaan = $("#lokasi_pelaksanaan-value-" + no).val();
	var ao_pelaksana1 = $("#ao_pelaksana1-value-" + no).val();
	var ao_pelaksana2 = $("#ao_pelaksana2-value-" + no).val();
	var ao_pelaksana3 = $("#ao_pelaksana3-value-" + no).val();
	var ao_pelaksana4 = $("#ao_pelaksana4-value-" + no).val();
	var ao_pelaksana5 = $("#ao_pelaksana5-value-" + no).val();
	var metode_pemasaran = $("#metode_pemasaran-value-" + no).val();
	var target_pemasaran = $("#target_pemasaran-value-" + no).val();
	var keterangan = $("#keterangan-value-" + no).val();
	
	$("#tanggalsp").val(tanggalsp).attr("readonly","readonly");
	$("#kodesp").val(kodesp).attr("readonly","readonly");
	$("#tanggalmulai").val(tanggalmulai);
	$("#tanggalselesai").val(tanggalselesai); 
	$("#lokasi_pelaksanaan").val(lokasi_pelaksanaan);
	$("#ao_pelaksana1").val(ao_pelaksana1);
	$("#ao_pelaksana2").val(ao_pelaksana2);
	$("#ao_pelaksana3").val(ao_pelaksana3);
	$("#ao_pelaksana4").val(ao_pelaksana4);
	$("#ao_pelaksana5").val(ao_pelaksana5);
	$("#metode_pemasaran").val(metode_pemasaran); 
	$("#target_pemasaran").val(target_pemasaran);
	$("#keterangan").val(keterangan);
}

function hapus(no){
	var kodesp = $("#kodesp-value-" + no).val();
	
	$("#data-kodesp").val(kodesp);
}
</script>
			
        </table>
      </div>    
        <ul class="pagination">
        <!-- LINK FIRST AND PREV -->
        <?php
        if($page == 1){
        ?>
          <li class="disabled"><a href="#">First</a></li>
          <li class="disabled"><a href="#">&laquo;</a></li>
        <?php
        }else{ 
          $link_prev = ($page > 1)? $page - 1 : 1;
        ?>
        <?php
        }
        ?>
        
        <?php
        $sql2 = $pdo->prepare("SELECT COUNT(*) AS jumlah FROM sales_plan_bm");
        $sql2->execute();
        $get_jumlah = $sql2->fetch();
        
        $jumlah_page = ceil($get_jumlah['jumlah'] / $limit); 
        $jumlah_number = 3;
        $start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1;
        $end_number = ($page < ($jumlah_page - $jumlah_number))? $page + $jumlah_number : $jumlah_page; 
        
        for($i = $start_number; $i <= $end_number; $i++){
          $link_active = ($page == $i)? ' class="active"' : '';
        ?>
          <li<?php echo $link_active; ?>><a href="mysalesplan.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
        <?php
        }
        ?>
        
        <?php
        
        if($page == $jumlah_page){ 
        ?>
          <li class="disabled"><a href="#">&raquo;</a></li>
          <li class="disabled"><a href="#">Last</a></li>
        <?php
        }else{ 
          $link_next = ($page < $jumlah_page)? $page + 1 : $jumlah_page;
        ?>
        <?php
        }
        ?>
      </ul>
    </div>