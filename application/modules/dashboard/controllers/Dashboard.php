<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->load->library('enc'); 
        $this->load->model("M_Dashboard"); //load model m Dashboard

		if($this->session->userdata('status') != "login"){
			redirect(base_url("dashboard"));
		}
    }


	public function index()
	{
		$set = $this->M_Dashboard->config();
		$data['nama_aplikasi'] = $set[0]->nama_vendor;
		$data['nama_user'] = $this->session->userdata('nama_user');
		$this->load->view('backend/a_header',$data);
		$this->load->view('backend/b_main',$data);
		$this->load->view('backend/c_footer',$data);
	
	}



	
}
