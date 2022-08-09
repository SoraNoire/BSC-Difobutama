<html>
<head>
<link>
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
		?>
		<form action="DIREKSIarea_KPreview.php" method="post" name="postform">
			<p align="center"><font color="orange" size="10"><b>Laporan D.C.A.R</b></font></p><br />
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
				document.location='KParea.php';
			</script>
			<?php
			}else{
			?><i><b>Informasi : </b> Hasil pencarian data berdasarkan periode Tanggal <b><?php echo $_POST['tanggal_awal']?></b> s/d <b><?php echo $_POST['tanggal_akhir']?></b></i>
			<?php
			$query=mysqli_query($con, "SELECT * FROM laporan_penagihan WHERE kantor='$kantor' and tanggal_penagihan between '$tanggal_awal' and '$tanggal_akhir' ORDER BY tanggal_penagihan DESC,jam_penagihan DESC");
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
            <th class="text-center text-nowrap">Nama Kolektor</th>
            <th class="text-center text-nowrap">Kode D.C.A.R</th>
            <th class="text-center text-nowrap">Klasifikasi Nasabah</th>
            <th class="text-center text-nowrap">Media Penagihan</th>
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
              <td class="align-middle text-nowrap "><?php echo date("d/M/Y",strtotime($data['tanggal_penagihan'])); ?></td>
              <td class="align-middle text-nowrap "><?php echo date("H:i:s a",strtotime($data['jam_penagihan'])); ?></td>
              <td class="align-middle text-nowrap "><?php echo $data['nama_kolektor']; ?></td>
              <td class="align-middle text-nowrap text-center"><?php echo $data['kode_lappenagihan']; ?></td>
              <td class="align-middle"><?php echo $data['klasifikasi_nasabah']; ?></td>
              <td class="align-middle"><?php echo $data['media_penagihan']; ?></td>
              <td class="align-middle"><?php echo $data['nama_nasabah']; ?></td>
              <td class="align-middle"><?php echo $data['no_tlp_n']; ?></td>
              <td class="align-middle"><?php echo $data['alamat_nasabah']; ?></td>
              <td class="align-middle"><a href="<?php echo $data['lokasi_lappenagihan']; ?>" target="_blank"><?php echo "Click Here!"; ?></a></td>
			  <td class="align-middle"><img src="imglappenagihan/<?php echo $data['foto_lappenagihan']; ?>" width="80" height="80"></td>
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
		</div>
		</div>
	</body>
</html>