<div class="content-wrapper">
   <section class="content-header">
      <h1>
         Profil
         <small>Update Profil Pengguna</small>
      </h1>
   </section>
   <section class="content">
      <div class="row">
         <div class="col-lg-6">
            <div class="box box-primary">
               <div class="box-header">
                  <h3 class="box-title">Update Profil</h3>
               </div>
               <div class="box-body">
                  <?php
                     if(isset($_GET['alert'])){
                     if($_GET['alert'] == "sukses"){
                     echo "<div class='alert alert-success'>Profil telah diupdate!</div>";
                     }else if($_GET['alert'] == "gagal"){
                     echo "<div class='alert alert-danger'>GAGAL UPLOAD FOTO!</div>";
                     }
                     }
                     ?>
                  <?php foreach($profil as $p){ ?>
                  <form method="post" action="<?php echo
                     base_url('dashboard/profil_update') ?>" enctype="multipart/form-data">
                     <div class="box-body">
                        <div class="form-group">
                           <label>Nama</label>
                           <input type="text"
                              name="nama" class="form-control" placeholder="Masukkan nama .." value="<?php echo
                                 $p->pengguna_nama; ?>">
                           <?php echo
                              form_error('nama'); ?>
                        </div>
                        <div class="form-group">
                           <label>Email</label>
                           <input type="text"
                              name="email" class="form-control" placeholder="Masukkan email .." value="<?php echo
                                 $p->pengguna_email; ?>">
                           <?php echo
                              form_error('email'); ?>
                        </div>
                        <div class="form-group">
                            <?php
                if($this->session->userdata('level') == "nasabah"){
                  ?>
                           <label>No Rekening Anda</label>
                           <input type="text"
                              name="rek" class="form-control" placeholder="Masukkan Rekening .." value="<?php echo
                                 $p->pengguna_rek; ?>">
                           <?php echo
                              form_error('rek'); ?>
                        </div>
                            <?php } ?>
                           
                        <div class="form-group">
                        <img width="20%" class="img-responsive" src="<?php echo base_url().'/profil/'.$p->pengguna_foto;
                           ?>">
                           <input type="hidden" name="fotolama" value="<?php echo $p->pengguna_foto ?>">
                        <br>
                        <label>KTP (upload foto)</label>

                        <input type="file" name="sampul">
                        <br/>
                        <?php
                        if(isset($gambar_error)){
                           echo $gambar_error;
                        }
                        ?>
                        <?php echo form_error('sampul'); ?>
                     </div>
                     </div>
                     <div class="box-footer">
                        <input type="submit"
                           class="btn btn-success" value="Update">
                     </div>
                  </form>
                  <?php } ?>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>