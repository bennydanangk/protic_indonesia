<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model("M_dashboard"); //load model mahasiswa
		if($this->session->userdata('status') != "login"){
			redirect(base_url("auth"));
		}
    }


	public function index()
	{
	
		$data['conf'] = $this->M_dashboard->config();
		$data['nama_user'] = $this->session->userdata('nama_user');
		$data['nama_menu'] = 'Template';

	$this->load->view('back_end/a_header',$data);
	$this->load->view('back_end/b_navbar',$data);
	$this->load->view('back_end/c_sidebar',$data);
	$this->load->view('back_end/d_content',$data);
	$this->load->view('back_end/e_footer',$data);
	}


	
	

}