<?php 
defined("BASEPATH") or exit("direct script not allowed");

class Order_model extends CI_Model{
	
	 public function __construct(){
		 parent::__construct();
		 
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
	public function allrecord($orderid,$pincode)
	{
		$this->db->select('*');
		$this->db->from($this->pro->prifix.$this->pro->booking);
		$this->db->join($this->pro->prifix.$this->pro->user,$this->pro->user."_id = ".$this->pro->booking."_userId","inner");
		
		if($orderid !='0' )
		{
			 $this->db->like($this->pro->booking.'_invoiceId',$orderid);
		}
		
		if($pincode !='0' )
		{
			 $this->db->where($this->pro->user.'_zipcode',$pincode);
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
	
	public function booking($offset,$limit,$orderid,$pincode)
	{
		$this->db->select('*');
		$this->db->from($this->pro->prifix.$this->pro->booking);
		$this->db->join($this->pro->prifix.$this->pro->user,$this->pro->user."_id = ".$this->pro->booking."_userId","inner");
		
		if($orderid !='0' )
		{
			 $this->db->like($this->pro->booking.'_invoiceId',$orderid);
		}
		
		if($pincode !='0' )
		{
			 $this->db->where($this->pro->user.'_zipcode',$pincode);
		}
		
		$this->db->order_by($this->pro->booking.'_id','desc');
		$this->db->limit($limit,$offset);
		$rs = $this->db->get();
		//echo $this->db->last_query();
		return $rs->result_array();
		
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
	
	public function bookingById($id)
	{
		$this->db->select('*');
		$this->db->from($this->pro->prifix.$this->pro->booking);
		$this->db->join($this->pro->prifix.$this->pro->user,$this->pro->user."_id=".$this->pro->booking."_userId");
		
		$this->db->where($this->pro->booking.'_id',$id);
		$this->db->limit($limit,$offset);
		$rs = $this->db->get();
		//echo $this->db->last_query();
		return $rs->row_array();
		
	}
	
	/*=======
	 function bookingdetail 
	 parameter :-- invoiceid
	 table :-- bookingdetail 
	 working :-- fetching Record		 
	 return type array  
	 date 03/09/2017
	 written by pravin 
	=====*/
	
	public function bookingdetail($invoiceid)
	{
		$this->db->where($this->pro->bookingdetail.'_invoiceId',$invoiceid);
		$this->db->from($this->pro->prifix.$this->pro->bookingdetail);
		$this->db->join($this->pro->prifix.$this->pro->product,$this->pro->bookingdetail."_productId=".$this->pro->product."_id");
		$this->db->join($this->pro->prifix.$this->pro->productunit,$this->pro->bookingdetail."_unitId=".$this->pro->productunit."_id","left");
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
		
		 $this->db->where($this->pro->booking."_id",$id);
		 return $edit = $this->db->update($this->pro->prifix . $this->pro->booking,$data);
	}
	
}



?>