<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Our_offers extends CI_Controller {

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
		$this->load->view('header');
		$this->load->view('topbar');
		// $this->load->view('slider');
		$this->load->view('sidebar');
		$this->load->view('vcontact');
		$this->load->view('bottombar');
		$this->load->view('js');
		$this->load->view('footer');
	}

	public function special_offers()
	{
		// $this->load->library('session');
		$this->load->view('header');
		$this->load->view('topbar');
		$this->load->view('header_end');
		$this->load->view('sidebar');
		$this->load->view('special_offers');
		$this->load->view('bottombar');
		$this->load->view('js');
		$this->load->view('footer');
	}

	public function new_products()
	{
		// $this->load->library('session');
		$this->load->view('header');
		$this->load->view('topbar');
		$this->load->view('header_end');
		$this->load->view('sidebar');
		$this->load->view('new_products');
		$this->load->view('bottombar');
		$this->load->view('js');
		$this->load->view('footer');
	}

	public function top_sellers()
	{
		// $this->load->library('session');
		$this->load->view('header');
		$this->load->view('topbar');
		$this->load->view('header_end');
		$this->load->view('sidebar');
		$this->load->view('top_sellers');
		$this->load->view('bottombar');
		$this->load->view('js');
		$this->load->view('footer');
	}
}
