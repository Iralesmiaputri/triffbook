<div class="content-wrapper">
   <section class="content-header">
      <h1>
         Jenis 
         <small>buku Tambah</small>
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
                  <h3 class="box-title">Jenis buku</h3>
               </div>
               <div class="box-body">
                  <form method="post" action="<?php echo
                     base_url('dashboard/buku_aksi') ?>">
                     <div class="form-group">
                           <label>Kategori Buku</label>
                           <select class="form-control" name="kategori"  required>
                           <option value="">- Kategori</option>
                           <?php foreach($kategori as $k){ ?>
                              <option <?php if(set_value('kategori') == $k->kategori_id){echo "selected='selected'";} ?> value="<?php echo $k->kategori_id ?>">
                                    <?php echo $k->kategori_nama; ?>
                                 </option>
                           <?php } ?>
                        </select>
                           <?php echo form_error('kategori'); ?>
                        </div>
                     <div class="box-body">
                        <div class="form-group">
                           <label>Judul buku</label>
                           <input type="text"
                              name="nama" class="form-control" placeholder="Masukkan Judul buku .." required>
                           <?php echo
                              form_error('nama'); ?>
                        </div>
                        <div class="form-group">
                           <label>Harga Beli</label>
                           <input type="number"
                              name="harga" class="form-control" placeholder="Masukkan Harga / Pcs .." required>
                           <?php echo
                              form_error('harga'); ?>
                        </div>
                        <div class="form-group">
                        <?php foreach($persen as $a){ ?>
                           <label>Harga Jual Otomatis Bertambah <?php echo $a->persen; ?> %</label>
                           <input type="hidden"
                              name="persen" class="form-control" value="<?php echo $a->persen; ?>" >
                           <?php }?>
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