	   <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="header-icon">
                         <i class="fa fa-cart-plus"></i>
                    </div>
                    <div class="header-title">
                        <h1><a href="admin/order/" ><?php echo $heding; ?> </a>&nbsp; 
						<?php if($this->session->user_type == 0){ ?>
					 <a href="admin/order/add" ><i class="fa fa-plus"></i></a>
						<?php }
                         if($this->session->user_type == 1){
							 if($privilege_data[$this->pro->userprivilege.'_add'] == '1'){
						?>
					 <a href="admin/order/add" ><i class="fa fa-plus"></i></a>
							 <?php } } ?>
							 
							 <span style="margin-left
							 :11%; color:green;" ><?php echo $this->session->flashdata("success"); ?></span>
							 
						</h1>
						
						
                        <ol class="breadcrumb">
						 
                            <li><a href="admin/dashboard"><i class="pe-7s-home"></i>Home</a></li>
                            <li class="active"><?php echo $heding; ?></li>
							
							
							  
                        </ol>
                    </div>
                </section>
                <!-- Main content -->
                <section class="content">
                    
                    
					
					
					
					
					<div class="row">

					
						<!------- Search Form--------->
						 <div class="col-sm-12">
                            <div class="panel panel-bd lobidrag">
                             
                                <div class="panel-body">
                                    <form method="post" action="" >
                                    <div class="form-group row">
                                       
									   
                                        <div class="col-sm-3">
                                            <input class="form-control" type="search" placeholder="Order Id" id="name" value="<?php echo($this->input->post('name'))?$this->input->post('name'):''; ?>" name="name" >
                                        </div>
										
										<div class="col-sm-3">
                                            <input class="form-control" type="search" placeholder="Pincode" id="name" value="<?php echo($this->input->post('pincode'))?$this->input->post('pincode'):''; ?>" name="pincode" >
                                        </div>
										
										
										<div class="col-sm-3">
                                            <button type="submit" name="search" class="btn btn-success w-md m-b-5">Search</button>
                                        </div>
										
                                    </div>
                                    
									</form>
                                  
                                   
                                </div>
                            </div>
                        </div>
						
						 <!--------Search Form -------->

						 
						<div class="col-sm-12">
                            <div class="panel panel-bd lobidrag">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4>Branch Record</h4>
                                    </div>
                                </div>
                                <div class="panel-body">
                                   
                                   
                                    <div class="table-responsive">
                               <table class="table table-bordered table-hover">
								<thead>
								<tr>
								
								<th>ORDER NO</th>
								<th>Name</th>
								<th>Pincode</th>
								
								<th>Date</th>

								<th>Delivery Time</th>
								<th>Price</th>
								
								<th>Order status </th>
								<th>Genrate Invoice</th>
								</tr>
								</thead>
							
								<tbody>
								   
								   
							<?php 
							if(count($bookings)>0 ){
								foreach($bookings as $booking)
								{
							
							?>   
								   <tr>
										   
									<td>
									<?php echo$booking[$this->pro->booking.'_invoiceId']; ?>
									</td>
									
									<td>
									<?php echo$booking[$this->pro->user.'_name']." ".$booking[$this->pro->user.'_lastname']; ?>
									</td>
									<td>
									<?php echo$booking[$this->pro->user.'_zipcode']; ?>
									</td>
									
									<td>
									<?php echo$booking[$this->pro->booking.'_date']; ?>
									</td>
									
									<td>
									<?php echo$booking[$this->pro->booking.'_time']; ?>
									</td>
									
									<td>
									<?php echo$booking[$this->pro->booking.'_total']; ?>
									</td>
									
									
									
									<td>
									<?php if($booking[$this->pro->booking.'_delivery'] != 3){ ?>
									<input type="checkbox" class="orderstatus" onclick="orderstatus(this.value,<?php echo$booking[$this->pro->booking.'_id']; ?>)" <?php echo ($booking[$this->pro->booking.'_delivery'] == 0 )?"checked":""; ?> value="0" >Order placed
									<br />
									<input type="checkbox" class="orderstatus" onclick="orderstatus(this.value,<?php echo$booking[$this->pro->booking.'_id']; ?>)" <?php echo ($booking[$this->pro->booking.'_delivery'] == 1)?"checked":""; ?> value="1" >Out For Order  
									<br />
									<input type="checkbox" class="orderstatus" onclick="orderstatus(this.value,<?php echo$booking[$this->pro->booking.'_id']; ?>)" <?php echo ($booking[$this->pro->booking.'_delivery'] == 2 )?"checked":""; ?> value="2" >Order Delivered 
									<?php }else{
										
										echo"<font style='color:red' >Your Order  Canceled </font>";
									} ?>
									
									</td>
									
									
									<td>	
									<?php /*if($booking[$this->pro->booking.'_delivery'] != 3){ ?>
									<a href="admin/order/invoice/<?php echo$booking[$this->pro->booking.'_id']; ?>" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="Invoice"><i class="fa fa-book" aria-hidden="true"></i></a>
									<?php } */?>
									</td>
									
								<?php 
								}
							
							}   else{ ?>	
									<tr>
									<td class="record" colspan="5" >No Record Found</td>
									</tr>
							<?php } ?>	
									</tbody>
								
                                       </table>

									   <div class="pagination-dive"> 
									   <?php echo $nav; ?>
									   </div>
									   
                                    </div>
                                </div>
                            </div>
                        </div>
						
                    </div>
					
					
<script>
	function orderstatus(id,oid){
		//alert(id);
		window.location="<?php echo base_url(); ?>admin/order/orderstatus/"+id+"/"+oid;
	}
</script>	
					
					
					
                </section> <!-- /.content -->
            </div> <!-- /.content-wrapper -->
