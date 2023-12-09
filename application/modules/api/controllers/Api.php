<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->load->library('enc'); 
        $this->load->model("M_api"); //load model m api

		if($this->session->userdata('status') != "login"){
			redirect(base_url("api"));
		}
    }


	



function cek_koneksi()  {
	$data = $this->M_api->config();
	$cek = $data[0]->status_aplikasi;
	$x='';
	$dat = array(
		'respone' => '200',
		'data' => $cek
	);

	echo json_encode($dat);

	// echo "OK";
}


	
}
