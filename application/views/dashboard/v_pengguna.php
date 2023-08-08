<div class="content-wrapper">
   <section class="content-header">
      <h1>
         PENGGUNA
         <small>(Admin & Nasabah)</small>
      </h1>
   </section>
   <section class="content">
      <div class="row">
         <div class="col-lg-12">
            <a href="<?php echo base_url().'dashboard/pengguna_tambah'; ?>"
               class="btn btn-sm btn-primary">Buat pengguna baru</a>
            <br/>
            <br/>
             <?php
               if(isset($_GET['alert'])){
                  if($_GET['alert']=="done"){
                     echo "<div class='alert alert-danger font-weight-bold text-center'>Berhasil Menghapus Pengguna.</div>";
                  }
               }
               ?>
            <div class="box box-primary">
               <div class="box-header">

               <h3 class="box-title">Admin</h3>
               </div>
               <div class="box-body">
                  <div class="table-responsive">
                  <table id="example" class="display nowrap table-striped table-bordered table" style="width:100%">
                     <thead>
                        <tr>
                           <th width="1%">NO</th>
                           <th>Nik</th>
                           <th>Nama</th>
                           <th>Email</th>
                           <th>Username</th>
                           <th>NO REK</th>
                           <th>Level</th>
                           <th>Status</th>
                           <th width="10%">OPSI</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                           $no = 1;
                           foreach($pengguna as $p){
                              if ($p->pengguna_level == "admin") {
                           ?>
                        <tr>
                           <td><?php echo
                              $no++; ?></td>
                           <td><?php echo $p->pengguna_ktp; ?></td>
                           <td><?php echo $p->pengguna_nama; ?></td>
                           <td><?php echo $p->pengguna_email; ?></td>
                           <td><?php echo $p->pengguna_username; ?></td>
                           <td><?php echo $p->pengguna_rek; ?></td>
                           <td><?php echo $p->pengguna_level; ?></td>
                           <td>
                              <?php
                                 if($p->pengguna_status == 1){
                                 echo "Aktif";
                                 }else{
                                 echo "Non Aktif";
                                 }
                                 ?>
                           </td>
                           <td>
                              <a
                                 href="<?php echo base_url().'dashboard/pengguna_edit/'.$p->pengguna_id; ?>" class="btn btn-warning
                                 btnsm"> <i class="fa fa-pencil"></i> </a>
                              <a
                                 href="<?php echo base_url().'dashboard/pengguna_hapus/'.$p->pengguna_id; ?>" class="btn btn-danger
                                 btn-sm"> <i class="fa fa-trash"></i> </a>
                           </td>
                        </tr>
                        <?php }} ?>
                     </tbody>
                  </table>
               </div>
               </div>
            </div>
            <div class="box box-primary">
               <div class="box-header">

               <h3 class="box-title">Nasabah</h3>
               </div>
               <div class="box-body">
                  <div class="table-responsive">
                  <table id="example2" class="display nowrap table-striped table-bordered table" style="width:100%">
                     <thead>
                        <tr>
                           <th width="1%">NO</th>
                           <th>Nik</th>
                           <th>KTP</th>
                           <th>Nama</th>
                           <th>Email</th>
                           <th>No HP</th>
                           <th>Username</th>
                           <th>NO REK</th>
                           <th>Level</th>
                           <th>Saldo</th>
                           <th>Tanggal Daftar</th>
                           <th>Status</th>
                           <th width="10%">OPSI</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                           $no = 1;
                           foreach($pengguna as $p){
                              if ($p->pengguna_level == "nasabah") {
                           ?>
                        <tr>
                           <td><?php echo
                              $no++; ?></td>
                           <td><?php echo $p->pengguna_ktp; ?></td>
                           <td> <img width="20%" class="img-responsive" src="<?php echo base_url().'/profil/'.$p->pengguna_foto;
                           ?>"></td>                           
                           <td><?php echo $p->pengguna_nama; ?></td>
                           <td><?php echo $p->pengguna_email; ?></td>
                           <td><?php echo $p->tlp; ?></td>
                           <td><?php echo $p->pengguna_username; ?></td>
                           <td><?php echo $p->pengguna_rek; ?></td>
                           <td><?php echo $p->pengguna_level; ?></td>
                           <td>Rp <?php echo number_format($p->saldo, 0,'.','.') ?></td>
                           <td><?php echo $p->tgl_daftar; ?></td>
                           <td>
                              <?php
                                 if($p->pengguna_status == 1){
                                 echo "Aktif";
                                 }else{
                                 echo "Non Aktif";
                                 }
                                 ?>
                           </td>
                           <td>
                              <a
                                 href="<?php echo base_url().'dashboard/pengguna_edit/'.$p->pengguna_id; ?>" class="btn btn-warning
                                 btnsm"> <i class="fa fa-pencil"></i> </a>
                              <a
                                 href="<?php echo base_url().'dashboard/pengguna_hapus/'.$p->pengguna_id; ?>" class="btn btn-danger
                                 btn-sm"> <i class="fa fa-trash"></i> </a>
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