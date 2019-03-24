<?php
class Checkout extends CI_controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('project_model','pro');
		$this->load->model('checkout_model','cm');
	}


	public function checkpin(){
		$pin = trim($this->input->post('pin'));
		$this->db->select($this->pro->pincode."_id");
		$this->db->from($this->pro->prifix.$this->pro->pincode);
		$this->db->where($this->pro->pincode.'_title',$pin);
		$rs = $this->db->get();
		$data = $rs->row_array();
		if(!empty($data)){
			echo true;
		}else{
			echo false;
		}
	}
	
	
	public function index(){

		if($this->input->post('buy')){
			$this->form_validation->set_rules('phone','Phone', 'trim|required|numeric');
			$this->form_validation->set_rules('city','City', 'trim|required');
			$this->form_validation->set_rules('zipcode','Zip Code', 'trim|required|numeric|max_length[6]');
			$this->form_validation->set_rules('address','Address', 'trim|required');
			$this->form_validation->set_rules('landmark','Landmark', 'trim|required');
			if($this->form_validation->run() == true){
			   $this->session->set_userdata('phone',$this->input->post('phone'));
			   $this->session->set_userdata('city',$this->security->xss_clean($this->input->post('city')));
			   $this->session->set_userdata('zipcode',$this->input->post('zipcode'));
			   $this->session->set_userdata('address',$this->security->xss_clean($this->input->post('address')));
			   $this->session->set_userdata('landmark',$this->security->xss_clean($this->input->post('landmark')));

			}else{
				redirect('cart');
			}
		
		
		}

		$data['carts'] = $this->cart->contents();

		//if(empty($this->session->username)){
			//for new user booking start here
			$this->form_validation->set_rules('name','Name', 'trim|required');
			$this->form_validation->set_rules('email','Email', 'trim|required|valid_email|is_unique[hatbazar_user.user_email]');
			$this->form_validation->set_rules('password','Password', 'trim|required');
			
			$name	= $this->security->xss_clean($this->input->post('name'));
			$email 		= $this->input->post('email');
			$password   = $this->pro->password($this->input->post('password'));

			if($this->form_validation->run() == true){
				
				$user_array = array(
					$this->pro->user."_name"=>$name,
					$this->pro->user."_email"=>$email,
					$this->pro->user."_phone"=>$this->session->phone,
					$this->pro->user."_zipcode"=>$this->session->zipcode,
					$this->pro->user."_city"=>$this->session->city,
					$this->pro->user."_address"=>$this->session->address,
					$this->pro->user."_password"=>$password,
					$this->pro->user."_landmark"=>$this->session->landmark,
					$this->pro->user."_status"=>'1',
					$this->pro->user."_type"=>'4',
				);
								
				//$maildata = $this->cm->emailtemplete($email); 				
				//$sent =  $this->pro->smtp_mail($email,"11needs.com Account verification",$maildata);
				//if($sent['status'] == true){
					
					$user_id = $this->cm->addUser($user_array);
					
					
					$userAddress_array = array(
						$this->pro->useraddress."_user_id"=>$user_id,
						$this->pro->useraddress."_phone"=>$this->session->phone,
						$this->pro->useraddress."_zipcode"=>$this->session->zipcode,
						$this->pro->useraddress."_city"=>$this->session->city,
						$this->pro->useraddress."_address"=>$this->session->address,
						$this->pro->useraddress."_landmark"=>$this->session->landmark,
						$this->pro->useraddress."_default"=>'1',
					);
					
					$this->cm->addUserAddress($userAddress_array);
					
					$invoiceId = "EV".time();
					$add_booking = array(
						$this->pro->booking."_userId"=>$user_id,
						$this->pro->booking."_total"=>$this->session->total,
						$this->pro->booking."_invoiceId"=>$invoiceId,
						$this->pro->booking."_date"=>date("Y-m-d H:i:s"),
						$this->pro->booking."_status"=>'1',
					);
					
					$booking_id = $this->cm->addBooking($add_booking);
						
					foreach($data['carts'] as $cart){
						$productId = $cart['id'];
						$add_bookingdetail = array(
							//$this->pro->bookingdetail."_bookingId"	=>$booking_id,
							$this->pro->bookingdetail."_userId"		=>$user_id,
							$this->pro->bookingdetail."_invoiceId"	=>$invoiceId,
							$this->pro->bookingdetail."_title"		=>$cart['name'],
							$this->pro->bookingdetail."_productId"	=>$productId,
							$this->pro->bookingdetail."_quantity"	=>$cart['qty'],
							$this->pro->bookingdetail."_price"		=>$cart['price'],
							$this->pro->bookingdetail."_subtotal"	=>$cart['subtotal'],
							$this->pro->bookingdetail."_status"		=>'1',
						);
						
						$booking_id = $this->cm->addBookingdetail($add_bookingdetail);
						//$this->cm->updateQty($unitId,array($this->pro->productunit."_quantity"=>$cart['qty']));
					}
					$this->cart->destroy();
					$this->session->set_userdata('username',$user_id);
					$this->session->set_flashdata("success"," Your Order Placed Successfully");
					echo"<script>alert('Your Order Placed Successfully '); window.location='".base_url()."dashboard'</script>";
					
				//}else{
					//echo"<script>alert('some error occurred try another email'); window.location='".base_url()."'</script>";
				//}

			}
			//for new user booking end here
		//}
		/*else{
			//for login user booking start here
			$time 	= $this->security->xss_clean($this->input->post('time'));
				
			if($this->input->post('newaddress') == '1'){
				
				$this->form_validation->set_rules('phone','Phone No', 'trim|required|numeric|max_length[12]');
				$this->form_validation->set_rules('zipcode','Zip Code', 'trim|required|numeric|max_length[6]');
				$this->form_validation->set_rules('city','City', 'trim|required|alpha_dash');
				$this->form_validation->set_rules('address','Address', 'trim|required');
				//$this->form_validation->set_rules('landmark','Land Mark', 'trim|required|alpha_dash');
				

				$phone 		= $this->input->post('phone');
				$zipcode  	= $this->input->post('zipcode');
				$city 		= $this->input->post('city');
				$password   = $this->pro->password($this->input->post('password'));
				$address	= $this->security->xss_clean($this->input->post('address'));
				$landmark 	= $this->security->xss_clean($this->input->post('landmark'));
				
				$default_update  = array($this->pro->useraddress."_default"=>'0');
				$this->cm->updateUserAddress($default_update,$this->session->username);
				
				
				$userAddress_array = array(
					$this->pro->useraddress."_user_id"=>$this->session->username,
					$this->pro->useraddress."_phone"=>$phone,
					$this->pro->useraddress."_zipcode"=>$zipcode,
					$this->pro->useraddress."_city"=>$city,
					$this->pro->useraddress."_address"=>$address,
					$this->pro->useraddress."_landmark"=>$landmark,
					$this->pro->useraddress."_default"=>'1',
				);
				
				$this->cm->addUserAddress($userAddress_array);
					
					
				$user_array = array(
					$this->pro->user."_phone"=>$phone,
					$this->pro->user."_zipcode"=>$zipcode,
					$this->pro->user."_city"=>$city,
					$this->pro->user."_address"=>$address,
					$this->pro->user."_password"=>$password,
					$this->pro->user."_landmark"=>$landmark,
				);	
					
					
				$this->cm->updateUser($user_array,$this->session->username);
				
			}
			
			$invoiceId = "EV".time();
			$add_booking = array(
				$this->pro->booking."_userId"=>$this->session->username,
				$this->pro->booking."_total"=>$this->session->total,
				$this->pro->booking."_invoiceId"=>$invoiceId,
				$this->pro->booking."_time"=>$time,
				$this->pro->booking."_date"=>date("Y-m-d H:i:s"),
				$this->pro->booking."_status"=>'1',
			);
			
			$booking_id = $this->cm->addBooking($add_booking);
				
			foreach($data['carts'] as $cart){
				$ids = explode('-',$cart['id']);
				$productId = $ids[0];
				$unitId    = $ids[1];
				
				$add_bookingdetail = array(
					//$this->pro->bookingdetail."_bookingId"	=>$booking_id,
					$this->pro->bookingdetail."_userId"		=>$this->session->username,
					$this->pro->bookingdetail."_invoiceId"	=>$invoiceId,
					$this->pro->bookingdetail."_title"		=>$cart['name'],
					$this->pro->bookingdetail."_productId"	=>$productId,
					$this->pro->bookingdetail."_unitId"		=>$unitId,
					$this->pro->bookingdetail."_quantity"	=>$cart['qty'],
					$this->pro->bookingdetail."_price"		=>$cart['price'],
					$this->pro->bookingdetail."_subtotal"	=>$cart['subtotal'],
					$this->pro->bookingdetail."_status"		=>'1',
				);
				
				$booking_id = $this->cm->addBookingdetail($add_bookingdetail);
				$qtydata = $this->cm->selectQtyByID($unitId);	
				$this->cm->updateQty($unitId,array($this->pro->productunit."_quantity"=>($qtydata[$this->pro->productunit."_quantity"] - $cart['qty'])));	
			}
			$this->cart->destroy();
			$this->session->set_flashdata("success"," Your Order Placed Successfully");
			redirect('dashboard');
			//for login user booking end here
			
		}*/
		
		$this->load->view('site_lib/head',$data);
		$this->load->view('site_lib/nav');
		$this->load->view('site/checkout');
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