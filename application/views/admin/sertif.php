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
				<?php if ($this->session->flashdata('msg')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('msg'); ?>
				</div>
				<?php endif; ?>
					<div class="card-body">
						<form action="<?php echo site_url().'admin/overview/upload_sertif'?>" method="post" enctype="multipart/form-data" >			
						<label for="materi">Upload Background Sertifikat (Ukuran 3508px X 2480px) </label>
						<input class="form-control"
							type="file" name="sertif" required/>
						<br>
						<input type="hidden" name="cek" value="cek">
						<input class="btn btn-success" type="submit" name="btn" value="Upload Sertifikat"  />	
						<br><br><br>
						</form>
						<p> Contoh Sertifikat </p>
						<a href="<?php echo base_url("./images/contohserti.png"); ?>" class="portfolio-popup">
                  <img style="width:450px;height:300px" src="<?php echo base_url("./images/contohserti.png"); ?>">                 
                </a>   
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
