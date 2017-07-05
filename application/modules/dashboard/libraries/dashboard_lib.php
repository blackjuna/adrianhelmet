<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_lib
{
	
    protected $ci      	= NULL;    //codeigniter instance
    protected $app_title	= NULL;    
    protected $app_title_short = NULL;    
	
    public function __construct()
	{
		$this->ci = &get_instance();
		
		// $this->app_title 		= 'HD SYSTEMS';
		// $this->app_title_short 	= 'HDSys';
		
	}
	
	public function go( $mdl_grp=null, $mdl=null, $data=array() ) 
	{
		if ( !$this->ci->ion_auth->logged_in() ) 
			redirect('auth/login', 'refresh');
			
		$module = $this->ci->systems_model->getModules_ByCode($mdl_grp, $mdl);
		// if (!$module)
		// 	$this->session->set_flashdata('message', 'Sorry, module you have requested was not exists...!');
		// 	crud_error('Sorry, module you have requested was not exists...!');
		// 	return show_error('Sorry, module you have requested was not exists...!');
		
		$page_link = strtolower($module->page_link);

		// APP INFO
		$data3['app_title'] 		= $this->app_title;
		$data3['app_title_short'] 	= $this->app_title_short;
		$data3['title'] 	   		= strtoupper($module->module_group_name).' :: '.anchor($page_link, strtoupper($module->module_name));
		$data3['title_module'] 	   	= strtoupper($module->module_name);
		$data3['menus'] 	   		= $this->ci->systems_model->getGroups_Auth_ByGroupId( explode(",", sesUser()->u_groups) );
		// DATA USER
		$user = sesUser();
		$data3['username']  		= strtoupper($user->username);
		$data3['first_name']		= strtoupper($user->first_name);
		$data3['last_name']			= strtoupper($user->last_name);
		$data3['email']  			= $user->email;
		$data3['image']  			= empty($user->image) ? "no_photo.jpg" : $user->image;
		$date 						= new DateTime("@$user->last_login");

		$data3['last_login'] 		= $date->format('D, d M Y h:i A');
		$data2['title'] 			= strtoupper($module->module_group_name).' :: '.strtoupper($module->module_name);
		$data2 						= is_array($data) ? array_merge($data2, $data) : $data2;

		$data3['header'] 			= 'dashboard/header';
		$data3['topbar'] 			= 'dashboard/topbar';
		$data3['sidebar'] 			= 'dashboard/sidebar';
		$data3['control_sidebar'] 	= 'dashboard/control_sidebar';
		$data3['content_header'] 	= 'dashboard/content_header';
		$data3['content'] 			= $page_link;
		$data3['js'] 				= 'dashboard/js';
		$data3['footer'] 			= 'dashboard/footer';	
			
		$this->ci->load->view('main', $data3);	
		// $this->_ci->load->view('dashboard/header', $data3);
		// $this->_ci->load->view('dashboard/topbar', $data3);
		// $this->_ci->load->view('dashboard/sidebar', $data3);
		// $this->_ci->load->view('dashboard/control_sidebar', $data3);
		// $this->_ci->load->view('dashboard/content_header', $data3);
		// $this->_ci->load->view('dashboard/left', $data3);
		// $this->_ci->load->view('dashboard/js', $data3);
		// $this->_ci->load->view('dashboard/footer', $data3);
		// $this->_ci->load->view($page_link, $data2);

	}

}