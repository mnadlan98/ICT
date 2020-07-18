<link rel="stylesheet" href="http://localhost/ICT/css/login.css">
<script src="http://localhost/ICT/script/forgetpass.js" ></script>
<div class="container-fluid">

<div class="row" style="background-color: #FFFFFF ; padding-left: 5vh; padding-right: 20vh; color: black;">
</div>
<div class="row">
  <div class="side col">
  <img src="../images/logo.jpg" style="width:280px; height:140px; position: absolute; left:720px; top: 40px;">
  </div>
  <div class="col-md-4 py-3" style=" background-color: #D7D7D7;" >
  <h5 style="font-weight: bolder; color: black; padding-left: 11em; margin-top: 8em; "><strong style="border-bottom: 3px solid red; font-size:24px; ">Masuk</strong></h5></br></br>
    <form action="<?php base_url('login/inputlogin') ?>" method="post">
      <div class="form-group">
        
        <input type="email" class="form-control  " id="email_user" name="email_user" placeholder="Email" style="padding-left:3em;">
        <i class="fa fa-envelope icon fa-lg" style="position: absolute; margin-bottom: 10px; top:273px; left:25px; "></i>
        <small class="form-text text-danger"><?php echo form_error('email_user'); ?></small>
      </div>
      <div class="form-group">
        <input type="password" class="form-control" id="password" name="password" placeholder="Kata Sandi" style="padding-left:3em;">
        <i class="fa fa-lock icon fa-lg" style="position: absolute; margin-bottom: 10px; top:325px; left:27px; "></i>
        <small class="form-text text-danger"><?php echo form_error('password'); ?></small>
      </div>
      <div class="form-group">
        <a href="#" onclick="forgetpass()" style="color: light-blue; text-decoration: none; padding-left:1vh; font-family: Lato;" ><small><u>Lupa Password?</u></small></a>
      </div>
      <div class="row">
        <div class="col-md-12" style="padding-left:15em;">
          <button type="submit" name="login" class="btn btn-outline-dark" style="background: #BD0306; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 7px;font-weight: bold; font-size: 20px; font-family: Lato; color:white; ">Masuk</button>              
        </div>
        
      </div>
      <div class="form-group" style="margin-bottom:12em;">
      <p style="font-size:13px; padding-left:13.5em; font-family: Lato; padding-top:10px;">Belum punya akun? <a href="<?php echo base_url().'MainController/viewRegistrasi';?>" style="color: light-blue; text-decoration: none; font-size:15px; font-family: Lato;"><small><u>Daftar Disni</u></small></a></p>
        
      </div>
      <div class="col-md-12" style="padding-left:25em;">
          <a class="btn btn-outline-dark" href="<?php echo base_url().'MainController/viewAdminlogin';?>" style="background: #BD0306; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 7px;font-weight: bold; font-size: 20px; font-family: Lato; color:white; ">Admin</a>              
        </div>

    </form>
  </div>
</div>
</div>
