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

  <!-- MY CSS -->
  <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/assets/css/style.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/assets/css/stylenav.css">
  <style type="text/css">
  #itemku a:hover{ color: red; }

  a .list-group-item:hover{
    color: red;
  }
  .data a{
    color:#222;
  }

  .navbar {
    -webkit-box-shadow: 0 8px 6px -6px #999;
    -moz-box-shadow: 0 8px 6px -6px #999;
    box-shadow: 0 8px 6px -6px #999;
}
  </style>
  <title><?php echo $title ;?></title>
</head>

<body >
<nav class="navbar sticky-top navbar-expand-md navbar-light justify-content-between fluid" style="padding-left: 5vh; padding-right: 5vh; background-color:#FFFFFF; border-bottom: 3px solid red; ">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="navbar-brand" href="<?php echo base_url().'MainController/index';?>"><small>
          <img src="../images/Indihome-Study-red.png" style="padding-left: 0px; height: 40px; width: 140px;" alt="logo" name="logo" id="logo"></small></a>
        </li>
      </ul>
      <ul class="navbar-nav">
        <div class="row" id="itemku">
          <li class="nav-item">
            <a class="nav-link" onmouseover="this.style.color='red'" onmouseout="this.style.color='black'" href="" style="color: black; ">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" onmouseover="this.style.color='red'" onmouseout="this.style.color='black'" href="" style="color: black; ">Tentang ICT Tour</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" onmouseover="this.style.color='red'" onmouseout="this.style.color='black'" href="" style="color: black; ">Kontak</a>
          </li>
          <?php if ($this->session->userdata("user")['logged']): ?>
          <li class="nav-item">
            <a class="nav-link" href=""> Selamat Datang, <?= $this->session->userdata("user")['email_user'] ?>!</a>
          </li>
          <li class="nav-item">
                <a class="nav-link" href="<?= base_url(); ?>Login/logout">Logout</a>
          </li>
          <?php endif ?>
        </div>
      </ul>
    </nav>
</body>
</html>