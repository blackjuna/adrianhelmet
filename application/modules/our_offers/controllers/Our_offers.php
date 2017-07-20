<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Our_offers extends CI_Controller {
	public $mdl_grp		= 'our_offers';

	function __construct() {
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('Offers_model','Offers_m');
		// $this->load->library('Xmpp');
		// $xmppPrebind = new XmppPrebind('AXIOO-PC', 'http://axioo-pc:7070/http-bind/', 'conversejs', false, false);
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

	public function special_offers( $username=NULL, $pwd=NULL ) {
		$mdl = 'special_offers';		
		// var_dump($mdl);
		// exit;
		$this->home_lib->go($this->mdl_grp, $mdl);
	}

	public function new_product( $username=NULL, $pwd=NULL )
	{
		$mdl = 'new_product';		
		// var_dump($mdl);
		// exit;
		$this->home_lib->go($this->mdl_grp, $mdl);
	}

	public function top_sellers( $username=NULL, $pwd=NULL )
	{
		$mdl = 'top_sellers';		
		// var_dump($mdl);
		// exit;
		$this->home_lib->go($this->mdl_grp, $mdl);
	}
}
