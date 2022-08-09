<html>
	<head>
		<link>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
</head>

	</head>
	<body>
		<?php
		include('dbcon.php');
		$result=mysqli_query($con, "select * from central_data where nik='$session_id'")or die('Error In Session');
		$row=mysqli_fetch_array($result);
 		$penempatan=$row['penempatan'];
		$kantor=$row['kantor'];
		?>
		<form action="AIarea.php" method="post" name="postform">
			<p align="center"><font color="orange" size="10"><b>AUDIT INTERNAL</b></font></p><br />
			<table border="0">
				<tr>
					<td width="125"><b>Dari Tanggal</b></td>
					<td colspan="2" width="190">: <input type="text" name="tanggal_awal" size="16" />
					</td><td><a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.postform.tanggal_awal);return false;" ><img src="calender/calbtn.gif" alt="" name="popcal" width="34" height="29" border="0" align="absmiddle" id="popcal" /></a>				
					</td>
					<td width="125"><b>Sampai Tanggal</b></td>
					<td colspan="2" width="190">: <input type="text" name="tanggal_akhir" size="16" />
					</td><td><a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.postform.tanggal_akhir);return false;" ><img src="calender/calbtn.gif" alt="" name="popcal" width="34" height="29" border="0" align="absmiddle" id="popcal" /></a>				
					</td>
					<td colspan="2" width="190"><input type="submit" value="Generate Laporan" name="pencarian"/></td>
					<td colspan="2" width="70"><input type="reset" value="Reset" /></td>
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
				document.location='AIarea.php';
			</script>
			<?php
			}else{
			?>
			<h1>D.S.A.R</h1>
			<i><b>Informasi : </b> Hasil pencarian data D.S.A.R Periode <b><?php echo $_POST['tanggal_awal']?></b> s/d <b><?php echo $_POST['tanggal_akhir']?></b></i>
			<?php
			$query=mysqli_query($con, "SELECT * FROM sales_plan WHERE penempatan='$penempatan' and kantor='$kantor' and tanggal_sp between '$tanggal_awal' and '$tanggal_akhir' ORDER BY kode_sp DESC");
			}
		?>
		</p>
	<div style="padding: 0 15px;">
      <div class="table-responsive" style="width: 100%">
        <table class="table table-bordered" width="100%">
          <tr>
            <th class="text-center">NO</th>
            <th class="text-center text-nowrap">Tanggal</th>
            <th class="text-center text-nowrap">Jam Input</th>
            <th class="text-center text-nowrap">Nama AO</th>
            <th class="text-center text-nowrap">Kode D.S.A.R</th>
            <th class="text-center text-nowrap">Uraian D.S.A.R</th>
            <th class="text-center text-nowrap">Nama Nasabah</th>
            <th class="text-center text-nowrap">No Telepon</th>
            <th class="text-center text-nowrap">Alamat Nasabah</th>
            <th class="text-center text-nowrap">Lokasi</th>
            <th class="text-center text-nowrap">Foto</th>
            <th class="text-center text-nowrap">Keterangan</th>
          </tr>
			<?php
			//menampilkan pencarian data
			$no = 1;
			while($data=mysqli_fetch_array($query)){
			?>
            <tr style="font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, 'sans-serif'">
              <td class="align-middle text-center"><?php echo $no; ?></td>
              <td class="align-middle text-nowrap "><?php echo date("d/M/Y",strtotime($data['tanggal_sp'])); ?></td>
              <td class="align-middle text-nowrap "><?php echo date("H:i:s a",strtotime($data['jam_sp'])); ?></td>
              <td class="align-middle text-nowrap "><?php echo $data['nama_karyawan']; ?></td>
              <td class="align-middle text-nowrap text-center"><?php echo $data['kode_sp']; ?></td>
              <td class="align-middle"><?php echo $data['uraian_aktivitas']; ?></td>
              <td class="align-middle"><?php echo $data['nama_nasabah']; ?></td>
              <td class="align-middle"><?php echo $data['no_tlp_nasabah']; ?></td>
              <td class="align-middle"><?php echo $data['alamat_nasabah']; ?></td>
              <td class="align-middle"><a href="<?php echo $data['lokasi_sp']; ?>" target="_blank"><?php echo $data['lokasi_sp']; ?></a></td>
			  <td class="align-middle"><img src="imgsalesplan/<?php echo $data['foto_sp']; ?>" width="80" height="80"></td>
        </td>
              <td class="align-middle"><?php echo $data['keterangan']; ?></td>
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
		  
		<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery-1.11.3.min.js"></script>
		</div>
		</div>
	</body>
</html>