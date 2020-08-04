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
						<a href="#" onclick="ModalWilayah('<?php echo site_url('admin/overview/add_wilayah') ?>','Tambah Wilayah')"><i class="fas fa-plus"></i> Add Wilayah</a>
					</div>
					<center><h2>List Wilayah</h2></center>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>No</th>
										<th>Wilayah</th>
										<th>Witel</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php $i=0;?>
									<?php foreach ($wilayah as $l):?>
									<tr>
										<td>
											<?php echo $i+=1; ?>
										</td>
										<td>
											<?php echo $l->wilayah ?>
										</td>
										<td>
											<?php echo $l->nama_witel ?>
										</td>
										<td width="250">
											<a onclick="ModalWilayah('<?php echo site_url('admin/overview/edit_wilayah/'.$l->id_wilayah) ?>','Edit Wilayah','<?php echo $l->wilayah ?>')"
											 href="#!" class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
											 <a onclick="deleteConfirm('<?php echo site_url('admin/overview/delete_wilayah/'.$l->id_wilayah) ?>')" href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
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

