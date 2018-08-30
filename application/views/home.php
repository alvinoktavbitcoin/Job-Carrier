<?php
//header("access-control-allow-origin: *");
//defined('BASEPATH') OR exit('No direct script access allowed');

?>

<!DOCTYPE html>

<html class="no-js">
<head>
    <title>Home</title>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

    <?php echo $style;?>

</head>
<body>
<?php echo $header;?>
<section class="light_section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h2 class="section_header to_animate">Welcome To <span class="highlight">Job Carriers</span></h2>
                <p class="to_animate">Job Recommendation Just For You</p>
				<br>
				<br>
				 <!--<input id="myinput" class="awesome form-control h50" name="placeinput" placeholder="tes" style="border-radius: 10; autocomplete:off aria-autocomplete:list" type="text">-->
				<div class = "row">
				<form action="<?php echo base_url().'index.php/Job_search';?>" method="get" enctype="multipart/form-data">
					<div class=" col-sm-offset-2 col-sm-6">
						<input id="myinput" class="form-control" name="jobinput" placeholder="Start typing to search" style="width:100%; height:50px; autocomplete:off; aria-autocomplete:list" required type="text">
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

<section class="color_section with_background_image">
    
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
					<h2 class="section_header text-center">Everything About Jobs</h2>
						<div class="entry-thumbnail col-sm-6">
                            <img width = "600" height="670"src = "<?php echo base_url();?>assets/assets_user/img/job.jpg">
                        </div>
						
                        <div class="col-sm-6">
                            The most common way people give up their power is by thinking they don’t have any. (Alice Warker)
							<br><br>If you don’t feel it, flee from it. Go where you are celebrated, not merely tolerated. (Paul F. Davis)
							<br><br>Find out what you like doing best, and get someone to pay you for doing it. (Katharine Whitehorn)
							<br><br>The future depends on what you do today. (Mahatma Gandhi)
							<br><br>I am not a product of my circumstances. I am a product of my decisions. (Stephen Covey)
							<br><br>Start by doing what is necessary, then what is possible, and suddenly you are doing the impossible. (Francis of Assisi)
							<br><br>Style is knowing who you are, what you want to say, and not giving a damn. (Gore Vidal)
							<br><br>There is no passion to be found playing small—in settling for a life that is less than the one you are capable of living. (Nelson Mandela)
							<br><br>If you’re offered a seat on a rocket ship, don’t ask what seat! Just get on.  (Sheryl Sandberg)
							<br><br>Without leaps of imagination or dreaming, we lose the excitement of possibilities. Dreaming, after all is a form of planning. (Gloria Steinem.)
						
				</div>
            </div>
        </div>
    
</section>

<section id="content" class="light_section blog left-sidebar">
	<div class="container">
		<div class="row" align="center">
			<p> <iframe width="1150" height="650" src="https://www.youtube.com/embed/ajRj0hMqX6k" frameborder="0" allowfullscreen></iframe>
				</p>
		</div>
	</div>
</section>


    <?php 
        echo $footer; 
        echo $script;
    ?>
    
	<?php if($this->session->flashdata('register_berhasil')){ ?>
	<script>
	$(document).ready(function(){
       swal('Succeeded !',
			  'Your register is success, you can login with that account now ',
			  'success');
    });
	</script>
<?php } ?>

<?php if($this->session->flashdata('login_berhasil')){ ?>
	<script>
	$(document).ready(function(){
       swal('Succeeded !',
			  'You have logged in succesfully',
			  'success');
    });
	</script>
	<?php } ?>
	
	<?php if($this->session->flashdata('ganti_sukses')){ ?>
	<script>
	$(document).ready(function(){
       swal('Succeeded !',
			  'Your password has been updated',
			  'success');
    });
	</script>
	<?php } ?>
	
    </body>
</html>