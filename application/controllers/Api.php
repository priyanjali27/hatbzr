<?php
class Api extends CI_controller{
	public function __construct(){
		parent::__construct();
		// required headers
		//header("Access-Control-Allow-Origin: *");
		//header("Content-Type: application/json; charset=UTF-8");
		//header("Access-Control-Allow-Methods: POST");
		//header("Access-Control-Max-Age: 3600");
		//header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
		$this->load->model('project_model','pro');
		$this->load->model('api_model','api');
		$this->load->model('checkout_model','cm');
		$this->load->model('Dashboard_model','dash');
		$this->load->model('Profile_model','pm');
	}


	
	public function index(){
	    exit();
		//$data['categorys'] = $this->api->category();
		//$data['products'] = $this->api->product();
		//$data['combos']   = $this->api->combo();
		
		//$data['supperdeals']   = $this->api->supperdeal();
		//$data['banners']   = $this->api->banners();
		//$data['sidebanners']   = $this->api->sidebanner();
		//$data['adds']   = $this->api->adds();

	}
	
	
	/*
	Banner Api 
	parameter : none
	written by privin kumar
	date : 01/06/2018
	*/
	public function banners(){
		$banners = $this->api->banners();
		$data = array(
			'status'=>true,
			'response'=>array('banners'=>$banners),
		);
        echo json_encode($data);
	}
	
	/*
	category Api 
	parameter : none
	written by privin kumar
	date : 01/06/2018
	*/
	public function category(){
		$category = $this->api->category();
		$data = array(
			'status'=>true,
			'response'=>array('category'=>$category),
		);
        echo json_encode($data);
	}
	
	/*
	product Api 
	parameter : none
	written by privin kumar
	date : 01/06/2018
	*/
	public function product(){ 
		$request = json_decode(file_get_contents("php://input"),true);
		$cat = $request['catId'];
		$pdata  = array();
		if(!empty($cat)){
			$products = $this->api->product($cat);
			if($products){
				foreach($products as $product){
					$id = $product[$this->pro->product.'_id'];
					$pudata = array();
					$punits = $this->api->product_unit($id);
					if($punits){
						foreach($punits as $punit){
							$pudata[] = array(
								"productId"=>$id,
								"productUnitId"=>$punit[$this->pro->productunit.'_id'],
								"productUnitname"=>$punit[$this->pro->productunit.'_name'],
								"productUnitvalue"=>$punit[$this->pro->productunit.'_value'],
								"productUnitquantity"=>$punit[$this->pro->productunit.'_quantity'],
								"productUnitprice"=>$punit[$this->pro->productunit.'_price'],
								"productUnitsellprice"=>$punit[$this->pro->productunit.'_sellprice']
							);
						}
					}
					
					$pdata[] = array(
						"productId"=>$id,
						"productCategoryid" =>$product[$this->pro->product.'_category_id'],
						"productName" =>$product[$this->pro->product.'_title'],
						"productSKU"  =>$product[$this->pro->product.'_sku'],
						"productDescription" =>strip_tags(html_entity_decode(trim($product[$this->pro->product.'_description']))),
						"productShortdescription" =>strip_tags($product[$this->pro->product.'_shortdescription']),
						"productImage" =>strip_tags($product[$this->pro->product.'_image']),
						"productType" =>strip_tags($product[$this->pro->product.'_type']),
						"productUnits" =>$pudata
					);
				
				}
			}
			$data = array(
				'status'=>true,
				'response'=>array('product'=>$pdata),
			);
			
		}else{
			$data = array(
				'error'=>true,
				'massage'=>"Category Id is Required",
			);
		}

		echo json_encode($data);
	}
	
