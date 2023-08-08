<?php include 'koneksi.php' ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mmebuat Select Option Dinamis Dengan Ajax</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<center><h2>Select Option Dinamis Dengan Ajax</h2></center>
        <div class="control-group after-add-more">
		<form action="">
			<div class="form-group">
				<label>Judul</label>
				<select class="form-control" name="id" id="id" required>
					<option value="">--Pilih--</option>
					<?php
					$id= mysqli_query($koneksi,"select * from buku where buku_stok !='0'");
					while($f = mysqli_fetch_array($id)){
						?>
						<option value="<?php echo $f['buku_id'] ?>"> <?php echo $f['buku_nama']; ?> Stok <?php echo $f['buku_stok']; ?></option>
						<?php
					}
					?>
				</select>
			</div>
			<div class="form-group" id="buku">
				<label>Data</label>
				<input class="form-control" name="jurusan"  required>
                <label>Stok</label>
				<input class="form-control" name="jurusan"  required>	
			</div>
            <button class="btn btn-success add-more" type="button">
              <i class="glyphicon glyphicon-plus"></i> Add
            </button>         	
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
          <!-- class hide membuat form disembunyikan  -->
        <!-- hide adalah fungsi bootstrap 3, klo bootstrap 4 pake invisible  -->
        <div class="copy hide">
            <div class="control-group">
            <div class="form-group">
				<label>Judul</label>
				<select class="form-control" name="id" id="id" required>
					<option value="">--Pilih--</option>
					<?php
					$id= mysqli_query($koneksi,"select * from buku where buku_stok !='0'");
					while($f = mysqli_fetch_array($id)){
						?>
						<option value="<?php echo $f['buku_id'] ?>"><?php echo $f['buku_nama']; ?> <?php echo $f['buku_stok']; ?></option>
						<?php
					}
					?>
				</select>
			</div>
			<div class="form-group" id="buku">
				<label>Data</label>
				<input class="form-control" name="jurusan"  required>
                <label>Stok</label>
				<input class="form-control" name="jurusan"  required>	
			</div>
              <br>
              <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
              <hr>
            </div>
          </div>
        </div>
    </div>
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
	
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	
	
 
	<script type="text/javascript">
		$('#id').change(function() { 
			var id = $(this).val(); 
			$.ajax({
				type: 'POST', 
				url: 'http://localhost/triffbook/grafik/ajax_buku.php', 
				data: 'buku_id=' + id, 
				success: function(response) { 
					$('#buku').html(response); 
				}
			});
		});
	</script>
 
</body>
</html>