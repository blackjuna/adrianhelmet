<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reports_model extends CI_Model
{		
	public $mdl_grp		= 'reports';

	function __construct() {
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		// $this->load->library('Xmpp');
		// $xmppPrebind = new XmppPrebind('AXIOO-PC', 'http://axioo-pc:7070/http-bind/', 'conversejs', false, false);
	}
}