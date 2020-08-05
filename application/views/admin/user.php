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
				<h2>User</h2>
				<!-- DataTables -->
				<div class="card mb-3">
					<div class="alert alert-success" role="alert">
						<?php echo $this->session->flashdata('msg'); ?>
					</div>
					
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th>Email User</th>
										<th>No Telp User</th>
										<th>Jenjang</th>
										<th>Sekolah</th>
										<th>Kota Sekolah</th>
										<th>Email Sekolah</th>
										<th>No Telp Sekolah</th>
										<th>Status Akun</th>
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
											<?php echo $u->jenjang_sekolah ?>
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
										<td>
											<?php if ($u->active==0): ?>
												<?php echo "Belum Verifikasi Akun"?>
											<?php else:?>
												<?php echo "Sudah Verifikasi Akun"?>
											<?php endif ?>
										</td>
										<td width="250">
											<a onclick="ModalUser('<?php echo site_url('register/edit_user/'.$u->id_user) ?>','<?php echo $u->nama_user ?>','<?php echo $u->email_user ?>','<?php echo $u->notelp_user ?>','<?php echo $u->kota_sekolah ?>','<?php echo $u->nama_sekolah ?>','<?php echo $u->email_sekolah ?>','<?php echo $u->notelp_sekolah ?>')"
											 href="#!" class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
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
