<?php
class M_config extends CI_Model {

  function config(){
    return $this->db->get('config')->result();
  }   

  function get_data($table,$where){		
    return $this->db->get_where($table,$where)->result();
  }	
  function update($table,$data,$where){
    
    return $this->db->update($table,$data,$where);
  }
}
?>