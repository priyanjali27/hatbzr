<?php 
defined("BASEPATH") OR exit("no direct script are allowed");
class Pincode extends CI_Controller{
	
	public $privilege_data;
	
	public function __construct()
    {
	   parent:: __construct();
	   //error_reporting(0);
	   $this->load->model("project_model","pro");
	   $this->load->model("admin/pincode_model","pm");
	   
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
		
		$data['title'] ="pincode";
		$data['heding']="pincode";
		
		if($this->input->post('name') !="")
		{
	        $title = $this->input->post('name');
		}
		else{
			$title = str_replace("%20",' ',($this->uri->segment(4))?$this->uri->segment(4):"0");
		}
		
				
		$allrecord = $this->pm->allrecord($title);
		
		$baseurl =  base_url().'admin/'.$this->router->class.'/'.$this->router->method.'/'.$title;
		
		$pagin       = $this->pro->pagination($baseurl,$allrecord,10,3,5);
        $offset      = $pagin['offset'];
		$limit       = $pagin['limit'];
		$data['nav'] = $pagin['nav'];
		
		$data['pincode_datas'] = $this->pm->pincode_data($offset,$limit,$title);
		
        $this->load->view("lib/head",$data);
	    $this->load->view("lib/nav");
	    $this->load->view("lib/sidbar");
	    $this->load->view("admin/pincode/index");
	    $this->load->view("lib/footer");

    }


	
	
	
	/*
	function add 
	view add form 
	and add Record to table
	
	*/
	public function add()
	{   
	   
		if($this->session->user_type == '1')
		{
			$data['privilege_data']=$this->privilege_data;
	        ($this->privilege_data[$this->pro->userprivilege.'_add'] == '1')?"":redirect('admin/dashboard');
		}
	    $data['button_name'] = "Save"; 
		$data['title'] ="pincode";
		$data['heding']="pincode"; 
		 
       
		
	    if($this->input->post('Save') !='')
		{
			     $title           = $this->input->post('title');
       			$this->form_validation->set_rules('title','title', 'trim|required');
			     $name_dupli = $this->pm->name_dupli($title);
				if($this->form_validation->run() == true && $name_dupli == true){
					 $add_data_pincode = array(
					 $this->pro->pincode."_title"           =>$title,
					 $this->pro->pincode."_status"          =>'1',
					 ); 
					$add = $this->pm->add($add_data_pincode); 
					if($add){
						 $this->session->set_flashdata("success","pincode Add Successfully");
						 redirect('admin/pincode');
					}	 
					
				}	
							
            
			 
		}
		
	     $this->load->view("lib/head",$data);
	     $this->load->view("lib/nav");
	     $this->load->view("lib/sidbar");
	     $this->load->view("admin/pincode/index");
	     $this->load->view("lib/footer");
		
	}
	
	
	/*
	function edit 
	open edit form 
	and update Record to table 
	
	*/
	public function edit($id)
	{   
	    
	    $data['edit_data']  = $this->pm->ed_data($id);
		if($this->session->user_type == '1')
		{   
	        $data['privilege_data']=$this->privilege_data;
	        ($this->privilege_data[$this->pro->userprivilege.'_edit'] == '1')?"":redirect('admin/dashboard');
		}
	     
		$data['title'] ="Pincode";
		$data['heding']="Pincode"; 
		$data['button_name'] = "Update";  

	    if($this->input->post('Update') !='')
		{
			    $title           = $this->input->post('title');
				$this->form_validation->set_rules('title','title', 'trim|required');
 		        $name_dupli = $this->pm->name_dupli($title,$id);
				if($this->form_validation->run() == true && $name_dupli == true)
				{
				 $edit_data_pincode = array(
					$this->pro->pincode."_title"           =>$title,
				 );
				$cat_edit = $this->pm->update($edit_data_pincode,$id);
				if($cat_edit > 0){
					  $this->session->set_flashdata("success","pincode Update Successfully");
					   redirect('admin/pincode');		
				}						 

			}
			 
		}
		
	     $this->load->view("lib/head",$data);
	     $this->load->view("lib/nav");
	     $this->load->view("lib/sidbar");
	     $this->load->view("admin/pincode/index");
	     $this->load->view("lib/footer");
		
	}
	
	
	
	/*
	function status   
    paramiter:- id value
	working :- change status of 
	particular Record
	*/
	public function status($id,$val){
		
		 $status_data = array($this->pro->pincode.'_status'=>trim($val));
		 $status = $this->pm->update($status_data,$id);
			
			if($status){
				$this->session->set_flashdata("success","Status Update Successfully");
                redirect('admin/pincode');
			}	
	}
	
		/*
	function delete   
    paramiter:- id 
	working :- delete particular 
	Record from table
	*/
	public function delete($id){
		if($this->session->user_type == '1')
		{   
	        $data['privilege_data']=$this->privilege_data;
	        ($this->privilege_data[$this->pro->userprivilege.'_delete'] == '1')?"":redirect('admin/dashboard');
		}
		
		
		 $del_pincode = $this->pm->delete($id);
		 if($del_pincode){

			$this->session->set_flashdata("success","pincode Delete Successfully");
			redirect('admin/pincode');
		}
	}
	
	/*
	function del_logo  
    paramiter:- id 
	working :- delete logo of 
	particular Record at update time
	*/
	public function del_img($id){
		$delet_data = $this->pm->ed_data($id);
		if($delet_data[$this->pro->pincode.'_image'])
		{
			unlink('upload/'.$delet_data[$this->pro->pincode.'_image']);
		}	
		$edit_data = array($this->pro->pincode."_image"  =>"",);
		$del = $this->pm->update($edit_data,$id);
		$this->session->set_flashdata("success","pincode Logo Delete Successfully");
		redirect("admin/pincode/edit/$id");
	}
	

			
			
}

?>