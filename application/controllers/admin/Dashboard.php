<?php 
defined("BASEPATH") OR exit("no direct script are allowed");
class Dashboard extends CI_Controller{
	
	 
	public function __construct()
    {
	   parent:: __construct();
	   $this->load->helper('url');
	   $this->load->library('session');
	   $this->load->model("project_model","pro");
	   /*=======
	   checking login authentication
	   =======*/
	   ($this->session->user_id !="" && ($this->session->user_type == '0' || $this->session->user_type == '1') )?"":redirect('admin/admin_login');
	
    }
	
    public function index(){
		
		
	   $data['title'] ="Dashboard";
	   $data['heding']=" Dashboard"; 
		
       $this->load->view("lib/head",$data);
	   $this->load->view("lib/nav");
	   $this->load->view("lib/sidbar");
	   $this->load->view("admin/index");
	   $this->load->view("lib/footer");

    }

	
	
}

?>