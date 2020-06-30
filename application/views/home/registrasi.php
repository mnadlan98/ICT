<style>
  
</style>
<link rel="stylesheet" href="http://localhost/ICT/css/daftar.css">
<div class="container-fluid">

<div class="row" style="background-color: #FFFFFF ; padding-left: 5vh; padding-right: 20vh; color: black;">
</div>
<div class="row">
  <div class="side col" >
  <img src="../images/logo.jpg" style="width:280px; height:140px; position: absolute; left: 720px; top: 40px;">
  </div>
  <div class="col-md-4 py-3" style=" background-color: #D7D7D7;" >
  <h5 style="font-weight: bolder; color: black; padding-left: 9em; margin-top: 5px; "><strong style="border-bottom: 3px solid red; font-size:24px; ">Daftar</strong></h5></br></br>
      <?php echo form_open('Register/index');?>
          <div class="form-group">
            <select class="form-control" style="padding-left:3em;" id="jenjang_sekolah" name="jenjang_sekolah">
              <option selected disabled hidden>Jenjang Sekolah</option>
              <option value="SLB">SLB</option>
              <option value="SD">SD</option>
              <option value="SMP">SMP</option>
              <option value="SMK">SMK</option>
              <option value="SMA">SMA</option>
            </select>
            <small class="form-text text-danger"><?php echo form_error('jenjang_sekolah'); ?></small>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="kota_sekolah" name="kota_sekolah" placeholder="Kota/Kabupaten" value="<?php echo set_value('kota_sekolah'); ?>" style="padding-left:3em;">
            <i class="fa fa-id-card icon  " style="position: absolute; margin-bottom: 10px; top:118px; left:28px; "></i>
            <small class="form-text text-danger"><?php echo form_error('kota_sekolah'); ?></small>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="nama_sekolah" name="nama_sekolah" placeholder="Nama Sekolah" value="<?php echo set_value('nama_sekolah'); ?>" style="padding-left:3em;">
            <small class="form-text text-danger"><?php echo form_error('nama_sekolah'); ?></small>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="email_sekolah" name="email_sekolah"  placeholder="Email Sekolah" value="<?php echo set_value('email_sekolah'); ?>" style="padding-left:3em;">
            <i class="fa fa-envelope icon  " style="position: absolute; margin-bottom: 10px; top:225.5px; left:29px; "></i>
            <small class="form-text text-danger"><?php echo form_error('email_sekolah'); ?></small>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="notelp_sekolah" name="notelp_sekolah" placeholder="Nomor Telepon Sekolah" value="<?php echo set_value('notelp_sekolah'); ?>" style="padding-left:3em;">
            <i class="fa fa-phone icon  " style="position: absolute; margin-bottom: 10px; top:332px; left:28px; "></i>
            <small class="form-text text-danger"><?php echo form_error('notelp_sekolah'); ?></small>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="nama_user" name="nama_user" placeholder="Nama Pengguna" value="<?php echo set_value('nama_user'); ?>" style="padding-left:3em;">
            <i class="fa fa-id-card icon  " style="position: absolute; margin-bottom: 10px; top:118px; left:28px; "></i>
            <small class="form-text text-danger"><?php echo form_error('nama_user'); ?></small>
          </div>
          <div class="form-group">
            <input type="email" class="form-control" id="email_user" name="email_user" placeholder="Email Pengguna" value="<?php echo set_value('email_user'); ?>" style="padding-left:3em;">
            <i class="fa fa-envelope icon  " style="position: absolute; margin-bottom: 10px; top:386px; left:28px; "></i>
            <small class="form-text text-danger"><?php echo form_error('email_user'); ?></small>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="notelp_user" name="notelp_user" placeholder="Nomor Telepon Pengguna" value="<?php echo set_value('notelp_user'); ?>" style="padding-left:3em;">
            <i class="fa fa-phone icon  " style="position: absolute; margin-bottom: 10px; top:332px; left:28px; "></i>
            <small class="form-text text-danger"><?php echo form_error('notelp_user'); ?></small>
          </div>
          <div class="form-group">
            <input type="password" class="form-control" id="password" name="password" placeholder="Kata Sandi" value="<?php echo set_value('password'); ?>" style="padding-left:3em;">
            <i class="fa fa-key icon  " style="position: absolute; margin-bottom: 10px; top:440px; left:28px; "></i>
            <small class="form-text text-danger"><?php echo form_error('password'); ?></small>
          </div>
          <div class="form-group">
            <input type="password" class="form-control" id="password" name="password_conf" placeholder="Ulangi Kata Sandi" value="<?php echo set_value('password_conf'); ?>" style="padding-left:3em;">
            <i class="fa fa-key icon  " style="position: absolute; margin-bottom: 10px; top:494px; left:28px; "></i>
            <small class="form-text text-danger"><?php echo form_error('password_conf'); ?></small>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="checkbox_policy">
            <label class="form-check-label" for="checkbox_policy">Saya menyetujui <a href="#">syarat dan ketentuan</a> yang berlaku</label>
          </div> </br>
          <div class="col-md-12" style="padding-left:11em;">
          <button type="submit" name="btnSubmit" class="btn btn-outline-dark" style="background: #BD0306; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 7px;font-weight: bold; font-size: 20px; font-family: Lato; color:white; " value="Daftar">Daftar</button>              
        </div>
      <?php echo form_close();?>
        <div class="form-group" style="margin-bottom:2em;">
          <p style="font-size:13px; padding-left:10.5em; font-family: Lato; padding-top:10px;">Sudah punya akun? <a href="<?php echo base_url().'Login/inputlogin';?>" style="color: light-blue; text-decoration: none; font-size:15px; font-family: Lato;"><small><u>Masuk Disni</u></small></a></p>
        </div>               
      
  </div>
</div>
</div>
