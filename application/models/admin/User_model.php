<?php 
defined("BASEPATH") or exit("direct script not allowed");

class User_model extends CI_Model{
	
	 public function __construct(){
		 parent::__construct();
		 
	 }
	  
		/*=======
		 function username email 
		 parameter email username 
         for user table		 
		 return type int 
		 date 03/09/2017
		 written by pravin 
		=====*/
		
		public function email($email,$id=""){
			if($id !='')
			{
				$this->db->where($this->pro->user."_id !=",$id);
			}
			$this->db->where($this->pro->user."_email",$email);
            $rs = $this->db->get($this->pro->prifix.$this->pro->user);	
			$rs->num_rows();
            if($rs->num_rows()>0)
			{
			  $this->session->set_flashdata("eouth","Email Already Exists");
			  return false;
			}else{
				 $this->session->set_flashdata("eouth","");
				 return true;
			}
										
		}
		
		public function username($username,$id=""){			
			if($id !='')
			{
				$this->db->where($this->pro->user."_id !=",$id);
			}
			$this->db->where($this->pro->user."_username",$username);
            $rs = $this->db->get($this->pro->prifix.$this->pro->user);	
            if($rs->num_rows()>0)
			{
			  $this->session->set_flashdata("uouth","Username Already Exists");
			  return false; 
			}else{
				 $this->session->set_flashdata("uouth","");
				 return true;
			}		
		}
		
		
		

		
		/*=======
		 function add 
		 parameter data assoc array 
         for user table		 
		 return type int 
		 date 03/09/2017
		 written by pravin 
		=====*/
		
		public function add($add_data){
			
			$id=$this->db->insert($this->pro->prifix.$this->pro->user,$add_data);	
			return $id;
		}
		
		/*=======
		 function allrecord 
		 parameter searching varibles
         table :-- user 
         working :-- counting allrecord		 
		 return type int 
		 date 03/09/2017
		 written by pravin 
		=====*/
		public function allrecord($name)
		{
			if($name !='0' )
			{
				 $this->db->like($this->pro->user.'_name',$name);
			}
			
			$this->db->where($this->pro->user.'_type!=','0');
			$rs = $this->db->get($this->pro->prifix.$this->pro->user);
			return $rs->num_rows();
		}
	    
		
		/*=======
		 function user_data 
		 parameter :-- offset,limit
		 searching varibles
         table :-- user 
         working :-- fetching allrecord		 
		 return type array 
		 date 03/09/2017
		 written by pravin 
		=====*/
		
		public function user_data($offset,$limit,$name)
		{
			
			$this->db->where($this->pro->user.'_type!=','0');
			if($name !='0'  )
			{
				$this->db->like($this->pro->user.'_name',$name);
				
			}
			
			
			$this->db->order_by($this->pro->user.'_id','desc');
			$this->db->limit($limit,$offset);
			$rs = $this->db->get($this->pro->prifix.$this->pro->user);
			return $rs->result_array();
			
		}
		
		
		/*=======
		 function ed_data 
		 parameter :-- id 
         table :-- user 
         working :-- fetching record of single row		 
		 return type array 
		 date 03/14/2017
		 written by pravin 
		=====*/
		public function ed_data($id)
		{
			$this->db->where($this->pro->user.'_id',$id);
			$rs = $this->db->get($this->pro->prifix.$this->pro->user);
			return $rs->row_array();
		}
			/*=======
		 function update 
		 parameter :--form data,id 
         table :-- user 
         working :-- updating record of table	 
		 return type int
		 date 03/14/2017
		 written by pravin 
		=====*/
		public function update($data,$id){
			
			 $this->db->where($this->pro->user."_id",$id);
			 $edit = $this->db->update($this->pro->prifix . $this->pro->user,$data);
			 $this->db->last_query(); 
			 return $edit;
		}
		
			/*=======
		 function update 
		 parameter :--id 
         table :-- user 
         working :-- delete record from table	 
		 return type int
		 date 03/14/2017
		 written by pravin 
		=====*/
		public function delete($id){
			
			 $this->db->where($this->pro->user."_id",$id);
			 //$this->db->where($this->pro->user.'_type','1');
			 $del = $this->db->delete($this->pro->prifix . $this->pro->user);
			 return $del;
		}
	
	
}



?>