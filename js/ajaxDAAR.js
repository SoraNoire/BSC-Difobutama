$(document).ready(function(){
	// Sembunyikan loading simpan, loading ubah, loading hapus, pesan error, pesan sukes, dan tombol reset
	$("#loading-simpan, #loading-ubah, #loading-hapus, #pesan-error, #pesan-sukses, #btn-reset").hide();
	
	$("#btn-tambah").click(function(){ // Ketika tombol tambah diklik
		$("#btn-ubah, #checkbox_foto").hide(); // Sembunyikan tombol ubah dan checkbox foto
		$("#btn-simpan").show(); // Munculkan tombol simpan
		
		// Set judul modal dialog menjadi Form Simpan Data
		$("#modal-title").html("Form Simpan data");
	});
	
	$("#btn-simpan").click(function(){ // Ketika tombol simpan di klik
		// Buat variabel data untuk menampung data hasil input dari form
		var data = new FormData();
		
		data.append('kode_kegiatan', $("#kode_kegiatan").val());
		data.append('uraian_kegiatan', $("#uraian_kegiatan").val());
		data.append('jenis_kegiatan', $("#jenis_kegiatan").val());
		data.append('nama_ao', $("#nama_ao").val());
		data.append('nama_nasabah', $("#nama_nasabah").val());
		data.append('alamat_nasabah', $("#alamat_nasabah").val());
		data.append('no_tlp_nasabah', $("#no_tlp_nasabah").val());
		data.append('lokasi', $("#lokasi").val()); 
		data.append('keterangan', $("#keterangan").val()); 
		
		// Ambil data foto yang dipilih pada form, dan masukkan ke variabel data
		data.append('foto', $("#foto")[0].files[0]);
		
		$("#loading-simpan").show(); // Munculkan loading simpan
		
		$.ajax({
			url: 'daar_proses_simpan.php', // File tujuan
			type: 'POST', // Tentukan type nya POST atau GET
			data: data, // Set data yang akan dikirim
			processData: false,
			contentType: false,
			dataType: "json",
			beforeSend: function(e) {
				if(e && e.overrideMimeType) {
					e.overrideMimeType("application/json;charset=UTF-8");
				}
			},
			success: function(response){ // Ketika proses pengiriman berhasil
				$("#loading-simpan").hide(); // Sembunyikan loading simpan
				
				if(response.status == "sukses"){ // Jika Statusnya = sukses
					// Ganti isi dari div view dengan view yang diambil dari proses_simpan.php
					$("#view").html(response.html);
					
					/*
					 * Ambil pesan suksesnya dan set ke div pesan-sukses
					 * Lalu munculkan div pesan-sukes nya
					 * Setelah 10 detik, sembunyikan kembali pesan suksesnya
					 */
					$("#pesan-sukses").html(response.pesan).fadeIn().delay(10000).fadeOut();
					
					$("#form input, #form select").val(""); // Untuk meng-clear isian pada form
					$("#form-modal").modal('hide'); // Close / Tutup Modal Dialog
				}else{ // Jika statusnya = gagal
					/*
					 * Ambil pesan errornya dan set ke div pesan-error
					 * Lalu munculkan div pesan-error nya
					 */
					$("#pesan-error").html(response.pesan).show();
				}
			},
			error: function (xhr, ajaxOptions, thrownError) { // Ketika terjadi error
				alert(xhr.responseText); // munculkan alert
			}
		});
	});
	
	$("#btn-ubah").click(function(){ // Ketika tombol ubah di klik
		// Buat variabel data untuk menampung data hasil input dari form
		
		var data = new FormData();
		
		data.append('kode_kegiatan', $("#kode_kegiatan").val());
		data.append('uraian_kegiatan', $("#uraian_kegiatan").val());
		data.append('jenis_kegiatan', $("#jenis_kegiatan").val());
		data.append('nama_ao', $("#nama_ao").val());
		data.append('nama_nasabah', $("#nama_nasabah").val());
		data.append('alamat_nasabah', $("#alamat_nasabah").val());
		data.append('no_tlp_nasabah', $("#no_tlp_nasabah").val());
		data.append('lokasi', $("#lokasi").val()); 
		data.append('keterangan', $("#keterangan").val()); 
		
		// Cek apakah checkbox ubah foto di ceklis
		if($("#ubah_foto").is(":checked")) // Jika di ceklis
			data.append('ubah_foto', $("#ubah_foto").val()); // Ambil data ubah foto (dari checkbox foto)
		
		// Ambil data foto yang dipilih pada form, dan masukkan ke variabel data
		data.append('foto', $("#foto")[0].files[0]);
		
		$("#loading-ubah").show(); // Munculkan loading ubah
		
		$.ajax({
			url: 'daar_proses_ubah.php', // File tujuan
			type: 'POST', // Tentukan type nya POST atau GET
			data: data, // Set data yang akan dikirim
			processData: false,
			contentType: false,
			dataType: "json",
			beforeSend: function(e) {
				if(e && e.overrideMimeType) {
					e.overrideMimeType("application/json;charset=UTF-8");
				}
			},
			success: function(response){ // Ketika proses pengiriman berhasil
				$("#loading-ubah").hide(); // Sembunyikan loading ubah
				
				if(response.status == "sukses"){ // Jika Statusnya = sukses
					// Ganti isi dari div view dengan view yang diambil dari proses_ubah.php
					$("#view").html(response.html);
					
					/*
					 * Ambil pesan suksesnya dan set ke div pesan-sukses
					 * Lalu munculkan div pesan-sukes nya
					 * Setelah 10 detik, sembunyikan kembali pesan suksesnya
					 */
					$("#pesan-sukses").html(response.pesan).fadeIn().delay(10000).fadeOut();
					
					$("#form input, #form select").val(""); // Untuk meng-clear isian pada form
					$("#form-modal").modal('hide'); // Close / Tutup Modal Dialog
				}else{ // Jika statusnya = gagal
					/*
					 * Ambil pesan errornya dan set ke div pesan-error
					 * Lalu munculkan div pesan-error nya
					 */
					$("#pesan-error").html(response.pesan).show();
				}
			},
			error: function (xhr, ajaxOptions, thrownError) { // Ketika terjadi error
				alert(xhr.responseText); // Munculkan alert
			}
		});
	});
	
	$("#btn-hapus").click(function(){ // Ketika tombol hapus di klik
		// Buat variabel data untuk menampung data hasil input dari form
		var data = new FormData();
		data.append('kode_kegiatan', $("#data-kode_kegiatan").val()); // Ambil data nis
		
		$("#loading-hapus").show(); // Munculkan loading hapus
		
		$.ajax({
			url: 'daar_proses_hapus.php', // File tujuan
			type: 'POST', // Tentukan type nya POST atau GET
			data: data, // Set data yang akan dikirim
			processData: false,
			contentType: false,
			dataType: "json",
			beforeSend: function(e) {
				if(e && e.overrideMimeType) {
					e.overrideMimeType("application/json;charset=UTF-8");
				}
			},
			success: function(response){ // Ketika proses pengiriman berhasil
				$("#loading-hapus").hide(); // Sembunyikan loading hapus
				
				// Ganti isi dari div view dengan view yang diambil dari proses_hapus.php
				$("#view").html(response.html);
				
				/*
				 * Ambil pesan suksesnya dan set ke div pesan-sukses
				 * Lalu munculkan div pesan-sukes nya
				 * Setelah 10 detik, sembunyikan kembali pesan suksesnya
				 */
				$("#pesan-sukses").html(response.pesan).fadeIn().delay(10000).fadeOut();
				
				$("#delete-modal").modal('hide'); // Close / Tutup Modal Dialog
			},
			error: function (xhr, ajaxOptions, thrownError) { // Ketika terjadi error
				alert("ERROR : "+xhr.responseText); // Munculkan alert
			}
		});
	});
	
	$('#form-modal').on('hidden.bs.modal', function (e){ // Ketika Modal Dialog di Close / tertutup
		$("#btn-reset").click(); // Klik tombol reset agar form kembali bersih
		$("#kode_kegiatan").removeAttr('readonly'); // Enable textbox nis
	});
});
