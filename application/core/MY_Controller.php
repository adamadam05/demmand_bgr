<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		
		if ($this->router->class != 'c_auth') {
			// check if role_id exists
			if ($this->session->userdata('role_id')) {
				// config menu berdasarkan roles
				$menu = $this->db->from('menus')
					->join('menu_privileges', 'menus.menu_id = menu_privileges.menu_id')
					->where('menu_privileges.role_id', $this->session->userdata('role_id'))
					->where('menus.link', $this->router->class)
					->get()
					->row();
		
				if (!$menu) {
					$this->session->set_flashdata('failure', 'Tidak diperbolehkan mengakses halaman itu!');
					redirect('c_admin');
				}
				
			} else {
				redirect('c_auth');
			}

			// $this->menus = $this->menus->getMenus();

			// check for approve needs

		} else {
			if ($this->session->userdata('role_id') && $this->router->method != 'logout') {
				redirect('c_auth');
			}
		}
	}
	
	
}
