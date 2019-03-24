<?php 
defined("BASEPATH") or exit("direct script not allowed");

class Changepwd_model extends CI_Model{
	
	 public function __construct(){
		 parent::__construct();
		 
	 }
	  

		public function ed_data()
		{
			$this->db->where($this->pro->user.'_type','0');
			$rs = $this->db->get($this->pro->prifix.$this->pro->user);
			return $rs->row_array();
		}
			/*=======
		 function update 
		 parameter :--form data,id 
         table :-- user 
         working :-- updating record of table	 
		 return type int
		 date 03/14/2017
		 written by pravin 
		=====*/
		public function update($data,$id){
			
			 $this->db->where($this->pro->user."_id",$id);
			 $edit = $this->db->update($this->pro->prifix . $this->pro->user,$data);
			 $this->db->last_query(); 
			 return $edit;
		}
		
}


?>