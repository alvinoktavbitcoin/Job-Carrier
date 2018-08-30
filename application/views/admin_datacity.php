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
						<li><i class="icon_pin_alt"></i>City</li>
						
					</ol>
				</div>
			</div>
              <!-- page start-->
              
              
              <div class="row">
                  <div class="col-lg-12">
					<section class="panel">
                          <header class="panel-heading">
                              <a class="btn btn-primary" href="<?php echo base_url(). 'index.php/Admin_datacity/sinkron_kota';?>" title="Click to Synchronize data">Synchronize City Data</a>
                          </header>
                          
                          <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                           <thead>
                              <tr>
                                <th style="text-align:center">ID</th>
                                <th style="text-align:center">City</th>
								<th style="text-align:center">Action</th>
                                
                              </tr>
							  </thead>
							   <tbody>
                              <?php
							foreach($kota["tampil"]->result() as $u)
							{
							?>
							<tr>
								<td align ='center' style="font-size:13px"><?php echo $u->id ?></td>
								<td align ='center' style="font-size:13px"><?php echo $u->kota?></td>
								<td align ='center'>
                                  <div class="btn-group">
                                      <a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');" href="<?php echo base_url().'index.php/Admin_datacity/delete_kota?id='.$u->id.'';?>">Delete  <i class="icon_close_alt2"></i></a>
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
	  
	<?php if($this->session->flashdata('city_sinkron')){ ?>
	<script>
	$(document).ready(function(){
       swal('Succeeded !',
			  'City data has been synchronized',
			  'success');
    });
	</script>
	<?php } ?>
	
	
	
	<?php if($this->session->flashdata('city_ga_tambah')){ ?>
	<script>
	$(document).ready(function(){
       swal('Error !',
			  'Your input is already on the list',
			  'error');
    });
	</script>
	<?php } ?>
	
	<?php if($this->session->flashdata('city_hapus')){ ?>
	<script>
	$(document).ready(function(){
       swal('Succeeded !',
			  'This city has been deleted',
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

