<div id="box_wrapper">
	<section id="topline" class="grey_section">
        <div class="container">
            <div class="row">
                <div class="col-sm-5">
                    <span>
                        <i class="fa fa-envelope-o"></i> alvin.oktavianus@student.umn.ac.id</a>
                    </span>
                    <span>
                        <i class="fa fa-phone"></i> 0878 9928 1925
                    </span>
                </div>
				
                <div class="col-sm-57text-right">
                   
                     <span>
                        <i class="rt-icon-user2"></i>
                        <?php
                            if($this->session->userdata('username') && $this->session->userdata('role') == "user"){
                                echo '<a href="'.base_url('index.php/User_profile').'">'.$this->session->userdata('username').'</a>';    
						
                            }
                            else{
                                echo '<a href="'.base_url('index.php/Login').'">Login</a>';        
                            }
                        ?>
                                        
                    </span>
                    <span>
                        <i class="rt-icon-locked"></i> 
                        <?php
                            if($this->session->userdata('username') && $this->session->userdata('role')== "user"){
                                echo '<a href="'.base_url('index.php/Login/logout').'"> Logout</a>';
                                
                            }
                            else{
                                echo '<a href="'.base_url('index.php/Register').'"> Register</a>';
                            }
                        ?>
                    </span>
					
                </div>
                
            </div>
        </div>
    </section>

    <section id="mainslider" class="dark_section">
        <div class="slider-wrapper">
            <div class="responisve-container">
                <div class="slider">
                    <div class="fs_loader"></div>
                    <div class="slide">
                        <img    
                                data-in="fade"
                                data-out="fade"
                                src="<?php echo base_url();?>assets/assets_user/example/slide1.jpg"
                                width="1920" height="700">
                        
                        <!--<p      class="big"  
                                data-position="170,1130" data-in="bottom" data-step="0" data-delay="500"><span class="highlight">Apa</span></p>        
                        <p      class=""  
                                data-position="250,945" data-in="bottom" data-step="0" data-delay="1000"><span class="highlight">Itu</span></p>    -->
                        <p      class=""  
                                data-position="354,1150" data-in="bottom" data-step="0" data-delay="500"><span class="highlight">Do you search for a job ?</span></p>

                    </div>

                    <div class="slide" data-in="slideLeft">
                        <img    
                                data-in="fade"
                                data-out="fade"
                                src="<?php echo base_url();?>assets/assets_user/example/slide2.jpg"
                                width="1920" height="700">
                        <!--<p      class=""  
                                data-position="250,1108" data-in="top" data-step="0" data-delay="1000"><i class="rt-icon-cart"></i> <span class="highlight">Delivery</span></p> -->
                              
 
                        <p      class="light"  
                                data-position="354,1024" data-in="top" data-step="0" data-delay="500"><a href="#"><!--<i class="rt-icon-cart"></i>-->Find your job here</a></p>

                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="topinfo" class="action_section table_section light_section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <img src="<?php echo base_url();?>assets/assets_user/example/logo.png"/>
                    <!--<a href="<?php echo base_url();?>assets/assets_user/assets_user/./" class="navbar-brand"><i class="rt-icon-cart"></i> M<span>SHOP</span></a>-->
                </div>
				
				

               
            </div>
        </div>
    </section>

    <header id="header">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <span id="toggle_mobile_menu"></span>
                    <nav id="mainmenu_wrapper">
                        <ul id="mainmenu" class="nav nav-justified sf-menu">
							<li class = "<?php if((isset($page) && $page == "home")) echo "active";?>">
                                <a href="<?php echo base_url();?>index.php/Home"><i class="rt-icon-home"></i> Home</a>
                            </li>
                                                    
                        
                            <li class = "<?php if((isset($page) && $page == "jobs")) echo "active";?>">
                                <a href="<?php echo base_url();?>index.php/Jobs"><i class="rt-icon-list"></i> Jobs</a>
                            </li>
							
							<li class = "<?php if((isset($page) && $page == "bookmark")) echo "active";?>">
                                <a href="<?php echo base_url();?>index.php/Bookmark"><i class="rt-icon-bookmark"></i> Bookmark</a>
                            </li>
							
							<li class = "<?php if((isset($page) && $page == "help")) echo "active";?>">
                                <a href="<?php echo base_url();?>index.php/Help"><i class="rt-icon-chat-alt-stroke"></i> Help</a>
                            </li>
							
							<li class = "<?php if((isset($page) && $page == "about")) echo "active";?>">
                                <a href="<?php echo base_url();?>index.php/About"><i class="rt-icon-user2"></i> About</a>
                            </li>
							
							<li class = "<?php if((isset($page) && $page == "contact")) echo "active";?>">
                                <a href="<?php echo base_url();?>index.php/Contact"><i class="rt-icon-contacts"></i> Contact Us</a>
                            </li>
                        </ul>  
                    </nav>
                
                </div>
            </div>
        </div>
    </header>
	
	 <?php
    if(($this->session->flashdata('force_login'))){
        echo '<script>';
        echo '
         $(document).ready(function(){
                $("#loginModal").modal("show");
         });';
        echo '</script>';
    }
    ?>
	
	


