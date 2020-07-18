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
				<?php if (!empty($witel)) :?>
					<h2>Witel <?php echo $witel->nama_witel?></h2>
				<?php endif?>
				
				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama User</th>
										<th>Nama Sekolah</th>
										<th>Kota/Kabupaten Sekolah</th>
										<th>Jumlah Siswa</th>
										<th>Tanggal Pelaksanaan</th>
										<th>Surat Permohonan</th>
										<th>Daftar Peserta</th>
										<th>STO</th>
										<th>Keterangan</th>
										<th>Tanggal Pengajuan</th>
										<th>Status Pengajuan</th>
										<?php if ($this->session->userdata("admin")['level']==2 && $this->session->userdata("admin")['role']==2): ?>
											<th>Aksi</th>
										<?php endif ?>
										
										
									</tr>
								</thead>
								<tbody>
									<?php $i=0; ?>
									<?php foreach ($pengajuan as $p): ?>
									<tr>
										<td>
											<?php echo $i+=1;?>
										</td>
										<td>
											<?php echo $p->nama_user ?>
										</td>
										<td>
											<?php echo $p->nama_sekolah ?>
										</td>
										<td>
											<?php echo $p->kota_sekolah ?>
										</td>
										<td>
											<?php echo $p->jumlah_siswa ?>
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
											<?php echo $p->sto ?>
										</td>
										<td>
											<?php echo $p->keterangan ?>	
										</td>
										<td>
											<?php echo $p->tanggal_pengajuan ?>	
										</td>
										<td>
											<?php echo $p->status_pengajuan ?>	
										</td>
										<?php if ($this->session->userdata("admin")['level']==2 && $this->session->userdata("admin")['role']==2): ?>
											<td width="250">
											<a href="<?php echo site_url('admin/overview/review/'.$p->id_pengajuan) ?>"
											 class="btn btn-small"><i class="fas fa-edit"></i> Review</a>
										</td>
										<?php endif ?>
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
