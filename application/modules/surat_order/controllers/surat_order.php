<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_order extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->load->library('enc'); 
        $this->load->model("M_surat_order"); //load model m user

		if($this->session->userdata('status') != "login"){
			redirect(base_url("auth"));
		}
    }


	public function index()
	{
		//set .inv
		$id_menu = 1;
		$data['nama_menu'] = 'Surat order';
		$this->cek_hak_akses($id_menu);
		$set = $this->M_surat_order->config();
		$data['nama_aplikasi'] = $set[0]->nama_vendor;
		$data['token'] = $this->session->userdata('id_hak_akses');
		$data['nama_user'] = $this->session->userdata('nama_user');
		$data['menu'] = $this->get_menu($this->session->userdata('id_hak_akses'));
		
		$this->load->view('backend/a_header',$data);
		$this->load->view('backend/b_main',$data);
		$this->load->view('backend/c_footer',$data);
		
	}


//Menu Function
	public function get_menu($id_hak_akses)
	{
				
		$id_hak_akses =$id_hak_akses;
		$id_hak_akses = $this->enc->out($id_hak_akses);
			$where_parent = array(
			'id_hak_akses' => $id_hak_akses,
			'status_role' => 'aktif',
			'state_orgin' => 'parent'

		);
		$menu_parent = $this->M_surat_order->get_parent('role_tabel',$where_parent)->result();
		$menu = '';

		foreach ($menu_parent as $k) {
		$menu .= '<li>';
		$menu .='<a href="#"><i class="'.$k->icon.'"></i> <span>'.$k->nama_menu.'</span></a>';
		$menu .='<ul>';

	
		$where_child = array(
			'id_hak_akses' => $id_hak_akses,
			'status_role' => 'aktif',
			'state_orgin' => 'child',
			'id_parent' => $k->id_menu

		);
			$menu_child = $this->M_surat_order->get_parent('role_tabel',$where_child)->result();
			foreach ($menu_child as $y) {
				$menu .=	'<li><a href="'.base_url($y->link).'">'.$y->nama_menu.'</a></li>';
			}

			$menu .='</ul>';
			$menu .='</li>';
				
			}

			return $menu;

					
	}
//end Menu 

//hak akses
function cek_hak_akses($id_menu)  {
	$id_menu =$id_menu;

	$id_hak_akses = $this->enc->out($this->session->userdata('id_hak_akses'));
		$where = array(
		'id_hak_akses' => $id_hak_akses,
		'status_role' => 'aktif',
		'role_tabel.id_menu' => $id_menu

	);

	$menu_cek = $this->M_surat_order->get_parent('role_tabel',$where)->num_rows();

	if($menu_cek > 0 ){

	}else{
		redirect(base_url('auth/logout'));
	}
	
}
//end hak akses


function tabel_content($tgl_awal, $tgl_akhir,){

	$where = array(
		't_surat_order.state' => 'aktif',
		't_surat_order.tgl_input >= ' => $tgl_awal.' 00:00:00',
		't_surat_order.tgl_input <= ' => $tgl_akhir.' 23:59:59'
	);

	$data['data'] = $this->M_surat_order->ambil_surat_order('t_surat_order',$where)->result();
	$this->load->view('backend/page/tabel',$data);
	
}

function tabel_sampah(){

	$where = array(
		't_surat_order.state' => 'tidak'
	);

	$data['data'] = $this->M_surat_order->ambil_surat_order('t_surat_order',$where)->result();

	$this->load->view('backend/page/tabel_sampah',$data);
	
}


//===========ADD 
function form_add() {
	$data['nama_menu'] = 'data barang';
	$where = array(
		'state'=> 'aktif'
	);

	$kode_ = '/SPO/PROTIC/'.date('m/Y');
	$data['nomor_surat'] = $this->M_surat_order->CreateCode($kode_);
	$data['customer'] = $this->M_surat_order->cek_where('t_customer',$where)->result();
	// $data['satuan'] = $this->M_surat_order->cek_where('t_satuan',$where)->result();
	// $data['kategori'] = $this->M_surat_order->cek_where('t_kategori',$where)->result();


	$this->load->view('backend/page/from_add',$data);
}

