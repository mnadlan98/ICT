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
					<div class="alert alert-success" role="alert">
						<?php echo $this->session->flashdata('msg'); ?>
					</div>
					<div class="card-header">
						<a href="#" onclick="addModal('<?php echo site_url('admin/overview/add_unit/') ?>','Nama Unit','Tambah Unit','nama_unit')" ><i class="fas fa-plus"></i> Add Unit</a>


					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama Unit</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $i=0;?>
									<?php foreach ($unit as $s):?>
									<tr>
										<td>
											<?php echo $i+=1; ?>
										</td>
										<td>
											<?php echo $s->nama_unit ?>
										</td>
										<td width="250">
											<a  onclick="editModal('<?php echo site_url('admin/overview/edit_unit/'.$s->id_unit) ?>','<?php echo $s->nama_unit?>','Edit Unit','nama_unit')" href="#!" class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
											<a onclick="deleteConfirm('<?php echo site_url('admin/overview/delete_unit/'.$s->id_unit) ?>')"
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
