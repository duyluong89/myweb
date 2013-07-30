<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class home extends adminController{
		
	function __construct(){
		parent::__construct();
	}
	
	function index(){
		$this->template->run();
	}
}
