<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Invoices_model extends CI_Model
{		
	public $mdl_grp		= 'invoices';
	var $column_order = array(null, 'code','date','due_date','feedback','i.note','status','confirmation_payment','id_customers','i.id','name','email','address','telephone'); //set column field database for datatable orderable
	var $column_search = array('code','date','due_date','feedback','i.note','status','confirmation_payment','id_customers','i.id','name','email','address','telephone'); //set column field database for datatable searchable 
	var $order = array('id' => 'asc'); // default order
	
	function __construct() {
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		// $this->load->library('Xmpp');
		// $xmppPrebind = new XmppPrebind('AXIOO-PC', 'http://axioo-pc:7070/http-bind/', 'conversejs', false, false);
	}

	public function get_all($limit = NULL, $offset = NULL) {
		$query = $this->db->get('products', $limit, $offset);
		return $query->result();
	}

	public function get($id) {
		$results = $this->db->get_where('product', array('id' => $id))->result();
		$result = $results[0];
		return $result;
	}

	public function _get_datatables_query($id_customers = null)
	{
		if (sesUser()->u_grp == 'members'){
			$this->db->select('i.*, c.name,c.email,c.address,c.telephone');
			$this->db->from('invoices as i');
			$this->db->join('customers as c', 'i.id_customers = c.id', 'left');
			$this->db->where('i.id_customers =',$id_customers);
		}else{
			$this->db->select('i.*, c.name,c.email,c.address,c.telephone');
			$this->db->from('invoices as i');
			$this->db->join('customers as c', 'i.id_customers = c.id', 'left');	
		}

		$i = 0;
	
		foreach ($this->column_search as $item) // loop column 
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{
				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	public function get_datatables($id_customers = null)
	{
		$this->_get_datatables_query($id_customers);
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	public function count_filtered($id_customers = null)
	{
		$this->_get_datatables_query($id_customers);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all($id_customers = null)
	{
		if (sesUser()->u_grp == 'members'){
			$this->db->select('i.*, c.name,c.email,c.address,c.telephone');
			$this->db->from('invoices as i');
			$this->db->join('customers as c', 'i.id_customers = c.id', 'left');
			$this->db->where('i.id_customers =',$id_customers);
			return $this->db->count_all_results();
		}else{
			$this->db->select('i.*, c.name,c.email,c.address,c.telephone');
			$this->db->from('invoices as i');
			$this->db->join('customers as c', 'i.id_customers = c.id', 'left');	
			return $this->db->count_all_results();
		}
	}

	public function getInvoiceDetails_query($id_invoices = nulls)
	{
		// var_dump($id_invoices);
		// exit;
		$this->db->select('i.*,p.code as code_product, p.name as name_product, pm.name as name_merk ');
		$this->db->from('invoices_detail as i');
		$this->db->join('product as p', 'i.id_product = p.id', 'left');
		$this->db->join('product_merk as pm', 'p.id_merk = pm.id', 'left');
		$this->db->where('i.id_invoices =',$id_invoices);
		return $this->db->get()->result();
	}

	public function count_filtered_details($id_customers = null)
	{
		$this->_get_datatables_query($id_customers);
		$query = $this->db->get();
		return $query->num_rows();
	}

}