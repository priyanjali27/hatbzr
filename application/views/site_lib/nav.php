<body class="cnt-home">
<!-- ============================================== HEADER ============================================== -->

<div id="ajax_loading">
  <img id="loading-image" src="<?php echo base_url(); ?>/site/loader.gif" alt="Loading..." />
</div>


<header class="header-style-1"> 
  
  <!-- ============================================== TOP MENU ============================================== -->
  <div class="top-bar animate-dropdown">
    <div class="container">
      <div class="header-top-inner">
        <div class="cnt-account">
          <ul class="list-unstyled">
            <li><a href="#"><i class="icon fa fa-user"></i>My Account</a></li>
            <li><a href="#"><i class="icon fa fa-heart"></i>Wishlist</a></li>
            <?php if(!$this->session->username){ ?>
            <li><a href="login"><i class="icon fa fa-lock"></i>Login</a></li>
            <li><a href="login"><i class="icon fa fa-lock"></i>Agent Login</a></li>
          <?php } else{ ?>
            <li><a href="logout"><i class="icon fa fa-lock"></i>Logout</a></li>
          <?php } ?>
          </ul>
        </div>
        <!-- /.cnt-account -->
        
       <!--  <div class="cnt-block hidden-sm hidden-xs">
          <ul class="list-unstyled list-inline">
            <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">USD </span><b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">USD</a></li>
                <li><a href="#">INR</a></li>
                <li><a href="#">GBP</a></li>
              </ul>
            </li>
            <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">English </span><b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">English</a></li>
                <li><a href="#">French</a></li>
                <li><a href="#">German</a></li>
              </ul>
            </li>
          </ul>
        </div> -->
        <!-- /.cnt-cart -->
        <div class="clearfix"></div>
      </div>
      <!-- /.header-top-inner --> 
    </div>
    <!-- /.container --> 
  </div>
  <!-- /.header-top --> 
  <!-- ============================================== TOP MENU : END ============================================== -->
  <div class="main-header">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-3 logo-holder"> 
          <!-- ============================================================= LOGO ============================================================= -->
          <div class="logo"> <a href="<?php echo base_url(); ?>"> <img src="site/images/logo.png" alt="logo"> </a> </div>
          <!-- /.logo --> 
          <!-- ============================================================= LOGO : END ============================================================= --> </div>
        <!-- /.logo-holder -->
        
        <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder"> 
          <!-- /.contact-row --> 
          <!-- ============================================================= SEARCH AREA ============================================================= -->
          <div class="search-area">
            <form>
              <div class="control-group">
                <?php /* <ul class="categories-filter animate-dropdown">
                  <li class="dropdown"> <a class="dropdown-toggle"  data-toggle="dropdown" href="category">Categories <b class="caret"></b></a>
                    <ul class="dropdown-menu" role="menu" >
            					<?php 
            						if($categorys){
            							foreach($categorys as $category){
            					?>
                        <li class="menu-header">
            					    <a href='<?php echo str_replace(' ','-', strtolower(trim($category[$this->pro->category.'_title']))); ?>' >
            						    <?php echo $category[$this->pro->category.'_title']; ?>
            					   </a>
            					  </li>
            					<?php } } ?> 
                      
					  
					  
                    </ul>
                  </li>
                </ul> */ ?>
                <input class="search-field home_page_ajax_search" placeholder="Search here..." />
                <a class="search-button" href="#" ></a> </div>

               
                <div class="live_search_result display_none">
                    
                </div>
            </form>
          </div>
          <!-- /.search-area --> 
          <!-- ============================================================= SEARCH AREA : END ============================================================= --> </div>
        <!-- /.top-search-holder -->
        
        <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row"> 
          <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->
          
          <div class="dropdown dropdown-cart cart_data" > 

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

            
            <!-- /.dropdown-menu--> 
          </div>
          <!-- /.dropdown-cart --> 


          
          <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= --> </div>
        <!-- /.top-cart-row --> 
      </div>
      <!-- /.row --> 
      
    </div>
    <!-- /.container --> 
    
  </div>
  <!-- /.main-header --> 
  
  <!-- ============================================== NAVBAR ============================================== -->
  <div class="header-nav animate-dropdown">
    <div class="container">
      <div class="yamm navbar navbar-default" role="navigation">
        <div class="navbar-header">
       <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> 
       <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
        <div class="nav-bg-class">
          <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
            <div class="nav-outer">
              <ul class="nav navbar-nav">
                <li class="active dropdown yamm-fw"> <a href="<?php echo base_url(); ?>" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">Home</a> </li>
				
				
                <li class="dropdown yamm mega-menu"> <a href="<?php echo base_url(); ?>" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">Categories</a>
                  <ul class="dropdown-menu container">
                    <li>
                      <div class="yamm-content ">
                        <div class="row">
                						<?php 
                						if($categorys){
                							foreach($categorys as $category){
                						?>
                                          <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                                           <a href="<?php echo str_replace(' ','-', strtolower(trim($category[$this->pro->category.'_title']))); ?>"> <h2 class="title"><?php echo $category[$this->pro->category.'_title']; ?></h2></a>
                							<?php 
                							if($subcategorys){
                								foreach($subcategorys as $subcategory){
                									if($subcategory[$this->pro->category."_parent"] == $category[$this->pro->category.'_id']){
                							?>
                							<ul class="links">
                                              <li><a href="<?php echo str_replace(' ','-', strtolower(trim($category[$this->pro->category.'_title']))); ?>/<?php echo str_replace(' ','-', strtolower(trim($subcategory[$this->pro->category."_title"]))); ?>"><?php echo $subcategory[$this->pro->category."_title"]; ?></a></li>

                                            </ul>
                							<?php } } } ?>
                                          </div>
                						<?php 
                							}
                						}	
                						?>
						  
                          <!-- /.col -->
                    
                          
                        </div>
                      </div>
                    </li>
                  </ul>
                </li>
				
				<li class="dropdown yamm-fw"> <a href="" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">Best offer</a> </li>
				
				<li class="dropdown yamm-fw"> <a href="" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">Popular Product</a> </li>
                <li class="dropdown yamm-fw"> <a href="" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">Cart</a> </li>

                
                <li class="dropdown  navbar-right special-menu"> <a href="#">Todays offer</a> </li>
              </ul>
              <!-- /.navbar-nav -->
              <div class="clearfix"></div>
            </div>
            <!-- /.nav-outer --> 
          </div>
          <!-- /.navbar-collapse --> 
          
        </div>
        <!-- /.nav-bg-class --> 
      </div>
      <!-- /.navbar-default --> 
    </div>
    <!-- /.container-class --> 
    
  </div>
  <!-- /.header-nav --> 
  <!-- ============================================== NAVBAR : END ============================================== --> 

