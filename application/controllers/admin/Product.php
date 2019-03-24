<?php 
defined("BASEPATH") OR exit("no direct script are allowed");
class Product extends CI_Controller{
	
	public $privilege_data;
	
	public function __construct()
    {
	   parent:: __construct();
	   $this->load->model("project_model","pro");
	   $this->load->model("admin/product_model","pm");
	   
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
	
	
	/*======
	Ajax Request
	Fetch Sub category
	date : 24/07/2018
	=======*/	
	public function AjaxSubcategory(){
		$category 		= $this->security->xss_clean($this->input->post('category'));
		$subcategory_id	= $this->security->xss_clean($this->input->post('subcategory'));
		$subcategorys 	= $this->pm->subcategory($category);
		
		if(!empty($subcategorys)){
			echo"<option>Select Subcategory</option>";
			foreach($subcategorys as $subcategory){
				if($subcategory[$this->pro->category.'_id'] == $subcategory_id){ $select='selected'; }else{ $select=''; }
				echo"<option value='".$subcategory[$this->pro->category.'_id']."' ".$select." >".$subcategory[$this->pro->category.'_title']."</option>";
			}
		}else{
			echo"<option>Select Subcategory</option>";
		}
	}

	/*======
	Ajax Request
	Fetch Sub category
	date : 24/07/2018
	=======*/	
	public function AjaxChildcategory(){
		$subcategory 		= $this->security->xss_clean($this->input->post('subcategory'));
		$childcategory_id	= $this->security->xss_clean($this->input->post('childcategory'));
		$childcategorys 	    = $this->pm->childcategory($subcategory);
		
		if(!empty($childcategorys)){
			echo"<option>Select Childcategory</option>";
			foreach($childcategorys as $childcategory){
				if($childcategory[$this->pro->category.'_id'] == $childcategory_id){ $select='selected'; }else{ $select=''; }
				echo"<option value='".$childcategory[$this->pro->category.'_id']."' ".$select." >".$childcategory[$this->pro->category.'_title']."</option>";
			}
		}else{
			echo"<option>Select Childcategory</option>";
		}
	}
	
	
	
	 /*
	 function index in only show 
	 list of data table 
	 
	 */
    public function index(){
        
		if($this->session->user_type == '1')
		{
			$data['privilege_data']=$this->privilege_data;
		}
		
		$data['title'] ="Post";
		$data['heding']="Post";
		

		//$data['company_lists'] = $this->pm->company_list();
		
		if($this->input->post('category') !="")
		{
	        $category = $this->input->post('category');
		}
		else{
			$category = str_replace("%20",' ',($this->uri->segment(4))?$this->uri->segment(4):"0");
		}
		
		if($this->input->post('title') !="")
		{
	         $title = trim($this->input->post('title'));
		}
		else{
			$title = str_replace("%20",' ',($this->uri->segment(5))?$this->uri->segment(5):'0');
		}
		

		
		$allrecord = $this->pm->allrecord($category,$title);
		
		$baseurl =  base_url().'admin/'.$this->router->class.'/'.$this->router->method.'/'.$category.'/'.$title;
		
		$pagin       = $this->pro->pagination($baseurl,$allrecord,10,3,6);
        $offset      = $pagin['offset'];
		$limit       = $pagin['limit'];
		$data['nav'] = $pagin['nav'];
		
		$data['post_datas'] = $this->pm->company_data($offset,$limit,$category,$title);
		
        $this->load->view("lib/head",$data);
	    $this->load->view("lib/nav");
	    $this->load->view("lib/sidbar");
	    $this->load->view("admin/product/index");
	    $this->load->view("lib/footer");

    }
	
	
	/*
	function add 
	view add form 
	and add Record to table
	
	*/
	public function add()
	{   
	   
		if($this->session->user_type == '1')
		{
			$data['privilege_data']=$this->privilege_data;
	        ($this->privilege_data[$this->pro->userprivilege.'_add'] == '1')?"":redirect('admin/dashboard');
		}
	    $data['button_name'] = "Save"; 
		$data['title'] ="Post";
		$data['heding']="Post"; 
		 
        $data['categorys'] = $this->pm->category();
        $data['brands'] = $this->pm->brand();

	    if($this->input->post('Save') !='')
		{
			 
				 $this->form_validation->set_rules('category','category', 'trim|required');
				 //$this->form_validation->set_rules('subcategory','subcategory', 'trim|required');
				 //$this->form_validation->set_rules('childcategory','childcategory', 'trim|required');
				 $this->form_validation->set_rules('brand','brand', 'trim|required');
				 $this->form_validation->set_rules('title','title', 'trim|required');
				 $this->form_validation->set_rules('sku','sku', 'trim|required');
				 $this->form_validation->set_rules('price','price', 'trim|required');
				 $this->form_validation->set_rules('sellprice','Sell Price', 'trim');
				 $this->form_validation->set_rules('quantity','Quantity', 'trim|required');
				 $this->form_validation->set_rules('description','description', 'trim|required');
				 $this->form_validation->set_rules('sdescription','Short description', 'trim|required');
				 
				  
				$category     = $this->input->post('category');   
				$subcategory  = $this->input->post('subcategory');
				$childcategory= $this->input->post('childcategory');
				$brand        = $this->input->post('brand');
				$title        = $this->input->post('title'); 
				$url          = str_replace(" ","_",preg_replace('!\s+!', ' ',trim($title)));
				$sku          = $this->input->post('sku');
				$price        = $this->input->post('price');
				$sellprice    = $this->input->post('sellprice');
				$quantity     = $this->input->post('quantity');
				$description  = $this->input->post('description');
				$sdescription = $this->input->post('sdescription');

				$color          = $this->input->post('color');
				$color_price           = $this->input->post('color_price');
				$color_quantity           = $this->input->post('color_quantity');
				$color_size           = $this->input->post('color_size');
				$size_price          = $this->input->post('size_price');
				$size_quantity           = $this->input->post('size_quantity');
				
				$atribute_name  = $this->input->post('atribute_name');
				$atribute_value = $this->input->post('atribute_value');


					
			    $title_dupli = $this->pm->title_dupli($title);
			    $url_dupli   = $this->pm->url_dupli($url);
			 
				if($this->form_validation->run() == true && $title_dupli == true && $url_dupli == true){
					 $add_data_post = array(
					 $this->pro->product."_category_id"  =>$category,
					 $this->pro->product."_subcategory_id"=>$subcategory,
					 $this->pro->product."_childcategory_id"=>$childcategory,
					 $this->pro->product."_brand_id"  	 =>$brand,
					 $this->pro->product."_title"        =>$title,
					 $this->pro->product."_url"          =>$url,
					 $this->pro->product."_sku"          =>$sku,
					 $this->pro->product."_price"        =>$price,
					 $this->pro->product."_sellprice"    =>$sellprice,
					 $this->pro->product."_quantity"     =>$quantity,
					 $this->pro->product."_description"  =>$description,
					 $this->pro->product."_shortdescription" =>$sdescription,
					 $this->pro->product."_date"         =>date("Y-m-d h:i:s"),
					 $this->pro->product."_status"       =>'1',
					 ); 
					
					$image_data       = $this->pro->upload('image');
					
					if(isset($image_data['success'][0]['file_name']) && $image_data['success'][0]['file_name'] !=''){
					 $add_data_post[ $this->pro->product."_image"] = $image_data['success'][0]['file_name'];
					}
					else{
						$this->session->set_flashdata("logo",$image_data['error'][0]);
					}
					
					$product_id = $this->pm->add($add_data_post);

					




					foreach($color as $color_key=>$color_value){
						$color_add_data = array(
							$this->pro->color."_product_id"=>$product_id,
							$this->pro->color."_name"      =>$color_value,
							$this->pro->color."_price"     =>isset($color_price[$color_key])?$color_price[$color_key]:0,
							$this->pro->color."_quantity"  =>isset($color_quantity[$color_key])?$color_quantity[$color_key]:0,
							$this->pro->color."_status"    =>'1',
						);
						$this->db->insert($this->pro->prifix.$this->pro->color,$color_add_data);
						$color_id = $this->db->insert_id();
						if(isset($color_size[$color_key])){
							foreach($color_size[$color_key] as $size_key=>$size_value){
								$size_add_data = array(
									$this->pro->size."_product_id"=>$product_id,
									$this->pro->size."_color_id"  =>$color_id,
									$this->pro->size."_value"     =>$size_value,
									$this->pro->size."_price"     =>isset($size_price[$color_key][$size_key]) ? $size_price[$color_key][$size_key]:0,
									$this->pro->size."_quantity"  =>isset($size_quantity[$color_key][$size_key]) ? $size_quantity[$color_key][$size_key]:0,
									$this->pro->size."_status"    =>'1',
								);
								$this->db->insert($this->pro->prifix.$this->pro->size,$size_add_data);
							}
						}

						if(!empty($_FILES['color_gallery'.$color_key]['name'][0])){
							$color_gallery_data         = $this->pro->upload_multiple('color_gallery'.$color_key);
							if(isset($color_gallery_data['success'][0]['file_name']) && $color_gallery_data['success'][0]['file_name'] !=''){
							 
								foreach($color_gallery_data['success'] as $gallery){
									$gallery_img_add_data = array(
										$this->pro->productimage."_product_id"=>$product_id,
										$this->pro->productimage."_color_id"=>$color_id,
										$this->pro->productimage."_name"      =>$gallery['file_name'],
										$this->pro->productimage."_status"    =>'1',
									);
									$this->db->insert($this->pro->prifix.$this->pro->productimage,$gallery_img_add_data);
								} 
							 
							}
							else{
								$this->session->set_flashdata("color_gallery",$color_gallery_data['error'][0]);
							}
						}	


					} 

					foreach($atribute_name as $atribute_name_key=>$atribute_name_value){
						$atribute_add_data = array(
							$this->pro->atribute."_product_id"=>$product_id,
							$this->pro->atribute."_name"      =>$atribute_name_value,
							$this->pro->atribute."_value"     =>$atribute_value[$atribute_name_key],
							$this->pro->atribute."_status"    =>'1',
						);
						$this->db->insert($this->pro->prifix.$this->pro->atribute,$atribute_add_data);
					} 


					
					
					$gallery_data         = $this->pro->upload_multiple('gallery');
					
					if(isset($gallery_data['success'][0]['file_name']) && $gallery_data['success'][0]['file_name'] !=''){
					 
						foreach($gallery_data['success'] as $product_gallery){
							$product_img_add_data = array(
								$this->pro->productimage."_product_id"=>$product_id,
								$this->pro->productimage."_name"      =>$product_gallery['file_name'],
								$this->pro->productimage."_status"    =>'1',
							);
							$this->db->insert($this->pro->prifix.$this->pro->productimage,$product_img_add_data);
						} 
					 
					}
					else{
						$this->session->set_flashdata("gallery",$gallery_data['error'][0]);
					}
					
					

					  
						 if($product_id){
							 $this->session->set_flashdata("success","Product Add Successfully");
							 redirect('admin/product');
						 }
				 
					
				}	
							
            
			 
		}
		
	     $this->load->view("lib/head",$data);
	     $this->load->view("lib/nav");
	     $this->load->view("lib/sidbar");
	     $this->load->view("admin/product/index");
	     $this->load->view("lib/footer");
		
	}
	
	
	/*
	function edit 
	open edit form 
	and update Record to table 
	
	*/
	public function edit($id)
	{   
	    
	    $data['edit_data']  = $this->pm->ed_data($id);
	    $data['edit_data_gallery']  = $this->pm->ed_data_gallery($id);
		if($this->session->user_type == '1')
		{   
	        $data['privilege_data']=$this->privilege_data;
	        ($this->privilege_data[$this->pro->userprivilege.'_edit'] == '1')?"":redirect('admin/dashboard');
		}
	     
		$data['title'] ="Post";
		$data['heding']="Post"; 
		$data['button_name'] = "Update";  
        $data['categorys'] = $this->pm->category();
		$data['brands'] = $this->pm->brand();
		
	    if($this->input->post('Update') !='')
		{
			$this->form_validation->set_rules('category','category', 'trim|required');
			//$this->form_validation->set_rules('subcategory','subcategory', 'trim|required');
			//$this->form_validation->set_rules('childcategory','childcategory', 'trim|required');
			$this->form_validation->set_rules('brand','brand', 'trim|required');
			$this->form_validation->set_rules('title','title', 'trim|required');
			$this->form_validation->set_rules('sku','sku', 'trim|required');
			$this->form_validation->set_rules('price','price', 'trim|required');
			$this->form_validation->set_rules('sellprice','Sell Price', 'trim');
			$this->form_validation->set_rules('quantity','Quantity', 'trim|required');
			$this->form_validation->set_rules('description','description', 'trim|required');
			$this->form_validation->set_rules('sdescription','Short description', 'trim|required');
			 
			  
			$category     = $this->input->post('category');
			$subcategory  = $this->input->post('subcategory');
			$childcategory= $this->input->post('childcategory');
			$brand        = $this->input->post('brand');
			$title        = $this->input->post('title'); 
			$url          = str_replace(" ","_",preg_replace('!\s+!', ' ',trim($title)));
			$sku          = $this->input->post('sku');
			$price        = $this->input->post('price');
			$sellprice    = $this->input->post('sellprice');
			$quantity     = $this->input->post('quantity');
			$description  = $this->input->post('description');
			$sdescription = $this->input->post('sdescription');

			$color          = $this->input->post('color');
			$color_price           = $this->input->post('color_price');
			$color_quantity           = $this->input->post('color_quantity');
			$color_size           = $this->input->post('color_size');
			$size_price          = $this->input->post('size_price');
			$size_quantity           = $this->input->post('size_quantity');

			$atribute_name  = $this->input->post('atribute_name');
			$atribute_value = $this->input->post('atribute_value');


					foreach($color as $color_key=>$color_value){
						$color_add_data = array(
							$this->pro->color."_product_id"=>$id,
							$this->pro->color."_name"      =>$color_value,
							$this->pro->color."_price"     =>isset($color_price[$color_key])?$color_price[$color_key]:0,
							$this->pro->color."_quantity"  =>isset($color_quantity[$color_key])?$color_quantity[$color_key]:0,
							$this->pro->color."_status"    =>'1',
						);
						$this->db->insert($this->pro->prifix.$this->pro->color,$color_add_data);
						$color_id = $this->db->insert_id();
						if(isset($color_size[$color_key])){
							foreach($color_size[$color_key] as $size_key=>$size_value){
								$size_add_data = array(
									$this->pro->size."_product_id"=>$id,
									$this->pro->size."_color_id"  =>$color_id,
									$this->pro->size."_value"     =>$size_value,
									$this->pro->size."_price"     =>isset($size_price[$color_key][$size_key]) ? $size_price[$color_key][$size_key]:0,
									$this->pro->size."_quantity"  =>isset($size_quantity[$color_key][$size_key]) ? $size_quantity[$color_key][$size_key]:0,
									$this->pro->size."_status"    =>'1',
								);
								$this->db->insert($this->pro->prifix.$this->pro->size,$size_add_data);
							}
						}

						if(!empty($_FILES['color_gallery'.$color_key]['name'][0])){
							$color_gallery_data         = $this->pro->upload_multiple('color_gallery'.$color_key);
							if(isset($color_gallery_data['success'][0]['file_name']) && $color_gallery_data['success'][0]['file_name'] !=''){
							 
								foreach($color_gallery_data['success'] as $gallery){
									$gallery_img_add_data = array(
										$this->pro->productimage."_product_id"=>$id,
										$this->pro->productimage."_color_id"=>$color_id,
										$this->pro->productimage."_name"      =>$gallery['file_name'],
										$this->pro->productimage."_status"    =>'1',
									);
									$this->db->insert($this->pro->prifix.$this->pro->productimage,$gallery_img_add_data);
								} 
							 
							}
							else{
								$this->session->set_flashdata("color_gallery",$color_gallery_data['error'][0]);
							}
						}	


					} 



 
			$title_dupli = $this->pm->title_dupli($title,$id);
			$url_dupli   = $this->pm->url_dupli($url,$id);
			if($this->form_validation->run() == true && $title_dupli == true && $url_dupli == true){
				 
				
			    $image = '';
				 
				if($_FILES['image']['name'] !=""){
					
					$logo_data  = $this->pro->upload('image');
					if(isset($logo_data['success'][0]['file_name']) && $logo_data['success'][0]['file_name'] !="" )
					{
						if($data['edit_data'][$this->pro->product.'_logo'] !=''){
							unlink('upload/'.$data['edit_data'][$this->pro->product.'_logo']);
						}
						$image       = $logo_data['success'][0]['file_name'];
					}
					else{
						 $this->session->set_flashdata("image",$logo_data['error'][0]); 
					}
				}
				else{
					 $image = $data['edit_data'][$this->pro->product.'_image'];
				}
				 
				
				 
				$edit_data_company = array(
					 $this->pro->product."_category_id"  =>$category,
					 $this->pro->product."_subcategory_id"=>$subcategory,
					 $this->pro->product."_childcategory_id"=>$childcategory,
					 $this->pro->product."_brand_id"  	 =>$brand,
					 $this->pro->product."_title"        =>$title,
					 $this->pro->product."_url"          =>$url,
					 $this->pro->product."_sku"          =>$sku,
					 $this->pro->product."_price"        =>$price,
					 $this->pro->product."_sellprice"    =>$sellprice,
					 $this->pro->product."_quantity"     =>$quantity,
					 $this->pro->product."_description"  =>$description,
					 $this->pro->product."_shortdescription" =>$sdescription,
					 $this->pro->product."_image"	     =>$image,
				);
				  

				$edit = $this->pm->update($edit_data_company,$id);
				$gallery_data         = $this->pro->upload_multiple('gallery');
					
					if(isset($gallery_data['success'][0]['file_name']) && $gallery_data['success'][0]['file_name'] !=''){
					 
						foreach($gallery_data['success'] as $product_gallery){
							$product_img_add_data = array(
								$this->pro->productimage."_product_id"=>$id,
								$this->pro->productimage."_name"      =>$product_gallery['file_name'],
								$this->pro->productimage."_status"    =>'1',
							);
							$this->db->insert($this->pro->prifix.$this->pro->productimage,$product_img_add_data);
						} 
					 
					}
					else{
						$this->session->set_flashdata("gallery",$gallery_data['error'][0]);
					}
				if($edit){
					
					 $this->session->set_flashdata("success","Product Update Successfully");
					   redirect('admin/product');		
				}						 

			}
			 
		}
		
	     $this->load->view("lib/head",$data);
	     $this->load->view("lib/nav");
	     $this->load->view("lib/sidbar");
	     $this->load->view("admin/product/index");
	     $this->load->view("lib/footer");
		
	}
	
	
	public function view($id){
		
		$data['view_data']  = $this->pm->ed_data($id);
		$data['edit_data_gallery']  = $this->pm->ed_data_gallery($id);
		$data['title'] ="Post";
		$data['heding']="Post"; 
		
		 $this->load->view("lib/head",$data);
	     $this->load->view("lib/nav");
	     $this->load->view("lib/sidbar");
	     $this->load->view("admin/product/view");
	     $this->load->view("lib/footer");
		
	}
	
	/*
	function status   
    paramiter:- id value
	working :- change status of 
	particular Record
	*/
	public function status($id,$val){
		
		 $status_data = array($this->pro->product.'_status'=>trim($val));
		 $status = $this->pm->update($status_data,$id);
			
			if($status){
				$this->session->set_flashdata("success","Status Update Successfully");
                redirect('admin/product');
			}	
	}


	/*
	function newarrival   
    paramiter:- id value
	working :- change newarrival of 
	particular Record
	*/
	public function newarrival($id,$val){
		
		 $newarrival_data = array($this->pro->product.'_newarrival'=>trim($val));
		 $newarrival = $this->pm->update($newarrival_data,$id);
			
			if($newarrival){
				$this->session->set_flashdata("success","newarrival Update Successfully");
                redirect('admin/product');
			}	
	}


	/*
	function feature   
    paramiter:- id value
	working :- change feature of 
	particular Record
	*/
	public function feature($id,$val){
		
		 $feature_data = array($this->pro->product.'_feature'=>trim($val));
		 $feature = $this->pm->update($feature_data,$id);
			
			if($feature){
				$this->session->set_flashdata("success","feature Update Successfully");
                redirect('admin/product');
			}	
	}
	
	
	
	/*
	function slider   
    paramiter:- id value
	working :- change status of 
	particular Record
	*/
	public function slider($id,$val){
		
		 $status_data = array($this->pro->product.'_slider'=>trim($val));
		 $status = $this->pm->update($status_data,$id);
			
			if($status){
				$this->session->set_flashdata("success","Slider Update Successfully");
                redirect('admin/product');
			}	
	}
	
		/*
	function delete   
    paramiter:- id 
	working :- delete particular 
	Record from table
	*/
	public function delete($id){
		
		 $delet_data = $this->pm->ed_data($id);
		if($this->session->user_type == '1')
		{   
	        $data['privilege_data']=$this->privilege_data;
	        ($this->privilege_data[$this->pro->userprivilege.'_delete'] == '1')?"":redirect('admin/dashboard');
		}
		if($delet_data[$this->pro->product.'_logo']){
			unlink('upload/'.$delet_data[$this->pro->product.'_logo']);
		}
		if($delet_data[$this->pro->product.'_attachment'])
		{
			unlink('upload/'.$delet_data[$this->pro->product.'_attachment']);
		}
		 $del_post = $this->pm->delete($id);
		if($del_post){
			$this->session->set_flashdata("success","Product Delete Successfully");
			redirect('admin/product');
		}
	}
	
		/*
	function del_logo  
    paramiter:- id 
	working :- delete logo of 
	particular Record at update time
	*/
	public function del_img($id){
		$delet_data = $this->pm->ed_data($id);
		if($delet_data[$this->pro->product.'_image'])
		{
			unlink('upload/'.$delet_data[$this->pro->product.'_image']);
		}	
		$edit_data = array($this->pro->product."_image"  =>"",);
		$del = $this->pm->update($edit_data,$id);
		$this->session->set_flashdata("success","Product Logo Delete Successfully");
		redirect("admin/product/edit/$id");
	}
	
		/*
	function del_attachment  
    paramiter:- id 
	working :- delete image of 
	particular Record at update time
	*/
	public function gallery_del($id,$gid){
		$delete_data = $this->pm->ed_data_gallery($id,$gid);
	    if($delete_data[0][$this->pro->productimage.'_name'])
		{
			unlink('upload/'.$delete_data[0][$this->pro->productimage.'_name']);
		}
	
		$del = $this->pm->del_gallery($id,$gid);
		$this->session->set_flashdata("success","Product Gallery image Delete Successfully");
		redirect("admin/product/edit/$id");
	}
	
	



  public function deleteByColor($colorId,$productId)
  {

  	/************/
  	$deleteColorId = $this->pm->deleteColorTableRecord($colorId,$productId);
  	$deleteSizeByColor = $this->pm->deleteColorSizeData($colorId,$productId);
  	$deleteImageBycolorSize = $this->pm->getImageNameByColorSize($colorId,$productId);
  	/************/
  	$this->session->set_flashdata("success","Product Delete accourding to color");
  	redirect("admin/product/edit/$productId");
  }
	
	
}

?>