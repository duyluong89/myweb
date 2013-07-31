<?php
class template{
	protected $layout;
	protected $directTheme;
	protected $js;
	protected $css;
	protected $ci;
	protected $title;
	protected $header;
	protected $footer;
	protected $main;
	protected $_mainData;
	
	function __construct(){
		$this->ci =& get_instance();
		$this->js="";
		$this->directTheme = "";
		$this->css="";
		$this->title = "";
		$this->layout = "";
		$this->header = "";
		$this->footer = "";
		$this->_mainData =  array();
		$this->main="";
	}
	
	function setLayout($_layout){
		$this->layout = $_layout;
	}
	
	function getLayout(){
		return $this->layout;
	}
	
	function setDirectTheme($_directTheme){
		$this->directTheme = $_directTheme;
	}
	
	function getDirectTheme(){
		return $this->directTheme;	
	}
	
	function getCssFolder(){
		return $this->getDirectTheme() . "/css/";
	}
	function getJsFolder(){
		return $this->getDirectTheme() . "/js/";
	}
	
	function setJs($file){
		if(is_array($file)){
			foreach ($file as $f){
				$this->js .= '<script type="text/javascript" src="'.$this->getJsFolder() . $f .'.js"></script>';
			}
		}else{
			$this->js .= '<script type="text/javascript" src="'.$this->getJsFolder() . $file .'.js"></script>';
		}
		
	}
	
	function setCss($file){
		if(is_array($file)){
			foreach ($file as $f){
				$this->css .= '<link rel="stylesheet" type="text/css" href="'. base_url() . $this->getCssFolder() . $file .'.css" />';
			}
		}else{
			$this->css .= '<link rel="stylesheet" type="text/css" href="'. base_url() . $this->getCssFolder() . $file .'.css" />';
		}
		
		
	}
	
	function header($fileName="",$data = array()){
		$data = array_merge($data,$this->_mainData);
		$this->header = $this->ci->load->view($this->ci->getCurrentTheme() . $fileName, $data,TRUE);
	}
	
	function footer($fileName="",$data = array()){
		$data = array_merge($data,$this->_mainData);
		$this->footer = $this->ci->load->view($this->ci->getCurrentTheme() . $fileName, $data,TRUE);
	}
	
	function setMain($templateMain,$data= array()){
		if($templateMain =="")
			$this->main = "";
		else{
			$data = array_merge($data,$this->_mainData);
			$this->main = $this->ci->load->view($this->ci->getCurrentTheme() . $templateMain,$data,TRUE);
		}
			
	}
	
	function getMain(){
		$this->main =  $template;
		return $this->main;
	}
	
	function setBlock($name,$template,$data=array()){
		$name = strtolower($name);
		if(array_key_exists($name, $this->_mainData)){
		$this->_mainData[$name] = $this->_mainData[$name] . $this->ci->load->view($this->ci->getCurrentTheme() . $template,$data,TRUE);	
		}else{
			$this->_mainData[$name] = $this->ci->load->view($this->ci->getCurrentTheme() . $template,$data,TRUE);
		}
		
	}
	
	function run($data = array()){
		$data['js'] = $this->js;
		$data['css'] = $this->css;
		$data['header'] = $this->header;
		$data['footer']  = $this->footer;
		$data['main'] = $this->main;
		$data = array_merge($data,$this->_mainData);
		$this->ci->parser->parse($this->getLayout(),$data);
	}
}