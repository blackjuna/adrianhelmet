<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// session_start(); //we need to call PHP's session object to access it through CI

class Systems extends CI_Controller {
	private $mdl_grp	= 'systems';
		
	function __construct() 
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		
		$this->load->model('systems_model','system');
	}

	function index() 
	{
		if (!$this->ion_auth->logged_in())
			redirect('main', 'refresh');
		
		redirect('main', 'refresh');
	}

	function modules_group( $action=NULL ) 
	{
		if (!$this->ion_auth->logged_in()) 
			redirect('main', 'refresh');

		$mdl 	 	= 'MODULES_GROUP';
		$user_id	= $this->session->userdata('user_id');
		
		if ( $action == 'c' ){
			$this->_validatemodule_groups();

			$data = $this->input->post();
			if ( empty($data) ) 
				crud_error("Error: Empty Data !");

			$this->db->trans_begin();
			try {
				$data1['code'] 	   		= strtoupper($data['codemodule']);
				$data1['name'] 			= strtoupper($data['name']);
				$data1['sort_no'] 		= strtoupper($data['sort_no']);
				$data1['icon'] 			= $data['icon'];
				$data1['created_id']   	= $user_id;
				$data1['modified_id']   = $user_id;
				$data1['created_date'] 	= date('Y-m-d H:i:s');
				$data1['modified_date'] = date('Y-m-d H:i:s');
				$data1['deleted'] 		= 0;
			
				$this->db->insert('c_modules_group', $data1);
				$id = $this->db->insert_id();
				
			} catch (Exception $e) {  
				crud_error($e->getMessage());
			} 
			
			$this->db->trans_commit();
			echo json_encode(array("status"=>TRUE));
			exit;
		}

		if ( $action == 'r' ) {
			$list = $this->system->getmodule_group();
			// var_dump($list);
			// exit;
			$data = array();
			$no = $_POST['start'];
			$nomor=0;
			foreach ($list as $module_groups) {
				$no++;
				$row = array();
				$row[] = $module_groups->code;
				$row[] = $module_groups->name;
				$row[] = $module_groups->sort_no;
				$row[] = $module_groups->icon;

				//add html for action
				$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_module_groups('."'".$module_groups->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
					  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_module_groups('."'".$module_groups->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
			
				$data[] = $row;
			}

			$output1 = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->system->countmodule_groups(),
							"recordsFiltered" => $this->system->countmodule_groups_filtered(),
							"data" => $data,
					);
			//output to json format
			echo json_encode($output1);			

			exit;
		}

		if ( $action == 'u' ) {
			$this->_validatemodule_groups();
			
			$data = $this->input->post();
			if ( empty($data) ) 
				crud_error("Error: Empty Data !");			
			$this->db->trans_begin();
			
			try {
				$data1['code'] 	   		= strtoupper($data['codemodule']);
				$data1['name'] 			= strtoupper($data['name']);
				$data1['sort_no'] 		= strtoupper($data['sort_no']);
				$data1['icon'] 			= $data['icon'];
				$data1['modified_id']   	= $user_id;
				$data1['modified_date'] 	= date('Y-m-d H:i:s');
				$this->db->update( 'c_modules_group', $data1, array('id'=>$data['id']) );
				
			} catch (Exception $e) {  
				crud_error( $e->getMessage() );
			} 
			
			$this->db->trans_commit();
			echo json_encode(array("status"=>true));
			return;
		}

		if ( $action == 'd' ) {
			$data = $this->input->post();
			$this->db->trans_begin();

			try {
				$data1['deleted']     = 1;
				$data1['modified_id']   	= $user_id;
				$data1['modified_date'] 	= date('Y-m-d H:i:s');
				$this->db->update( 'c_modules_group', $data1, array('id'=>$data['id']) );
				
			} catch (Exception $e) {  
				crud_error( $e->getMessage() );
			} 
			
			$this->db->trans_commit();
			echo json_encode(array("status"=>TRUE));
			return;
		}

		// if ( !is_allow('r', $this->mdl_grp, $mdl) )
		// 	show_error(l('permission_failed_menu'));
		
		$this->dashboard_lib->go( $this->mdl_grp, $mdl );
	}
	
	public function module_group_edit($id)
	{
		$data = $this->system->getmodule_groups_by_id($id);
		echo json_encode($data);
	}

	private function _validatemodule_groups()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('codemodule') == '')
		{
			$data['inputerror'][] = 'codemodule';
			$data['error_string'][] = 'Code is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('name') == '')
		{
			$data['inputerror'][] = 'name';
			$data['error_string'][] = 'Name is required';
			$data['status'] = FALSE;
		}

		if(!ctype_digit($this->input->post('sort_no')))
		{
			$data['inputerror'][] = 'sort_no';
			$data['error_string'][] = 'Sort no is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('icon') == '')
		{
			$data['inputerror'][] = 'icon';
			$data['error_string'][] = 'icon is required';
			$data['status'] = FALSE;
		}
		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}

	function modules( $action=NULL ) 
	{
		if (!$this->ion_auth->logged_in()) 
			redirect('main', 'refresh');

		$mdl 	 	= 'MODULES';
		$user_id	= $this->session->userdata('user_id');

		
		if ( $action == 'c' ){
			$this->_validatemodules();

			$data = $this->input->post();
			if ( empty($data) ) 
				crud_error("Error: Empty Data !");

			$this->db->trans_begin();
			try {
				$data1['code'] 	   		= strtoupper($data['codemodule']);
				$data1['name'] 			= strtoupper($data['name']);
				$data1['page_link'] 	= $data['page_link'];
				$data1['separat'] 		= strtoupper($data['separat']);
				$data1['sort_no'] 		= $data['sort_no'];
				$data1['show_in_menu'] 	= strtoupper($data['show_in_menu']);
				$data1['icon'] 			= $data['icon'];
				$data1['multilevel'] 	= $data['multilevel'];
				$data1['created_id']   	= $user_id;
				$data1['modified_id']   = $user_id;
				$data1['created_date'] 	= date('Y-m-d H:i:s');
				$data1['modified_date'] = date('Y-m-d H:i:s');
				$data1['deleted'] 		= 0;
			
				$this->db->insert('c_modules', $data1);
				$id = $this->db->insert_id();
				
			} catch (Exception $e) {  
				crud_error($e->getMessage());
			} 
			
			$this->db->trans_commit();
			echo json_encode(array("status"=>TRUE));
			exit;
		}

		if ( $action == 'r' ) {
			$list = $this->system->get_module();
			// var_dump($list);
			// exit;
			$data = array();
			$no = $_POST['start'];
			// $nomor=0;
			foreach ($list as $modules) {
				// $no++;
				// $row = array();
				// $row[] = $modules->code;
				// $row[] = $modules->name;
				// $row[] = $modules->sort_no;
				// $row[] = $modules->icon;

				//add html for action
				$modules->action = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_module_groups('."'".$modules->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
					  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_module_groups('."'".$modules->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
			
				$data[] = $modules;
			}

			$output1 = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->system->count_module(),
							"recordsFiltered" => $this->system->count_module_filtered(),
							"data" => $data,
					);
			//output to json format
			echo json_encode($output1);			

			exit;
		}

		if ( $action == 'u' ) {
			$this->_validatemodules();
			
			$data = $this->input->post();
			if ( empty($data) ) 
				crud_error("Error: Empty Data !");			
			$this->db->trans_begin();
			
			try {
				$data1['code'] 	   		= strtoupper($data['codemodule']);
				$data1['name'] 			= strtoupper($data['name']);
				$data1['sort_no'] 		= strtoupper($data['sort_no']);
				$data1['icon'] 			= $data['icon'];
				$data1['modified_id']   	= $user_id;
				$data1['modified_date'] 	= date('Y-m-d H:i:s');
				$this->db->update( 'c_modules', $data1, array('id'=>$data['id']) );
				
			} catch (Exception $e) {  
				crud_error( $e->getMessage() );
			} 
			
			$this->db->trans_commit();
			echo json_encode(array("status"=>true));
			return;
		}

		if ( $action == 'd' ) {
			$data = $this->input->post();
			$this->db->trans_begin();

			try {
				$data1['deleted']     = 1;
				$data1['modified_id']   	= $user_id;
				$data1['modified_date'] 	= date('Y-m-d H:i:s');
				$this->db->update( 'c_modules', $data1, array('id'=>$data['id']) );
				
			} catch (Exception $e) {  
				crud_error( $e->getMessage() );
			} 
			
			$this->db->trans_commit();
			echo json_encode(array("status"=>TRUE));
			return;
		}

		// if ( !is_allow('r', $this->mdl_grp, $mdl) )
		// 	show_error(l('permission_failed_menu'));
		
		$this->dashboard_lib->go( $this->mdl_grp, $mdl );
	}
	
	public function module_edit($id)
	{
		$data = $this->system->getmodule_by_id($id);
		echo json_encode($data);
	}

	private function _validatemodules()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('codemodule') == '')
		{
			$data['inputerror'][] = 'codemodule';
			$data['error_string'][] = 'Code is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('name') == '')
		{
			$data['inputerror'][] = 'name';
			$data['error_string'][] = 'Name is required';
			$data['status'] = FALSE;
		}

		if(!ctype_digit($this->input->post('sort_no')))
		{
			$data['inputerror'][] = 'sort_no';
			$data['error_string'][] = 'Sort no is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('icon') == '')
		{
			$data['inputerror'][] = 'icon';
			$data['error_string'][] = 'icon is required';
			$data['status'] = FALSE;
		}
		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}

	function groups_auth( $action=NULL ) 
	{
		if (!$this->ion_auth->logged_in()) 
			redirect('main', 'refresh');

		$mdl 	 	= 'GROUPS_AUTH';
		$user_id	= $this->session->userdata('user_id');
		
		if ( $action == 'c' ){
			$this->_validategroup_auth();

			$data = $this->input->post();
			if ( empty($data) ) 
				crud_error("Error: Empty Data !");

			$this->db->trans_begin();
			try {
				$data1['code'] 	   		= strtoupper($data['codemodule']);
				$data1['name'] 			= strtoupper($data['name']);
				$data1['page_link'] 	= $data['page_link'];
				$data1['separat'] 		= strtoupper($data['separat']);
				$data1['sort_no'] 		= $data['sort_no'];
				$data1['show_in_menu'] 	= strtoupper($data['show_in_menu']);
				$data1['icon'] 			= $data['icon'];
				$data1['multilevel'] 	= $data['multilevel'];
				$data1['created_id']   	= $user_id;
				$data1['modified_id']   = $user_id;
				$data1['created_date'] 	= date('Y-m-d H:i:s');
				$data1['modified_date'] = date('Y-m-d H:i:s');
				$data1['deleted'] 		= 0;
			
				$this->db->insert('c_modules', $data1);
				$id = $this->db->insert_id();
				
			} catch (Exception $e) {  
				crud_error($e->getMessage());
			} 
			
			$this->db->trans_commit();
			echo json_encode(array("status"=>TRUE));
			exit;
		}

		if ( $action == 'r' ) {
			$list = $this->system->get_group_auth();
			// var_dump($list);
			// exit;
			$data = array();
			$no = $_POST['start'];
			// $nomor=0;
			foreach ($list as $group_auth) {
				// $no++;
				// $row = array();
				// $row[] = $modules->code;
				// $row[] = $modules->name;
				// $row[] = $modules->sort_no;
				// $row[] = $modules->icon;

				//add html for action
				$group_auth->action = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_module_groups('."'".$group_auth->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
					  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_module_groups('."'".$group_auth->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
			
				$data[] = $group_auth;
			}

			$output1 = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->system->count_group_auth(),
							"recordsFiltered" => $this->system->count_group_auth_filtered(),
							"data" => $data,
					);
			//output to json format
			echo json_encode($output1);			

			exit;
		}

		if ( $action == 'u' ) {
			$this->_validatemodules();
			
			$data = $this->input->post();
			if ( empty($data) ) 
				crud_error("Error: Empty Data !");			
			$this->db->trans_begin();
			
			try {
				$data1['code'] 	   		= strtoupper($data['codemodule']);
				$data1['name'] 			= strtoupper($data['name']);
				$data1['sort_no'] 		= strtoupper($data['sort_no']);
				$data1['icon'] 			= $data['icon'];
				$data1['modified_id']   	= $user_id;
				$data1['modified_date'] 	= date('Y-m-d H:i:s');
				$this->db->update( 'c_modules', $data1, array('id'=>$data['id']) );
				
			} catch (Exception $e) {  
				crud_error( $e->getMessage() );
			} 
			
			$this->db->trans_commit();
			echo json_encode(array("status"=>true));
			return;
		}

		if ( $action == 'd' ) {
			$data = $this->input->post();
			$this->db->trans_begin();

			try {
				$data1['deleted']     = 1;
				$data1['modified_id']   	= $user_id;
				$data1['modified_date'] 	= date('Y-m-d H:i:s');
				$this->db->update( 'c_modules', $data1, array('id'=>$data['id']) );
				
			} catch (Exception $e) {  
				crud_error( $e->getMessage() );
			} 
			
			$this->db->trans_commit();
			echo json_encode(array("status"=>TRUE));
			return;
		}

		// if ( !is_allow('r', $this->mdl_grp, $mdl) )
		// 	show_error(l('permission_failed_menu'));
		
		$this->dashboard_lib->go( $this->mdl_grp, $mdl );
	}
	
	public function group_auth_edit($id)
	{
		$data = $this->system->get_group_auth_by_id($id);
		echo json_encode($data);
	}

	private function _validategroup_auth()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('codemodule') == '')
		{
			$data['inputerror'][] = 'codemodule';
			$data['error_string'][] = 'Code is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('name') == '')
		{
			$data['inputerror'][] = 'name';
			$data['error_string'][] = 'Name is required';
			$data['status'] = FALSE;
		}

		if(!ctype_digit($this->input->post('sort_no')))
		{
			$data['inputerror'][] = 'sort_no';
			$data['error_string'][] = 'Sort no is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('icon') == '')
		{
			$data['inputerror'][] = 'icon';
			$data['error_string'][] = 'icon is required';
			$data['status'] = FALSE;
		}
		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}

	function groups( $action=NULL ) 
	{
		if (!$this->ion_auth->logged_in()) 
			redirect('main', 'refresh');

		$mdl 	 	= 'GROUPS';
		$user_id	= $this->session->userdata('user_id');
		
		if ( $action == 'c' ){
			$this->_validate_groups();

			$data = $this->input->post();
			if ( empty($data) ) 
				crud_error("Error: Empty Data !");

			$this->db->trans_begin();
			try {
				$data1['code'] 	   		= strtoupper($data['code']);
				$data1['name'] 			= strtoupper($data['name']);
				$data1['description'] 	= strtoupper($data['description']);
				$data1['created_id']   	= $user_id;
				$data1['modified_id']   = $user_id;
				$data1['created_date'] 	= date('Y-m-d H:i:s');
				$data1['modified_date'] = date('Y-m-d H:i:s');
				$data1['deleted'] 		= 0;
			
				$this->db->insert('c_groups', $data1);
				$id = $this->db->insert_id();
				
			} catch (Exception $e) {  
				crud_error($e->getMessage());
			} 
			
			$this->db->trans_commit();
			echo json_encode(array("status"=>TRUE));
			exit;
		}

		if ( $action == 'r' ) {
			$list = $this->system->get_groups();
			// var_dump($list);
			// exit;
			$data = array();
			$no = $_POST['start'];
			$nomor=0;
			foreach ($list as $groups) {
				$no++;
				$row = array();
				$row[] = $groups->code;
				$row[] = $groups->name;
				$row[] = $groups->description;

				//add html for action
				$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_groups('."'".$groups->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
					  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_groups('."'".$groups->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
			
				$data[] = $row;
			}

			$output1 = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->system->count_groups(),
							"recordsFiltered" => $this->system->count_groups_filtered(),
							"data" => $data,
					);
			//output to json format
			echo json_encode($output1);			

			exit;
		}

		if ( $action == 'u' ) {
			$this->_validate_groups();
			
			$data = $this->input->post();
			if ( empty($data) ) 
				crud_error("Error: Empty Data !");			
			$this->db->trans_begin();
			
			try {
				$data1['code'] 	   		= strtoupper($data['code']);
				$data1['name'] 			= strtoupper($data['name']);
				$data1['description'] 		= strtoupper($data['description']);
				$data1['modified_id']   	= $user_id;
				$data1['modified_date'] 	= date('Y-m-d H:i:s');
				$this->db->update( 'c_groups', $data1, array('id'=>$data['id']) );
				
			} catch (Exception $e) {  
				crud_error( $e->getMessage() );
			} 
			
			$this->db->trans_commit();
			echo json_encode(array("status"=>true));
			return;
		}

		if ( $action == 'd' ) {
			$data = $this->input->post();
			$this->db->trans_begin();

			try {
				$data1['deleted']     = 1;
				$data1['modified_id']   	= $user_id;
				$data1['modified_date'] 	= date('Y-m-d H:i:s');
				$this->db->update( 'c_groups', $data1, array('id'=>$data['id']) );
				
			} catch (Exception $e) {  
				crud_error( $e->getMessage() );
			} 
			
			$this->db->trans_commit();
			echo json_encode(array("status"=>TRUE));
			return;
		}

		// if ( !is_allow('r', $this->mdl_grp, $mdl) )
		// 	show_error(l('permission_failed_menu'));
		
		$this->dashboard_lib->go( $this->mdl_grp, $mdl );
	}
	
	public function groups_edit($id)
	{
		$data = $this->system->get_groups_by_id($id);
		echo json_encode($data);
	}

	private function _validate_groups()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('code') == '')
		{
			$data['inputerror'][] = 'code';
			$data['error_string'][] = 'Code is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('name') == '')
		{
			$data['inputerror'][] = 'name';
			$data['error_string'][] = 'Name is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('description') == '')
		{
			$data['inputerror'][] = 'description';
			$data['error_string'][] = 'description is required';
			$data['status'] = FALSE;
		}
		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}

	function users( $action=NULL ) 
	{
		if (!$this->ion_auth->logged_in()) 
			redirect('auth/login', 'refresh');

		$mdl 	 	= 'USERS';
		$user_id	= $this->session->userdata('user_id');
		
		if ( $action == 'c' ){
			$this->_validate_users();

			$data = $this->input->post();
			// $this->db->where('email', $data['email']);
		 //    $query = $this->db->get('users');
		 //    $count_row = $query->num_rows();
		 //    if ($count_row > 0) 
		 //      	alert("Error: Duplicate Data !");

			$this->db->trans_begin();
			try {
				

				$data1['name'] 	   			= $data['username'];
				$data1['address'] 	   		= $data['alamat'];
				$data1['email'] 			= $data['email'];
				$data1['telephone'] 		= $data['telpon'];
				$data1['created_id'] 		= $user_id;
				$data1['modified_id']  	 	= $user_id;
				$data1['created_date'] 		= date('Y-m-d H:i:s');
				$data1['modified_date'] 	= date('Y-m-d H:i:s');
			
				$this->db->insert('customers', $data1);
				$id_cust = $this->db->insert_id();

				$file_element_name = 'filefoto';

		        $nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
		        $config['upload_path'] = './assets/bootstrap-adminlte/dist/img/'; //path folder
		        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
		        $config['max_size'] = '2048'; //maksimum besar file 2M
		        $config['max_width']  = '1288'; //lebar maksimum 1288 px
		        $config['max_height']  = '768'; //tinggi maksimu 768 px
		        $config['file_name'] = str_replace(" ", "_", $data['username']); //nama yang terupload nantiny
		        $this->load->library('upload',$config);
		         
		        if($_FILES[$file_element_name]['name'])
		        {
			        if ($this->upload->do_upload($file_element_name))
			        {
		                $gbr = $this->upload->data();
		                $data2 = array(
		                  'username' =>$data['username'],
		                  'password' =>$this->bcrypt->hash($data['password']),
		                  'email' =>$data['email'],
		                  'active' =>1,
		                  'first_name' =>$data['firstname'],
		                  'last_name' =>$data['lastname'],
		                  'image' =>$gbr['file_name'],
		                  'id_customers' =>$id_cust,
		                );
		                $this->db->insert('users',$data2); //akses model untuk menyimpan ke database
		                $id_users = $this->db->insert_id();
		            }
		            @unlink($_FILES[$file_element_name]);
		        }
		        $id_users = $this->db->insert_id();
		        $data3= array(
                	'user_id' =>$id_users, 
                	'group_id' =>$data['role'], 
            	);
            	$this->db->insert('user_groups',$data3);
            	
				
			} catch (Exception $e) {  
				crud_error($e->getMessage());
			} 
			
			$this->db->trans_commit();
			echo json_encode(array("status"=>TRUE));
			exit;
		}

		if ( $action == 'r' ) {
			$list = $this->system->get_users();
			$count_users = count($list);
			$data = array();
			$no = $_POST['start'];
			$nomor=0;
			foreach ($list as $users) {
				$no++;
				// $row = array();
				// $row[] = $users->username;
				// $row[] = $users->email;
				// $row[] = $users->first_name;
				// $row[] = $users->last_name;
				// $row[] = $users->phone;
				

				//add html for action
				// $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_users('."'".$users->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				// 	  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_users('."'".$users->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
				$users->no = $no;
				$users->DT_RowId = $users->id;
				$data[] = $users;
			}

			$output1 = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $count_users,
							"recordsFiltered" => $this->system->count_filtered_users(),
							"data" => $data,
					);
			//output to json format
			echo json_encode($output1);			

			exit;
		}

		if ( $action == 'u' ) {
			$this->_validate_groups();
			
			$data = $this->input->post();
			if ( empty($data) ) 
				crud_error("Error: Empty Data !");			
			$this->db->trans_begin();
			
			try {
				$data1['code'] 	   		= strtoupper($data['code']);
				$data1['name'] 			= strtoupper($data['name']);
				$data1['description'] 		= strtoupper($data['description']);
				$data1['modified_id']   	= $user_id;
				$data1['modified_date'] 	= date('Y-m-d H:i:s');
				$this->db->update( 'c_groups', $data1, array('id'=>$data['id']) );
				
			} catch (Exception $e) {  
				crud_error( $e->getMessage() );
			} 
			
			$this->db->trans_commit();
			echo json_encode(array("status"=>true));
			return;
		}

		if ( $action == 'd' ) {
			$data = $this->input->post();
			$this->db->trans_begin();

			try {
				$data1['deleted']     = 1;
				$data1['modified_id']   	= $user_id;
				$data1['modified_date'] 	= date('Y-m-d H:i:s');
				$this->db->update( 'c_groups', $data1, array('id'=>$data['id']) );
				
			} catch (Exception $e) {  
				crud_error( $e->getMessage() );
			} 
			
			$this->db->trans_commit();
			echo json_encode(array("status"=>TRUE));
			return;
		}

		if ( !is_allow('r', $this->mdl_grp, $mdl) )
			show_error(l('permission_failed_menu'));
		
		$this->dashboard_lib->go( $this->mdl_grp, $mdl );
	}
	
	public function users_edit($id)
	{
		$data = $this->system->get_users_by_id($id);
		echo json_encode($data);
	}

	private function _validate_users()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('username') == '')
		{
			$data['inputerror'][] = 'username';
			$data['error_string'][] = 'username is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('email') == '')
		{
			$data['inputerror'][] = 'email';
			$data['error_string'][] = 'email is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('firstname') == '')
		{
			$data['inputerror'][] = 'firstname';
			$data['error_string'][] = 'firstname is required';
			$data['status'] = FALSE;
		}
		if($this->input->post('lastname') == '')
		{
			$data['inputerror'][] = 'lastname';
			$data['error_string'][] = 'lastname is required';
			$data['status'] = FALSE;
		}
		if($this->input->post('password') == '')
		{
			$data['inputerror'][] = 'password';
			$data['error_string'][] = 'password is required';
			$data['status'] = FALSE;
		}
		if($this->input->post('confirmpassword') == '')
		{
			$data['inputerror'][] = 'confirmpassword';
			$data['error_string'][] = 'confirmpassword is required';
			$data['status'] = FALSE;
		}
		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}

	function change_pwd( $action=NULL ) 
	{
		if (!$this->ion_auth->logged_in()) 
			redirect('main', 'refresh');

		$mdl 	 	= 'CHANGE_PWD';
		$user_id	= $this->session->userdata('user_id');
		$company_id	 	= $this->session->userdata('company_id');
		$department_id	= $this->session->userdata('department_id');
		
		if ( $action == 'c' ){
			$this->_validate_groups();

			$data = $this->input->post();
			if ( empty($data) ) 
				crud_error("Error: Empty Data !");

			$this->db->trans_begin();
			try {
				$data1['code'] 	   		= strtoupper($data['code']);
				$data1['name'] 			= strtoupper($data['name']);
				$data1['description'] 	= strtoupper($data['description']);
				$data1['created_id']   	= $user_id;
				$data1['modified_id']   = $user_id;
				$data1['created_date'] 	= date('Y-m-d H:i:s');
				$data1['modified_date'] = date('Y-m-d H:i:s');
				$data1['deleted'] 		= 0;
			
				$this->db->insert('c_groups', $data1);
				$id = $this->db->insert_id();
				
			} catch (Exception $e) {  
				crud_error($e->getMessage());
			} 
			
			$this->db->trans_commit();
			echo json_encode(array("status"=>TRUE));
			exit;
		}

		if ( $action == 'r' ) {
			$list = $this->system->get_users();
			// var_dump($list);
			// exit;
			$data = array();
			$no = $_POST['start'];
			$nomor=0;
			foreach ($list as $users) {
				$no++;
				$row = array();
				$row[] = $users->username;
				$row[] = $users->email;
				$row[] = $users->first_name;
				$row[] = $users->last_name;
				$row[] = $users->phone;
				

				//add html for action
				$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_users('."'".$users->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
					  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_users('."'".$users->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
			
				$data[] = $row;
			}

			$output1 = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->system->count_users(),
							"recordsFiltered" => $this->system->count_users_filtered(),
							"data" => $data,
					);
			//output to json format
			echo json_encode($output1);			

			exit;
		}

		if ( $action == 'u' ) {
			$this->_validate_groups();
			
			$data = $this->input->post();
			if ( empty($data) ) 
				crud_error("Error: Empty Data !");			
			$this->db->trans_begin();
			
			try {
				$data1['code'] 	   		= strtoupper($data['code']);
				$data1['name'] 			= strtoupper($data['name']);
				$data1['description'] 		= strtoupper($data['description']);
				$data1['modified_id']   	= $user_id;
				$data1['modified_date'] 	= date('Y-m-d H:i:s');
				$this->db->update( 'c_groups', $data1, array('id'=>$data['id']) );
				
			} catch (Exception $e) {  
				crud_error( $e->getMessage() );
			} 
			
			$this->db->trans_commit();
			echo json_encode(array("status"=>true));
			return;
		}

		if ( $action == 'd' ) {
			$data = $this->input->post();
			$this->db->trans_begin();

			try {
				$data1['deleted']     = 1;
				$data1['modified_id']   	= $user_id;
				$data1['modified_date'] 	= date('Y-m-d H:i:s');
				$this->db->update( 'c_groups', $data1, array('id'=>$data['id']) );
				
			} catch (Exception $e) {  
				crud_error( $e->getMessage() );
			} 
			
			$this->db->trans_commit();
			echo json_encode(array("status"=>TRUE));
			return;
		}

		if ( !is_allow('r', $this->mdl_grp, $mdl) )
			show_error(l('permission_failed_menu'));
		
		$this->dashboard_lib->go( $this->mdl_grp, $mdl );
	}
	
	public function change_pwd_edit($id)
	{
		$data = $this->system->get_users_by_id($id);
		echo json_encode($data);
	}

	private function _validate_change_pwd()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('code') == '')
		{
			$data['inputerror'][] = 'code';
			$data['error_string'][] = 'Code is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('name') == '')
		{
			$data['inputerror'][] = 'name';
			$data['error_string'][] = 'Name is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('description') == '')
		{
			$data['inputerror'][] = 'description';
			$data['error_string'][] = 'description is required';
			$data['status'] = FALSE;
		}
		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}

}