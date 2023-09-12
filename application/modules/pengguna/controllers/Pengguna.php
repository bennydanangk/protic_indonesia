<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model("M_Pengguna"); //load model
		if($this->session->userdata('status') != "login"){
			redirect(base_url("auth"));
		}
    }


	public function index()
	{
	
		$data['conf'] = $this->M_Pengguna->config();
		$data['nama_user'] = $this->session->userdata('nama_user');
		$data['nama_menu'] = 'Pengguna';
		$data['x_token'] = $this->session->userdata('x_token');
		$this->load->view('back_end/a_header',$data);
		$this->load->view('back_end/b_navbar',$data);
		$this->load->view('back_end/c_sidebar',$data);
		$this->data();
		$this->load->view('back_end/e_footer',$data);
	}

	
	function data()  {
		// header('Content-Type: application/json');
		$where = array(
			'user.state' => 'aktif'
		);	
		$data['data'] = $this->M_Pengguna->get_data('user',$where);
		$this->load->view('back_end/d_content',$data);
		// echo json_encode($data);
	}


//get form add
	function add()  {
		$where = array(
			'state' => 'aktif'
		);	
		$data['ruang'] = $this->M_Pengguna->get_ruang('ruang',$where);
		$this->load->view('back_end/add_content',$data);
	}

	//get form edit
	function edit($id)  {
		$where = array(
			'state' => 'aktif'
		);	
		$where2 = array(
			'id_user' => $id,
			'user.state' => 'aktif'
		);	
		$data['ruang'] = $this->M_Pengguna->get_ruang('ruang',$where);
		$data['data'] = $this->M_Pengguna->get_data('user',$where2);
		$this->load->view('back_end/edit_content',$data);
	}
//get Content table
	function content()  {
		$where = array(
			'user.state' => 'aktif'
		);	
		$data['data'] = $this->M_Pengguna->get_data('user',$where);
		$this->load->view('back_end/table_content',$data);
	}

//restore		
	function data_sampah()  {
		$where = array(
			'user.state' => 'tidak'
		);	
		$data['data'] = $this->M_Pengguna->get_data('user',$where);
		$this->load->view('back_end/table_content_sampah',$data);
	}


//prosess add
	function add_p()  {
		$this->load->library('enc');
		$password = $this->enc->in($_POST['password']);
		$data = array(
		'nama_pengguna' => $_POST['nama_pengguna'],
		'nip' => $_POST['nip'],
		'username' => $_POST['username'],
		'password' => $password,
		'jabatan' => $_POST['jabatan'],
		'id_ruang' => $_POST['ruang'],
	);	
	//cek before
	$where = array(
		'username' => $_POST['username']
	);
	 $cek = $this->M_Pengguna->get_cek('user',$where)->num_rows();
	 $respone;
	if ($cek > 0){
		$respone = array(
			'respone' => '201',
			'data' => 'Username Sudah Ada yang Memiliki!'
		);

		
	}else{
		$respone  = array(
			'respone' => '200',
			'data' => 'Data Tersimpan!'
		);

	  $insert = $this->M_Pengguna->input_data($data,'user');
	}

	header('Content-Type: application/json');
	echo json_encode($respone);

	


	
	}
// get password
	function forgot_password(){
		$this->load->library('enc');
		$password = $this->enc->out($_POST['ps']);
		echo $password;
	
	}


//proses edit
	function edit_p()  {
		$this->load->library('enc');
		$password = $this->enc->in($_POST['password']);
		$data = array(
		'nama_pengguna' => $_POST['nama_pengguna'],
		'nip' => $_POST['nip'],
		'username' => $_POST['username'],
		'password' => $password,
		'jabatan' => $_POST['jabatan'],
		'id_ruang' => $_POST['ruang'],
	);	
	//cek before
	$where = array(
		'username' => $_POST['username']
	);
	 $cek = $this->M_Pengguna->get_cek('user',$where)->num_rows();
	 $respone;
	if ($cek > 0){
		$respone = array(
			'respone' => '201',
			'data' => 'Username Sudah Ada yang Memiliki!'
		);

		
	}else{
		$respone  = array(
			'respone' => '200',
			'data' => 'Data Tersimpan!'
		);
$where2 = array(
	'id_user' => $_POST['id_user'],
);
	  $insert = $this->M_Pengguna->edit_data($where2,$data,'user');
	}

	header('Content-Type: application/json');
	echo json_encode($respone);

	


	
	}
//proses hapus
	function hapus()  {

		$where = array(
			'id_user' => $_POST['id'],
		);
		$data = array(
			'state' => 'tidak',
	
		);


		 $this->M_Pengguna->edit_data($where,$data,'user');
		
	}


//proses restore
function restore()  {

	$where = array(
		'id_user' => $_POST['id'],
	);
	$data = array(
		'state' => 'aktif',

	);


	 $this->M_Pengguna->edit_data($where,$data,'user');
	
}

//restore		
function state($id)  {
	$where = array(
		'state' => 'aktif',
	);

	$loop_menu = $this->M_Pengguna->get_cek('menu_manajemen',$where)->result();
	$data;

	$i =0;
	foreach ($loop_menu as $k) {
		$where = array(
			'state' => 'aktif',
			'id_user'=> $id,
			'id_menu'=> $k->id_menu
			
		);

		$cek = $this->M_Pengguna->get_cek('role_user',$where)->num_rows();
		$state;
		if($cek > 0){
			$state = $k->state;
			
		}else{
			$state ='tidak';
		}


		$data[$i] = array(
			'id_menu' => $k->id_menu,
			'nama_menu' => $k->nama_menu,
			'state' => $state
		);

		$i++;		
	}
//role Get
		$data['role_user'] = $data;

//user profile
		$where = array(
			'state' => 'aktif',
			'id_user'=> $id,
			
		);
		$data['user'] = $loop_menu = $this->M_Pengguna->get_cek('user',$where)->result();
		//user -> get user
		//role_menu -> get role
	$this->load->view('back_end/table_content_akses',$data);	
	
}


}