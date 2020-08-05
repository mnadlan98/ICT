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
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>protocol</th>
										<th>mailtype</th>
										<th>smtp_host</th>
										<th>smtp_port</th>
										<th>smtp_timeout</th>
										<th>smtp_user</th>
										<th>smtp_pass</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									
									<tr>
										<td>
											<?php echo $config_email->protocol ?>
										</td>
										<td>
											<?php echo $config_email->mail_type ?>
										</td>
										<td>
											<?php echo $config_email->smtp_host ?>
										</td>
										<td>
											<?php echo $config_email->smtp_port ?>
										</td>
										<td>
											<?php echo $config_email->smtp_timeout ?>
										</td>
										<td>
											<?php echo $config_email->smtp_user ?>
										</td>
										<td>
											<?php echo $config_email->smtp_pass ?>
										</td>
										<td width="250">
											<a  onclick="ModalConfigEmail('<?php echo site_url('admin/overview/edit_config_email/'.$config_email->id_email) ?>','<?php echo $config_email->protocol?>','<?php echo $config_email->mail_type?>','<?php echo $config_email->smtp_host?>','<?php echo $config_email->smtp_port?>','<?php echo $config_email->smtp_timeout?>','<?php echo $config_email->smtp_user?>','<?php echo $config_email->smtp_pass?>')" href="#!" class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
										</td>
									</tr>
									

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
