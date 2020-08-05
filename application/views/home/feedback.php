<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
     
        <link rel="stylesheet" href="<?php echo base_url()?>css/owl.carousel.min.css">
        <link rel="stylesheet" href="<?php echo base_url()?>css/owlcarousel/assets/owl.theme.default.min.css">
        <link rel="stylesheet" href="<?php echo base_url()?>css/ionicons.min.css">
        <link rel="stylesheet" href="<?php echo base_url()?>css/hero-slider.css">
        <link rel="stylesheet" href="<?php echo base_url()?>css/templatemo-main.css">
        <link rel="stylesheet" href="<?php echo base_url()?>css/feedback.css?version=5">
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.1/owl.carousel.min.js"></script>
        <script src="<?php echo base_url()?>script/owl.carousel.min.js"></script>
        <script src="<?php echo base_url()?>script/jquery-migrate.min.js"></script>
        <script src="<?php echo base_url()?>script/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url()?>script/main.js?version=1"></script>

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
    <?php if ($this->session->flashdata('msg')) { ?>
      <div class="alert alert-success"> <?= $this->session->flashdata('msg') ?> </div>
    <?php } ?>
  <div style="  margin-top:20px;"> 
    <div class="container">
    <h5 style="font-weight: bolder; color: black; margin-top: 5px; "><strong style="border-bottom: 3px solid red; font-size:25px; ">Reporting & Feedback</strong></h5>
      <?php foreach ($report as $row): ?>
        <h2 ><strong style="font-size: 18px;">Download Daftar Hadir </strong></h2>
        <a class="btn2" href="<?php echo base_url("./upload/report/daftar_hadir/$row->daftar_siswa"); ?>" style="background-color:#BD0306; text-decoration: none; text-align:center;">Unduh</a><br><br>
        <h2 ><strong style="font-size: 18px;">Download Materi </strong></h2>
        <a class="btn1" href="<?php echo base_url("./upload/report/materi/$row->daftarmateri"); ?>" style="background-color:#BD0306; text-decoration: none; text-align:center;">Unduh</a>
      <?php endforeach ?>
      <div style="margin-top:7em;">
        <div>
          <div >
            <h2 ><strong style="font-size: 18px;">Galeri Kegiatan</strong></h2>
            <p>Berikut ini merupakan kumpulan dokumentasi foto selama ICT Tour berlangsung</p>
          </div>
        </div>
        <div class="container-fluid">
        <div id="carouselExampleControls" class=" carousel slide" data-ride="carousel">
        
          <div class="carousel-inner" >
          <div class="carousel-item active" >
              <a href="../images/galery/header.jpg">
                  <img   class="img-responsive center-block" src="../images/galery/header.jpg" alt="" style="width:100%;">
                  <div class="carousel-caption d-none d-md-block">           
                  </div>
                </a>
            </div>
            <?php $i=0;?>
            <?php foreach ($report as $r): ?>
            <div class="carousel-item" >
            <a href="<?php echo base_url("./upload/report/gambar/$r->gambar1"); ?>" class="portfolio-popup">
                  <img style="width:300px;" src="<?php echo base_url("./upload/report/gambar/$r->gambar1"); ?>">                 
                </a>   
            </div>

            <?php if(!empty($r->gambar2)): ?> 
            <div class="carousel-item" >
            <a href="<?php echo base_url("./upload/report/gambar/$r->gambar2"); ?>" class="portfolio-popup">
                  <img style="width:300px;" src="<?php echo base_url("./upload/report/gambar/$r->gambar2"); ?>">                 
                </a>   
            </div>
            <?php endif ?>

            <?php if(!empty($r->gambar3)): ?> 
            <div class="carousel-item" >
            <a href="<?php echo base_url("./upload/report/gambar/$r->gambar3"); ?>" class="portfolio-popup">
                  <img style="width:300px;" src="<?php echo base_url("./upload/report/gambar/$r->gambar3"); ?>">                 
                </a>   
            </div>
            <?php endif ?>

            <?php if(!empty($r->gambar4)): ?> 
            <div class="carousel-item" >
            <a href="<?php echo base_url("./upload/report/gambar/$r->gambar4"); ?>" class="portfolio-popup">
                  <img style="width:300px;" src="<?php echo base_url("./upload/report/gambar/$r->gambar4"); ?>">                 
                </a>   
            </div>
            <?php endif ?>

            <?php if(!empty($r->gambar5)): ?> 
            <div class="carousel-item" >
            <a href="<?php echo base_url("./upload/report/gambar/$r->gambar5"); ?>" class="portfolio-popup">
                  <img style="width:300px;" src="<?php echo base_url("./upload/report/gambar/$r->gambar5"); ?>">                 
                </a>   
            </div>
            <?php endif ?>

          <?php endforeach ?>
          </div>
          
          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
      </div>
      
      <form action="<?php echo site_url().'MainController/Feedback' ?>" method="post" enctype="multipart/form-data" >
        <div class="row">
          <div class="col-sm-6" style="margin-bottom:3em;">
          <h2 style="font-size:18px; font-weight:bold; margin-top:3em;">Rating</h2>
          <p style="margin-top:5px;">Tingkat kepuasan selama menjalani ICT Tour</p>
            <div class="form-check form-check-inline" style="margin-left:20px;">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="1">
              <div class="row" style="margin-top:2.5em;"><label class="form-check-label" for="inlineRadio1" style="font-size:15px;">1</label></div>
            </div>
            <div class="form-check form-check-inline" style="margin-left:45px;">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="2">
              <div class="row" style="margin-top:2.5em;"><label class="form-check-label" for="inlineRadio2" style="font-size:15px;">2</label></div>
            </div>
            <div class="form-check form-check-inline" style="margin-left:45px;">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="3">
              <div class="row" style="margin-top:2.5em;"><label class="form-check-label" for="inlineRadio3" style="font-size:15px;">3</label></div>
            </div>
            <div class="form-check form-check-inline" style="margin-left:45px;">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio4" value="4">
              <div class="row" style="margin-top:2.5em;"><label class="form-check-label" for="inlineRadio4" style="font-size:15px;">4</label></div>
            </div>
            <div class="form-check form-check-inline" style="margin-left:45px;">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio5" value="5">
              <div class="row" style="margin-top:2.5em;"><label class="form-check-label" for="inlineRadio5" style="font-size:15px;">5</label></div>
            </div>
            </div>
        </div>
            <div class="form-group col-sm-7 ">
              <div class="row">
                <label style="font-size:18px;">Ulasan untuk ICT Tour</label>
                <textarea type="text" class="form-control" rows="4" cols="70" id="saran" name="saran" ></textarea>  
              </div>         
              <div class="row" style=" margin-bottom:10em; margin-top:2em;">
                <button type="submit" name="login" class="btn" style="border-radius:30px;">Kirim</button>              
              </div>       
            </div>      
      </form>
    </div>
  </div>
</body>
</html>