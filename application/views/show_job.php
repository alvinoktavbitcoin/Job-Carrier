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

<section id="breadcrumbs" class="light_section with_bottom_border">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb">
                        <li>
                            <a href="<?php echo base_url();?>index.php/Home">Home</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>index.php/Jobs">Jobs</a>
                        </li>
                        <li>
                           Job Detail</a>
                        </li>
                    </ol>
                </div>
                
            </div>
        </div>
    </section>
	
<section id="content" class="light_section blog-single right-sidebar">
    <div class="container">
        <div class="row">
		<?php
		foreach($lowongan["tampil"]->result() as $u)
		{
		?>
                
            <!-- content -->
            <div class="col-sm-12">
                <article class="post type-post">
                    <header class="entry-header">
						 
                        <!-- .entry-meta --> 
						<div class="col-sm-6">
							<div class="entry-thumbnail">
								<!-- .Gambar-->
								<img src="<?php echo $u->logo?>" style='border:3px solid #000000;width:500px;height:285px;'>
							</div>
						</div>
						
						<div class="col-sm-6">
							<!-- .Judul-->
							<h1 class="entry-title" style="color:Red;"><?php echo $u->job_title?></h1>
						
							<!-- .Perusahaan-->
							<div class="entry-meta">
								In
								<span class="author">
									<a rel="author"><?php echo $u->nama_perusahaan?></a>
								</span>
							</div>
						
							<!-- .Kota-->
							<h1 style="color:Blue; font-family: Arial;"> <?php echo $u->nama_kota?></h1>
							
							<!-- .Kategoru-->
							<div class="entry-meta">
								<h1 style="color:green; font-family: Arial; "> ( <b> <?php echo $u->nama_kategori?></b> )</h1> 
							</div>
						</div>
						
                    </header>
                    <!-- .entry-header -->
			</div>
			
			  <ul class="nav nav-tabs" role="tablist" >
				<li role="presentation" class="active" style="width:50%;text-align:center;font-size:200%"><a href="#ringkasan" aria-controls="ringkasan" role="tab" data-toggle="tab">Summary</a></li>
				<li role="presentation" style="width:50%;text-align:center;font-size:200%"><a href="#ulasan" aria-controls="ulasan" role="tab" data-toggle="tab">Reviews</a></li>
			  </ul>
			
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane fade in active" id="ringkasan">
		
						<div class="entry-meta">
							<div class = "row">
								<div class="col-sm-3">
									<b>Company Rating </b>
								</div>
								
								<div class="col-sm-1">
									<b>: </b>
								</div>
								
								<div class="col-sm-3">
									<div class="rating" data-score="<?php echo $u->rating_perusahaan?>"></div> 
								</div>
								
								<div class="col-sm-1">
									<b> <?php echo $u->rating_perusahaan?>  </b>
								</div>
							</div>
                        </div>
						
						<div class="entry-meta">
							<div class = "row">
								<div class="col-sm-3">
									<b>Culture and values </b>
								</div>
								
								<div class="col-sm-1">
									<b>: </b>
								</div>
								
								<div class="col-sm-3">
									<div class="rating" data-score="<?php echo $u->cultureandvalues?>"></div> 
								</div>
								
								<div class="col-sm-1">
									<b> <?php echo $u->cultureandvalues?>  </b>
								</div>
							</div>
                        </div>
						
						<div class="entry-meta">
							<div class = "row">
								<div class="col-sm-3">
									<b>Senior Leadership </b>
								</div>
								
								<div class="col-sm-1">
									<b>: </b>
								</div>
								
								<div class="col-sm-3">
									<div class="rating" data-score="<?php echo $u->seniorleadership?>"></div> 
								</div>
								
								<div class="col-sm-1">
									<b> <?php echo $u->seniorleadership?>  </b>
								</div>
							</div>
                        </div>
						
						<div class="entry-meta">
							<div class = "row">
								<div class="col-sm-3">
									<b>Compensation and Benefit </b>
								</div>
								
								<div class="col-sm-1">
									<b>: </b>
								</div>
								
								<div class="col-sm-3">
									<div class="rating" data-score="<?php echo $u->compensationandbenefit?>"></div> 
								</div>
								
								<div class="col-sm-1">
									<b> <?php echo $u->compensationandbenefit?>  </b>
								</div>
							</div>
                        </div>
						
						<div class="entry-meta">
							<div class = "row">
								<div class="col-sm-3">
									<b>Carrier Opportunities Rating </b>
								</div>
								
								<div class="col-sm-1">
									<b>: </b>
								</div>
								
								<div class="col-sm-3">
									<div class="rating" data-score="<?php echo $u->carrieropportunities?>"></div> 
								</div>
								
								<div class="col-sm-1">
									<b> <?php echo $u->carrieropportunities?>  </b>
								</div>
							</div>
                        </div>
						
						<div class="entry-meta">
							<div class = "row">
								<div class="col-sm-3">
									<b>Work Life Balance Rating </b>
								</div>
								
								<div class="col-sm-1">
									<b>: </b>
								</div>
								
								<div class="col-sm-3">
									<div class="rating" data-score="<?php echo $u->worklifebalancerating?>"></div> 
								</div>
								
								<div class="col-sm-1">
									<b> <?php echo $u->worklifebalancerating?>  </b>
								</div>
							</div>
                        </div>
						
						<div class="entry-meta">
							<div class = "row">
								<div class="col-sm-3">
									<b>Recommend </b>
								</div>
								
								<div class="col-sm-1">
									<b>: </b>
								</div>
								
								<div class="col-sm-3">
									<b><?php echo $u->rekomen?> % </b>
								</div>
						
							</div>
                        </div>
				
						
						
						<div class="entry-meta">
                            <b>Description  </b> <br> <?php echo $u->description?>
                        </div>
						
						<div class="entry-meta">
                            <b>Qualification  </b> <br> <?php echo $u->qualification?>
                        </div>
						
                        
					</div>
			
			<div role="tabpanel" class="tab-pane fade" id="ulasan">
			
				<h1 style="font-size:32px;">Write a review</h1>
				<form  class="form-horizontal" method="POST" role="form" action="<?php echo base_url('index.php/Show_job/kirim_review'); ?>">
					<input type="hidden" name="id_lowongan" value="<?php echo $u->id?>">
					<textarea id = "text_review" class="form-control" rows="5" name="review" placeholder="Write your review" style="margin-bottom:5px;" required></textarea>
					<button type="submit" class="theme_button"><i class="rt-icon-pencil4"></i> Send my review</button>
				</form>
                
				<div class="entry-meta">
						<h1 style="font-size:32px;">Reviews</h1>
						
							<?php
							foreach($komen["tampil"]->result() as $u)
							{
							?>
									<i class="rt-icon-user2"><font style="font-size:24px; color:red;">   <?php echo $u->username?><br></font></i>
				
									<?php echo $u->comment?><br><br>
							<?php
							} 
							?> 
						
				</div>
				
			</div>
			
			</div>
			
                    <!-- .entry-content -->
                </article>
            </div>
            <!-- eof content -->

        <?php
					} 
		?> 
        </div>
    </div>
</section>	





   

	<?php 
	echo $footer; 
	echo $script;
	?>
	
	<script>
	$(document).ready(function(){
		$('.rating').raty({
			score: function() {
				return $(this).attr('data-score');
			},
			path : "<?php echo base_url();?>/assets",
			readOnly:  true,
			noRatedMsg:"Not rated yet!"
		});
	})
	</script>
	
	<script> 
      
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
  e.target // newly activated tab
  e.relatedTarget // previous active tab
})
}); 
    </script>
	
	<?php if($this->session->flashdata('review gagal')){ ?>
	<script>
	$(document).ready(function(){
       swal('Error !',
			  'You have to login first to give a review',
			  'error');
    });
	</script>
	<?php } ?>
	
	<?php if($this->session->flashdata('review berhasil')){ ?>
	<script>
	$(document).ready(function(){
       swal('Succeeded !',
			  'Your review has been sent',
			  'success');
    });
	</script>
	<?php } ?>

								

    </body>
</html>