<!DOCTYPE html>
<?php 
include('dbcon.php');
include_once('session.php');

$result=mysqli_query($con, "select * from central_data where nik='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);
$level=$row['level']; if($level=='3')
{}
else
{}
date_default_timezone_set('asia/jakarta');
$tanggal = date("d");
$bulan = date("m");
$tahun = date("Y");
$jam   = date("Hsi");

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
	<button type="button" style="position: absolute" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Create</button>
 
	<!-- Modal -->
	<div id="myModal" class="modal fade" role="dialog" style="background: rgba(0,0,0,0.86)">
		<div class="modal-dialog"  style="width: 90%;">
			<!-- konten modal-->
			<div class="modal-content">
				<!-- heading modal -->
<div class="modal-header" style="background: rgba(4,238,249,0.32)">
	<button type="button" class="close" data-dismiss="modal">&times;</button>
	<h4 class="modal-title"><center><h4 style="color: red"><b>Tell Us Your Activity Today</b></h4></center></h4>
</div>
				<!-- body modal -->
<div class="modal-body">
	<form method="post" id="form-user" action="PEarea_activity_save.php" style="width: 99%">
		<table style="margin-left: 20px;width: auto">
		    <tr>
				<td style="padding-top: 20px;padding: 20px">
                <label>Activity Code</label>
				</td>
				<td>
                <input type="text" class="form-control" id="kode" name="kode" style="width: 250px" value="<?php echo sprintf($tanggal.$bulan.$jam."-".$mysamplekantor.$mysamplepenempatan ."/".$mysamplenik."/".$bulan."/".$tahun);?>"readonly>
				</td>
			</tr>
		</table>
		<table style="margin-left: 20px;width:100%">
			<tr>
				<textarea name="activity" id="editor1" rows="10" cols="80">
                Tell Us Your Activity Today
            </textarea>
            <script>
                CKEDITOR.replace( 'editor1' );
				config.removeButtons = 'Save';
            </script>
			</tr>
			<td style="padding-top: 50px" align="center"><button class="btn btn-success" id="submit">SIMPAN</button></td>
			</tr>
		</table>
	</form>
</div>
<!-- footer modal -->
<div class="modal-footer" style="background: rgba(4,238,249,0.32);height: 50px" >
	
</div>
			</div>
		</div>
	</div>
   </div>
</body>
</html>