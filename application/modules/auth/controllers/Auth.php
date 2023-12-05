<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->load->library('enc'); 
        $this->load->model("M_auth"); //load model m auth
    }


	public function index()
	{
		$data['nama_aplikasi'] = "XXX";
		
		$this->load->view('login',$data);
	
	}


}
