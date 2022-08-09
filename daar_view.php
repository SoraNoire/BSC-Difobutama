  <div style="padding: 0 15px;">
      <div class="table-responsive">
        <table class="table table-bordered">
          <tr>
            <th class="text-center">NO</th>
            <th>Tanggal</th>
            <th>Kode Kegiatan</th>
            <th>Uraian Kegiatan</th>
            <th>Kategori</th>
            <th>Nama AO</th>
            <th>Informasi Nasabah</th>
            <th>Lokasi</th>
            <th>Foto</th>
            <th>Keterangan</th>
			<th colspan="2" class="text-center"><span class="glyphicon glyphicon-cog"></span></th>
          </tr>
          <?php
          // Include / load file koneksi.php
          include "dbcon.php";
          include_once "session.php";
          // Cek apakah terdapat data page pada URL
          $page = (isset($_GET['page']))? $_GET['page'] : 1;
          
          $limit = 5; // Jumlah data per halamannya
          
          // Untuk menentukan dari data ke berapa yang akan ditampilkan pada tabel yang ada di database
          $limit_start = ($page - 1) * $limit;
       $pdo = new PDO('mysql:host='.'localhost'.';dbname='.'dmballan_ballancescorecard','dmballan','SR@DM-bsc$123');
          // Buat query untuk menampilkan data siswa sesuai limit yang ditentukan
		
          $sql = $pdo->prepare("SELECT * FROM daar WHERE id='$session_id' ORDER BY tanggal DESC LIMIT ".$limit_start.",".$limit);
          $sql->execute(); // Eksekusi querynya
          
          $no = $limit_start + 1; // Untuk penomoran tabel
          while($data = $sql->fetch()){ // Ambil semua data dari hasil eksekusi $sql
          ?>
        <tr>
		<td class="align-middle text-center"><?php echo $no; ?></td>
        <td class="align-middle"><?php echo $data['tanggal']; ?></td>
        <td class="align-middle"><?php echo $data['kode_kegiatan']; ?></td>
        <td class="align-middle"><?php echo $data['uraian_kegiatan']; ?></td>
        <td class="align-middle"><?php echo $data['jenis_kegiatan']; ?></td>
        <td class="align-middle"><?php echo $data['nama_ao']; ?></td>
        <td class="align-middle">nama : <?php echo $data['nama_nasabah']; ?>
        <br>alamat : <?php echo $data['alamat_nasabah']; ?></br><br>Kontak: <?php echo $data['no_tlp_nasabah']; ?></br></td>
        <td class="align-middle"><a href="<?php echo $data['lokasi']; ?>" target="_blank"><?php echo "Click Here" ?></a></td>
        <td class="align-middle text-center">
          <img src="imgdaar/<?php echo $data['foto']; ?>" width="80" height="80">
        </td>
        <td class="align-middle"><?php echo $data['keterangan']; ?></td>
		<td class="align-middle text-center">
          <a href="javascript:void();" data-toggle="modal" data-target="#form-modal" onclick="edit(<?php echo $no; ?>);" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span></a>
        </td>
        <td class="align-middle text-center">
          <a href="javascript:void();" data-toggle="modal" data-target="#delete-modal" onclick="hapus(<?php echo $no; ?>);" class="btn btn-danger"><span class="glyphicon glyphicon-erase"></span></a>
        </td>  
      </tr>
	  		<input type="hidden" id="kode_kegiatan-value-<?php echo $no; ?>" value="<?php echo $data['kode_kegiatan']; ?>">
			<input type="hidden" id="uraian_kegiatan-value-<?php echo $no; ?>" value="<?php echo $data['uraian_kegiatan']; ?>">
			<input type="hidden" id="jenis_kegiatan-value-<?php echo $no; ?>" value="<?php echo $data['jenis_kegiatan']; ?>">
			<input type="hidden" id="nama_ao-value-<?php echo $no; ?>" value="<?php echo $data['nama_ao']; ?>">
			<input type="hidden" id="nama_nasabah-value-<?php echo $no; ?>" value="<?php echo $data['nama_nasabah']; ?>">
			<input type="hidden" id="alamat_nasabah-value-<?php echo $no; ?>" value="<?php echo $data['alamat_nasabah']; ?>">
			<input type="hidden" id="no_tlp_nasabah-value-<?php echo $no; ?>" value="<?php echo $data['no_tlp_nasabah']; ?>">
			<input type="hidden" id="lokasi-value-<?php echo $no; ?>" value="<?php echo $data['lokasi']; ?>">
			<input type="hidden" id="keterangan-value-<?php echo $no; ?>" value="<?php echo $data['keterangan']; ?>">
		<?php
			$no++; // Tambah 1 setiap kali looping
		}
		?>
			

