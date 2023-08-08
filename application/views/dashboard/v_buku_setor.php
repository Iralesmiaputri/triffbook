<div class="content-wrapper">
   <section class="content-header">
      <h1>
         buku
         <small>Setor</small>
      </h1>
   </section>
   <section class="content">
      <div class="row">
         <div class="col-lg-12">
            <a href="<?php echo base_url().'dashboard/setor'; ?>" class="btn
               btn-sm btn-primary">Kembali</a>
            <br/>
            <br/>
            <div class="box box-primary">
               <div class="box-header">
                  <h3 class="box-title">Setor</h3>
               </div>
               <div class="box-body">
                  <form method="post" action="<?php echo base_url('dashboard/buku_setor_validasi') ?>">
                     <div class="box-body">
                         <?php foreach($bank as $p){ ?>
                          <div class="form-group">
                           <input type="hidden" name="id_bank" value="<?php echo $p->pengguna_id; ?>">
                           <?php echo form_error('id_bank'); ?>
                        </div> 
                           <?php }?>
                        <div class="form-group">
                           <label>Penyetor</label>
                           <select class="form-control" name="pengguna"  required>
                           <option value="">- Penyetor</option>
                           <?php foreach($pengguna as $k){ ?>
                              <option <?php if(set_value('pengguna') == $k->pengguna_id){echo "selected='selected'";} ?> value="<?php echo $k->pengguna_id ?>">
                                    <?php echo $k->pengguna_nama; ?>
                                 </option>
                           <?php } ?>
                        </select>
                           <?php echo form_error('pengguna'); ?>
                        </div>
                        <div class="form-group">
                           <label>Jenis buku</label>
                           <select class="form-control" name="id" required>
                           <option value="">- Jenis buku</option>
                        <?php foreach($buku as $p){ ?>
                              <option <?php if(set_value('buku') == $p->buku_id){echo "selected='selected'";} ?> value="<?php echo $p->buku_id ?>">
                                    <?php echo $p->buku_nama; ?>
                                 </option>
                           <?php } ?>
                        </select>
                           <?php echo form_error('id'); ?>
                        </div>                  
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