<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
  

        <link rel="stylesheet" href="http://localhost/ICT/css/home.css?version=59">        
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
    <?php if (isset($this->session->userdata("user")['logged'])): ?>
    <style type="text/css">
      body {
        background-image:url(../images/home.jpg);
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
    <section id="home">
        <?php if ($this->session->flashdata('msg')): ?>
          <div class="alert alert-success" role="alert">
            <?php print_r($this->session->flashdata('msg')) ; ?>
           </div>
        <?php endif ?>
        <div class="parallax-content baner-content" >
            <div class="container">
            <?php if (isset($this->session->userdata("user")['logged'])): ?>
              <h1 class="wow fadeInDown headname" style="font-size: 5vw; color:black;">Selamat Datang <?= $this->session->userdata("user")['nama_user'] ?>!</h1>
            <?php endif ?>
                <div class="first-content"> 
                <span class="wow fadeInLeft" data-wow-delay="0.5s"><img class="logo" src="../images/logo.png" style=""></span> 
                
                    <?php if (isset($this->session->userdata("user")['logged'])): ?>
                        <div class="primary-button wow fadeInUp" data-wow-delay="1s" style="margin-top:5em;" >
                            <a class="btn1" href="<?php echo base_url().'Pengajuan/index';?>" style="padding:12px; font-size:15px; text-transform: capitalize;" >Pengajuan ICT Tour</a>
                        </div>
                    <?php else: ?>
                    <div class="primary-button wow fadeInUp" data-wow-delay="1.5s" >
                        <a class="btn mr-auto" href="<?php echo base_url().'Login/index';?>" style="padding:8px; font-size:15px; text-transform: capitalize;">Masuk</a>
                        <a class="btn ml-auto" href="<?php echo base_url().'Register/index';?>" style="padding:8px; font-size:15px; text-transform: capitalize;">Daftar</a>
                    </div>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </section>

    <section class="wow fadeInRight" id="about">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <img src="../images/trip2.png" style="max-width:500px; width:100%;">
                </div> 
                <div class="col">
                <span class="wow fadeInRight"><strong style="font-size:34px">Apa itu ICT Tour?</strong></span>
                <p class="wow fadeInRight" data-wow-delay="0.5s" >ICT Tour merupakan Program Study Tour yang diadakan oleh Indihome Study dengan tujuan untuk memberikan kesempatan siswa tingkat SD/SMP/SMA untuk mengunjungi kantor Datel, medapatkan simulasi Indihome Study dan sosialisasi Sobat Indihome</p>
                </div> 
            </div>      
        </div>
    </section>
    <section class="wow fadeInLeft" id="services">
        <div class="container">
            <div class="section-header">
                <h2><strong style="font-size: 30px; border-bottom:2px solid white">Alur Pengajuan ICT Tour</strong></h2>
                <p>Berikut merupakan tahapan pengajuan ICT Tour</p>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="box wow fadeInLeft" >
                      <div class="row">
                        <div class="col-sm-2"><img src="../images/icon/regis.svg" style="margin-top:10px; width:120px;"></div>
                        <div class="col">
                          <h4>Tahap 1</h4>
                          <p class="description">Daftarkan sekolah anda pada website ini dengan cara klik tombol daftar yang tersedia</p></br>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="col-lg-6">
                  <div class="box wow fadeInRight">
                    <div class="row">
                      <div class="col-sm-2"><img src="../images/icon/submit.svg" style="margin-top:10px; width:120px;"></div>
                        <div class="col">
                          <h4>Tahap 2</h4>
                          <p class="description">Lakukan pengajuan dengan cara mengisi form pendaftaran yang sudah disediakan di dalam website dan pastikan semua syarat telah terpenuhi</p>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6">
                    <div class="box wow fadeInLeft" data-wow-delay="0.2s" >
                    <div class="row">
                      <div class="col-sm-2"><img src="../images/icon/approved.svg" style="margin-top:10px; width:120px;"></div>
                        <div class="col">
                          <h4>Tahap 3</h4>
                          <p class="description">Hasil dari pengajuan akan ditinjau oleh pihak Telkom Regional dan akan diberikan pemberitahuan apabila pengajuan telah disetujui</p>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="box wow fadeInRight" data-wow-delay="0.2s" >
                    <div class="row">
                        <div class="col-sm-2"><img src="../images/icon/prepare.svg" style="margin-top:10px; width:120px;"></div>
                        <div class="col">
                          <h4>Tahap 4</h4>
                          <p class="description">Setelah pengajuan disetujui, persiapkan siswa untuk melakukan ICT Tour</p></br>
                        </div>
                      </div>                    
                    </div>
                </div>
            </div>
        </div>
    </section>

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
        <?php foreach ($galeri as $l):
          ?>
        
          <div class="col-lg-3 col-md-4">
            <div class="portfolio-item wow fadeInUp">
              <a href="../images/galery/<?php echo $l->foto ?>" class="portfolio-popup">
                <img src="../images/galery/<?php echo $l->foto ?>" alt="">
                <div class="portfolio-overlay">
                  <div class="portfolio-info"><h2 class="wow fadeInUp"><?php echo $l->judul ?></h2></div>
                </div>
              </a>
            </div>
          </div>
        <?php endforeach; ?>
        </div>

      </div>
    </section>

    <section id="testimonials" class="wow fadeInLeft">
      <div class="container">
        <div class="section-header">
        <?php 
          $cek = 0;
          $no = 0;
          $rating = 0;
          foreach ($feedback as $row): 
            $cek = $cek+$row->rating;
            $no++;
          endforeach;
          $ovstar = '';
          if(!empty($feedback)){
            $rating = $cek/$no;
            $loop = floor($rating);
            for($i=0; $i<$loop; $i++):
              $ovstar = $ovstar.'★';
            endfor;
          }
         
          

        ?>
  
        <h2 ><strong style="font-size: 30px; border-bottom:2px solid red">Feedback</strong> </h2>
        <h3><strong style="font-size: 30px;">Overall Rating : <?php echo $ovstar." ".$rating ?></strong> </h2>
          <p>Apa kata mereka yang sudah mengikuti ICT Tour?</p>
        </div>
        <div class="owl-carousel testimonial-carousel">
            <?php $k = 0; ?>
            <?php foreach ($feedback as $row): ?>         
            <div class="testimonial-item">   
              <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png" class="testimonial-img" alt=""><br><br>                                 
              <p> <?php echo substr($row->komen,0,100); 
                        if(strlen($row->komen)>100){
                          echo '... <br> <a href="#"  data-toggle="modal" data-target="#modal'.$k.'">Read More</a>';
                        }
                         ?> </p><br>
              <h3> <?php echo $row->nama_user; ?> </h3>
              <h4> <?php echo $row->nama_sekolah; ?> </h4>
              <?php $star = ''; ?>
              <?php for($i=0; $i<$row->rating; $i++):
                  $star = $star.'★';

                endfor;?>   
              <p> <?php echo $star ?> </p>          
            </div>
            <?php $k++; ?>
            <?php endforeach; ?>
        </div>
    </section>
    <?php $i = 0; ?> 
    <?php foreach ($feedback as $row): ?> 
      <?php $star = ''; ?>
              <?php for($b=0; $b<$row->rating; $b++):
                  $star = $star.'★';
                endfor;?>     
          <div class="modal"  role="dialog" id=<?php echo '"modal'.$i.'"'; ?>>
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png" class="testimonial-img" width="100px" height="100px" alt=""><hr>
                    <h4 class="modal-title modal-title-centered"><?php echo $row->nama_user."<br>".$row->nama_sekolah."<br>".$star; ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p><?php echo $row->komen ?></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php $i++; ?>
    <?php endforeach; ?>
    

    
    
    <section id="contact" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2 ><strong style="font-size: 30px; border-bottom:2px solid red">Kontak Kami</strong></h2>
          <p>Tiap witel dapat dihubungi pada kontak berikut</p>
        </div>
        
        
        
        <button type="button" class="collapsible" style="background-color:white; color:black;">Kontak Setiap Witel</button>
        
        
        <div class="content">
        <div class="row contact-info">
        <div class="col-sm-3"><i class="icon"><img src="../images/icon/office.svg" style="max-width:50px; width:100%;"></i><h3  >Nama Witel</h3></div>
        <div class="col-sm-3"><i class="icon"><img src="../images/icon/location.svg" style="max-width:50px; width:100%;"></i><h3 >Alamat</h3></div>
        <div class="col-sm-3"><i class="icon"><img src="../images/icon/phone.svg" style="max-width:50px; width:100%;"></i><h3>Nomor Telepon</h3></div>
        <div class="col-sm-3"><i class="icon"><img src="../images/icon/email.svg" style="max-width:50px; width:100%;"></i><h3>Email</h3></div>
        </div>
        <?php
            $no = 1;
            foreach($kontak as $u){
        ?>
        <div class="row contact-info">
          <div class="col-md-3">
            <div class="contact-address">           
              <address><?php echo $u->nama_witel?></address>
            </div>
          </div>

          <div class="col-md-3">
            <div class="contact-address">            
              <address><?php echo $u->alamat_witel?></address>
            </div>
          </div>

          <div class="col-md-3">
            <div class="contact-phone">             
              <p><a href="#"><?php echo $u->no_telp_witel?></a></p>
            </div>
          </div>

          <div class="col-md-3">
            <div class="contact-email">
              
              
              <p><a href="#"><?php echo $u->email_witel?></a></p>
            </div>
          </div>
          </div>
          <?php } ?>
        </div>
      
        
      </div>
    </section>
    
    <a id="back-to-top" href="#" class="btn btn-dark btn-lg back-to-top" role="button" style="position: fixed;bottom: 25px;right: 25px;"><i class="fas fa-chevron-up"></i></a>

    
</body>

<script type="text/javascript">

    $('.owl-carousel').owlCarousel({
        items:3,
        loop:true,
        margin:10,
        autoplay:true,
        autoplayTimeout:5300,
        autoplayHoverPause:true,
        autoplaySpeed:6000  
    });

    $(window).scroll(function () {
      if ($(this).scrollTop() > 100) {
      $('#back-to-top').fadeIn('slow');
      } else {
      $('#back-to-top').fadeOut('slow');
      }
    });
    $('#back-to-top').click(function () {
      $('html, body').animate({
      scrollTop: 0
      }, 1500, 'easeInOutExpo');
      return false;
	});
</script>
<script>
  var coll = document.getElementsByClassName("collapsible");
  var i;

  for (i = 0; i < coll.length; i++) {
    coll[i].addEventListener("click", function() {
      this.classList.toggle("active");
      var content = this.nextElementSibling;
      if (content.style.display === "block") {
        content.style.display = "none";
      } else {
        content.style.display = "block";
      }
    });
  }
</script>


