<div class="content-wrapper">
   <section class="content-header">
      <h1>
         Jenis 
         <small>Event Tambah</small>
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
                  <h3 class="box-title">Jenis Event</h3>
               </div>
               <div class="box-body">
                  <form method="post" action="<?php echo
                     base_url('dashboard/event_aksi') ?>">
                     <div class="box-body">
                        <div class="form-group">
                           <label>Nama Event</label>
                           <input type="text"
                              name="nama" class="form-control" placeholder="Masukkan Nama Event .." required>
                           <?php echo
                              form_error('nama'); ?>
                        </div>
                        <div class="form-group">
                           <label>Tanggal Event</label>
                           <input type="date"
                              name="tgl" class="form-control" placeholder="Tanggal Event .." required>
                           <?php echo
                              form_error('tgl'); ?>
                        </div>
                        <div class="form-group">
                           <label>diskon</label>
                           <input type="number"
                              name="diskon" class="form-control" placeholder="Tentukan Diskon .." required>
                           <?php echo
                              form_error('diskon'); ?>
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