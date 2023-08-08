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
            <a href="<?php echo base_url().'dashboard/buku'; ?>" class="btn
               btn-sm btn-primary">Kembali</a> 
              
            <br/>
            <br/>

            <div class="box box-primary">
               <div class="box-header">
               <?php
               if(isset($_GET['alert'])){
                  if($_GET['alert']=="done"){
                     echo "<div class='alert alert-success font-weight-bold text-center'>Berhasil Persen %.</div>";
                  }
               }
               ?>
                  <h3 class="box-title">Set harga jual</h3>
               </div>
               <div class="box-body">
                  <form method="post" action="<?php echo
                     base_url('dashboard/persen_aksi') ?>">
                     <div class="box-body">
                     <div class="form-group">
                           <label>% Jual</label>
                     <?php foreach($persen as $p){ ?>
                        <input type="number" class="form-control" name="persen" value="<?php echo $p->persen; ?>" required>
                        <?php } ?>  
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