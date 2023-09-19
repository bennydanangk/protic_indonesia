<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mutasi_barang extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model("M_mutasi_barang"); //load model
		if($this->session->userdata('status') != "login"){
			redirect(base_url("auth"));
		}
    }


	public function index()
	{
	
		$data['conf'] = $this->M_mutasi_barang->config();
		$data['nama_user'] = $this->session->userdata('nama_user');
		$data['nama_menu'] = 'Mutasi Barang';
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
		$data['data'] = $this->M_mutasi_barang->get_data('posisi_barang',$where);
		$this->load->view('back_end/d_content',$data);
		// echo json_encode($data);
	}


//get form add
	function add()  {
		$where = array(
			'state' => 'aktif'
		);	
		$data['mutasi_barang'] = $this->M_mutasi_barang->get_mutasi_barang('mutasi_barang',$where);
		$this->load->view('back_end/add_content',$data);
	}

	//get form edit
	function edit($id)  {
		$where = array(
			'id_mutasi_barang' => $id,
			'state' => 'aktif'
		);	
		
		$data['mutasi_barang'] = $this->M_mutasi_barang->get_mutasi_barang('mutasi_barang',$where);
	
		$this->load->view('back_end/edit_content',$data);
	}
//get Content table
	function content()  {
		$where = array(
			'state' => 'aktif'
		);	
		$data['data'] = $this->M_mutasi_barang->get_data('posisi_barang',$where);
		$this->load->view('back_end/table_content',$data);
	}

//restore		
	function data_sampah()  {
		$where = array(
			'state' => 'tidak'
		);	
		$data['data'] = $this->M_mutasi_barang->get_data('mutasi_barang',$where);
		$this->load->view('back_end/table_content_sampah',$data);
	}


//prosess add
	function add_p()  {
		
		$data = array(
		'nama_mutasi_barang' => $_POST['nama_mutasi_barang'],
		
			);	
	

	
	$respone  = array(
			'respone' => '200',
			'data' => 'Data Tersimpan!'
		);

	  $insert = $this->M_mutasi_barang->input_data($data,'mutasi_barang');
	

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
		'nama_mutasi_barang' => $_POST['nama_mutasi_barang'],
	);	
	//cek before
	$where = array(
		'id_mutasi_barang' => $_POST['id_mutasi_barang']
	);

	
		$respone  = array(
			'respone' => '200',
			'data' => 'Data Tersimpan!'
		);

	  $insert = $this->M_mutasi_barang->edit_data($where,$data,'mutasi_barang');


	header('Content-Type: application/json');
	echo json_encode($respone);

	


	
	}
//proses hapus
	function hapus()  {

		$where = array(
			'id_mutasi_barang' => $_POST['id'],
		);
		$data = array(
			'state' => 'tidak',
	
		);


		 $this->M_mutasi_barang->edit_data($where,$data,'mutasi_barang');
		
	}


//proses restore
function restore()  {

	$where = array(
		'id_mutasi_barang' => $_POST['id'],
	);
	$data = array(
		'state' => 'aktif',

	);


	 $this->M_mutasi_barang->edit_data($where,$data,'mutasi_barang');
	
}



}