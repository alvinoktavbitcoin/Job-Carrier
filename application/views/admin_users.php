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
						<li><i class="icon_profile"></i>Users</li>
						
					</ol>
				</div>
			</div>
              <!-- page start-->
              
            

              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Users Data
                          </header>
                          
                          <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                           <thead>
                              <tr>
								 <th style="text-align:center"></i> Username </th>
                                 <th style="text-align:center"></i> First Name </th>
                                 <th style="text-align:center"></i> Last Name</th>
								 <th style="text-align:center"></i> Email</th>
								 <th style="text-align:center"></i> Action</th>
                              </tr>
                           </thead>
						    <tbody>
							
							  <?php
							  foreach($users["tampil"]->result() as $u)
							  {
							  ?>
									
									<tr>
										<td align ='center' style="font-size:13px"><?php echo $u->username ?></td>
										<td align ='center' style="font-size:13px"><?php echo $u->first_name?></td>
										<td align ='center' style="font-size:13px"><?php echo $u->last_name?></td>
										<td align ='center' style="font-size:13px"><?php echo $u->email?></td>
										<td align ='center'>
											<div class="btn-group">
												<a class="btn btn-success" href="<?php echo base_url().'index.php/Detail_user?id='.$u->username.'';?>">View <i class="icon_plus_alt2"></i></a>  
												 <a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');" href="<?php echo base_url().'index.php/Admin_users/delete_user?id='.$u->username.'';?>">Delete <i class="icon_close_alt2"></i></a>
											</div>
										</td>
									
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
	    <script> 
			$(document).ready(function(){
			$('#example').DataTable({
				"sPaginationType": "full_numbers"
			}  
			);
			});
	</script>
	  
      <?php
		echo $footer_admin;
	  ?>
	  
	  <?php if($this->session->flashdata('user_hapus')){ ?>
	<script>
	$(document).ready(function(){
       swal('Succeeded !',
			  'This user has been deleted',
			  'success');
    });
	</script>
	<?php } ?>


  </body>
</html>
