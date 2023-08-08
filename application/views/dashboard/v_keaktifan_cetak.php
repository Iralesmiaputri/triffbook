<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" href="<?=base_url()?>img/kota.png">
  <title>Laporan</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  
  <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<style>
  #judul{
    text-align:center;
  }
  #right {
    text-align:right;
  }
  #left {
    text-align:left;
  }

  #halaman{
    width: auto; 
    height: auto; 
    position: absolute; 
    border: 0px solid; 
    padding-top: 20px; 
    padding-left: 30px; 
    padding-right: 30px; 
    padding-bottom: 80px;
  }
  #halaman2{
    width: auto; 
    height: auto; 
    position: absolute; 
    border: 0px solid; 
    padding-top: 0px; 
    padding-left: 0px;  
  }
#head{
    width: auto; 
    height: auto; 
    
    border: 0px solid; 
    padding-top: 20px; 
    padding-left: 1000px; 
    padding-right: 0px; 
    padding-bottom: 80px;
  }
</style>

<body onload="script:window.print()">
  <div class="content-wrapper">
   <section class="content-header">

   </section>
   <section class="content">
    <div class="row">
     <div class="col-lg-12">

      <div class="box box-primary">
       <div class="box-header">

       </div>
       <div class="box-body">

     <table style="width: 100%;">
            <tr>
                <td > <img src="<?php echo base_url(); ?>assets/dist/img/jamkrida2.png" height="100"></td>
                <td id="left"><p><h3><b>TriffBook</b></h3><br/> <h5>Amuntai Tengah, Jalan Kebun sari, RT 11 NO 9 Kec. Amuntai tengah, Kabupaten Hulu Sungai Utara Kalimantan selatan Kode pos 71414 </h5></p></td>
                
            </tr>
        </table>
        <hr style="height:1px; width:100%; border-width:4; color:black; background-color:black">

        <h5 id="judul"><b>Laporan Pembelian Buku Dari Pelanggan</b> </h5> <br>

        <br>
        <div class="table-responsive">
         <table class="table table-bordered">
           <thead>
            <tr>
             <th width="5%" id="judul">No</th>
             <th width="40%" id="judul">Nama</th>
             <th width="10%" id="judul">Total Menjual</th>
             <th width="10%" id="judul">Intensitas Menjual</th>
             <th width="40%" id="judul">Jumlah / Tanggal Setoran Terakhir</th>
           </tr>
         </thead>
         <tbody>
          <?php
           $no = 1;

           foreach($aktif as $p){
            ?>
            <tr>
            <td id="judul"><?php echo $no++; ?></td>
             <td id="judul"><?php echo $p->pengguna_nama; ?></td>
             <td id="judul"><?php echo $p->jumlah; ?> Buku</td>
             <td id="judul"><?php echo $p->jumlah2; ?> Kali</td>
              <td id="judul"><?php echo $p->riwayat_setor; ?> Buku / <?php echo date('d-M-Y', strtotime($p->riwayat_tgl)); ?></td>
                  
           </tr>
         <?php } ?>
         

      </tbody>
    </table>
  </div>
   
      <div style="width: 35%; text-align: left; float: right;">Banjarmasin,<span id="tanggalwaktu"></span></div><br>
    <div style="width: 45%; text-align: center; float: right;">Triffbook</div><br><br><br><br><br>
    <div style="width: 45%; text-align: center; float: right;">Admin<b><u></u></b></div><br>
        <script>
          var tw = new Date();
          if (tw.getTimezoneOffset() == 0) (a=tw.getTime() + ( 7 *60*60*1000))
            else (a=tw.getTime());
          tw.setTime(a);
          var tahun= tw.getFullYear ();
          var hari= tw.getDay ();
          var bulan= tw.getMonth ();
          var tanggal= tw.getDate ();
          var bulanarray=new Array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","Nopember","Desember");
          document.getElementById("tanggalwaktu").innerHTML =" "+tanggal+" "+bulanarray[bulan]+" "+tahun;
        </script>
  </div>
</div>
</div>
</div>
</div>
</section>
</div>
</div>