<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="http://localhost/ICT/css/bootstrap.min.css">
        <link rel="stylesheet" href="http://localhost/ICT/css/fontAwesome.css">
        <link rel="stylesheet" href="http://localhost/ICT/css/hero-slider.css">
        <link rel="stylesheet" href="http://localhost/ICT/css/templatemo-main.css">
        <link rel="stylesheet" href="http://localhost/ICT/css/owl-carousel.css">
        <link rel="stylesheet" href="http://localhost/ICT/css/home.css">

        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,600,700,800" rel="stylesheet">

        <script src="http://localhost/ICT/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>

<body>
    <div class="parallax-content baner-content" id="home">
        <div class="container">
        
            <div class="first-content">
                <div>
                <h1 style="font-size: 75px;"></h1>
        </div>
                <span><img src="../images/logo.jpg" style="position: absolute; left: 26.15%; right: 49.22%; top: 17.22%; bottom: 50.65%; border-radius:20px; width:280px; height:140px;"></span> 
                <h5  style="position: absolute; left: 38%; right: 49.22%; top: 29%; bottom: 50.65%; border-radius:20px; width:280px; height:140px;"><strong>oleh</strong></h5>
                <span><img src="../images/telkom-logo.png" style="position: absolute; left: 48.7%; right: 39.27%; top: 28%; bottom: 44.07%; width:160px; height:80px;"></span>
                <?php if ($this->session->userdata("user")['logged']): ?>
                  <div class="primary-button">
                    <a href="<?php echo base_url().'MainController/viewPengajuan';?>" style="background: #BD0306; border-radius: 8px;">Pengajuan ICT Tour</a>
                </div>
                <?php else: ?>
                <div class="primary-button">
                    <a href="<?php echo base_url().'Login/inputlogin';?>" style="background: #D7D7D7; border: 2px solid #FFFFFF; box-sizing: border-box; border-radius: 8px; color:black;">Masuk</a>
                    <a href="<?php echo base_url().'Register/index';?>" style="background: #BD0306; border-radius: 8px;">Daftar</a>
                </div>
                <?php endif ?>
            </div>
        </div>
    </div>

