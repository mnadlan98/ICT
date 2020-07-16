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
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,600,700,800" rel="stylesheet">
        
    </head>
    

<body >
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
                  <div class="bs-wizard-info text-center">Review Pengajuan</div>
                </div>
                
                <div class=<?php echo $status[2] ?>>
                  <div class="text-center bs-wizard-stepnum">Tahap 3</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center">Verifikasi Pengajuan</div>
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
            <p class="description">Pengajuan berhasil dibuat</p><br>
            </div>
        </div>
        <div class="col-lg-3">
          <div class="box wow fadeInRight">
          <h4>Tahap 2</h4>
          <p class="description">Pengajuan sudah kami terima dan dalam tahap review</p><br>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="box wow fadeInLeft" data-wow-delay="0.2s" >
          <h4>Tahap 3</h4>
          <p class="description">Pengajuan sudah direview dan diperlukan konfirmasi dari kedua pihak</p>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="box wow fadeInRight" data-wow-delay="0.2s" >
          <h4>Tahap 4</h4>
          <p class="description">Pengajuan telah disetujui atau ditolak</p><br>
          </div>
        </div>
      </div>
      </br><br>
    </section>
</body>

