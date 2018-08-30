<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <title>Login</title>
    <meta charset="utf-8">
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <![endif]-->
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

    <?php echo $style;?>
	
    <!--[if lt IE 9]>
        <script src="<?php echo base_url();?>assets/assets_user/js/vendor/html5shiv.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/vendor/respond.min.js"></script>
    <![endif]-->

</head>

<body>
	<?php echo $header;?>

<section id="content" class="light_section">
    <div class="container">

        <div class="row">
            <div class="col-sm-12 text-center">
                <h2 class="section_header">Login</h2>
              
            </div>
        </div>
        
         <div class="row">

            <div class="col-sm-10 col-sm-push-1">
                <form  class="form-horizontal" method="POST" role="form" action="<?php echo base_url().'index.php/Login/login';?>">
					<div  class="form-group">
                        <label class="col-sm-3 control-label">User Name 
                            <abbr class="required" title="required"> : </abbr>
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control " name="username" placeholder="Enter username">
                        </div>
                    </div>
					
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Password 
                            <abbr class="required" title="required"> : </abbr>
                        </label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control " name="password" placeholder="Enter password" >
                        </div>
                    </div>
					
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                            <button type="submit" class="theme_button"><i class="rt-icon-user2"></i> Login</button>
							 <a href="<?php echo base_url().'index.php/Forgot_password'?>"><button type="button" class="theme_button"><i class="rt-icon-key-outline"></i> Forgot Password</button></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
</section>


   

	<?php 
	echo $footer; 
	echo $script;
	?>
	
	<?php if($this->session->flashdata('login_gagal')){ ?>
	<script>
	$(document).ready(function(){
       swal('Error !',
			  'Your username and password did not match',
			  'error');
    });
	</script>
	<?php } ?>

    </body>
</html>