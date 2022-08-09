<?php

include "dbcon.php";
$pdo = new PDO('mysql:host='.'localhost'.';dbname='.'dmballan_ballancescorecard','dmballan','SR@DM-bsc$123');

$kodesp = $_POST['kodesp'];

$sqlcek = $pdo->prepare("SELECT * FROM sales_plan_bm WHERE kodesp=:kodesp");
$sqlcek->bindParam(':kodesp', $kodesp);
$sqlcek->execute(); 
$data = $sqlcek->fetch();

$sql = $pdo->prepare("DELETE FROM sales_plan_bm WHERE kodesp=:kodesp");
$sql->bindParam(':kodesp', $kodesp);
$sql->execute(); 


ob_start();
include "salesplanBM_view.php";
$html = ob_get_contents();
ob_end_clean();


$response = array(
	'pesan'=>'Data berhasil dihapus', 
	'html'=>$html 
);
echo json_encode($response); 
?>
