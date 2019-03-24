<?php 
defined("BASEPATH") or exit("direct script not allowed");

class Pincode_model extends CI_Model{
	
	 public function __construct(){
		 parent::__construct();
		 
	 }
	   
		
		/*=======
		 function add 
		 parameter data assoc array 
         for pincode table		 
		 return type int 
		 date 03/09/2017
		 written by pravin 
		=====*/
		
		public function add($add_data){
			
			$id=$this->db->insert($this->pro->prifix.$this->pro->pincode,$add_data);
			return $this->db->insert_id();
		}
		
		
		public function name_dupli($name,$id=""){
			$this->db->select($this->pro->pincode."_id");
			$this->db->from($this->pro->prifix.$this->pro->pincode);
			if($id !=""){
				$this->db->where($this->pro->pincode."_id !=",$id);
			}
            
			$this->db->where($this->pro->pincode."_title",$name);
			 $rs = $this->db->get();
		     $count = $rs->num_rows();
			
			if($count > 0)
			{
				 $this->session->set_flashdata("name1","pincode Already Exists");
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
         table :-- pincode 
         working :-- counting allrecord		 
		 return type int 
		 date 03/09/2017
		 written by pravin 
		=====*/
		public function allrecord($title)
		{
			$this->db->select('*');
			$this->db->from($this->pro->prifix.$this->pro->pincode);
			if($title !='0' )
			{
				 $this->db->like($this->pro->pincode.'_title',$title);
			}
			
			$rs = $this->db->get();
			return $rs->num_rows();
		}
	    
		
		/*=======
		 function pincode_data 
		 parameter :-- offset,limit
		 searching varibles
         table :-- pincode 
         working :-- fetching allrecord		 
		 return type array 
		 date 03/09/2017
		 written by pravin 
		=====*/
		
		public function pincode_data($offset,$limit,$title)
		{
			$this->db->select('*');
			$this->db->from($this->pro->prifix.$this->pro->pincode);
			if($title !='0' )
			{
				 $this->db->like($this->pro->pincode.'_title',$title);
			}
			
			$this->db->order_by($this->pro->pincode.'_id','desc');
			$this->db->limit($limit,$offset);
			$rs = $this->db->get();
			//echo $this->db->last_query();
			return $rs->result_array();
			
		}
		
		
		/*=======
		 function ed_data 
		 parameter :-- id 
         table :-- pincode 
         working :-- fetching record of single row		 
		 return type array 
		 date 03/14/2017
		 written by pravin 
		=====*/
		public function ed_data($id)
		{   
		    $this->db->select("*");
		    $this->db->from($this->pro->prifix.$this->pro->pincode);
		    $this->db->where($this->pro->pincode.'_id',$id);
		    $rs = $this->db->get();
		    return $rs->row_array();
			
		}
		

		
		
		/*=======
		 function comp_name 
		 parameter :-- id 
         table :-- pincode 
         working :-- fetching record of single row		 
		 return type array 
		 date 03/14/2017
		 written by pravin 
		=====*/
		public function comp_name($id){
			$this->db->select($this->pro->pincode."_name");
			$this->db->from($this->pro->prifix.$this->pro->pincode);
			$this->db->where($this->pro->pincode."_id",$id);
			$rs = $this->db->get();
			return $rs->row_array();
		}
		
			/*=======
		 function update 
		 parameter :--form data,id 
         table :-- pincode 
         working :-- updating record of table	 
		 return type int
		 date 03/14/2017
		 written by pravin 
		=====*/
		public function update($data,$id){
			
			 $this->db->where($this->pro->pincode."_id",$id);
			 $edit = $this->db->update($this->pro->prifix . $this->pro->pincode,$data);
			 return $edit;
		}
		
			/*=======
		 function update 
		 parameter :--id 
         table :-- pincode 
         working :-- delete record from table	 
		 return type int
		 date 03/14/2017
		 written by pravin 
		=====*/
		public function delete($id){
			
			 $this->db->where($this->pro->pincode."_id",$id);
			 $del = $this->db->delete($this->pro->prifix . $this->pro->pincode);
			 return $del;
		}
	    

	
}



?>