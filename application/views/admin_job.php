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
						<li><i class="icon_piechart"></i>Job</li>
						
					</ol>
				</div>
			</div>
              <!-- page start-->
              

              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Edit Category List
                          </header>
                          
                         <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                           <thead>
                              <tr>
								<th style="text-align:center">Job</th>
                                <th style="text-align:center">Category</th>
								<th style="text-align:center">Action</th>
                                
                              </tr>
							   </thead>
							  <tbody>
                             <?php
							foreach($jenis["tampil"]->result() as $u)
							{
							?>
							<tr>
								
								<td align ='center' style="font-size:13px"><?php echo $u->nama ?></td>
								<td align ='center' style="font-size:13px"><?php echo $u->kategori ?></td>
								<td align ='center'>
                                  <div class="btn-group">
                                      <a class="btn btn-primary" href="<?php echo base_url().'index.php/Category_job?id='.$u->nama.'&nama='.$u->kategori.'';?>">Edit <i class="icon_check_alt2"></i></a>
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
	  
	  <?php if($this->session->flashdata('ganti_job_kategori')){ ?>
	<script>
	$(document).ready(function(){
       swal('Succeeded !',
			  'Job category has been updated',
			  'success');
    });
	</script>
	<?php } ?>
	

  </body>
</html>
