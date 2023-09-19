<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Distributor extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model("M_distributor"); //load model
		if($this->session->userdata('status') != "login"){
			redirect(base_url("auth"));
		}
    }


	public function index()
	{
	
		$data['conf'] = $this->M_distributor->config();
		$data['nama_user'] = $this->session->userdata('nama_user');
		$data['nama_menu'] = 'Distributor';
		$data['x_token'] = $this->session->userdata('x_token');
		$this->load->view('back_end/a_header',$data);
		$this->load->view('back_end/b_navbar',$data);
		$this->load->view('back_end/c_sidebar',$data);
		// $this->load->view('back_end/d_content',$data);
		$this->data();
		$this->load->view('back_end/e_footer',$data);
	}

	
	function data()  {
		// header('Content-Type: application/json');
		$where = array(
			'state' => 'aktif'
		);	
		$data['data'] = $this->M_distributor->get_data('distributor',$where);
		$this->load->view('back_end/d_content',$data);
		// echo json_encode($data);
	}


//get form add
	function add()  {
		$where = array(
			'state' => 'aktif'
		);	
		$data['distributor'] = $this->M_distributor->get_distributor('distributor',$where);
		$this->load->view('back_end/add_content',$data);
	}

	//get form edit
	function edit($id)  {
		$where = array(
			'id_distributor' => $id,
			'state' => 'aktif'
		);	
		
		$data['distributor'] = $this->M_distributor->get_distributor('distributor',$where);
	
		$this->load->view('back_end/edit_content',$data);
	}
//get Content table
	function content()  {
		$where = array(
			'state' => 'aktif'
		);	
		$data['data'] = $this->M_distributor->get_data('distributor',$where);
		$this->load->view('back_end/table_content',$data);
	}

//restore		
	function data_sampah()  {
		$where = array(
			'state' => 'tidak'
		);	
		$data['data'] = $this->M_distributor->get_data('distributor',$where);
		$this->load->view('back_end/table_content_sampah',$data);
	}


//prosess add
	function add_p()  {
				
		$data = array(
		'nama_distributor' => $_POST['nama_distributor'],
		'alamat_distributor' => $_POST['alamat_distributor'],
		'no_telp' => $_POST['no_telp'],
		'nama_pimpinan' => $_POST['nama_pimpinan'],
		'nama_bank' => $_POST['nama_bank'],
		'no_rek' => $_POST['no_rek'],
		'state' => 'aktif'
		
			);	

			// print_r($data);
	

	
	$respone  = array(
			'respone' => '200',
			'data' => 'Data Tersimpan!'
		);

	$insert = $this->M_distributor->input_data($data,'distributor');
	

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
	
		$data = array(
		'nama_distributoran' => $_POST['nama_distributoran'],
	);	
	//cek before
	$where = array(
		'id_distributor' => $_POST['id_distributor']
	);

	
		$respone  = array(
			'respone' => '200',
			'data' => 'Data Tersimpan!'
		);

	  $insert = $this->M_distributor->edit_data($where,$data,'distributor');


	header('Content-Type: application/json');
	echo json_encode($respone);

	


	
	}
//proses hapus
	function hapus()  {

		$where = array(
			'id_distributor' => $_POST['id'],
		);
		$data = array(
			'state' => 'tidak',
	
		);


		 $this->M_distributor->edit_data($where,$data,'distributor');
		
	}


//proses restore
function restore()  {

	$where = array(
		'id_distributor' => $_POST['id'],
	);
	$data = array(
		'state' => 'aktif',

	);


	 $this->M_distributor->edit_data($where,$data,'distributor');
	
}



}