<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Produsen extends CI_Controller {
	function __construct(){
		parent::__construct();	
		
		$this->load->model('M_Produsen');
		
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
				->get('user')
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
				'list_jenis'	=>	$jenis,
				'list_negara'	=>	$negara,
				'list_provinsi'	=>	$provinsi,
				'list_kota'		=>	$kota,
				'role'	=>	$role
				];
			
			$this->load->view('produsen/v_produsen',$data);

		}else{
			$this->load->view('akun/v_login');
		}
	}



	

	public function produsen_pemesanan()
	{
		$this->load->view('produsen/v_produsen_info_pemesanan');
	}

	public function produsen_stock_gudang()
	{
		$this->load->view('produsen/v_produsen_stock_gudang');
	}

	public function produsen_data_inbond()
	{
		$data['inbound']=$this->M_Produsen->getinbound();
		$this->load->view('produsen/v_produsen_inbond', $data);
		
	}

	// public function produsen_detail_inbond()
	// {
	// 	$data['inbound']=$this->M_Produsen->getinbound();
	// 	$this->load->view('produsen/v_produsen_detail_inbond', $data);
	// }




	public function inbound_detail($id){
		// $data['kode'] = $this->M_Produsen->kode();

		// $this->load->model('M_Produsen');

		// $inbound = $this->M_Produsen->getdetail($id);
		// $data['inbound'] = $inbound;

		// $this->load->view('produsen/v_produsen_detail_inbond', $data);

		//  simpan data inbond ke database
		
		$inbound = $this->M_Produsen->getdetail($id);
		$data['inbound'] = $inbound;
		// produk

		$data['produk']=$this->M_Produsen->get_sambung_produk();


		$this->load->view('produsen/v_produsen_detail_inbond', $data);

	}

	// dhoni
	public function produsen_insert_inbond()
	{
		$data['kode'] = $this->M_Produsen->kode_inbond();
		$data['inbound']=$this->M_Produsen->getinbound();
		$data['gudang']=$this->M_Produsen->getGudang();
		$data['provinsi']=$this->M_Produsen->getProvinsi();
		$data['kk']=$this->M_Produsen->getKK();
		$data['produk']=$this->M_Produsen->get_sambung_produk();


		$this->load->view('produsen/v_produsen_insert_inbond', $data);
	}


	public function input_produk(){
		if($_POST){
			$kode_penyambung_produk_inbound = $this->input->post('kode_penyambung_produk_inbound');
			$no_gr = $this->input->post('no_gr');
	 		$kode_barang = $this->input->post('kode_barang');
			$kode_uom = $this->input->post('kode_uom');
			$qty = $this->input->post('qty');
			

			$this->M_Produsen->insert_produk(array(
				'kode_penyambung_produk_inbound' 		=> $kode_penyambung_produk_inbound,
				'no_gr' 		=> $no_gr,
				'kode_barang'		=> $kode_barang,
				'kode_uom'		=> $kode_uom,
				'qty'		=> $qty,
			));
		}
		redirect("C_Produsen/produsen_insert_inbond");
	}

	public function input_inbound(){
		if($_POST){
			$no_gr = $this->input->post('no_gr');
			$no_do = $this->input->post('no_do');
	 		$do_date = $this->input->post('do_date');
			$do_type = $this->input->post('do_type');
			
			$province_dest = $this->input->post('province_dest');
			$city_dest = $this->input->post('city_dest');
			$wh_dest = $this->input->post('wh_dest');
			
			$etd = $this->input->post('etd');
			$eta = $this->input->post('eta');
			$this->M_Produsen->insert_inbound(array(
				'no_gr' 		=> $no_gr,
				'no_do' 		=> $no_do,
				'do_date'		=> $do_date,
				'do_type'		=> $do_type,
				
				'province_dest'		=> $province_dest,
				'city_dest'		=> $city_dest,
				'wh_dest'		=> $wh_dest,

				'etd'			=> $etd,
				'eta'			=> $eta,

			));
		}
		redirect("C_Produsen/produsen_data_inbond");
	}

	//Delete inbound from Database
	function delete_inbound(){
		$no_gr = $this->uri->segment(3);
		$this->M_Produsen->delete_inbound($no_gr);
		$this->session->set_flashdata('msg','<div class="alert alert-success">Data Deleted</div>');
		redirect('C_Produsen/produsen_data_inbond');
	}

	//Delete produk from Database
	function delete_produk(){
		$no_gr = $this->uri->segment(3);
		$this->M_Produsen->delete_produk($no_gr);
		$this->session->set_flashdata('msg','<div class="alert alert-success">Data Deleted</div>');
		redirect('C_Produsen/produsen_insert_inbond');
	}


	public function produsen_insert_produk()
	{
		$data['inbound']=$this->M_Produsen->getinbound();
		$data['sembako']=$this->M_Produsen->getsembako();
		$data['uom']=$this->M_Produsen->getuom();

		$this->load->view('produsen/v_produsen_insert_produk', $data);
	}
	// dhoni

	// testing
	public function get_produk_inbound()
	{
		$data['inbound']=$this->M_Produsen->get_produk_inbound();
		echo json_encode($data);
		// var_dump($data);
		die();
		$this->load->view('produsen/v_produsen_insert_produk', $data);
	}
	// testing

	public function produsen_edit_produk()
	{
		$data['inbound']=$this->M_Produsen->getinbound();
		$this->load->view('produsen/v_produsen_edit_produk', $data);
	}

	// public function produsen_data_inbond()
	// {
	// 	$data['inbound']=$this->M_Produsen->getinbound();
	// 	$this->load->view('produsen/v_produsen_inbond', $data);
		
	// }


	// data outbound

	public function produsen_data_outbound()
	{
		// $data['outbound']=$this->M_Produsen->getoutbound();
		// $this->load->view('produsen/v_produsen_outbound', $data);
		$data['outbound']=$this->M_Produsen->getoutbound();
		$this->load->view('produsen/v_produsen_outbound', $data);
		
	}

	public function input_outbound(){
		if($_POST){
			$no_gi = $this->input->post('no_gi');
			$no_do = $this->input->post('no_do');
	 		$do_date = $this->input->post('do_date');
			 $do_type = $this->input->post('do_type');

			 $wh_dest = $this->input->post('wh_dest');
			 $province_dest = $this->input->post('province_dest');
			 $city_dest = $this->input->post('city_dest');


			 $etd = $this->input->post('etd');
			 $eta = $this->input->post('eta');

			$this->M_Produsen->insert_outbound(array(
				'no_gi' 		=> $no_gi,
				'no_do' 		=> $no_do,
				'do_date'		=> $do_date,
				'do_type'		=> $do_type,
				'wh_dest'		=> $wh_dest,
				'province_dest'		=> $province_dest,
				'city_dest'		=> $city_dest,
				'etd'			=> $etd,
				'eta'			=> $eta,
			));
		}
		redirect("C_Produsen/produsen_data_outbound");
	}                                 


	public function outbound_detail($id){
		

		//  simpan data outbond ke database
		
		$outbound = $this->M_Produsen->getlihat($id);
		$data['outbound'] = $outbound;
		$data['produk']=$this->M_Produsen->get_sambung_produk();


		$this->load->view('produsen/v_produsen_detail_outbound', $data);

	}

	public function produsen_insert_outbound()
	{
		$data['kode'] = $this->M_Produsen->kode_outbound();
		$data['outbound']=$this->M_Produsen->getoutbound();
		$data['gudang']=$this->M_Produsen->getGudang();
		$data['provinsi']=$this->M_Produsen->getProvinsi();
		$data['kk']=$this->M_Produsen->getKK();
		$data['produk']=$this->M_Produsen->get_sambung_produk();

		// produk
		// $data['outbound_produk']=$this->M_Produsen->get_produk_outbound();
		$this->load->view('produsen/v_produsen_insert_outbound', $data);
	}
                                


	//Delete inbound from Database
	function delete_outbound(){
		$no_gi = $this->uri->segment(3);
		$this->M_Produsen->delete_outbound($no_gi);
		$this->session->set_flashdata('msg','<div class="alert alert-success">data Deleted</div>');
		redirect('C_Produsen/produsen_data_outbound');
	}
	
}
