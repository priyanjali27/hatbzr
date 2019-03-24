<?php
class Agent extends CI_controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('project_model','pro');
		$this->load->model('checkout_model','cm');
	}

	
	
	public function index(){

		$data['categorys'] = $this->cm->category();
        $data['subcategorys'] = $this->cm->subcategory();
		
		
		$this->load->view('site_lib/head',$data);
		$this->load->view('site_lib/nav');
		$this->load->view('site/agent');
		$this->load->view('site_lib/footer');
	}


	public function login(){
		$email    = $this->input->post('login_email');
		$password = $this->pro->password($this->input->post('login_password'));
		$this->form_validation->set_rules('login_email','Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('login_password','Password', 'trim|required');
		if($this->form_validation->run() == true){
				$this->db->where($this->pro->user.'_email',$email);
				$this->db->where($this->pro->user.'_password',$password);
				$login_data = $this->db->get($this->pro->prifix.$this->pro->user)->row_array();
				if(!empty($login_data)){
					if($login_data[$this->pro->user."_status"] == '1'){
						$this->session->set_userdata('username',$login_data[$this->pro->user."_id"]);
						redirect('dashboard');
					}else{
						echo $data['msg']= "<span style='color:red' >Your Account not verified yet</span>";
					}
				}else{
					echo $data['msg']= "<span style='color:red' >Invalid Username and Password</span>";
				}
		}else{
			
			echo $data['msg']= "<span style='color:red' >".validation_errors()."</span>";
		}
	}
	

}

?>