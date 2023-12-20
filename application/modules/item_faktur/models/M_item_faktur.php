<?php
class M_item_faktur extends CI_Model {

 function config(){
   return $this->db->get('t_vendor')->result();
 }   

 function cek_where($table,$where){		
  return $this->db->get_where($table,$where);
}	

function input_data($data,$table){
  $this->db->insert($table,$data);
}

function get($tabel) {
  return $this->db->get($tabel)->result();
}
function insert($tabel,$data)  {
  return $this->db->insert($tabel,$data);
}

function get_parent($table,$where)  {
  $this->db->join('t_menu', 't_menu.id_menu = role_tabel.id_menu', 'left');
  return $this->db->get_where($table,$where);
}
//==========CRUD===

function get_user($tabel,$where) {
  $this->db->join('t_hak_akses','t_user.id_hak_akses = t_hak_akses.id_hak_akses','left');
  return $this->db->get_where($tabel,$where);
}

function update_data($where,$data,$table){
  $this->db->where($where);
  $this->db->update($table,$data);
}

function delete_data($table,$where){

  return $this->db->delete($table, $where);

}



public function CreateCode($kd){
  $this->db->select('RIGHT(faktur.kode_barang,5) as kode_barang', FALSE);
  $this->db->order_by('kode_barang','DESC');    
  $this->db->limit(1);    
  $query = $this->db->get('faktur');
      if($query->num_rows() <> 0){      
           $data = $query->row();
           $kode = intval($data->kode_barang) + 1; 
      }
      else{      
           $kode = 1;  
      }
  $batas = str_pad($kode, 7, "0", STR_PAD_LEFT);    
  $kodetampil = $kd."".$batas;
  return $kodetampil;  
}


function ambil_faktur($table,$where)  {
  $this->db->join('t_distributor', 't_distributor.id_distributor = faktur.id_distributor', 'left');
  $this->db->join('t_user', 't_user.id_user = faktur.id_user_input', 'left');
  return $this->db->get_where($table,$where);
}


function ambil_item_faktur($table,$where)  {
  $this->db->join('data_barang', 'data_barang.id_barang = item_faktur.id_barang', 'left');
  // $this->db->join('data_barang', 'data_barang.id_barang = iteM_item_faktur.id_barang', 'left');
  $this->db->join('faktur', 'faktur.id_faktur = item_faktur.id_faktur', 'left');
  $this->db->join('t_satuan', 't_satuan.id_satuan = item_faktur.id_satuan', 'left');
  $this->db->join('t_user', 't_user.id_user = item_faktur.id_user_input', 'left');




  return $this->db->get_where($table,$where);
}

}
?>