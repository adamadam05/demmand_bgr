<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Log_login extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
	}

	public function insertLogLogin($data = null)
	{
		if (!!$data) {
			$this->db->insert('log_login', $data);
			return $this->db->affected_rows() > 0;
		}

		return false;
	}
}
