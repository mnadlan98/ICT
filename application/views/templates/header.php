<!doctype html>
<html lang="en">
<head >
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">


  <!-- Footer -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/bootstrap/css/bootstrap.css" >
  <link href="<?php echo base_url()?>assets/bootstrap/css/mdb.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">


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
    <a class="item" href="#about">Kontak Kami</a>
    <?php if ($this->session->userdata("user")['logged']): ?>
      <a class="nav-link" href="<?php echo site_url()."MainController/viewProfil"?>" style="padding-left:10px; border-radius:0px; border-left:3px solid red;">Profil</a>
      <a class="item" href="<?php echo site_url()."MainController/index#review"?>">Review Pengajuan</a>
    <a class="item" href="<?php echo site_url()."MainController/logout"?>" style="background-color:#DCDCDC;" onmouseover="this.style.color='red'" onmouseout="this.style.color='black'">Logout</a>
    <?php endif ?>
  </div>
</div>
</body>
</html>