

<?php
if($this->session->userdata('level') == "admin"){
	?>

	<div class="content-wrapper">
		<section class="content-header">
			<h1>
				Dashboard
				<small>Control panel</small>
			</h1>
		</section>
		<section class="content">
		<?php
               if(isset($_GET['alert'])){
                  if($_GET['alert']=="done"){
                     echo "<div class='alert alert-success font-weight-bold text-center'>Berhasil Set Saldo.</div>";
                  }
               }
               ?>
			<div class="row">
			<div class="col-lg-12">
			<div class="box box-success">
			<div class="box-body">

			<div class="col-lg-12">
			<h3>Buku Terlaris</h3>
			<table class="table ">
           <thead>
            <tr>
             <th width="50%" id="judul">Judul buku</th>
             <th width="20%" id="judul">Terjual</th>
           </tr>
         </thead>
         <tbody>
           <?php 
           foreach($terlaris as $p){ 
            ?>
            <tr>
             <td><?php echo $p->buku_nama; ?></td>
             <td><?php echo $p->jumlah; ?></td>     
           </tr>
         <?php }?>
      </tbody>
    </table>
		   </div>
				<?php
				if($this->session->userdata('level') == "admin"){

					?>
			
					<div class="col-lg-4 col-xs-6">
						<div class="small-box bg-blue">
							<div class="inner">
								<?php        
								foreach($saldo2 as $p){
									?>
									<h3>Rp <?php echo number_format($p->saldo, 0,'.','.') ?></h3>
									<p>Saldo Bank</p>
								<?php }?>
							</div>
							<div class="icon">
								<i class="ion ion-soup-can-outline"></i>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-xs-6">
						<div class="small-box bg-green">
							<div class="inner">
								<?php        
								foreach($saldo3 as $p){
									?>
									<h3>Rp <?php echo number_format($p->saldosebelum, 0,'.','.') ?></h3>
									<p>Saldo Sebelum</p>
								<?php }?>
							</div>
							<div class="icon">
								<i class="ion ion-soup-can-outline"></i>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-xs-6">
									<div class="small-box bg-blue">
										<div class="icon">

										</div>
									</div>
								</div>
								<div class="col-lg-4 col-xs-6">
									<div class="small-box ">
										<div class="inner">

											<h4>TRIFFBOOK <img src="<?php echo base_url(); ?>assets/dist/img/jamkrida2.png" width='15%'>		</h4>
											<p>v.2.0.00</p>

										</div>
										<div class="icon">
										</div>
									</div>
								</div>

				<div class="col-lg-12 col-xs-6">
				<?php 
				require 'grafik_bulan.php';
				?>
				</div>
					<br>
				<?php } ?>
				<div class="col-lg-12	 col-xs-6">
					<div class="small-box bg-green">
						<div class="inner">
							<?php
							$id_user = $this->session->userdata('id');
							$user = $this->db->query("select * from pengguna
								where pengguna_id='$id_user'")->row();
								?>
								<h3> <marquee> Selamat Datang <?php echo $user->pengguna_nama; ?> !!!</marquee></h3>
							</div>
							<div class="icon">

							</div>
						</div>
					</div>
					</div>
					</div>
					</div>

					<div class="col-lg-12">
						<div class="box box-success">
							<div class="box-header">
							</div>
							<div class="box-body">
								<h3 align="center">TRIFFBOOK </h3>
								<div class="table-responsive">
									<p align="center"> <img src="<?php echo base_url(); ?>assets/dist/img/jamkrida2.png" width='20%'></p>
									<p align="center">Selayang Pandang :</p>
									
									<p align="justify">Selamat datang di TriffBook, toko jual beli buku yang menjadi surga bagi para pencinta literatur. Dalam lingkungan yang nyaman dan penuh inspirasi, TriffBook hadir untuk memenuhi hasrat Anda akan pengetahuan, imajinasi, dan petualangan dalam halaman-halaman buku.
														</p>
														<p align="justify">Ketika melangkah ke dalam TriffBook, Anda akan segera terpesona oleh suasana yang akrab dan hangat. Interior toko yang terang dan rak-rak buku yang dipenuhi dengan karya-karya istimewa menciptakan suasana yang memikat, memanjakan indra penglihatan Anda, dan mengundang Anda untuk memulai petualangan literatur.</p>

														<p align="justify">Di TriffBook, kami menawarkan beragam buku yang memenuhi selera dan minat beragam pembaca. Dari fiksi hingga non-fiksi, dari novel-novel klasik hingga karya kontemporer, dari buku-buku seni hingga buku-buku sejarah yang mendalam, kami memiliki koleksi yang melimpah untuk memenuhi hasrat intelektual Anda. Staf kami yang ramah dan berpengetahuan luas siap membantu Anda menavigasi melalui ragam pilihan buku kami, memberikan saran berdasarkan minat Anda, dan memastikan Anda menemukan karya-karya yang sesuai dengan ekspektasi dan keinginan Anda.</p>

														<p align="justify">Di samping penjualan buku baru, TriffBook juga menawarkan buku bekas berkualitas tinggi yang masih dalam kondisi prima. Dalam upaya kami untuk mendaur ulang dan memberikan penghormatan kepada karya-karya lama, kami menyediakan peluang bagi buku-buku yang telah memberi pengaruh besar kepada pemilik sebelumnya untuk menemukan pemilik baru yang akan menyambutnya dengan hangat. Setiap buku bekas di TriffBook memiliki cerita sendiri dan menawarkan peluang bagi pembaca untuk merasakan kisah dan perjalanan yang telah dijalani oleh buku tersebut.</p>

														<p align="justify">Selain itu, TriffBook juga menjadi tempat di mana para pecinta buku dapat berkumpul dan berinteraksi melalui berbagai acara dan kegiatan komunitas. Diskusi buku, bincang penulis, lokakarya kreatif, dan pertemuan tematik lainnya menjadi ajang untuk berbagi pemikiran, inspirasi, dan perspektif. TriffBook ingin menjadi jantung komunitas buku yang bersemangat, tempat di mana pengetahuan dan ide-ide dapat terus berkembang dan saling menginspirasi.</p>

														<p align="justify">Kami mengundang Anda untuk merasakan keajaiban literatur di TriffBook, menelusuri halaman-halaman buku yang menarik hati, dan menemukan dunia baru yang menanti untuk dijelajahi. Di TriffBook, kami berkomitmen untuk memberikan pengalaman belanja yang memuaskan dan menarik bagi para pencinta buku. Selamat datang di rumah bagi para penjelajah kata-kata dan pemikir yang haus akan pengetahuan! Selamat menikmati petualangan membaca di TriffBook!</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			
			</div><?php } ?>

			<?php
			if($this->session->userdata('level') == "nasabah"){
				?>

				<div class="content-wrapper">
					<section class="content-header">
						<h1>
							Dashboard
							<small>Control panel</small>
						</h1>
					</section>
					<?php 
					 if(isset($_GET['alert'])){
						if($_GET['alert']=="done"){
						   echo "<div class='alert alert-success font-weight-bold text-center'>Berhasil Penarikan akan diproses 1x24 jam.</div>";
						}else if($_GET['alert']=="gagal"){
						   echo "<div class='alert alert-danger font-weight-bold text-center'>Maaf Saldo Anda Kurang.</div>";
						}else if($_GET['alert']=="saran"){
							echo "<div class='alert alert-success font-weight-bold text-center'>Terimakasih atas saran dan masukannya.</div>";
						 }
					}
					?>
					
							<div class="col-lg-12	 col-xs-6">
								<div class="small-box bg-green">
									<div class="inner">
										<?php
										$id_user = $this->session->userdata('id');
										$user = $this->db->query("select * from pengguna
											where pengguna_id='$id_user'")->row();
											?>
											<h3> <marquee> Selamat Datang <?php echo $user->pengguna_nama; ?> !!!</marquee></h3>
										</div>
										<div class="icon">

										</div>
									</div>
								</div>

								<div class="col-lg-4 col-xs-6">
									<div class="small-box bg-blue">
										<div class="inner">
											<?php        
											foreach($saldo as $p){
												?>
												<h3>Rp <?php echo number_format($p->saldo, 0,'.','.') ?></h3>
												<p>Saldo Anda</p>
											<?php }?>
										</div>
										<div class="icon">
											<i class="ion ion-soup-can-outline"></i>
										</div>
									</div>
								</div>
								<div class="col-lg-4 col-xs-6">
									<div class="small-box bg-blue">

										<div class="icon">

										</div>
									</div>
								</div>
								<div class="col-lg-4 col-xs-6">
									<div class="small-box ">
										<div class="inner">

											<h4>TRIFFBOOK <img src="<?php echo base_url(); ?>assets/dist/img/jamkrida2.png" width='15%'>		</h4>
											<p>v.2.0.00</p>

										</div>
										<div class="icon">
										</div>
									</div>
								</div>

					
					<section class="content">
						<div class="row">

						<div class="col-lg-8">
									<div class="box box-success">
									<div class="box-body">
					<h3>Saran Anda</h3>
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
                              if ($p->pengguna_id==$this->session->userdata('id')){
                           ?>
                        <tr>
                           <td><?php echo
                              $no++; ?></td>
                           <td><?php echo $p->pengguna_nama; ?></td>
                           <td><?php echo $p->isi; ?></td>
                           <td><?php echo date('d-M-Y', strtotime($p->tgl)); ?> / Jam :<?php echo date('h:i:sa', strtotime($p->tgl)); ?></td>
                           <td>
                              <?php if ($p->status==1){?>
                                 <a class="btn btn-warning btnsm"> Belum Ditanggapi </a>
                              <?php }else{?>
                              <a class="btn btn-success btnsm">  Sudah  Ditanggapi </a>
                              <?php }?>
                           </td>
                        </tr> 
                        <?php }} ?>
                     </tbody>
                  </table>
							  </div>
							  </div>
							  </div>
						<div class="col-lg-4">
						<div class="box box-success">
										<div class="box-body">
						<h3>Buku Terlaris</h3>
						<table class="table ">
					<thead>
						<tr>
						<th width="50%" id="judul">Judul buku</th>
						<th width="20%" id="judul">Terjual</th>
					</tr>
					</thead>
					<tbody>
					<?php 
					foreach($terlaris as $p){ 
						?>
						<tr>
						<td><?php echo $p->buku_nama; ?></td>
						<td><?php echo $p->jumlah; ?></td>     
					</tr>
					<?php }?>
				</tbody>
				</table>
		   </div>
		   </div>
		   </div></div>
		   <div class="row">
		   <div class="col-lg-6">
									<div class="box box-success">
									<div class="box-body">
					<h3>Buku Tersedia</h3>
					<table id="example3" class="display nowrap table-striped table-bordered table" style="width:100%">
                     <thead>
                        <tr>
                           <th width="1%">NO</th>
                           <th>Judul buku</th>
                           <th>Kategori buku</th>
						   <th>Rak</th>
                           <th>Stok</th>  
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
                           <td><?php echo $p->buku_stok; ?> Pcs</td>
                        </tr>
                        <?php } ?>
                     </tbody>
                  </table>
							  </div>
							  </div>
							  </div>
							  <div class="col-lg-6">
									<div class="box box-success">
										<div class="box-body">
												<h3 align="center">DATA PENARIKAN ANDA</h3>
												<div class="table-responsive">
												<table id="example2" class="display nowrap table-striped table-bordered table" style="width:100%">
														<thead>
															<tr>
																<th width="1%">NO</th>
																<th>Nama</th>
																<th>Total Penarikan</th>
																<th>Tanggal Penarikan</th>
																<th>Keterangan</th>
																<th>Bukti</th>

															</tr>
														</thead>
														<tbody>
															<?php
															$no = 1;
															foreach($tarik as $p){
																if($this->session->userdata('id') == $p->pengguna_id){
																	?>
																	<tr>
																		<td><?php echo
																		$no++; ?></td>
																		<td><?php echo $p->pengguna_nama; ?></td>
																		<td>Rp <?php echo number_format($p->tarik_jumlah, 0,'.','.') ?> + Rp <?php echo number_format($p->cash, 0,'.','.') ?>(Uang Cash)</td>
																		<td><?php echo date('d-M-Y', strtotime($p->tarik_tgl)); ?></td>
																		<td><?php echo $p->tarik_ket; ?></td>
																		<td>
                           <?php if($p->bukti=="" and $p->penanggung_jawab !="" ){
                              ?>
							   <a class="btn btn-warning btnsm"> Belum Transfer </a>
                              
                              <?php }else if ($p->bukti!="" and $p->penanggung_jawab !="" )  {?>
								<a class="btn btn-success btnsm"> Sudah Transfer </a><br><br>
								 <img width="100%" class="img-responsive" src="<?php echo base_url().'/bukti/'.$p->bukti;
                           ?>">
                            <?php  } else if ($p->bukti=="" and $p->penanggung_jawab=="" ){?>
                              Membeli Buku
                              <?php  }?>
                           </td>
																	</tr>
																<?php }} ?>
															</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<div class="box box-success">
										<div class="box-body">
											<h3 align="center">DATA SETORAN ANDA</h3>
											<div class="table-responsive">

												<table class="table table-bordered">
													<thead>
														<tr>
															<th width="1%">NO</th>
															<th>Penyetor</th>
															<th>Judul Buku</th>
															<th>Keterangan</th>
															<th>Pcs </th>
															<th>Tanggal Menjual</th>
															<th>Total Harga </th>
														</tr>
													</thead>
													<tbody>
														<?php
														$no = 1;
														foreach($setor as $p){
															if($this->session->userdata('id') == $p->pengguna_id){
																?>
																<tr>
																	<td><?php echo
																	$no++; ?></td>
																	<td><?php echo $p->pengguna_nama; ?></td>
																	<td><?php echo $p->buku_nama; ?></td>
																	<td><?php echo $p->setor_ket; ?></td>
																	<td><?php echo $p->setor_berat; ?> Pcs</td>
																	<td><?php echo date('d-M-Y', strtotime($p->setor_tgl)); ?></td>
																	<td>Rp <?php echo number_format($p->setor_jumlah, 0,'.','.') ?></td>

																</tr>
															<?php }} ?>
														</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
								
									<div class="col-lg-6">
									<div class="box box-success">
										<div class="box-body">
												<h3 align="center">DATA PEMBELIAN BUKU ANDA</h3>
												<div class="table-responsive">
												<table id="example2" class="display nowrap table-striped table-bordered table" style="width:100%">
														<thead>
															<tr>
																<th width="1%">NO</th>
																<th>Judul Buku</th>
																<th>Tanggal Pembelian</th>
															</tr>
														</thead>
														<tbody>
															<?php
															$no = 1;
															foreach($pembelian as $p){
																if($this->session->userdata('id') == $p->pengguna_id){
																	?>
																	<tr>
																		<td><?php echo
																		$no++; ?></td>
																		<td><?php echo $p->buku_nama; ?></td>
																		<td><?php echo date('d-M-Y', strtotime($p->jual_tgl)); ?></td>
																	</tr>
																<?php }} ?>
															</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-12">
										<div class="box box-success">
											<div class="box-body">
													<h3 align="center">TRIFFBOOK</h3>
												<div class="table-responsive">
														<p align="center"> <img src="<?php echo base_url(); ?>assets/dist/img/jamkrida2.png" width='20%'></p>
														<p align="center">Selayang Pandang :</p>
														<p align="justify">Selamat datang di TriffBook, toko jual beli buku yang menjadi surga bagi para pencinta literatur. Dalam lingkungan yang nyaman dan penuh inspirasi, TriffBook hadir untuk memenuhi hasrat Anda akan pengetahuan, imajinasi, dan petualangan dalam halaman-halaman buku.
														</p>
														<p align="justify">Ketika melangkah ke dalam TriffBook, Anda akan segera terpesona oleh suasana yang akrab dan hangat. Interior toko yang terang dan rak-rak buku yang dipenuhi dengan karya-karya istimewa menciptakan suasana yang memikat, memanjakan indra penglihatan Anda, dan mengundang Anda untuk memulai petualangan literatur.</p>

														<p align="justify">Di TriffBook, kami menawarkan beragam buku yang memenuhi selera dan minat beragam pembaca. Dari fiksi hingga non-fiksi, dari novel-novel klasik hingga karya kontemporer, dari buku-buku seni hingga buku-buku sejarah yang mendalam, kami memiliki koleksi yang melimpah untuk memenuhi hasrat intelektual Anda. Staf kami yang ramah dan berpengetahuan luas siap membantu Anda menavigasi melalui ragam pilihan buku kami, memberikan saran berdasarkan minat Anda, dan memastikan Anda menemukan karya-karya yang sesuai dengan ekspektasi dan keinginan Anda.</p>

														<p align="justify">Di samping penjualan buku baru, TriffBook juga menawarkan buku bekas berkualitas tinggi yang masih dalam kondisi prima. Dalam upaya kami untuk mendaur ulang dan memberikan penghormatan kepada karya-karya lama, kami menyediakan peluang bagi buku-buku yang telah memberi pengaruh besar kepada pemilik sebelumnya untuk menemukan pemilik baru yang akan menyambutnya dengan hangat. Setiap buku bekas di TriffBook memiliki cerita sendiri dan menawarkan peluang bagi pembaca untuk merasakan kisah dan perjalanan yang telah dijalani oleh buku tersebut.</p>

														<p align="justify">Selain itu, TriffBook juga menjadi tempat di mana para pecinta buku dapat berkumpul dan berinteraksi melalui berbagai acara dan kegiatan komunitas. Diskusi buku, bincang penulis, lokakarya kreatif, dan pertemuan tematik lainnya menjadi ajang untuk berbagi pemikiran, inspirasi, dan perspektif. TriffBook ingin menjadi jantung komunitas buku yang bersemangat, tempat di mana pengetahuan dan ide-ide dapat terus berkembang dan saling menginspirasi.</p>

														<p align="justify">Kami mengundang Anda untuk merasakan keajaiban literatur di TriffBook, menelusuri halaman-halaman buku yang menarik hati, dan menemukan dunia baru yang menanti untuk dijelajahi. Di TriffBook, kami berkomitmen untuk memberikan pengalaman belanja yang memuaskan dan menarik bagi para pencinta buku. Selamat datang di rumah bagi para penjelajah kata-kata dan pemikir yang haus akan pengetahuan! Selamat menikmati petualangan membaca di TriffBook!</p>
													</div>
												</div>
											</div>
										</div>
								</section>
							</div>
						<?php } ?>