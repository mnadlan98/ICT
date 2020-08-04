<!doctype html>
<html lang="en">
<head >
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?php echo base_url()?>css/templatemo-main.css">
<link rel="stylesheet" href="<?php echo base_url()?>css/login.css?v=8">
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
  <h5 style="font-weight: bolder; color: black; padding-left: 11em; margin-top: 8em; "><strong style="border-bottom: 3px solid red; font-size:24px; ">Masuk</strong></h5></br></br>
    <form action="<?php echo site_url('login/index') ?>" method="post">
      <div class="form-group">
        
        <input type="text" class="form-control  " id="username" name="username" placeholder="Username or Email" style="padding-left:3em;">
        <i class="fa fa-envelope icon fa-lg" style="position: absolute; margin-bottom: 10px; top:273px; left:25px; "></i>
        <small class="form-text text-danger"><?php echo form_error('username'); ?></small>
      </div>
      <div class="form-group">
        <input type="password" class="form-control" id="password" name="password" placeholder="Password" style="padding-left:3em;">
        <i class="fa fa-lock icon fa-lg" style="position: absolute; margin-bottom: 10px; top:325px; left:27px; "></i>
        <small class="form-text text-danger"><?php echo form_error('password'); ?></small>
      </div>
      <div class="form-group">
        <a href="#" data-toggle="modal" data-target="#forgetpass" style="color: light-blue; text-decoration: none; padding-left:1vh; font-family: Lato;" ><small><u>Lupa Password?</u></small></a>
      </div>
      <div class="row">
        <div class="col-md-12" style="padding-left:15em;">
          <button type="submit" name="login" class="btn btn-outline-dark" style="background: #BD0306; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 7px;font-weight: bold; font-size: 20px; font-family: Lato; color:white; ">Masuk</button>              
        </div>
        
      </div>
      <div class="form-group" style="margin-bottom:14em;">
      <p style="font-size:13px; padding-left:13.5em; font-family: Lato; padding-top:10px;">Belum punya akun? <a href="<?php echo site_url().'Register/';?>" style="color: light-blue; text-decoration: none; font-size:15px; font-family: Lato;"><small><u>Daftar Disni</u></small></a></p>
        
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