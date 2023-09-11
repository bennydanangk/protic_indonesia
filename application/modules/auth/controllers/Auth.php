<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->load->library('enc'); 
        $this->load->model("M_auth"); //load model m auth
    }


	public function index()
	{
		$cek = $this->session->userdata('status');
	
		
		if($this->session->userdata('status') != "login"){
			$data['conf'] = $this->M_auth->config();
		$this->load->view('login',$data);
		}else{
			redirect(base_url("dashboard"));
		}
		
		
	
	}

	function login() {
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$url ='';
		$message ='';
		$role = '';
		$status = '';
		$x_token = '';
		$id_user ='';


		$where = array(
			'username' => $username
			);
			
			  $cek = $this->M_auth->cek_login("user",$where)->num_rows();
			 
			if ($cek > 0){
				$where = array(
					'username' => $username
					);
			
				$auth = $this->M_auth->cek_login("user",$where)->result();
				$pass = $this->enc->out($auth[0]->password);
			
				if($password == $pass && $auth[0]->state =="aktif" ){
					// echo "sukses";
					$message = 'Berhasil, Login!';
					$url = base_url('dashboard');
					$status = 'login';
					$x_token = date('Y-m-d').'_'.$username;
					$x_token = $this->enc->in($x_token);
					// Get Rule 
					$where = array(
						'username' => $username
						);
					$auth = $this->M_auth->cek_login("user",$where)->result();
			

									$session = array(
										'url' => $url,
										'message' => $message,
										'role' => $role,
										'status' => $status,
										'x_token' => $x_token,
										'ip' => $this->enc->get_client_ip(),
										'mac' => $MAC = exec('getmac'),
										'id_user' => $auth[0]->id_user,
										'nama_user' => $auth[0]->username
									);
							
							
							$log = array(
							
								'date' => date("Y-m-d H:i:s"),
								'log' => $this->enc->in(json_encode($session))
							
							);

							$this->M_auth->input_data($log,'log');
							$this->session->set_userdata($session);


				}else{
					$message = 'Username & Password Salah!';
					$url = base_url('auth');
					$status = 'logout';
				}


			}else{
				$message = 'Username & Password Salah!';
				$url = base_url('auth');
				$status = 'logout';
			}

		$output = array(
			'url' => $url,
			'message' => $message,
			'role' => $role,
			'status' => $status,
		
		);

	
echo json_encode($output);

	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('auth'));
	}

	function get_def() {
		$cek = $pass = $this->enc->in('12345678');
		print_r($cek);
	}
}
