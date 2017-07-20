<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products_model extends CI_Model
{		
	public function __construct()
	{
		parent::__construct();
		
		// FOR MEMCACHED
		// $this->load->driver('cache');
	}
	
	function getNewproduct_query()
	{
		// $data = $this->input->post();   // get data from ajax

        $this->db->select('a0.code as code_product,a0.name as product_name,size,img_link,note1,page_link,price,stock, a0.id as id_product');
        $params['table'] = 'product';
        $this->db->from($params['table'].' as a0');
        $this->db->join('product_merk as b0', 'a0.id_merk=b0.id', 'left');
        $this->db->where('stock <>', 0);
        $this->db->order_by('a0.id','desc');

        return $this->db->get()->result();
	}

	function gethalfface_query()
	{
		$data = $this->input->get();   // get data from ajax

		// var_dump($data['cat']);
		// exit;
        $this->db->select('a0.code as code_product,a0.name as product_name,a0.size,img_link,note1,page_link,a0.price,stock, a0.id as id_product');
        $params['table'] = 'product';
        $this->db->from($params['table'].' as a0');
        $this->db->join('product_merk as b0', 'a0.id_merk=b0.id', 'left');
        // $this->db->join('invoices_detail as c0', 'a0.id=c0.id_product', 'left');
        $this->db->where('a0.stock <>', 0);
        $this->db->where('a0.id_merk =', $data['id_merk']);
        $this->db->where('a0.id_category =', $data['cat']);
        // $this->db->where('c0.qty <>', 0);
        $this->db->order_by('a0.id','desc');

        return $this->db->get()->result();
	}

	function getfullface_query()
	{
	$data = $this->input->get();   // get data from ajax

		// var_dump($data['id_merk']);
		// exit;
        $this->db->select('a0.code as code_product,a0.name as product_name,a0.size,img_link,note1,page_link,a0.price,stock, a0.id as id_product');
        $params['table'] = 'product';
        $this->db->from($params['table'].' as a0');
        $this->db->join('product_merk as b0', 'a0.id_merk=b0.id', 'left');
        $this->db->where('a0.stock <>', 0);
        $this->db->where('a0.id_merk =', $data['id_merk']);
        $this->db->where('a0.id_category =', $data['cat']);
        $this->db->order_by('a0.id','desc');

        return $this->db->get()->result();
	}

	function getDetails_query()
	{
	$data = $this->input->get();   // get data from ajax

		// var_dump($data['id_merk']);
		// exit;
        $this->db->select('a0.code as code_product,a0.description,a0.name as product_name,a0.size,img_link,note1,note2,page_link,a0.price,stock, a0.id as id_product,b0.name as merek_name');
        $params['table'] = 'product';
        $this->db->from($params['table'].' as a0');
        $this->db->join('product_merk as b0', 'a0.id_merk=b0.id', 'left');
        $this->db->where('a0.stock <>', 0);
        $this->db->where('a0.id =', $data['id_product']);
        $this->db->order_by('a0.id','desc');

        return $this->db->get()->result();
	}
}