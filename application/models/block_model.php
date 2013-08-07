<?php
class block_model extends MY_Model{
	function __construct(){
		parent::__construct();
		$this->setTable("system_block");
	}
}