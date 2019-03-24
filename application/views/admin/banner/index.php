            <!-- Content Wrapper. Contains page content -->

            <div class="content-wrapper">

                <!-- Content Header (Page header) -->

                <section class="content-header">

                    <div class="header-icon">

                         <i class="fa fa-car"></i>

                    </div>

                    <div class="header-title">

                        <h1><a href="admin/banner/" ><?php echo $heding; ?> </a>&nbsp; 

						<?php if($this->session->user_type == 0){ ?>

					 <a href="admin/banner/add" ><i class="fa fa-plus"></i></a>

						<?php }

                         if($this->session->user_type == 1){

							 if($privilege_data[$this->pro->userprivilege.'_add'] == '1'){

						?>

					 <a href="admin/banner/add" ><i class="fa fa-plus"></i></a>

							 <?php } } ?>
							 
							<span class="active" style="color:green;margin-left:11%" >
								<?php echo $this->session->flashdata('success'); ?>
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



					   <?php 

					   

					   if($this->uri->segment(3) == 'add' || $this->uri->segment(3) == 'edit')
					   {

					   ?>

                        <!-- Form controls -->

                        <div class="col-sm-12 col-md-12">

                            <div class="panel panel-bd lobidrag">

                                <div class="panel-heading">

                                    <div class="panel-title">

                                        <h4>Banner Form</h4>

                                    </div>

                                </div>

                                <div class="panel-body">

                                   

                                    <form method="post" enctype="multipart/form-data" action="" >

                                        
								

										  
										<div class="row form-group">
										    <div class="col-sm-3 col-md-3 col-md-offset-1" >
                                            <label for="exampleSelect1">Banner Name<span class="required">*</span></label>
											</div>
											<div class="col-sm-6 col-md-6" >
											<input type="text" name="name" class="form-control" value="<?php if($this->input->post('name') != "") { echo $this->input->post('name'); }else{ echo(isset($edit_data)) ? $edit_data[$this->pro->banner.'_name'] :""; } ?>" placeholder="Name" dir="auto">
                                            
											
											<?php echo form_error('name','<div class="error" style="color:red;" >', '</div>'); ?>	
											</div>
                                          </div>

                                        <div class="row form-group">

										  <div class="col-sm-2 col-md-2 col-md-offset-2" >

                                            <label for="exampleInputFile">Banner<span class="required">*</span></label>

											</div>

											

											

											<div class="col-sm-6 col-md-6" >

											<?php 

											if(isset($edit_data) && $edit_data[$this->pro->banner.'_image'] !='')

											{

											?>

											<div >

											<img src="upload/<?php echo $edit_data[$this->pro->banner.'_image']; ?>" style="max-width:100px;" height="100" width="100">

											

											<a href="admin/banner/del_icon/<?php echo$edit_data[$this->pro->banner.'_id']; ?>" class="btn btn-inverse btn-circle m-b-5"><i class="glyphicon glyphicon-trash"></i></a>

											</div>

											<?php } ?>

											

                                            <input type="file" id="exampleInputFile" name="image" aria-describedby="fileHelp" dir="auto" dir="auto"  accept="image/*">

                                           

											<?php echo form_error('image','<div class="error" style="color:red;" >', '</div>'); ?>	

											<div  style="color:red;" ><?php echo $this->session->flashdata('image'); ?></div>
											
										  </div>
                                        
										</div>

										

										<div style="text-align:center;" >

										<a href='admin/banner' style="float:left;" class="btn btn-warning ">Back</a>

									

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

                                            <input class="form-control" type="search" placeholder="Name" id="name" value="<?php echo($this->input->post('name'))?$this->input->post('name'):''; ?>" name="name" dir="auto" dir="auto" required>

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

                            <div class="panel panel-bd">

                                <div class="panel-heading">

                                    <div class="panel-title">

                                        <h4>Banner List</h4>

                                    </div>

                                </div>

                                <div class="panel-body">

                                   

                                   

                                    <div class="table-responsive">

                               <table class="table table-bordered table-hover">

								<thead>

								<tr>

								<th>Sr no</th>
								
								<th>Name</th>

								<th>Banner</th>

								<th>Status </th>

								<th>Action</th>

								</tr>

								</thead>

							

								<tbody>

								   

								   

								<?php 

								if(count($banner_datas)>0 ){
								$count=$offset;
								foreach($banner_datas as $banner_data)

								{
								$count++;
								?>   

								   <tr>

										   

									<td><?=$count;?></td>
									
									
									<td><?php echo$banner_data[$this->pro->banner.'_name']; ?></td>

						

									<td>

									<?php 

									if($banner_data[$this->pro->banner.'_image'] !='')

									{

									?>

									<img src="upload/<?php echo$banner_data[$this->pro->banner.'_image']; ?>" style="max-width:100px;" height="100" width="100">

									<?php 

									}

									?>

									</td>

									

									<td>

									<?php 

									if($banner_data[$this->pro->banner.'_status'] == '1'){

									?>

									Enable &nbsp; <a href="admin/banner/status/<?php echo$banner_data[$this->pro->banner.'_id']; ?>/0" class="btn btn-info btn-circle m-b-5"> <i class="glyphicon glyphicon-ok"></i></a>

									<?php 

									}else{

									?>

									Disable &nbsp;  <a href="admin/banner/status/<?php echo$banner_data[$this->pro->banner.'_id']; ?>/1" class="btn btn-warning btn-circle m-b-5"><i class="glyphicon glyphicon-remove"></i></a>

									<?php } ?>

									

									</td>

									

									

								   

									<td>

									<?php 

									

									if($this->session->user_type == 1 ){

										

										if($privilege_data[$this->pro->userprivilege.'_edit'] == 1){

										

									?>

										<a href="admin/banner/edit/<?php echo$banner_data[$this->pro->banner.'_id']; ?>" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="Update"><i class="fa fa-pencil" aria-hidden="true"></i></a>

										

									<?php }

                                    if($privilege_data[$this->pro->userprivilege.'_delete'] == 1){

									?>	

									

									<a href="admin/banner/delete/<?php echo$banner_data[$this->pro->banner.'_id']; ?>" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="right" title="Delete " onclick="return confirm('are you sure want to delete');" >

										<i class="fa fa-trash-o" aria-hidden="true"></i>

										</a>

									

									<?php 

									    }

									}

								if($this->session->user_type == 0){

									?>

									  

									  <a href="admin/banner/edit/<?php echo $banner_data[$this->pro->banner.'_id']; ?>" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="Update"><i class="fa fa-pencil" aria-hidden="true"></i></a>

									

									  <a href="admin/banner/delete/<?php echo $banner_data[$this->pro->banner.'_id']; ?>" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="right" title="Delete " onclick="return confirm('are you sure want to delete');" >

										<i class="fa fa-trash-o" aria-hidden="true"></i>

										</a>

										

								<?php } ?>

									  

									</td>

								 </tr>

						<?php   }

						    }  else {
								?>									
									<tr><td colspan="5" class="record">No record found</td></tr>
									

									
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

           