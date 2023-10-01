<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class barang_faktur extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model("M_barang_faktur"); //load model
		if($this->session->userdata('status') != "login"){
			redirect(base_url("auth"));
		}
    }


	public function index()
	{
	
		$data['conf'] = $this->M_barang_faktur->config();
		$data['nama_user'] = $this->session->userdata('nama_user');
		$data['nama_menu'] = 'Barang Faktur';
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
		$data['data'] = $this->M_barang_faktur->get_data('barang_faktur',$where);
		$this->load->view('back_end/d_content',$data);
		// echo json_encode($data);
	}


//get form add
	function add()  {
		$where = array(
			'state' => 'aktif'
		);	
		$data['barang_faktur'] = $this->M_barang_faktur->get_barang_faktur('barang_faktur',$where);

		$data['kode_barang'] = $this->M_barang_faktur->cekkodebarang();
		$this->load->view('back_end/add_content',$data);
	}

	//get form edit
	function edit($id)  {
		$where = array(
			'id_barang_faktur' => $id,
			'state' => 'aktif'
		);	
		
		$data['barang_faktur'] = $this->M_barang_faktur->get_barang_faktur('barang_faktur',$where);
	
		$this->load->view('back_end/edit_content',$data);
	}
//get Content table
	function content()  {
		$where = array(
			'state' => 'aktif'
		);	
		$data['data'] = $this->M_barang_faktur->get_data('barang_faktur',$where);
		$this->load->view('back_end/table_content',$data);
	}

//restore		
	function data_sampah()  {
		$where = array(
			'state' => 'tidak'
		);	
		$data['data'] = $this->M_barang_faktur->get_data('barang_faktur',$where);
		$this->load->view('back_end/table_content_sampah',$data);
	}


//prosess add
	function add_p()  {
		
		$data = array(
			'kode_barang' => $_POST['kode_barang'],
		'nama_barang_faktur' => $_POST['nama_barang_faktur'],
		'kode_plu' => $_POST['kode_plu']
		
			);	
	

	
	$respone  = array(
			'respone' => '200',
			'data' => 'Data Tersimpan!'
		);

	  $insert = $this->M_barang_faktur->input_data($data,'barang_faktur');
	

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
			'kode_barang' => $_POST['kode_barang'],
		'nama_barang_faktur' => $_POST['nama_barang_faktur'],
		'kode_plu' => $_POST['kode_plu']
		
			);	
	

	//cek before
	$where = array(
		'id_barang_faktur' => $_POST['id_barang_faktur']
	);

	
		$respone  = array(
			'respone' => '200',
			'data' => 'Data Tersimpan!'
		);

	  $insert = $this->M_barang_faktur->edit_data($where,$data,'barang_faktur');


	header('Content-Type: application/json');
	echo json_encode($respone);

	


	
	}
//proses hapus
	function hapus()  {

		$where = array(
			'id_barang_faktur' => $_POST['id'],
		);
		$data = array(
			'state' => 'tidak',
	
		);


		 $this->M_barang_faktur->edit_data($where,$data,'barang_faktur');
		
	}


//proses restore
function restore()  {

	$where = array(
		'id_barang_faktur' => $_POST['id'],
	);
	$data = array(
		'state' => 'aktif',

	);


	 $this->M_barang_faktur->edit_data($where,$data,'barang_faktur');
	
}



}