<?php 

class M_Gudang extends CI_Model{	

public function __construct()
{
    $this->load->database();
}

	public function getgudang()
    {		
        return $this->db->get('profil_user')->result();
    }
    

	public function getdetail($id = NULL){
		
		$query = $this->db->get_where('profil_user', array('id_profil' => $id))->row();
		return $query;
 
	}
        

}
