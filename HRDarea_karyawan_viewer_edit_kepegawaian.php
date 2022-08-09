<!doctype html>
<?php 
$nik = $_GET['nik'];
include('dbcon.php');
include('session.php'); 
include('header.php');

$result=mysqli_query($con, "select * from central_data where nik='$nik'")or die('Error In Session');
$row=mysqli_fetch_array($result);

 ?>

<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<script src="ckeditor/ckeditor.js"></script><meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap-3.3.7.css" rel="stylesheet" type="text/css">
<link href="css/animate.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
</head>
<body style="padding-top: 70px;background-image:url(css/img/bg.jpg)">

<div class="container" style="background:rgba(244,230,231,1.00);font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif';width: 100%">
  <div class="container" style="width: 100%;border: 10px double black">
    <hr>
    <div class="container" style="width: 100%;border: 10px double black">
        <h1><?php echo($row['nama_karyawan'])?></h1>
    <hr>
      <div class="col-xs-6">
        <div class="media">
          <div class="media-left"> <a href="#"> <img class="media-object img-rounded" height="50%" src="imgsys/PPD.png" alt="..."> </a> </div>
          <div class="media-body"  style="text-align: center;">
            <h2 class="media-heading">
			<?php echo($row['jabatan'])?></h2></div>
        </div>
      </div>
      <div class="col-xs-6 well" style="padding-right: 20px;padding-top: 0">
        <div class="row">
          <div class="col-lg-6">
            <h4><span class="glyphicon glyphicon-phone" aria-hidden="true"></span><?php echo(" :"."+62".$row['nohp'])?></h4>
          </div>
          <div class="col-lg-6">
            <h4><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span><?php echo(" : ".$row['email'])?></h4>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <h4><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span><?php echo(" : ".$row['kantor']." ".$row['penempatan'])?></h4>
          </div>
          <div class="col-lg-6">
            <h4><span class="glyphicon glyphicon-phone" aria-hidden="true"></span><?php echo(" : "."+62".$row['nohp2'])?></h4>
          </div>
        </div>
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-sm-8 col-lg-7">
	<form method="post" action="HRDarea_karyawan_viewer_edit_kepegawaian_save.php?nik=<?php echo $nik; ?>" enctype="multipart/form-data">
	<table style="font-size: 18px">
		    <td style="padding-right: 30px">Job Desk</td>
			  <td>:</td>
			  <td colspan="3" style="padding-left: 10px"><textarea type="text" id="editor2" name="JobDesk" style="width: 200px"><?php echo($row['JobDesk'])?></textarea>
		 	<script>
                CKEDITOR.replace( 'editor2' );
            </script></td>
		  </tr>
		  <tr>
			  <td style="padding-right: 30px">Status Kepegawaian</td>
			  <td>:</td>
			  <td style="padding-left: 10px"><input type="text" style="width: 200px"class="form-control" name="status_karyawan" value="<?php echo($row['status_karyawan'])?>"></input></td>
		  </tr>
		  <tr><td colspan="5" style="word-break: break-all"><span style="color: red">*Semua Tanggal <B>HARUS</B> di input dengan tombol pilihan <b>(Jangan di Ketik)</b></br></span></td></tr>
		  <tr>
			  <td style="padding-right: 30px">Tahun Bergabung</td>
			  <td>:</td>
			  <td style="padding-left: 10px"><input type="date" style="width: 200px"class="form-control" name="tahun_masuk" value="<?php echo($row['tahun_masuk'])?>"></input>
		  </tr>
		  <tr>
			  <td style="padding-right: 30px">Masa Probration</td>
			  <td>:</td>
			  <td style="padding-left: 10px"><input type="date" style="width: 200px"class="form-control" name="tgl_prob" value="<?php echo($row['tgl_prob'])?>"></input></td>
			  <td style="text-align: center">s/d</td>
			  <td><input type="date" style="width: 200px" class="form-control" name="tgl_prob_end" value="<?php echo($row['tgl_prob_end'])?>"></input></td>
		  </tr> 
		  <tr>
			  <td style="padding-right: 30px">Masa P.K.W.T</td>
			  <td>:</td>
			  <td style="padding-left: 10px"><input type="date" style="width: 200px" class="form-control" name="tgl_pkwt" value="<?php echo($row['tgl_pkwt'])?>"></input></td>
			  <td style="text-align: center">s/d</td>
			  <td><input type="date" style="width: 200px" class="form-control" name="tgl_pkwt_end" value="<?php echo($row['tgl_pkwt_end'])?>"></input></td>
		  </tr> 
		  <tr>
			  <td style="padding-right: 30px">Masa P.K.W.T Lanjutan</td>
			  <td>:</td>
			  <td style="padding-left: 10px"><input type="date" style="width: 200px"class="form-control" name="tgl_pkwt2" value="<?php echo($row['tgl_pkwt2'])?>"></input></td>
			  <td style="text-align: center">s/d</td>
			  <td><input type="date" style="width: 200px" class="form-control" name="tgl_pkwt2_end" value="<?php echo($row['tgl_pkwt2_end'])?>"></input></td>
		  </tr> 
		  <tr>
			  <td style="padding-right: 30px">Pengangkatan Karyawan Tetap</td>
			  <td>:</td>
			  <td style="padding-left: 10px"><input type="date" style="width: 200px"class="form-control" name="tgl_karyawan_tetap" value="<?php echo($row['tgl_karyawan_tetap'])?>"></input>
		  </tr>
      </table>
	  <br></br>
      <input type="submit" class="btn btn-success" value="Simpan Perubahan">
      <a class="btn btn-warning" onclick="javascript:history.back()"><span class="glyphicon glyphicon-remove-sign"> Cancel</span></a>
</form>
  </div>
	</div>
      
    </div>
<hr>
<hr>
<hr>
<hr>
<hr>
<hr>  
<hr>
<footer class="text-center">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <p>Copyright © Silent Ripper</p>
      </div>
    </div>
  </div>
</div>
</footer>
</div>
</body>
</html>