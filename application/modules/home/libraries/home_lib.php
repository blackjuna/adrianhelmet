<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_Lib
{
	
    protected $ci1       	= NULL;    //codeigniter instance
    protected $app_title	= NULL;    
    protected $app_title_short = NULL;    
	
    public function __construct()
	{
		$this->ci1 = &get_instance();		
	}
	
	public function go( $mdl_grp=null, $mdl=null, $data=array() ) 
	{
		$this->ci1->load->view('header');
		$this->ci1->load->view('topbar');
		$this->ci1->load->view('slider');
		$this->ci1->load->view('sidebar');
		$this->ci1->load->view('content');
		$this->ci1->load->view('bottombar');
		$this->ci1->load->view('js');
		$this->ci1->load->view('footer');
	}

}