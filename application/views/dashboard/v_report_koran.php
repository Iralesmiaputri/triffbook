<div class="content-wrapper">
   <section class="content-header">
      <h1>
         Laporan
         <small>Koran</small>
      </h1>
   </section>
   <section class="content">
      <div class="row">
         <div class="col-lg-6">
            <a href="<?php echo base_url().'dashboard/'; ?>" class="btn
               btn-sm btn-primary">Kembali</a>
            <br/>
            <br/>
            <div class="box box-primary">
               <div class="box-header">
                  <h3 class="box-title">Report</h3>
               </div>
               <div class="box-body">
                  <form method="post" action="<?php echo
                     base_url('dashboard/report_koran_cetak') ?>">
                     <div class="box-body">
                        
                        <div class="form-group">
                           <label>Nasabah</label>
                           <select class="form-control" name="pengguna"  required>
                           <option value="">- Pilih Nasabah</option>
                           <?php foreach($pengguna as $k){ ?>
                              <option <?php if(set_value('pengguna') == $k->pengguna_id){echo "selected='selected'";} ?> value="<?php echo $k->pengguna_id ?>">
                                    <?php echo $k->pengguna_nama; ?>
                                 </option>
                           <?php } ?>
                        </select>
                           <?php echo form_error('pengguna'); ?>
                        </div>
                       
                        </div>
                     <div class="box-footer">
                        <input type="submit" class="btn btn-success" value="Cetak">
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>