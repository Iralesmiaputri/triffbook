<div class="content-wrapper">
   <section class="content-header">
      <h1>
    Set
         <small>Saldo</small>
      </h1>
   </section>
   <section class="content">
      <div class="row">
         <div class="col-lg-6">
            <a href="<?php echo base_url().'dashboard/'; ?>" class="btn
               btn-sm btn-primary">Kembali</a> 
               <a href="<?php echo base_url().'dashboard/logsetsaldo'; ?>" class="btn
               btn-sm btn-warning">Log Set Saldo</a>
            <br/>
            <br/>
            <div class="box box-primary">
               <div class="box-header">
                  <h3 class="box-title">Report</h3>
               </div>
               <div class="box-body">
                  <form method="post" action="<?php echo
                     base_url('dashboard/saldobankupdate') ?>">
                     <div class="box-body">
                     <div class="form-group">
                           <label>Saldo Sebelum</label>
                     <?php foreach($saldo as $p){ ?>
                        <input type="text" class="form-control" name="saldosebelum" value="<?php echo $p->saldo; ?>" readonly>
                        <?php } ?>  
                     </div>
                     <div class="form-group">
                           <label>Set Saldo</label>
                           <input type="text"
                              name="saldo" class="form-control" placeholder="Ubah Saldo .." >
                           <?php echo
                              form_error('saldo'); ?>
                        </div>
                       
                        </div>
                     <div class="box-footer">
                        <input type="submit" class="btn btn-success" value="Update">
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>