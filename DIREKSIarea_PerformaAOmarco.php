<html>
<head>
<link>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
</head>

	</head>
	<body style="background-color: purple;color: aliceblue;padding-top: 80px">
		<div>
		<?php
		include('dbcon.php');
		$result=mysqli_query($con, "select * from central_data where nik='$session_id'")or die('Error In Session');
		$row=mysqli_fetch_array($result);
 		$penempatan=$row['penempatan'];
		$kantor=$row['kantor'];
		?>
		<form action="DIREKSIarea_PerformaAOmarco.php" method="post" name="postform">
			<p align="center"><font color="orange" size="10"><b>Performa Tahunan A.O</b></font></p><br />
			<table class="table">
				<tr>
					<td><label><b>Input Tahun</b></label></td>
					<td> : </td>
					<td>
					<input style="color: red" type="text" name="tahun" size="16" placeholder="input 4 angka">
					</td>
					<td colspan="2" width="190"><input type="submit" style="color: black "value="Generate Laporan" name="generate"/></td>
				</tr>
			</table>
		</form>
		<p>
		<?php
			//proses jika sudah klik tombol pencarian data
			if(isset($_POST['generate'])){
			//menangkap nilai form
			$tahun=$_POST['tahun'];
			if(empty($tahun)){
			//jika data tanggal kosong
			?>
			<script language="JavaScript">
				alert('Tahun  Harap di Isi!');
			</script>
			<?php
			}else{
			include('LaporanMingguan_PerformaAOmarco.php');
			}
		}
		else{
			unset($_POST['pencarian']);
		}
		?>
		<iframe width=174 height=189 name="gToday:normal:calender/normal.js" id="gToday:normal:calender/normal.js" src="calender/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;"></iframe>
		</div>
		</div>
	</body>
</html>