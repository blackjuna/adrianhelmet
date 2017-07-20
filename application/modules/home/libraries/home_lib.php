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
		// if ( !$this->ci->ion_auth->logged_in() ) 
		// 	redirect('auth/login', 'refresh');
			
		// $menu_sidebar	= $this->ci1->systems_model->getModules_ByCode($mdl_grp, $mdl);
		$module = $this->ci1->systems_model->getModules_ByCode($mdl_grp, $mdl);
		// $module = $this->ci1->systems_model->getModules_ByCode($mdl_grp, $mdl);
		// var_dump($module);
		// exit;
		$page_link = strtolower($module->page_link);
		if ( $this->ci1->ion_auth->logged_in() ) {
			$user = sesUser();
			$data['first_name']		= strtoupper($user->first_name);
			$data['button_log']		= 'Logout';
			$data['link_button_log']		= 'auth/logout';
		}else{
			$data['button_log']		= 'Login';
			$data['link_button_log']		= 'auth/login';
		}
		
		$data['title'] 			= strtoupper($module->module_group_name).' :: '.strtoupper($module->module_name);
		$data['title_module']	= strtoupper($module->module_name);
		$data['menu_topbar'] 	= $this->ci1->systems_model->getModules_Byid('OUR_OFFERS');
		$data['menu_bottom'] 	= $this->ci1->systems_model->getMenuBottom('OUR_OFFERS');
		$data['menu_sidebar'] 	= $this->ci1->systems_model->getMenuSide();

		$this->ci1->load->view('home/header',$data);
		$this->ci1->load->view('home/topbar',$data);

		if ($mdl_grp == 'home') {
			$this->ci1->load->view('home/slider');	
		}
		if ($mdl_grp <> 'home') {
			$this->ci1->load->view('home/header_end',$data);
		}
		if ($mdl <> 'contact_us') {
			$this->ci1->load->view('home/sidebar',$data);
		}
		
		
		$this->ci1->load->view($page_link,$data);
		$this->ci1->load->view('home/bottombar',$data);
		$this->ci1->load->view('home/js');
		$this->ci1->load->view('home/footer');
		// var_dump($mdl_grp);
		// exit;
		// $this->ci1->load->view($mdl_grp.'/script');
	}

}