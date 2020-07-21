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
						<a href="#" style = "margin-right: 2em" data-toggle="modal" data-target="#RegisAdminWitel"><i class="fas fa-plus"></i> Tambah Admin Witel</a>
						<a href="#" data-toggle="modal" data-target="#RegisAdminTreg"><i class="fas fa-plus"></i> Tambah Admin T-Reg</a>
					</div>
					<center><h2>Admin Witel</h2></center>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>No</th>
										<th>Admin</th>
										<th>Level</th>
										<th>Role</th>
										<th>Witel</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php $i=0;?>
									<?php foreach ($admin as $ad):?>
									<tr>
										<td>
											<?php echo $i+=1; ?>
										</td>
										<td>
											<?php echo $ad['username'] ?>
										</td>
										<td>
											<?php echo $ad['level'] ?>
										</td>
										<td>
											<?php echo $ad['role'] ?>
										</td>
										<td>
											<?php echo $ad['nama_witel'] ?>
										</td>
										<td width="250">
											<a onclick="editAdmin('<?php echo site_url('admin/register/edit_admin/'.$ad['id_admin']) ?>','<?php echo $ad['username'] ?>')"
											 href="#!" class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
											<a onclick="deleteConfirm('<?php echo site_url('admin/register/delete_admin/'.$ad['id_admin']) ?>')"
											 href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
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
