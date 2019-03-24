<?php 
defined("BASEPATH") OR exit("no direct script are allowed");
class Order extends CI_Controller{
	
	public $privilege_data;
	
	public function __construct()
    {
	   parent:: __construct();
	   error_reporting(0);
	   $this->load->model("project_model","pro");
	   $this->load->model("admin/order_model","om");
	   
	   /*=======
	   checking login authentication
	   =======*/
	   ($this->session->user_id !="" && ($this->session->user_type == '0' || $this->session->user_type == '1') )?"":redirect('admin/admin_login');
	       
		    $user_id = $this->session->user_id; 
		    if($this->session->user_type == '1'){
			    
				/*=======
				checking privilege authentication
				=======*/
				$this->privilege_data = $this->pro->privilege($this->router->class,$user_id); 
			    (
				$this->privilege_data[$this->pro->userprivilege.'_add'] == '1' || $this->privilege_data[$this->pro->userprivilege.'_edit'] == '1' ||$this->privilege_data[$this->pro->userprivilege.'_delete'] == '1'
				)?"":redirect('admin/dashboard');
				
		    }
    }
	
	 /*
	 function index in only show 
	 list of data table 
	 
	 */
    public function index(){
        
		if($this->session->user_type == '1')
		{
			$data['privilege_data']=$this->privilege_data;
		}
		
		$data['title'] ="Order";
		$data['heding']="Order";
		
		if($this->input->post('name') !="")
		{
	        $orderid = $this->input->post('name');
		}
		else{
			$orderid = str_replace("%20",' ',($this->uri->segment(4))?$this->uri->segment(4):"0");
		}
		
		if($this->input->post('pincode') !="")
		{
	        $pincode = $this->input->post('pincode');
		}
		else{
			$pincode = str_replace("%20",' ',($this->uri->segment(5))?$this->uri->segment(5):"0");
		}
		
				
		$allrecord = $this->om->allrecord($orderid,$pincode);
		
		$baseurl =  base_url().'admin/'.$this->router->class.'/'.$this->router->method.'/'.$orderid.'/'.$pincode;
		
		$pagin       = $this->pro->pagination($baseurl,$allrecord,10,3,6);
        $offset      = $pagin['offset'];
		$limit       = $pagin['limit'];
		$data['nav'] = $pagin['nav'];
		
		$data['bookings'] = $this->om->booking($offset,$limit,$orderid,$pincode);
		//print_r($data['bookings']);
        $this->load->view("lib/head",$data);
	    $this->load->view("lib/nav");
	    $this->load->view("lib/sidbar");
	    $this->load->view("admin/order/index");
	    $this->load->view("lib/footer");

    }
	
	
	/*
	function status   
    paramiter:- id value
	working :- change status of 
	particular Record
	*/
	public function orderstatus($val,$id){
		
		 $status_data = array($this->pro->booking.'_delivery'=>trim($val));
		 $status = $this->om->update($status_data,$id);
			
			if($status){
				$this->session->set_flashdata("success","Status Update Successfully");
                redirect('admin/order');
			}	
	}
	
	
	
	
	 /*
	 function index in only show 
	 list of data table 
	 
	 */
    public function invoice(){
		
		$id = $this->uri->segment(4);
		$data['title'] ="Order";
		$data['heding']="Order";
		$data['booking'] = $this->om->bookingById($id);
		if($this->input->post('send')){
			$maildata = $this->input->post('maildata'); 
			$sent =  $this->pro->smtp_mail($data['booking'][$this->pro->user.'_email'],"11needs.com Invoice",$maildata);
			if($sent['status'] == true){
				$this->session->set_flashdata('mailsuccess',"<font style='color:green' >Invoice sent to user successfully</font>");
			}else{
				$this->session->set_flashdata('mailsuccess',"<font style='color:red' >Some error occurred please try again  </font>");
			}
		}
			//print_r($data['bookings']);
        $this->load->view("lib/head",$data);
	    $this->load->view("lib/nav");
	    $this->load->view("lib/sidbar");
	    $this->load->view("admin/order/invoice");
	    $this->load->view("lib/footer");

    }
	


	
	
			
}

?>