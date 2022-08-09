$(document).ready(function(){
	// Sembunyikan loading simpan, loading ubah, loading hapus, pesan error, pesan sukes, dan tombol reset
	$("#loading-simpan, #loading-ubah, #loading-hapus, #pesan-error, #pesan-sukses, #btn-reset").hide();
	
	$("#btn-tambah").click(function(){ // Ketika tombol tambah diklik
		$("#btn-ubah").hide(); // Sembunyikan tombol ubah dan checkbox foto
		$("#btn-simpan").show(); // Munculkan tombol simpan
		
		// Set judul modal dialog menjadi Form Simpan Data
		$("#modal-title").html("Form Simpan data");
	});
	
	$("#btn-simpan").click(function(){ // Ketika tombol simpan di klik
		// Buat variabel data untuk menampung data hasil input dari form
		var data = new FormData();
		
		data.append('kodesp', $("#kodesp").val());
		data.append('tanggalmulai', $("#tanggalmulai").val());
		data.append('tanggalselesai', $("#tanggalselesai").val()); // Ambil data nis
		data.append('lokasi_pelaksanaan', $("#lokasi_pelaksanaan").val()); // Ambil data nama
		data.append('ao_pelaksana1', $("#ao_pelaksana1").val()); // Ambil data nama
		data.append('ao_pelaksana2', $("#ao_pelaksana2").val()); // Ambil data nama
		data.append('ao_pelaksana3', $("#ao_pelaksana3").val()); // Ambil data nama
		data.append('ao_pelaksana4', $("#ao_pelaksana4").val()); // Ambil data nama
		data.append('ao_pelaksana5', $("#ao_pelaksana5").val()); // Ambil data jenis kelamin
		data.append('metode_pemasaran', $("#metode_pemasaran").val()); // Ambil data telepon
		data.append('target_pemasaran', $("#target_pemasaran").val()); // Ambil data telepon
		data.append('keterangan', $("#keterangan").val()); // Ambil data alamat

		
		$("#loading-simpan").show(); // Munculkan loading simpan
		
		$.ajax({
			url: 'salesplanBM_proses_simpan.php', // File tujuan
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
		
		data.append('kodesp', $("#kodesp").val());
		data.append('tanggalmulai', $("#tanggalmulai").val());
		data.append('tanggalselesai', $("#tanggalselesai").val()); // Ambil data nis
		data.append('lokasi_pelaksanaan', $("#lokasi_pelaksanaan").val()); // Ambil data nama
		data.append('ao_pelaksana1', $("#ao_pelaksana1").val()); // Ambil data nama
		data.append('ao_pelaksana2', $("#ao_pelaksana2").val()); // Ambil data nama
		data.append('ao_pelaksana3', $("#ao_pelaksana3").val()); // Ambil data nama
		data.append('ao_pelaksana4', $("#ao_pelaksana4").val()); // Ambil data nama
		data.append('ao_pelaksana5', $("#ao_pelaksana5").val()); // Ambil data jenis kelamin
		data.append('metode_pemasaran', $("#metode_pemasaran").val()); // Ambil data telepon
		data.append('target_pemasaran', $("#target_pemasaran").val()); // Ambil data telepon
		data.append('keterangan', $("#keterangan").val()); // Ambil data alamat
		
		$("#loading-ubah").show(); // Munculkan loading ubah
		
		$.ajax({
			url: 'salesplanBM_proses_ubah.php', // File tujuan
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
					$("#viewsp").html(response.html);
					
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
		data.append('kodesp', $("#data-kodesp").val()); // Ambil data nis
		
		$("#loading-hapus").show(); // Munculkan loading hapus
		
		$.ajax({
			url: 'salesplanBM_proses_hapus.php', // File tujuan
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
		$("#kodesp").removeAttr('readonly'); // Enable textbox nis
	});
});