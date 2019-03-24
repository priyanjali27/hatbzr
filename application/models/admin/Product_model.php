<?php 
defined("BASEPATH") or exit("direct script not allowed");

class Product_model extends CI_Model{
	
	 public function __construct(){
		 parent::__construct();
		 
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
		$this->db->where($this->pro->category.'_parent',0);
		$this->db->select($this->pro->category."_id,".$this->pro->category."_title");
		$this->db->from($this->pro->prifix.$this->pro->category);
		$rs = $this->db->get();
		return $rs->result_array();
		
	}
	
	/*=======
	 function Subcategory 
	 parameter :-- id 
	 table :-- category 
	 working :-- fetching record 		 
	 return type array 
	 date 03/14/2017
	 written by pravin 
	=====*/
	public function subcategory($id="")
	{   

		$this->db->where($this->pro->category.'_parent',$id);
		$this->db->select($this->pro->category."_id,".$this->pro->category."_title");
		$this->db->from($this->pro->prifix.$this->pro->category);
		$rs = $this->db->get();
		//echo $this->db->last_query();
		return $rs->result_array();
		
	}

	/*=======
	 function SubcategoryView 
	 parameter :-- id 
	 table :-- category 
	 working :-- fetching record 		 
	 return type array 
	 date 03/14/2017
	 written by pravin 
	=====*/
	public function subcategoryview($id="")
	{   

		$this->db->where($this->pro->category.'_id',$id);
		$this->db->select($this->pro->category."_id,".$this->pro->category."_title");
		$this->db->from($this->pro->prifix.$this->pro->category);
		$rs = $this->db->get();
		//echo $this->db->last_query();
		return $rs->result_array();
		
	}

	/*=======
	 function Subcategory 
	 parameter :-- id 
	 table :-- category 
	 working :-- fetching record 		 
	 return type array 
	 date 03/14/2017
	 written by pravin 
	=====*/
	public function childcategory($id="")
	{   

		$this->db->where($this->pro->category.'_parent',$id);
		$this->db->select($this->pro->category."_id,".$this->pro->category."_title");
		$this->db->from($this->pro->prifix.$this->pro->category);
		$rs = $this->db->get();
		//echo $this->db->last_query();
		return $rs->result_array();
		
	}

	/*=======
	 function childcategoryview 
	 parameter :-- id 
	 table :-- category 
	 working :-- fetching record 		 
	 return type array 
	 date 03/14/2017
	 written by pravin 
	=====*/
	public function childcategoryview($id="")
	{   

		$this->db->where($this->pro->category.'_id',$id);
		$this->db->select($this->pro->category."_id,".$this->pro->category."_title");
		$this->db->from($this->pro->prifix.$this->pro->category);
		$rs = $this->db->get();
		//echo $this->db->last_query();
		return $rs->result_array();
		
	}


	
	/*=======
	 function brand 
	 parameter :-- id 
	 table :-- brand 
	 working :-- fetching record 		 
	 return type array 
	 date 03/14/2017
	 written by pravin 
	=====*/
	public function brand($id="")
	{   
		if(!empty($id)){
			$this->db->where($this->pro->brand.'_id',$id);
		}
		$this->db->select($this->pro->brand."_id,".$this->pro->brand."_title");
		$this->db->from($this->pro->prifix.$this->pro->brand);
		$rs = $this->db->get();
		return $rs->result_array();
		
	}
	
	/*=======
	 function add 
	 parameter data assoc array 
	 for post table		 
	 return type int 
	 date 03/09/2017
	 written by pravin 
	=====*/
	
