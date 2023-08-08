<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta'); 
		$this->load->model('m_data');
		if($this->session->userdata('status')!="telah_login"){
			redirect(base_url()."login?alert=belum_login");
		}
	}
	public function index()
	{	
		$data['terlaris'] = $this->db->query("SELECT buku_nama, sum(jual_berat) AS jumlah FROM jual,buku where buku_id=jual_buku GROUP BY buku_id order by jumlah desc limit 10")->result();
		$data['saran'] = $this->db->query("SELECT * FROM pengguna,saran where pengguna_id=pengguna_saran order by id desc")->result();
		$id_pengguna = $this->session->userdata('id');
		$data['saldo'] = $this->db->query("SELECT * FROM pengguna where pengguna_id='$id_pengguna'")->result();
		$data['saldo2'] = $this->db->query("SELECT * FROM pengguna where pengguna_id='1'")->result();
		$data['saldo3'] = $this->db->query("SELECT * FROM logsetsaldo order by id desc limit 1")->result();
		$data['setor'] = $this->db->query("SELECT * FROM pengguna,buku,setor where pengguna_id=setor_pengguna and setor_buku=buku_id order by setor_id desc")->result();
		$data['buku'] = $this->db->query("SELECT * FROM buku,kategori where kategori_id=kategori and buku_stok!='0' order by kategori desc")->result();
		$data['tarik'] = $this->db->query("SELECT * FROM pengguna,tarik where pengguna_id=tarik_pengguna order by tarik_id desc")->result();

		$data['pembelian'] = $this->db->query("SELECT * FROM pengguna,jual,buku where pengguna_id=pembeli and buku_id=jual_buku order by jual_tgl desc")->result();
		
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_index',$data);
		$this->load->view('dashboard/v_footer');
	} 
	public function keluar()
	{
		$this->session->sess_destroy();
		redirect('login?alert=logout'); 
	}
	public function ganti_password()
	{
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_ganti_password');
		$this->load->view('dashboard/v_footer');
	}
	public function ganti_password_aksi()
	{
		// form validasi
		$this->form_validation->set_rules('password_lama','Password Lama','required');
		$this->form_validation->set_rules('password_baru','Password Baru','required|min_length[8]');
		$this->form_validation->set_rules('konfirmasi_password','Konfirmasi Password
			Baru','required|matches[password_baru]');
		// cek validasi
		if($this->form_validation->run() != false){
			// menangkap data dari form
			$password_lama = $this->input->post('password_lama');
			$password_baru = $this->input->post('password_baru');
			$konfirmasi_password = $this->input->post('konfirmasi_password');
			// cek kesesuaian password lama dengan id pengguna yang sedang login dan password lama
			$where = array(
				'pengguna_id' => $this->session->userdata('id'),
				'pengguna_password' => md5($password_lama)
			);
			$cek = $this->m_data->cek_login('pengguna', $where)->num_rows();
			// cek kesesuaikan password lama
			if($cek > 0){
				// update data password pengguna
				$w = array(
					'pengguna_id' => $this->session->userdata('id')
				);
				$data = array(
					'pengguna_password' => md5($password_baru)
				);
				$this->m_data->update_data($where, $data, 'pengguna');
				// alihkan halaman kembali ke halaman ganti password
				redirect('dashboard/ganti_password?alert=sukses');
			}else{
				// alihkan halaman kembali ke halaman ganti password
				redirect('dashboard/ganti_password?alert=gagal');
			}
		}else{
			$this->load->view('dashboard/v_header');
			$this->load->view('dashboard/v_ganti_password');
			$this->load->view('dashboard/v_footer');
		}
	}

	public function profil()
	{
		// id pengguna yang sedang login
		$id_pengguna = $this->session->userdata('id');
		$where = array(
			'pengguna_id' => $id_pengguna
		);
		$data['profil'] = $this->m_data->edit_data($where,'pengguna')->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_profil',$data);
		$this->load->view('dashboard/v_footer');
	}
	function profil_update()
	{
	
		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('email','Email','required');
		$id = $this->session->userdata('id');
			if($this->form_validation->run() != false){
			$nama = $this->input->post('nama');
			$email = $this->input->post('email');
			$rek = $this->input->post('rek');
			$fotolama= $this->input->post('fotolama');
				$where = array(
					'pengguna_id' => $id
				);
				$data = array(
				'pengguna_nama' => $nama,
				'pengguna_email' => $email,
				'pengguna_rek' => $rek );
				$this->m_data->update_data($where,$data,'pengguna');
				if (!empty($_FILES['sampul']['name'])){
					$config['upload_path'] = './profil/';
					$config['allowed_types'] = 'gif|jpg|png|jpeg';
					$this->load->library('upload', $config);
					if ($this->upload->do_upload('sampul')) {
	// mengambil data tentang gambar
						$gambar = $this->upload->data();
						$data = array(
							'pengguna_foto' => $gambar['file_name'],
						);
						$path_to_file = './profil/'.$fotolama;
						unlink($path_to_file);
						$this->m_data->update_data($where,$data,'pengguna');
						redirect(base_url().'dashboard/profil?alert=sukses');
					} else {
						$this->form_validation->set_message('sampul',
							$data['gambar_error'] = $this->upload->display_errors());
						$where = array(
							'pengguna_id' => $id
						);
						$data['profil'] = $this->m_data->edit_data($where,'pengguna')->result();
					
						$this->load->view('dashboard/v_header');
						$this->load->view('dashboard/v_profil',$data);
						$this->load->view('dashboard/v_footer');
					}
				}else{
				redirect(base_url().'dashboard/profil?alert=sukses');
				}
			}else{
				$where = array(
							'pengguna_id' => $id
						);
						$data['profil'] = $this->m_data->edit_data($where,'pengguna')->result();
					
						$this->load->view('dashboard/v_header');
						$this->load->view('dashboard/v_profil',$data);
						$this->load->view('dashboard/v_footer');
			}
		}
		public function logsetsaldo()
		{	
	
			$data['set']= $this->db->query("SELECT * FROM  pengguna,logsetsaldo where pengguna_id=pengguna  order by tgl desc")->result();
			
	
			$this->load->view('dashboard/v_header');
			$this->load->view('dashboard/logsetsaldo',$data);
			$this->load->view('dashboard/v_footer');
		}	
	//-------------------------------------Jual-----------------------------------------------------
	public function bayar($id)
	{   
		$data['bank'] = $this->db->query("SELECT * FROM pengguna where pengguna_id='1'")->result();
		$data['saldo'] = $this->db->query("SELECT * FROM nota,pengguna where id =$id and pengguna=pengguna_id")->result();
		$data['buku'] = $this->db->query("SELECT * FROM jual,buku where kode_jual =$id and buku_id=jual_buku")->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_bayar',$data);
		$this->load->view('dashboard/v_footer');
	}
	public function jual()
	{	

		$data['jualgroup']= $this->db->query("SELECT * FROM  pengguna inner join jual inner join nota inner join buku left join retur on jual_id=retur_jual left join event_buku on event_id=jual_event where buku_id=jual_buku and pengguna_id=pembeli  and kode_jual=id group by kode_jual order by jual_id desc")->result();

		$data['jual'] = $data['jual'] = $this->db->query("SELECT * FROM  jual inner join buku left join retur on jual_id=retur_jual left join event_buku on event_id=jual_event where buku_id=jual_buku order by jual_id desc")->result();

		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_jual',$data);
		$this->load->view('dashboard/v_footer');
	}	
	public function buku_jual()
	{   
		
		$data['jual'] = $this->db->query("SELECT * FROM buku order by buku_nama asc")->result();
		$data['pembeli'] = $this->db->query("SELECT * FROM pengguna where pengguna_level !='admin'")->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_buku_jual',$data);
		$this->load->view('dashboard/v_footer');
	}
	public function tambah_buku($id)
	{   
		$data['jual'] = $this->db->query("SELECT * FROM buku order by buku_nama asc")->result();
		$data['nota'] = $this->db->query("SELECT * FROM nota where id =$id")->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_buku_jual_tambah',$data);
		$this->load->view('dashboard/v_footer');
	}
	public function buku_jual_validasi2()
	{	
		
		$buku = $this->input->post('buku');
		$pembeli = $this->input->post('pembeli');
		$nota = $this->input->post('id_nota');
		$tgl = $this->input->post('tgl');
		$data['jual'] = $this->db->query("SELECT * FROM buku where buku_id=$buku")->result();
		$data['event'] = $this->db->query("SELECT * FROM event_buku where event_tgl between '	
		$tgl' and '$tgl'")->result();
		$data['nota'] = $this->db->query("SELECT * FROM nota where id=$nota")->result();
		$data['pembeli'] = $this->db->query("SELECT * FROM pengguna where pengguna_id=$pembeli")->result();
		$data['bank'] = $this->db->query("SELECT * FROM pengguna where pengguna_id=1 ")->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_jual_validasi2',$data);
		$this->load->view('dashboard/v_footer');

	}
	public function buku_jual_validasi()
	{	
		
		$buku = $this->input->post('buku');
		$pembeli = $this->input->post('pembeli');
		$tgl = $this->input->post('tgl');

		$ids = implode("','", $buku);

		//create nota
		$data = array ('pengguna' => $pembeli, 'tgl' => $tgl );

		$this->m_data->insert_data($data,'nota');
		
		$data['id']= $this->db->query("SELECT * FROM `nota` WHERE id=(SELECT MAX(id) FROM `nota`)")->result();
		$data['nota'] = $this->db->query("SELECT * FROM `nota` WHERE  no_nota=(SELECT MAX(no_nota) FROM `nota` where tgl between '	
		$tgl' and '$tgl') order by no_nota desc limit 1")->result();
		$data['jual'] = $this->db->query("SELECT * FROM buku where buku_id in ('$ids')")->result();
		$data['event'] = $this->db->query("SELECT * FROM event_buku where event_tgl between '	
		$tgl' and '$tgl'")->result();
		$data['pembeli'] = $this->db->query("SELECT * FROM pengguna where pengguna_id=$pembeli")->result();
		$data['bank'] = $this->db->query("SELECT * FROM pengguna where pengguna_id=1 ")->result();
		
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_jual_validasi',$data);
		$this->load->view('dashboard/v_footer');

	}public function buku_bayar()
	{	
		$id_bank = $this->input->post('id_bank');
		$saldo_bank = $this->input->post('saldo_bank');
		$id_nota = $this->input->post('id_nota');
		$pembeli = $this->input->post('pembeli');
		$saldo_pembeli = $this->input->post('saldo');
		$total= $this->input->post('total');
		$cash = $this->input->post('cash');
		$ket = $this->input->post('ket');
		$jumlahbayar=$saldo_pembeli+$cash;
		$kembalian=$saldo_pembeli+$cash-$total;
		$kembalian2=$saldo_pembeli-$total;
		$tambah_saldo=$saldo_bank+$total;
		if ($kembalian >=0){
		
		$data2= array(
			'saldo' => $tambah_saldo
		);
		if($saldo_pembeli >= $total){
		$data3= array(
			'saldo' => $kembalian2
		);
		$data= array(
			'kembalian' => $cash,
			'jumlah_bayar'=>$jumlahbayar,
			'status'=> 2
		);
		$datatarik = array(
			'tarik_pengguna' => $pembeli,
			'tarik_jumlah' => $total,
			'cash' => $cash,
			'tarik_ket' => $ket,
		);
		}else{
			$data3= array(
				'saldo' => 0
			);
			$data= array(
				'kembalian' => $kembalian,
				'jumlah_bayar'=>$jumlahbayar,
				'status'=> 2
			);
			$datatarik = array(
				'tarik_pengguna' => $pembeli,
				'tarik_jumlah' => $saldo_pembeli,
				'cash' => $cash,
				'tarik_ket' => $ket,
			);
		}
				
			$wherenota = array(
				'id' => $id_nota
			);
			$wherebank = array(
				'pengguna_id' => $id_bank
			);
			$wherepembeli = array(
				'pengguna_id' => $pembeli
			);
			//kurang saldo pembeli
			$this->m_data->update_data($wherepembeli,$data3,'pengguna');
			//tambah saldo bank
			$this->m_data->update_data($wherebank,$data2,'pengguna');
			//kembalian_nota
			$this->m_data->update_data($wherenota,$data,'nota');
			//input ke tabel tarik
			$this->m_data->insert_data($datatarik,'tarik');
			redirect(base_url().'dashboard/struk/'.$id_nota);
		}else{
			redirect(base_url().'dashboard/jual?alert=gagal');
		}	
	}
	public function buku_jual_aksi()
	{	
		// $this->form_validation->set_rules('berat','Berat','required');
		// $this->form_validation->set_rules('harga','Harga','required');
		// if($this->form_validation->run() != false){
			$id_bank = $this->input->post('id_bank');
			$saldobank = $this->input->post('saldobank');
			
			$id_event = $this->input->post('event');
			$ket=$this->input->post('ket');
			$saldopembeli=$this->input->post('saldopembeli');
			$id_pembeli=$this->input->post('id_pembeli');
			$tgl=$this->input->post('tgl');
			$postdiskon=$this->input->post('diskon');
			$id_nota=$this->input->post('id_nota');
			$no_nota=$this->input->post('no_nota');
			$no_nota_terakhir=$no_nota + 1 ;
			$kodejual= $tgl.'-'.$id_pembeli;
			
			//$saldobanknow=$saldobank+$total;
			//$pengurangansaldopembeli= $saldopembeli+$cash-$total;
			
			//$saldobanknow2=$saldobank+$diskon;
			//$pengurangansaldopembelidiskon= $saldopembeli+$cash-$diskon;

			$total = 0;

			$ids = $this->input->post('id');

			foreach ($ids as $i => $id) {
				$stok=$this->input->post('stok')[$i];
				$hargajual = $this->input->post('harga')[$i];
				$berat = $this->input->post('berat')[$i];
				$namabuku=$this->input->post('namabuku')[$i];
				$total_item=$berat*$hargajual;
				
				$total += $total_item;

				$stoknow= $stok-$berat;

				$where2 = array(
					'buku_id' => $id
				);
				
				$data2 = array(
					'buku_stok' => $stoknow,
				);
				
				$data3 = array (
					'kode_jual' => $id_nota,
					'jual_buku' => $id,
					'jual_pengguna' => $id_bank,
					'jual_jumlah' => $total_item,
					'jual_berat' => $berat,
					'jual_ket' => $ket,
					'pembeli' => $id_pembeli,
					'jual_tgl' => $tgl,
				);

				//mengurangi stok
				$this->m_data->update_data($where2,$data2,'buku');
				
				//input ke tabel jual
				$this->m_data->insert_data($data3,'jual');
			}
			
			$rumusdiskon=$total*$postdiskon/100;
			$diskon=$total-$rumusdiskon;

			$notaterakhir = array(
				'no_nota' => $no_nota_terakhir
			);

			$wherenota = array(
				'id' => $id_nota
			);

			if ($id_event==""){
				$data = array(
					'total_nota' => $total,
				);
			}else{
				$data = array(
					'total_nota' => $diskon
				);
			}
			
			//nota
			$this->m_data->update_data($wherenota,$notaterakhir,'nota');
			
			//total_nota
			$this->m_data->update_data($wherenota,$data,'nota');

			redirect(base_url().'dashboard/jual?alert=done');
		// }
		
		// redirect(base_url().'dashboard/buku_jual_validasi');
	}
	public function buku_jual_aksi2()
	{	
		$this->form_validation->set_rules('berat','Berat','required');
		$this->form_validation->set_rules('harga','Harga','required');
		if($this->form_validation->run() != false){
			$id_bank = $this->input->post('id_bank');
			$saldobank = $this->input->post('saldobank');
			$id = $this->input->post('id');
			$hargajual = $this->input->post('harga');
			$stok=$this->input->post('stok');
			$id_event = $this->input->post('event');
			$berat = $this->input->post('berat');
			$ket=$this->input->post('ket');
			$saldopembeli=$this->input->post('saldopembeli');
			$id_pembeli=$this->input->post('id_pembeli');
			$namabuku=$this->input->post('namabuku');
			$tgl=$this->input->post('tgl');
			$postdiskon=$this->input->post('diskon');
			$id_nota=$this->input->post('id_nota');
			$total_nota=$this->input->post('total_nota');
			$kodejual= $tgl.'-'.$id_pembeli;
			$total=$berat*$hargajual;
			//$saldobanknow=$saldobank+$total;
			$stoknow= $stok-$berat;
			//$pengurangansaldopembeli= $saldopembeli+$cash-$total;
			$rumusdiskon=$total*$postdiskon/100;
			$diskon=$total-$rumusdiskon;
			$total_nota_nondiskon=$total_nota+$total;
			$total_nota_diskon=$total_nota+$diskon;
			//$saldobanknow2=$saldobank+$diskon;
			//$pengurangansaldopembelidiskon= $saldopembeli+$cash-$diskon;
			if ($stoknow>=0 ){
			$where = array(
				'pengguna_id' => $id_bank
			);
			$where2 = array(
				'buku_id' => $id
			);
			$where3 = array(
				'pengguna_id' => $id_pembeli
			);
			
			$data2 = array(
				'buku_stok' => $stoknow,
			);
			if ($id_event==""){
				$data3 = array (
					'kode_jual' => $id_nota,
					'jual_buku' => $id,
					'jual_pengguna' => $id_bank,
					'jual_jumlah' => $total,
					'jual_berat' => $berat,
					'jual_ket' => $ket,
					'pembeli' => $id_pembeli,
					'jual_tgl' => $tgl,
				);
				$data = array(
					'total_nota' => $total_nota_nondiskon
				);
				
			}else{
				$data3 = array (
					'kode_jual' => $id_nota,
					'jual_buku' => $id,
					'jual_pengguna' => $id_bank,
					'jual_jumlah' => $diskon,
					'jual_event' => $id_event,
					'jual_berat' => $berat,
					'jual_ket' => $ket,
					'pembeli' => $id_pembeli,
					'jual_tgl' => $tgl,
				);
				$data = array(
					'total_nota' => $total_nota_diskon
				);
				
			}
			$wherenota = array(
				'id' => $id_nota
			);
			//total_nota
			$this->m_data->update_data($wherenota,$data,'nota');
			//mengurangi stok
			$this->m_data->update_data($where2,$data2,'buku');
			//input ke tabel jual
			$this->m_data->insert_data($data3,'jual');
			redirect(base_url().'dashboard/jual?alert=done');
			}else {
				redirect(base_url().'dashboard/jual?alert=stok');
			}
		}
	}
//-----------------------------------------Tarik----------------------------------------------------
	public function tarik()
	{
		$data['tarik'] = $this->db->query("SELECT * FROM pengguna,tarik where pengguna_id=tarik_pengguna order by tarik_id desc")->result();
		$data['admin'] = $this->db->query("SELECT * FROM pengguna")->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_tarik',$data);
		$this->load->view('dashboard/v_footer');
	}
	public function buku_tarik()
	{
		$data['pengguna'] = $this->db->query("SELECT * FROM pengguna where pengguna_level!='admin' and pengguna_level!='non' order by pengguna_nama asc")->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_buku_tarik',$data);
		$this->load->view('dashboard/v_footer');
	}
	public function buku_tarik_validasi()
	{	
		$pengguna = $this->input->post('pengguna');
		$data['pengguna'] = $this->db->query("SELECT * FROM pengguna where pengguna_id=$pengguna")->result();
		
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_tarik_validasi',$data);
		$this->load->view('dashboard/v_footer');

	}
	public function tarik_saldo_pengguna()
	{	
		$pengguna = $this->session->userdata('id');
		$data['pengguna'] = $this->db->query("SELECT * FROM pengguna where pengguna_id=$pengguna")->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_tarik_pengguna',$data);
		$this->load->view('dashboard/v_footer');

	}
	public function tarik_pengguna_aksi()
	{	
		$this->form_validation->set_rules('tgl','Tgl','required');
		$this->form_validation->set_rules('tarik','Tarik','required');
		if($this->form_validation->run() != false){
			
			$pengguna = $this->input->post('pengguna');
			$tgl = $this->input->post('tgl');
			$saldo=$this->input->post('saldo');
			$ket=$this->input->post('ket');
			$tarik=$this->input->post('tarik');
			$penarik=$this->input->post('penarik');
			$saldonasabah=$saldo-$tarik;
			if($saldonasabah>=0){
			$where = array(
				'pengguna_id' => $pengguna
			);
			$data = array(
				'tarik_pengguna' => $pengguna,
				'nama' => $penarik,
				'tarik_jumlah' => $tarik,
				'tarik_ket' => $ket,
				'tarik_tgl' => $tgl,
				'status' => 2,
				'penanggung_jawab' => 1
			);
			$data2 = array(
				'saldo' => $saldonasabah,
			);
			$this->m_data->update_data($where,$data2,'pengguna');
			$this->m_data->insert_data($data,'tarik');
			redirect(base_url().'dashboard/index?alert=done');
		}else{
			redirect(base_url().'dashboard/index?alert=gagal');
		}
		}
	}
	public function buku_tarik_aksi()
	{	
		$this->form_validation->set_rules('tgl','Tgl','required');
		$this->form_validation->set_rules('tarik','Tarik','required');
		if($this->form_validation->run() != false){
			$penanggungjawab=$this->session->userdata('id');
			$pengguna = $this->input->post('pengguna');
			$tgl = $this->input->post('tgl');
			$saldo=$this->input->post('saldo');
			$ket=$this->input->post('ket');
			$tarik=$this->input->post('tarik');
			$penarik=$this->input->post('penarik');
			$saldonasabah=$saldo-$tarik;
			$where = array(
				'pengguna_id' => $pengguna
			);
			
			$data = array(
				'tarik_pengguna' => $pengguna,
				'nama' => $penarik,
				'tarik_jumlah' => $tarik,
				'tarik_ket' => $ket,
				'tarik_tgl' => $tgl,
				'penanggung_jawab'=> $penanggungjawab
			);
			$data2 = array(
				'saldo' => $saldonasabah,
			);
			$this->m_data->update_data($where,$data2,'pengguna');
			$this->m_data->insert_data($data,'tarik');
			redirect(base_url().'dashboard/tarik?alert=done');
		}
	}

//-----------------------------------------Setor----------------------------------------------------
	public function setor()
	{
		$data['setor'] = $this->db->query("SELECT * FROM pengguna,buku,setor where pengguna_id=setor_pengguna and setor_buku=buku_id order by setor_id desc")->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_setor',$data);
		$this->load->view('dashboard/v_footer');
	}


	public function buku_setor()
	{
		
		$id_pengguna = $this->session->userdata('id');
		$data['bank'] = $this->db->query("SELECT * FROM pengguna where pengguna_id=$id_pengguna")->result();
		$data['buku'] = $this->db->query("SELECT * FROM buku order by buku_nama asc")->result();
		$data['pengguna'] = $this->db->query("SELECT * FROM pengguna where pengguna_level!='admin' and pengguna_level!='non' order by pengguna_nama asc")->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_buku_setor',$data);
		$this->load->view('dashboard/v_footer');
	}
	public function buku_setor_validasi()
	{	
		$id_bank = $this->input->post('id_bank');
		$id = $this->input->post('id');
		$pengguna = $this->input->post('pengguna');
		$data['bank'] = $this->db->query("SELECT * FROM pengguna where pengguna_id=$id_bank")->result();
		$data['pengguna'] = $this->db->query("SELECT * FROM pengguna where pengguna_id=$pengguna")->result();
		$data['buku'] = $this->db->query("SELECT * FROM buku where buku_id=$id")->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_buku_validasi',$data);
		$this->load->view('dashboard/v_footer');

	}
	public function buku_setor_aksi()
	{	
		$this->form_validation->set_rules('berat','Berat','required');
		$this->form_validation->set_rules('tgl','Tgl','required');
		$this->form_validation->set_rules('pengguna','pengguna','required');
		if($this->form_validation->run() != false){
			$id_bank = $this->input->post('id_bank');
			$saldo_bank = $this->input->post('saldobank');
			$id = $this->input->post('id');
			$pengguna = $this->input->post('pengguna');
			$tgl = $this->input->post('tgl');
			$ket = $this->input->post('ket');
			$harga = $this->input->post('harga');
			$berat = $this->input->post('berat');
			$stok = $this->input->post('stok');
			$total= $harga*$berat;
			$stoktotal=$stok+$berat;
			$saldo=$this->input->post('saldo');
			$saldonasabah=$saldo+$total;
			$totalsaldobank= $saldo_bank-$total;
			$where = array(
				'pengguna_id' => $pengguna
			);
			$where2 = array(
				'buku_id' => $id
			);
			$where3 = array(
				'pengguna_id' => $id_bank
			);
			$data = array(
				'saldo' => $saldonasabah,
			);
			$data2 = array(
				'setor_pengguna' => $pengguna,
				'setor_buku' => $id,
				'setor_ket' => $ket,
				'setor_berat' => $berat,
				'setor_tgl' => $tgl,
				'setor_jumlah' => $total,
			);
			$data3 = array(
				'buku_stok' => $stoktotal,		
			);
			$data4 = array(
				'saldo' => $totalsaldobank,		
			);
			$where4 = array(
							'riwayat_pengguna' => $pengguna);
			$data5 = array(
					'riwayat_setor' => $berat,
					'riwayat_tgl' => $tgl,		
					);
			$data6 = array(
					'riwayat_pengguna' => $pengguna,
					'riwayat_setor' => $berat,
					'riwayat_tgl' => $tgl,		
					);

			$where0 = array(
			'riwayat_pengguna' => $pengguna,
			);
			$this->load->model('m_data');
			$cek = $this->m_data->cek_login('riwayat',$where0)->num_rows();
			if($cek > 0){
			
			$this->m_data->update_data($where4,$data5,'riwayat');
			$this->m_data->update_data($where,$data,'pengguna');
			$this->m_data->insert_data($data2,'setor');
			$this->m_data->update_data($where2,$data3,'buku');
			$this->m_data->update_data($where3,$data4,'pengguna');
			redirect(base_url().'dashboard/setor/?alert=done');
			} else {
			$this->m_data->insert_data($data6,'riwayat');
			$this->m_data->update_data($where,$data,'pengguna');
			$this->m_data->insert_data($data2,'setor');
			$this->m_data->update_data($where2,$data3,'buku');
			$this->m_data->update_data($where3,$data4,'pengguna');
			redirect(base_url().'dashboard/setor/?alert=done');
			}
			
			} 
		}
//------------------------------------retur-----------------------------------------------------
		public function returlist()
		{
			$data['retur'] = $this->db->query("SELECT * FROM pengguna,retur,buku where pengguna_id=retur_pembeli and retur_buku=buku_id")->result();
			$this->load->view('dashboard/v_header');
			$this->load->view('dashboard/v_returlist',$data);
			$this->load->view('dashboard/v_footer');
		}
		public function retur($id)
		{
			$data['retur'] = $this->db->query("SELECT * FROM pengguna,jual,buku where pengguna_id=pembeli and jual_buku=buku_id and jual_id=$id")->result();
			$this->load->view('dashboard/v_header');
			$this->load->view('dashboard/v_retur',$data);
			$this->load->view('dashboard/v_footer');
		}
		public function retur_aksi()
	{
	// Wajib isi
		$this->form_validation->set_rules('jumlah','jumlah retur','required');
		if($this->form_validation->run() != false){
			$pengguna_id = $this->input->post('pengguna_id');
			$buku = $this->input->post('buku_id');
			$jual = $this->input->post('jual_id');
			$jumlah = $this->input->post('jumlah');
			$ket  = $this->input->post('keterangan');
			$stok  = $this->input->post('stok');
			$stokkurang  = $stok-$jumlah;

			if ($stokkurang >=0){
			$where = array(
				'buku_id' => $buku,			
			);
			$data = array(
				'retur_pembeli' => $pengguna_id,
				'retur_jml' => $jumlah,
				'retur_jual' => $jual,
				'retur_buku' => $buku,
				'retur_ket' => $ket				
			);
			$data2 = array(
				'buku_stok' => $stokkurang,			
			);
			$this->m_data->insert_data($data,'retur');
			$this->m_data->update_data($where,$data2,'buku');
			redirect(base_url().'dashboard/returlist?alert=donee');
			}else {
				redirect(base_url().'dashboard/returlist?alert=done');
			}
		}
	}

//-------------------------------------event---------------------------------------------------------
public function event()
	{
		$data['event'] = $this->m_data->get_data('event_buku')->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_event',$data);
		$this->load->view('dashboard/v_footer');
	}
	public function event_tambah()
	{
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_event_tambah');
		$this->load->view('dashboard/v_footer');
	}
	public function event_aksi()
	{
	// Wajib isi
		$this->form_validation->set_rules('nama','Nama Event','required');
		if($this->form_validation->run() != false){
			$nama = $this->input->post('nama');
			$tgl = $this->input->post('tgl');
			$diskon = $this->input->post('diskon');
			$data = array(
				'event_nama' => $nama,
				'event_tgl' => $tgl,
				'diskon' => $diskon,	
			);
			$this->m_data->insert_data($data,'event_buku');
			redirect(base_url().'dashboard/event?alert=donee');
		}else{
			$this->load->view('dashboard/v_header');
			$this->load->view('dashboard/v_event_tambah');
			$this->load->view('dashboard/v_footer');
		}
	}
	public function event_edit($id)
	{
		$where = array(
			'event_id' => $id
		);
		$data['event'] = $this->m_data->edit_data($where,'event_buku')->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_event_edit',$data);
		$this->load->view('dashboard/v_footer');
	}
	public function event_update()
	{
		// Wajib isi nama dan email
		$this->form_validation->set_rules('nama','Nama','required');
		if($this->form_validation->run() != false){
			$id = $this->input->post('id');
			$nama = $this->input->post('nama');
			$tgl = $this->input->post('tgl');
			$diskon = $this->input->post('diskon');
			$where = array(
				'event_id' => $id
			);
			$data = array(
				'event_nama' => $nama,
				'diskon'=>$diskon,
				'event_tgl' => $tgl
				
			);
			$this->m_data->update_data($where,$data,'event_buku');
			redirect(base_url().'dashboard/event/?alert=doneee');
		}
	}
	public function event_hapus($id)
	{
		$where = array(
			'event_id' => $id
		);
		$this->m_data->delete_data($where,'event_buku');
		redirect(base_url().'dashboard/event?alert=done');
	}	
//----------------------------------------buku----------------------------------------------------
	public function kategori()
	{
		$data['kategori'] = $this->m_data->get_data('kategori')->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_kategori',$data);
		$this->load->view('dashboard/v_footer');
	}
	public function kategori_tambah()
	{
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_kategori_tambah');
		$this->load->view('dashboard/v_footer');
	}
	public function kategori_aksi()
	{
	// Wajib isi

			$nama = $this->input->post('nama');
			$letak = $this->input->post('letak');
			
			$data = array(
				'kategori_nama' => $nama,
				'kategori_letak' => $letak
			);
			$this->m_data->insert_data($data,'kategori');
			redirect(base_url().'dashboard/kategori?alert=donee');
	}
	public function kategori_hapus($id)
	{
		$where = array(
			'kategori_id' => $id
		);
		$this->m_data->delete_data($where,'kategori');
		redirect(base_url().'dashboard/kategori?alert=done');
	}
	public function kategori_edit($id)
	{
		$where = array(
			'kategori_id' => $id
		);
		$data['kategori'] = $this->m_data->edit_data($where,'kategori')->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_kategori_edit',$data);
		$this->load->view('dashboard/v_footer');
	}
	public function kategori_update()
	{
		
			$id = $this->input->post('id');
			$nama = $this->input->post('nama');
			$letak = $this->input->post('letak');

			$where = array(
				'kategori_id' => $id
			);
			$data = array(
				'kategori_nama' => $nama,
				'kategori_letak' => $letak
			);
			$this->m_data->update_data($where,$data,'kategori');
			redirect(base_url().'dashboard/kategori/?alert=doneee');
		
	}
	public function buku()
	{

		$data['buku'] = $this->db->query("SELECT * FROM buku,kategori where kategori_id=kategori order by kategori desc")->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_buku',$data);
		$this->load->view('dashboard/v_footer');
	}
	public function buku_tambah()
	{	
		$data['kategori'] = $this->m_data->get_data('kategori')->result();
		$data['persen']= $this->db->query("SELECT * FROM  hargajual ")->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_buku_tambah',$data);
		$this->load->view('dashboard/v_footer');
	}
	public function buku_aksi()
	{
	// Wajib isi
		$this->form_validation->set_rules('nama','Nama Pengguna','required');
		$this->form_validation->set_rules('harga','Harga','required');
		
		if($this->form_validation->run() != false){
			$nama = $this->input->post('nama');
			$harga = $this->input->post('harga');
			$persen = $this->input->post('persen');
			$hargatmp = $harga*$persen/100;
			$hargajual = $harga+$hargatmp;
			$stok  = 0;
			$kategori = $this->input->post('kategori');
			$data = array(
				'buku_nama' => $nama,
				'buku_harga' => $harga,
				'buku_harga_jual' => $hargajual,
				'buku_stok' => $stok,
				'kategori' => $kategori,
				
			);
			$this->m_data->insert_data($data,'buku');
			redirect(base_url().'dashboard/buku?alert=donee');
		}else{
			$this->load->view('dashboard/v_header');
			$this->load->view('dashboard/v_buku_tambah');
			$this->load->view('dashboard/v_footer');
		}
	}
	public function buku_edit($id)
	{
		$where = array(
			'buku_id' => $id
		);
		$data['persen']= $this->db->query("SELECT * FROM  hargajual ")->result();
		$data['kategori'] = $this->db->query("SELECT * FROM kategori ")->result();
		$data['buku'] = $this->m_data->edit_data($where,'buku')->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_buku_edit',$data);
		$this->load->view('dashboard/v_footer');
	}

	
	public function buku_update()
	{
		// Wajib isi nama dan email
		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('harga','Harga','required');
		$this->form_validation->set_rules('stok','Stok','required');
		if($this->form_validation->run() != false){
			$id = $this->input->post('id');
			$nama = $this->input->post('nama');
			$persen = $this->input->post('persen');
			$harga = $this->input->post('harga');
			$stok = $this->input->post('stok');
			$kategori = $this->input->post('kategori');
			$hargatmp = $harga*$persen/100;
			$hargajual = $harga+$hargatmp;

			$where = array(
				'buku_id' => $id
			);
			$data = array(
				'buku_nama' => $nama,
				'buku_harga' => $harga,
				'buku_harga_jual' => $hargajual,
				'buku_stok' => $stok,
				'kategori' => $kategori,
				
			);
			$this->m_data->update_data($where,$data,'buku');
			redirect(base_url().'dashboard/buku/?alert=doneee');
		}
	}
	public function buku_hapus($id)
	{
		$where = array(
			'buku_id' => $id
		);
		$this->m_data->delete_data($where,'buku');
		redirect(base_url().'dashboard/buku?alert=done');
	}	
//----------------------------------------Pengguna--------------------------------------------------

	
	public function pengguna()
	{
		$data['pengguna'] = $this->m_data->get_data('pengguna')->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_pengguna',$data);
		$this->load->view('dashboard/v_footer');
	}
	public function pengguna_tambah()
	{
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_pengguna_tambah');
		$this->load->view('dashboard/v_footer');
	}
	public function pengguna_aksi()
	{
	// Wajib isi
		$this->form_validation->set_rules('nama','Nama Pengguna','required');
		$this->form_validation->set_rules('ktp','Ktp','required');
		$this->form_validation->set_rules('email','Email Pengguna','required');
		$this->form_validation->set_rules('username','Username Pengguna','required');
		$this->form_validation->set_rules('password','Password Pengguna','required|min_length[8]');
		$this->form_validation->set_rules('level','Level Pengguna','required');
		$this->form_validation->set_rules('status','Status Pengguna','required');
		if($this->form_validation->run() != false){
			$nama = $this->input->post('nama');
			$email = $this->input->post('email');
			$rek = $this->input->post('rek');
			$ktp = $this->input->post('ktp');
			$tlp = $this->input->post('tlp');
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));
			$level = $this->input->post('level');
			$status = $this->input->post('status');
			$status_daftar = 'offline';
			$data = array(
				'pengguna_nama' => $nama,
				'pengguna_email' => $email,
				'pengguna_username' => $username,
				'pengguna_rek' => $rek,
				'pengguna_ktp' => $ktp,
				'pengguna_password' => $password,
				'pengguna_level' => $level,
				'pengguna_status' => $status,
				'tlp' => $tlp,
				'pendaftaran' => $status_daftar
			);
			$this->m_data->insert_data($data,'pengguna');
			redirect(base_url().'dashboard/pengguna');
		}else{
			$this->load->view('dashboard/v_header');
			$this->load->view('dashboard/v_pengguna_tambah');
			$this->load->view('dashboard/v_footer');
		}
	}
	
	public function pengguna_edit($id)
	{
		$where = array(
			'pengguna_id' => $id
		);
		$data['pengguna'] = $this->m_data->edit_data($where,'pengguna')->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_pengguna_edit',$data);
		$this->load->view('dashboard/v_footer');
	}

	public function pengguna_update()
	{
	// Wajib isi
		$this->form_validation->set_rules('nama','Nama Pengguna','required');
		$this->form_validation->set_rules('email','Email Pengguna','required');
		$this->form_validation->set_rules('username','Username Pengguna','required');
		$this->form_validation->set_rules('level','Level Pengguna','required');
		$this->form_validation->set_rules('status','Status Pengguna','required');
		if($this->form_validation->run() != false){
			$id = $this->input->post('id');
			$nama = $this->input->post('nama');
			$email = $this->input->post('email');
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));
			$level = $this->input->post('level');
			$status = $this->input->post('status');
	//cek jika form password tidak diisi, maka jangan update kolum password, dan sebaliknya
			if($this->input->post('password') == ""){
				$data = array(
					'pengguna_nama' => $nama,
					'pengguna_email' => $email,
					'pengguna_username' => $username,
					'pengguna_level' => $level,
					'pengguna_status' => $status
				);
			}else{
				$data = array(
					'pengguna_nama' => $nama,
					'pengguna_email' => $email,
					'pengguna_username' => $username,
					'pengguna_password' => $password,
					'pengguna_level' => $level,
					'pengguna_status' => $status
				);
			}
			$where = array(
				'pengguna_id' => $id
			);
			$this->m_data->update_data($where,$data,'pengguna');
			redirect(base_url().'dashboard/pengguna');
		}else{
			$id = $this->input->post('id');
			$where = array(
				'pengguna_id' => $id
			);
			$data['pengguna'] = $this->m_data->edit_data($where,'pengguna')->result();
			$this->load->view('dashboard/v_header');
			$this->load->view('dashboard/v_pengguna_edit',$data);
			$this->load->view('dashboard/v_footer');
		}
	}
	public function pengguna_hapus($id)
	{
		$where = array(
			'pengguna_id' => $id
		);
		$this->m_data->delete_data($where,'pengguna');
		redirect(base_url().'dashboard/pengguna?alert=done');
	}
	
	//------------------------------report buku
	public function report_bukularis()
	{
		$data['terlaris'] = $this->db->query("SELECT buku_nama, sum(jual_berat) AS jumlah FROM jual,buku where buku_id=jual_buku GROUP BY buku_id order by jumlah desc limit 10")->result();
	
		$this->load->view('dashboard/v_report_laris',$data);
		
	}
	public function report_buku()
	{
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_report_setor');
		$this->load->view('dashboard/v_footer');
	}
	public function report_buku_cetak()
	{
		$tgl_1 = $this->input->post('tgl1');
		$tgl_2= $this->input->post('tgl2');
		$data['setor'] = $this->db->query("SELECT * FROM pengguna,buku,setor where pengguna_id=setor_pengguna and setor_buku=buku_id and setor_tgl between '	
			$tgl_1' and '$tgl_2' order by setor_id desc")->result();
		$this->load->view('dashboard/v_report_setor_cetak',$data);
		
	}
	//--------------------------------report tarik
	public function report_tarik()
	{
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_report_tarik');
		$this->load->view('dashboard/v_footer');
	}
	public function report_tarik_cetak()
	{
		$tgl_1 = $this->input->post('tgl1');
		$tgl_2= $this->input->post('tgl2');
		$data['tarik'] = $this->db->query("SELECT * FROM pengguna,tarik where pengguna_id=tarik_pengguna and tarik_tgl between '	
			$tgl_1' and '$tgl_2' order by tarik_id desc")->result();
		
		$this->load->view('dashboard/v_report_tarik_cetak',$data);
	}
	//-----------------------------Report Tarik
	public function report_stok()
	{

		$data['buku'] = $this->m_data->get_data('buku')->result();
		
		$this->load->view('dashboard/v_report_stok_cetak',$data);	
	}
	//----------------------------Report Koran
	public function report_koran()
	{
		
		if($this->session->userdata('level') == "admin"){

			$data['pengguna'] = $this->db->query("SELECT * FROM pengguna where pengguna_level!='admin' order by pengguna_nama asc")->result();
			$this->load->view('dashboard/v_header');
			$this->load->view('dashboard/v_report_koran',$data);	
			$this->load->view('dashboard/v_footer');

		} else{
			redirect(base_url().'dashboard/report_koran_cetak2');
		}
	}

	public function report_koran_cetak()
	{
		$nasabah = $this->input->post('pengguna');
		
		$data['tarik'] = $this->db->query("SELECT * FROM pengguna,tarik where pengguna_id=tarik_pengguna and  pengguna_id=$nasabah order by tarik_tgl asc")->result();
		$data['setor'] = $this->db->query("SELECT * FROM pengguna,buku,setor where pengguna_id=setor_pengguna and setor_buku=buku_id and pengguna_id=$nasabah order by setor_tgl asc")->result();
		
		$this->load->view('dashboard/v_report_koran_cetak',$data);
	}

	public function report_koran_cetak2()
	{
		$nasabah = $this->session->userdata('id');
		
		$data['tarik'] = $this->db->query("SELECT * FROM pengguna,tarik where pengguna_id=tarik_pengguna and  pengguna_id=$nasabah order by tarik_tgl asc")->result();
		$data['setor'] = $this->db->query("SELECT * FROM pengguna,buku,setor where pengguna_id=setor_pengguna and setor_buku=buku_id and pengguna_id=$nasabah order by setor_tgl asc")->result();
		
		$this->load->view('dashboard/v_report_koran_cetak',$data);
	}
	//----------------------------report penjualan
	public function report_penjualan()
	{
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_report_penjualan');
		$this->load->view('dashboard/v_footer');
	}

	public function report_penjualan_cetak()
	{
		$tgl_1 = $this->input->post('tgl1');
		$tgl_2= $this->input->post('tgl2');
		$data['jual'] = $this->db->query("SELECT * FROM pengguna,jual,buku where buku_id=jual_buku and pengguna_id=jual_pengguna and jual_tgl between '	
			$tgl_1' and '$tgl_2' order by jual_tgl asc")->result();
		
		$this->load->view('dashboard/v_report_jual_cetak',$data);
	}
	//----------------------------report untung rugi
	public function report_untungrugi()
	{		
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_report_untungrugi');
		$this->load->view('dashboard/v_footer');
	}	

	public function report_untungrugi_cetak()
	{	
		$tgl_1 = $this->input->post('tgl1');
		$tgl_2= $this->input->post('tgl2');
		$data['jual'] = $this->db->query("SELECT * FROM pengguna,jual,buku where buku_id=jual_buku and pengguna_id=jual_pengguna and jual_tgl between '	
			$tgl_1' and '$tgl_2' order by jual_tgl asc")->result();
		$data['setor'] = $this->db->query("SELECT * FROM pengguna,buku,setor where pengguna_id=setor_pengguna and setor_buku=buku_id and setor_tgl between '	
			$tgl_1' and '$tgl_2' order by setor_tgl asc")->result();


		$this->load->view('dashboard/v_report_untungrugi_cetak',$data);	
	}

	public function grafik()	
	{

		$this->load->view('dashboard/belajarchart/grafik_bulan.php');	

	}
	public function report_keaktifan()
	{
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_report_keaktifan');
		$this->load->view('dashboard/v_footer');
	}	
	public function keaktifan()
	{
		$tgl1 = $this->input->post('tgl1');
		$tgl2= $this->input->post('tgl2');
		$data['aktif'] = $this->db->query("SELECT pengguna_nama,sum(setor_berat) AS jumlah,count(setor_pengguna) AS jumlah2,riwayat_setor,riwayat_tgl FROM setor,pengguna,riwayat where setor_pengguna=pengguna_id and setor_pengguna=riwayat_pengguna and setor_tgl between '$tgl1' and '$tgl2' GROUP BY setor_pengguna ")->result();
		$this->load->view('dashboard/v_keaktifan_cetak',$data);
	}
	public function report_event()
	{
		$data['event'] = $this->db->query("SELECT event_nama,sum(jual_berat) AS jumlah,count(jual_event) AS jumlah2,event_tgl FROM jual,event_buku where jual_event=event_id   GROUP BY jual_event")->result();
		$this->load->view('dashboard/v_event_cetak',$data);
	}
	public function saldobank()
	{	
		$data['saldo'] = $this->db->query("SELECT saldo FROM pengguna where pengguna_id=1")->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_setsaldobank',$data);
		$this->load->view('dashboard/v_footer');
	}
	public function saldobankupdate()
	{
			$saldo = $this->input->post('saldo');
			$saldosebelum = $this->input->post('saldosebelum');
			$pengguna = $this->session->userdata('id');
			$where = array(
				'pengguna_id' => 1
			);
			$data = array(
				'saldo' => $saldo,
				
			);
			$data2= array(
				
				'pengguna' =>$pengguna ,
				'jumlahset' => $saldo,
				'saldosebelum' => $saldosebelum,
				
			);
			$this->m_data->insert_data($data2,'logsetsaldo');
			$this->m_data->update_data($where,$data,'pengguna');
			redirect(base_url().'dashboard/?alert=done');
		
	}
	public function struk($id)
	{
		$data['jual'] = $this->db->query("SELECT * FROM jual,buku where kode_jual like'$id' and buku_id=jual_buku order by jual_id desc")->result();
		$data['nota'] = $this->db->query("SELECT * FROM jual,nota where kode_jual like'$id' and kode_jual=id limit 1")->result();
		$this->load->view('dashboard/v_struk',$data);
		
	}
	public function upload_bukti($id)
	{
		$data['tarik'] = $this->db->query("SELECT * FROM tarik,pengguna where tarik_pengguna=pengguna_id and tarik_id like'$id'")->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_upload_bukti',$data);
		$this->load->view('dashboard/v_footer');
	}
	public function upload_bukti_aksi()
	{
		$penanggungjawab=$this->session->userdata('id');
		$id = $this->input->post('id');
		if (!empty($_FILES['sampul']['name'])){
			$config['upload_path'] = './bukti/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$where = array(
				'tarik_id' => $id
			);
			if ($this->upload->do_upload('sampul')) {
			// mengambil data tentang gambar
				$gambar = $this->upload->data();
				$data = array(
					'bukti' => $gambar['file_name'],
					'penanggung_jawab' => $penanggungjawab,
					'status' => 1
				);
				$this->m_data->update_data($where,$data,'tarik');
				redirect(base_url().'dashboard/tarik?alert=berhasil');
			}
		}
	}
	public function saran()
	{
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_saran');
		$this->load->view('dashboard/v_footer');
	}
	public function saran_aksi()
	{
			$id = $this->session->userdata('id');
			$isi = $this->input->post('isi');
			$data= array(
				
				'pengguna_saran' =>$id ,
				'isi' => $isi,
			);
			$this->m_data->insert_data($data,'saran');
			redirect(base_url().'dashboard/index?alert=saran');
		
	}
	public function saranlist()
	{
		$data['saran'] = $this->db->query("SELECT * FROM pengguna,saran where pengguna_id=pengguna_saran order by id desc")->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_saranlist',$data);
		$this->load->view('dashboard/v_footer');
	}
	public function tes()
	{
		
		$this->load->view('dashboard/v_tes');
		
	}

	public function set_status($id)
	{
		$where = array(
			'id' => $id
		);
		$data = array (
			'status'=> 2
		);
		$this->m_data->update_data($where,$data,'saran');
		redirect(base_url().'dashboard/saranlist');
	}
	public function set_status_acc($id)
	{
		$where = array(
			'id' => $id
		);
		$data = array (
			'status'=> 2
		);
		$this->m_data->update_data($where,$data,'penawaran');
		redirect(base_url().'dashboard/penawaran_admin?alert=done');
	}
	public function set_status_tolak($id)
	{
		$where = array(
			'id' => $id
		);
		$data = array (
			'status'=> 3
		);
		$this->m_data->update_data($where,$data,'penawaran');
		redirect(base_url().'dashboard/penawaran_admin?alert=done');
	}

	public function persen()
		{	
	
			$data['persen']= $this->db->query("SELECT * FROM  hargajual ")->result();
			
	
			$this->load->view('dashboard/v_header');
			$this->load->view('dashboard/v_persen',$data);
			$this->load->view('dashboard/v_footer');
		}
		public function persen_aksi()
		{
				$persen = $this->input->post('persen');
				$where = array(
					'id' => 1
				);
				$data = array(
					'persen' => $persen,
					
				);
				$this->m_data->update_data($where,$data,'hargajual');
				redirect(base_url().'dashboard/persen?alert=done');
			
		}
		public function penawaran()
	{

		$data['penawaran'] = $this->db->query("SELECT * FROM penawaran order by id desc")->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_penawaran',$data);
		$this->load->view('dashboard/v_footer');
	}
	public function penawaran_tambah()
	{	
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_penawaran_tambah');
		$this->load->view('dashboard/v_footer');
	}
	public function penawaran_aksi()
	{
	  //membuat koneksi
	  $con = mysqli_connect("localhost", "root", "", "triffbook");

    
	  //memasukkan data ke array
		  $judul       = $_POST['judul'];
		  $harga         = $_POST['harga'];
		  $jumlah     = $_POST['jumlah'];
		  $penawar    =  $this->session->userdata('id');
  
		  $total = count($judul);
  
  
	  //melakukan perulangan input
	  for($i=0; $i<$total; $i++){
  
		  mysqli_query($con, "insert into penawaran set
			  judul   = '$judul[$i]',
			  harga     = '$harga[$i]',
			  jumlah  = '$jumlah[$i]',
			  penawar = '$penawar'
		  ");
	  }
			
			redirect(base_url().'dashboard/penawaran?alert=done');
	
	}
	public function penawaran_admin()
	{

		$data['penawaran'] = $this->db->query("SELECT * FROM penawaran,pengguna where pengguna_id=penawar order by id desc")->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_penawaran_admin',$data);
		$this->load->view('dashboard/v_footer');
	}
	// end crud pengguna
//-------------------------------------------------------------------------------------------------------------
	



}
?>
