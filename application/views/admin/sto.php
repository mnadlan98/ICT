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
						<a href="#" onclick="ModalSTO('<?php echo site_url('admin/overview/add_sto') ?>','Tambah STO')"><i class="fas fa-plus"></i> Add STO</a>
					</div>
					<center><h2>List STO</h2></center>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>No</th>
										<th>STO</th>
										<th>Keterangan</th>
										<th>Datel</th>
										<th>Witel</th>
										<th>Wilayah</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php $i=0;?>
									<?php foreach ($sto as $l):?>
									<tr>
										<td>
											<?php echo $i+=1; ?>
										</td>
										<td>
											<?php echo $l->sto ?>
										</td>
										<td>
											<?php echo $l->keterangan ?>
										</td>
										<td>
											<?php echo $l->datel ?>
										</td>
										<td>
											<?php echo $l->nama_witel ?>
										</td>
										<td>
											<?php echo $l->wilayah ?>
										</td>
										<td width="250">
											<a onclick="ModalSTO('<?php echo site_url('admin/overview/edit_sto') ?>','Edit STO','<?php echo $l->sto?>','<?php echo $l->keterangan?>')"
											 href="#!" class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
											<a onclick="deleteConfirm('<?php echo site_url('admin/overview/delete_sto/'.$l->id_sto) ?>')"
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
