<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoices extends CI_Controller {
	public $mdl_grp		= 'invoices';

	function __construct() {
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->ci = &get_instance();
		
		$this->load->model('Invoices_model','Inv_m');
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
		// if ( !$this->ion_auth->logged_in() ) 
		// 	redirect('auth/login', 'refresh');

		// $this->Dashboard_lib->go('dashboards','home');
		// $data['cart_list'] = $this->cart->contents();
  		//  $this->template->display('cart', $data);
	}

	public function vinvoices( $action=null,$username=NULL, $pwd=NULL ) {
		$mdl = 'vinvoices';		
		
		if ( $action == 'r' ) {
			if (!$this->ion_auth->logged_in())
				redirect('auth/login', 'refresh');

			$id_customers= sesUser()->id_customers;
			$list = $this->Inv_m->get_datatables($id_customers);
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
							"recordsTotal" => $this->Inv_m->count_all($id_customers),
							"recordsFiltered" => $this->Inv_m->count_filtered($id_customers),
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

	public function details($id){
		$columns=array();
		$data = array();
		$listdetails = $this->Inv_m->getInvoiceDetails_query($id);
		// var_dump($listdetails);
		// exit;
		$countdetails = count($listdetails);
		// var_dump($countdetails);
		// exit;
		$no=0;
		foreach ($listdetails as $invoices_detail) {
			$no++;
			$row = array();
			$invoices_detail->no = $no;
			// $row[] = $invoices_detail->code_product;
			// $row[] = $invoices_detail->name_product;
			// $row[] = $invoices_detail->name_merk;
			// $row[] = $invoices_detail->qty;
			// $row[] = $invoices_detail->price;
			// $row[] = $invoices_detail->subtotal;
			// $row[] = $invoices_detail->id;

			$data[] = $invoices_detail;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $countdetails,
						"recordsFiltered" => $countdetails,
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);		

		exit;
	}

	public function carts( $username=NULL, $pwd=NULL ) {
		$mdl = 'carts';		
		// var_dump($mdl);
		// exit;
		// 
		$data['cart_list'] = $this->cart->contents();
		$this->home_lib->go($this->mdl_grp, $mdl,$data);
	}

	public function checkouts( $username=NULL, $pwd=NULL ) {
		$mdl = 'checkouts';		
		// var_dump($mdl);
		// exit;

		$data['checkouts'] = $this->cart->contents();
		$this->home_lib->go($this->mdl_grp, $mdl,$data);
	}

	public function add($id=null) {
		$product = $this->Inv_m->get($id);

		$insert = array(
			'id' => $product->id,
			'qty' => 1,
			'price' => $product->price,
			'name' => $product->name,
	 		'options' => array('image_link' => $product->img_link)
		);
   
  		$this->cart->insert($insert);  
  		redirect('invoices/carts',$product);
  	}

  	public function minus($id=null) {
		$product = $this->Inv_m->get($id);

		$insert = array(
			'id' => $product->id,
			'qty' => (-1),
			'price' => $product->price,
			'name' => $product->name,
	 		'options' => array('image_link' => $product->img_link)
		);
   
  		$this->cart->insert($insert);  
  		redirect('invoices/carts',$product);
  	}
  
 	public function remove($rowid) {
		$this->cart->update(array(
		'rowid' => $rowid,
		'qty' => 0
		));
  		redirect('invoices/carts',$product);
 	}

 	public function update() {
		// $this->cart->update(array(
		// 'rowid' => $rowid,
		// 'qty' => 0
		// ));
  		// redirect('shop');
 		$this->cart->update($_POST);
    	// redirect('cart');
    }

    public function cruds( $action=NULL) {
		// if (!$this->ion_auth->logged_in()) 
		// 	redirect('main', 'refresh');

		$mdl 	 	= 'content';
		$mdl_grp	= 'home';
		
		if ( $action == 'c' ){

			$data = $this->input->post();

			if ( empty($data) ) 
				crud_error("Error: Empty Data !");

			$this->db->trans_begin();
			try {
				// var_dump($this->cart->format_number($this->cart->total()));
				// exit;
				if (!$this->ion_auth->logged_in()){
					$data3['name'] 	   		= strtoupper($data['name']);
					$data3['email'] 		= strtoupper($data['email']);
					$data3['address'] 		= strtoupper($data['address']);
					$data3['telephone'] 	= strtoupper($data['phone']);
					$data3['note'] 			= strtoupper($data['pesan']);
					$data3['created_date'] 	= date('Y-m-d H:i:s');
					$data3['modified_date'] = date('Y-m-d H:i:s');
					$this->db->insert('customers', $data3);
					$id_cust = $this->db->insert_id();
				}else{
					$user = sesUser();
					$id_cust =$user->id_customers;
				}
				
				foreach ($this->cart->contents() as $items) {
					$code_inv = "INV".substr($items['rowid'],0,6);
				}
				$data1['code']					= $code_inv;
				$data1['date']					= date('Y-m-d H:i:s',strtotime("+1 days"));
				$data1['due_date']				= "INV".substr($items['rowid'],0,6);
				$data1['note']					= $data['pesan'];
				$data1['status']				= "0";
				$data1['confirmation_payment']	= "0";
				$data1['created_date'] 			= date('Y-m-d H:i:s');
				$data1['modified_date'] 		= date('Y-m-d H:i:s');
				$data1['id_customers'] 			= $id_cust;
				$data1['total'] 				= $this->cart->total();
				$this->db->insert('invoices', $data1);
				$id_inv = $this->db->insert_id();
				// var_dump($id_inv);
				// exit;
				foreach ($this->cart->contents() as $items) {
					$data2['id_product']		= $items['id'];
					$data2['id_invoices']		= $id_inv;
					$data2['qty']				= $items['qty'];
					$data2['price']				= $items['price'];
					$data2['subtotal']			= $items['subtotal'];
					$data2['id_product']		= $items['id'];
					$data2['created_date'] 		= date('Y-m-d H:i:s');
					$data2['modified_date'] 	= date('Y-m-d H:i:s');
					$this->db->insert('invoices_detail', $data2);
				}
				
			
				
				// $id = $this->db->insert_id();
				$this->cart->destroy();
			} catch (Exception $e) {  
				crud_error($e->getMessage());
			} 
			
			$this->db->trans_commit();
			echo json_encode(array("status"=>TRUE));
			exit;
		}

		if ( !is_allow('r', $this->mdl_grp, $mdl) )
			show_error(l('permission_failed_menu'));
		
		$this->getme_lib->go( $this->mdl_grp, $mdl );
	}
}
