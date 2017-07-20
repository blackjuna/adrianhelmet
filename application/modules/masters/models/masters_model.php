<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Masters_model extends CI_Model
{		
	public $mdl_grp		= 'masters';
	var $column_order = array(null, 'id','email','name','address','telephone','note'); //set column field database for datatable orderable
	var $column_search = array('id','email','name','address','telephone','note'); //set column field database for datatable searchable 
	var $order = array('id' => 'asc'); // default order
	var $column_order_product = array(null, 'p.id','p.code','p.name','p.size','p.description','p.note1','p.note2','p.stock','p.price','pm.name'); //set column field database for datatable orderable
	var $column_search_product = array('p.id','p.code','p.name','p.size','p.description','p.note1','p.note2','p.stock','p.price','pm.name'); //set column field database for datatable searchable 
	var $order_product = array('p.id' => 'asc'); // default order
	var $column_order_merek = array(null, 'id','code','name'); //set column field database for datatable orderable
	var $column_search_merek = array('id','code','name'); //set column field database for datatable searchable 
	var $order_merek = array('id' => 'asc'); // default order
	var $column_sliders = array(null,'id','file_name','tittle','note','link'); //set column field database for datatable orderable
	var $column_search_sliders = array('id','file_name','tittle','note','link'); //set column field database for datatable searchable 
	var $order_sliders = array('id' => 'asc'); // default order


	function __construct() {
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		// $this->load->library('Xmpp');
		// $xmppPrebind = new XmppPrebind('AXIOO-PC', 'http://axioo-pc:7070/http-bind/', 'conversejs', false, false);
	}

	public function _get_customers_query()
	{
		$this->db->from('customers');

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

	public function get_customers()
	{
		$this->_get_customers_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	public function count_filtered_customers()
	{
		$this->_get_customers_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function _get_products_query()
	{
		// $this->db->from('product');
		$this->db->select('p.*, pm.name as name_merek');
		$this->db->from('product as p');
		$this->db->join('product_merk as pm', 'p.id_merk = pm.id', 'left');	

		$i = 0;
	
		foreach ($this->column_search_product as $item) // loop column 
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

				if(count($this->column_search_product) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order_product[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order_product;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	public function get_products()
	{
		$this->_get_products_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	public function count_filtered_products()
	{
		$this->_get_products_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function _get_products_merk_query()
	{
		$this->db->from('product_merk');

		$i = 0;
	
		foreach ($this->column_search_merek as $item) // loop column 
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

				if(count($this->column_search_merek) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order_merek[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order_merek;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	public function get_products_merk()
	{
		$this->_get_products_merk_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	public function count_filtered_products_merk()
	{
		$this->_get_products_merk_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	function getmerekid($id)
    {
        $params['table'] = 'product_merk';
        $this->db->from($params['table']);
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query->row();
    }

    function getmerek()
    {
        $params['table'] = 'product_merk';
        $this->db->from($params['table']);
        // $this->db->where('id',$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

	public function _get_sliders_query()
	{
		$this->db->from('product_slider');

		$i = 0;
	
		foreach ($this->column_search_sliders as $item) // loop column 
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

				if(count($this->column_search_sliders) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order_sliders[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order_sliders;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	public function get_sliders()
	{
		$this->_get_sliders_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	public function count_filtered_sliders()
	{
		$this->_get_sliders_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	function getsliderid($id)
    {
        $params['table'] = 'product_slider';
        $this->db->from($params['table']);
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query->row();
    }
}