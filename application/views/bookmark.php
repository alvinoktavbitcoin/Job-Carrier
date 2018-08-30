<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <title>Bookmark</title>
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
                <h2 class="section_header">Bookmark</h2>
                
            </div>
        </div>
        
    </div>
</section>

<section class="color_section with_background_image">
    
        <div class="container">
            <div class="row">
                <div class="col-sm-12">

                    <h2 class="section_header text-center">Edit your bookmark</h2>
                    <p class="text-center">You can remove any item from your bookmark list</p>
                    
               
                </div>
            </div>
        </div>
    
</section>

<section id="content" class="light_section blog left-sidebar">
    <div class="container">
        <div class="row">
            <!-- main content -->
            <div class="col-sm-12 col-md-12 col-lg-12">
				
				<?php
					$no =$page+1;
					foreach($lowongan["tampil"]->result() as $u)
					{
				?>
				
				 <form  class="form-horizontal" method="POST" role="form" action="<?php echo base_url('index.php/Bookmark/hapus_bookmark'); ?>">
				  <article class="post format-small-image">
				   <input type="hidden" class="form-control " name="username" value="<?php echo $this->session->userdata('username')?>">
				   <input type="hidden" class="form-control " name="id" value="<?php echo $u->id?>">
                    <div class="row">
                        <div class="entry-thumbnail col-sm-5">
                            <img alt="" src="<?php echo $u->logo?>">
                        </div>
                        <div class="col-sm-7">
                            <header class="entry-header">
                                <h2 class="entry-title">
                                    <a href="<?php echo base_url().'index.php/Show_job?id='.$u->id.'';?>"><?php echo $u->job_title?></a>
					
                                </h2>
                                <div class="entry-meta">
                                   In
                                    <span class="author">
                                        <a rel="author"><?php echo $u->nama_perusahaan?></a>
                                    </span> 
                                    
                                </div>
                                <!-- .entry-meta --> 
                            </header>
                            <!-- .entry-header -->
                            <div class="entry-content">
								<p>Category  : <?php echo $u->nama_kategori?> </p>
								<p>City : <?php echo $u->nama_kota?> </p>
                                <p>Rating : <?php echo $u->rating_perusahaan?> </p>
                                
                            </div>
                            <!-- .entry-content -->
                            <div class="entry-tags">
								<?php if($this->session->userdata('status_web') == "user_login" ) 
								{
								?> 
                                <button type="submit" class="theme_button"><i class="rt-icon-trashcan"></i> Remove from my bookmark</button>
								<?php
								}
								?> 
                                <span class="readmore pull-right">
                                    <a href="<?php echo base_url().'index.php/Show_job?id='.$u->id.'';?>">Read More...</a>
                                </span>
								<br><br><br><br>
                            </div>
                        </div>
						
                    </div>
                </article>
				</form>
				<?php
					$no++;
					} 
				?> 
                <!-- .post --> 
			</div> <!--eof col-sm-9 (main content)-->
			<div class="col-sm-12 text-center">
			<?php
					echo $paginator;
				?> 
			</div>
        </div>
    </div>
</section>


	<?php 
	echo $footer; 
	echo $script;
	?>
	
	<?php if($this->session->flashdata('bookmark_hapus')){ ?>
	<script>
	$(document).ready(function(){
       swal('Succeeded !',
			  'This item has been removed from your bookmark',
			  'success');
    });
	</script>
	<?php } ?>
	
    </body>
</html>