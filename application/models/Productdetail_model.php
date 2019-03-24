<?php 
defined("BASEPATH") or exit("direct script not allowed");

class Productdetail_model extends CI_Model{
	
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
	
	public function product($url)
	{
		$this->db->select('*');
		$this->db->from($this->pro->prifix.$this->pro->product);
		$this->db->like($this->pro->product.'_url',$url);
		$this->db->order_by($this->pro->product.'_id','desc');
		$this->db->where($this->pro->product.'_status','1');
		$rs = $this->db->get();
		//echo $this->db->last_query();
		return $rs->row_array();
		
	}


	/*=======
	 function relatedProduct 
	 parameter :-- offset,limit
	 searching varibles
	 table :-- relatedProduct 
	 working :-- fetching allrecord		 
	 return type array 
	 date 03/09/2017
	 written by pravin 
	=====*/
	
	public function relatedProduct($pid,$category,$subcategory,$childcategory)
	{
		$this->db->select('*');
		$this->db->from($this->pro->prifix.$this->pro->product);
		$this->db->where($this->pro->product.'_category_id',$category);
		$this->db->where($this->pro->product.'_id !=',$pid);
		if($subcategory){
			$this->db->where($this->pro->product.'_subcategory_id',$subcategory);
		}
		if($childcategory){
			$this->db->where($this->pro->product.'_childcategory_id',$childcategory);
		}
		
		$this->db->order_by($this->pro->product.'_id','desc');
		$this->db->where($this->pro->product.'_status','1');
		$this->db->limit(10);
		$rs = $this->db->get();
		//echo $this->db->last_query();
		return $rs->result_array();
		
	}


	/*=======
	 function productImages 
	 parameter :-- offset,limit
	 searching varibles
	 table :-- productImages 
	 working :-- fetching allrecord		 
	 return type array 
	 date 03/09/2017
	 written by pravin 
	=====*/
	
	public function productImages($pid)
	{
		$this->db->select('*');
		$this->db->from($this->pro->prifix.$this->pro->productimage);
		$this->db->like($this->pro->productimage.'_product_id',$pid);
		$this->db->order_by($this->pro->productimage.'_id','desc');
		$this->db->where($this->pro->productimage.'_status','1');
		$rs = $this->db->get();
		//echo $this->db->last_query();
		return $rs->result_array();
		
	}


	public function productImagesColorWise($pid,$colorId)
	{
		$this->db->select('*');
		$this->db->from($this->pro->prifix.$this->pro->productimage);
		$this->db->where($this->pro->productimage.'_product_id',$pid);
		$this->db->where($this->pro->productimage.'_color_id',$colorId);
		$this->db->order_by($this->pro->productimage.'_id','desc');
		$this->db->where($this->pro->productimage.'_status','1');
		$rs = $this->db->get();
		return $rs->result_array();
		
	}




	public function productColorWiseSize($pid,$colorId)
	{
		$this->db->select('*');
		$this->db->from($this->pro->prifix.$this->pro->size);
		$this->db->where($this->pro->size.'_product_id',$pid);
		$this->db->where($this->pro->size.'_color_id',$colorId);
		$this->db->order_by($this->pro->size.'_id','desc');
		$this->db->where($this->pro->size.'_status','1');
		$rs = $this->db->get();
		return $rs->result_array();
		
	}



	



	public function productColor($pid)
	{
		$this->db->select('*');
		$this->db->from($this->pro->prifix.'color');
		$this->db->where($this->pro->color.'_status','1');
		$this->db->where('color_product_id',$pid);
		$rs = $this->db->get();
		//echo $this->db->last_query();
		return $rs->result_array();
	}

	public function productAtribute($pid)
	{
		$this->db->select('*');
		$this->db->from($this->pro->prifix.$this->pro->atribute);
		$this->db->where($this->pro->atribute.'_status','1');
		$this->db->where($this->pro->atribute.'_product_id',$pid);
		$rs = $this->db->get();
		//echo $this->db->last_query();
		return $rs->result_array();
	}

	

}
