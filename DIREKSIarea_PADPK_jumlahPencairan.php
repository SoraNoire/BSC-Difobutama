<html>
<head>
<link>
<link href="calender/normal.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">

</head>

	</head>
	<body>
		<div style="background: rgba(249,242,242,1.00);opacity: inherit">
		<?php include('DIREKSIarea_sidenav.php')?>
        <?php include('header.php')?>
		<?php
		include('dbcon.php');
		$result=mysqli_query($con, "select * from central_data where nik='$session_id'")or die('Error In Session');
		$row=mysqli_fetch_array($result);
 		$penempatan=$row['penempatan'];
		$kantor=$row['kantor'];
			
			function rupiah($angka){
	
	$hasil_rupiah = "Rp.   " . number_format($angka,2,',','.');
	return $hasil_rupiah;
 
}
		?>
		<form action="DIREKSIarea_PADPK_jumlahPencairan.php" method="post" name="postform">
			<p align="center"><font color="orange" size="10"><b>Total Pencairan Pertanggal Tertentu</b></font></p><br />
			<table border="0">
				<tr>
					<td width="125"><b>Dari Tanggal</b></td>
					<td colspan="2" width="190">: <input type="text" name="tanggal_awal" size="16" />
					</td><td><a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.postform.tanggal_awal);return false;" ><img src="calender/calbtn.gif" alt="" name="popcal" width="34" height="29" border="0" align="absmiddle" id="popcal" /></a>				
					</td>
				</tr>
				<tr>
					<td width="125"><b>Sampai Tanggal</b></td>
					<td colspan="2" width="190">: <input type="text" name="tanggal_akhir" size="16" />
					</td><td><a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.postform.tanggal_akhir);return false;" ><img src="calender/calbtn.gif" alt="" name="popcal" width="34" height="29" border="0" align="absmiddle" id="popcal" /></a>				
					</td>
				</tr>
				<tr>
					<td colspan="2" width="190"><input type="submit" value="Generate" class="btn btn-info" name="pencarian"/></td>
				</tr>
			</table>
		</form>
		<p>
		<?php
			//proses jika sudah klik tombol pencarian data
			if(isset($_POST['pencarian'])){
			//menangkap nilai form
			$tanggal_awal=$_POST['tanggal_awal'];
			$tanggal_akhir=$_POST['tanggal_akhir'];
			if(empty($tanggal_awal) || empty($tanggal_akhir)){
			//jika data tanggal kosong
			?>
			<script language="JavaScript">
				alert('Tanggal Awal dan Tanggal Akhir Harap di Isi!');
				document.location='DIREKSIarea_PADPK_jumlapPencairan.php';
			</script>
			<?php
			}else{
			?><i><b>Informasi : </b> Hasil pencarian data berdasarkan periode Tanggal <b><?php echo $_POST['tanggal_awal']?></b> s/d <b><?php echo $_POST['tanggal_akhir']?></b></i>
			<?php
			$query=mysqli_query($con, "SELECT * FROM permohonan_analisa_kredit WHERE kantor_pemohon='$kantor' and status='acc3' and tanggal_input between '$tanggal_awal' and '$tanggal_akhir'");
			}
		?>
		</p>
	<div style="padding: 0 15px;">
		<div>
				<?php
				$jumlah = mysqli_query($con,"SELECT SUM(plafond) AS Total FROM permohonan_analisa_kredit WHERE kantor_pemohon='$kantor' and status='acc3' and tanggal_input between '$tanggal_awal' and '$tanggal_akhir'");
				$total=mysqli_fetch_array($jumlah);
				echo "Jumlah Pencairan = ".(rupiah($total['Total']));
				?>
			</div>
      <div class="table-responsive" style="width: 100%">
        <table class="table-bordered" border="2px" width="100%">
          <tr>
            <th class="text-center">NO</th>
            <th class="text-center text-nowrap">Tanggal Diajukan</th>
            <th class="text-center text-nowrap">No. PADPK</th>
            <th class="text-center text-nowrap">Account Officer</th>
            <th class="text-center text-nowrap">Manager Bisnis</th>
            <th class="text-center text-nowrap">Kepala Analis</th>
            <th class="text-center text-nowrap">Analis Kredit</th>
            <th class="text-center text-nowrap">Nama Nasabah</th>
            <th class="text-center text-nowrap">No Telepon</th>
            <th class="text-center text-nowrap">Alamat Nasabah</th>
            <th class="text-center text-nowrap">Plafond</th>
          </tr>
			<?php
			//menampilkan pencarian data
			$no = 1;
			while($data=mysqli_fetch_array($query)){
			?>
            <tr style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, 'sans-serif'">
              <td class="align-middle text-center"><?php echo $no; ?></td>
              <td class="align-middle text-nowrap "><?php echo date("d/M/Y",strtotime($data['tanggal_input'])); ?></td>
              <td class="align-middle text-nowrap "><?php echo $data['kode_permintaan']; ?></td>
              <td class="align-middle text-nowrap text-center"><?php echo $data['nama_ao']; ?></td>
              <td class="align-middle"><?php echo $data['nama_pemohon']; ?></td>
              <td class="align-middle"><?php echo $data['nama_kep_analis']; ?></td>
              <td class="align-middle"><?php echo $data['nama_analis']; ?></td>
              <td class="align-middle"><?php echo $data['nama_nasabah']; ?></td>
              <td class="align-middle"><?php echo $data['no_tlp_nasabah']; ?></td>
              <td class="align-middle"><?php echo $data['alamat_nasabah']; ?></td>
              <td class="align-middle"><?php echo rupiah($data['plafond']); ?></td>
            </tr>
          <?php
            $no++; // Tambah 1 setiap kali looping
          }
          ?>   
			<tr>
				<td colspan="4" align="center"> 
				<?php
				//jika pencarian data tidak ditemukan
				if(mysqli_num_rows($query)==0){
					echo "<font color=red><blink>Pencarian data tidak ditemukan!</blink></font>";
				}
				?>
				</td>
			</tr> 
		</table>
		<?php
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