<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" href="<?=base_url()?>img/kota.png">
  <title>struk</title>
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
        width: 58mm;
        min-height: 297mm;
        margin: 10mm auto;
        border: 1px #D3D3D3 solid;
        border-radius: 5px;
        background: white;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);  
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
  @media print {
    
  #printPageButton {
    display: none;
  }
}
</style>
<body onload="script:window.print()" id="halaman2">
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
       <a id="printPageButton" href="<?php echo base_url().'dashboard/jual'; ?>" class="btn
               btn-sm btn-primary">Kembali</a>
      <table id="judul"style="width: 100%;">
            <tr>
                <td> <img src="<?php echo base_url(); ?>assets/dist/img/jamkrida2.png" height="60"></td>
                </tr><tr>
                <td id="judul"><h4><b>TriffBook</b></h4><br/><h6>Amuntai Tengah, Jalan Kebun sari, RT 11 NO 9 Kec. Amuntai tengah, Kabupaten Hulu Sungai Utara Kalimantan selatan Kode pos 71414 </h6></td>
            </tr>
        </table>
        <hr style="height:1px; width:100%; border-width:4; color:black; background-color:black">

        <h5 id="judul"><b>Struk Belanja</b></h5>
        <?php foreach($nota as $p){  ?>
        <h5 id="judul"><b>Nota Ke - <?php echo $p->no_nota; ?> Hari Ini</b></h5>
        <h5 id="judul"><b>Kode Nota : J<?php echo $p->id; ?></b></h5>
        <?php } ?>
        <br>
        <div class="table-responsive">
                                 <table class="table">
                                    <tr>
                                        <td>Judul Buku</td>
                                        <td>Pcs</td>
                                        <td>Harga</td>
                                    </tr>
                                    <?php
                                    $grandtotal=0;
                                    $total=0;
                                   
                                    foreach($jual as $p){ 
                                        $jumlah = $p->jual_jumlah;
                                        $total+=$jumlah;
                                        ?>
                                       <tr>
                                       <td><?php echo $p->buku_nama; ?></td>
                                       <td><?php echo $p->jual_berat; ?></td>
                                       <td>Rp <?php echo number_format($p->jual_jumlah, 0,'.','.') ?></td>
                                      
                                       </tr>
                                       <?php }?>
                                        <?php 
                                        $grandtotal+=$total;
                                        ?>
                                        <tr>
                                        <td  id="judul"  colspan="2">Total</td>
                                        <td id="left" colspan="2" >Rp <?php echo number_format($grandtotal, 0,'.','.') ?></td>
                                       </tr>
                                       <?php foreach($nota as $p){  ?>
                                        <tr>
                                        <td  id="judul"  colspan="2">Pembayaran</td>
                                        <td id="left" colspan="2" >Rp <?php echo number_format($p->jumlah_bayar, 0,'.','.') ?></td>
                                        </tr>
                                        <tr>
                                        <td  id="judul"  colspan="2">Kembalian</td>
                                        <td id="left" colspan="2" >Rp <?php echo number_format($p->kembalian, 0,'.','.') ?></td>
                                       </tr>
                                      <?php } ?>
                                    </tbody>
                                 </table>
                          
    <div style="width: 35%; text-align: left; float: left;">Banjarmasin,<span id="tanggalwaktu"></span></div><br>
    <div style=" text-align: center; float: left;">Triffbook</div><br><br>
    <div style=" text-align: center; float: left;">Kasir<b><u></u></b></div><br>
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