<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Information extends CI_Controller {
	public $mdl_grp		= 'Information';

	function __construct() {
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		// $this->load->library('Xmpp');
		// $xmppPrebind = new XmppPrebind('AXIOO-PC', 'http://axioo-pc:7070/http-bind/', 'conversejs', false, false);
	}

	public function index()
	{
		// if ( !$this->ion_auth->logged_in() ) 
		// 	redirect('auth/login', 'refresh');

		// SET LAST URL
		// $last_url = $this->session->userdata('last_url'); 
		// if ( empty($last_url) )
		// 	$this->session->set_userdata(array('last_url'=>"dashboard/home"));

		// $data['menus'] = $this->systems_model->getGroups_Auth_ByGroupId( explode(",", sesUser()->u_groups) );
		// $data['is_form'] = 0;
		// $this->load->view('dashboard/home', $data);

		$this->home_lib->go('home','contact');
	}

	public function about( $username=NULL, $pwd=NULL ) {
		$mdl = 'about';		
		$this->home_lib->go($this->mdl_grp, $mdl);
	}
}
