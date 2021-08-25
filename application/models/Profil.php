<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Profil extends CI_Model
{
	private $table = 'profil_user';

	public function __construct()
	{
		parent::__construct();
	}

	public function getProfil($data = null)
	{
		if (!$data) {
			return false;
		}

		return $this->db->where($data)->get($this->table)->row();
	}
	
	public function simpanProfil($data)
	{
		return $this->db->insert($this->table, $data);
	}
	
	public function updateProfil($data)
	{
		return $this->db->update($this->table, $data);
	}
	
}
