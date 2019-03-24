<?php 
defined("BASEPATH") or exit("direct script not allowed");

class Profile_model extends CI_Model{
	
	 public function __construct(){
		 parent::__construct();
		 
	 }

		
		/*=======
		 function allrecord 
		 parameter searching varibles
         table :-- profile 
         working :-- counting allrecord		 
		 return type int 
		 date 03/09/2017
		 written by pravin 
		=====*/
		public function allrecord($name)
		{
			if($name !='0' )
			{
				 $this->db->like($this->pro->profile.'_name',$name);
			}
			
			$rs = $this->db->get($this->pro->prifix.$this->pro->profile);
			return $rs->num_rows();
		}
	    
		
		/*=======
		 function profile_data 
		 parameter :-- offset,limit
		 searching varibles
         table :-- profile 
         working :-- fetching allrecord		 
		 return type array 
		 date 03/09/2017
		 written by pravin 
		=====*/
		
		public function profile_data($offset,$limit,$name)
		{
			
			if($name !='0'  )
			{
				$this->db->like($this->pro->profile.'_name',$name);
			}
			
			$this->db->order_by($this->pro->profile.'_id','desc');
			$this->db->limit($limit,$offset);
			$rs = $this->db->get($this->pro->prifix.$this->pro->profile);
			return $rs->result_array();
			
		}
		
		
		/*=======
		 function ed_data 
		 parameter :-- id 
         table :-- profile 
         working :-- fetching record of single row		 
		 return type array 
		 date 03/14/2017
		 written by pravin 
		=====*/
		public function ed_data($id)
		{
			$this->db->where($this->pro->profile.'_id',$id);
			$rs = $this->db->get($this->pro->prifix.$this->pro->profile);
			return $rs->row_array();
			
		}
		
			/*=======
		 function update 
		 parameter :--form data,id 
         table :-- profile 
         working :-- updating record of table	 
		 return type int
		 date 03/14/2017
		 written by pravin 
		=====*/
		public function update($data,$id){
			
			 $this->db->where($this->pro->profile."_id",$id);
			 $edit = $this->db->update($this->pro->prifix . $this->pro->profile,$data);
			 return $edit;
		}
		

	
}



?>