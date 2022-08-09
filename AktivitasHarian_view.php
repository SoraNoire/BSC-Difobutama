  <div style="padding: 0 15px;">
      <div class="table-responsive">
        <table class="table table-bordered">
          <tr>
            <th class="text-center">NO</th>
            <th>Tanggal</th>
            <th>Kode Aktivitas</th>
            <th>Aktivitas Harian</th>
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
		
          $sql = $pdo->prepare("SELECT * FROM aktivitas_harian WHERE id_karyawan='$session_id' ORDER BY kode_kegiatan DESC LIMIT ".$limit_start.",".$limit);
          $sql->execute(); // Eksekusi querynya
          
          $no = $limit_start + 1; // Untuk penomoran tabel
          while($data = $sql->fetch()){ // Ambil semua data dari hasil eksekusi $sql
          ?>
        <tr>
		<td class="align-middle text-center"><?php echo $no; ?></td>
        <td class="align-middle"><?php echo $data['tanggal_kegiatan']; ?></td>
        <td class="align-middle"><?php echo $data['kode_kegiatan']; ?></td>
        <td class="align-middle"><?php echo $data['kegiatan']; ?></td>
        <td class="align-middle"><?php echo $data['lokasi_kegiatan']; ?></td>
        <td class="align-middle text-center">
          <img src="imgaktivitasharian/<?php echo $data['foto_kegiatan']; ?>" width="80" height="80">
        </td>
        <td class="align-middle"><?php echo $data['keterangan_kegiatan']; ?></td>
		<td class="align-middle text-center">
          <a href="javascript:void();" data-toggle="modal" data-target="#form-modal" onclick="edit(<?php echo $no; ?>);" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span></a>
        </td>
        <td class="align-middle text-center">
          <a href="javascript:void();" data-toggle="modal" data-target="#delete-modal" onclick="hapus(<?php echo $no; ?>);" class="btn btn-danger"><span class="glyphicon glyphicon-erase"></span></a>
        </td>  
      </tr>
	  		<input type="hidden" id="kode_kegiatan-value-<?php echo $no; ?>" value="<?php echo $data['kode_kegiatan']; ?>">
			<input type="hidden" id="kegiatan-value-<?php echo $no; ?>" value="<?php echo $data['kegiatan']; ?>">
			<input type="hidden" id="lokasi_kegiatan-value-<?php echo $no; ?>" value="<?php echo $data['lokasi_kegiatan']; ?>">
			<input type="hidden" id="keterangan_kegiatan-value-<?php echo $no; ?>" value="<?php echo $data['keterangan_kegiatan']; ?>">
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
	var kegiatan = $("#kegiatan-value-" + no).val();
	var lokasi_kegiatan = $("#lokasi_kegiatan-value-" + no).val();
	var keterangan_kegiatan = $("#keterangan_kegiatan-value-" + no).val(); // Ambil alamat dari input type hidden
	// Set value dari textbox nis yang ada di form
	// Set textbox nis menjadi Readonly
	$("#kode_kegiatan").val(kode_kegiatan).attr("readonly","readonly");
	$("#kegiatan").val(kegiatan); // Set value dari textbox nama yang ada di form
	$("#lokasi_kegiatan").val(lokasi_kegiatan); // Set value dari textbox nama yang ada di form
	$("#foto").val("");
	$("#keterangan_kegiatan").val(keterangan_kegiatan);
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
          <li><a href="AktivitasHarian.php">First</a></li>
          <li><a href="AktivitasHarian.php?page=<?php echo $link_prev; ?>">&laquo;</a></li>
        <?php
        }
        ?>
        
        <?php
        $sql2 = $pdo->prepare("SELECT COUNT(*) AS jumlah FROM aktivitas_harian");
        $sql2->execute();
        $get_jumlah = $sql2->fetch();
        
        $jumlah_page = ceil($get_jumlah['jumlah'] / $limit); 
        $jumlah_number = 3;
        $start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1;
        $end_number = ($page < ($jumlah_page - $jumlah_number))? $page + $jumlah_number : $jumlah_page; 
        
        for($i = $start_number; $i <= $end_number; $i++){
          $link_active = ($page == $i)? ' class="active"' : '';
        ?>
          <li<?php echo $link_active; ?>><a href="AktivitasHarian.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
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
          <li><a href="AktivitasHarian.php?page=<?php echo $link_next; ?>">&raquo;</a></li>
          <li><a href="AktivitasHarian.php?page=<?php echo $jumlah_page; ?>">Last</a></li>
        <?php
        }
        ?>
      </ul>
    </div>