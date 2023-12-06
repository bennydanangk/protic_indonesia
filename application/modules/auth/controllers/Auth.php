<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->load->library('enc'); 
        $this->load->model("M_auth"); //load model m auth
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
	public function template()
	{
		$set = $this->M_auth->config();
		$data['nama_aplikasi'] = $set[0]->nama_vendor;
		$data['nama_user'] = 'Administrator';
		$this->load->view('backend/index',$data);
	
	}

	function index() {
		$get = $this->M_auth->config();
		$key_app = $get[0]->key_app;
	 	$this->enc->credensial($key_app);
		
	}

}
