<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_Users extends CI_Model
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
	
	//Start: method tambahan untuk reset code  
    public function getUserInfo($id)
    {
        $q = $this->db->get_where('user', array('kode_user' => $id), 1);
        if ($this->db->affected_rows() > 0) {
            $row = $q->row();
            return $row;
        } else {
            error_log('no user found getUserInfo(' . $id . ')');
            return false;
        }
    }

    public function getUserInfoByEmail($email)
    {
        $q = $this->db->get_where('user', array('email' => $email), 1);
        if ($this->db->affected_rows() > 0) {
            $row = $q->row();
            return $row;
        }
    }

	
    public function updatePassword($post)
    {
        $this->db->where('kode_user', $post['kode_user']);
        $this->db->update('user', array('password' => $post['password']));
        return true;
    }
    //End: method tambahan untuk reset code 
	public function updateProfileById($id,$data)
	{
		return $this->db->where("kode_user",$id)->update($this->table, $data);
	}

}
