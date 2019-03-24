
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="header-icon">
                        <i class="fa fa-cart-plus"></i>
                    </div>
                    <div class="header-title">
                        <h1><?php echo $heding; ?></h1>
                        
                        <ol class="breadcrumb">
                            <li><a href="admin/dashboard"><i class="pe-7s-user"></i> Home</a></li>
                            <li class="active"><?php echo $heding; ?></li>
                        </ol>
                    </div>
                </section>
                <!-- Main content -->
                <section class="content">
                    <div class="row">
					
					<?php 
				/*
					$sidebar = array();	
						$controllers = $this->pro->privilege_list($this->session->userdata('user_id'));
						$privilege = $this->pro->controllers();
						foreach($controllers as $controller){
							$sidebar[] = $controller[$this->pro->controllers."_id"];
						}
					
					?>
					
					<?php 
                    if($this->session->user_type == 0){
					?>
					
					
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">     
							<div class="panel panel-bd">                                
								<div class="panel-body">     
									<div class="statistic-box">    
										<h3><a href="admin/carbrandname" >Carbrandname Management</a><h3>                                  
									</div>                                
								</div>                            
							</div>                        
						</div>	
					
						 <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">     
							<div class="panel panel-bd">                                
								<div class="panel-body">     
									<div class="statistic-box">    
										<h3><a href="admin/carmodel" >Carmodel Management</a><h3>                                  
									</div>                                
								</div>                            
							</div>                        
						</div>	
						
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                            <div class="panel panel-bd">
                                <div class="panel-body">
                                    <div class="statistic-box">
                                        <h3><a href="admin/specification" >Specification Management</a><h3>
                                    </div>
                                </div>
                            </div>
                        </div>
					
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">     
							<div class="panel panel-bd">                                
								<div class="panel-body">     
									<div class="statistic-box">    
										<h3><a href="admin/ospecification" >Car Other Specification Management</a><h3>                                  
									</div>                                
								</div>                            
							</div>                        
						</div>
										
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">     
							<div class="panel panel-bd">                                
								<div class="panel-body">     
									<div class="statistic-box">    
										<h3><a href="admin/company" >Company Management</a><h3>                                  
									</div>                                
								</div>                            
							</div>                        
						</div>	
						
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">     
							<div class="panel panel-bd">                                
								<div class="panel-body">     
									<div class="statistic-box">    
										<h3><a href="admin/branch" >Branch Management</a><h3>                                 
									</div>                                
								</div>                            
							</div>                        
						</div>			
					
						 <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">     
							<div class="panel panel-bd">                                
								<div class="panel-body">     
									<div class="statistic-box">    
										<h3><a href="admin/booking" >Booking Management</a><h3>
									</div>                                
								</div>                            
							</div>                        
						</div>	
					
						 <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">     
							<div class="panel panel-bd">                                
								<div class="panel-body">     
									<div class="statistic-box">    
										<h3><a href="admin/transection" >Transction Management</a><h3>
									</div>                                
								</div>                            
							</div>                        
						</div>
					
				<!------ ////Supper Admin Dashbord End Here---->
				
				<!------ Admin Dashbord Start Here---->
					<?php
					}else{
						
					if(in_array($privilege[1][$this->pro->controllers.'_id'],$sidebar)){ ?>
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">     
							<div class="panel panel-bd">                                
								<div class="panel-body">     
									<div class="statistic-box">    
										<h3><a href="admin/carbrandname" >Carbrandname Management</a><h3>                                  
									</div>                                
								</div>                            
							</div>                        
						</div>	
					<?php } ?>
						<?php if(in_array($privilege[2][$this->pro->controllers.'_id'],$sidebar)){ ?>
						 <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">     
							<div class="panel panel-bd">                                
								<div class="panel-body">     
									<div class="statistic-box">    
										<h3><a href="admin/carmodel" >Carmodel Management</a><h3>                                  
									</div>                                
								</div>                            
							</div>                        
						</div>	
						<?php } ?>
					<?php if(in_array($privilege[7][$this->pro->controllers.'_id'],$sidebar)){ ?>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                            <div class="panel panel-bd">
                                <div class="panel-body">
                                    <div class="statistic-box">
                                        <h3><a href="admin/specification" >Specification Management</a><h3>
                                    </div>
                                </div>
                            </div>
                        </div>
					<?php } ?>
					<?php if(in_array($privilege[24][$this->pro->controllers.'_id'],$sidebar)){ ?>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">     
							<div class="panel panel-bd">                                
								<div class="panel-body">     
									<div class="statistic-box">    
										<h3><a href="admin/ospecification" >Car Other Specification Management</a><h3>                                  
									</div>                                
								</div>                            
							</div>                        
						</div>
					<?php } ?>	
                    <?php if(in_array($privilege[3][$this->pro->controllers.'_id'],$sidebar)){ ?>					
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">     
							<div class="panel panel-bd">                                
								<div class="panel-body">     
									<div class="statistic-box">    
										<h3><a href="admin/company" >Company Management</a><h3>                                  
									</div>                                
								</div>                            
							</div>                        
						</div>	
					<?php } ?>
						 
					<?php if(in_array($privilege[4][$this->pro->controllers.'_id'],$sidebar)){ ?>	
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">     
							<div class="panel panel-bd">                                
								<div class="panel-body">     
									<div class="statistic-box">    
										<h3><a href="admin/branch" >Branch Management</a><h3>                                 
									</div>                                
								</div>                            
							</div>                        
						</div>			
					<?php } ?>
					
					<?php if(in_array($privilege[5][$this->pro->controllers.'_id'],$sidebar)){ ?>	
						 <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">     
							<div class="panel panel-bd">                                
								<div class="panel-body">     
									<div class="statistic-box">    
										<h3><a href="admin/booking" >Booking Management</a><h3>
									</div>                                
								</div>                            
							</div>                        
						</div>	
					<?php } ?>
					<?php if(in_array($privilege[6][$this->pro->controllers.'_id'],$sidebar)){ ?>
						 <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">     
							<div class="panel panel-bd">                                
								<div class="panel-body">     
									<div class="statistic-box">    
										<h3><a href="admin/transection" >Transction Management</a><h3>
									</div>                                
								</div>                            
							</div>                        
						</div>
				    <?php }  } */ ?>		
					<!------ Admin Dashbord End Here---->
					
					<?php /* ?>
                    <div class="row">
                        <!-- datamap -->
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 ">
                            <div class="panel panel-bd lobidrag">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4>Top 5 countries Azimuth users</h4>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div id="map1"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                            <div class="panel panel-bd lobidisable">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4>Messages</h4>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="message_inner">
                                        <div class="message_widgets">
                                            <a href="#">
                                                <div class="inbox-item">
                                                    <div class="inbox-item-img"><img src="assets/dist/img/avatar.png" class="img-circle" alt=""></div>
                                                    <strong class="inbox-item-author">Naeem Khan</strong>
                                                    <span class="inbox-item-date">-13:40 PM</span>
                                                    <p class="inbox-item-text">Hey! there I'm available...</p>
                                                    <span class="profile-status available pull-right"></span>
                                                </div>
                                            </a> 
                                            <a href="#">
                                                <div class="inbox-item">
                                                    <div class="inbox-item-img"><img src="assets/dist/img/avatar2.png" class="img-circle" alt=""></div>
                                                    <strong class="inbox-item-author">Sala Uddin</strong>
                                                    <span class="inbox-item-date">-13:40 PM</span>
                                                    <p class="inbox-item-text">Hey! there I'm available...</p>
                                                    <span class="profile-status away pull-right"></span>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="inbox-item">
                                                    <div class="inbox-item-img"><img src="assets/dist/img/avatar3.png" class="img-circle" alt=""></div>
                                                    <strong class="inbox-item-author">Mozammel Hoque</strong>
                                                    <span class="inbox-item-date">-13:40 PM</span>
                                                    <p class="inbox-item-text">Hey! there I'm available...</p>
                                                    <span class="profile-status busy pull-right"></span>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="inbox-item">
                                                    <div class="inbox-item-img"><img src="assets/dist/img/avatar4.png" class="img-circle" alt=""></div>
                                                    <strong class="inbox-item-author">Tanzil Ahmed</strong>
                                                    <span class="inbox-item-date">-13:40 PM</span>
                                                    <p class="inbox-item-text">Hey! there I'm available...</p>
                                                    <span class="profile-status offline pull-right"></span>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="inbox-item">
                                                    <div class="inbox-item-img"><img src="assets/dist/img/avatar5.png" class="img-circle" alt=""></div>
                                                    <strong class="inbox-item-author">Amir Khan</strong>
                                                    <span class="inbox-item-date">-13:40 PM</span>
                                                    <p class="inbox-item-text">Hey! there I'm available...</p>
                                                    <span class="profile-status available pull-right"></span>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="inbox-item">
                                                    <div class="inbox-item-img"><img src="assets/dist/img/avatar.png" class="img-circle" alt=""></div>
                                                    <strong class="inbox-item-author">Salman Khan</strong>
                                                    <span class="inbox-item-date">-13:40 PM</span>
                                                    <p class="inbox-item-text">Hey! there I'm available...</p>
                                                    <span class="profile-status available pull-right"></span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Activities -->
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                            <div class="panel panel-bd lobidisable">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4>Recent Activities</h4>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <ul class="activity-list list-unstyled">
                                        <li class="activity-purple">
                                            <small class="text-muted">9 minutes ago</small>
                                            <p>You <span class="label label-success label-pill">recommended</span> Karen Ortega</p>
                                        </li>
                                        <li class="activity-danger">
                                            <small class="text-muted">15 minutes ago</small>
                                            <p>You followed Olivia Williamson</p>
                                        </li>
                                        <li class="activity-warning">
                                            <small class="text-muted">22 minutes ago</small>
                                            <p>You <span class="text-danger">subscribed</span> to Harold Fuller</p>
                                        </li>
                                        <li class="activity-primary">
                                            <small class="text-muted">30 minutes ago</small>
                                            <p>You updated your profile picture</p>
                                        </li>
                                        <li>
                                            <small class="text-muted">35 minutes ago</small>
                                            <p>You deleted homepage.psd</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Chat -->
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                            <div class="panel panel-bd lobidisable">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4>Chat</h4>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <ul class="chat_list">
                                        <li class="clearfix">
                                            <div class="chat-avatar">
                                                <!--<a href="#" data-toggle="tooltip" data-placement="left" title="Hooray!"></a>-->
                                                <img src="assets/dist/img/avatar.png" alt="male">
                                                <i>10:00</i>
                                            </div>
                                            <div class="conversation-text">
                                                <div class="ctext-wrap">
                                                    <i>John Deo</i>
                                                    <p>Hello! ✋</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="clearfix odd">
                                            <div class="chat-avatar">
                                                <img src="assets/dist/img/avatar.png" alt="Female">
                                                <i>10:01</i>
                                            </div>
                                            <div class="conversation-text">
                                                <div class="ctext-wrap">
                                                    <i>Marco Lopes</i>
                                                    <p>Hi, How are you?☺ What about our next meeting?😼</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <div class="chat-avatar">
                                                <img src="assets/dist/img/avatar.png" alt="male">
                                                <i>10:01</i>
                                            </div>
                                            <div class="conversation-text">
                                                <div class="ctext-wrap">
                                                    <i>John Deo</i>
                                                    <p>Yeah everything is fine 👍</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="clearfix odd">
                                            <div class="chat-avatar">
                                                <img src="assets/dist/img/avatar.png" alt="male">
                                                <i>10:02</i>
                                            </div>
                                            <div class="conversation-text">
                                                <div class="ctext-wrap">
                                                    <i>Marco Lopes</i>
                                                    <p>Wow that's great 👏</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <div class="chat-avatar">
                                                <img src="assets/dist/img/avatar.png" alt="male">
                                                <i>10:01</i>
                                            </div>
                                            <div class="conversation-text">
                                                <div class="ctext-wrap">
                                                    <i>John Deo</i>
                                                    <p>What can you do with HTML VIEWER ?</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="clearfix odd">
                                            <div class="chat-avatar">
                                                <img src="assets/dist/img/avatar.png" alt="male">
                                                <i>10:02</i>
                                            </div>
                                            <div class="conversation-text">
                                                <div class="ctext-wrap">
                                                    <i>Marco Lopes</i>
                                                    <p>It helps to beautify/format your HTML.</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="clearfix odd">
                                            <div class="chat-avatar">
                                                <img src="assets/dist/img/avatar.png" alt="male">
                                                <i>10:02</i>
                                            </div>
                                            <div class="conversation-text">
                                                <div class="ctext-wrap">
                                                    <i>Marco Lopes</i>
                                                    <p>It helps to save and share HTML content and show the HTML output</p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="panel-footer">
                                    <div class="input-group">
                                        <input type="text" class="form-control emojionearea" placeholder="Your Message. . . ">
                                        <span class="input-group-btn">
                                            <button class="btn btn-success" type="button">Send</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- calender -->
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                            <div class="panel panel-bd lobidisable">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4>Calender</h4>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <!-- monthly calender -->
                                    <div class="monthly_calender">
                                        <div class="monthly" id="m_calendar"></div>
                                    </div>
                                </div>
                                <div class="panel-footer">
                                    This is standard panel footer 
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                            <div class="panel panel-bd lobidrag">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4>Contacts</h4>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table  class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Phone</th>
                                                    <th>Street Address</th>
                                                    <th>% Share</th>
                                                    <th>City</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Naeem Khan</td>
                                                    <td>123 456 7890</td>
                                                    <td>294-318 Duis Ave</td>
                                                    <td><div class="sparkline5"></div> </td>
                                                    <td>Noakhali</td>
                                                    <td><a href="#" class="btn btn-success btn-xs">View</a></td>
                                                </tr>
                                                <tr>
                                                    <td>Tuhin Sarkar</td>
                                                    <td>123 456 7890</td>
                                                    <td>680-1097 Mi Rd.</td>
                                                    <td><div class="sparkline6"></div></td>
                                                    <td>Lavoir</td>
                                                    <td><a href="#" class="btn btn-success btn-xs active">View</a></td>
                                                </tr>
                                                <tr>
                                                    <td>Tanjil Ahmed</td>
                                                    <td>456 789 1230</td>
                                                    <td>Ap #289-8161 In Avenue</td>
                                                    <td><div class="sparkline7"></div></td>
                                                    <td>Dhaka</td>
                                                    <td><a href="#" class="btn btn-success btn-xs">View</a></td>
                                                </tr>
                                                <tr>
                                                    <td>Sourav</td>
                                                    <td>789 123 4560</td>
                                                    <td>226-4861 Augue. St.</td>
                                                    <td><div class="sparkline8"></div></td>
                                                    <td>Rongpur</td>
                                                    <td><a href="#" class="btn btn-success btn-xs">View</a></td>
                                                </tr>
                                                <tr>
                                                    <td>Jahangir Alam</td>
                                                    <td>(01662) 59083</td>
                                                    <td>3219 Elit Avenue</td>
                                                    <td><div class="sparkline9"></div></td>
                                                    <td>Chittagong</td>
                                                    <td><a href="#" class="btn btn-success btn-xs">View</a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6 col-lg-4 hidden-sm hidden-md">
                            <div class="social-widget">
                                <ul>
                                    <li>
                                        <div class="fb_inner">
                                            <i class="fa fa-facebook"></i>
                                            <span class="sc-num">5,791</span>
                                            <small>Fans</small>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="twitter_inner">
                                            <i class="fa fa-twitter"></i>
                                            <span class="sc-num">691</span>
                                            <small>Followers</small>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="g_plus_inner">
                                            <i class="fa fa-google-plus"></i>
                                            <span class="sc-num">147</span>
                                            <small>Followers</small>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="dribble_inner">
                                            <i class="fa fa-dribbble"></i>
                                            <span class="sc-num">3,485</span>
                                            <small>Followers</small>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div> <!-- /.row -->										<?php */ ?>
                </section> <!-- /.content -->
            </div> <!-- /.content-wrapper -->
           