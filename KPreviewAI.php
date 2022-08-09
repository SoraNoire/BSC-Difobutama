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
		    <h1>D.C.A.R</h1>
		    <i><b>Informasi : </b> Hasil pencarian data D.C.A.R periode <b><?php echo $_POST['tanggal_awal']?></b> s/d <b><?php echo $_POST['tanggal_akhir']?></b></i>
			<?php
			$query=mysqli_query($con, "SELECT * FROM laporan_penagihan WHERE kantor='$kantor' and tanggal_penagihan between '$tanggal_awal' and '$tanggal_akhir' ORDER BY kode_lappenagihan DESC");
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
              <td class="align-middle"><a href="<?php echo $data['lokasi_lappenagihan']; ?>" target="_blank"><?php echo $data['lokasi_lappenagihan']; ?></a></td>
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
		  
		<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery-1.11.3.min.js"></script>
		</div>
		</div>
	</body>
</html>