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
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>Nama User</th>
										<th>Jumlah Siswa</th>
										<th>Pembimbing 1</th>
										<th>Pembimbing 2</th>
										<th>Tanggal Pelaksanaan</th>
										<th>Surat Permohonan</th>
										<th>Daftar Peserta</th>
										<th>Datel</th>
										<th>Tanggal Pengajuan</th>
										<th>Status Pengajuan</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($pengajuan as $p): ?>
									<tr>
										<td>
											<a href=""><?php echo $p->nama_user ?></a>
										</td>
										<td>
											<?php echo $p->jumlah_siswa ?>
										</td>
										<td>
											<?php echo $p->pembimbing1 ?>
										</td>
										<td>
											<?php echo $p->pembimbing2 ?>
										</td>
										<td>
											<?php echo $p->tanggal_pelaksanaan ?>	
										</td>
										<td>
											<a href="<?php echo base_url("./upload/surat_permohonan/".$p->surat_permohonan); ?>"><?php echo $p->surat_permohonan ?></a>
										</td>
										<td>
											<a href="<?php echo base_url("./upload/surat_permohonan/".$p->daftar_peserta); ?>"><?php echo $p->daftar_peserta ?></a>				
										</td>
										<td>
											<?php echo $p->nama_datel ?>	
										</td>
										<td>
											<?php echo $p->tanggal_pengajuan ?>	
										</td>
										<td>
											<?php echo $p->status_pengajuan ?>	
										</td>
										<td width="250">
											<a href="#"
											 class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
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

	<script>
	function deleteConfirm(url){
		$('#btn-delete').attr('href', url);
		$('#deleteModal').modal();
	}
	</script>
</body>

</html>
