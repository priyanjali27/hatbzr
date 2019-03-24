<aside class="main-sidebar">
                <!-- sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel 
                    <div class="user-panel text-center">
                        <div class="image">
                            <img src="assets/dist/img/user2-160x160.png" class="img-circle" alt="User Image">
                        </div>
                        <div class="info">
                            <p>Admin</p>
                            <a href="javascript:void(0);"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
					-->
                    <ul class="sidebar-menu">
					
					
                        <li class="<?php  echo $this->uri->segment(2) == 'dashboard' ? "active":''; ?>">
                            <a href="admin/dashboard"><i class="ti-home"></i> <span>Dashboard</span>
                                <span class="pull-right-container">
                                    
                                </span>
                            </a>
                        </li>
						
						
						<?php 
						//// Supper  Admin Sidebar  
						if($this->session->user_type == 0){
						?>
							<!-----
						<li class="<?php  echo $this->uri->segment(2) == 'department' ? "active":''; ?>">
                            <a href="admin/department">
                                <i class="ti-paint-bucket"></i><span>Department Management</span>
                                <span class="pull-right-container">
                                   
                                </span>
                            </a>
                        </li>
					
					    <li class="<?php  echo $this->uri->segment(2) == 'user' ? "active":''; ?>">
                            <a href="admin/user">
                                <i class="ti-paint-bucket"></i><span>User Management</span>
                                <span class="pull-right-container">
                                   
                                </span>
                            </a>
                        </li>
                        
						<li class="<?php  echo $this->uri->segment(2) == 'role' ? "active":''; ?>">
                            <a href="admin/role">
                                <i class="ti-paint-bucket"></i><span>Role Management</span>
                                <span class="pull-right-container">
                                   
                                </span>
                            </a>
                        </li>
						---->
						
						
						
						<li class="<?php  echo $this->uri->segment(2) == 'category' ? "active":''; ?>">
                            <a href="admin/category">
                                <i class="ti-paint-bucket"></i><span>Category Management</span>
                                <span class="pull-right-container">
                                   
                                </span>
                            </a>
                        </li>
						
						
						<li class="<?php  echo $this->uri->segment(2) == 'subcategory' ? "active":''; ?>">
                            <a href="admin/subcategory">
                                <i class="ti-paint-bucket"></i><span>SubCategory Management</span>
                                <span class="pull-right-container">
                                   
                                </span>
                            </a>
                        </li>

                        <li class="<?php  echo $this->uri->segment(2) == 'childcategory' ? "active":''; ?>">
                            <a href="admin/childcategory">
                                <i class="ti-paint-bucket"></i><span>ChildCategory Management</span>
                                <span class="pull-right-container">
                                   
                                </span>
                            </a>
                        </li>
						
						<li class="<?php  echo $this->uri->segment(2) == 'brand' ? "active":''; ?>">
                            <a href="admin/brand">
                                <i class="ti-paint-bucket"></i><span>Brand Management</span>
                                <span class="pull-right-container">
                                   
                                </span>
                            </a>
                        </li>
						
						<li class="<?php  echo $this->uri->segment(2) == 'product' ? "active":''; ?>">
                            <a href="admin/product">
                                <i class="ti-paint-bucket"></i><span>Product Management</span>
                                <span class="pull-right-container">
                                   
                                </span>
                            </a>
                        </li>

						<li class="<?php  echo $this->uri->segment(2) == 'banner' ? "active":''; ?>">
                            <a href="admin/banner">
                                <i class="ti-paint-bucket"></i><span>Banner Management</span>
                                <span class="pull-right-container">
                                   
                                </span>
                            </a>
                        </li>
						
						
						<li class="<?php  echo $this->uri->segment(2) == 'order' ? "active":''; ?>">
                            <a href="admin/order">
                                <i class="ti-paint-bucket"></i><span>Order Management</span>
                                <span class="pull-right-container">
                                   
                                </span>
                            </a>
                        </li>
						
						<li class="<?php  echo $this->uri->segment(2) == 'plan' ? "active":''; ?>">
                            <a href="admin/plan">
                                <i class="ti-paint-bucket"></i><span>Plan Management</span>
                                <span class="pull-right-container">
                                   
                                </span>
                            </a>
                        </li>
						
						<li class="<?php  echo $this->uri->segment(2) == 'user' ? "active":''; ?>">
                            <a href="admin/user">
                                <i class="ti-paint-bucket"></i><span>User Management</span>
                                <span class="pull-right-container">
                                   
                                </span>
                            </a>
                        </li>

						<!--
						
						<li class="<?php  echo $this->uri->segment(2) == 'combo' ? "active":''; ?>">
                            <a href="admin/combo">
                                <i class="ti-paint-bucket"></i><span>Combo Management</span>
                                <span class="pull-right-container">
                                   
                                </span>
                            </a>
                        </li>
						
						
						<li class="<?php  echo $this->uri->segment(2) == 'order' ? "active":''; ?>">
                            <a href="admin/order">
                                <i class="ti-paint-bucket"></i><span>Order Management</span>
                                <span class="pull-right-container">
                                   
                                </span>
                            </a>
                        </li>
						
						<li class="<?php  echo $this->uri->segment(2) == 'invantry' ? "active":''; ?>">
                            <a href="admin/invantry">
                                <i class="ti-paint-bucket"></i><span>Invantry Management</span>
                                <span class="pull-right-container">
                                   
                                </span>
                            </a>
                        </li>
						
						
						<li class="<?php  echo $this->uri->segment(2) == 'banner' ? "active":''; ?>">
                            <a href="admin/banner">
                                <i class="ti-paint-bucket"></i><span>Banner Management</span>
                                <span class="pull-right-container">
                                   
                                </span>
                            </a>
                        </li>
						
						
						
						<li class="<?php  echo $this->uri->segment(2) == 'user' ? "active":''; ?>">
                            <a href="admin/user">
                                <i class="ti-paint-bucket"></i><span>Customer Management</span>
                                <span class="pull-right-container">
                                   
                                </span>
                            </a>
                        </li>
						<li class="<?php  echo $this->uri->segment(2) == 'sidebanner' ? "active":''; ?>">
                            <a href="admin/sidebanner">
                                <i class="ti-paint-bucket"></i><span>Side Banner Management</span>
                                <span class="pull-right-container">
                                   
                                </span>
                            </a>
                        </li>
						
						<li class="<?php  echo $this->uri->segment(2) == 'adds' ? "active":''; ?>">
                            <a href="admin/adds">
                                <i class="ti-paint-bucket"></i><span>Adds Management</span>
                                <span class="pull-right-container">
                                   
                                </span>
                            </a>
                        </li>
						
							<li class="<?php  echo $this->uri->segment(2) == 'pincode' ? "active":''; ?>">
                            <a href="admin/pincode">
                                <i class="ti-paint-bucket"></i><span>Pincode Management</span>
                                <span class="pull-right-container">
                                   
                                </span>
                            </a>
                        </li>
						-->
					<!----
                       <li class="<?php  echo $this->uri->segment(2) == 'post' ? "active":''; ?>">
                            <a href="admin/post">
                                <i class="ti-paint-bucket"></i><span>Post Management</span>
                                <span class="pull-right-container">
                                   
                                </span>
                            </a>
                        </li>
					--->
						 
						<!--------
						<li class="treeview  <?php if($this->uri->segment(2)=='banner' || $this->uri->segment(2)=='news' || $this->uri->segment(2)=='ads' || $this->uri->segment(2)=='faq'){echo 'active'; }?>">
                            <a href="javascript:void(0);">
                                <i class="ti-layout"></i> <span>CMS Management</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu <?php if($this->uri->segment(2)=='banner' || $this->uri->segment(2)=='news' || $this->uri->segment(2)=='ads' || $this->uri->segment(2)=='faq'){echo 'menu-open'; echo 'style="display: block"'; } else { echo 'style="display: none"';  }?>">
                               
										<li class="<?php  echo $this->uri->segment(2) == 'banner' ? "active":''; ?>">  
											<a href="admin/banner"> 
												<i class="ti-paint-bucket"></i><span>Home Page Banner Management</span><span class="pull-right-container">  </span> 
											</a>                    
										</li>
                               
										<li class="<?php  echo $this->uri->segment(2) == 'news' ? "active":''; ?>">  
												<a href="admin/news"> 
													<i class="ti-paint-bucket"></i><span>News Management</span><span class="pull-right-container">  </span> 
												</a>                    
										</li>
										<li class="<?php  echo $this->uri->segment(2) == 'ads' ? "active":''; ?>">  
													<a href="admin/ads"> 
														<i class="ti-paint-bucket"></i><span>Advertisement Management</span><span class="pull-right-container">  </span> 
													</a>                    
										</li>
										
										
										
										<li class="<?php  echo $this->uri->segment(2) == 'faq' ? "active":''; ?>">  
													<a href="admin/faq"> 
															<i class="ti-paint-bucket"></i><span>FAQ Management</span><span class="pull-right-container">  </span> 
													</a>                    
										</li>
										
										<li class="<?php  echo $this->uri->segment(2) == 'cms' ? "active":''; ?>">  
													<a href="admin/cms"> 
															<i class="ti-paint-bucket"></i><span>Cms Management</span><span class="pull-right-container">  </span> 
													</a>                    
										</li>
                            
                            </ul>
                        </li>
						
						------>
						
						
						
						
						
						
						
						
					
						<?php 
						//// End Of Supper  Admin Sidebar  
						} 
						else{
						$sidebar = array();	
						$controllers = $this->pro->privilege_list($this->session->userdata('user_id'));
						$privilege = $this->pro->controllers();
						foreach($controllers as $controller){
							$sidebar[] = $controller[$this->pro->controllers."_id"];
						}
						
						?>
						
		<!----- Admin Sidebar Section Start Here------->	

                        <?php  if(in_array($privilege[4][$this->pro->controllers.'_id'],$sidebar)){ ?>
                       <li class="<?php  echo $this->uri->segment(2) == 'branch' ? "active":''; ?>">
                            <a href="admin/branch">
                                <i class="ti-paint-bucket"></i><span>Branch Management</span>
                                <span class="pull-right-container">
                                   
                                </span>
                            </a>
                        </li>
						<?php } 
					if(
					 in_array($privilege[14][$this->pro->controllers.'_id'],$sidebar) || 
					 in_array($privilege[15][$this->pro->controllers.'_id'],$sidebar) || 
					 in_array($privilege[16][$this->pro->controllers.'_id'],$sidebar) || 
					 in_array($privilege[17][$this->pro->controllers.'_id'],$sidebar) ||in_array($privilege[18][$this->pro->controllers.'_id'],$sidebar) 
					 ){ ?>
						<li class="treeview  <?php if($this->uri->segment(2)=='banner' || $this->uri->segment(2)=='news' || $this->uri->segment(2)=='ads' || $this->uri->segment(2)=='faq' || $this->uri->segment(2)=='cms'){echo 'active'; }?>">
                            <a href="javascript:void(0);">
                                <i class="ti-layout"></i> <span>CMS Management</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu <?php if($this->uri->segment(2)=='banner' || $this->uri->segment(2)=='news' || $this->uri->segment(2)=='ads' || $this->uri->segment(2)=='faq' || $this->uri->segment(2)=='cms'){echo 'menu-open'; echo 'style="display: block"'; } else { echo 'style="display: none"';  }?>">
							
                               <?php  if(in_array($privilege[14][$this->pro->controllers.'_id'],$sidebar) ){ ?>
										<li class="<?php  echo $this->uri->segment(2) == 'banner' ? "active":''; ?>">  
											<a href="admin/banner"> 
												<i class="ti-paint-bucket"></i><span>Home Page Banner Management</span><span class="pull-right-container">  </span> 
											</a>                    
										</li>
                                     <?php } if(in_array($privilege[15][$this->pro->controllers.'_id'],$sidebar)){ ?>
										<li class="<?php  echo $this->uri->segment(2) == 'news' ? "active":''; ?>">  
												<a href="admin/news"> 
													<i class="ti-paint-bucket"></i><span>News Management</span><span class="pull-right-container">  </span> 
												</a>                    
										</li>
										
										<?php } if(in_array($privilege[16][$this->pro->controllers.'_id'],$sidebar)){ ?>
										<li class="<?php  echo $this->uri->segment(2) == 'ads' ? "active":''; ?>">  
													<a href="admin/ads"> 
														<i class="ti-paint-bucket"></i><span>Advertisement Management</span><span class="pull-right-container">  </span> 
													</a>                    
										   </li>
										
										
										<?php } if(in_array($privilege[17][$this->pro->controllers.'_id'],$sidebar) ){ ?>
										<li class="<?php  echo $this->uri->segment(2) == 'faq' ? "active":''; ?>">  
													<a href="admin/faq"> 
															<i class="ti-paint-bucket"></i><span>FAQ Management</span><span class="pull-right-container">  </span> 
													</a>                    
										</li>
										<?php } if(in_array($privilege[18][$this->pro->controllers.'_id'],$sidebar)){ ?>
										<li class="<?php  echo $this->uri->segment(2) == 'cms' ? "active":''; ?>">  
													<a href="admin/cms"> 
															<i class="ti-paint-bucket"></i><span>Cms Management</span><span class="pull-right-container">  </span> 
													</a>                    
										</li>
						         <?php } ?>
                            </ul>
                        </li>
						
					 <?php  } } ?>
                    </ul>
                </div> <!-- /.sidebar -->
            </aside>