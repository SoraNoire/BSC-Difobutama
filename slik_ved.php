<!doctype html>
<?php 
require('dbcon.php');
require('session.php');
$result=mysqli_query($con, "select * from central_data where nik='$session_id'");
$row=mysqli_fetch_array($result);
$kantorpenginput=$row['kantor'];
$penempatanpenginput=$row['penempatan'];
 ?>

<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>The Ballance Scorecard</title>
<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

<link href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" />

<script src="https://code.jquery.com/jquery-1.12.3.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#tabelved').DataTable();
} );
</script>
</head>
<body>
<?php 
echo $_SESSION['nik'];
include_once('SlikTP_sidenav.php')?>
<div class="container" style="font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif';background: rgba(255,252,252,1.00);position: relative;width: 100%">
<h1 align="center">VIEW EDIT DELETE DATA SLIK</h1
<div class="container">
<div class="row">
<div class="col-md-12">
<table id="tabelved" border="1" width="100%" style="margin-bottom: 20px">
 <thead> 
  <tr>
    <th style="text-align: center" width="5%">Tanggal Input</th>
    <th style="text-align: center" width="9%">Penginput</th>
    <th style="text-align: center" width="9%">Pemohon</th>
	<th style="text-align: center" width="10%">Kode SLIK</th>
    <th style="text-align: center" width="10%">ID Nasabah</th>
    <th style="text-align: center" width="10%">Nama Nasabah</th>
    <th colspan="2" style="text-align: center" width="10%">Aksi</th>
  </tr>
  </thead>
  <?php
  include "dbcon.php";
  $query = "SELECT * FROM data_slik WHERE kantor_penginput='$kantorpenginput' and penempatan_penginput='$penempatanpenginput' ORDER BY tanggal_input DESC"; 
  $sql = mysqli_query($con, $query);
  while($data = mysqli_fetch_array($sql)){
    echo "<tr>";
    echo "<td style='text-align: center'>".date("d/M/Y",strtotime($data['tanggal_input']))."</td>";
	echo "<td style='text-align: center'>".$data['nama_penginput']."</td>";
    echo "<td style='text-align: center'>".$data['nama_pemohon']."</td>";
    echo "<td style='text-align: center'>".$data['kode_slik']."</td>";
    echo "<td style='text-align: center'>".$data['id_nasabah']."</td>";
    echo "<td style='text-align: center'>".$data['nama_nasabah']."</td>";
	echo "<td align='center'><a href='slik_update.php?id_nasabah=".$data['id_nasabah']."'>Ubah</a></td>";
    echo "<td align='center'><a href='slik_delete.php?id_nasabah=".$data['id_nasabah']."'>Hapus</a></td>";
    echo "</tr>";
  }
  ?>
  </table>
</div>
</div>
</div>
</div>
	
</body>
</html>