<?php
class Category extends CI_controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('project_model','pro');
		$this->load->model('category_model','cm');
	}

	
	
	public function index(){

    $category     = $this->uri->segment(1);
    $subcategory = $this->uri->segment(2);
		$data['categorys'] = $this->cm->category();
    $data['subcategorys'] = $this->cm->subcategory();
		$data['brands'] = $this->cm->brands($category,$subcategory);
    $data['colors'] = $this->cm->colors($category,$subcategory);
    $colors_ids = array();
      if($data['colors']){
        foreach ( $data['colors'] as $color) {
          $colors_ids[] = $color[$this->pro->color."_id"];
      }}
    $data['sizes'] = $this->cm->size($colors_ids);


		$data['products'] = $this->cm->product($category);
    $data['atributes'] = $this->cm->atributes($category,$subcategory);
		$data['atributeKey']=array();
		//$atributeKey = array_map("unserialize", array_unique(array_map("serialize", $atributes)));

    foreach( $data['atributes'] as $atribute){
      if (!in_array(trim(strtolower($atribute[$this->pro->atribute."_name"])) , $data['atributeKey'])){
         $data['atributeKey'][] =  trim(strtolower($atribute[$this->pro->atribute."_name"]));
      }
    }
/*
    print_r($atributes); 
    print_r($atributeKey);
    exit;*/
		
		$this->load->view('site_lib/head',$data);
		$this->load->view('site_lib/nav');
		$this->load->view('site/category');
		$this->load->view('site_lib/footer');
	}


	function multiple_filter(){
		$data = array();
    $category    = $this->input->post('category');
    $subcategory = $this->input->post('subcategory');
		$brand = $this->input->post('brand');
		$price       = $this->input->post('price');
    $atribute    = $this->input->post('atribute');
    $size        = $this->input->post('size');
    $color       = $this->input->post('color');

		$products = $this->cm->productFilter($category,$price,$subcategory,$brand,$atribute,$size,$color);


				if($products){
					foreach($products as $product){ 
				?>  
				  <div class="col-sm-6 col-md-4 wow fadeInUp">
                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <div class="image"> <a href="<?php echo $product[$this->pro->product."_url"]; ?>"><img  src="upload/<?php echo $product[$this->pro->product."_image"]; ?>" alt=""></a> </div>
                          <!-- /.image -->
                          
                          <div class="tag new"><span>new</span></div>
                        </div>
                        <!-- /.product-image -->
                        
                        <div class="product-info text-left">
                          <h3 class="name"><a href="<?php echo $product[$this->pro->product."_url"]; ?>"><?php echo $product[$this->pro->product."_title"]; ?></a></h3>
                          <div class="rating rateit-small"></div>
                          <div class="description"></div>
                          <div class="product-price"> <span class="price"> <i class="fas fa-rupee-sign"></i>  <?php echo $product[$this->pro->product."_sellprice"]; ?> </span> <span class="price-before-discount"><i class="fas fa-rupee-sign"></i>  <?php echo $product[$this->pro->product."_sellprice"]; ?></span> </div>
                          <!-- /.product-price --> 
                          
                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                          <div class="action">
                            <ul class="list-unstyled">
                              <li class="add-cart-button btn-group">
                                <a href="javascript:addTocart('<?php echo $product[$this->pro->product."_id"]; ?>')" class="btn btn-primary icon" > <i class="fa fa-shopping-cart"></i> </a>
                                <a href="javascript:addTocart('<?php echo $product[$this->pro->product."_id"]; ?>')" class="btn btn-primary cart-btn" >Add to cart</a>
                              </li>
                              <li class="lnk wishlist"> <a class="add-to-cart" href="productdetail" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                              <!-- <li class="lnk"> <a class="add-to-cart" href="productdetail" title="Compare"> <i class="fa fa-signal"></i> </a> </li> -->
                            </ul>
                          </div>
                          <!-- /.action --> 
                        </div>
                        <!-- /.cart --> 
                      </div>
                      <!-- /.product --> 
                      
                    </div>
                    <!-- /.products --> 
                  </div>
                  <!-- /.item -->
				<?php } } 
				die();
	}
}

?>