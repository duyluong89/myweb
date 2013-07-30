<?php
class siteController extends MY_Controller{
	protected $_currentLayout;
	function __construct(){
		parent::__construct();
		$this->_currentLayout ="";
		$this->initTemplate();
		
	}
	
	function getCurrentTheme(){
		$this->_currentLayout = "frontend" . DS . $this->themes->frontend_layout . DS;
		return $this->_currentLayout;
	}
	
	function getCurrentLayout(){
		return $this->getCurrentTheme() . $this->themes->frontend_layoutName;
	}
	
	function initTemplate(){
		if(!is_null($this->themes) && is_object($this->themes)){
			$this->template->setDirectTheme($this->themes->frontend_skin);
			$this->template->setLayout($this->getCurrentLayout());
			$this->template->header( $this->getCurrentTheme() .  "page/html/header");
			$this->template->footer(  $this->getCurrentTheme() .  "page/html/footer");
		}
	}
}
