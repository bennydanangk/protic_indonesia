<?php
class M_surat_penawaran extends CI_Model {

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
  $this->db->select('LEFT(t_surat_penawaran.nomor_surat,4) as nomor_surat', FALSE);
  $this->db->order_by('nomor_surat','DESC');    
  $this->db->limit(1);    
  $query = $this->db->get('t_surat_penawaran');
      if($query->num_rows() <> 0){      
           $data = $query->row();
           $kode = intval($data->nomor_surat) + 1; 
      }
      else{      
           $kode = 1;  
      }
  $batas = str_pad($kode, 4, "0", STR_PAD_LEFT);    
  $kodetampil = $batas."".$kd;
  return $kodetampil;  
}


function ambil_surat_penawaran($table,$where)  {
  $this->db->join('t_customer', 't_customer.id_customer = t_surat_penawaran.id_customer', 'left');
  $this->db->join('t_user', 't_user.id_user = t_surat_penawaran.id_user_input', 'left');
  return $this->db->get_where($table,$where);
}


function ambil_item_surat_penawaran($table,$where)  {
  $this->db->join('data_barang', 'data_barang.id_barang = item_surat_penawaran.id_barang', 'left');
  // $this->db->join('data_barang', 'data_barang.id_barang = item_surat_penawaran.id_barang', 'left');
  $this->db->join('t_surat_penawaran', 't_surat_penawaran.id_surat_penawaran = item_surat_penawaran.id_surat_penawaran', 'left');
  // $this->db->join('t_satuan', 't_satuan.id_satuan = item_surat_penawaran.id_satuan', 'left');
  $this->db->join('t_user', 't_user.id_user = item_surat_penawaran.id_user_input', 'left');




  return $this->db->get_where($table,$where);
}

}
?>