<!DOCTYPE html>
<?php 
include('dbcon.php');
include_once('session.php'); 

$result=mysqli_query($con, "select * from central_data where nik='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);
$akses=$row['kode_jabatan']; if($akses=='HRD')
{}
else
{}


 ?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
    box-sizing: border-box;
}

body {
    margin: 0;
    font-family: Arial, Helvetica, sans-serif;
}

/* The grid: Three equal columns that floats next to each other */
.column {
    float: left;
    width: 33.33%;
    padding: 50px;
    text-align: center;
    font-size: 25px;
    cursor: pointer;
    color: white;
}

.containerTab {
    padding: 20px;
    color: white;
}

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}

/* Closable button inside the container tab */
.closebtn {
    float: right;
    color: white;
    font-size: 35px;
    cursor: pointer;
}
</style>
</head>
<body>

<div style="text-align:center">
  <h2></h2>
  <h3><b>DAFTAR KARYAWAN AKTIF DAN NON AKTIF</b></h3>
</div>

<!-- Three columns -->
<div class="row">
  <div class="column" onclick="openTab('b1');" style="background:rgba(0,0,0,1.00);">
    Pusat
  </div>
  <div class="column" onclick="openTab('b2');" style="background:rgba(39,38,38,1.00);">
    Cabang
  </div>
  <div class="column" onclick="openTab('b3');" style="background:rgba(98,96,96,1.00);">
    RESIGN
  </div>
</div>

<!-- Full-width columns: (hidden by default) -->
<div id="b1" class="containerTab" style="display:none;background:rgba(0,0,0,1.00)">
  <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
  <h2>Karyawan Pusat Yang Terdaftar</h2>
	<?php include('HRDarea_karyawanpusat.php')?>
</div>

<div id="b2" class="containerTab" style="display:none;background:rgba(39,38,38,1.00)">
  <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
   <h2>Karyawan Cabang Yang Terdaftar</h2>
	<?php include('HRDarea_karyawancabang.php')?>
</div>

<div id="b3" class="containerTab" style="display:none;background:rgba(98,96,96,1.00)">
  <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
   <h2>Karyawan Yang Sudah Resign</h2>
	<?php include('HRDarea_karyawanresign.php')?>
</div>

<script>
function openTab(tabName) {
  var i, x;
  x = document.getElementsByClassName("containerTab");
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  document.getElementById(tabName).style.display = "block";
}
</script>

</body>
</html> 
