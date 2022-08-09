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
	<script src="ckeditor/ckeditor.js"></script>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta charset="utf-8">
	</script>
</head>
<body>
   <div class="container">		
	<br/>
	<button type="button" style="position:sticky" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal2">Import File Excel</button>
 
	<!-- Modal -->
	<div id="myModal2" class="modal fade" role="dialog" style="background: rgba(0,0,0,0.86)">
		<div class="modal-dialog"  style="width: 50%">
			<!-- konten modal-->
			<div class="modal-content">
				<!-- heading modal -->
<div class="modal-header" style="background:rgba(83,82,82,1.00)">
	<button type="button" class="close" data-dismiss="modal">&times;</button>
	<h2 class="modal-title" style="text-align: center;color: white"><b>Input Planing Penagihan</b></h2>
</div>
				<!-- body modal -->
<div class="modal-body" align="center">
	<form method="post" enctype="multipart/form-data" action="KParea_TargetPenagihan_Input_Batch_Save.php">
	Pilih File: 
	<input name="filetarget" type="file" required="required"> 
	<input name="upload" type="submit" value="Import">
</form>
</div>
<!-- footer modal -->
<div class="modal-footer" style="background:rgba(83,82,82,1.00);height: 50px" >
</div>
			</div>
		</div>
	</div>
   </div>
</body>
</html>