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
                  <h3 class="box-title">Edit</h3>
               </div>
               <div class="box-body">
                  <?php foreach($kategori as $p){ ?>
                  <form method="post" action="<?php echo base_url('dashboard/kategori_update') ?>">
                     <div class="box-body">
                        <div class="form-group">
                           <label>Jenis buku</label>
                           <input type="hidden" name="id" value="<?php echo $p->kategori_id; ?>">
                           <input type="text" name="nama" class="form-control" placeholder="Masukkan Kategori buku .." value="<?php echo $p->kategori_nama; ?>">
                           <?php echo form_error('nama'); ?>
                        </div>
                         <div class="form-group">
                           <label>Letak</label>
                           <input type="text"
                              name="letak" class="form-control" placeholder="Masukkan letak Buku .." value="<?php echo $p->kategori_letak; ?>"required>
                           <?php echo
                              form_error('letak'); ?>
                        </div>
                        
                         
                     </div>
                     <div class="box-footer">
                        <input type="submit"
                           class="btn btn-success" value="Simpan">
                     </div>
                  </form>
                  <?php } ?>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>