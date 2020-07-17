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
        <link rel="stylesheet" href="http://localhost/ICT/css/profil.css?version=51">
        <link rel="stylesheet" href="http://localhost/ICT/css/animate.min.css">
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>

        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,600,700,800" rel="stylesheet">

        <script src="http://localhost/ICT/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
        <style type="text/css">
          label{color: #222;font-weight: bolder;}
          input{height: 3.3em !important;}
          .btn:hover{height: 3.3em !important;}
        </style>
    </head>

<body>
    <?php $str=explode('@',$this->session->userdata('email_user'))?>
    <section>
      <div class="container-fluid">
        <h5 style="font-weight: bolder; color: white; margin-top: 5px; "><strong style="border-bottom: 3px solid red; font-size:24px; ">Profil</strong></h5></br></br>
        <div class="row">
          <div class="col-md-2">
            <img src="../images/avatar.png">
            <div class="form-group row" style="margin-top: 20px; color:white;">
                <a type="button" class="btn btn-success btn-lg"  style="margin-left:7em;" href="<?php echo site_url()."MainController/editProfile"?>" >Edit Profil</a>

                
            </div>
          </div>  
          <div class="col-lg-4">
            <p style="font-size: 15px; border-bottom:1px solid gray; color: white">Nama : <?= $this->session->userdata("user")['nama_user'] ?></p>
            <p style="font-size: 15px; border-bottom:1px solid gray; color: white">Email : <?= $this->session->userdata("user")['email_user'] ?></p>
            <p style="font-size: 15px; border-bottom:1px solid gray; color: white">No. Telepon : <?= $this->session->userdata("user")['notelp_user'] ?></p>
            <p style="font-size: 15px; border-bottom:1px solid gray; color: white">Nama Sekolah : <?= $this->session->userdata("user")['nama_sekolah'] ?></p>
            <p style="font-size: 15px; border-bottom:1px solid gray; color: white">Email Sekolah : <?= $this->session->userdata("user")['email_sekolah'] ?></p>
            <p style="font-size: 15px; border-bottom:1px solid gray; color: white">No. Telepon Sekolah : <?= $this->session->userdata("user")['notelp_sekolah'] ?></p>
          </div>
        </div>
      </div>
    </section>
      
    

      <section id="review">
        <div class="section-header">
          <h2 ><strong style="color:black;  margin-left: 10px;">Riwayat Pengajuan</strong></h2>
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
                                                <th>Tanggal Pelaksanaan</th>
                                                <th>Kota/Kabupaten</th>
                                                <th>Datel</th>
                                                <th>Witel</th>
                                                <th>Tanggal Pengajuan</th>
                                                <th>Status Pengajuan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $no ?> </td>
                                                <td><?php echo $row->jumlah_siswa ?></td>
                                                <td><?php echo $row->pembimbing1 ?></td>
                                                <td><?php echo $row->pembimbing2 ?></td>
                                                <td><?php echo $row->tanggal_pelaksanaan ?></td>
                                                <td><?php echo $row->nama_kotakab ?></td>
                                                <td><?php echo $row->nama_datel ?></td>
                                                <td><?php echo $row->nama_witel ?></td>
                                                <td><?php echo $row->tanggal_pengajuan ?></td>
                                                <?php 
                                                $cek = (int)$row->status_pengajuan;
                                                if($cek == 1){
                                                  $stat = "Pengajuan";
                                                }else if($cek == 2){
                                                  $stat = "Tahap Review";                                                 
                                                }else if($cek == 3){
                                                  $stat = "Verifikasi Pengajuan";
                                                }else if($cek == 4){
                                                  $stat = "Pengajuan Diterima";
                                                }else if($cek == 5){
                                                  $stat = "Pengajuan Ditolak";
                                                }
                                                ?>
                                                <td><?php echo $stat ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
        </div>
        <?php $no++; ?>
        <?php endforeach; ?>
        </section>
    


</body>


<script src="http://localhost/ICT/script/wow.min.js"></script>
<script src="http://localhost/ICT/script/wow.js"></script>
<script src="http://localhost/ICT/script/main.js"></script>
<script src="http://localhost/ICT/script/datatables-demo.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        