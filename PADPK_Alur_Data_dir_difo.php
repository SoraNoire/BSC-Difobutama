<!doctype html>
<?php function rupiah($angka){
	
	$hasil_rupiah = "Rp.   " . number_format($angka,2,',','.');
	return $hasil_rupiah;
 
}
?>
<html>
<link>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap-3.3.7.css" rel="stylesheet" type="text/css">
<link href="css/animate.css" rel="stylesheet" type="text/css">
<head>
</head>
	<body>
		<H1 align="center" style="font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif';color: rgba(16,35,247,1.00)" class="animated jackInTheBox">Monitoring Pengajuan Kredit Berjalan</H1>
<div class="container" style="font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif';background: rgba(255,252,252,1.00);position: relative;width: 100%">
<table class="table table-bordered">
  <tr>
	<th style='text-align: center' width="auto" class="animated rollIn">No</th>
	<th style='text-align: center' width="auto" class="animated rollIn">Kode Pengajuan</th>
	<th style='text-align: center' width="auto" class="animated rollIn">Nama Nasabah</th>
	<th style='text-align: center' width="auto" class="animated rollIn">Nama A.O</th>
	<th style='text-align: center' width="auto" class="animated rollIn">Plafond Akhir</th>
	<th style='text-align: center' width="auto" class="animated rollIn">Surveyor</th>
    <th style='text-align: center' width="auto" class="animated rollIn">P.BM</th>
    <th style='text-align: center' width="auto" class="animated rollIn">P.KA</th>
    <th style='text-align: center' width="auto" class="animated rollIn">SURV</th>
    <th style='text-align: center' width="auto" class="animated rollIn">Acc.A</th>
    <th style='text-align: center' width="auto" class="animated rollIn">Acc.KA</th>
    <th style='text-align: center' width="auto" class="animated rollIn">AccDir</th>
    <th style='text-align: center' width="auto" class="animated rollIn">Revised</th>
    <th style='text-align: center' width="auto" class="animated rollIn">Reject</th>
    <th style='text-align: center' width="auto" class="animated rollIn">Detail</th>
  <?php
  include "dbcon.php";
  $kantor="Difobutama";

	  
  $bulan= date('m');	
  $tahun= date('Y');
  $no=1;
  $jumlahSP= "SELECT * from permohonan_analisa_kredit WHERE kantor_pemohon='$kantor' ORDER BY tanggal_input DESC, jam_input DESC"; 
  $sql = mysqli_query($con, $jumlahSP);
  while($data = mysqli_fetch_array($sql)){
	$status=$data['status'];
	if ($status=="BMproses"){
	$check1 = "checked" ; 
	$check2 = "" ;
	$check3 = "" ;
	$check4 = "" ;
	$check5 = "" ;
	$check6 = "" ;
	$check7 = "" ;
	$check8 = "" ;
	}elseif($status=="KAKproses" or $status=="KAKproses2"){
	$check1 = "checked";
	$check2 = "checked";
	$check3 = "";
	$check4 = "";
	$check5 = "";
	$check6 = "";
	$check7 = "";
	$check8 = "";
	}elseif($status=="AKproses" or $status=="AKproses2"){
	$check1 = "checked";
	$check2 = "checked";
	$check3 = "checked";
	$check4 = "";
	$check5 = "";
	$check6 = "";
	$check7 = "";
	$check8 = "";
	}elseif($status=="acc"){
	$check1 = "checked";
	$check2 = "checked";
	$check3 = "checked";
	$check4 = "checked";
	$check5 = "";
	$check6 = "";
	$check7 = "";
	$check8 = "";
	}elseif($status=="acc2"){
	$check1 = "checked";
	$check2 = "checked";
	$check3 = "checked";
	$check4 = "checked";
	$check5 = "checked";
	$check6 = "";
	$check7 = "";
	$check8 = "";
	}elseif($status=="acc3"){
	$check1 = "checked";
	$check2 = "checked";
	$check3 = "checked";
	$check4 = "checked";
	$check5 = "checked";
	$check6 = "checked";
	$check7 = "";
	$check8 = "";
	}elseif($status=="revised"){
	$check1 = "";
	$check2 = "";
	$check3 = "";
	$check4 = "";
	$check5 = "";
	$check6 = "";
	$check7 = "checked";
	$check8 = "";
	}elseif($status=="rejected"){
	$check1 = "";
	$check2 = "";
	$check3 = "";
	$check4 = "";
	$check5 = "";
	$check6 = "";
	$check7 = "";
	$check8 = "checked";
	}else{
	$check1 = "";
	$check2 = "";
	$check3 = "";
	$check4 = "";
	$check5 = "";
	$check6 = "";
	$check7 = "";
	$check8 = "";}
    echo "<tr>";
	echo "<td class='animated rollIn'>".$no."</td>";
	echo "<td class='animated rollIn'>".$data['kode_permintaan']."</td>";
	echo "<td class='animated rollIn'>".$data['nama_nasabah']."</td>";
	echo "<td class='animated rollIn'>".$data['nama_ao']."</td>";
	echo "<td class='animated rollIn'>".rupiah($data['plafond'])."</td>";
	echo "<td class='animated rollIn'>".$data['nama_analis']."</td>";
	echo "<td style='text-align: center'><input type='checkbox' ".$check1." readonly >";"</td>";
	echo "<td style='text-align: center'><input type='checkbox' ".$check2." >";"</td>";
	echo "<td style='text-align: center'><input type='checkbox' ".$check3." >";"</td>";
	echo "<td style='text-align: center'><input type='checkbox' ".$check4." >";"</td>";
	echo "<td style='text-align: center'><input type='checkbox' ".$check5." >";"</td>";
	echo "<td style='text-align: center'><input type='checkbox' ".$check6." >";"</td>";
	echo "<td style='text-align: center'><input type='checkbox' ".$check7." >";"</td>";
	echo "<td style='text-align: center'><input type='checkbox' ".$check8." >";"</td>";	
    echo "<td align='center'><a href='#' type='button' class='view-record' data-id='".$data['kode_permintaan']."'><span class='glyphicon glyphicon-eye-open'></span></a></td>";
	echo "</tr>";
	$no++;
	  }
  ?>
  </table>
<div class="container" style="width: auto">
 
	<!-- Modal -->
	<div id="myModal1" class="modal fade" role="dialog" style="width: auto">
		<div class="modal-dialog" style="width: auto">
			<!-- konten modal-->
			<div class="modal-content">
				<!-- heading modal -->
<div class="modal-header" style="background-color: darkgray"s>
	<button type="button" class="close" data-dismiss="modal">&times;</button>
	<h4 class="modal-title" ><center><h3 style="color:cyan"><b>History Pengajuan Kredit</b></h3></center></h4>
</div>
				<!-- body modal -->
<div class="modal-body">
</div>
<!-- footer modal -->
<div class="modal-footer">
	
</div>
			</div>
		</div>
	</div>
</div>
<script>
        $(function(){
            $(document).on('click','.view-record',function(e){
                e.preventDefault();
                $("#myModal1").modal('show');
                $.post('PADPK_Alur_Data_VR.php',
                    {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
    </script>	
</div>
</body>
</html>