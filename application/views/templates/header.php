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
  <link rel="stylesheet" href="http://localhost/ICT/css/bootstrap.min.css">
<link rel="stylesheet" href="http://localhost/ICT/css/fontAwesome.css">
<link rel="stylesheet" href="http://localhost/ICT/css/font-awesome.min.css">



  <!-- Footer -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/bootstrap/css/bootstrap.css" >
  <link href="<?php echo base_url()?>assets/bootstrap/css/mdb.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">

  <link rel="stylesheet" href="http://localhost/ICT/css/animate.min.css">
  <script src="http://localhost/ICT/script/wow.min.js"></script>
  <script src="http://localhost/ICT/script/wow.js"></script>
  <script src="http://localhost/ICT/script/main.js?version=1"></script>
  <script src="http://localhost/ICT/script/jquery.min.js"></script>


  <link rel="stylesheet" type="text/css" href="http://localhost/ICT/css/header.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/assets/css/stylenav.css">
  
  <title><?php echo $title ;?></title>
</head>

<body >
<div class="header sticky-top" style="box-shadow: 0px 10px 5px #27272780;
  -webkit-box-shadow: 0px 5px 5px #27272780;
  -moz-box-shadow: 0px 5px 5px #27272780;
  z-index: 999999; border-bottom:2px solid red;">
  <a href="<?php echo base_url().'MainController/index';?>" class="logo"><img src="../images/Indihome-Study-red.png"></a>
  <div class="header-right">
    <a class="item" href="<?php echo site_url()."MainController/index#home"?>">Beranda</a>
    <a class="item" href="<?php echo site_url()."MainController/index#about"?>">Tentang</a>
    <a class="item" href="<?php echo site_url()."MainController/index#contact"?>">Kontak Kami</a>
    <?php if ($this->session->userdata("user")['logged']): ?>
      <a class="nav-link" href="<?php echo site_url()."MainController/viewProfil"?>" style="padding-left:10px; border-radius:0px; border-left:3px solid red;">Profil</a>
      <a class="item" href="<?php echo site_url()."MainController/viewReview"?>">Review Pengajuan</a>
    <a class="item" href="<?php echo site_url()."MainController/logout"?>" style="background-color:#DCDCDC;" onmouseover="this.style.color='red'" onmouseout="this.style.color='black'">Logout</a>
    <?php endif ?>
  </div>
</div>
</body>
</html>