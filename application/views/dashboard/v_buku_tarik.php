<div class="content-wrapper">
   <section class="content-header">
      <h1>
         Tarik
         <small>saldo</small>
      </h1>
   </section>
   <section class="content">
      <div class="row">
         <div class="col-lg-12">
            <a href="<?php echo base_url().'dashboard/tarik'; ?>" class="btn
               btn-sm btn-primary">Kembali</a>
            <br/>
            <br/>
            <div class="box box-primary">
               <div class="box-header">
                  <h3 class="box-title">Tarik</h3>
               </div>
               <div class="box-body">
                  <form method="post" action="<?php echo base_url('dashboard/buku_tarik_validasi') ?>">
                        <div class="form-group">
                           <label>Pilih Akun</label>
                           <select class="form-control" name="pengguna"  required>
                           <option value="">- Penarik</option>
                           <?php foreach($pengguna as $k){ ?>
                              <option <?php if(set_value('pengguna') == $k->pengguna_id){echo "selected='selected'";} ?> value="<?php echo $k->pengguna_id ?>">
                                    <?php echo $k->pengguna_nama; ?>
                                 </option>
                           <?php } ?>
                        </select>
                           <?php echo form_error('pengguna'); ?>       
                     </div>
                     <div class="box-footer">
                        <input type="submit"
                           class="btn btn-success" value="Lanjut">
                     </div>
                  </form>
                 
               </div>
            </div>
         </div>
      </div>
   </section>
</div>