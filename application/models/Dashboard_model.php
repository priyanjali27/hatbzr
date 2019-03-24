<?php 
defined("BASEPATH") or exit("direct script not allowed");

class Dashboard_model extends CI_Model{
	
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
	 function booking 
	 parameter :-- array
	 table :-- booking 	 
	 return type array  
	 date 03/09/2017
	 written by pravin 
	=====*/
	
	public function booking($userId)
	{
		$this->db->where($this->pro->booking.'_userId',$userId);
		return $this->db->get($this->pro->prifix.$this->pro->booking)->result_array();
		
	}
	
	
	/*=======
	 function bookingdetail 
	 parameter :-- invoiceid
	 table :-- bookingdetail 
	 working :-- fetching Record		 
	 return type array  
	 date 03/09/2017
	 written by pravin 
	=====*/
	
	public function bookingdetail($invoiceid)
	{
		$this->db->where($this->pro->bookingdetail.'_invoiceId',$invoiceid);
		$this->db->from($this->pro->prifix.$this->pro->bookingdetail);
		$this->db->join($this->pro->prifix.$this->pro->product,$this->pro->bookingdetail."_productId=".$this->pro->product."_id");
	
		$rs = $this->db->get();
		return $rs->result_array();
	}
	
	
	
	/*=======
	 function booking 
	 parameter :-- array
	 table :-- booking 	 
	 return type array  
	 date 03/09/2017
	 written by pravin 
	=====*/
	
	public function bookingByid($id)
	{
		$this->db->from($this->pro->prifix.$this->pro->booking);
		$this->db->join($this->pro->prifix.$this->pro->bookingdetail,$this->pro->bookingdetail."_invoiceId=".$this->pro->booking."_invoiceId","inner");
		$this->db->where($this->pro->booking.'_id',$id);
		return $this->db->get()->row_array();
		
	}
	
	
	
	/*=======
	 function update quantity 
	 parameter :-- array
	 table :-- User 
	 working :-- Inserting Record		 
	 return type Boolean  
	 date 03/09/2017
	 written by pravin 
	=====*/
	
	public function updateQty($unitId,$data)
	{	
		$this->db->where($this->pro->productunit."_id",$unitId);
		return $this->db->update($this->pro->prifix.$this->pro->productunit,$data);
	}
	
	
	
	/*=======
	 function  Selectqty by id
	 parameter :-- array
	 table :-- User 
	 working :-- Inserting Record		 
	 return type Boolean  
	 date 03/09/2017
	 written by pravin 
	=====*/
	
	public function selectQtyByID($unitId)
	{	
		$this->db->where($this->pro->productunit."_id",$unitId);
		$rs= $this->db->get($this->pro->prifix.$this->pro->productunit);
		return $rs->row_array();
	}
	
	
}



?>