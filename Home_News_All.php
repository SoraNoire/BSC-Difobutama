<!doctype html>
<?php 
include('dbcon.php');
include('session.php');

$result=mysqli_query($con, "select * from central_data where nik='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);

?>

<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>The Ballance Scorecard</title>
<link>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/animate.css" rel="stylesheet" type="text/css">
</head>
<body style="padding-top: 70px;">
<?php include('header.php')?>
<div class="col-sm-12">
	<div class="col-sm-12" style="height: auto;background: rgba(249,240,241,1.00);border:;border: 10px solid black">
	<?php include('Home_All_Information.php')?>
	</div>
	<?php include('footer.php')?>
</body>
</html>