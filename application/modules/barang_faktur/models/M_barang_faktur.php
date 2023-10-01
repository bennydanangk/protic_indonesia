<?php
class M_barang_faktur extends CI_Model {
//Confif
 function config(){
   return $this->db->get('config')->result();
 }   

 function get_data($table,$where){		
  return $this->db->get_where($table,$where)->result();
}	

function get_barang_faktur($table,$where){		
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


public function cekkodebarang()
{
  $this->db->select('RIGHT(barang_faktur.kode_barang,5) as kode_barang', FALSE);
  $this->db->order_by('kode_barang','DESC');    
  $this->db->limit(1);    
  $query = $this->db->get('barang_faktur');
      if($query->num_rows() <> 0){      
           $data = $query->row();
           $kode = intval($data->kode_barang) + 1; 
      }
      else{      
           $kode = 1;  
      }
  $batas = str_pad($kode, 5, "0", STR_PAD_LEFT);    
  $kodetampil = "BF".$batas;
  return $kodetampil;  
}





}
?>