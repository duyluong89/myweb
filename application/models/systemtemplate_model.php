<?php
class systemtemplate_model extends MY_Model{
	function __construct(){
		parent::__construct();
		$this->setTable("system_template");
	}
	
	function getconfigTemplate(){
		try{
			$this->db->limit(1);
			$result = $this->db->get($this->getTable())->result_object();
			if(is_object($result)) return $result;
			else if(is_array($result) && count($result) >0) return $result[0];
			else return null;
			
		}catch(exception $e){
			throw new Exception("Error Processing Request", 1);
			
		}
	}
}
