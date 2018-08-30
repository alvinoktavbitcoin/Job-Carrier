<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Login Admin</title>

    <!-- Bootstrap CSS -->    
    <link href="<?php echo base_url();?>/assets/NiceAdmin/css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="<?php echo base_url();?>/assets/NiceAdmin/css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="<?php echo base_url();?>/assets/NiceAdmin/css/elegant-icons-style.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>/assets/NiceAdmin/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="<?php echo base_url();?>/assets/NiceAdmin/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url();?>/assets/NiceAdmin/css/style-responsive.css" rel="stylesheet" />
	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/sweetalert-master/dist/sweetalert.css"/>
	
	

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

  <body class="login-img3-body">

    <div class="container">

      <form class="login-form" role="form" method="POST" action="<?php echo base_url('index.php/Admin_login/login'); ?>">    
        <div class="login-wrap">
            <p class="login-img"><i class="icon_lock_alt"></i></p>
            <div class="input-group">
              <span class="input-group-addon"><i class="icon_profile"></i></span>
              <input type="text" class="form-control" name="username" placeholder="Username" autofocus>
            </div>
			
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
		
            <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
      
        </div>
      </form>
    <div class="text-right">
            <div class="credits">
                <!-- 
                    All the links in the footer should remain intact. 
                    You can delete the links only if you purchased the pro version.
                    Licensing information: https://bootstrapmade.com/license/
                    Purchase the pro version form: https://bootstrapmade.com/buy/?theme=NiceAdmin
                -->
                <a href="https://bootstrapmade.com/free-business-bootstrap-themes-website-templates/">Business Bootstrap Themes</a> by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>
    </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/sweetalert-master/dist/sweetalert.min.js"></script>

	<?php if($this->session->flashdata('login_salah')){ ?>
	<script>
	$(document).ready(function(){
       swal('Error !',
			  'Your ID and password are invalid',
			  'error');
    });
	</script>
	<?php } ?>
  </body>
</html>
