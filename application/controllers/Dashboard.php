<?php
class Dashboard extends CI_controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('project_model','pro');
		$this->load->model('Dashboard_model','dash');
		/*if(empty($this->session->username)){
			redirect();
		}*/
	}


	
	public function index(){
		$userId = $this->session->username;
		$data['categorys'] = $this->dash->category();
		$data['subcategorys'] = $this->dash->subcategory();
		$data['orders']  = $this->dash->booking($userId);
		
		$this->load->view('site_lib/head',$data);
		$this->load->view('site_lib/nav');
		$this->load->view('site/dashboard');
		$this->load->view('site_lib/footer');
	}
	
	
	public function cancel($id){
		
		$bookingdata = $this->dash->bookingByid($id);
		$status_data = array($this->pro->booking.'_delivery'=>'3');
		$this->db->where($this->pro->booking."_id",$id);
		$status  = $this->db->update($this->pro->prifix . $this->pro->booking,$status_data);
		//echo $bookingdata[$this->pro->bookingdetail."_unitId"];  exit;
		if($status){
			$qtydata = $this->dash->selectQtyByID($bookingdata[$this->pro->bookingdetail."_unitId"]);	
			$this->dash->updateQty($bookingdata[$this->pro->bookingdetail."_unitId"],array($this->pro->productunit."_quantity"=>($qtydata[$this->pro->productunit."_quantity"] + $bookingdata[$this->pro->bookingdetail."_quantity"] )));
			$this->session->set_flashdata("success","Status Update Successfully");
			redirect('dashboard');
		}
	}
	

}

?>