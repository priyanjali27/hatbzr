<?php 

defined("BASEPATH") OR exit("no direct script are allowed");

class Banner extends CI_Controller{

	

	public $privilege_data;

	

	public function __construct()

    {

	   parent:: __construct();

	   $this->load->model("project_model","pro");

	   $this->load->model("admin/banner_model","bnm");

	   

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

		

		$data['title'] ="  Home Banner";

		$data['heding']="  Home Banner";

		if($this->input->post('name') !="")

		{

	         $name = $this->input->post('name');

		}

		else{

			$name = str_replace("%20",' ',($this->uri->segment(4))?$this->uri->segment(4):'0');

		}

		

		$allrecord = $this->bnm->allrecord($name);

		

		$baseurl =  base_url().'admin/'.$this->router->class.'/'.$this->router->method.'/'.$name;

		

		$pagin  = $this->pro->pagination($baseurl,$allrecord,10,3,5);

        $offset = $pagin['offset'];

		$limit  = $pagin['limit'];

		$data['nav']        = $pagin['nav'];

		

		$data['banner_datas'] = $this->bnm->banner_data($offset,$limit,$name);
		$data['offset'] = $offset;
		

        $this->load->view("lib/head",$data);

	    $this->load->view("lib/nav");

	    $this->load->view("lib/sidbar");

	    $this->load->view("admin/banner/index");

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

		$data['title'] ="  Home Banner";

		$data['heding']="  Home Banner"; 



	    if($this->input->post('Save') !='')

		{

			 $name  = $this->input->post('name');
		
			 $language_rid  = uniqid();

			 $img_data = $this->pro->upload('image');
			 $this->form_validation->set_rules('name','name', 'trim|required|max_length[120]|alpha_numeric_spaces');


			 if($_FILES['image']['name']==''){ 
		      	 $this->form_validation->set_rules('image','Image', 'required');
			  }

			if ($this->form_validation->run() == true)
            {  
			  if(isset($img_data['success'][0]['file_name']) && $img_data['success'][0]['file_name'] !=''){

					 $add_data = array(

					 $this->pro->banner."_name"  =>$name,
					 $this->pro->banner."_image"  =>$img_data['success'][0]['file_name'],
					 $this->pro->banner."_status"=>'1',

					 );  



                      $this->bnm->add($add_data); 
					  
					 $this->session->set_flashdata("success","Banner added successfully.");
                      
					  redirect('admin/banner');					  

			    }

                else{

					$this->session->set_flashdata("image",$img_data['error'][0]);

				}				

            }

			 

		}

		

	     $this->load->view("lib/head",$data);

	     $this->load->view("lib/nav");

	     $this->load->view("lib/sidbar");

	     $this->load->view("admin/banner/index");

	     $this->load->view("lib/footer");

		

	}

	

	

	/*

	function edit 

	open edit form 

	and update Record to table 

	

	*/

	public function edit($id)

	{   
	
	    $data['edit_data']  = $this->bnm->ed_data($id);
		if($this->session->user_type == '1')

		{   

	        $data['privilege_data']=$this->privilege_data;

	        ($this->privilege_data[$this->pro->userprivilege.'_edit'] == '1')?"":redirect('admin/dashboard');

		}

	      

		$data['title'] ="  Home Banner";

		$data['heding']="  Home Banner"; 

		$data['button_name'] = "Update";  

		
		
	    if($this->input->post('Update') !='')
		{

			 $name  = trim($this->input->post('name'));
			  
			  if($data['edit_data'][$this->pro->banner.'_image']=='' && $_FILES['image']['name']==''){
				  
				  
				  $this->form_validation->set_rules('image','image', 'required');

			  }

			 if($_FILES['image']['name'] !="")

			 {
			
			

			     $img_data  = $this->pro->upload('image');
                if(isset($img_data['success'][0]['file_name']) && $img_data['success'][0]['file_name'] !=''){
			     $file_name = $img_data['success'][0]['file_name'];
				 
						if($data['edit_data'][$this->pro->banner.'_image']!=""){
				  
							unlink('upload/'.$data['edit_data'][$this->pro->banner.'_image']);
			 
						}
				 
				 }else{
					 
					 $this->session->set_flashdata("image",$img_data['error'][0]);
					 redirect('admin/banner/edit/'.$id);
				 }
                  
			 }

			 else{

				 $file_name = $data['edit_data'][$this->pro->banner.'_image'];

			 }

			 

			$this->form_validation->set_rules('name','name', 'trim|required|max_length[120]|alpha_numeric_spaces');
			 

			if ($this->form_validation->run() == true)

            {  

		

					 $edit_data = array(

					 $this->pro->banner."_name"  =>$name, 
					 $this->pro->banner."_image"  =>$file_name,

					 );  



                      $edit = $this->bnm->update($edit_data,$id);

					  if($edit){
						$this->session->set_flashdata("success","Banner updated successfully.");
                      redirect('admin/banner');					  
					  }
			    				

            }

			 

		}

		

	     $this->load->view("lib/head",$data);

	     $this->load->view("lib/nav");

	     $this->load->view("lib/sidbar");

	     $this->load->view("admin/banner/index");

	     $this->load->view("lib/footer");

		

	}


	/*

	function status   

    paramiter:- id value

	working :- change status of 

	particular Record

	*/

	public function status($id,$val){

		

		 $status_data = array($this->pro->banner.'_status'=>trim($val));

		 $status = $this->bnm->update($status_data,$id);

			

			if($status){
			$this->session->set_flashdata("success","Banner status updated successfully.");
             redirect('admin/banner');
			}

	}

	

		/*

	function delete   

    paramiter:- id 

	working :- delete particular 

	Record from table

	*/

	public function delete($id){

		

		 $delet_data = $this->bnm->ed_data($id);

		if($this->session->user_type == '1')

		{   

	        $data['privilege_data']=$this->privilege_data;

	        ($this->privilege_data[$this->pro->userprivilege.'_delete'] == '1')?"":redirect('admin/dashboard');

		}
		
		if($delet_data[$this->pro->banner.'_image']!=''){
			unlink('upload/'.$delet_data[$this->pro->banner.'_image']);
			}

		 $del = $this->bnm->delete($id);

			

			if($del){
			$this->session->set_flashdata("success","Banner deleted successfully.");
             redirect('admin/banner');
			}

	}

	

		/*

	function del_icon   

    paramiter:- id 

	working :- delete image of 

	particular Record at update time

	*/

	public function del_icon($id){

		$delet_data = $this->bnm->ed_data($id);
		if($delet_data[$this->pro->banner.'_image']!=''){
		  unlink('upload/'.$delet_data[$this->pro->banner.'_image']);
		}

		$edit_data = array($this->pro->banner."_image"  =>"",);

		$del = $this->bnm->update($edit_data,$id);
		
		$this->session->set_flashdata("success","Banner deleted successfully.");
		
		redirect("admin/banner/edit/$id");

	}

	

	

	

	

	

	

}



?>