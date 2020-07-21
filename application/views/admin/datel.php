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

				<!-- DataTables -->
				<div class="card mb-3">
					<?php echo $this->session->flashdata('msg') ?>
					<div class="card-header">
						<a href="#" onclick="addModal('<?php echo site_url('admin/overview/add_datel/') ?>','Nama Datel','Tambah Datel','datel')"><i class="fas fa-plus"></i> Add Datel</a>
					</div>
					<center><h2>List Datel</h2></center>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>No</th>
										<th>Datel</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php $i=0;?>
									<?php foreach ($datel as $l):?>
									<tr>
										<td>
											<?php echo $i+=1; ?>
										</td>
										<td>
											<?php echo $l->datel ?>
										</td>
										<td width="250">
											<a onclick="editModal('<?php echo site_url('admin/overview/edit_datel/'.$l->id_datel) ?>','<?php echo $l->datel?>','Edit Witel','datel')"
											 href="#!" class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
										</td>
									</tr>
									<?php endforeach; ?>

								</tbody>
							</table>
						</div>
					</div>
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
