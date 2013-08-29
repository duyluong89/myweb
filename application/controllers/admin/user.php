<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class user extends adminController{
	function __construct(){
		parent::__construct();
		$this->load->model("user_model","userModel",TRUE);
		$this->template->setJs("site.modules.user");
		if(!$this->is_login()){

		}
	}

	function index(){
		try {
				$listUser = $this->userModel->getAdmin();
				$data = array(
					"users" => $listUser
				);
				$this->template->setMain("user/list",$data);
				$this->template->run();
			} catch (Exception $e) {
				throw new Exception("Error Processing Request", 1);
				
			}	
	}

	function add(){
		if(ispost()){
			
		}

		$this->template->setMain("user/add");
		$this->template->run();
	}
}