	/*
	product Api 
	parameter : none
	written by privin kumar
	date : 01/06/2018
	*/
	public function Order(){ 
		$request = json_decode(file_get_contents("php://input"),true);
		$carts = $request['cart'];
		$user = $request['user'];
		
		 //print_r($user);
		
		if(!empty($carts)){
			$firstname	= $user['user_name'];
			$lastname 	= $user['user_lastname'];
			$email 		= $user['user_email'];
			$phone 		= $user['user_phone'];
			$zipcode  	= $user['user_zipcode'];
			$city 		= $user['user_city'];
			$password   = $this->pro->password($user['user_password']);
			$address	= $this->security->xss_clean($user['user_address']);
			$landmark 	= $this->security->xss_clean($user['user_landmark']);
			
			$user_array = array(
				$this->pro->user."_name"=>$firstname,
				$this->pro->user."_lastname"=>$lastname,
				$this->pro->user."_email"=>$email,
				$this->pro->user."_phone"=>$phone,
				$this->pro->user."_zipcode"=>$zipcode,
				$this->pro->user."_city"=>$city,
				$this->pro->user."_address"=>$address,
				$this->pro->user."_password"=>$password,
				$this->pro->user."_landmark"=>$landmark,
				$this->pro->user."_status"=>'0',
				$this->pro->user."_type"=>'4',
			);
			
			$maildata = $this->cm->emailtemplete($email); 				
			$sent =  $this->pro->smtp_mail($email,"11needs.com Account verification",$maildata);
			
			if($sent['status'] == true){
				
				$user_id = $this->cm->addUser($user_array);
				
				
				$userAddress_array = array(
					$this->pro->useraddress."_user_id"=>$user_id,
					$this->pro->useraddress."_phone"=>$phone,
					$this->pro->useraddress."_zipcode"=>$zipcode,
					$this->pro->useraddress."_city"=>$city,
					$this->pro->useraddress."_address"=>$address,
					$this->pro->useraddress."_landmark"=>$landmark,
					$this->pro->useraddress."_default"=>'1',
				);
				
				$this->cm->addUserAddress($userAddress_array);
				
				$invoiceId = "EV".time();
				$apitotal = 0;
				foreach($carts as $carttotal){
					
					$apitotal += $carttotal['subtotal'];
					
				}
				
				$add_booking = array(
					$this->pro->booking."_userId"=>$user_id,
					$this->pro->booking."_total"=>$apitotal,
					$this->pro->booking."_invoiceId"=>$invoiceId,
					$this->pro->booking."_date"=>date("Y-m-d H:i:s"),
					$this->pro->booking."_status"=>'1',
				);
				
				$booking_id = $this->cm->addBooking($add_booking);
					
				foreach($carts as $cart){
					$ids = explode('-',$cart['id']);
					$productId = $ids[0];
					$unitId    = $ids[1];
					$add_bookingdetail = array(
						//$this->pro->bookingdetail."_bookingId"	=>$booking_id,
						$this->pro->bookingdetail."_userId"		=>$user_id,
						$this->pro->bookingdetail."_invoiceId"	=>$invoiceId,
						$this->pro->bookingdetail."_title"		=>$cart['productName'],
						$this->pro->bookingdetail."_productId"	=>$productId,
						$this->pro->bookingdetail."_unitId"		=>$unitId,
						$this->pro->bookingdetail."_quantity"	=>$cart['productUnitquantity'],
						$this->pro->bookingdetail."_price"		=>$cart['productUnitprice'],
						$this->pro->bookingdetail."_subtotal"	=>$cart['subtotal'],
						$this->pro->bookingdetail."_status"		=>'1',
					);
					
					$booking_id = $this->cm->addBookingdetail($add_bookingdetail);
					$this->cm->updateQty($unitId,array($this->pro->productunit."_quantity"=>$cart['productUnitquantity']));
				}	
				
				$data = array(
					'status'=>true,
					'response'=>array('order'=>"Order and user created Successfully "),
				);
			}else{
				$data = array(
					'error'=>true,
					'massage'=>"Some error occurred please try gen",
				);
			}
		}else{
			$data = array(
				'error'=>true,
				'massage'=>"Cart is Required",
			);
		}

		echo json_encode($data);
	}
	
	
	/*
	product Api 
	parameter : none
	written by privin kumar
	date : 01/06/2018
	*/
	public function Order_login(){ 
		$request = json_decode(file_get_contents("php://input"),true);
		$carts = $request['cart'];
		$user  = $request['user'];
		
		
		 //print_r($user);
		
		if(!empty($carts) && !empty($user)){

			$newa_ddress    = $user['newa_ddress'];
			$user_id    = $user['user_id'];
			
			if($newa_ddress == 1){
				$phone 		= $user['user_phone'];
				$zipcode  	= $user['user_zipcode'];
				$city 		= $user['user_city'];
				$password   = $this->pro->password($user['user_password']);
				$address	= $this->security->xss_clean($user['user_address']);
				$landmark 	= $this->security->xss_clean($user['user_landmark']);
			

				$default_update  = array($this->pro->useraddress."_default"=>'0');
				$this->cm->updateUserAddress($default_update,$user_id);
				
				
				$userAddress_array = array(
					$this->pro->useraddress."_user_id"=>$user_id,
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
					
					
				$this->cm->updateUser($user_array,$user_id);
			}
			
				$invoiceId = "EV".time();
				$apitotal = 0;
				foreach($carts as $carttotal){
					
					$apitotal += $carttotal['subtotal'];
					
				}
				
				$add_booking = array(
					$this->pro->booking."_userId"=>$user_id,
					$this->pro->booking."_total"=>$apitotal,
					$this->pro->booking."_invoiceId"=>$invoiceId,
					$this->pro->booking."_date"=>date("Y-m-d H:i:s"),
					$this->pro->booking."_status"=>'1',
				);
				
				$booking_id = $this->cm->addBooking($add_booking);
					
				foreach($carts as $cart){
					$ids = explode('-',$cart['id']);
					$productId = $ids[0];
					$unitId    = $ids[1];
					$add_bookingdetail = array(
						//$this->pro->bookingdetail."_bookingId"	=>$booking_id,
						$this->pro->bookingdetail."_userId"		=>$user_id,
						$this->pro->bookingdetail."_invoiceId"	=>$invoiceId,
						$this->pro->bookingdetail."_title"		=>$cart['productName'],
						$this->pro->bookingdetail."_productId"	=>$productId,
						$this->pro->bookingdetail."_unitId"		=>$unitId,
						$this->pro->bookingdetail."_quantity"	=>$cart['productUnitquantity'],
						$this->pro->bookingdetail."_price"		=>$cart['productUnitprice'],
						$this->pro->bookingdetail."_subtotal"	=>$cart['subtotal'],
						$this->pro->bookingdetail."_status"		=>'1',
					);
					
					$booking_id = $this->cm->addBookingdetail($add_bookingdetail);
					$this->cm->updateQty($unitId,array($this->pro->productunit."_quantity"=>$cart['productUnitquantity']));
				}	
				
				$data = array(
					'status'=>true,
					'response'=>array('order'=>"Order and user created Successfully "),
				);
			
			
		}else{
			$data = array(
				'error'=>true,
				'massage'=>"Cart and Userid is Required",
			);
		}

		echo json_encode($data);
	}


	
	
	/*
	Login Api 
	parameter : none
	written by privin kumar
	date : 01/06/2018
	*/
	public function login(){ 
		$request = json_decode(file_get_contents("php://input"),true);
		$email = $request['login_email'];
		$password = $this->pro->password($request['login_password']);

		if(!empty($email) && !empty($password)){

			$this->db->where($this->pro->user.'_email',$email);
			$this->db->where($this->pro->user.'_password',$password);
			$login_data = $this->db->get($this->pro->prifix.$this->pro->user)->row_array();
			if(!empty($login_data)){
				if($login_data[$this->pro->user."_status"] == '1'){
					$useraddress = $this->pm->UserAddress($login_data[$this->pro->user."_id"]);
					$useraddresdata = array();
					foreach($useraddress as $useraddres){
						$useraddresdata[] = array(
							"useraddres_id"=>$useraddres[$this->pro->useraddress."_id"],
							"user_phone"=>$useraddres[$this->pro->useraddress."_phone"],
							"user_zipcode"=>$useraddres[$this->pro->useraddress."_zipcode"],
							"user_city"=>$useraddres[$this->pro->useraddress."_city"],
							"user_address"=>$useraddres[$this->pro->useraddress."_address"],
							"user_landmark"=>$useraddres[$this->pro->useraddress."_landmark"],
							"user_default"=>$useraddres[$this->pro->useraddress."_default"],
						);
						
					}	
					$profile = array(
						"user_id"=>$login_data[$this->pro->user."_id"],
						"user_name"=>$login_data[$this->pro->user."_name"],
						"user_lastname"=>$login_data[$this->pro->user."_lastname"],
						"user_email"=>$login_data[$this->pro->user."_email"],
						"user_phone"=>$login_data[$this->pro->user."_phone"],
						"user_zipcode"=>$login_data[$this->pro->user."_zipcode"],
						"user_city"=>$login_data[$this->pro->user."_city"],
						"user_address"=>$login_data[$this->pro->user."_address"],
						"user_landmark"=>$login_data[$this->pro->user."_landmark"],
						"user_address" =>$useraddresdata
					);
					$data = array(
						'status'=>true,
						'response'=>array('user'=>$profile),
					);
					
					
				}else{
					$data = array(
						'error'=>true,
						'massage'=>"Your Account not verified yet",
					);
				}
				
			}else{
				$data = array(
					'error'=>true,
					'massage'=>"Invalid Username and Password",
				);
			}
			
			
		}else{
			$data = array(
				'error'=>true,
				'massage'=>"Username and password is Required",
			);
		}

		echo json_encode($data);
	}
	
	
	/*
	Booking Api 
	parameter : none
	written by privin kumar
	date : 01/06/2018
	*/
	public function booking(){ 
		$request = json_decode(file_get_contents("php://input"),true);
		$user_id = $request['user_id'];
		$pdata  = array();
		if(!empty($user_id)){
			$orders = $this->dash->booking($user_id);
			if($orders){
				foreach($orders as $order){
					$pudata = array();
					$products = array();
					$products = $this->dash->bookingdetail($order[$this->pro->booking.'_invoiceId']);;
					if($products){
						foreach($products as $product){
							$pudata[] = array(
								"productId"=>$product[$this->pro->product.'_id'],
								"productCategoryid" =>$product[$this->pro->product.'_category_id'],
								"productName" =>$product[$this->pro->product.'_title'],
								"productSKU"  =>$product[$this->pro->product.'_sku'],
								"productDescription" =>strip_tags(html_entity_decode(trim($product[$this->pro->product.'_description']))),
								"productShortdescription" =>strip_tags($product[$this->pro->product.'_shortdescription']),
								"productImage" =>strip_tags($product[$this->pro->product.'_image']),
								"productType" =>strip_tags($product[$this->pro->product.'_type']),
								"productUnitId"=>$product[$this->pro->productunit.'_id'],
								"productUnitname"=>$product[$this->pro->productunit.'_name'],
								"productUnitvalue"=>$product[$this->pro->productunit.'_value'],
								"productUnitquantity"=>$product[$this->pro->productunit.'_quantity'],
								"productUnitprice"=>$product[$this->pro->productunit.'_price'],
								"productUnitsellprice"=>$product[$this->pro->productunit.'_sellprice']
							);
						}
					}
					
					$pdata[] = array(
						"bookingId"=>$order[$this->pro->booking.'_id'],
						"invoiceId"=>$order[$this->pro->booking.'_invoiceId'],
						"invoiceDate" =>$order[$this->pro->booking.'_date'],
						"invoiceTotal" =>$order[$this->pro->booking.'_total'],
						"invoiceStatus" =>$order[$this->pro->booking.'_delivery'],
						"product" =>$pudata
					);
				
				}
			}
			$data = array(
				'status'=>true,
				'response'=>array('booking'=>$pdata),
			);
			
		}else{
			$data = array(
				'error'=>true,
				'massage'=>"Category Id is Required",
			);
		}

		echo json_encode($data);
	}
	
	/*
	cancel Api 
	parameter : none
	written by privin kumar
	date : 01/06/2018
	*/
	public function cancel(){ 
		$request = json_decode(file_get_contents("php://input"),true);
		$id = $request['bookingId'];
		
		if(!empty($id)){
	
			$bookingdata = $this->dash->bookingByid($id);
			$status_data = array($this->pro->booking.'_delivery'=>'3');
			$this->db->where($this->pro->booking."_id",$id);
			$status  = $this->db->update($this->pro->prifix . $this->pro->booking,$status_data);
			
			if($status){
				$qtydata = $this->dash->selectQtyByID($bookingdata[$this->pro->bookingdetail."_unitId"]);	
				$this->dash->updateQty($bookingdata[$this->pro->bookingdetail."_unitId"],array($this->pro->productunit."_quantity"=>($qtydata[$this->pro->productunit."_quantity"] + $bookingdata[$this->pro->bookingdetail."_quantity"] )));
				
				$data = array(
					'status'=>true,
					'response'=>"Your order successfully canceled",
				);
				
				
			}else{
				$data = array(
					'error'=>true,
					'massage'=>"Some Error occurred please try again !!!",
				);
			}

		}else{
			$data = array(
				'error'=>true,
				'massage'=>"invoiceId is Required",
			);
		}

		echo json_encode($data);
	}
	
	
	/*
	signup Api 
	parameter : none
	written by privin kumar
	date : 01/06/2018
	*/
	public function signup(){ 
		$request = json_decode(file_get_contents("php://input"),true);
		//print_r($request);
		if(!empty($request)){
		$firstname	= $user['user_name'];
			$lastname 	= $user['user_lastname'];
			$email 		= $user['user_email'];
			$phone 		= $user['user_phone'];
			$zipcode  	= $user['user_zipcode'];
			$city 		= $user['user_city'];
			$password   = $this->pro->password($user['user_password']);
			$address	= $this->security->xss_clean($user['user_address']);
			$landmark 	= $this->security->xss_clean($user['user_landmark']);
			
			$user_array = array(
				$this->pro->user."_name"=>$firstname,
				$this->pro->user."_lastname"=>$lastname,
				$this->pro->user."_email"=>$email,
				$this->pro->user."_phone"=>$phone,
				$this->pro->user."_zipcode"=>$zipcode,
				$this->pro->user."_city"=>$city,
				$this->pro->user."_address"=>$address,
				$this->pro->user."_password"=>$password,
				$this->pro->user."_landmark"=>$landmark,
				$this->pro->user."_status"=>'0',
				$this->pro->user."_type"=>'4',
			);
			
			$maildata = $this->cm->emailtemplete($email); 				
			$sent =  $this->pro->smtp_mail($email,"11needs.com Account verification",$maildata);
			
			if($sent['status'] == true){
				$data = array(
					'status'=>true,
					'response'=>"Sign up Successful Please check your mail for verification link",
				);
				
			}else{
				$data = array(
					'error'=>true,
					'massage'=>"Some Error occurred please try again !!!",
				);
			}

		}else{
			$data = array(
				'error'=>true,
				'massage'=>"All user data Required",
			);
		}

		echo json_encode($data);
	}
	
	/*
	make default adress Api 
	parameter : none
	written by privin kumar
	date : 01/06/2018
	*/
	public function defaultAddress(){ 
		$request = json_decode(file_get_contents("php://input"),true);
		$uid	= $user['user_id'];
		$id	= $user['useraddress_id'];
		if(!empty($id) || !empty($uid)){
			
			$update_datao = array(
				"useraddress_default"=>0,
			); 	
			
			$this->db->where("useraddress_user_id",$uid);
			$this->db->update("ecom_useraddress",$update_datao);
		
			$update_data = array(
				"useraddress_default"=>1,
			); 				
			
			$this->db->where("useraddress_user_id",$uid);
			$this->db->where("useraddress_id",$id);
			$edit = $this->db->update("ecom_useraddress",$update_data);
			
			if($edit){
				$data = array(
					'status'=>true,
					'response'=>"Default Address update successfully",
				);
				
			}else{
				$data = array(
					'error'=>true,
					'massage'=>"Some Error occurred please try again !!!",
				);
			}

		}else{
			$data = array(
				'error'=>true,
				'massage'=>"Userid and UserAddress id required",
			);
		}

		echo json_encode($data);
	}
	

}

?>