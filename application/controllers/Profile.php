<?php
class Profile extends CI_controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('project_model','pro');
		$this->load->model('profile_model','dash');
		/*if(empty($this->session->username)){
			redirect();
		}*/
	}


	
	public function index(){
		$userId = $this->session->username;
		$data['categorys'] = $this->dash->category();
		$data['subcategorys'] = $this->dash->subcategory();
		//$data['orders']  = $this->dash->booking($userId);
		
		$this->load->view('site_lib/head',$data);
		$this->load->view('site_lib/nav');
		$this->load->view('site/profile');
		$this->load->view('site_lib/footer');
	}
	

	public function edit(){

		$userId = $this->session->username;
		$data['categorys'] = $this->dash->category();
		$data['subcategorys'] = $this->dash->subcategory();
		$data['orders']  = $this->dash->booking($userId);
		$data['users']  = $this->dash->users($this->session->user_id);
		//echo"<pre>";
		print_r($this->input->post());
		print_r($this->session->user_id);

		$fathername 		= $this->input->post('fathername');
		$mothername 		= $this->input->post('mothername');
		$dob 				= $this->input->post('dob');
		$anniversarydate 	= $this->input->post('anniversarydate');
		$pan 				= $this->input->post('pan');
		$number 			= $this->input->post('number');
		$address 			= $this->input->post('address');
		$pin 				= $this->input->post('pin');
		$city 				= $this->input->post('city');
		$state 				= $this->input->post('state');
		$occupation 		= $this->input->post('occupation');
		$mobile 			= $this->input->post('mobile');
		$email 				= $this->input->post('email');
		$nominee 			= $this->input->post('nominee');
		$nomineerelation 	= $this->input->post('nomineerelation');
		$account 			= $this->input->post('account');
		$bankname 			= $this->input->post('bankname');
		$branch 			= $this->input->post('branch');
		$accountno 			= $this->input->post('accountno');
		$accounttype 		= $this->input->post('accounttype');
		$ifsc 				= $this->input->post('ifsc');
		
		$this->load->view('site_lib/head',$data);
		$this->load->view('site_lib/nav');
		$this->load->view('site/profile-edit');
		$this->load->view('site_lib/footer');
	}
	
	
	

	

}

?>