function p_add() {

	$data = array(
		'nomor_surat' => $_POST['nomor_surat'],
		'id_customer' => $_POST['id_customer'],
		'tgl_surat' => $_POST['tgl_surat'],
		'catatan' => $_POST['catatan'],
		'ppn' => $_POST['ppn'],
		'state' => 'aktif',
		'flag' => 'input',
		'id_user_input' => $this->session->userdata('id_user'),
		'tgl_input'=> date('Y-m-d H:i:s'),	
	);

	$barcode = $_POST['nomor_surat'];
	$barcode = strtr( $barcode, "/", "_" );
	$this->qrcode($barcode);
	$this->M_surat_order->insert('t_surat_order',$data);
}

//============= END ADD==

//============EDIT
function form_edit($id) {
	$id= $id;
	$data['nama_menu'] = 'Edit Data Barang';

	$where_ = array(
		'state'=> 'aktif'
	);

	$data['customer'] = $this->M_surat_order->cek_where('t_customer',$where_)->result();


	
	$where = array(
		't_surat_order.state'=> 'aktif',
		'id_surat_order' => $id
	);

	$data['data'] = $this->M_surat_order->ambil_surat_order('t_surat_order',$where)->result();

	// print_r($data);
	$this->load->view('backend/page/from_edit',$data);
}

function p_edit() {
	$id = $_POST['id'];

	$data = array(
		'nomor_surat' => $_POST['nomor_surat'],
		'id_customer' => $_POST['id_customer'],
		'tgl_surat' => $_POST['tgl_surat'],
		'catatan' => $_POST['catatan'],
		'ppn' => $_POST['ppn'],
		'state' => 'aktif',
		'flag' => 'input',
		'id_user_input' => $this->session->userdata('id_user'),
		'tgl_input'=> date('Y-m-d H:i:s'),	
	);


	$where = array(
		'id_surat_order' => $id
	);

	$this->M_surat_order->update_data($where,$data,'t_surat_order');
}


//=====================END EDIT
//================== Delete
function p_delete() {
	$id = $_POST['id'];
	$data = array(
		'state' => 'tidak',
		
	);
	$where = array(
		'id_surat_order' => $id
	);

	$this->M_surat_order->update_data($where,$data,'t_surat_order');
	$this->M_surat_order->update_data($where,$data,'item_surat_order');

}

//=====================END Delete

//================== Delete
function p_restore() {
	$id = $_POST['id'];
	$data = array(
		'state' => 'aktif',
		
	);
	$where = array(
		'id_surat_order' => $id
	);

	$this->M_surat_order->update_data($where,$data,'t_surat_order');

	$this->M_surat_order->update_data($where,$data,'item_surat_order');

}
//=====================END Delete


//================== Delete Permanent
function p_delete_permanen() {
	$id = $_POST['id'];
	
	$where = array(
		'id_surat_order' => $id,
		'state' => 'tidak'
	);

	$where_item = array(
		'id_surat_order' => $id,
		// 'state' => 'tidak'
	);

	$this->M_surat_order->delete_data('t_surat_order',$where);
	$this->M_surat_order->delete_data('item_surat_order',$where_item);
}

//=====================END Delete Permanen


function kode_barang()  {

	$kode_ = 'KD';
	$kode_barang = $this->M_surat_order->CreateCode($kode_);
    echo $kode_barang; 
}

function get_detail($id)  {

	$id= $id;
	$data['nama_menu'] = 'Detail Data Barang';


	$where = array(
		't_surat_order.state'=> 'aktif',
		'id_surat_order' => $id
	);

	$data['data'] = $this->M_surat_order->ambil_barang('t_surat_order',$where)->result();

	// print_r($data);
	$this->load->view('backend/page/detail',$data);

	
}

//tabel surat_order
function open_tabel_item($id)  {

	$where = array(
		'state' => 'aktif',
		'id_surat_order' => $id
	);

	$data['item'] = $this->M_surat_order->cek_where('item_surat_order',$where)->result();

}


