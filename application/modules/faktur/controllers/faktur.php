<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class faktur extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->load->library('enc'); 
        $this->load->model("M_faktur"); //load model m user

		if($this->session->userdata('status') != "login"){
			redirect(base_url("auth"));
		}
    }


	public function index()
	{
		//set .inv
		$id_menu = 1;
		$data['nama_menu'] = 'faktur';
		$this->cek_hak_akses($id_menu);
		$set = $this->M_faktur->config();
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
		$menu_parent = $this->M_faktur->get_parent('role_tabel',$where_parent)->result();
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
			$menu_child = $this->M_faktur->get_parent('role_tabel',$where_child)->result();
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

	$menu_cek = $this->M_faktur->get_parent('role_tabel',$where)->num_rows();

	if($menu_cek > 0 ){

	}else{
		redirect(base_url('auth/logout'));
	}
	
}
//end hak akses


function tabel_content($tgl_awal, $tgl_akhir,){

	$where = array(
		'faktur.state' => 'aktif',
		'tgl_input 	>= ' => $tgl_awal.' 00:00:00',
		'tgl_input <= ' => $tgl_akhir.' 23:59:59'
	);

	$data['data'] = $this->M_faktur->ambil_faktur('faktur',$where)->result();
	$this->load->view('backend/page/tabel',$data);
	
}

function tabel_sampah(){

	$where = array(
		'faktur.state' => 'tidak'
	);

	$data['data'] = $this->M_faktur->ambil_faktur('faktur',$where)->result();

	$this->load->view('backend/page/tabel_sampah',$data);
	
}


//===========ADD 
function form_add() {
	$data['nama_menu'] = 'data barang';
	$where = array(
		'state'=> 'aktif'
	);

	$data['distributor'] = $this->M_faktur->cek_where('t_distributor',$where)->result();
	// $data['satuan'] = $this->M_faktur->cek_where('t_satuan',$where)->result();
	// $data['kategori'] = $this->M_faktur->cek_where('t_kategori',$where)->result();


	$this->load->view('backend/page/from_add',$data);
}

function p_add() {

	$data = array(
		'nomor_faktur' => $_POST['nomor_faktur'],
		'id_distributor' => $_POST['id_distributor'],
		'tgl_faktur' => $_POST['tgl_faktur'],
		'catatan' => $_POST['catatan'],
		'state' => 'aktif',
		'id_user_input' => $this->session->userdata('id_user'),
		'tgl_input'=> date('Y-m-d H:i:s'),	
	);

	$this->M_faktur->insert('faktur',$data);
}

//============= END ADD==

//============EDIT
function form_edit($id) {
	$id= $id;
	$data['nama_menu'] = 'Edit Data Barang';

	$where_ = array(
		'state'=> 'aktif'
	);

	$data['distributor'] = $this->M_faktur->cek_where('t_distributor',$where_)->result();


	
	$where = array(
		'faktur.state'=> 'aktif',
		'id_faktur' => $id
	);

	$data['data'] = $this->M_faktur->ambil_faktur('faktur',$where	)->result();

	// print_r($data);
	$this->load->view('backend/page/from_edit',$data);
}

function p_edit() {
	$id = $_POST['id'];

	$data = array(
		'nomor_faktur' => $_POST['nomor_faktur'],
		'id_distributor' => $_POST['id_distributor'],
		'tgl_faktur' => $_POST['tgl_faktur'],
		'catatan' => $_POST['catatan'],
		'state' => 'aktif',
		'id_user_input' => $this->session->userdata('id_user'),
		'tgl_input'=> date('Y-m-d H:i:s'),	
	);


	$where = array(
		'id_faktur' => $id
	);

	$this->M_faktur->update_data($where,$data,'faktur');
}


//=====================END EDIT
//================== Delete
function p_delete() {
	$id = $_POST['id'];
	$data = array(
		'state' => 'tidak',
		
	);
	$where = array(
		'id_faktur' => $id
	);

	$this->M_faktur->update_data($where,$data,'faktur');
}

//=====================END Delete

//================== Delete
function p_restore() {
	$id = $_POST['id'];
	$data = array(
		'state' => 'aktif',
		
	);
	$where = array(
		'id_faktur' => $id
	);

	$this->M_faktur->update_data($where,$data,'faktur');
}
//=====================END Delete


//================== Delete Permanent
function p_delete_permanen() {
	$id = $_POST['id'];
	
	$where = array(
		'id_faktur' => $id,
		'state' => 'tidak'
	);

	$this->M_faktur->delete_data('faktur',$where);
}

//=====================END Delete Permanen


function kode_barang()  {

	$kode_ = 'KD';
	$kode_barang = $this->M_faktur->CreateCode($kode_);
    echo $kode_barang; 
}

function get_detail($id)  {

	$id= $id;
	$data['nama_menu'] = 'Detail Data Barang';


	$where = array(
		'faktur.state'=> 'aktif',
		'id_faktur' => $id
	);

	$data['data'] = $this->M_faktur->ambil_barang('faktur',$where	)->result();

	// print_r($data);
	$this->load->view('backend/page/detail',$data);

	
}

//tabel Faktur
function open_tabel_item($id)  {

	$where = array(
		'state' => 'aktif',
		'id_faktur' => $id
	);

	$data['item'] = $this->M_faktur->cek_where('t_item',$where)->result();

}


function open_item($id) {

	
	$id= $id;
	$data['nama_menu'] = 'Item Faktur';

		$where = array(
		'state' => 'aktif',
		'id_faktur' => $id
	);


	$where_barang = array(
		'state' => 'aktif',
		);
		$data['id_faktur'] = $id;
	$data['faktur'] = $this->M_faktur->cek_where('item_faktur',$where)->result();
	$data['data_barang'] = $this->M_faktur->cek_where('data_barang',$where_barang)->result();
	$data['satuan'] = $this->M_faktur->cek_where('t_satuan',$where_barang)->result();


	$this->load->view('backend/page/from_add_item',$data);
}
}
