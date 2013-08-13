<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class block extends adminController{
	function __construct(){
		parent::__construct();
		$this->load->model("block_model","blockModel",TRUE);
		$this->template->setJs("site.modules.block");
	}
	
	function index(){
		$listblock = $this->blockModel->getAll();
		$data = array(
			"listBlock" => $listblock
		);
		$this->template->setMain("block/list",$data);
		$this->template->run();
		
	}

	function changeStatus(){
		try{
			$blockId =  $this->input->post("blockId");
			$status =  $this->input->post("status");
			if($status==1) $newStatus = 0;
			else $newStatus = 1;
			$data = array("active"=>$newStatus);
			if($this->blockModel->update_by_id($blockId,$data)){
				echo SUCCESS;
			}else{echo ERROR;}
		}catch(exception $ex){
			throw $ex;
			
		}
	}
}
