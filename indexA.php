<?php session_start(); ?>
<?php include('dbcon.php'); ?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="form-wrapper">
  
  <form action="#" method="post">
    <h3>The Balance Score Card</h3>
	
    <div class="form-item">
		<input type="text" name="email" required="required" placeholder="E-mail" autofocus required></input>
    </div>
    
    <div class="form-item">
		<input type="password" name="pass" required="required" placeholder="Password" required></input>
    </div>
    
    <div class="button-panel">
		<input type="submit" class="button" title="Log In" name="login" value="Login"></input>
    </div>
  </form>
  <?php
	if (isset($_POST['login']))
		{
			$username = mysqli_real_escape_string($con, $_POST['email']);
			$password = mysqli_real_escape_string($con, $_POST['pass']);
			
			$query 		= mysqli_query($con, "SELECT * FROM central_data WHERE  pass='$password' and email='$username'");
			$row		= mysqli_fetch_array($query);
			$num_row 	= mysqli_num_rows($query);
			
			if ($num_row > 0) 
				{			
					$_SESSION['nik']=$row['nik'];
					header('location:home.php');
					
				}
			else
				{
					echo 'Invalid Username and Password Combination';
				}
		}
  ?>
  <div class="reminder">
    <p>Not a member? <a href="#">Sign up now</a></p>
    <p><a href="lupa_password.php">Forgot password?</a></p>
  </div>
  
</div>

</body>
</html>