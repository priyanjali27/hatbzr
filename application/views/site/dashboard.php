<div class="body-content outer-top-xs">
	<div class="container">
		<div class="row ">
			<div class="shopping-cart">
				<div class="shopping-cart-table ">
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									
									
									<th class="cart-description item">InvoiceId</th>
									<th class="cart-description item">Date</th>
									<th class="cart-description item">Price</th>
									<th class="cart-romove item">Status</th>
								</tr>
							</thead><!-- /thead -->

							
							<?php 

							if($orders){
								foreach($orders as $order){ 
							?>
							<tbody>
								<tr>
									<td class="cart-product-sub-total"><span class="cart-sub-total-price"><?php echo $order[$this->pro->booking.'_invoiceId']; ?></span></td>
									<td class="cart-product-sub-total"><span class="cart-sub-total-price"><?php echo $order[$this->pro->booking.'_date']; ?></span></td>
									<td class="cart-product-sub-total"><span class="cart-sub-total-price"><?php echo $order[$this->pro->booking.'_total']; ?></span></td>
									<td class="romove-item"><a href="#" title="cancel" class="icon">Completed</a></td>
								</tr>
								<tr>
									<td colspan="4" >
										<table cellpadding="20" class="table" >
											<tr >
											<th class="cart-description item">Image</th>
											<th  class="cart-description item">Name</th>
											<th  class="cart-description item">Quintity</th>
											<th  class="cart-description item">Price</th>
											<th  class="cart-description item">Subtotal</th>
											</tr>
											
											<?php 
											$products = $this->dash->bookingdetail($order[$this->pro->booking.'_invoiceId']);
											foreach($products as $product){
											?>
											<tr >
											<td >
											<a href="javascript:void(0)"><img alt="" src="upload/<?php echo $product[$this->pro->product.'_image']; ?>" style="width:90px;height:90px;" ></a>					
											</td>
											<td >
											<a href="javascript:void(0)"><?php echo $product[$this->pro->bookingdetail.'_title']; ?></a>					
											</td>
											
											
											<td >
											<a href="javascript:void(0)"><?php echo $product[$this->pro->bookingdetail.'_quantity']; ?></a>					
											</td>
											<td class="product-price" data-title="Price">
												<span class="amount"><?php echo $product[$this->pro->bookingdetail.'_price']; ?></span>					
											</td>
											<td class="product-price" data-title="Price">
												<span class="amount"><i class="fas fa-rupee-sign"></i> <?php echo $product[$this->pro->bookingdetail.'_subtotal']; ?></span>					
											</td>
											
											</tr>
										<?php } ?>
											</table>

									</td>
								</tr>
							</tbody><!-- /tbody -->
						
						<?php } } ?>
						</table><!-- /table -->
					</div>
				</div><!-- /.shopping-cart-table -->				
				
			
			</div><!-- /.shopping-cart -->
		</div> <!-- /.row -->


		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
<div id="brands-carousel" class="logo-slider wow fadeInUp">

		<div class="logo-slider-inner">	
			<div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
				<div class="item m-t-15">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item m-t-10">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand3.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand6.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->
		    </div><!-- /.owl-carousel #logo-slider -->
		</div><!-- /.logo-slider-inner -->
	
</div><!-- /.logo-slider -->
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
</div><!-- /.body-content -->