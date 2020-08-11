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
						<?php if($dhadir==null){ ?>	
						<h5 style="font-weight: bolder; margin-top: 5px; "><strong style="font-size:24px; ">Report </strong></h5><br>										
						<form action="<?php echo site_url().'admin/overview/report/'.$pengajuan->id_pengajuan?>" method="post" enctype="multipart/form-data" >
						
							<div class="form-group">

								<label for="materi">1. Download Template Daftar Siswa</label><br>
								<a href="<?php echo base_url("./excel/daftar_hadir.xlsx"); ?>" 
								style="color: light-blue; text-decoration: none; font-size:15px; font-family: Lato;"><small><u>Download</u></small></a> <br><br><br>
							
								<label for="daftar_siswa">2. Upload Daftar Siswa (Xlsx)</label>
								<input class="form-control"
								 type="file" name="daftar_siswa" required/>
								 <br><br>

								 <label for="materi">3. Upload Materi dan Daftar Hadir (PDF)</label>
								<input class="form-control"
								 type="file" name="materi" required/>
								 <br><br>
								 
								<label for="gambar">4. Upload Gambar Acara 1</label>
								<input class="form-control"
								 type="file" name="gambar1"  required/>
								 <br><br>

								<label for="gambar">-  Upload Gambar Acara 2</label>
								<input class="form-control"
								 type="file" name="gambar2"  />
								 <br><br>

								<label for="gambar">-  Upload Gambar Acara 3</label>
								<input class="form-control"
								 type="file" name="gambar3"  />
								 <br><br>

								<label for="gambar">-  Upload Gambar Acara 4</label>
								<input class="form-control"
								 type="file" name="gambar4"  />
								 <br><br>

								<label for="gambar">-  Upload Gambar Acara 5</label>
								<input class="form-control"
								 type="file" name="gambar5"  />
								 <br><br>

								 <input type="hidden" name="cek" value="cek">
								
							</div>
													
							<input class="btn btn-success" type="submit" name="btn" value="Submit"  />					
						</form>
						<?php }else{ ?>
							<h5 style="font-weight: bolder; margin-top: 5px; "><strong style="font-size:24px; ">Edit Report </strong></h5><br>
							<form action="<?php echo site_url().'admin/overview/editreport/'.$pengajuan->id_pengajuan?>" method="post" enctype="multipart/form-data" >
						
							<div class="form-group">

							<label for="materi">1. Download Template Daftar Siswa</label><br>
								<a href="<?php echo base_url("./excel/daftar_hadir.xlsx"); ?>" 
								style="color: light-blue; text-decoration: none; font-size:15px; font-family: Lato;"><small><u>Download</u></small></a> <br><br><br>
							
								<label for="daftar_siswa">2. Upload Daftar Siswa (Xlsx)</label>
								<input class="form-control"
								 type="file" name="daftar_siswa" required/>
								 <br><br>

								 <label for="materi">3. Upload Materi dan Daftar Hadir (PDF)</label>
								<input class="form-control"
								 type="file" name="materi" required/>
								 <br><br>

								<?php foreach ($foto as $r): ?> 
								 
								<?php if(!empty($r->gambar1)): ?> 
								<img style="width:200px;length:200px;" src="<?php echo base_url("./upload/report/gambar/$r->gambar1"); ?>"><br><br>
								<?php endif ?>
								<label for="gambar">4. Upload Gambar Acara 1</label>
								<input class="form-control"
								 type="file" name="gambar1" required/>
								 <br><br>
								 

								<?php if(!empty($r->gambar2)): ?> 
								<img style="width:200px;length:200px;" src="<?php echo base_url("./upload/report/gambar/$r->gambar2"); ?>"><br><br>
								<?php endif ?>
								<label for="gambar">-  Upload Gambar Acara 2</label>
								<input class="form-control"
								 type="file" name="gambar2"  />
								<br><br>
								

								<?php if(!empty($r->gambar3)): ?> 
								<img style="width:200px;length:200px;" src="<?php echo base_url("./upload/report/gambar/$r->gambar3"); ?>"><br><br>
								<?php endif ?>
								<label for="gambar">-  Upload Gambar Acara 3</label>
								<input class="form-control"
								 type="file" name="gambar3"  />
								<br><br>
								

								<?php if(!empty($r->gambar4)): ?> 
								<img style="width:200px;length:200px;" src="<?php echo base_url("./upload/report/gambar/$r->gambar4"); ?>"><br><br>
								<?php endif ?>
								<label for="gambar">-  Upload Gambar Acara 4</label>
								<input class="form-control"
								 type="file" name="gambar4"  />
								<br><br>
								

								<?php if(!empty($r->gambar5)): ?> 
								<img style="width:200px;length:200px;" src="<?php echo base_url("./upload/report/gambar/$r->gambar5"); ?>"><br><br>
								<?php endif ?>
								<label for="gambar">-  Upload Gambar Acara 5</label>
								<input class="form-control"
								 type="file" name="gambar5"  />
								<br><br>
								

								<?php endforeach ?>

								 <input type="hidden" name="cek" value="cek">
								
							</div>
													
							<input class="btn btn-success" type="submit" name="btn" value="Update"  />					
						</form>
						<?php } ?>
						<br><br>
						<h5 style="font-weight: bolder; margin-top: 5px; "><strong style="font-size:24px; ">Cetak Sertifikat </strong></h5>
						<div id="content-wrapper">

						<p> Masukkan Nama Pejabat </p>
						<input type="text" name="pejabat" id="pejabat"> <br><br>

						<p> Masukkan Gelar/Pangkat Pejabat </p>
						<input type="text" name="gelar" id="gelar"><br><br>

						<p> Masukkan Lokasi Witel </p>
						<input type="text" name="witel" id="witel"><br><br>

						<form action="<?php echo site_url().'admin/overview/upload_sertif/'.$pengajuan->id_pengajuan?>" method="post" enctype="multipart/form-data" >			
						<label for="materi">Upload Background Sertifikat</label>
						<input class="form-control"
							type="file" name="sertif" required/>
						<br>
						<input type="hidden" name="cek" value="cek">
						<input class="btn btn-success" type="submit" name="btn" value="Upload Sertifikat"  />	
						<br><br><br>
						</form>
						

						<div class="container-fluid">							
							<!-- DataTables -->
							<div class="card mb-3" >
								<div class="card-body" >									
									<div class="table-responsive">
									<div class="custom-file" method="POST" style="width:220px; float:right;">
											
										</div>																				
										<table class="table table-hover" id="example" width="100%" cellspacing="0">
											<thead>
												<tr>
													<th>No.</th>
													<th>Nama</th>
													<th>Tanggal Tour</th>
													<th>Lokasi Tour</th>
													<th>Nama Sekolah</th>					
													<th>Printout Sertifikat</th>
												</tr>
											</thead>
											<tbody>	
											<?php
											if($dhadir!=null){
												$loc = $_SERVER['DOCUMENT_ROOT'].'/ICT/upload/report/daftar_siswa/'.$dhadir;
												include('SimpleXLSX.php'); ?>													
																								
												<?php												
												if(file_exists($loc)){
													if ( $xlsx = SimpleXLSX::parse($loc) ) {
														$i = 1;	
														$cek = 0;
														foreach ($xlsx->rows() as $row) :															 
														?>																						    																																				
														<tr>
														<?php if ($cek != 0 && ($row[1] && $row[2] && $row[3] && $row[4]) ): ?>
															<td>
																<?php echo $i++; ?>
															</td>
															<td>
																<?php echo $row[1]; ?>
															</td>
															<td>
																<?php echo $row[2];?>
															</td>
															<td>
																<?php echo $row[3]; ?>
															</td>
															<td>
																<?php echo $row[4]; ?>
															</td>	
															<form action="<?php echo site_url().'admin/overview/printout/'.$pengajuan->id_pengajuan?>" method="POST" target="_blank"> 
															<td>																													 
																<input type="hidden" name="nama_peserta" value="<?php echo $row[1] ?>" >
																<input type="hidden" name="tanggal_tour" value="<?php echo $row[2] ?>" >
																<input type="hidden" name="lokasi_tour"  value="<?php echo $row[3] ?>" >
																<input type="hidden" name="nama_sekolah" value="<?php echo $row[4] ?>" >	
																<input type="hidden" name="nama_pejabat" id=<?php echo "nama_pejabat".$i ?> value="" >	
																<input type="hidden" name="gelar_pejabat" id=<?php echo "gelar_pejabat".$i ?> value="" >		
																<input type="hidden" name="nama_witel" id=<?php echo "nama_witel".$i ?> value="" >	
																<input type="hidden" name="sertif" id=<?php echo "nama_sertif".$i ?> value="" >																
																<input Type="Submit" Name="Create_pdf" id=<?php echo "serti".$i ?> Class="Btn Btn-Danger" Value="Cetak Sertifikat" onclick="change(<?php echo $i ?>)" >															
															</td>	
															</form>																																									
														<?php endif ?>	
														<?php $cek++; ?>
														<?php endforeach ?>
														</tr>														
													<?php } else {
														echo SimpleXLSX::parseError();
													} ?>
												<?php } else {
														echo "File tidak ditemukan atau Admin belum melakukan report";
												} ?>
											<?php } else {
												echo "Admin belum melakukan report";
											} ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>

						</div>

						</div>
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

	function change(i) 
	{
    var elem = document.getElementById("serti"+i);
		if (elem.value=="Cetak Sertifikat") elem.value = "Sudah Dicetak";
		else elem.value = "Sudah Dicetak";

	var el = document.getElementById("pejabat");
	var em = document.getElementById("nama_pejabat"+i);
		if (em.value=="") em.value = el.value;
		else em.value = el.value;

	var gl = document.getElementById("gelar");
	var glp = document.getElementById("gelar_pejabat"+i);
		if (glp.value=="") glp.value = gl.value;
		else glp.value = gl.value;
	
	var wt = document.getElementById("witel");
	var nwt = document.getElementById("nama_witel"+i);
		if (nwt.value=="") nwt.value = wt.value;
		else nwt.value = wt.value;
	};


  </script>