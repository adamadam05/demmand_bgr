<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Dompdf\Dompdf;
use Dompdf\Options;
class C_Konsumen extends CI_Controller {

	function __construct(){
		parent::__construct();	
		
		$this->load->model('M_Konsumen');
		$this->load->helper(array('form', 'url'));
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
			
			$this->load->view('konsumen/v_konsumen',$data);

		}else{
			$this->load->view('akun/v_login');
		}
		
	}
	// public function konsumen_po()
	// {
	// 	$this->load->view('konsumen/v_konsumen_po');
	// }

	public function konsumen_po()
	{

		$kode_user = $this->session->userdata('kode_user');
		
		if(! $kode_user == null){
			$role = $this->session->userdata('role_id');
			if($role == 1){
				$userdata = $this
				->db
				->select()
				->where('kode_user', $kode_user)
				->get('user')
				->result_array();
				$data['nama_perusahaan']= $userdata[0]['nama_perusahaan'];
				if((isset($_GET["dari"]) && !empty($_GET["dari"])) && (isset($_GET["sampai"]) && !empty($_GET["sampai"]))){
					$data['konsumen']=$this->M_Konsumen->getpemesananbydate($_GET["dari"],$_GET["sampai"]);

					$data['dari'] = $_GET["dari"];
					$data['sampai'] = $_GET["sampai"];
				}else{
					$data['konsumen']=$this->M_Konsumen->getpemesanan();
				}
				
				$data['pemesanan'] = $this->M_Konsumen->get_all_pemesanan();
				if(isset($_GET["export"]) && !empty($_GET["export"])){
					$buyerId = array_values(array_column($data['konsumen'], 'buyer_id'));
					$data["pemesanan_detail"] = $this->M_Konsumen->getdetailpemesananbygroup($buyerId);
					switch ($_GET["export"]) {
						case 'pdf':
						case 'print':
							$options = new Options();
							$options->set('isRemoteEnabled', TRUE);
							$dompdf = new Dompdf($options);
							$html = $this->load->view("pemesanan_pdf",$data, TRUE);
							$dompdf->load_html($html);
							$dompdf->setPaper("A4", "potrait");
							$dompdf->render();
							return $dompdf->stream("pemesanan-".time().".pdf",array("Attachment" => $_GET["export"] == "print" ? false : true));
							break;
						case 'csv':
							$fp = fopen('php://output', 'w');
	
							// tell the browser it's going to be a csv file
							header('Content-Type: application/csv');
							// tell the browser we want to save it instead of displaying it
							header('Content-Disposition: attachment; filename=pemesanan-'.time().'.csv;');
							fputcsv($fp,["PO ID","PO Date","Warehouse","Commodity","Destination","Address","Status"]);
							foreach ($data["konsumen"] as $value) {
								fputcsv($fp, [$value->buyer_id,$value->po_date,$value->wh_dest,$value->count_comodity,$value->province_dest,(strlen($value->addr_dest) > 20 ) ? substr($value->addr_dest,0,20).".." : $value->addr_dest, $value->is_complete == 0 ? "Processed" : "Completed"]);
								foreach ($data["pemesanan_detail"] as $valueDetail) {
									if($valueDetail->buyer_id_fk == $value->buyer_id) {
										fputcsv($fp,[$valueDetail->nama_komoditi,$valueDetail->nama_komoditi,$valueDetail->fulfillment_date,$valueDetail->qty,$valueDetail->UoM]);
									}
								}
							}
							return null;
							break;
						default:
							# code...
							break;
					}
				}else{
					return $this->load->view('admin/v_admin_po', $data);
				}
			}

			if((isset($_GET["dari"]) && !empty($_GET["dari"])) && (isset($_GET["sampai"]) && !empty($_GET["sampai"]))){
				$data['konsumen']=$this->M_Konsumen->getpemesanan_by_auth_date($kode_user,$_GET["dari"],$_GET["sampai"]);
				$data['dari'] = $_GET["dari"];
				$data['sampai'] = $_GET["sampai"];
			}else{
				$data['konsumen']=$this->M_Konsumen->getpemesanan_by_auth($kode_user);
			}	
			$data['pemesanan'] = $this->M_Konsumen->get_all_pemesanan_by_auth($kode_user);
			if(isset($_GET["export"]) && !empty($_GET["export"])){
				$buyerId = array_values(array_column($data['konsumen'], 'buyer_id'));
				$data["pemesanan_detail"] = $this->M_Konsumen->getdetailpemesananbygroup($buyerId);
				switch ($_GET["export"]) {
					case 'pdf':
					case 'print':
						$options = new Options();
						$options->set('isRemoteEnabled', TRUE);
						$dompdf = new Dompdf($options);
						$html = $this->load->view("pemesanan_pdf",$data, TRUE);
						$dompdf->load_html($html);
						$dompdf->setPaper("A4", "potrait");
						$dompdf->render();
						return $dompdf->stream("pemesanan-".time().".pdf",array("Attachment" => $_GET["export"] == "print" ? false : true));
						break;
					case 'csv':
						$fp = fopen('php://output', 'w');

						// tell the browser it's going to be a csv file
						header('Content-Type: application/csv');
						// tell the browser we want to save it instead of displaying it
						header('Content-Disposition: attachment; filename=pemesanan-'.time().'.csv;');
						fputcsv($fp,["PO ID","PO Date","Warehouse","Commodity","Destination","Address","Status"]);
						foreach ($data["konsumen"] as $value) {
							fputcsv($fp, [$value->buyer_id,$value->po_date,$value->wh_dest,$value->count_comodity,$value->province_dest,(strlen($value->addr_dest) > 20 ) ? substr($value->addr_dest,0,20).".." : $value->addr_dest, $value->is_complete == 0 ? "Processed" : "Completed"]);
							foreach ($data["pemesanan_detail"] as $valueDetail) {
								if($valueDetail->buyer_id_fk == $value->buyer_id) {
									fputcsv($fp,[$valueDetail->nama_komoditi,$valueDetail->nama_komoditi,$valueDetail->fulfillment_date,$valueDetail->qty,$valueDetail->UoM]);
								}
							}
						}
						return null;
						break;
					default:
						# code...
						break;
				}
			}else{
				return $this->load->view('konsumen/v_konsumen_po', $data);
			}
			
		}else{
			$this->load->view('akun/v_login');
		}
	}


	// konsumen insert po
	public function konsumen_insert_po()
	{
		$data = [];
		$kode_user = $this->session->userdata('kode_user');
		
		if(! $kode_user == null){
			$data["userdata"] = $this
				->db
				->select()
				->where('kode_user', $kode_user)
				->get('profil_user')
				->result_array();
			

			if(isset($_GET["buyer"]) && !empty($_GET["buyer"])){
				$data["buyer"] = $this->M_Konsumen->getPesananById($_GET["buyer"]);
				$data["komoditi"] = $this->M_Konsumen->getKomoditi();
				if(isset($data["buyer"][0]["is_complete"]) && $data["buyer"][0]["is_complete"] > 0){
					redirect("c_konsumen/konsumen_detail_po?buyer=".$data["buyer"][0]["buyer_id"]);
				}
			}

			$this->load->view('konsumen/v_konsumen_insert_po',$data);

		}else{
			$this->load->view('akun/v_login');
		}
	}

	public function konsumen_detail_po()
	{
		$data = [];
		$kode_user = $this->session->userdata('kode_user');
		
		if(! $kode_user == null){
			$data["userdata"] = $this
				->db
				->select()
				->where('kode_user', $kode_user)
				->get('profil_user')
				->result_array();
			

			if(isset($_GET["buyer"]) && !empty($_GET["buyer"])){
				$data["buyer"] = $this->M_Konsumen->getPesananById($_GET["buyer"]);
				if(count($data["buyer"]) == 0){
					redirect($_SERVER['HTTP_REFERER']);
				}
				$data["komoditi"] = $this->M_Konsumen->getKomoditi();
				$role = $this->session->userdata('role_id');
				if($role == 1)
				{
					$userdata = $this
					->db
					->select()
					->where('kode_user', $kode_user)
					->get('user')
					->result_array();
					$data['nama_perusahaan']= $userdata[0]['nama_perusahaan'];
					return $this->load->view('admin/v_admin_detail_po',$data);
				}
				$this->load->view('konsumen/v_konsumen_detail_po',$data);
			}

			

		}else{
			$this->load->view('akun/v_login');
		}
	}

	public function insert_po()
    {

            $this->form_validation->set_rules("kode_user", "kode_user", "required");
            // $this->form_validation->set_rules("po_type", "po_type", "required");
            // $this->form_validation->set_rules("city_dest", "city_dest", "required");
			// $this->form_validation->set_rules("province_dest", "province_dest", "required");
            // $this->form_validation->set_rules("wh_dest", "wh_dest", "required");
			// $this->form_validation->set_rules("sub_dest", "sub_dest", "required");
			// $this->form_validation->set_rules("addr_dest", "addr_dest", "required");

            if ($this->form_validation->run() == FALSE) {
				$this->load->view('konsumen/v_konsumen_insert_po');
            } else {
                $insert = $this->M_Konsumen->input_po();
                // $this->session->set_flashdata("flasher", "input berhasil!");
                redirect("c_konsumen/konsumen_insert_po?buyer=".$insert);
            }
    }


	// edit pemesanan po
	public function konsumen_edit_pemesanan($buyer_id)
	{
		$data['pemesanan'] = $this->M_Konsumen->get_pemesanan($buyer_id);
		$this->form_validation->set_rules("komoditi", "komoditi", "required");
	

            if ($this->form_validation->run() == FALSE) {
				$this->load->view('konsumen/v_konsumen_edit_pemesanan',$data);
            } else {
                $this->M_Konsumen->edit_po();
                // $this->session->set_flashdata("flasher", "Order Data Updated!");
                redirect("c_konsumen/konsumen_po");
            }
       
    
		$data['konsumen']=$this->M_Konsumen->getpemesanan();
		
	}

	
	// delete pemesanan
	function delete_pemesanan()
	{
		$buyer_id = $this->uri->segment(3);
		$this->M_Konsumen->delete_po($buyer_id);
		$this->session->set_flashdata('msg','<div class="alert alert-success">Data Deleted</div>');
		redirect('c_konsumen/konsumen_po');
	}

	function complete_pemesanan()
	{
		if((isset($_GET["buyer"])) && !empty($_GET["buyer"])){
			$this->M_Konsumen->complete_po($_GET["buyer"]);
			$this->session->set_flashdata('msg','<div class="alert alert-success">Data Complete</div>');
			redirect('c_konsumen/konsumen_po');
		}else{
			redirect($_SERVER['HTTP_REFERER']);
		}
		
	}
	//Delete pre order from Database
	// function delete_po(){
	// 	$no_gr = $this->uri->segment(3);
	// 	$this->M_Produsen->delete_po($no_gr);
	// 	$this->session->set_flashdata('msg','<div class="alert alert-success">Data Deleted</div>');
	// 	redirect('C_Konsumen/konsumen_insert_po');
	// }
	

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


	public function insert_item()
	{
		$kode_user = $this->session->userdata('kode_user');
		if(! $kode_user == null){
			$this->form_validation->set_rules("kode_komoditi", "kode_komoditi", "required");
			$this->form_validation->set_rules("fullfillment", "fullfillment", "required");
			$this->form_validation->set_rules("qty", "qty", "required");
			$this->form_validation->set_rules("buyer", "buyer", "required");
			$insert = $this->M_Konsumen->input_item();
			redirect("c_konsumen/konsumen_insert_po?buyer=".$insert);
		}else{
			$this->load->view('akun/v_login');
		}
	}


	public function edit_item()
	{
		$kode_user = $this->session->userdata('kode_user');
		if(! $kode_user == null){
			$this->form_validation->set_rules("kode_komoditi", "kode_komoditi", "required");
			$this->form_validation->set_rules("fullfillment", "fullfillment", "required");
			$this->form_validation->set_rules("qty", "qty", "required");
			$this->form_validation->set_rules("id", "id", "required");
			
			$this->M_Konsumen->edit_item();
			redirect($_SERVER['HTTP_REFERER']);
		}else{
			$this->load->view('akun/v_login');
		}
	}

	public function delete_item()
	{
		$kode_user = $this->session->userdata('kode_user');
		if(! $kode_user == null){
			$this->form_validation->set_rules("buyer", "buyer", "required");
			$this->form_validation->set_rules("id", "id", "required");
			if((isset($_GET["id"]) && !empty($_GET["id"]) && (isset($_GET["buyer"])) && !empty($_GET["buyer"]))){
				$this->M_Konsumen->delete_item($_GET["id"],$_GET["buyer"]);
			}
			redirect($_SERVER['HTTP_REFERER']);
		}else{
			$this->load->view('akun/v_login');
		}
	}

	public function export_po()
	{
		$data = [];
		$kode_user = $this->session->userdata('kode_user');
		
		if(! $kode_user == null){
			$data["userdata"] = $this
				->db
				->select()
				->where('kode_user', $kode_user)
				->get('profil_user')
				->result_array();
			

			if(isset($_GET["buyer"]) && !empty($_GET["buyer"])){
				$data["buyer"] = $this->M_Konsumen->getPesananById($_GET["buyer"]);
				if(count($data["buyer"]) == 0){
					redirect($_SERVER['HTTP_REFERER']);
				}
				$data["komoditi"] = $this->M_Konsumen->getKomoditi();
				$options = new Options();
				$options->set('isRemoteEnabled', TRUE);
				$dompdf = new Dompdf($options);
				$html = $this->load->view("konsumen/v_konsumen_detail_po_pdf",$data, TRUE);
				$dompdf->load_html($html);
				$dompdf->setPaper("A4", "potrait");
				$dompdf->render();
				return $dompdf->stream("po-".$_GET["buyer"]."-".time().".pdf");
			}

			

		}else{
			$this->load->view('akun/v_login');
		}
	}

	/*
		Delete Pemesanan < hari ini 
	*/
	public function delete_konsumen_po()
	{
		$kode_user = $this->session->userdata('kode_user');
		if(!empty($kode_user)){
			$role = $this->session->userdata('role_id');
			if($role == 1){
				$this->M_Konsumen->deleteLessThanNow();
				return redirect('c_konsumen/konsumen_po');
			}
		}
		return $this->load->view('akun/v_login');
	}
}