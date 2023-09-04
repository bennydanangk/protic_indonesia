<?php
class M_template extends CI_Model {

 function config(){
   return $this->db->get('config')->result();
 }   
}
?>