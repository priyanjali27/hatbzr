<?php
class Productdetail extends CI_controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('project_model','pro');
		$this->load->model('productdetail_model','pm');
		error_reporting(0);
	}

	
	
	public function index(){
		$url = $this->uri->segment(1);
		$color_id = $this->uri->segment(2);
		$data['categorys'] = $this->pm->category();
		$data['subcategorys'] = $this->pm->subcategory();
		$data['product'] = $this->pm->product($url);
		$pid = $data['product'][$this->pro->product.'_id'];
		$category      = $data['product'][$this->pro->product.'_category_id'];
		$subcategory   = $data['product'][$this->pro->product.'_subcategory_id'];
		$childcategory = $data['product'][$this->pro->product.'_childcategory_id'];
		$data['related_products'] = $this->pm->relatedProduct($pid,$category,$subcategory,$childcategory);
		//echo"<pre>";
		//print_r($data['related_product']);
		$data['product_color'] = $this->pm->productColor($pid);
		$data['product_atribute'] = $this->pm->productAtribute($pid);
/*************************************************/
		if($color_id)
		{
			if(!$data['productimages'] = $this->pm->productImagesColorWise($pid,$color_id))
			{
				$data['productimages'] = $this->pm->productImages($pid);
			}
		}
		else
		{
			if(!$data['productimages'] = $this->pm->productImagesColorWise($pid,$data['product_color'][0]['color_id']))
			{
				$data['productimages'] = $this->pm->productImages($pid);
			}
		}
/****************************************************/
		

		if($color_id)
		{
			$data['productSize'] = $this->pm->productColorWiseSize($pid,$color_id);	
		}
		else
		{
			$data['productSize'] = $this->pm->productColorWiseSize($pid,$data['product_color'][0]['color_id']);
		}
		$this->load->view('site_lib/head',$data);
		$this->load->view('site_lib/nav');
		$this->load->view('site/detail');
		$this->load->view('site_lib/footer');
	}



}

?>