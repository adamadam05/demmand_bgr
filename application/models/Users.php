<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Model
{
	private $table = 'user';

	public function __construct()
	{
		parent::__construct();
	}

	public function getUser($data = null)
	{
		if (!$data) {
			return false;
		}

		return $this->db->where($data)->get($this->table)->row();
	}

	public function updateLoginAttempt($uuid = null, $loginAttempt = 0)
	{
		return $this->db->set('login_attempt', $loginAttempt)->where('kode_user', $uuid)->update($this->table);
	}
	
	
	public function simpanRegister($data)
	{
		return $this->db->insert($this->table, $data);
	}
	
	public function updateProfile($data)
	{
		return $this->db->update($this->table, $data);
	}
	
	public function verifikasiEmail($data = null)
	{
		return $this->db->where($data)->get($this->table)->row();
	}
	
	

}
