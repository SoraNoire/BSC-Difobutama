<form action="" method="post">
  <button type="submit" name="submit">Click Me</button>
</form>
<?php
include('dbcon.php');
include('session.php');
$result=mysqli_query($con, "select * from central_data where nik='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);
$kantor="Marcorindo";
$result_dir22=mysqli_query($con,"SELECT * FROM central_data WHERE kantor='$kantor' AND jabatan='Direktur2'");
$row_dir22=mysqli_fetch_array($result_dir22);
$email = $row_dir22['email'];
?>
<?php
	require_once('function_mailer.php');
	if(isset($_POST['submit']))
	{
    $to       = $email;
    $to2      = $email2;
    $subject  = 'Konfirmasi Email';
    $message = '
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>


<body style="font-family:Verdana, Geneva, sans-serif;font-size:12px;">
<table width="100%" cellspacing="0" cellpadding="0" align="center" style="padding:20px;border:dashed 1px #333;"><tr><td>
Hai Ini Adalah Email Uji Coba, Jika Kamu Menerima Email Ini, Maka Sistem Berhasil Mengkonfirmasi Email Kamu.    <br><br>
        
        <div style="float:left;"><strong>'."Thanks & be Regard.".'</strong></div><br>
        <div style="float:left;"><strong>'."~The Ballance Scorecard~".'</strong></div>
        <div style="clear:both"></div>
        
 <td><tr></table>
</body>
</html>';
    smtp_mail($to, $subject, $message, '', '', 0, 0, true);
    
    /*
      jika menggunakan fungsi mail biasa : mail($to, $subject, $message);
      dapat juga menggunakan fungsi smtp secara dasar : smtp_mail($to, $subject, $message);
      jangan lupa melakukan konfigurasi pada file function.php
    */
	}
?>