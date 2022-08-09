<!DOCTYPE html>
<?php 
include('dbcon.php');
include_once('session.php');

$result=mysqli_query($con, "select * from central_data where nik='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);

?>
<html lang="en">
<head>
</head>
<body>
<footer class="text-center" style="position: fixed;width: 100%; bottom: 0;left: 0;right: 0;background:rgba(19,19,19,0.85);">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <p style="color: white;padding: 1px">Copyright © BPR Difobutama & BPR Marcorindo Perdana</p>
      </div>
    </div>
  </div>
</footer>
</body>
</html>
