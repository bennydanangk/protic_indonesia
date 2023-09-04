<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Rest_api extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model("M_rest_api"); //load model mahasiswa
    }


	public function index()
	{
	
	echo "Welcome API App Create By Benny Danang Kurniawan";
	echo " </br> <hr> 
	a. Menu Bar Login {base url}/set_menu 
	";

	
	}

	function set_menu()  {
		$id = $this->session->userdata('id_user');
		$where = array(
			'menu_manajemen.hirarce' => 'parent',
			'role_user.state' => 'aktif',
			'menu_manajemen.state' => 'aktif',
			'role_user.id_user' => $id
		);
		$menu_item = $this->M_rest_api->get_where('menu_manajemen',$where);


	$data ='';
		
		foreach ($menu_item as $k) {

			$data .= ' <li class="nav-item">
			<a href="#" class="nav-link">
            <i class="nav-icon '.$k->icon.'"></i>
              <p>
                '.$k->nama_menu.'
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">';

            $data .=  $this->set_menu_child($k->id_menu);
            
            $data .=  '</ul>
          </li>';

		 
		}
		echo $data;
	
	}



function set_menu_child($id_parent)  {
	$where = array(
		'menu_manajemen.hirarce' => 'child',
		'role_user.state' => 'aktif',
		'id_parent' => $id_parent
	);
	$menu_item = $this->M_rest_api->get_where('menu_manajemen',$where);

	$data ='';
	
	foreach ($menu_item as $k) {
		$data .= '<li class="nav-item"> <a href="'.base_url($k->link).'" class="nav-link"> <i class="far fa-circle nav-icon"></i> <p>'.$k->nama_menu.'</p> </a> </li>';
	}
	return $data;

	
}
	

}
