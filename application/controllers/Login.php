<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class Login extends CI_Controller {
	  function __construct()
          {
            parent::__construct();
            require APPPATH.'libraries/phpmailer/src/Exception.php';
            require APPPATH.'libraries/phpmailer/src/PHPMailer.php';
            require APPPATH.'libraries/phpmailer/src/SMTP.php';
            date_default_timezone_set('Asia/Jakarta');
            $this->load->model('m_data');
          }

	public function index()
	{
		$this->load->view('v_login');
	}
	public function aksi()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if($this->form_validation->run() != false){
			// menangkap data username dan password dari halaman login
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$where = array(
			'pengguna_username' => $username,
			'pengguna_password' => md5($password),
			'pengguna_status' => 1
			);
			$this->load->model('m_data');
			// cek kesesuaian login pada table pengguna
			$cek = $this->m_data->cek_login('pengguna',$where)->num_rows();
			// cek jika login benar
			if($cek > 0){
				// ambil data pengguna yang melakukan login
				$data = $this->m_data->cek_login('pengguna',$where)->row();
				// buat session untuk pengguna yang berhasil login
				$data_session = array(
				'id' => $data->pengguna_id,
				'username' => $data->pengguna_username,
				'level' => $data->pengguna_level,
				'status' => 'telah_login'
			);
			$this->session->set_userdata($data_session);
			// alihkan halaman ke halaman dashboard pengguna
			redirect(base_url().'dashboard');
		}else{
			redirect(base_url().'login?alert=gagal');
			}
		}else{
			$this->load->view('v_login');
		}
	}
	function regist()
  { 
    $this->load->view('v_regist');
  }

   function regist_aksi()
    {
  // Wajib isi
      $this->form_validation->set_rules('username','Username Pengguna','required');
      $this->form_validation->set_rules('ktp','Ktp','required');
      $this->form_validation->set_rules('password','Password Pengguna','required|min_length[8]');
      $this->form_validation->set_rules('konfirmasi_password','Konfirmasi Password Baru','required|matches[password]');
      $this->form_validation->set_rules('nama','Nama Pengguna','required');
      if($this->form_validation->run() != false){
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $passemail = $this->input->post('password'); 
        $nama = $this->input->post('nama');
        $status = $this->input->post('status');
        $rek = $this->input->post('rek');
        $ktp = $this->input->post('ktp');
        $level = 'nasabah';
        $pendaftaran = 'online';
        $status = '1';
        $email = $this->input->post('email');
         if (!empty($_FILES['sampul']['name'])){
          $config['upload_path'] = './profil/';
          $config['allowed_types'] = 'gif|jpg|png|jpeg';
          $this->load->library('upload', $config);
          if ($this->upload->do_upload('sampul')) {
            $gambar = $this->upload->data();
           }
         }
          $data = array(
          'pengguna_username' => $username,
          'pengguna_password' => $password,
          'pengguna_nama' => $nama,
          'pengguna_level' => $level,
          'pengguna_ktp' => $ktp,
          'pengguna_rek' => $rek,
          'pendaftaran' => $pendaftaran,
          'pengguna_status' => $status,
          'pengguna_email' => $email,
          'pengguna_foto' => $gambar['file_name'],
        );
         // cek NIK
			$where = array(
				'pengguna_ktp' => $ktp
			);
			$cek = $this->m_data->cek_login('pengguna', $where)->num_rows();
			if($cek <= 0){
       

         // PHPMailer object
         $response = false;
         $mail = new PHPMailer();
       

        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'smtp.gmail.com'; //sesuaikan sesuai nama domain hosting/server yang digunakan
        $mail->SMTPAuth = true;
        $mail->Username = 'triffbook@gmail.com'; // user email
        $mail->Password = 'zhcyibvwqmptxavi'; // password email
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;

        $mail->Timeout = 60; // timeout pengiriman (dalam detik)
        $mail->SMTPKeepAlive = true; 

        $mail->setFrom('triffbook@gmail.com', 'admin'); // user email
        $mail->addReplyTo('triffbook@gmail.com', ''); //user email

        // Add a recipient
        $mail->addAddress($email); //email tujuan pengiriman email

        // Email subject
        $mail->Subject = 'TRIFFBOOK INDONESIA'; //subject email

        // Set email format to HTML
        $mail->isHTML(true);

        // Email body content
        $mailContent = "<h1>TRIFFBOOK</h1>
            <p>Halo $nama Pendaftaran berhasil!!</p>
            <p>
              Username : $username <br>
              Password : $passemail <br>
              tingkatkan pengalaman baca anda bersama triffbook.
              </p>"; // isi email
        $mail->Body = $mailContent;

        // Send email
        if(!$mail->send()){
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }else{
          $this->m_data->insert_data($data,'pengguna');
          redirect(base_url().'login?alert=berhasil_regist');
        }

      }else{
        $data['nik'] = $this->db->query("SELECT * FROM pengguna where pengguna_ktp=$ktp")->result();
        $this->load->view('v_regist2',$data);

      }
      }else{
        $this->load->view('v_regist');
      }
    }

}
