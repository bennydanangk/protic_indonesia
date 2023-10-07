<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class faktur extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model("M_faktur"); //load model
		if($this->session->userdata('status') != "login"){
			redirect(base_url("auth"));
		}
    }


	public function index()
	{
	
		$data['conf'] = $this->M_faktur->config();
		$data['nama_user'] = $this->session->userdata('nama_user');
		$data['nama_menu'] = 'Faktur';
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
			'faktur.state' => 'aktif'
		);	
		$data['data'] = $this->M_faktur->get_data('faktur',$where);
		$this->load->view('back_end/d_content',$data);
		// echo json_encode($data);
	}


//get form add
	function add()  {
		$where = array(
			'state' => 'aktif'
		);	
		$data['distributor'] = $this->M_faktur->get_aps('distributor',$where);
		$data['sumber_dana'] = $this->M_faktur->get_aps('sumber_dana',$where);
		$this->load->view('back_end/add_content',$data);
	}

	//get form edit
	function edit($id)  {
		$where = array(
			'id_faktur' => $id,
			'faktur.state' => 'aktif'
		);	
		
		$wheres = array(
			'state' => 'aktif'
		);	
		$data['distributor'] = $this->M_faktur->get_aps('distributor',$wheres);
		$data['sumber_dana'] = $this->M_faktur->get_aps('sumber_dana',$wheres);


		$data['faktur'] = $this->M_faktur->get_data('faktur',$where);
	
		$this->load->view('back_end/edit_content',$data);
	}
//get Content table
	function content()  {
		$where = array(
			'faktur.state' => 'aktif'
		);	
		$data['data'] = $this->M_faktur->get_data('faktur',$where);
		$this->load->view('back_end/table_content',$data);
	}

//restore		
	function data_sampah()  {
		$where = array(
			'faktur.state' => 'tidak'
		);		
		$data['data'] = $this->M_faktur->get_data('faktur',$where);
		$this->load->view('back_end/table_content_sampah',$data);
	}


//prosess add
	function add_p()  {
		$id = $this->session->userdata('id_user');
		$data = array(
		'nomor_faktur' => $_POST['nomor_faktur'],
		'id_distributor' => $_POST['id_distributor'],
		'id_sumber_dana' => $_POST['id_sumber_dana'],
		'id_user' => $id,
		'catatan' => $_POST['catatan'],
		'tgl_faktur' => $_POST['tgl_faktur'],
		'tgl_input' => date('Y-m-d H:i:s')
	
			);	
	

	
	$respone  = array(
			'respone' => '200',
			'data' => 'Data Tersimpan!'
		);

	  $insert = $this->M_faktur->input_data($data,'faktur');
	

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
	
		$id = $this->session->userdata('id_user');
		$data = array(
		'nomor_faktur' => $_POST['nomor_faktur'],
		'id_distributor' => $_POST['id_distributor'],
		'id_sumber_dana' => $_POST['id_sumber_dana'],
		'id_user' => $id,
		'catatan' => $_POST['catatan'],
		'tgl_faktur' => $_POST['tgl_faktur'],
		'tgl_input' => date('Y-m-d H:i:s')
	
			);	
	
			
	//cek before
	$where = array(
		'id_faktur' => $_POST['id_faktur']
	);

	
		$respone  = array(
			'respone' => '200',
			'data' => 'Data Tersimpan!'
		);

	  $insert = $this->M_faktur->edit_data($where,$data,'faktur');


	header('Content-Type: application/json');
	echo json_encode($respone);

	


	
	}
//proses hapus
	function hapus()  {

		$where = array(
			'id_faktur' => $_POST['id'],
		);
		$data = array(
			'state' => 'tidak',
	
		);


		 $this->M_faktur->edit_data($where,$data,'faktur');
		
	}


//proses restore
function restore()  {

	$where = array(
		'id_faktur' => $_POST['id'],
	);
	$data = array(
		'state' => 'aktif',

	);


	 $this->M_faktur->edit_data($where,$data,'faktur');
	
}

function add_item($id) {

$data['id_faktur'] = $id;
	$where = array(
		'state' => 'aktif'
	);	
	$data['barang_faktur'] = $this->M_faktur->get_aps('barang_faktur',$where);
	$data['satuan'] = $this->M_faktur->get_aps('satuan',$where);
	$this->load->view('back_end/add_item',$data);
}

function content_item($id)  {
	$where = array(
		'item_faktur.state' => 'aktif',
		'item_faktur.id_faktur' => $id
	);	
	$data['data'] = $this->M_faktur->get_data_item('item_faktur',$where);
	$this->load->view('back_end/table_content_item',$data);
}


//prosess add
function add_item_p()  {
	$id = $this->session->userdata('id_user');
$qty = $_POST['qty'];
$disc = $_POST['disc'];
$pajak = $_POST['pajak'];
$harga = $_POST['harga'];

$sub_total =($qty * $harga)+ ($qty * $harga * $pajak/100) - ($qty * $harga * $disc/100);
	$data = array(
	'id_faktur' => $_POST['id_faktur'],
	'id_barang_faktur' => $_POST['id_barang_faktur'],
	'qty' => $_POST['qty'],
	'id_satuan' => $_POST['id_satuan'],
	'ed' => $_POST['ed'],
	'harga' => $_POST['harga'],
	'disc' => $_POST['disc'],
	'pajak' => $_POST['pajak'],
	'tgl_input' => date('Y-m-d H:i:s'),
	'id_user' => $id,
	'sub_total' => $sub_total,

		);	

		// print_r($data);


$respone  = array(
		'respone' => '200',
		'data' => 'Data Tersimpan!'
	);

  $insert = $this->M_faktur->input_data($data,'item_faktur');


header('Content-Type: application/json');
echo json_encode($respone);





}


function hapus_item()  {

	$where = array(
		'id_item_faktur' => $_POST['id'],
	);
	$data = array(
		'state' => 'tidak',

	);


	 $this->M_faktur->edit_data($where,$data,'item_faktur');
	
}

function count_item_faktur($id_faktur)  {
	$where = array(
		'id_faktur' => $id_faktur,
		'state' => 'aktif'

	);

	$data = $this->M_faktur->get_cek('item_faktur',$where)->num_rows();
	// echo '<span class="badge badge-light">'.$data.'</span>';
	// return $data;

	$respone  = array(
		'respone' => '200',
		'data' => $data
	);

header('Content-Type: application/json');
echo json_encode($respone);


}




}