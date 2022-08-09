<?php include('dbcon.php'); ?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="form-wrapper">
  
  <form action="#" method="post">
    <h3>Forgot Your Password?</h3>
	
    <div class="form-item">
		<input type="text" name="email" required="required" placeholder="E-mail" autofocus required></input>
    </div>
     
    <div class="button-panel">
		<input type="submit" class="button" title="Log In" name="login" value="Get My Password"></input>
    </div>
  </form>
  <?php
	if (isset($_POST['login']))
		{
			$username = mysqli_real_escape_string($con, $_POST['email']);
			
			$query 		 = mysqli_query($con, "SELECT * FROM central_data WHERE  email='$username'");
			$row		 = mysqli_fetch_array($query);
			$num_row 	 = mysqli_num_rows($query);
			$pass        = $row['pass'];
			$emailuser   = $row['email'];
		    $namapemilik = $row['nama_karyawan'];
			if ($num_row > 0) 
				{	
	require_once('function_mailer.php');
    $to       = $emailuser;
    $subject  = 'Permintaan Password';
    $message = '
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Untitled Document</title>
	</head>


	<body style="font-family:Verdana, Geneva, sans-serif;font-size:12px;">
	<table width="100%" cellspacing="0" cellpadding="0" align="center" style="padding:20px;border:dashed 1px #333;"><tr><td>
	Hai '.$namapemilik.', kami berhasil menterjemahkan Enkripsi password kamu, berikut adalah password akses milikmu, simpan baik-baik ya..    <br><br>
			<div style="float:left; width:150px; margin-bottom:5px;">Your Password</div>
			<div style="float:left;"><strong>'.$pass.'</strong></div>
			<div style="clear:both"></div>
	 <td><tr></table>
	</body>
	</html>';
		smtp_mail($to, $subject, $message, '', '', 0, 0, true);
				?>	<script language="JavaScript">
						alert('Password telah dikirim, silahkan chek email anda!');
						document.location='index.php';
					</script>
				<?php
				}
			else
				{
					?>	<script language="JavaScript">
						alert('Anda Belum Terdaftar, Harap Menghubungi Bagian HRD!');
						document.location='index.php';
					</script>
				<?php
				
				}
		}
  ?>
  
</div>

</body>
</html>