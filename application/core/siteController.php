<?php
class siteController extends MY_Controller{
	function __construct(){
		parent::__construct();
		$this->initTemplate();
	}
	
	function initTemplate(){
		if(!is_null($this->themes) && is_object($this->themes)){
			$this->template->setDirectTheme($this->themes->frontend_skin);
			$this->template->setLayout($this->themes->frontend_layout . DS . $this->themes->frontend_layoutName);
		}
	}
}
