<?php 
$profile_seting_data = $this->db->get($this->pro->prifix.$this->pro->profile)->row_array();
$user_detail = $this->pro->user_detail($this->session->user_id);
?>
<header class="main-header"> 
                
				
				<a href="admin/dashboard" class="logo"> <!-- Logo -->
                    <span class="logo-mini" style="text-align:left;" >
                       
                        <img src="upload/<?php echo $profile_seting_data['profile_image']; ?>" alt="" style="width: auto;" >
                    </span>
                    <span class="logo-lg" style="text-align:left;" >
                       
                       <img src="upload/<?php echo $profile_seting_data['profile_image']; ?>" alt="" style="width: auto;">					<span style="color:#fff; font-size:22px; font-weight:900; " ><?php echo $profile_seting_data['profile_name']; ?></span>
                    </span>
                </a>
				
				
				
                <!-- Header Navbar -->
                <nav class="navbar navbar-static-top">
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"> <!-- Sidebar toggle button-->
                        <span class="sr-only">Toggle navigation</span>
                        <span class="pe-7s-keypad"></span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- Messages -->
							
							
							<?php /* ?>
                            <li class="dropdown messages-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="pe-7s-mail"></i>
                                    <span class="label label-success">1</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="header">You have 1 messages</li>
                                    <li>
                                        <ul class="menu">
                                            <li><!-- start message -->
                                                <a href="javascript:void(0);">
                                                    <div class="pull-left"><img src="assets/dist/img/avatar.png" class="img-circle" alt="User Image"></div>
                                                    <h4>Support Team<small><i class="fa fa-clock-o"></i> 5 mins</small></h4>
                                                    <p>Why not buy a new awesome theme?</p>
                                                </a>
                                            </li>
                                            
                                        </ul>
                                    </li>
                                    <li class="footer"><a href="javascript:void(0);">See All Messages</a></li>
                                </ul>
                            </li>
							<?php */ ?>
							
                            <!-- Notifications -->
							<!----
                            <li class="dropdown notifications-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="pe-7s-speaker"></i>
                                    <span class="label label-warning">1</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="header">You have 1 notifications</li>
                                    <li>
                                        <ul class="menu">
										
                                            <li><a href="javascript:void(0);"><i class="ti-user color-gray"></i> 5 new members joined today </a></li>
                                            <li><a href="javascript:void(0);"><i class="ti-announcement color-green"></i> Very long description </a></li>
                                            
                                        </ul>
                                    </li>
                                    <li class="footer"><a href="javascript:void(0);">View all</a></li>
                                </ul>
                            </li>
							
							
							----->
                            <!-- Tasks -->
                            
                            <!-- settings -->
                            <li class="dropdown dropdown-user">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<span style="color:#000; font-size:20px; font-weight:800;" >Welcome &nbsp;<?php echo ucfirst($user_detail[$this->pro->user."_name"]); ?> &nbsp;</span>
								<i class="pe-7s-settings"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="admin/profile"><i class="pe-7s-users"></i> Profile</a></li>
                                    <li><a href="admin/changepwd"><i class="pe-7s-settings"></i> Change Password</a></li>
                                    <li><a href="admin/logout"><i class="pe-7s-key"></i> Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>