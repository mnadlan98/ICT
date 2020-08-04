<!doctype html>
<html lang="en">
<head >
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?php echo base_url()?>css/templatemo-main.css">
<link rel="stylesheet" href="<?php echo base_url()?>css/login.css?v=">
<div class="container-fluid">
</head>

<body >
  <?php if ($this->session->flashdata('login')): ?>
    <div class="alert alert-success" role="alert">
      <?php echo $this->session->flashdata('login'); ?>
    </div>
  <?php endif ?>
<div class="row" style="background-color: #FFFFFF ; padding-left: 5vh; padding-right: 20vh; color: black;">
</div>
<div class="row">
  <div class="side col">
  <img src="<?php echo base_url()?>images/logo.png" style="width:480px; height:140px; position: absolute; left: 500px; top: 40px;">
  </div>
  <div class="col-md-4 py-3" style=" background-color: #D7D7D7;" >
  <div class="row-sm-6">
      </div>
      <div class="row-sm-6 text-center" style="">
        <h5 style="font-weight: bolder; color: black; margin-top: 11em; "><strong style="border-bottom: 3px solid red; font-size:24px; ">Masuk</strong></h5></br></br>
      </div>
      <div class="row-sm-6">
      </div>
    <form action="<?php echo site_url('login/index') ?>" method="post">
      <div class="form-group">
        
        <input type="text" class="form-control  " id="username" name="username" placeholder="Username or Email" style="padding-left:3em;">
        <i class="fa fa-envelope icon fa-lg" style="position: absolute; margin-bottom: 10px; top:250px; left:25px; "></i>
        <small class="form-text text-danger"><?php echo form_error('username'); ?></small>
      </div>
      <div class="form-group">
        <input type="password" class="form-control" id="password" name="password" placeholder="Password" style="padding-left:3em;">
        <i class="fa fa-lock icon fa-lg" style="position: absolute; margin-bottom: 10px; top:300px; left:27px; "></i>
        <small class="form-text text-danger"><?php echo form_error('password'); ?></small>
      </div>
      <div class="form-group">
        <a href="#" data-toggle="modal" data-target="#forgetpass" style="color: light-blue; text-decoration: none; padding-left:1vh; font-family: Lato;" ><small><u>Lupa Password?</u></small></a>
      </div>
      <div class="row-sm-6">
      </div>
      <div class="row-sm-6 text-center" style="">
          <button type="submit" name="login" class="btn" style="padding:5px; font-size:15px; text-transform: capitalize;">Masuk</button>              
          <p style="font-size:13px;font-family: Lato; padding-top:10px; ">Belum punya akun? <a href="<?php echo site_url().'Register/';?>" style="color: light-blue; text-decoration: none; font-size:15px; font-family: Lato;"><small><u>Daftar Disni</u></small></a></p>
      </div>
      <div class="row-sm-6" style="margin-bottom:14em;" >
      </div>
     

    </form>
  </div>
</div>
</div>
<div class="modal fade" id="forgetpass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Lupa Password</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo site_url('login/forget_password')?>" method="post">
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          <i class="prefix grey-text"></i>
          <input type="email" id="email" name ="email" class="form-control validate" placeholder="Masukkan Email User" required>
        </div>
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-deep-orange">Submit</button>
      </div>
    </div>
      </form>
  </div>
</div>
</div>
</body>
</html>