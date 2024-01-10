<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tagihan extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->load->library('enc'); 
        $this->load->model("M_tagihan"); //load model m user

		if($this->session->userdata('status') != "login"){
			redirect(base_url("auth"));
		}
    }


	public function index()
	{
		//set .inv
		$id_menu = 1;
		$data['nama_menu'] = 'Tagihan Order';
		$this->cek_hak_akses($id_menu);
		$set = $this->M_tagihan->config();
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
		$menu_parent = $this->M_tagihan->get_parent('role_tabel',$where_parent)->result();
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
			$menu_child = $this->M_tagihan->get_parent('role_tabel',$where_child)->result();
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

	$menu_cek = $this->M_tagihan->get_parent('role_tabel',$where)->num_rows();

	if($menu_cek > 0 ){

	}else{
		redirect(base_url('auth/logout'));
	}
	
}
//end hak akses


function tabel_content(){

	$where = array(
		't_surat_order.state' => 'aktif',
		't_surat_order.flag' => 'terkirim'
	
	);

	$data['data'] = $this->M_tagihan->ambil_surat_order('t_surat_order',$where)->result();
	$this->load->view('backend/page/tabel',$data);
	
}


//===========ADD 
function form_add() {
	$data['nama_menu'] = 'data barang';
	$where = array(
		'state'=> 'aktif'
	);

	$kode_ = '/SPO/PROTIC/'.date('m/Y');
	$data['nomor_surat'] = $this->M_tagihan->CreateCode($kode_);
	$data['customer'] = $this->M_tagihan->cek_where('t_customer',$where)->result();
	// $data['satuan'] = $this->M_tagihan->cek_where('t_satuan',$where)->result();
	// $data['kategori'] = $this->M_tagihan->cek_where('t_kategori',$where)->result();


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
	$this->M_tagihan->insert('t_surat_order',$data);
}

//============= END ADD==

//============EDIT
function form_edit($id) {
	$id= $id;
	$data['nama_menu'] = 'Edit Data Barang';

	$where_ = array(
		'state'=> 'aktif'
	);

	$data['customer'] = $this->M_tagihan->cek_where('t_customer',$where_)->result();


	
	$where = array(
		't_surat_order.state'=> 'aktif',
		'id_surat_order' => $id
	);

	$data['data'] = $this->M_tagihan->ambil_surat_order('t_surat_order',$where)->result();

	// print_r($data);
	$this->load->view('backend/page/from_edit',$data);
}







//tabel surat_order
// function open_tabel_item($id)  {

// 	$where = array(
// 		'state' => 'aktif',
// 		'id_surat_order' => $id
// 	);

// 	$data['item'] = $this->M_tagihan->cek_where('iteM_tagihan',$where)->result();

// }


function open_item($id) {

	
	$id= $id;

	$data['id_surat_order'] = $id;
	$data['nama_menu'] = 'Item surat_order';

		$where = array(
		't_surat_order.state' => 'aktif',
		't_surat_order.id_surat_order' => $id
	);


	$where_barang = array(
		'state' => 'aktif',
		);
	
	$data['surat_order'] = $this->M_tagihan->ambil_surat_order_('t_surat_order',$where)->result();

	$da = $this->M_tagihan->ambil_surat_order_('t_surat_order',$where)->result();
	$id_user_input = $da[0]->id_user_input;
	$data['user_input'] = $this->get_pengguna($id_user_input);

	$id_user_gudang = $da[0]->id_user_gudang;
	$data['user_gudang'] = $this->get_pengguna($id_user_gudang);

	$id_user_kurir = $da[0]->id_user_kurir;
	$data['user_kurir'] = $this->get_pengguna($id_user_kurir);

// print_r($data);

	$data['data_barang'] = $this->M_tagihan->cek_where('data_barang',$where_barang)->result();
	$data['satuan'] = $this->M_tagihan->cek_where('t_satuan',$where_barang)->result();


	$this->load->view('backend/page/from_add_item',$data);
}

//=========== ADD Item _surat_order

function get_pengguna($id)  {
	$where = array(
		'id_user' => $id
	);
	$data = $this->M_tagihan->cek_where('t_user',$where)->result();

	$x = $data[0]->nama_user;
	return $x;
}

function tabel_list($id_surat_order){
	$data['id_surat_order'] = $id_surat_order;
	$where = array(
		'item_surat_order.state' => 'aktif',
		'item_surat_order.id_surat_order' => $id_surat_order,
		
	);

	$data['data'] = $this->M_tagihan->ambil_item_surat_order('item_surat_order',$where)->result();
	$this->load->view('backend/page/tabel_list',$data);
	
}




function get_barang($id) {
	
	$where = array(
		'id_barang' => $id,
		'state' => 'aktif'
	);


	$data = $this->M_tagihan->cek_where('data_barang',$where)->result();
	echo json_encode($data[0]);


	
}




function cetak_dokumen($id) {



	$data['id_surat_order'] = $id;
	$where = array(
		'iteM_tagihan.state' => 'aktif',
		'iteM_tagihan.id_surat_order' => $id,
		
	);

	$data['data'] = $this->M_tagihan->ambil_iteM_tagihan('iteM_tagihan',$where)->result();


	$where_ = array(
		't_surat_order.state'=> 'aktif',
		'id_surat_order' => $id
	);

	$data['data_surat'] = $this->M_tagihan->ambil_surat_order('t_surat_order',$where_)->result();



	$data['conf'] = $this->M_tagihan->config();
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




function p_aprove() {
	$id = $_POST['id'];

	$data = array(
		'flag' => 'terkirim',
		'id_user_input' => $this->session->userdata('id_user'),	
	);


	$where = array(
		'id_surat_order' => $id
	);

	$this->M_tagihan->update_data($where,$data,'t_surat_order');
	$this->M_tagihan->update_data($where,$data,'item_surat_order');


	$data_flag = array(
		'id_surat_order' => $id,
		'id_user' => $this->session->userdata('id_user'),	
		'nama_flag' => 'terkirim_konsumen',
		'date_create' => date('Y-m-d H:i:s')

	);
	$this->M_tagihan->insert('flag',$data_flag);



}



function p_cancel() {
	$id = $_POST['id'];

	$data = array(
		'flag' => 'input',
		'id_user_input' => $this->session->userdata('id_user'),	
	);


	$where = array(
		'id_surat_order' => $id
	);


	$data_flag = array(
		'id_surat_order' => $id,
		'id_user' => $this->session->userdata('id_user'),	
		'nama_flag' => 'ditolak_permintaan',
		'date_create' => date('Y-m-d H:i:s')

	);
	$this->M_tagihan->insert('flag',$data_flag);


	

	$this->M_tagihan->update_data($where,$data,'t_surat_order');
}





}
