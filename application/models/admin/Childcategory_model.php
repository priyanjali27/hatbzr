<?php 
defined("BASEPATH") or exit("direct script not allowed");

class Childcategory_model extends CI_Model{
	
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
		$this->db->where($this->pro->category.'_parent>',0);
		$this->db->where($this->pro->category.'_subparent',0);
		$this->db->select($this->pro->category."_id,".$this->pro->category."_title");
		$this->db->from($this->pro->prifix.$this->pro->category);
		$rs = $this->db->get();
		//echo $this->db->last_query();
		return $rs->result_array();
		
	}
	/*=======
	 function add 
	 parameter data assoc array 
	 for category table		 
	 return type int 
	 date 03/09/2017
	 written by pravin 
	=====*/
	
	public function add($add_data){
		
		$id=$this->db->insert($this->pro->prifix.$this->pro->category,$add_data);
		return $this->db->insert_id();
	}
	
	
	public function name_dupli($name,$id=""){
		$this->db->select($this->pro->category."_id");
		$this->db->from($this->pro->prifix.$this->pro->category);
		if($id !=""){
			$this->db->where($this->pro->category."_id !=",$id);
		}
		
		$this->db->where($this->pro->category."_title",$name);
		$rs = $this->db->get();
		$count = $rs->num_rows();
		
		if($count > 0)
		{
			 $this->session->set_flashdata("name1","Category Already Exists");
			 return false;
		}
		else{
			 $this->session->set_flashdata("name1","");
			 return true;
		}
		
	}
	
	
	
	/*=======
	 function allrecord 
	 parameter searching varibles
	 table :-- category 
	 working :-- counting allrecord		 
	 return type int 
	 date 03/09/2017
	 written by pravin 
	=====*/
	public function allrecord($title,$category)
	{
		$this->db->select('*');
		$this->db->from($this->pro->prifix.$this->pro->category);
		$this->db->where($this->pro->category.'_parent>',0);
		$this->db->where($this->pro->category.'_subparent>',0);
		
		if($category !='0' )
		{
			 $this->db->like($this->pro->category.'_parent',$category);
		}
		
		if($title !='0' )
		{
			 $this->db->like($this->pro->category.'_title',$title);
		}
		
		$rs = $this->db->get();
		return $rs->num_rows();
	}
	
	
	/*=======
	 function category_data 
	 parameter :-- offset,limit
	 searching varibles
	 table :-- category 
	 working :-- fetching allrecord		 
	 return type array 
	 date 03/09/2017
	 written by pravin 
	=====*/
	
	public function category_data($offset,$limit,$title,$category)
	{
		$this->db->select('b.*,a.'.$this->pro->category.'_title as category');
		$this->db->from($this->pro->prifix.$this->pro->category.' as a');
		$this->db->join($this->pro->prifix.$this->pro->category.' as b','b.'.$this->pro->category.'_parent=a.'.$this->pro->category.'_id','inner');
		$this->db->where('b.'.$this->pro->category.'_parent>',0);
		$this->db->where('b.'.$this->pro->category.'_subparent>',0);
		
		if($category !='0' )
		{
			 $this->db->like('b.'.$this->pro->category.'_parent',$category);
		}
		
		if($title !='0' )
		{
			 $this->db->like('b.'.$this->pro->category.'_title',$title);
		}
		
		$this->db->order_by($this->pro->category.'_id','desc');
		$this->db->limit($limit,$offset);
		$rs = $this->db->get();
		//echo $this->db->last_query();
		return $rs->result_array();
		
	}
	
	
	/*=======
	 function ed_data 
	 parameter :-- id 
	 table :-- category 
	 working :-- fetching record of single row		 
	 return type array 
	 date 03/14/2017
	 written by pravin 
	=====*/
	public function ed_data($id)
	{   
		$this->db->select("*");
		$this->db->from($this->pro->prifix.$this->pro->category);
		$this->db->where($this->pro->category.'_id',$id);
		$rs = $this->db->get();
		return $rs->row_array();
		
	}

	
	/*=======
	 function comp_name 
	 parameter :-- id 
	 table :-- category 
	 working :-- fetching record of single row		 
	 return type array 
	 date 03/14/2017
	 written by pravin 
	=====*/
	public function comp_name($id){
		$this->db->select($this->pro->category."_name");
		$this->db->from($this->pro->prifix.$this->pro->category);
		$this->db->where($this->pro->category."_id",$id);
		$rs = $this->db->get();
		return $rs->row_array();
	}
	
	/*=======
	 function update 
	 parameter :--form data,id 
	 table :-- category 
	 working :-- updating record of table	 
	 return type int
	 date 03/14/2017
	 written by pravin 
	=====*/
	public function update($data,$id){
		
		 $this->db->where($this->pro->category."_id",$id);
		 $edit = $this->db->update($this->pro->prifix . $this->pro->category,$data);
		 return $edit;
	}
	
	/*=======
	 function update 
	 parameter :--id 
	 table :-- category 
	 working :-- delete record from table	 
	 return type int
	 date 03/14/2017
	 written by pravin 
	=====*/
	public function delete($id){
		
		 $this->db->where($this->pro->category."_id",$id);
		 $del = $this->db->delete($this->pro->prifix . $this->pro->category);
		 return $del;
	}
	    
}

?>