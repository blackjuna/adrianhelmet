<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {
	public $mdl_grp		= 'Products';

	function __construct() {
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('Products_model','Products_m');
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
		// $this->load->library('session');
	}

	public function product_details()
	{

	}

	public function half_face()
	{
		$mdl = 'half_face';	

		$data['id_merk']= $_GET['id_merk'];
		$data['id_category']=1;
		$data=$this->input->post();
		// var_dump($data['id_category']);
		// exit;

		$this->home_lib->go($this->mdl_grp, $mdl);
	}

	public function full_face()
	{
		$mdl = 'full_face';	

		// $data['id_merk']= $_GET['id_merk'];
		// $data['id_category']=2;

		// var_dump($data);
		// exit;

		$this->home_lib->go($this->mdl_grp, $mdl);
	}

	public function details()
	{
		$mdl = 'details';	

		// $data['id_merk']= $_GET['id_merk'];
		// $data['id_category']=2;

		// var_dump($data);
		// exit;

		$this->home_lib->go($this->mdl_grp, $mdl);
	}
}
