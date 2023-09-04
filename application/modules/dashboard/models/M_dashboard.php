<?php
class M_dashboard extends CI_Model {

 function config(){
   return $this->db->get('config')->result();
 }   



}
?>