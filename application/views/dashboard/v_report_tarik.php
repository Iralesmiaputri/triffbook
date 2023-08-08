<div class="content-wrapper">
   <section class="content-header">
      <h1>
         Laporan
         <small>Penarikan Saldo</small>
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
                     base_url('dashboard/report_tarik_cetak') ?>">
                     <div class="box-body">
                        <div class="form-group">
                           <label>Dari Tanggal</label>
                           <input type="date"
                              name="tgl1" class="form-control" required>
                           <?php echo
                              form_error('tgl1'); ?>
                        </div>
                        <div class="form-group">
                           <label>Sampai Tanggal</label>
                           <input type="date"
                              name="tgl2" class="form-control" required>
                           <?php echo
                              form_error('tgl2'); ?>
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