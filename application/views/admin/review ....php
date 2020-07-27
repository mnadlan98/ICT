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
								<input class="form-control disabled"
								 type="text" name="pembimbing1" placeholder="<?php echo $pengajuan->pembimbing1 ?>" value="<?php echo $pengajuan->pembimbing1 ?>" />
								 <div class="invalid-feedback">
									<?php echo form_error('pembimbing2') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="pembimbing2">Pembimbing 2</label>
								<input class="form-control disabled"
								 type="text" name="pembimbing2" placeholder="<?php echo $pengajuan->pembimbing2 ?>" value="<?php echo $pengajuan->pembimbing2 ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('pembimbing2') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="jumlah_siswa">Jumlah Siswa</label>
								<input class="form-control disabled"
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
					            <input type="date" class="form-control disabled" id="tanggal_pelaksanaan" name="tanggal_pelaksanaan"  value="<?php echo $pengajuan->tanggal_pelaksanaan ?>">
					        </div>
					        <div class="form-group">
					            <label>Tanggal Persetujuan</label>
					            <input type="date" class="form-control" id="tanggal_persetujuan" name="tanggal_persetujuan"  value="<?php echo $pengajuan->tanggal_persetujuan ?>">
					        </div>				
            				<div class="form-group">
            					<label>Wilayah Kota/Kabupaten</label>
              					<select class="form-control" id="wilayah" name="wilayah"   required>
                					<option value="<?php echo $pengajuan->id_wilayah ?>"><?php echo $pengajuan->wilayah?> (Pilih Untuk Ubah Wilayah)</option>
                					<?php foreach($wilayah as $row):?>
                					<option value="<?php echo $row->id_wilayah;?>"><?php echo $row->wilayah?></option>
                					<?php endforeach;?>
              					</select>
            				</div>
            				<div class="form-group">
            					<label>STO</label>
              					<select class="form-control" id="sto" name="sto" required>
                					<option value="<?php echo $pengajuan->id_sto ?>"><?php echo $pengajuan->keterangan?></option>
              					</select>
            				</div>
          					<?php if ($pengajuan->approved > 0): ?>					
							<div class="form-group">
					            <label>Persetujuan User</label>
					            <?php if ($pengajuan->approved == 1): ?>	
					            	<?php $hasil = 'Tidak Setuju' ?>
					            <?php else: ?>
					            	<?php $hasil = 'Setuju' ?>
					            <?php endif ?>
					             <input type="text" class="form-control disabled"   id="approved" name="approved" value="<?php echo $hasil?>" placeholder="Diajukan">
								
					        
							</div>
							<?php endif ?>
					        <div class="form-group">
					            <label>Status Pengajuan</label>
								 <?php if ($pengajuan->status_pengajuan==1){ ?>
					             <input type="text" class="form-control disabled"   id="status_pengajuan" name="status_pengajuan"					             	
					              		value="" placeholder="Diajukan">
								 <?php }else if($pengajuan->status_pengajuan==2){ ?>
								<input type="text" class="form-control disabled"   id="status_pengajuan" name="status_pengajuan"					             	
					              		value="" placeholder="Verifikasi">
								 <?php }else{ ?>
								      <?php if($pengajuan->approved==1){ ?>
											<select class="form-control disabled"  id="status_pengajuan" name="status_pengajuan" value="" placeholder="Persetujuan">	
											<option value="5"> 
												<?php if ($pengajuan->status_pengajuan==3){ 
													echo "Persetujuan";
												}else if ($pengajuan->status_pengajuan==5){ 
													echo "Ditolak"; 
												} ?> </option>
										<?php }else{ ?> 
											<select class="form-control"  id="status_pengajuan" name="status_pengajuan">							 
											<?php if ($pengajuan->status_pengajuan==3){ ?>
												<option value="" selected>Pilih Hasil Persetujuan...</option>
												<option value="4">Accept</option>
												<option value="5">Reject</option>
											<?php }else{ ?>	
												<option value=<?php echo $pengajuan->status_pengajuan?>> 
												<?php if ($pengajuan->status_pengajuan==4){ 
													echo "Disetujui";
												}else if ($pengajuan->status_pengajuan==5){ 
													echo "Ditolak"; 
												}else{
													echo "ERROR";
												} ?> </option>													 
											</select>										
											<?php } ?>	
										<?php } ?>
									<?php } ?>
					            <small class="form-text text-danger"><?php echo form_error('jenjang_sekolah'); ?></small>
							</div>
							<?php if($pengajuan->approved!=1){ ?>
								<input class="btn btn-success" type="submit" name="btn" value="Update" onclick="changeStatus()" />
							<?php }else{ ?>
								<input class="btn btn-danger" type="submit" name="btn" value="Batalkan" onclick="Batalkan()" />
							<?php } ?>
						</form>
					</div>
					<div class="card-footer small text-muted">
						* required fields
					</div>
				</div>
				<!-- /.container-fluid -->
				<!-- Sticky Footer -->
				

			</div>
			<?php $this->load->view("admin/_partials/footer.php") ?>

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

	function changeStatus(){
		var status = document.getElementById("status_pengajuan");
		if(status.placeholder == "Verifikasi" ){
			status.value = "3";
		}else if(status.placeholder == "Diajukan"){
			status.value = "2";
		}else if(status.placeholder == "Persetujuan"){
			status.value = "5";
		}
		
	};

	function Batalkan(){
		var status = document.getElementById("status_pengajuan");
		status.value = "5";
	};
  </script>