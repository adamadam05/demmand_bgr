<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Admin extends CI_Controller {
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
				->get('user')
				->result_array();

			//data list user	
			$userx = $this->db
					->select()
					->get('profil_user')
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

			//Data ini digabung untuk di kirim ke view v_profile
			$data=	[
				'kode_user'	=>	$kode_user,
				'username'	=>	$userdata[0]['username'],
				'password'	=>	$userdata[0]['password'],
				'hp'		=>	$userdata[0]['hp'],
				'jenis_perusahaan'	=>	$userdata[0]['jenis_perusahaan'],
				'nama_perusahaan'	=>	$userdata[0]['nama_perusahaan'],
				'alamat'	=>	$userdata[0]['alamat'],
				'negara'	=>	$userdata[0]['negara'],
				'provinsi'	=>	$userdata[0]['provinsi'],
				'kota_kabupaten'	=>	$userdata[0]['kota_kabupaten'],
				'kode_pos'	=>	$userdata[0]['kode_pos'],
				'role_id'	=>	$userdata[0]['role_id'],
				'email'		=>	$userdata[0]['email'],
				'list_user'	=>	$userx,
				'list_jenis'	=>	$jenis,
				'list_negara'	=>	$negara,
				'list_provinsi'	=>	$provinsi,
				'list_kota'		=>	$kota,
				'role'	=>	$role
				];
			
			$this->load->view('admin/v_admin',$data);


		}else{
			$this->load->view('akun/v_login');
		}
	}

}
