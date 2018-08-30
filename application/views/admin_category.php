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
						<li><i class="icon_genius"></i>Category</li>
						
					</ol>
				</div>
			</div>
              <!-- page start-->
              
              <div class="row">
                  <div class="col-sm-12">
                      <section class="panel">
                          <header class="panel-heading no-border">
                              <b> Insert Category </b>
                          </header>
                          <table class="table table-bordered">
                              <thead>
                              <tr >
                                  <th align='center'>Category</th>
                                  <th align='center'>Action</th>
                              </tr>
                              </thead>
                              <tbody>
                              <form action="<?php echo base_url().'index.php/Admin_category/tambah_kategori';?>" method="post" enctype="multipart/form-data">
                              <tr>
                                  <td width=50><input type="text" name="kategori" size=70 style=”width:1px;border:0px;”></td>
								  <td ><button class="btn btn-primary"  type="submit" name="btn-upload" value="submit" title="Click to insert data">Go</button></td>
                              </tr>
                              
                              </tbody>
                          </table>
                      </section>
                  </div>
                  
              </div>

              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Edit Category List
                          </header>
                          
                          <table id="example" class="table table-striped table-advance table-hover">
						    <thead>
                
                              <tr>
								<th style="text-align:center">ID</th>
                                <th style="text-align:center">Category</th>
								<th style="text-align:center">Action</th>
                                
                              </tr>
							  </thead>
							  <tbody>
                             <?php
							 $i=1;
							foreach($jenis["tampil"]->result() as $u)
							{
							?>
							<tr>
								<td align ='center' style="font-size:13px"><?php echo $u->id_kategori ?></td>
								<td align ='center' style="font-size:13px"><?php echo $u->nama_kategori ?></td>
								
								<td align ='center'>
                                  <div class="btn-group">
                                      <a class="btn btn-primary" href="<?php echo base_url().'index.php/Edit_category?id='.$u->id_kategori.'';?>">Edit <i class="icon_check_alt2"></i></a>
                                      <a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');" href="<?php echo base_url().'index.php/Admin_category/delete_kategori?id='.$u->id_kategori.'';?>">Delete <i class="icon_close_alt2"></i></a>
                                  </div>
                                </td>
								
							</tr>
							<?php
							$i++;
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
	  
	    <script> 
			$(document).ready(function(){
			$('#example').DataTable({
				"sPaginationType": "full_numbers"
			}  
			);
			});
	</script>
	  
	  
	  <?php if($this->session->flashdata('tambah_kategori')){ ?>
	<script>
	$(document).ready(function(){
       swal('Succeeded !',
			  'Your input has been inserted successfully',
			  'success');
    });
	</script>
	<?php } ?>
	
	<?php if($this->session->flashdata('kategori_double')){ ?>
	<script>
	$(document).ready(function(){
       swal('Error !',
			  'Your input is already on the list',
			  'error');
    });
	</script>
	<?php } ?>
	
	<?php if($this->session->flashdata('hapus_kategori')){ ?>
	<script>
	$(document).ready(function(){
       swal('Succeeded !',
			  'Your selected category has been deleted successfully',
			  'success');
    });
	</script>
	<?php } ?>
	  
	  <?php if($this->session->flashdata('ganti_kategori')){ ?>
	<script>
	$(document).ready(function(){
       swal('Succeeded !',
			  'Category data has been updated',
			  'success');
    });
	</script>
	<?php } ?>
	

	
	


  </body>
</html>
