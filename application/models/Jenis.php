<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Jenis extends CI_Model
{
	private $table = 'jenis_perusahaan';

	public function __construct()
	{
		parent::__construct();
	}

	public function getJenis($data = null)
	{
		if (!$data) {
			return false;
		}

		return $this->db->where($data)->get($this->table)->row();
	}

}
