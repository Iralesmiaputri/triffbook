<div class="content-wrapper">
   <section class="content-header">
      <h1>
         Data
         <small>Event</small>
      </h1>
   </section>
   <section class="content">
      <div class="row">
         <div class="col-lg-12">
            <a href="<?php echo base_url().'dashboard/event_tambah'; ?>"
               class="btn btn-sm btn-primary">Tambah Event</a>
            <br/>
            <br/>
             <?php
               if(isset($_GET['alert'])){
                  if($_GET['alert']=="done"){
                     echo "<div class='alert alert-danger font-weight-bold text-center'>Berhasil Menghapus event.</div>";
                  }else if($_GET['alert']=="donee"){
                     echo "<div class='alert alert-success font-weight-bold text-center'>Berhasil Menambah event.</div>";
                  }else if($_GET['alert']=="doneee"){
                     echo "<div class='alert alert-warning font-weight-bold text-center'>Berhasil Edit buku.</div>";
                  }

               }
               ?>
            <div class="box box-primary">
               <div class="box-header">

               <h3 class="box-title">Jenis Event</h3>
               </div>
               <div class="box-body">
                  <div class="table-responsive">
                  <table id="example" class="display nowrap table-striped table-bordered table" style="width:100%">
                     <thead>
                        <tr>
                           <th width="1%">NO</th>
                           <th>Nama Event</th>
                           <th>Tanggal Event</th>
                           <th>Diskon</th>
                           <th width="10%">OPSI</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                           $no = 1;
                           foreach($event as $p){
                              
                           ?>
                        <tr>
                           <td><?php echo
                              $no++; ?></td>
                           <td><?php echo $p->event_nama; ?></td>
                           <td><?php echo date('d-M-Y', strtotime($p->event_tgl)); ?></td>
                           <td><?php echo $p->diskon; ?> %</td>
                           <td>
                              <a
                                 href="<?php echo base_url().'dashboard/event_edit/'.$p->event_id; ?>" class="btn btn-warning
                                 btnsm"> <i class="fa fa-pencil"></i> Edit </a>
                              <a
                                 href="<?php echo base_url().'dashboard/event_hapus/'.$p->event_id; ?>" onclick="return confirm('Anda yakin mau menghapus Event ini ?')"class="btn btn-danger 
                                 btn-sm"> <i class="fa fa-trash"></i> Hapus</a>
                            </td>
                        </tr>
                        <?php } ?>
                     </tbody>
                  </table>
               </div>
               </div>
            </div>
            </div>
         </div>
   </section>
</div>