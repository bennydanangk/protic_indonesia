<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class transaksi_faktur extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model("M_transaksi_faktur"); //load model
		if($this->session->userdata('status') != "login"){
			redirect(base_url("auth"));
		}
    }


	public function index()
	{
	
		$data['conf'] = $this->M_transaksi_faktur->config();
		$data['nama_user'] = $this->session->userdata('nama_user');
		$data['nama_menu'] = 'Transaksi BHP';
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
		$data['data'] = $this->M_transaksi_faktur->get_data('barang_faktur',$where);
		$this->load->view('back_end/d_content',$data);
		// echo json_encode($data);
	}


//get form add
	function add()  {
		$where = array(
			'state' => 'aktif'
		);	
		$data['user'] = $this->M_transaksi_faktur->get_transaksi_faktur('user',$where);
		$data['barang_faktur'] = $this->M_transaksi_faktur->get_transaksi_faktur('barang_faktur',$where);
		$data['ruang'] = $this->M_transaksi_faktur->get_transaksi_faktur('ruang',$where);

		$this->load->view('back_end/add_content',$data);
	}

	//get form edit
	function edit($id)  {
		$where = array(
			'id_transaksi_faktur' => $id,
			'state' => 'aktif'
		);	
		
		$data['transaksi_faktur'] = $this->M_transaksi_faktur->get_transaksi_faktur('',$where);
	
		$this->load->view('back_end/edit_content',$data);
	}
//get Content table
	function content($kode_transaksi)  {
		$where = array(
			'barang_bhp_keluar.state' => 'aktif',
			'barang_bhp_keluar.kode_transaksi' => $kode_transaksi
		);	
		$data['data'] = $this->M_transaksi_faktur->get_barang_bhp_keluar('barang_bhp_keluar',$where)->result();
		$this->load->view('back_end/table_content',$data);
		// print_r($data);
	}



	//get Content table
	function content_transaksi($tgl_awal,$tgl_akhir)  {
		$tgl_awal = $tgl_awal.' 00:00:00';
		$tgl_akhir = $tgl_akhir.' 23:59:59';
		$where = array(
			'barang_bhp_keluar.state' => 'aktif',
			'barang_bhp_keluar.tgl_input  >= ' => $tgl_awal,
			'barang_bhp_keluar.tgl_input  <= ' => $tgl_akhir,
		);	
		$data['data'] = $this->M_transaksi_faktur->get_barang_bhp_keluar('barang_bhp_keluar',$where)->result();
		$this->load->view('back_end/table_content',$data);
		// print_r($data);
	}




//restore		
	function data_sampah()  {
		$where = array(
			'state' => 'tidak'
		);	
		$data['data'] = $this->M_transaksi_faktur->get_data('transaksi_faktur',$where);
		$this->load->view('back_end/table_content_sampah',$data);
	}


//prosess add
	function add_p()  {
		
		$data = array(
		'kode_transaksi' => $_POST['kode_transaksi'],
		'id_user' => $_POST['id_user'],
		'id_barang_faktur' => $_POST['id_barang_faktur'],
		'id_ruang' => $_POST['id_ruang'],
		'qty' => $_POST['qty'],
		'id_user_input' => $this->session->userdata('id_user'),
		'tgl_input' => date('Y-m-d H:i:s'),
		
			);	
	
	$respone  = array(
			'respone' => '200',
			'data' => 'Data Tersimpan!'
			
		);

	  $insert = $this->M_transaksi_faktur->input_data($data,'barang_bhp_keluar');
	

	header('Content-Type: application/json');
	echo json_encode($respone);

	// print_r($data);


	
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
		'nama_transaksi_faktur' => $_POST['nama_transaksi_faktur'],
	);	
	//cek before
	$where = array(
		'id_transaksi_faktur' => $_POST['id_transaksi_faktur']
	);

	
		$respone  = array(
			'respone' => '200',
			'data' => 'Data Tersimpan!'
		);

	  $insert = $this->M_transaksi_faktur->edit_data($where,$data,'transaksi_faktur');


	header('Content-Type: application/json');
	echo json_encode($respone);

	


	
	}
//proses hapus
	function hapus()  {

		$where = array(
			'id_barang_keluar' => $_POST['id'],
		);
		
		 $this->M_transaksi_faktur->hapus_data($where,'barang_bhp_keluar');
		
	}


//proses restore
function restore()  {

	$where = array(
		'id_transaksi_faktur' => $_POST['id'],
	);
	$data = array(
		'state' => 'aktif',

	);


	 $this->M_transaksi_faktur->edit_data($where,$data,'transaksi_faktur');
	
}


function cek_stok(){
	$id_barang = $_POST['id_barang_faktur'];
	$where_stok_masuk = array(
		'barang_faktur.state' => 'aktif',
		'barang_faktur.id_barang_faktur' => $id_barang
	);	
	$stok_masuk = $this->M_transaksi_faktur->stok_barang_masuk('barang_faktur',$where_stok_masuk)->result();



	$where_stok_keluar = array(
		'barang_bhp_keluar.state' => 'aktif',
		'barang_bhp_keluar.id_barang_faktur' => $id_barang
	);	
	$stok_keluar = $this->M_transaksi_faktur->stok_barang_keluar('barang_bhp_keluar',$where_stok_keluar)->result();



$total = ($stok_masuk[0]->total)- ($stok_keluar[0]->total);

	$respone  = array(
		'respone' => '200',
		'data' => $total
	);

	header('Content-Type: application/json');
	echo json_encode($respone);

	// echo json_encode($stok_masuk[0]);
}


}