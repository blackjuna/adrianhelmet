<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller {
	public $mdl_grp		= 'reports';

	function __construct() {
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		
		$this->load->model('reports_model','person');
	}
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
		if ( !$this->ion_auth->logged_in() ) 
			redirect('auth/login', 'refresh');
		$this->Dashboard_lib->go('dashboards','home');
	}

	public function vreports( $username=NULL, $pwd=NULL ) {
		$mdl = 'vreports';		
		// var_dump($mdl);
		// exit;
		$this->dashboard_lib->go($this->mdl_grp, $mdl);
	}

}
