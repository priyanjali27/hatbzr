<?php 
defined("BASEPATH") OR exit("no direct script are allowed");
class Brand extends CI_Controller{
	
	public $privilege_data;
	
	public function __construct()
    {
	   parent:: __construct();
	   $this->load->model("project_model","pro");
	   $this->load->model("admin/brand_model","cm");
	   
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
		
		$data['title'] ="Brand";
		$data['heding']="Brand";
		
		if($this->input->post('name') !="")
		{
	        $title = $this->input->post('name');
		}
		else{
			$title = str_replace("%20",' ',($this->uri->segment(4))?$this->uri->segment(4):"0");
		}
		
				
		$allrecord = $this->cm->allrecord($title);
		
		$baseurl =  base_url().'admin/'.$this->router->class.'/'.$this->router->method.'/'.$title;
		
		$pagin       = $this->pro->pagination($baseurl,$allrecord,10,3,5);
        $offset      = $pagin['offset'];
		$limit       = $pagin['limit'];
		$data['nav'] = $pagin['nav'];
		
		$data['brand_datas'] = $this->cm->brand_data($offset,$limit,$title);
		
        $this->load->view("lib/head",$data);
	    $this->load->view("lib/nav");
	    $this->load->view("lib/sidbar");
	    $this->load->view("admin/brand/index");
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
		$data['title'] ="Brand";
		$data['heding']="Brand"; 
		 
       
		
	    if($this->input->post('Save') !='')
		{
			 $title           = $this->input->post('title');
			 
			 
			
				 $this->form_validation->set_rules('title','title', 'trim|required');
				 
							 
			     $name_dupli = $this->cm->name_dupli($title);
			 
				if($this->form_validation->run() == true && $name_dupli == true){
					
					
			
					 $add_data_brand = array(
					 $this->pro->brand."_title"           =>$title,
					 $this->pro->brand."_status"          =>'1',
					 ); 
					 
					$image_data       = $this->pro->upload('image');
					if(isset($image_data['success'][0]['file_name']) && $image_data['success'][0]['file_name'] !=''){
					 $add_data_brand[$this->pro->brand."_image"] = $image_data['success'][0]['file_name'];
					}
					else{
						$this->session->set_flashdata("logo",$image_data['error'][0]);
					}
					 
					$add = $this->cm->add($add_data_brand); 
					 
					if($add){
						
						 $this->session->set_flashdata("success","Brand Add Successfully");
						 redirect('admin/brand');
					}	 
					
				}	
							
            
			 
		}
		
	     $this->load->view("lib/head",$data);
	     $this->load->view("lib/nav");
	     $this->load->view("lib/sidbar");
	     $this->load->view("admin/brand/index");
	     $this->load->view("lib/footer");
		
	}
	
	
	/*
	function edit 
	open edit form 
	and update Record to table 
	
	*/
	public function edit($id)
	{   
	    
	    $data['edit_data']  = $this->cm->ed_data($id);
		if($this->session->user_type == '1')
		{   
	        $data['privilege_data']=$this->privilege_data;
	        ($this->privilege_data[$this->pro->userprivilege.'_edit'] == '1')?"":redirect('admin/dashboard');
		}
	     
		$data['title'] ="Brand";
		$data['heding']="Brand"; 
		$data['button_name'] = "Update";  

	    if($this->input->post('Update') !='')
		{
			 $title           = $this->input->post('title');
			
			 
			
				 $this->form_validation->set_rules('title','title', 'trim|required');
				
							 
			     $name_dupli = $this->cm->name_dupli($title,$id);
			 
				if($this->form_validation->run() == true){
				
				if($_FILES['image']['name'] !=""){
					
					$logo_data  = $this->pro->upload('image');
					if(isset($logo_data['success'][0]['file_name']) && $logo_data['success'][0]['file_name'] !="" )
					{
						if($data['edit_data'][$this->pro->brand.'_image'] !=''){
							unlink('upload/'.$data['edit_data'][$this->pro->brand.'_image']);
						}
						$image       = $logo_data['success'][0]['file_name'];
					}
					else{
						 $this->session->set_flashdata("image",$logo_data['error'][0]); 
					}
				}
				else{
					 $image = $data['edit_data'][$this->pro->brand.'_image'];
				}
				
				 $edit_data_brand = array(
					$this->pro->brand."_title"           =>$title,
					$this->pro->brand."_image"           =>$image,
				 );
				  
				  

				$cat_edit = $this->cm->update($edit_data_brand,$id);
				if($cat_edit > 0){
					
					  $this->session->set_flashdata("success","Brand Update Successfully");
					   redirect('admin/brand');		
				}						 

			}
			 
		}
		
	     $this->load->view("lib/head",$data);
	     $this->load->view("lib/nav");
	     $this->load->view("lib/sidbar");
	     $this->load->view("admin/brand/index");
	     $this->load->view("lib/footer");
		
	}
	
	
	
	/*
	function status   
    paramiter:- id value
	working :- change status of 
	particular Record
	*/
	public function status($id,$val){
		
		 $status_data = array($this->pro->brand.'_status'=>trim($val));
		 $status = $this->cm->update($status_data,$id);
			
			if($status){
				$this->session->set_flashdata("success","Status Update Successfully");
                redirect('admin/brand');
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
		
		
		 $del_brand = $this->cm->delete($id);
		 if($del_brand){

			$this->session->set_flashdata("success","Brand Delete Successfully");
			redirect('admin/brand');
		}
	}
	
	/*
	function del_logo  
    paramiter:- id 
	working :- delete logo of 
	particular Record at update time
	*/
	public function del_img($id){
		$delet_data = $this->cm->ed_data($id);
		if($delet_data[$this->pro->brand.'_image'])
		{
			unlink('upload/'.$delet_data[$this->pro->brand.'_image']);
		}	
		$edit_data = array($this->pro->brand."_image"  =>"",);
		$del = $this->cm->update($edit_data,$id);
		$this->session->set_flashdata("success","brand Logo Delete Successfully");
		redirect("admin/brand/edit/$id");
	}
	

			
			
}

?>