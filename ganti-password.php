<!DOCTYPE html>
<html lang="en">
<head>
	<title>Ganti Pass</title>
<head>
<body>
	
	<h2>Ganti Password</h2>
	
	<?php
	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	
	include 'dbcon.php';
	include_once(session.php);
	if($_POST['submit']){
		$password_lama			= $_POST['password_lama'];
		$password_baru			= $_POST['password_baru'];
		$konfirmasi_password	= $_POST['konfirmasi_password'];
		$password_lama	= $password_lama;
		$cek 			= $con->query("SELECT pass FROM central_data WHERE pass='$password_lama'");
		
		if($cek->num_rows){
				if(strlen($password_baru) >= 8){
				if($password_baru == $konfirmasi_password){
					$password_baru 	= $password_baru;
					$nik 	= $_SESSION['nik'];
					$update = $con->query("UPDATE central_data SET pass='$password_baru' WHERE nik='$nik'");
					if($update){
						echo 'Proses berhasil !, Password Baru Anda Adalah : '.$password_baru;
					}else{
						echo 'Proses Gagal!';
					}					
				}else{
					echo 'Konfirmasi password tidak cocok';
				}
			}else{
				echo 'Minimal password baru adalah 8 karakter';
			}
		}else{
			echo 'Password lama tidak cocok';
		}
	}
	?>
	
	<!-- mulai form rubah password -->
	<form method="post" action="">
		<table>
			<tr>
				<td>Password Lama</td>
				<td>:</td>
				<td><input type="password" name="password_lama" required></td>
			<tr>
			<tr>
				<td>Password Baru</td>
				<td>:</td>
				<td><input type="password" name="password_baru" required></td>
			<tr>
			<tr>
				<td>Konfirmasi Password</td>
				<td>:</td>
				<td><input type="password" name="konfirmasi_password" required></td>
			<tr>
			<tr>
				<td>&nbsp;</td>
				<td></td>
				<td><input type="submit" name="submit" value="Proses"></td>
			<tr>
		</table>
	</form>
	<!-- selesai form rubah password -->
</body>
</html>