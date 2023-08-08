<div class="content-wrapper">
   <section class="content-header">
      <h1>
         Data Retur 
         <small>Buku</small>
      </h1>
   </section>
   <section class="content">
      <div class="row">
         <div class="col-lg-12">
             <a href="<?php echo base_url().'dashboard/jual'; ?>" class="btn btn-success
               btnsm"> <i class="fa fa-reply"></i> Retur</a>
            <br/>
            <br/>
             <?php
               if(isset($_GET['alert'])){
                  if($_GET['alert']=="donee"){
                     echo "<div class='alert alert-success font-weight-bold text-center'>Berhasil Retur.</div>";
                  }else if ($_GET['alert']=="done"){
                     echo "<div class='alert alert-danger font-weight-bold text-center'>Jumlah Stok Tidak Mencukupi.</div>";
                  }
               }
               ?>
            <div class="box box-primary">
               <div class="box-header">

               <h3 class="box-title">Data Retur</h3>
               </div>
               <div class="box-body">
                  <div class="table-responsive">
                  <table id="example" class="display nowrap table-striped table-bordered table" style="width:100%">
                     <thead>
                        <tr>
                           <th width="1%">No</th>
                           <th>Nama</th>
                           <th>Judul Buku</th>
                           <th>Jumlah Retur</th>
                           <th>Waktu Retur</th>
                           <th>Alasan Retur</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                           $no = 1;
                           foreach($retur as $p){      
                           ?>
                        <tr>
                           <td><?php echo
                              $no++; ?></td>
                           <td><?php echo $p->pengguna_nama; ?></td>
                           <td><?php echo $p->buku_nama; ?> </td>
                           <td><?php echo $p->retur_jml; ?> Pcs</td>
                           <td><?php echo $p->retur_tgl; ?> </td>
                           <td><?php echo $p->retur_ket; ?> </td>
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