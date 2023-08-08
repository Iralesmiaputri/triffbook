<div class="content-wrapper">
   <section class="content-header">
      <h1>
         buku
         <small>Jual</small>
      </h1>
   </section>
   <section class="content">
      <div class="row">
         <div class="col-lg-12">
            <a href="<?php echo base_url().'dashboard/jual'; ?>" class="btn
               btn-sm btn-primary">Kembali</a>
            <br/>
            <br/>
            <div class="box box-primary">
               <div class="box-header">
                  <h3 class="box-title">Jual</h3>
               </div>
               <div class="box-body">
                  <form method="post" action="<?php echo base_url('dashboard/buku_jual_validasi') ?>">
							<div class="form-group-book">
								<div class="row first-item">
									<div class="col-md-11">
										<div class="form-group">
											<label>Jenis buku</label>
											<select class="form-control" name="buku[]"  required>
												<option value="">- Judul buku</option>
												<?php foreach($jual as $k){ 
													if ($k->buku_stok>0){?>
													<option <?php if(set_value('buku') == $k->buku_id){echo "selected='selected'";} ?> value="<?php echo $k->buku_id ?>">
															<?php echo $k->buku_nama; ?>
														</option>
												<?php }} ?>
											</select>
											<?php echo form_error('buku'); ?>       
										</div>
									</div>
									<div class="col-md-1">
										<label>&nbsp;</label>
										<br/>
										<a href="#" class="btn btn-success add-book" onclick="addBook()" style="width: 100%">+</a>
									</div>
								</div>
							</div>
                     <div class="form-group">
                           <label>Pembeli</label>
                           <select class="form-control" name="pembeli"  required>
                           <option value="">- Pembeli</option>
                           <?php foreach($pembeli as $k){ ?>
                              <option <?php if(set_value('pengguna') == $k->pengguna_id){echo "selected='selected'";} ?> value="<?php echo $k->pengguna_id ?>">
                                    <?php echo $k->pengguna_nama; ?>
                                 </option>
                           <?php } ?>
                        </select>
                           <?php echo form_error('pengguna'); ?>
                        </div>
                        <div class="form-group">
                           <label>Tanggal Jual</label>
                           <input type="date" name="tgl" class="form-control" value="<?php echo date('Y-m-d') ?>" readonly >
                           <?php echo form_error('tgl'); ?>
                        </div>
                     <div class="box-footer">
                        <input type="submit"
                           class="btn btn-success" value="Lanjut">
                     </div>
                  </form>
                 
               </div>
            </div>
         </div>
      </div>
   </section>
</div>

<script>
	function addBook() {
		const template = `
		<div class="second-item">
			<div class="row">
				<div class="col-md-11">
					<div class="form-group">
							<label>Jenis buku</label>
							<select class="form-control" name="buku[]"  required>
							<option value="">- Judul buku</option>
							<?php foreach($jual as $k){ 
								if ($k->buku_stok>0){?>
								
								<option <?php if(set_value('buku') == $k->buku_id){echo "selected='selected'";} ?> value="<?php echo $k->buku_id ?>">
									<?php echo $k->buku_nama; ?>
								</option>
							<?php }} ?>
						</select>
						<?php echo form_error('buku'); ?>       
					</div>
				</div>
				<div class="col-md-1">
					<label>&nbsp;</label>
					<br/>
					<a href="#" class="btn btn-danger remove-book" onclick="onDelete()" style="width: 100%"><i class="fa fa-trash"></i></a>
				</div>
			</div>
		</div>
		`;

		$('.form-group-book').append(template);
	}

	function onDelete() {
		const parent = event.target.parentNode;
		parent.parentNode.parentNode.remove();
	}
</script>
