<?php

// require_once(APPPATH.'modules\api\controllers\Api.php'); 
// require_once(APPPATH.'modules\api\models\M_api.php'); 
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->load->library('enc'); 
        $this->load->model("M_Dashboard"); //load model m Dashboard

		if($this->session->userdata('status') != "login"){
			redirect(base_url("auth"));
		}
    }


	public function index()
	{
		$set = $this->M_Dashboard->config();
		$data['nama_aplikasi'] = $set[0]->nama_vendor;
		$data['token'] = $this->session->userdata('id_hak_akses');
		$data['nama_user'] = $this->session->userdata('nama_user');
		$data['menu'] = $this->get_menu($this->session->userdata('id_hak_akses'));
		
		$this->load->view('backend/a_header',$data);
		$this->load->view('backend/b_main',$data);
		$this->load->view('backend/c_footer',$data);
		// print_r($data);
	
	}


	public function get_menu($id_hak_akses)
	{
		// $id_hak_akses = $_POST['token'];
			
			$id_hak_akses =$id_hak_akses;

		$id_hak_akses = $this->enc->out($id_hak_akses);
		// $id_hak_akses = 1;
		$where_parent = array(
			'id_hak_akses' => $id_hak_akses,
			'status_role' => 'aktif',
			'state_orgin' => 'parent'

		);
$menu_parent = $this->M_Dashboard->get_parent('role_tabel',$where_parent)->result();

$menu = '';

foreach ($menu_parent as $k) {
	$menu .= '<li>';
$menu .='<a href="#"><i class="'.$k->icon.'"></i> <span>'.$k->nama_menu.'</span></a>';
$menu .='<ul>';

$id_hak_akses = 1;
		$where_child = array(
			'id_hak_akses' => $id_hak_akses,
			'status_role' => 'aktif',
			'state_orgin' => 'child',
			'id_parent' => $k->id_menu

		);



$menu_child = $this->M_Dashboard->get_parent('role_tabel',$where_child)->result();

foreach ($menu_child as $y) {
	$menu .=	'<li><a href="'.$y->link.'">'.$y->nama_menu.'</a></li>';
}

$menu .='</ul>';
$menu .='</li>';
	
}

return $menu;

		
	}







	
}
