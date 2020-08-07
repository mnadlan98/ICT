<!doctype html>
<html lang="en">
<head >
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap.min.css">
  
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">


  <!-- Footer -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">

  <link rel="stylesheet" href="<?php echo base_url()?>css/animate.min.css">
  <script src="<?php echo base_url()?>script/wow.min.js"></script>
  <script src="<?php echo base_url()?>script/wow.js"></script>
  <script src="<?php echo base_url()?>script/main.js?version=54"></script>
  <script src="<?php echo base_url()?>script/jquery.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />

  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/header.css?v=2">

  
  <title><?php echo $title ;?></title>
</head>

<body >
<nav class="header sticky-top " style="box-shadow: 0px 10px 5px #27272780;
  -webkit-box-shadow: 0px 5px 5px #27272780;
  -moz-box-shadow: 0px 5px 5px #27272780;
  z-index: 999999; border-bottom:2px solid red;">
  
  <a href="<?php echo base_url().'MainController/index';?>" ><img class="logohead" src="../images/Indihome-Study-red.png" style="max-width:140px; width:100%; margin-top: 10px; margin-left: 10px;"></a>
  <button class="navbar-toggler mr-auto ml-10" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="fa fa-bars"></span>
  </button>
  <div class="collapse navbar-collapse header-right mr-auto" id="navbarSupportedContent">
    <ul class="">
    <a class="item" href="<?php echo site_url()."MainController/index#home"?>">Beranda</a>
    <a class="item" href="<?php echo site_url()."MainController/index#about"?>">Tentang</a>
    <a class="item" href="<?php echo site_url()."MainController/index#contact"?>">Kontak Kami</a>
    <?php if (isset($this->session->userdata("user")['logged'])): ?>
      <a class="nav-link" href="<?php echo site_url()."MainController/Profil"?>" style="padding-left:10px; border-radius:0px; border-left:3px solid red;">Profil</a>
      <?php if ($this->session->userdata("user")['status_pengajuan'] != 0): ?>
        <a class="item" href="<?php echo site_url()."MainController/Review"?>">Review Pengajuan</a>
      <?php endif ?>
      <?php if ($this->session->userdata("user")['eventover'] == 1): ?>
        <a class="item" href="<?php echo site_url()."MainController/Feedback"?>">Data Report</a>
      <?php endif ?>
    <a class="item" href="<?php echo site_url()."login/logout"?>" style="background-color:#DCDCDC;" onmouseover="this.style.color='red'" onmouseout="this.style.color='black'">Logout</a>
    <?php endif ?>

  </div>
</nav>
</body>
</html>
