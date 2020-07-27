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

				<?php if ($this->session->flashdata('msg')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('msg'); ?>
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
					            <p style="font-size: 15px; border-bottom:1px solid gray;">Nama : <?= $pengajuan->nama_user ?></p>
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
						<h5 style="font-weight: bolder; margin-top: 5px; "><strong style="font-size:24px; ">Report </strong></h5><br>
						<?php echo form_open_multipart('admin/overview/report/2') ?>
						<form action="" method="post" >
						
							<div class="form-group">
							
								<label for="daftar_hadir">Upload Daftar Peserta</label>
								<input class="form-control"
								 type="file" name="daftar_hadir" id="daftar_hadir" required/>
								 
								<label for="materi">Materi</label>
								<input class="form-control"
								 type="text" name="materi"  />
								 
								<label for="files[]">Upload Gambar Acara</label>
								<input class="form-control"
								 type="file" name="files[]" multiple="multiple" required/>
								
							</div>						
							<input class="btn btn-success" type="submit" name="btn" value="Update"  />					
						</form>
						<?php echo form_close() ?>
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

  <script type="text/javascript">
    $(document).ready(function(){
      $('#wilayah').change(function(){ 
                var id=$(this).val();
                $.ajax({
                    url : "<?php echo site_url('pengajuan/get_sto');?>",
                    method : "POST",
                    data : {id: id},
                    async : true,
                    dataType : 'json',
                    success: function(data){                    
                        var html = '';
                        var i;
                        for(i=0; i<data.length; i++){
                            html += '<option value='+data[i].id_sto+'>'+data[i].keterangan+'</option>';
                        }
                        $('#sto').html(html);
                    }
                });
                return false;
            });            
    });
  </script>