<script>
// Fungsi ini akan dipanggil ketika tombol edit diklik
function edit(no){
	$("#btn-simpan").hide(); // Sembunyikan tombol simpan
	$("#btn-ubah, #checkbox_foto").show(); // Munculkan tombol ubah dan checkbox foto
	
	// Set judul modal dialog menjadi Form Ubah Data
	$("#modal-title").html("Form Ubah data");
	
	var kode_kegiatan = $("#kode_kegiatan-value-" + no).val();
	var uraian_kegiatan = $("#uraian_kegiatan-value-" + no).val();
	var jenis_kegiatan = $("#jenis_kegiatan-value-" + no).val();
	var nama_ao = $("#nama_ao-value-" + no).val();
	var nama_nasabah = $("#nama_nasabah-value-" + no).val();
	var alamat_nasabah = $("#alamat_nasabah-value-" + no).val();
	var no_tlp_nasabah = $("#no_tlp_nasabah-value-" + no).val();
	var lokasi = $("#lokasi-value-" + no).val();
	var keterangan = $("#keterangan-value-" + no).val(); // Ambil alamat dari input type hidden
	// Set value dari textbox nis yang ada di form
	// Set textbox nis menjadi Readonly
	$("#kode_kegiatan").val(kode_kegiatan).attr("readonly","readonly");
	$("#uraian_kegiatan").val(uraian_kegiatan);
	$("#jenis_kegiatan").val(jenis_kegiatan);
	$("#nama_ao").val(nama_ao);
	$("#nama_nasabah").val(nama_nasabah);
	$("#alamat_nasabah").val(alamat_nasabah);
	$("#no_tlp_nasabah").val(no_tlp_nasabah); // Set value dari textbox nama yang ada di form
	$("#lokasi").val(lokasi); // Set value dari textbox nama yang ada di form
	$("#foto").val("");
	$("#keterangan").val(keterangan);
}

// Fungsi ini akan dipanggil ketika tombol hapus diklik
function hapus(no){
	var kode_lappenagihan = $("#kode_kegiatan-value-" + no).val(); // Ambil nis dari input type hidden
	
	// Set textbox hidden nis yang ada di modal dialog hapus
	$("#data-kode_kegiatan").val(kode_lappenagihan);
}
</script>
			
        </table>
      </div>    
        <ul class="pagination">
        <!-- LINK FIRST AND PREV -->
        <?php
        if($page == 1){
        ?>
          <li class="disabled"><a href="#">First</a></li>
          <li class="disabled"><a href="#">&laquo;</a></li>
        <?php
        }else{ 
          $link_prev = ($page > 1)? $page - 1 : 1;
        ?>
          <li><a href="daar.php">First</a></li>
          <li><a href="daar.php?page=<?php echo $link_prev; ?>">&laquo;</a></li>
        <?php
        }
        ?>
        
        <?php
        $sql2 = $pdo->prepare("SELECT COUNT(*) AS jumlah FROM daar");
        $sql2->execute();
        $get_jumlah = $sql2->fetch();
        
        $jumlah_page = ceil($get_jumlah['jumlah'] / $limit); 
        $jumlah_number = 3;
        $start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1;
        $end_number = ($page < ($jumlah_page - $jumlah_number))? $page + $jumlah_number : $jumlah_page; 
        
        for($i = $start_number; $i <= $end_number; $i++){
          $link_active = ($page == $i)? ' class="active"' : '';
        ?>
          <li<?php echo $link_active; ?>><a href="daar.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
        <?php
        }
        ?>
        
        <?php
        
        if($page == $jumlah_page){ 
        ?>
          <li class="disabled"><a href="#">&raquo;</a></li>
          <li class="disabled"><a href="#">Last</a></li>
        <?php
        }else{ 
          $link_next = ($page < $jumlah_page)? $page + 1 : $jumlah_page;
        ?>
          <li><a href="daar.php?page=<?php echo $link_next; ?>">&raquo;</a></li>
          <li><a href="daar.php?page=<?php echo $jumlah_page; ?>">Last</a></li>
        <?php
        }
        ?>
      </ul>
    </div>