<div class="content-wrapper">
   <section class="content-header">
      <h1>
         Form
         <small>Penawaran</small>
      </h1>
   </section>
   <section class="content">
      <div class="row">
         <div class="col-lg-12">
            <a href="<?php echo base_url().'dashboard/penawaran'; ?>" class="btn
               btn-sm btn-primary">Kembali</a>
            <br/>
            <br/>
            <div class="box box-primary">
               <div class="box-header">
                  <h3 class="box-title">Form Penawaran</h3>
               </div>
               <div class="box-body">

  <div class="panel panel-default">
    <div class="panel-heading">Penawaran Buku</div>
    <div class="panel-body">
      <!-- membuat form  -->
      <!-- gunakan tanda [] untuk menampung array  -->
      <form method="post" action="<?php echo base_url('dashboard/penawaran_aksi') ?>">
          <div class="control-group after-add-more">
          <div class="control-group">
              <label>Judul</label>
              <input type="text" name="judul[]" placeholder="judul buku.." class="form-control"required>
              <label>Jumlah</label>
              <input type="number" name="jumlah[]" placeholder="Jumlah Buku.." class="form-control"required>
              <label>Harga</label>
              <input type="number" name="harga[]" placeholder="Harga Penawaran.." class="form-control"required>
            </div>
            <hr>
            <button class="btn btn-warning add-more" type="button">
              <i class="glyphicon glyphicon-plus"></i> Add
            </button>
            <button class="btn btn-success" type="submit">Submit</button>
            <hr>
          </div>
          </form>
            
        <!-- class hide membuat form disembunyikan  -->
        <!-- hide adalah fungsi bootstrap 3, klo bootstrap 4 pake invisible  -->
        <div class="copy hide">
        <div class="control-group">
              <label>Judul</label>
              <input type="text" name="judul[]" placeholder="judul buku.." class="form-control"required>
              <label>Jumlah</label>
              <input type="number" name="jumlah[]" placeholder="Jumlah Buku.." class="form-control"required>
              <label>Harga</label>
              <input type="number" name="harga[]" placeholder="Harga Penawaran.." class="form-control"required>
            <br>
              <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
              <hr>
            </div>
            
          </div>
          
        </div>
        <br>
    </div>
  </div>

<!-- fungsi javascript untuk menampilkan form dinamis  -->
<!-- penjelasan :
saat tombol add-more ditekan, maka akan memunculkan div dengan class copy -->
<script type="text/javascript">
    $(document).ready(function() {
      $(".add-more").click(function(){ 
          var html = $(".copy").html();
          $(".after-add-more").after(html);
      });

      // saat tombol remove dklik control group akan dihapus 
      $("body").on("click",".remove",function(){ 
          $(this).parents(".control-group").remove();
      });
    });
</script>

               </div>
            </div>
         </div>
      </div>
   </section>
</div>