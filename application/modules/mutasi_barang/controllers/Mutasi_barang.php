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




	//get form mutasi
	function mutasi($id)  {
		$where = array(
			'id_barang' => $id,
			'barang.state' => 'aktif'
		);	
		
		$data['barang'] = $this->M_mutasi_barang->get_barang('barang',$where);
		$wheres = array(
		'state' => 'aktif'
		);
		$data['user'] = $this->M_mutasi_barang->get_data('user',$wheres);
		$data['ruang'] = $this->M_mutasi_barang->get_data('ruang',$wheres);
		$data['status_barang'] = $this->M_mutasi_barang->get_data('status_barang',$wheres);
		// print_r($data);
		$this->load->view('back_end/mutasi_content',$data);
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
		
$id_user = $this->session->userdata('id_user');
$data = array(
	'id_barang' => $_POST['id_barang'],
	'id_user' => $id_user,
	'id_user_mutasi' => $_POST['id_user_mutasi'],
	'id_ruang' => $_POST['id_ruang'],
	'id_status_barang' => $_POST['id_status_barang'],
	'keterangan' => $_POST['keterangan'],
	'state' => 'aktif',
	'tanggal_input_mutasi' => date('d-m-Y H:i:s')
);


	
	$respone  = array(
			'respone' => '200',
			'data' => 'Data Tersimpan!'
		);

	  $insert = $this->M_mutasi_barang->input_data($data,'posisi_barang');
	

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



function menu_bar() {
	$this->load->view('back_end/menu_bar');
}


function content_barang()  {
	$where = array(
		'barang.state' => 'aktif'
	);	
	$data['data'] = $this->M_mutasi_barang->get_barang('barang',$where);
	$this->load->view('back_end/table_content_barang',$data);
}

  
}