function open_item($id) {

	
	$id= $id;

	$data['id_surat_order'] = $id;
	$data['nama_menu'] = 'Item surat_order';

		$where = array(
		'state' => 'aktif',
		// 'flag' => 'input',
		'id_surat_order' => $id
	);


	$where_barang = array(
		'state' => 'aktif',
		);
	
	$data['surat_order'] = $this->M_surat_order->cek_where('t_surat_order',$where)->result();
	$data['data_barang'] = $this->M_surat_order->cek_where('data_barang',$where_barang)->result();
	$data['satuan'] = $this->M_surat_order->cek_where('t_satuan',$where_barang)->result();


	$this->load->view('backend/page/from_add_item',$data);
}

//=========== ADD Item _surat_order


function p_add_item() {

	$data = array(
		'id_surat_order' => $_POST['id_surat_order'],
		'id_barang' => $_POST['id_barang'],
		// 'id_distributor' => $_POST['id_distributor'],
		// 'id_satuan' => $_POST['id_satuan'],
		'qty' => $_POST['qty'],
		// 'disc' => $_POST['disc'],
		// 'pajak' => $_POST['pajak'],
		'harga' => $_POST['harga'],
		'jumlah' => $_POST['jumlah'],
		'ppn' => $_POST['ppn'],
		'plus_minus' => $_POST['plus_minus'],
		'state' => 'aktif',
		'id_user_input' => $this->session->userdata('id_user'),
		'tgl_input'=> date('Y-m-d H:i:s'),	
	);

	$this->M_surat_order->insert('item_surat_order',$data);
}

// get item list


function tabel_list($id_surat_order){
	$data['id_surat_order'] = $id_surat_order;
	$where = array(
		'item_surat_order.state' => 'aktif',
		'item_surat_order.id_surat_order' => $id_surat_order,
		
	);

	$data['data'] = $this->M_surat_order->ambil_item_surat_order('item_surat_order',$where)->result();
	$this->load->view('backend/page/tabel_list',$data);
	
}


//================== Delete Permanent
function p_delete_item() {
	$id = $_POST['id'];
	
	$where = array(
		'id_item_surat_order' => $id,
		// 'state' => 'tidak'
	);

	$this->M_surat_order->delete_data('item_surat_order',$where);
}

//=====================END Delete Permanen


function get_barang($id) {
	
	$where = array(
		'id_barang' => $id,
		'state' => 'aktif'
	);


	$data = $this->M_surat_order->cek_where('data_barang',$where)->result();
	echo json_encode($data[0]);


	
}


function qrcode($kode){
	// $id_barang = 'BR00001';

	$this->load->library('enc');
	$kode_barang = $this->enc->in($kode);


	$this->load->library('Ciqrcode'); //pemanggilan library QR CODE

			$config['cacheable']    = true; //boolean, the default is true
			$config['cachedir']             = './assets/'; //string, the default is application/cache/
			$config['errorlog']             = './assets/'; //string, the default is application/logs/
			$config['imagedir']             = './assets/qr/'; //direktori penyimpanan qr code
			$config['quality']              = true; //boolean, the default is true
			$config['size']                 = '1024'; //interger, the default is 1024
			$config['black']                = array(224,255,255); // array, default is array(255,255,255)
			$config['white']                = array(70,130,180); // array, default is array(0,0,0)
			$this->ciqrcode->initialize($config);

			$image_name=$kode.'.png'; //buat name dari qr code sesuai dengan nim

			$params['data'] = $kode; //data yang akan di jadikan QR CODE
			$params['level'] = 'H'; //H=High
			$params['size'] = 10;
			$params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
			$this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
}



function cetak_dokumen($id) {



	$data['id_surat_order'] = $id;
	$where = array(
		'item_surat_order.state' => 'aktif',
		'item_surat_order.id_surat_order' => $id,
		
	);

	$data['data'] = $this->M_surat_order->ambil_item_surat_order('item_surat_order',$where)->result();


	$where_ = array(
		't_surat_order.state'=> 'aktif',
		'id_surat_order' => $id
	);

	$data['data_surat'] = $this->M_surat_order->ambil_surat_order('t_surat_order',$where_)->result();



	$data['conf'] = $this->M_surat_order->config();
	$this->load->library('pdfgenerator');
	$data['title'] = "Surat order";
	$file_pdf = $data['title'];
	$paper = 'A4';
	// $paper = array(0,0,125,250);
	$orientation = "portaid";
	$html = $this->load->view('backend/page/surat_order', $data, true);
	$this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
	// $this->load->view('backend/page/surat_order', $data);

}






}
