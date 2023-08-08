<div class="content-wrapper">
   <section class="content-header">
      <h1>
         Saran
         <small>& Masukan</small>
      </h1>
   </section>
   <section class="content">
      <div class="row">
         <div class="col-lg-12">
            <a href="<?php echo base_url().'dashboard/'; ?>" class="btn
               btn-sm btn-primary">Kembali</a>
            <br/>
            <br/>
            <div class="box box-primary">
               
               <div class="box-body">
                  <form method="post" action="<?php echo
                     base_url('dashboard/saran_aksi') ?>">
                        <div class="form-group">
                           <label>Saran & Masukan</label>
                           <textarea
                              name="isi" class="form-control" placeholder="Saran Dan Masukan Anda.." required></textarea>
                        </div>
                        
                     </div>
                     <div class="box-footer">
                        <input type="submit" class="btn btn-success" value="Simpan">
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>