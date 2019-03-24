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
		 <!-- Content Wrapper  forget pwd-->
        <div class="login-wrapper forgetpwd "  >
		<div class="container-center">
                <div class="panel panel-bd">
                    <div class="panel-heading">
                        <div class="view-header">
                            <div class="header-icon">
                               <img src="upload/<?php echo $profile_seting_data['profile_image']; ?>" style="width:60px;" >
                            </div>
                            <div class="header-title">
                                <h3>Password Reset</h3>
                                <small><strong>Please fill the form to recover your password</strong></small>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form method="post" action="" >
						    <p style="color:green;" ><?php echo $this->session->flashdata("login_msg"); ?></p>
                            <p style="color:red;"><?php echo $this->session->flashdata("login_msge"); ?></p>
                            <div class="form-group">
                                <label class="control-label" for="username">Email</label>
                                <input placeholder="example@gmail.com" title="Please enter you email adress" required="" value="" name="email" id="username" class="form-control" type="email">
                                <span class="help-block small">Your registered email address</span>
                            </div>
                            <div style="text-align:center;" >
                                <button class="btn btn-success btn-block" type="submit" name="forget" value="forget" >Reset password</button>
								
								<a class="btn btn-warning" href="admin/admin_login">Login</a>
								
                            </div>
                        </form>
                    </div>
                </div>
            </div>
		</div>
        <!-- /.content-wrapper forget pwd-->
		
        <!-- jQuery -->
        <script src="assets/plugins/jQuery/jquery-1.12.4.min.js" type="text/javascript"></script>
		
		
		
		
		
        <!-- bootstrap js -->
        <script src="assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    </body>
</html>