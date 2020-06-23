<style>
  .form-control{
    -webkit-box-shadow: 0 8px 6px -6px #999;
    -moz-box-shadow: 0 8px 6px -6px #999;
    box-shadow: 0 8px 6px -6px #999;
  }
</style>
<div class="container-fluid">

<div class="row" style="background-color: #FFFFFF ; padding-left: 5vh; padding-right: 20vh; color: black;">
</div>
<div class="row">
  <div class="col" style="background-image:url('../images/3.jpg');">
  <img src="../images/logo.jpg" style="width:280px; height:140px; position: absolute; left: 630px; top: 40px;">
  </div>
  <div class="col-md-4 py-3" style=" background-color: #D7D7D7;" >
  <h5 style="font-weight: bolder; color: black; padding-left: 9em; margin-top: 5px; "><strong style="border-bottom: 3px solid red; font-size:24px; ">Daftar</strong></h5></br></br>
     <form action="<?php base_url('MainController/register') ?>" method="post">
          <div class="form-group">
            <input type="text" class="form-control" id="kode_sekolah" name="Kode_Sekolah" placeholder="Kode Sekolah" style="padding-left:3em;">
            <i class="fa fa-id-card icon  " style="position: absolute; margin-bottom: 10px; top:118px; left:28px; "></i>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="nama_sekolah" name="Nama_Sekolah" placeholder="Nama Sekolah" style="padding-left:3em;">
            <i class="fa fa-school icon  " style="position: absolute; margin-bottom: 10px; top:170px; left:28px; "></i>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="email_sekolah" name="Email_Sekolah"  placeholder="Email Sekolah" style="padding-left:3em;">
            <i class="fa fa-envelope icon  " style="position: absolute; margin-bottom: 10px; top:225.5px; left:29px; "></i>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="alamat_sekolah" name="Alamat_Sekolah" placeholder="Alamat Sekolah" style="padding-left:3em;">
            <i class="fa fa-map-marker icon  " style="position: absolute; margin-bottom: 10px; top:278px; left:32px; "></i>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="notelp_sekolah" name="notelp_sekolah" placeholder="Nomor Telepon Sekolah" style="padding-left:3em;">
            <i class="fa fa-phone icon  " style="position: absolute; margin-bottom: 10px; top:332px; left:28px; "></i>
          </div>
          <div class="form-group">
            <input type="email" class="form-control" id="email_user" name="email_user" placeholder="Email Pengguna" style="padding-left:3em;">
            <i class="fa fa-envelope icon  " style="position: absolute; margin-bottom: 10px; top:386px; left:28px; "></i>
          </div>
          <div class="form-group">
            <input type="password" class="form-control" id="password" name="password" placeholder="Kata Sandi" style="padding-left:3em;">
            <i class="fa fa-key icon  " style="position: absolute; margin-bottom: 10px; top:386px; left:28px; "></i>
          </div>
          <div class="form-group">
            <input type="password" class="form-control" id="password" name="password" placeholder="Ulangi Kata Sandi" style="padding-left:3em;">
            <i class="fa fa-key icon  " style="position: absolute; margin-bottom: 10px; top:440px; left:28px; "></i>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="checkbox_policy">
            <label class="form-check-label" for="checkbox_policy">Saya menyetujui <a href="#">syarat dan ketentuan</a> yang berlaku</label>
          </div> </br>
          <div class="col-md-12" style="padding-left:11em;">
          <button type="submit" name="login" class="btn btn-outline-dark" style="background: #BD0306; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 7px;font-weight: bold; font-size: 20px; font-family: Lato; color:white; ">Daftar</button>              
        </div>
        <div class="form-group" style="">
          <p style="font-size:13px; padding-left:10.5em; font-family: Lato; padding-top:10px;">Sudah punya akun? <a href="<?php echo base_url().'MainController/viewLogin';?>" style="color: light-blue; text-decoration: none; font-size:15px; font-family: Lato;"><small><u>Masuk Disni</u></small></a></p>
        </div>               
      </form>
  </div>
</div>
</div>
