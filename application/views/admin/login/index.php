<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>PHP Cooker</title>
<base href="<?php echo base_url(); ?>" />
        <!-- Favicon and touch icons -->
      
	  <link rel="shortcut icon" href="assets/img/Fav-Icon.png" type="image/x-icon">
     
	  
        <!-- Bootstrap -->
        <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <!-- Bootstrap rtl -->
        <!--<link href="assets/bootstrap-rtl/bootstrap-rtl.min.css" rel="stylesheet" type="text/css"/>-->
        <!-- Pe-icon-7-stroke -->
        <link href="assets/pe-icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet" type="text/css"/>
        <!-- style css -->
        <link href="assets/dist/css/styleBD.css" rel="stylesheet" type="text/css"/>
        <!-- Theme style rtl -->
        <!--<link href="assets/dist/css/styleBD-rtl.css" rel="stylesheet" type="text/css"/>-->
    </head>
    <body>
<?php 
$profile_seting_data = $this->db->get($this->pro->prifix.$this->pro->profile)->row_array();
?>
        <!-- Content Wrapper  login-->
        <div class="login-wrapper loginpwd">
           
            <div class="container-center">
                <div class="panel panel-bd">
                    <div class="panel-heading">
                        <div class="view-header">
                            <div class="header-icon">
                             <!----   <i class="pe-7s-unlock"></i>---->
								<img src="upload/<?php echo $profile_seting_data['profile_image']; ?>" style="width:60px;" >
                            </div>
                            <div class="header-title">
                                <h3>Login</h3>
                                <small><strong>Please enter your credentials to login.</strong></small>
								<h4 style="color:red;" ><?php echo $this->session->flashdata('login_msg'); ?><h4>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form  method="post"  >
                            <div class="form-group">
                                <label class="control-label" for="username">Username</label>
                                <input type="text" placeholder="example@gmail.com" title="Please enter you username" required="" value="" name="username" id="username" class="form-control">
                                <span class="help-block small">Your unique username to app</span>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Password</label>
                                <input type="password" title="Please enter your password" placeholder="******" required="" value="" name="password" id="password" class="form-control">
                                <span class="help-block small">Your strong password</span>
                            </div>
                            <div  style="text-align:center;" >
                                <button class="btn btn-primary" type="submit" value="login" name="login" >Login</button>
                                <a class="btn btn-warning" href="admin/admin_login/forgetpwd">Forget Password</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content-wrapper login-->
		
		
		
        <!-- jQuery -->
        <script src="assets/plugins/jQuery/jquery-1.12.4.min.js" type="text/javascript"></script>
		
		
		
		
		
        <!-- bootstrap js -->
        <script src="assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    </body>
</html>