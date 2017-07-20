<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masters extends CI_Controller {
	public $mdl_grp		= 'masters';

	function __construct() {
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		
		$this->load->model('masters_model','mas_m');

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

	public function customers( $action=null,$username=NULL, $pwd=NULL ) {
		$mdl = 'customers';	

		if ( $action == 'r' ) {
			if (!$this->ion_auth->logged_in())
				redirect('auth/login', 'refresh');

			// $id_customers= sesUser()->id_customers;
			$list = $this->mas_m->get_customers();
			$recordtotal = count($list);
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $invoices) {
				$no++;
				$row = array();
				$invoices->no = $no;
				// $row[] = $invoices->code;
				// $row[] = $invoices->date;
				// $row[] = $invoices->due_date;
				// $row[] = $invoices->feedback;
				// $row[] = $invoices->note;
				// $row[] = $invoices->status;
				// $row[] = $invoices->confirmation_payment;
				// $row[] = $invoices->name;
				// $row[] = $invoices->email;
				// $row[] = $invoices->address;
				// $row[] = $invoices->telephone;
				// $row[] = $invoices->id;
				$invoices->DT_RowId = $invoices->id;
				// $row[] = $invoices;
				$data[] = $invoices;
			}


			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $recordtotal,
							"recordsFiltered" => $this->mas_m->count_filtered_customers(),
							"data" => $data,
					);
			//output to json format
			//
			// var_dump($data);
			// exit;
			echo json_encode($output);		

			exit;
		}
		$this->dashboard_lib->go($this->mdl_grp, $mdl);
	}

	public function menu( $action=null,$username=NULL, $pwd=NULL ) {
		$mdl = 'menu';		
		// var_dump($mdl);
		// exit;
		$this->dashboard_lib->go($this->mdl_grp, $mdl);
	}

	public function products( $action=null,$username=NULL, $pwd=NULL ) {
		$mdl = 'products';
		if (!$this->ion_auth->logged_in()) 
			redirect('auth/login', 'refresh');

		$user_id		= $this->session->userdata('user_id');

		if ( $action == 'c' ){
			$this->validateproduct();

			$data = $this->input->post();

			// $this->db->where('code', $data['judul']);
		 //    $query = $this->db->get('product');
		 //    $count_row = $query->num_rows();
		 //    if ($count_row > 0) 
		 //      	alert("Error: Duplicate Data !");

		    $this->db->trans_begin();
			try {
				$file_element_name = 'filefoto';

		        $nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
		        $config['upload_path'] = './assets/images/'; //path folder
		        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
		        $config['max_size'] = '2048'; //maksimum besar file 2M
		        $config['max_width']  = '1288'; //lebar maksimum 1288 px
		        $config['max_height']  = '768'; //tinggi maksimu 768 px
		        $config['file_name'] = str_replace(" ", "_", $data['name']); //nama yang terupload nantiny
		        $this->load->library('upload',$config);
		         
		        if($_FILES[$file_element_name]['name'])
		        {
			        if ($this->upload->do_upload($file_element_name))
			        {
		                $gbr = $this->upload->data();
		                $data1 = array(
		                  'name' =>$data['name'],
		                  'size' =>$data['ukuran'],
		                  'description' =>$data['keterangan'],
		                  'note1' =>$data['catatan1'],
		                  'note2' =>$data['catatan2'],
		                  'img_link' =>$gbr['file_name'],
		                  'id_category' =>$data['kategori'],
		                  'id_merk' =>$data['merek'],
		                  'price' =>$data['harga'],
		                  'stock' =>$data['stok'],
		                  'created_date' =>date('Y-m-d H:i:s'),
		                  'modified_date' =>date('Y-m-d H:i:s'),
		                  'created_id' =>$user_id,
		                  'modified_id' =>$user_id,
		                );
		                $this->db->insert('product',$data1); //akses model untuk menyimpan ke database
		                $id_produk = $this->db->insert_id();
		                $data2['code']= 'HELM'.$id_produk;
		                $this->db->update( 'product',$data2 , array('id'=>$id_produk) );
		            }
		            @unlink($_FILES[$file_element_name]);
		        }				
			} catch (Exception $e) {  
				crud_error($e->getMessage());
			} 
			
			$this->db->trans_commit();
			echo json_encode(array("status"=>TRUE));
			exit;
		}		
		if ( $action == 'r' ) {
			$list = $this->mas_m->get_products();
			$recordtotal = count($list);
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $invoices) {
				$no++;
				$row = array();
				$invoices->no = $no;
				$invoices->img_product = '<img width="50" src="'.site_url('assets/images/'.$invoices->img_link).'">';
				$invoices->DT_RowId = $invoices->id;
				// $row[] = $invoices;
				$data[] = $invoices;
			}


			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $recordtotal,
							"recordsFiltered" => $this->mas_m->count_filtered_products(),
							"data" => $data,
					);
			echo json_encode($output);	
			exit;
		}
		$this->dashboard_lib->go($this->mdl_grp, $mdl);
	}

	public function validateproduct()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('name') == '')
		{
			$data['inputerror'][] = 'name';
			$data['error_string'][] = 'nama harus terisi';
			$data['status'] = FALSE;
		}

		if($this->input->post('merek') == '')
		{
			$data['inputerror'][] = 'merek';
			$data['error_string'][] = 'merek harus terisi';
			$data['status'] = FALSE;
		}

		if($this->input->post('kategori') == '')
		{
			$data['inputerror'][] = 'kategori';
			$data['error_string'][] = 'kategori harus terisi';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}

	public function products_category( $action=null,$username=NULL, $pwd=NULL ) {
		$mdl = 'products_category';		
		// var_dump($mdl);
		// exit;
		$this->dashboard_lib->go($this->mdl_grp, $mdl);
	}

	public function products_merk( $action=null,$username=NULL, $pwd=NULL ) {
		$mdl = 'products_merk';	

		if (!$this->ion_auth->logged_in()) 
			redirect('main', 'refresh');

		$user_id		= $this->session->userdata('user_id');

		if ( $action == 'c' ){
			$this->validatemerk();

			$data = $this->input->post();

			$this->db->where('code', $data['code_merek']);
		    $query = $this->db->get('product_merk');
		    $count_row = $query->num_rows();
		    if ($count_row > 0) 
		      	alert("Error: Duplicate Data !");

			$this->db->trans_begin();
			try {
				$data1['code'] 	  		 	= strtoupper($data['code_merek']);
				$data1['name'] 			   	= strtoupper($data['name_merek']);
				$data1['created_id'] 		= $user_id;
				$data1['modified_id']  	 	= $user_id;
				$data1['created_date'] 		= date('Y-m-d H:i:s');
				$data1['modified_date'] 	= date('Y-m-d H:i:s');

				$this->db->insert('product_merk', $data1);
				
			} catch (Exception $e) {  
				crud_error($e->getMessage());
			} 
			
			$this->db->trans_commit();
			echo json_encode(array("status"=>TRUE));
			exit;
		}	

		if ( $action == 'r' ) {
			if (!$this->ion_auth->logged_in())
				redirect('auth/login', 'refresh');

			// $id_customers= sesUser()->id_customers;
			$list = $this->mas_m->get_products_merk();
			$recordtotal = count($list);
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $invoices) {
				$no++;
				$row = array();
				$invoices->no = $no;
				// $row[] = $invoices->code;
				// $row[] = $invoices->date;
				// $row[] = $invoices->due_date;
				// $row[] = $invoices->feedback;
				// $row[] = $invoices->note;
				// $row[] = $invoices->status;
				// $row[] = $invoices->confirmation_payment;
				// $row[] = $invoices->name;
				// $row[] = $invoices->email;
				// $row[] = $invoices->address;
				// $row[] = $invoices->telephone;
				// $row[] = $invoices->id;
				$invoices->DT_RowId = $invoices->id;
				// $row[] = $invoices;
				$data[] = $invoices;
			}


			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $recordtotal,
							"recordsFiltered" => $this->mas_m->count_filtered_products_merk(),
							"data" => $data,
					);
			//output to json format
			//
			// var_dump($data);
			// exit;
			echo json_encode($output);		

			exit;
		}

		if ( $action == 'u' ) {
			$this->validatemerk();
			
			$data = $this->input->post();

			// $this->db->where('code', $data['code_merek']);
		 //    $query = $this->db->get('product_merk');
		 //    $count_row = $query->num_rows();
		 //    if ($count_row > 0) 
		 //      	alert("Error: Duplicate Data !");

			$this->db->trans_begin();
			
			try {
				$data1['code'] 				= strtoupper($data['code_merek']);
				$data1['name'] 				= strtoupper($data['name_merek']);
				$data1['modified_id']   	= $user_id;
				$data1['modified_date'] 	= date('Y-m-d H:i:s');
				$this->db->update( 'product_merk', $data1, array('id'=>$data['id']) );
				
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
				// var_dump($data);
				// exit;
				$this->db->where('id',$data['id']);
 				$this->db->delete('product_merk');
				// $data1['deleted']     = 1;
				// $data1['modified_id']   	= $user_id;
				// $data1['modified_date'] 	= date('Y-m-d H:i:s');
				// $this->db->update( 'a_chart', $data1, array('id'=>$data['id']) );
				
			} catch (Exception $e) {  
				crud_error( $e->getMessage() );
			} 
			
			$this->db->trans_commit();
			echo json_encode(array("status"=>TRUE));
			return;
		}

		$this->dashboard_lib->go($this->mdl_grp, $mdl);
	}

	public function merek_edit($id)
	{
		$data = $this->mas_m->getmerekid($id);
		echo json_encode($data);
	}

	public function validatemerk()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('code_merek') == '')
		{
			$data['inputerror'][] = 'code_merek';
			$data['error_string'][] = 'kode harus terisi';
			$data['status'] = FALSE;
		}

		if($this->input->post('name_merek') == '')
		{
			$data['inputerror'][] = 'name_merek';
			$data['error_string'][] = 'nama harus terisi';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}

	public function products_promo( $action=null,$username=NULL, $pwd=NULL ) {
		$mdl = 'products_promo';		
		// var_dump($mdl);
		// exit;
		$this->dashboard_lib->go($this->mdl_grp, $mdl);
	}

	public function products_slider( $action=null,$username=NULL, $pwd=NULL ) {
		$mdl = 'products_slider';	

		if (!$this->ion_auth->logged_in()) 
			redirect('auth/login', 'refresh');

		$user_id		= $this->session->userdata('user_id');

		if ( $action == 'c' ){
			$this->validateslider();

			$data = $this->input->post();

			$this->db->where('tittle', $data['judul']);
		    $query = $this->db->get('product_slider');
		    $count_row = $query->num_rows();
		    if ($count_row > 0) 
		      	alert("Error: Duplicate Data !");

		    $this->db->trans_begin();
			try {
				$file_element_name = 'filefoto';

		        $nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
		        $config['upload_path'] = './assets/images/carousel/'; //path folder
		        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
		        $config['max_size'] = '2048'; //maksimum besar file 2M
		        $config['max_width']  = '1288'; //lebar maksimum 1288 px
		        $config['max_height']  = '768'; //tinggi maksimu 768 px
		        $config['file_name'] = str_replace(" ", "_", $data['judul']); //nama yang terupload nantiny
		        $this->load->library('upload',$config);
		         
		        if($_FILES[$file_element_name]['name'])
		        {
			        if ($this->upload->do_upload($file_element_name))
			        {
		                $gbr = $this->upload->data();
		                $data1 = array(
		                  'file_name' =>$gbr['file_name'],
		                  'tittle' =>$data['judul'],
		                  'note' =>$data['catatan'],
		                  'link' =>$data['tautan'],
		                  'created_date' =>date('Y-m-d H:i:s'),
		                  'modified_date' =>date('Y-m-d H:i:s'),
		                  'created_id' =>$user_id,
		                  'modified_id' =>$user_id,
		                );
		                $this->db->insert('product_slider',$data1); //akses model untuk menyimpan ke database
		            }
		            @unlink($_FILES[$file_element_name]);
		        }				
			} catch (Exception $e) {  
				crud_error($e->getMessage());
			} 
			
			$this->db->trans_commit();
			echo json_encode(array("status"=>TRUE));
			exit;
		}

		if ( $action == 'r' ) {
			if (!$this->ion_auth->logged_in())
				redirect('auth/login', 'refresh');

			// $id_customers= sesUser()->id_customers;
			$list = $this->mas_m->get_sliders();
			$recordtotal = count($list);
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $invoices) {
				$no++;
				$row = array();
				$invoices->no = $no;
				$invoices->img_product = '<img width="50" src="'.base_url().'/assets/images/'.$invoices->file_name.'">';
				$invoices->DT_RowId = $invoices->id;
				$data[] = $invoices;
			}


			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $recordtotal,
							"recordsFiltered" => $this->mas_m->count_filtered_sliders(),
							"data" => $data,
					);
			//output to json format
			//
			// var_dump($data);
			// exit;
			echo json_encode($output);		

			exit;
		}
		$this->dashboard_lib->go($this->mdl_grp, $mdl);
	}

	public function slider_edit($id)
	{
		$data = $this->mas_m->getsliderid($id);
		echo json_encode($data);
	}

	public function validateslider()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('judul') == '')
		{
			$data['inputerror'][] = 'judul';
			$data['error_string'][] = 'judul harus terisi';
			$data['status'] = FALSE;
		}

		if($this->input->post('catatan') == '')
		{
			$data['inputerror'][] = 'catatan';
			$data['error_string'][] = 'catatan harus terisi';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}

	public function promo_category( $action=null,$username=NULL, $pwd=NULL ) {
		$mdl = 'promo_category';		
		// var_dump($mdl);
		// exit;
		$this->dashboard_lib->go($this->mdl_grp, $mdl);
	}


}
