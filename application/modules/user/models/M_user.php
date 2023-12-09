<?php
class M_user extends CI_Model {

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


}
?>