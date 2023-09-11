<?php
class M_rest_api extends CI_Model {

    function get_where($table,$where)  {
        $this->db->join('role_user', 'role_user.id_menu = menu_manajemen.id_menu', 'left');
        return $this->db->get_where($table,$where)->result();
       }

      function get_all($tabel)  {
        return $this->db->get($tabel)->result();
      }
 
 
}
?>