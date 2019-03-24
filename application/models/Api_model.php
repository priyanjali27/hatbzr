<?php 
defined("BASEPATH") or exit("direct script not allowed");
class Api_model extends CI_Model{
	
	 public function __construct(){
		 parent::__construct();
		 
	 }
	 
	
	/*=======
	 function adds 
	 table :-- adds
	 working :-- fetching record 		 
	 return type array 
	 date 03/14/2017
	 written by pravin 
	=====*/
	public function adds()
	{   
		$this->db->from($this->pro->prifix.$this->pro->adds);
		$this->db->where($this->pro->adds."_status","1");
		$rs = $this->db->get();
		return $rs->row_array();
		
	} 
	
	/*=======
	 function sidebanner
	 table :-- sidebanner
	 working :-- fetching record 		 
	 return type array 
	 date 03/14/2017
	 written by pravin 
	=====*/
	public function sidebanner()
	{   
		$this->db->select($this->pro->sidebanner."_name as Name,".$this->pro->sidebanner."_image as Image");
		$this->db->from($this->pro->prifix.$this->pro->sidebanner);
		$this->db->where($this->pro->sidebanner."_status","1");
		$rs = $this->db->get();
		return $rs->result_array();
		
	}  
	 
	/*=======
	 function banners 
	 table :-- banner
	 working :-- fetching record 		 
	 return type array 
	 date 03/14/2017
	 written by pravin 
	=====*/
	public function banners()
	{   
	    $this->db->select($this->pro->banner."_name as Name,".$this->pro->banner."_image as Image");
		$this->db->from($this->pro->prifix.$this->pro->banner);
		$this->db->where($this->pro->banner."_status","1");
		$rs = $this->db->get();
		return $rs->result_array();
		
	} 
	
	/*=======
	 function category 
	 parameter :-- id 
	 table :-- category 
	 working :-- fetching record 		 
	 return type array 
	 date 03/14/2017
	 written by pravin 
	=====*/
	public function category($id="")
	{   
		if(!empty($id)){
			$this->db->where($this->pro->category.'_id',$id);
		}
		$this->db->select($this->pro->category."_title as Name,".$this->pro->category.'_id as Id');
		$this->db->from($this->pro->prifix.$this->pro->category);
		$this->db->where($this->pro->category.'_status','1');
		$rs = $this->db->get();
		return $rs->result_array();
		
	} 
	   
	/*=======
	 function product 
	 parameter :-- 
	 searching varibles
	 table :-- post 
	 working :-- fetching record		 
	 return type array 
	 date 03/09/2017
	 written by pravin 
	=====*/
	
	public function product($cid)
	{
		$this->db->select('*');
		$this->db->where($this->pro->product."_category_id",$cid);
		$this->db->from($this->pro->prifix.$this->pro->product);
		$this->db->order_by($this->pro->product.'_id','desc');
		$this->db->where($this->pro->product.'_type','0');
		$this->db->where($this->pro->product.'_status','1');
		$this->db->limit('10');
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
		$this->db->where($this->pro->product.'_status','1');
		$rs = $this->db->get();
		//echo $this->db->last_query();
		return $rs->row_array();
		
	}

	/*=======
	 function productByKey
	 parameter :-- 
	 searching varibles
	 table :-- post 
	 working :-- fetching record		 
	 return type array 
	 date 03/09/2017
	 written by pravin 
	=====*/
	
	public function productByKey($key)
	{
		$this->db->select('*');
		$this->db->from($this->pro->prifix.$this->pro->product);
		$this->db->where($this->pro->product."_title like '$key%'",null,false);
		$this->db->where($this->pro->product.'_status','1');
		$this->db->limit(5);
		$rs = $this->db->get();
		//echo $this->db->last_query();
		return $rs->result_array();
		
	}
	
	/*=======
	 function product_unit 
	 parameter :-- id 
	 table :-- post 
	 working :-- fetching record 		 
	 return type array 
	 date 03/14/2017
	 written by pravin 
	=====*/
	public function product_unit($id,$uid="")
	{   
		if(!empty($uid)){
			
			$this->db->where($this->pro->productunit.'_id',$uid);
		}
		$this->db->select("*");
		$this->db->from($this->pro->prifix.$this->pro->productunit);
		$this->db->where($this->pro->productunit.'_product_id',$id);
		$rs = $this->db->get();
		return $rs->result_array();
		
	}
	
	/*=======
	 function productUnitById 
	 parameter :-- id 
	 table :-- post 
	 working :-- fetching record 		 
	 return type array 
	 date 03/14/2017
	 written by pravin 
	=====*/
	public function productUnitById($id,$uid="")
	{   	
		$this->db->where($this->pro->productunit.'_id',$uid);
		$this->db->select("*");
		$this->db->from($this->pro->prifix.$this->pro->productunit);
		$this->db->where($this->pro->productunit.'_product_id',$id);
		$rs = $this->db->get();
		return $rs->row_array();
		
	}
	
	/*=======
	 function product_gallery 
	 parameter :-- id 
	 table :-- post 
	 working :-- fetching record 
	 return type array 
	 date 03/14/2017
	 written by pravin 
	=====*/
	public function product_gallery($id,$gid="")
	{   
		if(!empty($gid)){
			
			$this->db->where($this->pro->productimage.'_id',$gid);
		}
		$this->db->select("*");
		$this->db->from($this->pro->prifix.$this->pro->productimage);
		$this->db->where($this->pro->productimage.'_product_id',$id);
		$rs = $this->db->get();
		return $rs->result_array();
		
	}
	
	/*=======
	 function combo 
	 parameter :-- 
	 searching varibles
	 table :-- post 
	 working :-- fetching record		 
	 return type array 
	 date 03/09/2017
	 written by pravin 
	=====*/
	
	public function combo()
	{
		$this->db->select('*');
		$this->db->from($this->pro->prifix.$this->pro->product);
		$this->db->order_by($this->pro->product.'_id','desc');
		$this->db->where($this->pro->product.'_type','1');
		$this->db->where($this->pro->product.'_status','1');
		$this->db->limit('10');
		$rs = $this->db->get();
		//echo $this->db->last_query();
		return $rs->result_array();
		
	}
	
	/*=======
	 function combo 
	 parameter :-- 
	 searching varibles
	 table :-- post 
	 working :-- fetching record		 
	 return type array 
	 date 03/09/2017
	 written by pravin 
	=====*/
	
	public function supperdeal()
	{
		$this->db->select('*');
		$this->db->from($this->pro->prifix.$this->pro->product);
		//$this->db->order_by($this->pro->product.'_id','desc');
		$this->db->where($this->pro->product.'_supperdeal','1');
		$this->db->where($this->pro->product.'_status','1');
		$this->db->limit('5');
		$rs = $this->db->get();
		//echo $this->db->last_query();
		return $rs->result_array();
		
	}
	
	
	
}



?>