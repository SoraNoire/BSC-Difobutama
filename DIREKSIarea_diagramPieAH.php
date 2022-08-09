<?php
//koneksi ke database
include "dbcon.php";

$bulan= date('m');
  $tahun= date('Y');
  $no=1;
  $jumlahSP= "SELECT nama_karyawan, COUNT( * ) AS total FROM aktivitas_harian WHERE month(tanggal_kegiatan)=$bulan and year(tanggal_kegiatan)=$tahun GROUP BY nama_karyawan"; 
  

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
	$temp[] = array('v' => (string)$data['nama_karyawan']);
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
	google.charts.setOnLoadCallback(drawChart);

	function drawChart() {

		// membuat data chart dari json yang sudah ada di atas
		var data = new google.visualization.DataTable(<?php echo $jsonTable; ?>);

		// Set options, bisa anda rubah
		var options = {'title':'Data Aktivitas Harian',
					    'width':innerWidth,
					   'height':300};

		var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
		chart.draw(data, options);
	}
    </script>
</head>
<body>
    
	<!--Div yang akan menampilkan chart-->
    <div id="chart_div"></div>
	
</body>
</html>