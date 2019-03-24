            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="header-icon">
                         <i class="fa fa-car"></i>
                    </div>
                    <div class="header-title">
                        <h1><a href="admin/product/" ><?php echo $heding; ?> </a>&nbsp; 
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
								
								
								
								<tbody>
																
								<tr>
								<td><strong>Product Title</strong></td>
								<td>
								<?php echo$view_data[$this->pro->product.'_title']; ?>
								</td>
								</tr>                                   					
								<tr>
								<td><strong>Product Category</strong>
								</td>
								<td>
								<?php $data = $this->pm->category($view_data[$this->pro->product.'_category_id']);
								     echo @$data[0][$this->pro->category.'_title'];?>	
								</td>
								</tr>

								<tr>
								<td><strong>Product Sub Category</strong>
								</td>
								<td>
								<?php $datas = $this->pm->subcategoryview($view_data[$this->pro->product.'_subcategory_id']);
								     echo @$datas[0][$this->pro->category.'_title'];?>	
								</td>
								</tr>

								<tr>
								<td><strong>Product Child Category</strong>
								</td>
								<td>
								<?php $datac = $this->pm->childcategoryview($view_data[$this->pro->product.'_childcategory_id']);
								     echo @$datac[0][$this->pro->category.'_title'];?>	
								</td>
								</tr>
								
								<tr>
								<td><strong>Product SKU</strong></td>
								<td>
								<?php echo$view_data[$this->pro->product.'_sku']; ?>
								</td>
								</tr> 
								
								<tr>
								<td><strong>Product Price</strong></td>
								<td>
								<?php echo$view_data[$this->pro->product.'_price']; ?>
								</td>
								</tr> 
								
								<tr>
								<td><strong>Product Sell Price</strong></td>
								<td>
								<?php echo$view_data[$this->pro->product.'_sellprice']; ?>
								</td>
								</tr> 
								
								<tr>
								<td><strong>Product Quantity</strong></td>
								<td>
								<?php echo$view_data[$this->pro->product.'_quantity']; ?>
								</td>
								</tr> 
								
								<tr>
								<td><strong>Product Short Description</strong></td>
								<td>
								<?php echo$view_data[$this->pro->product.'_shortdescription']; ?>
								</td>
								</tr> 
								
								
								
								<tr>
								<td><strong>Product Description</strong></td>
								<td>
								<?php echo$view_data[$this->pro->product.'_description']; ?>
								</td>
								</tr> 
								
								<tr>
								<td><strong>Product Image</strong></td>
								<td>
								<?php 
								if(isset($view_data) && $view_data[$this->pro->product.'_image'] !='')
								{
								?>
								<div >
								<img src="upload/<?php echo $view_data[$this->pro->product.'_image']; ?>" style="max-width:100px;" >
								</div>
								<?php } ?>
								</td>
								</tr>
								
								<tr>
								<td><strong>Product Gallery</strong></td>
								<td>
								<div class="row" style="width: 100%;" >
								<?php 
								if(isset($edit_data_gallery) && !empty($edit_data_gallery))
								{
									foreach($edit_data_gallery as $gallery){
								?>
									
								<div class="col-md-2" >
									<img src="upload/<?php echo $gallery[$this->pro->productimage.'_name']; ?>"  width='80' >
								</div>
									
								<?php } } ?>
								</div>
								</td>
								</tr>
								
								</tbody>
							      
                                       </table>
                                        <div style="text-align:center;" >
										<a href='admin/product' style="float:left;" class="btn btn-warning ">Back</a>
										</div>
                                    </div>
                                </div>
                            </div>
                        </div>
						
						
						
                       
                     
                    </div>
					
					
					
					
					
					
                </section> <!-- /.content -->
            </div> <!-- /.content-wrapper -->
           