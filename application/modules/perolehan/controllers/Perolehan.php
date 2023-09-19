<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Perolehan extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model("M_perolehan"); //load model
		if($this->session->userdata('status') != "login"){
			redirect(base_url("auth"));
		}
    }


	public function index()
	{
	
		$data['conf'] = $this->M_perolehan->config();
		$data['nama_user'] = $this->session->userdata('nama_user');
		$data['nama_menu'] = 'Perolehan';
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
		$data['data'] = $this->M_perolehan->get_data('perolehan',$where);
		$this->load->view('back_end/d_content',$data);
		// echo json_encode($data);
	}


//get form add
	function add()  {
		$where = array(
			'state' => 'aktif'
		);	
		$data['perolehan'] = $this->M_perolehan->get_perolehan('perolehan',$where);
		$this->load->view('back_end/add_content',$data);
	}

	//get form edit
	function edit($id)  {
		$where = array(
			'id_perolehan' => $id,
			'state' => 'aktif'
		);	
		
		$data['perolehan'] = $this->M_perolehan->get_perolehan('perolehan',$where);
	
		$this->load->view('back_end/edit_content',$data);
	}
//get Content table
	function content()  {
		$where = array(
			'state' => 'aktif'
		);	
		$data['data'] = $this->M_perolehan->get_data('perolehan',$where);
		$this->load->view('back_end/table_content',$data);
	}

//restore		
	function data_sampah()  {
		$where = array(
			'state' => 'tidak'
		);	
		$data['data'] = $this->M_perolehan->get_data('perolehan',$where);
		$this->load->view('back_end/table_content_sampah',$data);
	}


//prosess add
	function add_p()  {
		
		$data = array(
		'nama_perolehan' => $_POST['nama_perolehan'],
		
			);	
	

	
	$respone  = array(
			'respone' => '200',
			'data' => 'Data Tersimpan!'
		);

	  $insert = $this->M_perolehan->input_data($data,'perolehan');
	

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
		'nama_perolehan' => $_POST['nama_perolehan'],
	);	
	//cek before
	$where = array(
		'id_perolehan' => $_POST['id_perolehan']
	);

	
		$respone  = array(
			'respone' => '200',
			'data' => 'Data Tersimpan!'
		);

	  $insert = $this->M_perolehan->edit_data($where,$data,'perolehan');


	header('Content-Type: application/json');
	echo json_encode($respone);

	


	
	}
//proses hapus
	function hapus()  {

		$where = array(
			'id_perolehan' => $_POST['id'],
		);
		$data = array(
			'state' => 'tidak',
	
		);


		 $this->M_perolehan->edit_data($where,$data,'perolehan');
		
	}


//proses restore
function restore()  {

	$where = array(
		'id_perolehan' => $_POST['id'],
	);
	$data = array(
		'state' => 'aktif',

	);


	 $this->M_perolehan->edit_data($where,$data,'perolehan');
	
}



}