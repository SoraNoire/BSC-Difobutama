<!DOCTYPE html>
<?php
include('SlikTP_sidenav.php');
include('header.php')
?>
<html>
<head>
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/animate.css" rel="stylesheet" type="text/css">
	<meta name="viewport" content="width=device-width; height=device-height; initial-scale=0.1; maximum-scale=1.0;">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>The Balance Score Card</title>
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet">
	<link href="css/star-rating.min.css" media="all" rel="stylesheet" type="text/css" />
	<link href="css/w3.css.css" media="all" rel="stylesheet" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
</head>
<body>
	<div>
		<?php
		include('TargetAOF_Input.php')
		?>
	</div>
	<div align="center" >
	<span style="font-size: 50px;font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif';color: darkblue" class="w3-animate-fading infinite">INPUT TARGET AO FUNDING</span>
	</div>
	<div>
		<?php
		include('TargetAOF_ved.php')
		?>
	</div>
</body>
</html>