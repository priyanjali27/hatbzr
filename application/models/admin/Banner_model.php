<?php 

defined("BASEPATH") or exit("direct script not allowed");



class Banner_model extends CI_Model{

	

	 public function __construct(){

		 parent::__construct();

		 

	 }

	

		/*

		 function add 

		 parameter data assoc array 

         for banner table		 

		 return type int 

		 date 03/30/2017

		 created by Irshad 

		*/

		

		public function add($add_data){

			 

			$id=$this->db->insert($this->pro->prifix.$this->pro->banner,$add_data);	

			return $id;

		}

		

		/*

		 function allrecord 

		 parameter searching varibles name

         table :-- banner 

         working :-- counting allrecord		 

		 return type int 

		 date 03/30/2017
		 
		 created by Irshad 
		*/

		public function allrecord($name)

		{

			if($name !='0' )

			{

				 $this->db->like($this->pro->banner.'_name',$name);

			}

			

			$rs = $this->db->get($this->pro->prifix.$this->pro->banner);

			return $rs->num_rows();

		}

	    

		

		/*=======

		 function language_data 

		 parameter :-- offset,limit

		 searching varibles

         table :-- banner 

         working :-- fetching allrecord		 

		 return type array 

		 date 03/30/2017
		 
		 created by Irshad 

		=====*/

		

		public function banner_data($offset,$limit,$name)

		{

			

			if($name !='0'  )

			{

				$this->db->like($this->pro->banner.'_name',$name);

			}

			

			$this->db->order_by($this->pro->banner.'_id','desc');

			$this->db->limit($limit,$offset);

			$rs = $this->db->get($this->pro->prifix.$this->pro->banner);

			return $rs->result_array();

			

		}

		

		

		/*=======

		 function ed_data 

		 parameter :-- id 

         table :-- banner 

         working :-- fetching record of single row		 

		 return type array 

		 date 03/30/2017
		 
		 created by Irshad  

		=====*/

		public function ed_data($id)

		{

			$this->db->where($this->pro->banner.'_id',$id);
			$rs = $this->db->get($this->pro->prifix.$this->pro->banner);

			return $rs->row_array();

			

		}

		

			/*=======

		 function update 

		 parameter :--form data,id 

         table :-- banner 

         working :-- updating record of table	 

		 return type int

		 date 03/30/2017
		 
		 created by Irshad  

		=====*/

		public function update($data,$id){

			

			 $this->db->where($this->pro->banner."_id",$id);

			 $edit = $this->db->update($this->pro->prifix . $this->pro->banner,$data);

			 return $edit;

		}

		

			/*=======

		 function update 

		 parameter :--id 

         table :-- banner 

         working :-- delete record from table	 

		 return type int

		 date 03/30/2017
		 
		 created by Irshad  

		=====*/

		public function delete($id){

			

			 $this->db->where($this->pro->banner."_id",$id);

			 $del = $this->db->delete($this->pro->prifix . $this->pro->banner);

			 return $del;

		}

		
		
		/*
		 function language 

		 without parameter 

		 return type array

		 data list of all 

		 language

		 date 03/30/2017
		 
		 created by Irshad  
		*/

		public function language($id=""){

			if($id !=''){

				$this->db->where($this->pro->language."_code",$id);

			}

			$this->db->order_by($this->pro->language."_name");

			$rs=$this->db->get($this->pro->prifix.$this->pro->language);	

			return $rs->result_array();

		}
		
		
		
		/*=======

		 function conv_language 

		 parameter :-- language_rid 

         table :-- banner 

         working :-- fetching record of single row		 

		 return type array 

		 date 03/30/2017
		 
		 created by Irshad

		=====*/

		public function conv_language($id)

		{    

		    $this->db->select($this->pro->banner."_language_id");

			$this->db->from($this->pro->prifix.$this->pro->banner);

			$this->db->where($this->pro->banner.'_language_rid',$id);

			$rs = $this->db->get();

			return $rs->result_array();

			

		}
		/*=======

		 function ln_ed_data 

		 parameter :-- language_id,language_rid

         table :-- banner 

         working :-- fetching record of single row		 

		 return type array 

		 date 03/30/2017
		 
		 created by Irshad

		=====*/

		public function ln_ed_data($language_id,$language_rid)

		{   

		    $this->db->select("*");

			$this->db->from($this->pro->prifix.$this->pro->banner);

			$this->db->where($this->pro->banner.'_language_id',$language_id);

			$this->db->where($this->pro->banner.'_language_rid',$language_rid);

			$rs = $this->db->get();

			return $rs->row_array();

			

		}

	

}







?>