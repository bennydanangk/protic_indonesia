<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model("M_barang"); //load model
		if($this->session->userdata('status') != "login"){
			redirect(base_url("auth"));
		}
    }


	public function index()
	{
	
		$data['conf'] = $this->M_barang->config();
		$data['nama_user'] = $this->session->userdata('nama_user');
		$data['nama_menu'] = 'Barang Inv';
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
			'state' => 'aktif'
		);	
		$data['data'] = $this->M_barang->get_data('ruang',$where);
		$this->load->view('back_end/d_content',$data);
		// echo json_encode($data);
	}


//get form add
	function add()  {
		$where = array(
			'state' => 'aktif'
		);	
		$data['perolehan'] = $this->M_barang->get_ruang('perolehan',$where);
		$data['jenis'] = $this->M_barang->get_ruang('jenis',$where);
		$data['sumber_dana'] = $this->M_barang->get_ruang('sumber_dana',$where);
		$data['distributor'] = $this->M_barang->get_ruang('distributor',$where);
		$data['satuan'] = $this->M_barang->get_ruang('satuan',$where);
		$data['id_user'] =  $this->session->userdata('id_user');
		// echo "<pre>";
		// print_r($data);
		// echo "</pre>";

		$data['kode_id_barang'] = $this->M_barang->cekkodebarang();
		$this->load->view('back_end/add_content',$data);
	}

	//get form edit
	function edit($id)  {
		$where = array(
			'id_ruang' => $id,
			'state' => 'aktif'
		);	
		
		$data['ruang'] = $this->M_barang->get_ruang('ruang',$where);
	
		$this->load->view('back_end/edit_content',$data);
	}
//get Content table
	function content()  {
		$where = array(
			'barang.state' => 'aktif'
		);	
		$data['data'] = $this->M_barang->get_barang('barang',$where);
		// echo "<pre>";
		// print_r($data);
		// echo "</pre>";
		$this->load->view('back_end/table_content',$data);
	}

//restore		
	function data_sampah()  {
		$where = array(
			'barang.state' => 'tidak'
		);	
		$data['data'] = $this->M_barang->get_data('ruang',$where);
		$this->load->view('back_end/table_content_sampah',$data);
	}


//prosess add
	function add_p()  {
		
		

		
		$data = array(
		'kode_id_barang' => $_POST['kode_id_barang'],
		'kode_barang' => $_POST['kode_barang'],
		'kode_lokasi' => $_POST['kode_lokasi'],
		'nama_barang' => $_POST['nama_barang'],
		'id_perolehan' => $_POST['id_perolehan'],
		'id_jenis' => $_POST['id_jenis'],
		'id_sumber_dana' => $_POST['id_sumber_dana'],
		'id_distributor' => $_POST['id_distributor'],
		'tahun_pembelian' => $_POST['tahun_pembelian'],
		'harga_perolehan' => $_POST['harga_perolehan'],
		'kondisi_barang' => $_POST['kondisi_barang'],
		'jumlah' => $_POST['jumlah'],
		'id_satuan' => $_POST['id_satuan'],
		'id_user' => $_POST['id_user'],
		'keterangan' => $_POST['ket'],
		'tgl_input' => date('Y-m-d H:i:s'),
		'state' => 'aktif'
			);	
		
			// print_r($data);

	$respone  = array(
			'respone' => '200',
			'data' => 'Data Tersimpan!'
		);

	  $insert = $this->M_barang->input_data($data,'barang');
	

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
		'nama_ruangan' => $_POST['nama_ruangan'],
	);	
	//cek before
	$where = array(
		'id_ruang' => $_POST['id_ruang']
	);

	
		$respone  = array(
			'respone' => '200',
			'data' => 'Data Tersimpan!'
		);

	  $insert = $this->M_barang->edit_data($where,$data,'ruang');


	header('Content-Type: application/json');
	echo json_encode($respone);

	


	
	}
//proses hapus
	function hapus()  {

		$where = array(
			'id_ruang' => $_POST['id'],
		);
		$data = array(
			'state' => 'tidak',
	
		);


		 $this->M_barang->edit_data($where,$data,'ruang');
		
	}


//proses restore
function restore()  {

	$where = array(
		'id_ruang' => $_POST['id'],
	);
	$data = array(
		'state' => 'aktif',

	);


	 $this->M_barang->edit_data($where,$data,'ruang');
	
}



}