<?php
class M_Opd_ruangan extends CI_Model {
//Confif
 function config(){
   return $this->db->get('config')->result();
 }   

 function get_data($table,$where){		
  return $this->db->get_where($table,$where)->result();
}	

function get_ruang($table,$where){		
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


}
?>