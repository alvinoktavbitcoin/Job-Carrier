<!--header start-->
	  <?php
		echo $header_admin;
	  ?>
	  <!--header end-->
	  
	  <!--sidebar start-->
      <?php
		echo $sidebar_admin;
	  ?>
	  <!--sidebar end-->
			  </div>
      </aside>

      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-files-o"></i> Company Detail</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
						<li><i class="fa fa-table"></i>Company</li>
						<li><i class="fa fa-files-o"></i>Detail</li>
					</ol>
				</div>
			</div>
              <!-- Form validations -->              
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Form validations
                          </header>
                          <div class="panel-body">
                              <div class="form">
                                  <div class="form-validate form-horizontal" >
								   <?php
										 foreach($lowongan["tampil"]->result() as $u)
										  {
								   ?>
                                      <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-3">ID : </label>
                                          <label for="cname" class="control-label col-lg-9" style="text-align:left;"><?php echo $u->id ?></label>
                                     </div>
									 
                                     <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-3">Company ID : </label>
                                          <label for="cname" class="control-label col-lg-9" style="text-align:left;"><?php echo $u->id_lowongan ?></label>
                                     </div>
									 
                                      <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-3">Job Title : </label>
                                          <label for="cname" class="control-label col-lg-9" style="text-align:left;"><?php echo $u->job_title ?></label>
                                     </div>
                                     
									 <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-3">Company Name : </label>
                                          <label for="cname" class="control-label col-lg-9" style="text-align:left;"><?php echo $u->nama_perusahaan ?></label>
                                     </div>
									 
                                      <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-3">Rating : </label>
                                          <label for="cname" class="control-label col-lg-9" style="text-align:left;"><?php echo $u->rating_perusahaan ?></label>
                                     </div>
									 
									 <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-3">Culture & Values Rating : </label>
                                          <label for="cname" class="control-label col-lg-9" style="text-align:left;"><?php echo $u->cultureandvalues ?></label>
                                     </div>
									 
									 <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-3">Senior Leadership Rating : </label>
                                          <label for="cname" class="control-label col-lg-9" style="text-align:left;"><?php echo $u->seniorleadership?></label>
                                     </div>
									 
                                     <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-3">Compensation & Benefit Rating : </label>
                                          <label for="cname" class="control-label col-lg-9" style="text-align:left;"><?php echo $u->compensationandbenefit ?></label>
                                     </div>
									 
                                      <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-3">Carrier Opportunities Rating : </label>
                                          <label for="cname" class="control-label col-lg-9" style="text-align:left;"><?php echo $u->carrieropportunities ?></label>
                                     </div>
                                     
									 <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-3">Work Life Balance Rating : </label>
                                          <label for="cname" class="control-label col-lg-9" style="text-align:left;"><?php echo $u->worklifebalancerating ?></label>
                                     </div>
									 
                                      <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-3">Recomendation : </label>
                                          <label for="cname" class="control-label col-lg-9" style="text-align:left;"><?php echo $u->rekomen ?></label>
                                     </div>
									 
									<div class="form-group ">
                                          <label for="cname" class="control-label col-lg-3">Description : </label>
                                          <label for="cname" class="control-label col-lg-9" style="text-align:left;"><?php echo $u->description ?></label>
                                     </div>
									 
                                     <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-3">Qualification: </label>
                                          <label for="cname" class="control-label col-lg-9" style="text-align:left;"><?php echo $u->qualification ?></label>
                                     </div>
									 
                                      <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-3">City : </label>
                                          <label for="cname" class="control-label col-lg-9" style="text-align:left;"><?php echo $u->nama_kota?></label>
                                     </div>
                                     
									 <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-3">Category : </label>
                                          <label for="cname" class="control-label col-lg-9" style="text-align:left;"><?php echo $u->nama_kategori ?></label>
                                     </div>
									 
                                      <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-3">Logo : </label>
                                          <label for="cname" class="control-label col-lg-9" style="text-align:left;"><img src="<?php echo $u->logo?>?>"</label>
										 
                                     </div>
									 
									<div class="form-group ">
                                          <label for="cname" class="control-label col-lg-3">Link : </label>
                                          <label for="cname" class="control-label col-lg-9" style="text-align:left;"><?php echo $u->link ?></label>
										  
										  
                                     </div>
									 
                                     
									  <?php
										
										} 
									  ?> 
                              </div>
							</div>
                          </div>
                      </section>
                  </div>
              </div>
              
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
      <?php
		echo $footer_admin;
	  ?>


  </body>
</html>
