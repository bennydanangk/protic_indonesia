<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class data_barang extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->load->library('enc'); 
        $this->load->model("M_data_barang"); //load model m user

		if($this->session->userdata('status') != "login"){
			redirect(base_url("auth"));
		}
    }


	public function index()
	{
		//set .inv
		$id_menu = 1;
		$data['nama_menu'] = 'data_barang';
		$this->cek_hak_akses($id_menu);
		$set = $this->M_data_barang->config();
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
		$menu_parent = $this->M_data_barang->get_parent('role_tabel',$where_parent)->result();
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
			$menu_child = $this->M_data_barang->get_parent('role_tabel',$where_child)->result();
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

	$menu_cek = $this->M_data_barang->get_parent('role_tabel',$where)->num_rows();

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

	$data['data'] = $this->M_data_barang->ambil_barang('data_barang',$where)->result();
	$this->load->view('backend/page/tabel',$data);
	
}

function tabel_sampah(){

	$where = array(
		'data_barang.state' => 'tidak'
	);

	$data['data'] = $this->M_data_barang->cek_where('data_barang',$where)->result();
	$this->load->view('backend/page/tabel_sampah',$data);
	
}


//===========ADD 
function form_add() {
	$data['nama_menu'] = 'data barang';
	$where = array(
		'state'=> 'aktif'
	);

	$data['jenis'] = $this->M_data_barang->cek_where('t_jenis',$where)->result();
	$data['satuan'] = $this->M_data_barang->cek_where('t_satuan',$where)->result();
	$data['kategori'] = $this->M_data_barang->cek_where('t_kategori',$where)->result();


	$this->load->view('backend/page/from_add',$data);
}

function p_add() {
	$kode_ = 'BR';
	$kode_barang = $this->M_data_barang->CreateCode($kode_);
	$data = array(
		'nama_data_barang' => $_POST['nama_data_barang'],
		'kode_barang' => $kode_barang,
		'id_jenis' => $_POST['id_jenis'],
		'id_satuan' => $_POST['id_satuan'],
		'id_kategori' => $_POST['id_kategori'],
		'keuntungan_minimum' => $_POST['keuntungan_minimum'],
		'diskon_maksimum' => $_POST['diskon_maksimum'],
		'harga_beli' => $_POST['harga_beli'],
		'harga_jual' => $_POST['harga_jual'],
		'state' => 'aktif',
		'id_user_input' => $this->session->userdata('id_user'),
		'tgl_input'=> date('Y-m-d H:i:s'),	
	);

	$this->M_data_barang->insert('data_barang',$data);
}

//============= END ADD==

//============EDIT
function form_edit($id) {
	$id= $id;
	$data['nama_menu'] = 'Edit Data Barang';

	$where = array(
		'state'=> 'aktif'
	);

	$data['jenis'] = $this->M_data_barang->cek_where('t_jenis',$where)->result();
	$data['satuan'] = $this->M_data_barang->cek_where('t_satuan',$where)->result();
	$data['kategori'] = $this->M_data_barang->cek_where('t_kategori',$where)->result();


	
	$where = array(
		'data_barang.state'=> 'aktif',
		'id_barang' => $id
	);

	$data['data'] = $this->M_data_barang->ambil_barang('data_barang',$where	)->result();

	// print_r($data);
	$this->load->view('backend/page/from_edit',$data);
}

function p_edit() {
	$id = $_POST['id'];

	$data = array(
		'nama_data_barang' => $_POST['nama_data_barang'],
		'id_jenis' => $_POST['id_jenis'],
		'id_satuan' => $_POST['id_satuan'],
		'id_kategori' => $_POST['id_kategori'],
		'keuntungan_minimum' => $_POST['keuntungan_minimum'],
		'diskon_maksimum' => $_POST['diskon_maksimum'],
		'harga_beli' => $_POST['harga_beli'],
		'harga_jual' => $_POST['harga_jual'],
		'state' => 'aktif',
		'id_user_input' => $this->session->userdata('id_user'),
		'tgl_input'=> date('Y-m-d H:i:s'),	
	);

	$where = array(
		'id_barang' => $id
	);

	$this->M_data_barang->update_data($where,$data,'data_barang');
}


//=====================END EDIT
//================== Delete
function p_delete() {
	$id = $_POST['id'];
	$data = array(
		'state' => 'tidak',
		
	);
	$where = array(
		'id_barang' => $id
	);

	$this->M_data_barang->update_data($where,$data,'data_barang');
}

//=====================END Delete

//================== Delete
function p_restore() {
	$id = $_POST['id'];
	$data = array(
		'state' => 'aktif',
		
	);
	$where = array(
		'id_barang' => $id
	);

	$this->M_data_barang->update_data($where,$data,'data_barang');
}
//=====================END Delete


//================== Delete Permanent
function p_delete_permanen() {
	$id = $_POST['id'];
	
	$where = array(
		'id_barang' => $id,
		'state' => 'tidak'
	);

	$this->M_data_barang->delete_data('data_barang',$where);
}

//=====================END Delete Permanen


function kode_barang()  {

	$kode_ = 'KD';
	$kode_barang = $this->M_data_barang->CreateCode($kode_);
    echo $kode_barang; 
}

function get_detail($id)  {

	$id= $id;
	$data['nama_menu'] = 'Detail Data Barang';


	$where = array(
		'data_barang.state'=> 'aktif',
		'id_barang' => $id
	);

	$data['data'] = $this->M_data_barang->ambil_barang('data_barang',$where	)->result();

	// print_r($data);
	$this->load->view('backend/page/detail',$data);

	
}

	
}
