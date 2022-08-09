<?php

include "dbcon.php";

$emailditerima = $_POST['email'];
$result=mysqli_query($con, "select * from central_data where email='$emailditerima'")or die('Error In Session');
$row=mysqli_fetch_array($result);
$emailpemilik = $row['email'];
$pass		  = $row['pass'];


//notif email ke bm
$to       = $emailpemilik;
$subject  = $emailditerima;
$message  = '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body style="font-family:Verdana, Geneva, sans-serif;font-size:12px;">
<table width="100%" cellspacing="0" cellpadding="0" align="center" style="padding:20px;border:dashed 1px #333;"><tr><td>
Hai, Berikut Kami Kirimkan Password Akses Anda :    <br><br>
		<div style="float:left; width:150px; margin-bottom:5px;">Pass</div>
		<div style="float:left;"><strong>'.$pass.'</strong></div>
		<div style="clear:both"></div>
<td><tr></table>
</body>
</html>';	

if($result = 1){
				?>	<script language="JavaScript">
						alert('Password telah dikirim, silahkan chek email anda!');
						document.location='index.php';
					</script>
				<?php
				require_once('function_mailer.php');
					smtp_mail($to, $subject, $message, '', '', 0, 0, true);
			}else{
				?>	<script language="JavaScript">
						alert('Anda Belum Terdaftar, Harap Menghubungi Bagian HRD!');
						document.location='index.php';
					</script>
				<?php
				
			}
?>