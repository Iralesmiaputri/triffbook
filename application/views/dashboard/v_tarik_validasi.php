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
            <a href="<?php echo base_url().'dashboard/buku_tarik'; ?>" class="btn
               btn-sm btn-primary">Kembali</a>
            <br/>
            <br/>
            <div class="box box-primary">
               <div class="box-header">
                  <h3 class="box-title">Form Validasi</h3>
               </div>
               <div class="box-body">
                  <form method="post" action="<?php echo base_url('dashboard/buku_tarik_aksi') ?>">
                     <div class="box-body">
                         
                        <?php foreach($pengguna as $p){ ?>                          
                        <div class="form-group">
                           <label>Penyetor</label>
                           <input type="hidden" name="pengguna" value="<?php echo $p->pengguna_id; ?>">
                           <input type="text" name="penarik" class="form-control"  value="<?php echo $p->pengguna_nama; ?>" >
                           <?php echo form_error('pengguna'); ?>
                        </div>
                        <div class="form-group">
                           <label>Saldo Saat Ini</label>
                           <input type="hidden" name="saldo" value="<?php echo $p->saldo; ?>">
                           <br><h4 >Rp. <?php echo number_format($p->saldo, 0,'.','.') ?></h4>
                           <?php echo form_error('saldo'); ?>
                        </div>  
                          <?php } ?>
                        <div class="form-group">
                           <label>Tanggal Tarik</label>
                           <input type="date" name="tgl" class="form-control" placeholder="Masukkan Tanggal Setor.." required>
                           <?php echo form_error('tgl'); ?>
                        </div>
                        <div class="form-group">
                           <label>Jumlah Penarikan</label>
                           <input type="number" name="tarik" class="form-control" placeholder="Masukkan Jumlah Penarikan.."  required>
                           <?php echo form_error('tarik'); ?>
                        </div>
                        <div class="form-group">
                           <label>Via</label>
                           <select class="form-control"
                              name="ket" required>
                              <option value="">-
                                 Pilih -
                              </option>
                              <option
                                 value="Cash">Cash</option>
                              <option
                                 value="Transfer">Transfer</option>
                           </select>
                        </div>
                     </div>
                     <div class="box-footer">
                        <input type="submit"
                           class="btn btn-success" value="Transfer Saldo">
                     </div>
                  </form>
                  
               </div>
            </div>
         </div>
      </div>
   </section>
</div>