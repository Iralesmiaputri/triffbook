<div class="content-wrapper">
   <section class="content-header">
      <h1>
         Data Penarikan 
         <small>Saldo</small>
      </h1>
   </section>
   <section class="content">
      <div class="row">
         <div class="col-lg-12">
             <a href="<?php echo base_url().'dashboard/buku_tarik'; ?>" class="btn btn-success
               btnsm"> <i class="fa fa-download"></i>Penarikan</a>
            <br/>
            <br/>
             <?php
               if(isset($_GET['alert'])){
                  if($_GET['alert']=="done"){
                     echo "<div class='alert alert-success font-weight-bold text-center'>Berhasil Melakukan Penarikan.</div>";
                  }else if($_GET['alert']=="donee"){
                     echo "<div class='alert alert-success font-weight-bold text-center'>Berhasil Menambah buku.</div>";
                  }else if($_GET['alert']=="doneee"){
                     echo "<div class='alert alert-warning font-weight-bold text-center'>Berhasil Edit buku.</div>";
                  }else if($_GET['alert']=="berhasil"){
                     echo "<div class='alert alert-success font-weight-bold text-center'>Berhasil Upload.</div>";
                  }

               }
               ?>
            <div class="box box-primary">
               <div class="box-header">

               <h3 class="box-title">Data Penarikan</h3>
               </div>
               <div class="box-body">
                  <div class="table-responsive">
                  <!-- <table class="table table-bordered"> -->
               <table id="example2" class="display nowrap table-striped table-bordered table" style="width:100%">
                     <thead>
                        <tr>
                           <th width="1%">NO</th>
                           <th>Akun</th>
                           <th>Nama Penarik</th>
                           <th>Total</th>
                           <th>Tanggal</th>
                           <th>Keterangan</th>
                           <th>Bukti</th>
                           <th>Admin</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                           $no = 1;
                           foreach($tarik as $p){
                              if ($p->status=='1'){
                           ?>
                        <tr>
                           <td><?php echo
                              $no++; ?></td>
                           <td><?php echo $p->pengguna_nama; ?></td>
                           <td><?php echo $p->nama; ?></td>
                           <td>Rp <?php echo number_format($p->tarik_jumlah, 0,'.','.') ?></td>
                           <td><?php echo date('d-M-Y', strtotime($p->tarik_tgl)); ?></td>
                           <td>    <a class="btn btn-success btnsm"> <?php echo $p->tarik_ket; ?> </a></td>
                           <td>
                           <?php if($p->bukti=="" and $p->penanggung_jawab !="" ){
                              ?>
                              <a
                                 href="<?php echo base_url().'dashboard/upload_bukti/'.$p->tarik_id; ?>" class="btn btn-primary
                                 btnsm"> <i class="fa fa-pdf"></i> Upload </a>
                              <?php }else if ($p->bukti!="" and $p->penanggung_jawab !="" )  {?>
                                 <img width="100%" class="img-responsive" src="<?php echo base_url().'/bukti/'.$p->bukti;
                           ?>">
                            <?php  } else if ($p->bukti=="" and $p->penanggung_jawab=="" ){?>
                              Membeli Buku
                              <?php  }?>
                           </td>
                           <td> 
                           <?php foreach($admin as $a){  
                              if ($p->penanggung_jawab==$a->pengguna_id){?>
                              <?php echo $a->pengguna_nama; ?>
                           <?php }}?>
                           </td>
                        </tr>
                        <?php }} ?>
                     </tbody>
                  </table>
                  <h1>Pengajuan Tarik</h1>
                  <table id="example" class="display nowrap table-striped table-bordered table" style="width:100%">
                     <thead>
                        <tr>
                           <th width="1%">NO</th>
                           <th>Akun</th>
                           <th>Nama Penarik</th>
                           <th>Total</th>
                           <th>Tanggal</th>
                           <th>Keterangan</th>
                           <th>Bukti</th>
                           <th>Admin</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                           $no = 1;
                           foreach($tarik as $p){
                              if ($p->status=='2'){
                           ?>
                        <tr>
                           <td><?php echo
                              $no++; ?></td>
                           <td><?php echo $p->pengguna_nama; ?></td>
                           <td><?php echo $p->nama; ?></td>
                           <td>Rp <?php echo number_format($p->tarik_jumlah, 0,'.','.') ?></td>
                           <td><?php echo date('d-M-Y', strtotime($p->tarik_tgl)); ?></td>
                           <td><?php echo $p->tarik_ket; ?></td>
                           <td>
                           <?php if($p->bukti==""){
                              ?>
                              <a
                                 href="<?php echo base_url().'dashboard/upload_bukti/'.$p->tarik_id; ?>" class="btn btn-primary
                                 btnsm"> <i class="fa fa-pdf"></i> Upload </a>
                              <?php }else {?>
                                 <img width="100%" class="img-responsive" src="<?php echo base_url().'/bukti/'.$p->bukti;
                           ?>">
                            <?php  }?>
                           </td>
                           <td> 
                           <?php foreach($admin as $a){  
                              if ($p->penanggung_jawab==$a->pengguna_id){?>
                              <?php echo $a->pengguna_nama; ?>
                           <?php }}?>
                           </td>
                        </tr>
                        <?php }} ?>
                     </tbody>
                  </table>
               </div>
               </div>
            </div>
            </div>
         </div>
   </section>
</div>