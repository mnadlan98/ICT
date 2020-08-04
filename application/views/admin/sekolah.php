<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
	<link href="<?php echo base_url('css/sekolah.css') ?>" rel="stylesheet">
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
						<a href="#" onclick="ModalSekolah('add_sekolah','Tambah Sekolah')" ><i class="fas fa-plus"></i> Add Sekolah</a>


					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>NPSN</th>
										<th>Nama Sekolah</th>
										<th>Jenjang</th>
										<th>Kota/Kabupaten</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>		
									<?php foreach ($sekolah as $s): ?>
									<tr>
										<td>
											<?php echo $s['NPSN'] ?>
										</td>
										<td>
											<?php echo $s['Nama_Sekolah'] ?>
										</td>
										<td>
											<?php echo $s['BP'] ?>
										</td>
										<td>
											<?php echo $s['KabupatenKota'] ?>
										</td>
										<td width="250">
											<a href="#" onclick="ModalSekolah('edit_sekolah/<?php echo $s['NPSN']?>','Edit Sekolah','<?php echo $s['NPSN']?>','<?php echo $s['Nama_Sekolah']?>','<?php echo $s['KabupatenKota']?>')"
											 class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
											 <a onclick="deleteConfirm('<?php echo site_url('admin/overview/delete_sekolah/'.$s['NPSN']) ?>')"
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
