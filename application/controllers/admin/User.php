<?php 
defined("BASEPATH") OR exit("no direct script are allowed");
class User extends CI_Controller{
	
	public $privilege_data;
	
	public function __construct()
    {
	   parent:: __construct();
	   $this->load->model("project_model","pro");
	   $this->load->model("admin/user_model","um");
	   
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
        
		
		$data['title'] ="  user";
		$data['heding']="  user";
		if($this->input->post('name') !="")
		{
	         $name = $this->input->post('name');
		}
		else{
			$name = str_replace("%20",' ',($this->uri->segment(4))?$this->uri->segment(4):'0');
		}
		
		$allrecord = $this->um->allrecord($name);
		
		$baseurl =  base_url().'admin/'.$this->router->class.'/'.$this->router->method.'/'.$name;
		
		$pagin  = $this->pro->pagination($baseurl,$allrecord,10,3,5);
        $offset = $pagin['offset'];
		$limit  = $pagin['limit'];
		$data['nav']        = $pagin['nav'];
		
		$data['user_datas'] = $this->um->user_data($offset,$limit,$name);
		
        $this->load->view("lib/head",$data);
	    $this->load->view("lib/nav");
	    $this->load->view("lib/sidbar");
	    $this->load->view("admin/user/index");
	    $this->load->view("lib/footer");

    }
	
	
	
	/*
	function add 
	view add form open 
	and add data to database
	
	*/
	public function add()
	{   
	    
	    $data['button_name'] = "Save"; 
		$data['title'] ="  user";
		$data['heding']="  user"; 
		$rrandno = mt_rand(100000, 999999);

		$data['rno']=$rrandno;
	    if($this->input->post('Save') !='')
		{

			 $name         = $this->input->post('name');
			 $email        = $this->input->post('email');
			 $phone        = $this->input->post('phone');
			 $rno          = trim($this->input->post('rno'));
			 $pwd          = $this->input->post('pwd');
			
			 
			 
			 $this->form_validation->set_rules('name','name', 'trim|required|alpha_numeric_spaces');
			 
			 $this->form_validation->set_rules('email','email', 'trim|required|valid_email');
			 $this->form_validation->set_rules('phone','phone', 'trim|required|exact_length[10]|numeric');
			 $this->form_validation->set_rules('rno','rno', 'trim|required|alpha_numeric|min_length[6]');
			 $this->form_validation->set_rules('pwd','password', 'required|min_length[8]');
			 $this->form_validation->set_rules('cpwd','cofirm password', 'required|matches[pwd]');
			                
		 
			 $echeck = $this->um->email($email);
			
			if($echeck == true && $this->form_validation->run() == true){
				 $add_data = array(
				 $this->pro->user."_name"         =>$name,
				 $this->pro->user."_email"        =>$email,
				 $this->pro->user."_phone"        =>$phone,
				 $this->pro->user."_rno"          =>$rrandno,
				 $this->pro->user."_password"     =>$this->pro->password($pwd),
				 $this->pro->user."_type"         =>'4',
				 $this->pro->user."_status"       =>'1',
				 );  

				  $add = $this->um->add($add_data); 
				  if($add){
					$this->session->set_flashdata('success',"User Add Successfully");
					redirect('admin/user');	
                  }				  
			}		
            
			 
		}
		
	     $this->load->view("lib/head",$data);
	     $this->load->view("lib/nav");
	     $this->load->view("lib/sidbar");
	     $this->load->view("admin/user/index");
	     $this->load->view("lib/footer");
		
	}
	
	
	public function edit($id)
	{   
	
	    $data['edit_data']  = $this->um->ed_data($id);
		   
		$data['title'] ="  user";
		$data['heding']="  user"; 
		$data['button_name'] = "Update";  
		
		 
	    if($this->input->post('Update') !='')
		{
			 $name         = $this->input->post('name');
			 $email        = $this->input->post('email');
			 $phone        = $this->input->post('phone');
			 $pwd          = $this->input->post('pwd');


			 $this->form_validation->set_rules('name','name', 'trim|required|alpha_numeric_spaces');
			 
			 $this->form_validation->set_rules('email','email', 'trim|required|valid_email'); 
			 $this->form_validation->set_rules('phone','phone', 'trim|required|exact_length[10]|numeric'); 
		
			 $this->form_validation->set_rules('pwd','password', 'min_length[8]|matches[cpwd]');
			 $this->form_validation->set_rules('cpwd','cofirm password', 'matches[pwd]');

			
			 
			 $ucheck = $this->um->username($username,$id);			 
			 $echeck = $this->um->email($email,$id);						
			 if($ucheck == true && $echeck == true && $this->form_validation->run() == true){ 
				 $edit_data = array(
				 $this->pro->user."_name"         =>$name,
				 $this->pro->user."_email"        =>$email,
				 $this->pro->user."_phone"        =>$phone,

				 ); 
				 
				if($pwd !=""){
				 $edit_data[$this->pro->user."_password"] = $this->pro->password($pwd);
				}
				  $edit = $this->um->update($edit_data,$id);
				  if($edit){
					  $this->session->set_flashdata('success',"User Update Successfully");
				      redirect('admin/user');	
				  }					  
            }
			 
		}
		
	     $this->load->view("lib/head",$data);
	     $this->load->view("lib/nav");
	     $this->load->view("lib/sidbar");
	     $this->load->view("admin/user/index");
	     $this->load->view("lib/footer");
		
	}
	
	
	
	public function status($id,$val){
		
		 $status_data = array($this->pro->user.'_status'=>trim($val));
		 $status = $this->um->update($status_data,$id);
			
			if($status)
			{   
		        $this->session->set_flashdata('success',"Status Changed Successfully");
				redirect('admin/user');
			}
	}
	
	public function delete($id){
		
		 $del = $this->um->delete($id);
			
			if($del){
				$this->session->set_flashdata('success',"User Delete Successfully");
				redirect('admin/user');
			}
	}
	
	
	
	
	
	
}

?>