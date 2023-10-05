<?php
class M_dashboard extends CI_Model {

 function config(){
   return $this->db->get('config')->result();
 }   

function jumlah_barang_inv() {
  return $this->db->query("SELECT SUM(jumlah) as jumlah FROM barang WHERE state = 'aktif'");
}
function jumlah_barang_perjenis()  {
  return $this->db->query("SELECT nama_jenis, COUNT(barang.id_jenis) as jumlah FROM barang LEFT JOIN jenis ON jenis.id_jenis = barang.id_jenis WHERE barang.state = 'aktif' GROUP BY nama_jenis"); 
}
}
?>