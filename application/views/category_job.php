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
					<h3 class="page-header"><i class="fa fa-files-o"></i> Category </h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
						<li><i class="icon_genius"></i>Category</li>
						<li><i class="fa fa-files-o"></i>Detail</li>
					</ol>
				</div>
			</div>
              <!-- Form validations -->  

			<?php
			foreach($jenis["tampil"]->result() as $u)
			{
			?>	
              <div class="row">
                  <div class="col-lg-6">
                      <section class="panel">
                          <header class="panel-heading">
                              Current Data
                          </header>
                          <div class="panel-body">
                                  <div class="form-group">
                                      <label for="exampleInputEmail1">Job</label>
                                      <div style="border: 1px solid #CCC; margin: 10px 0px; padding: 10px; width: auto; height: auto; background-color: #FFFFFF; text-align: left;"><?php echo $u->nama ?></div> 
                                  </div>
                                  <div class="form-group">
                                      <label for="exampleInputPassword1">Category</label>
                                      <div style="border: 1px solid #CCC; margin: 10px 0px; padding: 10px; width: auto; height: auto; background-color: #FFFFFF; text-align: left;"><?php echo $u->kategori ?></div> 
                                  </div>
                                  
                           
                          </div>
                      </section>
                  </div>
				  
				  
			
               <div class="row">
			    <form action="<?php echo base_url().'index.php/Category_job/ganti_job_kategori';?>" method="post" enctype="multipart/form-data">
                  <div class="col-lg-6">
                      <section class="panel">
                          <header class="panel-heading">
                              New Data
                          </header>
                          <div class="panel-body">
						  
                                  <div class="form-group">
                                      <label for="exampleInputEmail1">ID</label>
									  <input type = "hidden" name="job_baru" value="<?php echo $u->nama ?>">
									  
                                      <div style="border: 1px solid #CCC; margin: 10px 0px; padding: 10px; width: auto; height: auto; background-color: #FFFFFF; text-align: left;"><?php echo $u->nama ?></div> 
                                  </div>
								  
                                  <div class="form-group">
                                      <label for="exampleInputPassword1">Category</label>
									  <select name= "kategori_baru" class = "form-control" style="border: 1px solid #CCC; margin: 10px 0px; padding: 10px; width:550px; height: auto; background-color: #FFFFFF;">
										<?php
										foreach($kategori["tampil"]->result() as $u)
										{
											echo "<option  value='$u->nama_kategori'>$u->nama_kategori</option>";
										} 
										?>
									</select>
									  
                                  </div>
								  
                                  <button type="submit" class="btn btn-primary">Submit</button>
							
                          </div>
                      </section>
                  </div>
				  </form>
              </div>
			  
			  <?php
										
				} 
				?> 
              
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
      <?php
		echo $footer_admin;
	  ?>


  </body>
</html>
