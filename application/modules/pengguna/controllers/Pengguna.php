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


	
	

}