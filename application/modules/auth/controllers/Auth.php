<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->load->library('enc'); 
        $this->load->model("M_auth"); //load model m auth

		if($this->session->userdata('status') == "login"){
			redirect(base_url("dashboard"));
		}
    }


	public function login()
	{
		$set = $this->M_auth->config();
		$data['nama_aplikasi'] = $set[0]->nama_vendor;
		$this->load->view('login',$data);
	
	}

	function fail()  {
		$this->load->view('fail');
	}

	function index() {
		$get = $this->M_auth->config();
		$key_app = $get[0]->key_app;
	 	$this->enc->credensial($key_app);
		
	}

	function login_auth(){
	$username = $_POST['username'];
	$password = $_POST['password'];

	$where_username = array(
		'username' => $username
	);
$cek_username = $this->M_auth->cek_where('t_user',$where_username)->num_rows();

if($cek_username > 0 ){
	$where_username = array(
		'username' => $username
	);

	$cek_password = $this->M_auth->cek_where('t_user',$where_username)->result();
	$password_ = $cek_password[0]->password;
	$password_ = $this->enc->out($password_);
	// print_r($password_);

	if($password_ == $password){
		$data = $this->M_auth->cek_where('t_user',$where_username)->result();
		// print_r($data);


		$data_session = array(
			'nama_user' => $data[0]->nama_user,
			'id_hak_akses' => $this->enc->in($data[0]->id_hak_akses),
			'status' => "login"
			);

			// print_r($data_session);
		$this->session->set_userdata($data_session);

		$kirim = array(
			'data' => $data[0]->nama_user,
			'status' => 'login',
			'date_input' => date('Y-m-d H:i:s')
		);

		$this->M_auth->insert('log',$kirim);

		redirect(base_url('dashboard'));


	}else {

		redirect(base_url('auth/index'));
	}
	


}else{

	redirect(base_url('auth/index'));
	
}

	}






function get_hak_akses()  {

	$data = $this->M_auth->get('t_menu');
	foreach ($data as $k) {
		
		$kirim = array(
			'id_menu' => $k->id_menu,
			'id_hak_akses' => '1',
			'status_role' => 'aktif'
		);
	$this->M_auth->insert('role_tabel',$kirim);
	}
	
}



function logout(){


	$kirim = array(
		'data' => $this->session->set_userdata($nama_user),
		'status' => 'logout',
		'date_input' => date('Y-m-d H:i:s')
	);
	$this->session->sess_destroy();
	$this->M_auth->insert('log',$kirim);
	redirect(base_url('auth/index'));
}



}
