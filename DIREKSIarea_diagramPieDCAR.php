<?php
//koneksi ke database
include "dbcon.php";

$bulan= date('m');
  $tahun= date('Y');
  $no=1;
  $jumlahSP= "SELECT nama_kolektor, COUNT( * ) AS total FROM laporan_penagihan WHERE month(tanggal_penagihan)=$bulan and year(tanggal_penagihan)=$tahun and media_penagihan='Kunjungan' GROUP BY nama_kolektor"; 
  

$rows = array();
$table = array();
$table['cols'] = array(
	//membuat label untuk nama nya, tipe string
	array('label' => 'nama', 'type' => 'string'),
	//membuat label untuk jumlah siswa, tipe harus number untuk kalkulasi persentasenya
	array('label' => 'Jumlah input', 'type' => 'number')
);

//melakukan query ke database select
$sql = mysqli_query($con, $jumlahSP);
//perulangan untuk menampilkan data dari database
while($data = mysqli_fetch_array($sql)){
	//membuat array
	$temp = array();
	//memasukkan data pertama yaitu nama kelasnya
	$temp[] = array('v' => (string)$data['nama_kolektor']);
	//memasukkan data kedua yaitu jumlah siswanya
	$temp[] = array('v' => (int)$data['total']);
	//memasukkan data diatas ke dalam array $rows
	$rows[] = array('c' => $temp);
}

//memasukkan array $rows dalam variabel $table
$table['rows'] = $rows;
//mengeluarkan data dengan json_encode. silahkan di echo kalau ingin menampilkan data nya
$jsonTable = json_encode($table);

?>
<html>
<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

	google.charts.load('current', {'packages':['corechart']});
	google.charts.setOnLoadCallback(ChartDCAR);

	function ChartDCAR() {

		// membuat data chart dari json yang sudah ada di atas
		var data = new google.visualization.DataTable(<?php echo $jsonTable; ?>);

		// Set options, bisa anda rubah
		var options = {'title':'Data D.C.A.R',
					    'width':innerWidth,
					   'height':300};

		var chart = new google.visualization.PieChart(document.getElementById('ChartDCAR_div'));
		chart.draw(data, options);
	}
    </script>
</head>
<body>
    
	<!--Div yang akan menampilkan chart-->
    <div id="ChartDCAR_div"></div>
	
</body>
</html>