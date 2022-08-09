<?php
//Start session
session_start();
//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['nik']) || (trim($_SESSION['nik']) == '')) {
    ?>
    <script type="text/javascript">
    window.location.href = 'index.php';
    </script>
    <?php
    exit();
}
$session_id=$_SESSION['nik'];

?>