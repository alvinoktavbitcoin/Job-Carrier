<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Admin Page</title>

    <!-- Bootstrap CSS -->    
    <link href="<?php echo base_url()?>assets/NiceAdmin/css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="<?php echo base_url()?>assets/NiceAdmin/css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="<?php echo base_url()?>assets/NiceAdmin/css/elegant-icons-style.css" rel="stylesheet" />
    <link href="<?php echo base_url()?>assets/NiceAdmin/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="<?php echo base_url()?>assets/NiceAdmin/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/NiceAdmin/css/style-responsive.css" rel="stylesheet" />
	 <!-- Alert -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/sweetalert-master/dist/sweetalert.css"/> 
	<link rel="shortcut icon" href="<?php echo base_url()?>/assets/assets_user/example/atas.png" rel=”icon” type=”image/ico”/>

	
	<!-- Data Tables 
	<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.0/jquery.dataTables.min.js"></script>
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">  
	-->
	
	<script type="text/javascript" charset="utf8" src="http://code.jquery.com/jquery-1.12.4.js"></script>
    <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.0/jquery.dataTables.min.js"></script>
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css"> 
	
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <script src="js/lte-ie7.js"></script>
    <![endif]-->
  </head>
		

  <body>
  <!-- container section start -->
  <section id="container" class="">

<!--header start-->
      <header class="header dark-bg">
          

            <!--logo start-->
            <a class="logo">Admin <span class="lite">Page</span></a>
            <!--logo end-->

          
            <div class="top-nav notification-row">    
				<ul class="nav pull-right top-menu">
					<li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <img alt="" src="<?php echo base_url()?>assets/NiceAdmin/img/IMG_0043kacopy.jpg">
                            </span>
                            <span class="username"><?php echo $this->session->userdata('username')?></span>
                            <b class="caret"></b>
                        </a>
						
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
								
								<li>
									<a href="<?php echo base_url()?>index.php/Admin_login/Logout"><i class="icon_key_alt"></i> Log Out</a>
								</li>
                        </ul>
                    </li>
					
                </ul>
            </div>
			
      </header>      
      <!--header end-->