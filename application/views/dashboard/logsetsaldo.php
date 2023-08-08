<div class="content-wrapper">
   <section class="content-header">
      <h1>
         Log
         <small>Saldo</small>
      </h1>
   </section>
   <section class="content">
      <div class="row">
         <div class="col-lg-12">
            <a href="<?php echo base_url().'dashboard/saldobank'; ?>"
               class="btn btn-sm btn-primary">Kembali</a>
            <br/>
            <br/>
            <div class="box box-primary">
               <div class="box-header">
               <h3 class="box-title">Log Set Saldo Bank</h3>
               </div>
               <div class="box-body">
                  <div class="table-responsive">
                  <table id="example" class="display nowrap table-striped table-bordered table" style="width:100%">
                     <thead>
                        <tr>
                           <th width="1%">NO</th>
                           <th>Nama</th>
                           <th>Jumlah Set Saldo</th>
                           <th>Tanggal </th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                           $no = 1;
                           foreach($set as $p){
                              
                           ?>
                        <tr>
                           <td><?php echo
                              $no++; ?></td>
                           <td><?php echo $p->pengguna_nama; ?></td>
                           <td><?php echo $p->jumlahset; ?></td>
                           <td><?php echo $p->tgl; ?></td>
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