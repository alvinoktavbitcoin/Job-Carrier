<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <title>Contact Us</title>
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
                <h2 class="section_header">Contact Us</h2>
                <p>If you have critics and inquires for us  then you can contact us using the form below. We appreciate your message to make our website better than before.</p>
            </div>
        </div>
        
        <div class="row">
            <div class="widget col-sm-6 to_animate">
                <form class="" method="post" action="<?php echo base_url();?>index.php/Contact/kirim_pesan">
                    <p class="contact-form-subject">
                        <label for="subject">Subject <span class="required">*</span></label>
                        <input type="text" aria-required="true" size="30" value="" name="subject" id="subject" class="form-control" placeholder="Subject">
                    </p>
					<p><?php echo form_error('subject');?></p>
                    <p class="contact-form-message">
                        <label for="message">Message<span class="required">*</span></label>
                        <textarea aria-required="true" rows="8" cols="45" name="message" id="message" class="form-control" placeholder="Message"></textarea>
                    </p>
					<p><?php echo form_error('message');?></p>
                    <p class="contact-form-submit vertical-margin-40">
                        <!-- <input type="submit" value="Send" id="contact_form_submit" name="contact_submit" class="theme_button"> -->
                        <button type="submit" id="contact_form_submit" name="contact_submit" class="theme_button"><i class="rt-icon-sent"></i> Send!</button>
                    </p>
					
					
                </form>
            </div>
                    

            <div class="widget widget_contact col-sm-6 to_animate">
                <h3>Contact Info</h3>
                <!--<p>Suspendisse pulvinar, augue ac venenatis condimentum, sem libero volutpat nibh, nec pellentesque velit pede quis nunc. Integer ante arcu, accumsan a, consectetuer eget, posuere ut, mauris. In ac felis quis tortor malesuada pretium. In hac habitasse platea dictumst curabitur nisi hac habitasse platea dictumst maecenas nec odio et ante tincidunt tempus morbi ac felis.
                <br><br>-->
                    <i class="rt-icon-device-phone"></i><strong>Phone:</strong> 0878 9928 1925
                </p>
                <p>
                    <i class="rt-icon-pencil"></i><strong>Email:</strong> alvin.oktavianus@student.umn.ac.id
                </p>
                <p>
                    <i class="rt-icon-globe-outline"></i><strong>Website: </strong><a href="Home">umnskripsi.com/Skripsi</a>
                </p>
                <p>
                    <i class="rt-icon-location-arrow-outline"></i><strong>Address:</strong> Cluster Newton Barat 2 No 39 Gading Serpong
                </p>

            </div>
        </div>
		
		<div class="row">
            <div class="col-sm-12 text-center">
                  <iframe width="100%" height="500px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="							
https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d15864.12752443746!2d106.61145889999999!3d-6.259530900000001!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sid!4v1444396547350" ></iframe>
            </div>
        </div>
    </div>
</section>


   

	<?php 
	echo $footer; 
	echo $script;
	?>
	
	<?php if($this->session->flashdata('kontak_terkirim')){ ?>
	<script>
	$(document).ready(function(){
       swal('Succeeded !',
			  'Your message has been sent',
			  'success');
    });
	</script>
	<?php } ?>

    </body>
</html>