<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_app');
		$this->load->model('model_halaman');
	}

	public function lupa_password()
	{

		$this->form_validation->set_rules('email', 'Email', 'required|trim', [
			'required' => 'Email wajib diisi'

		]);

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Login';
			$data['breadcrumb'] = 'Login';
			$data['judul'] = 'Login';
			$data['halamans'] = $this->model_halaman->halaman()->result();
			$this->template->load('home/template', 'home/auth/view_lupass', $data);
		} else {

			$email = strip_tags($this->input->post('email'));
			$cek = $this->db->query("SELECT * FROM pengguna where email='" . $this->db->escape_str($email) . "'");
			$row = $cek->row_array();
			$total = $cek->num_rows();

			if ($total > 0) {


				$kode = $row['kode_resetpassword'];

				$subject      = 'Permintaan Reset Password';

				$message = "
						<p>Akun Anda:</p>
						<p>Email: " . $email . "</p><br>
						<p>Silakan klik tautan di bawah ini untuk mereset password Anda.</p>
						<a href='" . base_url() . "auth/p?q=" . $kode . "'>Reset Password</a>
					";

				kirim_email($email, $subject, $message);
				$this->session->set_flashdata('message', '
				<div class="alert alert-success" role="alert">
            	<center>Berhasil, Silahkan cek email Anda</center>
          		</div>');
				redirect(base_url('login'));
			} else {
				$this->session->set_flashdata('message', '
				<div class="alert alert-danger" role="alert">
            	<center>Email tidak terdaftar</center>
          		</div>');
				redirect(base_url('login'));
			}
		}
	}

	public function login()
	{
		// cek session
		$ses_id = $this->session->id_pengguna;
		$ses_lv = $this->session->level_pengguna;

		if (empty($ses_id)) {
			$this->form_validation->set_rules('user_email', 'Email ', 'required|trim', [
				'required' => 'Email wajib diisi'
			]);

			$this->form_validation->set_rules('password', 'Password', 'required|trim', [
				'required' => 'Password wajib diisi'
			]);
			
			
			if ($this->form_validation->run() == false) {
				$data['title'] = 'Login';
				$data['breadcrumb'] = 'Login';
				$data['halamans'] = $this->model_halaman->halaman()->result();
				
				$this->template->load('home/template', 'home/auth/view_login', $data);
				
				
			} else {
				$this->_login();
			}
			
			
		} else {
			if ($ses_lv == 1) {
				redirect('auth/login');
			} else {
				redirect('members/dashboard');
			}
		}
	}

	private function _login()
	{
		$user_email 	= $this->input->post('user_email');
		$password   	= $this->input->post('password');

		$this->db->from('pengguna');
		$this->db->where("(pengguna.email = '$user_email')");
		$user = $this->db->get()->row_array();

		// jika usernya ada
		if ($user) {
			// juka usernya aktif
			if ($user['aktif'] == 1) {
				// cek password
				if (password_verify($password, $user['password'])) {
					$data = array(
						'id_pengguna'   		=> $user['id_pengguna'], 
						'nama_pengguna'     	=> $user['nama_lengkap'],
						'email_pengguna'     	=> $user['email'],
						'password_pengguna'   	=> $user['password'],
						'level_pengguna' 		=> $user['level'],
					);
					
					
					
					if ($user['level'] == 1) {
						 
						$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
							<center>
							Email atau Password salah.
							</center>
							</div>');
						redirect('login');
					} else {
						
						$this->session->set_userdata($data);
						
						if ($this->session->bypass == true) {
							redirect('keranjang/checkouts');
							redirect('members/dashboard');
						} else {
							redirect('members/dashboard');
						}
					}
				}
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    <center>
                    Email atau Password salah.
                    </center>
                    </div>');
				redirect('login');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                <center>
                Email Anda belum diverifikasi, silahkan cek email Anda.
                </center>
                </div>');
				redirect('login');
			}
			
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            <center>
            Email atau Password salah.
            </center>
            </div>');
			redirect('login');
		}
	}
	
	

	public function register()
	{
		$ses = $this->session->email_pengguna;

		if (!empty($ses)) {
			redirect(base_url());
		} else {
			$this->form_validation->set_rules('nama', 'Nama', 'required|trim|min_length[5]|max_length[50]', [
				'required' => 'Nama wajib diisi',
				'min_length' => 'Nama terlalu pendek',
				'max_length' => 'Nama terlalu panjang',

			]);
			 
			 
			$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[pengguna.email]', [
				'valid_email' => 'Email tidak valid',
				'is_unique' => 'Email sudah terdaftar',
				'required' => 'Email wajib diisi'

			]);
			$this->form_validation->set_rules('telp', 'Telp', 'required|trim|is_numeric', [
				'required' => 'No. Telp wajib diisi',
				'is_numeric' => 'No. Telp tidak valid', 

			]);
			
			$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]', [
				'min_length' => 'Password terlalu pendek',
				'required' => 'Password wajib diisi'
			]);
			
			$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]', [
				'matches' => 'Password tidak sama',
				'required' => 'Konfirmasi password wajib diisi'
			]);
			
			$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
				'required' => 'Alamat wajib diisi'
			]);
			
			$this->form_validation->set_rules('tgllahir', 'Tanggal Lahir', 'required|trim', [
				'required' => 'Tanggal lahir wajib diisi'
			]);
			
			$this->form_validation->set_rules('kodepos', 'Kode Pos', 'required|trim', [
				'required' => 'Kode Pos wajib diisi'
			]);
			
			$this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required|trim', [
				'required' => 'Kecamatan wajib diisi'
			]);
			
			$this->form_validation->set_rules('kota', 'Kota', 'required|trim', [
				'required' => 'Kota wajib diisi'
			]);

			if ($this->form_validation->run() == FALSE) {

				$data['title'] = 'Registrasi';
				$data['breadcrumb'] = 'Registrasi';
				$data['halamans'] = $this->model_halaman->halaman()->result();
				
				$this->template->load('home/template', 'home/auth/view_register', $data);
			} else {
				$set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
				$code = substr(str_shuffle($set), 0, 6);
				$code2 = substr(str_shuffle($set), 0, 6);

				$alamat = array(
					'id_kota' 	=> $this->input->post('kota'),
					'alamat' 	=> $this->input->post('alamat'),
					'kecamatan' => $this->input->post('kecamatan'),
					'kode_pos' 	=> $this->input->post('kodepos'),
				);
				
				$this->model_app->insert('alamat', $alamat);
				$data = [
					'id_alamat'             => $this->db->insert_id(),
					'email'         		=> htmlspecialchars($this->input->post('email', true)), 
					'nama_lengkap'        	=> htmlspecialchars($this->input->post('nama', true)),
					'jenis_kelamin' 		=> $this->input->post('jk'),
					'tgl_lahir' 			=> $this->input->post('tgllahir'),
					'no_telp'         		=> htmlspecialchars($this->input->post('telp', true)),
					'password'      		=> password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
					'aktif'					=> 1,
					'level'					=> 2,
					'kode_aktivasi' 		=> $code,
					'kode_resetpassword' 	=> $code2,
					'tgl_daftar' 			=> date('Y-m-d H:i:s'),
				];
				
				$email = $this->input->post('email');
				$subject      = "Aktivasi Akun";
				
				$message = "
						<h2>Terimakasih sudah mendaftar.</h2>
						<p>Akun Anda:</p>
						<p>Email: " . $email . "</p><br>
						<p>Silakan klik tautan di bawah ini untuk mengaktifkan akun Anda.</p>
						<a href='" . base_url() . "c?q=" . $code . "'>Aktivasi Akun</a>
					";

				//kirim_email($email, $subject, $message);
				$this->model_app->insert('pengguna', $data);
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
					<center>Berhasil mendaftar!<br>
					Silakan login menggunakan akun login Anda.
					</center>
				  </div>');
				redirect(base_url('login'));
			}
		}
	}

	public function logout()
	{
		 
		$this->session->unset_userdata('id_pengguna');
		$this->session->unset_userdata('email_pengguna');
		$this->session->unset_userdata('password_pengguna');
		$this->session->unset_userdata('level_pengguna');
		 
		  			
		redirect('login');
	}

	public function ganti_password()
	{
		$code = $_GET['q'];

		$query = $this->model_app->view_where('pengguna', "kode_resetpassword='$code'");
		$row = $query->row();

		if (!empty($row)) {

			if ($row->aktif == 1) {

				if ($row->kode_resetpassword == $code) {

					$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]', [
						'min_length' => 'Password terlalu pendek',
						'required' => 'Password wajib diisi'
					]);

					$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]', [
						'matches' => 'Password tidak sama',
						'required' => 'Konfirmasi password wajib diisi'
					]);

					if ($this->form_validation->run() == FALSE) {

						$data['title'] = 'Ganti Password';
						$data['breadcrumb'] = 'Ganti Password';
						$data['email'] = $row->email;
						$data['code'] = $row->kode_resetpassword;
						$this->template->load('home/template', 'home/auth/view_gantipass', $data);
					} else {


						$set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
						$kodereset = substr(str_shuffle($set), 0, 6);

						$email = $row->email;

						$datapass = [
							'password'      		=> password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
							'kode_resetpassword' 	=> $kodereset,

						];

						$this->db->where('email', $email);
						$this->db->update('pengguna', $datapass);
						$this->session->set_flashdata('message', '
						<div class="alert alert-success" role="alert">
            			<center>Ganti password berhasil.</center>
						</div>');
						redirect('login');
					}
				} else {
					redirect(base_url());
				}
			} else {
				redirect(base_url());
			}
		} else {
			redirect(base_url('error404'));
		}
	}
}
