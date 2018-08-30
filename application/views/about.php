<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <title>About</title>
    <meta charset="utf-8">
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <![endif]-->
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

    <?php echo $style;?>
	
    <!--[if lt IE 9]>
        <script src="<?php echo base_url();?>assets/js/vendor/html5shiv.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/vendor/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<?php echo $header;?>

<section id="content" class="light_section">
    <div class="container">
        <div class="row">
		
		  <div class="col-sm-12 text-center">
                <h2 class="section_header">About Us</h2>
                <p>Job Carriers</p>
            </div>
		
            <!-- main content -->
            <div class="col-sm-12 col-md-12 col-lg-12">
				  <article class="post format-small-image">
                    <div class="row">
                        <div class="entry-thumbnail col-sm-6">
                            <img width = "600" height="280"src = "<?php echo base_url();?>assets/assets_user/img/jorge.jpg">
                        </div>
                        <div class="col-sm-6">
                            &nbsp &nbsp &nbsp Job carrier is a web based recommendation system that have a goal to give job recommendation to users who search the best job that fit to them. This Application is built by Alvin Oktavianus using Simple Additive Weighting(S.A.W) Algorithm in doing a calculation to give the result of recommendation. 
							<br>&nbsp &nbsp &nbsp Job Carrier get the data from Glassdoor API and use job's data from glassdoor in doing a calculation. This application also use user's input data to adjust calculation with user's preference in choosing a job.
							<br>&nbsp &nbsp &nbsp This Application is built in order to get Computer Bachelor in Multimedia Nusantara University. At the period of building this system, student is mentored by Seng Han Sun as the lecturer mentor. 
							<br>&nbsp &nbsp &nbsp Job Carrier has been built well and manage to do a calculation using Simple Additive Weighting Algorithm and user's data to give the result of job recommendation.
                        </div>
						
                    </div>
                </article>
	
				
                <!-- .post --> 
			</div> <!--eof col-sm-9 (main content)-->
			
        </div>
    </div>
</section>

<section class="color_section with_background_image">
    
        <div class="container">
            <div class="row">
                <div class="col-sm-12">

                    <h2 class="section_header text-center">Our Team</h2>
                    <p class="text-center">Here is the people who have a role in this application</p>
                    
                    <div id="related-gallery-items-carousel" class="owl-carousel">

                        <div class="gallery-item development">
                            <div class="gallery-image">
                                <img width="381" height="350" src="<?php echo base_url();?>assets/assets_user/img/hansun.jpg">  
                            </div>
                            <div class="gallery-item-description">
                                <h3><br><br><br><br>Seng Han Sun</a></h3>
                                <p>As the lecturer who mentoring the student in building this application </p>
                            </div>
                        </div>

                       <div class="gallery-item development">
                            <div class="gallery-image">
                                <img width="381" height="350" src="<?php echo base_url();?>assets/assets_user/img/fd.jpg">  
                            </div>
                            <div class="gallery-item-description">
                                <h3><br><br><br><br>Alvin Oktavianus</h3>
                                <p>As the person who plan and build the application</p>
                            </div>
                        </div>
						
						<div class="gallery-item development">
                            <div class="gallery-image">
                                <img width="381" height="350" src="<?php echo base_url();?>assets/assets_user/img/UMN.jpg">  
                            </div>
                            <div class="gallery-item-description">
                                <h3><br><br><br><br>Multimedia Nusantara University</h3>
                                <p>As the university who gives the student so much lesson and skill in IT Programming</p>
                            </div>
                        </div>
                       
                    </div>

                </div>
            </div>
			
			
		</div>
		
</section>

<section id="content" class="light_section">
    <div class="container">
        <div class="row">
				<h2 class="section_header text-center">Credits to</h2>
                 <p class="text-center">Also this system got a help from</p>

				<div class="col-sm-12">
                   <div class="entry-thumbnail col-sm-4">
                          <img width="400" height="450" src="<?php echo base_url();?>assets/assets_user/img/glassdoor1.png">  
							<h2>Glassdoor API</h2>
                    </div>
					
					<div class="entry-thumbnail col-sm-4">
                         <img width="400" height="450" src="<?php echo base_url();?>assets/assets_user/img/codeigniter.jpg">  
						 
						 <h3>CodeIgniter Version 3.0.3</h3>
                    </div>
					
					<div class="entry-thumbnail col-sm-4">
                          <img width="400" height="450" src="<?php echo base_url();?>assets/assets_user/img/notepad.jpg">  
							<h3>Notepad++</h3>
                    </div>
					
                </div>
				
				<div class="col-sm-12">
                   <div class="entry-thumbnail col-sm-4">
                          <img width="400" height="450" src="<?php echo base_url();?>assets/assets_user/img/NPhtLs1aHlQDiVag3Q.jpg">  
							<h3>Nice Admin Template</h3>
                    </div>
					
					<div class="entry-thumbnail col-sm-4">
                          <img width="400" height="450" src="<?php echo base_url();?>assets/assets_user/img/bootstrap.png">  
							<h3>Bootstrap</h3>
                    </div>
					
					
					<div class="entry-thumbnail col-sm-4">
                         <img width="400" height="450" src="<?php echo base_url();?>assets/assets_user/img/SAW.png">  
						 <br>
						 <h3>Simple Additive Weighting Algorithm</h3>
                    </div>
					
                </div>
            </div>
    </div>
</section>








    

	<?php echo $footer; echo $script;?>

    </body>
</html>