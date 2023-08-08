<div class="content-wrapper">
   <section class="content-header">
      <h1>
         Kategori
         <small>buku</small>
      </h1>
   </section>
   <section class="content">
      <div class="row">
         <div class="col-lg-12">
            <a href="<?php echo base_url().'dashboard/buku'; ?>"
               class="btn btn-sm btn-primary">Kembali</a>
               <a href="<?php echo base_url().'dashboard/kategori_tambah'; ?>"
               class="btn btn-sm btn-success">Tambah Kategori buku</a>
            <br/>
            <br/>
             <?php
               if(isset($_GET['alert'])){
                  if($_GET['alert']=="done"){
                     echo "<div class='alert alert-danger font-weight-bold text-center'>Berhasil Menghapus Kategori.</div>";
                  }else if($_GET['alert']=="donee"){
                     echo "<div class='alert alert-success font-weight-bold text-center'>Berhasil Menambah Kategori.</div>";
                  }else if($_GET['alert']=="doneee"){
                     echo "<div class='alert alert-warning font-weight-bold text-center'>Berhasil Edit Kategori.</div>";
                  }

               }
               ?>
            <div class="box box-primary">
               <div class="box-header">

               <h3 class="box-title">Kategori buku</h3>
               </div>
               <div class="box-body">
                  <div class="table-responsive">
                  <table id="example" class="display nowrap table-striped table-bordered table" style="width:100%">
                     <thead>
                        <tr>
                           <th width="1%">NO</th>
                           <th>Nama Kategori</th>
                           <th>Letak Kategori</th>
                           <th width="10%">OPSI</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                           $no = 1;
                           foreach($kategori as $p){
                              
                           ?>
                        <tr>
                           <td><?php echo
                              $no++; ?></td>
                           <td><?php echo $p->kategori_nama; ?></td>
                           <td><?php echo $p->kategori_letak; ?></td>
                          
                           
                           <td>
                        
                              <a
                                 href="<?php echo base_url().'dashboard/kategori_edit/'.$p->kategori_id; ?>" class="btn btn-warning
                                 btnsm"> <i class="fa fa-pencil"></i> Edit </a>
                              <a
                                 href="<?php echo base_url().'dashboard/kategori_hapus/'.$p->kategori_id; ?>" onclick="return confirm('Anda yakin mau menghapus Kategori buku ini ?')"class="btn btn-danger 
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