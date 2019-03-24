<?php 
defined("BASEPATH") or exit("direct script not allowed");

class Home_model extends CI_Model{
	
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
	 function product 
	 parameter :-- offset,limit
	 searching varibles
	 table :-- product 
	 working :-- fetching allrecord		 
	 return type array 
	 date 03/09/2017
	 written by pravin 
	=====*/
	
	public function product()
	{
		$this->db->select('*');
		$this->db->from($this->pro->prifix.$this->pro->product);
		$this->db->order_by($this->pro->product.'_id','desc');
		$this->db->where($this->pro->product.'_status','1');
		$rs = $this->db->get();
		//echo $this->db->last_query();
		return $rs->result_array();
		
	}


	/*=======
	 function feature 
	 parameter :-- offset,limit
	 searching varibles
	 table :-- feature 
	 working :-- fetching allrecord		 
	 return type array 
	 date 03/09/2017
	 written by pravin 
	=====*/
	
	public function feature()
	{
		$this->db->select('*');
		$this->db->from($this->pro->prifix.$this->pro->product);
		$this->db->order_by($this->pro->product.'_id','desc');
		//$this->db->where($this->pro->product.'_status','1');
		$this->db->where($this->pro->product.'_feature','1');

		$rs = $this->db->get();
		//echo $this->db->last_query();
		return $rs->result_array();
		
	}
	


	/*=======
	 function newarrival 
	 parameter :-- offset,limit
	 searching varibles
	 table :-- newarrival 
	 working :-- fetching allrecord		 
	 return type array 
	 date 03/09/2017
	 written by pravin 
	=====*/
	
	public function newarrival()
	{
		$this->db->select('*');
		$this->db->from($this->pro->prifix.$this->pro->product);
		$this->db->order_by($this->pro->product.'_id','desc');
		//$this->db->where($this->pro->product.'_status','1');
		$this->db->where($this->pro->product.'_newarrival','1');
		$rs = $this->db->get();
		//echo $this->db->last_query();
		return $rs->result_array();
		
	}
	
	


	/*=======
	 function productByid
	 parameter :-- 
	 searching varibles
	 table :-- post 
	 working :-- fetching record		 
	 return type array 
	 date 03/09/2017
	 written by pravin 
	=====*/
	
	public function productByid($product_id)
	{
		$this->db->select('*');
		$this->db->from($this->pro->prifix.$this->pro->product);
		$this->db->where($this->pro->product.'_id',$product_id);
		//$this->db->where($this->pro->product.'_status','1');
		$rs = $this->db->get();
		//echo $this->db->last_query();
		return $rs->row_array();
		
	}

	/*=======
	 function colorByid
	 parameter :-- 
	 searching varibles
	 table :-- post 
	 working :-- fetching record		 
	 return type array 
	 date 03/09/2017
	 written by pravin 
	=====*/
	
	public function colorByid($id)
	{
		$this->db->select('*');
		$this->db->from($this->pro->prifix.$this->pro->color);
		$this->db->where($this->pro->color.'_id',$id);
		//$this->db->where($this->pro->product.'_status','1');
		$rs = $this->db->get();
		//echo $this->db->last_query();
		return $rs->row_array();
		
	}

	/*=======
	 function sizeByid
	 parameter :-- 
	 searching varibles
	 table :-- post 
	 working :-- fetching record		 
	 return type array 
	 date 03/09/2017
	 written by pravin 
	=====*/
	
	public function sizeByid($id)
	{
		$this->db->select('*');
		$this->db->from($this->pro->prifix.$this->pro->size);
		$this->db->where($this->pro->size.'_id',$id);
		//$this->db->where($this->pro->product.'_status','1');
		$rs = $this->db->get();
		//echo $this->db->last_query();
		return $rs->row_array();
		
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
	
	public function banner()
	{
		$this->db->select('*');
		$this->db->from($this->pro->prifix.$this->pro->banner);
		$this->db->order_by($this->pro->banner.'_id','desc');
		$this->db->where($this->pro->banner.'_status','1');
		$rs = $this->db->get();
		//echo $this->db->last_query();
		return $rs->result_array();
		
	}


	public function searchProductByKeyword($searchKeyword)
	{
		$this->db->select('*');
		$this->db->from($this->pro->prifix.$this->pro->product);
		$this->db->like($this->pro->product.'_title',$searchKeyword);
		$rs = $this->db->get();
		return $rs->result_array();
	}
	
}



?>