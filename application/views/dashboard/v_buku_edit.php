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
                  <h3 class="box-title">Edit</h3>
               </div>
               <div class="box-body">
                  <?php foreach($buku as $p){ ?>
                  <form method="post" action="<?php echo base_url('dashboard/buku_update') ?>">
                     <div class="box-body">
                        <div class="form-group">
                           <label>JUdul buku</label>
                           <input type="hidden" name="id" value="<?php echo $p->buku_id; ?>">
                           <input type="text" name="nama" class="form-control" placeholder="Masukkan Judul buku .." value="<?php echo $p->buku_nama; ?>">
                           <?php echo form_error('nama'); ?>
                        </div>
                        <div class="form-group">
                           <label>Kategori</label>
                           <select class="form-control" name="kategori"required>
                              <option value="">- Kategori</option>
                              <?php foreach($kategori as $k){ ?>
                              <option <?php if($p->kategori== $k->kategori_id){echo "selected='selected'";} ?> value="<?php echo $k->kategori_id
                              ?>"><?php echo $k->kategori_nama; ?></option>
                           <?php } ?>
                           </select>
                           <?php echo
                              form_error('kategori'); ?>
                        </div>
                         <div class="form-group">
                           <label>Harga Beli</label>
                           <input type="number"
                              name="harga" class="form-control" placeholder="Masukkan Harga Buku .." value="<?php echo $p->buku_harga; ?>"required>
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
                         <div class="form-group">
                           <label>Total Stok</label>
                           <br>
                              <input type="number"
                              name="stok" class="form-control" placeholder="Masukkan Harga Beli / Kg .."  value="<?php echo $p->buku_stok; ?>" required>
                           <?php echo
                              form_error('harga'); ?>
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