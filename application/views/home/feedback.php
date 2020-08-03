<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
  

        <link rel="stylesheet" href="http://localhost/ICT/css/home.css?version=53">        
        <link rel="stylesheet" href="http://localhost/ICT/css/owl.carousel.min.css">
        <link rel="stylesheet" href="http://localhost/ICT/css/owlcarousel/assets/owl.theme.default.min.css">
        <link rel="stylesheet" href="http://localhost/ICT/css/ionicons.min.css">
        <link rel="stylesheet" href="http://localhost/ICT/css/hero-slider.css">
        <link rel="stylesheet" href="http://localhost/ICT/css/templatemo-main.css">
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.1/owl.carousel.min.js"></script>
        <script src="http://localhost/ICT/script/owl.carousel.min.js"></script>
        <script src="http://localhost/ICT/script/jquery-migrate.min.js"></script>
        <script src="http://localhost/ICT/script/bootstrap.bundle.min.js"></script>
        <script src="http://localhost/ICT/script/main.js?version=1"></script>

        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,600,700,800" rel="stylesheet">

        
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.1/assets/owl.carousel.min.css" rel="stylesheet" />
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

        <link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
        <link rel="stylesheet" type="text/css" href="css/owl.theme.default.css">
        
      
        <script type="text/javascript" src="script/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="script/owl.carousel.js"></script>
    </head>

<body>
<section class="wow fadeInRight" id="progress">
  <h5 style="font-weight: bolder; color: black; margin-top: 5px; "><strong style="border-bottom: 3px solid red; font-size:24px; ">Reporting</strong></h5>
  <?php foreach ($report as $row): ?>
    <h2 ><strong style="font-size: 30px; border-bottom:2px solid red">Download Daftar Hadir dan Materi</strong></h2>
    <a href="<?php echo base_url("./upload/report/daftar_hadir/$row->materi"); ?>" style="color: light-blue; text-decoration: none; font-size:15px; font-family: Lato;"><small><u>Unduh</u></small></a>
  <?php endforeach ?><br>
  <br><br>
  <section class="wow fadeInRight" id="portfolio" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2 ><strong style="font-size: 30px; border-bottom:2px solid red">Galeri Kegiatan</strong></h2>
          <p>Berikut ini merupakan kumpulan dokumentasi foto selama ICT Tour berlangsung</p>
        </div>
      </div>

      <div class="container-fluid">
        <div class="row no-gutters">
        <?php $i=0;?>
        <?php foreach ($foto as $r): ?>

        
          <div class="col-lg-3 col-md-4">
            <div class="portfolio-item wow fadeInUp">
              <a href="<?php echo base_url("./upload/report/gambar/$r->foto_report"); ?>" class="portfolio-popup">
                <img src="<?php echo base_url("./upload/report/gambar/$r->foto_report"); ?>"  alt="Tanggal Diupload : <?php echo $r->tanggal_upload; ?>">
              </a>
            </div>
          </div>
        <?php endforeach; ?>
        </div>

      </div>
    </section>
  

  
  <h5 style="font-weight: bolder; color: black; margin-top: 5px; "><strong style="border-bottom: 3px solid red; font-size:24px; ">Feedback</strong></h5></br></br>
     <?php // form_open(base_url('MainController/register')); ?> 
     <form method="post">
        <p style="margin-bottom:0px;">Tingkat kepuasan selama menjalani ICT Tour</p>
        <div class="form-check form-check-inline" style="margin-left:20px;">
          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
          <div class="row" style="margin-top:2.5em;"><label class="form-check-label" for="inlineRadio1" style="font-size:14px;">1</label></div>
        </div>
        <div class="form-check form-check-inline" style="margin-left:40px;">
          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
          <div class="row" style="margin-top:2.5em;"><label class="form-check-label" for="inlineRadio2" style="font-size:14px;">2</label></div>
        </div>
        <div class="form-check form-check-inline" style="margin-left:40px;">
          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
          <div class="row" style="margin-top:2.5em;"><label class="form-check-label" for="inlineRadio3" style="font-size:14px;">3</label></div>
        </div>
        <div class="form-check form-check-inline" style="margin-left:40px;">
          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio4" value="option4">
          <div class="row" style="margin-top:2.5em;"><label class="form-check-label" for="inlineRadio4" style="font-size:14px;">4</label></div>
        </div>
        <div class="form-check form-check-inline" style="margin-left:40px;">
          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio5" value="option5">
          <div class="row" style="margin-top:2.5em;"><label class="form-check-label" for="inlineRadio5" style="font-size:14px;">5</label></div>
        </div>
          <div class="form-group"><br><br>
          <label>Ulasan untuk ICT Tour</label>
            <input type="text-lg" class="form-control" id="saran" name="saran" >           
          </div>
          <div class="col-md-12" style="margin-left:97em; margin-bottom:20em; margin-top:2em;">
          <button type="submit" name="login" class="btn btn-outline-dark" style="background: #BD0306; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 7px;font-weight: bold; font-size: 20px; font-family: Lato; color:white; ">Kirim</button>              
          </div>             
        </form>
  </section>
</body>
</html>