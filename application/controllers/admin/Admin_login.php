<?php 
defined("BASEPATH") OR exit("no direct script are allowed");
class Admin_login extends CI_Controller{
	
	
	public function __construct()
    {
	   parent:: __construct();
	   $this->load->model("project_model","pro");
	   $this->load->model("admin/Login_model","login");
	   /*=======	   checking login authentication	   =======*/	   
	   ($this->session->user_id !="" && ($this->session->user_type == '0' || $this->session->user_type == '1') )?redirect('admin/dashboard'):"";
	   $this->session->set_flashdata("login_msg","");
	   $this->session->set_flashdata("login_msge","");
	  // error_reporting(0);
    }
	
    public function index(){
        
		if($this->input->post('login')){
			$username = $this->input->post('username');
			$password = $this->input->post('password'); 
			if($username !="" && $password !="")
			{  
				$hash =$this->pro->password($password);
				$login_data = $this->pro->login($username,$hash);
				if(count($login_data) >0 )
				{
					$this->session->set_userdata('user_id',$login_data[$this->pro->user.'_id']);
					$this->session->set_userdata('user_type',$login_data[$this->pro->user.'_type']);                     

					redirect('admin/dashboard');
					
				}
				else{
					$this->session->set_flashdata("login_msg","Username or Password Wrong");
				}		 
			}
			else{
			   $this->session->set_flashdata("login_msg","Username or Password empty");
			}
		}
	   
	   $this->load->view("admin/login/index");
	}
	
	public function forgetpwd(){
		
		if($this->input->post('forget')){
			
			 $email = $this->input->post('email');
			 $email_check = $this->login->email_check($email); 
			 if($email_check > 0)
			 {
				 $pwd = $this->pro->genpwd(8);
				 $update_data = array(
				 $this->pro->user."_password"=>$this->pro->password($pwd),
				 );
				 $edit = $this->login->update($update_data,$email);
				 if($edit){
					 $user_data = $this->pro->user_detail($email);
					 $msg_body = '
						<div style="max-width:750px; margin:0 auto; color:##333; font-size:16px; font-family:open sans;">
						<table>
						<tr>
						<td style="text-align:center; padding:0px;" colspan="4">
						<div style="max-width:650px; margin:0 auto; color:##333;">
						<img width="200" src="http://webdevelopmentreviews.net/carrental/site/images/logo.png"/>
						</div>
						</td>
						</tr>
						<tr>
						<td colspan="4">
						<div style="max-width:750px; margin:0 auto; color:##333;">
						<h3 style="font-size:18px; margin-top:20px; margin-bottom:10px;">Forgot Password</h3>
						<p>'.$user_data[$this->pro->user.'_name'].',</p>
						<p>Thank you for your forgot password.. Your password has been successfully changed.</p>
						<p><strong>Your new password is</strong> :'.$pwd.'</p><br/>
						<p>Questions? Suggestions? Insightful shower thoughts? Shoot us an email at support@cargates.com</p>
						</div>
						</td>
						</tr>
						<tr>
						<td style="text-align:left; vertical-align:top;" colspan="4" >
							<div style="max-width:750px; margin:0 auto; color:##333;">
							<strong>Thanks & regards</strong><br/>
							
							Carsgates Team<br/>
							support@cargates.com<br/>
							
							
							</div>
						</td>
						</tr>

						</table>
						</div>
						';
					 
					 $m_send = $this->pro->mail("suppoert@cargets.com", 'Car Gets',$email,"Forget Password",$msg_body); 
					 if($m_send['status'] == true){
						 $this->session->set_flashdata("login_msg","Your Password Send To Your Email");
					 }
					 else{
						 $this->session->set_flashdata("login_msge","Some Error Occured Pleas Try Agen After Some Time");
					 }
				 }
				  
			 }
			 else{
				 $this->session->set_flashdata("login_msge","Email Dose Not Exists");
			 }
	    }
	    $this->load->view("admin/forgetpwd/index");
	}
	  
	
}

?>