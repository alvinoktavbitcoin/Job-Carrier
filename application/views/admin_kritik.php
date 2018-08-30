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
					<h3 class="page-header"><i class="fa fa-file-text-o"></i> Data Synchronize</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.html">Admin</a></li>
						<li><i class="icon_documents_alt"></i>Comments</li>
						
					</ol>
				</div>
			</div>
              <!-- page start-->
              
            

              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              User's Comment
                          </header>
                          
                          <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                           <thead>
                              <tr>
								 <th style="text-align:center"></i> Username </th>
                                 <th style="text-align:center"></i> Subject </th>
                                 <th style="text-align:center"></i> Message</th>
								 <th style="text-align:center"></i> Time</th>
                              </tr>
                           </thead>
						    <tbody>
							
							  <?php
							  foreach($kritik["tampil"]->result() as $u)
							  {
							  ?>
									
									<tr>
										<td align ='center' style="font-size:13px"><?php echo $u->username ?></td>
										<td align ='center' style="font-size:13px"><?php echo $u->subject?></td>
										<td align ='center' style="font-size:13px"><?php echo $u->message?></td>
										<td align ='center' style="font-size:13px"><?php echo $u->waktu?></td>
									
									</tr>      
							<?php
						
							} 
							?> 
							
							
							
							
                        </tbody>
                        </table>
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
