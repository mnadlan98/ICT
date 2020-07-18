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
				<h2>User</h2>
				<!-- DataTables -->
				<div class="card mb-3">
					<?php echo $this->session->flashdata('msg') ?>
					
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th>Email User</th>
										<th>No Telp User</th>
										<th>Sekolah</th>
										<th>Kota Sekolah</th>
										<th>Email Sekolah</th>
										<th>No Telp Sekolah</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php $i=0;?>
									<?php foreach ($user as $u):?>
									<tr>
										<td>
											<?php echo $i+=1; ?>
										</td>
										<td>
											<?php echo $u->nama_user ?>
										</td>
										<td>
											<?php echo $u->email_user ?>
										</td>
										<td>
											<?php echo $u->notelp_user ?>
										</td>
										<td>
											<?php echo $u->nama_sekolah ?>
										</td>
										<td>
											<?php echo $u->kota_sekolah ?>
										</td>
										<td>
											<?php echo $u->email_sekolah ?>
										</td>
										<td>
											<?php echo $u->notelp_sekolah ?>
										</td>
										<td width="250">
											<a onclick="deleteConfirm('<?php echo site_url('admin/overview/delete_user/'.$u->id_user) ?>')"
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
