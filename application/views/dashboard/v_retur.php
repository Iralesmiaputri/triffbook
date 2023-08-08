<div class="content-wrapper">
   <section class="content-header">
      <h1>
         Retur
         <small>buku </small>
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
                  <h3 class="box-title">Edit</h3>
               </div>
               <div class="box-body">
                  <?php foreach($retur as $p){ ?>
                  <form method="post" action="<?php echo base_url('dashboard/retur_aksi') ?>">
                     <div class="box-body">
                        <div class="form-group">
                           <label>Pengaju Retur</label>
                           <input type="hidden" name="jual_id" value="<?php echo $p->jual_id; ?>">
                           <input type="hidden" name="pengguna_id" value="<?php echo $p->pengguna_id; ?>">
                           <input type="text" name="nama_pengguna" class="form-control" placeholder="Masukkan Judul buku .." value="<?php echo $p->pengguna_nama; ?>" readonly>
                           <?php echo form_error('nama'); ?>
                        </div>
                        <div class="form-group">
                           <label>Judul buku</label>
                           <input type="hidden" name="buku_id" value="<?php echo $p->buku_id; ?>">
                           <input type="text" name="nama" class="form-control" placeholder="Masukkan Judul buku .." value="<?php echo $p->buku_nama; ?>"readonly>
                           <?php echo form_error('nama'); ?>
                        </div>
                        <div class="form-group">
                           <label>Jumlah Beli</label>
                           <input type="number"
                              name="harga" class="form-control" placeholder="Masukkan Harga Buku .." value="<?php echo $p->jual_berat; ?>"readonly>
                           <?php echo
                              form_error('harga'); ?>
                        </div>
                        <div class="form-group">
                           <label>Jumlah Retur</label>
                           <input type="number"
                              name="jumlah" class="form-control" placeholder="Masukkan jumlah retur .." value="<?php echo $p->jual_berat; ?>" require>
                           <?php echo
                              form_error('harga'); ?>
                        </div>
                        <div class="form-group">
                           <label>Stok Saat Ini</label>
                           <br>
                              <h4><?php echo $p->buku_stok; ?> Pcs</h4>
                              <input type="hidden"
                              name="stok" class="form-control" value="<?php echo $p->buku_stok; ?>">
                           <?php echo
                              form_error('harga'); ?>
                        </div>
                        <div class="form-group">
                           <label>Alasan Retur</label>
                           <br>
                              <input type="text"
                              name="keterangan" class="form-control" placeholder="Alasan Retur.." >
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