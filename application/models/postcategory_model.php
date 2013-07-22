<?php
class postCategory_model extends MY_Model{
	function __construct(){
		parent::__construct();
		$this->setTable("post_category");
	}
}