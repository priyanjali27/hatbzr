	   <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="header-icon">
                         <i class="fa fa-cart-plus"></i>
                    </div>
                    <div class="header-title">
                        <h1><a href="admin/pincode/" ><?php echo $heding; ?> </a>&nbsp; 
						<?php if($this->session->user_type == 0){ ?>
					 <a href="admin/pincode/add" ><i class="fa fa-plus"></i></a>
						<?php }
                         if($this->session->user_type == 1){
							 if($privilege_data[$this->pro->userprivilege.'_add'] == '1'){
						?>
					 <a href="admin/pincode/add" ><i class="fa fa-plus"></i></a>
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
                        <div class="col-sm-12 col-md-12">
                            <div class="panel panel-bd lobidrag">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4>Branch Form</h4>
                                    </div>
                                </div>
                                <div class="panel-body">

                                    <form method="post" enctype="multipart/form-data" action=""  >
                                         
										  
																		
										<div class="row form-group">
										    <div class="col-sm-3 col-md-3 col-md-offset-1" >
                                            <label for="exampleSelect1">pincode Title<span class="required" >*</span></label>
											</div>
											<div class="col-sm-6 col-md-6" >
											<input type="text" name="title" class="form-control"  value="<?php if($this->input->post('title') != "") { echo $this->input->post('title'); }else{ echo(isset($edit_data)) ? $edit_data[$this->pro->pincode.'_title'] :""; } ?>" placeholder="Title" dir="auto" >
                                            
											<div style="color:red;" ><?php echo $this->session->flashdata("name1"); ?></div>
											<?php echo form_error('title','<div class="error" style="color:red;" >', '</div>'); ?>	
											</div>
                                          </div>
										  
										  
										  
                                        
										<div style="text-align:center;" >
										<a href='admin/pincode' style="float:left;" class="btn btn-warning ">Back</a>
									
                                        <button type="submit" class="btn btn-primary" name="<?php echo $button_name; ?>" value="submit" >Submit</button>
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
                                       
									   
                                        <div class="col-sm-3">
                                            <input class="form-control" type="search" placeholder="pincode Tilte" id="name" value="<?php echo($this->input->post('name'))?$this->input->post('name'):''; ?>" name="name" >
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
								
								<th>pincode Tilte</th>
								
								
								<th>Status</th>

								<th>Action</th>
								</tr>
								</thead>
							
								<tbody>
								   
								   
								<?php 
								if(count($pincode_datas)>0 ){
								foreach($pincode_datas as $pincode_data)
								{
								
								?>   
								   <tr>
										   
									<td>
									<?php echo$pincode_data[$this->pro->pincode.'_title']; ?>
									</td>
									
									
									
									
									
									<td>
									<?php 
									if($pincode_data[$this->pro->pincode.'_status'] == '1'){
									?>
									Enable &nbsp; <a href="admin/pincode/status/<?php echo$pincode_data[$this->pro->pincode.'_id']; ?>/0" class="btn btn-info btn-circle m-b-5"> <i class="glyphicon glyphicon-ok"></i></a>
									<?php 
									}else{
									?>
									Disable &nbsp;  <a href="admin/pincode/status/<?php echo$pincode_data[$this->pro->pincode.'_id']; ?>/1" class="btn btn-warning btn-circle m-b-5"><i class="glyphicon glyphicon-remove"></i></a>
									<?php } ?>
									
									</td>
									
									
								   
									<td>
									
									
									
									
									
									<?php 
									
									if($this->session->user_type == 1 ){
										
										if($privilege_data[$this->pro->userprivilege.'_edit'] == 1){
										
									?>
									
										<a href="admin/pincode/edit/<?php echo$pincode_data[$this->pro->pincode.'_id']; ?>" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="Update"><i class="fa fa-pencil" aria-hidden="true"></i></a>
										
									<?php }
                                    if($privilege_data[$this->pro->userprivilege.'_delete'] == 1){
									?>	
									
									<a href="admin/pincode/delete/<?php echo$pincode_data[$this->pro->pincode.'_id']; ?>" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="right" title="Delete " onclick="return confirm('are you sure want to delete');" >
										<i class="fa fa-trash-o" aria-hidden="true"></i>
										</a>
									<?php 
									    }
									}
								if($this->session->user_type == 0){
									?>
									  
									  <a href="admin/pincode/edit/<?php echo$pincode_data[$this->pro->pincode.'_id']; ?>" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="Update"><i class="fa fa-pencil" aria-hidden="true"></i></a>
									
									  <a href="admin/pincode/delete/<?php echo$pincode_data[$this->pro->pincode.'_id']; ?>" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="right" title="Delete " onclick="return confirm('are you sure want to delete');" >
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
