<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Profile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Users');
		$this->load->database();
	}

	public function index()
	{
		//Cek kalau session kode_user sudah ada sebelumnya
		$kode_user = $this->session->userdata('kode_user');
		
		if(! $kode_user == null){
			$role = $this->session->userdata('role_id');
			
			$userdata = $this
				->db
				->select()
				->where('kode_user', $kode_user)
				->join('user_role', 'user_role.kode_role = user.role_id', 'left')
				->get('user')
				->result_array();

			//data list komoditas_produksi	
			$komoditas_produksi = $this->db
					->select()
					->get('komoditas_produksi')
					->result_array();
				
			//data list negara	
			$negara = $this->db
					->select()
					->get('negara')
					->result_array();

			//data list provinsi	
			$provinsi = $this->db
					->select()
					->get('provinsi')
					->result_array();

			//data list kota	
			$kota = $this->db
					->select()
					->get('kota_kabupaten')
					->result_array();	

			//data list jenis perusahaan	
			$jenis = $this->db
					->select()
					->get('jenis_perusahaan')
					->result_array();

			$kecamatan = $this->db
					->select()
					->get('kecamatan')
					->result_array();

			//Data ini digabung untuk di kirim ke view v_profile
			$data=	[
				'kode_user'	=>	$kode_user,
				'username'	=>	$userdata[0]['username'],
				'nama_role'	=>	$userdata[0]['role'],
				'password'	=>	$userdata[0]['password'],
				'hp'		=>	$userdata[0]['hp'],
				'jenis_perusahaan'	=>	$userdata[0]['jenis_perusahaan'],
				'nama_perusahaan'	=>	$userdata[0]['nama_perusahaan'],
				'alamat'	=>	$userdata[0]['alamat'],
				//'komoditas_produksi'	=>	$userdata[0]['komoditas_produksi'],
				'negara'	=>	$userdata[0]['negara'],
				'provinsi'	=>	$userdata[0]['provinsi'],
				'kota_kabupaten'	=>	$userdata[0]['kota_kabupaten'],
				'kode_pos'	=>	$userdata[0]['kode_pos'],
				'role_id'	=>	$userdata[0]['role_id'],
				'email'		=>	$userdata[0]['email'],
				'list_jenis'	=>	$jenis,
				'list_komoditas_produksi'	=>	$komoditas_produksi,
				'list_negara'	=>	$negara,
				'list_provinsi'	=>	$provinsi,
				'list_kota'		=>	$kota,
				'list_kecamatan'	=> $kecamatan,
				'role'	=>	$role
				];
				
				//ambil kode profile
				$data_profil=[];
				
				//if(! $role==1){
				$profil = $this
							->db
							->select()
							->where('kode_user', $kode_user)
							->get('profil_user');
					
				$dataprofil=$profil->row();
				$nrow=$profil->num_rows();
				if ($nrow>0){				
					$data_profil=[
					'kode_userx'=>$dataprofil->kode_user,
					'kode_profil'=>$dataprofil->kode_profil,
					'nama_kelompok'=>$dataprofil->nama_kelompok,
					'nama_gudang'=>$dataprofil->nama_gudang,
					'jenis_kepemilikan'=>$dataprofil->jenis_kepemilikan,
					'kategori_perusahaan'=>$dataprofil->kategori_perusahaan,
					'komoditas_produksi2'=>$dataprofil->komoditas_produksi,
					'negara2'=>$dataprofil->negara,
					'provinsi2'=>$dataprofil->provinsi,
					'kota_kabupaten2'=>$dataprofil->kota_kabupaten,
					'kecamatan2'=>$dataprofil->kecamatan,
					'alamat'=>$dataprofil->alamat,
					'kodepos'=>$dataprofil->kodepos,
					'longitude'=>$dataprofil->longitude,
					'latitude'=>$dataprofil->latitude,
					'telepon_perusahaan'=>$dataprofil->telepon_perusahaan,
					'email_perusahaan'=>$dataprofil->email_perusahaan,
					'npwp_perusahaan'=>$dataprofil->npwp_perusahaan,
					'upload_npwp_perusahaan'=>$dataprofil->upload_npwp_perusahaan,
					'nama_pic'=>$dataprofil->nama_pic,
					'posisi_pic'=>$dataprofil->posisi_pic,
					'hp_pic'=>$dataprofil->hp_pic,
					'email_pic'=>$dataprofil->email_pic,
					'ktp_pic'=>$dataprofil->ktp_pic,
					'upload_ktp_pic'=>$dataprofil->upload_ktp_pic,
					'npwp_pic'=>$dataprofil->npwp_pic,
					'upload_npwp_pic'=>$dataprofil->upload_npwp_pic,
					'status'=>$dataprofil->status
					];
				}else{
					$data_profil=[];
				}
				
			if($role==1){
				$userdata = $this
					->db
					->select()
					->where('kode_user', $kode_user)
					->get('user')
					->result_array();
					// $userdata[0]["list_perusahan"]=$jenis;
				$this->load->view('admin/v_admin_profile',array_merge($data,$userdata[0]));
				
			}else{
				$this->load->view('v_profile_user',array_merge($data,$data_profil));
			}
			/**
			switch ($role){
				case 1:
					//Khusus admin halaman profil dan controller update-nya dibedakan
					$this->load->view('v_profile_admin',$data);
				break;
				case 2:				
					//$this->load->view('produsen/v_profile_produsen',array_merge($data,$data_profil));
				break;
				case 3:
					//$this->load->view('konsumen/v_profile_konsumen',array_merge($data,$data_profil));
				break;
			}
			**/
		}else{
			$this->load->view('akun/v_login');
		}
	}
	
	public function simpanProfileAdmin(){
		//Setting file yg akan diupload
		$config = array(
        'upload_path' => './production/images/',
        'allowed_types' => "gif|jpg|png|jpeg",
        'overwrite' => TRUE,
        'max_size' => "200000", 
        'max_height' => "500",
        'max_width' => "500"
        );
		
		//load library upload dengan menambah config
        $this->load->library('upload', $config);
		
		//mengambil parameter dari form yang disubmit
		
		$kode_user = $this->input->post('kode_user');
		$username = $this->input->post('username');
		$email = $this->input->post('email');
		$nama_perusahaan = $this->input->post('nama_perusahaan');
		$jenis_perusahaan = $this->input->post('jenis_perusahaan');
		//$komoditas_produksi = $this->input->post('komoditas_produksi');
		$negara = $this->input->post('negara');
		$provinsi = $this->input->post('provinsi');
		$kota_kabupaten = $this->input->post('kota_kabupaten');
		$kode_pos = $this->input->post('kode_pos');
		$alamat = $this->input->post('alamat');
		$hp = $this->input->post('hp');
		$foto = $this->input->post('foto');
		
		//Array field dan data yang akan diupdate pada tabel user
		$data = [
				'username' =>	$username,
				'hp'	=>	$hp,
				'jenis_perusahaan'	=>	$jenis_perusahaan,
				'nama_perusahaan'	=>	$nama_perusahaan,
				'alamat'	=>	$alamat,
				//'komoditas_produksi'	=>	$komoditas_produksi,
				'negara'	=>	$negara,
				'provinsi'	=>	$provinsi,
				'kota_kabupaten'	=>	$kota_kabupaten,
				'kode_pos'	=>	$kode_pos,
				'email'	=>	$email
			];
			
		$image = '';

		if(!$this->upload->do_upload('foto')){ 
			echo json_encode(['failure' => 'failure', 'result' => strip_tags($this->upload->display_errors()),]);
		}else{
			$imageDetailArray = $this->upload->data();
			$image =  $imageDetailArray['file_name'];
			$data = array_merge($data, ['foto'=>$image]);
		
			$this->db->set($data);
			$this->db->where('kode_user', $kode_user);
			$update = $this->db->update('profil_user');
			
			if($update){
				echo json_encode(['success' => 'success', 'result' => 'Update profile sukses',]);
			}else{
				echo json_encode(['failure' => 'failure', 'result' => 'Update profile gagal',]);
			}	
		}
	}
	
	//Metode untuk menyimpan profile user selain admin (produsen dan konsumen)

	public function update_admin(){
		$input = $this->input->post();
		$this->M_Users->updateProfileById($input["kode_user"],$input);
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function simpanProfileUser(){
		
		//Setting file yg akan diupload
		$config = array(
        'upload_path' => './production/images/',
        'allowed_types' => "gif|jpg|png|jpeg",
        'overwrite' => TRUE,
        'max_size' => "200000", 
        'max_height' => "500",
        'max_width' => "500"
        );
		
		//load library upload dengan menambah config
        $this->load->library('upload', $config);
		$kode_user=	$this->input->post('kode_user');

		//Array field dan data yang akan diupdate pada tabel user
		$data = [
			'nama_kelompok'=>$this->input->post('nama_kelompok'),
			'nama_gudang'=>$this->input->post('nama_gudang'),
			'jenis_kepemilikan'=>$this->input->post('jenis_kepemilikan'),
			'kategori_perusahaan'=>$this->input->post('kategori_perusahaan'),
			'komoditas_produksi'=>$this->input->post('komoditas_produksi'),
			'negara'=>$this->input->post('negara'),
			'provinsi'=>$this->input->post('provinsi'),
			'kota_kabupaten'=>$this->input->post('kota_kabupaten'),
			'kecamatan'=>$this->input->post('kecamatan'),
			'alamat'=>$this->input->post('alamat'),
			'kodepos'=>$this->input->post('kodepos'),
			'longitude'=>$this->input->post('longitude'),
			'latitude'=>$this->input->post('latitude'),
			'telepon_perusahaan'=>$this->input->post('telepon_perusahaan'),
			'email_perusahaan'=>$this->input->post('email_perusahaan'),
			'npwp_perusahaan'=>$this->input->post('npwp_perusahaan'),
			'nama_pic'=>$this->input->post('nama_pic'),
			'posisi_pic'=>$this->input->post('posisi_pic'),
			'hp_pic'=>$this->input->post('hp_pic'),
			'email_pic'=>$this->input->post('email_pic'),
			'ktp_pic'=>$this->input->post('ktp_pic'),
			'npwp_pic'=>$this->input->post('npwp_pic'),
		];

			
		//Cek jika file yang diupload valid
		$cek1 = true;
		$cek2 = true;
		$cek3 = true;

		if(!$this->upload->do_upload('upload_npwp_perusahaan') && ((empty($this->input->post('is_upload_npwp_perusahaan')) && !empty($_FILES["upload_npwp_perusahaan"])) || (!empty($this->input->post('is_upload_npwp_perusahaan')) && !empty($_FILES["upload_npwp_perusahaan"])) || (empty($this->input->post('is_upload_npwp_perusahaan')) && empty($_FILES["upload_npwp_perusahaan"])))){ 
			$cek1 = false;
		}else{
			if($cek1 && !empty($_FILES["upload_npwp_perusahaan"])){
				$imageDetailArray = $this->upload->data();
				$data = array_merge($data, ['upload_npwp_perusahaan'=>$imageDetailArray['file_name']]);
			}

		}
		
		if(!$this->upload->do_upload('upload_ktp_pic') && ((empty($this->input->post('is_upload_ktp_pic')) && !empty($_FILES["upload_ktp_pic"])) || (!empty($this->input->post('is_upload_ktp_pic')) && !empty($_FILES["upload_ktp_pic"])) || (empty($this->input->post('is_upload_ktp_pic')) && empty($_FILES["upload_ktp_pic"])))){ 
			$cek2 = false;
		}else{
			if($cek2 && !empty($_FILES["upload_ktp_pic"])){
				$imageDetailArray = $this->upload->data();
				$data = array_merge($data, ['upload_ktp_pic'=>$imageDetailArray['file_name']]);
			}
		}
		
		
		if(!$this->upload->do_upload('upload_npwp_pic') && ((empty($this->input->post('is_upload_npwp_pic')) && !empty($_FILES["upload_npwp_pic"])) || (!empty($this->input->post('is_upload_npwp_pic')) && !empty($_FILES["upload_npwp_pic"])) || (empty($this->input->post('is_upload_npwp_pic')) && empty($_FILES["upload_npwp_pic"])))){ 
			$cek3 = false;
		}else{
			if($cek3 && !empty($_FILES["upload_npwp_pic"])){
				$imageDetailArray = $this->upload->data();
				$data = array_merge($data, ['upload_npwp_pic'=>$imageDetailArray['file_name']]);
			}
		}
		
		if($cek1 && $cek2 && $cek3){
			//Jika semua file yang diupload valid maka database user akan diupdate disini
			$update = $this->db->where('kode_user', $kode_user)->update('profil_user',$data);
			if($update){
				echo json_encode(['success' => 'success', 'result' => 'Update profile sukses',]);
			}else{
				echo json_encode(['failure' => 'failure', 'result' => 'Update profile gagal',]);
			}	
		}
		else{
			//Jika ada file yang tidak valid akan muncul pesan error
			if(! $cek1){
				echo json_encode(['failure' => 'failure', 'result' => 'Upload file gagal, File NPWP Perusahaan tidak sesuai ketentuan (Ukuran Harus 500x500, Dengan Maksimal Ukuran File 2MB)',]);
			}else if(! $cek2){
				echo json_encode(['failure' => 'failure', 'result' => 'Upload file gagal, File KTP PIC tidak sesuai ketentuan (Ukuran Harus 500x500, Dengan Maksimal Ukuran File 2MB)',]);
			}else{
				echo json_encode(['failure' => 'failure', 'result' => 'Upload file gagal, File NPWP PIC tidak sesuai ketentuan (Ukuran Harus 500x500, Dengan Maksimal Ukuran File 2MB)',]);
			}
		}
		
	}

}
