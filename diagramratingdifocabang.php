<?php
//koneksi ke database
$con = mysqli_connect("localhost","dmballan","SR@DM-bsc$123","dmballan_ballancescorecard");

$bulan= date('m');
  $tahun= date('Y');
  $no=1;
  $jumlah= "SELECT rating, COUNT( * ) AS total FROM ratingdifotajur GROUP BY rating"; 
  $rata2= "SELECT AVG(rating) AS ratarata from ratingdifotajur";
  $SQLAVG=mysqli_query($con,$rata2);
  $dataAVG=mysqli_fetch_array($SQLAVG);
$rows = array();
$table = array();
$table['cols'] = array(
	//membuat label untuk nama nya, tipe string
	array('label' => 'nama', 'type' => 'string'),
	//membuat label untuk jumlah siswa, tipe harus number untuk kalkulasi persentasenya
	array('label' => 'Jumlah', 'type' => 'number')
);

//melakukan query ke database select
$sql = mysqli_query($con, $jumlah);
//perulangan untuk menampilkan data dari database
while($data = mysqli_fetch_array($sql)){
	//membuat array
	$temp = array();
	//memasukkan data pertama yaitu nama kelasnya
	$temp[] = array('v' => (string)$data['rating']);
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
		var options = {'title':'HASIL SURVEY KEPUASAN PELANGGAN',
					    'width':500,
					   'height':300};

		var chart = new google.visualization.BarChart(document.getElementById('chart_ratingdifocabang'));
		chart.draw(data, options);
	}
    </script>
	<link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="js/star-rating.min.js" type="text/javascript"></script>
	<link href="css/star-rating.min.css" media="all" rel="stylesheet" type="text/css" />
	<link href="css/bootstrap.min.css" media="all" rel="stylesheet" type="text/css" />
</head>
<body>
    <?php include('header.php')?>
	<?php include('all_about_us_sidenav.php')?>
	<div class="container" style="padding-top:20px; background: rgba(244,241,241,1.00)" align="center">
    <div><input class="rating" min=0 max=5 step=1 value="<?php echo $dataAVG['ratarata'];?>" data-size="md" data-stars="5" name="rating" readonly></div>
	<!--Div yang akan menampilkan chart-->
    <div id="chart_ratingdifocabang"></div>
	<div>
	<h4>Dari Diagram Survey Diatas Rata-Rata Kepuasan Pelanggan Adalah : <?php echo $dataAVG['ratarata']." Bintang";?></h1>
	</div>
	</div>
</body>
</html>