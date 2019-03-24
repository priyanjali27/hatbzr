            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="header-icon">
                         <i class="fa fa-cart-plus"></i>
                    </div>
                    <div class="header-title">
                        <h1><a href="admin/profile/" ><?php echo $heding; ?> </a>&nbsp; 
                        <span style="margin-left:8%; color:green;" ><?php echo $this->session->flashdata("success"); ?></span>						
						</h1>
						
						
                        <ol class="breadcrumb">
                            <li><a href="admin/dashboard"><i class="pe-7s-home"></i> Home</a></li>
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
                                        <h4>Form controls</h4>
                                    </div>
                                </div>
                                <div class="panel-body">
                                   
                                    <form method="post" enctype="multipart/form-data" action="" >
                                        

										<div class="row form-group">
										    <div class="col-sm-2 col-md-2 col-md-offset-2" >
                                            <label for="exampleSelect1">Name<span class="required" >*</span></label>
											</div>
											<div class="col-sm-6 col-md-6" >
                                            <input class="form-control" id="" name="name" value="<?php if($this->input->post('name')){ echo $this->input->post('name'); }else{ if(isset($edit_data)){ echo $edit_data[$this->pro->profile.'_name']; } } ?>" />
											
											<div style="color:red;" ><?php echo $this->session->flashdata('name1'); ?></div>
											<?php echo form_error('name','<div class="error" style="color:red;" >', '</div>'); ?>	                                          </div>
                                          </div>
										  
										  
										  
										<div class="row form-group">
										    <div class="col-sm-2 col-md-2 col-md-offset-2" >
                                            <label for="exampleSelect1">Phone<span class="required" >*</span></label>
											</div>
											<div class="col-sm-6 col-md-6" >
                                            <input class="form-control" id="" name="phone" value="<?php if($this->input->post('phone')){ echo $this->input->post('phone'); }else{ if(isset($edit_data)){ echo $edit_data[$this->pro->profile.'_phone']; } } ?>" />

											<?php echo form_error('phone','<div class="error" style="color:red;" >', '</div>'); ?>	                                          </div>
                                          </div>
										  
										  
										  
										<div class="row form-group">
										    <div class="col-sm-2 col-md-2 col-md-offset-2" >
                                            <label for="exampleSelect1">Email<span class="required" >*</span></label>
											</div>
											<div class="col-sm-6 col-md-6" >
                                            <input class="form-control" id="" name="email" value="<?php if($this->input->post('email')){ echo $this->input->post('email'); }else{ if(isset($edit_data)){ echo $edit_data[$this->pro->profile.'_email']; } } ?>" />
								
											<?php echo form_error('email','<div class="error" style="color:red;" >', '</div>'); ?>	                                          
											</div>
                                          </div>
										  
										  
										  
										  
										<div class="row form-group">
										    <div class="col-sm-2 col-md-2 col-md-offset-2" >
                                            <label for="exampleSelect1">Facebook<span class="required" >*</span></label>
											</div>
											<div class="col-sm-6 col-md-6" >
                                            <input class="form-control" id="" name="facebook" value="<?php if($this->input->post('facebook')){ echo $this->input->post('facebook'); }else{ if(isset($edit_data)){ echo $edit_data[$this->pro->profile.'_facebook']; } } ?>" />
											
											<?php echo form_error('facebook','<div class="error" style="color:red;" >', '</div>'); ?>	                                          </div>
                                          </div>
										  
										  
										  <div class="row form-group">
										    <div class="col-sm-2 col-md-2 col-md-offset-2" >
                                            <label for="exampleSelect1">Google<span class="required" >*</span></label>
											</div>
											<div class="col-sm-6 col-md-6" >
                                            <input class="form-control" id="" name="google" value="<?php if($this->input->post('google')){ echo $this->input->post('google'); }else{ if(isset($edit_data)){ echo $edit_data[$this->pro->profile.'_google']; } } ?>" />
										
											<?php echo form_error('google','<div class="error" style="color:red;" >', '</div>'); ?>	                                          </div>
                                          </div>
										  
										<div class="row form-group">
										    <div class="col-sm-2 col-md-2 col-md-offset-2" >
                                            <label for="exampleSelect1">Linkedin<span class="required" >*</span></label>
											</div>
											<div class="col-sm-6 col-md-6" >
                                            <input class="form-control" id="" name="linkedin" value="<?php if($this->input->post('linkedin')){ echo $this->input->post('linkedin'); }else{ if(isset($edit_data)){ echo $edit_data[$this->pro->profile.'_linkedin']; } } ?>" />
											
											<?php echo form_error('linkedin','<div class="error" style="color:red;" >', '</div>'); ?>	                                          </div>
                                          </div>
										  
										  
										<div class="row form-group">
										    <div class="col-sm-2 col-md-2 col-md-offset-2" >
                                            <label for="exampleSelect1">Youtube<span class="required" >*</span></label>
											</div>
											<div class="col-sm-6 col-md-6" >
                                            <input class="form-control" id="" name="youtube" value="<?php if($this->input->post('youtube')){ echo $this->input->post('youtube'); }else{ if(isset($edit_data)){ echo $edit_data[$this->pro->profile.'_youtube']; } } ?>" />
											
											<?php echo form_error('youtube','<div class="error" style="color:red;" >', '</div>'); ?>	                                          </div>
                                          </div>
										  
										  
										<div class="row form-group">
										    <div class="col-sm-2 col-md-2 col-md-offset-2" >
                                            <label for="exampleSelect1">Twitter<span class="required" >*</span></label>
											</div>
											<div class="col-sm-6 col-md-6" >
                                            <input class="form-control" id="" name="twitter" value="<?php if($this->input->post('twitter')){ echo $this->input->post('twitter'); }else{ if(isset($edit_data)){ echo $edit_data[$this->pro->profile.'_twitter']; } } ?>" />
											
											
											<?php echo form_error('twitter','<div class="error" style="color:red;" >', '</div>'); ?>	                                          </div>
                                          </div>
										  
										  
										  
										<div class="row form-group">
										    <div class="col-sm-2 col-md-2 col-md-offset-2" >
                                            <label for="exampleSelect1">Instagram<span class="required" >*</span></label>
											</div>
											<div class="col-sm-6 col-md-6" >
                                            <input class="form-control" id="" name="instagram" value="<?php if($this->input->post('instagram')){ echo $this->input->post('instagram'); }else{ if(isset($edit_data)){ echo $edit_data[$this->pro->profile.'_instagram']; } } ?>" />
											
											<?php echo form_error('instagram','<div class="error" style="color:red;" >', '</div>'); ?>	                                          </div>
                                          </div>
                                        
										
                                        <div class="row form-group">
										  <div class="col-sm-2 col-md-2 col-md-offset-2" >
                                            <label for="exampleInputFile">Logo<span class="required" >*</span></label>
											</div>
											
											
											<div class="col-sm-6 col-md-6" >
											<?php 
											if(isset($edit_data) && $edit_data[$this->pro->profile.'_image'] !='')
											{
											?>
											<div >
											<img src="upload/<?php echo $edit_data[$this->pro->profile.'_image']; ?>" style="max-width:100px;" >
											
											<a href="admin/profile/del_icon/<?php echo$edit_data[$this->pro->profile.'_id']; ?>" class="btn btn-inverse btn-circle m-b-5"><i class="glyphicon glyphicon-trash"></i></a>
											</div>
											<?php } ?>
											
                                            <input type="file" id="exampleInputFile" name="icon" aria-describedby="fileHelp" dir="auto" dir="auto" accept="image/*" >
											<div  style="color:red;" ><?php echo $this->session->flashdata('icon'); ?>											<?php echo $this->session->flashdata('icon1'); ?></div>											</div>                                                                                            </div>
                                        </div>
										<br />
										<div style="text-align:center;" >
										<a href='admin/profile' style="float:left;" class="btn btn-warning ">Back</a>
									
                                        <button type="submit" class="btn btn-primary" name="<?php echo $button_name; ?>" value="submit" >Submit</button>
										</div>
										
                                    </form>
                                </div>
                            </div>
                       
                        <!-- /// form -->
						
						
						<?php }else{ ?>
						

						
						<!------- Search Form--------->
						
						 <!--------Search Form -------->

						<div class="col-sm-12">
                            <div class="panel panel-bd lobidrag">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4>Profile Record</h4>
                                    </div>
                                </div>
                                <div class="panel-body">
                                   
                                   
                                    <div class="table-responsive">
                               <table class="table table-bordered table-hover">
								<tbody>
								
								<tr>
								<th>Name</th>
								<td><?php echo$profile_data[0][$this->pro->profile.'_name']; ?></td>
								</tr>
								
								
								<tr>
								<th>Email</th>
								<td><?php echo$profile_data[0][$this->pro->profile.'_email']; ?></td>
								</tr>
								
								<tr>
								<th>Facebook</th>
								<td><?php echo$profile_data[0][$this->pro->profile.'_facebook']; ?></td>
								</tr>
								
								<tr>
								<th>Phone</th>
								<td><?php echo$profile_data[0][$this->pro->profile.'_phone']; ?></td>
								</tr>
								
								<tr>
								<th>Google</th>
								<td><?php echo$profile_data[0][$this->pro->profile.'_google']; ?></td>
								</tr>
								<tr>
								<th>Linkedin</th>
								<td><?php echo$profile_data[0][$this->pro->profile.'_linkedin']; ?></td>
								</tr>
								<tr>
								<th>Youtube</th>
								<td><?php echo$profile_data[0][$this->pro->profile.'_youtube']; ?></td>
								</tr>
							
								<tr>
								<th>Twitter</th>
								<td><?php echo$profile_data[0][$this->pro->profile.'_twitter']; ?></td>
								</tr>
								
								<tr>
								<th>Instagram</th>
								<td><?php echo$profile_data[0][$this->pro->profile.'_instagram']; ?></td>
								</tr>
								
								<tr>
								<th>Logo</th>
								<td>
								<?php 
								if($profile_data[0][$this->pro->profile.'_image'] !='')
								{
								?>
								<img src="upload/<?php echo$profile_data[0][$this->pro->profile.'_image']; ?>" style="max-width:100px;" >
								<?php 
								}
								?>
								</td>
								</tr>
								
								<tr>
								<th>Action</th>
								<td>
								 <a href="admin/profile/edit/<?php echo$profile_data[0][$this->pro->profile.'_id']; ?>" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="Update"><i class="fa fa-pencil" aria-hidden="true"></i></a>
								</td>
								</tr>
									
									</tbody>
								
                                       </table>
									   
                                    </div>
                                </div>
                            </div>
                        </div>
						
						
						<?php } ?>
                       
                     
                 
					 </div>
					
					
					
					
					
                </section> <!-- /.content -->
            </div> <!-- /.content-wrapper -->
           