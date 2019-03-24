<?php 
defined("BASEPATH") or exit("direct script not allowed");

class Brand_model extends CI_Model{
	
	 public function __construct(){
		 parent::__construct();
		 
	 }
	   
		
		/*=======
		 function add 
		 parameter data assoc array 
         for brand table		 
		 return type int 
		 date 03/09/2017
		 written by pravin 
		=====*/
		
		public function add($add_data){
			
			$id=$this->db->insert($this->pro->prifix.$this->pro->brand,$add_data);
			return $this->db->insert_id();
		}
		
		
		public function name_dupli($name,$id=""){
			$this->db->select($this->pro->brand."_id");
			$this->db->from($this->pro->prifix.$this->pro->brand);
			if($id !=""){
				$this->db->where($this->pro->brand."_id !=",$id);
			}
            
			$this->db->where($this->pro->brand."_title",$name);
			$rs = $this->db->get();
		    $count = $rs->num_rows();
			
			if($count > 0)
			{
				 $this->session->set_flashdata("name1","Brand Already Exists");
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
         table :-- brand 
         working :-- counting allrecord		 
		 return type int 
		 date 03/09/2017
		 written by pravin 
		=====*/
		public function allrecord($title)
		{
			$this->db->select('*');
			$this->db->from($this->pro->prifix.$this->pro->brand);
			
			if($title !='0' )
			{
				 $this->db->like($this->pro->brand.'_title',$title);
			}
			
			$rs = $this->db->get();
			return $rs->num_rows();
		}
	    
		
		/*=======
		 function brand_data 
		 parameter :-- offset,limit
		 searching varibles
         table :-- brand 
         working :-- fetching allrecord		 
		 return type array 
		 date 03/09/2017
		 written by pravin 
		=====*/
		
		public function brand_data($offset,$limit,$title)
		{
			$this->db->select('*');
			$this->db->from($this->pro->prifix.$this->pro->brand);
			
			if($title !='0' )
			{
				 $this->db->like($this->pro->brand.'_title',$title);
			}
			
			$this->db->order_by($this->pro->brand.'_id','desc');
			$this->db->limit($limit,$offset);
			$rs = $this->db->get();
			//echo $this->db->last_query();
			return $rs->result_array();
			
		}
		
		
		/*=======
		 function ed_data 
		 parameter :-- id 
         table :-- brand 
         working :-- fetching record of single row		 
		 return type array 
		 date 03/14/2017
		 written by pravin 
		=====*/
		public function ed_data($id)
		{   
		    $this->db->select("*");
		    $this->db->from($this->pro->prifix.$this->pro->brand);
		    $this->db->where($this->pro->brand.'_id',$id);
		    $rs = $this->db->get();
		    return $rs->row_array();
			
		}
		

		
		
		/*=======
		 function comp_name 
		 parameter :-- id 
         table :-- brand 
         working :-- fetching record of single row		 
		 return type array 
		 date 03/14/2017
		 written by pravin 
		=====*/
		public function comp_name($id){
			$this->db->select($this->pro->brand."_name");
			$this->db->from($this->pro->prifix.$this->pro->brand);
			$this->db->where($this->pro->brand."_id",$id);
			$rs = $this->db->get();
			return $rs->row_array();
		}
		
			/*=======
		 function update 
		 parameter :--form data,id 
         table :-- brand 
         working :-- updating record of table	 
		 return type int
		 date 03/14/2017
		 written by pravin 
		=====*/
		public function update($data,$id){
			
			 $this->db->where($this->pro->brand."_id",$id);
			 $edit = $this->db->update($this->pro->prifix . $this->pro->brand,$data);
			 return $edit;
		}
		
			/*=======
		 function update 
		 parameter :--id 
         table :-- brand 
         working :-- delete record from table	 
		 return type int
		 date 03/14/2017
		 written by pravin 
		=====*/
		public function delete($id){
			
			 $this->db->where($this->pro->brand."_id",$id);
			 $del = $this->db->delete($this->pro->prifix . $this->pro->brand);
			 return $del;
		}
	    

	
}



?>