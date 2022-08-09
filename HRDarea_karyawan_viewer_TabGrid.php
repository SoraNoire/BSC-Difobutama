<!DOCTYPE html>
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
    padding: 20px;
    text-align: center;
    font-size: 18px;
    cursor: pointer;
    color: white;
}

.containerTab {
    padding: 15px;
    color: white;
}

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: none;
}

/* Closable button inside the container tab */
.closebtn {
    float: right;
    color: white;
    font-size: 20px;
    cursor: pointer;
}
</style>
</head>
<body>


<!-- Three columns -->
<div class="row">
  <div class="column" onclick="openTab('b1');" style="background:rgba(0,15,136,1.00);">
    Status Kepegawaian
  </div>
  <div class="column" onclick="openTab('b2');" style="background:rgba(16,54,231,1.00);">
    Jaminan Perusahaan
  </div>
  <div class="column" onclick="openTab('b3');" style="background:rgba(13,167,252,1.00);">
    Informasi Lainnya
  </div>
</div>

<!-- Full-width columns: (hidden by default) -->
<div id="b1" class="containerTab" style="display:none;background:rgba(0,15,136,1.00);">
  <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
	<?php include('HRDarea_karyawan_viewer_TabGrid_StatusKepegawaian.php')?>
</div>

<div id="b2" class="containerTab" style="display:none;background:rgba(16,54,231,1.00);">
  <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
	<?php include('HRDarea_karyawan_viewer_TabGrid_JaminanPerusahaan.php')?>
</div>

<div id="b3" class="containerTab" style="display:none;background:rgba(13,167,252,1.00);">
  <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
	<?php include('HRDarea_karyawan_viewer_TabGrid_InformasiLainnya.php')?>
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
