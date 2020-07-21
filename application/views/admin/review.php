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

				<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>

				<!-- Card  -->
				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/Pengajuan/Witel/'.$pengajuan->id_witel) ?>"><i class="fas fa-arrow-left"></i>
							Back</a>
					</div>
					<div class="card-body">
					<h5 style="font-weight: bolder; margin-top: 5px; "><strong style="font-size:24px; ">Profil User</strong></h5><br>
					        <div class="row">
					          <div class="col-md-2">
					            <img src="<?php echo base_url().'/images/avatar.png' ?>" width="200" height ="200">
					          </div>  
					          <div class="col-lg-4">
					            <p style="font-size: 15px; border-bottom:1px solid gray; ">Nama : <?= $pengajuan->nama_user ?></p>
					            <p style="font-size: 15px; border-bottom:1px solid gray;">Email : <?= $pengajuan->email_user ?></p>
					            <p style="font-size: 15px; border-bottom:1px solid gray;">No. Telepon : <?= $pengajuan->notelp_user ?></p>
					            <p style="font-size: 15px; border-bottom:1px solid gray;">Nama Sekolah : <?= $pengajuan->nama_sekolah ?></p>
					            <p style="font-size: 15px; border-bottom:1px solid gray;">Email Sekolah : <?= $pengajuan->email_sekolah ?></p>
					            <p style="font-size: 15px; border-bottom:1px solid gray;">No. Telepon Sekolah : <?= $pengajuan->notelp_sekolah ?></p>
					          </div>
					        </div>
					</div>

					


				</div>
				<!-- /.container-fluid -->


				

			</div>
			<!-- /.content-wrapper -->
			<div class="container-fluid">
				<!-- Card  -->
				<div class="card mb-3">
					<div class="card-body">
						<h5 style="font-weight: bolder; margin-top: 5px; "><strong style="font-size:24px; ">Pengajuan</strong></h5><br>
						<form action="" method="post"
							enctype="multipart/form-data" >
						
							<div class="form-group">
								<label for="pembimbing1">Pembimbing 1</label>
								<input class="form-control"
								 type="text" name="pembimbing1" placeholder="<?php echo $pengajuan->pembimbing1 ?>" value="<?php echo $pengajuan->pembimbing1 ?>" />
								 <div class="invalid-feedback">
									<?php echo form_error('pembimbing2') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="pembimbing2">Pembimbing 2</label>
								<input class="form-control"
								 type="text" name="pembimbing2" placeholder="<?php echo $pengajuan->pembimbing2 ?>" value="<?php echo $pengajuan->pembimbing2 ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('pembimbing2') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="jumlah_siswa">Jumlah Siswa</label>
								<input class="form-control"
								 type="text" name="jumlah_siswa" placeholder="<?php echo $pengajuan->jumlah_siswa ?>" value="<?php echo $pengajuan->jumlah_siswa ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('jumlah_siswa') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="surat_permohonan">Surat Permohonan</label>
								<p><a href="<?php echo base_url("./upload/surat_permohonan/".$pengajuan->surat_permohonan); ?>" style="color: light-blue; text-decoration: none;  font-family: Lato;"><small><u><?php echo $pengajuan->surat_permohonan ?></u></small></a></p>
							</div>
							<div class="form-group">
								<label for="daftar_peserta">Daftar Peserta</label>
								<p><a href="<?php echo base_url("./upload/daftar_peserta/".$pengajuan->daftar_peserta); ?>" style="color: light-blue; text-decoration: none;  font-family: Lato;"><small><u><?php echo $pengajuan->daftar_peserta ?></u></small></a></p> 
							</div>
							<div class="form-group">
					            <label>Tanggal Pelaksanaan</label>
					            <input type="date" class="form-control" id="tanggal_pelaksanaan" name="tanggal_pelaksanaan" style="box-shadow: inset 3px 3px 4px rgba(0, 0, 0, 0.25)" value="<?php echo $pengajuan->tanggal_pelaksanaan ?>">
					        </div>
					        <div class="form-group">
					            <label>Status Pengajuan</label>
					             <select class="form-control"   id="status_pengajuan" name="status_pengajuan">
					              <option value="SLB" selected>Review</option>
					              <option value="SD">Verifikasi</option>
					              <option value="SMP">Accept</option>
					              <option value="SMP">Reject</option>
					            </select>
					            <small class="form-text text-danger"><?php echo form_error('jenjang_sekolah'); ?></small>
							</div>
							<input class="btn btn-success" type="submit" name="btn" value="Update" />
						</form>
					</div>
					<div class="card-footer small text-muted">
						* required fields
					</div>
				</div>
				<!-- /.container-fluid -->
				<!-- Sticky Footer -->
				<?php $this->load->view("admin/_partials/footer.php") ?>

			</div>

		</div>
		<!-- /#wrapper -->

		<?php $this->load->view("admin/_partials/scrolltop.php") ?>
		<?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>
