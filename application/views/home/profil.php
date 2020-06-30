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
        <link rel="stylesheet" href="http://localhost/ICT/css/profil.css">

        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,600,700,800" rel="stylesheet">

        <script src="http://localhost/ICT/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>

<body style="background-image: url(../images/13.jpg); ">
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">

<head>

  <title></title>

</head>
<style type="text/css">
  label{color: #222;font-weight: bolder;}
  input{height: 3.3em !important;}
  .btn:hover{height: 3.3em !important;}
</style>
<?php foreach ($user as $key){
         $first=$key->nama_sekolah;
    ?>
<body>
    <?php $str=explode('@',$this->session->userdata('email_user'))?>
    <div class="container-fluid">
    
            <h1>HELLO<h1>
             <span><h6>Nama:</h6><h6><?php echo $this->session->userdata('email_user');?></h6> </span>
    
    </div>
    

</body>
<?php } ?>