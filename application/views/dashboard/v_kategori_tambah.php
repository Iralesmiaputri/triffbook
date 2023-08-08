<div class="content-wrapper">
   <section class="content-header">
      <h1>
         Kategori
         <small>buku Tambah</small>
      </h1>
   </section>
   <section class="content">
      <div class="row">
         <div class="col-lg-6">
            <a href="<?php echo base_url().'dashboard/kategori'; ?>" class="btn
               btn-sm btn-primary">Kembali</a>
            <br/>
            <br/>
            <div class="box box-primary">
               <div class="box-header">
                  <h3 class="box-title">Kategori buku</h3>
               </div>
               <div class="box-body">
                  <form method="post" action="<?php echo
                     base_url('dashboard/kategori_aksi') ?>">
                     <div class="box-body">
                        <div class="form-group">
                           <label>Kategori</label>
                           <input type="text"
                              name="nama" class="form-control" placeholder="Nama Kategori .." required>
                           <?php echo
                              form_error('nama'); ?>
                        </div>
                        <div class="form-group">
                           <label>Letak</label>
                           <input type="text"
                              name="letak" class="form-control" placeholder="Letak Kategori.." required>
                           <?php echo
                              form_error('letak'); ?>
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