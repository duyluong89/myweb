<?php
class MY_Controller extends CI_Controller{
	protected $themes;
	function __construct(){
		parent::__construct();
		$this->load->helper("common");
		$this->load->library("template");
		$this->load->model("systemtemplate_model","theme",true);
		$this->themes = $this->getTheme();
	}
	
	function getTheme(){
		return $this->theme->getconfigTemplate();
	}
	
}
require_once "siteController.php";
require_once "adminController.php";
