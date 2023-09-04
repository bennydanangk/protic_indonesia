<?php
class M_auth extends CI_Model {

 function config(){
   return $this->db->get('config')->result();
 }   

 function cek_login($table,$where){		
  return $this->db->get_where($table,$where);
}	

function input_data($data,$table){
  $this->db->insert($table,$data);
}

}
?>