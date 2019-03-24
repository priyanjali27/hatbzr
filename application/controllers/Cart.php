<?php
class Cart extends CI_controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('project_model','pro');
		$this->load->model('Productdetail_model','pdm');
		$this->load->model('Cart_model','cartm');
	}


	
	public function index(){
		$data['categorys'] = $this->cartm->category();
		$data['subcategorys'] = $this->cartm->subcategory();
		$userid =  $this->session->username;
		$data['uaserdata'] = $this->cartm->User($userid);
		//$url = $this->uri->segment(2);
		$data['carts'] = $this->cart->contents();
		$data['carts'] = $this->cart->contents();
		$this->load->view('site_lib/head',$data);
		$this->load->view('site_lib/nav');
		$this->load->view('site/cart');
		$this->load->view('site_lib/footer');
	}
	

}

?>