<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_Model extends CI_Model
{		
	public function __construct()
	{
		parent::__construct();
		
		// FOR MEMCACHED
		// $this->load->driver('cache');
	}
	
	function getcontent_query()
	{
        $this->db->select('a0.code as code_product,a0.description,a0.name as product_name,a0.size,img_link,note1,note2,page_link,a0.price,stock, a0.id as id_product,b0.name as merek_name');
        $params['table'] = 'product';
        $this->db->from($params['table'].' as a0');
        $this->db->join('product_merk as b0', 'a0.id_merk=b0.id', 'left');
        $this->db->limit(6);
        $this->db->order_by('a0.id','desc');

        return $this->db->get()->result();
	}

	function getslider_query()
	{
        $params['table'] = 'product_slider';
        $this->db->from($params['table'].' as a0');
        $this->db->order_by('a0.id','desc');

        return $this->db->get()->result();
	}
}