<?php
class user_model extends MY_Model{
	function __construct(){
		parent::__construct();
		$this->setTable("admin_info");
	}

	function getAdmin(){
		$this->db->select('admin_info.*, admin_user.id as uid,username');
		$this->db->from($this->getTable());
		$this->db->join('admin_user','admin_info.id=admin_user.user','left');
		$query = $this->db->get();
		return $query->result_object();
	}

	function delUser(){
		// remove all info of user
		// change all product, page, news to super admin
		

	}
}