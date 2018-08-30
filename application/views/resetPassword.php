<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <title>Reset Password</title>
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
                <h2 class="section_header">Reset Password</h2>
              
            </div>
        </div>
        
         <div class="row">

            <div class="col-sm-10 col-sm-push-1">
                <form  class="form-horizontal" method="POST" role="form" action="<?php echo base_url().'index.php/Forgot_password/ganti_password';?>">

					<div class="form-group">
						 <input type="hidden" name="email" value="<?php echo $mail ?>" >
                        <label class="col-sm-3 control-label">New Password 
                            <abbr class="required" title="required"> * </abbr>
                        </label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control " name="password" placeholder="Enter password (6-25) length" required  >
						
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="col-sm-3 control-label">Confirm Password 
                            <abbr class="required" title="required"> * </abbr>
                        </label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control " name="confirm_password" placeholder="Confirm your Password" required >
							
                        </div>
                    </div>
					
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                            <button type="submit" class="theme_button"><i class="rt-icon-sent"></i> Submit</button>
							
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
	
	<?php if($this->session->flashdata('ganti_gagal')){ ?>
	<script>
	$(document).ready(function(){
       swal('Error !',
			  'Please enter a valid password and check your confirm password correctly',
			  'error');
    });
	</script>
	<?php } ?>
	
	

    </body>
</html>