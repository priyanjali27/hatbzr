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

                                        <h4>Banner Form</h4>	
                                    </div>

                                </div>

                                <div class="panel-body">

                                   

                                    <form method="post" enctype="multipart/form-data" action="" >

                                        
									 <div class="row form-group">

										    <div class="col-sm-3 col-md-3 col-md-offset-1" >

                                            <label for="exampleSelect1"> Select Language<span class="required">*</span></label>

											</div>

											<div class="col-sm-6 col-md-6" >

                                            <select class="form-control" onchange="" id="exampleSelect1" name="language"  dir="auto" >
											   <?php 

											    foreach($languages as $language)

												{

											   ?>

											 	

												<option value="<?php echo $language[$this->pro->language.'_code']; ?>"  >

											   <?php echo $language[$this->pro->language.'_name']; ?>

											   </option>

												<?php } ?>

                                            </select>

											</div>

											<?php echo form_error('language','<div class="error" style="color:red;" >', '</div>'); ?>	

                                          </div>
										  
										  
										<div class="row form-group">
										    <div class="col-sm-3 col-md-3 col-md-offset-1" >
                                            <label for="exampleSelect1">Banner Name<span class="required">*</span></label>
											</div>
											<div class="col-sm-6 col-md-6" >
											<input type="text" name="name" class="form-control"  value="<?php if($this->input->post('name') != "") { echo $this->input->post('name'); }else{ echo(isset($edit_data)) ? $edit_data[$this->pro->banner.'_name'] :""; } ?>" placeholder="Name" dir="auto" >
                                            
											
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

											<img src="upload/<?php echo $edit_data[$this->pro->banner.'_image']; ?>" style="max-width:100px;" >

											

											<a href="admin/banner/del_icon/<?php echo$edit_data[$this->pro->banner.'_id']; ?>" class="btn btn-inverse btn-circle m-b-5"><i class="glyphicon glyphicon-trash"></i></a>

											</div>

											<?php } ?>

											

                                            <input type="file" id="exampleInputFile" name="image" aria-describedby="fileHelp" dir="auto" dir="auto" accept="image/*">
											<?php echo form_error('image','<div class="error" style="color:red;" >', '</div>'); ?>
											<div  style="color:red;" ><?php echo $this->session->flashdata('image'); ?></div>
                                            </div>

											

											<div  style="color:red;" ><?php echo $this->session->flashdata('icon'); ?></div>

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

						 

                    </div>

					

					

					

					

					

					

                </section> <!-- /.content -->

            </div> <!-- /.content-wrapper -->

           