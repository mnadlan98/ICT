<link rel="stylesheet" href="http://localhost/ICT/css/adminlogin.css">
<script src="http://localhost/ICT/script/forgetpass.js" ></script>
<div class="container-fluid">
<div class="row">
  <div class="side col" >
  <img src="../images/logo.jpg" style="width:280px; height:140px; position: absolute; left:720px; top: 40px;">
  </div>
  <div class="col-md-4 py-3" style=" background-color: #222222;">
  <h5 style="font-weight: bolder; color: white; padding-left: 11em; margin-top: 8em; "><strong style="border-bottom: 3px solid red; font-size:24px; ">Masuk</strong></h5></br></br>
     <?php // form_open(base_url('MainController/login')); ?> 
    <form method="post">
      <div class="form-group">
        
        <input type="email" class="form-control  " id="username_or_email" name="username_or_email" placeholder="Username" style="padding-left:3em;">
        <i class="fa fa-envelope icon fa-lg" style="position: absolute; margin-bottom: 10px; top:274px; left:25px; "></i>
      </div>
      <div class="form-group">
        <input type="password" class="form-control" id="password" name="password" placeholder="Kata Sandi" style="padding-left:3em;">
        <i class="fa fa-lock icon fa-lg" style="position: absolute; margin-bottom: 10px; top:325px; left:27px; "></i>
      </div>
      <div class="form-group">
        <a href="#" onclick="forgetpass()" style="color: light-blue; text-decoration: none; padding-left:1vh; font-family: Lato;"><small><u>Lupa Password?</u></small></a>
      </div>
      <div class="row">
        <div class="col-md-12" style="padding-left:15em;">
          <button type="submit" name="login" class="btn btn-outline-dark" style="background: #BD0306; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 7px;font-weight: bold; font-size: 20px; font-family: Lato; color:white; ">Masuk</button>              
        </div>
        
      </div>
      <div class="form-group" style="margin-bottom:15em;">
      <p style="font-size:13px; padding-left:16em; font-family: Lato; padding-top:10px; color:white;">Registrasi Admin <a href="<?php echo base_url().'MainController/viewRegistrasi';?>" style="color: light-blue; text-decoration: none; font-size:15px; font-family: Lato;"><small><u>Disni</u></small></a></p>
        
      </div>
      <div class="row">
          
          <div class="col" style=" margin-left:28em;">
          <a class="btn btn-outline-dark" href="<?php echo base_url().'MainController/viewLogin';?>" style="background: #BD0306; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 7px;font-weight: bold; font-size: 20px; font-family: Lato; color:white; ">User</a>            
          </div>
      </div>

    </form>
  </div>
</div>
</div>
