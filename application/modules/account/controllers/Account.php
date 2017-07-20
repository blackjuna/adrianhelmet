<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {
	public $mdl_grp		= 'ACCOUNT';

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		// // $this->load->library('session');
		// $this->load->view('header');
		// $this->load->view('topbar');
		// // $this->load->view('slider');
		// $this->load->view('sidebar');
		// $this->load->view('vcontact');
		// $this->load->view('bottombar');
		// $this->load->view('js');
		// $this->load->view('footer');
	}

	public function personal( $username=NULL, $pwd=NULL ) {
		$mdl = 'personal';		
		if ( !$this->ion_auth->logged_in() ) 
			redirect('auth/login', 'refresh');
		// var_dump($mdl);
		// exit;
		$this->home_lib->go($this->mdl_grp, $mdl);
	}

	public function registration( $username=NULL, $pwd=NULL ) {
		$mdl = 'registration';	
		$mdl_grp		= 'Information';
		// if ( !$this->ion_auth->logged_in() ) 
		// 	redirect('auth/login', 'refresh');
		// var_dump($mdl);
		// exit;
		$this->home_lib->go($mdl_grp, $mdl);
	}

	public function new_product( $username=NULL, $pwd=NULL )
	{
		$mdl = 'new_product';		
		// var_dump($mdl);
		// exit;
		$this->Dashboard_lib->go($this->mdl_grp, $mdl);
	}

	public function top_sellers( $username=NULL, $pwd=NULL )
	{
		$mdl = 'top_sellers';		
		// var_dump($mdl);
		// exit;
		$this->Dashboard_lib->go($this->mdl_grp, $mdl);
	}

	public function change_pwd( $username=NULL, $pwd=NULL )
	{
		// $CI =& get_instance();

$this->load->library('dashboard/Dashboard_lib');
// $CI->your_library->do_something(); 
		$mdl = 'change_pwd';
		$mdl_grp		= 'change_password';
		// var_dump($mdl_grp, $mdl);
		// exit;		
		// var_dump($mdl);
		// exit;
		$this->load->library('Dashboard_lib');
		$Dashboard_lib = new Dashboard_lib();
		$Dashboard_lib->go($mdl_grp, $mdl);
	}
}
