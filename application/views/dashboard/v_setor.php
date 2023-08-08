<div class="content-wrapper">
   <section class="content-header">
      <h1>
         Data Penjual
         <small>buku</small>
      </h1>
   </section>
   <section class="content">
      <div class="row">
         <div class="col-lg-12">
             <a href="<?php echo base_url().'dashboard/buku_setor'; ?>" class="btn btn-success
               btnsm"> <i class="fa fa-upload"></i> Setor</a>
            <br/>
            <br/>
             <?php
               if(isset($_GET['alert'])){
                  if($_GET['alert']=="done"){
                     echo "<div class='alert alert-success font-weight-bold text-center'>Berhasil Setor.</div>";
                  }else if($_GET['alert']=="donee"){
                     echo "<div class='alert alert-success font-weight-bold text-center'>Berhasil Menambah buku.</div>";
                  }else if($_GET['alert']=="doneee"){
                     echo "<div class='alert alert-warning font-weight-bold text-center'>Berhasil Edit buku.</div>";
                  }

               }
               ?>
            <div class="box box-primary">
               <div class="box-header">

               <h3 class="box-title">Data Penjual</h3>
               </div>
               <div class="box-body">
                  <div class="table-responsive">
                  <table id="example" class="display nowrap table-striped table-bordered table" style="width:100%">
                     <thead>
                        <tr>
                           <th width="1%">NO</th>
                           <th>Suplier</th>
                           <th>Judul buku</th>
                           <th>Keterangan</th>
                           <th>Pcs</th>
                           <th>Tanggal</th>
                           <th>Harga Beli</th>
                        
                           
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                           $no = 1;
                           foreach($setor as $p){
                              
                           ?>
                        <tr>
                           <td><?php echo
                              $no++; ?></td>
                           <td><?php echo $p->pengguna_nama; ?></td>
                           <td><?php echo $p->buku_nama; ?></td>
                           <td><?php echo $p->setor_ket; ?></td>
                           <td><?php echo $p->setor_berat; ?> Pcs</td>
                           <td><?php echo date('d-M-Y', strtotime($p->setor_tgl)); ?></td>
                           <td>Rp <?php echo number_format($p->setor_jumlah, 0,'.','.') ?></td>
                          
                        </tr>
                        <?php } ?>
                     </tbody>
                  </table>
               </div>
               </div>
            </div>
            </div>
         </div>
   </section>
</div>