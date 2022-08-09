<?php
include('dbcon.php');
include_once('session.php');
//data terkirim
$no_surat 			= $_POST['no_surat'];
$tanggal_berlaku	= $_POST['tanggal_berlaku'];
$jenis 		  		= $_POST['jenis'];
$uraian	 			= $_POST['uraian'];
//tanggal hari ini
date_default_timezone_set('asia/jakarta');
$tanggal = date("Y-m-d");
$result=mysqli_query($con, "select * from central_data where nik='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);
$kantor		= $row['kantor'];
$nama 		= $row['nama_karyawan'];
$jabatan 	= $row['jabatan'];
//file save
$target_dir = "FileNews/".$kantor."/";
$temp = explode(".", $_FILES["fileToUpload"]["name"]);
$nama_baru = round(microtime(true)) . '.' . end($temp);
$target_file = $target_dir . $nama_baru;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) { 
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 8388608) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" && $imageFileType != "pdf" ) {
    echo "Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	$cek = mysqli_num_rows(mysqli_query($con,"SELECT * FROM news WHERE no_surat='$no_surat'"));
    if ($cek > 0){
	    ?><script language="JavaScript">
				alert('DATA DUPLIKASI TERDETEKSI!');
				document.location='HRDarea_News.php';
			</script><?php
    }else{
	$insert = mysqli_query($con,"INSERT INTO news VALUES('$no_surat','$jenis','	$uraian','$nama_baru','$kantor','$tanggal','$nama','$jabatan','$tanggal_berlaku')");
	if($insert){
		 ?><script language="JavaScript">
				alert('Data Berhasil Disimpan!');
				document.location='HRDarea_News.php';
		  </script><?php
	}else{	
	    ?><script language="JavaScript">
				alert('Terjadi Kesalahan Sambungan Periksa Koneksi Anda!');
				document.location='HRDarea_News.php';
		  </script><?php	
	     }
	   }
     }else{
	    ?><script language="JavaScript">
				alert('Terjadi Kesalahan Sambungan Periksa Koneksi Anda!');
				document.location='HRDarea_News.php';
			</script><?php	
     }
}
?>