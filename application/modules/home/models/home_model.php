<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_Model extends CI_Model
{		
	public function __construct()
	{
		parent::__construct();
		
		// FOR MEMCACHED
		// $this->load->driver('cache');
	}
	
	function getmenutop($parent,$hasil){
		
	}

	function getmenuleft($parent,$hasil){
		
	}

	function getmenubottom1($parent,$hasil){
		
	}

	function getmenubottom2($parent,$hasil){
		
	}

	function getmenubottom3($parent,$hasil){
		$w=$this->db->query("select * from ");
	}
}