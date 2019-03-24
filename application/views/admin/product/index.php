	<!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="header-icon">
                         <i class="fa fa-car"></i>
                    </div>
                    <div class="header-title">
                        <h1><a href="admin/product/" ><?php echo $heding; ?> </a>&nbsp; 
						<?php if($this->session->user_type == 0){ ?>
					 <a href="admin/product/add" ><i class="fa fa-plus"></i></a>
						<?php }
                         if($this->session->user_type == 1){
							 if($privilege_data[$this->pro->userprivilege.'_add'] == '1'){
						?>
					 <a href="admin/product/add" ><i class="fa fa-plus"></i></a>
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

					   <?php 
					   
					   if($this->uri->segment(3) == 'add' || $this->uri->segment(3) == 'edit')
					   {
					   ?>
                        <!-- Form controls -->
                        <div class="col-sm-12 col-md-12 ">
                            <div class="panel panel-bd lobidrag">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4>Product Form</h4>
                                    </div>
                                </div>
                                <div class="panel-body">

                                    <form method="post" enctype="multipart/form-data" action=""  >
                                         
										<div class="row form-group">
										    <div class="col-sm-3 col-md-3 col-md-offset-1" >
                                            <label for="exampleSelect1"> Select Category<span class="required" >*</span></label>
											</div>
											<div class="col-sm-6 col-md-6" >
                                            <select class="form-control" id="exampleSelect1" name="category" dir="auto" onchange="subcategorylist(this.value)" >
											<option value="" >Select Category</option>
											   <?php 
											    foreach($categorys as $category)
												{
											   ?>
												<option value="<?php echo $category[$this->pro->category.'_id']; ?>" <?php if($this->input->post('category') !="" && $this->input->post('category') == $category[$this->pro->category.'_id']){echo"selected";}else{  echo(isset($edit_data) && $edit_data[$this->pro->product.'_category_id'] == $category[$this->pro->category.'_id']) ? "selected":""; }  ?> >
											   <?php echo $category[$this->pro->category.'_title']; ?>
											   </option>
												<?php } ?>
                                            </select>
											
											<?php echo form_error('category','<div class="error" style="color:red;" >', '</div>'); ?>	                                          
											</div>
                                         </div>
										 
										 
										<div class="row form-group">
										    <div class="col-sm-3 col-md-3 col-md-offset-1" >
                                            <label for="exampleSelect1"> Select Subcategory</label>
											</div>
											<div class="col-sm-6 col-md-6" >
                                            <select class="form-control subcategory" id="exampleSelect1" name="subcategory" dir="auto"  onchange="childcategorylist(this.value)" >
											<option value="" >Select Subcategory </option>
											   
                                            </select>
											
											<?php echo form_error('subcategory','<div class="error" style="color:red;" >', '</div>'); ?>	                                          
											</div>
                                        </div>

                                        <div class="row form-group">
										    <div class="col-sm-3 col-md-3 col-md-offset-1" >
                                            <label for="exampleSelect1"> Select Childcategory</label>   
											</div>
											<div class="col-sm-6 col-md-6" >
                                            <select class="form-control childcategory" id="exampleSelect1" name="childcategory" dir="auto"  >
											<option value="" >Select Childcategory </option>
											   
                                            </select>
											
											<?php echo form_error('childcategory','<div class="error" style="color:red;" >', '</div>'); ?>	                                          
											</div>
                                        </div>
										
										<div class="row form-group">
										    <div class="col-sm-3 col-md-3 col-md-offset-1" >
												<label for="exampleSelect1"> Select Brand<span class="required" >*</span></label>
											</div>
											<div class="col-sm-6 col-md-6" >
												<select class="form-control" id="exampleSelect1" name="brand" dir="auto"  >
												<option value="" >Select Brand</option>
												   <?php 
													foreach($brands as $brand)
													{
												   ?>
													<option value="<?php echo $brand[$this->pro->brand.'_id']; ?>" <?php if($this->input->post('brand') !="" && $this->input->post('brand') == $brand[$this->pro->brand.'_id']){echo"selected";}else{  echo(isset($edit_data) && $edit_data[$this->pro->product.'_brand_id'] == $brand[$this->pro->brand.'_id']) ? "selected":""; }  ?> >
												   <?php echo $brand[$this->pro->brand.'_title']; ?>
												   </option>
													<?php } ?>
												</select>
												
												<?php echo form_error('brand','<div class="error" style="color:red;" >', '</div>'); ?>	                                          
											</div>
                                         </div>
										 
										 
																		
										<div class="row form-group">
										    <div class="col-sm-3 col-md-3 col-md-offset-1" >
                                            <label for="exampleSelect1">Product Title<span class="required" >*</span></label>
											</div>
											<div class="col-sm-6 col-md-6" >
											<input type="text" name="title" class="form-control"  value="<?php if($this->input->post('title') != "") { echo $this->input->post('title'); }else{ echo(isset($edit_data)) ? $edit_data[$this->pro->product.'_title'] :""; } ?>" placeholder="Title" dir="auto" >
                                            
											<div style="color:red;" ><?php echo $this->session->flashdata("title1"); ?></div>
											<?php echo form_error('title','<div class="error" style="color:red;" >', '</div>'); ?>	
											</div>
                                          </div>
										  
										  
										  <div class="row form-group">
										    <div class="col-sm-3 col-md-3 col-md-offset-1" >
                                            <label for="exampleSelect1">Product SKU<span class="required" >*</span></label>
											</div>
											<div class="col-sm-6 col-md-6" >
											<input type="text" name="sku" class="form-control"  value="<?php if($this->input->post('sku') != "") { echo $this->input->post('sku'); }else{ echo(isset($edit_data)) ? $edit_data[$this->pro->product.'_sku'] :""; } ?>" placeholder="SKU" dir="auto" >
                                            
											<div style="color:red;" ><?php echo $this->session->flashdata("url1"); ?></div>
											<?php echo form_error('sku','<div class="error" style="color:red;" >', '</div>'); ?>	
											</div>
                                          </div>
										  
										 <div class="row form-group">
										    <div class="col-sm-3 col-md-3 col-md-offset-1" >
                                            <label for="exampleSelect1">Product Price<span class="required" >*</span></label>
											</div>
											<div class="col-sm-6 col-md-6" >
											<input type="text" name="price" class="form-control"  value="<?php if($this->input->post('price') != "") { echo $this->input->post('price'); }else{ echo(isset($edit_data)) ? $edit_data[$this->pro->product.'_price'] :""; } ?>" placeholder="Price" dir="auto" >
                                            
											<?php echo form_error('price','<div class="error" style="color:red;" >', '</div>'); ?>	
											</div>
                                          </div>
										  
										  <div class="row form-group">
										    <div class="col-sm-3 col-md-3 col-md-offset-1" >
                                            <label for="exampleSelect1">Product Sell Price<span class="required" >*</span></label>
											</div>
											<div class="col-sm-6 col-md-6" >
											<input type="text" name="sellprice" class="form-control"  value="<?php if($this->input->post('sellprice') != "") { echo $this->input->post('sellprice'); }else{ echo(isset($edit_data)) ? $edit_data[$this->pro->product.'_sellprice'] :""; } ?>" placeholder="Sell Price" dir="auto" >
                                            
											<?php echo form_error('sellprice','<div class="error" style="color:red;" >', '</div>'); ?>	
											</div>
                                          </div>
										  
										   <div class="row form-group">
										    <div class="col-sm-3 col-md-3 col-md-offset-1" >
                                            <label for="exampleSelect1">Product Quantity<span class="required" >*</span></label>
											</div>
											<div class="col-sm-6 col-md-6" >
											<input type="text" name="quantity" class="form-control"  value="<?php if($this->input->post('quantity') != "") { echo $this->input->post('quantity'); }else{ echo(isset($edit_data)) ? $edit_data[$this->pro->product.'_quantity'] :""; } ?>" placeholder="Quantity" dir="auto" >
                                            
											<?php echo form_error('quantity','<div class="error" style="color:red;" >', '</div>'); ?>	
											</div>
                                          </div>
										  
										  
										  <div class="row form-group">
										  <div class="col-sm-3 col-md-3 col-md-offset-1" >
                                            <label for="exampleInputFile">Product Image</label>
											</div>
											
											
											<div class="col-sm-6 col-md-6" >
											<?php 
											if(isset($edit_data) && $edit_data[$this->pro->product.'_image'] !='')
											{
											?>
											<div >
											<img src="upload/<?php echo $edit_data[$this->pro->product.'_image']; ?>" style="max-width:100px;" >
											
											<a href="admin/product/del_img/<?php echo$edit_data[$this->pro->product.'_id']; ?>" class="btn btn-inverse btn-circle m-b-5"><i class="glyphicon glyphicon-trash"></i></a>
											</div>
											<?php } ?>
											
                                            <input type="file" id="exampleInputFile" name="image" aria-describedby="fileHelp" accept="image/*" > <span style="color:blue;font-weight:900;" >File Type Image Max File Size 2 MB</span>
											<div  style="color:red;" ><?php echo $this->session->flashdata('image'); ?></div>
											</div>
                                        </div>
										
										  
										
										  
										  
										
										
										<div class="row form-group">
										    <div class="col-sm-3 col-md-3 col-md-offset-1" >
                                            <label for="exampleSelect1">Product Short Description</label>
											</div>
											<div class="col-sm-6 col-md-6" >
											<textarea name="sdescription" id="sdescription" class="form-control" ><?php if($this->input->post('sdescription')){ echo $this->input->post('sdescription'); }else{
											echo (isset($edit_data)) ? $edit_data[$this->pro->product.'_shortdescription'] :""; }  ?></textarea>
											<?php echo form_error('sdescription','<div class="error" style="color:red;" >', '</div>'); ?>	
											</div>
                                          </div>
										  
										  
										  
										
										  <div class="row form-group">
										    <div class="col-sm-3 col-md-3 col-md-offset-1" >
                                            <label for="exampleSelect1">Product Description</label>
											</div>
											<div class="col-sm-6 col-md-6" >
											<textarea name="description" id="description" class="ckeditor" ><?php if($this->input->post('description')){ echo $this->input->post('description'); }else{
											echo (isset($edit_data)) ? $edit_data[$this->pro->product.'_description'] :""; }  ?></textarea>
											<?php echo form_error('description','<div class="error" style="color:red;" >', '</div>'); ?>	
											</div>
                                          </div>
										  
										  
										  
										  
										   <div class="row form-group">
										  <div class="col-sm-3 col-md-3 col-md-offset-1" >
                                            <label for="exampleInputFile">Product Attachment </label>
											</div>
											<div class="col-sm-6 col-md-6" >
												<div class="row" >
												<?php 
												if(isset($edit_data_gallery) && !empty($edit_data_gallery))
												{
													foreach($edit_data_gallery as $gallery){
												?>
													
														<div class="col-md-2" >
													<img src="upload/<?php echo $gallery[$this->pro->productimage.'_name']; ?>"  width='80' >										
													<a href="admin/product/gallery_del/<?php echo $edit_data[$this->pro->product.'_id']; ?>/<?php echo $gallery[$this->pro->productimage.'_id']; ?>" class="btn btn-inverse btn-circle m-b-5"><i class="glyphicon glyphicon-trash"></i></a>
														</div>
													
												<?php } } ?>
												</div>
                                            <input type="file" id="exampleInputFile" name="gallery[]" aria-describedby="fileHelp" valid="file"  multiple >
                                            <span style="color:blue;font-weight:900;" > File Type Image Max File Size 2 MB</span>
											<div  style="color:red;" ><?php echo $this->session->flashdata('gallery'); ?></div>
										 </div>	
                                        </div>
										  <style>
										  	
										  	.color_cntaners{
										  		    border: 2px dashed green;
   													padding: 20px;
										  	}
										  </style>


										  <div class="row form-group">
										    <div class="col-sm-2 col-md-2 col-md-offset-1" >
                                            <label for="exampleSelect1">Product Color<span class="required" >*</span></label>
											</div>
											<div class="col-sm-9 col-md-9" >


												<div class="addmor_parent" >
													<!--<input type="text" name="color[0]" class="form-control jscolor  addmore"  value="AB2567" placeholder=""  >--->
													
													<button type="button" class="btn btn-purple btn-outline w-md m-b-5 addmore" onclick="Addmore()" >Add Colors</button><br /><br />
                                            	</div>

                                            	<div >
                                            		<?php 
                                            		//echo $this->uri->segment(4);
                                            		$color_datas = $this->pm->color($this->uri->segment(4));
                                            		
                                            			foreach ($color_datas as $color_data) {
                                            					$size_datas = $this->pm->size($this->uri->segment(4),$color_data[$this->pro->color."_id"]);
                                            					$data_gallery = $this->pm->gallery($this->uri->segment(4),$color_data[$this->pro->color."_id"]);
                                            		?>
                                            		<div class="color_cntaners" style="margin-bottom: 5px;">
                                            			
                                            			<div class="addmore" style="background-color: #<?php echo $color_data[$this->pro->color."_name"]; ?>; width: 50px;height: 30px;" > </div>
                                            			<div class="addmore">Price <?php echo $color_data[$this->pro->color."_price"]; ?></div>
                                            			<div class="addmore">Qty <?php echo $color_data[$this->pro->color."_quantity"]; ?></div>
                                            			

                                            			<a href="admin/product/deleteByColor/<?php echo $color_data[$this->pro->color."_id"]; ?>/<?php echo $this->uri->segment(4);?>"  class="btn btn-danger btn-outline w-md m-b-5" onclick="return confirm('Are you sure want to delete This product With this color !');">REMOVE</a>

                                            			<?php
                                            			if($size_datas){
                                            			foreach ($size_datas as $size_data) {
                                            			?>
                                            			<div class="size_cntaner" style="padding: 20px;" >
                                            				<div>
                                            					<div class="addmore_size"  >Size <?php echo $size_data[$this->pro->size."_value"]; ?></div>
                                            					<div class="addmore_size"  >Price <?php echo $size_data[$this->pro->size."_price"]; ?></div>
                                            					<div class="addmore_size"  >Qty <?php echo $size_data[$this->pro->size."_quantity"]; ?> </div>

                                            					<!-- <a href="admin/product/edit/15"  class="btn btn-danger btn-outline w-md m-b-5"  onclick="return confirm('are you sure want to delete');">REMOVE456 </a> -->

                                            				</div>
                                            			</div>
                                            		<?php } }?>
                                            			

                                            			<div class="image_cntaner"  style="    width: 100%;"  >
                                            				
                                            				<?php 
															if(isset($data_gallery))
															{
																foreach($data_gallery as $gallery){
															?>
																
																<img src="upload/<?php echo $gallery[$this->pro->productimage.'_name']; ?>"  style="    width: 100px;" >										
																<a href="admin/product/gallery_del/<?php echo $edit_data[$this->pro->product.'_id']; ?>/<?php echo $gallery[$this->pro->productimage.'_id']; ?>" class="btn btn-inverse btn-circle m-b-5"><i class="glyphicon glyphicon-trash"></i></a>
																
															<?php } } ?>

                                            			</div>

                                            		</div>
                                            		<br />
                                            		<br />
                                            		<?php } ?>

                                            	</div>

												<?php echo form_error('color','<div class="error" style="color:red;" >', '</div>'); ?>	
											</div>
                                          </div>
										 



                                          <div class="row form-group">
										    <div class="col-sm-11 col-md-11 col-md-offset-1" >
                                            <label for="exampleSelect1">Add More Atribute<span class="required" >*</span></label>
											</div>
											<div class="col-sm-9 col-md-9 col-md-offset-1" >
												<div class="addmor_parent_atribute" >
													<input type="text" name="atribute_name[0]" class="form-control addmore_atribute"  value="" placeholder="Name"  >
													<input type="text" name="atribute_value[0]" class="form-control addmore_atribute"  value="" placeholder="Value"  >
													<button type="button" class="btn btn-purple btn-outline w-md m-b-5" onclick="addmoreAtribute()" >Add More</button>
                                            	</div>
                                            	<?php echo form_error('atribute_name','<div class="error" style="color:red;" >', '</div>'); ?>	
												<?php echo form_error('atribute_value','<div class="error" style="color:red;" >', '</div>'); ?>	
											</div>
                                          </div>

										  
										  
                                        
										<div style="text-align:center;" >
										<a href='admin/product' style="float:left;" class="btn btn-warning ">Back</a>
									
                                        <button type="supmit" class="btn btn-primary" name="<?php echo $button_name; ?>" value="supmit" >Submit</button>
										</div>
										
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /// form -->
						
						
						<?php }else{ ?>
						

						
						<!------- Search Form--------->
						 <div class="col-sm-12">
                            <div class="panel panel-bd lobidrag">
                             
                                <div class="panel-body">
                                    <form method="post" action="" >
                                    <div class="form-group row">
                                       
									   <?php /* ?>
									    <div class="col-sm-3">
										 <select class="form-control" id="exampleSelect1" name="language"  >
										 <option value="0" >Select Language</option>
											   <?php 
											    foreach($languages as $language)
												{
											   ?>
												<option value="<?php echo $language[$this->pro->language.'_code']; ?>" <?php if($this->input->post('language') !="" && $this->input->post('language') == $language[$this->pro->language.'_code']){echo"selected";}  ?> >
											   <?php echo $language[$this->pro->language.'_name']; ?>
											   </option>
												<?php } ?>
                                            </select>
										    </div>
											<?php */ ?>
										
									   
                                        <div class="col-sm-3">
                                            <input class="form-control" type="search" placeholder="Product Name" id="name" value="<?php echo($this->input->post('name'))?$this->input->post('name'):''; ?>" name="name" >
                                        </div>
										
										
										<div class="col-sm-3">
                                            <button type="supmit" name="search" class="btn btn-success w-md m-b-5">Search</button>
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
                                        <h4>Product Record</h4>
                                    </div>
                                </div>
                                <div class="panel-body">
                                   
                                   
                                    <div class="table-responsive">
                               <table class="table table-bordered table-hover">
								<thead>
								<tr>
								
								<th>Product Title</th>
								<th>Product Category</th>
								<th>Product SKU</th>
								<th>Product Image</th>
								<th>Status </th>
								<th>Action</th>
								</tr>
								</thead>
							
								<tbody>
								   
								   
								<?php 
								if(count($post_datas)>0 ){
								foreach($post_datas as $post_data)
								{
								?>   
								   <tr>
										   
									<td>
									<?php echo$post_data[$this->pro->product.'_title']; ?>
									</td>
									
									<td>
									<?php $data = $this->pm->category($post_data[$this->pro->product.'_category_id']);
								     echo @$data[0][$this->pro->category.'_title'];?>
									</td>
									
									<td>
									<?php echo$post_data[$this->pro->product.'_sku']; ?>
									</td>
									
									
									<td>
									<?php if(!empty($post_data[$this->pro->product.'_image'])){ ?>
									<img src="upload/<?php echo$post_data[$this->pro->product.'_image']; ?>" width="100" >
									<?php } ?>
									</td>
									
									
									
									
									<td>
									<?php 
									if($post_data[$this->pro->product.'_status'] == '1'){
									?>
									Enable &nbsp; <a href="admin/product/status/<?php echo$post_data[$this->pro->product.'_id']; ?>/0" class="btn btn-info btn-circle m-b-5"> <i class="glyphicon glyphicon-ok"></i></a>
									<?php 
									}else{
									?>
									Disable &nbsp;  <a href="admin/product/status/<?php echo$post_data[$this->pro->product.'_id']; ?>/1" class="btn btn-warning btn-circle m-b-5"><i class="glyphicon glyphicon-remove"></i></a>
									<?php } ?>
									<br />

									<?php 
									if($post_data[$this->pro->product.'_feature'] == '1'){
									?>
									Feature Yes &nbsp; <a href="admin/product/feature/<?php echo$post_data[$this->pro->product.'_id']; ?>/0" class="btn btn-info btn-circle m-b-5"> <i class="glyphicon glyphicon-ok"></i></a>
									<?php 
									}else{
									?>
									Feature No &nbsp;  <a href="admin/product/feature/<?php echo$post_data[$this->pro->product.'_id']; ?>/1" class="btn btn-warning btn-circle m-b-5"><i class="glyphicon glyphicon-remove"></i></a>
									<?php } ?>

									<br />


									<?php 
									if($post_data[$this->pro->product.'_newarrival'] == '1'){
									?>
									Newarrival Yes &nbsp; <a href="admin/product/newarrival/<?php echo$post_data[$this->pro->product.'_id']; ?>/0" class="btn btn-info btn-circle m-b-5"> <i class="glyphicon glyphicon-ok"></i></a>
									<?php 
									}else{
									?>
									Newarrival No &nbsp;  <a href="admin/product/newarrival/<?php echo$post_data[$this->pro->product.'_id']; ?>/1" class="btn btn-warning btn-circle m-b-5"><i class="glyphicon glyphicon-remove"></i></a>
									<?php } ?>
									
									</td>
									
									
								   
									<td>
									
									
									
									<a href="admin/product/view/<?php echo$post_data[$this->pro->product.'_id']; ?>" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="left" title="" data-original-title="View"><i class="fa fa-eye" aria-hidden="true"></i></a>
									
									<?php 
									
									if($this->session->user_type == 1 ){
										
										if($privilege_data[$this->pro->userprivilege.'_edit'] == 1){
										
									?>
									
										<a href="admin/product/edit/<?php echo$post_data[$this->pro->product.'_id']; ?>" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="Update"><i class="fa fa-pencil" aria-hidden="true"></i></a>
										
									<?php }
                                    if($privilege_data[$this->pro->userprivilege.'_delete'] == 1){
									?>	
									
									<a href="admin/product/delete/<?php echo$post_data[$this->pro->product.'_id']; ?>" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="right" title="Delete " onclick="return confirm('are you sure want to delete');" >
										<i class="fa fa-trash-o" aria-hidden="true"></i>
										</a>
									<?php 
									    }
									}
								if($this->session->user_type == 0){
									?>
									  
									  <a href="admin/product/edit/<?php echo$post_data[$this->pro->product.'_id']; ?>" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="Update"><i class="fa fa-pencil" aria-hidden="true"></i></a>
									
									  <a href="admin/product/delete/<?php echo$post_data[$this->pro->product.'_id']; ?>" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="right" title="Delete " onclick="return confirm('are you sure want to delete');" >
										<i class="fa fa-trash-o" aria-hidden="true"></i>
										</a>
										
								<?php } ?>
									  
									</td>
								 </tr>
						<?php   }
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
						
						
						<?php } ?>
                       
                     
                    </div>
				
                </section> <!-- /.content -->
            </div> <!-- /.content-wrapper -->


<style>
	
	.addmore{
		    width: 10%;
		    float: left;
		    margin-right: 10px;
	}
	.addmore_image {
	    width: 65.5%;
	    float: left;
	    margin-right: 10px;
	}

	.addmore_size{
		 width: 21%;
	    float: left;
	    margin-right: 10px;
	}

	.addmore_atribute{
		    width: 38%;
		    float: left;
		    margin-right: 10px;
	}
</style>

 <script src="assets/dist/js/product.js"></script>

<script type="text/javascript">

</script>


<?php 
if($this->uri->segment(3) == 'edit' && isset($edit_data[$this->pro->product.'_category_id'])){	
?>
<script>
window.onload = function(){
subcategorylist('<?php echo $edit_data[$this->pro->product.'_category_id']; ?>','<?php echo $edit_data[$this->pro->product.'_subcategory_id']; ?>');
childcategorylist('<?php echo $edit_data[$this->pro->product.'_subcategory_id']; ?>','<?php echo $edit_data[$this->pro->product.'_childcategory_id']; ?>');
}
</script>
<?php } ?>			
<script>
function subcategorylist(category,subcategory){
	//alert(subcategory);
	$('.loader_custome').show();
	$.ajax({
		url:"<?php echo base_url(); ?>admin/product/AjaxSubcategory/",
		type:"POST",
		data:{category:category,subcategory:subcategory},
		success:function(result){
			$('.subcategory').html(result);
			$('.loader_custome').hide();
		}
	});
}


function childcategorylist(subcategory,childcategory){
	//alert(subcategory);
	$('.loader_custome').show();
	$.ajax({
		url:"<?php echo base_url(); ?>admin/product/AjaxChildcategory/",
		type:"POST",
		data:{subcategory:subcategory,childcategory:childcategory},
		success:function(result){
			$('.childcategory').html(result);
			$('.loader_custome').hide();
		}
	});
}
</script>