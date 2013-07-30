<?php
class adminController extends MY_Controller{
	
	protected $_currentLayout;
	function __construct(){
		parent::__construct();
		$this->_currentLayout ="";
		$this->initTemplate();
	}
	
	function getCurrentTheme(){
		$this->_currentLayout = "backend" . DS . $this->themes->backend_layout . DS;
		return $this->_currentLayout;
	}
	
	function getCurrentLayout(){
		return $this->getCurrentTheme() . $this->themes->backend_layoutName;
	}
	
	function initTemplate(){
		if(!is_null($this->themes) && is_object($this->themes)){
			$this->template->setDirectTheme($this->themes->backend_skin);
			$this->template->setLayout($this->getCurrentLayout());
			$this->template->header( $this->getCurrentTheme() .  "page/html/header");
			$this->template->footer( $this->getCurrentTheme() .  "page/html/footer");
		}
	}
}

?>