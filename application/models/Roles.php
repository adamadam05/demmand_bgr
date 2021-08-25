<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Roles extends CI_Model
{
	private $table = 'user_role';

	public function __construct()
	{
		parent::__construct();
	}

	public function getRoles($data = null)
	{
		if (!$data) {
			return false;
		}

		return $this->db->where($data)->get($this->table)->row();
	}

}
