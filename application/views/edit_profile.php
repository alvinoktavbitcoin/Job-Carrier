<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <title>Edit profile</title>
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
                <h2 class="section_header">Edit Profile</h2>

            </div>
        </div>
        
         <div class="row">
            <div class="col-sm-10 col-sm-push-1">
                <form  class="form-horizontal" method="POST" role="form" action="<?php echo base_url().'index.php/Edit_profile/edit_user_profile';?>">
					<?php
					foreach($user_sekarang["tampil"]->result() as $u)
					{
					?>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">First Name
                            <abbr class="required" title="required"> * </abbr>
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control " name="first_name" placeholder="Enter First Name" value="<?php echo $u->first_name ?>" required >
							 <p><?php echo form_error('name');?></p>
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="col-sm-3 control-label">Last Name
                            <abbr class="required" title="required"> * </abbr>
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control " name="last_name" placeholder="Enter Last Name" value="<?php echo $u->last_name ?>" >
							 <p><?php echo form_error('name');?></p>
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="col-sm-3 control-label">Email
                            <abbr class="required" title="required"> * </abbr>
                        </label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control " name="email" placeholder="Enter Email" value="<?php echo $u->email ?>" required >
							<p><?php echo form_error('email');?></p>
                        </div>
                    </div>
					
					<div class="form-group">
                        <label  class="col-sm-3 control-label">Company Rating
                            <abbr class="required" title="required">*</abbr>
                        </label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control txtboxToFilter" name="company_rating"  placeholder="How many % that you will consider about company rating in choosing a job ? (0-100)" value="<?php echo $u->rating_perusahaan ?>" required>
                            <p><?php echo form_error('company_rating');?></p>
                        </div>
                    </div>
					
					<div class="form-group">
                        <label  class="col-sm-3 control-label">Culture and Values
                            <abbr class="required" title="required">*</abbr>
                        </label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control txtboxToFilter" name="culture_and_values"  placeholder="How many % that you will consider about culture and values rating in choosing a job ? (0-100)" value="<?php echo $u->cultureandvalues ?>" required>
                            <p><?php echo form_error('culture_and_values');?></p>
                        </div>
                    </div>
					
					<div class="form-group">
                        <label  class="col-sm-3 control-label">Senior Leadership
                            <abbr class="required" title="required">*</abbr>
                        </label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control txtboxToFilter" name="senior_leadership"  placeholder="How many % that you will consider about senior and leadership rating in choosing a job ? (0-100)" value="<?php echo $u->seniorleadership ?>" required>
                            <p><?php echo form_error('senior_leadership');?></p>
                        </div>
                    </div>
					
					<div class="form-group">
                        <label  class="col-sm-3 control-label">Compensation and Benefit
                            <abbr class="required" title="required">*</abbr>
                        </label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control txtboxToFilter" name="compensation_and_benefit"  placeholder="How many % that you will consider about compensation and benefit rating in choosing a job ? (0-100)" value="<?php echo $u->compensationandbenefit ?>" required>
                            <p><?php echo form_error('compensation_and_benefit');?></p>
                        </div>
                    </div>
					
					<div class="form-group">
                        <label  class="col-sm-3 control-label">Carrier Opportunities
                            <abbr class="required" title="required">*</abbr>
                        </label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control txtboxToFilter" name="carrier_opportunities"  placeholder="How many % that you will consider about carrier opportunities rating in choosing a job ? (0-100)" value="<?php echo $u->carrieropportunities?>" required>
                            <p><?php echo form_error('carrier_opportunities');?></p>
                        </div>
                    </div>
					
					<div class="form-group">
                        <label  class="col-sm-3 control-label">Work Life Balance
                            <abbr class="required" title="required">*</abbr>
                        </label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control txtboxToFilter" name="work_life_balance"  placeholder="How many % that you will consider about work life balance rating in choosing a job ? (0-100)" value="<?php echo $u->worklifebalancerating ?>" required>
                            <p><?php echo form_error('work_life_balance');?></p>
                        </div>
                    </div>
					
					<div class="form-group">
                        <label  class="col-sm-3 control-label">Recommend
                            <abbr class="required" title="required">*</abbr>
                        </label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control txtboxToFilter" name="recommend"  placeholder="How many % that you will consider about Recommendation rating in choosing a job ? (0-100)" value="<?php echo $u->rekomen ?>" required>
                            <p><?php echo form_error('recommend');?></p>
                        </div>
                    </div>
					
					<div  class="form-group">
                        <label class="col-sm-3 control-label">User Name 
                            <abbr class="required" title="required"> * </abbr>
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control " name="username" placeholder="Enter username"  value="<?php echo $u->username ?>" required>
                            <p><?php echo form_error('username');?></p>
                        </div>
                    </div>
					
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                            <button type="submit" class="theme_button"><i class="rt-icon-pen"></i> Update Profile</button>
                        </div>
                    </div>
					<?php
					} 
			 ?> 
                </form>
            </div>
			
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

    </body>
</html>