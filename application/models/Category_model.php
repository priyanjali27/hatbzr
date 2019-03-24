<?php 
defined("BASEPATH") or exit("direct script not allowed");

class Category_model extends CI_Model{
	
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
	 function subcategoryByCid 
	 parameter :-- 
	 table :-- banner 
	 working :-- fetching allrecord		 
	 return type array 
	 date 03/09/2017
	 written by pravin 
	=====*/
	
	public function subcategoryByCid($cid)
	{
		$this->db->select('*');
		$this->db->from($this->pro->prifix.$this->pro->category);
		$this->db->order_by($this->pro->category.'_id','desc');
		$this->db->where($this->pro->category.'_parent',$cid);
		$this->db->where($this->pro->category.'_status','1');
		$rs = $this->db->get();
		//echo $this->db->last_query();
		return $rs->result_array();
		
	}

	/*=======
	 function brands 
	 parameter :-- 
	 table :-- brands 
	 working :-- fetching allrecord		 
	 return type array 
	 date 03/09/2017
	 written by pravin 
	=====*/
	
	public function brands($category,$subcategory)
	{
		$this->db->select('*');
		$this->db->from($this->pro->prifix.$this->pro->brand);

		$this->db->join($this->pro->prifix.$this->pro->product,$this->pro->brand."_id=".$this->pro->product."_brand_id",'inner');
		$this->db->join($this->pro->prifix.$this->pro->category." cat",$this->pro->product."_category_id= cat.".$this->pro->category."_id",'inner');
		$this->db->join($this->pro->prifix.$this->pro->category." as subcat",$this->pro->product."_subcategory_id= subcat.".$this->pro->category."_id",'inner');


		if(!empty($subcategory)){
			$this->db->where("subcat.".$this->pro->category.'_title',$subcategory);
		}

		

		$this->db->where("cat.".$this->pro->category.'_title',$category);
		$this->db->group_by($this->pro->brand.'_id');
		$this->db->order_by($this->pro->brand.'_id','desc');
		$this->db->where($this->pro->brand.'_status','1');
		$rs = $this->db->get();
		//echo $this->db->last_query();
		return $rs->result_array();
		
	}

	/*=======
	 function brands 
	 parameter :-- 
	 table :-- brands 
	 working :-- fetching allrecord		 
	 return type array 
	 date 03/09/2017
	 written by pravin 
	=====*/
	
	public function colors($category,$subcategory)
	{
		$this->db->select('*');
		$this->db->from($this->pro->prifix.$this->pro->color);

		$this->db->join($this->pro->prifix.$this->pro->product,$this->pro->color."_product_id=".$this->pro->product."_id",'inner');
		$this->db->join($this->pro->prifix.$this->pro->category." cat",$this->pro->product."_category_id= cat.".$this->pro->category."_id",'inner');
		$this->db->join($this->pro->prifix.$this->pro->category." as subcat",$this->pro->product."_subcategory_id= subcat.".$this->pro->category."_id",'inner');


		if(!empty($subcategory)){
			$this->db->where("subcat.".$this->pro->category.'_title',$subcategory);
		}

		

		$this->db->where("cat.".$this->pro->category.'_title',$category);
		$this->db->group_by($this->pro->color.'_name');
		$rs = $this->db->get();
		//echo $this->db->last_query();
		return $rs->result_array();
		
	}


	/*=======
	 function size 
	 parameter :-- offset,limit
	 searching varibles
	 table :-- product 
	 working :-- fetching allrecord		 
	 return type array 
	 date 03/09/2017
	 written by pravin 
	=====*/
	
