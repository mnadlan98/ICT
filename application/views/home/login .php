<link rel="stylesheet" href="http://localhost/ICT/css/login.css?v=2">
<script src="http://localhost/ICT/script/forgetpass.js" ></script>
<div class="container-fluid">

<div class="row" style="background-color: #FFFFFF ; padding-left: 5vh; padding-right: 20vh; color: black;">
</div>
<div class="row"> 
  <div class="side col">
  <img src="../images/logo.png" style="width:480px; height:140px; position: absolute; left: 500px; top: 40px;">
  </div>
  <div class="col-md-4 py-3" style=" background-color: #D7D7D7;" >
  <h5 style="font-weight: bolder; color: black; padding-left: 11em; margin-top: 8em; "><strong style="border-bottom: 3px solid red; font-size:24px; ">Masuk</strong></h5></br></br>
    <form action="<?php base_url('login') ?>" method="post">
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
        <a href="#" onclick="forgetpass()" style="color: light-blue; text-decoration: none; padding-left:1vh; font-family: Lato;" ><small><u>Lupa Password?</u></small></a>
      </div>
      <div class="row">
        <div class="col-md-12" style="padding-left:11em;">
          <button type="submit" name="login" class="btn" style="padding:5px; font-size:15px; text-transform: capitalize;">Masuk</button>              
        </div>
        
      </div>
      <div class="form-group" style="margin-bottom:1em;">
      <p style="font-size:13px; padding-left:13.5em; font-family: Lato; padding-top:10px; ">Belum punya akun? <a href="<?php echo site_url().'Register/';?>" style="color: light-blue; text-decoration: none; font-size:15px; font-family: Lato;"><small><u>Daftar Disni</u></small></a></p>
        
      </div>
     

    </form>
  </div>
</div>
</div>