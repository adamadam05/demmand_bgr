<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Register extends CI_Controller {
	private $captcha_sess_key = 'BGR_SECURITY_CAPTCHA';

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$roles = $this->db
				->select()
				->get('user_role')
				->result_array();
				
		$jenis = $this->db
				->select()
				->get('jenis_perusahaan')
				->result_array();

		$data=['roles'=>$roles, 'jenis'=>$jenis];
		
		$this->load->view('akun/v_register', $data);
	}
	
	public function prosesRegister(){
		$this->load->model('M_Users');
		
		$role = $this->input->post('role');
		$email = $this->input->post('email');
		$nama_perusahaan = $this->input->post('nama_perusahaan');
		$no_hp = $this->input->post('no_hp');
		$jenis = $this->input->post('jenis');
		$password = $this->input->post('password1');
		$pass = password_hash($password, PASSWORD_DEFAULT);
		$captcha = $this->input->post('captcha_words');//jika diperlukan maka perlu menambah kolom captcha pada tabel
		$timestamp=date('Y-m-d H:i:s');
		$token=md5(date('YmdHis').microtime().'bgr');
		
		$data = [
				'role_id' => $role,
				'email' => $email,
				'nama_perusahaan' => $nama_perusahaan,
				'hp' => $no_hp,
				'jenis_perusahaan' => $jenis,
				'password' => $pass,
				'created_at' => $timestamp,
				'token' => $token
			];
			
			$insert = $this->M_Users->simpanRegister($data);
			if($insert){
				$kirim_email= $this->emailAktivasi($email,$token);
				echo json_encode(['success' => 'success', 'result' => 'Registrasi sukses! '.$kirim_email]);
			}else{
				echo json_encode(['failure' => 'failure', 'result' => 'Registrasi gagal!']);
			}
	}

	//Fungsi untuk mengirim link aktivasi
    public function emailAktivasi($email,$token) {
        $this->load->config('email');
        $this->load->library('email');
        
        $dari = $this->config->item('smtp_user');
		$judul='Aktivasi Akun BGR Logistics';
		
		$isi_email='
            <div style="border-radius:8px;padding:36px;margin:auto;width:500px;height:auto;overflow-y:auto;background-color: #f8f8f8;color: #747474;font-family:Helvetica,Arial,sans-serif;line-height:150%;font-size:18px;">
				<p style="display:block;width:100%;text-align:center;margin: 0;margin-bottom: 10px;">
                	<!-- <img src="'.base_url().'production/images/bgr_logo.png" alt="BGRLogistic" height="120"> -->
                </p>
                <p style="display:block;width:100%;">
                	Terimakasih telah mendaftar sebagai mitra produsen pada Aplikasi Supply Demand PT Bhanda Ghara Reksa (Persero).
				</p>
                <p style="display:block;width:100%;">
					Silahkan verifikasi email anda dengan mengklik tombol verifikasi di bawah ini dan segera lengkapi data anda untuk menggunakan sistem secara penuh. 
				</p>
                <p style="display:block;width:100%;">
					Email verifikasi ini hanya dapat di gunakan dalam waktu 48 Jam setelah email pemberitahuan ini terkirim akun anda akan di hapus otomatis oleh sistem jika dalam waktu yang di tentukan tidak melakukan verifikasi. 
				</p>
                <p style="display:block;width:100%;">
					Terimakasih
                </p>	
				
                <p style="display:block;width:100%;">
                	<a href="'.site_url().'c_register/doAktivasi?email='.$email.'&token='.$token.'" style="width:40%;text-align:center;text-decoration:none;padding:10px;display:block;color: #fff;background-color: #ee7b1d;border-radius:6px;margin:auto;">Verifikasi Email</a>
                </p>	
            </div>
            <div style="padding:5px;margin:auto;width:500px;height:auto;overflow-y:auto;color: #747474;font-family:Helvetica,Arial,sans-serif;font-size:16px;text-align:center">
                <p><strong>Perhatian! </strong>Jika dalam waktu 48 jam mitra produsen tidak melakukan verifikasi maka akan hapus otomatis oleh sistem untuk registrasi</p>
            </div>
            ';

        $this->email->set_newline("\r\n");
        $this->email->from($dari);
        $this->email->to($email);
        $this->email->subject($judul);
        $this->email->message($isi_email);

        if ($this->email->send()) {
            return 'Link verifikasi telah dikirimkan melalui email, segera lakukan verifikasi dalam 48 jam';
        } else {
			return 'Email tidak terkirim';
        }		
    }
	
	//Aktivasi account melalui verifikasi email
	public function doAktivasi(){
		///$this->input->get()
		$email = $this->input->get('email');//ambil dari link aktivasi https://alamat/?email=alamat_email&token=data_token
		$token = $this->input->get('token');//ambil dari link aktivasi https://alamat/?email=alamat_email&token=data_token
			
		$tanggal_aktivasi=date('Y-m-d H:i:s');//buat ngecek lama waktu melakukan aktivasi, lewat 48 jam link expired
		
		$this->load->model('M_Users');
		
		if ($email && $token) {
			$data=[];
			//cek email & token & status belum aktivasi
			$cekuser = $this->db
				->where('email', $email)
				->where('token', $token)
				->where('aktivasi', 0)
				->get('user');
				
			$nuser=$cekuser->result();
			$kode=$cekuser->row();
			
			//cek tanggal sudah expired apa belum (48jam)
			$cektanggal = $this->db
				->where('email', $email)
				->where('token', $token)
				->where('TIMESTAMPDIFF(hour, created_at, \''.$tanggal_aktivasi.'\') <= 48')
				->get('user')
				->result();
								
			if(count($nuser)>0){
				if(count($cektanggal)>0){
					//Update tabel user yang berhasil aktivasi
					$this->db->set('aktivasi', 1);
					$this->db->where('email', $email);
					$this->db->where('token', $token);
					$this->db->where('TIMESTAMPDIFF(hour, created_at, \''.$tanggal_aktivasi.'\') <= 48');
					$accounts = $this->db->update('user');
					
					//input data profil produsen/konsumen pada tabel profil_user
					$kodeuser=$kode->kode_user;
					$roleuser=$kode->role_id;
						
					//Mencari id terakhir di tabel profil_user
					$lastid = $this->db
						->select_max('id_profil')
						->get('profil_user')
						->row();
					
					//Menentukan prefix kode berdasarkan role
					if($roleuser == 2){
						$prefix='PROD-';
					}else if($roleuser == 3){
						$prefix='KONS-';
					}
					
					//Generate Kode profil
					$kode_profil=$prefix.str_pad((int)$lastid->id_profil + 1, 6, "0", STR_PAD_LEFT);
					
					$this->load->model('M_Profil');
					$data_profile=['kode_user' => $kodeuser, 'kode_profil'=>$kode_profil, 'longitude'=>'1.1', 'latitude'=>'1.1'];
					$this->M_Profil->simpanProfil($data_profile);
					
					$data = ['success' => 'success', 'result' => '<div class="alert alert-success mt-5"><strong>Berhasil! </strong>Akun anda berhasil diverifikasi</div>'];
					
				} else {
					$data = ['failure' => 'failure', 'result' => '<div class="alert alert-danger mt-5"><strong>Gagal! </strong>Link verifikasi sudah tidak berlaku</div>'];
				}				
			}else{
				$data = ['failure' => 'failure', 'result' => '<div class="alert alert-danger mt-5"><strong>Gagal! </strong>Link verifikasi tidak valid</div>'];
			}
		}
		//Load view halaman informasi hasil verifikasi, valid, tidak valid atau expired
		$this->load->view('akun/v_aktivasi', $data);
	}
	
}//end
