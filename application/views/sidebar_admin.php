<!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">   
				   <li class = "<?php if((isset($page) && $page == "admin_users") || (isset($page) && $page == "detail_user" )) echo "sub-menu active";?>">
                      <a href="<?php echo base_url()?>index.php/Admin_users">
                          <i class="icon_profile"></i>
                          <span>Users</span>
                      </a>
                  </li>
				  
				  <li class = "<?php if((isset($page) && $page == "admin_datacompany") || (isset($page) && $page == "detail_lowongan" )) echo "sub-menu active";?>">
                      <a href="<?php echo base_url()?>index.php/Admin_datacompany">
						  <i class="icon_table"></i>
                          <span>Company</span>
                      </a>
                  </li>      
				  
                  <li class = "<?php if((isset($page) && $page == "admin_datacity")) echo "sub-menu active";?>">
                      <a href="<?php echo base_url()?>index.php/Admin_datacity">
                          <i class="icon_pin_alt"></i>
                          <span>City</span>
                      </a>
                  </li>
				  
                  <li class = "<?php if((isset($page) && $page == "admin_category") || (isset($page) && $page == "edit_category" )) echo "sub-menu active";?>">
                      <a href="<?php echo base_url()?>index.php/Admin_category">
                          <i class="icon_genius"></i>
                          <span>Category</span>
                      </a>
                  </li>
				  
				  <li class = "<?php if((isset($page) && $page == "admin_job") || (isset($page) && $page == "category_job" )) echo "sub-menu active";?>">
                      <a href="<?php echo base_url()?>index.php/Admin_job">
                          <i class="icon_piechart"></i>
                          <span>Job</span>
                      </a>
                  </li>
				  
				  
                  <li class = "<?php if((isset($page) && $page == "admin_kritik")) echo "sub-menu active";?>">                  
                      <a href="<?php echo base_url()?>index.php/Admin_kritik">
                          <i class="icon_documents_alt"></i>
                          <span>Comments</span>
                      </a>                   
                  </li>
          
              </ul>
              <!-- sidebar menu end-->