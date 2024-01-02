<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stok_barang extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->load->library('enc'); 
        $this->load->model("M_stok_barang"); //load model m user

		if($this->session->userdata('status') != "login"){
			redirect(base_url("auth"));
		}
    }


	public function index()
	{
		//set .inv
		$id_menu = 1;
		$data['nama_menu'] = 'Stok Barang';
		$this->cek_hak_akses($id_menu);
		$set = $this->M_stok_barang->config();
		$data['nama_aplikasi'] = $set[0]->nama_vendor;
		$data['token'] = $this->session->userdata('id_hak_akses');
		$data['nama_user'] = $this->session->userdata('nama_user');
		$data['menu'] = $this->get_menu($this->session->userdata('id_hak_akses'));
		
		$this->load->view('backend/a_header',$data);
		$this->load->view('backend/b_main',$data);
		$this->load->view('backend/c_footer',$data);
		
	}


//Menu Function
	public function get_menu($id_hak_akses)
	{
				
		$id_hak_akses =$id_hak_akses;
		$id_hak_akses = $this->enc->out($id_hak_akses);
			$where_parent = array(
			'id_hak_akses' => $id_hak_akses,
			'status_role' => 'aktif',
			'state_orgin' => 'parent'

		);
		$menu_parent = $this->M_stok_barang->get_parent('role_tabel',$where_parent)->result();
		$menu = '';

		foreach ($menu_parent as $k) {
		$menu .= '<li>';
		$menu .='<a href="#"><i class="'.$k->icon.'"></i> <span>'.$k->nama_menu.'</span></a>';
		$menu .='<ul>';

	
		$where_child = array(
			'id_hak_akses' => $id_hak_akses,
			'status_role' => 'aktif',
			'state_orgin' => 'child',
			'id_parent' => $k->id_menu

		);
			$menu_child = $this->M_stok_barang->get_parent('role_tabel',$where_child)->result();
			foreach ($menu_child as $y) {
				$menu .=	'<li><a href="'.base_url($y->link).'">'.$y->nama_menu.'</a></li>';
			}

			$menu .='</ul>';
			$menu .='</li>';
				
			}

			return $menu;

					
	}
//end Menu 

//hak akses
function cek_hak_akses($id_menu)  {
	$id_menu =$id_menu;

	$id_hak_akses = $this->enc->out($this->session->userdata('id_hak_akses'));
		$where = array(
		'id_hak_akses' => $id_hak_akses,
		'status_role' => 'aktif',
		'role_tabel.id_menu' => $id_menu

	);

	$menu_cek = $this->M_stok_barang->get_parent('role_tabel',$where)->num_rows();

	if($menu_cek > 0 ){

	}else{
		redirect(base_url('auth/logout'));
	}
	
}
//end hak akses


function tabel_content(){

	$where = array(
		'data_barang.state' => 'aktif'
	);

	$data['data'] = $this->M_stok_barang->cek_where('data_barang',$where)->result();
	$this->load->view('backend/page/tabel',$data);
	
}


function data_faktur($id_barang) {

	$where = array(
		'id_barang' => $id_barang,
		'state' => 'aktif'
	);
	
	$data = $this->M_stok_barang->get_data_faktur('item_faktur',$where)->result();

	return $data[0]->qty;
	// print_r($data);
}


function data_keluar($id_barang) {

	$where = array(
		'id_barang' => $id_barang,
		'state' => 'aktif'
	);
	
	$data = $this->M_stok_barang->get_data_faktur('item_surat_order',$where)->result();

// return $data->qty;
	return $data[0]->qty;
}





function stok()  {
	$id_barang = $_POST['id'];
	$data_masuk = $this->data_faktur($id_barang);
	$data_keluar = $this->data_keluar($id_barang);

	$a = $data_masuk - $data_keluar;

	$data = array (
'qty' => $a

	);
	echo json_encode($data);

	

	
}

	
}
