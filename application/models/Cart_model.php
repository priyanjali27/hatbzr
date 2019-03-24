<?php 
defined("BASEPATH") or exit("direct script not allowed");

class Cart_model extends CI_Model{
	
	 public function __construct(){
		 parent::__construct();
		 
	 }
	

	 /*=======
	 function banner 
	 parameter :-- 
	 table :-- banner 
	 working :-- fetching allrecord		 
	 return type array 
	 date 03/09/2017
	 written by pravin 
	=====*/
	
	public function category()
	{
		$this->db->select('*');
		$this->db->from($this->pro->prifix.$this->pro->category);
		$this->db->order_by($this->pro->category.'_id','desc');
		$this->db->where($this->pro->category.'_status','1');
		$this->db->where($this->pro->category.'_parent',0);
		$rs = $this->db->get();
		//echo $this->db->last_query();
		return $rs->result_array();
		
	} 

	/*=======
	 function banner 
	 parameter :-- 
	 table :-- banner 
	 working :-- fetching allrecord		 
	 return type array 
	 date 03/09/2017
	 written by pravin 
	=====*/
	
	public function subcategory()
	{
		$this->db->select('*');
		$this->db->from($this->pro->prifix.$this->pro->category);
		$this->db->order_by($this->pro->category.'_id','desc');
		$this->db->order_by($this->pro->category.'_parent','desc');
		$this->db->where($this->pro->category.'_status','1');
		$this->db->where($this->pro->category.'_parent>',0);
		$rs = $this->db->get();
		//echo $this->db->last_query();
		return $rs->result_array();
		
	}

	
	/*=======
	 function Fetch user 
	 parameter :-- array
	 table :-- User 
	 working :-- Fetch Record		 
	 return type Array  
	 date 03/09/2017
	 written by pravin 
	=====*/
	
	public function User($id)
	{	
		$this->db->from($this->pro->prifix.$this->pro->user);
		$this->db->join($this->pro->prifix.$this->pro->useraddress,$this->pro->useraddress."_user_id=".$this->pro->user."_id","inner");
		$this->db->where($this->pro->user."_id",$id);
		$this->db->where($this->pro->useraddress."_default",'1');
		$rs = $this->db->get();
		//echo $this->db->last_query();
		return $rs->row_array();
		
	}
	
	
	/*=======
	 function UpdateUser 
	 parameter :-- array
	 table :-- User 
	 working :-- Inserting Record		 
	 return type Boolean  
	 date 03/09/2017
	 written by pravin 
	=====*/
	
	public function updateUser($data,$id)
	{	
		$this->db->where($this->pro->user."_id",$id);
		return $this->db->update($this->pro->prifix.$this->pro->user,$data);
				
	}
	

	
	
}



?>