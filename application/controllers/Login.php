<?php
class Login extends CI_controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('project_model','pro');
		$this->load->model('checkout_model','cm');
	}



	
	
	public function index(){

		$data['categorys'] = $this->cm->category();
        $data['subcategorys'] = $this->cm->subcategory();

        if($this->input->post('signup')){
	        $this->form_validation->set_rules('name','Name', 'trim|required');
			$this->form_validation->set_rules('email','Email', 'trim|required|valid_email|is_unique[hatbazar_user.user_email]');
			$this->form_validation->set_rules('password','Password', 'trim|required');
			$this->form_validation->set_rules('refno','Password', 'trim|required');
			
			$name	    = $this->security->xss_clean($this->input->post('name'));
			$refno	    = $this->security->xss_clean($this->input->post('refno'));
			$email 		= $this->input->post('email');
			$password   = $this->pro->password($this->input->post('password'));
			$rrandno    = mt_rand(100000, 999999);

			if($this->form_validation->run() == true){
					
				$user_array = array(
					$this->pro->user."_refno"=>$refno,
					$this->pro->user."_name"=>$name,
					$this->pro->user."_email"=>$email,
					$this->pro->user."_password"=>$password,
					$this->pro->user."_rno"     =>$rrandno,
					$this->pro->user."_status"=>'0',
					$this->pro->user."_type"=>'4',
				);

				$add = $this->cm->addUser($user_array); 
			 	if($add){
				$this->session->set_flashdata('success',"Signup Successfully");
					//redirect('login');	
              	}	

			}
		}	
	
		
		$this->load->view('site_lib/head',$data);
		$this->load->view('site_lib/nav');
		$this->load->view('site/login');
		$this->load->view('site_lib/footer');
	}


	public function login(){
		$rno    = $this->input->post('login_rno');
		$password = $this->pro->password($this->input->post('login_password'));
		$this->form_validation->set_rules('login_rno','Email', 'trim|required');
		$this->form_validation->set_rules('login_password','Password', 'trim|required');
		if($this->form_validation->run() == true){
				$this->db->where($this->pro->user.'_rno',$rno);
				$this->db->where($this->pro->user.'_password',$password);
				$login_data = $this->db->get($this->pro->prifix.$this->pro->user)->row_array();
				if(!empty($login_data)){
					if($login_data[$this->pro->user."_status"] == '1'){
						$this->session->set_userdata('username',$login_data[$this->pro->user."_id"]);
						redirect('profile');
					}else{
						redirect('login');
						echo $data['msg']= "<span style='color:red' >Your Account not verified yet</span>";
					}
				}else{
					redirect('login');
					echo $data['msg']= "<span style='color:red' >Invalid Username and Password</span>";
				}
		}else{
			redirect('login');
			echo $data['msg']= "<span style='color:red' >".validation_errors()."</span>";
		}
	}
	

}

?>