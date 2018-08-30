<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <title>Jobs</title>
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
                <h2 class="section_header">Jobs</h2>
                <p>Lot of jobs here !</p>
            </div>
        </div>
        
    </div>
</section>

<section class="color_section with_background_image">
    
        <div class="container">
            <div class="row">
                <div class="col-sm-12">

                    <h2 class="section_header text-center">Search your jobs</h2>
                    <p class="text-center">Search your jobs by entering category or location<br><br></p>

					<form action="<?php echo base_url().'index.php/Search_job';?>" method="get" enctype="multipart/form-data">
						<div class="col-sm-6">
                           <select id="kota" name= "kota" class = "form-control" style="border: 1px solid #CCC; margin: 10px 0px; padding: 10px; width:100%; height: auto; background-color: #FFFFFF; color:black" required>
									<?php
									echo "<option selected  disabled>Select City</option>";
										foreach($kota["tampil"]->result() as $u)
										{
											echo "<option  value='$u->id'>$u->kota</option>";
										} 
										?>
							</select>
						
						</div>
						<div class="col-sm-6">
							<select id="kategori" name= "kategori" class = "form-control" style="border: 1px solid #CCC; margin: 10px 0px; padding: 10px; width:100%; height: auto; background-color: #FFFFFF; color:black" required>
										<?php
										echo "<option selected  disabled>Select Category</option>";
									
										?>
							</select>
						</div>
						
						
						 <p class="text-center"><br><br><br><button type="submit" class="theme_button"><i class="rt-icon-search2"></i>Search the jobs </button><p>
					</form>
			
               
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
				 <form  class="form-horizontal" method="POST" role="form" action="<?php echo base_url('index.php/Jobs/bookmark'); ?>">
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
                                <button type="submit" class="theme_button"><i class="rt-icon-bookmark2"></i> Add to Bookmark</button>
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
	
	<?php if($this->session->flashdata('bookmark_tambah')){ ?>
	<script>
	$(document).ready(function(){
       swal('Succeeded !',
			  'This item has been added from your bookmark',
			  'success');
    });
	</script>
	<?php } ?>
	
	<?php if($this->session->flashdata('bookmark_sudah_ada')){ ?>
	<script>
	$(document).ready(function(){
       swal('Error !',
			  'This item is already on your bookmark',
			  'error');
    });
	</script>
	<?php } ?>
	
	<script>
		$(document).ready(function(){
			$("#kota").change(function(){
			var id_kota		= $("#kota").val();
			  $.ajax({
					type: "POST",
					url: "<?php echo base_url('index.php/Jobs/sinkron_city_category'); ?>",
					data: { 
						id_kota: id_kota, // < note use of 'this' here
						//access_token: $("#access_token").val() 
					},
					success: function(result) {
						$("#kategori").html('');
						$("#kategori").append(result);
					},
					error: function(result) {
						alert('error');
					}
				});
			});
			
		})
	</script>

    </body>
</html>