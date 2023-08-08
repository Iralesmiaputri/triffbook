<div class="content-wrapper">
   <section class="content-header">
      <h1>
         Upload
         <small>Bukti</small>
      </h1>
   </section>
   <section class="content">
      <div class="row">
         <div class="col-lg-6">
            <div class="box box-primary">
               <div class="box-header">
                  <h3 class="box-title">Update</h3>
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
                  <?php foreach($tarik as $p){ ?>
                  <form method="post" action="<?php echo
                     base_url('dashboard/upload_bukti_aksi') ?>" enctype="multipart/form-data">
                     
                        <div class="form-group">
                        <input type="hidden" name="id" class="form-control"  value="<?php echo $p->tarik_id; ?>" readonly>
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control"  value="<?php echo $p->pengguna_nama; ?>" readonly>
                        <label>No Rek</label>
                        <input type="text" name="nama" class="form-control"  value="<?php echo $p->pengguna_rek; ?>" readonly>
                        <label>Bukti Transfer (upload foto)</label>
                        <input type="file" name="sampul" required>
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
                           class="btn btn-success" value="Upload">
                     </div>
                  </form>
                  <?php } ?>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>