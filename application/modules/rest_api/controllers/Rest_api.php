<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Rest_api extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model("M_rest_api"); //load model mahasiswa
		if($this->session->userdata('status') != "login"){
			redirect(base_url("auth"));
		}
    }


	public function index()
	{
	
	echo "Welcome API App Create By Benny Danang Kurniawan";
	echo " </br> <hr> 
	a. Menu Bar Login {base url}/set_menu 
	";

	echo " </br> <hr> 
	b. get All Data {base url}/get_tb_all
	Methode POST/ 
	x_token, table
	";

	}


	function login() {
		
	}
	function set_menu()  {
		$id = $this->session->userdata('id_user');
		$where = array(
			'menu_manajemen.hirarce' => 'parent',
			'role_user.state' => 'aktif',
			'menu_manajemen.state' => 'aktif',
			'role_user.id_user' => $id
		);
		$menu_item = $this->M_rest_api->get_where('menu_manajemen',$where);


	$data ='';
		
		foreach ($menu_item as $k) {

			$data .= ' <li class="nav-item">
			<a href="#" class="nav-link">
            <i class="nav-icon '.$k->icon.'"></i>
              <p>
                '.$k->nama_menu.'
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">';

            $data .=  $this->set_menu_child($k->id_menu);
            
            $data .=  '</ul>
          </li>';

		 
		}
		echo $data;
	
	}



function set_menu_child($id_parent)  {
	$id = $this->session->userdata('id_user');
	$where = array(
		'menu_manajemen.hirarce' => 'child',
		'role_user.state' => 'aktif',
		'id_parent' => $id_parent,
		'id_user' => $id
	);
	$menu_item = $this->M_rest_api->get_where('menu_manajemen',$where);

	$data ='';
	
	foreach ($menu_item as $k) {
		$data .= '<li class="nav-item"> <a href="'.base_url($k->link).'" class="nav-link"> <i class="far fa-circle nav-icon"></i> <p>'.$k->nama_menu.'</p> </a> </li>';
	}
	return $data;

	
}
	
function get_tb_all()  {

	
	if(!isset($_POST['x_token'])){
		header('Content-Type: application/json');
		$data = array(
			'respone' => '404',
			'data' => 'Query ilegal..'
		);
 echo json_encode($data);
	}else {
		$this->load->library('enc');

		$x_token = $_POST['x_token'];
		$x_token = $this->enc->out($x_token);
		$_0 = $this->session->userdata('x_token');
		$_1 = $this->enc->out($_0);
		
		if($x_token != $_1){
			$data = array(
				'respone' => '404',
				'data' => 'Data tidak di temukan!'
			);
			echo json_encode($data);
		}else{
			$data_query = $this->M_rest_api->get_all($_POST['table']);
			$data = array(
				'respone' => '200',
				'data' => $data_query
			);
	
			 header('Content-Type: application/json');
			 echo json_encode($data);
		}
		
	
		

	}
}

function backup_db()  {
	date_default_timezone_set("Asia/Jakarta"); // set waktu sesuai lokasi

        $this->load->dbutil();
        $pref = [
            'format' => 'zip',
            'filename' => 'app.sql'
        ];

        $backup     = $this->dbutil->backup($pref);
        $db_name    = 'backup_database_app__' . date("d-m-Y__H-i-s") . '.zip'; // nama backup dalam bentuk zip
        $save       = './assets/backup/' . $db_name; //folder tempat database disimpan

        $this->load->helper('file'); // load helper file
        write_file($save, $backup);

        $this->load->helper("download"); 
        force_download($db_name, $backup);
}

function qrcode()  {
	$this->load->view('back_end/index');
}

function cek_bos()  {
	$this->load->view('back_end/index');
}
}
