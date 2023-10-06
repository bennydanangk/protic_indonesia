<?php
class M_faktur extends CI_Model {
//Confif
 function config(){
   return $this->db->get('config')->result();
 }   

 function get_data($table,$where){		
  $this->db->join('user', 'user.id_user = faktur.id_user');
  $this->db->join('distributor', 'distributor.id_distributor = faktur.id_distributor');
  $this->db->join('sumber_dana', 'sumber_dana.id_sumber_dana = faktur.id_sumber_dana');
  return $this->db->get_where($table,$where)->result();
}	

function get_data_item($table,$where){		
  $this->db->join('user', 'user.id_user = item_faktur.id_user');
  $this->db->join('satuan', 'satuan.id_satuan = item_faktur.id_satuan');
  $this->db->join('barang_faktur', 'barang_faktur.id_barang_faktur = item_faktur.id_barang_faktur');
  return $this->db->get_where($table,$where)->result();
}	


function get_faktur($table,$where){		
  $this->db->join('user', 'user.id_user = faktur.id_user');
  return $this->db->get_where($table,$where)->result();
}	



function get_all($tabel) {
  return $this->db->get($tabel)->result();
}
//add Data
function input_data($data,$table){
return  $this->db->insert($table,$data);
}
function get_cek($table,$where){		
  return $this->db->get_where($table,$where);
}	

function get_aps($table,$where){		
  return $this->db->get_where($table,$where)->result();
}	
//edit Data
function edit_data($where,$data,$table){
  $this->db->where($where);
  $this->db->update($table,$data);
}

function get_state($table,$where){		
  $this->db->join('role_user', 'user.id_user = role_user.id_user');
  return $this->db->get_where($table,$where);
}	


}
?>