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
						<li><i class="fa fa-table"></i>Company</li>
						
					</ol>
				</div>
			</div>
              <!-- page start-->
              
              <div class="row">
                  <div class="col-sm-12">
                      <section class="panel">
                          <header class="panel-heading no-border">
                              <b> Synchronize Data </b>
                          </header>
                          <table class="table table-bordered">
                              <thead>
                              <tr >
                                  
                                  <th align='center'>Province</th>
                                  <th align='center'>Offset</th>
                                  <th align='center'>Action
								  </th>
                              </tr>
                              </thead>
                              <tbody>
							  
                             <form action="<?php echo base_url().'index.php/Admin_datacompany/sinkron_lowongan';?>" method="post" enctype="multipart/form-data">
                              <tr>
                                  
                                  <td width=90 align='center'>
									<select name= "kota" class = "form-control" style="border:0px;width:200px;" >
										<?php
										foreach($kota["tampil"]->result() as $u)
										{
											echo "<option  value='$u->kota'>$u->kota</option>";
										} 
										?>
									</select>
								</td>
								
                                  <td width=20>
									<input list="offset" type="text" name='page' placeholder="Enter Number" class="form-control txtboxToFilter" style="border:0px;width:200px;" required/>
									<datalist id="offset">
										<?php
											for($i=1;$i<=20;$i++)
											{
												echo '<option value='.$i.'>';
											}
										?>
									</datalist>
								  </td>
								  <td ><button class="btn btn-primary"  type="submit" name="btn-upload" value="submit" title="Click to insert data">Synchronize</button></td>
                              </tr>
                              </form>
                              </tbody>
                          </table>
                      </section>
                  </div>
                  
              </div>

              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Company Data
                          </header>
                          
                          <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                           <thead>
                              <tr>
								 <th style="text-align:center"></i> No </th>
                                 <th style="text-align:center"></i> ID </th>
                                 <th style="text-align:center"></i> Company</th>
								 <th style="text-align:center"></i> Job Title</th>
                                 <th style="text-align:center"> Action</th>
                              </tr>
                           </thead>
						    <tbody>
							
							  <?php
							  $i=1;
							  foreach($lowongan["tampil"]->result() as $u)
							  {
							  ?>
									
									<tr>
										<td align ='center' style="font-size:13px"><?php echo $i?></td>
										<td align ='center' style="font-size:13px"><?php echo $u->id_lowongan ?></td>
										<td align ='center' style="font-size:13px"><?php echo $u->nama_perusahaan?></td>
										<td align ='center' style="font-size:13px"><?php echo $u->job_title?></td>
										<td align ='center'>
											<div class="btn-group">
												<a class="btn btn-success" href="<?php echo base_url().'index.php/Detail_lowongan?id='.$u->id.'';?>">View <i class="icon_plus_alt2"></i></a>  
												 <a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');" href="<?php echo base_url().'index.php/Admin_datacompany/delete_lowongan?id='.$u->id.'';?>">Delete <i class="icon_close_alt2"></i></a>
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
	
	<?php if($this->session->flashdata('company_tambah')){ ?>
	<script>
	$(document).ready(function(){
       swal('Succeeded !',
			  'The companies data has been synchronized successfully',
			  'success');
    });
	</script>
	<?php } ?>
	
	<?php if($this->session->flashdata('company_hapus')){ ?>
	<script>
	$(document).ready(function(){
       swal('Succeeded !',
			  'This company has been deleted',
			  'success');
    });
	</script>
	<?php } ?>
	
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

