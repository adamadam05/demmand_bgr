<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Auth extends CI_Controller {
	private $captcha_sess_key = 'BGR_SECURITY_CAPTCHA';

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('akun/v_login');
	}

	

	public function submitLogin()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$message = '';

		$this->load->model('M_Users');

		if ($email && $password) {
			$accounts = $this->db
				->where('email', $email)
				->where('aktivasi', 1)
				->get('user')
				->result();

			if ($accounts) {
				if (count($accounts) === 1) {
					$account = $accounts[0];
					
					if (password_verify($password, $account->password)) {
						$account->login_attempt = (int) $account->login_attempt;
						if ($account->login_attempt < 3) {
							$this->session->set_userdata([
								'kode_user' => $account->kode_user,
								'nama_perusahaan' => $account->nama_perusahaan,
								'email' => $account->email,
								'role_id' => $account->role_id,
								'jenis_perusahaan' => $account->jenis_perusahaan
								// tambahkan lainnya
							]);
							$this->M_Users->updateLoginAttempt($account->username);

							$this->load->library('user_agent');

							$agent = 'No Data';
							if ($this->agent->is_browser()) {
								$agent = $this->agent->browser() . ' ' . $this->agent->version();
							} elseif ($this->agent->is_mobile()) {
								$agent = $this->agent->mobile();
							}

							$this->load->model('M_Log_Login');

							$this->M_Log_Login->insertLogLogin([
								'captcha' => $this->session->userdata($this->captcha_sess_key),
								'user_uuid' => $account->kode_user,
								'role_id' => $account->role_id,
								'browser' => $agent,
								'platform' => $this->agent->platform(),
								'ip' => $this->input->ip_address(),
							]);
							//simpan sesi
							echo json_encode(['success' => 'success', 'result' => 'Anda berhasil login, ' . $account->nama_perusahaan, 'role_id' => $account->role_id, 'email' => $account->email]);
							die;
						} else {
							$message = 'Akun Anda terblokir, mohon menghubungi administrator!';
						}
					} else {
						$max_attempt = 3;
						if ($account->login_attempt < $max_attempt) {
							$loginAttempt = $account->login_attempt + 1;
							$loginChances = (int) $max_attempt - (int) $account->login_attempt;
							$this->M_Users->updateLoginAttempt($account->kode_user, $loginAttempt);
							$message = 'Anda memiliki ' . $loginChances . ' kesempatan lagi untuk login';
						} else {
							$message = 'Akun Anda terblokir, mohon menghubungi administrator!';
						}
					}
				} else {
					$message = 'Lebih dari 1 akun untuk username ini, mohon menghubungi administrator!';
				}
			} else {
				$message = 'Akun tidak ditemukan, mohon dicek kembali data akun anda';
			}

			echo json_encode(['failure' => 'failure', 'result' => $message]);
		} else {
			echo json_encode(['failure' => 'failure', 'result' => 'Mohon untuk memasukkan data akun']);
		}
	}

	public function logout()
    {
        // hancurkan semua sesi
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('role_id');
		$this->session->unset_userdata('email');
        $this->session->sess_destroy();
        redirect(base_url("C_Auth/index"));

    }



	
}