	public function add($add_data){
		
		$id=$this->db->insert($this->pro->prifix.$this->pro->product,$add_data);
		return $this->db->insert_id();
	}
	
	
	public function title_dupli($title,$id=""){
		$this->db->select($this->pro->product."_id");
		$this->db->from($this->pro->prifix.$this->pro->product);
		if($id !=""){
			$this->db->where($this->pro->product."_id !=",$id);
		}
		$this->db->where($this->pro->product."_title",$title);
		$rs = $this->db->get();
		$count = $rs->num_rows();
		if($count > 0)
		{
			 $this->session->set_flashdata("name1","Title Already Exists");
			 return false;
		}
		else{
			 $this->session->set_flashdata("name1","");
			 return true;
		}
		
	}
	
	
	public function url_dupli($url,$id=""){
		$this->db->select($this->pro->product."_id");
		$this->db->from($this->pro->prifix.$this->pro->product);
		if($id !=""){
			$this->db->where($this->pro->product."_id !=",$id);
		}
		$this->db->where($this->pro->product."_url",$url);
		$rs = $this->db->get();
		$count = $rs->num_rows();
		if($count > 0)
		{
			 $this->session->set_flashdata("link1","Url Already Exists");
			 return false;
		}
		else{
			 $this->session->set_flashdata("url1","");
			 return true;
		}
		
	}
	
	
	/*=======
	 function allrecord 
	 parameter searching varibles
	 table :-- post 
	 working :-- counting allrecord		 
	 return type int 
	 date 03/09/2017
	 written by pravin 
	=====*/
	public function allrecord($category,$title)
	{
		$this->db->select('*');
		$this->db->from($this->pro->prifix.$this->pro->product);
		if($category !='0' )
		{
			 $this->db->like($this->pro->product.'_category_id',$category);
		}
		if($title !='0' )
		{
			 $this->db->like($this->pro->product.'_title',$title);
		}
		$rs = $this->db->get();
		return $rs->num_rows();
	}
	
	
	/*=======
	 function company_data 
	 parameter :-- offset,limit
	 searching varibles
	 table :-- post 
	 working :-- fetching allrecord		 
	 return type array 
	 date 03/09/2017
	 written by pravin 
	=====*/
	
	public function company_data($offset,$limit,$category,$title)
	{
		$this->db->select('*');
		$this->db->from($this->pro->prifix.$this->pro->product);
		if($category !='0' )
		{
			 $this->db->like($this->pro->product.'_category_id',$category);
		}
		if($title !='0' )
		{
			 $this->db->like($this->pro->product.'_title',$title);
		}
		$this->db->order_by($this->pro->product.'_id','desc');
		$this->db->limit($limit,$offset);
		$rs = $this->db->get();
		//echo $this->db->last_query();
		return $rs->result_array();
		
	}
	
	
	/*=======
	 function ed_data 
	 parameter :-- id 
	 table :-- post 
	 working :-- fetching record of single row		 
	 return type array 
	 date 03/14/2017
	 written by pravin 
	=====*/
	public function ed_data($id)
	{   
		$this->db->select("*");
		$this->db->from($this->pro->prifix.$this->pro->product);
		$this->db->where($this->pro->product.'_id',$id);
		$rs = $this->db->get();
		return $rs->row_array();
		
	}
	
	
	/*=======
	 function ed_data_image 
	 parameter :-- id 
	 table :-- post 
	 working :-- fetching record of single row		 
	 return type array 
	 date 03/14/2017
	 written by pravin 
	=====*/
	public function ed_data_gallery($id,$gid="")
	{   
		if(!empty($gid)){
			
			$this->db->where($this->pro->productimage.'_id',$gid);
		}
		$this->db->select("*");
		$this->db->from($this->pro->prifix.$this->pro->productimage);
		$this->db->where($this->pro->productimage.'_product_id',$id);
		$this->db->where($this->pro->productimage.'_color_id',0);
		$rs = $this->db->get();
		return $rs->result_array();
		
	}

	/*=======
	 function color 
	 parameter :-- id 
	 table :-- post 
	 working :-- fetching record of single row		 
	 return type array 
	 date 03/14/2017
	 written by pravin 
	=====*/
	public function color($id,$cid="")
	{   
		if(!empty($cid)){
			
			$this->db->where($this->pro->color.'_id',$cid);
		}
		$this->db->select("*");
		$this->db->from($this->pro->prifix.$this->pro->color);
		$this->db->where($this->pro->color.'_product_id',$id);
		$rs = $this->db->get();
		return $rs->result_array();
		
	}

	/*=======
	 function Size 
	 parameter :-- id 
	 table :-- post 
	 working :-- fetching record of single row		 
	 return type array 
	 date 03/14/2017
	 written by pravin 
	=====*/
	public function size($id,$cid,$sid="")
	{   
		if(!empty($sid)){
			
			$this->db->where($this->pro->size.'_id',$sid);
		}
		$this->db->select("*");
		$this->db->from($this->pro->prifix.$this->pro->size);
		$this->db->where($this->pro->size.'_product_id',$id);
		$this->db->where($this->pro->size.'_color_id',$cid);
		$rs = $this->db->get();
		//echo $this->db->last_query();
		return $rs->result_array();
		
	}


