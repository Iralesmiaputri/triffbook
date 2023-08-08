<?php 
include("koneksi.php");
$id = $_POST['buku_id'];
$tampil=mysqli_query($koneksi,"SELECT * FROM buku WHERE buku_id='$id'");
$jml=mysqli_num_rows($tampil);
 
if($jml > 0){    
    while($r=mysqli_fetch_array($tampil)){
        ?>
        <label>Harga</label>
        <input type="text" class="form-control"  value="<?php echo $r['buku_harga_jual'] ?>">
        <label>Stok</label>
        <input type="text" class="form-control"  value="<?php echo $r['buku_stok'] ?>">
        <?php        
    }
}else{
    echo "<option selected>- Data Wilayah Tidak Ada, Pilih Yang Lain -</option>";
}
 
?>