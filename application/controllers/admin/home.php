<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class home extends adminController{
		
	function __construct(){
		parent::__construct();
	}
	
	function index(){
		
		//$this->template->setMain("page/1column"); // default call 1column
		$this->template->run();
	}
	
	function login(){
		if(ispost()){
			echo "adsd";
		}else{
			$this->load->view($this->getCurrentTheme() ."user/login");
		}
	}
	
	
	
}