	/*=======
	 function gallery 
	 parameter :-- id 
	 table :-- post 
	 working :-- fetching record of single row		 
	 return type array 
	 date 03/14/2017
	 written by pravin 
	=====*/
	public function gallery($id,$cid,$gid="")
	{   
		if(!empty($gid)){
			
			$this->db->where($this->pro->productimage.'_id',$gid);
		}
		$this->db->select("*");
		$this->db->from($this->pro->prifix.$this->pro->productimage);
		$this->db->where($this->pro->productimage.'_product_id',$id);
		$this->db->where($this->pro->productimage.'_color_id',$cid);
		$rs = $this->db->get();
		return $rs->result_array();
		
	}
	
	/*=======
	 function Atribute 
	 parameter :-- id 
	 table :-- post 
	 working :-- fetching record of single row		 
	 return type array 
	 date 03/14/2017
	 written by pravin 
	=====*/
	public function atribute($id,$aid="")
	{   
		if(!empty($cid)){
			
			$this->db->where($this->pro->atribute.'_id',$aid);
		}
		$this->db->select("*");
		$this->db->from($this->pro->prifix.$this->pro->atribute);
		$this->db->where($this->pro->atribute.'_product_id',$id);
		$rs = $this->db->get();
		return $rs->result_array();
		
	}
	
	
	
	/*=======
	 function update 
	 parameter :--form data,id 
	 table :-- post 
	 working :-- updating record of table	 
	 return type int
	 date 03/14/2017
	 written by pravin 
	=====*/
	public function update($data,$id){
		
		 $this->db->where($this->pro->product."_id",$id);
		 $edit = $this->db->update($this->pro->prifix . $this->pro->product,$data);
		 return $edit;
	}
	
   /*=======
	 function update 
	 parameter :--id 
	 table :-- post 
	 working :-- delete record from table	 
	 return type int
	 date 03/14/2017
	 written by pravin 
	=====*/
	public function delete($id){
		
		 $this->db->where($this->pro->product."_id",$id);
		 $del = $this->db->delete($this->pro->prifix . $this->pro->product);
		 return $del;
	}
	
	
   /*=======
	 function del_gallery 
	 parameter :--id 
	 table :-- post 
	 working :-- delete record from table	 
	 return type int
	 date 03/14/2017
	 written by pravin 
	=====*/
	public function del_gallery($id,$gid){
		
		 $this->db->where($this->pro->productimage."_id",$gid);
		 $this->db->where($this->pro->productimage."_product_id",$id);
		 $del = $this->db->delete($this->pro->prifix . $this->pro->productimage);
		 return $del;
	}


    public function deleteColorTableRecord($color,$product)
    {
    	 $this->db->where($this->pro->color."_id",$color);
		 $this->db->where($this->pro->color."_product_id",$product);
		 $del = $this->db->delete($this->pro->prifix . $this->pro->color);
		 return $del;	
    }

    public function deleteColorSizeData($color,$product)
    {
			 $this->db->where(array($this->pro->size."_color_id"=>$color,$this->pro->size."_product_id"=>$product));
			 $del = $this->db->delete($this->pro->prifix . $this->pro->size);
			 return $del;			
    }

    public function getImageNameByColorSize($colorId,$productId)
    {
	    $this->db->select('*');
	    $this->db->from($this->pro->prifix.$this->pro->productimage);
	    $this->db->where($this->pro->productimage."_product_id",$productId);
	    $this->db->where($this->pro->productimage."_color_id",$colorId);
	    $result_image = $this->db->get()->result_array();
	    if(count($result_image) > 0)
	    {
	    	foreach ($result_image as $key => $value) 
	    	{
	    		if($value[$this->pro->productimage.'_name'] != '')
	    		{
	    			unlink('upload/'.$value[$this->pro->productimage.'_name']);
	    		}
	    	}

	    }
	    	$this->db->where($this->pro->productimage."_product_id",$productId);
	        $this->db->where($this->pro->productimage."_color_id",$colorId);
			 $del = $this->db->delete($this->pro->prifix.$this->pro->productimage);
			 return $productId;

    }

	
}



?>