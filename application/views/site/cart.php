<div class="body-content outer-top-xs">
	<div class="container">
		<div class="row ">
			<div class="shopping-cart">
				<div class="shopping-cart-table ">
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									
									<th class="cart-description item">Image</th>
									<th class="cart-product-name item">Product Name</th>
									<th class="cart-qty item">Quantity</th>
									<th class="cart-sub-total item">Price</th>
									<th class="cart-total last-item">Subtotal</th>
									<th class="cart-romove item">Remove</th>
								</tr>
							</thead><!-- /thead -->

							
							<?php 

							$total =0;
							if($this->cart->contents()){
								foreach($carts as $cart){ 
							?>
							<tbody>
								<tr>
									
									<td class="cart-image">
										<a class="entry-thumbnail" href="">
										    <img src="upload/<?php echo $cart['image']; ?>" alt="" style="width: 100px;" >
										</a>
									</td>
									<td class="cart-product-name-info">
										<h4 class='cart-product-description'><a href="detail.html"><?php echo $cart['name']; ?></a></h4>
										<div class="row">
											<div class="col-sm-4">
												<div class="rating rateit-small"></div>
											</div>
											<div class="col-sm-8">
												<div class="reviews">
													(06 Reviews)
												</div>
											</div>
										</div><!-- /.row -->
										<div class="cart-product-info">
															<span class="product-color">COLOR:<span>Blue</span></span>
										</div>
									</td>

									
									<script type="text/javascript">
										$(document).ready(function(){
											
											$('.qtyplus<?php echo $cart['rowid']; ?>').click(function(){
												var qty = $('.qtyval<?php echo $cart['rowid']; ?>').val();
												$('.qtyval<?php echo $cart['rowid']; ?>').val(parseInt(qty)+1);

												update_qty('<?php echo $cart['rowid']; ?>',parseInt(qty)+1);
											});

											$('.qtyminus<?php echo $cart['rowid']; ?>').click(function(){
												var qty = $('.qtyval<?php echo $cart['rowid']; ?>').val();
												if(parseInt(qty) > 1){
													$('.qtyval<?php echo $cart['rowid']; ?>').val(parseInt(qty)-1);
													update_qty('<?php echo $cart['rowid']; ?>',parseInt(qty)-1)
												}
												
											});
										});
									</script>

									<td class="cart-product-quantity">
										<div class="quant-input">
								                <div class="arrows">
								                  <div class="arrow qtyplus<?php echo $cart['rowid']; ?> gradient"><span class="ir"><i class="icon fa fa-sort-asc"></i></span></div>
								                  <div class="arrow qtyminus<?php echo $cart['rowid']; ?> gradient"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
								                </div>
								                <input type="text" class="qtyval<?php echo $cart['rowid']; ?>"  value="<?php echo $cart['qty']; ?>">
							              </div>
						            </td>
						            
									<td class="cart-product-sub-total"><span class="cart-sub-total-price"><i class="fas fa-rupee-sign"></i>  <?php echo $cart['price']; ?></span></td>
									<td class="cart-product-grand-total"><span class="cart-grand-total-price"><span class="cart-sub-total-price"><i class="fas fa-rupee-sign"></i>  <?php echo $cart['subtotal']; ?></span></td>

									<td class="romove-item"><a href="#" title="cancel" class="icon"><i class="fa fa-trash-o"></i></a></td>
								</tr>
								
							</tbody><!-- /tbody -->

						<?php $total += $cart['subtotal'];  }} ?>
							<!--<tfoot>
								<tr>
									<td colspan="7">
										<div class="shopping-cart-btn">
											<span class="">
												<a href="#" class="btn btn-upper btn-primary outer-left-xs">Continue Shopping</a>
												<a href="#" class="btn btn-upper btn-primary pull-right outer-right-xs">Update shopping cart</a>
											</span>
										</div>
									</td>
								</tr>
							</tfoot>-->

						</table><!-- /table -->
					</div>
				</div><!-- /.shopping-cart-table -->				
				<div class="col-md-8 col-sm-12 estimate-ship-tax">
					<table class="table">
						<thead>
							<tr>
								<th>
									<span class="estimate-title">Estimate shipping and tax</span>
									<p>Enter your destination to get shipping and tax.</p>
								</th>
							</tr>
						</thead><!-- /thead -->
						<tbody>
								<tr>
									<td>
										<form method="post" action="checkout" >
											<div class="row">
												<div class="form-group col-md-6">
													<label class="info-title control-label">Phone</label>
													<input type="text" name="phone" class="form-control unicase-form-control text-input" placeholder="">
												</div>

												<div class="form-group col-md-6">
													<label  class="info-title control-label">City</label>
													<input type="text" name="city" class="form-control unicase-form-control text-input" placeholder="">
												</div>

												<div class="form-group col-md-6">
													<label class="info-title control-label">Landmark</label>
													<input type="text" name="landmark" class="form-control unicase-form-control text-input" placeholder="">
												</div>

												<div class="form-group col-md-6">
													<label class="info-title control-label">Zip/Postal Code</label>
													<input type="text" name="zipcode" class="form-control unicase-form-control text-input" placeholder="">
												</div>
												
												<div class="form-group col-md-12">
													<label class="info-title control-label">Address</label>
													<textarea type="text" name="address" class="form-control unicase-form-control " ></textarea>
												</div>

												
												<div class=" col-md-12">
													<div class="pull-right">
													<button type="submit" name="buy" value="buy" class="btn-upper btn btn-primary">PROCCED TO CHEKOUT</button>
												</div>
												</div>
											</div>
										</form>	
									</td>
								</tr>
						</tbody>
					</table>
				</div><!-- /.estimate-ship-tax -->

				<!--<div class="col-md-4 col-sm-12 estimate-ship-tax">
					<table class="table">
						<thead>
							<tr>
								<th>
									<span class="estimate-title">Discount Code</span>
									<p>Enter your coupon code if you have one..</p>
								</th>
							</tr>
						</thead>
						<tbody>
								<tr>
									<td>
										<div class="form-group">
											<input type="text" class="form-control unicase-form-control text-input" placeholder="You Coupon..">
										</div>
										<div class="clearfix pull-right">
											<button type="submit" class="btn-upper btn btn-primary">APPLY COUPON</button>
										</div>
									</td>
								</tr>
						</tbody>
					</table>
				</div>---><!-- /.estimate-ship-tax -->

				<div class="col-md-4 col-sm-12 cart-shopping-total">
					<table class="table">
						<thead>
							<tr>
								<th>
									<!--<div class="cart-sub-total">
										Subtotal<span class="inner-left-md">$600.00</span>
									</div>-->
									<div class="cart-grand-total">
										Grand Total<span class="inner-left-md"><i class="fas fa-rupee-sign"></i>  <?php $this->session->set_userdata('total', $total); echo  $total;  ?></span>
									</div>
								</th>
							</tr>
						</thead><!-- /thead -->
						<tbody>
								<tr>
									<td>
										<div class="form-group">
											<input type="text" class="form-control unicase-form-control text-input" placeholder="You Coupon..">
										</div>
										<div class="clearfix pull-right">
											<button type="submit" class="btn-upper btn btn-primary">APPLY COUPON</button>
										</div>
										<!--<div class="cart-checkout-btn pull-right">
											<button type="submit" class="btn btn-primary checkout-btn">PROCCED TO CHEKOUT</button>
											<span class="">Checkout with multiples address!</span>
										</div>-->
									</td>
								</tr>
						</tbody><!-- /tbody -->
					</table><!-- /table -->
				</div><!-- /.cart-shopping-total -->			
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