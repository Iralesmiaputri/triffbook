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
            <a href="<?php echo base_url().'dashboard/event'; ?>" class="btn
               btn-sm btn-primary">Kembali</a>
            <br/>
            <br/>
            <div class="box box-primary">
               <div class="box-header">
                  <h3 class="box-title">Edit</h3>
               </div>
               <div class="box-body">
                  <?php foreach($event as $p){ ?>
                  <form method="post" action="<?php echo base_url('dashboard/event_update') ?>">
                     <div class="box-body">
                        <div class="form-group">
                           <label>Jenis buku</label>
                           <input type="hidden" name="id" value="<?php echo $p->event_id; ?>">
                           <input type="text" name="nama" class="form-control" placeholder="Masukkan Event .." value="<?php echo $p->event_nama; ?>">
                           <?php echo form_error('nama'); ?>
                        </div>
                         <div class="form-group">
                           <label>TGL</label>
                           <input type="date"
                              name="tgl" class="form-control" placeholder="Tanggal Event .." value="<?php echo $p->event_tgl; ?>"required>
                           <?php echo
                              form_error('tgl'); ?>
                        </div>
                        <div class="form-group">
                           <label>Diskon</label>
                           <input type="number"
                              name="diskon" class="form-control" placeholder="Tentukan Diskon .." value="<?php echo $p->diskon; ?>"required>
                           <?php echo
                              form_error('diskon'); ?>
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