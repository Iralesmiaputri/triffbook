<div class="content-wrapper">
   <section class="content-header">
      <h1>
         buku
         <small>Jual</small>
      </h1>
   </section>
   <section class="content">
      <div class="row">
         <div class="col-lg-12">
            <a href="<?php echo base_url().'dashboard/jual'; ?>" class="btn
               btn-sm btn-primary">Kembali</a>
            <br/>
            <br/>
            <div class="box box-primary">
               <div class="box-header">
                  <h3 class="box-title">Jual</h3>
               </div>
               <div class="box-body">
                  <form method="post" action="<?php echo base_url('dashboard/buku_jual_validasi2') ?>">
                        <div class="form-group">
                           <label>Jenis buku</label>
                           <select class="form-control" name="buku"  required>
                           <option value="">- Judul buku</option>
                           <?php foreach($jual as $k){ 
                              if ($k->buku_stok>0){?>
                              
                              <option <?php if(set_value('buku') == $k->buku_id){echo "selected='selected'";} ?> value="<?php echo $k->buku_id ?>">
                                    <?php echo $k->buku_nama; ?>
                                 </option>
                           <?php }} ?>
                        </select>
                           <?php echo form_error('buku'); ?>       
                     </div>
                     <div class="form-group">
                           <?php foreach($nota as $k){ ?>
                            <input type="hidden"
                              name="id_nota" class="form-control" value="<?php echo $k->id; ?>" readonly>
                              <input type="hidden"
                              name="pembeli" class="form-control" value="<?php echo $k->pengguna; ?>" readonly>
                              <input type="hidden"
                              name="tgl" class="form-control" value="<?php echo $k->tgl; ?>" readonly>
                           <?php } ?>
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