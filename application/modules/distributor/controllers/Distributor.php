<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class distributor extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->load->library('enc'); 
        $this->load->model("M_distributor"); //load model m user

		if($this->session->userdata('status') != "login"){
			redirect(base_url("auth"));
		}
    }


	public function index()
	{
		//set .inv
		$id_menu = 1;
		$data['nama_menu'] = 'distributor';
		$this->cek_hak_akses($id_menu);
		$set = $this->M_distributor->config();
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
		$menu_parent = $this->M_distributor->get_parent('role_tabel',$where_parent)->result();
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
			$menu_child = $this->M_distributor->get_parent('role_tabel',$where_child)->result();
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

	$menu_cek = $this->M_distributor->get_parent('role_tabel',$where)->num_rows();

	if($menu_cek > 0 ){

	}else{
		redirect(base_url('auth/logout'));
	}
	
}
//end hak akses


function tabel_content(){

	$where = array(
		't_distributor.state' => 'aktif'
	);

	$data['data'] = $this->M_distributor->cek_where('t_distributor',$where)->result();
	$this->load->view('backend/page/tabel',$data);
	
}

function tabel_sampah(){

	$where = array(
		't_distributor.state' => 'tidak'
	);

	$data['data'] = $this->M_distributor->cek_where('t_distributor',$where)->result();
	$this->load->view('backend/page/tabel_sampah',$data);
	
}


//===========ADD 
function form_add() {
	$data['nama_menu'] = 'distributor';
	$where = array(
		'state'=> 'aktif'
	);

	$data['hak_akses'] = $this->M_distributor->cek_where('t_hak_akses',$where)->result();
	$this->load->view('backend/page/from_add',$data);
}

function p_add() {
	$data = array(
		'nama_distributor' => $_POST['nama_distributor'],
		'no_wa' => $_POST['no_wa'],
		'alamat' => $_POST['alamat'],
		'nama_pimpinan' => $_POST['nama_pimpinan'],
		'state' =>'aktif'
		
	);

	$this->M_distributor->insert('t_distributor',$data);
}

//============= END ADD==

//============EDIT
function form_edit($id) {
	$id= $id;
	$data['nama_menu'] = 'distributor';
	
	$where = array(
		'state'=> 'aktif',
		'id_distributor' => $id
	);

	$data['data'] = $this->M_distributor->cek_where('t_distributor',$where	)->result();

	// print_r($data);
	$this->load->view('backend/page/from_edit',$data);
}

function p_edit() {
	$id = $_POST['id'];

	$data = array(
		'nama_distributor' => $_POST['nama_distributor'],
		'no_wa' => $_POST['no_wa'],
		'alamat' => $_POST['alamat'],
		'nama_pimpinan' => $_POST['nama_pimpinan'],
		'state' =>'aktif'
	);

	$where = array(
		'id_distributor' => $id
	);

	$this->M_distributor->update_data($where,$data,'t_distributor');
}


//=====================END EDIT
//================== Delete
function p_delete() {
	$id = $_POST['id'];
	$data = array(
		'state' => 'tidak',
		
	);
	$where = array(
		'id_distributor' => $id
	);

	$this->M_distributor->update_data($where,$data,'t_distributor');
}

//=====================END Delete

//================== Delete
function p_restore() {
	$id = $_POST['id'];
	$data = array(
		'state' => 'aktif',
		
	);
	$where = array(
		'id_distributor' => $id
	);

	$this->M_distributor->update_data($where,$data,'t_distributor');
}
//=====================END Delete


//================== Delete Permanent
function p_delete_permanen() {
	$id = $_POST['id'];
	
	$where = array(
		'id_distributor' => $id,
		'state' => 'tidak'
	);

	$this->M_distributor->delete_data('t_distributor',$where);
}

//=====================END Delete Permanen


	
}
