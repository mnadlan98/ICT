<div class="container-fluid" style="background-image:url('../images/9.jpg');">
<div class="row">
  <div class="col" >
  </div>
  <div class="col-md-4 py-3" style=" background-color: #222222; margin-right:27em; opacity:95%;" >
  <h5 style="font-weight: bolder; color: white; padding-left: 6em; margin-top: 8em; "><strong style="border-bottom: 3px solid red; font-size:24px; ">Lupa Password?</strong></h5></br></br>
     <?php // form_open(base_url('MainController/login')); ?> 
    <form method="post">
      <div class="form-group">
        <label style="color:white;">Masukkan Email Anda Disini</label>
        <input type="email " class="form-control  " id="username_or_email" name="username_or_email" placeholder="Email" style="padding-left:3em;">
        <i class="fa fa-envelope icon fa-lg" style="position: absolute; margin-bottom: 10px; top:305px; left:25px; "></i>
      </div>
     
      <div class="row">
        <div class="col-md-12" style="padding-left:12em; margin-bottom:20em;">
          <button type="submit" name="login" class="btn btn-outline-dark" style="background: #BD0306; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 7px;font-weight: bold; font-size: 20px; font-family: Lato; color:white; ">Kirim</button>              
        </div>
      </div>
    </form>
  </div>
</div>
</div>
