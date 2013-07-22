<?php
class siteController extends MY_Controller{
	protected $_currentLayout;
	function __construct(){
		parent::__construct();
		$this->initTemplate();
		$this->_currentLayout ="";
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
			$this->template->setLayout($this->themes->frontend_layout . DS . $this->themes->frontend_layoutName);
		}
	}
}