<style type="text/css">
  .display_none 
  {
    display: none;
  }
</style>

<script>

function addTocartLoad(product_id){
  $.ajax({
    type:"post",
    url:"<?php echo base_url(); ?>/home/addTocart",
    data:{product_id:product_id,action:'add'},
    success:function(result){
      //alert(result);
      $('.cart_data').html(result);
    }
  });
}


//cart add 
function addTocart(product_id){
  var color = $('.product_color').attr('data-product');
  var size  = $(".productSize:checked").val();
  var qty   = $('.qtyval').val();
  console.log(size);
  $.ajax({
    type:"post",
    url:"<?php echo base_url(); ?>home/addTocart",
    data:{product_id:product_id,action:'add',color:color,size:size,qty:qty},
    success:function(result){
      //console.log(result);
      $('.cart_data').html(result);
      
      $.notify({
        // options
        message: 'Item Successfully added' 
      },{
        // settings
        type: 'success',
        position: null,
        offset: 20,
        spacing: 10,
        z_index: 1031,
        delay: 1000,
        timer: 500,
      });
      
    }

  });
}


function remove_cart(rowid){
  $.ajax({
    type:"post",
    url:"<?php echo base_url(); ?>/home/addTocart",
    data:{rowid:rowid,action:'delete'},
    success:function(result){
      $('.cart_data').html(result);
      $.notify({
        // options
        message: 'Item Successfully Removed' 
      },{
        // settings
        type: 'success',
        position: null,
        offset: 20,
        spacing: 10,
        z_index: 1031,
        delay: 1000,
        timer: 500,
      });
    }
  });
}

function update_qty(rowid,qty){
  $.ajax({
    type:"post",
    url:"<?php echo base_url(); ?>/home/addTocart",
    data:{rowid:rowid,qty:qty,action:'update_qty'},
    success:function(result){
      $('.cart_data').html(result);
      $.notify({
        // options
        message: 'Item Successfully Removed' 
      },{
        // settings
        type: 'success',
        position: null,
        offset: 20,
        spacing: 10,
        z_index: 1031,
        delay: 1000,
        timer: 500,
      });
    }
  });
}

function empty_cart(){
  $.ajax({
    type:"post",
    url:"<?php echo base_url(); ?>/home/addTocart",
    data:{action:'empty'},
    success:function(result){
      $('.cart_data').html(result);
    }
  });
}

window.onload = function(){
  addTocartLoad('');
}



$(document).ready(function(){
  $('.home_page_ajax_search').keyup(function(){
    ajax_product_search($(this));
  });
});

function ajax_product_search(thisObject)
{
  var input_text = thisObject.val().trim();
  if(input_text != '')
  {
    $.ajax({
          type:"post",
          url:"<?php echo base_url(); ?>/home/ajaxProductSearch",
          data:{search_keyword:input_text},
          success:function(result)
          {
            $('.display_none').css('display','block');
            $('.display_none').html(result);
          }
        });
  }
  else
  {
    return false;
  }
}


</script> 


  
</header>