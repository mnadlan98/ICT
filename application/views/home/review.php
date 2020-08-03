<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Welcome</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="http://localhost/ICT/css/bootstrap.min.css">
        <link rel="stylesheet" href="http://localhost/ICT/css/fontAwesome.css">
        <link rel="stylesheet" href="http://localhost/ICT/css/hero-slider.css">
        <link rel="stylesheet" href="http://localhost/ICT/css/templatemo-main.css">
        <link rel="stylesheet" href="http://localhost/ICT/css/owl-carousel.css">
        <link rel="stylesheet" href="http://localhost/ICT/css/review.css">
        <link rel="stylesheet" href="http://localhost/ICT/css/stepbar.css">

        <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>       
    </head>
   

<body >
    <?php if ($this->session->flashdata('setuju')) { ?>
      <div class="alert alert-success"> <?= $this->session->flashdata('setuju') ?> </div>
    <?php } ?>
    <?php if ($this->session->flashdata('tolak')) { ?>   
      <div class="alert alert-danger"> <?= $this->session->flashdata('tolak') ?> </div>
    <?php } ?>
    <section class="wow fadeInRight" id="progress">
      <div class="section-header">
        <h2 ><strong style="font-size: 30px; border-bottom:2px solid red">Progress Pengajuan</strong></h2>
        <p>Tinjau progress pengajuan</p>
      </div>
            <div class="row bs-wizard" style="border-bottom:0;">
                
                <div class=<?php echo $status[0] ?> >
                  <div class="text-center bs-wizard-stepnum">Tahap 1</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center">Pengajuan</div>
                </div>
                
                <div class=<?php echo $status[1] ?>>
                  <div class="text-center bs-wizard-stepnum">Tahap 2</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center">Verifikasi</div>
                </div>
                
                <div class=<?php echo $status[2] ?>>
                  <div class="text-center bs-wizard-stepnum">Tahap 3</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center">Persetujuan</div>
                </div>
                
                <div class=<?php echo $status[3] ?>>
                  <div class="text-center bs-wizard-stepnum">Tahap 4</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center">Hasil Pengajuan</div>
                </div>
            </div>   
	     </div>
      <br><br><br><br>
      <div class="row">
        
        <div class="col-lg-3">
            <div class="box wow fadeInLeft" >
            <h4>Tahap 1</h4>
            <p class="description">Pengajuan berhasil dibuat dan sedang dalam proses review</p><br>
            </div>
        </div>
        <div class="col-lg-3">
          <div class="box wow fadeInRight">
          <h4>Tahap 2</h4>
          <p class="description">Telkom telah menetapkan tanggal pelaksanaan, silahkan melakukan persetujuan ditabel dibawah ini.</p><br>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="box wow fadeInLeft" data-wow-delay="0.2s" >
          <h4>Tahap 3</h4>
          <p class="description">Persetujuan Akhir dari pihak Telkom</p>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="box wow fadeInRight" data-wow-delay="0.2s" >
          <h4>Tahap 4</h4>
          <?php 
          if($status[4] == 4){
            $rs = "Pengajuan telah disetujui pihak Telkom";
          }else if ($status[4] == 5){
            $rs = "Maaf, Persetujuan yang anda buat tidak disetujui pihak Telkom";
          }else{
            $rs = "Pengajuan telah disetujui atau ditolak";
          }
          ?>
          <p class="description"><?php echo $rs ?></p><br>
          </div>
        </div>
      </div>
      </br><br>
   
        
      <section id="review">
          <div class="section-header">
            <h2 ><strong style="color:black;  margin-left: 10px;">Status Pengajuan</strong></h2><br>
          </div>
          <?php $no=1; ?>        
          <?php foreach ($profil as $row): ?> 
          <div class="row" style="margin-left: 10px;">
          <div class="card-body">
                                  <div class="table-responsive">
                                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                      <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Jumlah Siswa</th>
                                                <th>Pembimbing 1</th>
                                                <th>Pembimbing 2</th>                                              
                                                <th>Kota/Kabupaten</th>
                                                <th>Witel</th>
                                                <th>Datel</th>
                                                <th>STO</th>
                                                <th>Tanggal Pengajuan Dibuat</th>                                            
                                                <th>Tanggal Pengajuan Pelaksanaan</th>
                                                <th>Tanggal Persetujuan Pelaksanaan</th>
                                                <th>Persetujuan Sekolah</th> 
                                                <th>Status Pengajuan</th>
                                                <?php if ($row->approved==0){ ?>
                                                <th>Aksi</th>
                                                <?php } ?>
                                            </tr>
                                        </thead>
                                        <?php foreach ($profil as $row): ?>
                                        <tbody>                                           
                                            <tr>
                                                <td><?php echo $no ?> </td>
                                                <td><?php echo $row->jumlah_siswa ?></td>
                                                <td><?php echo $row->pembimbing1 ?></td>
                                                <td><?php echo $row->pembimbing2 ?></td>                       
                                                <td><?php echo $row->wilayah ?></td>
                                                <td><?php echo $row->nama_witel ?></td>
                                                <td><?php echo $row->datel ?></td>
                                                <td><?php echo $row->keterangan ?></td>
                                                
                                                <td><?php echo $row->tanggal_pengajuan ?></td>
                                                <td><?php echo $row->tanggal_pelaksanaan ?></td>
                                                <td><?php echo $row->tanggal_persetujuan ?></td>
                                                <?php if($row->approved == 0){
                                                  $setuju = "Belum Disetujui";
                                                }else if($row->approved == 1){
                                                  $setuju = "Ditolak";
                                                }else{
                                                  $setuju = "Disetujui";
                                                } ?>
                                                <td><?php echo $setuju; ?></td>                                            
                                                <?php 
                                                $cek = (int)$row->status_pengajuan;
                                                if($cek == 1){
                                                  $stat = "Diajukan";
                                                }else if($cek == 2){
                                                  $stat = "Verifikasi";                                                 
                                                }else if($cek == 3){
                                                  $stat = "Persetujuan";
                                                }else if($cek == 4){
                                                  $stat = "Pengajuan Diterima";
                                                }else if($cek == 5){
                                                  $stat = "Pengajuan Ditolak";
                                                }else if($cek == 6){
                                                  $stat = "Acara Selesai";
                                                }
                                                ?>
                                                <td><?php echo $stat ?></td>
                                                
                                                <?php endforeach; ?>
                                                <?php endforeach; ?> 
                                                <?php if ($row->approved==0 && $row->status_pengajuan==2){ ?>
                                                  <td>                                                   
                                                    <a data-toggle="modal" data-target="#modalSetuju" class="btn btn-success">Setuju</a>
                                                    <a data-toggle="modal" data-target="#modalTolak" class="btn btn-danger">Tolak</a>
                                                  </td>
                                                
                                                <?php } ?>
                                                
                                            </tr>
                                        </tbody>
                                      </table>
                                  </div>
                              </div>
          </div>     
          </section>
      <div class="modal fade" id="modalTolak" role="dialog" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title modal-title-centered">Alasan Tidak Menyetujui</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                      <form id="form" action="<?= site_url('MainController/review') ?>" method="POST">                     
                      <div class="form-group">
                          <div>
                              <input type="text" name="alasan" placeholder="Tulis di sini..." >
                          </div>
                      </div>
                      <div class="form-group">
                          <div>
                            <input type="hidden" name="status" value="1">
                              <button type="submit" name="status" class="btn btn-success" value="1">
                                  Submit
                              </button>
                          </div>
                      </div>
                      </form>
                  </div>
                </div>
              </div>
      </div>

      <div class="modal fade" id="modalSetuju" role="dialog" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title modal-title-centered">Apakah Anda Yakin ?</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                      <form id="form" action="<?= site_url('MainController/review') ?>" method="POST">                    
                      <div class="form-group">
                          <div>
                              <input type="hidden" name="status" value="2">
                              <button type="submit"  class="btn btn-success" >
                                  Submit
                              </button>
                          </div>
                      </div>
                      </form>
                  </div>
                </div>
              </div>
      </div>
</body>



