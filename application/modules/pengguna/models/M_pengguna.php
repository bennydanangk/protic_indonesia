<?php
class M_Pengguna extends CI_Model {

 function config(){
   return $this->db->get('config')->result();
 }   

 function get_data($table,$where){		
  $this->db->join('ruang', 'ruang.id_ruang = user.id_ruang');
  return $this->db->get_where($table,$where)->result();
}	



}
?>