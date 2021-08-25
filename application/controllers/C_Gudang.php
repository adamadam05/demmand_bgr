<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class C_Gudang extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('googlemaps','session'));
        $this->load->model('M_Gudang');

	}

    public function index() {

        $data['profil_user']=$this->M_Gudang->getgudang();
		$this->load->view('admin/v_admin_gudang',  $data);

	}

	public function gudang_detail($id){

		$this->load->model('M_Gudang');

		$gudang = $this->M_Gudang->getdetail($id);
		$data['gudang'] = $gudang;

		$this->load->view('admin/v_admin_gudang_detail', $data);

	}

    public function searchQuery() {

		$this->db->select('profil_user');

    }
    
}
