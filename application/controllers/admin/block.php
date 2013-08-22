<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class block extends adminController{
	function __construct(){
		parent::__construct();
		$this->load->model("block_model","blockModel",TRUE);
		$this->template->setJs("site.modules.block");
		if(!$this->is_login()){

		}
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

	function add(){

		if(ispost()){
			$dataPost = array(
				'name'=>$this->input->post("name"),
				'content'=>$this->input->post("content"),
				'active'=>$this->input->post("active")
				);
			if($this->blockModel->insert($dataPost)){
				redirect(site_url('admin/block'));
				return true;
			}
		}
		$this->template->setMain("block/add");
		$this->template->run();
	}

	function edit($id=null){
		if(ispost()){
			$id= $this->input->post("id");
			$dataPost = array(
				'name'=>$this->input->post("name"),
				'content'=>$this->input->post("content"),
				'active'=>$this->input->post("active")
				);
			if($this->blockModel->update_by_id($id,$dataPost)){
				redirect(site_url('admin/block/index'));
			}
		}
		$block = $this->blockModel->get_by_id($id);
		if(is_null($block)){redirect(site_url('admin/block/index'));}
		$data = array(
			'block'=>$block
			);
		$this->template->setMain("block/edit",$data);
		$this->template->run();	
	}
	function delete(){
		try{
			$id = $this->input->post("blockId");
			if($this->blockModel->delete_by_id($id)){
				echo SUCCESS;
			}else echo ERROR;
		}catch(Exception $ex){
			echo ERROR;
		}
	}
}
