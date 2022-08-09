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
		<div class="modal-dialog"  style="width: auto">
			<!-- konten modal-->
			<div class="modal-content">
				<!-- heading modal -->
<div class="modal-header" style="background-color:currentColor">
	<button type="button" class="close" data-dismiss="modal">&times;</button>
	<h4 class="modal-title"><center><h4 style="color: white"><b>NEW POST</b></h4></center></h4>
</div>
				<!-- body modal -->
<div class="modal-body">
	<form method="post" id="form-user" action="HRDarea_News_simpan.php" enctype="multipart/form-data" style="width: auto">
		<table align="center" class="table" border="0">
		    <tr>
			  <td>
			  <label>No</label>	 
			  </td>
			  <td>
			  <label>:</label>	 
			  </td>
			  <td>
				<input type="text" class="form-control" name="no_surat" style="width: 100%;height: 30px;" placeholder="No Surat"></input>	 
			  </td>
			  <td>
			  <label>Tanggal Berlaku</label>	 
			  </td>
			  <td>
			  <label>:</label>	 
			  </td>
			  <td>
				<input type="date" class="form-control" name="tanggal_berlaku" style="width: 100%;height: 30px;"></input>	 
			  </td>
			</tr>
			<tr>
			  <td>
			  <label>Jenis</label>
			  </td>
			  <td>
			  <label>:</label>
			  </td>
			  <td colspan="4">
                <select id="jenis" name="jenis" class="form-control">
                  <option value="">Pilih</option>
                  <option value="Surat Keputusan">Surat Keputusan</option>
                  <option value="Surat Edaran">Surat Edaran</option>
				  <option value="Pengumuman">Pengumuman</option>
                </select>	 
			  </td>
			</tr>
			<tr>
				<td>
					<label>Uraian Singkat</label>
				</td>
				<td>
					<label>:</label>
				</td>
				<td colspan="4">
				<textarea name="uraian" id="editor1" rows="5" cols="50">
				</textarea>
				<script>
					CKEDITOR.replace( 'editor1' );
					config.removeButtons = 'Save';
				</script>
					</td>
			</tr>
			<tr>
			  <td>
			  <label>Attachment</label>
			  </td>
			  <td>
			  <label>:</label>
			  </td>
			 <td>
   			 <input type="file" name="fileToUpload" id="fileToUpload"></input>
			 </td>
			</tr>
			<tr>
			<td colspan="6" align="center" style="padding-top: 20px"><button class="btn btn-success" id="submit">SIMPAN</button></td>
			</tr>
		</table>
	</form>
</div>
<!-- footer modal -->
<div class="modal-footer" style="background-color:currentColor;height: 10px" >
	
</div>
			</div>
		</div>
	</div>
   </div>
</body>
</html>