<?php 
defined("BASEPATH") or exit("direct script not allowed");

class Login_model extends CI_Model{
	 public function __construct(){
		 parent::__construct();
		 
	 }

	public function email_check($email){		$this->db->select($this->pro->user."_id");		$this->db->from($this->pro->prifix.$this->pro->user);		$this->db->where($this->pro->user."_email",$email);		$rs = $this->db->get();		return $rs->num_rows();	}    	public function update($update_data,$email){		$this->db->where($this->pro->user."_email",$email);		return $this->db->update($this->pro->prifix.$this->pro->user,$update_data);	}
}

?>