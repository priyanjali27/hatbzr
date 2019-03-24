<?php
class Home extends CI_controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('project_model','pro');
		$this->load->model('home_model','home');
	}

	
	
	public function index(){
		$data['title'] = 'Haat Bazar';
		$data['meta_description'] = 'Haat Bazar is online shoping Site';
		$data['banners'] = $this->home->banner();
		$data['categorys'] = $this->home->category();
		$data['subcategorys'] = $this->home->subcategory();
		$data['products'] = $this->home->product();
		$data['feature'] = $this->home->feature();
		$data['newarrival'] = $this->home->newarrival();

		//echo"<pre>";
		//print_r($data['subcategorys']); exit;
		
		$this->load->view('site_lib/head',$data);
		$this->load->view('site_lib/nav');
		$this->load->view('site/index');
		$this->load->view('site_lib/footer');
	}




	public function addTocart(){
		$action     = $this->input->post('action');
		
		if($action == 'add'){
		    $product_id	= $this->input->post('product_id');
		    $qty		= $this->input->post('qty');
		    $color_id   = $this->input->post('color');
		    $size_id		= $this->input->post('size');
			$product    = $this->home->productByid($product_id);
			$color_name="";
			$size_value ="";
            
            $price = $product[$this->pro->product."_sellprice"]?$product[$this->pro->product."_sellprice"]:$product[$this->pro->product."_price"];

			if(!empty($color_id)){
				$product_id	= $product_id+"-"+$color_id;
				$color    = $this->home->colorByid($color_id);
				if($color['color_price']>0){
					$price = $color['color_price'];
				}
				$color_name=$color['color_name'];

				//print_r($color);
			}

			if(!empty($size_id)){
				$product_id	= $product_id+"-"+$size_id;
				$size    = $this->home->sizeByid($size_id);
				//print_r($size);
				if($size['size_price']>0){
					$size_value = $size['size_value'];
				}
				$price = $size['size_price'];
			}

			if(empty($qty)){
				$qty = 1;
			}
		
			

			$pdata = array(
				'id'      => $product_id,
				'qty'     => $qty,
				'price'   => $price,
				'name'    => preg_replace('/[^a-z0-9s]/i', ' ',$product[$this->pro->product.'_title']),
				 "image"   => $product[$this->pro->product.'_image'],
				 "color_id"	  => $color_id,
				 "color_name"	=>$color_name,
				 "size_id"=> $size_id,
				 "size_value"	=>$size_value,

			);
			
		    $this->cart->insert($pdata);
		}
		

		if($action == 'update_qty' ){
			if($this->input->post('rowid') && isset($this->cart->contents()[$this->input->post('rowid')])){
				$rowid = $this->input->post('rowid');
				$qty = $this->input->post('qty');
				$pdata = array(
				'rowid' => $rowid,
				'qty'   => $qty,
				);
				$this->cart->update($pdata);
			}
		}



		if($action == 'delete' ){
			if($this->input->post('rowid') && isset($this->cart->contents()[$this->input->post('rowid')])){
				$rowid = $this->input->post('rowid');
				$qty = $this->cart->contents()[$rowid]['qty'];
				$pdata = array(
				'rowid' => $rowid,
				'qty'   => $qty - 1,
				);
				$this->cart->update($pdata);
			}
		}
		
		if($action == 'empty' ){
			$this->cart->destroy();
		}
		  $total =0;
		  if($this->cart->contents()){
			 // print_r($this->cart->contents());
		  ?>

		  		<a href="#" class="dropdown-toggle lnk-cart " data-toggle="dropdown">
	            <div class="items-cart-inner">
	              <div class="basket"> <i class="glyphicon glyphicon-shopping-cart"></i> </div>
	              <div class="basket-item-count"><span class="count"><?php echo count(@$this->cart->contents()); ?></span></div>
	              <div class="total-price-basket"> <span class="lbl">cart -</span> <span class="total-price"> <span class="sign"></span><span class="value"> Data</span> </span> </div>
	            </div>
	            </a>
	            <ul class="dropdown-menu" style="width: 270px;">
	            <?php  foreach($this->cart->contents() as $data){ ?>
	              <li>
	                <div class="cart-item product-summary">
	                  <div class="row">
	                    <div class="col-xs-4">
	                      <div class="image"> <a href="detail.html"><img src="upload/<?php echo $data['image']; ?>" alt=""></a> </div>
	                    </div>
	                    <div class="col-xs-7">
	                      <h3 class="name"><a href="javascript:void(0)"><?php echo $data['name']; ?></a></h3>
	                      <div class="price" style="width: 60%;">
	                      	color : <div style="width: 20px;height: 20px;background:#<?php echo $data['color_name']; ?>;float: right; "></div>
	                      </div>

	                       <div class="price" >
	                      	Size : <?php echo $data['size_value']; ?> 
	                      </div>

	                      <div class="price" style="font-size: 12px;" >Qty <?php echo $data['qty']; ?> *  <i class="fas fa-rupee-sign"></i> <?php echo $data['price']; ?> <br /> Sub Total : <?php echo $data['subtotal']; ?></div>
	                    </div>
	                    <div class="col-xs-1 action"> <a href="javascript:void(0)" onclick="remove_cart('<?php echo $data['rowid']; ?>')" ><i class="fa fa-trash"></i></a> </div>
	                  </div>
	                </div>
	                <!-- /.cart-item -->
	                <div class="clearfix"></div>
	                <hr>
	               
	                <!-- /.cart-total--> 
	                
	              </li>
	            <?php 
	            	$total += $data['subtotal'];
	        	} 
	        	?>



	        	 	<div class="clearfix cart-total">
	                  <div class="pull-right"> <span class="text">Total :</span><span class='price'><i class="fas fa-rupee-sign"></i> <?php echo $total; ?> </span> </div>
	                  <div class="clearfix"></div>
	                  <a href="cart" class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a> 
	                  <a href="javascript:void(0)" onclick="empty_cart();" class="btn btn-upper btn-primary btn-block m-t-20">Empty</a> 
	              	</div>

	            </ul>



 
		<?php   } else{
		?>

		 		<a href="#" class="dropdown-toggle lnk-cart " data-toggle="dropdown">
	            <div class="items-cart-inner">
	              <div class="basket"> <i class="glyphicon glyphicon-shopping-cart"></i> </div>
	              <div class="basket-item-count"><span class="count"><?php echo count(@$this->cart->contents()); ?></span></div>
	              <div class="total-price-basket"> <span class="lbl">cart -</span> <span class="total-price"> <span class="sign"></span><span class="value"> Data </span> </span> </div>
	            </div>
	            </a>
	            <ul class="dropdown-menu">
	           
	              <li>
	               <div style='color:red; font-size:20px;' >Cart Empty</div>
	                
	              </li>
	            </ul>
		
		<?php	 
		 }	
	
	}
	
	public function search(){
		$key = $this->input->post('key');
		$products = $this->home->productByKey($key);
		echo'<dive class="ls_result_div" ><ul >';
		foreach($products as $product){
			echo'<li><a href="'.base_url().'detail/'.$product[$this->pro->product.'_url'].'"><img src="'.base_url().'upload/'.$product[$this->pro->product.'_image'].'" width="50" style="margin-right:5px;" >'.$product[$this->pro->product.'_title'].'</a></li>';
		}
		echo'</ul></div>';
	}



	public function ajaxProductSearch()
	{
		$search_keyword = $this->input->post('search_keyword');
		$keyword_details = $this->home->searchProductByKeyword($search_keyword);
 			$hatmData = '<div class="ls_result_div">';
                $hatmData .= '<ul>';
                    if($keyword_details)
                    {
                    	foreach ($keyword_details as $key => $value) 
                    	{
                    		$hatmData .= '<li>';
		                        $hatmData .= '<a href="'.$value[$this->pro->product.'_url'].'">';
		                            $hatmData .= '<img src="upload/'.$value[$this->pro->product.'_image'].'" width="50" height="50" style="margin-right:5px;">'.
		                               $value[$this->pro->product.'_title'];
		                        $hatmData .= '</a>';
		                    $hatmData .= '</li>';
                    	}
                    }
                $hatmData .= '</ul>';
            $hatmData .= '</div>';
           echo $hatmData;
	}
	
}

?>