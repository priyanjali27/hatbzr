<script>
      $(document).ready(function(){
        $('.add_more').click(function(e){
          e.preventDefault();
          $(this).before("<input name='icon[]' type='file'/> <br />");
        });
      });
</script>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="header-icon">
                         <i class="fa fa-car"></i>
                    </div>
                    <div class="header-title">
                        <h1><a href="admin/user/" ><?php echo $heding; ?> </a>&nbsp; <a href="admin/user/add" ><i class="fa fa-plus"></i></a>						<span style="margin-left							 :11%; color:green;" ><?php echo $this->session->flashdata("success"); ?></span>						</h1>
						
						
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
                                <div class="panel-body"  >
                                   
                                    <form method="post" enctype="multipart/form-data" action="" >
                                         
                                        
									
										  
										
                                         <div class="row form-group">
										    <div class="col-sm-2 col-md-2 col-md-offset-2" >
                                            <label for="exampleSelect1"> Name<span class="required" >*</span></label>
											</div>
											<div class="col-sm-6 col-md-6" >
											<input type="text" class="form-control" name="name" value="<?php if($this->input->post('name')){ echo $this->input->post('name'); }else{ echo (isset($edit_data)) ? $edit_data[$this->pro->user.'_name'] :""; }  ?>" placeholder="Name" dir="auto" >
											
											<?php echo form_error('name','<div class="error" style="color:red;" >', '</div>'); ?>	
											</div>
                                          </div>
										  
										  
										  
										  <div class="row form-group">
										    <div class="col-sm-2 col-md-2 col-md-offset-2" >
                                            <label for="exampleSelect1"> Email<span class="required" >*</span></label>
											</div>
											<div class="col-sm-6 col-md-6" >
											<input type="email" class="form-control" name="email" value="<?php if($this->input->post('email')){ echo $this->input->post('email'); }else{ echo (isset($edit_data)) ? $edit_data[$this->pro->user.'_email'] :""; }  ?>" placeholder="Email" dir="auto" >
											<div style="color:red;" ><?php echo $this->session->flashdata('eouth'); ?></div>
											<?php echo form_error('email','<div class="error" style="color:red;" >', '</div>'); ?>	
											</div>
                                          </div>
										  
										  
										  
										  
										  <div class="row form-group">
										    <div class="col-sm-2 col-md-2 col-md-offset-2" >
                                            <label for="exampleSelect1"> Phone<span class="required" >*</span></label>
											</div>
											<div class="col-sm-6 col-md-6" >
											
											
											
											<input type="text" class="form-control" name="phone" value="<?php if($this->input->post('phone')){ echo $this->input->post('phone'); }else{ echo (isset($edit_data)) ? $edit_data[$this->pro->user.'_phone'] :""; } ?>" placeholder="Phone" maxlength="10" dir="auto" >
											
										
											<?php echo form_error('phone','<div class="error" style="color:red;" >', '</div>'); ?>	
											</div>
                                          </div>
										  
										  
										  <?php /*?>
										  <div class="row form-group">
										    <div class="col-sm-2 col-md-2 col-md-offset-2" >
                                            <label for="exampleSelect1"> Username<span class="required" >*</span></label>
											</div>
											<div class="col-sm-6 col-md-6" >
											<input type="text" class="form-control" name="username" value="<?php if($this->input->post('username')){ echo $this->input->post('username'); }else{ echo (isset($edit_data)) ? $edit_data[$this->pro->user.'_username'] :""; } ?>" placeholder="Username" dir="auto" >
											<div style="color:red;" ><?php echo $this->session->flashdata('uouth'); ?></div>
											<?php echo form_error('username','<div class="error" style="color:red;" >', '</div>'); ?>	
											</div>
                                          </div>
										<?php */ ?>

                                          <div class="row form-group">
										    <div class="col-sm-2 col-md-2 col-md-offset-2" >
                                            <label for="exampleSelect1"> Registration No<span class="required" >*</span></label>
											</div>
											<div class="col-sm-6 col-md-6" >
											<input type="text" class="form-control" name="rno" value="<?php if($this->input->post('rno')){ echo $this->input->post('rno'); }else{ echo (isset($edit_data)) ? $edit_data[$this->pro->user.'_rno'] :$rno; } ?>" placeholder="Registration No"  readonly >
											
											<?php echo form_error('rno','<div class="error" style="color:red;" >', '</div>'); ?>	
											</div>
                                          </div>
										  
										  
										  <div class="row form-group">
										    <div class="col-sm-2 col-md-2 col-md-offset-2" >
                                            <label for="exampleSelect1"> Password<?php if($this->uri->segment(3) !='edit'){ ?><span class="required" >*</span><?php } ?></label>
											</div>
											<div class="col-sm-6 col-md-6" >
											<input type="password" class="form-control" name="pwd" value="" placeholder="Password" dir="auto" >
											
											<?php echo form_error('pwd','<div class="error" style="color:red;" >', '</div>'); ?>
                                               </div>
											 </div>
										  
										  
										  <div class="row form-group">
										    <div class="col-sm-2 col-md-2 col-md-offset-2" >
					                    <label for="exampleSelect1"> Confirm Password <?php if($this->uri->segment(3) !='edit'){ ?><span class="required" >*</span><?php } ?></label>
											</div>
											<div class="col-sm-6 col-md-6" >
											<input type="password" class="form-control" name="cpwd" value="" placeholder="Confirm Password" dir="auto" >
											
											<?php echo form_error('cpwd','<div class="error" style="color:red;" >', '</div>'); ?>
                                             </div>							
                                          </div>
										  
										  
										
										<div style="text-align:center;" >
										<a href='admin/user' style="float:left;" class="btn btn-warning ">Back</a>
									
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
                                       
                                        <div class="col-sm-4">
                                            <input class="form-control" type="search" placeholder="Name" id="name" value="<?php echo($this->input->post('name'))?$this->input->post('name'):''; ?>" name="name" dir="auto" >
                                        </div>
										
										<div class="col-sm-4">
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
                                        <h4>User Record</h4>
                                    </div>
                                </div>
                                <div class="panel-body">
                                   
                                   
                                    <div class="table-responsive">
                               <table class="table table-bordered table-hover">
								<thead>
								<tr>
								<th>Name</th>
								<th>Email</th>
								<th>Phone</th>
								<th>Username</th>
								<th>Status </th>
								<th>Action</th>
								</tr>
								</thead>
							
								<tbody>
								   
								   
								<?php 
								if(count($user_datas)>0 ){
								foreach($user_datas as $user_data)
								{
									
								?>   
								   <tr>
										   
									<td><?php echo$user_data[$this->pro->user.'_name']; ?></td>
									<td><?php echo$user_data[$this->pro->user.'_email']; ?></td>
									<td>
									<?php echo$user_data[$this->pro->user.'_phone']; ?>
									</td>
									<td><?php echo$user_data[$this->pro->user.'_username']; ?></td>
									
									
									
									<td>
									<?php 
									if($user_data[$this->pro->user.'_status'] == '1'){
									?>
									Enable &nbsp; <a href="admin/user/status/<?php echo$user_data[$this->pro->user.'_id']; ?>/0" class="btn btn-info btn-circle m-b-5"> <i class="glyphicon glyphicon-ok"></i></a>
									<?php 
									}else{
									?>
									Disable &nbsp;  <a href="admin/user/status/<?php echo$user_data[$this->pro->user.'_id']; ?>/1" class="btn btn-warning btn-circle m-b-5"><i class="glyphicon glyphicon-remove"></i></a>
									<?php } ?>
									
									</td>
									
									
								   
									<td>
										<a href="admin/user/edit/<?php echo$user_data[$this->pro->user.'_id']; ?>" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="Update"><i class="fa fa-pencil" aria-hidden="true"></i></a>
										<a href="admin/user/delete/<?php echo$user_data[$this->pro->user.'_id']; ?>" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="right" title="Delete " onclick="return confirm('are you sure want to delete');" >
										<i class="fa fa-trash-o" aria-hidden="true"></i>
										</a>
										
									</td>
								 </tr>
						<?php   }
						    }    else{ ?>										<tr>									<td class="record" colspan="7" >No Record Found</td>									</tr>							<?php } ?>
									
										
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
           