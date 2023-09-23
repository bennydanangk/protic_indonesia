<?php
class M_laporan_barang extends CI_Model {
//Confif
 function config(){
   return $this->db->get('config')->result();
 }   

 function get_data($table,$where){		
  return $this->db->get_where($table,$where)->result();
}	

function get_sebelum($table,$where){		
  $this->db->join('ruang', 'ruang.id_ruang = posisi_barang  .id_ruang_sesudah','left');
  $this->db->order_by('id_posisi_barang', 'DESC');
  $this->db->limit(1);
  return $this->db->get_where($table,$where);
}	


function get_laporan_barang($table,$where){		
  return $this->db->get_where($table,$where)->result();
}	



function get_all($tabel) {
  return $this->db->get($tabel)->result();
}
//add Data
function input_data($data,$table){
return  $this->db->insert($table,$data);
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

function get_barang($table,$where){		
  $this->db->join('perolehan', 'barang.id_perolehan = perolehan.id_perolehan','left');
  $this->db->join('jenis', 'barang.id_jenis = jenis.id_jenis','left');
  $this->db->join('sumber_dana', 'barang.id_sumber_dana = sumber_dana.id_sumber_dana','left');
  $this->db->join('distributor', 'barang.id_distributor = distributor.id_distributor','left');
  $this->db->join('user', 'barang.id_user = user.id_user','left');
  $this->db->join('satuan', 'barang.id_satuan = satuan.id_satuan','left');
  return $this->db->get_where($table,$where)->result();
  }	

  function get_posisi($table,$where){		
    $this->db->select('*,a.nama_ruangan as nama_ruangan_sebelum,b.nama_ruangan as nama_ruangan_sesudah');
    $this->db->join('barang', 'barang.id_barang = posisi_barang.id_barang','left');
    $this->db->join('user', 'user.id_user = posisi_barang.id_user_mutasi','left');
    $this->db->join('status_barang', 'status_barang.id_status_barang = posisi_barang.id_status_barang','left');
    $this->db->join('ruang a', 'a.id_ruang = posisi_barang.id_ruang_sebelum','inner');
    $this->db->join('ruang b', 'b.id_ruang = posisi_barang.id_ruang_sesudah','left');
    $this->db->order_by('id_posisi_barang', 'DESC');
    return $this->db->get_where($table,$where)->result();
    }	

    function get_posisi_b($table,$where){
      // $this->db->order_by('id_posisi_barang', 'DESC');
      // $this->db->limit(1);		
      $this->db->select('*,a.nama_ruangan as nama_ruangan_sebelum,b.nama_ruangan as nama_ruangan_sesudah');
      $this->db->join('barang', 'barang.id_barang = posisi_barang.id_barang','left');
      $this->db->join('user', 'user.id_user = posisi_barang.id_user_mutasi','left');
      $this->db->join('status_barang', 'status_barang.id_status_barang = posisi_barang.id_status_barang','left');
      $this->db->join('ruang a', 'a.id_ruang = posisi_barang.id_ruang_sebelum','inner');
      $this->db->join('ruang b', 'b.id_ruang = posisi_barang.id_ruang_sesudah','left');
      $this->db->order_by('id_posisi_barang', 'DESC');
      return $this->db->get_where($table,$where)->result();
      }	


}
?>