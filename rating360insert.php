<?php
include_once('dbcon.php');
include_once('session.php');
//data survey berdasarkan Pelaksana Survey.
$targetsurvey = $_POST['nama'];
$rating		  = $_POST['rating'];
$komentar	  = $_POST['komentar'];
//query dan array untuk pelaksana survey.
$result=mysqli_query($con, "select * from central_data where nik='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);
//data Pelaksana Survey.
$id_ps         = $row['nik'];
$lvl_ps        = $row['level'];
$nama_ps       = $row['nama_karyawan'];
$jabatan_ps    = $row['jabatan'];
$kantor_ps     = $row['kantor'];
$penempatan_ps = $row['penempatan'];

//query dan array untuk target survey
$result_ts=mysqli_query($con,"SELECT * FROM central_data WHERE nama_karyawan='$targetsurvey'")or die ('Error In Session');
$row_ts=mysqli_fetch_array($result_ts);
//data target survey
$id_ts         = $row_ts['nik'];
$lvl_ts        = $row_ts['level'];
$nama_ts       = $targetsurvey;
$jabatan_ts    = $row_ts['jabatan'];
$kantor_ts     = $row_ts['kantor'];
$penempatan_ts = $row_ts['penempatan'];
//time record & status
$tanggal = date("y-m-d");
$jam     = date("h:i:sa");
$status  = 'rated';

//auto generate kode
$kodesurvey =mysqli_query($con, "select max(kode_survey360) from rating360");
$kodesekarang = mysqli_fetch_row($kodesurvey);
$ambilkode = $kodesekarang[0];
$kodesurveysekarang = $ambilkode + 1;


if(($targetsurvey && $rating && $komentar)){
	$cek = mysqli_num_rows(mysqli_query($con,"SELECT * FROM rating360 WHERE id_ps='$id_ps' and id_ts='$id_ts'"));
    if ($cek > 0){
	include("rating360pesandouble.php");
    }else{
	$insert = mysqli_query($con,"INSERT INTO rating360 VALUES('$kodesurveysekarang', '$id_ps', '$lvl_ps','$nama_ps','$jabatan_ps','$kantor_ps','$penempatan_ps','$id_ts','$lvl_ts','$nama_ts','$jabatan_ts','$kantor_ts','$penempatan_ts','$tanggal','$jam','$rating','$komentar','$status')");
	if($insert){
	    include("rating360pesansukses.php");
	}else{
		header("location:rating360pesanfailed.php");
	     }
	}
}else{
		header("location:rating360pesanfailed.php");
     }
?>

