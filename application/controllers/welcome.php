<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class welcome extends siteController {

	function __construct(){
		parent::__construct();
		$this->load->model("postCategory_model","postcat",true);
		$this->template->setLayout($this->getCurrentLayout());
	}
	
	public function index()
	{
		//$this->template->setJs(array("abc","ccc"));
		//$this->template->setJs("aaaa");
		//$this->template->setBlock("login","user/login");
		//$this->template->setBlock("login","user/list");
		
		// lastest loader
		$this->template->setMain("page/1column");
		$this->template->run();
		//$where = array("status"=>"active");
		//echo encode("123 ơi a â ấ");
		//var_dump($this->postcat->get_number_rows()); 
		//die();
		//$this->load->view('welcome_message');
	}
	
	
	
}
