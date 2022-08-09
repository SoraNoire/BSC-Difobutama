<html>
<head>
<link>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap-3.3.7.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript">
var htmlobjek;
$(document).ready(function(){
//apabila terjadi event onchange terhadap object <select id=propinsi>
$("#kantor").change(function(){
var kantor = $("#kantor").val();
$.ajax({
url: "DIREKSIarea_ambilpenempatan.php",
data: "kantor="+kantor,
cache: false,
success: function(msg){
//jika data sukses diambil dari server kita tampilkan
//di <select id=kota>
$("#penempatan").html(msg);
}
});
});
$("#penempatan").change(function(){
var penempatan = $("#penempatan").val();
$.ajax({
url: "DIREKSIarea_ambilnamaao.php",
data: "penempatan="+penempatan,
cache: false,
success: function(msg){
$("#nama_ao").html(msg);
}
});
});
});
 
</script>

	</head>
	<body>
		<div style="background: rgba(249,242,242,1.00);opacity: inherit">
        <?php include('DIREKSIarea_sidenav.php')?>
        <?php include('header.php')?>
		<?php
		include('dbcon.php');
		include_once('session.php');
		$result=mysqli_query($con, "select * from central_data where nik='$session_id'")or die('Error In Session');
		$row=mysqli_fetch_array($result);
 		$penempatan=$row['penempatan'];
		$kantor=$row['kantor'];
		?>
		<form action="DIREKSIarea_SPreview.php" method="post" name="postform">
			<p align="center"><font color="orange" size="10"><b>Laporan D.S.A.R</b></font></p><br />
			<table border="0">
<tr>
<td>Pilih Kantor</td>
<td>
<select name="kantor" id="kantor">
<option>--PILIH--</option>
<?php
//mengambil nama-nama propinsi yang ada di database
$kantor = mysqli_query($con,"SELECT * FROM combobox_kantor ORDER BY nama_perusahaan");
while($p=mysqli_fetch_array($kantor)){
echo "<option value=\"$p[kode_perusahaan]\">$p[nama_perusahaan]</option>\n";
}
?>
</select>
</td>
</tr>
<tr>
<td>Pilih Cabang </td>
<td>
<select name="penempatan" id="penempatan">
<option></option>
<?php
//mengambil nama-nama propinsi yang ada di database
$penempatan = mysqli_query($con,"SELECT * FROM combobox_kcp ORDER BY area_kcp");
while($p=mysqli_fetch_array($kantor)){
echo "<option value=\"$p[kode_kcp]\">$p[area_kcp]</option>\n";
}
?>
</select>
</td>
</tr>
<tr>
<td>Pilih Nama AO </td>
<td>
<select name="nama_ao" id="nama_ao">
<option></option>
</select>
</td>
</tr>
		<tr>
					<td width="125"><b>Dari Tanggal</b></td>
					<td colspan="2" width="190">: <input type="text" name="tanggal_awal" size="16" />
					</td><td><a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.postform.tanggal_awal);return false;" ><img src="calender/calbtn.gif" alt="" name="popcal" width="34" height="29" border="0" align="absmiddle" id="popcal" /></a>				
					</td>
					<td width="125"><b>Sampai Tanggal</b></td>
					<td colspan="2" width="190">: <input type="text" name="tanggal_akhir" size="16" />
					</td><td><a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.postform.tanggal_akhir);return false;" ><img src="calender/calbtn.gif" alt="" name="popcal" width="34" height="29" border="0" align="absmiddle" id="popcal" /></a>				
					</td>
			<tr>
					<td><input type="submit" value="Generate Laporan" name="pencarian"/></td>
					
			</tr>
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
			$nama_ao=$_POST['nama_ao'];
			// filter kantor
			$kode_kantor=$_POST['kantor'];
			$perusahaan=mysqli_query($con,"SELECT kantor FROM central_data WHERE kode_kantor='$kode_kantor'");
			$rowperusahaan=mysqli_fetch_array($perusahaan);
			$realkantor=$rowperusahaan['kantor'];
			// filter KCP
			$kode_penempatan=$_POST['penempatan'];
			$penempatan=mysqli_query($con,"SELECT penempatan FROM central_data WHERE kode_kcp='$kode_penempatan'");
			$rowpenempatan=mysqli_fetch_array($penempatan);
			$realpenempatan=$rowpenempatan['penempatan'];
			
			if(empty($tanggal_awal) || empty($tanggal_akhir)){
			//jika data tanggal kosong
			?>
			<script language="JavaScript">
				alert('Tanggal Awal dan Tanggal Akhir Harap di Isi!');
				document.location='DIREKSIarea_SPreview.php';
			</script>
			<?php
			}
			elseif(empty($kode_penempatan) && empty($nama_ao)){
			?><i><b>Informasi : </b> Hasil pencarian data berdasarkan periode Tanggal <b><?php echo $_POST['tanggal_awal']?></b> s/d <b><?php echo $_POST['tanggal_akhir']?></b></i>
			<?php
			$query=mysqli_query($con, "SELECT * FROM sales_plan WHERE kantor='$realkantor' and tanggal_sp between '$tanggal_awal' and '$tanggal_akhir' ORDER BY tanggal_sp DESC, jam_sp DESC");
			}
			elseif(empty($nama_ao)){
			?><i><b>Informasi : </b> Hasil pencarian data berdasarkan periode Tanggal <b><?php echo $_POST['tanggal_awal']?></b> s/d <b><?php echo $_POST['tanggal_akhir']?></b></i>
			<?php
			$query=mysqli_query($con, "SELECT * FROM sales_plan WHERE kantor='$realkantor' and penempatan='$realpenempatan' and tanggal_sp between '$tanggal_awal' and '$tanggal_akhir' ORDER BY tanggal_sp DESC, jam_sp DESC");
			}	
			else
			{
			?><i><b>Informasi : </b> Hasil pencarian data berdasarkan periode Tanggal <b><?php echo $_POST['tanggal_awal']?></b> s/d <b><?php echo $_POST['tanggal_akhir']?></b></i>
			<?php
			$query=mysqli_query($con, "SELECT * FROM sales_plan WHERE id_ao='$nama_ao' and tanggal_sp between '$tanggal_awal' and '$tanggal_akhir' ORDER BY tanggal_sp DESC, jam_sp DESC");
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
              <td class="align-middle"><a href="<?php echo $data['lokasi_sp']; ?>" target="_blank"><?php echo "Click Here!"; ?></a></td>
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
		</div>
		</div>
</div>
	</body>
</html>