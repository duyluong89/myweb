<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class block extends adminController{
	function __construct(){
		parent::__construct();
		$this->load->model("block_model","block",TRUE);
	}
	
	function index(){
		$listblock = $this->block->getAll();
		$data = array(
			"listBlock" => $listblock
		);
		$this->template->setMain("block/list",$data);
		$this->template->run();
		
	}
}
