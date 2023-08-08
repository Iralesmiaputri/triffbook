<div class="content-wrapper">
   <section class="content-header">
      <h1>
         buku
         <small>Jual</small>
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
                  <h3 class="box-title">Jual</h3>
               </div>
               <div class="box-body">
                  <form method="post" action="<?php echo base_url('dashboard/buku_bayar') ?>">
                  <div class="form-group">
                           <?php foreach($bank as $k){ ?>
                            <input type="hidden"
                              name="id_bank" class="form-control" value="<?php echo $k->pengguna_id; ?>" readonly>
                              <input type="hidden"
                              name="saldo_bank" class="form-control" value="<?php echo $k->saldo; ?>" readonly>
                           <?php } ?>
                        </div>
                     <div class="form-group">
                           <?php foreach($saldo as $k){ ?>
                            <input type="hidden"
                              name="id_nota" class="form-control" value="<?php echo $k->id; ?>" readonly>
                              <label>pembeli</label>
                              <input type="hidden"
                              name="pembeli" class="form-control" value="<?php echo $k->pengguna_id; ?>" readonly>
                              <input type="text"
                              name="pembeli_nama" class="form-control" value="<?php echo $k->pengguna_nama; ?>" readonly>
                              <label>Saldo</label>
                              <input type="text"
                              name="saldo" class="form-control" id="saldo"  onkeyup="sum2();" value="<?php echo $k->saldo; ?>" readonly>
                              <label>Total</label>
                              <input type="text"
                              name="total" class="form-control" id="total"  onkeyup="sum2();" value="<?php echo $k->total_nota; ?>" readonly>
                              <label>Cash</label>
                              <input type="number"
                              name="cash" class="form-control" id="cash" value="0" onkeyup="sum2();" required>
                              <label>Kembalian</label>
                              <input class="form-control" name="jumlahtotal" type="text" id="kembali"  readonly />

                           <?php } ?>
                        </div>
                        <div class="form-group">
                           <label>Keterangan</label><br>
                            <textarea
                              name="ket" cols="20" rows="10" readonly>
                              Membeli Buku 
                              <?php foreach($buku as $k){ ?>
                              <?php echo $k->buku_nama; ?>
                              <?php } ?>
                              
                           </textarea>
                           
                        </div>
                     <div class="box-footer">
                        <input type="submit"
                           class="btn btn-success" value="bayar">
                     </div>
                  </form>
                 
               </div>
            </div>
         </div>
      </div>
   </section>
</div>