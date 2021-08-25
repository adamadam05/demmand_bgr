<?php 

class M_Konsumen extends CI_Model{	

public function __construct()
{
    $this->load->database();
}
public function getpemesanan()
    {		
        return $this->db->get('pemesanan')->result();
    }

    public function getpemesananbydate($dari,$sampai)
    {		
        return $this->db->get_where('pemesanan',["po_date >=" => $dari,"po_date <=" => $sampai])->result();
    }

    public function getpemesanan_by_auth($kode_user)
    {		
        return $this->db->get_where('pemesanan',["kode_user" => $kode_user])->result();
    }

    public function getpemesanan_by_auth_date($kode_user,$dari,$sampai)
    {		
        return $this->db->get_where('pemesanan',["kode_user" => $kode_user,"po_date >=" => $dari,"po_date <=" => $sampai])->result();
    }

    //  delete pemesanan
    public function delete_pemesanan()
    {		
        return $this->db->delete('pemesanan', array ('po_date' => $po_date));
    }
    //  edit pemesanan
    public function get_all_pemesanan()
    {		
        return $this->db->get('pemesanan')->result_array();

    }

    public function get_all_pemesanan_by_auth($kode_user)
    {		
        return $this->db->get_where('pemesanan',["kode_user" => $kode_user])->result_array();

    }
    
    public function get_pemesanan($buyer_id)
    {		
        return $this->db->get_where('pemesanan', ['buyer_id' => $buyer_id])->row_array();

    }

    public function input_po ()
    {
        $dataPofile = $this->db->get_where('profil_user', ['kode_user' => $this->input->post("kode_user", true)])->row_array();
        $lastid = $this->db->order_by('id',"desc")
		->limit(1)
		->get('pemesanan')
		->row();
        
        $buyerid = "DMD.".date('m').".".((int)$lastid->id + 1);

        $data = [
            "po_date" => date('Y-m-d'),
            "po_type" => "PO",
            "buyer_id" => $buyerid,
            "city_dest" => $dataPofile["kota_kabupaten"],
            "province_dest" => $dataPofile["provinsi"],
            "wh_dest" => $dataPofile["nama_gudang"],
            "sub_dest" => $dataPofile["kecamatan"],
            "addr_dest" => $dataPofile["alamat"],
            "is_complete" => 0,
            "kode_user" => $this->input->post("kode_user", true)
        ];

        $this->db->insert("pemesanan", $data);
        return $buyerid;
    }
    // public function edit_po()
    // {
    //     $data = [
           
    //         "komoditi" => $this->input->post("komoditi")
            
    //     ];

    //     $this->db->where("buyer_id", $this->input->post("buyer_id"));
    //     $this->db->update("pemesanan", $data);
    // }


    public function delete_po($buyer_id)
    {
        $this->db->delete('pemesanan', array('buyer_id' => $buyer_id));
        $this->db->delete('pemesanan_detail', array('buyer_id_fk' => $buyer_id));
    }

    public function complete_po($buyer_id)
    {
        $this->db->where('buyer_id',$buyer_id)->update('pemesanan', array('is_complete' => 1));
    }

    public function getPesananById($buyer_id){
        $data = $this->db->get_where('pemesanan',["buyer_id" => $buyer_id])->result_array();
        if(!$data){
            return [];
        }
        $data["item"] = $this->db->select("pemesanan_detail.*,komoditi.nama_komoditi,komoditi.UoM")->join('komoditi', 'komoditi.kode_komoditi = pemesanan_detail.kode_komoditi')->get_where('pemesanan_detail',["buyer_id_fk" => $buyer_id])->result_array();
        return $data;
    }

    public function getKomoditi()
    {		
        return $this->db->get("komoditi")->result_array();

    }

    public function input_item ()
    {
        $dataPemesanan = $this->db->get_where('pemesanan', ['buyer_id' => $this->input->post("buyer", true)])->row_array();
        $count = (int)$dataPemesanan["count_comodity"] + 1;
        $this->db->where("buyer_id",$this->input->post("buyer", true))->update('pemesanan', [
           "count_comodity" => $count
        ]);

        $data = [
            "buyer_id_fk" => $this->input->post("buyer", true),
            "kode_komoditi" => $this->input->post("kode_komoditi", true),
            "fulfillment_date" => $this->input->post("fullfillment", true),
            "qty" => $this->input->post("qty", true),
        ];

        $this->db->insert("pemesanan_detail", $data);
        return $this->input->post("buyer", true);
    }

    public function edit_item ()
    {
        $data = [
            "kode_komoditi" => $this->input->post("kode_komoditi", true),
            "fulfillment_date" => $this->input->post("fullfillment", true),
            "qty" => $this->input->post("qty", true),
        ];

        $this->db->where("id",$this->input->post("id", true))->update("pemesanan_detail", $data);

    }

    public function delete_item ($id,$kode)
    {
        $dataPemesanan = $this->db->get_where('pemesanan', ['buyer_id' => $kode])->row_array();
        $count = (int)$dataPemesanan["count_comodity"] - 1;
        $this->db->where("buyer_id",$kode)->update('pemesanan', [
           "count_comodity" => $count
        ]);
        $this->db->delete('pemesanan_detail', array('id' => $id));
    }

    public function deleteLessThanNow()
    {
        $dataPemesanan = $this->db->select("buyer_id")->get_where('pemesanan', ['po_date <' => date('Y-m-d'),'is_complete' => 0])->result_array();
        $dataBuyer =[];
        foreach ($dataPemesanan as $value) {
            array_push($dataBuyer,$value["buyer_id"]);
        }
        if($dataPemesanan){
            $this->db->where_in('buyer_id', $dataBuyer)->delete("pemesanan");
            $this->db->where_in('buyer_id_fk', $dataBuyer)->delete("pemesanan_detail");
        }
    }

    public function getdetailpemesananbygroup($id)
    {		
        return $this->db->select("pemesanan_detail.*,komoditi.nama_komoditi,komoditi.UoM")->join('komoditi', 'komoditi.kode_komoditi = pemesanan_detail.kode_komoditi')->where_in('buyer_id_fk', $id)->get('pemesanan_detail')->result();
    }
}
