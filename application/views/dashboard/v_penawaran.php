<div class="content-wrapper">
   <section class="content-header">
      <h1>
        Penawaran
         <small>buku</small>
      </h1>
   </section>
   <section class="content">
      <div class="row">
         <div class="col-lg-12">
            <a href="<?php echo base_url().'dashboard/'; ?>"
               class="btn btn-sm btn-primary">Kembali</a>
               <a href="<?php echo base_url().'dashboard/penawaran_tambah'; ?>"
               class="btn btn-sm btn-success">Tawarkan Buku</a>
            <br/>
            <br/>
             <?php
               if(isset($_GET['alert'])){
                  if($_GET['alert']=="done"){
                     echo "<div class='alert alert-success font-weight-bold text-center'>Berhasil Menawarkan.</div>";
                  }
               }
               ?>
            <div class="box box-primary">
               <div class="box-header">
               <h3 class="box-title">Penawaran buku</h3>
               </div>
               <div class="box-body">
                  <div class="table-responsive">
                  <table id="example" class="display nowrap table-striped table-bordered table" style="width:100%">
                     <thead>
                        <tr>
                           <th width="1%">NO</th>
                           <th>Judul Buku</th>
                           <th>harga</th>
                           <th>jumlah</th>
                           <th>Tanggal</th>
                           <th>status</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                           $no = 1;
                           foreach($penawaran as $p){
                              if ($p->penawar== $this->session->userdata('id')){
                           ?>
                        <tr>
                           <td><?php echo
                              $no++; ?></td>
                           <td><?php echo $p->judul; ?></td>
                           <td><?php echo $p->harga; ?></td>
                           <td><?php echo $p->jumlah; ?> Pcs</td>
                           <td><?php echo date('d-M-Y', strtotime($p->tanggal)); ?> / Jam :<?php echo date('h:i:sa', strtotime($p->tanggal)); ?></td>
                           <td>
                            <?php if ($p->status==1){ ?>
                               
                                <a class="btn btn-warning btnsm">  Diajukan </a>
                            <?php } else if ($p->status==2){ ?>
                                <a class="btn btn-success btnsm">  Disetujui <br>
                                <small>Silahkan datang ke triffbook untuk melanjutkan transaksi</small></a>
                            <?php }else{?>
                                <a class="btn btn-danger btnsm">  Ditolak</a>
                            <?php }?>
                           </td>
                        <?php }} ?>
                     </tbody>
                  </table>
               </div>
               </div>
            </div>
            </div>
         </div>
   </section>
</div>