<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seting extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->load->library('enc'); 
        $this->load->model("M_seting"); //load model m user

		if($this->session->userdata('status') != "login"){
			redirect(base_url("auth"));
		}
    }


	public function index()
	{
		//set .inv
		$id_menu = 1;
		$data['nama_menu'] = 'Seting';
		$this->cek_hak_akses($id_menu);
		$set = $this->M_seting->config();
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
		$menu_parent = $this->M_seting->get_parent('role_tabel',$where_parent)->result();
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
			$menu_child = $this->M_seting->get_parent('role_tabel',$where_child)->result();
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

	$menu_cek = $this->M_seting->get_parent('role_tabel',$where)->num_rows();

	if($menu_cek > 0 ){

	}else{
		redirect(base_url('auth/logout'));
	}
	
}
//end hak akses


function tabel_content(){

	$where = array(
		't_user.state' => 'aktif'
	);

	$data['data'] = $this->M_seting->get_user('t_user',$where)->result();
	$this->load->view('backend/page/tabel',$data);
	
}

function tabel_sampah(){

	$where = array(
		't_user.state' => 'tidak'
	);

	$data['data'] = $this->M_seting->get_user('t_user',$where)->result();
	$this->load->view('backend/page/tabel_sampah',$data);
	
}





//============EDIT
function form_edit($id) {
	$id= $id;
	$data['nama_menu'] = 'Seting';
	
	$where = array(
		
		'id_vendor' => $id
	);

	$data['data'] = $this->M_seting->cek_where('t_vendor',$where	)->result();

	// print_r($data);
	$this->load->view('backend/page/from_edit',$data);
}

function p_edit() {
	$id = $_POST['id'];
	$data = array(
		'nama_vendor' => $_POST['nama_vendor'],
		'key_app' =>$_POST['key_app'],
		'nama_pimpinan' => $_POST['nama_pimpinan'],
		'alamat_vendor' => $_POST['alamat_vendor'],
		'no_telp' => $_POST['no_telp'],
		'email' => $_POST['email'],
		'moto' => $_POST['moto'],		
		);

	$where = array(
		'id_vendor' => '1'
	);

	$this->M_seting->update_data($where,$data,'t_vendor');
}


public function backup()
{
	date_default_timezone_set("Asia/Jakarta"); // set waktu sesuai lokasi

	$this->load->dbutil();
	$pref = [
		'format' => 'zip',
		'filename' => 'protect.sql'
	];

	$backup     = $this->dbutil->backup($pref);
	$db_name    = 'backup_database__' . date("d-m-Y__H-i-s") . '.zip'; // nama backup dalam bentuk zip
	$save       = './backup/db/' . $db_name; //folder tempat database disimpan

	$this->load->helper('file'); // load helper file
	write_file($save, $backup);

	$this->load->helper("download"); // load helper download
	force_download($db_name, $backup);
}	
}
