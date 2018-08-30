<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>

    <title>User_profile</title>
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
                <h2 class="section_header">Profile</h2>

            </div>
        </div>
        
         <div class="row">
		<?php
		foreach($user_sekarang["tampil"]->result() as $u)
		{
		?>
            <div class="col-sm-10 col-sm-push-1">
                <form  class="form-horizontal" method="POST" role="form" action="<?php echo base_url().'index.php/Edit_profile';?>">
				
                    <div class="form-group">
                        <label class="col-sm-3 control-label">First Name
                            <abbr class="required" title="required"> : </abbr>
                        </label>
                        <div class="col-sm-9">
                            <label for="cname" class="control-label col-lg-9" style="text-align:left;"><?php echo $u->first_name ?></label>

                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="col-sm-3 control-label">Last Name
                            <abbr class="required" title="required"> : </abbr>
                        </label>
                        <div class="col-sm-9">
                            <label for="cname" class="control-label col-lg-9" style="text-align:left;"><?php echo $u->last_name ?></label>

                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="col-sm-3 control-label">Email
                            <abbr class="required" title="required"> : </abbr>
                        </label>
                        <div class="col-sm-9">
                            <label for="cname" class="control-label col-lg-9" style="text-align:left;"><?php echo $u->email ?></label>
	
                        </div>
                    </div>
					
					<div class="form-group">
                        <label  class="col-sm-3 control-label">Company Rating
                            <abbr class="required" title="required">:</abbr>
                        </label>
                        <div class="col-sm-9">
                            <label for="cname" class="control-label col-lg-9" style="text-align:left;"><?php echo $u->rating_perusahaan ?></label>
     
                        </div>
                    </div>
					
					<div class="form-group">
                        <label  class="col-sm-3 control-label">Culture and Values
                            <abbr class="required" title="required">:</abbr>
                        </label>
                        <div class="col-sm-9">
                             <label for="cname" class="control-label col-lg-9" style="text-align:left;"><?php echo $u->cultureandvalues ?></label>

                        </div>
                    </div>
					
					<div class="form-group">
                        <label  class="col-sm-3 control-label">Senior Leadership
                            <abbr class="required" title="required">:</abbr>
                        </label>
                        <div class="col-sm-9">
                            <label for="cname" class="control-label col-lg-9" style="text-align:left;"><?php echo $u->seniorleadership ?></label>

                        </div>
                    </div>
					
					<div class="form-group">
                        <label  class="col-sm-3 control-label">Compensation and Benefit
                            <abbr class="required" title="required">:</abbr>
                        </label>
                        <div class="col-sm-9">
                            <label for="cname" class="control-label col-lg-9" style="text-align:left;"><?php echo $u->compensationandbenefit ?></label>
      
                        </div>
                    </div>
					
					<div class="form-group">
                        <label  class="col-sm-3 control-label">Carrier Opportunities
                            <abbr class="required" title="required">:</abbr>
                        </label>
                        <div class="col-sm-9">
                            <label for="cname" class="control-label col-lg-9" style="text-align:left;"><?php echo $u->carrieropportunities?></label>

                        </div>
                    </div>
					
					<div class="form-group">
                        <label  class="col-sm-3 control-label">Work Life Balance
                            <abbr class="required" title="required">:</abbr>
                        </label>
                        <div class="col-sm-9">
                           <label for="cname" class="control-label col-lg-9" style="text-align:left;"><?php echo $u->worklifebalancerating ?></label>
                        </div>
                    </div>
					
					<div class="form-group">
                        <label  class="col-sm-3 control-label">Recommend
                            <abbr class="required" title="required">:</abbr>
                        </label>
                        <div class="col-sm-9">
                            <label for="cname" class="control-label col-lg-9" style="text-align:left;"><?php echo $u->rekomen ?></label>

                        </div>
                    </div>
					
					<div  class="form-group">
                        <label class="col-sm-3 control-label">User Name 
                            <abbr class="required" title="required"> : </abbr>
                        </label>
                        <div class="col-sm-9">
                          <label for="cname" class="control-label col-lg-9" style="text-align:left;"><?php echo $u->username ?></label>

                        </div>
                    </div>
					
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Password 
                            <abbr class="required" title="required"> : </abbr>
                        </label>
                        <div class="col-sm-9">
                            <label for="cname" class="control-label col-lg-9" style="text-align:left;">* * * * *</label>
		
                        </div>
                    </div>
				
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                            <button type ="submit" class="theme_button"><i class="rt-icon-pencil"></i> Edit Profile</button>
							<a href="<?php echo base_url().'index.php/Change_password'?>"><button type="button" class="theme_button"><i class="rt-icon-uniF756"></i> Change Password</button></a>
                        </div>
                    </div>
                </form>
            </div>
			 <?php
					} 
			 ?> 
        </div>
</section>


   

	<?php 
	echo $footer; 
	echo $script;
	?>
	
	<!-- Validation Number JavaScript -->
	<script>
	$(document).ready(function() {
    $(".txtboxToFilter").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl/cmd+A
            (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
             // Allow: Ctrl/cmd+C
            (e.keyCode == 67 && (e.ctrlKey === true || e.metaKey === true)) ||
             // Allow: Ctrl/cmd+X
            (e.keyCode == 88 && (e.ctrlKey === true || e.metaKey === true)) ||
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) 
{
            e.preventDefault();
        }
    });
});
</script>

<?php if($this->session->flashdata('profile_udah_diupdate')){ ?>
	<script>
	$(document).ready(function(){
       swal('Succeeded !',
			  'Your Profile has been updated',
			  'success');
    });
	</script>
<?php } ?>

<?php if($this->session->flashdata('password_udah_diupdate')){ ?>
	<script>
	$(document).ready(function(){
       swal('Succeeded !',
			  'Your Password has been updated',
			  'success');
    });
	</script>
<?php } ?>

    </body>
</html>