<?php
class M_transaksi_faktur extends CI_Model {
//Confif
 function config(){
   return $this->db->get('config')->result();
 }   

 function get_data($table,$where){		
  return $this->db->get_where($table,$where)->result();
}	

function get_transaksi_faktur($table,$where){		
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
//edit Data
function edit_data($where,$data,$table){
  $this->db->where($where);
  $this->db->update($table,$data);
}

function get_state($table,$where){		
  $this->db->join('role_user', 'user.id_user = role_user.id_user');
  return $this->db->get_where($table,$where);
}	

function stok_barang_masuk($table,$where){	
  $this->db->select('SUM(qty) as total');	
  $this->db->join('item_faktur', 'item_faktur.id_barang_faktur = barang_faktur.id_barang_faktur');
  return $this->db->get_where($table,$where);
}	

function stok_barang_keluar($table,$where){	
  $this->db->select('SUM(barang_bhp_keluar.qty) as total');	
  $this->db->join('item_faktur', 'item_faktur.id_barang_faktur = barang_bhp_keluar.id_barang_faktur','left');
  return $this->db->get_where($table,$where);
}	


function get_barang_bhp_keluar($table,$where){	
  // $this->db->select('SUM(barang_bhp_keluar.qty) as total');	
  $this->db->join('barang_faktur', 'barang_faktur.id_barang_faktur = barang_bhp_keluar.id_barang_faktur','left');
  $this->db->join('user', 'user.id_user = barang_bhp_keluar.id_user','left');
  $this->db->join('ruang', 'ruang.id_ruang = barang_bhp_keluar.id_ruang','left');
  
  return $this->db->get_where($table,$where);
}	


function hapus_data($where,$table){
  // $this->db->where($where);
  $this->db->delete($table,$where);
}
}
?>