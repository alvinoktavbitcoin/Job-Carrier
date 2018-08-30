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
                    
					<div class = "row">
						<form action="<?php echo base_url().'index.php/Job_search';?>" method="get" enctype="multipart/form-data">
							<div class=" col-sm-offset-2 col-sm-6">
								<input id="myinput" class="form-control" name="jobinput" placeholder="Start typing to search" style="width:100%; height:50px; background-color: #FFFFFF; autocomplete:on; aria-autocomplete:list; color:black;" required type="text">
							</div>
					
							<div class="col-sm-2 ">
								<button type="submit" class="theme_button"><i class="rt-icon-search4"></i> Search
							</div>
						</form>
					</div>
			
				</div>
            </div>
        </div>
    
</section>

<section id="content" class="light_section blog left-sidebar">
    <div class="container">
        <div class="row">
            <!-- main content -->
           <div class="col-sm-12 text-center">
                <h1 >There is no data matching your input</h1>
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