	public function size($category)
	{
		$this->db->select('*');
		$this->db->from($this->pro->prifix.$this->pro->size);
		$this->db->where_in($this->pro->size.'_color_id',$category);
		//$this->db->where($this->pro->size.'_status','1');
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
	
	public function product($category)
	{
		$this->db->select('*');
		$this->db->from($this->pro->prifix.$this->pro->product);
		$this->db->join($this->pro->prifix.$this->pro->category,$this->pro->product."_category_id=".$this->pro->category."_id",'inner');
		$this->db->like($this->pro->category.'_title',$category);
		$this->db->order_by($this->pro->product.'_id','desc');
		$this->db->where($this->pro->product.'_status','1');
		$rs = $this->db->get();
		//echo $this->db->last_query();
		return $rs->result_array();
		
	}


	/*=======
	 function product 
	 parameter :-- multiple atribute 
	 table :-- product 
	 working :-- fetching record according to filter 		 
	 return type array 
	 date 03/09/2017
	 written by pravin 
	=====*/
	
	public function productFilter($category,$price,$subcategory,$brand,$atribute,$size,$color)
	{	
		$atri_name_query="";
		$atri_value_query="";
		$atri_pro_id = array();
		if(!empty($atribute)){
			$atributes = explode('-', $atribute);
			foreach ($atributes as $key => $value) {
				$atri_data = explode('_', $value);
				//print_r($atri_data);
				$atri_val = $atri_data[0];
				$atri_key = $atri_data[1];

				if($key==0){
					$atri_name_query .= $this->pro->atribute."_name like '%$atri_key%'";
				}else{
					$atri_name_query .= " or ".$this->pro->atribute."_name like '%$atri_key%'";
				}

				if($key==0){
					$atri_value_query .= $this->pro->atribute."_value like '%$atri_val%'";
				}else{
					$atri_value_query .= " or ".$this->pro->atribute."_value like '%$atri_val%'";
				}
				
			}
			$this->db->select($this->pro->atribute.'_product_id');
			$this->db->from($this->pro->prifix.$this->pro->atribute);
			$this->db->group_by($this->pro->atribute.'_product_id');
			$this->db->where('('.$atri_name_query.')',null,false);
			$this->db->where('('.$atri_value_query.')',null,false);
			$ars = $this->db->get();
		    //echo $this->db->last_query();
		    $atri_pro_idss = $ars->result_array();
		    foreach ($atri_pro_idss as $atri_pro_ids) {
		    	$atri_pro_id[]=$atri_pro_ids[$this->pro->atribute.'_product_id'];
		    }

		}

		$this->db->select('*');
		$this->db->from($this->pro->prifix.$this->pro->product);
		$this->db->join($this->pro->prifix.$this->pro->category,$this->pro->product."_category_id=".$this->pro->category."_id",'inner');

		if(!empty($color)){
			$this->db->join($this->pro->prifix.$this->pro->color,$this->pro->product."_id=".$this->pro->color."_product_id",'inner');
			$this->db->where_in($this->pro->color."_id",explode('-',$color));
		}


		if(!empty($size)){
			$this->db->join($this->pro->prifix.$this->pro->size,$this->pro->product."_id=".$this->pro->size."_product_id",'inner');
			$this->db->where_in($this->pro->size."_id",explode('-',$size));
		}
		
		

		if (!empty($atri_pro_id)) {
			$this->db->where_in($this->pro->product.'_id',$atri_pro_id);
		}


		if(!empty($price)){
			$priceArray = explode(",",$price);
			if(isset($price[0])){
				$this->db->where($this->pro->product.'_sellprice>=',$priceArray[0]);
			}

			if(isset($price[1])){
				$this->db->where($this->pro->product.'_sellprice<=',$priceArray[1]);
			}

		}

		if(!empty($subcategory)){
			$this->db->where_in($this->pro->product.'_subcategory_id',explode('-', $subcategory));
		}



		if(!empty($brand)){
			$this->db->where_in($this->pro->product.'_brand_id',explode('-', $brand));
		}

		$this->db->group_by($this->pro->product.'_id');
		$this->db->where($this->pro->category.'_title',$category);
		$this->db->order_by($this->pro->product.'_id','desc');
		$this->db->where($this->pro->product.'_status','1');
		$rs = $this->db->get();
		//echo $this->db->last_query();
		return $rs->result_array();
		
	}

	
	/*=======
	 function atributes 
	 parameter :-- category subcategory
	 table :-- atributes and product  
	 working :-- fetching record 
	 return type array 
	 date 03/09/2017
	 written by pravin 
	=====*/
	
	public function atributes($category,$subcategory)
	{
		$this->db->select($this->pro->atribute.'_id,'.$this->pro->atribute.'_name,'.$this->pro->atribute.'_value');
		$this->db->from($this->pro->prifix.$this->pro->atribute);
		$this->db->join($this->pro->prifix.$this->pro->product,$this->pro->atribute."_product_id=".$this->pro->product."_id",'inner');
		$this->db->join($this->pro->prifix.$this->pro->category." cat",$this->pro->product."_category_id= cat.".$this->pro->category."_id",'inner');
		$this->db->join($this->pro->prifix.$this->pro->category." as subcat",$this->pro->product."_subcategory_id= subcat.".$this->pro->category."_id",'inner');


		if(!empty($subcategory)){
			$this->db->where("subcat.".$this->pro->category.'_title',$subcategory);
		}

		

		$this->db->where("cat.".$this->pro->category.'_title',$category);
		$this->db->order_by($this->pro->product.'_id','desc');
		$this->db->where($this->pro->product.'_status','1');
		$rs = $this->db->get();
		//
		//echo $this->db->last_query();
		return $rs->result_array();
		
	}

}