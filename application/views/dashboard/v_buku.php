<div class="content-wrapper">
   <section class="content-header">
      <h1>
         Jenis 
         <small>buku</small>
      </h1>
   </section>
   <section class="content">
      <div class="row">
         <div class="col-lg-12">
            <a href="<?php echo base_url().'dashboard/buku_tambah'; ?>"
               class="btn btn-sm btn-primary">Tambah Judul buku</a>
               <a href="<?php echo base_url().'dashboard/kategori'; ?>"
               class="btn btn-sm btn-success">Tambah Kategori buku</a>
               <a href="<?php echo base_url().'dashboard/persen'; ?>"
               class="btn btn-sm btn-warning">Set Harga Jual</a>
            <br/>
            <br/>
             <?php
               if(isset($_GET['alert'])){
                  if($_GET['alert']=="done"){
                     echo "<div class='alert alert-danger font-weight-bold text-center'>Berhasil Menghapus buku.</div>";
                  }else if($_GET['alert']=="donee"){
                     echo "<div class='alert alert-success font-weight-bold text-center'>Berhasil Menambah buku.</div>";
                  }else if($_GET['alert']=="doneee"){
                     echo "<div class='alert alert-warning font-weight-bold text-center'>Berhasil Edit buku.</div>";
                  }
               }
               ?>
            <div class="box box-primary">
               <div class="box-header">
               <h3 class="box-title">Jenis buku</h3>
               </div>
               <div class="box-body">
                  <div class="table-responsive">
                  <table id="example" class="display nowrap table-striped table-bordered table" style="width:100%">
                     <thead>
                        <tr>
                           <th width="1%">NO</th>
                           <th>Judul buku</th>
                           <th>Kategori buku</th>
                           <th>Letak Buku</th>
                           <th>Harga Beli</th>
                           <th>Harga Jual</th>
                           <th>Stok</th>  
                           <th width="10%">OPSI</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                           $no = 1;
                           foreach($buku as $p){
                              
                           ?>
                        <tr>
                           <td><?php echo
                              $no++; ?></td>
                           <td><?php echo $p->buku_nama; ?></td>
                           <td><?php echo $p->kategori_nama; ?></td>
                           <td><?php echo $p->kategori_letak; ?></td>
                           <td><?php echo $p->buku_harga; ?> / Pcs</td>
                           <td><?php echo $p->buku_harga_jual; ?> / Pcs</td>
                           <td><?php echo $p->buku_stok; ?> Pcs</td>
                           
                           <td>
                        
                              <a
                                 href="<?php echo base_url().'dashboard/buku_edit/'.$p->buku_id; ?>" class="btn btn-warning
                                 btnsm"> <i class="fa fa-pencil"></i> Edit </a>
                              <a
                                 href="<?php echo base_url().'dashboard/buku_hapus/'.$p->buku_id; ?>" onclick="return confirm('Anda yakin mau menghapus jenis buku ini ?')"class="btn btn-danger 
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