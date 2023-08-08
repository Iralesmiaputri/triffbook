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
                  
                  <form method="post" action="<?php echo base_url('dashboard/buku_jual_aksi2') ?>">
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
                        <?php }?>
                        <!-- data buku -->
                        <?php foreach($jual as $p){ ?>
                        <div class="form-group">
                           <label>Judul buku</label>
                           <input type="hidden" name="id" value="<?php echo $p->buku_id; ?>">
                           <input type="hidden"
                              name="stok" class="form-control" placeholder="Masukkan Harga Beli / Kg .."  value="<?php echo $p->buku_stok; ?>">
                           <input type="text" name="namabuku" class="form-control"  value="<?php echo $p->buku_nama; ?>" readonly>
                           <input type="number" name="harga" class="form-control" id="txt1"  onkeyup="sum();" value="<?php echo $p->buku_harga_jual; ?>" readonly>
                           <label>Stok buku</label>
                           <h4><?php echo $p->buku_stok; ?> Pcs</h4>
                        </div>
                        <?php }?>
                        <!-- Inputan -->
                        <div class="form-group">
                           <label>Total pcs Penjualan</label>
                           <br>
                             <input type="text"
                              name="berat" class="form-control" placeholder="Masukkan Jumlah buku .."required  id="txt2"  onkeyup="sum();">
                              
                           <?php echo
                              form_error('setor'); ?>
                        </div>
                        <div class="form-group">
                           <label>Total Harga</label>
                           <br>
                              <input class="form-control" name="jumlahtotal" type="text" id="txt3" readonly />
                        </div>
                        
                        <?php foreach($pembeli as $p){ ?>
                          <div class="form-group">
                           <label>Pembeli<input type="text" class="form-control" name="nama_pembeli" value="<?php echo $p->pengguna_nama; ?>" readonly></label>
                           <input type="hidden" name="id_pembeli" value="<?php echo $p->pengguna_id; ?>">
                           <label>Saldo Pembeli<input type="text" name="saldopembeli" class="form-control" placeholder="Masukkan Jenis buku .." value="<?php echo $p->saldo; ?>" readonly>
                            <?php echo form_error('pembeli'); ?></label>
                        </div> 
                        <?php }?>
                        <?php foreach($nota as $p){ ?>
                          <div class="form-group">
                           <input type="text" name="id_nota" value="<?php echo $p->id; ?>">
                           <input type="text" name="total_nota" value="<?php echo $p->total_nota; ?>">
                         </div> 
                        <?php }?>
                        <div class="form-group">
                           <label>Keterangan</label>
                           <input type="text" name="ket" class="form-control" value="Terjual" placeholder="Masukkan Keterangan Jika Ada.."  >
                           <?php echo form_error('ket'); ?>
                        </div>
                        

                     <?php if(!empty($event)) { ?>
                        <?php foreach($event as $e){ ?>
                          <div class="form-group">
                           <input type="hidden" name="event" value="<?php echo $e->event_id; ?>">
                           <input type="hidden" name="diskon" value="<?php echo $e->diskon; ?>">
                           <input type="text" name="namaevent" class="form-control"  value="<?php echo $e->event_nama; ?>" readonly>
                           <input type="text" name="tgl" class="form-control"  value="<?php echo $e->event_tgl; ?>" readonly>
                            <?php echo form_error('event'); ?>
                           </div>
                        <?php }}else{?>
                           <input type="date" name="tgl" class="form-control"  value="<?php 
                              echo date('Y-m-d'); ?>" readonly>
                        <?php }?>
                     </div>
                     <div class="box-footer">
                        <input type="submit"
                           class="btn btn-success" value="Setor">
                     </div>
                  </form>
                  
               </div>
            </div>
         </div>
      </div>
   </section>
</div>