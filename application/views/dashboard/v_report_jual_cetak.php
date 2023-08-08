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

        <h5 id="judul"><b>Laporan Penjualan</b></h5> <br>
        <br>
        <div class="table-responsive">
         <table class="table table-bordered">
           <thead>
            <tr>
            <th>No</th>
             <th width="50%" id="judul">Judul buku</th>
             <th width="20%" id="judul">Pcs Terjual</th>
             <th width="20%" id="judul">Tanggal Penjualan</th>
             <th width="20%" id="judul">Keterangan</th>
             <th width="20%" id="judul">Jumlah Pendapatan</th>
           </tr>
         </thead>
         <tbody>
           <?php
           $grandtotal=0;
           $total=0;
            $no=1;
           foreach($jual as $p){ 
            $jumlah = $p->jual_jumlah;
            $total+=$jumlah;
            ?>
            <tr>
              <td><?php echo $no++; ?></td>
             <td><?php echo $p->buku_nama; ?></td>
             <td><?php echo $p->jual_berat; ?></td>
             <td><?php echo date('d-M-Y', strtotime($p->jual_tgl)); ?></td>
             <td><?php echo $p->jual_ket; ?></td>
             <td>Rp <?php echo number_format($p->jual_jumlah, 0,'.','.') ?></td>
                
           </tr>
         <?php }?>
         <?php 
         $grandtotal+=$total;
         ?>
         <tr>
          <td  id="judul" colspan="5">Total Pendapatan </td>
          <td >Rp <?php echo number_format($grandtotal, 0,'.','.') ?></td>
        </tr>

      </tbody>
    </table>
   
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