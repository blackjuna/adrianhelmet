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
		$data['app_title'] 		= $this->app_title;
		$data['app_title_short'] 	= $this->app_title_short;
		$data['title'] 	   		= strtoupper($module->module_group_name).' :: '.anchor($page_link, strtoupper($module->module_name));
		$data['title_module'] 	   	= strtoupper($module->module_name);
		$data['menus'] 	   		= $this->ci->systems_model->getGroups_Auth_ByGroupId( explode(",", sesUser()->u_groups) );
		// DATA USER
		$user = sesUser();
		// var_dump($user);
		// exit;
		$data['username']  			= strtoupper($user->username);
		$data['user_groups']  		= strtoupper($user->u_grp);
		// var_dump($data['user_groups']);
		// exit;
		$data['first_name']			= strtoupper($user->first_name);
		$data['last_name']			= strtoupper($user->last_name);
		$data['email']  			= $user->email;
		$data['image']  			= empty($user->image) ? "no_photo.jpg" : $user->image;
		$date 						= new DateTime("@$user->last_login");

		$data['last_login'] 		= $date->format('D, d M Y h:i A');
		$data2['title'] 			= strtoupper($module->module_group_name).' :: '.strtoupper($module->module_name);
		$data2 						= is_array($data) ? array_merge($data2, $data) : $data2;

		// $data['header'] 			= 'dashboard/header';
		// $data['topbar'] 			= 'dashboard/topbar';
		// $data['sidebar'] 			= 'dashboard/sidebar';
		// $data['control_sidebar'] 	= 'dashboard/control_sidebar';
		// $data['content_header'] 	= 'dashboard/content_header';
		// // $data['content'] 			= $page_link;
		// $data['js'] 				= 'dashboard/js';
		// $data['footer'] 			= 'dashboard/footer';	

		// $this->ci->load->view('main', $data);	
		$this->ci->load->view('dashboard/header', $data);
		$this->ci->load->view('dashboard/topbar', $data);
		$this->ci->load->view('dashboard/sidebar', $data);
		// echo '<div class="content-wrapper">';
		// $this->ci->load->view('dashboard/content_header', $data);
		$this->ci->load->view($page_link, $data2);
		// $this->ci->load->view('dashboard/control_sidebar', $data);
		// $this->ci->load->view('dashboard/footer', $data);
		// $this->ci->load->view('j'.$page_link, $data2);		
	}

}