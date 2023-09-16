<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Config extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model("M_Config"); //load model mahasiswa
		if($this->session->userdata('status') != "login"){
			redirect(base_url("auth"));
		}
    }


	public function index()
	{
	
	$data['conf'] = $this->M_Config->config();
	$data['nama_user'] = $this->session->userdata('nama_user');
	$data['x_token'] = $this->session->userdata('x_token');
	$data['nama_menu'] = 'Setting Aplikasi';
	$data['data'] = $this->get_content();
	$this->load->view('back_end/a_header',$data);
	$this->load->view('back_end/b_navbar',$data);
	$this->load->view('back_end/c_sidebar',$data);
	$this->load->view('back_end/d_content',$data);
	$this->load->view('back_end/e_footer',$data);
	}


	function get_content() {
		$this->load->library('enc');
		$x_token = $this->session->userdata('x_token');
		$username = $this->session->userdata('nama_user');
		$cek = $this->enc->get_salt($x_token,$username);
		$cek = json_decode($cek);
		$menu ;
		if($cek->data == 'OK' && $cek->code == '200' ){
			$where = array( 'id_config' => 1);
			return $menu['data'] = $this->M_Config->get_data('config',$where);
		} else{
			echo "No";
		}

	}


	function setting()  {
	
		//"alamat":"Jl.Merdeka Timur, Kec. Kemiri, Kab.Boyolali, Prov. Jawa Tengah","email":"dukcapilboyolali@gmail.com"}
		$nama_aplikasi = $_POST['nama_aplikasi'];
		$x_token = $_POST['x_token'];
		$nama_instansi = $_POST['nama_instansi'];
		$no_telp = $_POST['no_telp'];
		$alamat = $_POST['alamat'];
		$email = $_POST['email'];
		$data = array(
			
			'nama_instansi' => $nama_instansi,
			'no_telp' => $no_telp,
			'alamat_instansi' => $alamat,
			'email_instansi' => $email
		);

		$where = array(
			'id_config' => '1'
		);
		echo json_encode($data);
		$this->M_Config->update('config',$data,$where);
	}
	
	

}