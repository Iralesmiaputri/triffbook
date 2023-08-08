<div class="content-wrapper">
   <section class="content-header">
      <h1>
         Data Penjualan 
         <small>Saldo</small>
      </h1>
   </section>
   <section class="content">
      <div class="row">
         <div class="col-lg-12">
             <a href="<?php echo base_url().'dashboard/buku_jual'; ?>" class="btn btn-success
               btnsm"> <i class="fa fa-money"></i> Jual</a>
            <br/>
            <br/>
             <?php
               if(isset($_GET['alert'])){
                  if($_GET['alert']=="done"){
                     echo "<div class='alert alert-success font-weight-bold text-center'>Berhasil Merecord Penjualan.</div>";
                  }else if($_GET['alert']=="donee"){
                     echo "<div class='alert alert-success font-weight-bold text-center'>Berhasil Menambah buku.</div>";
                  }else if($_GET['alert']=="doneee"){
                     echo "<div class='alert alert-warning font-weight-bold text-center'>Berhasil Edit buku.</div>";
                  }else if($_GET['alert']=="stok"){
                     echo "<div class='alert alert-danger font-weight-bold text-center'>Stok tidak mencukupi</div>";
                  }else if($_GET['alert']=="berhasil"){
                     echo "<div class='alert alert-success font-weight-bold text-center'>Pembayaran Berhasil</div>";
                  }else if($_GET['alert']=="gagal"){
                     echo "<div class='alert alert-danger font-weight-bold text-center'>Pembayaran Kurang</div>";
                  }

               }
               ?>
            <div class="box box-primary">
               <div class="box-header">

               <h3 class="box-title">Data Penjualan</h3>
               </div>
               <div class="box-body">
                  <div class="table-responsive">
                  <table id="example" class="display nowrap table-striped table-bordered table" style="width:100%">
                     <thead>
                        <tr>
                           <th width="1%">No</th>
                           <th>Pembeli</th>
                           <th style="text-align: center;">Detail Pembelian</th>
                           <th style="text-align: center;">kode penjualan</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                           $no = 1;
                           foreach($jualgroup as $a){
                           ?>
                        <tr>
                           <td><?php echo
                              $no++; ?></td>
                              <td><?php echo $a->pengguna_nama; ?></td>
                           <td>
                                 <table class="table table-bordered">
                                 
                                    <thead>
                                       <tr>
                                       <th>Buku</th>
                                       <th>Pcs</th>
                                       <th>Total </th>
                                       <th>Event</th>
                                       <th>Pengembalian</th>
                                       </tr>
                                    </thead>                         
                                    <tbody>
                                    <?php
                                       foreach($jual as $p){
                                          if ( $a->kode_jual==$p->kode_jual){
                                       ?>
                                       <tr>
                                       <td><?php echo $p->buku_nama; ?></td>
                                       <td><?php echo $p->jual_berat; ?> Pcs</td>
                                       <td>Rp <?php echo number_format($p->jual_jumlah, 0,'.','.') ?></td>
                                       <td><?php echo $p->event_nama; ?></td>
                                       <?php if ($p->retur_jual==""){?>
                                       <td><a href="<?php echo base_url().'dashboard/retur/'.$p->jual_id?>" class="btn btn-warning btnsm"> <i class="fa fa-reply"></i> Retur </a>
                                       <?php }else{ ?></td>
                                       <td><a class="btn btn-danger btnsm"> <i class="fa fa-window-close-o"></i> Sudah Retur </a></td><?php }?>
                                       </tr><?php }}?>
                                    </tbody>
                                 </table>
                           </td>
                           <td>J<?php echo $a->kode_jual; ?><br>
                           
                           <?php
                           if ( $a->status=='1' ){ ?>
                           <a href="<?php echo base_url().'dashboard/tambah_buku/'.$a->id?>"  class="btn btn-primary btnsm" > <i class="fa fa-book"></i> + </a><br><br>
                           <a href="<?php echo base_url().'dashboard/bayar/'.$a->id?>"  class="btn btn-warning btnsm" > <i class="fa fa-dollar"></i> Bayar </a>
                           <?php }else{ ?>
                              <a href="<?php echo base_url().'dashboard/struk/'.$a->kode_jual?>"  class="btn btn-success btnsm" target=_blank> <i class="fa fa-print"></i> cetak struk </a>
                              <a  class="btn btn-success btnsm" >Sudah Bayar</a>

                           <?php } ?>
                           </td>
                     </tr><?php } ?>
                     </tbody>
                  </table>
               </div>
               </div>
            </div>
            </div>
         </div>
   </section>
</div>