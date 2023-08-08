<div class="content-wrapper">
	<section class="content-header">
		<h1>
			Form
			<small>Validasi</small>
		</h1>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-lg-12">
				<a href="<?php echo base_url().'dashboard/buku_jual'; ?>" class="btn
               btn-sm btn-primary">Kembali</a>
				<br />
				<br />
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Form Validasi</h3>
					</div>
					<form method="post" action="<?php echo base_url('dashboard/buku_jual_aksi') ?>">
						<div class="box-body">
							<div class="container">
							<div class="panel panel-default">
								<div class="panel-heading">Informati Pembelian</div>
									<div class="panel-body">
										<div class="control-group after-add-more">
											<?php foreach($jual as $p){ ?>
											<div class="form-group">
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label>Judul Buku</label>
															<input type="hidden" name="id[]" value="<?php echo $p->buku_id; ?>">
															<input type="hidden" name="stok[]" id="stok-<?= $p->buku_id ?>" class="form-control"
																placeholder="Masukkan Harga Beli / Kg .." value="<?php echo $p->buku_stok; ?>">
															<input type="text" name="namabuku[]" class="form-control"
																value="<?php echo $p->buku_nama; ?>" readonly>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label>Harga Buku</label>
															<input type="number" name="harga[]" class="form-control" id="harga-<?= $p->buku_id ?>"
																value="<?php echo $p->buku_harga_jual; ?>" readonly>
														</div>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label>Stok buku</label>
												<input type="text" name="stockbuku[]" class="form-control"
													value="<?php echo $p->buku_stok; ?> Pcs" readonly>
											</div>
											<div class="form-group">
												<label>Total pcs Penjualan</label>
												<br>
												<input type="text" name="berat[]" class="form-control"
													placeholder="Masukkan Jumlah buku .." required id="pcs-<?= $p->buku_id ?>" value="0" onkeyup="sum();">
											</div>
											<div class="form-group">
												<label>Total Harga</label>
												<br>
												<input class="form-control sum" name="jumlahtotal[]" type="text" value="0" id="totalharga-<?= $p->buku_id ?>" readonly />
											</div>
											<hr/>
											<?php }?>
										</div>
									</div>
								</div>
								<div class="panel panel-default">
									<div class="panel-heading">Total Yang Harus Dibayar</div>
									<div class="panel-body">
										<div class="form-group">
											<label>Total Belanja</label>
											<br>
											<input class="form-control" name="totalpembayaran" type="text" id="txt4" readonly />
										</div>
									</div>
								</div>
								<div class="panel panel-default">
									<div class="panel-heading">Informasi Lainnya</div>
									<div class="panel-body">
										<!-- membuat form  -->
										<!-- gunakan tanda [] untuk menampung array  -->
											<div class="control-group after-add-more">

												<?php foreach($bank as $p){ ?>
												<div class="form-group">
													<label>Saldo Bank Saat Ini</label>
													<input type="hidden" name="id_bank" value="<?php echo $p->pengguna_id; ?>">
													<input type="hidden" name="saldobank" class="form-control"
														placeholder="Masukkan Jenis buku .." value="<?php echo $p->saldo; ?>">
													<input type="text" name="saldobank" class="form-control"
														placeholder="Masukkan Jenis buku .." value="<?php echo $p->saldo; ?>" disabled>
													<?php echo form_error('nama'); ?>
												</div>
												<?php }?>
												<?php foreach($pembeli as $p){ ?>
												<div class="form-group">
													<label>Pembeli<input type="text" class="form-control" name="nama_pembeli"
															value="<?php echo $p->pengguna_nama; ?>" readonly></label>
													<input type="hidden" name="id_pembeli" value="<?php echo $p->pengguna_id; ?>">
													<label>Saldo Pembeli<input type="text" name="saldopembeli" class="form-control"
															placeholder="Masukkan Jenis buku .." value="<?php echo $p->saldo; ?>"
															readonly>
														<?php echo form_error('pembeli'); ?></label>
												</div>
												<?php }?>
												<?php foreach($id as $p){ ?>
												<div class="form-group">
													<input type="hidden" name="id_nota" value="<?php echo $p->id; ?>">
												</div>
												<?php }?>
												<?php foreach($nota as $p){ ?>
												<div class="form-group">
													<input type="hidden" name="no_nota" value="<?php echo $p->no_nota; ?>">
												</div>
												<?php }?>

												<div class="form-group">
													<label>Keterangan</label>
													<input type="text" name="ket" class="form-control" value="Terjual"
														placeholder="Masukkan Keterangan Jika Ada..">
													<?php echo form_error('ket'); ?>
												</div>


												<?php if(!empty($event)) { ?>
												<?php foreach($event as $e){ ?>
												<div class="form-group">
													<input type="hidden" name="event" value="<?php echo $e->event_id; ?>">
													<input type="hidden" name="diskon" value="<?php echo $e->diskon; ?>">
													<input type="text" name="namaevent" class="form-control"
														value="<?php echo $e->event_nama; ?>" readonly>
													<input type="text" name="tgl" class="form-control"
														value="<?php echo $e->event_tgl; ?>" readonly>
													<?php echo form_error('event'); ?>
												</div>
												<?php }}else{?>
												<input type="date" name="tgl" class="form-control" value="<?php 
											echo date('Y-m-d'); ?>" readonly>
												<?php }?>
											</div>

											<br>
											<!-- <button class="btn btn-success add-more" type="button">
					<i class="glyphicon glyphicon-plus"></i> Add
					</button> -->
											<hr>
											<button class="btn btn-success" type="submit">Submit</button>
									</div>
									<!-- class hide membuat form disembunyikan  -->
									<!-- hide adalah fungsi bootstrap 3, klo bootstrap 4 pake invisible  -->
									<div class="copy hide">
										<div class="control-group">
											<label>Nama</label>
											<input type="text" name="nama[]" class="form-control">
											<label>Jenis Kelamin</label>
											<input type="text" name="jk[]" class="form-control">
											<label>Alamat</label>
											<input type="text" name="alamat[]" class="form-control">
											<br>
											<button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
											<hr>
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
				<!-- fungsi javascript untuk menampilkan form dinamis  -->
				<!-- penjelasan : saat tombol add-more ditekan, maka akan memunculkan div dengan class copy -->
				<script type="text/javascript">
					$(document).ready(function () {
						$(".add-more").click(function () {
							var html = $(".copy").html();
							$(".after-add-more").after(html);
						});

						// saat tombol remove dklik control group akan dihapus 
						$("body").on("click", ".remove", function () {
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
