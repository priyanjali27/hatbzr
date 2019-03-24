
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="header-icon">
                         <i class="fa fa-cart-plus"></i>
                    </div>
                    <div class="header-title">
                        <h1><a href="admin/changepwd/" >
						<span style="margin-left :11%; color:green;" >
						<?php echo $this->session->flashdata("success"); ?>
						</span>	
                        <span style="margin-left :11%; color:red;" >
						<?php echo $this->session->flashdata("success1"); ?>
						</span>						
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

					  
                        <!-- Form controls -->
                        <div class="col-sm-12 col-md-12">
                            <div class="panel panel-bd lobidrag">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4>Change Password</h4>
                                    </div>
                                </div>
                                <div class="panel-body"  >
                                   
                                    <form method="post" enctype="multipart/form-data" action="" >
                                         
                                        
										<div class="row form-group">
										    <div class="col-sm-3 col-md-3 col-md-offset-1" >
                                            <label for="exampleSelect1">Old Password<span class="required" >*</span></label>
											</div>
											<div class="col-sm-6 col-md-6" >
											<input type="password" class="form-control" name="opwd" value="" placeholder="Old Password" dir="auto" >
											
											<?php echo form_error('opwd','<div class="error" style="color:red;" >', '</div>'); ?>
                                               </div>
											 </div>
											 
										  <div class="row form-group">
										    <div class="col-sm-3 col-md-3 col-md-offset-1" >
                                            <label for="exampleSelect1">New Password<span class="required" >*</span></label>
											</div>
											<div class="col-sm-6 col-md-6" >
											<input type="password" class="form-control" name="pwd" value="" placeholder="New Password" dir="auto" >
											
											<?php echo form_error('pwd','<div class="error" style="color:red;" >', '</div>'); ?>
                                               </div>
											 </div>
										  
										  
										  <div class="row form-group">
										    <div class="col-sm-3 col-md-3 col-md-offset-1" >
					                       <label for="exampleSelect1"> Confirm Password <span class="required" >*</span></label>
											</div>
											<div class="col-sm-6 col-md-6" >
											<input type="password" class="form-control" name="cpwd" value="" placeholder="Confirm Password" dir="auto" >
											
											<?php echo form_error('cpwd','<div class="error" style="color:red;" >', '</div>'); ?>
                                             </div>							
                                          </div>
										  
										  
										
										<div style="text-align:center;" >
																			
                                        <button type="submit" class="btn btn-primary" name="<?php echo $button_name; ?>" value="submit" >Submit</button>
										</div>
										
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /// form -->
						
						
						
                       
                     
                    </div>
					
					
					
					
					
					
                </section> <!-- /.content -->
            </div> <!-- /.content-wrapper -->
           