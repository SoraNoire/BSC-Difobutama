<!DOCTYPE html>
<?php 
include('dbcon.php');
include_once('session.php');

$result=mysqli_query($con, "select * from central_data where nik='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);

date_default_timezone_set('asia/jakarta');
$tanggal = date("d");
$bulan = date("m");
$tahun = date("Y");
$jam   = date("Hsi");

?>
<html>	
<head>	
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap-3.3.7.css" rel="stylesheet" type="text/css">
<link href="css/animate.css" rel="stylesheet" type="text/css">
	<script src="ckeditor/ckeditor.js"></script>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style>
.button {
  display: inline-block;
  padding: 15px 25px;
  font-size: 24px;
  cursor: pointer;
  text-align: center;
  text-decoration: none;
  outline: none;
  color: #fff;
  background-color: #06FCF0;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px #999;
}

.button:hover {background-color: #01F843}

.button:active {
  background-color: #1989FF;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
</style>
</head>
<body>
   <div class="container">		
	<br/>
	<button type="button" style="position: absolute" class="btn button" data-toggle="modal" data-target="#myModal">Create</button>
 
	<!-- Modal -->
	<div id="myModal" class="modal fade" role="dialog" style="width: 100%">
		<div class="modal-dialog"  style="width: 100%">
			<!-- konten modal-->
			<div class="modal-content">
				<!-- heading modal -->
<div class="modal-header" style="background-color:currentColor">
	<button type="button" class="close" data-dismiss="modal">&times;</button>
	<h4 class="modal-title"><center><h4 style="color: white"><b>PERMINTAAN CHEK SLIK</b></h4></center></h4>
</div>
				<!-- body modal -->
<div class="modal-body">
	<form method="post" id="form-user" action="AOarea_SLIK_R_Simpan.php" enctype="multipart/form-data" style="width: 100%">
	<table class="table table-responsive" align="center">
		<table align="center" class="table" border="0">
		    <tr>
			  <td>
			  <label>Nama Cadeb</label>	 
			  </td>
			  <td>
			  <label>:</label>	 
			  </td>
			  <td>
				<input type="text" class="form-control" name="nama_nasabah" style="width: 100%;" placeholder="Nama"></input>	 
			  </td>
			</tr>
			<tr>
			  <td>
			  <label>ID Cadeb</label>	 
			  </td>
			  <td>
			  <label>:</label>	 
			  </td>
			  <td>
				<input type="text" class="form-control" name="nik_ktp_nasabah" style="width: 100%;" placeholder="No KTP"></input>	 
			  </td>
			</tr>
			<tr>
			  <td>
			  <label>Contact Number</label>	 
			  </td>
			  <td>
			  <label>:</label>	 
			  </td>
			  <td>
				<input type="text" class="form-control" name="no_tlp_nasabah" style="width: 100%;" placeholder="No Telepon Aktif"></input>	 
			  </td>
			</tr>
			<tr>
				<td>
			  <label>Sumber</label>	 
			  </td>
			  <td>
			  <label>:</label>	 
			  </td>
				<td>
				<select id="sumber" name="sumber" class="form-control">
                <option value="0">PILIH SUMBER</option>
                <option value="ADS">GOOGLE ADS</option>
                <option value="FNT">FINTECH</option>
                <option value="CVS">CANVASING</option>
                <option value="MTR">MEDIATOR</option>
                </select>
				</td>
			</tr>
			<tr>
			<td colspan="3" align="center" style="padding-top: 2%"><button class="btn btn-success" id="submit">SIMPAN</button></td>
			</tr>
		</table>
	  </table>
	</form>
</div>
<!-- footer modal -->
<div class="modal-footer" style="background-color:currentColor;height: 5%" >
	
</div>
			</div>
		</div>
	</div>
   </div>
</body>
</html>