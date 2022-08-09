  <div style="padding: 0 15px;">
      <div class="table-responsive">
        <table class="table table-bordered">
          <tr>
            <th class="text-center">NO</th>
            <th>Tanggal</th>
            <th>Kode D.S.A.R</th>
            <th>Uraian D.S.A.R</th>
            <th>Nama Nasabah</th>
            <th>No Telepon</th>
            <th>Alamat Nasabah</th>
            <th>Lokasi</th>
            <th>Foto</th>
            <th>Keterangan</th>
			<th colspan="2" class="text-center"><span class="glyphicon glyphicon-cog"></span></th>
          </tr>
          <?php
          // Include / load file koneksi.php
          include "dbcon.php";
          
          // Cek apakah terdapat data page pada URL
          $page = (isset($_GET['page']))? $_GET['page'] : 1;
          
          $limit = 5; // Jumlah data per halamannya
          
          // Untuk menentukan dari data ke berapa yang akan ditampilkan pada tabel yang ada di database
          $limit_start = ($page - 1) * $limit;
          $pdo = new PDO('mysql:host='.'localhost'.';dbname='.'dmballan_ballancescorecard','dmballan','SR@DM-bsc$123');
          // Buat query untuk menampilkan data siswa sesuai limit yang ditentukan
          $sql = $pdo->prepare("SELECT * FROM sales_plan WHERE id_ao='$session_id' ORDER BY tanggal_sp DESC, jam_sp DESC LIMIT ".$limit_start.",".$limit);
          $sql->execute(); // Eksekusi querynya
          
          $no = $limit_start + 1; // Untuk penomoran tabel
          while($data = $sql->fetch()){ // Ambil semua data dari hasil eksekusi $sql
          ?>
            <tr>
              <td class="align-middle text-center"><?php echo $no; ?></td>
              <td class="align-middle"><?php echo $data['tanggal_sp']; ?></td>
              <td class="align-middle"><?php echo $data['kode_sp']; ?></td>
              <td class="align-middle"><?php echo $data['uraian_aktivitas']; ?></td>
              <td class="align-middle"><?php echo $data['nama_nasabah']; ?></td>
              <td class="align-middle"><?php echo $data['no_tlp_nasabah']; ?></td>
              <td class="align-middle"><?php echo $data['alamat_nasabah']; ?></td>
              <td class="align-middle"><?php echo $data['lokasi_sp']; ?></td>
              <td class="align-middle text-center">
              <img src="imgsalesplan/<?php echo $data['foto_sp']; ?>" width="80" height="80">
              </td>
              <td class="align-middle"><?php echo $data['keterangan']; ?></td>
		      <td class="align-middle text-center">
              <a href="javascript:void();" data-toggle="modal" data-target="#form-modal" onclick="edit(<?php echo $no; ?>);" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span></a>
              </td>
              <td class="align-middle text-center">
              <a href="javascript:void();" data-toggle="modal" data-target="#delete-modal" onclick="hapus(<?php echo $no; ?>);" class="btn btn-danger"><span class="glyphicon glyphicon-erase"></span></a>
              </td>
              </tr>	
			
<input type="hidden" id="kode_sp-value-<?php echo $no; ?>" value="<?php echo $data['kode_sp']; ?>">
<input type="hidden" id="uraian_aktivitas-value-<?php echo $no; ?>" value="<?php echo $data['uraian_aktivitas']; ?>">
<input type="hidden" id="nama_nasabah-value-<?php echo $no; ?>" value="<?php echo $data['nama_nasabah']; ?>">
<input type="hidden" id="no_tlp_nasabah-value-<?php echo $no; ?>" value="<?php echo $data['no_tlp_nasabah']; ?>">
<input type="hidden" id="alamat_nasabah-value-<?php echo $no; ?>" value="<?php echo $data['alamat_nasabah']; ?>">
<input type="hidden" id="lokasi_sp-value-<?php echo $no; ?>" value="<?php echo $data['lokasi_sp']; ?>">
<input type="hidden" id="keterangan-value-<?php echo $no; ?>" value="<?php echo $data['keterangan']; ?>">
          <?php
            $no++;
          }
          ?>
			
<script>
function edit(no){
	$("#btn-simpan").hide();
	$("#btn-ubah, #checkbox_foto").show();
	
	$("#modal-title").html("Form Ubah data");
	
	var kode_sp = $("#kode_sp-value-" + no).val();
	var uraian_aktivitas = $("#uraian_aktivitas-value-" + no).val();
	var nama_nasabah = $("#nama_nasabah-value-" + no).val();
	var no_tlp_nasabah = $("#no_tlp_nasabah-value-" + no).val();
	var alamat_nasabah = $("#alamat_nasabah-value-" + no).val();
	var lokasi_sp = $("#lokasi_sp-value-" + no).val();
	var keterangan = $("#keterangan-value-" + no).val();
	
	$("#kode_sp").val(kode_sp).attr("readonly","readonly");
	$("#uraian_aktivitas").val(uraian_aktivitas);
	$("#nama_nasabah").val(nama_nasabah); 
	$("#no_tlp_nasabah").val(no_tlp_nasabah);
	$("#alamat_nasabah").val(alamat_nasabah);
	$("#lokasi_sp").val(lokasi_sp); 
	$("#foto").val("");
	$("#keterangan").val(keterangan);
}

function hapus(no){
	var kode_sp = $("#kode_sp-value-" + no).val();
	
	$("#data-kode_sp").val(kode_sp);
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
          <li><a href="salesplan.php">First</a></li>
          <li><a href="salesplan.php?page=<?php echo $link_prev; ?>">&laquo;</a></li>
        <?php
        }
        ?>
        
        <?php
        $sql2 = $pdo->prepare("SELECT COUNT(*) AS jumlah FROM sales_plan");
        $sql2->execute();
        $get_jumlah = $sql2->fetch();
        
        $jumlah_page = ceil($get_jumlah['jumlah'] / $limit); 
        $jumlah_number = 3;
        $start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1;
        $end_number = ($page < ($jumlah_page - $jumlah_number))? $page + $jumlah_number : $jumlah_page; 
        
        for($i = $start_number; $i <= $end_number; $i++){
          $link_active = ($page == $i)? ' class="active"' : '';
        ?>
          <li<?php echo $link_active; ?>><a href="salesplan.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
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
          <li><a href="salesplan.php?page=<?php echo $link_next; ?>">&raquo;</a></li>
          <li><a href="salesplan.php?page=<?php echo $jumlah_page; ?>">Last</a></li>
        <?php
        }
        ?>
      </ul>
    </div>