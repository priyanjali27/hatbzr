<?php 
defined("BASEPATH") OR exit("no direct script are allowed");
class Changepwd extends CI_Controller{
	
	public $privilege_data;
	
	public function __construct()
    {
	   parent:: __construct();
	   $this->load->model("project_model","pro");
	   $this->load->model("admin/Changepwd_model","chpm");
	   $this->session->set_flashdata('success',"");
	   $this->session->set_flashdata('success1',"");
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
		$data['title'] =" Change Passwrd";
		$data['heding']=" Change Passwrd"; 
		$data['button_name'] = "Update";  
		
		 
	    if($this->input->post('Update') !='')
		{

			 $opwd         = $this->input->post('opwd');
			 $pwd          = $this->input->post('pwd');
	
			 $this->form_validation->set_rules('opwd','Old Password', 'required');
			 $this->form_validation->set_rules('pwd','password', 'required|min_length[8]|matches[cpwd]');
			 $this->form_validation->set_rules('cpwd','cofirm password', 'required|matches[pwd]');

			 
			 if($this->form_validation->run() == true){ 
			     $edit_data  = $this->chpm->ed_data();
				 if($edit_data[$this->pro->user.'_password'] == $this->pro->password($opwd)){
					 $update_data = array(
					 $this->pro->user."_password" =>$this->pro->password($pwd),
					 ); 
					 
					  $edit = $this->chpm->update($update_data,$edit_data[$this->pro->user.'_id']);
					  if($edit){
						  $this->session->set_flashdata('success',"Password Changed Successfully");
						  //redirect('admin/changepwd');	
					  }	
				}
                else{
					$this->session->set_flashdata('success1',"Old Password Not Matched");
				}			
            }
			 
		}
		
	     $this->load->view("lib/head",$data);
	     $this->load->view("lib/nav");
	     $this->load->view("lib/sidbar");
	     $this->load->view("admin/changepwd/index");
	     $this->load->view("lib/footer");

    }
	
	

	
}

?>