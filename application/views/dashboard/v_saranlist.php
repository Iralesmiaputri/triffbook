<div class="content-wrapper">
   <section class="content-header">
      <h1>
         Saran
         <small> & Masukan</small>
      </h1>
   </section>
   <section class="content">
      <div class="row">
         <div class="col-lg-12">
            <div class="box box-primary">
               <div class="box-header">

               <h3 class="box-title">Saran & Masukan</h3>
               </div>
               <div class="box-body">
                  <div class="table-responsive">
                  <table id="example" class="display nowrap table-striped table-bordered table" style="width:100%">
                     <thead>
                        <tr>
                           <th width="1%">NO</th>
                           <th>Nama</th>
                           <th>Saran & Masukan</th>
                           <th>Tanggal</th> 
                           <th>Status</th>           
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                           $no = 1;
                           foreach($saran as $p){
                              
                           ?>
                        <tr>
                           <td><?php echo
                              $no++; ?></td>
                           <td><?php echo $p->pengguna_nama; ?></td>
                           <td><?php echo $p->isi; ?></td>
                           <td><?php echo date('d-M-Y', strtotime($p->tgl)); ?> / Jam :<?php echo date('h:i:sa', strtotime($p->tgl)); ?></td>
                           <td>
                              <?php if ($p->status==1){?>
                                 <a href="<?php echo base_url().'dashboard/set_status/'.$p->id?>"  class="btn btn-warning btnsm"> Belum Ditanggapi </a>
                              <?php }else{?>
                              <a class="btn btn-success btnsm">  Sudah  Ditanggapi </a>
                              <?php }?>
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