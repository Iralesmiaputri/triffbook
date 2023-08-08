<div class="content-wrapper">
   <section class="content-header">
      <h1>
         Form
         <small>Validasi</small>
      </h1>
   </section>
   <section class="content">
      <div class="row">
         <div class="col-lg-12">
            <a href="<?php echo base_url().'dashboard/buku_setor'; ?>" class="btn
               btn-sm btn-primary">Kembali</a>
            <br/>
            <br/>
            <div class="box box-primary">
               <div class="box-header">
                  <h3 class="box-title">Form Validasi</h3>
               </div>
               <div class="box-body">
                  
                  <form method="post" action="<?php echo base_url('dashboard/buku_setor_aksi') ?>">
                     <div class="box-body">
                         </div>
                         <?php foreach($bank as $p){ ?>
                          <div class="form-group">
                           <label>Saldo Bank Saat Ini</label>
                           <input type="hidden" name="id_bank" value="<?php echo $p->pengguna_id; ?>">
                           <input type="hidden" name="saldobank" class="form-control" placeholder="Masukkan Jenis buku .." value="<?php echo $p->saldo; ?>">
                           <input type="text" name="saldobank" class="form-control" placeholder="Masukkan Jenis buku .." value="<?php echo $p->saldo; ?>" disabled>
                           <?php echo form_error('nama'); ?>
                        </div> 
                           
                        <?php }?><?php foreach($pengguna as $p){ ?>                          
                        <div class="form-group">
                           <label>Penyetor</label>
                           <input type="hidden" name="pengguna" value="<?php echo $p->pengguna_id; ?>">
                           <input type="hidden" name="saldo" class="form-control" placeholder="Masukkan Jenis buku .." value="<?php echo $p->saldo; ?>">
                           <input type="text" name="penyetor" class="form-control"  value="<?php echo $p->pengguna_nama; ?>" disabled>
                           <?php echo form_error('pengguna'); ?>
                        <div class="form-group">
                           <label>Tanggal Menjual</label>
                           <input type="date" name="tgl" class="form-control" placeholder="Masukkan Tanggal Setor.."  >
                           <?php echo form_error('tgl'); ?>
                        </div>
                        <?php }?><?php foreach($buku as $p){ ?>
                        <div class="form-group">
                           <label>Jenis buku</label>
                           <input type="hidden" name="id" value="<?php echo $p->buku_id; ?>">
                           <input type="text" name="nama" class="form-control" placeholder="Masukkan Jenis buku .." value="<?php echo $p->buku_nama; ?>" disabled>
                           <?php echo form_error('nama'); ?>
                        </div>
                         <div class="form-group">
                           <label>Harga Beli</label>
                           <input type="number"
                              name="harga" class="form-control" placeholder="Masukkan Harga Beli .." value="<?php echo $p->buku_harga; ?>"required disabled>
                              <input type="hidden"
                              name="harga" class="form-control" placeholder="Masukkan Harga Beli .." value="<?php echo $p->buku_harga; ?>"required >
                           <?php echo
                              form_error('harga'); ?>
                        </div>
                         <div class="form-group">
                           <label>Total Menjual Buku</label>
                           <br>
                             <input type="text"
                              name="berat" class="form-control" placeholder="Masukkan Jumlah Buku .."required>
                              <input type="hidden"
                              name="stok" class="form-control" placeholder="Masukkan Harga Beli .."  value="<?php echo $p->buku_stok; ?>">
                           <?php echo
                              form_error('setor'); ?>
                        </div>
                        <div class="form-group">
                           <label>Keterangan</label>
                           <input type="text" name="ket" class="form-control" placeholder="Masukkan Keterangan Jika Ada.."  >
                           <?php echo form_error('ket'); ?>
                        </div>
                     </div>
                     <div class="box-footer">
                        <input type="submit"
                           class="btn btn-success" value="Setor">
                     </div>
                  </form>
                  <?php } ?>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>