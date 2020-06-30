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
        <link rel="stylesheet" href="http://localhost/ICT/css/font-awesome.min.css">
        <link rel="stylesheet" href="http://localhost/ICT/css/hero-slider.css">
        <link rel="stylesheet" href="http://localhost/ICT/css/templatemo-main.css">
        <link rel="stylesheet" href="http://localhost/ICT/css/owl-carousel.css">
        <link rel="stylesheet" href="http://localhost/ICT/css/home.css">
        <link rel="stylesheet" href="http://localhost/ICT/css/animate.min.css">

        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,600,700,800" rel="stylesheet">

        <script src="http://localhost/ICT/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
    <?php if ($this->session->userdata("user")['logged']): ?>
    <style type="text/css">
      body {
        background-image:url(../images/10.jpg);
      }
    </style>
    <?php else: ?>
      <style type="text/css">
      body {
        background-image:url(../images/1.jpg);
      }
    </style>
    <?php endif ?>
<body >
    <section>
        
        <div class="parallax-content baner-content" id="home">
            <div class="container">
            <?php if ($this->session->userdata("user")['logged']): ?>
              <h1 style="font-size: 75px">Selamat Datang </h1>
            <?php endif ?>
                <div class="first-content"> 
                <span><img src="../images/logo.jpg" style="margin-right:6em; border-radius:20px; width:280px; height:140px;"></span> 
                <h5  style="margin-left:3em; font-size:15px;"><strong>oleh</strong></h5>
                <span><img src="../images/telkom-logo.png" style="margin-left:5em; width:160px; height:90px;"></span>
                    <?php if ($this->session->userdata("user")['logged']): ?>
                        <div class="primary-button">
                            <a href="<?php echo base_url().'MainController/viewPengajuan';?>" style="background: #BD0306; border-radius: 8px;">Pengajuan ICT Tour</a>
                        </div>
                    <?php else: ?>
                    <div class="primary-button wow fadeInUp">
                        <a href="<?php echo base_url().'Login/inputlogin';?>" style="background: #D7D7D7; border: 2px solid #FFFFFF; box-sizing: border-box; border-radius: 8px; color:black;">Masuk</a>
                        <a href="<?php echo base_url().'Register/index';?>" style="background: #BD0306; border-radius: 8px;">Daftar</a>
                    </div>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </section>
    <section id="tutorial">
      <div class="owl-carousel tutorial-carousel">

      </div>
    </section>
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    
                </div> 
                <div class="col wow fadeInRight">
                <span><strong>Apa itu ICT Tour?</strong></span>
                <p>ICT Tour merupakan Program Study Tour yang diadakan oleh Indihome Study dengan tujuan untuk memberikan kesempatan siswa tingkat SD/SMP/SMA untuk mengunjungi kantor Datel, medapatkan simulasi Indihome Study dan sosialisasi Sobat Indihome</p>
                </div> 
            </div>      
        </div>
    </section>
    <section id="services">
        <div class="container">
            <div class="section-header">
                <h2><strong style="font-size:26px; border-bottom:2px solid white">Alur Pengajuan ICT Tour</strong></h2>
                <p>Berikut merupakan tahapan pengajuan ICT Tour</p>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="box wow fadeInLeft" >
                    <h4>Tahap 1</h4>
                    <p class="description">Daftarkan sekolah anda pada website ini dengan cara klik tombol daftar yang tersedia</p></br>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="box wow fadeInRight">
                    <h4>Tahap 2</h4>
                    <p class="description">Lakukan pengajuan dengan cara mengisi form pendaftaran yang sudah disediakan di dalam website dan pastikan semua syarat telah terpenuhi</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="box wow fadeInLeft" data-wow-delay="0.2s" >
                    <h4>Tahap 3</h4>
                    <p class="description">Hasil dari pengajuan akan ditinjau oleh pihak Telkom Regional dan akan diberikan pemberitahuan apabila pengajuan telah disetujui</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="box wow fadeInRight" data-wow-delay="0.2s" >
                    <h4>Tahap 4</h4>
                    <p class="description">Setelah melakukan kegiatan tur, jangan lupa untuk memberikan saran dan masukan terhadap ICT Tour untuk kedepannya</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="portfolio" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2 ><strong style="font-size:26px; border-bottom:2px solid red">Galeri Kegiatan</strong></h2>
          <p>Berikut ini merupakan kumpulan dokumentasi foto selama ICT Tour berlangsung</p>
        </div>
      </div>

      <div class="container-fluid">
        <div class="row no-gutters">

          <div class="col-lg-3 col-md-4">
            <div class="portfolio-item wow fadeInUp">
              <a href="../images/galery/1.jpg" class="portfolio-popup">
                <img src="../images/galery/1.jpg" alt="">
                <div class="portfolio-overlay">
                  <div class="portfolio-info"><h2 class="wow fadeInUp">Portfolio Item 1</h2></div>
                </div>
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="portfolio-item wow fadeInUp">
              <a href="../images/galery/4.jpg" class="portfolio-popup">
                <img src="../images/galery/4.jpg" alt="">
                <div class="portfolio-overlay">
                  <div class="portfolio-info"><h2 class="wow fadeInUp">Portfolio Item 2</h2></div>
                </div>
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="portfolio-item wow fadeInUp">
              <a href="../images/galery/2.jpg" class="portfolio-popup">
                <img src="../images/galery/2.jpg" alt="">
                <div class="portfolio-overlay">
                  <div class="portfolio-info"><h2 class="wow fadeInUp">Portfolio Item 3</h2></div>
                </div>
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="portfolio-item wow fadeInUp">
              <a href="../images/galery/3.jpg" class="portfolio-popup">
                <img src="../images/galery/3.jpg" alt="">
                <div class="portfolio-overlay">
                  <div class="portfolio-info"><h2 class="wow fadeInUp">Portfolio Item 4</h2></div>
                </div>
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="portfolio-item wow fadeInUp">
              <a href="img/portfolio/5.jpg" class="portfolio-popup">
                <img src="img/portfolio/5.jpg" alt="">
                <div class="portfolio-overlay">
                  <div class="portfolio-info"><h2 class="wow fadeInUp">Portfolio Item 5</h2></div>
                </div>
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="portfolio-item wow fadeInUp">
              <a href="img/portfolio/6.jpg" class="portfolio-popup">
                <img src="img/portfolio/6.jpg" alt="">
                <div class="portfolio-overlay">
                  <div class="portfolio-info"><h2 class="wow fadeInUp">Portfolio Item 6</h2></div>
                </div>
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="portfolio-item wow fadeInUp">
              <a href="img/portfolio/7.jpg" class="portfolio-popup">
                <img src="img/portfolio/7.jpg" alt="">
                <div class="portfolio-overlay">
                  <div class="portfolio-info"><h2 class="wow fadeInUp">Portfolio Item 7</h2></div>
                </div>
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="portfolio-item wow fadeInUp">
              <a href="img/portfolio/8.jpg" class="portfolio-popup">
                <img src="img/portfolio/8.jpg" alt="">
                <div class="portfolio-overlay">
                  <div class="portfolio-info"><h2 class="wow fadeInUp">Portfolio Item 8</h2></div>
                </div>
              </a>
            </div>
          </div>

        </div>

      </div>
    </section>

    <section id="testimonials" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Testimonials</h2>
          <p>Sed tamen tempor magna labore dolore dolor sint tempor duis magna elit veniam aliqua esse amet veniam enim export quid quid veniam aliqua eram noster malis nulla duis fugiat culpa esse aute nulla ipsum velit export irure minim illum fore</p>
        </div>
        <div class="owl-carousel testimonials-carousel">

            <div class="testimonial-item">
              <p>
                <img src="img/quote-sign-left.png" class="quote-sign-left" alt="">
                Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                <img src="img/quote-sign-right.png" class="quote-sign-right" alt="">
              </p>
              <img src="img/testimonial-1.jpg" class="testimonial-img" alt="">
              <h3>Saul Goodman</h3>
              <h4>Ceo &amp; Founder</h4>
            </div>

            <div class="testimonial-item">
              <p>
                <img src="img/quote-sign-left.png" class="quote-sign-left" alt="">
                Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                <img src="img/quote-sign-right.png" class="quote-sign-right" alt="">
              </p>
              <img src="img/testimonial-2.jpg" class="testimonial-img" alt="">
              <h3>Sara Wilsson</h3>
              <h4>Designer</h4>
            </div>

            <div class="testimonial-item">
              <p>
                <img src="img/quote-sign-left.png" class="quote-sign-left" alt="">
                Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                <img src="img/quote-sign-right.png" class="quote-sign-right" alt="">
              </p>
              <img src="img/testimonial-3.jpg" class="testimonial-img" alt="">
              <h3>Jena Karlis</h3>
              <h4>Store Owner</h4>
            </div>

            <div class="testimonial-item">
              <p>
                <img src="img/quote-sign-left.png" class="quote-sign-left" alt="">
                Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                <img src="img/quote-sign-right.png" class="quote-sign-right" alt="">
              </p>
              <img src="img/testimonial-4.jpg" class="testimonial-img" alt="">
              <h3>Matt Brandon</h3>
              <h4>Freelancer</h4>
            </div>

            <div class="testimonial-item">
              <p>
                <img src="img/quote-sign-left.png" class="quote-sign-left" alt="">
                Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
                <img src="img/quote-sign-right.png" class="quote-sign-right" alt="">
              </p>
              <img src="img/testimonial-5.jpg" class="testimonial-img" alt="">
              <h3>John Larson</h3>
              <h4>Entrepreneur</h4>
            </div>

        </div>

      </div>
    </section>

    <?php if ($this->session->userdata("user")['logged']): ?>
      <section id="review">
          <div class="container">
              <div class="section-header">
                  <h2>Review Pengajuan</h2>
                  <p>Sed tamen tempor magna labore dolore dolor sint tempor duis magna elit veniam aliqua esse amet veniam enim export quid quid veniam aliqua eram noster malis nulla duis fugiat culpa esse aute nulla ipsum velit export irure minim illum fore</p>
              </div>
              <div class="row">
                  <div class="col-lg-6">
                      <div class="box wow fadeInLeft" >
                      <h4>Page</h4>
                      </div>
                  </div>
                  <div class="col-lg-6">
                      <div class="box wow fadeInRight">
                      <h4>Page</h4>
                      </div>
                  </div>
                  <div class="col-lg-6">
                      <div class="box wow fadeInLeft" data-wow-delay="0.2s" >
                      <h4>Page</h4>
                      </div>
                  </div>
                  <div class="col-lg-6">
                      <div class="box wow fadeInRight" data-wow-delay="0.2s" >
                      <h4>Page</h4>
                      </div>
                  </div>
              </div>
          </div>
      </section>
    <?php endif ?>

    
</body>

<script src="http://localhost/ICT/script/wow.min.js"></script>
<script src="http://localhost/ICT/script/wow.js"></script>
<script src="http://localhost/ICT/script/main.js"></script>