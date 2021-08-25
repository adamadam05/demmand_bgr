<?php 

class M_Produsen extends CI_Model{	

public function __construct()
{
    $this->load->database();
}

	public function getinbound()
    {		
        return $this->db->get('inbound')->result();
    }

	public function getoutbound()
    {		
        return $this->db->get('outbound')->result();
    }

    public function get_sambung_produk()
    {		
        return $this->db->get('penyambung_produk_inbound')->result();
    }

    public function getdetail($id = NULL){
		
		$query = $this->db->get_where('inbound', array('no_gr' => $id))->row();
		return $query;
 
	}
	
	public function getlihat($id = NULL){
		
		$query = $this->db->get_where('outbound', array('no_gi' => $id))->row();
		return $query;
 
	}

    public function getGudang(){
        $this->db->order_by('id_profil', 'ASC');
        return $this->db->from('profil_user')
        ->get()
        ->result();

    }

    public function getProvinsi(){
        $this->db->order_by('kode_provinsi', 'ASC');
        return $this->db->from('provinsi')
        ->get()
        ->result();

    }

    public function getKK(){
        $this->db->order_by('kode_kabupatenkota', 'ASC');
        return $this->db->from('kota_kabupaten')
        ->get()
        ->result();

    }

    function cariGudang($id_profil){
        $query= $this->db->get_where('profil_user',array('id_profil'=>$id_profil));
        return $query;
    }


    // dropdown sembako
    public function getsembako(){
        $this->db->order_by('kode_sembako', 'ASC');
        return $this->db->from('sembako')
        ->get()
        ->result();
    }

       // dropdown uom
       public function getuom(){
        $this->db->order_by('kode_uom', 'ASC');
        return $this->db->from('uom')
        ->get()
        ->result();
    }
    


// generate model m_inbound
public function kode_inbond(){
    $this->db->select('RIGHT(inbound.no_gr,2) as no_gr', FALSE);
    $this->db->order_by('no_gr','DESC');    
    $this->db->limit(1);    
    $query = $this->db->get('inbound');  //cek dulu apakah ada sudah ada kode di tabel.    
    if($query->num_rows() <> 0){      
         //cek kode jika telah tersedia    
         $data = $query->row();      
         $kode = intval($data->no_gr) + 1; 
    }
    else{      
         $kode = 1;  //cek jika kode belum terdapat pada table
    }
        // $tgl=date('Y-m-d H:i:s'); 
        $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);    
        $kodetampil = "GR-BOG"."-".$batas;  //format kode
        return $kodetampil;  
  }


    // insert inbond
    public function insert_inbound($data){
		
		$this->db->insert('inbound',$data);
	}

        // insert inbond
        public function insert_produk($data){
		
            $this->db->insert('penyambung_produk_inbound',$data);
        }
    

    //Delete inbond
	function delete_inbound($no_gr){
		$this->db->delete('inbound', array('no_gr' => $no_gr));
	}

        //Delete produk
	function delete_produk($kode_penyambung_produk_inbound){
		$this->db->delete('penyambung_produk_inbound', array('kode_penyambung_produk_inbound' => $kode_penyambung_produk_inbound));
	}

// testing dhoni product 
  // get produk inbound
//   function get_produk_inbound(){
    // $this->db->from('inbound')
    // $this->db->join('no_gr','kode_sembako','nama_sembako','no_gr','left')
    // get()
    // result();
    // atas apus
//     return 
//     $this->db->select(' *')
//     ->from('inbound')
//     ->join('sembako', 'sembako.no_gr = inbound.no_gr', 'inner')
//     ->get()
//     ->result();
// }
// testing dhoni product


    // get produk inbound
    function get_produk_inbound(){
        return 
        $this->db->select('*')
        ->from('inbound')
        ->join('penyambung_produk_inbound', 'penyambung_produk_inbound.no_gr = inbound.no_gr', 'inner')
        ->join('sembako', 'sembako.kode_sembako = penyambung_produk_inbound.kode_barang', 'LEFT')
        ->join('perikanan', 'perikanan.kode_perikanan = penyambung_produk_inbound.kode_barang', 'LEFT')
        ->join('peternakan', 'peternakan.kode_peternakan = penyambung_produk_inbound.kode_barang', 'LEFT')
        ->get()
        ->result();
    }


    // public function getBranchProduct()
    // {
    //         $this->db->select('a.id as productBranchID, b.productID, b.productName, c.id as branchID')
    //         ->from('branch_has_product a')
    //         ->join('product b', 'a.productID = b.productID', 'left')
    //         ->get()
    //         ->result();
    // }



    // generate model m_outbound
    public function kode_outbound(){
    $this->db->select('RIGHT(outbound.no_gi,2) as no_gi', FALSE);
    $this->db->order_by('no_gi','DESC');    
    $this->db->limit(1);    
    $query = $this->db->get('outbound');  //cek dulu apakah ada sudah ada kode di tabel.    
    if($query->num_rows() <> 0){      
         //cek kode jika telah tersedia    
         $data = $query->row();      
         $kode = intval($data->no_gi) + 1; 
    }
    else{      
         $kode = 1;  //cek jika kode belum terdapat pada table
    }
        // $tgl=date('Y-m-d H:i:s'); 
        $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);    
        $kodetampil = "GI-BOG"."-".$batas;  //format kode
        return $kodetampil;  
  }

   // insert inbond
   public function insert_outbound($data){
		
    $this->db->insert('outbound',$data);
}

//Delete outbound
function delete_outbound($no_gi){
    $this->db->delete('outbound', array('no_gi' => $no_gi));
}


}
