<?php
class MY_Model extends CI_Model{
	protected $tableName ;
	
 	function getTable(){
		return $this->tableName;
	}
	
	function setTable($_tableName){ 
		$this->tableName = $_tableName;
	}
	
	function getAll($where = array()){
		if(!is_null($where)) $this->db->where($where);
		$data = $this->db->get($this->getTable());
		return $data->result_object();
	}
	
	function find_by_key($key){
		
	}
	
	function get_by_id($id=null){
		try{
			if($id==null){
				return $this->getAll();
			}else{
				$this->db->where("id",$id);
				$data = $this->db->get($this->getTable())->result_object();
				if(is_object($data)) return $data;
				else if(is_array($data) && count($data) > 0) return $data[0];
				else return null;
			}
		}catch(Exception $ex){
			throw $ex;
		}
		
	}
	
	function get_number_rows(){
		try {
			return $this->db->count_all_results($this->getTable());
		} catch (Exception $e) {
			throw $e;
		}
	}
	
	function insert($data = array()){
		try {
			if(is_array($data) && !is_null($data))
				return $this->db->insert($this->getTable(),$data);
			else return null;
		} catch (Exception $e) {
		}
	}
	
	function update_by_id($id,$data = array()){
		try {
			$this->db->where("id",$id);
			return $this->db->update($this->getTable(),$data);
		} catch (Exception $e) {
			throw $e;
		}
	}
	
	function update_by_where($where = array(),$data = array()){
		try {
			if(is_array($where) && !is_null($where)){
				$this->db->where($where);
				return $this->db->update($this->getTable(),$data);
			}else return false;
			
		} catch (Exception $e) {
			throw $e;
		}
	}
	
	function delete_by_id($id){
		try {
			$this->db->where("id",$id);
			return $this->db->delete($this->getTable());
		} catch (Exception $e) {
			throw $e;
		}
	}
	
	function delete_by_where($where = array()){
		try {
			if(is_array($where) && !is_null($where)){
				$this->db->where($where);
				return $this->db->delete($this->getTable());
			}else return false;		
		} catch (Exception $e) {
			throw $e;
		}
	}
	
	
}