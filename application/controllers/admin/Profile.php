<?php 
defined("BASEPATH") OR exit("no direct script are allowed");
class Profile extends CI_Controller{
	
	public $privilege_data;
	
	public function __construct()
    {
	   parent:: __construct();       
	   $this->load->model("project_model","pro");
	   $this->load->model("admin/Profile_model","pm");
	   $this->session->set_flashdata("name1","");
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
		
		$data['title'] ="Profile";
		$data['heding']="Profile";
		if($this->input->post('name') !="")
		{
	         $name = $this->input->post('name');
		}
		else{
			$name = str_replace("%20",' ',($this->uri->segment(4))?$this->uri->segment(4):'0');
		}
		
		$allrecord = $this->pm->allrecord($name);
		
		$baseurl =  base_url().'admin/'.$this->router->class.'/'.$this->router->method.'/'.$name;
		
		$pagin  = $this->pro->pagination($baseurl,$allrecord,10,3,5);
        $offset = $pagin['offset'];
		$limit  = $pagin['limit'];
		$data['nav']        = $pagin['nav'];
		
		$data['profile_data'] = $this->pm->profile_data($offset,$limit,$name);
		
        $this->load->view("lib/head",$data);
	    $this->load->view("lib/nav");
	    $this->load->view("lib/sidbar");
	    $this->load->view("admin/profile/index");
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
	     
		$data['title'] ="Profile";
		$data['heding']="Profile"; 
		$data['button_name'] = "Update";  
		
		 
	    if($this->input->post('Update') !='')
		{
			 $name      = trim($this->input->post('name'));
			 $phone     = trim($this->input->post('phone'));
			 $email     = trim($this->input->post('email'));
			 $facebook  = trim($this->input->post('facebook'));
			 $google    = trim($this->input->post('google'));
			 $linkedin  = trim($this->input->post('linkedin'));
			 $youtube   = trim($this->input->post('youtube'));
			 $twitter   = trim($this->input->post('twitter'));
			 $instagram = trim($this->input->post('instagram'));
			 
		     $this->form_validation->set_rules('name','name', 'trim|required');	
		     $this->form_validation->set_rules('phone','phone', 'trim|required');	
		     $this->form_validation->set_rules('email','email', 'trim|required');	
			 
             $file_name ="";  
			 if($_FILES['icon']['name'] !="")
			 {                	
                 $img_data  = $this->pro->upload('icon');				 
				 if(isset($img_data['success'][0]['file_name']) && $img_data['success'][0]['file_name'] !=""){
				 if($data['edit_data'][$this->pro->profile.'_image'] !=''){
			     unlink('upload/'.$data['edit_data'][$this->pro->profile.'_image']);                }
			     $file_name = $img_data['success'][0]['file_name'];				
				 }				
				 else{										
				 $this->session->set_flashdata("icon1",$img_data['error'][0]); 				
				 }
			 }
			 else{
				 $file_name = $data['edit_data'][$this->pro->profile.'_image'];
			 }
			if ($this->form_validation->run() == true)
            {  
		        if($file_name !='')                {
					 $edit_data = array(
					 $this->pro->profile."_name"       =>$name,
					 $this->pro->profile."_phone"      =>$phone,
					 $this->pro->profile."_email"      =>$email,
					 $this->pro->profile."_facebook"   =>$facebook,
					 $this->pro->profile."_google"     =>$google,
					 $this->pro->profile."_linkedin"   =>$linkedin,
					 $this->pro->profile."_youtube"    =>$youtube,
					 $this->pro->profile."_twitter"    =>$twitter,
					 $this->pro->profile."_instagram"  =>$instagram,
					 $this->pro->profile."_image"      =>$file_name,
				    );  

                      $edit = $this->pm->update($edit_data,$id);
					  if($edit){                        
					  $this->session->set_flashdata("success","Profile Update successfully.");
						redirect('admin/profile');					  					 
						}
			    }				                 else{					
					$this->session->set_flashdata("icon","file is Required");				
				}
            }
			 
		}
		
	     $this->load->view("lib/head",$data);
	     $this->load->view("lib/nav");
	     $this->load->view("lib/sidbar");
	     $this->load->view("admin/profile/index");
	     $this->load->view("lib/footer");
		
	}
	
	/*
	function status   
    paramiter:- id value
	working :- change status of 
	particular Record
	*/
	public function status($id,$val){
		
		 $status_data = array($this->pro->profile.'_status'=>trim($val));
		 $status = $this->pm->update($status_data,$id);
			
			if($status){				$this->session->set_flashdata("success","Status Change successfully.");
				redirect('admin/profile');            }
	}
	
	
		/*
	function del_icon   
    paramiter:- id 
	working :- delete image of 
	particular Record at update time
	*/
	public function del_icon($id){
		$delet_data = $this->pm->ed_data($id);
		unlink('upload/'.$delet_data[$this->pro->profile.'_image']);
		$edit_data = array($this->pro->profile."_image"  =>"",);
		$del = $this->pm->update($edit_data,$id);    
		redirect("admin/profile/edit/$id");
	}
	
	
	
	
	
	
}

?>