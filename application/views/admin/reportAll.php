<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body id="page-top">

	<?php $this->load->view("admin/_partials/navbar.php") ?>
	<div id="wrapper">

		<?php $this->load->view("admin/_partials/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">

				<?php $this->load->view("admin/_partials/breadcrumb.php") ?>

    <!-- Icon Cards-->
    <?php if ($this->session->userdata("admin")['level']==1): ?>
      <div class="row">
      <?php $i = 0; ?>   
      <?php $j = 0; ?>  
        <div class="card mb-3">
					<div class="card-body">
						<div class="table-responsive">
              <form action="<?php echo site_url().'admin/overview/reportAll'?>" method="POST" > 
							<table class="table table-hover"  id="example" width="100%" cellspacing="0">
              <input type="date" name="tgl1" id="tgl1">  
              sampai dengan tanggal  
              <input type="date" name="tgl2" id="tgl2">
              <input Type="Submit" name="submit" Class="Btn Btn-Danger" Value="Search" >
              </form>
              <?php if ($this->session->flashdata('msg')): ?>
              <div class="alert alert-success" role="alert">
                <label> Pencarian dari tanggal <?php echo $tgl1 ?> sampai tanggal <?php echo $tgl2 ?> </label>
              </div>
              <?php endif ?>
								<thead>
									<tr>
										<th>No</th>
										<th>Nama Witel</th>
										<th>Jumlah Pengajuan</th>
										<th>Terlaksana</th>																				
									</tr>
								</thead>
                <?php foreach ($list as $p): ?>
								<tbody>									
									<tr>
										<td>
											<?php echo $i+=1;?>
										</td>
										<td>
											<?php echo $p->nama_witel ?>
										</td>
										<td>
											<?php echo $count[$j] ?>
										</td>
                    <td>
                    <?php echo $jml[$j] ?>
										</td>
									</tr>

								</tbody>
                <?php $j++; ?>
                <?php endforeach; ?>
							</table>
						</div>
					</div>
				</div>

			</div>
      
      
    <?php else: ?>
      <div class="row">
 
        <div class="card mb-3">
					<div class="card-body">
						<div class="table-responsive">
            <form action="<?php echo site_url().'admin/overview/reportAll'?>" method="POST"> 
							<table class="table table-hover"  id="example" width="100%" cellspacing="0">
              <input type="date" name="tgl1" id="tgl1">  sampai dengan tanggal  <input type="date" name="tgl2" id="tgl2">
              <input Type="Submit" name="submit" Class="Btn Btn-Danger" Value="Search" >
              </form>
								<thead>
									<tr>
										<th>No</th>
										<th>Nama Witel</th>
										<th>Jumlah Pengajuan</th>
										<th>Terlaksana</th>																				
									</tr>
								</thead>
								<tbody>									
									<tr>
										<td>
											<?php echo 1;?>
										</td>
										<td>
											<?php echo $witel->nama_witel ?>
										</td>
										<td>
											<?php echo $count?>
										</td>
                    <td>
                    <?php echo $jml ?>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>

			</div>
    <?php endif ?>
    
    
    </div>    
    </div>
    <!-- /.container-fluid -->

    <!-- Sticky Footer -->
    <?php $this->load->view("admin/_partials/footer.php") ?>

  </div>
  <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->


<?php $this->load->view("admin/_partials/scrolltop.php") ?>
<?php $this->load->view("admin/_partials/modal.php") ?>
<?php $this->load->view("admin/_partials/js.php") ?>

    
</body>
</html>

<script>
	$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'excelHtml5',
                title: 'Data export'
            },
            {
                extend: 'pdfHtml5',
                title: 'Data export'
            }
        ]
    } );
	} );
</script>
